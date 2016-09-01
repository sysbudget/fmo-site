<?php include_once "tbl_usersinfo.php" ?>
<?php

//
// Page class
//
class ctbl_profile_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'tbl_profile';

	// Page object name
	var $PageObjName = 'tbl_profile_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_profile;
		if ($tbl_profile->UseTokenInUrl) $PageUrl .= "t=" . $tbl_profile->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_profile;
		if ($tbl_profile->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_profile->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_profile->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_profile_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_profile)
		if (!isset($GLOBALS["tbl_profile"])) {
			$GLOBALS["tbl_profile"] = new ctbl_profile();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["tbl_profile"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_profile', TRUE);

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
		global $tbl_profile;

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
			$this->Page_Terminate("tbl_profilelist.php");
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$tbl_profile->GridAddRowCount = $gridaddcnt;

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
		global $tbl_profile;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_profile;

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
			if ($tbl_profile->Export <> "" ||
				$tbl_profile->CurrentAction == "gridadd" ||
				$tbl_profile->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($tbl_profile->AllowAddDeleteRow) {
				if ($tbl_profile->CurrentAction == "gridadd" ||
					$tbl_profile->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($tbl_profile->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_profile->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $tbl_profile->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $tbl_profile->getDetailFilter(); // Restore detail filter

		// Add master User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			if ($tbl_profile->getCurrentMasterTable() == "tbl_collectionperiod")
				$this->DbMasterFilter = $tbl_profile->AddMasterUserIDFilter($this->DbMasterFilter, "tbl_collectionperiod"); // Add master User ID filter
		}
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($tbl_profile->getMasterFilter() <> "" && $tbl_profile->getCurrentMasterTable() == "tbl_collectionperiod") {
			global $tbl_collectionperiod;
			$rsmaster = $tbl_collectionperiod->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($tbl_profile->getReturnUrl()); // Return to caller
			} else {
				$tbl_collectionperiod->LoadListRowValues($rsmaster);
				$tbl_collectionperiod->RowType = UP_ROWTYPE_MASTER; // Master row
				$tbl_collectionperiod->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$tbl_profile->setSessionWhere($sFilter);
		$tbl_profile->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $tbl_profile;
		$tbl_profile->LastAction = $tbl_profile->CurrentAction; // Save last action
		$tbl_profile->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $tbl_profile;
		$bGridUpdate = TRUE;
		$this->WriteAuditTrailDummy($Language->Phrase("BatchUpdateBegin")); // Batch update begin

		// Get old recordset
		$tbl_profile->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $tbl_profile->SQL();
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
						$tbl_profile->CurrentFilter = $tbl_profile->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$tbl_profile->SendEmail = FALSE; // Do not send email on update success
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
			$tbl_profile->EventCancelled = TRUE; // Set event cancelled
			$tbl_profile->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $tbl_profile;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $tbl_profile->KeyFilter();
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
		global $tbl_profile;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 1) {
			$tbl_profile->facultyprofile_ID->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($tbl_profile->facultyprofile_ID->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $tbl_profile;
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
				$tbl_profile->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {
					if ($sKey <> "") $sKey .= UP_COMPOSITE_KEY_SEPARATOR;
					$sKey .= $tbl_profile->facultyprofile_ID->CurrentValue;

					// Add filter for this record
					$sFilter = $tbl_profile->KeyFilter();
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
			$tbl_profile->CurrentFilter = $sWrkFilter;
			$sSql = $tbl_profile->SQL();
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
			$tbl_profile->EventCancelled = TRUE; // Set event cancelled
			$tbl_profile->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $tbl_profile, $objForm;
		if ($objForm->HasValue("x_faculty_name") && $objForm->HasValue("o_faculty_name") && $tbl_profile->faculty_name->CurrentValue <> $tbl_profile->faculty_name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyGroup_CHEDCode") && $objForm->HasValue("o_facultyGroup_CHEDCode") && $tbl_profile->facultyGroup_CHEDCode->CurrentValue <> $tbl_profile->facultyGroup_CHEDCode->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyRank_ID") && $objForm->HasValue("o_facultyRank_ID") && $tbl_profile->facultyRank_ID->CurrentValue <> $tbl_profile->facultyRank_ID->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_tenureCode") && $objForm->HasValue("o_facultyprofile_tenureCode") && $tbl_profile->facultyprofile_tenureCode->CurrentValue <> $tbl_profile->facultyprofile_tenureCode->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_leaveCode") && $objForm->HasValue("o_facultyprofile_leaveCode") && $tbl_profile->facultyprofile_leaveCode->CurrentValue <> $tbl_profile->facultyprofile_leaveCode->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_specificDiscipline_1_primaryTeachingLoad") && $objForm->HasValue("o_facultyprofile_specificDiscipline_1_primaryTeachingLoad") && $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue <> $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalHrs_basic") && $objForm->HasValue("o_facultyprofile_totalHrs_basic") && $tbl_profile->facultyprofile_totalHrs_basic->CurrentValue <> $tbl_profile->facultyprofile_totalHrs_basic->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalSCH_basic") && $objForm->HasValue("o_facultyprofile_totalSCH_basic") && $tbl_profile->facultyprofile_totalSCH_basic->CurrentValue <> $tbl_profile->facultyprofile_totalSCH_basic->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalCr_ugrad") && $objForm->HasValue("o_facultyprofile_totalCr_ugrad") && $tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue <> $tbl_profile->facultyprofile_totalCr_ugrad->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalHrs_ugrad") && $objForm->HasValue("o_facultyprofile_totalHrs_ugrad") && $tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue <> $tbl_profile->facultyprofile_totalHrs_ugrad->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalSCH_ugrad") && $objForm->HasValue("o_facultyprofile_totalSCH_ugrad") && $tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue <> $tbl_profile->facultyprofile_totalSCH_ugrad->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalCr_graduate") && $objForm->HasValue("o_facultyprofile_totalCr_graduate") && $tbl_profile->facultyprofile_totalCr_graduate->CurrentValue <> $tbl_profile->facultyprofile_totalCr_graduate->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalHrs_graduate") && $objForm->HasValue("o_facultyprofile_totalHrs_graduate") && $tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue <> $tbl_profile->facultyprofile_totalHrs_graduate->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalSCH_graduate") && $objForm->HasValue("o_facultyprofile_totalSCH_graduate") && $tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue <> $tbl_profile->facultyprofile_totalSCH_graduate->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_total_nonTeachingLoad") && $objForm->HasValue("o_facultyprofile_total_nonTeachingLoad") && $tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue <> $tbl_profile->facultyprofile_total_nonTeachingLoad->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_facultyprofile_totalWorkloadInCreditUnits_gen") && $objForm->HasValue("o_facultyprofile_totalWorkloadInCreditUnits_gen") && $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue <> $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->OldValue)
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
		global $objForm, $tbl_profile;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_profile;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_profile->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_profile->CurrentOrderType = @$_GET["ordertype"];
			$tbl_profile->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_profile;
		$sOrderBy = $tbl_profile->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_profile->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_profile->SqlOrderBy();
				$tbl_profile->setSessionOrderBy($sOrderBy);
				$tbl_profile->faculty_name->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_profile;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$tbl_profile->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$tbl_profile->collectionPeriod_ID->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_profile->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_profile->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_profile;

		// "griddelete"
		if ($tbl_profile->AllowAddDeleteRow) {
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
		global $Security, $Language, $tbl_profile, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($tbl_profile->RowType == UP_ROWTYPE_ADD)
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
		if ($tbl_profile->AllowAddDeleteRow) {
			if ($tbl_profile->CurrentMode == "add" || $tbl_profile->CurrentMode == "copy" || $tbl_profile->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (!$Security->CanDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, tbl_profile_grid, " . $this->RowIndex . ");\">" . "<img src=\"phpimages/delete.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("DeleteLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
				}
			}
		}
		if ($tbl_profile->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . $tbl_profile->facultyprofile_ID->CurrentValue . "\">";
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	function SetRecordKey(&$key, $rs) {
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs->fields('facultyprofile_ID');
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_profile;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_profile;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_profile->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_profile->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_profile->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_profile->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_profile->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_profile->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_profile;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $tbl_profile;
		$tbl_profile->faculty_name->CurrentValue = NULL;
		$tbl_profile->faculty_name->OldValue = $tbl_profile->faculty_name->CurrentValue;
		$tbl_profile->facultyGroup_CHEDCode->CurrentValue = NULL;
		$tbl_profile->facultyGroup_CHEDCode->OldValue = $tbl_profile->facultyGroup_CHEDCode->CurrentValue;
		$tbl_profile->facultyRank_ID->CurrentValue = NULL;
		$tbl_profile->facultyRank_ID->OldValue = $tbl_profile->facultyRank_ID->CurrentValue;
		$tbl_profile->facultyprofile_tenureCode->CurrentValue = NULL;
		$tbl_profile->facultyprofile_tenureCode->OldValue = $tbl_profile->facultyprofile_tenureCode->CurrentValue;
		$tbl_profile->facultyprofile_leaveCode->CurrentValue = 3;
		$tbl_profile->facultyprofile_leaveCode->OldValue = $tbl_profile->facultyprofile_leaveCode->CurrentValue;
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue = NULL;
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->OldValue = $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue;
		$tbl_profile->facultyprofile_totalHrs_basic->CurrentValue = 0.0000;
		$tbl_profile->facultyprofile_totalHrs_basic->OldValue = $tbl_profile->facultyprofile_totalHrs_basic->CurrentValue;
		$tbl_profile->facultyprofile_totalSCH_basic->CurrentValue = 0.0000;
		$tbl_profile->facultyprofile_totalSCH_basic->OldValue = $tbl_profile->facultyprofile_totalSCH_basic->CurrentValue;
		$tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue = 0.0000;
		$tbl_profile->facultyprofile_totalCr_ugrad->OldValue = $tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue;
		$tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue = 0.0000;
		$tbl_profile->facultyprofile_totalHrs_ugrad->OldValue = $tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue;
		$tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue = 0.0000;
		$tbl_profile->facultyprofile_totalSCH_ugrad->OldValue = $tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue;
		$tbl_profile->facultyprofile_totalCr_graduate->CurrentValue = 0.0000;
		$tbl_profile->facultyprofile_totalCr_graduate->OldValue = $tbl_profile->facultyprofile_totalCr_graduate->CurrentValue;
		$tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue = 0.0000;
		$tbl_profile->facultyprofile_totalHrs_graduate->OldValue = $tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue;
		$tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue = 0.0000;
		$tbl_profile->facultyprofile_totalSCH_graduate->OldValue = $tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue;
		$tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue = 0.0000;
		$tbl_profile->facultyprofile_total_nonTeachingLoad->OldValue = $tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue;
		$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue = 0.0000;
		$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->OldValue = $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_profile;
		if (!$tbl_profile->faculty_name->FldIsDetailKey) {
			$tbl_profile->faculty_name->setFormValue($objForm->GetValue("x_faculty_name"));
		}
		$tbl_profile->faculty_name->setOldValue($objForm->GetValue("o_faculty_name"));
		if (!$tbl_profile->facultyGroup_CHEDCode->FldIsDetailKey) {
			$tbl_profile->facultyGroup_CHEDCode->setFormValue($objForm->GetValue("x_facultyGroup_CHEDCode"));
		}
		$tbl_profile->facultyGroup_CHEDCode->setOldValue($objForm->GetValue("o_facultyGroup_CHEDCode"));
		if (!$tbl_profile->facultyRank_ID->FldIsDetailKey) {
			$tbl_profile->facultyRank_ID->setFormValue($objForm->GetValue("x_facultyRank_ID"));
		}
		$tbl_profile->facultyRank_ID->setOldValue($objForm->GetValue("o_facultyRank_ID"));
		if (!$tbl_profile->facultyprofile_tenureCode->FldIsDetailKey) {
			$tbl_profile->facultyprofile_tenureCode->setFormValue($objForm->GetValue("x_facultyprofile_tenureCode"));
		}
		$tbl_profile->facultyprofile_tenureCode->setOldValue($objForm->GetValue("o_facultyprofile_tenureCode"));
		if (!$tbl_profile->facultyprofile_leaveCode->FldIsDetailKey) {
			$tbl_profile->facultyprofile_leaveCode->setFormValue($objForm->GetValue("x_facultyprofile_leaveCode"));
		}
		$tbl_profile->facultyprofile_leaveCode->setOldValue($objForm->GetValue("o_facultyprofile_leaveCode"));
		if (!$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setFormValue($objForm->GetValue("x_facultyprofile_specificDiscipline_1_primaryTeachingLoad"));
		}
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setOldValue($objForm->GetValue("o_facultyprofile_specificDiscipline_1_primaryTeachingLoad"));
		if (!$tbl_profile->facultyprofile_totalHrs_basic->FldIsDetailKey) {
			$tbl_profile->facultyprofile_totalHrs_basic->setFormValue($objForm->GetValue("x_facultyprofile_totalHrs_basic"));
		}
		$tbl_profile->facultyprofile_totalHrs_basic->setOldValue($objForm->GetValue("o_facultyprofile_totalHrs_basic"));
		if (!$tbl_profile->facultyprofile_totalSCH_basic->FldIsDetailKey) {
			$tbl_profile->facultyprofile_totalSCH_basic->setFormValue($objForm->GetValue("x_facultyprofile_totalSCH_basic"));
		}
		$tbl_profile->facultyprofile_totalSCH_basic->setOldValue($objForm->GetValue("o_facultyprofile_totalSCH_basic"));
		if (!$tbl_profile->facultyprofile_totalCr_ugrad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_totalCr_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_totalCr_ugrad"));
		}
		$tbl_profile->facultyprofile_totalCr_ugrad->setOldValue($objForm->GetValue("o_facultyprofile_totalCr_ugrad"));
		if (!$tbl_profile->facultyprofile_totalHrs_ugrad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_totalHrs_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_totalHrs_ugrad"));
		}
		$tbl_profile->facultyprofile_totalHrs_ugrad->setOldValue($objForm->GetValue("o_facultyprofile_totalHrs_ugrad"));
		if (!$tbl_profile->facultyprofile_totalSCH_ugrad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_totalSCH_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_totalSCH_ugrad"));
		}
		$tbl_profile->facultyprofile_totalSCH_ugrad->setOldValue($objForm->GetValue("o_facultyprofile_totalSCH_ugrad"));
		if (!$tbl_profile->facultyprofile_totalCr_graduate->FldIsDetailKey) {
			$tbl_profile->facultyprofile_totalCr_graduate->setFormValue($objForm->GetValue("x_facultyprofile_totalCr_graduate"));
		}
		$tbl_profile->facultyprofile_totalCr_graduate->setOldValue($objForm->GetValue("o_facultyprofile_totalCr_graduate"));
		if (!$tbl_profile->facultyprofile_totalHrs_graduate->FldIsDetailKey) {
			$tbl_profile->facultyprofile_totalHrs_graduate->setFormValue($objForm->GetValue("x_facultyprofile_totalHrs_graduate"));
		}
		$tbl_profile->facultyprofile_totalHrs_graduate->setOldValue($objForm->GetValue("o_facultyprofile_totalHrs_graduate"));
		if (!$tbl_profile->facultyprofile_totalSCH_graduate->FldIsDetailKey) {
			$tbl_profile->facultyprofile_totalSCH_graduate->setFormValue($objForm->GetValue("x_facultyprofile_totalSCH_graduate"));
		}
		$tbl_profile->facultyprofile_totalSCH_graduate->setOldValue($objForm->GetValue("o_facultyprofile_totalSCH_graduate"));
		if (!$tbl_profile->facultyprofile_total_nonTeachingLoad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_total_nonTeachingLoad->setFormValue($objForm->GetValue("x_facultyprofile_total_nonTeachingLoad"));
		}
		$tbl_profile->facultyprofile_total_nonTeachingLoad->setOldValue($objForm->GetValue("o_facultyprofile_total_nonTeachingLoad"));
		if (!$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->FldIsDetailKey) {
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->setFormValue($objForm->GetValue("x_facultyprofile_totalWorkloadInCreditUnits_gen"));
		}
		$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->setOldValue($objForm->GetValue("o_facultyprofile_totalWorkloadInCreditUnits_gen"));
		if (!$tbl_profile->facultyprofile_ID->FldIsDetailKey && $tbl_profile->CurrentAction <> "gridadd" && $tbl_profile->CurrentAction <> "add")
			$tbl_profile->facultyprofile_ID->setFormValue($objForm->GetValue("x_facultyprofile_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_profile;
		if ($tbl_profile->CurrentAction <> "gridadd" && $tbl_profile->CurrentAction <> "add")
			$tbl_profile->facultyprofile_ID->CurrentValue = $tbl_profile->facultyprofile_ID->FormValue;
		$tbl_profile->faculty_name->CurrentValue = $tbl_profile->faculty_name->FormValue;
		$tbl_profile->facultyGroup_CHEDCode->CurrentValue = $tbl_profile->facultyGroup_CHEDCode->FormValue;
		$tbl_profile->facultyRank_ID->CurrentValue = $tbl_profile->facultyRank_ID->FormValue;
		$tbl_profile->facultyprofile_tenureCode->CurrentValue = $tbl_profile->facultyprofile_tenureCode->FormValue;
		$tbl_profile->facultyprofile_leaveCode->CurrentValue = $tbl_profile->facultyprofile_leaveCode->FormValue;
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue = $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FormValue;
		$tbl_profile->facultyprofile_totalHrs_basic->CurrentValue = $tbl_profile->facultyprofile_totalHrs_basic->FormValue;
		$tbl_profile->facultyprofile_totalSCH_basic->CurrentValue = $tbl_profile->facultyprofile_totalSCH_basic->FormValue;
		$tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue = $tbl_profile->facultyprofile_totalCr_ugrad->FormValue;
		$tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue = $tbl_profile->facultyprofile_totalHrs_ugrad->FormValue;
		$tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue = $tbl_profile->facultyprofile_totalSCH_ugrad->FormValue;
		$tbl_profile->facultyprofile_totalCr_graduate->CurrentValue = $tbl_profile->facultyprofile_totalCr_graduate->FormValue;
		$tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue = $tbl_profile->facultyprofile_totalHrs_graduate->FormValue;
		$tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue = $tbl_profile->facultyprofile_totalSCH_graduate->FormValue;
		$tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue = $tbl_profile->facultyprofile_total_nonTeachingLoad->FormValue;
		$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue = $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_profile;

		// Call Recordset Selecting event
		$tbl_profile->Recordset_Selecting($tbl_profile->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_profile->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_profile->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_profile;
		$sFilter = $tbl_profile->KeyFilter();

		// Call Row Selecting event
		$tbl_profile->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_profile->CurrentFilter = $sFilter;
		$sSql = $tbl_profile->SQL();
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
		global $conn, $tbl_profile;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_profile->Row_Selected($row);
		$tbl_profile->facultyprofile_ID->setDbValue($rs->fields('facultyprofile_ID'));
		$tbl_profile->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$tbl_profile->faculty_name->setDbValue($rs->fields('faculty_name'));
		$tbl_profile->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$tbl_profile->cu->setDbValue($rs->fields('cu'));
		$tbl_profile->collectionPeriod_ay->setDbValue($rs->fields('collectionPeriod_ay'));
		$tbl_profile->collectionPeriod_sem->setDbValue($rs->fields('collectionPeriod_sem'));
		$tbl_profile->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$tbl_profile->unitID->setDbValue($rs->fields('unitID'));
		$tbl_profile->facultyprofile_homeUnit_ID->setDbValue($rs->fields('facultyprofile_homeUnit_ID'));
		$tbl_profile->facultyprofile_isHomeUnit->setDbValue($rs->fields('facultyprofile_isHomeUnit'));
		$tbl_profile->facultyGroup_CHEDCode->setDbValue($rs->fields('facultyGroup_CHEDCode'));
		$tbl_profile->facultyRank_ID->setDbValue($rs->fields('facultyRank_ID'));
		$tbl_profile->facultyprofile_sg->setDbValue($rs->fields('facultyprofile_sg'));
		$tbl_profile->facultyprofile_annualSalary->setDbValue($rs->fields('facultyprofile_annualSalary'));
		$tbl_profile->facultyprofile_fte->setDbValue($rs->fields('facultyprofile_fte'));
		$tbl_profile->facultyprofile_tenureCode->setDbValue($rs->fields('facultyprofile_tenureCode'));
		$tbl_profile->facultyprofile_leaveCode->setDbValue($rs->fields('facultyprofile_leaveCode'));
		$tbl_profile->facultyprofile_disCHED_disciplineMajorCode_gen->setDbValue($rs->fields('facultyprofile_disCHED_disciplineMajorCode_gen'));
		$tbl_profile->disCHED_disciplineCode_gen->setDbValue($rs->fields('disCHED_disciplineCode_gen'));
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_1_primaryTeachingLoad'));
		$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_2_primaryTeachingLoad'));
		$tbl_profile->facultyprofile_labHrs_basic->setDbValue($rs->fields('facultyprofile_labHrs_basic'));
		$tbl_profile->facultyprofile_lecHrs_basic->setDbValue($rs->fields('facultyprofile_lecHrs_basic'));
		$tbl_profile->facultyprofile_totalHrs_basic->setDbValue($rs->fields('facultyprofile_totalHrs_basic'));
		$tbl_profile->facultyprofile_labSCH_basic->setDbValue($rs->fields('facultyprofile_labSCH_basic'));
		$tbl_profile->facultyprofile_lecSCH_basic->setDbValue($rs->fields('facultyprofile_lecSCH_basic'));
		$tbl_profile->facultyprofile_totalSCH_basic->setDbValue($rs->fields('facultyprofile_totalSCH_basic'));
		$tbl_profile->facultyprofile_labCr_ugrad->setDbValue($rs->fields('facultyprofile_labCr_ugrad'));
		$tbl_profile->facultyprofile_lecCr_ugrad->setDbValue($rs->fields('facultyprofile_lecCr_ugrad'));
		$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_ugrad'));
		$tbl_profile->facultyprofile_totalCr_ugrad->setDbValue($rs->fields('facultyprofile_totalCr_ugrad'));
		$tbl_profile->facultyprofile_labHrs_ugrad->setDbValue($rs->fields('facultyprofile_labHrs_ugrad'));
		$tbl_profile->facultyprofile_lecHrs_ugrad->setDbValue($rs->fields('facultyprofile_lecHrs_ugrad'));
		$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_ugrad'));
		$tbl_profile->facultyprofile_totalHrs_ugrad->setDbValue($rs->fields('facultyprofile_totalHrs_ugrad'));
		$tbl_profile->facultyprofile_labSCH_ugrad->setDbValue($rs->fields('facultyprofile_labSCH_ugrad'));
		$tbl_profile->facultyprofile_lecSCH_ugrad->setDbValue($rs->fields('facultyprofile_lecSCH_ugrad'));
		$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_ugrad'));
		$tbl_profile->facultyprofile_totalSCH_ugrad->setDbValue($rs->fields('facultyprofile_totalSCH_ugrad'));
		$tbl_profile->facultyprofile_labCr_graduate->setDbValue($rs->fields('facultyprofile_labCr_graduate'));
		$tbl_profile->facultyprofile_lecCr_graduate->setDbValue($rs->fields('facultyprofile_lecCr_graduate'));
		$tbl_profile->facultyprofile_mixedLabLecCr_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_graduate'));
		$tbl_profile->facultyprofile_totalCr_graduate->setDbValue($rs->fields('facultyprofile_totalCr_graduate'));
		$tbl_profile->facultyprofile_labHrs_graduate->setDbValue($rs->fields('facultyprofile_labHrs_graduate'));
		$tbl_profile->facultyprofile_lecHrs_graduate->setDbValue($rs->fields('facultyprofile_lecHrs_graduate'));
		$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_graduate'));
		$tbl_profile->facultyprofile_totalHrs_graduate->setDbValue($rs->fields('facultyprofile_totalHrs_graduate'));
		$tbl_profile->facultyprofile_labSCH_graduate->setDbValue($rs->fields('facultyprofile_labSCH_graduate'));
		$tbl_profile->facultyprofile_lecSCH_graduate->setDbValue($rs->fields('facultyprofile_lecSCH_graduate'));
		$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_graduate'));
		$tbl_profile->facultyprofile_totalSCH_graduate->setDbValue($rs->fields('facultyprofile_totalSCH_graduate'));
		$tbl_profile->facultyprofile_researchLoad->setDbValue($rs->fields('facultyprofile_researchLoad'));
		$tbl_profile->facultyprofile_extensionServicesLoad->setDbValue($rs->fields('facultyprofile_extensionServicesLoad'));
		$tbl_profile->facultyprofile_studyLoad->setDbValue($rs->fields('facultyprofile_studyLoad'));
		$tbl_profile->facultyprofile_forProductionLoad->setDbValue($rs->fields('facultyprofile_forProductionLoad'));
		$tbl_profile->facultyprofile_administrativeLoad->setDbValue($rs->fields('facultyprofile_administrativeLoad'));
		$tbl_profile->facultyprofile_otherLoadCredits->setDbValue($rs->fields('facultyprofile_otherLoadCredits'));
		$tbl_profile->facultyprofile_total_nonTeachingLoad->setDbValue($rs->fields('facultyprofile_total_nonTeachingLoad'));
		$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->setDbValue($rs->fields('facultyprofile_totalWorkloadInCreditUnits_gen'));
		$tbl_profile->facultyprofile_remarks->setDbValue($rs->fields('facultyprofile_remarks'));
		$tbl_profile->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_profile;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$tbl_profile->facultyprofile_ID->CurrentValue = strval($arKeys[0]); // facultyprofile_ID
			else
				$bValidKey = FALSE;
		}

		// Load old recordset
		if ($bValidKey) {
			$tbl_profile->CurrentFilter = $tbl_profile->KeyFilter();
			$sSql = $tbl_profile->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_profile;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_profile->Row_Rendering();

		// Common render codes for all row types
		// facultyprofile_ID

		$tbl_profile->facultyprofile_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_ID
		$tbl_profile->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_name
		$tbl_profile->faculty_name->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ID
		$tbl_profile->collectionPeriod_ID->CellCssStyle = "white-space: nowrap;";

		// cu
		$tbl_profile->cu->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ay
		$tbl_profile->collectionPeriod_ay->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_sem
		$tbl_profile->collectionPeriod_sem->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_cutOffDate
		$tbl_profile->collectionPeriod_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// unitID
		$tbl_profile->unitID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_homeUnit_ID
		$tbl_profile->facultyprofile_homeUnit_ID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_isHomeUnit
		$tbl_profile->facultyprofile_isHomeUnit->CellCssStyle = "white-space: nowrap;";

		// facultyGroup_CHEDCode
		$tbl_profile->facultyGroup_CHEDCode->CellCssStyle = "white-space: nowrap;";

		// facultyRank_ID
		$tbl_profile->facultyRank_ID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_sg
		$tbl_profile->facultyprofile_sg->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_annualSalary
		$tbl_profile->facultyprofile_annualSalary->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_fte
		$tbl_profile->facultyprofile_fte->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_tenureCode
		$tbl_profile->facultyprofile_tenureCode->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_leaveCode
		$tbl_profile->facultyprofile_leaveCode->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_disCHED_disciplineMajorCode_gen
		$tbl_profile->facultyprofile_disCHED_disciplineMajorCode_gen->CellCssStyle = "white-space: nowrap;";

		// disCHED_disciplineCode_gen
		$tbl_profile->disCHED_disciplineCode_gen->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_specificDiscipline_1_primaryTeachingLoad
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_specificDiscipline_2_primaryTeachingLoad
		$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_basic
		$tbl_profile->facultyprofile_labHrs_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_basic
		$tbl_profile->facultyprofile_lecHrs_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_basic
		// facultyprofile_labSCH_basic

		$tbl_profile->facultyprofile_labSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_basic
		$tbl_profile->facultyprofile_lecSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_basic
		$tbl_profile->facultyprofile_totalSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labCr_ugrad
		$tbl_profile->facultyprofile_labCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecCr_ugrad
		$tbl_profile->facultyprofile_lecCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecCr_ugrad
		$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalCr_ugrad
		$tbl_profile->facultyprofile_totalCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_ugrad
		$tbl_profile->facultyprofile_labHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_ugrad
		$tbl_profile->facultyprofile_lecHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecHrs_ugrad
		$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_ugrad
		$tbl_profile->facultyprofile_totalHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labSCH_ugrad
		$tbl_profile->facultyprofile_labSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_ugrad
		$tbl_profile->facultyprofile_lecSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecSCH_ugrad
		$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_ugrad
		$tbl_profile->facultyprofile_totalSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labCr_graduate
		$tbl_profile->facultyprofile_labCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecCr_graduate
		$tbl_profile->facultyprofile_lecCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecCr_graduate
		$tbl_profile->facultyprofile_mixedLabLecCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalCr_graduate
		$tbl_profile->facultyprofile_totalCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_graduate
		$tbl_profile->facultyprofile_labHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_graduate
		$tbl_profile->facultyprofile_lecHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecHrs_graduate
		$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_graduate
		$tbl_profile->facultyprofile_totalHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labSCH_graduate
		$tbl_profile->facultyprofile_labSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_graduate
		$tbl_profile->facultyprofile_lecSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecSCH_graduate
		$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_graduate
		$tbl_profile->facultyprofile_totalSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_researchLoad
		$tbl_profile->facultyprofile_researchLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_extensionServicesLoad
		$tbl_profile->facultyprofile_extensionServicesLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_studyLoad
		$tbl_profile->facultyprofile_studyLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_forProductionLoad
		$tbl_profile->facultyprofile_forProductionLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_administrativeLoad
		$tbl_profile->facultyprofile_administrativeLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_otherLoadCredits
		$tbl_profile->facultyprofile_otherLoadCredits->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_total_nonTeachingLoad
		$tbl_profile->facultyprofile_total_nonTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalWorkloadInCreditUnits_gen
		$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_remarks
		$tbl_profile->facultyprofile_remarks->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_status
		$tbl_profile->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";
		if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View row

			// faculty_name
			$tbl_profile->faculty_name->ViewValue = $tbl_profile->faculty_name->CurrentValue;
			$tbl_profile->faculty_name->ViewCustomAttributes = "";

			// facultyGroup_CHEDCode
			if (strval($tbl_profile->facultyGroup_CHEDCode->CurrentValue) <> "") {
				$sFilterWrk = "`facultyGroup_CHEDCode` = '" . up_AdjustSql($tbl_profile->facultyGroup_CHEDCode->CurrentValue) . "'";
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
					$tbl_profile->facultyGroup_CHEDCode->ViewValue = $rswrk->fields('facultyGroup_description');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyGroup_CHEDCode->ViewValue = $tbl_profile->facultyGroup_CHEDCode->CurrentValue;
				}
			} else {
				$tbl_profile->facultyGroup_CHEDCode->ViewValue = NULL;
			}
			$tbl_profile->facultyGroup_CHEDCode->ViewCustomAttributes = "";

			// facultyRank_ID
			if (strval($tbl_profile->facultyRank_ID->CurrentValue) <> "") {
				$sFilterWrk = "`facultyRank_ID` = " . up_AdjustSql($tbl_profile->facultyRank_ID->CurrentValue) . "";
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
					$tbl_profile->facultyRank_ID->ViewValue = $rswrk->fields('facultyRank_UPRank');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyRank_ID->ViewValue = $tbl_profile->facultyRank_ID->CurrentValue;
				}
			} else {
				$tbl_profile->facultyRank_ID->ViewValue = NULL;
			}
			$tbl_profile->facultyRank_ID->ViewCustomAttributes = "";

			// facultyprofile_sg
			$tbl_profile->facultyprofile_sg->ViewValue = $tbl_profile->facultyprofile_sg->CurrentValue;
			$tbl_profile->facultyprofile_sg->ViewCustomAttributes = "";

			// facultyprofile_annualSalary
			$tbl_profile->facultyprofile_annualSalary->ViewValue = $tbl_profile->facultyprofile_annualSalary->CurrentValue;
			$tbl_profile->facultyprofile_annualSalary->ViewCustomAttributes = "";

			// facultyprofile_tenureCode
			if (strval($tbl_profile->facultyprofile_tenureCode->CurrentValue) <> "") {
				$sFilterWrk = "`tenureCode_ID` = " . up_AdjustSql($tbl_profile->facultyprofile_tenureCode->CurrentValue) . "";
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
					$tbl_profile->facultyprofile_tenureCode->ViewValue = $rswrk->fields('tenureCode_description');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_tenureCode->ViewValue = $tbl_profile->facultyprofile_tenureCode->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_tenureCode->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_tenureCode->ViewCustomAttributes = "";

			// facultyprofile_leaveCode
			if (strval($tbl_profile->facultyprofile_leaveCode->CurrentValue) <> "") {
				$sFilterWrk = "`leaveCode_ID` = " . up_AdjustSql($tbl_profile->facultyprofile_leaveCode->CurrentValue) . "";
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
					$tbl_profile->facultyprofile_leaveCode->ViewValue = $rswrk->fields('leaveCode_description');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_leaveCode->ViewValue = $tbl_profile->facultyprofile_leaveCode->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_leaveCode->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_leaveCode->ViewCustomAttributes = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			if (strval($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) <> "") {
				$sFilterWrk = "`disCHED_disciplineSpecific_code` = " . up_AdjustSql($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) . "";
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
					$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = $rswrk->fields('disCHED_disciplineSpecific_nameList');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_specificDiscipline_2_primaryTeachingLoad
			if (strval($tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue) <> "") {
				$sFilterWrk = "`disCHED_disciplineSpecific_code` = " . up_AdjustSql($tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue) . "";
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
					$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = $rswrk->fields('disCHED_disciplineSpecific_nameList');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = $tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_labHrs_basic
			$tbl_profile->facultyprofile_labHrs_basic->ViewValue = $tbl_profile->facultyprofile_labHrs_basic->CurrentValue;
			$tbl_profile->facultyprofile_labHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_basic
			$tbl_profile->facultyprofile_lecHrs_basic->ViewValue = $tbl_profile->facultyprofile_lecHrs_basic->CurrentValue;
			$tbl_profile->facultyprofile_lecHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_basic
			$tbl_profile->facultyprofile_totalHrs_basic->ViewValue = $tbl_profile->facultyprofile_totalHrs_basic->CurrentValue;
			$tbl_profile->facultyprofile_totalHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_labSCH_basic
			$tbl_profile->facultyprofile_labSCH_basic->ViewValue = $tbl_profile->facultyprofile_labSCH_basic->CurrentValue;
			$tbl_profile->facultyprofile_labSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_basic
			$tbl_profile->facultyprofile_lecSCH_basic->ViewValue = $tbl_profile->facultyprofile_lecSCH_basic->CurrentValue;
			$tbl_profile->facultyprofile_lecSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_basic
			$tbl_profile->facultyprofile_totalSCH_basic->ViewValue = $tbl_profile->facultyprofile_totalSCH_basic->CurrentValue;
			$tbl_profile->facultyprofile_totalSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_labCr_ugrad
			$tbl_profile->facultyprofile_labCr_ugrad->ViewValue = $tbl_profile->facultyprofile_labCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_labCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecCr_ugrad
			$tbl_profile->facultyprofile_lecCr_ugrad->ViewValue = $tbl_profile->facultyprofile_lecCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_lecCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecCr_ugrad
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->ViewValue = $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalCr_ugrad
			$tbl_profile->facultyprofile_totalCr_ugrad->ViewValue = $tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_totalCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labHrs_ugrad
			$tbl_profile->facultyprofile_labHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_labHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_labHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_ugrad
			$tbl_profile->facultyprofile_lecHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_lecHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_lecHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecHrs_ugrad
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_ugrad
			$tbl_profile->facultyprofile_totalHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_totalHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labSCH_ugrad
			$tbl_profile->facultyprofile_labSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_labSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_labSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_ugrad
			$tbl_profile->facultyprofile_lecSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_lecSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_lecSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecSCH_ugrad
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_ugrad
			$tbl_profile->facultyprofile_totalSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_totalSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labCr_graduate
			$tbl_profile->facultyprofile_labCr_graduate->ViewValue = $tbl_profile->facultyprofile_labCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_labCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecCr_graduate
			$tbl_profile->facultyprofile_lecCr_graduate->ViewValue = $tbl_profile->facultyprofile_lecCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_lecCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecCr_graduate
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->ViewValue = $tbl_profile->facultyprofile_mixedLabLecCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalCr_graduate
			$tbl_profile->facultyprofile_totalCr_graduate->ViewValue = $tbl_profile->facultyprofile_totalCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_totalCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_labHrs_graduate
			$tbl_profile->facultyprofile_labHrs_graduate->ViewValue = $tbl_profile->facultyprofile_labHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_labHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_graduate
			$tbl_profile->facultyprofile_lecHrs_graduate->ViewValue = $tbl_profile->facultyprofile_lecHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_lecHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecHrs_graduate
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->ViewValue = $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_graduate
			$tbl_profile->facultyprofile_totalHrs_graduate->ViewValue = $tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_totalHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_labSCH_graduate
			$tbl_profile->facultyprofile_labSCH_graduate->ViewValue = $tbl_profile->facultyprofile_labSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_labSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_graduate
			$tbl_profile->facultyprofile_lecSCH_graduate->ViewValue = $tbl_profile->facultyprofile_lecSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_lecSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecSCH_graduate
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->ViewValue = $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_graduate
			$tbl_profile->facultyprofile_totalSCH_graduate->ViewValue = $tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_totalSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_researchLoad
			$tbl_profile->facultyprofile_researchLoad->ViewValue = $tbl_profile->facultyprofile_researchLoad->CurrentValue;
			$tbl_profile->facultyprofile_researchLoad->ViewCustomAttributes = "";

			// facultyprofile_extensionServicesLoad
			$tbl_profile->facultyprofile_extensionServicesLoad->ViewValue = $tbl_profile->facultyprofile_extensionServicesLoad->CurrentValue;
			$tbl_profile->facultyprofile_extensionServicesLoad->ViewCustomAttributes = "";

			// facultyprofile_studyLoad
			$tbl_profile->facultyprofile_studyLoad->ViewValue = $tbl_profile->facultyprofile_studyLoad->CurrentValue;
			$tbl_profile->facultyprofile_studyLoad->ViewCustomAttributes = "";

			// facultyprofile_forProductionLoad
			$tbl_profile->facultyprofile_forProductionLoad->ViewValue = $tbl_profile->facultyprofile_forProductionLoad->CurrentValue;
			$tbl_profile->facultyprofile_forProductionLoad->ViewCustomAttributes = "";

			// facultyprofile_administrativeLoad
			$tbl_profile->facultyprofile_administrativeLoad->ViewValue = $tbl_profile->facultyprofile_administrativeLoad->CurrentValue;
			$tbl_profile->facultyprofile_administrativeLoad->ViewCustomAttributes = "";

			// facultyprofile_otherLoadCredits
			$tbl_profile->facultyprofile_otherLoadCredits->ViewValue = $tbl_profile->facultyprofile_otherLoadCredits->CurrentValue;
			$tbl_profile->facultyprofile_otherLoadCredits->ViewCustomAttributes = "";

			// facultyprofile_total_nonTeachingLoad
			$tbl_profile->facultyprofile_total_nonTeachingLoad->ViewValue = $tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue;
			$tbl_profile->facultyprofile_total_nonTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewValue = $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue;
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewCustomAttributes = "";

			// facultyprofile_remarks
			$tbl_profile->facultyprofile_remarks->ViewValue = $tbl_profile->facultyprofile_remarks->CurrentValue;
			$tbl_profile->facultyprofile_remarks->ViewCustomAttributes = "";

			// faculty_name
			$tbl_profile->faculty_name->LinkCustomAttributes = "";
			$tbl_profile->faculty_name->HrefValue = "";
			$tbl_profile->faculty_name->TooltipValue = "";

			// facultyGroup_CHEDCode
			$tbl_profile->facultyGroup_CHEDCode->LinkCustomAttributes = "";
			$tbl_profile->facultyGroup_CHEDCode->HrefValue = "";
			$tbl_profile->facultyGroup_CHEDCode->TooltipValue = "";

			// facultyRank_ID
			$tbl_profile->facultyRank_ID->LinkCustomAttributes = "";
			$tbl_profile->facultyRank_ID->HrefValue = "";
			$tbl_profile->facultyRank_ID->TooltipValue = "";

			// facultyprofile_tenureCode
			$tbl_profile->facultyprofile_tenureCode->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_tenureCode->HrefValue = "";
			$tbl_profile->facultyprofile_tenureCode->TooltipValue = "";

			// facultyprofile_leaveCode
			$tbl_profile->facultyprofile_leaveCode->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_leaveCode->HrefValue = "";
			$tbl_profile->facultyprofile_leaveCode->TooltipValue = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->HrefValue = "";
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->TooltipValue = "";

			// facultyprofile_totalHrs_basic
			$tbl_profile->facultyprofile_totalHrs_basic->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_basic->HrefValue = "";
			$tbl_profile->facultyprofile_totalHrs_basic->TooltipValue = "";

			// facultyprofile_totalSCH_basic
			$tbl_profile->facultyprofile_totalSCH_basic->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_basic->HrefValue = "";
			$tbl_profile->facultyprofile_totalSCH_basic->TooltipValue = "";

			// facultyprofile_totalCr_ugrad
			$tbl_profile->facultyprofile_totalCr_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalCr_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_totalCr_ugrad->TooltipValue = "";

			// facultyprofile_totalHrs_ugrad
			$tbl_profile->facultyprofile_totalHrs_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_totalHrs_ugrad->TooltipValue = "";

			// facultyprofile_totalSCH_ugrad
			$tbl_profile->facultyprofile_totalSCH_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_totalSCH_ugrad->TooltipValue = "";

			// facultyprofile_totalCr_graduate
			$tbl_profile->facultyprofile_totalCr_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalCr_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_totalCr_graduate->TooltipValue = "";

			// facultyprofile_totalHrs_graduate
			$tbl_profile->facultyprofile_totalHrs_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_totalHrs_graduate->TooltipValue = "";

			// facultyprofile_totalSCH_graduate
			$tbl_profile->facultyprofile_totalSCH_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_totalSCH_graduate->TooltipValue = "";

			// facultyprofile_total_nonTeachingLoad
			$tbl_profile->facultyprofile_total_nonTeachingLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_total_nonTeachingLoad->HrefValue = "";
			$tbl_profile->facultyprofile_total_nonTeachingLoad->TooltipValue = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->HrefValue = "";
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->TooltipValue = "";
		} elseif ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add row

			// faculty_name
			$tbl_profile->faculty_name->EditCustomAttributes = "";
			$tbl_profile->faculty_name->EditValue = up_HtmlEncode($tbl_profile->faculty_name->CurrentValue);

			// facultyGroup_CHEDCode
			$tbl_profile->facultyGroup_CHEDCode->EditCustomAttributes = "";

			// facultyRank_ID
			$tbl_profile->facultyRank_ID->EditCustomAttributes = "";

			// facultyprofile_tenureCode
			$tbl_profile->facultyprofile_tenureCode->EditCustomAttributes = "";

			// facultyprofile_leaveCode
			$tbl_profile->facultyprofile_leaveCode->EditCustomAttributes = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditCustomAttributes = "";

			// facultyprofile_totalHrs_basic
			$tbl_profile->facultyprofile_totalHrs_basic->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_basic->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_basic->CurrentValue);

			// facultyprofile_totalSCH_basic
			$tbl_profile->facultyprofile_totalSCH_basic->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_basic->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_basic->CurrentValue);

			// facultyprofile_totalCr_ugrad
			$tbl_profile->facultyprofile_totalCr_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalCr_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue);

			// facultyprofile_totalHrs_ugrad
			$tbl_profile->facultyprofile_totalHrs_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue);

			// facultyprofile_totalSCH_ugrad
			$tbl_profile->facultyprofile_totalSCH_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue);

			// facultyprofile_totalCr_graduate
			$tbl_profile->facultyprofile_totalCr_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalCr_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalCr_graduate->CurrentValue);

			// facultyprofile_totalHrs_graduate
			$tbl_profile->facultyprofile_totalHrs_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue);

			// facultyprofile_totalSCH_graduate
			$tbl_profile->facultyprofile_totalSCH_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue);

			// facultyprofile_total_nonTeachingLoad
			$tbl_profile->facultyprofile_total_nonTeachingLoad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_total_nonTeachingLoad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue);

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue);

			// Edit refer script
			// faculty_name

			$tbl_profile->faculty_name->HrefValue = "";

			// facultyGroup_CHEDCode
			$tbl_profile->facultyGroup_CHEDCode->HrefValue = "";

			// facultyRank_ID
			$tbl_profile->facultyRank_ID->HrefValue = "";

			// facultyprofile_tenureCode
			$tbl_profile->facultyprofile_tenureCode->HrefValue = "";

			// facultyprofile_leaveCode
			$tbl_profile->facultyprofile_leaveCode->HrefValue = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->HrefValue = "";

			// facultyprofile_totalHrs_basic
			$tbl_profile->facultyprofile_totalHrs_basic->HrefValue = "";

			// facultyprofile_totalSCH_basic
			$tbl_profile->facultyprofile_totalSCH_basic->HrefValue = "";

			// facultyprofile_totalCr_ugrad
			$tbl_profile->facultyprofile_totalCr_ugrad->HrefValue = "";

			// facultyprofile_totalHrs_ugrad
			$tbl_profile->facultyprofile_totalHrs_ugrad->HrefValue = "";

			// facultyprofile_totalSCH_ugrad
			$tbl_profile->facultyprofile_totalSCH_ugrad->HrefValue = "";

			// facultyprofile_totalCr_graduate
			$tbl_profile->facultyprofile_totalCr_graduate->HrefValue = "";

			// facultyprofile_totalHrs_graduate
			$tbl_profile->facultyprofile_totalHrs_graduate->HrefValue = "";

			// facultyprofile_totalSCH_graduate
			$tbl_profile->facultyprofile_totalSCH_graduate->HrefValue = "";

			// facultyprofile_total_nonTeachingLoad
			$tbl_profile->facultyprofile_total_nonTeachingLoad->HrefValue = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->HrefValue = "";
		} elseif ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// faculty_name
			$tbl_profile->faculty_name->EditCustomAttributes = "";
			$tbl_profile->faculty_name->EditValue = up_HtmlEncode($tbl_profile->faculty_name->CurrentValue);

			// facultyGroup_CHEDCode
			$tbl_profile->facultyGroup_CHEDCode->EditCustomAttributes = "";

			// facultyRank_ID
			$tbl_profile->facultyRank_ID->EditCustomAttributes = "";

			// facultyprofile_tenureCode
			$tbl_profile->facultyprofile_tenureCode->EditCustomAttributes = "";

			// facultyprofile_leaveCode
			$tbl_profile->facultyprofile_leaveCode->EditCustomAttributes = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditCustomAttributes = "";

			// facultyprofile_totalHrs_basic
			$tbl_profile->facultyprofile_totalHrs_basic->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_basic->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_basic->CurrentValue);

			// facultyprofile_totalSCH_basic
			$tbl_profile->facultyprofile_totalSCH_basic->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_basic->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_basic->CurrentValue);

			// facultyprofile_totalCr_ugrad
			$tbl_profile->facultyprofile_totalCr_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalCr_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue);

			// facultyprofile_totalHrs_ugrad
			$tbl_profile->facultyprofile_totalHrs_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue);

			// facultyprofile_totalSCH_ugrad
			$tbl_profile->facultyprofile_totalSCH_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue);

			// facultyprofile_totalCr_graduate
			$tbl_profile->facultyprofile_totalCr_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalCr_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalCr_graduate->CurrentValue);

			// facultyprofile_totalHrs_graduate
			$tbl_profile->facultyprofile_totalHrs_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue);

			// facultyprofile_totalSCH_graduate
			$tbl_profile->facultyprofile_totalSCH_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue);

			// facultyprofile_total_nonTeachingLoad
			$tbl_profile->facultyprofile_total_nonTeachingLoad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_total_nonTeachingLoad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue);

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue);

			// Edit refer script
			// faculty_name

			$tbl_profile->faculty_name->HrefValue = "";

			// facultyGroup_CHEDCode
			$tbl_profile->facultyGroup_CHEDCode->HrefValue = "";

			// facultyRank_ID
			$tbl_profile->facultyRank_ID->HrefValue = "";

			// facultyprofile_tenureCode
			$tbl_profile->facultyprofile_tenureCode->HrefValue = "";

			// facultyprofile_leaveCode
			$tbl_profile->facultyprofile_leaveCode->HrefValue = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->HrefValue = "";

			// facultyprofile_totalHrs_basic
			$tbl_profile->facultyprofile_totalHrs_basic->HrefValue = "";

			// facultyprofile_totalSCH_basic
			$tbl_profile->facultyprofile_totalSCH_basic->HrefValue = "";

			// facultyprofile_totalCr_ugrad
			$tbl_profile->facultyprofile_totalCr_ugrad->HrefValue = "";

			// facultyprofile_totalHrs_ugrad
			$tbl_profile->facultyprofile_totalHrs_ugrad->HrefValue = "";

			// facultyprofile_totalSCH_ugrad
			$tbl_profile->facultyprofile_totalSCH_ugrad->HrefValue = "";

			// facultyprofile_totalCr_graduate
			$tbl_profile->facultyprofile_totalCr_graduate->HrefValue = "";

			// facultyprofile_totalHrs_graduate
			$tbl_profile->facultyprofile_totalHrs_graduate->HrefValue = "";

			// facultyprofile_totalSCH_graduate
			$tbl_profile->facultyprofile_totalSCH_graduate->HrefValue = "";

			// facultyprofile_total_nonTeachingLoad
			$tbl_profile->facultyprofile_total_nonTeachingLoad->HrefValue = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->HrefValue = "";
		}
		if ($tbl_profile->RowType == UP_ROWTYPE_ADD ||
			$tbl_profile->RowType == UP_ROWTYPE_EDIT ||
			$tbl_profile->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_profile->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_profile->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_profile->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_profile;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($tbl_profile->faculty_name->FormValue) && $tbl_profile->faculty_name->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_profile->faculty_name->FldCaption());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_totalHrs_basic->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_totalHrs_basic->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_totalSCH_basic->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_totalSCH_basic->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_totalCr_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_totalCr_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_totalHrs_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_totalHrs_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_totalSCH_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_totalSCH_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_totalCr_graduate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_totalCr_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_totalHrs_graduate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_totalHrs_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_totalSCH_graduate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_totalSCH_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_total_nonTeachingLoad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_total_nonTeachingLoad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->FldErrMsg());
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
		global $conn, $Language, $Security, $tbl_profile;
		$DeleteRows = TRUE;
		$sSql = $tbl_profile->SQL();
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
				$DeleteRows = $tbl_profile->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['facultyprofile_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_profile->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_profile->CancelMessage <> "") {
				$this->setFailureMessage($tbl_profile->CancelMessage);
				$tbl_profile->CancelMessage = "";
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
				$tbl_profile->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $tbl_profile;
		$sFilter = $tbl_profile->KeyFilter();
		$tbl_profile->CurrentFilter = $sFilter;
		$sSql = $tbl_profile->SQL();
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
			$tbl_profile->faculty_name->SetDbValueDef($rsnew, $tbl_profile->faculty_name->CurrentValue, NULL, $tbl_profile->faculty_name->ReadOnly);

			// facultyGroup_CHEDCode
			$tbl_profile->facultyGroup_CHEDCode->SetDbValueDef($rsnew, $tbl_profile->facultyGroup_CHEDCode->CurrentValue, NULL, $tbl_profile->facultyGroup_CHEDCode->ReadOnly);

			// facultyRank_ID
			$tbl_profile->facultyRank_ID->SetDbValueDef($rsnew, $tbl_profile->facultyRank_ID->CurrentValue, NULL, $tbl_profile->facultyRank_ID->ReadOnly);

			// facultyprofile_tenureCode
			$tbl_profile->facultyprofile_tenureCode->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_tenureCode->CurrentValue, NULL, $tbl_profile->facultyprofile_tenureCode->ReadOnly);

			// facultyprofile_leaveCode
			$tbl_profile->facultyprofile_leaveCode->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_leaveCode->CurrentValue, NULL, $tbl_profile->facultyprofile_leaveCode->ReadOnly);

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue, NULL, $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ReadOnly);

			// facultyprofile_totalHrs_basic
			$tbl_profile->facultyprofile_totalHrs_basic->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalHrs_basic->CurrentValue, NULL, $tbl_profile->facultyprofile_totalHrs_basic->ReadOnly);

			// facultyprofile_totalSCH_basic
			$tbl_profile->facultyprofile_totalSCH_basic->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalSCH_basic->CurrentValue, NULL, $tbl_profile->facultyprofile_totalSCH_basic->ReadOnly);

			// facultyprofile_totalCr_ugrad
			$tbl_profile->facultyprofile_totalCr_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue, NULL, $tbl_profile->facultyprofile_totalCr_ugrad->ReadOnly);

			// facultyprofile_totalHrs_ugrad
			$tbl_profile->facultyprofile_totalHrs_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue, NULL, $tbl_profile->facultyprofile_totalHrs_ugrad->ReadOnly);

			// facultyprofile_totalSCH_ugrad
			$tbl_profile->facultyprofile_totalSCH_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue, NULL, $tbl_profile->facultyprofile_totalSCH_ugrad->ReadOnly);

			// facultyprofile_totalCr_graduate
			$tbl_profile->facultyprofile_totalCr_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalCr_graduate->CurrentValue, NULL, $tbl_profile->facultyprofile_totalCr_graduate->ReadOnly);

			// facultyprofile_totalHrs_graduate
			$tbl_profile->facultyprofile_totalHrs_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue, NULL, $tbl_profile->facultyprofile_totalHrs_graduate->ReadOnly);

			// facultyprofile_totalSCH_graduate
			$tbl_profile->facultyprofile_totalSCH_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue, NULL, $tbl_profile->facultyprofile_totalSCH_graduate->ReadOnly);

			// facultyprofile_total_nonTeachingLoad
			$tbl_profile->facultyprofile_total_nonTeachingLoad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue, NULL, $tbl_profile->facultyprofile_total_nonTeachingLoad->ReadOnly);

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue, NULL, $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $tbl_profile->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($tbl_profile->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_profile->CancelMessage <> "") {
					$this->setFailureMessage($tbl_profile->CancelMessage);
					$tbl_profile->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_profile->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $tbl_profile;

		// Check if valid key values for master user
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $tbl_profile->SqlMasterFilter_tbl_collectionperiod();
			if (strval($tbl_profile->collectionPeriod_ID->CurrentValue) <> "" &&
				$tbl_profile->getCurrentMasterTable() == "tbl_collectionperiod") {
				$sFilter = str_replace("@collectionPeriod_ID@", up_AdjustSql($tbl_profile->collectionPeriod_ID->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if ($sFilter <> "") {
				$rsmaster = $GLOBALS["tbl_collectionperiod"]->LoadRs($sFilter);
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
			if ($tbl_profile->getCurrentMasterTable() == "tbl_collectionperiod") {
				$tbl_profile->collectionPeriod_ID->CurrentValue = $tbl_profile->collectionPeriod_ID->getSessionValue();
			}
		$rsnew = array();

		// faculty_name
		$tbl_profile->faculty_name->SetDbValueDef($rsnew, $tbl_profile->faculty_name->CurrentValue, NULL, FALSE);

		// facultyGroup_CHEDCode
		$tbl_profile->facultyGroup_CHEDCode->SetDbValueDef($rsnew, $tbl_profile->facultyGroup_CHEDCode->CurrentValue, NULL, FALSE);

		// facultyRank_ID
		$tbl_profile->facultyRank_ID->SetDbValueDef($rsnew, $tbl_profile->facultyRank_ID->CurrentValue, NULL, FALSE);

		// facultyprofile_tenureCode
		$tbl_profile->facultyprofile_tenureCode->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_tenureCode->CurrentValue, NULL, FALSE);

		// facultyprofile_leaveCode
		$tbl_profile->facultyprofile_leaveCode->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_leaveCode->CurrentValue, NULL, strval($tbl_profile->facultyprofile_leaveCode->CurrentValue) == "");

		// facultyprofile_specificDiscipline_1_primaryTeachingLoad
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue, NULL, FALSE);

		// facultyprofile_totalHrs_basic
		$tbl_profile->facultyprofile_totalHrs_basic->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalHrs_basic->CurrentValue, NULL, strval($tbl_profile->facultyprofile_totalHrs_basic->CurrentValue) == "");

		// facultyprofile_totalSCH_basic
		$tbl_profile->facultyprofile_totalSCH_basic->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalSCH_basic->CurrentValue, NULL, strval($tbl_profile->facultyprofile_totalSCH_basic->CurrentValue) == "");

		// facultyprofile_totalCr_ugrad
		$tbl_profile->facultyprofile_totalCr_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue, NULL, strval($tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue) == "");

		// facultyprofile_totalHrs_ugrad
		$tbl_profile->facultyprofile_totalHrs_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue, NULL, strval($tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue) == "");

		// facultyprofile_totalSCH_ugrad
		$tbl_profile->facultyprofile_totalSCH_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue, NULL, strval($tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue) == "");

		// facultyprofile_totalCr_graduate
		$tbl_profile->facultyprofile_totalCr_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalCr_graduate->CurrentValue, NULL, strval($tbl_profile->facultyprofile_totalCr_graduate->CurrentValue) == "");

		// facultyprofile_totalHrs_graduate
		$tbl_profile->facultyprofile_totalHrs_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue, NULL, strval($tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue) == "");

		// facultyprofile_totalSCH_graduate
		$tbl_profile->facultyprofile_totalSCH_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue, NULL, strval($tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue) == "");

		// facultyprofile_total_nonTeachingLoad
		$tbl_profile->facultyprofile_total_nonTeachingLoad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue, NULL, strval($tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue) == "");

		// facultyprofile_totalWorkloadInCreditUnits_gen
		$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue, NULL, strval($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue) == "");

		// collectionPeriod_ID
		if ($tbl_profile->collectionPeriod_ID->getSessionValue() <> "") {
			$rsnew['collectionPeriod_ID'] = $tbl_profile->collectionPeriod_ID->getSessionValue();
		}

		// unitID
		if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['unitID'] = CurrentUserID();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $tbl_profile->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($tbl_profile->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($tbl_profile->CancelMessage <> "") {
				$this->setFailureMessage($tbl_profile->CancelMessage);
				$tbl_profile->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$tbl_profile->facultyprofile_ID->setDbValue($conn->Insert_ID());
			$rsnew['facultyprofile_ID'] = $tbl_profile->facultyprofile_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$tbl_profile->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $tbl_profile;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($tbl_profile->unitID->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_profile;

		// Hide foreign keys
		$sMasterTblVar = $tbl_profile->getCurrentMasterTable();
		if ($sMasterTblVar == "tbl_collectionperiod") {
			$tbl_profile->collectionPeriod_ID->Visible = FALSE;
			if ($GLOBALS["tbl_collectionperiod"]->EventCancelled) $tbl_profile->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $tbl_profile->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_profile->getDetailFilter(); // Get detail filter
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
		$table = 'tbl_profile';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $tbl_profile;
		$table = 'tbl_profile';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['facultyprofile_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($tbl_profile->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_profile->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($tbl_profile->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
		global $tbl_profile;
		$table = 'tbl_profile';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['facultyprofile_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($tbl_profile->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_profile->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($tbl_profile->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($tbl_profile->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
		global $tbl_profile;
		$table = 'tbl_profile';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['facultyprofile_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $tbl_profile->fields) && $tbl_profile->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_profile->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($tbl_profile->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
