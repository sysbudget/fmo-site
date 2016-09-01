<?php include_once "tbl_usersinfo.php" ?>
<?php

//
// Page class
//
class ctbl_degrees_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'tbl_degrees';

	// Page object name
	var $PageObjName = 'tbl_degrees_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_degrees;
		if ($tbl_degrees->UseTokenInUrl) $PageUrl .= "t=" . $tbl_degrees->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_degrees;
		if ($tbl_degrees->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_degrees->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_degrees->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_degrees_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_degrees)
		if (!isset($GLOBALS["tbl_degrees"])) {
			$GLOBALS["tbl_degrees"] = new ctbl_degrees();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["tbl_degrees"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_degrees', TRUE);

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
		global $tbl_degrees;

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
			$tbl_degrees->GridAddRowCount = $gridaddcnt;

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
		global $tbl_degrees;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_degrees;

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
			if ($tbl_degrees->Export <> "" ||
				$tbl_degrees->CurrentAction == "gridadd" ||
				$tbl_degrees->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($tbl_degrees->AllowAddDeleteRow) {
				if ($tbl_degrees->CurrentAction == "gridadd" ||
					$tbl_degrees->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($tbl_degrees->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_degrees->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $tbl_degrees->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $tbl_degrees->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($tbl_degrees->getMasterFilter() <> "" && $tbl_degrees->getCurrentMasterTable() == "tbl_faculty") {
			global $tbl_faculty;
			$rsmaster = $tbl_faculty->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($tbl_degrees->getReturnUrl()); // Return to caller
			} else {
				$tbl_faculty->LoadListRowValues($rsmaster);
				$tbl_faculty->RowType = UP_ROWTYPE_MASTER; // Master row
				$tbl_faculty->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$tbl_degrees->setSessionWhere($sFilter);
		$tbl_degrees->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $tbl_degrees;
		$tbl_degrees->LastAction = $tbl_degrees->CurrentAction; // Save last action
		$tbl_degrees->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $tbl_degrees;
		$bGridUpdate = TRUE;
		$this->WriteAuditTrailDummy($Language->Phrase("BatchUpdateBegin")); // Batch update begin

		// Get old recordset
		$tbl_degrees->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $tbl_degrees->SQL();
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
						$tbl_degrees->CurrentFilter = $tbl_degrees->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$tbl_degrees->SendEmail = FALSE; // Do not send email on update success
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
			$tbl_degrees->EventCancelled = TRUE; // Set event cancelled
			$tbl_degrees->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $tbl_degrees;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $tbl_degrees->KeyFilter();
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
		global $tbl_degrees;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 1) {
			$tbl_degrees->degrees_ID->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($tbl_degrees->degrees_ID->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $tbl_degrees;
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
				$tbl_degrees->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {
					if ($sKey <> "") $sKey .= UP_COMPOSITE_KEY_SEPARATOR;
					$sKey .= $tbl_degrees->degrees_ID->CurrentValue;

					// Add filter for this record
					$sFilter = $tbl_degrees->KeyFilter();
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
			$tbl_degrees->CurrentFilter = $sWrkFilter;
			$sSql = $tbl_degrees->SQL();
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
			$tbl_degrees->EventCancelled = TRUE; // Set event cancelled
			$tbl_degrees->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $tbl_degrees, $objForm;
		if ($objForm->HasValue("x_degrees_level") && $objForm->HasValue("o_degrees_level") && $tbl_degrees->degrees_level->CurrentValue <> $tbl_degrees->degrees_level->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_degrees_disciplineCode") && $objForm->HasValue("o_degrees_disciplineCode") && $tbl_degrees->degrees_disciplineCode->CurrentValue <> $tbl_degrees->degrees_disciplineCode->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_degrees_fieldOfStudy") && $objForm->HasValue("o_degrees_fieldOfStudy") && $tbl_degrees->degrees_fieldOfStudy->CurrentValue <> $tbl_degrees->degrees_fieldOfStudy->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_degrees_wroteThesisDissertation") && $objForm->HasValue("o_degrees_wroteThesisDissertation") && $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue <> $tbl_degrees->degrees_wroteThesisDissertation->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_degrees_primaryDegree") && $objForm->HasValue("o_degrees_primaryDegree") && $tbl_degrees->degrees_primaryDegree->CurrentValue <> $tbl_degrees->degrees_primaryDegree->OldValue)
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
		global $objForm, $tbl_degrees;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_degrees;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_degrees->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_degrees->CurrentOrderType = @$_GET["ordertype"];
			$tbl_degrees->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_degrees;
		$sOrderBy = $tbl_degrees->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_degrees->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_degrees->SqlOrderBy();
				$tbl_degrees->setSessionOrderBy($sOrderBy);
				$tbl_degrees->degrees_level->setSort("DESC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_degrees;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$tbl_degrees->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$tbl_degrees->faculty_ID->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_degrees->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_degrees->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_degrees;

		// "griddelete"
		if ($tbl_degrees->AllowAddDeleteRow) {
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
		global $Security, $Language, $tbl_degrees, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($tbl_degrees->RowType == UP_ROWTYPE_ADD)
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
		if ($tbl_degrees->AllowAddDeleteRow) {
			if ($tbl_degrees->CurrentMode == "add" || $tbl_degrees->CurrentMode == "copy" || $tbl_degrees->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (!$Security->CanDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, tbl_degrees_grid, " . $this->RowIndex . ");\">" . "<img src=\"phpimages/delete.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
				}
			}
		}
		if ($tbl_degrees->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . $tbl_degrees->degrees_ID->CurrentValue . "\">";
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	function SetRecordKey(&$key, $rs) {
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs->fields('degrees_ID');
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_degrees;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_degrees;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_degrees->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_degrees->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_degrees->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_degrees->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_degrees->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_degrees->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_degrees;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $tbl_degrees;
		$tbl_degrees->degrees_level->CurrentValue = NULL;
		$tbl_degrees->degrees_level->OldValue = $tbl_degrees->degrees_level->CurrentValue;
		$tbl_degrees->degrees_disciplineCode->CurrentValue = NULL;
		$tbl_degrees->degrees_disciplineCode->OldValue = $tbl_degrees->degrees_disciplineCode->CurrentValue;
		$tbl_degrees->degrees_fieldOfStudy->CurrentValue = NULL;
		$tbl_degrees->degrees_fieldOfStudy->OldValue = $tbl_degrees->degrees_fieldOfStudy->CurrentValue;
		$tbl_degrees->degrees_wroteThesisDissertation->CurrentValue = NULL;
		$tbl_degrees->degrees_wroteThesisDissertation->OldValue = $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
		$tbl_degrees->degrees_primaryDegree->CurrentValue = NULL;
		$tbl_degrees->degrees_primaryDegree->OldValue = $tbl_degrees->degrees_primaryDegree->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_degrees;
		if (!$tbl_degrees->degrees_level->FldIsDetailKey) {
			$tbl_degrees->degrees_level->setFormValue($objForm->GetValue("x_degrees_level"));
		}
		$tbl_degrees->degrees_level->setOldValue($objForm->GetValue("o_degrees_level"));
		if (!$tbl_degrees->degrees_disciplineCode->FldIsDetailKey) {
			$tbl_degrees->degrees_disciplineCode->setFormValue($objForm->GetValue("x_degrees_disciplineCode"));
		}
		$tbl_degrees->degrees_disciplineCode->setOldValue($objForm->GetValue("o_degrees_disciplineCode"));
		if (!$tbl_degrees->degrees_fieldOfStudy->FldIsDetailKey) {
			$tbl_degrees->degrees_fieldOfStudy->setFormValue($objForm->GetValue("x_degrees_fieldOfStudy"));
		}
		$tbl_degrees->degrees_fieldOfStudy->setOldValue($objForm->GetValue("o_degrees_fieldOfStudy"));
		if (!$tbl_degrees->degrees_wroteThesisDissertation->FldIsDetailKey) {
			$tbl_degrees->degrees_wroteThesisDissertation->setFormValue($objForm->GetValue("x_degrees_wroteThesisDissertation"));
		}
		$tbl_degrees->degrees_wroteThesisDissertation->setOldValue($objForm->GetValue("o_degrees_wroteThesisDissertation"));
		if (!$tbl_degrees->degrees_primaryDegree->FldIsDetailKey) {
			$tbl_degrees->degrees_primaryDegree->setFormValue($objForm->GetValue("x_degrees_primaryDegree"));
		}
		$tbl_degrees->degrees_primaryDegree->setOldValue($objForm->GetValue("o_degrees_primaryDegree"));
		if (!$tbl_degrees->degrees_ID->FldIsDetailKey && $tbl_degrees->CurrentAction <> "gridadd" && $tbl_degrees->CurrentAction <> "add")
			$tbl_degrees->degrees_ID->setFormValue($objForm->GetValue("x_degrees_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_degrees;
		if ($tbl_degrees->CurrentAction <> "gridadd" && $tbl_degrees->CurrentAction <> "add")
			$tbl_degrees->degrees_ID->CurrentValue = $tbl_degrees->degrees_ID->FormValue;
		$tbl_degrees->degrees_level->CurrentValue = $tbl_degrees->degrees_level->FormValue;
		$tbl_degrees->degrees_disciplineCode->CurrentValue = $tbl_degrees->degrees_disciplineCode->FormValue;
		$tbl_degrees->degrees_fieldOfStudy->CurrentValue = $tbl_degrees->degrees_fieldOfStudy->FormValue;
		$tbl_degrees->degrees_wroteThesisDissertation->CurrentValue = $tbl_degrees->degrees_wroteThesisDissertation->FormValue;
		$tbl_degrees->degrees_primaryDegree->CurrentValue = $tbl_degrees->degrees_primaryDegree->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_degrees;

		// Call Recordset Selecting event
		$tbl_degrees->Recordset_Selecting($tbl_degrees->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_degrees->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_degrees->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_degrees;
		$sFilter = $tbl_degrees->KeyFilter();

		// Call Row Selecting event
		$tbl_degrees->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_degrees->CurrentFilter = $sFilter;
		$sSql = $tbl_degrees->SQL();
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
		global $conn, $tbl_degrees;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_degrees->Row_Selected($row);
		$tbl_degrees->degrees_ID->setDbValue($rs->fields('degrees_ID'));
		$tbl_degrees->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$tbl_degrees->degrees_level->setDbValue($rs->fields('degrees_level'));
		$tbl_degrees->degrees_disciplineCode->setDbValue($rs->fields('degrees_disciplineCode'));
		$tbl_degrees->degrees_fieldOfStudy->setDbValue($rs->fields('degrees_fieldOfStudy'));
		$tbl_degrees->degrees_wroteThesisDissertation->setDbValue($rs->fields('degrees_wroteThesisDissertation'));
		$tbl_degrees->degrees_primaryDegree->setDbValue($rs->fields('degrees_primaryDegree'));
		$tbl_degrees->degrees_authoritative_data->setDbValue($rs->fields('degrees_authoritative_data'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_degrees;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$tbl_degrees->degrees_ID->CurrentValue = strval($arKeys[0]); // degrees_ID
			else
				$bValidKey = FALSE;
		}

		// Load old recordset
		if ($bValidKey) {
			$tbl_degrees->CurrentFilter = $tbl_degrees->KeyFilter();
			$sSql = $tbl_degrees->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_degrees;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_degrees->Row_Rendering();

		// Common render codes for all row types
		// degrees_ID

		$tbl_degrees->degrees_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_ID
		$tbl_degrees->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// degrees_level
		$tbl_degrees->degrees_level->CellCssStyle = "white-space: nowrap;";

		// degrees_disciplineCode
		$tbl_degrees->degrees_disciplineCode->CellCssStyle = "white-space: nowrap;";

		// degrees_fieldOfStudy
		$tbl_degrees->degrees_fieldOfStudy->CellCssStyle = "white-space: nowrap;";

		// degrees_wroteThesisDissertation
		$tbl_degrees->degrees_wroteThesisDissertation->CellCssStyle = "white-space: nowrap;";

		// degrees_primaryDegree
		$tbl_degrees->degrees_primaryDegree->CellCssStyle = "white-space: nowrap;";

		// degrees_authoritative_data
		$tbl_degrees->degrees_authoritative_data->CellCssStyle = "white-space: nowrap;";
		if ($tbl_degrees->RowType == UP_ROWTYPE_VIEW) { // View row

			// degrees_level
			if (strval($tbl_degrees->degrees_level->CurrentValue) <> "") {
				$sFilterWrk = "`degreeLevel_ID` = " . up_AdjustSql($tbl_degrees->degrees_level->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreeLevel_name` FROM `ref_degreelevel_degrees`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_degrees->degrees_level->ViewValue = $rswrk->fields('degreeLevel_name');
					$rswrk->Close();
				} else {
					$tbl_degrees->degrees_level->ViewValue = $tbl_degrees->degrees_level->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_level->ViewValue = NULL;
			}
			$tbl_degrees->degrees_level->ViewCustomAttributes = "";

			// degrees_disciplineCode
			if (strval($tbl_degrees->degrees_disciplineCode->CurrentValue) <> "") {
				$sFilterWrk = "`disCHED_disciplineSpecific_code` = " . up_AdjustSql($tbl_degrees->degrees_disciplineCode->CurrentValue) . "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_nameList` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_degrees->degrees_disciplineCode->ViewValue = $rswrk->fields('disCHED_disciplineSpecific_nameList');
					$rswrk->Close();
				} else {
					$tbl_degrees->degrees_disciplineCode->ViewValue = $tbl_degrees->degrees_disciplineCode->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_disciplineCode->ViewValue = NULL;
			}
			$tbl_degrees->degrees_disciplineCode->ViewCustomAttributes = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->ViewValue = $tbl_degrees->degrees_fieldOfStudy->CurrentValue;
			$tbl_degrees->degrees_fieldOfStudy->ViewCustomAttributes = "";

			// degrees_wroteThesisDissertation
			if (strval($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) <> "") {
				switch ($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) {
					case "Y":
						$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) : $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
						break;
					case "N":
						$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) : $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
						break;
					default:
						$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = NULL;
			}
			$tbl_degrees->degrees_wroteThesisDissertation->ViewCustomAttributes = "";

			// degrees_primaryDegree
			if (strval($tbl_degrees->degrees_primaryDegree->CurrentValue) <> "") {
				switch ($tbl_degrees->degrees_primaryDegree->CurrentValue) {
					case "Y":
						$tbl_degrees->degrees_primaryDegree->ViewValue = $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) : $tbl_degrees->degrees_primaryDegree->CurrentValue;
						break;
					case "N":
						$tbl_degrees->degrees_primaryDegree->ViewValue = $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) : $tbl_degrees->degrees_primaryDegree->CurrentValue;
						break;
					default:
						$tbl_degrees->degrees_primaryDegree->ViewValue = $tbl_degrees->degrees_primaryDegree->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_primaryDegree->ViewValue = NULL;
			}
			$tbl_degrees->degrees_primaryDegree->ViewCustomAttributes = "";

			// degrees_level
			$tbl_degrees->degrees_level->LinkCustomAttributes = "";
			$tbl_degrees->degrees_level->HrefValue = "";
			$tbl_degrees->degrees_level->TooltipValue = "";

			// degrees_disciplineCode
			$tbl_degrees->degrees_disciplineCode->LinkCustomAttributes = "";
			$tbl_degrees->degrees_disciplineCode->HrefValue = "";
			$tbl_degrees->degrees_disciplineCode->TooltipValue = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->LinkCustomAttributes = "";
			$tbl_degrees->degrees_fieldOfStudy->HrefValue = "";
			$tbl_degrees->degrees_fieldOfStudy->TooltipValue = "";

			// degrees_wroteThesisDissertation
			$tbl_degrees->degrees_wroteThesisDissertation->LinkCustomAttributes = "";
			$tbl_degrees->degrees_wroteThesisDissertation->HrefValue = "";
			$tbl_degrees->degrees_wroteThesisDissertation->TooltipValue = "";

			// degrees_primaryDegree
			$tbl_degrees->degrees_primaryDegree->LinkCustomAttributes = "";
			$tbl_degrees->degrees_primaryDegree->HrefValue = "";
			$tbl_degrees->degrees_primaryDegree->TooltipValue = "";
		} elseif ($tbl_degrees->RowType == UP_ROWTYPE_ADD) { // Add row

			// degrees_level
			$tbl_degrees->degrees_level->EditCustomAttributes = "";

			// degrees_disciplineCode
			$tbl_degrees->degrees_disciplineCode->EditCustomAttributes = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->EditCustomAttributes = "";
			$tbl_degrees->degrees_fieldOfStudy->EditValue = up_HtmlEncode($tbl_degrees->degrees_fieldOfStudy->CurrentValue);

			// degrees_wroteThesisDissertation
			$tbl_degrees->degrees_wroteThesisDissertation->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) : "N");
			$tbl_degrees->degrees_wroteThesisDissertation->EditValue = $arwrk;

			// degrees_primaryDegree
			$tbl_degrees->degrees_primaryDegree->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) : "N");
			$tbl_degrees->degrees_primaryDegree->EditValue = $arwrk;

			// Edit refer script
			// degrees_level

			$tbl_degrees->degrees_level->HrefValue = "";

			// degrees_disciplineCode
			$tbl_degrees->degrees_disciplineCode->HrefValue = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->HrefValue = "";

			// degrees_wroteThesisDissertation
			$tbl_degrees->degrees_wroteThesisDissertation->HrefValue = "";

			// degrees_primaryDegree
			$tbl_degrees->degrees_primaryDegree->HrefValue = "";
		} elseif ($tbl_degrees->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// degrees_level
			$tbl_degrees->degrees_level->EditCustomAttributes = "";

			// degrees_disciplineCode
			$tbl_degrees->degrees_disciplineCode->EditCustomAttributes = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->EditCustomAttributes = "";
			$tbl_degrees->degrees_fieldOfStudy->EditValue = up_HtmlEncode($tbl_degrees->degrees_fieldOfStudy->CurrentValue);

			// degrees_wroteThesisDissertation
			$tbl_degrees->degrees_wroteThesisDissertation->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) : "N");
			$tbl_degrees->degrees_wroteThesisDissertation->EditValue = $arwrk;

			// degrees_primaryDegree
			$tbl_degrees->degrees_primaryDegree->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) : "N");
			$tbl_degrees->degrees_primaryDegree->EditValue = $arwrk;

			// Edit refer script
			// degrees_level

			$tbl_degrees->degrees_level->HrefValue = "";

			// degrees_disciplineCode
			$tbl_degrees->degrees_disciplineCode->HrefValue = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->HrefValue = "";

			// degrees_wroteThesisDissertation
			$tbl_degrees->degrees_wroteThesisDissertation->HrefValue = "";

			// degrees_primaryDegree
			$tbl_degrees->degrees_primaryDegree->HrefValue = "";
		}
		if ($tbl_degrees->RowType == UP_ROWTYPE_ADD ||
			$tbl_degrees->RowType == UP_ROWTYPE_EDIT ||
			$tbl_degrees->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_degrees->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_degrees->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_degrees->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_degrees;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($tbl_degrees->degrees_level->FormValue) && $tbl_degrees->degrees_level->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_degrees->degrees_level->FldCaption());
		}
		if (!is_null($tbl_degrees->degrees_fieldOfStudy->FormValue) && $tbl_degrees->degrees_fieldOfStudy->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_degrees->degrees_fieldOfStudy->FldCaption());
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
		global $conn, $Language, $Security, $tbl_degrees;
		$DeleteRows = TRUE;
		$sSql = $tbl_degrees->SQL();
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
				$DeleteRows = $tbl_degrees->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['degrees_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_degrees->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_degrees->CancelMessage <> "") {
				$this->setFailureMessage($tbl_degrees->CancelMessage);
				$tbl_degrees->CancelMessage = "";
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
				$tbl_degrees->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $tbl_degrees;
		$sFilter = $tbl_degrees->KeyFilter();
		$tbl_degrees->CurrentFilter = $sFilter;
		$sSql = $tbl_degrees->SQL();
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

			// degrees_level
			$tbl_degrees->degrees_level->SetDbValueDef($rsnew, $tbl_degrees->degrees_level->CurrentValue, NULL, $tbl_degrees->degrees_level->ReadOnly);

			// degrees_disciplineCode
			$tbl_degrees->degrees_disciplineCode->SetDbValueDef($rsnew, $tbl_degrees->degrees_disciplineCode->CurrentValue, NULL, $tbl_degrees->degrees_disciplineCode->ReadOnly);

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->SetDbValueDef($rsnew, $tbl_degrees->degrees_fieldOfStudy->CurrentValue, NULL, $tbl_degrees->degrees_fieldOfStudy->ReadOnly);

			// degrees_wroteThesisDissertation
			$tbl_degrees->degrees_wroteThesisDissertation->SetDbValueDef($rsnew, $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue, NULL, $tbl_degrees->degrees_wroteThesisDissertation->ReadOnly);

			// degrees_primaryDegree
			$tbl_degrees->degrees_primaryDegree->SetDbValueDef($rsnew, $tbl_degrees->degrees_primaryDegree->CurrentValue, NULL, $tbl_degrees->degrees_primaryDegree->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $tbl_degrees->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($tbl_degrees->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_degrees->CancelMessage <> "") {
					$this->setFailureMessage($tbl_degrees->CancelMessage);
					$tbl_degrees->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_degrees->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $tbl_degrees;

		// Set up foreign key field value from Session
			if ($tbl_degrees->getCurrentMasterTable() == "tbl_faculty") {
				$tbl_degrees->faculty_ID->CurrentValue = $tbl_degrees->faculty_ID->getSessionValue();
			}
		$rsnew = array();

		// degrees_level
		$tbl_degrees->degrees_level->SetDbValueDef($rsnew, $tbl_degrees->degrees_level->CurrentValue, NULL, FALSE);

		// degrees_disciplineCode
		$tbl_degrees->degrees_disciplineCode->SetDbValueDef($rsnew, $tbl_degrees->degrees_disciplineCode->CurrentValue, NULL, FALSE);

		// degrees_fieldOfStudy
		$tbl_degrees->degrees_fieldOfStudy->SetDbValueDef($rsnew, $tbl_degrees->degrees_fieldOfStudy->CurrentValue, NULL, FALSE);

		// degrees_wroteThesisDissertation
		$tbl_degrees->degrees_wroteThesisDissertation->SetDbValueDef($rsnew, $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue, NULL, FALSE);

		// degrees_primaryDegree
		$tbl_degrees->degrees_primaryDegree->SetDbValueDef($rsnew, $tbl_degrees->degrees_primaryDegree->CurrentValue, NULL, FALSE);

		// faculty_ID
		if ($tbl_degrees->faculty_ID->getSessionValue() <> "") {
			$rsnew['faculty_ID'] = $tbl_degrees->faculty_ID->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $tbl_degrees->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($tbl_degrees->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($tbl_degrees->CancelMessage <> "") {
				$this->setFailureMessage($tbl_degrees->CancelMessage);
				$tbl_degrees->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$tbl_degrees->degrees_ID->setDbValue($conn->Insert_ID());
			$rsnew['degrees_ID'] = $tbl_degrees->degrees_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$tbl_degrees->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_degrees;

		// Hide foreign keys
		$sMasterTblVar = $tbl_degrees->getCurrentMasterTable();
		if ($sMasterTblVar == "tbl_faculty") {
			$tbl_degrees->faculty_ID->Visible = FALSE;
			if ($GLOBALS["tbl_faculty"]->EventCancelled) $tbl_degrees->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $tbl_degrees->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_degrees->getDetailFilter(); // Get detail filter
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
		$table = 'tbl_degrees';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $tbl_degrees;
		$table = 'tbl_degrees';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['degrees_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($tbl_degrees->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($tbl_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
		global $tbl_degrees;
		$table = 'tbl_degrees';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['degrees_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($tbl_degrees->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($tbl_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($tbl_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
		global $tbl_degrees;
		$table = 'tbl_degrees';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['degrees_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $tbl_degrees->fields) && $tbl_degrees->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($tbl_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
