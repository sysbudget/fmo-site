<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php

//
// Page class
//
class cfrm_1_t_du_contributor_pi_status_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'frm_1_t_du_contributor_pi_status';

	// Page object name
	var $PageObjName = 'frm_1_t_du_contributor_pi_status_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_1_t_du_contributor_pi_status;
		if ($frm_1_t_du_contributor_pi_status->UseTokenInUrl) $PageUrl .= "t=" . $frm_1_t_du_contributor_pi_status->TableVar . "&"; // Add page token
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
		global $objForm, $frm_1_t_du_contributor_pi_status;
		if ($frm_1_t_du_contributor_pi_status->UseTokenInUrl) {
			if ($objForm)
				return ($frm_1_t_du_contributor_pi_status->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_1_t_du_contributor_pi_status->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_1_t_du_contributor_pi_status_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_1_t_du_contributor_pi_status)
		if (!isset($GLOBALS["frm_1_t_du_contributor_pi_status"])) {
			$GLOBALS["frm_1_t_du_contributor_pi_status"] = new cfrm_1_t_du_contributor_pi_status();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["frm_1_t_du_contributor_pi_status"];
		}

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_1_t_du_contributor_pi_status', TRUE);

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
		global $frm_1_t_du_contributor_pi_status;

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
			$this->Page_Terminate("frm_1_t_du_contributor_pi_statuslist.php");
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_1_t_du_contributor_pi_status->GridAddRowCount = $gridaddcnt;

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
		global $frm_1_t_du_contributor_pi_status;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_1_t_du_contributor_pi_status;

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
			if ($frm_1_t_du_contributor_pi_status->Export <> "" ||
				$frm_1_t_du_contributor_pi_status->CurrentAction == "gridadd" ||
				$frm_1_t_du_contributor_pi_status->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($frm_1_t_du_contributor_pi_status->AllowAddDeleteRow) {
				if ($frm_1_t_du_contributor_pi_status->CurrentAction == "gridadd" ||
					$frm_1_t_du_contributor_pi_status->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($frm_1_t_du_contributor_pi_status->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_1_t_du_contributor_pi_status->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $frm_1_t_du_contributor_pi_status->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_1_t_du_contributor_pi_status->getDetailFilter(); // Restore detail filter

		// Add master User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			if ($frm_1_t_du_contributor_pi_status->getCurrentMasterTable() == "frm_1_t_du_contributor_mfo_status")
				$this->DbMasterFilter = $frm_1_t_du_contributor_pi_status->AddMasterUserIDFilter($this->DbMasterFilter, "frm_1_t_du_contributor_mfo_status"); // Add master User ID filter
		}
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_1_t_du_contributor_pi_status->getMasterFilter() <> "" && $frm_1_t_du_contributor_pi_status->getCurrentMasterTable() == "frm_1_t_du_contributor_mfo_status") {
			global $frm_1_t_du_contributor_mfo_status;
			$rsmaster = $frm_1_t_du_contributor_mfo_status->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_1_t_du_contributor_pi_status->getReturnUrl()); // Return to caller
			} else {
				$frm_1_t_du_contributor_mfo_status->LoadListRowValues($rsmaster);
				$frm_1_t_du_contributor_mfo_status->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_1_t_du_contributor_mfo_status->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_1_t_du_contributor_pi_status->setSessionWhere($sFilter);
		$frm_1_t_du_contributor_pi_status->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $frm_1_t_du_contributor_pi_status;
		$frm_1_t_du_contributor_pi_status->LastAction = $frm_1_t_du_contributor_pi_status->CurrentAction; // Save last action
		$frm_1_t_du_contributor_pi_status->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $frm_1_t_du_contributor_pi_status;
		$bGridUpdate = TRUE;

		// Get old recordset
		$frm_1_t_du_contributor_pi_status->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $frm_1_t_du_contributor_pi_status->SQL();
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
						$frm_1_t_du_contributor_pi_status->CurrentFilter = $frm_1_t_du_contributor_pi_status->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$frm_1_t_du_contributor_pi_status->SendEmail = FALSE; // Do not send email on update success
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
			$frm_1_t_du_contributor_pi_status->EventCancelled = TRUE; // Set event cancelled
			$frm_1_t_du_contributor_pi_status->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $frm_1_t_du_contributor_pi_status;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $frm_1_t_du_contributor_pi_status->KeyFilter();
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
		global $frm_1_t_du_contributor_pi_status;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 0) {
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $frm_1_t_du_contributor_pi_status;
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
				$frm_1_t_du_contributor_pi_status->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {

					// Add filter for this record
					$sFilter = $frm_1_t_du_contributor_pi_status->KeyFilter();
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
			$frm_1_t_du_contributor_pi_status->CurrentFilter = $sWrkFilter;
			$sSql = $frm_1_t_du_contributor_pi_status->SQL();
			if ($rs = $conn->Execute($sSql)) {
				$rsnew = $rs->GetRows();
				$rs->Close();
			}
			$this->ClearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "") {
				$this->setFailureMessage($Language->Phrase("InsertFailed")); // Set insert failed message
			}
			$frm_1_t_du_contributor_pi_status->EventCancelled = TRUE; // Set event cancelled
			$frm_1_t_du_contributor_pi_status->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $frm_1_t_du_contributor_pi_status, $objForm;
		if ($objForm->HasValue("x_Delivery_Unit") && $objForm->HasValue("o_Delivery_Unit") && $frm_1_t_du_contributor_pi_status->Delivery_Unit->CurrentValue <> $frm_1_t_du_contributor_pi_status->Delivery_Unit->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Contributing_Unit") && $objForm->HasValue("o_Contributing_Unit") && $frm_1_t_du_contributor_pi_status->Contributing_Unit->CurrentValue <> $frm_1_t_du_contributor_pi_status->Contributing_Unit->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_MFO") && $objForm->HasValue("o_MFO") && $frm_1_t_du_contributor_pi_status->MFO->CurrentValue <> $frm_1_t_du_contributor_pi_status->MFO->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_PI_Count_per_MFO") && $objForm->HasValue("o_PI_Count_per_MFO") && $frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->CurrentValue <> $frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Not_Applicable_PI_Count") && $objForm->HasValue("o_Not_Applicable_PI_Count") && $frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->CurrentValue <> $frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Completed_Target_PI_Count") && $objForm->HasValue("o_Completed_Target_PI_Count") && $frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->CurrentValue <> $frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_No_Target_PI_Count") && $objForm->HasValue("o_No_Target_PI_Count") && $frm_1_t_du_contributor_pi_status->No_Target_PI_Count->CurrentValue <> $frm_1_t_du_contributor_pi_status->No_Target_PI_Count->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Remarks") && $objForm->HasValue("o_Remarks") && $frm_1_t_du_contributor_pi_status->Remarks->CurrentValue <> $frm_1_t_du_contributor_pi_status->Remarks->OldValue)
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
		global $objForm, $frm_1_t_du_contributor_pi_status;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_1_t_du_contributor_pi_status;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_1_t_du_contributor_pi_status->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_1_t_du_contributor_pi_status->CurrentOrderType = @$_GET["ordertype"];
			$frm_1_t_du_contributor_pi_status->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_1_t_du_contributor_pi_status;
		$sOrderBy = $frm_1_t_du_contributor_pi_status->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_1_t_du_contributor_pi_status->SqlOrderBy() <> "") {
				$sOrderBy = $frm_1_t_du_contributor_pi_status->SqlOrderBy();
				$frm_1_t_du_contributor_pi_status->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_1_t_du_contributor_pi_status;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_1_t_du_contributor_pi_status->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_1_t_du_contributor_pi_status->unit_contributor_id->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_1_t_du_contributor_pi_status->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_1_t_du_contributor_pi_status->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_1_t_du_contributor_pi_status;

		// "griddelete"
		if ($frm_1_t_du_contributor_pi_status->AllowAddDeleteRow) {
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
		global $Security, $Language, $frm_1_t_du_contributor_pi_status, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($frm_1_t_du_contributor_pi_status->RowType == UP_ROWTYPE_ADD)
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
		if ($frm_1_t_du_contributor_pi_status->AllowAddDeleteRow) {
			if ($frm_1_t_du_contributor_pi_status->CurrentMode == "add" || $frm_1_t_du_contributor_pi_status->CurrentMode == "copy" || $frm_1_t_du_contributor_pi_status->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, frm_1_t_du_contributor_pi_status_grid, " . $this->RowIndex . ");\">" . $Language->Phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($frm_1_t_du_contributor_pi_status->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
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
		global $Security, $Language, $frm_1_t_du_contributor_pi_status;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_1_t_du_contributor_pi_status;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_1_t_du_contributor_pi_status->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_1_t_du_contributor_pi_status->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_1_t_du_contributor_pi_status->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_1_t_du_contributor_pi_status->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_1_t_du_contributor_pi_status->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_1_t_du_contributor_pi_status->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_1_t_du_contributor_pi_status;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_1_t_du_contributor_pi_status;
		$frm_1_t_du_contributor_pi_status->Delivery_Unit->CurrentValue = NULL;
		$frm_1_t_du_contributor_pi_status->Delivery_Unit->OldValue = $frm_1_t_du_contributor_pi_status->Delivery_Unit->CurrentValue;
		$frm_1_t_du_contributor_pi_status->Contributing_Unit->CurrentValue = NULL;
		$frm_1_t_du_contributor_pi_status->Contributing_Unit->OldValue = $frm_1_t_du_contributor_pi_status->Contributing_Unit->CurrentValue;
		$frm_1_t_du_contributor_pi_status->MFO->CurrentValue = NULL;
		$frm_1_t_du_contributor_pi_status->MFO->OldValue = $frm_1_t_du_contributor_pi_status->MFO->CurrentValue;
		$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->CurrentValue = NULL;
		$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->OldValue = $frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->CurrentValue;
		$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->CurrentValue = NULL;
		$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->OldValue = $frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->CurrentValue;
		$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->CurrentValue = NULL;
		$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->OldValue = $frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->CurrentValue;
		$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->CurrentValue = NULL;
		$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->OldValue = $frm_1_t_du_contributor_pi_status->No_Target_PI_Count->CurrentValue;
		$frm_1_t_du_contributor_pi_status->Remarks->CurrentValue = NULL;
		$frm_1_t_du_contributor_pi_status->Remarks->OldValue = $frm_1_t_du_contributor_pi_status->Remarks->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_1_t_du_contributor_pi_status;
		if (!$frm_1_t_du_contributor_pi_status->Delivery_Unit->FldIsDetailKey) {
			$frm_1_t_du_contributor_pi_status->Delivery_Unit->setFormValue($objForm->GetValue("x_Delivery_Unit"));
		}
		$frm_1_t_du_contributor_pi_status->Delivery_Unit->setOldValue($objForm->GetValue("o_Delivery_Unit"));
		if (!$frm_1_t_du_contributor_pi_status->Contributing_Unit->FldIsDetailKey) {
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->setFormValue($objForm->GetValue("x_Contributing_Unit"));
		}
		$frm_1_t_du_contributor_pi_status->Contributing_Unit->setOldValue($objForm->GetValue("o_Contributing_Unit"));
		if (!$frm_1_t_du_contributor_pi_status->MFO->FldIsDetailKey) {
			$frm_1_t_du_contributor_pi_status->MFO->setFormValue($objForm->GetValue("x_MFO"));
		}
		$frm_1_t_du_contributor_pi_status->MFO->setOldValue($objForm->GetValue("o_MFO"));
		if (!$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->FldIsDetailKey) {
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->setFormValue($objForm->GetValue("x_PI_Count_per_MFO"));
		}
		$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->setOldValue($objForm->GetValue("o_PI_Count_per_MFO"));
		if (!$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->FldIsDetailKey) {
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->setFormValue($objForm->GetValue("x_Not_Applicable_PI_Count"));
		}
		$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->setOldValue($objForm->GetValue("o_Not_Applicable_PI_Count"));
		if (!$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->FldIsDetailKey) {
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->setFormValue($objForm->GetValue("x_Completed_Target_PI_Count"));
		}
		$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->setOldValue($objForm->GetValue("o_Completed_Target_PI_Count"));
		if (!$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->FldIsDetailKey) {
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->setFormValue($objForm->GetValue("x_No_Target_PI_Count"));
		}
		$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->setOldValue($objForm->GetValue("o_No_Target_PI_Count"));
		if (!$frm_1_t_du_contributor_pi_status->Remarks->FldIsDetailKey) {
			$frm_1_t_du_contributor_pi_status->Remarks->setFormValue($objForm->GetValue("x_Remarks"));
		}
		$frm_1_t_du_contributor_pi_status->Remarks->setOldValue($objForm->GetValue("o_Remarks"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_1_t_du_contributor_pi_status;
		$frm_1_t_du_contributor_pi_status->Delivery_Unit->CurrentValue = $frm_1_t_du_contributor_pi_status->Delivery_Unit->FormValue;
		$frm_1_t_du_contributor_pi_status->Contributing_Unit->CurrentValue = $frm_1_t_du_contributor_pi_status->Contributing_Unit->FormValue;
		$frm_1_t_du_contributor_pi_status->MFO->CurrentValue = $frm_1_t_du_contributor_pi_status->MFO->FormValue;
		$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->CurrentValue = $frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->FormValue;
		$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->CurrentValue = $frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->FormValue;
		$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->CurrentValue = $frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->FormValue;
		$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->CurrentValue = $frm_1_t_du_contributor_pi_status->No_Target_PI_Count->FormValue;
		$frm_1_t_du_contributor_pi_status->Remarks->CurrentValue = $frm_1_t_du_contributor_pi_status->Remarks->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_1_t_du_contributor_pi_status;

		// Call Recordset Selecting event
		$frm_1_t_du_contributor_pi_status->Recordset_Selecting($frm_1_t_du_contributor_pi_status->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_1_t_du_contributor_pi_status->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_1_t_du_contributor_pi_status->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_1_t_du_contributor_pi_status;
		$sFilter = $frm_1_t_du_contributor_pi_status->KeyFilter();

		// Call Row Selecting event
		$frm_1_t_du_contributor_pi_status->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_1_t_du_contributor_pi_status->CurrentFilter = $sFilter;
		$sSql = $frm_1_t_du_contributor_pi_status->SQL();
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
		global $conn, $frm_1_t_du_contributor_pi_status;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_1_t_du_contributor_pi_status->Row_Selected($row);
		$frm_1_t_du_contributor_pi_status->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_1_t_du_contributor_pi_status->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_1_t_du_contributor_pi_status->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_1_t_du_contributor_pi_status->unit_contributor_id->setDbValue($rs->fields('unit_contributor_id'));
		$frm_1_t_du_contributor_pi_status->CU->setDbValue($rs->fields('CU'));
		$frm_1_t_du_contributor_pi_status->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$frm_1_t_du_contributor_pi_status->Contributing_Unit->setDbValue($rs->fields('Contributing Unit'));
		$frm_1_t_du_contributor_pi_status->MFO_SEQ->setDbValue($rs->fields('MFO SEQ'));
		$frm_1_t_du_contributor_pi_status->MFO->setDbValue($rs->fields('MFO'));
		$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->setDbValue($rs->fields('PI Count per MFO'));
		$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->setDbValue($rs->fields('Not Applicable PI Count'));
		$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->setDbValue($rs->fields('Completed Target PI Count'));
		$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->setDbValue($rs->fields('No Target PI Count'));
		$frm_1_t_du_contributor_pi_status->Remarks->setDbValue($rs->fields('Remarks'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_1_t_du_contributor_pi_status;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 0) {
		}

		// Load old recordset
		if ($bValidKey) {
			$frm_1_t_du_contributor_pi_status->CurrentFilter = $frm_1_t_du_contributor_pi_status->KeyFilter();
			$sSql = $frm_1_t_du_contributor_pi_status->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_1_t_du_contributor_pi_status;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_1_t_du_contributor_pi_status->Row_Rendering();

		// Common render codes for all row types
		// cu_sequence
		// focal_person_id
		// unit_delivery_id
		// unit_contributor_id
		// CU
		// Delivery Unit

		$frm_1_t_du_contributor_pi_status->Delivery_Unit->CellCssStyle = "white-space: nowrap;";

		// Contributing Unit
		$frm_1_t_du_contributor_pi_status->Contributing_Unit->CellCssStyle = "white-space: nowrap;";

		// MFO SEQ
		// MFO

		$frm_1_t_du_contributor_pi_status->MFO->CellCssStyle = "white-space: nowrap;";

		// PI Count per MFO
		// Not Applicable PI Count
		// Completed Target PI Count
		// No Target PI Count
		// Remarks

		$frm_1_t_du_contributor_pi_status->Remarks->CellCssStyle = "white-space: nowrap;";
		if ($frm_1_t_du_contributor_pi_status->RowType == UP_ROWTYPE_VIEW) { // View row

			// Delivery Unit
			$frm_1_t_du_contributor_pi_status->Delivery_Unit->ViewValue = $frm_1_t_du_contributor_pi_status->Delivery_Unit->CurrentValue;
			$frm_1_t_du_contributor_pi_status->Delivery_Unit->ViewCustomAttributes = "";

			// Contributing Unit
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->ViewValue = $frm_1_t_du_contributor_pi_status->Contributing_Unit->CurrentValue;
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->ViewCustomAttributes = "";

			// MFO
			$frm_1_t_du_contributor_pi_status->MFO->ViewValue = $frm_1_t_du_contributor_pi_status->MFO->CurrentValue;
			$frm_1_t_du_contributor_pi_status->MFO->ViewCustomAttributes = "";

			// PI Count per MFO
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->ViewValue = $frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->CurrentValue;
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->ViewCustomAttributes = "";

			// Not Applicable PI Count
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->ViewValue = $frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->CurrentValue;
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->ViewCustomAttributes = "";

			// Completed Target PI Count
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->ViewValue = $frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->CurrentValue;
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->ViewCustomAttributes = "";

			// No Target PI Count
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->ViewValue = $frm_1_t_du_contributor_pi_status->No_Target_PI_Count->CurrentValue;
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->ViewCustomAttributes = "";

			// Remarks
			$frm_1_t_du_contributor_pi_status->Remarks->ViewValue = $frm_1_t_du_contributor_pi_status->Remarks->CurrentValue;
			$frm_1_t_du_contributor_pi_status->Remarks->ViewCustomAttributes = "";

			// Delivery Unit
			$frm_1_t_du_contributor_pi_status->Delivery_Unit->LinkCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Delivery_Unit->HrefValue = "";
			$frm_1_t_du_contributor_pi_status->Delivery_Unit->TooltipValue = "";

			// Contributing Unit
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->LinkCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->HrefValue = "";
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->TooltipValue = "";

			// MFO
			$frm_1_t_du_contributor_pi_status->MFO->LinkCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->MFO->HrefValue = "";
			$frm_1_t_du_contributor_pi_status->MFO->TooltipValue = "";

			// PI Count per MFO
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->LinkCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->HrefValue = "";
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->TooltipValue = "";

			// Not Applicable PI Count
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->LinkCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->HrefValue = "";
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->TooltipValue = "";

			// Completed Target PI Count
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->LinkCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->HrefValue = "";
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->TooltipValue = "";

			// No Target PI Count
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->LinkCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->HrefValue = "";
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->TooltipValue = "";

			// Remarks
			$frm_1_t_du_contributor_pi_status->Remarks->LinkCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Remarks->HrefValue = "";
			$frm_1_t_du_contributor_pi_status->Remarks->TooltipValue = "";
		} elseif ($frm_1_t_du_contributor_pi_status->RowType == UP_ROWTYPE_ADD) { // Add row

			// Delivery Unit
			$frm_1_t_du_contributor_pi_status->Delivery_Unit->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Delivery_Unit->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->Delivery_Unit->CurrentValue);

			// Contributing Unit
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->Contributing_Unit->CurrentValue);

			// MFO
			$frm_1_t_du_contributor_pi_status->MFO->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->MFO->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->MFO->CurrentValue);

			// PI Count per MFO
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->CurrentValue);

			// Not Applicable PI Count
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->CurrentValue);

			// Completed Target PI Count
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->CurrentValue);

			// No Target PI Count
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->No_Target_PI_Count->CurrentValue);

			// Remarks
			$frm_1_t_du_contributor_pi_status->Remarks->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Remarks->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->Remarks->CurrentValue);

			// Edit refer script
			// Delivery Unit

			$frm_1_t_du_contributor_pi_status->Delivery_Unit->HrefValue = "";

			// Contributing Unit
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->HrefValue = "";

			// MFO
			$frm_1_t_du_contributor_pi_status->MFO->HrefValue = "";

			// PI Count per MFO
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->HrefValue = "";

			// Not Applicable PI Count
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->HrefValue = "";

			// Completed Target PI Count
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->HrefValue = "";

			// No Target PI Count
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->HrefValue = "";

			// Remarks
			$frm_1_t_du_contributor_pi_status->Remarks->HrefValue = "";
		} elseif ($frm_1_t_du_contributor_pi_status->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// Delivery Unit
			$frm_1_t_du_contributor_pi_status->Delivery_Unit->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Delivery_Unit->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->Delivery_Unit->CurrentValue);

			// Contributing Unit
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->Contributing_Unit->CurrentValue);

			// MFO
			$frm_1_t_du_contributor_pi_status->MFO->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->MFO->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->MFO->CurrentValue);

			// PI Count per MFO
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->CurrentValue);

			// Not Applicable PI Count
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->CurrentValue);

			// Completed Target PI Count
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->CurrentValue);

			// No Target PI Count
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->No_Target_PI_Count->CurrentValue);

			// Remarks
			$frm_1_t_du_contributor_pi_status->Remarks->EditCustomAttributes = "";
			$frm_1_t_du_contributor_pi_status->Remarks->EditValue = up_HtmlEncode($frm_1_t_du_contributor_pi_status->Remarks->CurrentValue);

			// Edit refer script
			// Delivery Unit

			$frm_1_t_du_contributor_pi_status->Delivery_Unit->HrefValue = "";

			// Contributing Unit
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->HrefValue = "";

			// MFO
			$frm_1_t_du_contributor_pi_status->MFO->HrefValue = "";

			// PI Count per MFO
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->HrefValue = "";

			// Not Applicable PI Count
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->HrefValue = "";

			// Completed Target PI Count
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->HrefValue = "";

			// No Target PI Count
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->HrefValue = "";

			// Remarks
			$frm_1_t_du_contributor_pi_status->Remarks->HrefValue = "";
		}
		if ($frm_1_t_du_contributor_pi_status->RowType == UP_ROWTYPE_ADD ||
			$frm_1_t_du_contributor_pi_status->RowType == UP_ROWTYPE_EDIT ||
			$frm_1_t_du_contributor_pi_status->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_1_t_du_contributor_pi_status->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_1_t_du_contributor_pi_status->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_1_t_du_contributor_pi_status->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_1_t_du_contributor_pi_status;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->FormValue)) {
			up_AddMessage($gsFormError, $frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->FldErrMsg());
		}
		if (!up_CheckInteger($frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->FormValue)) {
			up_AddMessage($gsFormError, $frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->FldErrMsg());
		}
		if (!up_CheckInteger($frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->FormValue)) {
			up_AddMessage($gsFormError, $frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->FldErrMsg());
		}
		if (!up_CheckInteger($frm_1_t_du_contributor_pi_status->No_Target_PI_Count->FormValue)) {
			up_AddMessage($gsFormError, $frm_1_t_du_contributor_pi_status->No_Target_PI_Count->FldErrMsg());
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
		global $conn, $Language, $Security, $frm_1_t_du_contributor_pi_status;
		$DeleteRows = TRUE;
		$sSql = $frm_1_t_du_contributor_pi_status->SQL();
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
				$DeleteRows = $frm_1_t_du_contributor_pi_status->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_1_t_du_contributor_pi_status->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_1_t_du_contributor_pi_status->CancelMessage <> "") {
				$this->setFailureMessage($frm_1_t_du_contributor_pi_status->CancelMessage);
				$frm_1_t_du_contributor_pi_status->CancelMessage = "";
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
				$frm_1_t_du_contributor_pi_status->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $frm_1_t_du_contributor_pi_status;
		$sFilter = $frm_1_t_du_contributor_pi_status->KeyFilter();
		$frm_1_t_du_contributor_pi_status->CurrentFilter = $sFilter;
		$sSql = $frm_1_t_du_contributor_pi_status->SQL();
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

			// Delivery Unit
			$frm_1_t_du_contributor_pi_status->Delivery_Unit->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->Delivery_Unit->CurrentValue, NULL, $frm_1_t_du_contributor_pi_status->Delivery_Unit->ReadOnly);

			// Contributing Unit
			$frm_1_t_du_contributor_pi_status->Contributing_Unit->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->Contributing_Unit->CurrentValue, NULL, $frm_1_t_du_contributor_pi_status->Contributing_Unit->ReadOnly);

			// MFO
			$frm_1_t_du_contributor_pi_status->MFO->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->MFO->CurrentValue, NULL, $frm_1_t_du_contributor_pi_status->MFO->ReadOnly);

			// PI Count per MFO
			$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->CurrentValue, NULL, $frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->ReadOnly);

			// Not Applicable PI Count
			$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->CurrentValue, NULL, $frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->ReadOnly);

			// Completed Target PI Count
			$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->CurrentValue, NULL, $frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->ReadOnly);

			// No Target PI Count
			$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->No_Target_PI_Count->CurrentValue, NULL, $frm_1_t_du_contributor_pi_status->No_Target_PI_Count->ReadOnly);

			// Remarks
			$frm_1_t_du_contributor_pi_status->Remarks->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->Remarks->CurrentValue, NULL, $frm_1_t_du_contributor_pi_status->Remarks->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_1_t_du_contributor_pi_status->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_1_t_du_contributor_pi_status->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_1_t_du_contributor_pi_status->CancelMessage <> "") {
					$this->setFailureMessage($frm_1_t_du_contributor_pi_status->CancelMessage);
					$frm_1_t_du_contributor_pi_status->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_1_t_du_contributor_pi_status->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $frm_1_t_du_contributor_pi_status;

		// Check if valid key values for master user
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $frm_1_t_du_contributor_pi_status->SqlMasterFilter_frm_1_t_du_contributor_mfo_status();
			if (strval($frm_1_t_du_contributor_pi_status->unit_contributor_id->CurrentValue) <> "" &&
				$frm_1_t_du_contributor_pi_status->getCurrentMasterTable() == "frm_1_t_du_contributor_mfo_status") {
				$sFilter = str_replace("@unit_contributor_id@", up_AdjustSql($frm_1_t_du_contributor_pi_status->unit_contributor_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if ($sFilter <> "") {
				$rsmaster = $GLOBALS["frm_1_t_du_contributor_mfo_status"]->LoadRs($sFilter);
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
			if ($frm_1_t_du_contributor_pi_status->getCurrentMasterTable() == "frm_1_t_du_contributor_mfo_status") {
				$frm_1_t_du_contributor_pi_status->unit_contributor_id->CurrentValue = $frm_1_t_du_contributor_pi_status->unit_contributor_id->getSessionValue();
			}
		$rsnew = array();

		// Delivery Unit
		$frm_1_t_du_contributor_pi_status->Delivery_Unit->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->Delivery_Unit->CurrentValue, NULL, FALSE);

		// Contributing Unit
		$frm_1_t_du_contributor_pi_status->Contributing_Unit->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->Contributing_Unit->CurrentValue, NULL, FALSE);

		// MFO
		$frm_1_t_du_contributor_pi_status->MFO->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->MFO->CurrentValue, NULL, FALSE);

		// PI Count per MFO
		$frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->PI_Count_per_MFO->CurrentValue, NULL, FALSE);

		// Not Applicable PI Count
		$frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->Not_Applicable_PI_Count->CurrentValue, NULL, FALSE);

		// Completed Target PI Count
		$frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->Completed_Target_PI_Count->CurrentValue, NULL, FALSE);

		// No Target PI Count
		$frm_1_t_du_contributor_pi_status->No_Target_PI_Count->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->No_Target_PI_Count->CurrentValue, NULL, FALSE);

		// Remarks
		$frm_1_t_du_contributor_pi_status->Remarks->SetDbValueDef($rsnew, $frm_1_t_du_contributor_pi_status->Remarks->CurrentValue, NULL, FALSE);

		// unit_delivery_id
		if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['unit_delivery_id'] = CurrentUserID();
		}

		// unit_contributor_id
		if ($frm_1_t_du_contributor_pi_status->unit_contributor_id->getSessionValue() <> "") {
			$rsnew['unit_contributor_id'] = $frm_1_t_du_contributor_pi_status->unit_contributor_id->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_1_t_du_contributor_pi_status->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_1_t_du_contributor_pi_status->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_1_t_du_contributor_pi_status->CancelMessage <> "") {
				$this->setFailureMessage($frm_1_t_du_contributor_pi_status->CancelMessage);
				$frm_1_t_du_contributor_pi_status->CancelMessage = "";
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
			$frm_1_t_du_contributor_pi_status->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_1_t_du_contributor_pi_status;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_1_t_du_contributor_pi_status->unit_delivery_id->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_1_t_du_contributor_pi_status;

		// Hide foreign keys
		$sMasterTblVar = $frm_1_t_du_contributor_pi_status->getCurrentMasterTable();
		if ($sMasterTblVar == "frm_1_t_du_contributor_mfo_status") {
			$frm_1_t_du_contributor_pi_status->unit_contributor_id->Visible = FALSE;
			if ($GLOBALS["frm_1_t_du_contributor_mfo_status"]->EventCancelled) $frm_1_t_du_contributor_pi_status->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $frm_1_t_du_contributor_pi_status->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_1_t_du_contributor_pi_status->getDetailFilter(); // Get detail filter
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
