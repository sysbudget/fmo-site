<?php include_once "tbl_usersinfo.php" ?>
<?php

//
// Page class
//
class ctbl_faculty_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'tbl_faculty';

	// Page object name
	var $PageObjName = 'tbl_faculty_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_faculty;
		if ($tbl_faculty->UseTokenInUrl) $PageUrl .= "t=" . $tbl_faculty->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_faculty;
		if ($tbl_faculty->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_faculty->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_faculty->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_faculty_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_faculty)
		if (!isset($GLOBALS["tbl_faculty"])) {
			$GLOBALS["tbl_faculty"] = new ctbl_faculty();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["tbl_faculty"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_faculty', TRUE);

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
		global $tbl_faculty;

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

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$tbl_faculty->GridAddRowCount = $gridaddcnt;

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
		global $tbl_faculty;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_faculty;

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
			if ($tbl_faculty->Export <> "" ||
				$tbl_faculty->CurrentAction == "gridadd" ||
				$tbl_faculty->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($tbl_faculty->AllowAddDeleteRow) {
				if ($tbl_faculty->CurrentAction == "gridadd" ||
					$tbl_faculty->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($tbl_faculty->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_faculty->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $tbl_faculty->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $tbl_faculty->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($tbl_faculty->getMasterFilter() <> "" && $tbl_faculty->getCurrentMasterTable() == "tbl_uporgchart_unit") {
			global $tbl_uporgchart_unit;
			$rsmaster = $tbl_uporgchart_unit->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($tbl_faculty->getReturnUrl()); // Return to caller
			} else {
				$tbl_uporgchart_unit->LoadListRowValues($rsmaster);
				$tbl_uporgchart_unit->RowType = UP_ROWTYPE_MASTER; // Master row
				$tbl_uporgchart_unit->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$tbl_faculty->setSessionWhere($sFilter);
		$tbl_faculty->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $tbl_faculty;
		$tbl_faculty->LastAction = $tbl_faculty->CurrentAction; // Save last action
		$tbl_faculty->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $tbl_faculty;
		$bGridUpdate = TRUE;
		$this->WriteAuditTrailDummy($Language->Phrase("BatchUpdateBegin")); // Batch update begin

		// Get old recordset
		$tbl_faculty->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $tbl_faculty->SQL();
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
						$tbl_faculty->CurrentFilter = $tbl_faculty->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$tbl_faculty->SendEmail = FALSE; // Do not send email on update success
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
			$tbl_faculty->EventCancelled = TRUE; // Set event cancelled
			$tbl_faculty->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $tbl_faculty;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $tbl_faculty->KeyFilter();
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
		global $tbl_faculty;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 1) {
			$tbl_faculty->faculty_ID->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($tbl_faculty->faculty_ID->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $tbl_faculty;
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
				$tbl_faculty->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {
					if ($sKey <> "") $sKey .= UP_COMPOSITE_KEY_SEPARATOR;
					$sKey .= $tbl_faculty->faculty_ID->CurrentValue;

					// Add filter for this record
					$sFilter = $tbl_faculty->KeyFilter();
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
			$tbl_faculty->CurrentFilter = $sWrkFilter;
			$sSql = $tbl_faculty->SQL();
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
			$tbl_faculty->EventCancelled = TRUE; // Set event cancelled
			$tbl_faculty->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $tbl_faculty, $objForm;
		if ($objForm->HasValue("x_faculty_name") && $objForm->HasValue("o_faculty_name") && $tbl_faculty->faculty_name->CurrentValue <> $tbl_faculty->faculty_name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_faculty_birthDate") && $objForm->HasValue("o_faculty_birthDate") && $tbl_faculty->faculty_birthDate->CurrentValue <> $tbl_faculty->faculty_birthDate->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_gender_ID") && $objForm->HasValue("o_gender_ID") && $tbl_faculty->gender_ID->CurrentValue <> $tbl_faculty->gender_ID->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_faculty_highestDegreeListed") && $objForm->HasValue("o_faculty_highestDegreeListed") && $tbl_faculty->faculty_highestDegreeListed->CurrentValue <> $tbl_faculty->faculty_highestDegreeListed->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_degreelevelFaculty_ID") && $objForm->HasValue("o_degreelevelFaculty_ID") && $tbl_faculty->degreelevelFaculty_ID->CurrentValue <> $tbl_faculty->degreelevelFaculty_ID->OldValue)
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
		global $objForm, $tbl_faculty;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_faculty;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_faculty->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_faculty->CurrentOrderType = @$_GET["ordertype"];
			$tbl_faculty->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_faculty;
		$sOrderBy = $tbl_faculty->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_faculty->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_faculty->SqlOrderBy();
				$tbl_faculty->setSessionOrderBy($sOrderBy);
				$tbl_faculty->faculty_name->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_faculty;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$tbl_faculty->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$tbl_faculty->unitID->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_faculty->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_faculty->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_faculty;

		// "griddelete"
		if ($tbl_faculty->AllowAddDeleteRow) {
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
		global $Security, $Language, $tbl_faculty, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($tbl_faculty->RowType == UP_ROWTYPE_ADD)
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
		if ($tbl_faculty->AllowAddDeleteRow) {
			if ($tbl_faculty->CurrentMode == "add" || $tbl_faculty->CurrentMode == "copy" || $tbl_faculty->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (!$Security->CanDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, tbl_faculty_grid, " . $this->RowIndex . ");\">" . "<img src=\"phpimages/delete.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
				}
			}
		}
		if ($tbl_faculty->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . $tbl_faculty->faculty_ID->CurrentValue . "\">";
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	function SetRecordKey(&$key, $rs) {
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs->fields('faculty_ID');
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_faculty;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_faculty;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_faculty->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_faculty->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_faculty->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_faculty->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_faculty->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_faculty->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_faculty;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $tbl_faculty;
		$tbl_faculty->faculty_name->CurrentValue = NULL;
		$tbl_faculty->faculty_name->OldValue = $tbl_faculty->faculty_name->CurrentValue;
		$tbl_faculty->faculty_birthDate->CurrentValue = NULL;
		$tbl_faculty->faculty_birthDate->OldValue = $tbl_faculty->faculty_birthDate->CurrentValue;
		$tbl_faculty->gender_ID->CurrentValue = NULL;
		$tbl_faculty->gender_ID->OldValue = $tbl_faculty->gender_ID->CurrentValue;
		$tbl_faculty->faculty_highestDegreeListed->CurrentValue = NULL;
		$tbl_faculty->faculty_highestDegreeListed->OldValue = $tbl_faculty->faculty_highestDegreeListed->CurrentValue;
		$tbl_faculty->degreelevelFaculty_ID->CurrentValue = NULL;
		$tbl_faculty->degreelevelFaculty_ID->OldValue = $tbl_faculty->degreelevelFaculty_ID->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_faculty;
		if (!$tbl_faculty->faculty_name->FldIsDetailKey) {
			$tbl_faculty->faculty_name->setFormValue($objForm->GetValue("x_faculty_name"));
		}
		$tbl_faculty->faculty_name->setOldValue($objForm->GetValue("o_faculty_name"));
		if (!$tbl_faculty->faculty_birthDate->FldIsDetailKey) {
			$tbl_faculty->faculty_birthDate->setFormValue($objForm->GetValue("x_faculty_birthDate"));
			$tbl_faculty->faculty_birthDate->CurrentValue = up_UnFormatDateTime($tbl_faculty->faculty_birthDate->CurrentValue, 6);
		}
		$tbl_faculty->faculty_birthDate->setOldValue($objForm->GetValue("o_faculty_birthDate"));
		if (!$tbl_faculty->gender_ID->FldIsDetailKey) {
			$tbl_faculty->gender_ID->setFormValue($objForm->GetValue("x_gender_ID"));
		}
		$tbl_faculty->gender_ID->setOldValue($objForm->GetValue("o_gender_ID"));
		if (!$tbl_faculty->faculty_highestDegreeListed->FldIsDetailKey) {
			$tbl_faculty->faculty_highestDegreeListed->setFormValue($objForm->GetValue("x_faculty_highestDegreeListed"));
		}
		$tbl_faculty->faculty_highestDegreeListed->setOldValue($objForm->GetValue("o_faculty_highestDegreeListed"));
		if (!$tbl_faculty->degreelevelFaculty_ID->FldIsDetailKey) {
			$tbl_faculty->degreelevelFaculty_ID->setFormValue($objForm->GetValue("x_degreelevelFaculty_ID"));
		}
		$tbl_faculty->degreelevelFaculty_ID->setOldValue($objForm->GetValue("o_degreelevelFaculty_ID"));
		if (!$tbl_faculty->faculty_ID->FldIsDetailKey && $tbl_faculty->CurrentAction <> "gridadd" && $tbl_faculty->CurrentAction <> "add")
			$tbl_faculty->faculty_ID->setFormValue($objForm->GetValue("x_faculty_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_faculty;
		if ($tbl_faculty->CurrentAction <> "gridadd" && $tbl_faculty->CurrentAction <> "add")
			$tbl_faculty->faculty_ID->CurrentValue = $tbl_faculty->faculty_ID->FormValue;
		$tbl_faculty->faculty_name->CurrentValue = $tbl_faculty->faculty_name->FormValue;
		$tbl_faculty->faculty_birthDate->CurrentValue = $tbl_faculty->faculty_birthDate->FormValue;
		$tbl_faculty->faculty_birthDate->CurrentValue = up_UnFormatDateTime($tbl_faculty->faculty_birthDate->CurrentValue, 6);
		$tbl_faculty->gender_ID->CurrentValue = $tbl_faculty->gender_ID->FormValue;
		$tbl_faculty->faculty_highestDegreeListed->CurrentValue = $tbl_faculty->faculty_highestDegreeListed->FormValue;
		$tbl_faculty->degreelevelFaculty_ID->CurrentValue = $tbl_faculty->degreelevelFaculty_ID->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_faculty;

		// Call Recordset Selecting event
		$tbl_faculty->Recordset_Selecting($tbl_faculty->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_faculty->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_faculty->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_faculty;
		$sFilter = $tbl_faculty->KeyFilter();

		// Call Row Selecting event
		$tbl_faculty->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_faculty->CurrentFilter = $sFilter;
		$sSql = $tbl_faculty->SQL();
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
		global $conn, $tbl_faculty;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_faculty->Row_Selected($row);
		$tbl_faculty->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$tbl_faculty->unitID->setDbValue($rs->fields('unitID'));
		$tbl_faculty->faculty_name->setDbValue($rs->fields('faculty_name'));
		$tbl_faculty->faculty_lastName->setDbValue($rs->fields('faculty_lastName'));
		$tbl_faculty->faculty_firstName->setDbValue($rs->fields('faculty_firstName'));
		$tbl_faculty->faculty_middleName->setDbValue($rs->fields('faculty_middleName'));
		$tbl_faculty->faculty_birthDate->setDbValue($rs->fields('faculty_birthDate'));
		$tbl_faculty->gender_ID->setDbValue($rs->fields('gender_ID'));
		$tbl_faculty->faculty_hda_gen->setDbValue($rs->fields('faculty_hda_gen'));
		$tbl_faculty->faculty_inActivePursuitofHigherDegree_gen->setDbValue($rs->fields('faculty_inActivePursuitofHigherDegree_gen'));
		$tbl_faculty->faculty_highestDegreeListed->setDbValue($rs->fields('faculty_highestDegreeListed'));
		$tbl_faculty->degreelevelFaculty_ID->setDbValue($rs->fields('degreelevelFaculty_ID'));
		$tbl_faculty->faculty_isEnrolledOrInResidence->setDbValue($rs->fields('faculty_isEnrolledOrInResidence'));
		$tbl_faculty->faculty_hasEarnedCreditUnits->setDbValue($rs->fields('faculty_hasEarnedCreditUnits'));
		$tbl_faculty->faculty_candidate->setDbValue($rs->fields('faculty_candidate'));
		$tbl_faculty->faculty_authoritative_data->setDbValue($rs->fields('faculty_authoritative_data'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_faculty;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$tbl_faculty->faculty_ID->CurrentValue = strval($arKeys[0]); // faculty_ID
			else
				$bValidKey = FALSE;
		}

		// Load old recordset
		if ($bValidKey) {
			$tbl_faculty->CurrentFilter = $tbl_faculty->KeyFilter();
			$sSql = $tbl_faculty->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_faculty;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_faculty->Row_Rendering();

		// Common render codes for all row types
		// faculty_ID

		$tbl_faculty->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// unitID
		$tbl_faculty->unitID->CellCssStyle = "white-space: nowrap;";

		// faculty_name
		$tbl_faculty->faculty_name->CellCssStyle = "white-space: nowrap;";

		// faculty_lastName
		$tbl_faculty->faculty_lastName->CellCssStyle = "white-space: nowrap;";

		// faculty_firstName
		$tbl_faculty->faculty_firstName->CellCssStyle = "white-space: nowrap;";

		// faculty_middleName
		$tbl_faculty->faculty_middleName->CellCssStyle = "white-space: nowrap;";

		// faculty_birthDate
		$tbl_faculty->faculty_birthDate->CellCssStyle = "white-space: nowrap;";

		// gender_ID
		$tbl_faculty->gender_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_hda_gen
		$tbl_faculty->faculty_hda_gen->CellCssStyle = "white-space: nowrap;";

		// faculty_inActivePursuitofHigherDegree_gen
		$tbl_faculty->faculty_inActivePursuitofHigherDegree_gen->CellCssStyle = "white-space: nowrap;";

		// faculty_highestDegreeListed
		$tbl_faculty->faculty_highestDegreeListed->CellCssStyle = "white-space: nowrap;";

		// degreelevelFaculty_ID
		// faculty_isEnrolledOrInResidence

		$tbl_faculty->faculty_isEnrolledOrInResidence->CellCssStyle = "white-space: nowrap;";

		// faculty_hasEarnedCreditUnits
		$tbl_faculty->faculty_hasEarnedCreditUnits->CellCssStyle = "white-space: nowrap;";

		// faculty_candidate
		$tbl_faculty->faculty_candidate->CellCssStyle = "white-space: nowrap;";

		// faculty_authoritative_data
		$tbl_faculty->faculty_authoritative_data->CellCssStyle = "white-space: nowrap;";
		if ($tbl_faculty->RowType == UP_ROWTYPE_VIEW) { // View row

			// faculty_name
			$tbl_faculty->faculty_name->ViewValue = $tbl_faculty->faculty_name->CurrentValue;
			$tbl_faculty->faculty_name->ViewCustomAttributes = "";

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->ViewValue = $tbl_faculty->faculty_birthDate->CurrentValue;
			$tbl_faculty->faculty_birthDate->ViewValue = up_FormatDateTime($tbl_faculty->faculty_birthDate->ViewValue, 6);
			$tbl_faculty->faculty_birthDate->ViewCustomAttributes = "";

			// gender_ID
			if (strval($tbl_faculty->gender_ID->CurrentValue) <> "") {
				switch ($tbl_faculty->gender_ID->CurrentValue) {
					case "F":
						$tbl_faculty->gender_ID->ViewValue = $tbl_faculty->gender_ID->FldTagCaption(1) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(1) : $tbl_faculty->gender_ID->CurrentValue;
						break;
					case "M":
						$tbl_faculty->gender_ID->ViewValue = $tbl_faculty->gender_ID->FldTagCaption(2) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(2) : $tbl_faculty->gender_ID->CurrentValue;
						break;
					default:
						$tbl_faculty->gender_ID->ViewValue = $tbl_faculty->gender_ID->CurrentValue;
				}
			} else {
				$tbl_faculty->gender_ID->ViewValue = NULL;
			}
			$tbl_faculty->gender_ID->ViewCustomAttributes = "";

			// faculty_highestDegreeListed
			$tbl_faculty->faculty_highestDegreeListed->ViewValue = $tbl_faculty->faculty_highestDegreeListed->CurrentValue;
			if (strval($tbl_faculty->faculty_highestDegreeListed->CurrentValue) <> "") {
				$sFilterWrk = "`degreeLevel_ID` = " . up_AdjustSql($tbl_faculty->faculty_highestDegreeListed->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreeLevel_name` FROM `ref_degreelevel_degrees`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_faculty->faculty_highestDegreeListed->ViewValue = $rswrk->fields('degreeLevel_name');
					$rswrk->Close();
				} else {
					$tbl_faculty->faculty_highestDegreeListed->ViewValue = $tbl_faculty->faculty_highestDegreeListed->CurrentValue;
				}
			} else {
				$tbl_faculty->faculty_highestDegreeListed->ViewValue = NULL;
			}
			$tbl_faculty->faculty_highestDegreeListed->ViewCustomAttributes = "";

			// degreelevelFaculty_ID
			if (strval($tbl_faculty->degreelevelFaculty_ID->CurrentValue) <> "") {
				$sFilterWrk = "`degreelevelFaculty_ID` = " . up_AdjustSql($tbl_faculty->degreelevelFaculty_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreelevelFaculty_name` FROM `ref_degreelevel_faculty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `degreelevelFaculty_name` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_faculty->degreelevelFaculty_ID->ViewValue = $rswrk->fields('degreelevelFaculty_name');
					$rswrk->Close();
				} else {
					$tbl_faculty->degreelevelFaculty_ID->ViewValue = $tbl_faculty->degreelevelFaculty_ID->CurrentValue;
				}
			} else {
				$tbl_faculty->degreelevelFaculty_ID->ViewValue = NULL;
			}
			$tbl_faculty->degreelevelFaculty_ID->ViewCustomAttributes = "";

			// faculty_name
			$tbl_faculty->faculty_name->LinkCustomAttributes = "";
			$tbl_faculty->faculty_name->HrefValue = "";
			$tbl_faculty->faculty_name->TooltipValue = "";

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->LinkCustomAttributes = "";
			$tbl_faculty->faculty_birthDate->HrefValue = "";
			$tbl_faculty->faculty_birthDate->TooltipValue = "";

			// gender_ID
			$tbl_faculty->gender_ID->LinkCustomAttributes = "";
			$tbl_faculty->gender_ID->HrefValue = "";
			$tbl_faculty->gender_ID->TooltipValue = "";

			// faculty_highestDegreeListed
			$tbl_faculty->faculty_highestDegreeListed->LinkCustomAttributes = "";
			$tbl_faculty->faculty_highestDegreeListed->HrefValue = "";
			$tbl_faculty->faculty_highestDegreeListed->TooltipValue = "";

			// degreelevelFaculty_ID
			$tbl_faculty->degreelevelFaculty_ID->LinkCustomAttributes = "";
			$tbl_faculty->degreelevelFaculty_ID->HrefValue = "";
			$tbl_faculty->degreelevelFaculty_ID->TooltipValue = "";
		} elseif ($tbl_faculty->RowType == UP_ROWTYPE_ADD) { // Add row

			// faculty_name
			$tbl_faculty->faculty_name->EditCustomAttributes = "";
			$tbl_faculty->faculty_name->EditValue = up_HtmlEncode($tbl_faculty->faculty_name->CurrentValue);

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->EditCustomAttributes = "";
			$tbl_faculty->faculty_birthDate->EditValue = up_HtmlEncode(up_FormatDateTime($tbl_faculty->faculty_birthDate->CurrentValue, 6));

			// gender_ID
			$tbl_faculty->gender_ID->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("F", $tbl_faculty->gender_ID->FldTagCaption(1) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(1) : "F");
			$arwrk[] = array("M", $tbl_faculty->gender_ID->FldTagCaption(2) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(2) : "M");
			$tbl_faculty->gender_ID->EditValue = $arwrk;

			// faculty_highestDegreeListed
			$tbl_faculty->faculty_highestDegreeListed->EditCustomAttributes = "";
			$tbl_faculty->faculty_highestDegreeListed->EditValue = up_HtmlEncode($tbl_faculty->faculty_highestDegreeListed->CurrentValue);

			// degreelevelFaculty_ID
			$tbl_faculty->degreelevelFaculty_ID->EditCustomAttributes = "";

			// Edit refer script
			// faculty_name

			$tbl_faculty->faculty_name->HrefValue = "";

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->HrefValue = "";

			// gender_ID
			$tbl_faculty->gender_ID->HrefValue = "";

			// faculty_highestDegreeListed
			$tbl_faculty->faculty_highestDegreeListed->HrefValue = "";

			// degreelevelFaculty_ID
			$tbl_faculty->degreelevelFaculty_ID->HrefValue = "";
		} elseif ($tbl_faculty->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// faculty_name
			$tbl_faculty->faculty_name->EditCustomAttributes = "";
			$tbl_faculty->faculty_name->EditValue = up_HtmlEncode($tbl_faculty->faculty_name->CurrentValue);

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->EditCustomAttributes = "";
			$tbl_faculty->faculty_birthDate->EditValue = up_HtmlEncode(up_FormatDateTime($tbl_faculty->faculty_birthDate->CurrentValue, 6));

			// gender_ID
			$tbl_faculty->gender_ID->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("F", $tbl_faculty->gender_ID->FldTagCaption(1) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(1) : "F");
			$arwrk[] = array("M", $tbl_faculty->gender_ID->FldTagCaption(2) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(2) : "M");
			$tbl_faculty->gender_ID->EditValue = $arwrk;

			// faculty_highestDegreeListed
			$tbl_faculty->faculty_highestDegreeListed->EditCustomAttributes = "";
			$tbl_faculty->faculty_highestDegreeListed->EditValue = up_HtmlEncode($tbl_faculty->faculty_highestDegreeListed->CurrentValue);

			// degreelevelFaculty_ID
			$tbl_faculty->degreelevelFaculty_ID->EditCustomAttributes = "";

			// Edit refer script
			// faculty_name

			$tbl_faculty->faculty_name->HrefValue = "";

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->HrefValue = "";

			// gender_ID
			$tbl_faculty->gender_ID->HrefValue = "";

			// faculty_highestDegreeListed
			$tbl_faculty->faculty_highestDegreeListed->HrefValue = "";

			// degreelevelFaculty_ID
			$tbl_faculty->degreelevelFaculty_ID->HrefValue = "";
		}
		if ($tbl_faculty->RowType == UP_ROWTYPE_ADD ||
			$tbl_faculty->RowType == UP_ROWTYPE_EDIT ||
			$tbl_faculty->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_faculty->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_faculty->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_faculty->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_faculty;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckUSDate($tbl_faculty->faculty_birthDate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_faculty->faculty_birthDate->FldErrMsg());
		}
		if ($tbl_faculty->gender_ID->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_faculty->gender_ID->FldCaption());
		}
		if (!up_CheckInteger($tbl_faculty->faculty_highestDegreeListed->FormValue)) {
			up_AddMessage($gsFormError, $tbl_faculty->faculty_highestDegreeListed->FldErrMsg());
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
		global $conn, $Language, $Security, $tbl_faculty;
		$DeleteRows = TRUE;
		$sSql = $tbl_faculty->SQL();
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
				$DeleteRows = $tbl_faculty->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['faculty_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_faculty->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_faculty->CancelMessage <> "") {
				$this->setFailureMessage($tbl_faculty->CancelMessage);
				$tbl_faculty->CancelMessage = "";
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
				$tbl_faculty->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $tbl_faculty;
		$sFilter = $tbl_faculty->KeyFilter();
		$tbl_faculty->CurrentFilter = $sFilter;
		$sSql = $tbl_faculty->SQL();
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

			// faculty_name
			$tbl_faculty->faculty_name->SetDbValueDef($rsnew, $tbl_faculty->faculty_name->CurrentValue, NULL, $tbl_faculty->faculty_name->ReadOnly);

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->SetDbValueDef($rsnew, up_UnFormatDateTime($tbl_faculty->faculty_birthDate->CurrentValue, 6), NULL, $tbl_faculty->faculty_birthDate->ReadOnly);

			// gender_ID
			$tbl_faculty->gender_ID->SetDbValueDef($rsnew, $tbl_faculty->gender_ID->CurrentValue, NULL, $tbl_faculty->gender_ID->ReadOnly);

			// faculty_highestDegreeListed
			$tbl_faculty->faculty_highestDegreeListed->SetDbValueDef($rsnew, $tbl_faculty->faculty_highestDegreeListed->CurrentValue, NULL, $tbl_faculty->faculty_highestDegreeListed->ReadOnly);

			// degreelevelFaculty_ID
			$tbl_faculty->degreelevelFaculty_ID->SetDbValueDef($rsnew, $tbl_faculty->degreelevelFaculty_ID->CurrentValue, NULL, $tbl_faculty->degreelevelFaculty_ID->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $tbl_faculty->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($tbl_faculty->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_faculty->CancelMessage <> "") {
					$this->setFailureMessage($tbl_faculty->CancelMessage);
					$tbl_faculty->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_faculty->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $tbl_faculty;

		// Set up foreign key field value from Session
			if ($tbl_faculty->getCurrentMasterTable() == "tbl_uporgchart_unit") {
				$tbl_faculty->unitID->CurrentValue = $tbl_faculty->unitID->getSessionValue();
			}
		$rsnew = array();

		// faculty_name
		$tbl_faculty->faculty_name->SetDbValueDef($rsnew, $tbl_faculty->faculty_name->CurrentValue, NULL, FALSE);

		// faculty_birthDate
		$tbl_faculty->faculty_birthDate->SetDbValueDef($rsnew, up_UnFormatDateTime($tbl_faculty->faculty_birthDate->CurrentValue, 6), NULL, FALSE);

		// gender_ID
		$tbl_faculty->gender_ID->SetDbValueDef($rsnew, $tbl_faculty->gender_ID->CurrentValue, NULL, FALSE);

		// faculty_highestDegreeListed
		$tbl_faculty->faculty_highestDegreeListed->SetDbValueDef($rsnew, $tbl_faculty->faculty_highestDegreeListed->CurrentValue, NULL, FALSE);

		// degreelevelFaculty_ID
		$tbl_faculty->degreelevelFaculty_ID->SetDbValueDef($rsnew, $tbl_faculty->degreelevelFaculty_ID->CurrentValue, NULL, FALSE);

		// unitID
		if ($tbl_faculty->unitID->getSessionValue() <> "") {
			$rsnew['unitID'] = $tbl_faculty->unitID->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $tbl_faculty->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($tbl_faculty->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($tbl_faculty->CancelMessage <> "") {
				$this->setFailureMessage($tbl_faculty->CancelMessage);
				$tbl_faculty->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$tbl_faculty->faculty_ID->setDbValue($conn->Insert_ID());
			$rsnew['faculty_ID'] = $tbl_faculty->faculty_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$tbl_faculty->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_faculty;

		// Hide foreign keys
		$sMasterTblVar = $tbl_faculty->getCurrentMasterTable();
		if ($sMasterTblVar == "tbl_uporgchart_unit") {
			$tbl_faculty->unitID->Visible = FALSE;
			if ($GLOBALS["tbl_uporgchart_unit"]->EventCancelled) $tbl_faculty->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $tbl_faculty->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_faculty->getDetailFilter(); // Get detail filter
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
		$table = 'tbl_faculty';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $tbl_faculty;
		$table = 'tbl_faculty';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['faculty_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($tbl_faculty->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($tbl_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
		global $tbl_faculty;
		$table = 'tbl_faculty';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['faculty_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($tbl_faculty->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($tbl_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($tbl_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
		global $tbl_faculty;
		$table = 'tbl_faculty';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['faculty_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $tbl_faculty->fields) && $tbl_faculty->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($tbl_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
