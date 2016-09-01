<?php include_once "tbl_usersinfo.php" ?>
<?php

//
// Page class
//
class cfrm_sam_rep_ta_form_a_0_cu_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'frm_sam_rep_ta_form_a_0_cu';

	// Page object name
	var $PageObjName = 'frm_sam_rep_ta_form_a_0_cu_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_rep_ta_form_a_0_cu;
		if ($frm_sam_rep_ta_form_a_0_cu->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_rep_ta_form_a_0_cu->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_rep_ta_form_a_0_cu;
		if ($frm_sam_rep_ta_form_a_0_cu->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_rep_ta_form_a_0_cu->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_rep_ta_form_a_0_cu->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_rep_ta_form_a_0_cu_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_rep_ta_form_a_0_cu)
		if (!isset($GLOBALS["frm_sam_rep_ta_form_a_0_cu"])) {
			$GLOBALS["frm_sam_rep_ta_form_a_0_cu"] = new cfrm_sam_rep_ta_form_a_0_cu();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_rep_ta_form_a_0_cu"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_rep_ta_form_a_0_cu', TRUE);

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
		global $frm_sam_rep_ta_form_a_0_cu;

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
			$frm_sam_rep_ta_form_a_0_cu->GridAddRowCount = $gridaddcnt;

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
		global $frm_sam_rep_ta_form_a_0_cu;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_sam_rep_ta_form_a_0_cu;

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
			if ($frm_sam_rep_ta_form_a_0_cu->Export <> "" ||
				$frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridadd" ||
				$frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($frm_sam_rep_ta_form_a_0_cu->AllowAddDeleteRow) {
				if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridadd" ||
					$frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($frm_sam_rep_ta_form_a_0_cu->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_sam_rep_ta_form_a_0_cu->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $frm_sam_rep_ta_form_a_0_cu->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_sam_rep_ta_form_a_0_cu->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_sam_rep_ta_form_a_0_cu->getMasterFilter() <> "" && $frm_sam_rep_ta_form_a_0_cu->getCurrentMasterTable() == "frm_sam_rep_ta_form_a_0") {
			global $frm_sam_rep_ta_form_a_0;
			$rsmaster = $frm_sam_rep_ta_form_a_0->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_sam_rep_ta_form_a_0_cu->getReturnUrl()); // Return to caller
			} else {
				$frm_sam_rep_ta_form_a_0->LoadListRowValues($rsmaster);
				$frm_sam_rep_ta_form_a_0->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_sam_rep_ta_form_a_0->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_sam_rep_ta_form_a_0_cu->setSessionWhere($sFilter);
		$frm_sam_rep_ta_form_a_0_cu->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $frm_sam_rep_ta_form_a_0_cu;
		$frm_sam_rep_ta_form_a_0_cu->LastAction = $frm_sam_rep_ta_form_a_0_cu->CurrentAction; // Save last action
		$frm_sam_rep_ta_form_a_0_cu->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $frm_sam_rep_ta_form_a_0_cu;
		$bGridUpdate = TRUE;

		// Get old recordset
		$frm_sam_rep_ta_form_a_0_cu->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $frm_sam_rep_ta_form_a_0_cu->SQL();
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
						$frm_sam_rep_ta_form_a_0_cu->CurrentFilter = $frm_sam_rep_ta_form_a_0_cu->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$frm_sam_rep_ta_form_a_0_cu->SendEmail = FALSE; // Do not send email on update success
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
			$frm_sam_rep_ta_form_a_0_cu->EventCancelled = TRUE; // Set event cancelled
			$frm_sam_rep_ta_form_a_0_cu->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $frm_sam_rep_ta_form_a_0_cu;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $frm_sam_rep_ta_form_a_0_cu->KeyFilter();
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
		global $frm_sam_rep_ta_form_a_0_cu;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 0) {
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $frm_sam_rep_ta_form_a_0_cu;
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
				$frm_sam_rep_ta_form_a_0_cu->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {

					// Add filter for this record
					$sFilter = $frm_sam_rep_ta_form_a_0_cu->KeyFilter();
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
			$frm_sam_rep_ta_form_a_0_cu->CurrentFilter = $sWrkFilter;
			$sSql = $frm_sam_rep_ta_form_a_0_cu->SQL();
			if ($rs = $conn->Execute($sSql)) {
				$rsnew = $rs->GetRows();
				$rs->Close();
			}
			$this->ClearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "") {
				$this->setFailureMessage($Language->Phrase("InsertFailed")); // Set insert failed message
			}
			$frm_sam_rep_ta_form_a_0_cu->EventCancelled = TRUE; // Set event cancelled
			$frm_sam_rep_ta_form_a_0_cu->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $frm_sam_rep_ta_form_a_0_cu, $objForm;
		if ($objForm->HasValue("x_CU_Office") && $objForm->HasValue("o_CU_Office") && $frm_sam_rep_ta_form_a_0_cu->CU_Office->CurrentValue <> $frm_sam_rep_ta_form_a_0_cu->CU_Office->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Participating_Units_Count") && $objForm->HasValue("o_Participating_Units_Count") && $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CurrentValue <> $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Target") && $objForm->HasValue("o_Target") && $frm_sam_rep_ta_form_a_0_cu->Target->CurrentValue <> $frm_sam_rep_ta_form_a_0_cu->Target->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Numerator_28T29") && $objForm->HasValue("o_Numerator_28T29") && $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CurrentValue <> $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Denominator_28T29") && $objForm->HasValue("o_Denominator_28T29") && $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CurrentValue <> $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Accomplishment") && $objForm->HasValue("o_Accomplishment") && $frm_sam_rep_ta_form_a_0_cu->Accomplishment->CurrentValue <> $frm_sam_rep_ta_form_a_0_cu->Accomplishment->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Numerator_28A29") && $objForm->HasValue("o_Numerator_28A29") && $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CurrentValue <> $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Denominator_28A29") && $objForm->HasValue("o_Denominator_28A29") && $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CurrentValue <> $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Supporting_Documents_Count") && $objForm->HasValue("o_Supporting_Documents_Count") && $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CurrentValue <> $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Rating") && $objForm->HasValue("o_Rating") && $frm_sam_rep_ta_form_a_0_cu->Rating->CurrentValue <> $frm_sam_rep_ta_form_a_0_cu->Rating->OldValue)
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
		global $objForm, $frm_sam_rep_ta_form_a_0_cu;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_sam_rep_ta_form_a_0_cu;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_sam_rep_ta_form_a_0_cu->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_sam_rep_ta_form_a_0_cu->CurrentOrderType = @$_GET["ordertype"];
			$frm_sam_rep_ta_form_a_0_cu->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_sam_rep_ta_form_a_0_cu;
		$sOrderBy = $frm_sam_rep_ta_form_a_0_cu->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_sam_rep_ta_form_a_0_cu->SqlOrderBy() <> "") {
				$sOrderBy = $frm_sam_rep_ta_form_a_0_cu->SqlOrderBy();
				$frm_sam_rep_ta_form_a_0_cu->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_sam_rep_ta_form_a_0_cu;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_sam_rep_ta_form_a_0_cu->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_sam_rep_ta_form_a_0_cu->Sequence->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_sam_rep_ta_form_a_0_cu->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_sam_rep_ta_form_a_0_cu->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_sam_rep_ta_form_a_0_cu;

		// "griddelete"
		if ($frm_sam_rep_ta_form_a_0_cu->AllowAddDeleteRow) {
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
		global $Security, $Language, $frm_sam_rep_ta_form_a_0_cu, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD)
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
		if ($frm_sam_rep_ta_form_a_0_cu->AllowAddDeleteRow) {
			if ($frm_sam_rep_ta_form_a_0_cu->CurrentMode == "add" || $frm_sam_rep_ta_form_a_0_cu->CurrentMode == "copy" || $frm_sam_rep_ta_form_a_0_cu->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, frm_sam_rep_ta_form_a_0_cu_grid, " . $this->RowIndex . ");\">" . $Language->Phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($frm_sam_rep_ta_form_a_0_cu->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
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
		global $Security, $Language, $frm_sam_rep_ta_form_a_0_cu;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_sam_rep_ta_form_a_0_cu;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_sam_rep_ta_form_a_0_cu->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_sam_rep_ta_form_a_0_cu->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_sam_rep_ta_form_a_0_cu->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_sam_rep_ta_form_a_0_cu->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_sam_rep_ta_form_a_0_cu->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_sam_rep_ta_form_a_0_cu->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_sam_rep_ta_form_a_0_cu;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_sam_rep_ta_form_a_0_cu;
		$frm_sam_rep_ta_form_a_0_cu->CU_Office->CurrentValue = NULL;
		$frm_sam_rep_ta_form_a_0_cu->CU_Office->OldValue = $frm_sam_rep_ta_form_a_0_cu->CU_Office->CurrentValue;
		$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CurrentValue = 0;
		$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->OldValue = $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CurrentValue;
		$frm_sam_rep_ta_form_a_0_cu->Target->CurrentValue = NULL;
		$frm_sam_rep_ta_form_a_0_cu->Target->OldValue = $frm_sam_rep_ta_form_a_0_cu->Target->CurrentValue;
		$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CurrentValue = NULL;
		$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->OldValue = $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CurrentValue;
		$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CurrentValue = NULL;
		$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->OldValue = $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CurrentValue;
		$frm_sam_rep_ta_form_a_0_cu->Accomplishment->CurrentValue = NULL;
		$frm_sam_rep_ta_form_a_0_cu->Accomplishment->OldValue = $frm_sam_rep_ta_form_a_0_cu->Accomplishment->CurrentValue;
		$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CurrentValue = NULL;
		$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->OldValue = $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CurrentValue;
		$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CurrentValue = NULL;
		$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->OldValue = $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CurrentValue;
		$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CurrentValue = NULL;
		$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->OldValue = $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CurrentValue;
		$frm_sam_rep_ta_form_a_0_cu->Rating->CurrentValue = NULL;
		$frm_sam_rep_ta_form_a_0_cu->Rating->OldValue = $frm_sam_rep_ta_form_a_0_cu->Rating->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_sam_rep_ta_form_a_0_cu;
		if (!$frm_sam_rep_ta_form_a_0_cu->CU_Office->FldIsDetailKey) {
			$frm_sam_rep_ta_form_a_0_cu->CU_Office->setFormValue($objForm->GetValue("x_CU_Office"));
		}
		$frm_sam_rep_ta_form_a_0_cu->CU_Office->setOldValue($objForm->GetValue("o_CU_Office"));
		if (!$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FldIsDetailKey) {
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->setFormValue($objForm->GetValue("x_Participating_Units_Count"));
		}
		$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->setOldValue($objForm->GetValue("o_Participating_Units_Count"));
		if (!$frm_sam_rep_ta_form_a_0_cu->Target->FldIsDetailKey) {
			$frm_sam_rep_ta_form_a_0_cu->Target->setFormValue($objForm->GetValue("x_Target"));
		}
		$frm_sam_rep_ta_form_a_0_cu->Target->setOldValue($objForm->GetValue("o_Target"));
		if (!$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->FldIsDetailKey) {
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->setFormValue($objForm->GetValue("x_Numerator_28T29"));
		}
		$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->setOldValue($objForm->GetValue("o_Numerator_28T29"));
		if (!$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->FldIsDetailKey) {
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->setFormValue($objForm->GetValue("x_Denominator_28T29"));
		}
		$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->setOldValue($objForm->GetValue("o_Denominator_28T29"));
		if (!$frm_sam_rep_ta_form_a_0_cu->Accomplishment->FldIsDetailKey) {
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->setFormValue($objForm->GetValue("x_Accomplishment"));
		}
		$frm_sam_rep_ta_form_a_0_cu->Accomplishment->setOldValue($objForm->GetValue("o_Accomplishment"));
		if (!$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->FldIsDetailKey) {
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->setFormValue($objForm->GetValue("x_Numerator_28A29"));
		}
		$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->setOldValue($objForm->GetValue("o_Numerator_28A29"));
		if (!$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->FldIsDetailKey) {
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->setFormValue($objForm->GetValue("x_Denominator_28A29"));
		}
		$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->setOldValue($objForm->GetValue("o_Denominator_28A29"));
		if (!$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->FldIsDetailKey) {
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->setFormValue($objForm->GetValue("x_Supporting_Documents_Count"));
		}
		$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->setOldValue($objForm->GetValue("o_Supporting_Documents_Count"));
		if (!$frm_sam_rep_ta_form_a_0_cu->Rating->FldIsDetailKey) {
			$frm_sam_rep_ta_form_a_0_cu->Rating->setFormValue($objForm->GetValue("x_Rating"));
		}
		$frm_sam_rep_ta_form_a_0_cu->Rating->setOldValue($objForm->GetValue("o_Rating"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_sam_rep_ta_form_a_0_cu;
		$frm_sam_rep_ta_form_a_0_cu->CU_Office->CurrentValue = $frm_sam_rep_ta_form_a_0_cu->CU_Office->FormValue;
		$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CurrentValue = $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FormValue;
		$frm_sam_rep_ta_form_a_0_cu->Target->CurrentValue = $frm_sam_rep_ta_form_a_0_cu->Target->FormValue;
		$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CurrentValue = $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->FormValue;
		$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CurrentValue = $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->FormValue;
		$frm_sam_rep_ta_form_a_0_cu->Accomplishment->CurrentValue = $frm_sam_rep_ta_form_a_0_cu->Accomplishment->FormValue;
		$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CurrentValue = $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->FormValue;
		$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CurrentValue = $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->FormValue;
		$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CurrentValue = $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->FormValue;
		$frm_sam_rep_ta_form_a_0_cu->Rating->CurrentValue = $frm_sam_rep_ta_form_a_0_cu->Rating->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_sam_rep_ta_form_a_0_cu;

		// Call Recordset Selecting event
		$frm_sam_rep_ta_form_a_0_cu->Recordset_Selecting($frm_sam_rep_ta_form_a_0_cu->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_sam_rep_ta_form_a_0_cu->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_sam_rep_ta_form_a_0_cu->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_rep_ta_form_a_0_cu;
		$sFilter = $frm_sam_rep_ta_form_a_0_cu->KeyFilter();

		// Call Row Selecting event
		$frm_sam_rep_ta_form_a_0_cu->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_rep_ta_form_a_0_cu->CurrentFilter = $sFilter;
		$sSql = $frm_sam_rep_ta_form_a_0_cu->SQL();
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
		global $conn, $frm_sam_rep_ta_form_a_0_cu;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_rep_ta_form_a_0_cu->Row_Selected($row);
		$frm_sam_rep_ta_form_a_0_cu->id->setDbValue($rs->fields('id'));
		$frm_sam_rep_ta_form_a_0_cu->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_sam_rep_ta_form_a_0_cu->CU_Office->setDbValue($rs->fields('CU Office'));
		$frm_sam_rep_ta_form_a_0_cu->Sequence->setDbValue($rs->fields('Sequence'));
		$frm_sam_rep_ta_form_a_0_cu->MFO->setDbValue($rs->fields('MFO'));
		$frm_sam_rep_ta_form_a_0_cu->Question->setDbValue($rs->fields('Question'));
		$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->setDbValue($rs->fields('Participating Units Count'));
		$frm_sam_rep_ta_form_a_0_cu->Target->setDbValue($rs->fields('Target'));
		$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->setDbValue($rs->fields('Numerator (T)'));
		$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->setDbValue($rs->fields('Denominator (T)'));
		$frm_sam_rep_ta_form_a_0_cu->Accomplishment->setDbValue($rs->fields('Accomplishment'));
		$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->setDbValue($rs->fields('Numerator (A)'));
		$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->setDbValue($rs->fields('Denominator (A)'));
		$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->setDbValue($rs->fields('Supporting Documents Count'));
		$frm_sam_rep_ta_form_a_0_cu->Rating->setDbValue($rs->fields('Rating'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_sam_rep_ta_form_a_0_cu;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 0) {
		}

		// Load old recordset
		if ($bValidKey) {
			$frm_sam_rep_ta_form_a_0_cu->CurrentFilter = $frm_sam_rep_ta_form_a_0_cu->KeyFilter();
			$sSql = $frm_sam_rep_ta_form_a_0_cu->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_rep_ta_form_a_0_cu;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_sam_rep_ta_form_a_0_cu->Row_Rendering();

		// Common render codes for all row types
		// id
		// focal_person_id
		// CU Office

		$frm_sam_rep_ta_form_a_0_cu->CU_Office->CellCssStyle = "white-space: nowrap;";

		// Sequence
		// MFO
		// Question

		$frm_sam_rep_ta_form_a_0_cu->Question->CellCssStyle = "white-space: nowrap;";

		// Participating Units Count
		// Target
		// Numerator (T)
		// Denominator (T)
		// Accomplishment
		// Numerator (A)
		// Denominator (A)
		// Supporting Documents Count
		// Rating

		if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_VIEW) { // View row

			// CU Office
			$frm_sam_rep_ta_form_a_0_cu->CU_Office->ViewValue = $frm_sam_rep_ta_form_a_0_cu->CU_Office->CurrentValue;
			$frm_sam_rep_ta_form_a_0_cu->CU_Office->ViewCustomAttributes = "";

			// Participating Units Count
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->ViewValue = $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CurrentValue;
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->ViewCustomAttributes = "";

			// Target
			$frm_sam_rep_ta_form_a_0_cu->Target->ViewValue = $frm_sam_rep_ta_form_a_0_cu->Target->CurrentValue;
			$frm_sam_rep_ta_form_a_0_cu->Target->CssStyle = "font-weight:bold;text-align:right;";
			$frm_sam_rep_ta_form_a_0_cu->Target->ViewCustomAttributes = "";

			// Numerator (T)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->ViewValue = $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CurrentValue;
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CssStyle = "text-align:right;";
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->ViewCustomAttributes = "";

			// Denominator (T)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->ViewValue = $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CurrentValue;
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CssStyle = "text-align:right;";
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->ViewCustomAttributes = "";

			// Accomplishment
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->ViewValue = $frm_sam_rep_ta_form_a_0_cu->Accomplishment->CurrentValue;
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->CssStyle = "font-weight:bold;text-align:right;";
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->ViewCustomAttributes = "";

			// Numerator (A)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->ViewValue = $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CurrentValue;
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CssStyle = "text-align:right;";
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->ViewCustomAttributes = "";

			// Denominator (A)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->ViewValue = $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CurrentValue;
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CssStyle = "text-align:right;";
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->ViewCustomAttributes = "";

			// Supporting Documents Count
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->ViewValue = $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CurrentValue;
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CssStyle = "font-weight:bold;text-align:right;";
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->ViewCustomAttributes = "";

			// Rating
			$frm_sam_rep_ta_form_a_0_cu->Rating->ViewValue = $frm_sam_rep_ta_form_a_0_cu->Rating->CurrentValue;
			$frm_sam_rep_ta_form_a_0_cu->Rating->CssStyle = "font-weight:bold;text-align:right;";
			$frm_sam_rep_ta_form_a_0_cu->Rating->ViewCustomAttributes = "";

			// CU Office
			$frm_sam_rep_ta_form_a_0_cu->CU_Office->LinkCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->CU_Office->HrefValue = "";
			$frm_sam_rep_ta_form_a_0_cu->CU_Office->TooltipValue = "";

			// Participating Units Count
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->LinkCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->HrefValue = "";
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->TooltipValue = "";

			// Target
			$frm_sam_rep_ta_form_a_0_cu->Target->LinkCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Target->HrefValue = "";
			$frm_sam_rep_ta_form_a_0_cu->Target->TooltipValue = "";

			// Numerator (T)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->LinkCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->HrefValue = "";
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->TooltipValue = "";

			// Denominator (T)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->LinkCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->HrefValue = "";
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->TooltipValue = "";

			// Accomplishment
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->LinkCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->HrefValue = "";
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->TooltipValue = "";

			// Numerator (A)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->LinkCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->HrefValue = "";
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->TooltipValue = "";

			// Denominator (A)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->LinkCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->HrefValue = "";
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->TooltipValue = "";

			// Supporting Documents Count
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->LinkCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->HrefValue = "";
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->TooltipValue = "";

			// Rating
			$frm_sam_rep_ta_form_a_0_cu->Rating->LinkCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Rating->HrefValue = "";
			$frm_sam_rep_ta_form_a_0_cu->Rating->TooltipValue = "";
		} elseif ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) { // Add row

			// CU Office
			$frm_sam_rep_ta_form_a_0_cu->CU_Office->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->CU_Office->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->CU_Office->CurrentValue);

			// Participating Units Count
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CurrentValue);

			// Target
			$frm_sam_rep_ta_form_a_0_cu->Target->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Target->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Target->CurrentValue);

			// Numerator (T)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CurrentValue);

			// Denominator (T)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CurrentValue);

			// Accomplishment
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Accomplishment->CurrentValue);

			// Numerator (A)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CurrentValue);

			// Denominator (A)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CurrentValue);

			// Supporting Documents Count
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CurrentValue);

			// Rating
			$frm_sam_rep_ta_form_a_0_cu->Rating->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Rating->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Rating->CurrentValue);

			// Edit refer script
			// CU Office

			$frm_sam_rep_ta_form_a_0_cu->CU_Office->HrefValue = "";

			// Participating Units Count
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->HrefValue = "";

			// Target
			$frm_sam_rep_ta_form_a_0_cu->Target->HrefValue = "";

			// Numerator (T)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->HrefValue = "";

			// Denominator (T)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->HrefValue = "";

			// Accomplishment
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->HrefValue = "";

			// Numerator (A)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->HrefValue = "";

			// Denominator (A)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->HrefValue = "";

			// Supporting Documents Count
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->HrefValue = "";

			// Rating
			$frm_sam_rep_ta_form_a_0_cu->Rating->HrefValue = "";
		} elseif ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// CU Office
			$frm_sam_rep_ta_form_a_0_cu->CU_Office->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->CU_Office->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->CU_Office->CurrentValue);

			// Participating Units Count
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CurrentValue);

			// Target
			$frm_sam_rep_ta_form_a_0_cu->Target->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Target->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Target->CurrentValue);

			// Numerator (T)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CurrentValue);

			// Denominator (T)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CurrentValue);

			// Accomplishment
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Accomplishment->CurrentValue);

			// Numerator (A)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CurrentValue);

			// Denominator (A)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CurrentValue);

			// Supporting Documents Count
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CurrentValue);

			// Rating
			$frm_sam_rep_ta_form_a_0_cu->Rating->EditCustomAttributes = "";
			$frm_sam_rep_ta_form_a_0_cu->Rating->EditValue = up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Rating->CurrentValue);

			// Edit refer script
			// CU Office

			$frm_sam_rep_ta_form_a_0_cu->CU_Office->HrefValue = "";

			// Participating Units Count
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->HrefValue = "";

			// Target
			$frm_sam_rep_ta_form_a_0_cu->Target->HrefValue = "";

			// Numerator (T)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->HrefValue = "";

			// Denominator (T)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->HrefValue = "";

			// Accomplishment
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->HrefValue = "";

			// Numerator (A)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->HrefValue = "";

			// Denominator (A)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->HrefValue = "";

			// Supporting Documents Count
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->HrefValue = "";

			// Rating
			$frm_sam_rep_ta_form_a_0_cu->Rating->HrefValue = "";
		}
		if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD ||
			$frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT ||
			$frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_sam_rep_ta_form_a_0_cu->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_sam_rep_ta_form_a_0_cu->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_rep_ta_form_a_0_cu->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_sam_rep_ta_form_a_0_cu;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FormValue) && $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FldCaption());
		}
		if (!up_CheckInteger($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FldErrMsg());
		}
		if (!up_CheckNumber($frm_sam_rep_ta_form_a_0_cu->Target->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_rep_ta_form_a_0_cu->Target->FldErrMsg());
		}
		if (!up_CheckNumber($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->FldErrMsg());
		}
		if (!up_CheckNumber($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->FldErrMsg());
		}
		if (!up_CheckNumber($frm_sam_rep_ta_form_a_0_cu->Accomplishment->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_rep_ta_form_a_0_cu->Accomplishment->FldErrMsg());
		}
		if (!up_CheckNumber($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->FldErrMsg());
		}
		if (!up_CheckNumber($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->FldErrMsg());
		}
		if (!up_CheckNumber($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->FldErrMsg());
		}
		if (!up_CheckNumber($frm_sam_rep_ta_form_a_0_cu->Rating->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_rep_ta_form_a_0_cu->Rating->FldErrMsg());
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
		global $conn, $Language, $Security, $frm_sam_rep_ta_form_a_0_cu;
		$DeleteRows = TRUE;
		$sSql = $frm_sam_rep_ta_form_a_0_cu->SQL();
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
				$DeleteRows = $frm_sam_rep_ta_form_a_0_cu->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_sam_rep_ta_form_a_0_cu->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_sam_rep_ta_form_a_0_cu->CancelMessage <> "") {
				$this->setFailureMessage($frm_sam_rep_ta_form_a_0_cu->CancelMessage);
				$frm_sam_rep_ta_form_a_0_cu->CancelMessage = "";
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
				$frm_sam_rep_ta_form_a_0_cu->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $frm_sam_rep_ta_form_a_0_cu;
		$sFilter = $frm_sam_rep_ta_form_a_0_cu->KeyFilter();
		$frm_sam_rep_ta_form_a_0_cu->CurrentFilter = $sFilter;
		$sSql = $frm_sam_rep_ta_form_a_0_cu->SQL();
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

			// CU Office
			$frm_sam_rep_ta_form_a_0_cu->CU_Office->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->CU_Office->CurrentValue, NULL, $frm_sam_rep_ta_form_a_0_cu->CU_Office->ReadOnly);

			// Participating Units Count
			$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CurrentValue, 0, $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->ReadOnly);

			// Target
			$frm_sam_rep_ta_form_a_0_cu->Target->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Target->CurrentValue, NULL, $frm_sam_rep_ta_form_a_0_cu->Target->ReadOnly);

			// Numerator (T)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CurrentValue, NULL, $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->ReadOnly);

			// Denominator (T)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CurrentValue, NULL, $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->ReadOnly);

			// Accomplishment
			$frm_sam_rep_ta_form_a_0_cu->Accomplishment->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Accomplishment->CurrentValue, NULL, $frm_sam_rep_ta_form_a_0_cu->Accomplishment->ReadOnly);

			// Numerator (A)
			$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CurrentValue, NULL, $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->ReadOnly);

			// Denominator (A)
			$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CurrentValue, NULL, $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->ReadOnly);

			// Supporting Documents Count
			$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CurrentValue, NULL, $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->ReadOnly);

			// Rating
			$frm_sam_rep_ta_form_a_0_cu->Rating->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Rating->CurrentValue, NULL, $frm_sam_rep_ta_form_a_0_cu->Rating->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_sam_rep_ta_form_a_0_cu->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_sam_rep_ta_form_a_0_cu->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_sam_rep_ta_form_a_0_cu->CancelMessage <> "") {
					$this->setFailureMessage($frm_sam_rep_ta_form_a_0_cu->CancelMessage);
					$frm_sam_rep_ta_form_a_0_cu->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_sam_rep_ta_form_a_0_cu->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $frm_sam_rep_ta_form_a_0_cu;

		// Set up foreign key field value from Session
			if ($frm_sam_rep_ta_form_a_0_cu->getCurrentMasterTable() == "frm_sam_rep_ta_form_a_0") {
				$frm_sam_rep_ta_form_a_0_cu->Sequence->CurrentValue = $frm_sam_rep_ta_form_a_0_cu->Sequence->getSessionValue();
			}
		$rsnew = array();

		// CU Office
		$frm_sam_rep_ta_form_a_0_cu->CU_Office->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->CU_Office->CurrentValue, NULL, FALSE);

		// Participating Units Count
		$frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CurrentValue, 0, strval($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CurrentValue) == "");

		// Target
		$frm_sam_rep_ta_form_a_0_cu->Target->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Target->CurrentValue, NULL, FALSE);

		// Numerator (T)
		$frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CurrentValue, NULL, FALSE);

		// Denominator (T)
		$frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CurrentValue, NULL, FALSE);

		// Accomplishment
		$frm_sam_rep_ta_form_a_0_cu->Accomplishment->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Accomplishment->CurrentValue, NULL, FALSE);

		// Numerator (A)
		$frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CurrentValue, NULL, FALSE);

		// Denominator (A)
		$frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CurrentValue, NULL, FALSE);

		// Supporting Documents Count
		$frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CurrentValue, NULL, FALSE);

		// Rating
		$frm_sam_rep_ta_form_a_0_cu->Rating->SetDbValueDef($rsnew, $frm_sam_rep_ta_form_a_0_cu->Rating->CurrentValue, NULL, FALSE);

		// Sequence
		if ($frm_sam_rep_ta_form_a_0_cu->Sequence->getSessionValue() <> "") {
			$rsnew['Sequence'] = $frm_sam_rep_ta_form_a_0_cu->Sequence->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_sam_rep_ta_form_a_0_cu->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_sam_rep_ta_form_a_0_cu->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_sam_rep_ta_form_a_0_cu->CancelMessage <> "") {
				$this->setFailureMessage($frm_sam_rep_ta_form_a_0_cu->CancelMessage);
				$frm_sam_rep_ta_form_a_0_cu->CancelMessage = "";
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
			$frm_sam_rep_ta_form_a_0_cu->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_sam_rep_ta_form_a_0_cu;

		// Hide foreign keys
		$sMasterTblVar = $frm_sam_rep_ta_form_a_0_cu->getCurrentMasterTable();
		if ($sMasterTblVar == "frm_sam_rep_ta_form_a_0") {
			$frm_sam_rep_ta_form_a_0_cu->Sequence->Visible = FALSE;
			if ($GLOBALS["frm_sam_rep_ta_form_a_0"]->EventCancelled) $frm_sam_rep_ta_form_a_0_cu->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $frm_sam_rep_ta_form_a_0_cu->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_sam_rep_ta_form_a_0_cu->getDetailFilter(); // Get detail filter
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
