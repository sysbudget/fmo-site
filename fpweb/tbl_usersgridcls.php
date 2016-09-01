<?php

//
// Page class
//
class ctbl_users_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'tbl_users';

	// Page object name
	var $PageObjName = 'tbl_users_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_users;
		if ($tbl_users->UseTokenInUrl) $PageUrl .= "t=" . $tbl_users->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_users;
		if ($tbl_users->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_users_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_users)
		if (!isset($GLOBALS["tbl_users"])) {
			$GLOBALS["tbl_users"] = new ctbl_users();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["tbl_users"];
		}

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_users', TRUE);

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
		global $tbl_users;

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
			$this->Page_Terminate("tbl_userslist.php");
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$tbl_users->GridAddRowCount = $gridaddcnt;

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
		global $tbl_users;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_users;

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
			if ($tbl_users->Export <> "" ||
				$tbl_users->CurrentAction == "gridadd" ||
				$tbl_users->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($tbl_users->AllowAddDeleteRow) {
				if ($tbl_users->CurrentAction == "gridadd" ||
					$tbl_users->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($tbl_users->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_users->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $tbl_users->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $tbl_users->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($tbl_users->getMasterFilter() <> "" && $tbl_users->getCurrentMasterTable() == "view_tbl_uporgchart_cu_users") {
			global $view_tbl_uporgchart_cu_users;
			$rsmaster = $view_tbl_uporgchart_cu_users->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($tbl_users->getReturnUrl()); // Return to caller
			} else {
				$view_tbl_uporgchart_cu_users->LoadListRowValues($rsmaster);
				$view_tbl_uporgchart_cu_users->RowType = UP_ROWTYPE_MASTER; // Master row
				$view_tbl_uporgchart_cu_users->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$tbl_users->setSessionWhere($sFilter);
		$tbl_users->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $tbl_users;
		$tbl_users->LastAction = $tbl_users->CurrentAction; // Save last action
		$tbl_users->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $tbl_users;
		$bGridUpdate = TRUE;
		$this->WriteAuditTrailDummy($Language->Phrase("BatchUpdateBegin")); // Batch update begin

		// Get old recordset
		$tbl_users->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $tbl_users->SQL();
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
						$tbl_users->CurrentFilter = $tbl_users->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$tbl_users->SendEmail = FALSE; // Do not send email on update success
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
			$this->WriteAuditTrailDummy($Language->Phrase("BatchUpdateSuccess")); // Batch update success
			$this->ClearInlineMode(); // Clear inline edit mode
		} else {
			$this->WriteAuditTrailDummy($Language->Phrase("BatchUpdateRollback")); // Batch update rollback
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->Phrase("UpdateFailed")); // Set update failed message
			$tbl_users->EventCancelled = TRUE; // Set event cancelled
			$tbl_users->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $tbl_users;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $tbl_users->KeyFilter();
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
		global $tbl_users;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 1) {
			$tbl_users->users_ID->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($tbl_users->users_ID->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $tbl_users;
		$rowindex = 1;
		$bGridInsert = FALSE;

		// Init key filter
		$sWrkFilter = "";
		$addcnt = 0;
		$this->WriteAuditTrailDummy($Language->Phrase("BatchInsertBegin")); // Batch insert begin
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
				$tbl_users->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {
					if ($sKey <> "") $sKey .= UP_COMPOSITE_KEY_SEPARATOR;
					$sKey .= $tbl_users->users_ID->CurrentValue;

					// Add filter for this record
					$sFilter = $tbl_users->KeyFilter();
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
			$tbl_users->CurrentFilter = $sWrkFilter;
			$sSql = $tbl_users->SQL();
			if ($rs = $conn->Execute($sSql)) {
				$rsnew = $rs->GetRows();
				$rs->Close();
			}
			$this->WriteAuditTrailDummy($Language->Phrase("BatchInsertSuccess")); // Batch insert success
			$this->ClearInlineMode(); // Clear grid add mode
		} else {
			$this->WriteAuditTrailDummy($Language->Phrase("BatchInsertRollback")); // Batch insert rollback
			if ($this->getFailureMessage() == "") {
				$this->setFailureMessage($Language->Phrase("InsertFailed")); // Set insert failed message
			}
			$tbl_users->EventCancelled = TRUE; // Set event cancelled
			$tbl_users->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $tbl_users, $objForm;
		if ($objForm->HasValue("x_unitID") && $objForm->HasValue("o_unitID") && $tbl_users->unitID->CurrentValue <> $tbl_users->unitID->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_users_name") && $objForm->HasValue("o_users_name") && $tbl_users->users_name->CurrentValue <> $tbl_users->users_name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_users_userLoginName") && $objForm->HasValue("o_users_userLoginName") && $tbl_users->users_userLoginName->CurrentValue <> $tbl_users->users_userLoginName->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_users_password") && $objForm->HasValue("o_users_password") && $tbl_users->users_password->CurrentValue <> $tbl_users->users_password->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_users_userLevel") && $objForm->HasValue("o_users_userLevel") && $tbl_users->users_userLevel->CurrentValue <> $tbl_users->users_userLevel->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_users_email") && $objForm->HasValue("o_users_email") && $tbl_users->users_email->CurrentValue <> $tbl_users->users_email->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_users_contactNo") && $objForm->HasValue("o_users_contactNo") && $tbl_users->users_contactNo->CurrentValue <> $tbl_users->users_contactNo->OldValue)
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
		global $objForm, $tbl_users;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_users;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_users->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_users->CurrentOrderType = @$_GET["ordertype"];
			$tbl_users->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_users;
		$sOrderBy = $tbl_users->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_users->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_users->SqlOrderBy();
				$tbl_users->setSessionOrderBy($sOrderBy);
				$tbl_users->unitID->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_users;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$tbl_users->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$tbl_users->cu->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_users->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_users->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_users;

		// "griddelete"
		if ($tbl_users->AllowAddDeleteRow) {
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
		global $Security, $Language, $tbl_users, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($tbl_users->RowType == UP_ROWTYPE_ADD)
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
		if ($tbl_users->AllowAddDeleteRow) {
			if ($tbl_users->CurrentMode == "add" || $tbl_users->CurrentMode == "copy" || $tbl_users->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (!$Security->CanDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, tbl_users_grid, " . $this->RowIndex . ");\">" . "<img src=\"phpimages/delete.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
				}
			}
		}
		if ($tbl_users->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . $tbl_users->users_ID->CurrentValue . "\">";
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	function SetRecordKey(&$key, $rs) {
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs->fields('users_ID');
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_users;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_users;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_users->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_users->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_users->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_users->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_users->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_users->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_users;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $tbl_users;
		$tbl_users->users_ID->CurrentValue = NULL;
		$tbl_users->users_ID->OldValue = $tbl_users->users_ID->CurrentValue;
		$tbl_users->unitID->CurrentValue = CurrentUserID();
		$tbl_users->unitID->OldValue = $tbl_users->unitID->CurrentValue;
		$tbl_users->users_name->CurrentValue = NULL;
		$tbl_users->users_name->OldValue = $tbl_users->users_name->CurrentValue;
		$tbl_users->users_userLoginName->CurrentValue = NULL;
		$tbl_users->users_userLoginName->OldValue = $tbl_users->users_userLoginName->CurrentValue;
		$tbl_users->users_password->CurrentValue = NULL;
		$tbl_users->users_password->OldValue = $tbl_users->users_password->CurrentValue;
		$tbl_users->users_userLevel->CurrentValue = 1;
		$tbl_users->users_userLevel->OldValue = $tbl_users->users_userLevel->CurrentValue;
		$tbl_users->users_email->CurrentValue = NULL;
		$tbl_users->users_email->OldValue = $tbl_users->users_email->CurrentValue;
		$tbl_users->users_contactNo->CurrentValue = NULL;
		$tbl_users->users_contactNo->OldValue = $tbl_users->users_contactNo->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_users;
		if (!$tbl_users->users_ID->FldIsDetailKey && $tbl_users->CurrentAction <> "gridadd" && $tbl_users->CurrentAction <> "add")
			$tbl_users->users_ID->setFormValue($objForm->GetValue("x_users_ID"));
		if (!$tbl_users->unitID->FldIsDetailKey) {
			$tbl_users->unitID->setFormValue($objForm->GetValue("x_unitID"));
		}
		$tbl_users->unitID->setOldValue($objForm->GetValue("o_unitID"));
		if (!$tbl_users->users_name->FldIsDetailKey) {
			$tbl_users->users_name->setFormValue($objForm->GetValue("x_users_name"));
		}
		$tbl_users->users_name->setOldValue($objForm->GetValue("o_users_name"));
		if (!$tbl_users->users_userLoginName->FldIsDetailKey) {
			$tbl_users->users_userLoginName->setFormValue($objForm->GetValue("x_users_userLoginName"));
		}
		$tbl_users->users_userLoginName->setOldValue($objForm->GetValue("o_users_userLoginName"));
		if (!$tbl_users->users_password->FldIsDetailKey) {
			$tbl_users->users_password->setFormValue($objForm->GetValue("x_users_password"));
		}
		$tbl_users->users_password->setOldValue($objForm->GetValue("o_users_password"));
		if (!$tbl_users->users_userLevel->FldIsDetailKey) {
			$tbl_users->users_userLevel->setFormValue($objForm->GetValue("x_users_userLevel"));
		}
		$tbl_users->users_userLevel->setOldValue($objForm->GetValue("o_users_userLevel"));
		if (!$tbl_users->users_email->FldIsDetailKey) {
			$tbl_users->users_email->setFormValue($objForm->GetValue("x_users_email"));
		}
		$tbl_users->users_email->setOldValue($objForm->GetValue("o_users_email"));
		if (!$tbl_users->users_contactNo->FldIsDetailKey) {
			$tbl_users->users_contactNo->setFormValue($objForm->GetValue("x_users_contactNo"));
		}
		$tbl_users->users_contactNo->setOldValue($objForm->GetValue("o_users_contactNo"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_users;
		if ($tbl_users->CurrentAction <> "gridadd" && $tbl_users->CurrentAction <> "add")
			$tbl_users->users_ID->CurrentValue = $tbl_users->users_ID->FormValue;
		$tbl_users->unitID->CurrentValue = $tbl_users->unitID->FormValue;
		$tbl_users->users_name->CurrentValue = $tbl_users->users_name->FormValue;
		$tbl_users->users_userLoginName->CurrentValue = $tbl_users->users_userLoginName->FormValue;
		$tbl_users->users_password->CurrentValue = $tbl_users->users_password->FormValue;
		$tbl_users->users_userLevel->CurrentValue = $tbl_users->users_userLevel->FormValue;
		$tbl_users->users_email->CurrentValue = $tbl_users->users_email->FormValue;
		$tbl_users->users_contactNo->CurrentValue = $tbl_users->users_contactNo->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_users;

		// Call Recordset Selecting event
		$tbl_users->Recordset_Selecting($tbl_users->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_users->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_users->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_users;
		$sFilter = $tbl_users->KeyFilter();

		// Call Row Selecting event
		$tbl_users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_users->CurrentFilter = $sFilter;
		$sSql = $tbl_users->SQL();
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
		global $conn, $tbl_users;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_users->Row_Selected($row);
		$tbl_users->users_ID->setDbValue($rs->fields('users_ID'));
		$tbl_users->cu->setDbValue($rs->fields('cu'));
		$tbl_users->unitID->setDbValue($rs->fields('unitID'));
		$tbl_users->users_name->setDbValue($rs->fields('users_name'));
		$tbl_users->users_nameLast->setDbValue($rs->fields('users_nameLast'));
		$tbl_users->users_nameFirst->setDbValue($rs->fields('users_nameFirst'));
		$tbl_users->users_nameMiddle->setDbValue($rs->fields('users_nameMiddle'));
		$tbl_users->users_userLoginName->setDbValue($rs->fields('users_userLoginName'));
		$tbl_users->users_password->setDbValue($rs->fields('users_password'));
		$tbl_users->users_userLevel->setDbValue($rs->fields('users_userLevel'));
		$tbl_users->users_email->setDbValue($rs->fields('users_email'));
		$tbl_users->users_contactNo->setDbValue($rs->fields('users_contactNo'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_users;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$tbl_users->users_ID->CurrentValue = strval($arKeys[0]); // users_ID
			else
				$bValidKey = FALSE;
		}

		// Load old recordset
		if ($bValidKey) {
			$tbl_users->CurrentFilter = $tbl_users->KeyFilter();
			$sSql = $tbl_users->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_users;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_users->Row_Rendering();

		// Common render codes for all row types
		// users_ID

		$tbl_users->users_ID->CellCssStyle = "white-space: nowrap;";

		// cu
		$tbl_users->cu->CellCssStyle = "white-space: nowrap;";

		// unitID
		$tbl_users->unitID->CellCssStyle = "white-space: nowrap;";

		// users_name
		$tbl_users->users_name->CellCssStyle = "white-space: nowrap;";

		// users_nameLast
		$tbl_users->users_nameLast->CellCssStyle = "white-space: nowrap;";

		// users_nameFirst
		$tbl_users->users_nameFirst->CellCssStyle = "white-space: nowrap;";

		// users_nameMiddle
		$tbl_users->users_nameMiddle->CellCssStyle = "white-space: nowrap;";

		// users_userLoginName
		$tbl_users->users_userLoginName->CellCssStyle = "white-space: nowrap;";

		// users_password
		$tbl_users->users_password->CellCssStyle = "white-space: nowrap;";

		// users_userLevel
		$tbl_users->users_userLevel->CellCssStyle = "white-space: nowrap;";

		// users_email
		$tbl_users->users_email->CellCssStyle = "white-space: nowrap;";

		// users_contactNo
		$tbl_users->users_contactNo->CellCssStyle = "white-space: nowrap;";
		if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View row

			// users_ID
			$tbl_users->users_ID->ViewValue = $tbl_users->users_ID->CurrentValue;
			$tbl_users->users_ID->ViewCustomAttributes = "";

			// unitID
			if (strval($tbl_users->unitID->CurrentValue) <> "") {
				$sFilterWrk = "`unitID` = " . up_AdjustSql($tbl_users->unitID->CurrentValue) . "";
			$sSqlWrk = "SELECT `cuUnitName` FROM `tbl_uporgchart_unit`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `cuUnitName` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_users->unitID->ViewValue = $rswrk->fields('cuUnitName');
					$rswrk->Close();
				} else {
					$tbl_users->unitID->ViewValue = $tbl_users->unitID->CurrentValue;
				}
			} else {
				$tbl_users->unitID->ViewValue = NULL;
			}
			$tbl_users->unitID->ViewCustomAttributes = "";

			// users_name
			$tbl_users->users_name->ViewValue = $tbl_users->users_name->CurrentValue;
			$tbl_users->users_name->ViewCustomAttributes = "";

			// users_userLoginName
			$tbl_users->users_userLoginName->ViewValue = $tbl_users->users_userLoginName->CurrentValue;
			$tbl_users->users_userLoginName->ViewCustomAttributes = "";

			// users_password
			$tbl_users->users_password->ViewValue = "********";
			$tbl_users->users_password->ViewCustomAttributes = "";

			// users_userLevel
			if ($Security->CanAdmin()) { // System admin
			if (strval($tbl_users->users_userLevel->CurrentValue) <> "") {
				switch ($tbl_users->users_userLevel->CurrentValue) {
					case "1":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(1) <> "" ? $tbl_users->users_userLevel->FldTagCaption(1) : $tbl_users->users_userLevel->CurrentValue;
						break;
					case "-1":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(2) <> "" ? $tbl_users->users_userLevel->FldTagCaption(2) : $tbl_users->users_userLevel->CurrentValue;
						break;
					default:
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->CurrentValue;
				}
			} else {
				$tbl_users->users_userLevel->ViewValue = NULL;
			}
			} else {
				$tbl_users->users_userLevel->ViewValue = "********";
			}
			$tbl_users->users_userLevel->ViewCustomAttributes = "";

			// users_email
			$tbl_users->users_email->ViewValue = $tbl_users->users_email->CurrentValue;
			$tbl_users->users_email->ViewCustomAttributes = "";

			// users_contactNo
			$tbl_users->users_contactNo->ViewValue = $tbl_users->users_contactNo->CurrentValue;
			$tbl_users->users_contactNo->ViewCustomAttributes = "";

			// users_ID
			$tbl_users->users_ID->LinkCustomAttributes = "";
			$tbl_users->users_ID->HrefValue = "";
			$tbl_users->users_ID->TooltipValue = "";

			// unitID
			$tbl_users->unitID->LinkCustomAttributes = "";
			$tbl_users->unitID->HrefValue = "";
			$tbl_users->unitID->TooltipValue = "";

			// users_name
			$tbl_users->users_name->LinkCustomAttributes = "";
			$tbl_users->users_name->HrefValue = "";
			$tbl_users->users_name->TooltipValue = "";

			// users_userLoginName
			$tbl_users->users_userLoginName->LinkCustomAttributes = "";
			$tbl_users->users_userLoginName->HrefValue = "";
			$tbl_users->users_userLoginName->TooltipValue = "";

			// users_password
			$tbl_users->users_password->LinkCustomAttributes = "";
			$tbl_users->users_password->HrefValue = "";
			$tbl_users->users_password->TooltipValue = "";

			// users_userLevel
			$tbl_users->users_userLevel->LinkCustomAttributes = "";
			$tbl_users->users_userLevel->HrefValue = "";
			$tbl_users->users_userLevel->TooltipValue = "";

			// users_email
			$tbl_users->users_email->LinkCustomAttributes = "";
			$tbl_users->users_email->HrefValue = "";
			$tbl_users->users_email->TooltipValue = "";

			// users_contactNo
			$tbl_users->users_contactNo->LinkCustomAttributes = "";
			$tbl_users->users_contactNo->HrefValue = "";
			$tbl_users->users_contactNo->TooltipValue = "";
		} elseif ($tbl_users->RowType == UP_ROWTYPE_ADD) { // Add row

			// users_ID
			// unitID

			$tbl_users->unitID->EditCustomAttributes = "";
			if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
				$tbl_users->unitID->CurrentValue = CurrentUserID();
			if (strval($tbl_users->unitID->CurrentValue) <> "") {
				$sFilterWrk = "`unitID` = " . up_AdjustSql($tbl_users->unitID->CurrentValue) . "";
			$sSqlWrk = "SELECT `cuUnitName` FROM `tbl_uporgchart_unit`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `cuUnitName` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_users->unitID->EditValue = $rswrk->fields('cuUnitName');
					$rswrk->Close();
				} else {
					$tbl_users->unitID->EditValue = $tbl_users->unitID->CurrentValue;
				}
			} else {
				$tbl_users->unitID->EditValue = NULL;
			}
			$tbl_users->unitID->ViewCustomAttributes = "";
			} else {
			}

			// users_name
			$tbl_users->users_name->EditCustomAttributes = "";
			$tbl_users->users_name->EditValue = up_HtmlEncode($tbl_users->users_name->CurrentValue);

			// users_userLoginName
			$tbl_users->users_userLoginName->EditCustomAttributes = "";
			$tbl_users->users_userLoginName->EditValue = up_HtmlEncode($tbl_users->users_userLoginName->CurrentValue);

			// users_password
			$tbl_users->users_password->EditCustomAttributes = "";
			$tbl_users->users_password->EditValue = up_HtmlEncode($tbl_users->users_password->CurrentValue);

			// users_userLevel
			$tbl_users->users_userLevel->EditCustomAttributes = "";
			if (!$Security->CanAdmin()) { // System admin
				$tbl_users->users_userLevel->EditValue = "********";
			} else {
			$arwrk = array();
			$arwrk[] = array("1", $tbl_users->users_userLevel->FldTagCaption(1) <> "" ? $tbl_users->users_userLevel->FldTagCaption(1) : "1");
			$arwrk[] = array("-1", $tbl_users->users_userLevel->FldTagCaption(2) <> "" ? $tbl_users->users_userLevel->FldTagCaption(2) : "-1");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_users->users_userLevel->EditValue = $arwrk;
			}

			// users_email
			$tbl_users->users_email->EditCustomAttributes = "";
			$tbl_users->users_email->EditValue = up_HtmlEncode($tbl_users->users_email->CurrentValue);

			// users_contactNo
			$tbl_users->users_contactNo->EditCustomAttributes = "";
			$tbl_users->users_contactNo->EditValue = up_HtmlEncode($tbl_users->users_contactNo->CurrentValue);

			// Edit refer script
			// users_ID

			$tbl_users->users_ID->HrefValue = "";

			// unitID
			$tbl_users->unitID->HrefValue = "";

			// users_name
			$tbl_users->users_name->HrefValue = "";

			// users_userLoginName
			$tbl_users->users_userLoginName->HrefValue = "";

			// users_password
			$tbl_users->users_password->HrefValue = "";

			// users_userLevel
			$tbl_users->users_userLevel->HrefValue = "";

			// users_email
			$tbl_users->users_email->HrefValue = "";

			// users_contactNo
			$tbl_users->users_contactNo->HrefValue = "";
		} elseif ($tbl_users->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// users_ID
			$tbl_users->users_ID->EditCustomAttributes = "";
			$tbl_users->users_ID->EditValue = $tbl_users->users_ID->CurrentValue;
			$tbl_users->users_ID->ViewCustomAttributes = "";

			// unitID
			$tbl_users->unitID->EditCustomAttributes = "";
			if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
				$tbl_users->unitID->CurrentValue = CurrentUserID();
			if (strval($tbl_users->unitID->CurrentValue) <> "") {
				$sFilterWrk = "`unitID` = " . up_AdjustSql($tbl_users->unitID->CurrentValue) . "";
			$sSqlWrk = "SELECT `cuUnitName` FROM `tbl_uporgchart_unit`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `cuUnitName` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_users->unitID->EditValue = $rswrk->fields('cuUnitName');
					$rswrk->Close();
				} else {
					$tbl_users->unitID->EditValue = $tbl_users->unitID->CurrentValue;
				}
			} else {
				$tbl_users->unitID->EditValue = NULL;
			}
			$tbl_users->unitID->ViewCustomAttributes = "";
			} else {
			}

			// users_name
			$tbl_users->users_name->EditCustomAttributes = "";
			$tbl_users->users_name->EditValue = up_HtmlEncode($tbl_users->users_name->CurrentValue);

			// users_userLoginName
			$tbl_users->users_userLoginName->EditCustomAttributes = "";
			$tbl_users->users_userLoginName->EditValue = up_HtmlEncode($tbl_users->users_userLoginName->CurrentValue);

			// users_password
			$tbl_users->users_password->EditCustomAttributes = "";
			$tbl_users->users_password->EditValue = up_HtmlEncode($tbl_users->users_password->CurrentValue);

			// users_userLevel
			$tbl_users->users_userLevel->EditCustomAttributes = "";
			if (!$Security->CanAdmin()) { // System admin
				$tbl_users->users_userLevel->EditValue = "********";
			} else {
			$arwrk = array();
			$arwrk[] = array("1", $tbl_users->users_userLevel->FldTagCaption(1) <> "" ? $tbl_users->users_userLevel->FldTagCaption(1) : "1");
			$arwrk[] = array("-1", $tbl_users->users_userLevel->FldTagCaption(2) <> "" ? $tbl_users->users_userLevel->FldTagCaption(2) : "-1");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_users->users_userLevel->EditValue = $arwrk;
			}

			// users_email
			$tbl_users->users_email->EditCustomAttributes = "";
			$tbl_users->users_email->EditValue = up_HtmlEncode($tbl_users->users_email->CurrentValue);

			// users_contactNo
			$tbl_users->users_contactNo->EditCustomAttributes = "";
			$tbl_users->users_contactNo->EditValue = up_HtmlEncode($tbl_users->users_contactNo->CurrentValue);

			// Edit refer script
			// users_ID

			$tbl_users->users_ID->HrefValue = "";

			// unitID
			$tbl_users->unitID->HrefValue = "";

			// users_name
			$tbl_users->users_name->HrefValue = "";

			// users_userLoginName
			$tbl_users->users_userLoginName->HrefValue = "";

			// users_password
			$tbl_users->users_password->HrefValue = "";

			// users_userLevel
			$tbl_users->users_userLevel->HrefValue = "";

			// users_email
			$tbl_users->users_email->HrefValue = "";

			// users_contactNo
			$tbl_users->users_contactNo->HrefValue = "";
		}
		if ($tbl_users->RowType == UP_ROWTYPE_ADD ||
			$tbl_users->RowType == UP_ROWTYPE_EDIT ||
			$tbl_users->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_users->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_users->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_users->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_users;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($tbl_users->users_userLoginName->FormValue) && $tbl_users->users_userLoginName->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_users->users_userLoginName->FldCaption());
		}
		if (!is_null($tbl_users->users_password->FormValue) && $tbl_users->users_password->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_users->users_password->FldCaption());
		}
		if (!is_null($tbl_users->users_userLevel->FormValue) && $tbl_users->users_userLevel->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_users->users_userLevel->FldCaption());
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
		global $conn, $Language, $Security, $tbl_users;
		$DeleteRows = TRUE;
		$sSql = $tbl_users->SQL();
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
		$this->WriteAuditTrailDummy($Language->Phrase("BatchDeleteBegin")); // Batch delete begin

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $tbl_users->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['users_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_users->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_users->CancelMessage <> "") {
				$this->setFailureMessage($tbl_users->CancelMessage);
				$tbl_users->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			if ($DeleteRows) {
				foreach ($rsold as $row)
					$this->WriteAuditTrailOnDelete($row);
			}
		} else {
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$tbl_users->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $tbl_users;
		$sFilter = $tbl_users->KeyFilter();
			if ($tbl_users->users_userLoginName->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(`users_userLoginName` = '" . up_AdjustSql($tbl_users->users_userLoginName->CurrentValue) . "')";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$tbl_users->CurrentFilter = $sFilterChk;
			$sSqlChk = $tbl_users->SQL();
			$conn->raiseErrorFn = 'up_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'users_userLoginName', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $tbl_users->users_userLoginName->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
		$tbl_users->CurrentFilter = $sFilter;
		$sSql = $tbl_users->SQL();
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

			// unitID
			$tbl_users->unitID->SetDbValueDef($rsnew, $tbl_users->unitID->CurrentValue, NULL, $tbl_users->unitID->ReadOnly);

			// users_name
			$tbl_users->users_name->SetDbValueDef($rsnew, $tbl_users->users_name->CurrentValue, NULL, $tbl_users->users_name->ReadOnly);

			// users_userLoginName
			$tbl_users->users_userLoginName->SetDbValueDef($rsnew, $tbl_users->users_userLoginName->CurrentValue, "", $tbl_users->users_userLoginName->ReadOnly);

			// users_password
			$tbl_users->users_password->SetDbValueDef($rsnew, $tbl_users->users_password->CurrentValue, "", $tbl_users->users_password->ReadOnly || (UP_ENCRYPTED_PASSWORD && $rs->fields('users_password') == $tbl_users->users_password->CurrentValue));

			// users_userLevel
			if ($Security->CanAdmin()) { // System admin
			$tbl_users->users_userLevel->SetDbValueDef($rsnew, $tbl_users->users_userLevel->CurrentValue, 0, $tbl_users->users_userLevel->ReadOnly);
			}

			// users_email
			$tbl_users->users_email->SetDbValueDef($rsnew, $tbl_users->users_email->CurrentValue, NULL, $tbl_users->users_email->ReadOnly);

			// users_contactNo
			$tbl_users->users_contactNo->SetDbValueDef($rsnew, $tbl_users->users_contactNo->CurrentValue, NULL, $tbl_users->users_contactNo->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $tbl_users->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($tbl_users->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_users->CancelMessage <> "") {
					$this->setFailureMessage($tbl_users->CancelMessage);
					$tbl_users->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_users->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $tbl_users;

		// Check if valid User ID
		$bValidUser = FALSE;
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$bValidUser = $Security->IsValidUserID($tbl_users->unitID->CurrentValue);
			if (!$bValidUser) {
				$sUserIdMsg = str_replace("%c", CurrentUserID(), $Language->Phrase("UnAuthorizedUserID"));
				$sUserIdMsg = str_replace("%u", $tbl_users->unitID->CurrentValue, $sUserIdMsg);
				$this->setFailureMessage($sUserIdMsg);
				return FALSE;
			}
		}

		// Set up foreign key field value from Session
			if ($tbl_users->getCurrentMasterTable() == "view_tbl_uporgchart_cu_users") {
				$tbl_users->cu->CurrentValue = $tbl_users->cu->getSessionValue();
			}
		if ($tbl_users->users_userLoginName->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(users_userLoginName = '" . up_AdjustSql($tbl_users->users_userLoginName->CurrentValue) . "')";
			$rsChk = $tbl_users->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'users_userLoginName', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $tbl_users->users_userLoginName->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$rsnew = array();

		// unitID
		$tbl_users->unitID->SetDbValueDef($rsnew, $tbl_users->unitID->CurrentValue, NULL, FALSE);

		// users_name
		$tbl_users->users_name->SetDbValueDef($rsnew, $tbl_users->users_name->CurrentValue, NULL, FALSE);

		// users_userLoginName
		$tbl_users->users_userLoginName->SetDbValueDef($rsnew, $tbl_users->users_userLoginName->CurrentValue, "", FALSE);

		// users_password
		$tbl_users->users_password->SetDbValueDef($rsnew, $tbl_users->users_password->CurrentValue, "", FALSE);

		// users_userLevel
		if ($Security->CanAdmin()) { // System admin
		$tbl_users->users_userLevel->SetDbValueDef($rsnew, $tbl_users->users_userLevel->CurrentValue, 0, strval($tbl_users->users_userLevel->CurrentValue) == "");
		}

		// users_email
		$tbl_users->users_email->SetDbValueDef($rsnew, $tbl_users->users_email->CurrentValue, NULL, FALSE);

		// users_contactNo
		$tbl_users->users_contactNo->SetDbValueDef($rsnew, $tbl_users->users_contactNo->CurrentValue, NULL, FALSE);

		// cu
		if ($tbl_users->cu->getSessionValue() <> "") {
			$rsnew['cu'] = $tbl_users->cu->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $tbl_users->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($tbl_users->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($tbl_users->CancelMessage <> "") {
				$this->setFailureMessage($tbl_users->CancelMessage);
				$tbl_users->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$tbl_users->users_ID->setDbValue($conn->Insert_ID());
			$rsnew['users_ID'] = $tbl_users->users_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$tbl_users->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $tbl_users;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($tbl_users->unitID->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_users;

		// Hide foreign keys
		$sMasterTblVar = $tbl_users->getCurrentMasterTable();
		if ($sMasterTblVar == "view_tbl_uporgchart_cu_users") {
			$tbl_users->cu->Visible = FALSE;
			if ($GLOBALS["view_tbl_uporgchart_cu_users"]->EventCancelled) $tbl_users->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $tbl_users->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_users->getDetailFilter(); // Get detail filter
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

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_users';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $tbl_users;
		$table = 'tbl_users';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['users_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($tbl_users->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_users->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($tbl_users->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
					$newvalue = "[XML]"; // XML Field
				} else {
					$newvalue = $rs[$fldname];
				}
				up_WriteAuditTrail("log", $dt, $id, $usr, "A", $table, $fldname, $key, "", $newvalue);
			}
		}
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $tbl_users;
		$table = 'tbl_users';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['users_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($tbl_users->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_users->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($tbl_users->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($tbl_users->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
						$oldvalue = "[XML]";
						$newvalue = "[XML]";
					} else {
						$oldvalue = $rsold[$fldname];
						$newvalue = $rsnew[$fldname];
					}
					up_WriteAuditTrail("log", $dt, $id, $usr, "U", $table, $fldname, $key, $oldvalue, $newvalue);
				}
			}
		}
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $tbl_users;
		$table = 'tbl_users';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['users_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $tbl_users->fields) && $tbl_users->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_users->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($tbl_users->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
					$oldvalue = "[XML]"; // XML field
				} else {
					$oldvalue = $rs[$fldname];
				}
				up_WriteAuditTrail("log", $dt, $id, $curUser, "D", $table, $fldname, $key, $oldvalue, "");
			}
		}
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
