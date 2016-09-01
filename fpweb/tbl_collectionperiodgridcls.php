<?php include_once "tbl_usersinfo.php" ?>
<?php

//
// Page class
//
class ctbl_collectionperiod_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'tbl_collectionperiod';

	// Page object name
	var $PageObjName = 'tbl_collectionperiod_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_collectionperiod;
		if ($tbl_collectionperiod->UseTokenInUrl) $PageUrl .= "t=" . $tbl_collectionperiod->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_collectionperiod;
		if ($tbl_collectionperiod->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_collectionperiod->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_collectionperiod->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_collectionperiod_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_collectionperiod)
		if (!isset($GLOBALS["tbl_collectionperiod"])) {
			$GLOBALS["tbl_collectionperiod"] = new ctbl_collectionperiod();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["tbl_collectionperiod"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_collectionperiod', TRUE);

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
		global $tbl_collectionperiod;

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
			$this->Page_Terminate("tbl_collectionperiodlist.php");
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$tbl_collectionperiod->GridAddRowCount = $gridaddcnt;

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
		global $tbl_collectionperiod;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_collectionperiod;

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
			if ($tbl_collectionperiod->Export <> "" ||
				$tbl_collectionperiod->CurrentAction == "gridadd" ||
				$tbl_collectionperiod->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($tbl_collectionperiod->AllowAddDeleteRow) {
				if ($tbl_collectionperiod->CurrentAction == "gridadd" ||
					$tbl_collectionperiod->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($tbl_collectionperiod->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_collectionperiod->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $tbl_collectionperiod->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $tbl_collectionperiod->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($tbl_collectionperiod->getMasterFilter() <> "" && $tbl_collectionperiod->getCurrentMasterTable() == "tbl_uporgchart_unit") {
			global $tbl_uporgchart_unit;
			$rsmaster = $tbl_uporgchart_unit->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($tbl_collectionperiod->getReturnUrl()); // Return to caller
			} else {
				$tbl_uporgchart_unit->LoadListRowValues($rsmaster);
				$tbl_uporgchart_unit->RowType = UP_ROWTYPE_MASTER; // Master row
				$tbl_uporgchart_unit->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$tbl_collectionperiod->setSessionWhere($sFilter);
		$tbl_collectionperiod->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $tbl_collectionperiod;
		$tbl_collectionperiod->LastAction = $tbl_collectionperiod->CurrentAction; // Save last action
		$tbl_collectionperiod->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $tbl_collectionperiod;
		$bGridUpdate = TRUE;
		$this->WriteAuditTrailDummy($Language->Phrase("BatchUpdateBegin")); // Batch update begin

		// Get old recordset
		$tbl_collectionperiod->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $tbl_collectionperiod->SQL();
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
						$tbl_collectionperiod->CurrentFilter = $tbl_collectionperiod->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$tbl_collectionperiod->SendEmail = FALSE; // Do not send email on update success
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
			$tbl_collectionperiod->EventCancelled = TRUE; // Set event cancelled
			$tbl_collectionperiod->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $tbl_collectionperiod;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $tbl_collectionperiod->KeyFilter();
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
		global $tbl_collectionperiod;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 1) {
			$tbl_collectionperiod->collectionPeriod_ID->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($tbl_collectionperiod->collectionPeriod_ID->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $tbl_collectionperiod;
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
				$tbl_collectionperiod->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {
					if ($sKey <> "") $sKey .= UP_COMPOSITE_KEY_SEPARATOR;
					$sKey .= $tbl_collectionperiod->collectionPeriod_ID->CurrentValue;

					// Add filter for this record
					$sFilter = $tbl_collectionperiod->KeyFilter();
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
			$tbl_collectionperiod->CurrentFilter = $sWrkFilter;
			$sSql = $tbl_collectionperiod->SQL();
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
			$tbl_collectionperiod->EventCancelled = TRUE; // Set event cancelled
			$tbl_collectionperiod->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $tbl_collectionperiod, $objForm;
		if ($objForm->HasValue("x_collectionPeriod_ay") && $objForm->HasValue("o_collectionPeriod_ay") && $tbl_collectionperiod->collectionPeriod_ay->CurrentValue <> $tbl_collectionperiod->collectionPeriod_ay->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_collectionPeriod_sem") && $objForm->HasValue("o_collectionPeriod_sem") && $tbl_collectionperiod->collectionPeriod_sem->CurrentValue <> $tbl_collectionperiod->collectionPeriod_sem->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_collectionPeriod_cutOffDate") && $objForm->HasValue("o_collectionPeriod_cutOffDate") && $tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue <> $tbl_collectionperiod->collectionPeriod_cutOffDate->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_collectionPeriod_status") && $objForm->HasValue("o_collectionPeriod_status") && $tbl_collectionperiod->collectionPeriod_status->CurrentValue <> $tbl_collectionperiod->collectionPeriod_status->OldValue)
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
		global $objForm, $tbl_collectionperiod;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_collectionperiod;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_collectionperiod->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_collectionperiod->CurrentOrderType = @$_GET["ordertype"];
			$tbl_collectionperiod->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_collectionperiod;
		$sOrderBy = $tbl_collectionperiod->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_collectionperiod->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_collectionperiod->SqlOrderBy();
				$tbl_collectionperiod->setSessionOrderBy($sOrderBy);
				$tbl_collectionperiod->collectionPeriod_ay->setSort("DESC");
				$tbl_collectionperiod->collectionPeriod_sem->setSort("DESC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_collectionperiod;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$tbl_collectionperiod->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$tbl_collectionperiod->unitID->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_collectionperiod->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_collectionperiod;

		// "griddelete"
		if ($tbl_collectionperiod->AllowAddDeleteRow) {
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
		global $Security, $Language, $tbl_collectionperiod, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($tbl_collectionperiod->RowType == UP_ROWTYPE_ADD)
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
		if ($tbl_collectionperiod->AllowAddDeleteRow) {
			if ($tbl_collectionperiod->CurrentMode == "add" || $tbl_collectionperiod->CurrentMode == "copy" || $tbl_collectionperiod->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, tbl_collectionperiod_grid, " . $this->RowIndex . ");\">" . "<img src=\"phpimages/delete.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
				}
			}
		}
		if ($tbl_collectionperiod->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . $tbl_collectionperiod->collectionPeriod_ID->CurrentValue . "\">";
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	function SetRecordKey(&$key, $rs) {
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs->fields('collectionPeriod_ID');
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_collectionperiod;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_collectionperiod;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_collectionperiod->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_collectionperiod;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $tbl_collectionperiod;
		$tbl_collectionperiod->collectionPeriod_ay->CurrentValue = NULL;
		$tbl_collectionperiod->collectionPeriod_ay->OldValue = $tbl_collectionperiod->collectionPeriod_ay->CurrentValue;
		$tbl_collectionperiod->collectionPeriod_sem->CurrentValue = NULL;
		$tbl_collectionperiod->collectionPeriod_sem->OldValue = $tbl_collectionperiod->collectionPeriod_sem->CurrentValue;
		$tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue = NULL;
		$tbl_collectionperiod->collectionPeriod_cutOffDate->OldValue = $tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue;
		$tbl_collectionperiod->collectionPeriod_status->CurrentValue = 1;
		$tbl_collectionperiod->collectionPeriod_status->OldValue = $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_collectionperiod;
		if (!$tbl_collectionperiod->collectionPeriod_ay->FldIsDetailKey) {
			$tbl_collectionperiod->collectionPeriod_ay->setFormValue($objForm->GetValue("x_collectionPeriod_ay"));
		}
		$tbl_collectionperiod->collectionPeriod_ay->setOldValue($objForm->GetValue("o_collectionPeriod_ay"));
		if (!$tbl_collectionperiod->collectionPeriod_sem->FldIsDetailKey) {
			$tbl_collectionperiod->collectionPeriod_sem->setFormValue($objForm->GetValue("x_collectionPeriod_sem"));
		}
		$tbl_collectionperiod->collectionPeriod_sem->setOldValue($objForm->GetValue("o_collectionPeriod_sem"));
		if (!$tbl_collectionperiod->collectionPeriod_cutOffDate->FldIsDetailKey) {
			$tbl_collectionperiod->collectionPeriod_cutOffDate->setFormValue($objForm->GetValue("x_collectionPeriod_cutOffDate"));
			$tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue = up_UnFormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue, 6);
		}
		$tbl_collectionperiod->collectionPeriod_cutOffDate->setOldValue($objForm->GetValue("o_collectionPeriod_cutOffDate"));
		if (!$tbl_collectionperiod->collectionPeriod_status->FldIsDetailKey) {
			$tbl_collectionperiod->collectionPeriod_status->setFormValue($objForm->GetValue("x_collectionPeriod_status"));
		}
		$tbl_collectionperiod->collectionPeriod_status->setOldValue($objForm->GetValue("o_collectionPeriod_status"));
		if (!$tbl_collectionperiod->collectionPeriod_ID->FldIsDetailKey && $tbl_collectionperiod->CurrentAction <> "gridadd" && $tbl_collectionperiod->CurrentAction <> "add")
			$tbl_collectionperiod->collectionPeriod_ID->setFormValue($objForm->GetValue("x_collectionPeriod_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_collectionperiod;
		if ($tbl_collectionperiod->CurrentAction <> "gridadd" && $tbl_collectionperiod->CurrentAction <> "add")
			$tbl_collectionperiod->collectionPeriod_ID->CurrentValue = $tbl_collectionperiod->collectionPeriod_ID->FormValue;
		$tbl_collectionperiod->collectionPeriod_ay->CurrentValue = $tbl_collectionperiod->collectionPeriod_ay->FormValue;
		$tbl_collectionperiod->collectionPeriod_sem->CurrentValue = $tbl_collectionperiod->collectionPeriod_sem->FormValue;
		$tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue = $tbl_collectionperiod->collectionPeriod_cutOffDate->FormValue;
		$tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue = up_UnFormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue, 6);
		$tbl_collectionperiod->collectionPeriod_status->CurrentValue = $tbl_collectionperiod->collectionPeriod_status->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_collectionperiod;

		// Call Recordset Selecting event
		$tbl_collectionperiod->Recordset_Selecting($tbl_collectionperiod->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_collectionperiod->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_collectionperiod->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_collectionperiod;
		$sFilter = $tbl_collectionperiod->KeyFilter();

		// Call Row Selecting event
		$tbl_collectionperiod->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_collectionperiod->CurrentFilter = $sFilter;
		$sSql = $tbl_collectionperiod->SQL();
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
		global $conn, $tbl_collectionperiod;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_collectionperiod->Row_Selected($row);
		$tbl_collectionperiod->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$tbl_collectionperiod->cu->setDbValue($rs->fields('cu'));
		$tbl_collectionperiod->unitID->setDbValue($rs->fields('unitID'));
		$tbl_collectionperiod->collectionPeriod_ay->setDbValue($rs->fields('collectionPeriod_ay'));
		$tbl_collectionperiod->collectionPeriod_sem->setDbValue($rs->fields('collectionPeriod_sem'));
		$tbl_collectionperiod->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$tbl_collectionperiod->academicYear_ID->setDbValue($rs->fields('academicYear_ID'));
		$tbl_collectionperiod->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_collectionperiod;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$tbl_collectionperiod->collectionPeriod_ID->CurrentValue = strval($arKeys[0]); // collectionPeriod_ID
			else
				$bValidKey = FALSE;
		}

		// Load old recordset
		if ($bValidKey) {
			$tbl_collectionperiod->CurrentFilter = $tbl_collectionperiod->KeyFilter();
			$sSql = $tbl_collectionperiod->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_collectionperiod;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_collectionperiod->Row_Rendering();

		// Common render codes for all row types
		// collectionPeriod_ID

		$tbl_collectionperiod->collectionPeriod_ID->CellCssStyle = "white-space: nowrap;";

		// cu
		$tbl_collectionperiod->cu->CellCssStyle = "white-space: nowrap;";

		// unitID
		$tbl_collectionperiod->unitID->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ay
		$tbl_collectionperiod->collectionPeriod_ay->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_sem
		$tbl_collectionperiod->collectionPeriod_sem->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_cutOffDate
		$tbl_collectionperiod->collectionPeriod_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// academicYear_ID
		$tbl_collectionperiod->academicYear_ID->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_status
		$tbl_collectionperiod->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";
		if ($tbl_collectionperiod->RowType == UP_ROWTYPE_VIEW) { // View row

			// collectionPeriod_ay
			$tbl_collectionperiod->collectionPeriod_ay->ViewValue = $tbl_collectionperiod->collectionPeriod_ay->CurrentValue;
			$tbl_collectionperiod->collectionPeriod_ay->ViewCustomAttributes = "";

			// collectionPeriod_sem
			$tbl_collectionperiod->collectionPeriod_sem->ViewValue = $tbl_collectionperiod->collectionPeriod_sem->CurrentValue;
			$tbl_collectionperiod->collectionPeriod_sem->ViewCustomAttributes = "";

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue = $tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue;
			$tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue = up_FormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue, 6);
			$tbl_collectionperiod->collectionPeriod_cutOffDate->ViewCustomAttributes = "";

			// collectionPeriod_status
			if (strval($tbl_collectionperiod->collectionPeriod_status->CurrentValue) <> "") {
				switch ($tbl_collectionperiod->collectionPeriod_status->CurrentValue) {
					case "1":
						$tbl_collectionperiod->collectionPeriod_status->ViewValue = $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(1) <> "" ? $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(1) : $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
						break;
					case "2":
						$tbl_collectionperiod->collectionPeriod_status->ViewValue = $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(2) <> "" ? $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(2) : $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
						break;
					default:
						$tbl_collectionperiod->collectionPeriod_status->ViewValue = $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
				}
			} else {
				$tbl_collectionperiod->collectionPeriod_status->ViewValue = NULL;
			}
			$tbl_collectionperiod->collectionPeriod_status->ViewCustomAttributes = "";

			// collectionPeriod_ay
			$tbl_collectionperiod->collectionPeriod_ay->LinkCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_ay->HrefValue = "";
			$tbl_collectionperiod->collectionPeriod_ay->TooltipValue = "";

			// collectionPeriod_sem
			$tbl_collectionperiod->collectionPeriod_sem->LinkCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_sem->HrefValue = "";
			$tbl_collectionperiod->collectionPeriod_sem->TooltipValue = "";

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->LinkCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_cutOffDate->HrefValue = "";
			$tbl_collectionperiod->collectionPeriod_cutOffDate->TooltipValue = "";

			// collectionPeriod_status
			$tbl_collectionperiod->collectionPeriod_status->LinkCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_status->HrefValue = "";
			$tbl_collectionperiod->collectionPeriod_status->TooltipValue = "";
		} elseif ($tbl_collectionperiod->RowType == UP_ROWTYPE_ADD) { // Add row

			// collectionPeriod_ay
			$tbl_collectionperiod->collectionPeriod_ay->EditCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_ay->EditValue = up_HtmlEncode($tbl_collectionperiod->collectionPeriod_ay->CurrentValue);

			// collectionPeriod_sem
			$tbl_collectionperiod->collectionPeriod_sem->EditCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_sem->EditValue = up_HtmlEncode($tbl_collectionperiod->collectionPeriod_sem->CurrentValue);

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->EditCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_cutOffDate->EditValue = up_HtmlEncode(up_FormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue, 6));

			// collectionPeriod_status
			$tbl_collectionperiod->collectionPeriod_status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(1) <> "" ? $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(1) : "1");
			$arwrk[] = array("2", $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(2) <> "" ? $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(2) : "2");
			$tbl_collectionperiod->collectionPeriod_status->EditValue = $arwrk;

			// Edit refer script
			// collectionPeriod_ay

			$tbl_collectionperiod->collectionPeriod_ay->HrefValue = "";

			// collectionPeriod_sem
			$tbl_collectionperiod->collectionPeriod_sem->HrefValue = "";

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->HrefValue = "";

			// collectionPeriod_status
			$tbl_collectionperiod->collectionPeriod_status->HrefValue = "";
		} elseif ($tbl_collectionperiod->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// collectionPeriod_ay
			$tbl_collectionperiod->collectionPeriod_ay->EditCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_ay->EditValue = up_HtmlEncode($tbl_collectionperiod->collectionPeriod_ay->CurrentValue);

			// collectionPeriod_sem
			$tbl_collectionperiod->collectionPeriod_sem->EditCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_sem->EditValue = up_HtmlEncode($tbl_collectionperiod->collectionPeriod_sem->CurrentValue);

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->EditCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_cutOffDate->EditValue = up_HtmlEncode(up_FormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue, 6));

			// collectionPeriod_status
			$tbl_collectionperiod->collectionPeriod_status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(1) <> "" ? $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(1) : "1");
			$arwrk[] = array("2", $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(2) <> "" ? $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(2) : "2");
			$tbl_collectionperiod->collectionPeriod_status->EditValue = $arwrk;

			// Edit refer script
			// collectionPeriod_ay

			$tbl_collectionperiod->collectionPeriod_ay->HrefValue = "";

			// collectionPeriod_sem
			$tbl_collectionperiod->collectionPeriod_sem->HrefValue = "";

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->HrefValue = "";

			// collectionPeriod_status
			$tbl_collectionperiod->collectionPeriod_status->HrefValue = "";
		}
		if ($tbl_collectionperiod->RowType == UP_ROWTYPE_ADD ||
			$tbl_collectionperiod->RowType == UP_ROWTYPE_EDIT ||
			$tbl_collectionperiod->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_collectionperiod->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_collectionperiod->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_collectionperiod->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_collectionperiod;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($tbl_collectionperiod->collectionPeriod_ay->FormValue)) {
			up_AddMessage($gsFormError, $tbl_collectionperiod->collectionPeriod_ay->FldErrMsg());
		}
		if (!up_CheckInteger($tbl_collectionperiod->collectionPeriod_sem->FormValue)) {
			up_AddMessage($gsFormError, $tbl_collectionperiod->collectionPeriod_sem->FldErrMsg());
		}
		if (!up_CheckUSDate($tbl_collectionperiod->collectionPeriod_cutOffDate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_collectionperiod->collectionPeriod_cutOffDate->FldErrMsg());
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
		global $conn, $Language, $Security, $tbl_collectionperiod;
		$DeleteRows = TRUE;
		$sSql = $tbl_collectionperiod->SQL();
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
				$DeleteRows = $tbl_collectionperiod->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['collectionPeriod_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_collectionperiod->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_collectionperiod->CancelMessage <> "") {
				$this->setFailureMessage($tbl_collectionperiod->CancelMessage);
				$tbl_collectionperiod->CancelMessage = "";
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
				$tbl_collectionperiod->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $tbl_collectionperiod;
		$sFilter = $tbl_collectionperiod->KeyFilter();
		$tbl_collectionperiod->CurrentFilter = $sFilter;
		$sSql = $tbl_collectionperiod->SQL();
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

			// collectionPeriod_ay
			$tbl_collectionperiod->collectionPeriod_ay->SetDbValueDef($rsnew, $tbl_collectionperiod->collectionPeriod_ay->CurrentValue, NULL, $tbl_collectionperiod->collectionPeriod_ay->ReadOnly);

			// collectionPeriod_sem
			$tbl_collectionperiod->collectionPeriod_sem->SetDbValueDef($rsnew, $tbl_collectionperiod->collectionPeriod_sem->CurrentValue, NULL, $tbl_collectionperiod->collectionPeriod_sem->ReadOnly);

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->SetDbValueDef($rsnew, up_UnFormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue, 6), NULL, $tbl_collectionperiod->collectionPeriod_cutOffDate->ReadOnly);

			// collectionPeriod_status
			$tbl_collectionperiod->collectionPeriod_status->SetDbValueDef($rsnew, $tbl_collectionperiod->collectionPeriod_status->CurrentValue, NULL, $tbl_collectionperiod->collectionPeriod_status->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $tbl_collectionperiod->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($tbl_collectionperiod->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_collectionperiod->CancelMessage <> "") {
					$this->setFailureMessage($tbl_collectionperiod->CancelMessage);
					$tbl_collectionperiod->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_collectionperiod->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $tbl_collectionperiod;

		// Set up foreign key field value from Session
			if ($tbl_collectionperiod->getCurrentMasterTable() == "tbl_uporgchart_unit") {
				$tbl_collectionperiod->unitID->CurrentValue = $tbl_collectionperiod->unitID->getSessionValue();
			}
		$rsnew = array();

		// collectionPeriod_ay
		$tbl_collectionperiod->collectionPeriod_ay->SetDbValueDef($rsnew, $tbl_collectionperiod->collectionPeriod_ay->CurrentValue, NULL, FALSE);

		// collectionPeriod_sem
		$tbl_collectionperiod->collectionPeriod_sem->SetDbValueDef($rsnew, $tbl_collectionperiod->collectionPeriod_sem->CurrentValue, NULL, FALSE);

		// collectionPeriod_cutOffDate
		$tbl_collectionperiod->collectionPeriod_cutOffDate->SetDbValueDef($rsnew, up_UnFormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue, 6), NULL, FALSE);

		// collectionPeriod_status
		$tbl_collectionperiod->collectionPeriod_status->SetDbValueDef($rsnew, $tbl_collectionperiod->collectionPeriod_status->CurrentValue, NULL, strval($tbl_collectionperiod->collectionPeriod_status->CurrentValue) == "");

		// unitID
		if ($tbl_collectionperiod->unitID->getSessionValue() <> "") {
			$rsnew['unitID'] = $tbl_collectionperiod->unitID->getSessionValue();
		} elseif (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['unitID'] = CurrentUserID();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $tbl_collectionperiod->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($tbl_collectionperiod->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($tbl_collectionperiod->CancelMessage <> "") {
				$this->setFailureMessage($tbl_collectionperiod->CancelMessage);
				$tbl_collectionperiod->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$tbl_collectionperiod->collectionPeriod_ID->setDbValue($conn->Insert_ID());
			$rsnew['collectionPeriod_ID'] = $tbl_collectionperiod->collectionPeriod_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$tbl_collectionperiod->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $tbl_collectionperiod;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($tbl_collectionperiod->unitID->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_collectionperiod;

		// Hide foreign keys
		$sMasterTblVar = $tbl_collectionperiod->getCurrentMasterTable();
		if ($sMasterTblVar == "tbl_uporgchart_unit") {
			$tbl_collectionperiod->unitID->Visible = FALSE;
			if ($GLOBALS["tbl_uporgchart_unit"]->EventCancelled) $tbl_collectionperiod->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $tbl_collectionperiod->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_collectionperiod->getDetailFilter(); // Get detail filter
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
		$table = 'tbl_collectionperiod';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $tbl_collectionperiod;
		$table = 'tbl_collectionperiod';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['collectionPeriod_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($tbl_collectionperiod->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_collectionperiod->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($tbl_collectionperiod->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
		global $tbl_collectionperiod;
		$table = 'tbl_collectionperiod';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['collectionPeriod_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($tbl_collectionperiod->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_collectionperiod->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($tbl_collectionperiod->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($tbl_collectionperiod->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
		global $tbl_collectionperiod;
		$table = 'tbl_collectionperiod';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['collectionPeriod_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $tbl_collectionperiod->fields) && $tbl_collectionperiod->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_collectionperiod->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($tbl_collectionperiod->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
