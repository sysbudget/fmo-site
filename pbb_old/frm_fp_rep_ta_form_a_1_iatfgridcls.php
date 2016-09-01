<?php include_once "tbl_usersinfo.php" ?>
<?php

//
// Page class
//
class cfrm_fp_rep_ta_form_a_1_iatf_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'frm_fp_rep_ta_form_a_1_iatf';

	// Page object name
	var $PageObjName = 'frm_fp_rep_ta_form_a_1_iatf_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_rep_ta_form_a_1_iatf;
		if ($frm_fp_rep_ta_form_a_1_iatf->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_rep_ta_form_a_1_iatf->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_rep_ta_form_a_1_iatf;
		if ($frm_fp_rep_ta_form_a_1_iatf->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_rep_ta_form_a_1_iatf->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_rep_ta_form_a_1_iatf->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_rep_ta_form_a_1_iatf_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_rep_ta_form_a_1_iatf)
		if (!isset($GLOBALS["frm_fp_rep_ta_form_a_1_iatf"])) {
			$GLOBALS["frm_fp_rep_ta_form_a_1_iatf"] = new cfrm_fp_rep_ta_form_a_1_iatf();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_rep_ta_form_a_1_iatf"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_rep_ta_form_a_1_iatf', TRUE);

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
		global $frm_fp_rep_ta_form_a_1_iatf;

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
			$this->Page_Terminate("frm_fp_rep_ta_form_a_1_iatflist.php");
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_fp_rep_ta_form_a_1_iatf->GridAddRowCount = $gridaddcnt;

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
		global $frm_fp_rep_ta_form_a_1_iatf;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_fp_rep_ta_form_a_1_iatf;

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
			if ($frm_fp_rep_ta_form_a_1_iatf->Export <> "" ||
				$frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridadd" ||
				$frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($frm_fp_rep_ta_form_a_1_iatf->AllowAddDeleteRow) {
				if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridadd" ||
					$frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($frm_fp_rep_ta_form_a_1_iatf->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_fp_rep_ta_form_a_1_iatf->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $frm_fp_rep_ta_form_a_1_iatf->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_fp_rep_ta_form_a_1_iatf->getDetailFilter(); // Restore detail filter

		// Add master User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			if ($frm_fp_rep_ta_form_a_1_iatf->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_1_iatf_header")
				$this->DbMasterFilter = $frm_fp_rep_ta_form_a_1_iatf->AddMasterUserIDFilter($this->DbMasterFilter, "frm_fp_rep_ta_form_a_1_iatf_header"); // Add master User ID filter
		}
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_fp_rep_ta_form_a_1_iatf->getMasterFilter() <> "" && $frm_fp_rep_ta_form_a_1_iatf->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_1_iatf_header") {
			global $frm_fp_rep_ta_form_a_1_iatf_header;
			$rsmaster = $frm_fp_rep_ta_form_a_1_iatf_header->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_fp_rep_ta_form_a_1_iatf->getReturnUrl()); // Return to caller
			} else {
				$frm_fp_rep_ta_form_a_1_iatf_header->LoadListRowValues($rsmaster);
				$frm_fp_rep_ta_form_a_1_iatf_header->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_fp_rep_ta_form_a_1_iatf_header->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_fp_rep_ta_form_a_1_iatf->setSessionWhere($sFilter);
		$frm_fp_rep_ta_form_a_1_iatf->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $frm_fp_rep_ta_form_a_1_iatf;
		$frm_fp_rep_ta_form_a_1_iatf->LastAction = $frm_fp_rep_ta_form_a_1_iatf->CurrentAction; // Save last action
		$frm_fp_rep_ta_form_a_1_iatf->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $frm_fp_rep_ta_form_a_1_iatf;
		$bGridUpdate = TRUE;

		// Get old recordset
		$frm_fp_rep_ta_form_a_1_iatf->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $frm_fp_rep_ta_form_a_1_iatf->SQL();
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
						$frm_fp_rep_ta_form_a_1_iatf->CurrentFilter = $frm_fp_rep_ta_form_a_1_iatf->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$frm_fp_rep_ta_form_a_1_iatf->SendEmail = FALSE; // Do not send email on update success
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
			$frm_fp_rep_ta_form_a_1_iatf->EventCancelled = TRUE; // Set event cancelled
			$frm_fp_rep_ta_form_a_1_iatf->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $frm_fp_rep_ta_form_a_1_iatf;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $frm_fp_rep_ta_form_a_1_iatf->KeyFilter();
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
		global $frm_fp_rep_ta_form_a_1_iatf;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 0) {
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $frm_fp_rep_ta_form_a_1_iatf;
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
				$frm_fp_rep_ta_form_a_1_iatf->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {

					// Add filter for this record
					$sFilter = $frm_fp_rep_ta_form_a_1_iatf->KeyFilter();
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
			$frm_fp_rep_ta_form_a_1_iatf->CurrentFilter = $sWrkFilter;
			$sSql = $frm_fp_rep_ta_form_a_1_iatf->SQL();
			if ($rs = $conn->Execute($sSql)) {
				$rsnew = $rs->GetRows();
				$rs->Close();
			}
			$this->ClearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "") {
				$this->setFailureMessage($Language->Phrase("InsertFailed")); // Set insert failed message
			}
			$frm_fp_rep_ta_form_a_1_iatf->EventCancelled = TRUE; // Set event cancelled
			$frm_fp_rep_ta_form_a_1_iatf->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $frm_fp_rep_ta_form_a_1_iatf, $objForm;
		if ($objForm->HasValue("x_Responsible_Bureaus_28129") && $objForm->HasValue("o_Responsible_Bureaus_28129") && $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_MFOs") && $objForm->HasValue("o_MFOs") && $frm_fp_rep_ta_form_a_1_iatf->MFOs->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->MFOs->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Performance_Indicator_1_28229") && $objForm->HasValue("o_Performance_Indicator_1_28229") && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_TARGET_for_Performance_Indicator_1_28329") && $objForm->HasValue("o_FY_2015_TARGET_for_Performance_Indicator_1_28329") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429") && $objForm->HasValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Performance_Indicator_2_28529") && $objForm->HasValue("o_Performance_Indicator_2_28529") && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_TARGET_for_Performance_Indicator_2_28629") && $objForm->HasValue("o_FY_2015_TARGET_for_Performance_Indicator_2_28629") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729") && $objForm->HasValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Performance_Indicator_3_28829") && $objForm->HasValue("o_Performance_Indicator_3_28829") && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_TARGET_for_Performance_Indicator_3_28929") && $objForm->HasValue("o_FY_2015_TARGET_for_Performance_Indicator_3_28929") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029") && $objForm->HasValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Performance_Indicator_4_281129") && $objForm->HasValue("o_Performance_Indicator_4_281129") && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_TARGET_for_Performance_Indicator_4_281229") && $objForm->HasValue("o_FY_2015_TARGET_for_Performance_Indicator_4_281229") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329") && $objForm->HasValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Performance_Indicator_5_281429") && $objForm->HasValue("o_Performance_Indicator_5_281429") && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_TARGET_for_Performance_Indicator_5_281529") && $objForm->HasValue("o_FY_2015_TARGET_for_Performance_Indicator_5_281529") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629") && $objForm->HasValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Performance_Indicator_6_281729") && $objForm->HasValue("o_Performance_Indicator_6_281729") && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_TARGET_for_Performance_Indicator_6_281829") && $objForm->HasValue("o_FY_2015_TARGET_for_Performance_Indicator_6_281829") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929") && $objForm->HasValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Performance_Indicator_7_282029") && $objForm->HasValue("o_Performance_Indicator_7_282029") && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_TARGET_for_Performance_Indicator_7_282129") && $objForm->HasValue("o_FY_2015_TARGET_for_Performance_Indicator_7_282129") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229") && $objForm->HasValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Performance_Indicator_8_282329") && $objForm->HasValue("o_Performance_Indicator_8_282329") && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_TARGET_for_Performance_Indicator_8_282429") && $objForm->HasValue("o_FY_2015_TARGET_for_Performance_Indicator_8_282429") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529") && $objForm->HasValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Performance_Indicator_9_282629") && $objForm->HasValue("o_Performance_Indicator_9_282629") && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_TARGET_for_Performance_Indicator_9_282729") && $objForm->HasValue("o_FY_2015_TARGET_for_Performance_Indicator_9_282729") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829") && $objForm->HasValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Performance_Indicator_10_282929") && $objForm->HasValue("o_Performance_Indicator_10_282929") && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_TARGET_for_Performance_Indicator_10_283029") && $objForm->HasValue("o_FY_2015_TARGET_for_Performance_Indicator_10_283029") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129") && $objForm->HasValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Performance_Indicator_11_283229") && $objForm->HasValue("o_Performance_Indicator_11_283229") && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_TARGET_for_Performance_Indicator_11_283329") && $objForm->HasValue("o_FY_2015_TARGET_for_Performance_Indicator_11_283329") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429") && $objForm->HasValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Performance_Indicator_12_283529") && $objForm->HasValue("o_Performance_Indicator_12_283529") && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_TARGET_for_Performance_Indicator_12_283629") && $objForm->HasValue("o_FY_2015_TARGET_for_Performance_Indicator_12_283629") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729") && $objForm->HasValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729") && $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CurrentValue <> $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->OldValue)
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
		global $objForm, $frm_fp_rep_ta_form_a_1_iatf;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_fp_rep_ta_form_a_1_iatf;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_fp_rep_ta_form_a_1_iatf->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_fp_rep_ta_form_a_1_iatf->CurrentOrderType = @$_GET["ordertype"];
			$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_fp_rep_ta_form_a_1_iatf;
		$sOrderBy = $frm_fp_rep_ta_form_a_1_iatf->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_fp_rep_ta_form_a_1_iatf->SqlOrderBy() <> "") {
				$sOrderBy = $frm_fp_rep_ta_form_a_1_iatf->SqlOrderBy();
				$frm_fp_rep_ta_form_a_1_iatf->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_fp_rep_ta_form_a_1_iatf;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_fp_rep_ta_form_a_1_iatf->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_fp_rep_ta_form_a_1_iatf->units_id->setSessionValue("");
				$frm_fp_rep_ta_form_a_1_iatf->focal_person_id->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_fp_rep_ta_form_a_1_iatf->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_fp_rep_ta_form_a_1_iatf;

		// "griddelete"
		if ($frm_fp_rep_ta_form_a_1_iatf->AllowAddDeleteRow) {
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
		global $Security, $Language, $frm_fp_rep_ta_form_a_1_iatf, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD)
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
		if ($frm_fp_rep_ta_form_a_1_iatf->AllowAddDeleteRow) {
			if ($frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "add" || $frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "copy" || $frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, frm_fp_rep_ta_form_a_1_iatf_grid, " . $this->RowIndex . ");\">" . $Language->Phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	function SetRecordKey(&$key, $rs) {
		$key = "";
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_fp_rep_ta_form_a_1_iatf;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_fp_rep_ta_form_a_1_iatf;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_fp_rep_ta_form_a_1_iatf->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_fp_rep_ta_form_a_1_iatf;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_fp_rep_ta_form_a_1_iatf;
		$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->MFOs->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->MFOs->OldValue = $frm_fp_rep_ta_form_a_1_iatf->MFOs->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->OldValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CurrentValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CurrentValue = NULL;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->OldValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_fp_rep_ta_form_a_1_iatf;
		if (!$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->setFormValue($objForm->GetValue("x_Responsible_Bureaus_28129"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->setOldValue($objForm->GetValue("o_Responsible_Bureaus_28129"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->MFOs->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->setFormValue($objForm->GetValue("x_MFOs"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->MFOs->setOldValue($objForm->GetValue("o_MFOs"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->setFormValue($objForm->GetValue("x_Performance_Indicator_1_28229"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->setOldValue($objForm->GetValue("o_Performance_Indicator_1_28229"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->setFormValue($objForm->GetValue("x_FY_2015_TARGET_for_Performance_Indicator_1_28329"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->setOldValue($objForm->GetValue("o_FY_2015_TARGET_for_Performance_Indicator_1_28329"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->setFormValue($objForm->GetValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->setOldValue($objForm->GetValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->setFormValue($objForm->GetValue("x_Performance_Indicator_2_28529"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->setOldValue($objForm->GetValue("o_Performance_Indicator_2_28529"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->setFormValue($objForm->GetValue("x_FY_2015_TARGET_for_Performance_Indicator_2_28629"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->setOldValue($objForm->GetValue("o_FY_2015_TARGET_for_Performance_Indicator_2_28629"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->setFormValue($objForm->GetValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->setOldValue($objForm->GetValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->setFormValue($objForm->GetValue("x_Performance_Indicator_3_28829"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->setOldValue($objForm->GetValue("o_Performance_Indicator_3_28829"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->setFormValue($objForm->GetValue("x_FY_2015_TARGET_for_Performance_Indicator_3_28929"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->setOldValue($objForm->GetValue("o_FY_2015_TARGET_for_Performance_Indicator_3_28929"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->setFormValue($objForm->GetValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->setOldValue($objForm->GetValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->setFormValue($objForm->GetValue("x_Performance_Indicator_4_281129"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->setOldValue($objForm->GetValue("o_Performance_Indicator_4_281129"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->setFormValue($objForm->GetValue("x_FY_2015_TARGET_for_Performance_Indicator_4_281229"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->setOldValue($objForm->GetValue("o_FY_2015_TARGET_for_Performance_Indicator_4_281229"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->setFormValue($objForm->GetValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->setOldValue($objForm->GetValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->setFormValue($objForm->GetValue("x_Performance_Indicator_5_281429"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->setOldValue($objForm->GetValue("o_Performance_Indicator_5_281429"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->setFormValue($objForm->GetValue("x_FY_2015_TARGET_for_Performance_Indicator_5_281529"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->setOldValue($objForm->GetValue("o_FY_2015_TARGET_for_Performance_Indicator_5_281529"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->setFormValue($objForm->GetValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->setOldValue($objForm->GetValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->setFormValue($objForm->GetValue("x_Performance_Indicator_6_281729"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->setOldValue($objForm->GetValue("o_Performance_Indicator_6_281729"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->setFormValue($objForm->GetValue("x_FY_2015_TARGET_for_Performance_Indicator_6_281829"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->setOldValue($objForm->GetValue("o_FY_2015_TARGET_for_Performance_Indicator_6_281829"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->setFormValue($objForm->GetValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->setOldValue($objForm->GetValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->setFormValue($objForm->GetValue("x_Performance_Indicator_7_282029"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->setOldValue($objForm->GetValue("o_Performance_Indicator_7_282029"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->setFormValue($objForm->GetValue("x_FY_2015_TARGET_for_Performance_Indicator_7_282129"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->setOldValue($objForm->GetValue("o_FY_2015_TARGET_for_Performance_Indicator_7_282129"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->setFormValue($objForm->GetValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->setOldValue($objForm->GetValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->setFormValue($objForm->GetValue("x_Performance_Indicator_8_282329"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->setOldValue($objForm->GetValue("o_Performance_Indicator_8_282329"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->setFormValue($objForm->GetValue("x_FY_2015_TARGET_for_Performance_Indicator_8_282429"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->setOldValue($objForm->GetValue("o_FY_2015_TARGET_for_Performance_Indicator_8_282429"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->setFormValue($objForm->GetValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->setOldValue($objForm->GetValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->setFormValue($objForm->GetValue("x_Performance_Indicator_9_282629"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->setOldValue($objForm->GetValue("o_Performance_Indicator_9_282629"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->setFormValue($objForm->GetValue("x_FY_2015_TARGET_for_Performance_Indicator_9_282729"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->setOldValue($objForm->GetValue("o_FY_2015_TARGET_for_Performance_Indicator_9_282729"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->setFormValue($objForm->GetValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->setOldValue($objForm->GetValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->setFormValue($objForm->GetValue("x_Performance_Indicator_10_282929"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->setOldValue($objForm->GetValue("o_Performance_Indicator_10_282929"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->setFormValue($objForm->GetValue("x_FY_2015_TARGET_for_Performance_Indicator_10_283029"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->setOldValue($objForm->GetValue("o_FY_2015_TARGET_for_Performance_Indicator_10_283029"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->setFormValue($objForm->GetValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->setOldValue($objForm->GetValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->setFormValue($objForm->GetValue("x_Performance_Indicator_11_283229"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->setOldValue($objForm->GetValue("o_Performance_Indicator_11_283229"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->setFormValue($objForm->GetValue("x_FY_2015_TARGET_for_Performance_Indicator_11_283329"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->setOldValue($objForm->GetValue("o_FY_2015_TARGET_for_Performance_Indicator_11_283329"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->setFormValue($objForm->GetValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->setOldValue($objForm->GetValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->setFormValue($objForm->GetValue("x_Performance_Indicator_12_283529"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->setOldValue($objForm->GetValue("o_Performance_Indicator_12_283529"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->setFormValue($objForm->GetValue("x_FY_2015_TARGET_for_Performance_Indicator_12_283629"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->setOldValue($objForm->GetValue("o_FY_2015_TARGET_for_Performance_Indicator_12_283629"));
		if (!$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->FldIsDetailKey) {
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->setFormValue($objForm->GetValue("x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729"));
		}
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->setOldValue($objForm->GetValue("o_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_fp_rep_ta_form_a_1_iatf;
		$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->MFOs->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->MFOs->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->FormValue;
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_fp_rep_ta_form_a_1_iatf;

		// Call Recordset Selecting event
		$frm_fp_rep_ta_form_a_1_iatf->Recordset_Selecting($frm_fp_rep_ta_form_a_1_iatf->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_fp_rep_ta_form_a_1_iatf->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_fp_rep_ta_form_a_1_iatf->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_rep_ta_form_a_1_iatf;
		$sFilter = $frm_fp_rep_ta_form_a_1_iatf->KeyFilter();

		// Call Row Selecting event
		$frm_fp_rep_ta_form_a_1_iatf->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_rep_ta_form_a_1_iatf->CurrentFilter = $sFilter;
		$sSql = $frm_fp_rep_ta_form_a_1_iatf->SQL();
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
		global $conn, $frm_fp_rep_ta_form_a_1_iatf;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_rep_ta_form_a_1_iatf->Row_Selected($row);
		$frm_fp_rep_ta_form_a_1_iatf->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_rep_ta_form_a_1_iatf->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_rep_ta_form_a_1_iatf->Constituent_University->setDbValue($rs->fields('Constituent University'));
		$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->setDbValue($rs->fields('Responsible Bureaus (1)'));
		$frm_fp_rep_ta_form_a_1_iatf->MFOs->setDbValue($rs->fields('MFOs'));
		$frm_fp_rep_ta_form_a_1_iatf->form_a_1_mfo->setDbValue($rs->fields('form_a_1_mfo'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->setDbValue($rs->fields('Performance Indicator 1 (2)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 1 (3)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->setDbValue($rs->fields('Performance Indicator 2 (5)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 2 (6)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->setDbValue($rs->fields('Performance Indicator 3 (8)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 3 (9)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->setDbValue($rs->fields('Performance Indicator 4 (11)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 4 (12)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->setDbValue($rs->fields('Performance Indicator 5 (14)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 5 (15)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->setDbValue($rs->fields('Performance Indicator 6 (17)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 6 (18)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->setDbValue($rs->fields('Performance Indicator 7 (20)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 7 (21)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->setDbValue($rs->fields('Performance Indicator 8 (23)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 8 (24)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->setDbValue($rs->fields('Performance Indicator 9 (26)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 9 (27)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->setDbValue($rs->fields('Performance Indicator 10 (29)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 10 (30)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->setDbValue($rs->fields('Performance Indicator 11 (32)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 11 (33)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->setDbValue($rs->fields('Performance Indicator 12 (35)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 12 (36)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_fp_rep_ta_form_a_1_iatf;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 0) {
		}

		// Load old recordset
		if ($bValidKey) {
			$frm_fp_rep_ta_form_a_1_iatf->CurrentFilter = $frm_fp_rep_ta_form_a_1_iatf->KeyFilter();
			$sSql = $frm_fp_rep_ta_form_a_1_iatf->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_rep_ta_form_a_1_iatf;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_fp_rep_ta_form_a_1_iatf->Row_Rendering();

		// Common render codes for all row types
		// units_id

		$frm_fp_rep_ta_form_a_1_iatf->units_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$frm_fp_rep_ta_form_a_1_iatf->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// Constituent University
		$frm_fp_rep_ta_form_a_1_iatf->Constituent_University->CellCssStyle = "white-space: nowrap;";

		// Responsible Bureaus (1)
		// MFOs
		// form_a_1_mfo

		$frm_fp_rep_ta_form_a_1_iatf->form_a_1_mfo->CellCssStyle = "white-space: nowrap;";

		// Performance Indicator 1 (2)
		// FY 2015 TARGET for Performance Indicator 1 (3)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
		// Performance Indicator 2 (5)
		// FY 2015 TARGET for Performance Indicator 2 (6)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
		// Performance Indicator 3 (8)
		// FY 2015 TARGET for Performance Indicator 3 (9)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
		// Performance Indicator 4 (11)
		// FY 2015 TARGET for Performance Indicator 4 (12)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
		// Performance Indicator 5 (14)
		// FY 2015 TARGET for Performance Indicator 5 (15)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
		// Performance Indicator 6 (17)
		// FY 2015 TARGET for Performance Indicator 6 (18)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
		// Performance Indicator 7 (20)
		// FY 2015 TARGET for Performance Indicator 7 (21)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
		// Performance Indicator 8 (23)
		// FY 2015 TARGET for Performance Indicator 8 (24)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
		// Performance Indicator 9 (26)
		// FY 2015 TARGET for Performance Indicator 9 (27)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
		// Performance Indicator 10 (29)
		// FY 2015 TARGET for Performance Indicator 10 (30)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
		// Performance Indicator 11 (32)
		// FY 2015 TARGET for Performance Indicator 11 (33)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
		// Performance Indicator 12 (35)
		// FY 2015 TARGET for Performance Indicator 12 (36)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)

		if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View row

			// Responsible Bureaus (1)
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ViewCustomAttributes = "";

			// MFOs
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->MFOs->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->ViewCustomAttributes = "";

			// Performance Indicator 1 (2)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 1 (3)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ViewCustomAttributes = "";

			// Performance Indicator 2 (5)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 2 (6)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ViewCustomAttributes = "";

			// Performance Indicator 3 (8)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 3 (9)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ViewCustomAttributes = "";

			// Performance Indicator 4 (11)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 4 (12)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ViewCustomAttributes = "";

			// Performance Indicator 5 (14)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 5 (15)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ViewCustomAttributes = "";

			// Performance Indicator 6 (17)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 6 (18)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ViewCustomAttributes = "";

			// Performance Indicator 7 (20)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 7 (21)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ViewCustomAttributes = "";

			// Performance Indicator 8 (23)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 8 (24)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ViewCustomAttributes = "";

			// Performance Indicator 9 (26)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 9 (27)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ViewCustomAttributes = "";

			// Performance Indicator 10 (29)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 10 (30)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ViewCustomAttributes = "";

			// Performance Indicator 11 (32)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 11 (33)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ViewCustomAttributes = "";

			// Performance Indicator 12 (35)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 12 (36)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ViewCustomAttributes = "";

			// Responsible Bureaus (1)
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->TooltipValue = "";

			// MFOs
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->TooltipValue = "";

			// Performance Indicator 1 (2)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 1 (3)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->TooltipValue = "";

			// Performance Indicator 2 (5)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 2 (6)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->TooltipValue = "";

			// Performance Indicator 3 (8)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 3 (9)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->TooltipValue = "";

			// Performance Indicator 4 (11)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 4 (12)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->TooltipValue = "";

			// Performance Indicator 5 (14)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 5 (15)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->TooltipValue = "";

			// Performance Indicator 6 (17)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 6 (18)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->TooltipValue = "";

			// Performance Indicator 7 (20)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 7 (21)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->TooltipValue = "";

			// Performance Indicator 8 (23)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 8 (24)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->TooltipValue = "";

			// Performance Indicator 9 (26)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 9 (27)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->TooltipValue = "";

			// Performance Indicator 10 (29)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 10 (30)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->TooltipValue = "";

			// Performance Indicator 11 (32)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 11 (33)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->TooltipValue = "";

			// Performance Indicator 12 (35)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 12 (36)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->TooltipValue = "";
		} elseif ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add row

			// Responsible Bureaus (1)
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CurrentValue);

			// MFOs
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->MFOs->CurrentValue);

			// Performance Indicator 1 (2)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 1 (3)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CurrentValue);

			// Performance Indicator 2 (5)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 2 (6)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CurrentValue);

			// Performance Indicator 3 (8)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 3 (9)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CurrentValue);

			// Performance Indicator 4 (11)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 4 (12)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CurrentValue);

			// Performance Indicator 5 (14)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 5 (15)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CurrentValue);

			// Performance Indicator 6 (17)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 6 (18)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CurrentValue);

			// Performance Indicator 7 (20)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 7 (21)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CurrentValue);

			// Performance Indicator 8 (23)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 8 (24)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CurrentValue);

			// Performance Indicator 9 (26)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 9 (27)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CurrentValue);

			// Performance Indicator 10 (29)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 10 (30)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CurrentValue);

			// Performance Indicator 11 (32)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 11 (33)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CurrentValue);

			// Performance Indicator 12 (35)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 12 (36)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CurrentValue);

			// Edit refer script
			// Responsible Bureaus (1)

			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->HrefValue = "";

			// MFOs
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->HrefValue = "";

			// Performance Indicator 1 (2)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 1 (3)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->HrefValue = "";

			// Performance Indicator 2 (5)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 2 (6)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->HrefValue = "";

			// Performance Indicator 3 (8)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 3 (9)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->HrefValue = "";

			// Performance Indicator 4 (11)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 4 (12)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->HrefValue = "";

			// Performance Indicator 5 (14)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 5 (15)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->HrefValue = "";

			// Performance Indicator 6 (17)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 6 (18)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->HrefValue = "";

			// Performance Indicator 7 (20)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 7 (21)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->HrefValue = "";

			// Performance Indicator 8 (23)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 8 (24)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->HrefValue = "";

			// Performance Indicator 9 (26)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 9 (27)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->HrefValue = "";

			// Performance Indicator 10 (29)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 10 (30)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->HrefValue = "";

			// Performance Indicator 11 (32)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 11 (33)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->HrefValue = "";

			// Performance Indicator 12 (35)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 12 (36)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->HrefValue = "";
		} elseif ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// Responsible Bureaus (1)
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CurrentValue);

			// MFOs
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->MFOs->CurrentValue);

			// Performance Indicator 1 (2)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 1 (3)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CurrentValue);

			// Performance Indicator 2 (5)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 2 (6)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CurrentValue);

			// Performance Indicator 3 (8)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 3 (9)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CurrentValue);

			// Performance Indicator 4 (11)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 4 (12)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CurrentValue);

			// Performance Indicator 5 (14)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 5 (15)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CurrentValue);

			// Performance Indicator 6 (17)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 6 (18)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CurrentValue);

			// Performance Indicator 7 (20)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 7 (21)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CurrentValue);

			// Performance Indicator 8 (23)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 8 (24)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CurrentValue);

			// Performance Indicator 9 (26)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 9 (27)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CurrentValue);

			// Performance Indicator 10 (29)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 10 (30)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CurrentValue);

			// Performance Indicator 11 (32)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 11 (33)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CurrentValue);

			// Performance Indicator 12 (35)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CurrentValue);

			// FY 2015 TARGET for Performance Indicator 12 (36)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CurrentValue);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->EditCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->EditValue = up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CurrentValue);

			// Edit refer script
			// Responsible Bureaus (1)

			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->HrefValue = "";

			// MFOs
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->HrefValue = "";

			// Performance Indicator 1 (2)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 1 (3)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->HrefValue = "";

			// Performance Indicator 2 (5)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 2 (6)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->HrefValue = "";

			// Performance Indicator 3 (8)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 3 (9)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->HrefValue = "";

			// Performance Indicator 4 (11)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 4 (12)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->HrefValue = "";

			// Performance Indicator 5 (14)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 5 (15)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->HrefValue = "";

			// Performance Indicator 6 (17)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 6 (18)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->HrefValue = "";

			// Performance Indicator 7 (20)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 7 (21)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->HrefValue = "";

			// Performance Indicator 8 (23)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 8 (24)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->HrefValue = "";

			// Performance Indicator 9 (26)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 9 (27)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->HrefValue = "";

			// Performance Indicator 10 (29)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 10 (30)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->HrefValue = "";

			// Performance Indicator 11 (32)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 11 (33)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->HrefValue = "";

			// Performance Indicator 12 (35)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->HrefValue = "";

			// FY 2015 TARGET for Performance Indicator 12 (36)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->HrefValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->HrefValue = "";
		}
		if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD ||
			$frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT ||
			$frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_fp_rep_ta_form_a_1_iatf->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_fp_rep_ta_form_a_1_iatf->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_rep_ta_form_a_1_iatf->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_fp_rep_ta_form_a_1_iatf;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->FormValue) && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->FldCaption());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->FormValue) && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->FldCaption());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->FormValue) && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->FldCaption());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->FormValue) && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->FldCaption());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->FormValue) && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->FldCaption());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->FormValue) && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->FldCaption());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->FormValue) && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->FldCaption());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->FormValue) && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->FldCaption());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->FormValue) && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->FldCaption());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->FormValue) && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->FldCaption());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->FormValue) && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->FldCaption());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->FormValue) && $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->FldCaption());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->FldErrMsg());
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
		global $conn, $Language, $Security, $frm_fp_rep_ta_form_a_1_iatf;
		$DeleteRows = TRUE;
		$sSql = $frm_fp_rep_ta_form_a_1_iatf->SQL();
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
				$DeleteRows = $frm_fp_rep_ta_form_a_1_iatf->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_fp_rep_ta_form_a_1_iatf->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_fp_rep_ta_form_a_1_iatf->CancelMessage <> "") {
				$this->setFailureMessage($frm_fp_rep_ta_form_a_1_iatf->CancelMessage);
				$frm_fp_rep_ta_form_a_1_iatf->CancelMessage = "";
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
				$frm_fp_rep_ta_form_a_1_iatf->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $frm_fp_rep_ta_form_a_1_iatf;
		$sFilter = $frm_fp_rep_ta_form_a_1_iatf->KeyFilter();
		$frm_fp_rep_ta_form_a_1_iatf->CurrentFilter = $sFilter;
		$sSql = $frm_fp_rep_ta_form_a_1_iatf->SQL();
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

			// Responsible Bureaus (1)
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ReadOnly);

			// MFOs
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->MFOs->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->MFOs->ReadOnly);

			// Performance Indicator 1 (2)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CurrentValue, "", $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ReadOnly);

			// FY 2015 TARGET for Performance Indicator 1 (3)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ReadOnly);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ReadOnly);

			// Performance Indicator 2 (5)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CurrentValue, "", $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ReadOnly);

			// FY 2015 TARGET for Performance Indicator 2 (6)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ReadOnly);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ReadOnly);

			// Performance Indicator 3 (8)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CurrentValue, "", $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ReadOnly);

			// FY 2015 TARGET for Performance Indicator 3 (9)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ReadOnly);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ReadOnly);

			// Performance Indicator 4 (11)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CurrentValue, "", $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ReadOnly);

			// FY 2015 TARGET for Performance Indicator 4 (12)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ReadOnly);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ReadOnly);

			// Performance Indicator 5 (14)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CurrentValue, "", $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ReadOnly);

			// FY 2015 TARGET for Performance Indicator 5 (15)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ReadOnly);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ReadOnly);

			// Performance Indicator 6 (17)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CurrentValue, "", $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ReadOnly);

			// FY 2015 TARGET for Performance Indicator 6 (18)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ReadOnly);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ReadOnly);

			// Performance Indicator 7 (20)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CurrentValue, "", $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ReadOnly);

			// FY 2015 TARGET for Performance Indicator 7 (21)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ReadOnly);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ReadOnly);

			// Performance Indicator 8 (23)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CurrentValue, "", $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ReadOnly);

			// FY 2015 TARGET for Performance Indicator 8 (24)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ReadOnly);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ReadOnly);

			// Performance Indicator 9 (26)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CurrentValue, "", $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ReadOnly);

			// FY 2015 TARGET for Performance Indicator 9 (27)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ReadOnly);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ReadOnly);

			// Performance Indicator 10 (29)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CurrentValue, "", $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ReadOnly);

			// FY 2015 TARGET for Performance Indicator 10 (30)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ReadOnly);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ReadOnly);

			// Performance Indicator 11 (32)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CurrentValue, "", $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ReadOnly);

			// FY 2015 TARGET for Performance Indicator 11 (33)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ReadOnly);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ReadOnly);

			// Performance Indicator 12 (35)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CurrentValue, "", $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ReadOnly);

			// FY 2015 TARGET for Performance Indicator 12 (36)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ReadOnly);

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CurrentValue, NULL, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_fp_rep_ta_form_a_1_iatf->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_fp_rep_ta_form_a_1_iatf->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_fp_rep_ta_form_a_1_iatf->CancelMessage <> "") {
					$this->setFailureMessage($frm_fp_rep_ta_form_a_1_iatf->CancelMessage);
					$frm_fp_rep_ta_form_a_1_iatf->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_fp_rep_ta_form_a_1_iatf->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $frm_fp_rep_ta_form_a_1_iatf;

		// Check if valid key values for master user
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $frm_fp_rep_ta_form_a_1_iatf->SqlMasterFilter_frm_fp_rep_ta_form_a_1_iatf_header();
			if (strval($frm_fp_rep_ta_form_a_1_iatf->units_id->CurrentValue) <> "" &&
				$frm_fp_rep_ta_form_a_1_iatf->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_1_iatf_header") {
				$sFilter = str_replace("@units_id@", up_AdjustSql($frm_fp_rep_ta_form_a_1_iatf->units_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if (strval($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->CurrentValue) <> "" &&
				$frm_fp_rep_ta_form_a_1_iatf->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_1_iatf_header") {
				$sFilter = str_replace("@focal_person_id@", up_AdjustSql($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if ($sFilter <> "") {
				$rsmaster = $GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->LoadRs($sFilter);
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
			if ($frm_fp_rep_ta_form_a_1_iatf->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_1_iatf_header") {
				$frm_fp_rep_ta_form_a_1_iatf->units_id->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->units_id->getSessionValue();
				$frm_fp_rep_ta_form_a_1_iatf->focal_person_id->CurrentValue = $frm_fp_rep_ta_form_a_1_iatf->focal_person_id->getSessionValue();
			}
		$rsnew = array();

		// Responsible Bureaus (1)
		$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CurrentValue, NULL, FALSE);

		// MFOs
		$frm_fp_rep_ta_form_a_1_iatf->MFOs->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->MFOs->CurrentValue, NULL, FALSE);

		// Performance Indicator 1 (2)
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CurrentValue, "", FALSE);

		// FY 2015 TARGET for Performance Indicator 1 (3)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CurrentValue, NULL, FALSE);

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CurrentValue, NULL, FALSE);

		// Performance Indicator 2 (5)
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CurrentValue, "", FALSE);

		// FY 2015 TARGET for Performance Indicator 2 (6)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CurrentValue, NULL, FALSE);

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CurrentValue, NULL, FALSE);

		// Performance Indicator 3 (8)
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CurrentValue, "", FALSE);

		// FY 2015 TARGET for Performance Indicator 3 (9)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CurrentValue, NULL, FALSE);

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CurrentValue, NULL, FALSE);

		// Performance Indicator 4 (11)
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CurrentValue, "", FALSE);

		// FY 2015 TARGET for Performance Indicator 4 (12)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CurrentValue, NULL, FALSE);

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CurrentValue, NULL, FALSE);

		// Performance Indicator 5 (14)
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CurrentValue, "", FALSE);

		// FY 2015 TARGET for Performance Indicator 5 (15)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CurrentValue, NULL, FALSE);

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CurrentValue, NULL, FALSE);

		// Performance Indicator 6 (17)
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CurrentValue, "", FALSE);

		// FY 2015 TARGET for Performance Indicator 6 (18)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CurrentValue, NULL, FALSE);

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CurrentValue, NULL, FALSE);

		// Performance Indicator 7 (20)
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CurrentValue, "", FALSE);

		// FY 2015 TARGET for Performance Indicator 7 (21)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CurrentValue, NULL, FALSE);

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CurrentValue, NULL, FALSE);

		// Performance Indicator 8 (23)
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CurrentValue, "", FALSE);

		// FY 2015 TARGET for Performance Indicator 8 (24)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CurrentValue, NULL, FALSE);

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CurrentValue, NULL, FALSE);

		// Performance Indicator 9 (26)
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CurrentValue, "", FALSE);

		// FY 2015 TARGET for Performance Indicator 9 (27)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CurrentValue, NULL, FALSE);

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CurrentValue, NULL, FALSE);

		// Performance Indicator 10 (29)
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CurrentValue, "", FALSE);

		// FY 2015 TARGET for Performance Indicator 10 (30)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CurrentValue, NULL, FALSE);

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CurrentValue, NULL, FALSE);

		// Performance Indicator 11 (32)
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CurrentValue, "", FALSE);

		// FY 2015 TARGET for Performance Indicator 11 (33)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CurrentValue, NULL, FALSE);

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CurrentValue, NULL, FALSE);

		// Performance Indicator 12 (35)
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CurrentValue, "", FALSE);

		// FY 2015 TARGET for Performance Indicator 12 (36)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CurrentValue, NULL, FALSE);

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->SetDbValueDef($rsnew, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CurrentValue, NULL, FALSE);

		// units_id
		if ($frm_fp_rep_ta_form_a_1_iatf->units_id->getSessionValue() <> "") {
			$rsnew['units_id'] = $frm_fp_rep_ta_form_a_1_iatf->units_id->getSessionValue();
		}

		// focal_person_id
		if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->getSessionValue() <> "") {
			$rsnew['focal_person_id'] = $frm_fp_rep_ta_form_a_1_iatf->focal_person_id->getSessionValue();
		} elseif (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['focal_person_id'] = CurrentUserID();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_fp_rep_ta_form_a_1_iatf->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_fp_rep_ta_form_a_1_iatf->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_fp_rep_ta_form_a_1_iatf->CancelMessage <> "") {
				$this->setFailureMessage($frm_fp_rep_ta_form_a_1_iatf->CancelMessage);
				$frm_fp_rep_ta_form_a_1_iatf->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$frm_fp_rep_ta_form_a_1_iatf->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_fp_rep_ta_form_a_1_iatf;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_fp_rep_ta_form_a_1_iatf;

		// Hide foreign keys
		$sMasterTblVar = $frm_fp_rep_ta_form_a_1_iatf->getCurrentMasterTable();
		if ($sMasterTblVar == "frm_fp_rep_ta_form_a_1_iatf_header") {
			$frm_fp_rep_ta_form_a_1_iatf->units_id->Visible = FALSE;
			if ($GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->EventCancelled) $frm_fp_rep_ta_form_a_1_iatf->EventCancelled = TRUE;
			$frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible = FALSE;
			if ($GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->EventCancelled) $frm_fp_rep_ta_form_a_1_iatf->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $frm_fp_rep_ta_form_a_1_iatf->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_fp_rep_ta_form_a_1_iatf->getDetailFilter(); // Get detail filter
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
