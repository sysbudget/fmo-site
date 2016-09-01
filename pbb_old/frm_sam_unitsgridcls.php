<?php include_once "tbl_usersinfo.php" ?>
<?php

//
// Page class
//
class cfrm_sam_units_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'frm_sam_units';

	// Page object name
	var $PageObjName = 'frm_sam_units_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_units;
		if ($frm_sam_units->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_units->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_units;
		if ($frm_sam_units->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_units->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_units->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_units_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_units)
		if (!isset($GLOBALS["frm_sam_units"])) {
			$GLOBALS["frm_sam_units"] = new cfrm_sam_units();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_units"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_units', TRUE);

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
		global $frm_sam_units;

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
			$this->Page_Terminate("frm_sam_unitslist.php");
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_sam_units->GridAddRowCount = $gridaddcnt;

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
		global $frm_sam_units;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_sam_units;

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
			if ($frm_sam_units->Export <> "" ||
				$frm_sam_units->CurrentAction == "gridadd" ||
				$frm_sam_units->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($frm_sam_units->AllowAddDeleteRow) {
				if ($frm_sam_units->CurrentAction == "gridadd" ||
					$frm_sam_units->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($frm_sam_units->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_sam_units->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $frm_sam_units->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_sam_units->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_sam_units->getMasterFilter() <> "" && $frm_sam_units->getCurrentMasterTable() == "frm_sam_cu_executive_offices") {
			global $frm_sam_cu_executive_offices;
			$rsmaster = $frm_sam_cu_executive_offices->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_sam_units->getReturnUrl()); // Return to caller
			} else {
				$frm_sam_cu_executive_offices->LoadListRowValues($rsmaster);
				$frm_sam_cu_executive_offices->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_sam_cu_executive_offices->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_sam_units->setSessionWhere($sFilter);
		$frm_sam_units->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $frm_sam_units;
		$frm_sam_units->LastAction = $frm_sam_units->CurrentAction; // Save last action
		$frm_sam_units->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $frm_sam_units;
		$bGridUpdate = TRUE;

		// Get old recordset
		$frm_sam_units->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $frm_sam_units->SQL();
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
						$frm_sam_units->CurrentFilter = $frm_sam_units->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$frm_sam_units->SendEmail = FALSE; // Do not send email on update success
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
			$frm_sam_units->EventCancelled = TRUE; // Set event cancelled
			$frm_sam_units->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $frm_sam_units;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $frm_sam_units->KeyFilter();
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
		global $frm_sam_units;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 1) {
			$frm_sam_units->units_id->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($frm_sam_units->units_id->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $frm_sam_units;
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
				$frm_sam_units->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {
					if ($sKey <> "") $sKey .= UP_COMPOSITE_KEY_SEPARATOR;
					$sKey .= $frm_sam_units->units_id->CurrentValue;

					// Add filter for this record
					$sFilter = $frm_sam_units->KeyFilter();
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
			$frm_sam_units->CurrentFilter = $sWrkFilter;
			$sSql = $frm_sam_units->SQL();
			if ($rs = $conn->Execute($sSql)) {
				$rsnew = $rs->GetRows();
				$rs->Close();
			}
			$this->ClearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "") {
				$this->setFailureMessage($Language->Phrase("InsertFailed")); // Set insert failed message
			}
			$frm_sam_units->EventCancelled = TRUE; // Set event cancelled
			$frm_sam_units->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $frm_sam_units, $objForm;
		if ($objForm->HasValue("x_cu_unit_name") && $objForm->HasValue("o_cu_unit_name") && $frm_sam_units->cu_unit_name->CurrentValue <> $frm_sam_units->cu_unit_name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_personnel_count") && $objForm->HasValue("o_personnel_count") && $frm_sam_units->personnel_count->CurrentValue <> $frm_sam_units->personnel_count->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_mfo_1") && $objForm->HasValue("o_mfo_1") && $frm_sam_units->mfo_1->CurrentValue <> $frm_sam_units->mfo_1->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_mfo_2") && $objForm->HasValue("o_mfo_2") && $frm_sam_units->mfo_2->CurrentValue <> $frm_sam_units->mfo_2->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_mfo_3") && $objForm->HasValue("o_mfo_3") && $frm_sam_units->mfo_3->CurrentValue <> $frm_sam_units->mfo_3->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_mfo_4") && $objForm->HasValue("o_mfo_4") && $frm_sam_units->mfo_4->CurrentValue <> $frm_sam_units->mfo_4->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_mfo_5") && $objForm->HasValue("o_mfo_5") && $frm_sam_units->mfo_5->CurrentValue <> $frm_sam_units->mfo_5->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_sto") && $objForm->HasValue("o_sto") && $frm_sam_units->sto->CurrentValue <> $frm_sam_units->sto->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_gass") && $objForm->HasValue("o_gass") && $frm_sam_units->gass->CurrentValue <> $frm_sam_units->gass->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_t_cutOffDate_remarks") && $objForm->HasValue("o_t_cutOffDate_remarks") && $frm_sam_units->t_cutOffDate_remarks->CurrentValue <> $frm_sam_units->t_cutOffDate_remarks->OldValue)
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
		global $objForm, $frm_sam_units;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_sam_units;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_sam_units->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_sam_units->CurrentOrderType = @$_GET["ordertype"];
			$frm_sam_units->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_sam_units;
		$sOrderBy = $frm_sam_units->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_sam_units->SqlOrderBy() <> "") {
				$sOrderBy = $frm_sam_units->SqlOrderBy();
				$frm_sam_units->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_sam_units;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_sam_units->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_sam_units->focal_person_id->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_sam_units->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_sam_units->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_sam_units;

		// "griddelete"
		if ($frm_sam_units->AllowAddDeleteRow) {
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
		global $Security, $Language, $frm_sam_units, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($frm_sam_units->RowType == UP_ROWTYPE_ADD)
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
		if ($frm_sam_units->AllowAddDeleteRow) {
			if ($frm_sam_units->CurrentMode == "add" || $frm_sam_units->CurrentMode == "copy" || $frm_sam_units->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (!$Security->CanDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, frm_sam_units_grid, " . $this->RowIndex . ");\">" . $Language->Phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($frm_sam_units->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . $frm_sam_units->units_id->CurrentValue . "\">";
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	function SetRecordKey(&$key, $rs) {
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs->fields('units_id');
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_sam_units;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_sam_units;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_sam_units->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_sam_units->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_sam_units->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_sam_units->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_sam_units->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_sam_units->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_sam_units;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_sam_units;
		$frm_sam_units->cu_unit_name->CurrentValue = NULL;
		$frm_sam_units->cu_unit_name->OldValue = $frm_sam_units->cu_unit_name->CurrentValue;
		$frm_sam_units->personnel_count->CurrentValue = NULL;
		$frm_sam_units->personnel_count->OldValue = $frm_sam_units->personnel_count->CurrentValue;
		$frm_sam_units->mfo_1->CurrentValue = "Y";
		$frm_sam_units->mfo_1->OldValue = $frm_sam_units->mfo_1->CurrentValue;
		$frm_sam_units->mfo_2->CurrentValue = "Y";
		$frm_sam_units->mfo_2->OldValue = $frm_sam_units->mfo_2->CurrentValue;
		$frm_sam_units->mfo_3->CurrentValue = "Y";
		$frm_sam_units->mfo_3->OldValue = $frm_sam_units->mfo_3->CurrentValue;
		$frm_sam_units->mfo_4->CurrentValue = "Y";
		$frm_sam_units->mfo_4->OldValue = $frm_sam_units->mfo_4->CurrentValue;
		$frm_sam_units->mfo_5->CurrentValue = "Y";
		$frm_sam_units->mfo_5->OldValue = $frm_sam_units->mfo_5->CurrentValue;
		$frm_sam_units->sto->CurrentValue = "Y";
		$frm_sam_units->sto->OldValue = $frm_sam_units->sto->CurrentValue;
		$frm_sam_units->gass->CurrentValue = "Y";
		$frm_sam_units->gass->OldValue = $frm_sam_units->gass->CurrentValue;
		$frm_sam_units->t_cutOffDate_remarks->CurrentValue = NULL;
		$frm_sam_units->t_cutOffDate_remarks->OldValue = $frm_sam_units->t_cutOffDate_remarks->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_sam_units;
		if (!$frm_sam_units->cu_unit_name->FldIsDetailKey) {
			$frm_sam_units->cu_unit_name->setFormValue($objForm->GetValue("x_cu_unit_name"));
		}
		$frm_sam_units->cu_unit_name->setOldValue($objForm->GetValue("o_cu_unit_name"));
		if (!$frm_sam_units->personnel_count->FldIsDetailKey) {
			$frm_sam_units->personnel_count->setFormValue($objForm->GetValue("x_personnel_count"));
		}
		$frm_sam_units->personnel_count->setOldValue($objForm->GetValue("o_personnel_count"));
		if (!$frm_sam_units->mfo_1->FldIsDetailKey) {
			$frm_sam_units->mfo_1->setFormValue($objForm->GetValue("x_mfo_1"));
		}
		$frm_sam_units->mfo_1->setOldValue($objForm->GetValue("o_mfo_1"));
		if (!$frm_sam_units->mfo_2->FldIsDetailKey) {
			$frm_sam_units->mfo_2->setFormValue($objForm->GetValue("x_mfo_2"));
		}
		$frm_sam_units->mfo_2->setOldValue($objForm->GetValue("o_mfo_2"));
		if (!$frm_sam_units->mfo_3->FldIsDetailKey) {
			$frm_sam_units->mfo_3->setFormValue($objForm->GetValue("x_mfo_3"));
		}
		$frm_sam_units->mfo_3->setOldValue($objForm->GetValue("o_mfo_3"));
		if (!$frm_sam_units->mfo_4->FldIsDetailKey) {
			$frm_sam_units->mfo_4->setFormValue($objForm->GetValue("x_mfo_4"));
		}
		$frm_sam_units->mfo_4->setOldValue($objForm->GetValue("o_mfo_4"));
		if (!$frm_sam_units->mfo_5->FldIsDetailKey) {
			$frm_sam_units->mfo_5->setFormValue($objForm->GetValue("x_mfo_5"));
		}
		$frm_sam_units->mfo_5->setOldValue($objForm->GetValue("o_mfo_5"));
		if (!$frm_sam_units->sto->FldIsDetailKey) {
			$frm_sam_units->sto->setFormValue($objForm->GetValue("x_sto"));
		}
		$frm_sam_units->sto->setOldValue($objForm->GetValue("o_sto"));
		if (!$frm_sam_units->gass->FldIsDetailKey) {
			$frm_sam_units->gass->setFormValue($objForm->GetValue("x_gass"));
		}
		$frm_sam_units->gass->setOldValue($objForm->GetValue("o_gass"));
		if (!$frm_sam_units->t_cutOffDate_remarks->FldIsDetailKey) {
			$frm_sam_units->t_cutOffDate_remarks->setFormValue($objForm->GetValue("x_t_cutOffDate_remarks"));
		}
		$frm_sam_units->t_cutOffDate_remarks->setOldValue($objForm->GetValue("o_t_cutOffDate_remarks"));
		if (!$frm_sam_units->units_id->FldIsDetailKey && $frm_sam_units->CurrentAction <> "gridadd" && $frm_sam_units->CurrentAction <> "add")
			$frm_sam_units->units_id->setFormValue($objForm->GetValue("x_units_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_sam_units;
		if ($frm_sam_units->CurrentAction <> "gridadd" && $frm_sam_units->CurrentAction <> "add")
			$frm_sam_units->units_id->CurrentValue = $frm_sam_units->units_id->FormValue;
		$frm_sam_units->cu_unit_name->CurrentValue = $frm_sam_units->cu_unit_name->FormValue;
		$frm_sam_units->personnel_count->CurrentValue = $frm_sam_units->personnel_count->FormValue;
		$frm_sam_units->mfo_1->CurrentValue = $frm_sam_units->mfo_1->FormValue;
		$frm_sam_units->mfo_2->CurrentValue = $frm_sam_units->mfo_2->FormValue;
		$frm_sam_units->mfo_3->CurrentValue = $frm_sam_units->mfo_3->FormValue;
		$frm_sam_units->mfo_4->CurrentValue = $frm_sam_units->mfo_4->FormValue;
		$frm_sam_units->mfo_5->CurrentValue = $frm_sam_units->mfo_5->FormValue;
		$frm_sam_units->sto->CurrentValue = $frm_sam_units->sto->FormValue;
		$frm_sam_units->gass->CurrentValue = $frm_sam_units->gass->FormValue;
		$frm_sam_units->t_cutOffDate_remarks->CurrentValue = $frm_sam_units->t_cutOffDate_remarks->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_sam_units;

		// Call Recordset Selecting event
		$frm_sam_units->Recordset_Selecting($frm_sam_units->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_sam_units->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_sam_units->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_units;
		$sFilter = $frm_sam_units->KeyFilter();

		// Call Row Selecting event
		$frm_sam_units->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_units->CurrentFilter = $sFilter;
		$sSql = $frm_sam_units->SQL();
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
		global $conn, $frm_sam_units;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_units->Row_Selected($row);
		$frm_sam_units->units_id->setDbValue($rs->fields('units_id'));
		$frm_sam_units->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_sam_units->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_sam_units->unit_id->setDbValue($rs->fields('unit_id'));
		$frm_sam_units->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_sam_units->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_sam_units->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_sam_units->unit_name->setDbValue($rs->fields('unit_name'));
		$frm_sam_units->unit_name_short->setDbValue($rs->fields('unit_name_short'));
		$frm_sam_units->personnel_count->setDbValue($rs->fields('personnel_count'));
		$frm_sam_units->mfo_1->setDbValue($rs->fields('mfo_1'));
		$frm_sam_units->mfo_2->setDbValue($rs->fields('mfo_2'));
		$frm_sam_units->mfo_3->setDbValue($rs->fields('mfo_3'));
		$frm_sam_units->mfo_4->setDbValue($rs->fields('mfo_4'));
		$frm_sam_units->mfo_5->setDbValue($rs->fields('mfo_5'));
		$frm_sam_units->sto->setDbValue($rs->fields('sto'));
		$frm_sam_units->gass->setDbValue($rs->fields('gass'));
		$frm_sam_units->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_sam_units->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_sam_units->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_sam_units->t_startDate->setDbValue($rs->fields('t_startDate'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_sam_units;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$frm_sam_units->units_id->CurrentValue = strval($arKeys[0]); // units_id
			else
				$bValidKey = FALSE;
		}

		// Load old recordset
		if ($bValidKey) {
			$frm_sam_units->CurrentFilter = $frm_sam_units->KeyFilter();
			$sSql = $frm_sam_units->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_units;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_sam_units->Row_Rendering();

		// Common render codes for all row types
		// units_id

		$frm_sam_units->units_id->CellCssStyle = "white-space: nowrap;";

		// cu_id
		$frm_sam_units->cu_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		// unit_id
		// cu_sequence
		// cu_short_name

		$frm_sam_units->cu_short_name->CellCssStyle = "white-space: nowrap;";

		// cu_unit_name
		$frm_sam_units->cu_unit_name->CellCssStyle = "white-space: nowrap;";

		// unit_name
		// unit_name_short
		// personnel_count
		// mfo_1
		// mfo_2
		// mfo_3
		// mfo_4
		// mfo_5
		// sto
		// gass
		// cutOffDate_id

		$frm_sam_units->cutOffDate_id->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_fp
		$frm_sam_units->t_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_remarks
		// t_startDate

		$frm_sam_units->t_startDate->CellCssStyle = "white-space: nowrap;";
		if ($frm_sam_units->RowType == UP_ROWTYPE_VIEW) { // View row

			// cu_unit_name
			$frm_sam_units->cu_unit_name->ViewValue = $frm_sam_units->cu_unit_name->CurrentValue;
			$frm_sam_units->cu_unit_name->ViewCustomAttributes = "";

			// personnel_count
			$frm_sam_units->personnel_count->ViewValue = $frm_sam_units->personnel_count->CurrentValue;
			$frm_sam_units->personnel_count->ViewCustomAttributes = "";

			// mfo_1
			if (strval($frm_sam_units->mfo_1->CurrentValue) <> "") {
				switch ($frm_sam_units->mfo_1->CurrentValue) {
					case "Y":
						$frm_sam_units->mfo_1->ViewValue = $frm_sam_units->mfo_1->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_1->FldTagCaption(1) : $frm_sam_units->mfo_1->CurrentValue;
						break;
					case "N":
						$frm_sam_units->mfo_1->ViewValue = $frm_sam_units->mfo_1->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_1->FldTagCaption(2) : $frm_sam_units->mfo_1->CurrentValue;
						break;
					default:
						$frm_sam_units->mfo_1->ViewValue = $frm_sam_units->mfo_1->CurrentValue;
				}
			} else {
				$frm_sam_units->mfo_1->ViewValue = NULL;
			}
			$frm_sam_units->mfo_1->ViewCustomAttributes = "";

			// mfo_2
			if (strval($frm_sam_units->mfo_2->CurrentValue) <> "") {
				switch ($frm_sam_units->mfo_2->CurrentValue) {
					case "Y":
						$frm_sam_units->mfo_2->ViewValue = $frm_sam_units->mfo_2->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_2->FldTagCaption(1) : $frm_sam_units->mfo_2->CurrentValue;
						break;
					case "N":
						$frm_sam_units->mfo_2->ViewValue = $frm_sam_units->mfo_2->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_2->FldTagCaption(2) : $frm_sam_units->mfo_2->CurrentValue;
						break;
					default:
						$frm_sam_units->mfo_2->ViewValue = $frm_sam_units->mfo_2->CurrentValue;
				}
			} else {
				$frm_sam_units->mfo_2->ViewValue = NULL;
			}
			$frm_sam_units->mfo_2->ViewCustomAttributes = "";

			// mfo_3
			if (strval($frm_sam_units->mfo_3->CurrentValue) <> "") {
				switch ($frm_sam_units->mfo_3->CurrentValue) {
					case "Y":
						$frm_sam_units->mfo_3->ViewValue = $frm_sam_units->mfo_3->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_3->FldTagCaption(1) : $frm_sam_units->mfo_3->CurrentValue;
						break;
					case "N":
						$frm_sam_units->mfo_3->ViewValue = $frm_sam_units->mfo_3->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_3->FldTagCaption(2) : $frm_sam_units->mfo_3->CurrentValue;
						break;
					default:
						$frm_sam_units->mfo_3->ViewValue = $frm_sam_units->mfo_3->CurrentValue;
				}
			} else {
				$frm_sam_units->mfo_3->ViewValue = NULL;
			}
			$frm_sam_units->mfo_3->ViewCustomAttributes = "";

			// mfo_4
			if (strval($frm_sam_units->mfo_4->CurrentValue) <> "") {
				switch ($frm_sam_units->mfo_4->CurrentValue) {
					case "Y":
						$frm_sam_units->mfo_4->ViewValue = $frm_sam_units->mfo_4->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_4->FldTagCaption(1) : $frm_sam_units->mfo_4->CurrentValue;
						break;
					case "N":
						$frm_sam_units->mfo_4->ViewValue = $frm_sam_units->mfo_4->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_4->FldTagCaption(2) : $frm_sam_units->mfo_4->CurrentValue;
						break;
					default:
						$frm_sam_units->mfo_4->ViewValue = $frm_sam_units->mfo_4->CurrentValue;
				}
			} else {
				$frm_sam_units->mfo_4->ViewValue = NULL;
			}
			$frm_sam_units->mfo_4->ViewCustomAttributes = "";

			// mfo_5
			if (strval($frm_sam_units->mfo_5->CurrentValue) <> "") {
				switch ($frm_sam_units->mfo_5->CurrentValue) {
					case "Y":
						$frm_sam_units->mfo_5->ViewValue = $frm_sam_units->mfo_5->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_5->FldTagCaption(1) : $frm_sam_units->mfo_5->CurrentValue;
						break;
					case "N":
						$frm_sam_units->mfo_5->ViewValue = $frm_sam_units->mfo_5->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_5->FldTagCaption(2) : $frm_sam_units->mfo_5->CurrentValue;
						break;
					default:
						$frm_sam_units->mfo_5->ViewValue = $frm_sam_units->mfo_5->CurrentValue;
				}
			} else {
				$frm_sam_units->mfo_5->ViewValue = NULL;
			}
			$frm_sam_units->mfo_5->ViewCustomAttributes = "";

			// sto
			if (strval($frm_sam_units->sto->CurrentValue) <> "") {
				switch ($frm_sam_units->sto->CurrentValue) {
					case "Y":
						$frm_sam_units->sto->ViewValue = $frm_sam_units->sto->FldTagCaption(1) <> "" ? $frm_sam_units->sto->FldTagCaption(1) : $frm_sam_units->sto->CurrentValue;
						break;
					case "N":
						$frm_sam_units->sto->ViewValue = $frm_sam_units->sto->FldTagCaption(2) <> "" ? $frm_sam_units->sto->FldTagCaption(2) : $frm_sam_units->sto->CurrentValue;
						break;
					default:
						$frm_sam_units->sto->ViewValue = $frm_sam_units->sto->CurrentValue;
				}
			} else {
				$frm_sam_units->sto->ViewValue = NULL;
			}
			$frm_sam_units->sto->ViewCustomAttributes = "";

			// gass
			if (strval($frm_sam_units->gass->CurrentValue) <> "") {
				switch ($frm_sam_units->gass->CurrentValue) {
					case "Y":
						$frm_sam_units->gass->ViewValue = $frm_sam_units->gass->FldTagCaption(1) <> "" ? $frm_sam_units->gass->FldTagCaption(1) : $frm_sam_units->gass->CurrentValue;
						break;
					case "N":
						$frm_sam_units->gass->ViewValue = $frm_sam_units->gass->FldTagCaption(2) <> "" ? $frm_sam_units->gass->FldTagCaption(2) : $frm_sam_units->gass->CurrentValue;
						break;
					default:
						$frm_sam_units->gass->ViewValue = $frm_sam_units->gass->CurrentValue;
				}
			} else {
				$frm_sam_units->gass->ViewValue = NULL;
			}
			$frm_sam_units->gass->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_sam_units->t_cutOffDate_remarks->ViewValue = $frm_sam_units->t_cutOffDate_remarks->CurrentValue;
			$frm_sam_units->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_sam_units->cu_unit_name->LinkCustomAttributes = "";
			$frm_sam_units->cu_unit_name->HrefValue = "";
			$frm_sam_units->cu_unit_name->TooltipValue = "";

			// personnel_count
			$frm_sam_units->personnel_count->LinkCustomAttributes = "";
			$frm_sam_units->personnel_count->HrefValue = "";
			$frm_sam_units->personnel_count->TooltipValue = "";

			// mfo_1
			$frm_sam_units->mfo_1->LinkCustomAttributes = "";
			$frm_sam_units->mfo_1->HrefValue = "";
			$frm_sam_units->mfo_1->TooltipValue = "";

			// mfo_2
			$frm_sam_units->mfo_2->LinkCustomAttributes = "";
			$frm_sam_units->mfo_2->HrefValue = "";
			$frm_sam_units->mfo_2->TooltipValue = "";

			// mfo_3
			$frm_sam_units->mfo_3->LinkCustomAttributes = "";
			$frm_sam_units->mfo_3->HrefValue = "";
			$frm_sam_units->mfo_3->TooltipValue = "";

			// mfo_4
			$frm_sam_units->mfo_4->LinkCustomAttributes = "";
			$frm_sam_units->mfo_4->HrefValue = "";
			$frm_sam_units->mfo_4->TooltipValue = "";

			// mfo_5
			$frm_sam_units->mfo_5->LinkCustomAttributes = "";
			$frm_sam_units->mfo_5->HrefValue = "";
			$frm_sam_units->mfo_5->TooltipValue = "";

			// sto
			$frm_sam_units->sto->LinkCustomAttributes = "";
			$frm_sam_units->sto->HrefValue = "";
			$frm_sam_units->sto->TooltipValue = "";

			// gass
			$frm_sam_units->gass->LinkCustomAttributes = "";
			$frm_sam_units->gass->HrefValue = "";
			$frm_sam_units->gass->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_sam_units->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_sam_units->t_cutOffDate_remarks->HrefValue = "";
			$frm_sam_units->t_cutOffDate_remarks->TooltipValue = "";
		} elseif ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { // Add row

			// cu_unit_name
			$frm_sam_units->cu_unit_name->EditCustomAttributes = "";
			$frm_sam_units->cu_unit_name->EditValue = up_HtmlEncode($frm_sam_units->cu_unit_name->CurrentValue);

			// personnel_count
			$frm_sam_units->personnel_count->EditCustomAttributes = "";
			$frm_sam_units->personnel_count->EditValue = up_HtmlEncode($frm_sam_units->personnel_count->CurrentValue);

			// mfo_1
			$frm_sam_units->mfo_1->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->mfo_1->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_1->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->mfo_1->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_1->FldTagCaption(2) : "N");
			$frm_sam_units->mfo_1->EditValue = $arwrk;

			// mfo_2
			$frm_sam_units->mfo_2->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->mfo_2->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_2->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->mfo_2->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_2->FldTagCaption(2) : "N");
			$frm_sam_units->mfo_2->EditValue = $arwrk;

			// mfo_3
			$frm_sam_units->mfo_3->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->mfo_3->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_3->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->mfo_3->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_3->FldTagCaption(2) : "N");
			$frm_sam_units->mfo_3->EditValue = $arwrk;

			// mfo_4
			$frm_sam_units->mfo_4->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->mfo_4->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_4->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->mfo_4->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_4->FldTagCaption(2) : "N");
			$frm_sam_units->mfo_4->EditValue = $arwrk;

			// mfo_5
			$frm_sam_units->mfo_5->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->mfo_5->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_5->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->mfo_5->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_5->FldTagCaption(2) : "N");
			$frm_sam_units->mfo_5->EditValue = $arwrk;

			// sto
			$frm_sam_units->sto->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->sto->FldTagCaption(1) <> "" ? $frm_sam_units->sto->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->sto->FldTagCaption(2) <> "" ? $frm_sam_units->sto->FldTagCaption(2) : "N");
			$frm_sam_units->sto->EditValue = $arwrk;

			// gass
			$frm_sam_units->gass->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->gass->FldTagCaption(1) <> "" ? $frm_sam_units->gass->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->gass->FldTagCaption(2) <> "" ? $frm_sam_units->gass->FldTagCaption(2) : "N");
			$frm_sam_units->gass->EditValue = $arwrk;

			// t_cutOffDate_remarks
			$frm_sam_units->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_sam_units->t_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_sam_units->t_cutOffDate_remarks->CurrentValue);

			// Edit refer script
			// cu_unit_name

			$frm_sam_units->cu_unit_name->HrefValue = "";

			// personnel_count
			$frm_sam_units->personnel_count->HrefValue = "";

			// mfo_1
			$frm_sam_units->mfo_1->HrefValue = "";

			// mfo_2
			$frm_sam_units->mfo_2->HrefValue = "";

			// mfo_3
			$frm_sam_units->mfo_3->HrefValue = "";

			// mfo_4
			$frm_sam_units->mfo_4->HrefValue = "";

			// mfo_5
			$frm_sam_units->mfo_5->HrefValue = "";

			// sto
			$frm_sam_units->sto->HrefValue = "";

			// gass
			$frm_sam_units->gass->HrefValue = "";

			// t_cutOffDate_remarks
			$frm_sam_units->t_cutOffDate_remarks->HrefValue = "";
		} elseif ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// cu_unit_name
			$frm_sam_units->cu_unit_name->EditCustomAttributes = "";
			$frm_sam_units->cu_unit_name->EditValue = up_HtmlEncode($frm_sam_units->cu_unit_name->CurrentValue);

			// personnel_count
			$frm_sam_units->personnel_count->EditCustomAttributes = "";
			$frm_sam_units->personnel_count->EditValue = up_HtmlEncode($frm_sam_units->personnel_count->CurrentValue);

			// mfo_1
			$frm_sam_units->mfo_1->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->mfo_1->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_1->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->mfo_1->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_1->FldTagCaption(2) : "N");
			$frm_sam_units->mfo_1->EditValue = $arwrk;

			// mfo_2
			$frm_sam_units->mfo_2->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->mfo_2->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_2->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->mfo_2->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_2->FldTagCaption(2) : "N");
			$frm_sam_units->mfo_2->EditValue = $arwrk;

			// mfo_3
			$frm_sam_units->mfo_3->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->mfo_3->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_3->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->mfo_3->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_3->FldTagCaption(2) : "N");
			$frm_sam_units->mfo_3->EditValue = $arwrk;

			// mfo_4
			$frm_sam_units->mfo_4->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->mfo_4->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_4->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->mfo_4->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_4->FldTagCaption(2) : "N");
			$frm_sam_units->mfo_4->EditValue = $arwrk;

			// mfo_5
			$frm_sam_units->mfo_5->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->mfo_5->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_5->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->mfo_5->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_5->FldTagCaption(2) : "N");
			$frm_sam_units->mfo_5->EditValue = $arwrk;

			// sto
			$frm_sam_units->sto->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->sto->FldTagCaption(1) <> "" ? $frm_sam_units->sto->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->sto->FldTagCaption(2) <> "" ? $frm_sam_units->sto->FldTagCaption(2) : "N");
			$frm_sam_units->sto->EditValue = $arwrk;

			// gass
			$frm_sam_units->gass->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_sam_units->gass->FldTagCaption(1) <> "" ? $frm_sam_units->gass->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_sam_units->gass->FldTagCaption(2) <> "" ? $frm_sam_units->gass->FldTagCaption(2) : "N");
			$frm_sam_units->gass->EditValue = $arwrk;

			// t_cutOffDate_remarks
			$frm_sam_units->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_sam_units->t_cutOffDate_remarks->EditValue = $frm_sam_units->t_cutOffDate_remarks->CurrentValue;
			$frm_sam_units->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// Edit refer script
			// cu_unit_name

			$frm_sam_units->cu_unit_name->HrefValue = "";

			// personnel_count
			$frm_sam_units->personnel_count->HrefValue = "";

			// mfo_1
			$frm_sam_units->mfo_1->HrefValue = "";

			// mfo_2
			$frm_sam_units->mfo_2->HrefValue = "";

			// mfo_3
			$frm_sam_units->mfo_3->HrefValue = "";

			// mfo_4
			$frm_sam_units->mfo_4->HrefValue = "";

			// mfo_5
			$frm_sam_units->mfo_5->HrefValue = "";

			// sto
			$frm_sam_units->sto->HrefValue = "";

			// gass
			$frm_sam_units->gass->HrefValue = "";

			// t_cutOffDate_remarks
			$frm_sam_units->t_cutOffDate_remarks->HrefValue = "";
		}
		if ($frm_sam_units->RowType == UP_ROWTYPE_ADD ||
			$frm_sam_units->RowType == UP_ROWTYPE_EDIT ||
			$frm_sam_units->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_sam_units->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_sam_units->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_units->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_sam_units;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($frm_sam_units->personnel_count->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_units->personnel_count->FldErrMsg());
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
		global $conn, $Language, $Security, $frm_sam_units;
		$DeleteRows = TRUE;
		$sSql = $frm_sam_units->SQL();
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
				$DeleteRows = $frm_sam_units->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['units_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_sam_units->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_sam_units->CancelMessage <> "") {
				$this->setFailureMessage($frm_sam_units->CancelMessage);
				$frm_sam_units->CancelMessage = "";
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
				$frm_sam_units->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $frm_sam_units;
		$sFilter = $frm_sam_units->KeyFilter();
		$frm_sam_units->CurrentFilter = $sFilter;
		$sSql = $frm_sam_units->SQL();
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
			$frm_sam_units->cu_unit_name->SetDbValueDef($rsnew, $frm_sam_units->cu_unit_name->CurrentValue, NULL, $frm_sam_units->cu_unit_name->ReadOnly);

			// personnel_count
			$frm_sam_units->personnel_count->SetDbValueDef($rsnew, $frm_sam_units->personnel_count->CurrentValue, NULL, $frm_sam_units->personnel_count->ReadOnly);

			// mfo_1
			$frm_sam_units->mfo_1->SetDbValueDef($rsnew, $frm_sam_units->mfo_1->CurrentValue, NULL, $frm_sam_units->mfo_1->ReadOnly);

			// mfo_2
			$frm_sam_units->mfo_2->SetDbValueDef($rsnew, $frm_sam_units->mfo_2->CurrentValue, NULL, $frm_sam_units->mfo_2->ReadOnly);

			// mfo_3
			$frm_sam_units->mfo_3->SetDbValueDef($rsnew, $frm_sam_units->mfo_3->CurrentValue, NULL, $frm_sam_units->mfo_3->ReadOnly);

			// mfo_4
			$frm_sam_units->mfo_4->SetDbValueDef($rsnew, $frm_sam_units->mfo_4->CurrentValue, NULL, $frm_sam_units->mfo_4->ReadOnly);

			// mfo_5
			$frm_sam_units->mfo_5->SetDbValueDef($rsnew, $frm_sam_units->mfo_5->CurrentValue, NULL, $frm_sam_units->mfo_5->ReadOnly);

			// sto
			$frm_sam_units->sto->SetDbValueDef($rsnew, $frm_sam_units->sto->CurrentValue, NULL, $frm_sam_units->sto->ReadOnly);

			// gass
			$frm_sam_units->gass->SetDbValueDef($rsnew, $frm_sam_units->gass->CurrentValue, NULL, $frm_sam_units->gass->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_sam_units->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_sam_units->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_sam_units->CancelMessage <> "") {
					$this->setFailureMessage($frm_sam_units->CancelMessage);
					$frm_sam_units->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_sam_units->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $frm_sam_units;

		// Set up foreign key field value from Session
			if ($frm_sam_units->getCurrentMasterTable() == "frm_sam_cu_executive_offices") {
				$frm_sam_units->focal_person_id->CurrentValue = $frm_sam_units->focal_person_id->getSessionValue();
			}
		$rsnew = array();

		// cu_unit_name
		$frm_sam_units->cu_unit_name->SetDbValueDef($rsnew, $frm_sam_units->cu_unit_name->CurrentValue, NULL, FALSE);

		// personnel_count
		$frm_sam_units->personnel_count->SetDbValueDef($rsnew, $frm_sam_units->personnel_count->CurrentValue, NULL, FALSE);

		// mfo_1
		$frm_sam_units->mfo_1->SetDbValueDef($rsnew, $frm_sam_units->mfo_1->CurrentValue, NULL, strval($frm_sam_units->mfo_1->CurrentValue) == "");

		// mfo_2
		$frm_sam_units->mfo_2->SetDbValueDef($rsnew, $frm_sam_units->mfo_2->CurrentValue, NULL, strval($frm_sam_units->mfo_2->CurrentValue) == "");

		// mfo_3
		$frm_sam_units->mfo_3->SetDbValueDef($rsnew, $frm_sam_units->mfo_3->CurrentValue, NULL, strval($frm_sam_units->mfo_3->CurrentValue) == "");

		// mfo_4
		$frm_sam_units->mfo_4->SetDbValueDef($rsnew, $frm_sam_units->mfo_4->CurrentValue, NULL, strval($frm_sam_units->mfo_4->CurrentValue) == "");

		// mfo_5
		$frm_sam_units->mfo_5->SetDbValueDef($rsnew, $frm_sam_units->mfo_5->CurrentValue, NULL, strval($frm_sam_units->mfo_5->CurrentValue) == "");

		// sto
		$frm_sam_units->sto->SetDbValueDef($rsnew, $frm_sam_units->sto->CurrentValue, NULL, strval($frm_sam_units->sto->CurrentValue) == "");

		// gass
		$frm_sam_units->gass->SetDbValueDef($rsnew, $frm_sam_units->gass->CurrentValue, NULL, strval($frm_sam_units->gass->CurrentValue) == "");

		// t_cutOffDate_remarks
		$frm_sam_units->t_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_sam_units->t_cutOffDate_remarks->CurrentValue, NULL, FALSE);

		// focal_person_id
		if ($frm_sam_units->focal_person_id->getSessionValue() <> "") {
			$rsnew['focal_person_id'] = $frm_sam_units->focal_person_id->getSessionValue();
		} elseif (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['focal_person_id'] = CurrentUserID();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_sam_units->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_sam_units->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_sam_units->CancelMessage <> "") {
				$this->setFailureMessage($frm_sam_units->CancelMessage);
				$frm_sam_units->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$frm_sam_units->units_id->setDbValue($conn->Insert_ID());
			$rsnew['units_id'] = $frm_sam_units->units_id->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$frm_sam_units->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_sam_units;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_sam_units->focal_person_id->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_sam_units;

		// Hide foreign keys
		$sMasterTblVar = $frm_sam_units->getCurrentMasterTable();
		if ($sMasterTblVar == "frm_sam_cu_executive_offices") {
			$frm_sam_units->focal_person_id->Visible = FALSE;
			if ($GLOBALS["frm_sam_cu_executive_offices"]->EventCancelled) $frm_sam_units->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $frm_sam_units->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_sam_units->getDetailFilter(); // Get detail filter
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
