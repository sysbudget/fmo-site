<?php include_once "tbl_usersinfo.php" ?>
<?php

//
// Page class
//
class cview_tbl_profile_admin_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'view_tbl_profile_admin';

	// Page object name
	var $PageObjName = 'view_tbl_profile_admin_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $view_tbl_profile_admin;
		if ($view_tbl_profile_admin->UseTokenInUrl) $PageUrl .= "t=" . $view_tbl_profile_admin->TableVar . "&"; // Add page token
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
		global $objForm, $view_tbl_profile_admin;
		if ($view_tbl_profile_admin->UseTokenInUrl) {
			if ($objForm)
				return ($view_tbl_profile_admin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($view_tbl_profile_admin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cview_tbl_profile_admin_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (view_tbl_profile_admin)
		if (!isset($GLOBALS["view_tbl_profile_admin"])) {
			$GLOBALS["view_tbl_profile_admin"] = new cview_tbl_profile_admin();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["view_tbl_profile_admin"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'view_tbl_profile_admin', TRUE);

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
		global $view_tbl_profile_admin;

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
			$view_tbl_profile_admin->GridAddRowCount = $gridaddcnt;

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
		global $view_tbl_profile_admin;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $view_tbl_profile_admin;

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
			if ($view_tbl_profile_admin->Export <> "" ||
				$view_tbl_profile_admin->CurrentAction == "gridadd" ||
				$view_tbl_profile_admin->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($view_tbl_profile_admin->AllowAddDeleteRow) {
				if ($view_tbl_profile_admin->CurrentAction == "gridadd" ||
					$view_tbl_profile_admin->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($view_tbl_profile_admin->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $view_tbl_profile_admin->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $view_tbl_profile_admin->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $view_tbl_profile_admin->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($view_tbl_profile_admin->getMasterFilter() <> "" && $view_tbl_profile_admin->getCurrentMasterTable() == "view_tbl_collectionperiod_admin") {
			global $view_tbl_collectionperiod_admin;
			$rsmaster = $view_tbl_collectionperiod_admin->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($view_tbl_profile_admin->getReturnUrl()); // Return to caller
			} else {
				$view_tbl_collectionperiod_admin->LoadListRowValues($rsmaster);
				$view_tbl_collectionperiod_admin->RowType = UP_ROWTYPE_MASTER; // Master row
				$view_tbl_collectionperiod_admin->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$view_tbl_profile_admin->setSessionWhere($sFilter);
		$view_tbl_profile_admin->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $view_tbl_profile_admin;
		$view_tbl_profile_admin->LastAction = $view_tbl_profile_admin->CurrentAction; // Save last action
		$view_tbl_profile_admin->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $view_tbl_profile_admin;
		$bGridUpdate = TRUE;
		$this->WriteAuditTrailDummy($Language->Phrase("BatchUpdateBegin")); // Batch update begin

		// Get old recordset
		$view_tbl_profile_admin->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $view_tbl_profile_admin->SQL();
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
						$view_tbl_profile_admin->CurrentFilter = $view_tbl_profile_admin->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$view_tbl_profile_admin->SendEmail = FALSE; // Do not send email on update success
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
			$view_tbl_profile_admin->EventCancelled = TRUE; // Set event cancelled
			$view_tbl_profile_admin->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $view_tbl_profile_admin;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $view_tbl_profile_admin->KeyFilter();
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
		global $view_tbl_profile_admin;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 0) {
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $view_tbl_profile_admin;
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
				$view_tbl_profile_admin->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {

					// Add filter for this record
					$sFilter = $view_tbl_profile_admin->KeyFilter();
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
			$view_tbl_profile_admin->CurrentFilter = $sWrkFilter;
			$sSql = $view_tbl_profile_admin->SQL();
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
			$view_tbl_profile_admin->EventCancelled = TRUE; // Set event cancelled
			$view_tbl_profile_admin->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $view_tbl_profile_admin, $objForm;
		if ($objForm->HasValue("x_faculty_name") && $objForm->HasValue("o_faculty_name") && $view_tbl_profile_admin->faculty_name->CurrentValue <> $view_tbl_profile_admin->faculty_name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyGroup_CHEDCode") && $objForm->HasValue("o_facultyGroup_CHEDCode") && $view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue <> $view_tbl_profile_admin->facultyGroup_CHEDCode->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyRank_ID") && $objForm->HasValue("o_facultyRank_ID") && $view_tbl_profile_admin->facultyRank_ID->CurrentValue <> $view_tbl_profile_admin->facultyRank_ID->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_tenureCode") && $objForm->HasValue("o_facultyprofile_tenureCode") && $view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue <> $view_tbl_profile_admin->facultyprofile_tenureCode->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_leaveCode") && $objForm->HasValue("o_facultyprofile_leaveCode") && $view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue <> $view_tbl_profile_admin->facultyprofile_leaveCode->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_specificDiscipline_1_primaryTeachingLoad") && $objForm->HasValue("o_facultyprofile_specificDiscipline_1_primaryTeachingLoad") && $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue <> $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalHrs_basic") && $objForm->HasValue("o_facultyprofile_totalHrs_basic") && $view_tbl_profile_admin->facultyprofile_totalHrs_basic->CurrentValue <> $view_tbl_profile_admin->facultyprofile_totalHrs_basic->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalSCH_basic") && $objForm->HasValue("o_facultyprofile_totalSCH_basic") && $view_tbl_profile_admin->facultyprofile_totalSCH_basic->CurrentValue <> $view_tbl_profile_admin->facultyprofile_totalSCH_basic->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalCr_ugrad") && $objForm->HasValue("o_facultyprofile_totalCr_ugrad") && $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CurrentValue <> $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalHrs_ugrad") && $objForm->HasValue("o_facultyprofile_totalHrs_ugrad") && $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CurrentValue <> $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalSCH_ugrad") && $objForm->HasValue("o_facultyprofile_totalSCH_ugrad") && $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CurrentValue <> $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalCr_graduate") && $objForm->HasValue("o_facultyprofile_totalCr_graduate") && $view_tbl_profile_admin->facultyprofile_totalCr_graduate->CurrentValue <> $view_tbl_profile_admin->facultyprofile_totalCr_graduate->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalHrs_graduate") && $objForm->HasValue("o_facultyprofile_totalHrs_graduate") && $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CurrentValue <> $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalSCH_graduate") && $objForm->HasValue("o_facultyprofile_totalSCH_graduate") && $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CurrentValue <> $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_total_nonTeachingLoad") && $objForm->HasValue("o_facultyprofile_total_nonTeachingLoad") && $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CurrentValue <> $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalWorkloadInCreditUnits_gen") && $objForm->HasValue("o_facultyprofile_totalWorkloadInCreditUnits_gen") && $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue <> $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->OldValue)
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
		global $objForm, $view_tbl_profile_admin;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $view_tbl_profile_admin;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$view_tbl_profile_admin->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$view_tbl_profile_admin->CurrentOrderType = @$_GET["ordertype"];
			$view_tbl_profile_admin->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $view_tbl_profile_admin;
		$sOrderBy = $view_tbl_profile_admin->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($view_tbl_profile_admin->SqlOrderBy() <> "") {
				$sOrderBy = $view_tbl_profile_admin->SqlOrderBy();
				$view_tbl_profile_admin->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $view_tbl_profile_admin;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$view_tbl_profile_admin->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$view_tbl_profile_admin->collectionPeriod_ID->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$view_tbl_profile_admin->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $view_tbl_profile_admin;

		// "griddelete"
		if ($view_tbl_profile_admin->AllowAddDeleteRow) {
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
		global $Security, $Language, $view_tbl_profile_admin, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD)
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
		if ($view_tbl_profile_admin->AllowAddDeleteRow) {
			if ($view_tbl_profile_admin->CurrentMode == "add" || $view_tbl_profile_admin->CurrentMode == "copy" || $view_tbl_profile_admin->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, view_tbl_profile_admin_grid, " . $this->RowIndex . ");\">" . "<img src=\"phpimages/delete.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
				}
			}
		}
		if ($view_tbl_profile_admin->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
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
		global $Security, $Language, $view_tbl_profile_admin;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $view_tbl_profile_admin;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $view_tbl_profile_admin->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $view_tbl_profile_admin;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $view_tbl_profile_admin;
		$view_tbl_profile_admin->faculty_name->CurrentValue = NULL;
		$view_tbl_profile_admin->faculty_name->OldValue = $view_tbl_profile_admin->faculty_name->CurrentValue;
		$view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue = NULL;
		$view_tbl_profile_admin->facultyGroup_CHEDCode->OldValue = $view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue;
		$view_tbl_profile_admin->facultyRank_ID->CurrentValue = NULL;
		$view_tbl_profile_admin->facultyRank_ID->OldValue = $view_tbl_profile_admin->facultyRank_ID->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue = NULL;
		$view_tbl_profile_admin->facultyprofile_tenureCode->OldValue = $view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue = 3;
		$view_tbl_profile_admin->facultyprofile_leaveCode->OldValue = $view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue = NULL;
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->OldValue = $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_totalHrs_basic->CurrentValue = 0.0000;
		$view_tbl_profile_admin->facultyprofile_totalHrs_basic->OldValue = $view_tbl_profile_admin->facultyprofile_totalHrs_basic->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_totalSCH_basic->CurrentValue = 0.0000;
		$view_tbl_profile_admin->facultyprofile_totalSCH_basic->OldValue = $view_tbl_profile_admin->facultyprofile_totalSCH_basic->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CurrentValue = 0.0000;
		$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->OldValue = $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CurrentValue = 0.0000;
		$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->OldValue = $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CurrentValue = 0.0000;
		$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->OldValue = $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_totalCr_graduate->CurrentValue = 0.0000;
		$view_tbl_profile_admin->facultyprofile_totalCr_graduate->OldValue = $view_tbl_profile_admin->facultyprofile_totalCr_graduate->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CurrentValue = 0.0000;
		$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->OldValue = $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CurrentValue = 0.0000;
		$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->OldValue = $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CurrentValue = 0.0000;
		$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->OldValue = $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CurrentValue;
		$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue = 0.0000;
		$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->OldValue = $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $view_tbl_profile_admin;
		if (!$view_tbl_profile_admin->faculty_name->FldIsDetailKey) {
			$view_tbl_profile_admin->faculty_name->setFormValue($objForm->GetValue("x_faculty_name"));
		}
		$view_tbl_profile_admin->faculty_name->setOldValue($objForm->GetValue("o_faculty_name"));
		if (!$view_tbl_profile_admin->facultyGroup_CHEDCode->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyGroup_CHEDCode->setFormValue($objForm->GetValue("x_facultyGroup_CHEDCode"));
		}
		$view_tbl_profile_admin->facultyGroup_CHEDCode->setOldValue($objForm->GetValue("o_facultyGroup_CHEDCode"));
		if (!$view_tbl_profile_admin->facultyRank_ID->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyRank_ID->setFormValue($objForm->GetValue("x_facultyRank_ID"));
		}
		$view_tbl_profile_admin->facultyRank_ID->setOldValue($objForm->GetValue("o_facultyRank_ID"));
		if (!$view_tbl_profile_admin->facultyprofile_tenureCode->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_tenureCode->setFormValue($objForm->GetValue("x_facultyprofile_tenureCode"));
		}
		$view_tbl_profile_admin->facultyprofile_tenureCode->setOldValue($objForm->GetValue("o_facultyprofile_tenureCode"));
		if (!$view_tbl_profile_admin->facultyprofile_leaveCode->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_leaveCode->setFormValue($objForm->GetValue("x_facultyprofile_leaveCode"));
		}
		$view_tbl_profile_admin->facultyprofile_leaveCode->setOldValue($objForm->GetValue("o_facultyprofile_leaveCode"));
		if (!$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setFormValue($objForm->GetValue("x_facultyprofile_specificDiscipline_1_primaryTeachingLoad"));
		}
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setOldValue($objForm->GetValue("o_facultyprofile_specificDiscipline_1_primaryTeachingLoad"));
		if (!$view_tbl_profile_admin->facultyprofile_totalHrs_basic->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->setFormValue($objForm->GetValue("x_facultyprofile_totalHrs_basic"));
		}
		$view_tbl_profile_admin->facultyprofile_totalHrs_basic->setOldValue($objForm->GetValue("o_facultyprofile_totalHrs_basic"));
		if (!$view_tbl_profile_admin->facultyprofile_totalSCH_basic->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->setFormValue($objForm->GetValue("x_facultyprofile_totalSCH_basic"));
		}
		$view_tbl_profile_admin->facultyprofile_totalSCH_basic->setOldValue($objForm->GetValue("o_facultyprofile_totalSCH_basic"));
		if (!$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_totalCr_ugrad"));
		}
		$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->setOldValue($objForm->GetValue("o_facultyprofile_totalCr_ugrad"));
		if (!$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_totalHrs_ugrad"));
		}
		$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->setOldValue($objForm->GetValue("o_facultyprofile_totalHrs_ugrad"));
		if (!$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_totalSCH_ugrad"));
		}
		$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->setOldValue($objForm->GetValue("o_facultyprofile_totalSCH_ugrad"));
		if (!$view_tbl_profile_admin->facultyprofile_totalCr_graduate->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->setFormValue($objForm->GetValue("x_facultyprofile_totalCr_graduate"));
		}
		$view_tbl_profile_admin->facultyprofile_totalCr_graduate->setOldValue($objForm->GetValue("o_facultyprofile_totalCr_graduate"));
		if (!$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->setFormValue($objForm->GetValue("x_facultyprofile_totalHrs_graduate"));
		}
		$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->setOldValue($objForm->GetValue("o_facultyprofile_totalHrs_graduate"));
		if (!$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->setFormValue($objForm->GetValue("x_facultyprofile_totalSCH_graduate"));
		}
		$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->setOldValue($objForm->GetValue("o_facultyprofile_totalSCH_graduate"));
		if (!$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->setFormValue($objForm->GetValue("x_facultyprofile_total_nonTeachingLoad"));
		}
		$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->setOldValue($objForm->GetValue("o_facultyprofile_total_nonTeachingLoad"));
		if (!$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->FldIsDetailKey) {
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->setFormValue($objForm->GetValue("x_facultyprofile_totalWorkloadInCreditUnits_gen"));
		}
		$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->setOldValue($objForm->GetValue("o_facultyprofile_totalWorkloadInCreditUnits_gen"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $view_tbl_profile_admin;
		$view_tbl_profile_admin->faculty_name->CurrentValue = $view_tbl_profile_admin->faculty_name->FormValue;
		$view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue = $view_tbl_profile_admin->facultyGroup_CHEDCode->FormValue;
		$view_tbl_profile_admin->facultyRank_ID->CurrentValue = $view_tbl_profile_admin->facultyRank_ID->FormValue;
		$view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue = $view_tbl_profile_admin->facultyprofile_tenureCode->FormValue;
		$view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue = $view_tbl_profile_admin->facultyprofile_leaveCode->FormValue;
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue = $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FormValue;
		$view_tbl_profile_admin->facultyprofile_totalHrs_basic->CurrentValue = $view_tbl_profile_admin->facultyprofile_totalHrs_basic->FormValue;
		$view_tbl_profile_admin->facultyprofile_totalSCH_basic->CurrentValue = $view_tbl_profile_admin->facultyprofile_totalSCH_basic->FormValue;
		$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CurrentValue = $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->FormValue;
		$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CurrentValue = $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->FormValue;
		$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CurrentValue = $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->FormValue;
		$view_tbl_profile_admin->facultyprofile_totalCr_graduate->CurrentValue = $view_tbl_profile_admin->facultyprofile_totalCr_graduate->FormValue;
		$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CurrentValue = $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->FormValue;
		$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CurrentValue = $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->FormValue;
		$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CurrentValue = $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->FormValue;
		$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue = $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $view_tbl_profile_admin;

		// Call Recordset Selecting event
		$view_tbl_profile_admin->Recordset_Selecting($view_tbl_profile_admin->CurrentFilter);

		// Load List page SQL
		$sSql = $view_tbl_profile_admin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$view_tbl_profile_admin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $view_tbl_profile_admin;
		$sFilter = $view_tbl_profile_admin->KeyFilter();

		// Call Row Selecting event
		$view_tbl_profile_admin->Row_Selecting($sFilter);

		// Load SQL based on filter
		$view_tbl_profile_admin->CurrentFilter = $sFilter;
		$sSql = $view_tbl_profile_admin->SQL();
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
		global $conn, $view_tbl_profile_admin;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$view_tbl_profile_admin->Row_Selected($row);
		$view_tbl_profile_admin->facultyprofile_ID->setDbValue($rs->fields('facultyprofile_ID'));
		$view_tbl_profile_admin->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$view_tbl_profile_admin->faculty_name->setDbValue($rs->fields('faculty_name'));
		$view_tbl_profile_admin->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$view_tbl_profile_admin->cu->setDbValue($rs->fields('cu'));
		$view_tbl_profile_admin->collectionPeriod_ay->setDbValue($rs->fields('collectionPeriod_ay'));
		$view_tbl_profile_admin->collectionPeriod_sem->setDbValue($rs->fields('collectionPeriod_sem'));
		$view_tbl_profile_admin->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$view_tbl_profile_admin->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
		$view_tbl_profile_admin->unitID->setDbValue($rs->fields('unitID'));
		$view_tbl_profile_admin->facultyprofile_homeUnit_ID->setDbValue($rs->fields('facultyprofile_homeUnit_ID'));
		$view_tbl_profile_admin->facultyprofile_isHomeUnit->setDbValue($rs->fields('facultyprofile_isHomeUnit'));
		$view_tbl_profile_admin->facultyGroup_CHEDCode->setDbValue($rs->fields('facultyGroup_CHEDCode'));
		$view_tbl_profile_admin->facultyRank_ID->setDbValue($rs->fields('facultyRank_ID'));
		$view_tbl_profile_admin->facultyprofile_sg->setDbValue($rs->fields('facultyprofile_sg'));
		$view_tbl_profile_admin->facultyprofile_annualSalary->setDbValue($rs->fields('facultyprofile_annualSalary'));
		$view_tbl_profile_admin->facultyprofile_fte->setDbValue($rs->fields('facultyprofile_fte'));
		$view_tbl_profile_admin->facultyprofile_tenureCode->setDbValue($rs->fields('facultyprofile_tenureCode'));
		$view_tbl_profile_admin->facultyprofile_leaveCode->setDbValue($rs->fields('facultyprofile_leaveCode'));
		$view_tbl_profile_admin->facultyprofile_disCHED_disciplineMajorCode_gen->setDbValue($rs->fields('facultyprofile_disCHED_disciplineMajorCode_gen'));
		$view_tbl_profile_admin->disCHED_disciplineCode_gen->setDbValue($rs->fields('disCHED_disciplineCode_gen'));
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_1_primaryTeachingLoad'));
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_2_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_2_primaryTeachingLoad'));
		$view_tbl_profile_admin->facultyprofile_labHrs_basic->setDbValue($rs->fields('facultyprofile_labHrs_basic'));
		$view_tbl_profile_admin->facultyprofile_lecHrs_basic->setDbValue($rs->fields('facultyprofile_lecHrs_basic'));
		$view_tbl_profile_admin->facultyprofile_totalHrs_basic->setDbValue($rs->fields('facultyprofile_totalHrs_basic'));
		$view_tbl_profile_admin->facultyprofile_labSCH_basic->setDbValue($rs->fields('facultyprofile_labSCH_basic'));
		$view_tbl_profile_admin->facultyprofile_lecSCH_basic->setDbValue($rs->fields('facultyprofile_lecSCH_basic'));
		$view_tbl_profile_admin->facultyprofile_totalSCH_basic->setDbValue($rs->fields('facultyprofile_totalSCH_basic'));
		$view_tbl_profile_admin->facultyprofile_labCr_ugrad->setDbValue($rs->fields('facultyprofile_labCr_ugrad'));
		$view_tbl_profile_admin->facultyprofile_lecCr_ugrad->setDbValue($rs->fields('facultyprofile_lecCr_ugrad'));
		$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_ugrad'));
		$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->setDbValue($rs->fields('facultyprofile_totalCr_ugrad'));
		$view_tbl_profile_admin->facultyprofile_labHrs_ugrad->setDbValue($rs->fields('facultyprofile_labHrs_ugrad'));
		$view_tbl_profile_admin->facultyprofile_lecHrs_ugrad->setDbValue($rs->fields('facultyprofile_lecHrs_ugrad'));
		$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_ugrad'));
		$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->setDbValue($rs->fields('facultyprofile_totalHrs_ugrad'));
		$view_tbl_profile_admin->facultyprofile_labSCH_ugrad->setDbValue($rs->fields('facultyprofile_labSCH_ugrad'));
		$view_tbl_profile_admin->facultyprofile_lecSCH_ugrad->setDbValue($rs->fields('facultyprofile_lecSCH_ugrad'));
		$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_ugrad'));
		$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->setDbValue($rs->fields('facultyprofile_totalSCH_ugrad'));
		$view_tbl_profile_admin->facultyprofile_labCr_graduate->setDbValue($rs->fields('facultyprofile_labCr_graduate'));
		$view_tbl_profile_admin->facultyprofile_lecCr_graduate->setDbValue($rs->fields('facultyprofile_lecCr_graduate'));
		$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_graduate'));
		$view_tbl_profile_admin->facultyprofile_totalCr_graduate->setDbValue($rs->fields('facultyprofile_totalCr_graduate'));
		$view_tbl_profile_admin->facultyprofile_labHrs_graduate->setDbValue($rs->fields('facultyprofile_labHrs_graduate'));
		$view_tbl_profile_admin->facultyprofile_lecHrs_graduate->setDbValue($rs->fields('facultyprofile_lecHrs_graduate'));
		$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_graduate'));
		$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->setDbValue($rs->fields('facultyprofile_totalHrs_graduate'));
		$view_tbl_profile_admin->facultyprofile_labSCH_graduate->setDbValue($rs->fields('facultyprofile_labSCH_graduate'));
		$view_tbl_profile_admin->facultyprofile_lecSCH_graduate->setDbValue($rs->fields('facultyprofile_lecSCH_graduate'));
		$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_graduate'));
		$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->setDbValue($rs->fields('facultyprofile_totalSCH_graduate'));
		$view_tbl_profile_admin->facultyprofile_researchLoad->setDbValue($rs->fields('facultyprofile_researchLoad'));
		$view_tbl_profile_admin->facultyprofile_extensionServicesLoad->setDbValue($rs->fields('facultyprofile_extensionServicesLoad'));
		$view_tbl_profile_admin->facultyprofile_studyLoad->setDbValue($rs->fields('facultyprofile_studyLoad'));
		$view_tbl_profile_admin->facultyprofile_forProductionLoad->setDbValue($rs->fields('facultyprofile_forProductionLoad'));
		$view_tbl_profile_admin->facultyprofile_administrativeLoad->setDbValue($rs->fields('facultyprofile_administrativeLoad'));
		$view_tbl_profile_admin->facultyprofile_otherLoadCredits->setDbValue($rs->fields('facultyprofile_otherLoadCredits'));
		$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->setDbValue($rs->fields('facultyprofile_total_nonTeachingLoad'));
		$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->setDbValue($rs->fields('facultyprofile_totalWorkloadInCreditUnits_gen'));
		$view_tbl_profile_admin->facultyprofile_remarks->setDbValue($rs->fields('facultyprofile_remarks'));
	}

	// Load old record
	function LoadOldRecord() {
		global $view_tbl_profile_admin;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 0) {
		}

		// Load old recordset
		if ($bValidKey) {
			$view_tbl_profile_admin->CurrentFilter = $view_tbl_profile_admin->KeyFilter();
			$sSql = $view_tbl_profile_admin->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $view_tbl_profile_admin;

		// Initialize URLs
		// Call Row_Rendering event

		$view_tbl_profile_admin->Row_Rendering();

		// Common render codes for all row types
		// facultyprofile_ID

		$view_tbl_profile_admin->facultyprofile_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_ID
		$view_tbl_profile_admin->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_name
		$view_tbl_profile_admin->faculty_name->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ID
		$view_tbl_profile_admin->collectionPeriod_ID->CellCssStyle = "white-space: nowrap;";

		// cu
		$view_tbl_profile_admin->cu->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ay
		$view_tbl_profile_admin->collectionPeriod_ay->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_sem
		$view_tbl_profile_admin->collectionPeriod_sem->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_cutOffDate
		$view_tbl_profile_admin->collectionPeriod_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_status
		$view_tbl_profile_admin->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";

		// unitID
		$view_tbl_profile_admin->unitID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_homeUnit_ID
		$view_tbl_profile_admin->facultyprofile_homeUnit_ID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_isHomeUnit
		$view_tbl_profile_admin->facultyprofile_isHomeUnit->CellCssStyle = "white-space: nowrap;";

		// facultyGroup_CHEDCode
		$view_tbl_profile_admin->facultyGroup_CHEDCode->CellCssStyle = "white-space: nowrap;";

		// facultyRank_ID
		$view_tbl_profile_admin->facultyRank_ID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_sg
		$view_tbl_profile_admin->facultyprofile_sg->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_annualSalary
		$view_tbl_profile_admin->facultyprofile_annualSalary->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_fte
		$view_tbl_profile_admin->facultyprofile_fte->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_tenureCode
		$view_tbl_profile_admin->facultyprofile_tenureCode->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_leaveCode
		$view_tbl_profile_admin->facultyprofile_leaveCode->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_disCHED_disciplineMajorCode_gen
		$view_tbl_profile_admin->facultyprofile_disCHED_disciplineMajorCode_gen->CellCssStyle = "white-space: nowrap;";

		// disCHED_disciplineCode_gen
		$view_tbl_profile_admin->disCHED_disciplineCode_gen->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_specificDiscipline_1_primaryTeachingLoad
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_specificDiscipline_2_primaryTeachingLoad
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_basic
		$view_tbl_profile_admin->facultyprofile_labHrs_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_basic
		$view_tbl_profile_admin->facultyprofile_lecHrs_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_basic
		// facultyprofile_labSCH_basic

		$view_tbl_profile_admin->facultyprofile_labSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_basic
		$view_tbl_profile_admin->facultyprofile_lecSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_basic
		$view_tbl_profile_admin->facultyprofile_totalSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labCr_ugrad
		$view_tbl_profile_admin->facultyprofile_labCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecCr_ugrad
		$view_tbl_profile_admin->facultyprofile_lecCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecCr_ugrad
		$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalCr_ugrad
		$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_ugrad
		$view_tbl_profile_admin->facultyprofile_labHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_ugrad
		$view_tbl_profile_admin->facultyprofile_lecHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecHrs_ugrad
		$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_ugrad
		$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labSCH_ugrad
		$view_tbl_profile_admin->facultyprofile_labSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_ugrad
		$view_tbl_profile_admin->facultyprofile_lecSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecSCH_ugrad
		$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_ugrad
		$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labCr_graduate
		$view_tbl_profile_admin->facultyprofile_labCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecCr_graduate
		$view_tbl_profile_admin->facultyprofile_lecCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecCr_graduate
		$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalCr_graduate
		$view_tbl_profile_admin->facultyprofile_totalCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_graduate
		$view_tbl_profile_admin->facultyprofile_labHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_graduate
		$view_tbl_profile_admin->facultyprofile_lecHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecHrs_graduate
		$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_graduate
		$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labSCH_graduate
		$view_tbl_profile_admin->facultyprofile_labSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_graduate
		$view_tbl_profile_admin->facultyprofile_lecSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecSCH_graduate
		$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_graduate
		$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_researchLoad
		$view_tbl_profile_admin->facultyprofile_researchLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_extensionServicesLoad
		$view_tbl_profile_admin->facultyprofile_extensionServicesLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_studyLoad
		$view_tbl_profile_admin->facultyprofile_studyLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_forProductionLoad
		$view_tbl_profile_admin->facultyprofile_forProductionLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_administrativeLoad
		$view_tbl_profile_admin->facultyprofile_administrativeLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_otherLoadCredits
		$view_tbl_profile_admin->facultyprofile_otherLoadCredits->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_total_nonTeachingLoad
		$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalWorkloadInCreditUnits_gen
		$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_remarks
		$view_tbl_profile_admin->facultyprofile_remarks->CellCssStyle = "white-space: nowrap;";
		if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View row

			// faculty_name
			$view_tbl_profile_admin->faculty_name->ViewValue = $view_tbl_profile_admin->faculty_name->CurrentValue;
			$view_tbl_profile_admin->faculty_name->ViewCustomAttributes = "";

			// facultyGroup_CHEDCode
			if (strval($view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue) <> "") {
				$sFilterWrk = "`facultyGroup_CHEDCode` = '" . up_AdjustSql($view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue) . "'";
			$sSqlWrk = "SELECT `facultyGroup_description` FROM `ref_facultygroup`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `facultyGroup_description` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$view_tbl_profile_admin->facultyGroup_CHEDCode->ViewValue = $rswrk->fields('facultyGroup_description');
					$rswrk->Close();
				} else {
					$view_tbl_profile_admin->facultyGroup_CHEDCode->ViewValue = $view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue;
				}
			} else {
				$view_tbl_profile_admin->facultyGroup_CHEDCode->ViewValue = NULL;
			}
			$view_tbl_profile_admin->facultyGroup_CHEDCode->ViewCustomAttributes = "";

			// facultyRank_ID
			if (strval($view_tbl_profile_admin->facultyRank_ID->CurrentValue) <> "") {
				$sFilterWrk = "`facultyRank_ID` = " . up_AdjustSql($view_tbl_profile_admin->facultyRank_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `facultyRank_UPRank` FROM `ref_facultyrank`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `facultyRank_UPRank` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$view_tbl_profile_admin->facultyRank_ID->ViewValue = $rswrk->fields('facultyRank_UPRank');
					$rswrk->Close();
				} else {
					$view_tbl_profile_admin->facultyRank_ID->ViewValue = $view_tbl_profile_admin->facultyRank_ID->CurrentValue;
				}
			} else {
				$view_tbl_profile_admin->facultyRank_ID->ViewValue = NULL;
			}
			$view_tbl_profile_admin->facultyRank_ID->ViewCustomAttributes = "";

			// facultyprofile_sg
			$view_tbl_profile_admin->facultyprofile_sg->ViewValue = $view_tbl_profile_admin->facultyprofile_sg->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_sg->ViewCustomAttributes = "";

			// facultyprofile_annualSalary
			$view_tbl_profile_admin->facultyprofile_annualSalary->ViewValue = $view_tbl_profile_admin->facultyprofile_annualSalary->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_annualSalary->ViewCustomAttributes = "";

			// facultyprofile_tenureCode
			if (strval($view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue) <> "") {
				$sFilterWrk = "`tenureCode_ID` = " . up_AdjustSql($view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue) . "";
			$sSqlWrk = "SELECT `tenureCode_description` FROM `ref_tenurecode`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `tenureCode_description` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$view_tbl_profile_admin->facultyprofile_tenureCode->ViewValue = $rswrk->fields('tenureCode_description');
					$rswrk->Close();
				} else {
					$view_tbl_profile_admin->facultyprofile_tenureCode->ViewValue = $view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue;
				}
			} else {
				$view_tbl_profile_admin->facultyprofile_tenureCode->ViewValue = NULL;
			}
			$view_tbl_profile_admin->facultyprofile_tenureCode->ViewCustomAttributes = "";

			// facultyprofile_leaveCode
			if (strval($view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue) <> "") {
				$sFilterWrk = "`leaveCode_ID` = " . up_AdjustSql($view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue) . "";
			$sSqlWrk = "SELECT `leaveCode_description` FROM `ref_leavecode`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `leaveCode_description` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$view_tbl_profile_admin->facultyprofile_leaveCode->ViewValue = $rswrk->fields('leaveCode_description');
					$rswrk->Close();
				} else {
					$view_tbl_profile_admin->facultyprofile_leaveCode->ViewValue = $view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue;
				}
			} else {
				$view_tbl_profile_admin->facultyprofile_leaveCode->ViewValue = NULL;
			}
			$view_tbl_profile_admin->facultyprofile_leaveCode->ViewCustomAttributes = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_specificDiscipline_2_primaryTeachingLoad
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_labHrs_basic
			$view_tbl_profile_admin->facultyprofile_labHrs_basic->ViewValue = $view_tbl_profile_admin->facultyprofile_labHrs_basic->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_basic
			$view_tbl_profile_admin->facultyprofile_lecHrs_basic->ViewValue = $view_tbl_profile_admin->facultyprofile_lecHrs_basic->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_basic
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->ViewValue = $view_tbl_profile_admin->facultyprofile_totalHrs_basic->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_labSCH_basic
			$view_tbl_profile_admin->facultyprofile_labSCH_basic->ViewValue = $view_tbl_profile_admin->facultyprofile_labSCH_basic->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_basic
			$view_tbl_profile_admin->facultyprofile_lecSCH_basic->ViewValue = $view_tbl_profile_admin->facultyprofile_lecSCH_basic->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_basic
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->ViewValue = $view_tbl_profile_admin->facultyprofile_totalSCH_basic->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_labCr_ugrad
			$view_tbl_profile_admin->facultyprofile_labCr_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_labCr_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecCr_ugrad
			$view_tbl_profile_admin->facultyprofile_lecCr_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_lecCr_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecCr_ugrad
			$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_mixedLabLecCr_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalCr_ugrad
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_labHrs_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_labHrs_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_lecHrs_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_lecHrs_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_labSCH_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_labSCH_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_lecSCH_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_lecSCH_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labCr_graduate
			$view_tbl_profile_admin->facultyprofile_labCr_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_labCr_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecCr_graduate
			$view_tbl_profile_admin->facultyprofile_lecCr_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_lecCr_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecCr_graduate
			$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_mixedLabLecCr_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalCr_graduate
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_totalCr_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_labHrs_graduate
			$view_tbl_profile_admin->facultyprofile_labHrs_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_labHrs_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_graduate
			$view_tbl_profile_admin->facultyprofile_lecHrs_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_lecHrs_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecHrs_graduate
			$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_graduate
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_labSCH_graduate
			$view_tbl_profile_admin->facultyprofile_labSCH_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_labSCH_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_graduate
			$view_tbl_profile_admin->facultyprofile_lecSCH_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_lecSCH_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecSCH_graduate
			$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_graduate
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_researchLoad
			$view_tbl_profile_admin->facultyprofile_researchLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_researchLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_researchLoad->ViewCustomAttributes = "";

			// facultyprofile_extensionServicesLoad
			$view_tbl_profile_admin->facultyprofile_extensionServicesLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_extensionServicesLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_extensionServicesLoad->ViewCustomAttributes = "";

			// facultyprofile_studyLoad
			$view_tbl_profile_admin->facultyprofile_studyLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_studyLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_studyLoad->ViewCustomAttributes = "";

			// facultyprofile_forProductionLoad
			$view_tbl_profile_admin->facultyprofile_forProductionLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_forProductionLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_forProductionLoad->ViewCustomAttributes = "";

			// facultyprofile_administrativeLoad
			$view_tbl_profile_admin->facultyprofile_administrativeLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_administrativeLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_administrativeLoad->ViewCustomAttributes = "";

			// facultyprofile_otherLoadCredits
			$view_tbl_profile_admin->facultyprofile_otherLoadCredits->ViewValue = $view_tbl_profile_admin->facultyprofile_otherLoadCredits->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_otherLoadCredits->ViewCustomAttributes = "";

			// facultyprofile_total_nonTeachingLoad
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ViewValue = $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ViewCustomAttributes = "";

			// facultyprofile_remarks
			$view_tbl_profile_admin->facultyprofile_remarks->ViewValue = $view_tbl_profile_admin->facultyprofile_remarks->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_remarks->ViewCustomAttributes = "";

			// faculty_name
			$view_tbl_profile_admin->faculty_name->LinkCustomAttributes = "";
			$view_tbl_profile_admin->faculty_name->HrefValue = "";
			$view_tbl_profile_admin->faculty_name->TooltipValue = "";

			// facultyGroup_CHEDCode
			$view_tbl_profile_admin->facultyGroup_CHEDCode->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyGroup_CHEDCode->HrefValue = "";
			$view_tbl_profile_admin->facultyGroup_CHEDCode->TooltipValue = "";

			// facultyRank_ID
			$view_tbl_profile_admin->facultyRank_ID->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyRank_ID->HrefValue = "";
			$view_tbl_profile_admin->facultyRank_ID->TooltipValue = "";

			// facultyprofile_tenureCode
			$view_tbl_profile_admin->facultyprofile_tenureCode->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_tenureCode->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_tenureCode->TooltipValue = "";

			// facultyprofile_leaveCode
			$view_tbl_profile_admin->facultyprofile_leaveCode->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_leaveCode->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_leaveCode->TooltipValue = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->TooltipValue = "";

			// facultyprofile_totalHrs_basic
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->TooltipValue = "";

			// facultyprofile_totalSCH_basic
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->TooltipValue = "";

			// facultyprofile_totalCr_ugrad
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->TooltipValue = "";

			// facultyprofile_totalHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->TooltipValue = "";

			// facultyprofile_totalSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->TooltipValue = "";

			// facultyprofile_totalCr_graduate
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->TooltipValue = "";

			// facultyprofile_totalHrs_graduate
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->TooltipValue = "";

			// facultyprofile_totalSCH_graduate
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->TooltipValue = "";

			// facultyprofile_total_nonTeachingLoad
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->TooltipValue = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->TooltipValue = "";
		} elseif ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add row

			// faculty_name
			$view_tbl_profile_admin->faculty_name->EditCustomAttributes = "";
			$view_tbl_profile_admin->faculty_name->EditValue = up_HtmlEncode($view_tbl_profile_admin->faculty_name->CurrentValue);

			// facultyGroup_CHEDCode
			$view_tbl_profile_admin->facultyGroup_CHEDCode->EditCustomAttributes = "";

			// facultyRank_ID
			$view_tbl_profile_admin->facultyRank_ID->EditCustomAttributes = "";

			// facultyprofile_tenureCode
			$view_tbl_profile_admin->facultyprofile_tenureCode->EditCustomAttributes = "";

			// facultyprofile_leaveCode
			$view_tbl_profile_admin->facultyprofile_leaveCode->EditCustomAttributes = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue);

			// facultyprofile_totalHrs_basic
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_basic->CurrentValue);

			// facultyprofile_totalSCH_basic
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_basic->CurrentValue);

			// facultyprofile_totalCr_ugrad
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CurrentValue);

			// facultyprofile_totalHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CurrentValue);

			// facultyprofile_totalSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CurrentValue);

			// facultyprofile_totalCr_graduate
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalCr_graduate->CurrentValue);

			// facultyprofile_totalHrs_graduate
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CurrentValue);

			// facultyprofile_totalSCH_graduate
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CurrentValue);

			// facultyprofile_total_nonTeachingLoad
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CurrentValue);

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue);

			// Edit refer script
			// faculty_name

			$view_tbl_profile_admin->faculty_name->HrefValue = "";

			// facultyGroup_CHEDCode
			$view_tbl_profile_admin->facultyGroup_CHEDCode->HrefValue = "";

			// facultyRank_ID
			$view_tbl_profile_admin->facultyRank_ID->HrefValue = "";

			// facultyprofile_tenureCode
			$view_tbl_profile_admin->facultyprofile_tenureCode->HrefValue = "";

			// facultyprofile_leaveCode
			$view_tbl_profile_admin->facultyprofile_leaveCode->HrefValue = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->HrefValue = "";

			// facultyprofile_totalHrs_basic
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->HrefValue = "";

			// facultyprofile_totalSCH_basic
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->HrefValue = "";

			// facultyprofile_totalCr_ugrad
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->HrefValue = "";

			// facultyprofile_totalHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->HrefValue = "";

			// facultyprofile_totalSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->HrefValue = "";

			// facultyprofile_totalCr_graduate
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->HrefValue = "";

			// facultyprofile_totalHrs_graduate
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->HrefValue = "";

			// facultyprofile_totalSCH_graduate
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->HrefValue = "";

			// facultyprofile_total_nonTeachingLoad
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->HrefValue = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->HrefValue = "";
		} elseif ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// faculty_name
			$view_tbl_profile_admin->faculty_name->EditCustomAttributes = "";
			$view_tbl_profile_admin->faculty_name->EditValue = up_HtmlEncode($view_tbl_profile_admin->faculty_name->CurrentValue);

			// facultyGroup_CHEDCode
			$view_tbl_profile_admin->facultyGroup_CHEDCode->EditCustomAttributes = "";

			// facultyRank_ID
			$view_tbl_profile_admin->facultyRank_ID->EditCustomAttributes = "";

			// facultyprofile_tenureCode
			$view_tbl_profile_admin->facultyprofile_tenureCode->EditCustomAttributes = "";

			// facultyprofile_leaveCode
			$view_tbl_profile_admin->facultyprofile_leaveCode->EditCustomAttributes = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue);

			// facultyprofile_totalHrs_basic
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_basic->CurrentValue);

			// facultyprofile_totalSCH_basic
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_basic->CurrentValue);

			// facultyprofile_totalCr_ugrad
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CurrentValue);

			// facultyprofile_totalHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CurrentValue);

			// facultyprofile_totalSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CurrentValue);

			// facultyprofile_totalCr_graduate
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalCr_graduate->CurrentValue);

			// facultyprofile_totalHrs_graduate
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CurrentValue);

			// facultyprofile_totalSCH_graduate
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CurrentValue);

			// facultyprofile_total_nonTeachingLoad
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CurrentValue);

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->EditCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->EditValue = up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue);

			// Edit refer script
			// faculty_name

			$view_tbl_profile_admin->faculty_name->HrefValue = "";

			// facultyGroup_CHEDCode
			$view_tbl_profile_admin->facultyGroup_CHEDCode->HrefValue = "";

			// facultyRank_ID
			$view_tbl_profile_admin->facultyRank_ID->HrefValue = "";

			// facultyprofile_tenureCode
			$view_tbl_profile_admin->facultyprofile_tenureCode->HrefValue = "";

			// facultyprofile_leaveCode
			$view_tbl_profile_admin->facultyprofile_leaveCode->HrefValue = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->HrefValue = "";

			// facultyprofile_totalHrs_basic
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->HrefValue = "";

			// facultyprofile_totalSCH_basic
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->HrefValue = "";

			// facultyprofile_totalCr_ugrad
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->HrefValue = "";

			// facultyprofile_totalHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->HrefValue = "";

			// facultyprofile_totalSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->HrefValue = "";

			// facultyprofile_totalCr_graduate
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->HrefValue = "";

			// facultyprofile_totalHrs_graduate
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->HrefValue = "";

			// facultyprofile_totalSCH_graduate
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->HrefValue = "";

			// facultyprofile_total_nonTeachingLoad
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->HrefValue = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->HrefValue = "";
		}
		if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD ||
			$view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT ||
			$view_tbl_profile_admin->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$view_tbl_profile_admin->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($view_tbl_profile_admin->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$view_tbl_profile_admin->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $view_tbl_profile_admin;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldErrMsg());
		}
		if (!up_CheckNumber($view_tbl_profile_admin->facultyprofile_totalHrs_basic->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_profile_admin->facultyprofile_totalHrs_basic->FldErrMsg());
		}
		if (!up_CheckNumber($view_tbl_profile_admin->facultyprofile_totalSCH_basic->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_profile_admin->facultyprofile_totalSCH_basic->FldErrMsg());
		}
		if (!up_CheckNumber($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($view_tbl_profile_admin->facultyprofile_totalCr_graduate->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_profile_admin->facultyprofile_totalCr_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->FldErrMsg());
		}
		if (!up_CheckNumber($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->FldErrMsg());
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
		global $conn, $Language, $Security, $view_tbl_profile_admin;
		$DeleteRows = TRUE;
		$sSql = $view_tbl_profile_admin->SQL();
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
				$DeleteRows = $view_tbl_profile_admin->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($view_tbl_profile_admin->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($view_tbl_profile_admin->CancelMessage <> "") {
				$this->setFailureMessage($view_tbl_profile_admin->CancelMessage);
				$view_tbl_profile_admin->CancelMessage = "";
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
				$view_tbl_profile_admin->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $view_tbl_profile_admin;
		$sFilter = $view_tbl_profile_admin->KeyFilter();
		$view_tbl_profile_admin->CurrentFilter = $sFilter;
		$sSql = $view_tbl_profile_admin->SQL();
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
			$view_tbl_profile_admin->faculty_name->SetDbValueDef($rsnew, $view_tbl_profile_admin->faculty_name->CurrentValue, NULL, $view_tbl_profile_admin->faculty_name->ReadOnly);

			// facultyGroup_CHEDCode
			$view_tbl_profile_admin->facultyGroup_CHEDCode->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue, NULL, $view_tbl_profile_admin->facultyGroup_CHEDCode->ReadOnly);

			// facultyRank_ID
			$view_tbl_profile_admin->facultyRank_ID->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyRank_ID->CurrentValue, NULL, $view_tbl_profile_admin->facultyRank_ID->ReadOnly);

			// facultyprofile_tenureCode
			$view_tbl_profile_admin->facultyprofile_tenureCode->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_tenureCode->ReadOnly);

			// facultyprofile_leaveCode
			$view_tbl_profile_admin->facultyprofile_leaveCode->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_leaveCode->ReadOnly);

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ReadOnly);

			// facultyprofile_totalHrs_basic
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalHrs_basic->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_totalHrs_basic->ReadOnly);

			// facultyprofile_totalSCH_basic
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalSCH_basic->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_totalSCH_basic->ReadOnly);

			// facultyprofile_totalCr_ugrad
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ReadOnly);

			// facultyprofile_totalHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ReadOnly);

			// facultyprofile_totalSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ReadOnly);

			// facultyprofile_totalCr_graduate
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalCr_graduate->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_totalCr_graduate->ReadOnly);

			// facultyprofile_totalHrs_graduate
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ReadOnly);

			// facultyprofile_totalSCH_graduate
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ReadOnly);

			// facultyprofile_total_nonTeachingLoad
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ReadOnly);

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue, NULL, $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $view_tbl_profile_admin->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($view_tbl_profile_admin->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($view_tbl_profile_admin->CancelMessage <> "") {
					$this->setFailureMessage($view_tbl_profile_admin->CancelMessage);
					$view_tbl_profile_admin->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$view_tbl_profile_admin->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $view_tbl_profile_admin;

		// Set up foreign key field value from Session
			if ($view_tbl_profile_admin->getCurrentMasterTable() == "view_tbl_collectionperiod_admin") {
				$view_tbl_profile_admin->collectionPeriod_ID->CurrentValue = $view_tbl_profile_admin->collectionPeriod_ID->getSessionValue();
			}
		$rsnew = array();

		// faculty_name
		$view_tbl_profile_admin->faculty_name->SetDbValueDef($rsnew, $view_tbl_profile_admin->faculty_name->CurrentValue, NULL, FALSE);

		// facultyGroup_CHEDCode
		$view_tbl_profile_admin->facultyGroup_CHEDCode->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue, NULL, FALSE);

		// facultyRank_ID
		$view_tbl_profile_admin->facultyRank_ID->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyRank_ID->CurrentValue, NULL, FALSE);

		// facultyprofile_tenureCode
		$view_tbl_profile_admin->facultyprofile_tenureCode->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue, NULL, FALSE);

		// facultyprofile_leaveCode
		$view_tbl_profile_admin->facultyprofile_leaveCode->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue, NULL, strval($view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue) == "");

		// facultyprofile_specificDiscipline_1_primaryTeachingLoad
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue, NULL, FALSE);

		// facultyprofile_totalHrs_basic
		$view_tbl_profile_admin->facultyprofile_totalHrs_basic->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalHrs_basic->CurrentValue, NULL, strval($view_tbl_profile_admin->facultyprofile_totalHrs_basic->CurrentValue) == "");

		// facultyprofile_totalSCH_basic
		$view_tbl_profile_admin->facultyprofile_totalSCH_basic->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalSCH_basic->CurrentValue, NULL, strval($view_tbl_profile_admin->facultyprofile_totalSCH_basic->CurrentValue) == "");

		// facultyprofile_totalCr_ugrad
		$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CurrentValue, NULL, strval($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CurrentValue) == "");

		// facultyprofile_totalHrs_ugrad
		$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CurrentValue, NULL, strval($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CurrentValue) == "");

		// facultyprofile_totalSCH_ugrad
		$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CurrentValue, NULL, strval($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CurrentValue) == "");

		// facultyprofile_totalCr_graduate
		$view_tbl_profile_admin->facultyprofile_totalCr_graduate->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalCr_graduate->CurrentValue, NULL, strval($view_tbl_profile_admin->facultyprofile_totalCr_graduate->CurrentValue) == "");

		// facultyprofile_totalHrs_graduate
		$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CurrentValue, NULL, strval($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CurrentValue) == "");

		// facultyprofile_totalSCH_graduate
		$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CurrentValue, NULL, strval($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CurrentValue) == "");

		// facultyprofile_total_nonTeachingLoad
		$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CurrentValue, NULL, strval($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CurrentValue) == "");

		// facultyprofile_totalWorkloadInCreditUnits_gen
		$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->SetDbValueDef($rsnew, $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue, NULL, strval($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue) == "");

		// collectionPeriod_ID
		if ($view_tbl_profile_admin->collectionPeriod_ID->getSessionValue() <> "") {
			$rsnew['collectionPeriod_ID'] = $view_tbl_profile_admin->collectionPeriod_ID->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $view_tbl_profile_admin->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($view_tbl_profile_admin->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($view_tbl_profile_admin->CancelMessage <> "") {
				$this->setFailureMessage($view_tbl_profile_admin->CancelMessage);
				$view_tbl_profile_admin->CancelMessage = "";
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
			$view_tbl_profile_admin->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $view_tbl_profile_admin;

		// Hide foreign keys
		$sMasterTblVar = $view_tbl_profile_admin->getCurrentMasterTable();
		if ($sMasterTblVar == "view_tbl_collectionperiod_admin") {
			$view_tbl_profile_admin->collectionPeriod_ID->Visible = FALSE;
			if ($GLOBALS["view_tbl_collectionperiod_admin"]->EventCancelled) $view_tbl_profile_admin->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $view_tbl_profile_admin->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $view_tbl_profile_admin->getDetailFilter(); // Get detail filter
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
		$table = 'view_tbl_profile_admin';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $view_tbl_profile_admin;
		$table = 'view_tbl_profile_admin';

		// Get key value
		$key = "";

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($view_tbl_profile_admin->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($view_tbl_profile_admin->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($view_tbl_profile_admin->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
		global $view_tbl_profile_admin;
		$table = 'view_tbl_profile_admin';

		// Get key value
		$key = "";

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($view_tbl_profile_admin->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($view_tbl_profile_admin->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($view_tbl_profile_admin->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($view_tbl_profile_admin->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
		global $view_tbl_profile_admin;
		$table = 'view_tbl_profile_admin';

		// Get key value
		$key = "";

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $view_tbl_profile_admin->fields) && $view_tbl_profile_admin->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($view_tbl_profile_admin->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($view_tbl_profile_admin->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
