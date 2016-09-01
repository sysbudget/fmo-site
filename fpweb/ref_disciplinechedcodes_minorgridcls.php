<?php include_once "tbl_usersinfo.php" ?>
<?php

//
// Page class
//
class cref_disciplinechedcodes_minor_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'ref_disciplinechedcodes_minor';

	// Page object name
	var $PageObjName = 'ref_disciplinechedcodes_minor_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_disciplinechedcodes_minor;
		if ($ref_disciplinechedcodes_minor->UseTokenInUrl) $PageUrl .= "t=" . $ref_disciplinechedcodes_minor->TableVar . "&"; // Add page token
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
		global $objForm, $ref_disciplinechedcodes_minor;
		if ($ref_disciplinechedcodes_minor->UseTokenInUrl) {
			if ($objForm)
				return ($ref_disciplinechedcodes_minor->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_disciplinechedcodes_minor->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_disciplinechedcodes_minor_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_disciplinechedcodes_minor)
		if (!isset($GLOBALS["ref_disciplinechedcodes_minor"])) {
			$GLOBALS["ref_disciplinechedcodes_minor"] = new cref_disciplinechedcodes_minor();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["ref_disciplinechedcodes_minor"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_disciplinechedcodes_minor', TRUE);

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
		global $ref_disciplinechedcodes_minor;

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
			$ref_disciplinechedcodes_minor->GridAddRowCount = $gridaddcnt;

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
		global $ref_disciplinechedcodes_minor;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $ref_disciplinechedcodes_minor;

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
			if ($ref_disciplinechedcodes_minor->Export <> "" ||
				$ref_disciplinechedcodes_minor->CurrentAction == "gridadd" ||
				$ref_disciplinechedcodes_minor->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($ref_disciplinechedcodes_minor->AllowAddDeleteRow) {
				if ($ref_disciplinechedcodes_minor->CurrentAction == "gridadd" ||
					$ref_disciplinechedcodes_minor->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($ref_disciplinechedcodes_minor->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $ref_disciplinechedcodes_minor->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $ref_disciplinechedcodes_minor->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $ref_disciplinechedcodes_minor->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($ref_disciplinechedcodes_minor->getMasterFilter() <> "" && $ref_disciplinechedcodes_minor->getCurrentMasterTable() == "ref_disciplinechedcodes_major") {
			global $ref_disciplinechedcodes_major;
			$rsmaster = $ref_disciplinechedcodes_major->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($ref_disciplinechedcodes_minor->getReturnUrl()); // Return to caller
			} else {
				$ref_disciplinechedcodes_major->LoadListRowValues($rsmaster);
				$ref_disciplinechedcodes_major->RowType = UP_ROWTYPE_MASTER; // Master row
				$ref_disciplinechedcodes_major->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$ref_disciplinechedcodes_minor->setSessionWhere($sFilter);
		$ref_disciplinechedcodes_minor->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $ref_disciplinechedcodes_minor;
		$ref_disciplinechedcodes_minor->LastAction = $ref_disciplinechedcodes_minor->CurrentAction; // Save last action
		$ref_disciplinechedcodes_minor->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $ref_disciplinechedcodes_minor;
		$bGridUpdate = TRUE;
		$this->WriteAuditTrailDummy($Language->Phrase("BatchUpdateBegin")); // Batch update begin

		// Get old recordset
		$ref_disciplinechedcodes_minor->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $ref_disciplinechedcodes_minor->SQL();
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
						$ref_disciplinechedcodes_minor->CurrentFilter = $ref_disciplinechedcodes_minor->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$ref_disciplinechedcodes_minor->SendEmail = FALSE; // Do not send email on update success
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
			$ref_disciplinechedcodes_minor->EventCancelled = TRUE; // Set event cancelled
			$ref_disciplinechedcodes_minor->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $ref_disciplinechedcodes_minor;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $ref_disciplinechedcodes_minor->KeyFilter();
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
		global $ref_disciplinechedcodes_minor;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 1) {
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $ref_disciplinechedcodes_minor;
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
				$ref_disciplinechedcodes_minor->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {
					if ($sKey <> "") $sKey .= UP_COMPOSITE_KEY_SEPARATOR;
					$sKey .= $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue;

					// Add filter for this record
					$sFilter = $ref_disciplinechedcodes_minor->KeyFilter();
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
			$ref_disciplinechedcodes_minor->CurrentFilter = $sWrkFilter;
			$sSql = $ref_disciplinechedcodes_minor->SQL();
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
			$ref_disciplinechedcodes_minor->EventCancelled = TRUE; // Set event cancelled
			$ref_disciplinechedcodes_minor->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $ref_disciplinechedcodes_minor, $objForm;
		if ($objForm->HasValue("x_disCHED_disciplineSpecific_id") && $objForm->HasValue("o_disCHED_disciplineSpecific_id") && $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue <> $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_disCHED_disciplineSpecific_code") && $objForm->HasValue("o_disCHED_disciplineSpecific_code") && $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue <> $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_disCHED_disciplineSpecific_name") && $objForm->HasValue("o_disCHED_disciplineSpecific_name") && $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue <> $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_disCHED_discipline_code") && $objForm->HasValue("o_disCHED_discipline_code") && $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue <> $ref_disciplinechedcodes_minor->disCHED_discipline_code->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_disCHED_disciplineSpecific_academicUse") && $objForm->HasValue("o_disCHED_disciplineSpecific_academicUse") && $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue <> $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->OldValue)
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
		global $objForm, $ref_disciplinechedcodes_minor;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $ref_disciplinechedcodes_minor;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$ref_disciplinechedcodes_minor->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$ref_disciplinechedcodes_minor->CurrentOrderType = @$_GET["ordertype"];
			$ref_disciplinechedcodes_minor->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $ref_disciplinechedcodes_minor;
		$sOrderBy = $ref_disciplinechedcodes_minor->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($ref_disciplinechedcodes_minor->SqlOrderBy() <> "") {
				$sOrderBy = $ref_disciplinechedcodes_minor->SqlOrderBy();
				$ref_disciplinechedcodes_minor->setSessionOrderBy($sOrderBy);
				$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $ref_disciplinechedcodes_minor;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$ref_disciplinechedcodes_minor->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$ref_disciplinechedcodes_minor->disCHED_discipline_code->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$ref_disciplinechedcodes_minor->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$ref_disciplinechedcodes_minor->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $ref_disciplinechedcodes_minor;

		// "griddelete"
		if ($ref_disciplinechedcodes_minor->AllowAddDeleteRow) {
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
		global $Security, $Language, $ref_disciplinechedcodes_minor, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_ADD)
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
		if ($ref_disciplinechedcodes_minor->AllowAddDeleteRow) {
			if ($ref_disciplinechedcodes_minor->CurrentMode == "add" || $ref_disciplinechedcodes_minor->CurrentMode == "copy" || $ref_disciplinechedcodes_minor->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (!$Security->CanDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, ref_disciplinechedcodes_minor_grid, " . $this->RowIndex . ");\">" . "<img src=\"phpimages/delete.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
				}
			}
		}
		if ($ref_disciplinechedcodes_minor->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue . "\">";
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	function SetRecordKey(&$key, $rs) {
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs->fields('disCHED_disciplineSpecific_id');
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $ref_disciplinechedcodes_minor;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $ref_disciplinechedcodes_minor;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$ref_disciplinechedcodes_minor->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$ref_disciplinechedcodes_minor->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $ref_disciplinechedcodes_minor->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$ref_disciplinechedcodes_minor->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$ref_disciplinechedcodes_minor->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$ref_disciplinechedcodes_minor->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $ref_disciplinechedcodes_minor;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $ref_disciplinechedcodes_minor;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue = NULL;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->OldValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue = NULL;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->OldValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue = NULL;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->OldValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue;
		$ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue = NULL;
		$ref_disciplinechedcodes_minor->disCHED_discipline_code->OldValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue = NULL;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->OldValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $ref_disciplinechedcodes_minor;
		if (!$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldIsDetailKey) {
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->setFormValue($objForm->GetValue("x_disCHED_disciplineSpecific_id"));
		}
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->setOldValue($objForm->GetValue("o_disCHED_disciplineSpecific_id"));
		if (!$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FldIsDetailKey) {
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->setFormValue($objForm->GetValue("x_disCHED_disciplineSpecific_code"));
		}
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->setOldValue($objForm->GetValue("o_disCHED_disciplineSpecific_code"));
		if (!$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->FldIsDetailKey) {
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->setFormValue($objForm->GetValue("x_disCHED_disciplineSpecific_name"));
		}
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->setOldValue($objForm->GetValue("o_disCHED_disciplineSpecific_name"));
		if (!$ref_disciplinechedcodes_minor->disCHED_discipline_code->FldIsDetailKey) {
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->setFormValue($objForm->GetValue("x_disCHED_discipline_code"));
		}
		$ref_disciplinechedcodes_minor->disCHED_discipline_code->setOldValue($objForm->GetValue("o_disCHED_discipline_code"));
		if (!$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldIsDetailKey) {
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->setFormValue($objForm->GetValue("x_disCHED_disciplineSpecific_academicUse"));
		}
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->setOldValue($objForm->GetValue("o_disCHED_disciplineSpecific_academicUse"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $ref_disciplinechedcodes_minor;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FormValue;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FormValue;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->FormValue;
		$ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->FormValue;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $ref_disciplinechedcodes_minor;

		// Call Recordset Selecting event
		$ref_disciplinechedcodes_minor->Recordset_Selecting($ref_disciplinechedcodes_minor->CurrentFilter);

		// Load List page SQL
		$sSql = $ref_disciplinechedcodes_minor->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$ref_disciplinechedcodes_minor->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_disciplinechedcodes_minor;
		$sFilter = $ref_disciplinechedcodes_minor->KeyFilter();

		// Call Row Selecting event
		$ref_disciplinechedcodes_minor->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_disciplinechedcodes_minor->CurrentFilter = $sFilter;
		$sSql = $ref_disciplinechedcodes_minor->SQL();
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
		global $conn, $ref_disciplinechedcodes_minor;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_disciplinechedcodes_minor->Row_Selected($row);
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->setDbValue($rs->fields('disCHED_disciplineSpecific_id'));
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->setDbValue($rs->fields('disCHED_disciplineSpecific_code'));
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->setDbValue($rs->fields('disCHED_disciplineSpecific_name'));
		$ref_disciplinechedcodes_minor->disCHED_discipline_code->setDbValue($rs->fields('disCHED_discipline_code'));
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->setDbValue($rs->fields('disCHED_disciplineSpecific_academicUse'));
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_nameList->setDbValue($rs->fields('disCHED_disciplineSpecific_nameList'));
	}

	// Load old record
	function LoadOldRecord() {
		global $ref_disciplinechedcodes_minor;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue = strval($arKeys[0]); // disCHED_disciplineSpecific_id
			else
				$bValidKey = FALSE;
		}

		// Load old recordset
		if ($bValidKey) {
			$ref_disciplinechedcodes_minor->CurrentFilter = $ref_disciplinechedcodes_minor->KeyFilter();
			$sSql = $ref_disciplinechedcodes_minor->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_disciplinechedcodes_minor;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_disciplinechedcodes_minor->Row_Rendering();

		// Common render codes for all row types
		// disCHED_disciplineSpecific_id
		// disCHED_disciplineSpecific_code
		// disCHED_disciplineSpecific_name
		// disCHED_discipline_code
		// disCHED_disciplineSpecific_academicUse
		// disCHED_disciplineSpecific_nameList

		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_nameList->CellCssStyle = "white-space: nowrap;";
		if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_VIEW) { // View row

			// disCHED_disciplineSpecific_id
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_code
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ViewValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ViewValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ViewCustomAttributes = "";

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ViewValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_id
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->TooltipValue = "";

			// disCHED_disciplineSpecific_code
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->TooltipValue = "";

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->TooltipValue = "";

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->TooltipValue = "";

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->TooltipValue = "";
		} elseif ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_ADD) { // Add row

			// disCHED_disciplineSpecific_id
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->EditCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue);

			// disCHED_disciplineSpecific_code
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue);

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue);

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->EditCustomAttributes = "";
			if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->getSessionValue() <> "") {
				$ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->getSessionValue();
				$ref_disciplinechedcodes_minor->disCHED_discipline_code->OldValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewCustomAttributes = "";
			} else {
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue);
			}

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue);

			// Edit refer script
			// disCHED_disciplineSpecific_id

			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->HrefValue = "";

			// disCHED_disciplineSpecific_code
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->HrefValue = "";

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->HrefValue = "";

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->HrefValue = "";

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->HrefValue = "";
		} elseif ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// disCHED_disciplineSpecific_id
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->EditCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->EditValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_code
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue);

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue);

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->EditCustomAttributes = "";
			if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->getSessionValue() <> "") {
				$ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->getSessionValue();
				$ref_disciplinechedcodes_minor->disCHED_discipline_code->OldValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewCustomAttributes = "";
			} else {
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue);
			}

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue);

			// Edit refer script
			// disCHED_disciplineSpecific_id

			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->HrefValue = "";

			// disCHED_disciplineSpecific_code
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->HrefValue = "";

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->HrefValue = "";

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->HrefValue = "";

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->HrefValue = "";
		}
		if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_ADD ||
			$ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT ||
			$ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$ref_disciplinechedcodes_minor->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($ref_disciplinechedcodes_minor->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_disciplinechedcodes_minor->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $ref_disciplinechedcodes_minor;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FormValue) && $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldCaption());
		}
		if (!up_CheckInteger($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FormValue)) {
			up_AddMessage($gsFormError, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldErrMsg());
		}
		if (!up_CheckInteger($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FormValue)) {
			up_AddMessage($gsFormError, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FldErrMsg());
		}
		if (!is_null($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FormValue) && $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldCaption());
		}
		if (!up_CheckInteger($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FormValue)) {
			up_AddMessage($gsFormError, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldErrMsg());
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
		global $conn, $Language, $Security, $ref_disciplinechedcodes_minor;
		$DeleteRows = TRUE;
		$sSql = $ref_disciplinechedcodes_minor->SQL();
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
				$DeleteRows = $ref_disciplinechedcodes_minor->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['disCHED_disciplineSpecific_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($ref_disciplinechedcodes_minor->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($ref_disciplinechedcodes_minor->CancelMessage <> "") {
				$this->setFailureMessage($ref_disciplinechedcodes_minor->CancelMessage);
				$ref_disciplinechedcodes_minor->CancelMessage = "";
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
				$ref_disciplinechedcodes_minor->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $ref_disciplinechedcodes_minor;
		$sFilter = $ref_disciplinechedcodes_minor->KeyFilter();
		$ref_disciplinechedcodes_minor->CurrentFilter = $sFilter;
		$sSql = $ref_disciplinechedcodes_minor->SQL();
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

			// disCHED_disciplineSpecific_id
			// disCHED_disciplineSpecific_code

			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue, NULL, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ReadOnly);

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue, NULL, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ReadOnly);

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue, NULL, $ref_disciplinechedcodes_minor->disCHED_discipline_code->ReadOnly);

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue, 0, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $ref_disciplinechedcodes_minor->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($ref_disciplinechedcodes_minor->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($ref_disciplinechedcodes_minor->CancelMessage <> "") {
					$this->setFailureMessage($ref_disciplinechedcodes_minor->CancelMessage);
					$ref_disciplinechedcodes_minor->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$ref_disciplinechedcodes_minor->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $ref_disciplinechedcodes_minor;

		// Set up foreign key field value from Session
			if ($ref_disciplinechedcodes_minor->getCurrentMasterTable() == "ref_disciplinechedcodes_major") {
				$ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->getSessionValue();
			}

		// Check if key value entered
		if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue == "" && $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->getSessionValue() == "") {
			$this->setFailureMessage($Language->Phrase("InvalidKeyValue"));
			return FALSE;
		}

		// Check for duplicate key
		$bCheckKey = TRUE;
		$sFilter = $ref_disciplinechedcodes_minor->KeyFilter();
		if ($bCheckKey) {
			$rsChk = $ref_disciplinechedcodes_minor->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sKeyErrMsg = str_replace("%f", $sFilter, $Language->Phrase("DupKey"));
				$this->setFailureMessage($sKeyErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$rsnew = array();

		// disCHED_disciplineSpecific_id
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue, 0, FALSE);

		// disCHED_disciplineSpecific_code
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue, NULL, FALSE);

		// disCHED_disciplineSpecific_name
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue, NULL, FALSE);

		// disCHED_discipline_code
		$ref_disciplinechedcodes_minor->disCHED_discipline_code->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue, NULL, FALSE);

		// disCHED_disciplineSpecific_academicUse
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue, 0, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $ref_disciplinechedcodes_minor->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($ref_disciplinechedcodes_minor->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($ref_disciplinechedcodes_minor->CancelMessage <> "") {
				$this->setFailureMessage($ref_disciplinechedcodes_minor->CancelMessage);
				$ref_disciplinechedcodes_minor->CancelMessage = "";
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
			$ref_disciplinechedcodes_minor->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $ref_disciplinechedcodes_minor;

		// Hide foreign keys
		$sMasterTblVar = $ref_disciplinechedcodes_minor->getCurrentMasterTable();
		if ($sMasterTblVar == "ref_disciplinechedcodes_major") {
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->Visible = FALSE;
			if ($GLOBALS["ref_disciplinechedcodes_major"]->EventCancelled) $ref_disciplinechedcodes_minor->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $ref_disciplinechedcodes_minor->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $ref_disciplinechedcodes_minor->getDetailFilter(); // Get detail filter
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
		$table = 'ref_disciplinechedcodes_minor';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $ref_disciplinechedcodes_minor;
		$table = 'ref_disciplinechedcodes_minor';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['disCHED_disciplineSpecific_id'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
		global $ref_disciplinechedcodes_minor;
		$table = 'ref_disciplinechedcodes_minor';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['disCHED_disciplineSpecific_id'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
		global $ref_disciplinechedcodes_minor;
		$table = 'ref_disciplinechedcodes_minor';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['disCHED_disciplineSpecific_id'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $ref_disciplinechedcodes_minor->fields) && $ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
