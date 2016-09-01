<?php include_once "tbl_usersinfo.php" ?>
<?php

//
// Page class
//
class cfrm_fp_rep_a_eligible_status_unit_mfo_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'frm_fp_rep_a_eligible_status_unit_mfo';

	// Page object name
	var $PageObjName = 'frm_fp_rep_a_eligible_status_unit_mfo_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_rep_a_eligible_status_unit_mfo;
		if ($frm_fp_rep_a_eligible_status_unit_mfo->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_rep_a_eligible_status_unit_mfo->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_rep_a_eligible_status_unit_mfo;
		if ($frm_fp_rep_a_eligible_status_unit_mfo->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_rep_a_eligible_status_unit_mfo->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_rep_a_eligible_status_unit_mfo->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_rep_a_eligible_status_unit_mfo_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_rep_a_eligible_status_unit_mfo)
		if (!isset($GLOBALS["frm_fp_rep_a_eligible_status_unit_mfo"])) {
			$GLOBALS["frm_fp_rep_a_eligible_status_unit_mfo"] = new cfrm_fp_rep_a_eligible_status_unit_mfo();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_rep_a_eligible_status_unit_mfo"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_rep_a_eligible_status_unit_mfo', TRUE);

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
		global $frm_fp_rep_a_eligible_status_unit_mfo;

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
			$this->Page_Terminate("frm_fp_rep_a_eligible_status_unit_mfolist.php");
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_fp_rep_a_eligible_status_unit_mfo->GridAddRowCount = $gridaddcnt;

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
		global $frm_fp_rep_a_eligible_status_unit_mfo;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_fp_rep_a_eligible_status_unit_mfo;

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
			if ($frm_fp_rep_a_eligible_status_unit_mfo->Export <> "" ||
				$frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridadd" ||
				$frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($frm_fp_rep_a_eligible_status_unit_mfo->AllowAddDeleteRow) {
				if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridadd" ||
					$frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($frm_fp_rep_a_eligible_status_unit_mfo->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_fp_rep_a_eligible_status_unit_mfo->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $frm_fp_rep_a_eligible_status_unit_mfo->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_fp_rep_a_eligible_status_unit_mfo->getDetailFilter(); // Restore detail filter

		// Add master User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			if ($frm_fp_rep_a_eligible_status_unit_mfo->getCurrentMasterTable() == "frm_fp_rep_a_eligible_status_unit")
				$this->DbMasterFilter = $frm_fp_rep_a_eligible_status_unit_mfo->AddMasterUserIDFilter($this->DbMasterFilter, "frm_fp_rep_a_eligible_status_unit"); // Add master User ID filter
		}
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_fp_rep_a_eligible_status_unit_mfo->getMasterFilter() <> "" && $frm_fp_rep_a_eligible_status_unit_mfo->getCurrentMasterTable() == "frm_fp_rep_a_eligible_status_unit") {
			global $frm_fp_rep_a_eligible_status_unit;
			$rsmaster = $frm_fp_rep_a_eligible_status_unit->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_fp_rep_a_eligible_status_unit_mfo->getReturnUrl()); // Return to caller
			} else {
				$frm_fp_rep_a_eligible_status_unit->LoadListRowValues($rsmaster);
				$frm_fp_rep_a_eligible_status_unit->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_fp_rep_a_eligible_status_unit->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_fp_rep_a_eligible_status_unit_mfo->setSessionWhere($sFilter);
		$frm_fp_rep_a_eligible_status_unit_mfo->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $frm_fp_rep_a_eligible_status_unit_mfo;
		$frm_fp_rep_a_eligible_status_unit_mfo->LastAction = $frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction; // Save last action
		$frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $frm_fp_rep_a_eligible_status_unit_mfo;
		$bGridUpdate = TRUE;

		// Get old recordset
		$frm_fp_rep_a_eligible_status_unit_mfo->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $frm_fp_rep_a_eligible_status_unit_mfo->SQL();
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
						$frm_fp_rep_a_eligible_status_unit_mfo->CurrentFilter = $frm_fp_rep_a_eligible_status_unit_mfo->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$frm_fp_rep_a_eligible_status_unit_mfo->SendEmail = FALSE; // Do not send email on update success
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
			$frm_fp_rep_a_eligible_status_unit_mfo->EventCancelled = TRUE; // Set event cancelled
			$frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $frm_fp_rep_a_eligible_status_unit_mfo;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $frm_fp_rep_a_eligible_status_unit_mfo->KeyFilter();
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
		global $frm_fp_rep_a_eligible_status_unit_mfo;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 0) {
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $frm_fp_rep_a_eligible_status_unit_mfo;
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
				$frm_fp_rep_a_eligible_status_unit_mfo->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {

					// Add filter for this record
					$sFilter = $frm_fp_rep_a_eligible_status_unit_mfo->KeyFilter();
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
			$frm_fp_rep_a_eligible_status_unit_mfo->CurrentFilter = $sWrkFilter;
			$sSql = $frm_fp_rep_a_eligible_status_unit_mfo->SQL();
			if ($rs = $conn->Execute($sSql)) {
				$rsnew = $rs->GetRows();
				$rs->Close();
			}
			$this->ClearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "") {
				$this->setFailureMessage($Language->Phrase("InsertFailed")); // Set insert failed message
			}
			$frm_fp_rep_a_eligible_status_unit_mfo->EventCancelled = TRUE; // Set event cancelled
			$frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $frm_fp_rep_a_eligible_status_unit_mfo, $objForm;
		if ($objForm->HasValue("x_cu_unit_name") && $objForm->HasValue("o_cu_unit_name") && $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CurrentValue <> $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_mfo_name_rep") && $objForm->HasValue("o_mfo_name_rep") && $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CurrentValue <> $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Participated_PI") && $objForm->HasValue("o_Participated_PI") && $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CurrentValue <> $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Not_Started_PI") && $objForm->HasValue("o_Not_Started_PI") && $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CurrentValue <> $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_z25_Not_Started_PI") && $objForm->HasValue("o_z25_Not_Started_PI") && $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CurrentValue <> $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Status") && $objForm->HasValue("o_Status") && $frm_fp_rep_a_eligible_status_unit_mfo->Status->CurrentValue <> $frm_fp_rep_a_eligible_status_unit_mfo->Status->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Not_Eligible_PI_Count") && $objForm->HasValue("o_Not_Eligible_PI_Count") && $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CurrentValue <> $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_z25_Not_Eligible_PI_Count") && $objForm->HasValue("o_z25_Not_Eligible_PI_Count") && $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CurrentValue <> $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Eligible_PI_Count") && $objForm->HasValue("o_Eligible_PI_Count") && $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CurrentValue <> $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_z25_Eligible_PI_Count") && $objForm->HasValue("o_z25_Eligible_PI_Count") && $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CurrentValue <> $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Remarks") && $objForm->HasValue("o_Remarks") && $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CurrentValue <> $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->OldValue)
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
		global $objForm, $frm_fp_rep_a_eligible_status_unit_mfo;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_fp_rep_a_eligible_status_unit_mfo;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_fp_rep_a_eligible_status_unit_mfo->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_fp_rep_a_eligible_status_unit_mfo->CurrentOrderType = @$_GET["ordertype"];
			$frm_fp_rep_a_eligible_status_unit_mfo->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_fp_rep_a_eligible_status_unit_mfo;
		$sOrderBy = $frm_fp_rep_a_eligible_status_unit_mfo->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_fp_rep_a_eligible_status_unit_mfo->SqlOrderBy() <> "") {
				$sOrderBy = $frm_fp_rep_a_eligible_status_unit_mfo->SqlOrderBy();
				$frm_fp_rep_a_eligible_status_unit_mfo->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_fp_rep_a_eligible_status_unit_mfo;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_fp_rep_a_eligible_status_unit_mfo->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_fp_rep_a_eligible_status_unit_mfo->units_id->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_fp_rep_a_eligible_status_unit_mfo->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_fp_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_fp_rep_a_eligible_status_unit_mfo;

		// "griddelete"
		if ($frm_fp_rep_a_eligible_status_unit_mfo->AllowAddDeleteRow) {
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
		global $Security, $Language, $frm_fp_rep_a_eligible_status_unit_mfo, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD)
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
		if ($frm_fp_rep_a_eligible_status_unit_mfo->AllowAddDeleteRow) {
			if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "add" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "copy" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, frm_fp_rep_a_eligible_status_unit_mfo_grid, " . $this->RowIndex . ");\">" . $Language->Phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
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
		global $Security, $Language, $frm_fp_rep_a_eligible_status_unit_mfo;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_fp_rep_a_eligible_status_unit_mfo;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_fp_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_fp_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_fp_rep_a_eligible_status_unit_mfo->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_fp_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_fp_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_fp_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_fp_rep_a_eligible_status_unit_mfo;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_fp_rep_a_eligible_status_unit_mfo;
		$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CurrentValue = NULL;
		$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->OldValue = $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CurrentValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CurrentValue = NULL;
		$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->OldValue = $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CurrentValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CurrentValue = 0;
		$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->OldValue = $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CurrentValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CurrentValue = NULL;
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->OldValue = $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CurrentValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CurrentValue = NULL;
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->OldValue = $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CurrentValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->Status->CurrentValue = NULL;
		$frm_fp_rep_a_eligible_status_unit_mfo->Status->OldValue = $frm_fp_rep_a_eligible_status_unit_mfo->Status->CurrentValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CurrentValue = NULL;
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->OldValue = $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CurrentValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CurrentValue = NULL;
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->OldValue = $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CurrentValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CurrentValue = NULL;
		$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->OldValue = $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CurrentValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CurrentValue = NULL;
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->OldValue = $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CurrentValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CurrentValue = NULL;
		$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->OldValue = $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_fp_rep_a_eligible_status_unit_mfo;
		if (!$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->FldIsDetailKey) {
			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->setFormValue($objForm->GetValue("x_cu_unit_name"));
		}
		$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->setOldValue($objForm->GetValue("o_cu_unit_name"));
		if (!$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->FldIsDetailKey) {
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->setFormValue($objForm->GetValue("x_mfo_name_rep"));
		}
		$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->setOldValue($objForm->GetValue("o_mfo_name_rep"));
		if (!$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FldIsDetailKey) {
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->setFormValue($objForm->GetValue("x_Participated_PI"));
		}
		$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->setOldValue($objForm->GetValue("o_Participated_PI"));
		if (!$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->FldIsDetailKey) {
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->setFormValue($objForm->GetValue("x_Not_Started_PI"));
		}
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->setOldValue($objForm->GetValue("o_Not_Started_PI"));
		if (!$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->FldIsDetailKey) {
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->setFormValue($objForm->GetValue("x_z25_Not_Started_PI"));
		}
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->setOldValue($objForm->GetValue("o_z25_Not_Started_PI"));
		if (!$frm_fp_rep_a_eligible_status_unit_mfo->Status->FldIsDetailKey) {
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->setFormValue($objForm->GetValue("x_Status"));
		}
		$frm_fp_rep_a_eligible_status_unit_mfo->Status->setOldValue($objForm->GetValue("o_Status"));
		if (!$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->FldIsDetailKey) {
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->setFormValue($objForm->GetValue("x_Not_Eligible_PI_Count"));
		}
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->setOldValue($objForm->GetValue("o_Not_Eligible_PI_Count"));
		if (!$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->FldIsDetailKey) {
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->setFormValue($objForm->GetValue("x_z25_Not_Eligible_PI_Count"));
		}
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->setOldValue($objForm->GetValue("o_z25_Not_Eligible_PI_Count"));
		if (!$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->FldIsDetailKey) {
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->setFormValue($objForm->GetValue("x_Eligible_PI_Count"));
		}
		$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->setOldValue($objForm->GetValue("o_Eligible_PI_Count"));
		if (!$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->FldIsDetailKey) {
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->setFormValue($objForm->GetValue("x_z25_Eligible_PI_Count"));
		}
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->setOldValue($objForm->GetValue("o_z25_Eligible_PI_Count"));
		if (!$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->FldIsDetailKey) {
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->setFormValue($objForm->GetValue("x_Remarks"));
		}
		$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->setOldValue($objForm->GetValue("o_Remarks"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_fp_rep_a_eligible_status_unit_mfo;
		$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CurrentValue = $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->FormValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CurrentValue = $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->FormValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CurrentValue = $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FormValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CurrentValue = $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->FormValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CurrentValue = $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->FormValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->Status->CurrentValue = $frm_fp_rep_a_eligible_status_unit_mfo->Status->FormValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CurrentValue = $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->FormValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CurrentValue = $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->FormValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CurrentValue = $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->FormValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CurrentValue = $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->FormValue;
		$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CurrentValue = $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_fp_rep_a_eligible_status_unit_mfo;

		// Call Recordset Selecting event
		$frm_fp_rep_a_eligible_status_unit_mfo->Recordset_Selecting($frm_fp_rep_a_eligible_status_unit_mfo->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_fp_rep_a_eligible_status_unit_mfo->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_fp_rep_a_eligible_status_unit_mfo->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_rep_a_eligible_status_unit_mfo;
		$sFilter = $frm_fp_rep_a_eligible_status_unit_mfo->KeyFilter();

		// Call Row Selecting event
		$frm_fp_rep_a_eligible_status_unit_mfo->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_rep_a_eligible_status_unit_mfo->CurrentFilter = $sFilter;
		$sSql = $frm_fp_rep_a_eligible_status_unit_mfo->SQL();
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
		global $conn, $frm_fp_rep_a_eligible_status_unit_mfo;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_rep_a_eligible_status_unit_mfo->Row_Selected($row);
		$frm_fp_rep_a_eligible_status_unit_mfo->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_rep_a_eligible_status_unit_mfo->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_fp_rep_a_eligible_status_unit_mfo->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_fp_rep_a_eligible_status_unit_mfo->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_fp_rep_a_eligible_status_unit_mfo->mfo->setDbValue($rs->fields('mfo'));
		$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$frm_fp_rep_a_eligible_status_unit_mfo->budget->setDbValue($rs->fields('budget'));
		$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->setDbValue($rs->fields('Participated PI'));
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->setDbValue($rs->fields('Not Started PI'));
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->setDbValue($rs->fields('% Not Started PI'));
		$frm_fp_rep_a_eligible_status_unit_mfo->Status->setDbValue($rs->fields('Status'));
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->setDbValue($rs->fields('Not Eligible PI Count'));
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->setDbValue($rs->fields('% Not Eligible PI Count'));
		$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->setDbValue($rs->fields('Eligible PI Count'));
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->setDbValue($rs->fields('% Eligible PI Count'));
		$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->setDbValue($rs->fields('Remarks'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_fp_rep_a_eligible_status_unit_mfo;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 0) {
		}

		// Load old recordset
		if ($bValidKey) {
			$frm_fp_rep_a_eligible_status_unit_mfo->CurrentFilter = $frm_fp_rep_a_eligible_status_unit_mfo->KeyFilter();
			$sSql = $frm_fp_rep_a_eligible_status_unit_mfo->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_rep_a_eligible_status_unit_mfo;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_fp_rep_a_eligible_status_unit_mfo->Row_Rendering();

		// Common render codes for all row types
		// focal_person_id

		$frm_fp_rep_a_eligible_status_unit_mfo->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// cu_short_name
		$frm_fp_rep_a_eligible_status_unit_mfo->cu_short_name->CellCssStyle = "white-space: nowrap;";

		// cu_sequence
		$frm_fp_rep_a_eligible_status_unit_mfo->cu_sequence->CellCssStyle = "white-space: nowrap;";

		// units_id
		$frm_fp_rep_a_eligible_status_unit_mfo->units_id->CellCssStyle = "white-space: nowrap;";

		// cu_unit_name
		$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CellCssStyle = "white-space: nowrap;";

		// mfo
		$frm_fp_rep_a_eligible_status_unit_mfo->mfo->CellCssStyle = "white-space: nowrap;";

		// mfo_name_rep
		$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CellCssStyle = "white-space: nowrap;";

		// budget
		$frm_fp_rep_a_eligible_status_unit_mfo->budget->CellCssStyle = "white-space: nowrap;";

		// Participated PI
		$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CellCssStyle = "white-space: nowrap;";

		// Not Started PI
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CellCssStyle = "white-space: nowrap;";

		// % Not Started PI
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CellCssStyle = "white-space: nowrap;";

		// Status
		$frm_fp_rep_a_eligible_status_unit_mfo->Status->CellCssStyle = "white-space: nowrap;";

		// Not Eligible PI Count
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CellCssStyle = "white-space: nowrap;";

		// % Not Eligible PI Count
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CellCssStyle = "white-space: nowrap;";

		// Eligible PI Count
		$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CellCssStyle = "white-space: nowrap;";

		// % Eligible PI Count
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CellCssStyle = "white-space: nowrap;";

		// Remarks
		$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CellCssStyle = "white-space: nowrap;";
		if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View row

			// cu_unit_name
			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->ViewValue = $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CurrentValue;
			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->ViewCustomAttributes = "";

			// mfo_name_rep
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->ViewValue = $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CurrentValue;
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->ViewCustomAttributes = "";

			// Participated PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->ViewValue = $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CurrentValue;
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->ViewCustomAttributes = "";

			// Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->ViewValue = $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CurrentValue;
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->ViewCustomAttributes = "";

			// % Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ViewValue = $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CurrentValue;
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ViewCustomAttributes = "";

			// Status
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->ViewValue = $frm_fp_rep_a_eligible_status_unit_mfo->Status->CurrentValue;
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->ViewCustomAttributes = "";

			// Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ViewValue = $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CurrentValue;
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ViewCustomAttributes = "";

			// % Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ViewValue = $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CurrentValue;
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ViewCustomAttributes = "";

			// Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ViewValue = $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CurrentValue;
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ViewCustomAttributes = "";

			// % Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ViewValue = $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CurrentValue;
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ViewCustomAttributes = "";

			// Remarks
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->ViewValue = $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CurrentValue;
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->LinkCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->HrefValue = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->TooltipValue = "";

			// mfo_name_rep
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->LinkCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->HrefValue = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->TooltipValue = "";

			// Participated PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->LinkCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->HrefValue = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->TooltipValue = "";

			// Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->LinkCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->HrefValue = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->TooltipValue = "";

			// % Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->LinkCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->HrefValue = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->TooltipValue = "";

			// Status
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->LinkCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->HrefValue = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->TooltipValue = "";

			// Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->LinkCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->HrefValue = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->TooltipValue = "";

			// % Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->LinkCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->HrefValue = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->TooltipValue = "";

			// Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->LinkCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->HrefValue = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->TooltipValue = "";

			// % Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->LinkCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->HrefValue = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->TooltipValue = "";

			// Remarks
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->LinkCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->HrefValue = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->TooltipValue = "";
		} elseif ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { // Add row

			// cu_unit_name
			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CurrentValue);

			// mfo_name_rep
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CurrentValue);

			// Participated PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CurrentValue);

			// Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CurrentValue);

			// % Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CurrentValue);

			// Status
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Status->CurrentValue);

			// Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CurrentValue);

			// % Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CurrentValue);

			// Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CurrentValue);

			// % Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CurrentValue);

			// Remarks
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CurrentValue);

			// Edit refer script
			// cu_unit_name

			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->HrefValue = "";

			// mfo_name_rep
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->HrefValue = "";

			// Participated PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->HrefValue = "";

			// Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->HrefValue = "";

			// % Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->HrefValue = "";

			// Status
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->HrefValue = "";

			// Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->HrefValue = "";

			// % Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->HrefValue = "";

			// Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->HrefValue = "";

			// % Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->HrefValue = "";

			// Remarks
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->HrefValue = "";
		} elseif ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// cu_unit_name
			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CurrentValue);

			// mfo_name_rep
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CurrentValue);

			// Participated PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CurrentValue);

			// Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CurrentValue);

			// % Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CurrentValue);

			// Status
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Status->CurrentValue);

			// Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CurrentValue);

			// % Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CurrentValue);

			// Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CurrentValue);

			// % Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CurrentValue);

			// Remarks
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->EditCustomAttributes = "";
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->EditValue = up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CurrentValue);

			// Edit refer script
			// cu_unit_name

			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->HrefValue = "";

			// mfo_name_rep
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->HrefValue = "";

			// Participated PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->HrefValue = "";

			// Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->HrefValue = "";

			// % Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->HrefValue = "";

			// Status
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->HrefValue = "";

			// Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->HrefValue = "";

			// % Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->HrefValue = "";

			// Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->HrefValue = "";

			// % Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->HrefValue = "";

			// Remarks
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->HrefValue = "";
		}
		if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD ||
			$frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT ||
			$frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_fp_rep_a_eligible_status_unit_mfo->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_rep_a_eligible_status_unit_mfo->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_fp_rep_a_eligible_status_unit_mfo;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FormValue) && $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FldCaption());
		}
		if (!up_CheckInteger($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FldErrMsg());
		}
		if (!up_CheckInteger($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_a_eligible_status_unit_mfo->Status->FormValue) && $frm_fp_rep_a_eligible_status_unit_mfo->Status->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_a_eligible_status_unit_mfo->Status->FldCaption());
		}
		if (!up_CheckInteger($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->FldErrMsg());
		}
		if (!up_CheckInteger($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->FldErrMsg());
		}
		if (!is_null($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->FormValue) && $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->FldCaption());
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
		global $conn, $Language, $Security, $frm_fp_rep_a_eligible_status_unit_mfo;
		$DeleteRows = TRUE;
		$sSql = $frm_fp_rep_a_eligible_status_unit_mfo->SQL();
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
				$DeleteRows = $frm_fp_rep_a_eligible_status_unit_mfo->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_fp_rep_a_eligible_status_unit_mfo->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_fp_rep_a_eligible_status_unit_mfo->CancelMessage <> "") {
				$this->setFailureMessage($frm_fp_rep_a_eligible_status_unit_mfo->CancelMessage);
				$frm_fp_rep_a_eligible_status_unit_mfo->CancelMessage = "";
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
				$frm_fp_rep_a_eligible_status_unit_mfo->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $frm_fp_rep_a_eligible_status_unit_mfo;
		$sFilter = $frm_fp_rep_a_eligible_status_unit_mfo->KeyFilter();
		$frm_fp_rep_a_eligible_status_unit_mfo->CurrentFilter = $sFilter;
		$sSql = $frm_fp_rep_a_eligible_status_unit_mfo->SQL();
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

			// cu_unit_name
			$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CurrentValue, NULL, $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->ReadOnly);

			// mfo_name_rep
			$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CurrentValue, NULL, $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->ReadOnly);

			// Participated PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CurrentValue, 0, $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->ReadOnly);

			// Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CurrentValue, NULL, $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->ReadOnly);

			// % Not Started PI
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CurrentValue, NULL, $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ReadOnly);

			// Status
			$frm_fp_rep_a_eligible_status_unit_mfo->Status->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->Status->CurrentValue, "", $frm_fp_rep_a_eligible_status_unit_mfo->Status->ReadOnly);

			// Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CurrentValue, NULL, $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ReadOnly);

			// % Not Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CurrentValue, NULL, $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ReadOnly);

			// Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CurrentValue, NULL, $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ReadOnly);

			// % Eligible PI Count
			$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CurrentValue, NULL, $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ReadOnly);

			// Remarks
			$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CurrentValue, "", $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_fp_rep_a_eligible_status_unit_mfo->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_fp_rep_a_eligible_status_unit_mfo->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_fp_rep_a_eligible_status_unit_mfo->CancelMessage <> "") {
					$this->setFailureMessage($frm_fp_rep_a_eligible_status_unit_mfo->CancelMessage);
					$frm_fp_rep_a_eligible_status_unit_mfo->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_fp_rep_a_eligible_status_unit_mfo->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $frm_fp_rep_a_eligible_status_unit_mfo;

		// Check if valid key values for master user
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $frm_fp_rep_a_eligible_status_unit_mfo->SqlMasterFilter_frm_fp_rep_a_eligible_status_unit();
			if (strval($frm_fp_rep_a_eligible_status_unit_mfo->units_id->CurrentValue) <> "" &&
				$frm_fp_rep_a_eligible_status_unit_mfo->getCurrentMasterTable() == "frm_fp_rep_a_eligible_status_unit") {
				$sFilter = str_replace("@units_id@", up_AdjustSql($frm_fp_rep_a_eligible_status_unit_mfo->units_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if ($sFilter <> "") {
				$rsmaster = $GLOBALS["frm_fp_rep_a_eligible_status_unit"]->LoadRs($sFilter);
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
			if ($frm_fp_rep_a_eligible_status_unit_mfo->getCurrentMasterTable() == "frm_fp_rep_a_eligible_status_unit") {
				$frm_fp_rep_a_eligible_status_unit_mfo->units_id->CurrentValue = $frm_fp_rep_a_eligible_status_unit_mfo->units_id->getSessionValue();
			}
		$rsnew = array();

		// cu_unit_name
		$frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CurrentValue, NULL, FALSE);

		// mfo_name_rep
		$frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CurrentValue, NULL, FALSE);

		// Participated PI
		$frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CurrentValue, 0, strval($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CurrentValue) == "");

		// Not Started PI
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CurrentValue, NULL, FALSE);

		// % Not Started PI
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CurrentValue, NULL, FALSE);

		// Status
		$frm_fp_rep_a_eligible_status_unit_mfo->Status->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->Status->CurrentValue, "", FALSE);

		// Not Eligible PI Count
		$frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CurrentValue, NULL, FALSE);

		// % Not Eligible PI Count
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CurrentValue, NULL, FALSE);

		// Eligible PI Count
		$frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CurrentValue, NULL, FALSE);

		// % Eligible PI Count
		$frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CurrentValue, NULL, FALSE);

		// Remarks
		$frm_fp_rep_a_eligible_status_unit_mfo->Remarks->SetDbValueDef($rsnew, $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CurrentValue, "", FALSE);

		// focal_person_id
		if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['focal_person_id'] = CurrentUserID();
		}

		// units_id
		if ($frm_fp_rep_a_eligible_status_unit_mfo->units_id->getSessionValue() <> "") {
			$rsnew['units_id'] = $frm_fp_rep_a_eligible_status_unit_mfo->units_id->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_fp_rep_a_eligible_status_unit_mfo->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_fp_rep_a_eligible_status_unit_mfo->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_fp_rep_a_eligible_status_unit_mfo->CancelMessage <> "") {
				$this->setFailureMessage($frm_fp_rep_a_eligible_status_unit_mfo->CancelMessage);
				$frm_fp_rep_a_eligible_status_unit_mfo->CancelMessage = "";
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
			$frm_fp_rep_a_eligible_status_unit_mfo->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_fp_rep_a_eligible_status_unit_mfo;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_fp_rep_a_eligible_status_unit_mfo->focal_person_id->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_fp_rep_a_eligible_status_unit_mfo;

		// Hide foreign keys
		$sMasterTblVar = $frm_fp_rep_a_eligible_status_unit_mfo->getCurrentMasterTable();
		if ($sMasterTblVar == "frm_fp_rep_a_eligible_status_unit") {
			$frm_fp_rep_a_eligible_status_unit_mfo->units_id->Visible = FALSE;
			if ($GLOBALS["frm_fp_rep_a_eligible_status_unit"]->EventCancelled) $frm_fp_rep_a_eligible_status_unit_mfo->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $frm_fp_rep_a_eligible_status_unit_mfo->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_fp_rep_a_eligible_status_unit_mfo->getDetailFilter(); // Get detail filter
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
