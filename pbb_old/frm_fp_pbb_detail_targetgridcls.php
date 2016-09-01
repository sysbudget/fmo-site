<?php include_once "tbl_usersinfo.php" ?>
<?php

//
// Page class
//
class cfrm_fp_pbb_detail_target_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'frm_fp_pbb_detail_target';

	// Page object name
	var $PageObjName = 'frm_fp_pbb_detail_target_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_pbb_detail_target;
		if ($frm_fp_pbb_detail_target->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_pbb_detail_target->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Message
	function getMessage() {
		return @$_SESSION[UP_SESSION_MESSAGE];
	}

	function setMessage($v) {
		up_AddMessage($_SESSION[UP_SESSION_MESSAGE], $v);
	}

	function getFailureMessage() {
		return @$_SESSION[UP_SESSION_FAILURE_MESSAGE];
	}

	function setFailureMessage($v) {
		up_AddMessage($_SESSION[UP_SESSION_FAILURE_MESSAGE], $v);
	}

	function getSuccessMessage() {
		return @$_SESSION[UP_SESSION_SUCCESS_MESSAGE];
	}

	function setSuccessMessage($v) {
		up_AddMessage($_SESSION[UP_SESSION_SUCCESS_MESSAGE], $v);
	}

	// Show message
	function ShowMessage() {
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage, "");
		if ($sMessage <> "") { // Message in Session, display
			echo "<p class=\"upMessage\">" . $sMessage . "</p>";
			$_SESSION[UP_SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$sSuccessMessage = $this->getSuccessMessage();
		$this->Message_Showing($sSuccessMessage, "success");
		if ($sSuccessMessage <> "") { // Message in Session, display
			echo "<p class=\"upSuccessMessage\">" . $sSuccessMessage . "</p>";
			$_SESSION[UP_SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$sErrorMessage = $this->getFailureMessage();
		$this->Message_Showing($sErrorMessage, "failure");
		if ($sErrorMessage <> "") { // Message in Session, display
			echo "<p class=\"upErrorMessage\">" . $sErrorMessage . "</p>";
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
	}
	var $PageHeader;
	var $PageFooter;

	// Show Page Header
	function ShowPageHeader() {
		$sHeader = $this->PageHeader;
		$this->Page_DataRendering($sHeader);
		if ($sHeader <> "") { // Header exists, display
			echo "<p class=\"upbudgetofficeclass\">" . $sHeader . "</p>";
		}
	}

	// Show Page Footer
	function ShowPageFooter() {
		$sFooter = $this->PageFooter;
		$this->Page_DataRendered($sFooter);
		if ($sFooter <> "") { // Fotoer exists, display
			echo "<p class=\"upbudgetofficeclass\">" . $sFooter . "</p>";
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm, $frm_fp_pbb_detail_target;
		if ($frm_fp_pbb_detail_target->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_pbb_detail_target->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_pbb_detail_target->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_pbb_detail_target_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_pbb_detail_target)
		if (!isset($GLOBALS["frm_fp_pbb_detail_target"])) {
			$GLOBALS["frm_fp_pbb_detail_target"] = new cfrm_fp_pbb_detail_target();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_pbb_detail_target"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_pbb_detail_target', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"])) $GLOBALS["gTimer"] = new cTimer();

		// Open connection
		if (!isset($conn)) $conn = up_Connect();

		// List options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		global $frm_fp_pbb_detail_target;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->TableName);
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanList()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_fp_pbb_detail_targetlist.php");
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_fp_pbb_detail_target->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->SetupListOptions();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn;
		global $frm_fp_pbb_detail_target;
		$GLOBALS["Table"] =& $GLOBALS["MasterTable"];
		if ($url == "")
			return;

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		$this->Page_Redirecting($url);

		// Go to URL if specified
		if ($url <> "") {
			if (!UP_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
		exit();
	}

	// Class variables
	var $ListOptions; // List options
	var $ExportOptions; // Export options
	var $DisplayRecs = 20;
	var $StartRec;
	var $StopRec;
	var $TotalRecs = 0;
	var $RecRange = 10;
	var $SearchWhere = ""; // Search WHERE clause
	var $RecCnt = 0; // Record count
	var $EditRowCnt;
	var $RowCnt;
	var $RowIndex = 0; // Row index
	var $KeyCount = 0; // Key count
	var $RowAction = ""; // Row action
	var $RowOldKey = ""; // Row old key (for copy)
	var $RecPerRow = 0;
	var $ColCnt = 0;
	var $DbMasterFilter = ""; // Master filter
	var $DbDetailFilter = ""; // Detail filter
	var $MasterRecordExists;	
	var $MultiSelectKey;
	var $RestoreSearch;
	var $Recordset;
	var $OldRecordset;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_fp_pbb_detail_target;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Set up master detail parameters
			$this->SetUpMasterParms();

			// Hide all options
			if ($frm_fp_pbb_detail_target->Export <> "" ||
				$frm_fp_pbb_detail_target->CurrentAction == "gridadd" ||
				$frm_fp_pbb_detail_target->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($frm_fp_pbb_detail_target->AllowAddDeleteRow) {
				if ($frm_fp_pbb_detail_target->CurrentAction == "gridadd" ||
					$frm_fp_pbb_detail_target->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($frm_fp_pbb_detail_target->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_fp_pbb_detail_target->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $frm_fp_pbb_detail_target->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_fp_pbb_detail_target->getDetailFilter(); // Restore detail filter

		// Add master User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			if ($frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_cu")
				$this->DbMasterFilter = $frm_fp_pbb_detail_target->AddMasterUserIDFilter($this->DbMasterFilter, "frm_fp_rep_ta_form_a_cu"); // Add master User ID filter
			if ($frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_t_completion_status_unit_mfo")
				$this->DbMasterFilter = $frm_fp_pbb_detail_target->AddMasterUserIDFilter($this->DbMasterFilter, "frm_fp_rep_t_completion_status_unit_mfo"); // Add master User ID filter
			if ($frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_t_completion_status_unit_pi")
				$this->DbMasterFilter = $frm_fp_pbb_detail_target->AddMasterUserIDFilter($this->DbMasterFilter, "frm_fp_rep_t_completion_status_unit_pi"); // Add master User ID filter
		}
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_fp_pbb_detail_target->getMasterFilter() <> "" && $frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_cu") {
			global $frm_fp_rep_ta_form_a_cu;
			$rsmaster = $frm_fp_rep_ta_form_a_cu->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_fp_pbb_detail_target->getReturnUrl()); // Return to caller
			} else {
				$frm_fp_rep_ta_form_a_cu->LoadListRowValues($rsmaster);
				$frm_fp_rep_ta_form_a_cu->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_fp_rep_ta_form_a_cu->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Load master record
		if ($frm_fp_pbb_detail_target->getMasterFilter() <> "" && $frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_t_completion_status_unit_mfo") {
			global $frm_fp_rep_t_completion_status_unit_mfo;
			$rsmaster = $frm_fp_rep_t_completion_status_unit_mfo->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_fp_pbb_detail_target->getReturnUrl()); // Return to caller
			} else {
				$frm_fp_rep_t_completion_status_unit_mfo->LoadListRowValues($rsmaster);
				$frm_fp_rep_t_completion_status_unit_mfo->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_fp_rep_t_completion_status_unit_mfo->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Load master record
		if ($frm_fp_pbb_detail_target->getMasterFilter() <> "" && $frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_t_completion_status_unit_pi") {
			global $frm_fp_rep_t_completion_status_unit_pi;
			$rsmaster = $frm_fp_rep_t_completion_status_unit_pi->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_fp_pbb_detail_target->getReturnUrl()); // Return to caller
			} else {
				$frm_fp_rep_t_completion_status_unit_pi->LoadListRowValues($rsmaster);
				$frm_fp_rep_t_completion_status_unit_pi->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_fp_rep_t_completion_status_unit_pi->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_fp_pbb_detail_target->setSessionWhere($sFilter);
		$frm_fp_pbb_detail_target->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $frm_fp_pbb_detail_target;
		$frm_fp_pbb_detail_target->LastAction = $frm_fp_pbb_detail_target->CurrentAction; // Save last action
		$frm_fp_pbb_detail_target->CurrentAction = ""; // Clear action
		$_SESSION[UP_SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Grid Add mode
	function GridAddMode() {
		$_SESSION[UP_SESSION_INLINE_MODE] = "gridadd"; // Enabled grid add
	}

	// Switch to Grid Edit mode
	function GridEditMode() {
		$_SESSION[UP_SESSION_INLINE_MODE] = "gridedit"; // Enable grid edit
	}

	// Perform update to grid
	function GridUpdate() {
		global $conn, $Language, $objForm, $gsFormError, $frm_fp_pbb_detail_target;
		$bGridUpdate = TRUE;

		// Get old recordset
		$frm_fp_pbb_detail_target->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $frm_fp_pbb_detail_target->SQL();
		if ($rs = $conn->Execute($sSql)) {
			$rsold = $rs->GetRows();
			$rs->Close();
		}
		$sKey = "";

		// Update row index and get row key
		$objForm->Index = 0;
		$rowcnt = strval($objForm->GetValue("key_count"));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Update all rows based on key
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
			$objForm->Index = $rowindex;
			$rowkey = strval($objForm->GetValue("k_key"));
			$rowaction = strval($objForm->GetValue("k_action"));

			// Load all values and keys
			if ($rowaction <> "insertdelete") { // Skip insert then deleted rows
				$this->LoadFormValues(); // Get form values
				if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
					$bGridUpdate = $this->SetupKeyValues($rowkey); // Set up key values
				} else {
					$bGridUpdate = TRUE;
				}

				// Skip empty row
				if ($rowaction == "insert" && $this->EmptyRow()) {

					// No action required
				// Validate form and insert/update/delete record

				} elseif ($bGridUpdate) {
					if ($rowaction == "delete") {
						$frm_fp_pbb_detail_target->CurrentFilter = $frm_fp_pbb_detail_target->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$frm_fp_pbb_detail_target->SendEmail = FALSE; // Do not send email on update success
								$bGridUpdate = $this->EditRow(); // Update this row
							}
						} // End update
					}
				}
				if ($bGridUpdate) {
					if ($sKey <> "") $sKey .= ", ";
					$sKey .= $rowkey;
				} else {
					break;
				}
			}
		}
		if ($bGridUpdate) {

			// Get new recordset
			if ($rs = $conn->Execute($sSql)) {
				$rsnew = $rs->GetRows();
				$rs->Close();
			}
			$this->ClearInlineMode(); // Clear inline edit mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->Phrase("UpdateFailed")); // Set update failed message
			$frm_fp_pbb_detail_target->EventCancelled = TRUE; // Set event cancelled
			$frm_fp_pbb_detail_target->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $frm_fp_pbb_detail_target;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $frm_fp_pbb_detail_target->KeyFilter();
				if ($sWrkFilter <> "") $sWrkFilter .= " OR ";
				$sWrkFilter .= $sFilter;
			} else {
				$sWrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // next row
			$objForm->Index = $rowindex;
			$sThisKey = strval($objForm->GetValue("k_key"));
		}
		return $sWrkFilter;
	}

	// Set up key values
	function SetupKeyValues($key) {
		global $frm_fp_pbb_detail_target;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 1) {
			$frm_fp_pbb_detail_target->pbb_id->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($frm_fp_pbb_detail_target->pbb_id->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $frm_fp_pbb_detail_target;
		$rowindex = 1;
		$bGridInsert = FALSE;

		// Init key filter
		$sWrkFilter = "";
		$addcnt = 0;
		$sKey = "";

		// Get row count
		$objForm->Index = 0;
		$rowcnt = strval($objForm->GetValue("key_count"));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Insert all rows
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$objForm->Index = $rowindex;
			$rowaction = strval($objForm->GetValue("k_action"));
			if ($rowaction <> "" && $rowaction <> "insert")
				continue; // Skip
			if ($rowaction == "insert") {
				$this->RowOldKey = strval($objForm->GetValue("k_oldkey"));
				$this->LoadOldRecord(); // Load old recordset
			}
			$this->LoadFormValues(); // Get form values
			if (!$this->EmptyRow()) {
				$addcnt++;
				$frm_fp_pbb_detail_target->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {
					if ($sKey <> "") $sKey .= UP_COMPOSITE_KEY_SEPARATOR;
					$sKey .= $frm_fp_pbb_detail_target->pbb_id->CurrentValue;

					// Add filter for this record
					$sFilter = $frm_fp_pbb_detail_target->KeyFilter();
					if ($sWrkFilter <> "") $sWrkFilter .= " OR ";
					$sWrkFilter .= $sFilter;
				} else {
					break;
				}
			}
		}
		if ($addcnt == 0) { // No record inserted
			$this->ClearInlineMode(); // Clear grid add mode and return
			return TRUE;
		}
		if ($bGridInsert) {

			// Get new recordset
			$frm_fp_pbb_detail_target->CurrentFilter = $sWrkFilter;
			$sSql = $frm_fp_pbb_detail_target->SQL();
			if ($rs = $conn->Execute($sSql)) {
				$rsnew = $rs->GetRows();
				$rs->Close();
			}
			$this->ClearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "") {
				$this->setFailureMessage($Language->Phrase("InsertFailed")); // Set insert failed message
			}
			$frm_fp_pbb_detail_target->EventCancelled = TRUE; // Set event cancelled
			$frm_fp_pbb_detail_target->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $frm_fp_pbb_detail_target, $objForm;
		if ($objForm->HasValue("x_applicable") && $objForm->HasValue("o_applicable") && $frm_fp_pbb_detail_target->applicable->CurrentValue <> $frm_fp_pbb_detail_target->applicable->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_cu_unit_name") && $objForm->HasValue("o_cu_unit_name") && $frm_fp_pbb_detail_target->cu_unit_name->CurrentValue <> $frm_fp_pbb_detail_target->cu_unit_name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_mfo_name") && $objForm->HasValue("o_mfo_name") && $frm_fp_pbb_detail_target->mfo_name->CurrentValue <> $frm_fp_pbb_detail_target->mfo_name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_target") && $objForm->HasValue("o_target") && $frm_fp_pbb_detail_target->target->CurrentValue <> $frm_fp_pbb_detail_target->target->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_t_numerator") && $objForm->HasValue("o_t_numerator") && $frm_fp_pbb_detail_target->t_numerator->CurrentValue <> $frm_fp_pbb_detail_target->t_numerator->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_t_denominator") && $objForm->HasValue("o_t_denominator") && $frm_fp_pbb_detail_target->t_denominator->CurrentValue <> $frm_fp_pbb_detail_target->t_denominator->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_t_remarks") && $objForm->HasValue("o_t_remarks") && $frm_fp_pbb_detail_target->t_remarks->CurrentValue <> $frm_fp_pbb_detail_target->t_remarks->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_t_cutOffDate_remarks") && $objForm->HasValue("o_t_cutOffDate_remarks") && $frm_fp_pbb_detail_target->t_cutOffDate_remarks->CurrentValue <> $frm_fp_pbb_detail_target->t_cutOffDate_remarks->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_accomplishment") && $objForm->HasValue("o_accomplishment") && $frm_fp_pbb_detail_target->accomplishment->CurrentValue <> $frm_fp_pbb_detail_target->accomplishment->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_numerator") && $objForm->HasValue("o_a_numerator") && $frm_fp_pbb_detail_target->a_numerator->CurrentValue <> $frm_fp_pbb_detail_target->a_numerator->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_denominator") && $objForm->HasValue("o_a_denominator") && $frm_fp_pbb_detail_target->a_denominator->CurrentValue <> $frm_fp_pbb_detail_target->a_denominator->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_supporting_docs") && $objForm->HasValue("o_a_supporting_docs") && $frm_fp_pbb_detail_target->a_supporting_docs->CurrentValue <> $frm_fp_pbb_detail_target->a_supporting_docs->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_remarks") && $objForm->HasValue("o_a_remarks") && $frm_fp_pbb_detail_target->a_remarks->CurrentValue <> $frm_fp_pbb_detail_target->a_remarks->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_cutOffDate_remarks") && $objForm->HasValue("o_a_cutOffDate_remarks") && $frm_fp_pbb_detail_target->a_cutOffDate_remarks->CurrentValue <> $frm_fp_pbb_detail_target->a_cutOffDate_remarks->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_rating_above_90") && $objForm->HasValue("o_a_rating_above_90") && $frm_fp_pbb_detail_target->a_rating_above_90->CurrentValue <> $frm_fp_pbb_detail_target->a_rating_above_90->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_rating_below_90") && $objForm->HasValue("o_a_rating_below_90") && $frm_fp_pbb_detail_target->a_rating_below_90->CurrentValue <> $frm_fp_pbb_detail_target->a_rating_below_90->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_supporting_docs_comparison") && $objForm->HasValue("o_a_supporting_docs_comparison") && $frm_fp_pbb_detail_target->a_supporting_docs_comparison->CurrentValue <> $frm_fp_pbb_detail_target->a_supporting_docs_comparison->OldValue)
			return FALSE;
		return TRUE;
	}

	// Validate grid form
	function ValidateGridForm() {
		global $objForm;

		// Get row count
		$objForm->Index = 0;
		$rowcnt = strval($objForm->GetValue("key_count"));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Validate all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$objForm->Index = $rowindex;
			$rowaction = strval($objForm->GetValue("k_action"));
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
				$this->LoadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->EmptyRow()) {

					// Ignore
				} else if (!$this->ValidateForm()) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	// Restore form values for current row
	function RestoreCurrentRowFormValues($idx) {
		global $objForm, $frm_fp_pbb_detail_target;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_fp_pbb_detail_target;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_fp_pbb_detail_target->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_fp_pbb_detail_target->CurrentOrderType = @$_GET["ordertype"];
			$frm_fp_pbb_detail_target->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_fp_pbb_detail_target;
		$sOrderBy = $frm_fp_pbb_detail_target->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_fp_pbb_detail_target->SqlOrderBy() <> "") {
				$sOrderBy = $frm_fp_pbb_detail_target->SqlOrderBy();
				$frm_fp_pbb_detail_target->setSessionOrderBy($sOrderBy);
				$frm_fp_pbb_detail_target->applicable->setSort("DESC");
				$frm_fp_pbb_detail_target->cu_unit_name->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_fp_pbb_detail_target;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_fp_pbb_detail_target->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_fp_pbb_detail_target->mfo_sequence->setSessionValue("");
				$frm_fp_pbb_detail_target->focal_person_id->setSessionValue("");
				$frm_fp_pbb_detail_target->focal_person_id->setSessionValue("");
				$frm_fp_pbb_detail_target->units_id->setSessionValue("");
				$frm_fp_pbb_detail_target->mfo->setSessionValue("");
				$frm_fp_pbb_detail_target->units_id->setSessionValue("");
				$frm_fp_pbb_detail_target->focal_person_id->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_fp_pbb_detail_target->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_fp_pbb_detail_target->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_fp_pbb_detail_target;

		// "griddelete"
		if ($frm_fp_pbb_detail_target->AllowAddDeleteRow) {
			$item =& $this->ListOptions->Add("griddelete");
			$item->CssStyle = "white-space: nowrap;";
			$item->OnLeft = TRUE;
			$item->Visible = FALSE; // Default hidden
		}

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_fp_pbb_detail_target, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($frm_fp_pbb_detail_target->RowType == UP_ROWTYPE_ADD)
			$this->RowAction = "insert";
		else
			$this->RowAction = "";
		if (is_numeric($this->RowIndex)) {
			$objForm->Index = $this->RowIndex;
			if ($objForm->HasValue("k_action"))
				$this->RowAction = strval($objForm->GetValue("k_action"));
			if ($this->RowAction <> "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_action\" id=\"k" . $this->RowIndex . "_action\" value=\"" . $this->RowAction . "\">";
			if ($objForm->HasValue("k_oldkey"))
				$this->RowOldKey = strval($objForm->GetValue("k_oldkey"));
			if ($this->RowOldKey <> "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_oldkey\" id=\"k" . $this->RowIndex . "_oldkey\" value = \"" . up_HtmlEncode($this->RowOldKey) . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $objForm->GetValue("k_key");
				$this->SetupKeyValues($rowkey);
			}
		}

		// "delete"
		if ($frm_fp_pbb_detail_target->AllowAddDeleteRow) {
			if ($frm_fp_pbb_detail_target->CurrentMode == "add" || $frm_fp_pbb_detail_target->CurrentMode == "copy" || $frm_fp_pbb_detail_target->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (!$Security->CanDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, frm_fp_pbb_detail_target_grid, " . $this->RowIndex . ");\">" . $Language->Phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($frm_fp_pbb_detail_target->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . $frm_fp_pbb_detail_target->pbb_id->CurrentValue . "\">";
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	function SetRecordKey(&$key, $rs) {
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs->fields('pbb_id');
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_fp_pbb_detail_target;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_fp_pbb_detail_target;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_fp_pbb_detail_target->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_fp_pbb_detail_target->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_fp_pbb_detail_target->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_fp_pbb_detail_target->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_fp_pbb_detail_target->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_fp_pbb_detail_target->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_fp_pbb_detail_target;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_fp_pbb_detail_target;
		$frm_fp_pbb_detail_target->applicable->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->applicable->OldValue = $frm_fp_pbb_detail_target->applicable->CurrentValue;
		$frm_fp_pbb_detail_target->cu_unit_name->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->cu_unit_name->OldValue = $frm_fp_pbb_detail_target->cu_unit_name->CurrentValue;
		$frm_fp_pbb_detail_target->mfo_name->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->mfo_name->OldValue = $frm_fp_pbb_detail_target->mfo_name->CurrentValue;
		$frm_fp_pbb_detail_target->target->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->target->OldValue = $frm_fp_pbb_detail_target->target->CurrentValue;
		$frm_fp_pbb_detail_target->t_numerator->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->t_numerator->OldValue = $frm_fp_pbb_detail_target->t_numerator->CurrentValue;
		$frm_fp_pbb_detail_target->t_denominator->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->t_denominator->OldValue = $frm_fp_pbb_detail_target->t_denominator->CurrentValue;
		$frm_fp_pbb_detail_target->t_remarks->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->t_remarks->OldValue = $frm_fp_pbb_detail_target->t_remarks->CurrentValue;
		$frm_fp_pbb_detail_target->t_cutOffDate_remarks->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->t_cutOffDate_remarks->OldValue = $frm_fp_pbb_detail_target->t_cutOffDate_remarks->CurrentValue;
		$frm_fp_pbb_detail_target->accomplishment->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->accomplishment->OldValue = $frm_fp_pbb_detail_target->accomplishment->CurrentValue;
		$frm_fp_pbb_detail_target->a_numerator->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->a_numerator->OldValue = $frm_fp_pbb_detail_target->a_numerator->CurrentValue;
		$frm_fp_pbb_detail_target->a_denominator->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->a_denominator->OldValue = $frm_fp_pbb_detail_target->a_denominator->CurrentValue;
		$frm_fp_pbb_detail_target->a_supporting_docs->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->a_supporting_docs->OldValue = $frm_fp_pbb_detail_target->a_supporting_docs->CurrentValue;
		$frm_fp_pbb_detail_target->a_remarks->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->a_remarks->OldValue = $frm_fp_pbb_detail_target->a_remarks->CurrentValue;
		$frm_fp_pbb_detail_target->a_cutOffDate_remarks->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->a_cutOffDate_remarks->OldValue = $frm_fp_pbb_detail_target->a_cutOffDate_remarks->CurrentValue;
		$frm_fp_pbb_detail_target->a_rating_above_90->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->a_rating_above_90->OldValue = $frm_fp_pbb_detail_target->a_rating_above_90->CurrentValue;
		$frm_fp_pbb_detail_target->a_rating_below_90->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->a_rating_below_90->OldValue = $frm_fp_pbb_detail_target->a_rating_below_90->CurrentValue;
		$frm_fp_pbb_detail_target->a_supporting_docs_comparison->CurrentValue = NULL;
		$frm_fp_pbb_detail_target->a_supporting_docs_comparison->OldValue = $frm_fp_pbb_detail_target->a_supporting_docs_comparison->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_fp_pbb_detail_target;
		if (!$frm_fp_pbb_detail_target->applicable->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->applicable->setFormValue($objForm->GetValue("x_applicable"));
		}
		$frm_fp_pbb_detail_target->applicable->setOldValue($objForm->GetValue("o_applicable"));
		if (!$frm_fp_pbb_detail_target->cu_unit_name->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->cu_unit_name->setFormValue($objForm->GetValue("x_cu_unit_name"));
		}
		$frm_fp_pbb_detail_target->cu_unit_name->setOldValue($objForm->GetValue("o_cu_unit_name"));
		if (!$frm_fp_pbb_detail_target->mfo_name->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->mfo_name->setFormValue($objForm->GetValue("x_mfo_name"));
		}
		$frm_fp_pbb_detail_target->mfo_name->setOldValue($objForm->GetValue("o_mfo_name"));
		if (!$frm_fp_pbb_detail_target->target->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->target->setFormValue($objForm->GetValue("x_target"));
		}
		$frm_fp_pbb_detail_target->target->setOldValue($objForm->GetValue("o_target"));
		if (!$frm_fp_pbb_detail_target->t_numerator->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->t_numerator->setFormValue($objForm->GetValue("x_t_numerator"));
		}
		$frm_fp_pbb_detail_target->t_numerator->setOldValue($objForm->GetValue("o_t_numerator"));
		if (!$frm_fp_pbb_detail_target->t_denominator->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->t_denominator->setFormValue($objForm->GetValue("x_t_denominator"));
		}
		$frm_fp_pbb_detail_target->t_denominator->setOldValue($objForm->GetValue("o_t_denominator"));
		if (!$frm_fp_pbb_detail_target->t_remarks->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->t_remarks->setFormValue($objForm->GetValue("x_t_remarks"));
		}
		$frm_fp_pbb_detail_target->t_remarks->setOldValue($objForm->GetValue("o_t_remarks"));
		if (!$frm_fp_pbb_detail_target->t_cutOffDate_remarks->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->setFormValue($objForm->GetValue("x_t_cutOffDate_remarks"));
		}
		$frm_fp_pbb_detail_target->t_cutOffDate_remarks->setOldValue($objForm->GetValue("o_t_cutOffDate_remarks"));
		if (!$frm_fp_pbb_detail_target->accomplishment->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->accomplishment->setFormValue($objForm->GetValue("x_accomplishment"));
		}
		$frm_fp_pbb_detail_target->accomplishment->setOldValue($objForm->GetValue("o_accomplishment"));
		if (!$frm_fp_pbb_detail_target->a_numerator->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->a_numerator->setFormValue($objForm->GetValue("x_a_numerator"));
		}
		$frm_fp_pbb_detail_target->a_numerator->setOldValue($objForm->GetValue("o_a_numerator"));
		if (!$frm_fp_pbb_detail_target->a_denominator->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->a_denominator->setFormValue($objForm->GetValue("x_a_denominator"));
		}
		$frm_fp_pbb_detail_target->a_denominator->setOldValue($objForm->GetValue("o_a_denominator"));
		if (!$frm_fp_pbb_detail_target->a_supporting_docs->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->a_supporting_docs->setFormValue($objForm->GetValue("x_a_supporting_docs"));
		}
		$frm_fp_pbb_detail_target->a_supporting_docs->setOldValue($objForm->GetValue("o_a_supporting_docs"));
		if (!$frm_fp_pbb_detail_target->a_remarks->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->a_remarks->setFormValue($objForm->GetValue("x_a_remarks"));
		}
		$frm_fp_pbb_detail_target->a_remarks->setOldValue($objForm->GetValue("o_a_remarks"));
		if (!$frm_fp_pbb_detail_target->a_cutOffDate_remarks->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->setFormValue($objForm->GetValue("x_a_cutOffDate_remarks"));
		}
		$frm_fp_pbb_detail_target->a_cutOffDate_remarks->setOldValue($objForm->GetValue("o_a_cutOffDate_remarks"));
		if (!$frm_fp_pbb_detail_target->a_rating_above_90->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->a_rating_above_90->setFormValue($objForm->GetValue("x_a_rating_above_90"));
		}
		$frm_fp_pbb_detail_target->a_rating_above_90->setOldValue($objForm->GetValue("o_a_rating_above_90"));
		if (!$frm_fp_pbb_detail_target->a_rating_below_90->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->a_rating_below_90->setFormValue($objForm->GetValue("x_a_rating_below_90"));
		}
		$frm_fp_pbb_detail_target->a_rating_below_90->setOldValue($objForm->GetValue("o_a_rating_below_90"));
		if (!$frm_fp_pbb_detail_target->a_supporting_docs_comparison->FldIsDetailKey) {
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->setFormValue($objForm->GetValue("x_a_supporting_docs_comparison"));
		}
		$frm_fp_pbb_detail_target->a_supporting_docs_comparison->setOldValue($objForm->GetValue("o_a_supporting_docs_comparison"));
		if (!$frm_fp_pbb_detail_target->pbb_id->FldIsDetailKey && $frm_fp_pbb_detail_target->CurrentAction <> "gridadd" && $frm_fp_pbb_detail_target->CurrentAction <> "add")
			$frm_fp_pbb_detail_target->pbb_id->setFormValue($objForm->GetValue("x_pbb_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_fp_pbb_detail_target;
		if ($frm_fp_pbb_detail_target->CurrentAction <> "gridadd" && $frm_fp_pbb_detail_target->CurrentAction <> "add")
			$frm_fp_pbb_detail_target->pbb_id->CurrentValue = $frm_fp_pbb_detail_target->pbb_id->FormValue;
		$frm_fp_pbb_detail_target->applicable->CurrentValue = $frm_fp_pbb_detail_target->applicable->FormValue;
		$frm_fp_pbb_detail_target->cu_unit_name->CurrentValue = $frm_fp_pbb_detail_target->cu_unit_name->FormValue;
		$frm_fp_pbb_detail_target->mfo_name->CurrentValue = $frm_fp_pbb_detail_target->mfo_name->FormValue;
		$frm_fp_pbb_detail_target->target->CurrentValue = $frm_fp_pbb_detail_target->target->FormValue;
		$frm_fp_pbb_detail_target->t_numerator->CurrentValue = $frm_fp_pbb_detail_target->t_numerator->FormValue;
		$frm_fp_pbb_detail_target->t_denominator->CurrentValue = $frm_fp_pbb_detail_target->t_denominator->FormValue;
		$frm_fp_pbb_detail_target->t_remarks->CurrentValue = $frm_fp_pbb_detail_target->t_remarks->FormValue;
		$frm_fp_pbb_detail_target->t_cutOffDate_remarks->CurrentValue = $frm_fp_pbb_detail_target->t_cutOffDate_remarks->FormValue;
		$frm_fp_pbb_detail_target->accomplishment->CurrentValue = $frm_fp_pbb_detail_target->accomplishment->FormValue;
		$frm_fp_pbb_detail_target->a_numerator->CurrentValue = $frm_fp_pbb_detail_target->a_numerator->FormValue;
		$frm_fp_pbb_detail_target->a_denominator->CurrentValue = $frm_fp_pbb_detail_target->a_denominator->FormValue;
		$frm_fp_pbb_detail_target->a_supporting_docs->CurrentValue = $frm_fp_pbb_detail_target->a_supporting_docs->FormValue;
		$frm_fp_pbb_detail_target->a_remarks->CurrentValue = $frm_fp_pbb_detail_target->a_remarks->FormValue;
		$frm_fp_pbb_detail_target->a_cutOffDate_remarks->CurrentValue = $frm_fp_pbb_detail_target->a_cutOffDate_remarks->FormValue;
		$frm_fp_pbb_detail_target->a_rating_above_90->CurrentValue = $frm_fp_pbb_detail_target->a_rating_above_90->FormValue;
		$frm_fp_pbb_detail_target->a_rating_below_90->CurrentValue = $frm_fp_pbb_detail_target->a_rating_below_90->FormValue;
		$frm_fp_pbb_detail_target->a_supporting_docs_comparison->CurrentValue = $frm_fp_pbb_detail_target->a_supporting_docs_comparison->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_fp_pbb_detail_target;

		// Call Recordset Selecting event
		$frm_fp_pbb_detail_target->Recordset_Selecting($frm_fp_pbb_detail_target->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_fp_pbb_detail_target->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_fp_pbb_detail_target->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_pbb_detail_target;
		$sFilter = $frm_fp_pbb_detail_target->KeyFilter();

		// Call Row Selecting event
		$frm_fp_pbb_detail_target->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_pbb_detail_target->CurrentFilter = $sFilter;
		$sSql = $frm_fp_pbb_detail_target->SQL();
		$res = FALSE;
		$rs = up_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $frm_fp_pbb_detail_target;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_pbb_detail_target->Row_Selected($row);
		$frm_fp_pbb_detail_target->pbb_id->setDbValue($rs->fields('pbb_id'));
		$frm_fp_pbb_detail_target->applicable->setDbValue($rs->fields('applicable'));
		$frm_fp_pbb_detail_target->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_pbb_detail_target->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_fp_pbb_detail_target->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_fp_pbb_detail_target->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_fp_pbb_detail_target->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_pbb_detail_target->mfo_id->setDbValue($rs->fields('mfo_id'));
		$frm_fp_pbb_detail_target->mfo_sequence->setDbValue($rs->fields('mfo_sequence'));
		$frm_fp_pbb_detail_target->mfo->setDbValue($rs->fields('mfo'));
		$frm_fp_pbb_detail_target->pi_no->setDbValue($rs->fields('pi_no'));
		$frm_fp_pbb_detail_target->pi_sub->setDbValue($rs->fields('pi_sub'));
		$frm_fp_pbb_detail_target->mfo_name->setDbValue($rs->fields('mfo_name'));
		$frm_fp_pbb_detail_target->pi_question->setDbValue($rs->fields('pi_question'));
		$frm_fp_pbb_detail_target->target->setDbValue($rs->fields('target'));
		$frm_fp_pbb_detail_target->t_numerator->setDbValue($rs->fields('t_numerator'));
		$frm_fp_pbb_detail_target->t_numerator_qtr1->setDbValue($rs->fields('t_numerator_qtr1'));
		$frm_fp_pbb_detail_target->t_numerator_qtr2->setDbValue($rs->fields('t_numerator_qtr2'));
		$frm_fp_pbb_detail_target->t_numerator_qtr3->setDbValue($rs->fields('t_numerator_qtr3'));
		$frm_fp_pbb_detail_target->t_numerator_qtr4->setDbValue($rs->fields('t_numerator_qtr4'));
		$frm_fp_pbb_detail_target->t_denominator->setDbValue($rs->fields('t_denominator'));
		$frm_fp_pbb_detail_target->t_denominator_qtr1->setDbValue($rs->fields('t_denominator_qtr1'));
		$frm_fp_pbb_detail_target->t_denominator_qtr2->setDbValue($rs->fields('t_denominator_qtr2'));
		$frm_fp_pbb_detail_target->t_denominator_qtr3->setDbValue($rs->fields('t_denominator_qtr3'));
		$frm_fp_pbb_detail_target->t_denominator_qtr4->setDbValue($rs->fields('t_denominator_qtr4'));
		$frm_fp_pbb_detail_target->t_remarks->setDbValue($rs->fields('t_remarks'));
		$frm_fp_pbb_detail_target->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$frm_fp_pbb_detail_target->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_fp_pbb_detail_target->accomplishment->setDbValue($rs->fields('accomplishment'));
		$frm_fp_pbb_detail_target->a_numerator->setDbValue($rs->fields('a_numerator'));
		$frm_fp_pbb_detail_target->a_numerator_qtr1->setDbValue($rs->fields('a_numerator_qtr1'));
		$frm_fp_pbb_detail_target->a_numerator_qtr2->setDbValue($rs->fields('a_numerator_qtr2'));
		$frm_fp_pbb_detail_target->a_numerator_qtr3->setDbValue($rs->fields('a_numerator_qtr3'));
		$frm_fp_pbb_detail_target->a_numerator_qtr4->setDbValue($rs->fields('a_numerator_qtr4'));
		$frm_fp_pbb_detail_target->a_denominator->setDbValue($rs->fields('a_denominator'));
		$frm_fp_pbb_detail_target->a_denominator_qtr1->setDbValue($rs->fields('a_denominator_qtr1'));
		$frm_fp_pbb_detail_target->a_denominator_qtr2->setDbValue($rs->fields('a_denominator_qtr2'));
		$frm_fp_pbb_detail_target->a_denominator_qtr3->setDbValue($rs->fields('a_denominator_qtr3'));
		$frm_fp_pbb_detail_target->a_denominator_qtr4->setDbValue($rs->fields('a_denominator_qtr4'));
		$frm_fp_pbb_detail_target->a_supporting_docs->setDbValue($rs->fields('a_supporting_docs'));
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr1->setDbValue($rs->fields('a_supporting_docs_qtr1'));
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr2->setDbValue($rs->fields('a_supporting_docs_qtr2'));
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr3->setDbValue($rs->fields('a_supporting_docs_qtr3'));
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr4->setDbValue($rs->fields('a_supporting_docs_qtr4'));
		$frm_fp_pbb_detail_target->a_remarks->setDbValue($rs->fields('a_remarks'));
		$frm_fp_pbb_detail_target->a_cutOffDate->setDbValue($rs->fields('a_cutOffDate'));
		$frm_fp_pbb_detail_target->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
		$frm_fp_pbb_detail_target->a_rating->setDbValue($rs->fields('a_rating'));
		$frm_fp_pbb_detail_target->a_rating_above_90->setDbValue($rs->fields('a_rating_above_90'));
		$frm_fp_pbb_detail_target->a_rating_below_90->setDbValue($rs->fields('a_rating_below_90'));
		$frm_fp_pbb_detail_target->a_supporting_docs_comparison->setDbValue($rs->fields('a_supporting_docs_comparison'));
		$frm_fp_pbb_detail_target->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_fp_pbb_detail_target->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$frm_fp_pbb_detail_target->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_fp_pbb_detail_target->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_fp_pbb_detail_target->form_a_1_sequence->setDbValue($rs->fields('form_a_1_sequence'));
		$frm_fp_pbb_detail_target->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_fp_pbb_detail_target->a_startDate->setDbValue($rs->fields('a_startDate'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_fp_pbb_detail_target;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$frm_fp_pbb_detail_target->pbb_id->CurrentValue = strval($arKeys[0]); // pbb_id
			else
				$bValidKey = FALSE;
		}

		// Load old recordset
		if ($bValidKey) {
			$frm_fp_pbb_detail_target->CurrentFilter = $frm_fp_pbb_detail_target->KeyFilter();
			$sSql = $frm_fp_pbb_detail_target->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_pbb_detail_target;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_fp_pbb_detail_target->Row_Rendering();

		// Common render codes for all row types
		// pbb_id

		$frm_fp_pbb_detail_target->pbb_id->CellCssStyle = "white-space: nowrap;";

		// applicable
		$frm_fp_pbb_detail_target->applicable->CellCssStyle = "white-space: nowrap;";

		// units_id
		$frm_fp_pbb_detail_target->units_id->CellCssStyle = "white-space: nowrap;";

		// cu_sequence
		$frm_fp_pbb_detail_target->cu_sequence->CellCssStyle = "white-space: nowrap;";

		// cu_short_name
		$frm_fp_pbb_detail_target->cu_short_name->CellCssStyle = "white-space: nowrap;";

		// cu_unit_name
		$frm_fp_pbb_detail_target->cu_unit_name->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$frm_fp_pbb_detail_target->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// mfo_id
		$frm_fp_pbb_detail_target->mfo_id->CellCssStyle = "white-space: nowrap;";

		// mfo_sequence
		$frm_fp_pbb_detail_target->mfo_sequence->CellCssStyle = "white-space: nowrap;";

		// mfo
		$frm_fp_pbb_detail_target->mfo->CellCssStyle = "white-space: nowrap;";

		// pi_no
		$frm_fp_pbb_detail_target->pi_no->CellCssStyle = "white-space: nowrap;";

		// pi_sub
		$frm_fp_pbb_detail_target->pi_sub->CellCssStyle = "white-space: nowrap;";

		// mfo_name
		$frm_fp_pbb_detail_target->mfo_name->CellCssStyle = "white-space: nowrap;";

		// pi_question
		$frm_fp_pbb_detail_target->pi_question->CellCssStyle = "width: 400px; white-space: nowrap;";

		// target
		$frm_fp_pbb_detail_target->target->CellCssStyle = "white-space: nowrap;";

		// t_numerator
		$frm_fp_pbb_detail_target->t_numerator->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr1
		$frm_fp_pbb_detail_target->t_numerator_qtr1->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr2
		$frm_fp_pbb_detail_target->t_numerator_qtr2->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr3
		$frm_fp_pbb_detail_target->t_numerator_qtr3->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr4
		$frm_fp_pbb_detail_target->t_numerator_qtr4->CellCssStyle = "white-space: nowrap;";

		// t_denominator
		$frm_fp_pbb_detail_target->t_denominator->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr1
		$frm_fp_pbb_detail_target->t_denominator_qtr1->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr2
		$frm_fp_pbb_detail_target->t_denominator_qtr2->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr3
		$frm_fp_pbb_detail_target->t_denominator_qtr3->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr4
		$frm_fp_pbb_detail_target->t_denominator_qtr4->CellCssStyle = "white-space: nowrap;";

		// t_remarks
		$frm_fp_pbb_detail_target->t_remarks->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate
		$frm_fp_pbb_detail_target->t_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_remarks
		$frm_fp_pbb_detail_target->t_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";

		// accomplishment
		$frm_fp_pbb_detail_target->accomplishment->CellCssStyle = "white-space: nowrap;";

		// a_numerator
		$frm_fp_pbb_detail_target->a_numerator->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr1
		$frm_fp_pbb_detail_target->a_numerator_qtr1->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr2
		$frm_fp_pbb_detail_target->a_numerator_qtr2->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr3
		$frm_fp_pbb_detail_target->a_numerator_qtr3->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr4
		$frm_fp_pbb_detail_target->a_numerator_qtr4->CellCssStyle = "white-space: nowrap;";

		// a_denominator
		$frm_fp_pbb_detail_target->a_denominator->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr1
		$frm_fp_pbb_detail_target->a_denominator_qtr1->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr2
		$frm_fp_pbb_detail_target->a_denominator_qtr2->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr3
		$frm_fp_pbb_detail_target->a_denominator_qtr3->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr4
		$frm_fp_pbb_detail_target->a_denominator_qtr4->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs
		$frm_fp_pbb_detail_target->a_supporting_docs->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr1
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr1->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr2
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr2->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr3
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr3->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr4
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr4->CellCssStyle = "white-space: nowrap;";

		// a_remarks
		$frm_fp_pbb_detail_target->a_remarks->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate
		$frm_fp_pbb_detail_target->a_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate_remarks
		$frm_fp_pbb_detail_target->a_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";

		// a_rating
		$frm_fp_pbb_detail_target->a_rating->CellCssStyle = "white-space: nowrap;";

		// a_rating_above_90
		$frm_fp_pbb_detail_target->a_rating_above_90->CellCssStyle = "white-space: nowrap;";

		// a_rating_below_90
		$frm_fp_pbb_detail_target->a_rating_below_90->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_comparison
		$frm_fp_pbb_detail_target->a_supporting_docs_comparison->CellCssStyle = "white-space: nowrap;";

		// cutOffDate_id
		$frm_fp_pbb_detail_target->cutOffDate_id->CellCssStyle = "white-space: nowrap;";

		// mfo_name_rep
		$frm_fp_pbb_detail_target->mfo_name_rep->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_fp
		$frm_fp_pbb_detail_target->t_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate_fp
		$frm_fp_pbb_detail_target->a_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// form_a_1_sequence
		$frm_fp_pbb_detail_target->form_a_1_sequence->CellCssStyle = "white-space: nowrap;";

		// t_startDate
		$frm_fp_pbb_detail_target->t_startDate->CellCssStyle = "white-space: nowrap;";

		// a_startDate
		$frm_fp_pbb_detail_target->a_startDate->CellCssStyle = "white-space: nowrap;";
		if ($frm_fp_pbb_detail_target->RowType == UP_ROWTYPE_VIEW) { // View row

			// applicable
			if (strval($frm_fp_pbb_detail_target->applicable->CurrentValue) <> "") {
				switch ($frm_fp_pbb_detail_target->applicable->CurrentValue) {
					case "Y":
						$frm_fp_pbb_detail_target->applicable->ViewValue = $frm_fp_pbb_detail_target->applicable->FldTagCaption(1) <> "" ? $frm_fp_pbb_detail_target->applicable->FldTagCaption(1) : $frm_fp_pbb_detail_target->applicable->CurrentValue;
						break;
					case "N":
						$frm_fp_pbb_detail_target->applicable->ViewValue = $frm_fp_pbb_detail_target->applicable->FldTagCaption(2) <> "" ? $frm_fp_pbb_detail_target->applicable->FldTagCaption(2) : $frm_fp_pbb_detail_target->applicable->CurrentValue;
						break;
					default:
						$frm_fp_pbb_detail_target->applicable->ViewValue = $frm_fp_pbb_detail_target->applicable->CurrentValue;
				}
			} else {
				$frm_fp_pbb_detail_target->applicable->ViewValue = NULL;
			}
			$frm_fp_pbb_detail_target->applicable->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_fp_pbb_detail_target->cu_unit_name->ViewValue = $frm_fp_pbb_detail_target->cu_unit_name->CurrentValue;
			$frm_fp_pbb_detail_target->cu_unit_name->ViewCustomAttributes = "";

			// mfo_name
			$frm_fp_pbb_detail_target->mfo_name->ViewValue = $frm_fp_pbb_detail_target->mfo_name->CurrentValue;
			$frm_fp_pbb_detail_target->mfo_name->ViewCustomAttributes = "";

			// target
			$frm_fp_pbb_detail_target->target->ViewValue = $frm_fp_pbb_detail_target->target->CurrentValue;
			$frm_fp_pbb_detail_target->target->CssStyle = "font-weight:bold;text-align:right;";
			$frm_fp_pbb_detail_target->target->ViewCustomAttributes = "";

			// t_numerator
			$frm_fp_pbb_detail_target->t_numerator->ViewValue = $frm_fp_pbb_detail_target->t_numerator->CurrentValue;
			$frm_fp_pbb_detail_target->t_numerator->CssStyle = "text-align:right;";
			$frm_fp_pbb_detail_target->t_numerator->ViewCustomAttributes = "";

			// t_denominator
			$frm_fp_pbb_detail_target->t_denominator->ViewValue = $frm_fp_pbb_detail_target->t_denominator->CurrentValue;
			$frm_fp_pbb_detail_target->t_denominator->CssStyle = "text-align:right;";
			$frm_fp_pbb_detail_target->t_denominator->ViewCustomAttributes = "";

			// t_remarks
			$frm_fp_pbb_detail_target->t_remarks->ViewValue = $frm_fp_pbb_detail_target->t_remarks->CurrentValue;
			$frm_fp_pbb_detail_target->t_remarks->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->ViewValue = $frm_fp_pbb_detail_target->t_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// accomplishment
			$frm_fp_pbb_detail_target->accomplishment->ViewValue = $frm_fp_pbb_detail_target->accomplishment->CurrentValue;
			$frm_fp_pbb_detail_target->accomplishment->CssStyle = "font-weight:bold;";
			$frm_fp_pbb_detail_target->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$frm_fp_pbb_detail_target->a_numerator->ViewValue = $frm_fp_pbb_detail_target->a_numerator->CurrentValue;
			$frm_fp_pbb_detail_target->a_numerator->ViewCustomAttributes = "";

			// a_denominator
			$frm_fp_pbb_detail_target->a_denominator->ViewValue = $frm_fp_pbb_detail_target->a_denominator->CurrentValue;
			$frm_fp_pbb_detail_target->a_denominator->ViewCustomAttributes = "";

			// a_supporting_docs
			$frm_fp_pbb_detail_target->a_supporting_docs->ViewValue = $frm_fp_pbb_detail_target->a_supporting_docs->CurrentValue;
			$frm_fp_pbb_detail_target->a_supporting_docs->CssStyle = "font-weight:bold;";
			$frm_fp_pbb_detail_target->a_supporting_docs->ViewCustomAttributes = "";

			// a_remarks
			$frm_fp_pbb_detail_target->a_remarks->ViewValue = $frm_fp_pbb_detail_target->a_remarks->CurrentValue;
			$frm_fp_pbb_detail_target->a_remarks->ViewCustomAttributes = "";

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->ViewValue = $frm_fp_pbb_detail_target->a_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// a_rating_above_90
			$frm_fp_pbb_detail_target->a_rating_above_90->ViewValue = $frm_fp_pbb_detail_target->a_rating_above_90->CurrentValue;
			$frm_fp_pbb_detail_target->a_rating_above_90->ViewCustomAttributes = "";

			// a_rating_below_90
			$frm_fp_pbb_detail_target->a_rating_below_90->ViewValue = $frm_fp_pbb_detail_target->a_rating_below_90->CurrentValue;
			$frm_fp_pbb_detail_target->a_rating_below_90->ViewCustomAttributes = "";

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->ViewValue = $frm_fp_pbb_detail_target->a_supporting_docs_comparison->CurrentValue;
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->ViewCustomAttributes = "";

			// applicable
			$frm_fp_pbb_detail_target->applicable->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->applicable->HrefValue = "";
			$frm_fp_pbb_detail_target->applicable->TooltipValue = "";

			// cu_unit_name
			$frm_fp_pbb_detail_target->cu_unit_name->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->cu_unit_name->HrefValue = "";
			$frm_fp_pbb_detail_target->cu_unit_name->TooltipValue = "";

			// mfo_name
			$frm_fp_pbb_detail_target->mfo_name->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->mfo_name->HrefValue = "";
			$frm_fp_pbb_detail_target->mfo_name->TooltipValue = "";

			// target
			$frm_fp_pbb_detail_target->target->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->target->HrefValue = "";
			$frm_fp_pbb_detail_target->target->TooltipValue = "";

			// t_numerator
			$frm_fp_pbb_detail_target->t_numerator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_numerator->HrefValue = "";
			$frm_fp_pbb_detail_target->t_numerator->TooltipValue = "";

			// t_denominator
			$frm_fp_pbb_detail_target->t_denominator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_denominator->HrefValue = "";
			$frm_fp_pbb_detail_target->t_denominator->TooltipValue = "";

			// t_remarks
			$frm_fp_pbb_detail_target->t_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_remarks->HrefValue = "";
			$frm_fp_pbb_detail_target->t_remarks->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->HrefValue = "";
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->TooltipValue = "";

			// accomplishment
			$frm_fp_pbb_detail_target->accomplishment->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->accomplishment->HrefValue = "";
			$frm_fp_pbb_detail_target->accomplishment->TooltipValue = "";

			// a_numerator
			$frm_fp_pbb_detail_target->a_numerator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_numerator->HrefValue = "";
			$frm_fp_pbb_detail_target->a_numerator->TooltipValue = "";

			// a_denominator
			$frm_fp_pbb_detail_target->a_denominator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_denominator->HrefValue = "";
			$frm_fp_pbb_detail_target->a_denominator->TooltipValue = "";

			// a_supporting_docs
			$frm_fp_pbb_detail_target->a_supporting_docs->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_supporting_docs->HrefValue = "";
			$frm_fp_pbb_detail_target->a_supporting_docs->TooltipValue = "";

			// a_remarks
			$frm_fp_pbb_detail_target->a_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_remarks->HrefValue = "";
			$frm_fp_pbb_detail_target->a_remarks->TooltipValue = "";

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->HrefValue = "";
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->TooltipValue = "";

			// a_rating_above_90
			$frm_fp_pbb_detail_target->a_rating_above_90->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_rating_above_90->HrefValue = "";
			$frm_fp_pbb_detail_target->a_rating_above_90->TooltipValue = "";

			// a_rating_below_90
			$frm_fp_pbb_detail_target->a_rating_below_90->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_rating_below_90->HrefValue = "";
			$frm_fp_pbb_detail_target->a_rating_below_90->TooltipValue = "";

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->HrefValue = "";
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->TooltipValue = "";
		} elseif ($frm_fp_pbb_detail_target->RowType == UP_ROWTYPE_ADD) { // Add row

			// applicable
			$frm_fp_pbb_detail_target->applicable->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_fp_pbb_detail_target->applicable->FldTagCaption(1) <> "" ? $frm_fp_pbb_detail_target->applicable->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_fp_pbb_detail_target->applicable->FldTagCaption(2) <> "" ? $frm_fp_pbb_detail_target->applicable->FldTagCaption(2) : "N");
			$frm_fp_pbb_detail_target->applicable->EditValue = $arwrk;

			// cu_unit_name
			$frm_fp_pbb_detail_target->cu_unit_name->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->cu_unit_name->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->cu_unit_name->CurrentValue);

			// mfo_name
			$frm_fp_pbb_detail_target->mfo_name->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->mfo_name->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->mfo_name->CurrentValue);

			// target
			$frm_fp_pbb_detail_target->target->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->target->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->target->CurrentValue);

			// t_numerator
			$frm_fp_pbb_detail_target->t_numerator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_numerator->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->t_numerator->CurrentValue);

			// t_denominator
			$frm_fp_pbb_detail_target->t_denominator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_denominator->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->t_denominator->CurrentValue);

			// t_remarks
			$frm_fp_pbb_detail_target->t_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_remarks->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->t_remarks->CurrentValue);

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->t_cutOffDate_remarks->CurrentValue);

			// accomplishment
			$frm_fp_pbb_detail_target->accomplishment->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->accomplishment->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->accomplishment->CurrentValue);

			// a_numerator
			$frm_fp_pbb_detail_target->a_numerator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_numerator->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->a_numerator->CurrentValue);

			// a_denominator
			$frm_fp_pbb_detail_target->a_denominator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_denominator->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->a_denominator->CurrentValue);

			// a_supporting_docs
			$frm_fp_pbb_detail_target->a_supporting_docs->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_supporting_docs->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->a_supporting_docs->CurrentValue);

			// a_remarks
			$frm_fp_pbb_detail_target->a_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_remarks->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->a_remarks->CurrentValue);

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->a_cutOffDate_remarks->CurrentValue);

			// a_rating_above_90
			$frm_fp_pbb_detail_target->a_rating_above_90->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_rating_above_90->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->a_rating_above_90->CurrentValue);

			// a_rating_below_90
			$frm_fp_pbb_detail_target->a_rating_below_90->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_rating_below_90->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->a_rating_below_90->CurrentValue);

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->a_supporting_docs_comparison->CurrentValue);

			// Edit refer script
			// applicable

			$frm_fp_pbb_detail_target->applicable->HrefValue = "";

			// cu_unit_name
			$frm_fp_pbb_detail_target->cu_unit_name->HrefValue = "";

			// mfo_name
			$frm_fp_pbb_detail_target->mfo_name->HrefValue = "";

			// target
			$frm_fp_pbb_detail_target->target->HrefValue = "";

			// t_numerator
			$frm_fp_pbb_detail_target->t_numerator->HrefValue = "";

			// t_denominator
			$frm_fp_pbb_detail_target->t_denominator->HrefValue = "";

			// t_remarks
			$frm_fp_pbb_detail_target->t_remarks->HrefValue = "";

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->HrefValue = "";

			// accomplishment
			$frm_fp_pbb_detail_target->accomplishment->HrefValue = "";

			// a_numerator
			$frm_fp_pbb_detail_target->a_numerator->HrefValue = "";

			// a_denominator
			$frm_fp_pbb_detail_target->a_denominator->HrefValue = "";

			// a_supporting_docs
			$frm_fp_pbb_detail_target->a_supporting_docs->HrefValue = "";

			// a_remarks
			$frm_fp_pbb_detail_target->a_remarks->HrefValue = "";

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->HrefValue = "";

			// a_rating_above_90
			$frm_fp_pbb_detail_target->a_rating_above_90->HrefValue = "";

			// a_rating_below_90
			$frm_fp_pbb_detail_target->a_rating_below_90->HrefValue = "";

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->HrefValue = "";
		} elseif ($frm_fp_pbb_detail_target->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// applicable
			$frm_fp_pbb_detail_target->applicable->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_fp_pbb_detail_target->applicable->FldTagCaption(1) <> "" ? $frm_fp_pbb_detail_target->applicable->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_fp_pbb_detail_target->applicable->FldTagCaption(2) <> "" ? $frm_fp_pbb_detail_target->applicable->FldTagCaption(2) : "N");
			$frm_fp_pbb_detail_target->applicable->EditValue = $arwrk;

			// cu_unit_name
			$frm_fp_pbb_detail_target->cu_unit_name->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->cu_unit_name->EditValue = $frm_fp_pbb_detail_target->cu_unit_name->CurrentValue;
			$frm_fp_pbb_detail_target->cu_unit_name->ViewCustomAttributes = "";

			// mfo_name
			$frm_fp_pbb_detail_target->mfo_name->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->mfo_name->EditValue = $frm_fp_pbb_detail_target->mfo_name->CurrentValue;
			$frm_fp_pbb_detail_target->mfo_name->ViewCustomAttributes = "";

			// target
			$frm_fp_pbb_detail_target->target->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->target->EditValue = $frm_fp_pbb_detail_target->target->CurrentValue;
			$frm_fp_pbb_detail_target->target->CssStyle = "font-weight:bold;text-align:right;";
			$frm_fp_pbb_detail_target->target->ViewCustomAttributes = "";

			// t_numerator
			$frm_fp_pbb_detail_target->t_numerator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_numerator->EditValue = $frm_fp_pbb_detail_target->t_numerator->CurrentValue;
			$frm_fp_pbb_detail_target->t_numerator->CssStyle = "text-align:right;";
			$frm_fp_pbb_detail_target->t_numerator->ViewCustomAttributes = "";

			// t_denominator
			$frm_fp_pbb_detail_target->t_denominator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_denominator->EditValue = $frm_fp_pbb_detail_target->t_denominator->CurrentValue;
			$frm_fp_pbb_detail_target->t_denominator->CssStyle = "text-align:right;";
			$frm_fp_pbb_detail_target->t_denominator->ViewCustomAttributes = "";

			// t_remarks
			$frm_fp_pbb_detail_target->t_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_remarks->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->t_remarks->CurrentValue);

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->EditValue = $frm_fp_pbb_detail_target->t_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// accomplishment
			$frm_fp_pbb_detail_target->accomplishment->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->accomplishment->EditValue = $frm_fp_pbb_detail_target->accomplishment->CurrentValue;
			$frm_fp_pbb_detail_target->accomplishment->CssStyle = "font-weight:bold;";
			$frm_fp_pbb_detail_target->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$frm_fp_pbb_detail_target->a_numerator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_numerator->EditValue = $frm_fp_pbb_detail_target->a_numerator->CurrentValue;
			$frm_fp_pbb_detail_target->a_numerator->ViewCustomAttributes = "";

			// a_denominator
			$frm_fp_pbb_detail_target->a_denominator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_denominator->EditValue = $frm_fp_pbb_detail_target->a_denominator->CurrentValue;
			$frm_fp_pbb_detail_target->a_denominator->ViewCustomAttributes = "";

			// a_supporting_docs
			$frm_fp_pbb_detail_target->a_supporting_docs->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_supporting_docs->EditValue = $frm_fp_pbb_detail_target->a_supporting_docs->CurrentValue;
			$frm_fp_pbb_detail_target->a_supporting_docs->CssStyle = "font-weight:bold;";
			$frm_fp_pbb_detail_target->a_supporting_docs->ViewCustomAttributes = "";

			// a_remarks
			$frm_fp_pbb_detail_target->a_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_remarks->EditValue = $frm_fp_pbb_detail_target->a_remarks->CurrentValue;
			$frm_fp_pbb_detail_target->a_remarks->ViewCustomAttributes = "";

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->EditValue = $frm_fp_pbb_detail_target->a_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// a_rating_above_90
			$frm_fp_pbb_detail_target->a_rating_above_90->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_rating_above_90->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->a_rating_above_90->CurrentValue);

			// a_rating_below_90
			$frm_fp_pbb_detail_target->a_rating_below_90->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_rating_below_90->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->a_rating_below_90->CurrentValue);

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->EditCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->EditValue = up_HtmlEncode($frm_fp_pbb_detail_target->a_supporting_docs_comparison->CurrentValue);

			// Edit refer script
			// applicable

			$frm_fp_pbb_detail_target->applicable->HrefValue = "";

			// cu_unit_name
			$frm_fp_pbb_detail_target->cu_unit_name->HrefValue = "";

			// mfo_name
			$frm_fp_pbb_detail_target->mfo_name->HrefValue = "";

			// target
			$frm_fp_pbb_detail_target->target->HrefValue = "";

			// t_numerator
			$frm_fp_pbb_detail_target->t_numerator->HrefValue = "";

			// t_denominator
			$frm_fp_pbb_detail_target->t_denominator->HrefValue = "";

			// t_remarks
			$frm_fp_pbb_detail_target->t_remarks->HrefValue = "";

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->HrefValue = "";

			// accomplishment
			$frm_fp_pbb_detail_target->accomplishment->HrefValue = "";

			// a_numerator
			$frm_fp_pbb_detail_target->a_numerator->HrefValue = "";

			// a_denominator
			$frm_fp_pbb_detail_target->a_denominator->HrefValue = "";

			// a_supporting_docs
			$frm_fp_pbb_detail_target->a_supporting_docs->HrefValue = "";

			// a_remarks
			$frm_fp_pbb_detail_target->a_remarks->HrefValue = "";

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->HrefValue = "";

			// a_rating_above_90
			$frm_fp_pbb_detail_target->a_rating_above_90->HrefValue = "";

			// a_rating_below_90
			$frm_fp_pbb_detail_target->a_rating_below_90->HrefValue = "";

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->HrefValue = "";
		}
		if ($frm_fp_pbb_detail_target->RowType == UP_ROWTYPE_ADD ||
			$frm_fp_pbb_detail_target->RowType == UP_ROWTYPE_EDIT ||
			$frm_fp_pbb_detail_target->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_fp_pbb_detail_target->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_fp_pbb_detail_target->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_pbb_detail_target->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_fp_pbb_detail_target;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckNumber($frm_fp_pbb_detail_target->a_rating_above_90->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_target->a_rating_above_90->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_target->a_rating_below_90->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_target->a_rating_below_90->FldErrMsg());
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			up_AddMessage($gsFormError, $sFormCustomError);
		}
		return $ValidateForm;
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $frm_fp_pbb_detail_target;
		$DeleteRows = TRUE;
		$sSql = $frm_fp_pbb_detail_target->SQL();
		$conn->raiseErrorFn = 'up_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
			$rs->Close();
			return FALSE;
		}
		if (!$Security->CanDelete()) {
			$this->setFailureMessage($Language->Phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $frm_fp_pbb_detail_target->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['pbb_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_fp_pbb_detail_target->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_fp_pbb_detail_target->CancelMessage <> "") {
				$this->setFailureMessage($frm_fp_pbb_detail_target->CancelMessage);
				$frm_fp_pbb_detail_target->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
		} else {
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$frm_fp_pbb_detail_target->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $frm_fp_pbb_detail_target;
		$sFilter = $frm_fp_pbb_detail_target->KeyFilter();
		$frm_fp_pbb_detail_target->CurrentFilter = $sFilter;
		$sSql = $frm_fp_pbb_detail_target->SQL();
		$conn->raiseErrorFn = 'up_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// applicable
			$frm_fp_pbb_detail_target->applicable->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->applicable->CurrentValue, NULL, $frm_fp_pbb_detail_target->applicable->ReadOnly);

			// t_remarks
			$frm_fp_pbb_detail_target->t_remarks->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->t_remarks->CurrentValue, NULL, $frm_fp_pbb_detail_target->t_remarks->ReadOnly);

			// a_rating_above_90
			$frm_fp_pbb_detail_target->a_rating_above_90->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->a_rating_above_90->CurrentValue, NULL, $frm_fp_pbb_detail_target->a_rating_above_90->ReadOnly);

			// a_rating_below_90
			$frm_fp_pbb_detail_target->a_rating_below_90->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->a_rating_below_90->CurrentValue, NULL, $frm_fp_pbb_detail_target->a_rating_below_90->ReadOnly);

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->a_supporting_docs_comparison->CurrentValue, NULL, $frm_fp_pbb_detail_target->a_supporting_docs_comparison->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_fp_pbb_detail_target->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_fp_pbb_detail_target->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_fp_pbb_detail_target->CancelMessage <> "") {
					$this->setFailureMessage($frm_fp_pbb_detail_target->CancelMessage);
					$frm_fp_pbb_detail_target->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_fp_pbb_detail_target->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $frm_fp_pbb_detail_target;

		// Check if valid key values for master user
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $frm_fp_pbb_detail_target->SqlMasterFilter_frm_fp_rep_ta_form_a_cu();
			if (strval($frm_fp_pbb_detail_target->mfo_sequence->CurrentValue) <> "" &&
				$frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_cu") {
				$sFilter = str_replace("@Sequence@", up_AdjustSql($frm_fp_pbb_detail_target->mfo_sequence->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if (strval($frm_fp_pbb_detail_target->focal_person_id->CurrentValue) <> "" &&
				$frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_cu") {
				$sFilter = str_replace("@focal_person_id@", up_AdjustSql($frm_fp_pbb_detail_target->focal_person_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if ($sFilter <> "") {
				$rsmaster = $GLOBALS["frm_fp_rep_ta_form_a_cu"]->LoadRs($sFilter);
				$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
				if (!$this->MasterRecordExists) {
					$sMasterUserIdMsg = str_replace("%c", CurrentUserID(), $Language->Phrase("UnAuthorizedMasterUserID"));
					$sMasterUserIdMsg = str_replace("%f", $sFilter, $sMasterUserIdMsg);
					$this->setFailureMessage($sMasterUserIdMsg);
					return FALSE;
				} else {
					$rsmaster->Close();
				}
			}
			$sFilter = $frm_fp_pbb_detail_target->SqlMasterFilter_frm_fp_rep_t_completion_status_unit_mfo();
			if (strval($frm_fp_pbb_detail_target->focal_person_id->CurrentValue) <> "" &&
				$frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_t_completion_status_unit_mfo") {
				$sFilter = str_replace("@focal_person_id@", up_AdjustSql($frm_fp_pbb_detail_target->focal_person_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if (strval($frm_fp_pbb_detail_target->units_id->CurrentValue) <> "" &&
				$frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_t_completion_status_unit_mfo") {
				$sFilter = str_replace("@units_id@", up_AdjustSql($frm_fp_pbb_detail_target->units_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if (strval($frm_fp_pbb_detail_target->mfo->CurrentValue) <> "" &&
				$frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_t_completion_status_unit_mfo") {
				$sFilter = str_replace("@mfo@", up_AdjustSql($frm_fp_pbb_detail_target->mfo->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if ($sFilter <> "") {
				$rsmaster = $GLOBALS["frm_fp_rep_t_completion_status_unit_mfo"]->LoadRs($sFilter);
				$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
				if (!$this->MasterRecordExists) {
					$sMasterUserIdMsg = str_replace("%c", CurrentUserID(), $Language->Phrase("UnAuthorizedMasterUserID"));
					$sMasterUserIdMsg = str_replace("%f", $sFilter, $sMasterUserIdMsg);
					$this->setFailureMessage($sMasterUserIdMsg);
					return FALSE;
				} else {
					$rsmaster->Close();
				}
			}
			$sFilter = $frm_fp_pbb_detail_target->SqlMasterFilter_frm_fp_rep_t_completion_status_unit_pi();
			if (strval($frm_fp_pbb_detail_target->units_id->CurrentValue) <> "" &&
				$frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_t_completion_status_unit_pi") {
				$sFilter = str_replace("@units_id@", up_AdjustSql($frm_fp_pbb_detail_target->units_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if (strval($frm_fp_pbb_detail_target->focal_person_id->CurrentValue) <> "" &&
				$frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_t_completion_status_unit_pi") {
				$sFilter = str_replace("@focal_person_id@", up_AdjustSql($frm_fp_pbb_detail_target->focal_person_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if ($sFilter <> "") {
				$rsmaster = $GLOBALS["frm_fp_rep_t_completion_status_unit_pi"]->LoadRs($sFilter);
				$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
				if (!$this->MasterRecordExists) {
					$sMasterUserIdMsg = str_replace("%c", CurrentUserID(), $Language->Phrase("UnAuthorizedMasterUserID"));
					$sMasterUserIdMsg = str_replace("%f", $sFilter, $sMasterUserIdMsg);
					$this->setFailureMessage($sMasterUserIdMsg);
					return FALSE;
				} else {
					$rsmaster->Close();
				}
			}
		}

		// Set up foreign key field value from Session
			if ($frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_cu") {
				$frm_fp_pbb_detail_target->mfo_sequence->CurrentValue = $frm_fp_pbb_detail_target->mfo_sequence->getSessionValue();
				$frm_fp_pbb_detail_target->focal_person_id->CurrentValue = $frm_fp_pbb_detail_target->focal_person_id->getSessionValue();
			}
			if ($frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_t_completion_status_unit_mfo") {
				$frm_fp_pbb_detail_target->focal_person_id->CurrentValue = $frm_fp_pbb_detail_target->focal_person_id->getSessionValue();
				$frm_fp_pbb_detail_target->units_id->CurrentValue = $frm_fp_pbb_detail_target->units_id->getSessionValue();
				$frm_fp_pbb_detail_target->mfo->CurrentValue = $frm_fp_pbb_detail_target->mfo->getSessionValue();
			}
			if ($frm_fp_pbb_detail_target->getCurrentMasterTable() == "frm_fp_rep_t_completion_status_unit_pi") {
				$frm_fp_pbb_detail_target->units_id->CurrentValue = $frm_fp_pbb_detail_target->units_id->getSessionValue();
				$frm_fp_pbb_detail_target->focal_person_id->CurrentValue = $frm_fp_pbb_detail_target->focal_person_id->getSessionValue();
			}
		$rsnew = array();

		// applicable
		$frm_fp_pbb_detail_target->applicable->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->applicable->CurrentValue, NULL, FALSE);

		// cu_unit_name
		$frm_fp_pbb_detail_target->cu_unit_name->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->cu_unit_name->CurrentValue, NULL, FALSE);

		// mfo_name
		$frm_fp_pbb_detail_target->mfo_name->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->mfo_name->CurrentValue, NULL, FALSE);

		// target
		$frm_fp_pbb_detail_target->target->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->target->CurrentValue, NULL, FALSE);

		// t_numerator
		$frm_fp_pbb_detail_target->t_numerator->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->t_numerator->CurrentValue, NULL, FALSE);

		// t_denominator
		$frm_fp_pbb_detail_target->t_denominator->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->t_denominator->CurrentValue, NULL, FALSE);

		// t_remarks
		$frm_fp_pbb_detail_target->t_remarks->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->t_remarks->CurrentValue, NULL, FALSE);

		// t_cutOffDate_remarks
		$frm_fp_pbb_detail_target->t_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->t_cutOffDate_remarks->CurrentValue, NULL, FALSE);

		// accomplishment
		$frm_fp_pbb_detail_target->accomplishment->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->accomplishment->CurrentValue, NULL, FALSE);

		// a_numerator
		$frm_fp_pbb_detail_target->a_numerator->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->a_numerator->CurrentValue, NULL, FALSE);

		// a_denominator
		$frm_fp_pbb_detail_target->a_denominator->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->a_denominator->CurrentValue, NULL, FALSE);

		// a_supporting_docs
		$frm_fp_pbb_detail_target->a_supporting_docs->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->a_supporting_docs->CurrentValue, NULL, FALSE);

		// a_remarks
		$frm_fp_pbb_detail_target->a_remarks->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->a_remarks->CurrentValue, NULL, FALSE);

		// a_cutOffDate_remarks
		$frm_fp_pbb_detail_target->a_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->a_cutOffDate_remarks->CurrentValue, NULL, FALSE);

		// a_rating_above_90
		$frm_fp_pbb_detail_target->a_rating_above_90->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->a_rating_above_90->CurrentValue, NULL, FALSE);

		// a_rating_below_90
		$frm_fp_pbb_detail_target->a_rating_below_90->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->a_rating_below_90->CurrentValue, NULL, FALSE);

		// a_supporting_docs_comparison
		$frm_fp_pbb_detail_target->a_supporting_docs_comparison->SetDbValueDef($rsnew, $frm_fp_pbb_detail_target->a_supporting_docs_comparison->CurrentValue, NULL, FALSE);

		// units_id
		if ($frm_fp_pbb_detail_target->units_id->getSessionValue() <> "") {
			$rsnew['units_id'] = $frm_fp_pbb_detail_target->units_id->getSessionValue();
		}

		// focal_person_id
		if ($frm_fp_pbb_detail_target->focal_person_id->getSessionValue() <> "") {
			$rsnew['focal_person_id'] = $frm_fp_pbb_detail_target->focal_person_id->getSessionValue();
		} elseif (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['focal_person_id'] = CurrentUserID();
		}

		// mfo_sequence
		if ($frm_fp_pbb_detail_target->mfo_sequence->getSessionValue() <> "") {
			$rsnew['mfo_sequence'] = $frm_fp_pbb_detail_target->mfo_sequence->getSessionValue();
		}

		// mfo
		if ($frm_fp_pbb_detail_target->mfo->getSessionValue() <> "") {
			$rsnew['mfo'] = $frm_fp_pbb_detail_target->mfo->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_fp_pbb_detail_target->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_fp_pbb_detail_target->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_fp_pbb_detail_target->CancelMessage <> "") {
				$this->setFailureMessage($frm_fp_pbb_detail_target->CancelMessage);
				$frm_fp_pbb_detail_target->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$frm_fp_pbb_detail_target->pbb_id->setDbValue($conn->Insert_ID());
			$rsnew['pbb_id'] = $frm_fp_pbb_detail_target->pbb_id->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$frm_fp_pbb_detail_target->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_fp_pbb_detail_target;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_fp_pbb_detail_target->focal_person_id->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_fp_pbb_detail_target;

		// Hide foreign keys
		$sMasterTblVar = $frm_fp_pbb_detail_target->getCurrentMasterTable();
		if ($sMasterTblVar == "frm_fp_rep_ta_form_a_cu") {
			$frm_fp_pbb_detail_target->mfo_sequence->Visible = FALSE;
			if ($GLOBALS["frm_fp_rep_ta_form_a_cu"]->EventCancelled) $frm_fp_pbb_detail_target->EventCancelled = TRUE;
			$frm_fp_pbb_detail_target->focal_person_id->Visible = FALSE;
			if ($GLOBALS["frm_fp_rep_ta_form_a_cu"]->EventCancelled) $frm_fp_pbb_detail_target->EventCancelled = TRUE;
		}
		if ($sMasterTblVar == "frm_fp_rep_t_completion_status_unit_mfo") {
			$frm_fp_pbb_detail_target->focal_person_id->Visible = FALSE;
			if ($GLOBALS["frm_fp_rep_t_completion_status_unit_mfo"]->EventCancelled) $frm_fp_pbb_detail_target->EventCancelled = TRUE;
			$frm_fp_pbb_detail_target->units_id->Visible = FALSE;
			if ($GLOBALS["frm_fp_rep_t_completion_status_unit_mfo"]->EventCancelled) $frm_fp_pbb_detail_target->EventCancelled = TRUE;
			$frm_fp_pbb_detail_target->mfo->Visible = FALSE;
			if ($GLOBALS["frm_fp_rep_t_completion_status_unit_mfo"]->EventCancelled) $frm_fp_pbb_detail_target->EventCancelled = TRUE;
		}
		if ($sMasterTblVar == "frm_fp_rep_t_completion_status_unit_pi") {
			$frm_fp_pbb_detail_target->units_id->Visible = FALSE;
			if ($GLOBALS["frm_fp_rep_t_completion_status_unit_pi"]->EventCancelled) $frm_fp_pbb_detail_target->EventCancelled = TRUE;
			$frm_fp_pbb_detail_target->focal_person_id->Visible = FALSE;
			if ($GLOBALS["frm_fp_rep_t_completion_status_unit_pi"]->EventCancelled) $frm_fp_pbb_detail_target->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $frm_fp_pbb_detail_target->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_fp_pbb_detail_target->getDetailFilter(); // Get detail filter
	}

	// Export PDF
	function ExportPDF($html) {
		global $gsExportFile;
		include_once "dompdf060b2/dompdf_config.inc.php";
		@ini_set("memory_limit", UP_PDF_MEMORY_LIMIT);
		set_time_limit(UP_PDF_TIME_LIMIT);
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->set_paper("", "");
		$dompdf->render();
		ob_end_clean();
		up_DeleteTmpImages();
		$dompdf->stream($gsExportFile . ".pdf", array("Attachment" => 1)); // 0 to open in browser, 1 to download

//		exit();
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'
	function Message_Showing(&$msg, $type) {

		// Example:
		//if ($type == 'success') $msg = "your success message";

	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt =& $this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example: 
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}
}
?>
