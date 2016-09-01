<?php include_once "tbl_usersinfo.php" ?>
<?php

//
// Page class
//
class cfrm_sam_pbb_detail_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'frm_sam_pbb_detail';

	// Page object name
	var $PageObjName = 'frm_sam_pbb_detail_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_pbb_detail;
		if ($frm_sam_pbb_detail->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_pbb_detail->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_pbb_detail;
		if ($frm_sam_pbb_detail->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_pbb_detail->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_pbb_detail->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_pbb_detail_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_pbb_detail)
		if (!isset($GLOBALS["frm_sam_pbb_detail"])) {
			$GLOBALS["frm_sam_pbb_detail"] = new cfrm_sam_pbb_detail();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_pbb_detail"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_pbb_detail', TRUE);

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
		global $frm_sam_pbb_detail;

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
			$this->Page_Terminate("frm_sam_pbb_detaillist.php");
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_sam_pbb_detail->GridAddRowCount = $gridaddcnt;

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
		global $frm_sam_pbb_detail;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_sam_pbb_detail;

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
			if ($frm_sam_pbb_detail->Export <> "" ||
				$frm_sam_pbb_detail->CurrentAction == "gridadd" ||
				$frm_sam_pbb_detail->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($frm_sam_pbb_detail->AllowAddDeleteRow) {
				if ($frm_sam_pbb_detail->CurrentAction == "gridadd" ||
					$frm_sam_pbb_detail->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($frm_sam_pbb_detail->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_sam_pbb_detail->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $frm_sam_pbb_detail->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_sam_pbb_detail->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_sam_pbb_detail->getMasterFilter() <> "" && $frm_sam_pbb_detail->getCurrentMasterTable() == "frm_sam_rep_ta_form_a_0_cu") {
			global $frm_sam_rep_ta_form_a_0_cu;
			$rsmaster = $frm_sam_rep_ta_form_a_0_cu->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_sam_pbb_detail->getReturnUrl()); // Return to caller
			} else {
				$frm_sam_rep_ta_form_a_0_cu->LoadListRowValues($rsmaster);
				$frm_sam_rep_ta_form_a_0_cu->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_sam_rep_ta_form_a_0_cu->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_sam_pbb_detail->setSessionWhere($sFilter);
		$frm_sam_pbb_detail->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $frm_sam_pbb_detail;
		$frm_sam_pbb_detail->LastAction = $frm_sam_pbb_detail->CurrentAction; // Save last action
		$frm_sam_pbb_detail->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $frm_sam_pbb_detail;
		$bGridUpdate = TRUE;

		// Get old recordset
		$frm_sam_pbb_detail->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $frm_sam_pbb_detail->SQL();
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
						$frm_sam_pbb_detail->CurrentFilter = $frm_sam_pbb_detail->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$frm_sam_pbb_detail->SendEmail = FALSE; // Do not send email on update success
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
			$frm_sam_pbb_detail->EventCancelled = TRUE; // Set event cancelled
			$frm_sam_pbb_detail->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $frm_sam_pbb_detail;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $frm_sam_pbb_detail->KeyFilter();
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
		global $frm_sam_pbb_detail;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 1) {
			$frm_sam_pbb_detail->pbb_id->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($frm_sam_pbb_detail->pbb_id->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $frm_sam_pbb_detail;
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
				$frm_sam_pbb_detail->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {
					if ($sKey <> "") $sKey .= UP_COMPOSITE_KEY_SEPARATOR;
					$sKey .= $frm_sam_pbb_detail->pbb_id->CurrentValue;

					// Add filter for this record
					$sFilter = $frm_sam_pbb_detail->KeyFilter();
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
			$frm_sam_pbb_detail->CurrentFilter = $sWrkFilter;
			$sSql = $frm_sam_pbb_detail->SQL();
			if ($rs = $conn->Execute($sSql)) {
				$rsnew = $rs->GetRows();
				$rs->Close();
			}
			$this->ClearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "") {
				$this->setFailureMessage($Language->Phrase("InsertFailed")); // Set insert failed message
			}
			$frm_sam_pbb_detail->EventCancelled = TRUE; // Set event cancelled
			$frm_sam_pbb_detail->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $frm_sam_pbb_detail, $objForm;
		if ($objForm->HasValue("x_applicable") && $objForm->HasValue("o_applicable") && $frm_sam_pbb_detail->applicable->CurrentValue <> $frm_sam_pbb_detail->applicable->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_cu_unit_name") && $objForm->HasValue("o_cu_unit_name") && $frm_sam_pbb_detail->cu_unit_name->CurrentValue <> $frm_sam_pbb_detail->cu_unit_name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_mfo_name") && $objForm->HasValue("o_mfo_name") && $frm_sam_pbb_detail->mfo_name->CurrentValue <> $frm_sam_pbb_detail->mfo_name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_target") && $objForm->HasValue("o_target") && $frm_sam_pbb_detail->target->CurrentValue <> $frm_sam_pbb_detail->target->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_t_numerator") && $objForm->HasValue("o_t_numerator") && $frm_sam_pbb_detail->t_numerator->CurrentValue <> $frm_sam_pbb_detail->t_numerator->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_t_denominator") && $objForm->HasValue("o_t_denominator") && $frm_sam_pbb_detail->t_denominator->CurrentValue <> $frm_sam_pbb_detail->t_denominator->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_t_remarks") && $objForm->HasValue("o_t_remarks") && $frm_sam_pbb_detail->t_remarks->CurrentValue <> $frm_sam_pbb_detail->t_remarks->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_t_cutOffDate_remarks") && $objForm->HasValue("o_t_cutOffDate_remarks") && $frm_sam_pbb_detail->t_cutOffDate_remarks->CurrentValue <> $frm_sam_pbb_detail->t_cutOffDate_remarks->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_accomplishment") && $objForm->HasValue("o_accomplishment") && $frm_sam_pbb_detail->accomplishment->CurrentValue <> $frm_sam_pbb_detail->accomplishment->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_numerator") && $objForm->HasValue("o_a_numerator") && $frm_sam_pbb_detail->a_numerator->CurrentValue <> $frm_sam_pbb_detail->a_numerator->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_denominator") && $objForm->HasValue("o_a_denominator") && $frm_sam_pbb_detail->a_denominator->CurrentValue <> $frm_sam_pbb_detail->a_denominator->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_supporting_docs") && $objForm->HasValue("o_a_supporting_docs") && $frm_sam_pbb_detail->a_supporting_docs->CurrentValue <> $frm_sam_pbb_detail->a_supporting_docs->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_remarks") && $objForm->HasValue("o_a_remarks") && $frm_sam_pbb_detail->a_remarks->CurrentValue <> $frm_sam_pbb_detail->a_remarks->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_cutOffDate_remarks") && $objForm->HasValue("o_a_cutOffDate_remarks") && $frm_sam_pbb_detail->a_cutOffDate_remarks->CurrentValue <> $frm_sam_pbb_detail->a_cutOffDate_remarks->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_rating_above_90") && $objForm->HasValue("o_a_rating_above_90") && $frm_sam_pbb_detail->a_rating_above_90->CurrentValue <> $frm_sam_pbb_detail->a_rating_above_90->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_rating_below_90") && $objForm->HasValue("o_a_rating_below_90") && $frm_sam_pbb_detail->a_rating_below_90->CurrentValue <> $frm_sam_pbb_detail->a_rating_below_90->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_supporting_docs_comparison") && $objForm->HasValue("o_a_supporting_docs_comparison") && $frm_sam_pbb_detail->a_supporting_docs_comparison->CurrentValue <> $frm_sam_pbb_detail->a_supporting_docs_comparison->OldValue)
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
		global $objForm, $frm_sam_pbb_detail;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_sam_pbb_detail;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_sam_pbb_detail->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_sam_pbb_detail->CurrentOrderType = @$_GET["ordertype"];
			$frm_sam_pbb_detail->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_sam_pbb_detail;
		$sOrderBy = $frm_sam_pbb_detail->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_sam_pbb_detail->SqlOrderBy() <> "") {
				$sOrderBy = $frm_sam_pbb_detail->SqlOrderBy();
				$frm_sam_pbb_detail->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_sam_pbb_detail;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_sam_pbb_detail->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_sam_pbb_detail->focal_person_id->setSessionValue("");
				$frm_sam_pbb_detail->mfo_sequence->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_sam_pbb_detail->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_sam_pbb_detail->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_sam_pbb_detail;

		// "griddelete"
		if ($frm_sam_pbb_detail->AllowAddDeleteRow) {
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
		global $Security, $Language, $frm_sam_pbb_detail, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($frm_sam_pbb_detail->RowType == UP_ROWTYPE_ADD)
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
		if ($frm_sam_pbb_detail->AllowAddDeleteRow) {
			if ($frm_sam_pbb_detail->CurrentMode == "add" || $frm_sam_pbb_detail->CurrentMode == "copy" || $frm_sam_pbb_detail->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (!$Security->CanDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, frm_sam_pbb_detail_grid, " . $this->RowIndex . ");\">" . $Language->Phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($frm_sam_pbb_detail->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . $frm_sam_pbb_detail->pbb_id->CurrentValue . "\">";
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
		global $Security, $Language, $frm_sam_pbb_detail;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_sam_pbb_detail;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_sam_pbb_detail->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_sam_pbb_detail->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_sam_pbb_detail->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_sam_pbb_detail->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_sam_pbb_detail->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_sam_pbb_detail->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_sam_pbb_detail;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_sam_pbb_detail;
		$frm_sam_pbb_detail->applicable->CurrentValue = NULL;
		$frm_sam_pbb_detail->applicable->OldValue = $frm_sam_pbb_detail->applicable->CurrentValue;
		$frm_sam_pbb_detail->cu_unit_name->CurrentValue = NULL;
		$frm_sam_pbb_detail->cu_unit_name->OldValue = $frm_sam_pbb_detail->cu_unit_name->CurrentValue;
		$frm_sam_pbb_detail->mfo_name->CurrentValue = NULL;
		$frm_sam_pbb_detail->mfo_name->OldValue = $frm_sam_pbb_detail->mfo_name->CurrentValue;
		$frm_sam_pbb_detail->target->CurrentValue = NULL;
		$frm_sam_pbb_detail->target->OldValue = $frm_sam_pbb_detail->target->CurrentValue;
		$frm_sam_pbb_detail->t_numerator->CurrentValue = NULL;
		$frm_sam_pbb_detail->t_numerator->OldValue = $frm_sam_pbb_detail->t_numerator->CurrentValue;
		$frm_sam_pbb_detail->t_denominator->CurrentValue = NULL;
		$frm_sam_pbb_detail->t_denominator->OldValue = $frm_sam_pbb_detail->t_denominator->CurrentValue;
		$frm_sam_pbb_detail->t_remarks->CurrentValue = NULL;
		$frm_sam_pbb_detail->t_remarks->OldValue = $frm_sam_pbb_detail->t_remarks->CurrentValue;
		$frm_sam_pbb_detail->t_cutOffDate_remarks->CurrentValue = NULL;
		$frm_sam_pbb_detail->t_cutOffDate_remarks->OldValue = $frm_sam_pbb_detail->t_cutOffDate_remarks->CurrentValue;
		$frm_sam_pbb_detail->accomplishment->CurrentValue = NULL;
		$frm_sam_pbb_detail->accomplishment->OldValue = $frm_sam_pbb_detail->accomplishment->CurrentValue;
		$frm_sam_pbb_detail->a_numerator->CurrentValue = NULL;
		$frm_sam_pbb_detail->a_numerator->OldValue = $frm_sam_pbb_detail->a_numerator->CurrentValue;
		$frm_sam_pbb_detail->a_denominator->CurrentValue = NULL;
		$frm_sam_pbb_detail->a_denominator->OldValue = $frm_sam_pbb_detail->a_denominator->CurrentValue;
		$frm_sam_pbb_detail->a_supporting_docs->CurrentValue = NULL;
		$frm_sam_pbb_detail->a_supporting_docs->OldValue = $frm_sam_pbb_detail->a_supporting_docs->CurrentValue;
		$frm_sam_pbb_detail->a_remarks->CurrentValue = NULL;
		$frm_sam_pbb_detail->a_remarks->OldValue = $frm_sam_pbb_detail->a_remarks->CurrentValue;
		$frm_sam_pbb_detail->a_cutOffDate_remarks->CurrentValue = NULL;
		$frm_sam_pbb_detail->a_cutOffDate_remarks->OldValue = $frm_sam_pbb_detail->a_cutOffDate_remarks->CurrentValue;
		$frm_sam_pbb_detail->a_rating_above_90->CurrentValue = NULL;
		$frm_sam_pbb_detail->a_rating_above_90->OldValue = $frm_sam_pbb_detail->a_rating_above_90->CurrentValue;
		$frm_sam_pbb_detail->a_rating_below_90->CurrentValue = NULL;
		$frm_sam_pbb_detail->a_rating_below_90->OldValue = $frm_sam_pbb_detail->a_rating_below_90->CurrentValue;
		$frm_sam_pbb_detail->a_supporting_docs_comparison->CurrentValue = NULL;
		$frm_sam_pbb_detail->a_supporting_docs_comparison->OldValue = $frm_sam_pbb_detail->a_supporting_docs_comparison->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_sam_pbb_detail;
		if (!$frm_sam_pbb_detail->applicable->FldIsDetailKey) {
			$frm_sam_pbb_detail->applicable->setFormValue($objForm->GetValue("x_applicable"));
		}
		$frm_sam_pbb_detail->applicable->setOldValue($objForm->GetValue("o_applicable"));
		if (!$frm_sam_pbb_detail->cu_unit_name->FldIsDetailKey) {
			$frm_sam_pbb_detail->cu_unit_name->setFormValue($objForm->GetValue("x_cu_unit_name"));
		}
		$frm_sam_pbb_detail->cu_unit_name->setOldValue($objForm->GetValue("o_cu_unit_name"));
		if (!$frm_sam_pbb_detail->mfo_name->FldIsDetailKey) {
			$frm_sam_pbb_detail->mfo_name->setFormValue($objForm->GetValue("x_mfo_name"));
		}
		$frm_sam_pbb_detail->mfo_name->setOldValue($objForm->GetValue("o_mfo_name"));
		if (!$frm_sam_pbb_detail->target->FldIsDetailKey) {
			$frm_sam_pbb_detail->target->setFormValue($objForm->GetValue("x_target"));
		}
		$frm_sam_pbb_detail->target->setOldValue($objForm->GetValue("o_target"));
		if (!$frm_sam_pbb_detail->t_numerator->FldIsDetailKey) {
			$frm_sam_pbb_detail->t_numerator->setFormValue($objForm->GetValue("x_t_numerator"));
		}
		$frm_sam_pbb_detail->t_numerator->setOldValue($objForm->GetValue("o_t_numerator"));
		if (!$frm_sam_pbb_detail->t_denominator->FldIsDetailKey) {
			$frm_sam_pbb_detail->t_denominator->setFormValue($objForm->GetValue("x_t_denominator"));
		}
		$frm_sam_pbb_detail->t_denominator->setOldValue($objForm->GetValue("o_t_denominator"));
		if (!$frm_sam_pbb_detail->t_remarks->FldIsDetailKey) {
			$frm_sam_pbb_detail->t_remarks->setFormValue($objForm->GetValue("x_t_remarks"));
		}
		$frm_sam_pbb_detail->t_remarks->setOldValue($objForm->GetValue("o_t_remarks"));
		if (!$frm_sam_pbb_detail->t_cutOffDate_remarks->FldIsDetailKey) {
			$frm_sam_pbb_detail->t_cutOffDate_remarks->setFormValue($objForm->GetValue("x_t_cutOffDate_remarks"));
		}
		$frm_sam_pbb_detail->t_cutOffDate_remarks->setOldValue($objForm->GetValue("o_t_cutOffDate_remarks"));
		if (!$frm_sam_pbb_detail->accomplishment->FldIsDetailKey) {
			$frm_sam_pbb_detail->accomplishment->setFormValue($objForm->GetValue("x_accomplishment"));
		}
		$frm_sam_pbb_detail->accomplishment->setOldValue($objForm->GetValue("o_accomplishment"));
		if (!$frm_sam_pbb_detail->a_numerator->FldIsDetailKey) {
			$frm_sam_pbb_detail->a_numerator->setFormValue($objForm->GetValue("x_a_numerator"));
		}
		$frm_sam_pbb_detail->a_numerator->setOldValue($objForm->GetValue("o_a_numerator"));
		if (!$frm_sam_pbb_detail->a_denominator->FldIsDetailKey) {
			$frm_sam_pbb_detail->a_denominator->setFormValue($objForm->GetValue("x_a_denominator"));
		}
		$frm_sam_pbb_detail->a_denominator->setOldValue($objForm->GetValue("o_a_denominator"));
		if (!$frm_sam_pbb_detail->a_supporting_docs->FldIsDetailKey) {
			$frm_sam_pbb_detail->a_supporting_docs->setFormValue($objForm->GetValue("x_a_supporting_docs"));
		}
		$frm_sam_pbb_detail->a_supporting_docs->setOldValue($objForm->GetValue("o_a_supporting_docs"));
		if (!$frm_sam_pbb_detail->a_remarks->FldIsDetailKey) {
			$frm_sam_pbb_detail->a_remarks->setFormValue($objForm->GetValue("x_a_remarks"));
		}
		$frm_sam_pbb_detail->a_remarks->setOldValue($objForm->GetValue("o_a_remarks"));
		if (!$frm_sam_pbb_detail->a_cutOffDate_remarks->FldIsDetailKey) {
			$frm_sam_pbb_detail->a_cutOffDate_remarks->setFormValue($objForm->GetValue("x_a_cutOffDate_remarks"));
		}
		$frm_sam_pbb_detail->a_cutOffDate_remarks->setOldValue($objForm->GetValue("o_a_cutOffDate_remarks"));
		if (!$frm_sam_pbb_detail->a_rating_above_90->FldIsDetailKey) {
			$frm_sam_pbb_detail->a_rating_above_90->setFormValue($objForm->GetValue("x_a_rating_above_90"));
		}
		$frm_sam_pbb_detail->a_rating_above_90->setOldValue($objForm->GetValue("o_a_rating_above_90"));
		if (!$frm_sam_pbb_detail->a_rating_below_90->FldIsDetailKey) {
			$frm_sam_pbb_detail->a_rating_below_90->setFormValue($objForm->GetValue("x_a_rating_below_90"));
		}
		$frm_sam_pbb_detail->a_rating_below_90->setOldValue($objForm->GetValue("o_a_rating_below_90"));
		if (!$frm_sam_pbb_detail->a_supporting_docs_comparison->FldIsDetailKey) {
			$frm_sam_pbb_detail->a_supporting_docs_comparison->setFormValue($objForm->GetValue("x_a_supporting_docs_comparison"));
		}
		$frm_sam_pbb_detail->a_supporting_docs_comparison->setOldValue($objForm->GetValue("o_a_supporting_docs_comparison"));
		if (!$frm_sam_pbb_detail->pbb_id->FldIsDetailKey && $frm_sam_pbb_detail->CurrentAction <> "gridadd" && $frm_sam_pbb_detail->CurrentAction <> "add")
			$frm_sam_pbb_detail->pbb_id->setFormValue($objForm->GetValue("x_pbb_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_sam_pbb_detail;
		if ($frm_sam_pbb_detail->CurrentAction <> "gridadd" && $frm_sam_pbb_detail->CurrentAction <> "add")
			$frm_sam_pbb_detail->pbb_id->CurrentValue = $frm_sam_pbb_detail->pbb_id->FormValue;
		$frm_sam_pbb_detail->applicable->CurrentValue = $frm_sam_pbb_detail->applicable->FormValue;
		$frm_sam_pbb_detail->cu_unit_name->CurrentValue = $frm_sam_pbb_detail->cu_unit_name->FormValue;
		$frm_sam_pbb_detail->mfo_name->CurrentValue = $frm_sam_pbb_detail->mfo_name->FormValue;
		$frm_sam_pbb_detail->target->CurrentValue = $frm_sam_pbb_detail->target->FormValue;
		$frm_sam_pbb_detail->t_numerator->CurrentValue = $frm_sam_pbb_detail->t_numerator->FormValue;
		$frm_sam_pbb_detail->t_denominator->CurrentValue = $frm_sam_pbb_detail->t_denominator->FormValue;
		$frm_sam_pbb_detail->t_remarks->CurrentValue = $frm_sam_pbb_detail->t_remarks->FormValue;
		$frm_sam_pbb_detail->t_cutOffDate_remarks->CurrentValue = $frm_sam_pbb_detail->t_cutOffDate_remarks->FormValue;
		$frm_sam_pbb_detail->accomplishment->CurrentValue = $frm_sam_pbb_detail->accomplishment->FormValue;
		$frm_sam_pbb_detail->a_numerator->CurrentValue = $frm_sam_pbb_detail->a_numerator->FormValue;
		$frm_sam_pbb_detail->a_denominator->CurrentValue = $frm_sam_pbb_detail->a_denominator->FormValue;
		$frm_sam_pbb_detail->a_supporting_docs->CurrentValue = $frm_sam_pbb_detail->a_supporting_docs->FormValue;
		$frm_sam_pbb_detail->a_remarks->CurrentValue = $frm_sam_pbb_detail->a_remarks->FormValue;
		$frm_sam_pbb_detail->a_cutOffDate_remarks->CurrentValue = $frm_sam_pbb_detail->a_cutOffDate_remarks->FormValue;
		$frm_sam_pbb_detail->a_rating_above_90->CurrentValue = $frm_sam_pbb_detail->a_rating_above_90->FormValue;
		$frm_sam_pbb_detail->a_rating_below_90->CurrentValue = $frm_sam_pbb_detail->a_rating_below_90->FormValue;
		$frm_sam_pbb_detail->a_supporting_docs_comparison->CurrentValue = $frm_sam_pbb_detail->a_supporting_docs_comparison->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_sam_pbb_detail;

		// Call Recordset Selecting event
		$frm_sam_pbb_detail->Recordset_Selecting($frm_sam_pbb_detail->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_sam_pbb_detail->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_sam_pbb_detail->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_pbb_detail;
		$sFilter = $frm_sam_pbb_detail->KeyFilter();

		// Call Row Selecting event
		$frm_sam_pbb_detail->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_pbb_detail->CurrentFilter = $sFilter;
		$sSql = $frm_sam_pbb_detail->SQL();
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
		global $conn, $frm_sam_pbb_detail;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_pbb_detail->Row_Selected($row);
		$frm_sam_pbb_detail->pbb_id->setDbValue($rs->fields('pbb_id'));
		$frm_sam_pbb_detail->applicable->setDbValue($rs->fields('applicable'));
		$frm_sam_pbb_detail->units_id->setDbValue($rs->fields('units_id'));
		$frm_sam_pbb_detail->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_sam_pbb_detail->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_sam_pbb_detail->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_sam_pbb_detail->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_sam_pbb_detail->mfo_id->setDbValue($rs->fields('mfo_id'));
		$frm_sam_pbb_detail->mfo_sequence->setDbValue($rs->fields('mfo_sequence'));
		$frm_sam_pbb_detail->mfo->setDbValue($rs->fields('mfo'));
		$frm_sam_pbb_detail->pi_no->setDbValue($rs->fields('pi_no'));
		$frm_sam_pbb_detail->pi_sub->setDbValue($rs->fields('pi_sub'));
		$frm_sam_pbb_detail->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$frm_sam_pbb_detail->mfo_name->setDbValue($rs->fields('mfo_name'));
		$frm_sam_pbb_detail->pi_question->setDbValue($rs->fields('pi_question'));
		$frm_sam_pbb_detail->target->setDbValue($rs->fields('target'));
		$frm_sam_pbb_detail->t_numerator->setDbValue($rs->fields('t_numerator'));
		$frm_sam_pbb_detail->t_numerator_qtr1->setDbValue($rs->fields('t_numerator_qtr1'));
		$frm_sam_pbb_detail->t_numerator_qtr2->setDbValue($rs->fields('t_numerator_qtr2'));
		$frm_sam_pbb_detail->t_numerator_qtr3->setDbValue($rs->fields('t_numerator_qtr3'));
		$frm_sam_pbb_detail->t_numerator_qtr4->setDbValue($rs->fields('t_numerator_qtr4'));
		$frm_sam_pbb_detail->t_denominator->setDbValue($rs->fields('t_denominator'));
		$frm_sam_pbb_detail->t_denominator_qtr1->setDbValue($rs->fields('t_denominator_qtr1'));
		$frm_sam_pbb_detail->t_denominator_qtr2->setDbValue($rs->fields('t_denominator_qtr2'));
		$frm_sam_pbb_detail->t_denominator_qtr3->setDbValue($rs->fields('t_denominator_qtr3'));
		$frm_sam_pbb_detail->t_denominator_qtr4->setDbValue($rs->fields('t_denominator_qtr4'));
		$frm_sam_pbb_detail->t_remarks->setDbValue($rs->fields('t_remarks'));
		$frm_sam_pbb_detail->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$frm_sam_pbb_detail->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_sam_pbb_detail->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_sam_pbb_detail->accomplishment->setDbValue($rs->fields('accomplishment'));
		$frm_sam_pbb_detail->a_numerator->setDbValue($rs->fields('a_numerator'));
		$frm_sam_pbb_detail->a_numerator_qtr1->setDbValue($rs->fields('a_numerator_qtr1'));
		$frm_sam_pbb_detail->a_numerator_qtr2->setDbValue($rs->fields('a_numerator_qtr2'));
		$frm_sam_pbb_detail->a_numerator_qtr3->setDbValue($rs->fields('a_numerator_qtr3'));
		$frm_sam_pbb_detail->a_numerator_qtr4->setDbValue($rs->fields('a_numerator_qtr4'));
		$frm_sam_pbb_detail->a_denominator->setDbValue($rs->fields('a_denominator'));
		$frm_sam_pbb_detail->a_denominator_qtr1->setDbValue($rs->fields('a_denominator_qtr1'));
		$frm_sam_pbb_detail->a_denominator_qtr2->setDbValue($rs->fields('a_denominator_qtr2'));
		$frm_sam_pbb_detail->a_denominator_qtr3->setDbValue($rs->fields('a_denominator_qtr3'));
		$frm_sam_pbb_detail->a_denominator_qtr4->setDbValue($rs->fields('a_denominator_qtr4'));
		$frm_sam_pbb_detail->a_supporting_docs->setDbValue($rs->fields('a_supporting_docs'));
		$frm_sam_pbb_detail->a_supporting_docs_qtr1->setDbValue($rs->fields('a_supporting_docs_qtr1'));
		$frm_sam_pbb_detail->a_supporting_docs_qtr2->setDbValue($rs->fields('a_supporting_docs_qtr2'));
		$frm_sam_pbb_detail->a_supporting_docs_qtr3->setDbValue($rs->fields('a_supporting_docs_qtr3'));
		$frm_sam_pbb_detail->a_supporting_docs_qtr4->setDbValue($rs->fields('a_supporting_docs_qtr4'));
		$frm_sam_pbb_detail->a_remarks->setDbValue($rs->fields('a_remarks'));
		$frm_sam_pbb_detail->a_cutOffDate->setDbValue($rs->fields('a_cutOffDate'));
		$frm_sam_pbb_detail->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_sam_pbb_detail->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
		$frm_sam_pbb_detail->a_rating->setDbValue($rs->fields('a_rating'));
		$frm_sam_pbb_detail->a_rating_above_90->setDbValue($rs->fields('a_rating_above_90'));
		$frm_sam_pbb_detail->a_rating_below_90->setDbValue($rs->fields('a_rating_below_90'));
		$frm_sam_pbb_detail->a_supporting_docs_comparison->setDbValue($rs->fields('a_supporting_docs_comparison'));
		$frm_sam_pbb_detail->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_sam_pbb_detail->form_a_1_sequence->setDbValue($rs->fields('form_a_1_sequence'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_sam_pbb_detail;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$frm_sam_pbb_detail->pbb_id->CurrentValue = strval($arKeys[0]); // pbb_id
			else
				$bValidKey = FALSE;
		}

		// Load old recordset
		if ($bValidKey) {
			$frm_sam_pbb_detail->CurrentFilter = $frm_sam_pbb_detail->KeyFilter();
			$sSql = $frm_sam_pbb_detail->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_pbb_detail;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_sam_pbb_detail->Row_Rendering();

		// Common render codes for all row types
		// pbb_id

		$frm_sam_pbb_detail->pbb_id->CellCssStyle = "white-space: nowrap;";

		// applicable
		$frm_sam_pbb_detail->applicable->CellCssStyle = "white-space: nowrap;";

		// units_id
		$frm_sam_pbb_detail->units_id->CellCssStyle = "white-space: nowrap;";

		// cu_sequence
		$frm_sam_pbb_detail->cu_sequence->CellCssStyle = "white-space: nowrap;";

		// cu_short_name
		$frm_sam_pbb_detail->cu_short_name->CellCssStyle = "white-space: nowrap;";

		// cu_unit_name
		$frm_sam_pbb_detail->cu_unit_name->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$frm_sam_pbb_detail->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// mfo_id
		$frm_sam_pbb_detail->mfo_id->CellCssStyle = "white-space: nowrap;";

		// mfo_sequence
		$frm_sam_pbb_detail->mfo_sequence->CellCssStyle = "white-space: nowrap;";

		// mfo
		$frm_sam_pbb_detail->mfo->CellCssStyle = "white-space: nowrap;";

		// pi_no
		$frm_sam_pbb_detail->pi_no->CellCssStyle = "white-space: nowrap;";

		// pi_sub
		$frm_sam_pbb_detail->pi_sub->CellCssStyle = "white-space: nowrap;";

		// mfo_name_rep
		$frm_sam_pbb_detail->mfo_name_rep->CellCssStyle = "white-space: nowrap;";

		// mfo_name
		$frm_sam_pbb_detail->mfo_name->CellCssStyle = "white-space: nowrap;";

		// pi_question
		$frm_sam_pbb_detail->pi_question->CellCssStyle = "width: 400px; white-space: nowrap;";

		// target
		$frm_sam_pbb_detail->target->CellCssStyle = "white-space: nowrap;";

		// t_numerator
		$frm_sam_pbb_detail->t_numerator->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr1
		$frm_sam_pbb_detail->t_numerator_qtr1->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr2
		$frm_sam_pbb_detail->t_numerator_qtr2->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr3
		$frm_sam_pbb_detail->t_numerator_qtr3->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr4
		$frm_sam_pbb_detail->t_numerator_qtr4->CellCssStyle = "white-space: nowrap;";

		// t_denominator
		$frm_sam_pbb_detail->t_denominator->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr1
		$frm_sam_pbb_detail->t_denominator_qtr1->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr2
		$frm_sam_pbb_detail->t_denominator_qtr2->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr3
		$frm_sam_pbb_detail->t_denominator_qtr3->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr4
		$frm_sam_pbb_detail->t_denominator_qtr4->CellCssStyle = "white-space: nowrap;";

		// t_remarks
		$frm_sam_pbb_detail->t_remarks->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate
		$frm_sam_pbb_detail->t_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_fp
		$frm_sam_pbb_detail->t_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_remarks
		$frm_sam_pbb_detail->t_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";

		// accomplishment
		$frm_sam_pbb_detail->accomplishment->CellCssStyle = "white-space: nowrap;";

		// a_numerator
		$frm_sam_pbb_detail->a_numerator->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr1
		$frm_sam_pbb_detail->a_numerator_qtr1->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr2
		$frm_sam_pbb_detail->a_numerator_qtr2->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr3
		$frm_sam_pbb_detail->a_numerator_qtr3->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr4
		$frm_sam_pbb_detail->a_numerator_qtr4->CellCssStyle = "white-space: nowrap;";

		// a_denominator
		$frm_sam_pbb_detail->a_denominator->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr1
		$frm_sam_pbb_detail->a_denominator_qtr1->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr2
		$frm_sam_pbb_detail->a_denominator_qtr2->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr3
		$frm_sam_pbb_detail->a_denominator_qtr3->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr4
		$frm_sam_pbb_detail->a_denominator_qtr4->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs
		$frm_sam_pbb_detail->a_supporting_docs->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr1
		$frm_sam_pbb_detail->a_supporting_docs_qtr1->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr2
		$frm_sam_pbb_detail->a_supporting_docs_qtr2->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr3
		$frm_sam_pbb_detail->a_supporting_docs_qtr3->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr4
		$frm_sam_pbb_detail->a_supporting_docs_qtr4->CellCssStyle = "white-space: nowrap;";

		// a_remarks
		$frm_sam_pbb_detail->a_remarks->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate
		$frm_sam_pbb_detail->a_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate_fp
		$frm_sam_pbb_detail->a_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate_remarks
		$frm_sam_pbb_detail->a_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";

		// a_rating
		$frm_sam_pbb_detail->a_rating->CellCssStyle = "white-space: nowrap;";

		// a_rating_above_90
		$frm_sam_pbb_detail->a_rating_above_90->CellCssStyle = "white-space: nowrap;";

		// a_rating_below_90
		$frm_sam_pbb_detail->a_rating_below_90->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_comparison
		$frm_sam_pbb_detail->a_supporting_docs_comparison->CellCssStyle = "white-space: nowrap;";

		// cutOffDate_id
		$frm_sam_pbb_detail->cutOffDate_id->CellCssStyle = "white-space: nowrap;";

		// form_a_1_sequence
		$frm_sam_pbb_detail->form_a_1_sequence->CellCssStyle = "white-space: nowrap;";
		if ($frm_sam_pbb_detail->RowType == UP_ROWTYPE_VIEW) { // View row

			// applicable
			if (strval($frm_sam_pbb_detail->applicable->CurrentValue) <> "") {
				switch ($frm_sam_pbb_detail->applicable->CurrentValue) {
					case "Y":
						$frm_sam_pbb_detail->applicable->ViewValue = $frm_sam_pbb_detail->applicable->FldTagCaption(1) <> "" ? $frm_sam_pbb_detail->applicable->FldTagCaption(1) : $frm_sam_pbb_detail->applicable->CurrentValue;
						break;
					case "N":
						$frm_sam_pbb_detail->applicable->ViewValue = $frm_sam_pbb_detail->applicable->FldTagCaption(2) <> "" ? $frm_sam_pbb_detail->applicable->FldTagCaption(2) : $frm_sam_pbb_detail->applicable->CurrentValue;
						break;
					default:
						$frm_sam_pbb_detail->applicable->ViewValue = $frm_sam_pbb_detail->applicable->CurrentValue;
				}
			} else {
				$frm_sam_pbb_detail->applicable->ViewValue = NULL;
			}
			$frm_sam_pbb_detail->applicable->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_sam_pbb_detail->cu_unit_name->ViewValue = $frm_sam_pbb_detail->cu_unit_name->CurrentValue;
			$frm_sam_pbb_detail->cu_unit_name->ViewCustomAttributes = "";

			// mfo_name
			$frm_sam_pbb_detail->mfo_name->ViewValue = $frm_sam_pbb_detail->mfo_name->CurrentValue;
			$frm_sam_pbb_detail->mfo_name->ViewCustomAttributes = "";

			// target
			$frm_sam_pbb_detail->target->ViewValue = $frm_sam_pbb_detail->target->CurrentValue;
			$frm_sam_pbb_detail->target->CssStyle = "font-weight:bold;text-align:right;";
			$frm_sam_pbb_detail->target->ViewCustomAttributes = "";

			// t_numerator
			$frm_sam_pbb_detail->t_numerator->ViewValue = $frm_sam_pbb_detail->t_numerator->CurrentValue;
			$frm_sam_pbb_detail->t_numerator->CssStyle = "text-align:right;";
			$frm_sam_pbb_detail->t_numerator->ViewCustomAttributes = "";

			// t_denominator
			$frm_sam_pbb_detail->t_denominator->ViewValue = $frm_sam_pbb_detail->t_denominator->CurrentValue;
			$frm_sam_pbb_detail->t_denominator->CssStyle = "text-align:right;";
			$frm_sam_pbb_detail->t_denominator->ViewCustomAttributes = "";

			// t_remarks
			$frm_sam_pbb_detail->t_remarks->ViewValue = $frm_sam_pbb_detail->t_remarks->CurrentValue;
			$frm_sam_pbb_detail->t_remarks->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_sam_pbb_detail->t_cutOffDate_remarks->ViewValue = $frm_sam_pbb_detail->t_cutOffDate_remarks->CurrentValue;
			$frm_sam_pbb_detail->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// accomplishment
			$frm_sam_pbb_detail->accomplishment->ViewValue = $frm_sam_pbb_detail->accomplishment->CurrentValue;
			$frm_sam_pbb_detail->accomplishment->CssStyle = "font-weight:bold;";
			$frm_sam_pbb_detail->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$frm_sam_pbb_detail->a_numerator->ViewValue = $frm_sam_pbb_detail->a_numerator->CurrentValue;
			$frm_sam_pbb_detail->a_numerator->ViewCustomAttributes = "";

			// a_denominator
			$frm_sam_pbb_detail->a_denominator->ViewValue = $frm_sam_pbb_detail->a_denominator->CurrentValue;
			$frm_sam_pbb_detail->a_denominator->ViewCustomAttributes = "";

			// a_supporting_docs
			$frm_sam_pbb_detail->a_supporting_docs->ViewValue = $frm_sam_pbb_detail->a_supporting_docs->CurrentValue;
			$frm_sam_pbb_detail->a_supporting_docs->CssStyle = "font-weight:bold;";
			$frm_sam_pbb_detail->a_supporting_docs->ViewCustomAttributes = "";

			// a_remarks
			$frm_sam_pbb_detail->a_remarks->ViewValue = $frm_sam_pbb_detail->a_remarks->CurrentValue;
			$frm_sam_pbb_detail->a_remarks->ViewCustomAttributes = "";

			// a_cutOffDate_remarks
			$frm_sam_pbb_detail->a_cutOffDate_remarks->ViewValue = $frm_sam_pbb_detail->a_cutOffDate_remarks->CurrentValue;
			$frm_sam_pbb_detail->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// a_rating_above_90
			$frm_sam_pbb_detail->a_rating_above_90->ViewValue = $frm_sam_pbb_detail->a_rating_above_90->CurrentValue;
			$frm_sam_pbb_detail->a_rating_above_90->ViewCustomAttributes = "";

			// a_rating_below_90
			$frm_sam_pbb_detail->a_rating_below_90->ViewValue = $frm_sam_pbb_detail->a_rating_below_90->CurrentValue;
			$frm_sam_pbb_detail->a_rating_below_90->ViewCustomAttributes = "";

			// a_supporting_docs_comparison
			$frm_sam_pbb_detail->a_supporting_docs_comparison->ViewValue = $frm_sam_pbb_detail->a_supporting_docs_comparison->CurrentValue;
			$frm_sam_pbb_detail->a_supporting_docs_comparison->ViewCustomAttributes = "";

			// applicable
			$frm_sam_pbb_detail->applicable->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->applicable->HrefValue = "";
			$frm_sam_pbb_detail->applicable->TooltipValue = "";

			// cu_unit_name
			$frm_sam_pbb_detail->cu_unit_name->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->cu_unit_name->HrefValue = "";
			$frm_sam_pbb_detail->cu_unit_name->TooltipValue = "";

			// mfo_name
			$frm_sam_pbb_detail->mfo_name->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->mfo_name->HrefValue = "";
			$frm_sam_pbb_detail->mfo_name->TooltipValue = "";

			// target
			$frm_sam_pbb_detail->target->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->target->HrefValue = "";
			$frm_sam_pbb_detail->target->TooltipValue = "";

			// t_numerator
			$frm_sam_pbb_detail->t_numerator->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->t_numerator->HrefValue = "";
			$frm_sam_pbb_detail->t_numerator->TooltipValue = "";

			// t_denominator
			$frm_sam_pbb_detail->t_denominator->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->t_denominator->HrefValue = "";
			$frm_sam_pbb_detail->t_denominator->TooltipValue = "";

			// t_remarks
			$frm_sam_pbb_detail->t_remarks->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->t_remarks->HrefValue = "";
			$frm_sam_pbb_detail->t_remarks->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_sam_pbb_detail->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->t_cutOffDate_remarks->HrefValue = "";
			$frm_sam_pbb_detail->t_cutOffDate_remarks->TooltipValue = "";

			// accomplishment
			$frm_sam_pbb_detail->accomplishment->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->accomplishment->HrefValue = "";
			$frm_sam_pbb_detail->accomplishment->TooltipValue = "";

			// a_numerator
			$frm_sam_pbb_detail->a_numerator->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_numerator->HrefValue = "";
			$frm_sam_pbb_detail->a_numerator->TooltipValue = "";

			// a_denominator
			$frm_sam_pbb_detail->a_denominator->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_denominator->HrefValue = "";
			$frm_sam_pbb_detail->a_denominator->TooltipValue = "";

			// a_supporting_docs
			$frm_sam_pbb_detail->a_supporting_docs->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_supporting_docs->HrefValue = "";
			$frm_sam_pbb_detail->a_supporting_docs->TooltipValue = "";

			// a_remarks
			$frm_sam_pbb_detail->a_remarks->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_remarks->HrefValue = "";
			$frm_sam_pbb_detail->a_remarks->TooltipValue = "";

			// a_cutOffDate_remarks
			$frm_sam_pbb_detail->a_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_cutOffDate_remarks->HrefValue = "";
			$frm_sam_pbb_detail->a_cutOffDate_remarks->TooltipValue = "";

			// a_rating_above_90
			$frm_sam_pbb_detail->a_rating_above_90->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_rating_above_90->HrefValue = "";
			$frm_sam_pbb_detail->a_rating_above_90->TooltipValue = "";

			// a_rating_below_90
			$frm_sam_pbb_detail->a_rating_below_90->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_rating_below_90->HrefValue = "";
			$frm_sam_pbb_detail->a_rating_below_90->TooltipValue = "";

			// a_supporting_docs_comparison
			$frm_sam_pbb_detail->a_supporting_docs_comparison->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_supporting_docs_comparison->HrefValue = "";
			$frm_sam_pbb_detail->a_supporting_docs_comparison->TooltipValue = "";
		} elseif ($frm_sam_pbb_detail->RowType == UP_ROWTYPE_ADD) { // Add row

			// applicable
			$frm_sam_pbb_detail->applicable->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_pbb_detail->applicable->FldTagCaption(1) <> "" ? $frm_sam_pbb_detail->applicable->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_pbb_detail->applicable->FldTagCaption(2) <> "" ? $frm_sam_pbb_detail->applicable->FldTagCaption(2) : "N");
			$frm_sam_pbb_detail->applicable->EditValue = $arwrk;

			// cu_unit_name
			$frm_sam_pbb_detail->cu_unit_name->EditCustomAttributes = "";
			$frm_sam_pbb_detail->cu_unit_name->EditValue = up_HtmlEncode($frm_sam_pbb_detail->cu_unit_name->CurrentValue);

			// mfo_name
			$frm_sam_pbb_detail->mfo_name->EditCustomAttributes = "";
			$frm_sam_pbb_detail->mfo_name->EditValue = up_HtmlEncode($frm_sam_pbb_detail->mfo_name->CurrentValue);

			// target
			$frm_sam_pbb_detail->target->EditCustomAttributes = "";
			$frm_sam_pbb_detail->target->EditValue = up_HtmlEncode($frm_sam_pbb_detail->target->CurrentValue);

			// t_numerator
			$frm_sam_pbb_detail->t_numerator->EditCustomAttributes = "";
			$frm_sam_pbb_detail->t_numerator->EditValue = up_HtmlEncode($frm_sam_pbb_detail->t_numerator->CurrentValue);

			// t_denominator
			$frm_sam_pbb_detail->t_denominator->EditCustomAttributes = "";
			$frm_sam_pbb_detail->t_denominator->EditValue = up_HtmlEncode($frm_sam_pbb_detail->t_denominator->CurrentValue);

			// t_remarks
			$frm_sam_pbb_detail->t_remarks->EditCustomAttributes = "";
			$frm_sam_pbb_detail->t_remarks->EditValue = up_HtmlEncode($frm_sam_pbb_detail->t_remarks->CurrentValue);

			// t_cutOffDate_remarks
			$frm_sam_pbb_detail->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_sam_pbb_detail->t_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_sam_pbb_detail->t_cutOffDate_remarks->CurrentValue);

			// accomplishment
			$frm_sam_pbb_detail->accomplishment->EditCustomAttributes = "";
			$frm_sam_pbb_detail->accomplishment->EditValue = up_HtmlEncode($frm_sam_pbb_detail->accomplishment->CurrentValue);

			// a_numerator
			$frm_sam_pbb_detail->a_numerator->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_numerator->EditValue = up_HtmlEncode($frm_sam_pbb_detail->a_numerator->CurrentValue);

			// a_denominator
			$frm_sam_pbb_detail->a_denominator->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_denominator->EditValue = up_HtmlEncode($frm_sam_pbb_detail->a_denominator->CurrentValue);

			// a_supporting_docs
			$frm_sam_pbb_detail->a_supporting_docs->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_supporting_docs->EditValue = up_HtmlEncode($frm_sam_pbb_detail->a_supporting_docs->CurrentValue);

			// a_remarks
			$frm_sam_pbb_detail->a_remarks->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_remarks->EditValue = up_HtmlEncode($frm_sam_pbb_detail->a_remarks->CurrentValue);

			// a_cutOffDate_remarks
			$frm_sam_pbb_detail->a_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_sam_pbb_detail->a_cutOffDate_remarks->CurrentValue);

			// a_rating_above_90
			$frm_sam_pbb_detail->a_rating_above_90->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_rating_above_90->EditValue = up_HtmlEncode($frm_sam_pbb_detail->a_rating_above_90->CurrentValue);

			// a_rating_below_90
			$frm_sam_pbb_detail->a_rating_below_90->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_rating_below_90->EditValue = up_HtmlEncode($frm_sam_pbb_detail->a_rating_below_90->CurrentValue);

			// a_supporting_docs_comparison
			$frm_sam_pbb_detail->a_supporting_docs_comparison->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_supporting_docs_comparison->EditValue = up_HtmlEncode($frm_sam_pbb_detail->a_supporting_docs_comparison->CurrentValue);

			// Edit refer script
			// applicable

			$frm_sam_pbb_detail->applicable->HrefValue = "";

			// cu_unit_name
			$frm_sam_pbb_detail->cu_unit_name->HrefValue = "";

			// mfo_name
			$frm_sam_pbb_detail->mfo_name->HrefValue = "";

			// target
			$frm_sam_pbb_detail->target->HrefValue = "";

			// t_numerator
			$frm_sam_pbb_detail->t_numerator->HrefValue = "";

			// t_denominator
			$frm_sam_pbb_detail->t_denominator->HrefValue = "";

			// t_remarks
			$frm_sam_pbb_detail->t_remarks->HrefValue = "";

			// t_cutOffDate_remarks
			$frm_sam_pbb_detail->t_cutOffDate_remarks->HrefValue = "";

			// accomplishment
			$frm_sam_pbb_detail->accomplishment->HrefValue = "";

			// a_numerator
			$frm_sam_pbb_detail->a_numerator->HrefValue = "";

			// a_denominator
			$frm_sam_pbb_detail->a_denominator->HrefValue = "";

			// a_supporting_docs
			$frm_sam_pbb_detail->a_supporting_docs->HrefValue = "";

			// a_remarks
			$frm_sam_pbb_detail->a_remarks->HrefValue = "";

			// a_cutOffDate_remarks
			$frm_sam_pbb_detail->a_cutOffDate_remarks->HrefValue = "";

			// a_rating_above_90
			$frm_sam_pbb_detail->a_rating_above_90->HrefValue = "";

			// a_rating_below_90
			$frm_sam_pbb_detail->a_rating_below_90->HrefValue = "";

			// a_supporting_docs_comparison
			$frm_sam_pbb_detail->a_supporting_docs_comparison->HrefValue = "";
		} elseif ($frm_sam_pbb_detail->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// applicable
			$frm_sam_pbb_detail->applicable->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_pbb_detail->applicable->FldTagCaption(1) <> "" ? $frm_sam_pbb_detail->applicable->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_pbb_detail->applicable->FldTagCaption(2) <> "" ? $frm_sam_pbb_detail->applicable->FldTagCaption(2) : "N");
			$frm_sam_pbb_detail->applicable->EditValue = $arwrk;

			// cu_unit_name
			$frm_sam_pbb_detail->cu_unit_name->EditCustomAttributes = "";
			$frm_sam_pbb_detail->cu_unit_name->EditValue = $frm_sam_pbb_detail->cu_unit_name->CurrentValue;
			$frm_sam_pbb_detail->cu_unit_name->ViewCustomAttributes = "";

			// mfo_name
			$frm_sam_pbb_detail->mfo_name->EditCustomAttributes = "";
			$frm_sam_pbb_detail->mfo_name->EditValue = $frm_sam_pbb_detail->mfo_name->CurrentValue;
			$frm_sam_pbb_detail->mfo_name->ViewCustomAttributes = "";

			// target
			$frm_sam_pbb_detail->target->EditCustomAttributes = "";
			$frm_sam_pbb_detail->target->EditValue = $frm_sam_pbb_detail->target->CurrentValue;
			$frm_sam_pbb_detail->target->CssStyle = "font-weight:bold;text-align:right;";
			$frm_sam_pbb_detail->target->ViewCustomAttributes = "";

			// t_numerator
			$frm_sam_pbb_detail->t_numerator->EditCustomAttributes = "";
			$frm_sam_pbb_detail->t_numerator->EditValue = $frm_sam_pbb_detail->t_numerator->CurrentValue;
			$frm_sam_pbb_detail->t_numerator->CssStyle = "text-align:right;";
			$frm_sam_pbb_detail->t_numerator->ViewCustomAttributes = "";

			// t_denominator
			$frm_sam_pbb_detail->t_denominator->EditCustomAttributes = "";
			$frm_sam_pbb_detail->t_denominator->EditValue = $frm_sam_pbb_detail->t_denominator->CurrentValue;
			$frm_sam_pbb_detail->t_denominator->CssStyle = "text-align:right;";
			$frm_sam_pbb_detail->t_denominator->ViewCustomAttributes = "";

			// t_remarks
			$frm_sam_pbb_detail->t_remarks->EditCustomAttributes = "";
			$frm_sam_pbb_detail->t_remarks->EditValue = up_HtmlEncode($frm_sam_pbb_detail->t_remarks->CurrentValue);

			// t_cutOffDate_remarks
			$frm_sam_pbb_detail->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_sam_pbb_detail->t_cutOffDate_remarks->EditValue = $frm_sam_pbb_detail->t_cutOffDate_remarks->CurrentValue;
			$frm_sam_pbb_detail->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// accomplishment
			$frm_sam_pbb_detail->accomplishment->EditCustomAttributes = "";
			$frm_sam_pbb_detail->accomplishment->EditValue = $frm_sam_pbb_detail->accomplishment->CurrentValue;
			$frm_sam_pbb_detail->accomplishment->CssStyle = "font-weight:bold;";
			$frm_sam_pbb_detail->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$frm_sam_pbb_detail->a_numerator->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_numerator->EditValue = $frm_sam_pbb_detail->a_numerator->CurrentValue;
			$frm_sam_pbb_detail->a_numerator->ViewCustomAttributes = "";

			// a_denominator
			$frm_sam_pbb_detail->a_denominator->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_denominator->EditValue = $frm_sam_pbb_detail->a_denominator->CurrentValue;
			$frm_sam_pbb_detail->a_denominator->ViewCustomAttributes = "";

			// a_supporting_docs
			$frm_sam_pbb_detail->a_supporting_docs->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_supporting_docs->EditValue = $frm_sam_pbb_detail->a_supporting_docs->CurrentValue;
			$frm_sam_pbb_detail->a_supporting_docs->CssStyle = "font-weight:bold;";
			$frm_sam_pbb_detail->a_supporting_docs->ViewCustomAttributes = "";

			// a_remarks
			$frm_sam_pbb_detail->a_remarks->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_remarks->EditValue = $frm_sam_pbb_detail->a_remarks->CurrentValue;
			$frm_sam_pbb_detail->a_remarks->ViewCustomAttributes = "";

			// a_cutOffDate_remarks
			$frm_sam_pbb_detail->a_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_cutOffDate_remarks->EditValue = $frm_sam_pbb_detail->a_cutOffDate_remarks->CurrentValue;
			$frm_sam_pbb_detail->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// a_rating_above_90
			$frm_sam_pbb_detail->a_rating_above_90->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_rating_above_90->EditValue = up_HtmlEncode($frm_sam_pbb_detail->a_rating_above_90->CurrentValue);

			// a_rating_below_90
			$frm_sam_pbb_detail->a_rating_below_90->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_rating_below_90->EditValue = up_HtmlEncode($frm_sam_pbb_detail->a_rating_below_90->CurrentValue);

			// a_supporting_docs_comparison
			$frm_sam_pbb_detail->a_supporting_docs_comparison->EditCustomAttributes = "";
			$frm_sam_pbb_detail->a_supporting_docs_comparison->EditValue = up_HtmlEncode($frm_sam_pbb_detail->a_supporting_docs_comparison->CurrentValue);

			// Edit refer script
			// applicable

			$frm_sam_pbb_detail->applicable->HrefValue = "";

			// cu_unit_name
			$frm_sam_pbb_detail->cu_unit_name->HrefValue = "";

			// mfo_name
			$frm_sam_pbb_detail->mfo_name->HrefValue = "";

			// target
			$frm_sam_pbb_detail->target->HrefValue = "";

			// t_numerator
			$frm_sam_pbb_detail->t_numerator->HrefValue = "";

			// t_denominator
			$frm_sam_pbb_detail->t_denominator->HrefValue = "";

			// t_remarks
			$frm_sam_pbb_detail->t_remarks->HrefValue = "";

			// t_cutOffDate_remarks
			$frm_sam_pbb_detail->t_cutOffDate_remarks->HrefValue = "";

			// accomplishment
			$frm_sam_pbb_detail->accomplishment->HrefValue = "";

			// a_numerator
			$frm_sam_pbb_detail->a_numerator->HrefValue = "";

			// a_denominator
			$frm_sam_pbb_detail->a_denominator->HrefValue = "";

			// a_supporting_docs
			$frm_sam_pbb_detail->a_supporting_docs->HrefValue = "";

			// a_remarks
			$frm_sam_pbb_detail->a_remarks->HrefValue = "";

			// a_cutOffDate_remarks
			$frm_sam_pbb_detail->a_cutOffDate_remarks->HrefValue = "";

			// a_rating_above_90
			$frm_sam_pbb_detail->a_rating_above_90->HrefValue = "";

			// a_rating_below_90
			$frm_sam_pbb_detail->a_rating_below_90->HrefValue = "";

			// a_supporting_docs_comparison
			$frm_sam_pbb_detail->a_supporting_docs_comparison->HrefValue = "";
		}
		if ($frm_sam_pbb_detail->RowType == UP_ROWTYPE_ADD ||
			$frm_sam_pbb_detail->RowType == UP_ROWTYPE_EDIT ||
			$frm_sam_pbb_detail->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_sam_pbb_detail->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_sam_pbb_detail->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_pbb_detail->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_sam_pbb_detail;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckNumber($frm_sam_pbb_detail->a_rating_above_90->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_pbb_detail->a_rating_above_90->FldErrMsg());
		}
		if (!up_CheckNumber($frm_sam_pbb_detail->a_rating_below_90->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_pbb_detail->a_rating_below_90->FldErrMsg());
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
		global $conn, $Language, $Security, $frm_sam_pbb_detail;
		$DeleteRows = TRUE;
		$sSql = $frm_sam_pbb_detail->SQL();
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
				$DeleteRows = $frm_sam_pbb_detail->Row_Deleting($row);
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
				$DeleteRows = $conn->Execute($frm_sam_pbb_detail->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_sam_pbb_detail->CancelMessage <> "") {
				$this->setFailureMessage($frm_sam_pbb_detail->CancelMessage);
				$frm_sam_pbb_detail->CancelMessage = "";
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
				$frm_sam_pbb_detail->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $frm_sam_pbb_detail;
		$sFilter = $frm_sam_pbb_detail->KeyFilter();
		$frm_sam_pbb_detail->CurrentFilter = $sFilter;
		$sSql = $frm_sam_pbb_detail->SQL();
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
			$frm_sam_pbb_detail->applicable->SetDbValueDef($rsnew, $frm_sam_pbb_detail->applicable->CurrentValue, NULL, $frm_sam_pbb_detail->applicable->ReadOnly);

			// t_remarks
			$frm_sam_pbb_detail->t_remarks->SetDbValueDef($rsnew, $frm_sam_pbb_detail->t_remarks->CurrentValue, NULL, $frm_sam_pbb_detail->t_remarks->ReadOnly);

			// a_rating_above_90
			$frm_sam_pbb_detail->a_rating_above_90->SetDbValueDef($rsnew, $frm_sam_pbb_detail->a_rating_above_90->CurrentValue, NULL, $frm_sam_pbb_detail->a_rating_above_90->ReadOnly);

			// a_rating_below_90
			$frm_sam_pbb_detail->a_rating_below_90->SetDbValueDef($rsnew, $frm_sam_pbb_detail->a_rating_below_90->CurrentValue, NULL, $frm_sam_pbb_detail->a_rating_below_90->ReadOnly);

			// a_supporting_docs_comparison
			$frm_sam_pbb_detail->a_supporting_docs_comparison->SetDbValueDef($rsnew, $frm_sam_pbb_detail->a_supporting_docs_comparison->CurrentValue, NULL, $frm_sam_pbb_detail->a_supporting_docs_comparison->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_sam_pbb_detail->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_sam_pbb_detail->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_sam_pbb_detail->CancelMessage <> "") {
					$this->setFailureMessage($frm_sam_pbb_detail->CancelMessage);
					$frm_sam_pbb_detail->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_sam_pbb_detail->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $frm_sam_pbb_detail;

		// Set up foreign key field value from Session
			if ($frm_sam_pbb_detail->getCurrentMasterTable() == "frm_sam_rep_ta_form_a_0_cu") {
				$frm_sam_pbb_detail->focal_person_id->CurrentValue = $frm_sam_pbb_detail->focal_person_id->getSessionValue();
				$frm_sam_pbb_detail->mfo_sequence->CurrentValue = $frm_sam_pbb_detail->mfo_sequence->getSessionValue();
			}
		$rsnew = array();

		// applicable
		$frm_sam_pbb_detail->applicable->SetDbValueDef($rsnew, $frm_sam_pbb_detail->applicable->CurrentValue, NULL, FALSE);

		// cu_unit_name
		$frm_sam_pbb_detail->cu_unit_name->SetDbValueDef($rsnew, $frm_sam_pbb_detail->cu_unit_name->CurrentValue, NULL, FALSE);

		// mfo_name
		$frm_sam_pbb_detail->mfo_name->SetDbValueDef($rsnew, $frm_sam_pbb_detail->mfo_name->CurrentValue, NULL, FALSE);

		// target
		$frm_sam_pbb_detail->target->SetDbValueDef($rsnew, $frm_sam_pbb_detail->target->CurrentValue, NULL, FALSE);

		// t_numerator
		$frm_sam_pbb_detail->t_numerator->SetDbValueDef($rsnew, $frm_sam_pbb_detail->t_numerator->CurrentValue, NULL, FALSE);

		// t_denominator
		$frm_sam_pbb_detail->t_denominator->SetDbValueDef($rsnew, $frm_sam_pbb_detail->t_denominator->CurrentValue, NULL, FALSE);

		// t_remarks
		$frm_sam_pbb_detail->t_remarks->SetDbValueDef($rsnew, $frm_sam_pbb_detail->t_remarks->CurrentValue, NULL, FALSE);

		// t_cutOffDate_remarks
		$frm_sam_pbb_detail->t_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_sam_pbb_detail->t_cutOffDate_remarks->CurrentValue, NULL, FALSE);

		// accomplishment
		$frm_sam_pbb_detail->accomplishment->SetDbValueDef($rsnew, $frm_sam_pbb_detail->accomplishment->CurrentValue, NULL, FALSE);

		// a_numerator
		$frm_sam_pbb_detail->a_numerator->SetDbValueDef($rsnew, $frm_sam_pbb_detail->a_numerator->CurrentValue, NULL, FALSE);

		// a_denominator
		$frm_sam_pbb_detail->a_denominator->SetDbValueDef($rsnew, $frm_sam_pbb_detail->a_denominator->CurrentValue, NULL, FALSE);

		// a_supporting_docs
		$frm_sam_pbb_detail->a_supporting_docs->SetDbValueDef($rsnew, $frm_sam_pbb_detail->a_supporting_docs->CurrentValue, NULL, FALSE);

		// a_remarks
		$frm_sam_pbb_detail->a_remarks->SetDbValueDef($rsnew, $frm_sam_pbb_detail->a_remarks->CurrentValue, NULL, FALSE);

		// a_cutOffDate_remarks
		$frm_sam_pbb_detail->a_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_sam_pbb_detail->a_cutOffDate_remarks->CurrentValue, NULL, FALSE);

		// a_rating_above_90
		$frm_sam_pbb_detail->a_rating_above_90->SetDbValueDef($rsnew, $frm_sam_pbb_detail->a_rating_above_90->CurrentValue, NULL, FALSE);

		// a_rating_below_90
		$frm_sam_pbb_detail->a_rating_below_90->SetDbValueDef($rsnew, $frm_sam_pbb_detail->a_rating_below_90->CurrentValue, NULL, FALSE);

		// a_supporting_docs_comparison
		$frm_sam_pbb_detail->a_supporting_docs_comparison->SetDbValueDef($rsnew, $frm_sam_pbb_detail->a_supporting_docs_comparison->CurrentValue, NULL, FALSE);

		// focal_person_id
		if ($frm_sam_pbb_detail->focal_person_id->getSessionValue() <> "") {
			$rsnew['focal_person_id'] = $frm_sam_pbb_detail->focal_person_id->getSessionValue();
		} elseif (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['focal_person_id'] = CurrentUserID();
		}

		// mfo_sequence
		if ($frm_sam_pbb_detail->mfo_sequence->getSessionValue() <> "") {
			$rsnew['mfo_sequence'] = $frm_sam_pbb_detail->mfo_sequence->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_sam_pbb_detail->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_sam_pbb_detail->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_sam_pbb_detail->CancelMessage <> "") {
				$this->setFailureMessage($frm_sam_pbb_detail->CancelMessage);
				$frm_sam_pbb_detail->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$frm_sam_pbb_detail->pbb_id->setDbValue($conn->Insert_ID());
			$rsnew['pbb_id'] = $frm_sam_pbb_detail->pbb_id->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$frm_sam_pbb_detail->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_sam_pbb_detail;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_sam_pbb_detail->focal_person_id->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_sam_pbb_detail;

		// Hide foreign keys
		$sMasterTblVar = $frm_sam_pbb_detail->getCurrentMasterTable();
		if ($sMasterTblVar == "frm_sam_rep_ta_form_a_0_cu") {
			$frm_sam_pbb_detail->focal_person_id->Visible = FALSE;
			if ($GLOBALS["frm_sam_rep_ta_form_a_0_cu"]->EventCancelled) $frm_sam_pbb_detail->EventCancelled = TRUE;
			$frm_sam_pbb_detail->mfo_sequence->Visible = FALSE;
			if ($GLOBALS["frm_sam_rep_ta_form_a_0_cu"]->EventCancelled) $frm_sam_pbb_detail->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $frm_sam_pbb_detail->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_sam_pbb_detail->getDetailFilter(); // Get detail filter
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
