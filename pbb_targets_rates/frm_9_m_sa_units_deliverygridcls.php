<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php

//
// Page class
//
class cfrm_9_m_sa_units_delivery_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'frm_9_m_sa_units_delivery';

	// Page object name
	var $PageObjName = 'frm_9_m_sa_units_delivery_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_9_m_sa_units_delivery;
		if ($frm_9_m_sa_units_delivery->UseTokenInUrl) $PageUrl .= "t=" . $frm_9_m_sa_units_delivery->TableVar . "&"; // Add page token
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
		global $objForm, $frm_9_m_sa_units_delivery;
		if ($frm_9_m_sa_units_delivery->UseTokenInUrl) {
			if ($objForm)
				return ($frm_9_m_sa_units_delivery->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_9_m_sa_units_delivery->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_9_m_sa_units_delivery_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_units_delivery)
		if (!isset($GLOBALS["frm_9_m_sa_units_delivery"])) {
			$GLOBALS["frm_9_m_sa_units_delivery"] = new cfrm_9_m_sa_units_delivery();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["frm_9_m_sa_units_delivery"];
		}

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_9_m_sa_units_delivery', TRUE);

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
		global $frm_9_m_sa_units_delivery;

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
			$frm_9_m_sa_units_delivery->GridAddRowCount = $gridaddcnt;

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
		global $frm_9_m_sa_units_delivery;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_9_m_sa_units_delivery;

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
			if ($frm_9_m_sa_units_delivery->Export <> "" ||
				$frm_9_m_sa_units_delivery->CurrentAction == "gridadd" ||
				$frm_9_m_sa_units_delivery->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($frm_9_m_sa_units_delivery->AllowAddDeleteRow) {
				if ($frm_9_m_sa_units_delivery->CurrentAction == "gridadd" ||
					$frm_9_m_sa_units_delivery->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($frm_9_m_sa_units_delivery->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_9_m_sa_units_delivery->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $frm_9_m_sa_units_delivery->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_9_m_sa_units_delivery->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_9_m_sa_units_delivery->getMasterFilter() <> "" && $frm_9_m_sa_units_delivery->getCurrentMasterTable() == "frm_9_m_sa_units_cu") {
			global $frm_9_m_sa_units_cu;
			$rsmaster = $frm_9_m_sa_units_cu->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_9_m_sa_units_delivery->getReturnUrl()); // Return to caller
			} else {
				$frm_9_m_sa_units_cu->LoadListRowValues($rsmaster);
				$frm_9_m_sa_units_cu->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_9_m_sa_units_cu->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_9_m_sa_units_delivery->setSessionWhere($sFilter);
		$frm_9_m_sa_units_delivery->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $frm_9_m_sa_units_delivery;
		$frm_9_m_sa_units_delivery->LastAction = $frm_9_m_sa_units_delivery->CurrentAction; // Save last action
		$frm_9_m_sa_units_delivery->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $frm_9_m_sa_units_delivery;
		$bGridUpdate = TRUE;

		// Get old recordset
		$frm_9_m_sa_units_delivery->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $frm_9_m_sa_units_delivery->SQL();
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
						$frm_9_m_sa_units_delivery->CurrentFilter = $frm_9_m_sa_units_delivery->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$frm_9_m_sa_units_delivery->SendEmail = FALSE; // Do not send email on update success
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
			$frm_9_m_sa_units_delivery->EventCancelled = TRUE; // Set event cancelled
			$frm_9_m_sa_units_delivery->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $frm_9_m_sa_units_delivery;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $frm_9_m_sa_units_delivery->KeyFilter();
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
		global $frm_9_m_sa_units_delivery;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 0) {
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $frm_9_m_sa_units_delivery;
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
				$frm_9_m_sa_units_delivery->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {

					// Add filter for this record
					$sFilter = $frm_9_m_sa_units_delivery->KeyFilter();
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
			$frm_9_m_sa_units_delivery->CurrentFilter = $sWrkFilter;
			$sSql = $frm_9_m_sa_units_delivery->SQL();
			if ($rs = $conn->Execute($sSql)) {
				$rsnew = $rs->GetRows();
				$rs->Close();
			}
			$this->ClearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "") {
				$this->setFailureMessage($Language->Phrase("InsertFailed")); // Set insert failed message
			}
			$frm_9_m_sa_units_delivery->EventCancelled = TRUE; // Set event cancelled
			$frm_9_m_sa_units_delivery->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $frm_9_m_sa_units_delivery, $objForm;
		if ($objForm->HasValue("x_cu_sequence") && $objForm->HasValue("o_cu_sequence") && $frm_9_m_sa_units_delivery->cu_sequence->CurrentValue <> $frm_9_m_sa_units_delivery->cu_sequence->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_t_cutOffDate_remarks") && $objForm->HasValue("o_t_cutOffDate_remarks") && $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CurrentValue <> $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_CU") && $objForm->HasValue("o_CU") && $frm_9_m_sa_units_delivery->CU->CurrentValue <> $frm_9_m_sa_units_delivery->CU->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_DU_Office_Name") && $objForm->HasValue("o_DU_Office_Name") && $frm_9_m_sa_units_delivery->DU_Office_Name->CurrentValue <> $frm_9_m_sa_units_delivery->DU_Office_Name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_DU_Short_Name") && $objForm->HasValue("o_DU_Short_Name") && $frm_9_m_sa_units_delivery->DU_Short_Name->CurrentValue <> $frm_9_m_sa_units_delivery->DU_Short_Name->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Personnel_Count") && $objForm->HasValue("o_Personnel_Count") && $frm_9_m_sa_units_delivery->Personnel_Count->CurrentValue <> $frm_9_m_sa_units_delivery->Personnel_Count->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_MFO_1") && $objForm->HasValue("o_MFO_1") && $frm_9_m_sa_units_delivery->MFO_1->CurrentValue <> $frm_9_m_sa_units_delivery->MFO_1->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_MFO_2") && $objForm->HasValue("o_MFO_2") && $frm_9_m_sa_units_delivery->MFO_2->CurrentValue <> $frm_9_m_sa_units_delivery->MFO_2->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_MFO_3") && $objForm->HasValue("o_MFO_3") && $frm_9_m_sa_units_delivery->MFO_3->CurrentValue <> $frm_9_m_sa_units_delivery->MFO_3->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_MFO_4") && $objForm->HasValue("o_MFO_4") && $frm_9_m_sa_units_delivery->MFO_4->CurrentValue <> $frm_9_m_sa_units_delivery->MFO_4->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_MFO_5") && $objForm->HasValue("o_MFO_5") && $frm_9_m_sa_units_delivery->MFO_5->CurrentValue <> $frm_9_m_sa_units_delivery->MFO_5->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_STO") && $objForm->HasValue("o_STO") && $frm_9_m_sa_units_delivery->STO->CurrentValue <> $frm_9_m_sa_units_delivery->STO->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_GASS_AB") && $objForm->HasValue("o_GASS_AB") && $frm_9_m_sa_units_delivery->GASS_AB->CurrentValue <> $frm_9_m_sa_units_delivery->GASS_AB->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_GASS_CD") && $objForm->HasValue("o_GASS_CD") && $frm_9_m_sa_units_delivery->GASS_CD->CurrentValue <> $frm_9_m_sa_units_delivery->GASS_CD->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_GASS") && $objForm->HasValue("o_GASS") && $frm_9_m_sa_units_delivery->GASS->CurrentValue <> $frm_9_m_sa_units_delivery->GASS->OldValue)
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
		global $objForm, $frm_9_m_sa_units_delivery;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_9_m_sa_units_delivery;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_9_m_sa_units_delivery->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_9_m_sa_units_delivery->CurrentOrderType = @$_GET["ordertype"];
			$frm_9_m_sa_units_delivery->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_9_m_sa_units_delivery;
		$sOrderBy = $frm_9_m_sa_units_delivery->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_9_m_sa_units_delivery->SqlOrderBy() <> "") {
				$sOrderBy = $frm_9_m_sa_units_delivery->SqlOrderBy();
				$frm_9_m_sa_units_delivery->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_9_m_sa_units_delivery;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_9_m_sa_units_delivery->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_9_m_sa_units_delivery->cu_id->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_9_m_sa_units_delivery->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_9_m_sa_units_delivery;

		// "griddelete"
		if ($frm_9_m_sa_units_delivery->AllowAddDeleteRow) {
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
		global $Security, $Language, $frm_9_m_sa_units_delivery, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($frm_9_m_sa_units_delivery->RowType == UP_ROWTYPE_ADD)
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
		if ($frm_9_m_sa_units_delivery->AllowAddDeleteRow) {
			if ($frm_9_m_sa_units_delivery->CurrentMode == "add" || $frm_9_m_sa_units_delivery->CurrentMode == "copy" || $frm_9_m_sa_units_delivery->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, frm_9_m_sa_units_delivery_grid, " . $this->RowIndex . ");\">" . $Language->Phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($frm_9_m_sa_units_delivery->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
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
		global $Security, $Language, $frm_9_m_sa_units_delivery;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_9_m_sa_units_delivery;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_9_m_sa_units_delivery->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_9_m_sa_units_delivery;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_9_m_sa_units_delivery;
		$frm_9_m_sa_units_delivery->cu_sequence->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->cu_sequence->OldValue = $frm_9_m_sa_units_delivery->cu_sequence->CurrentValue;
		$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->OldValue = $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CurrentValue;
		$frm_9_m_sa_units_delivery->CU->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->CU->OldValue = $frm_9_m_sa_units_delivery->CU->CurrentValue;
		$frm_9_m_sa_units_delivery->DU_Office_Name->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->DU_Office_Name->OldValue = $frm_9_m_sa_units_delivery->DU_Office_Name->CurrentValue;
		$frm_9_m_sa_units_delivery->DU_Short_Name->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->DU_Short_Name->OldValue = $frm_9_m_sa_units_delivery->DU_Short_Name->CurrentValue;
		$frm_9_m_sa_units_delivery->Personnel_Count->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->Personnel_Count->OldValue = $frm_9_m_sa_units_delivery->Personnel_Count->CurrentValue;
		$frm_9_m_sa_units_delivery->MFO_1->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->MFO_1->OldValue = $frm_9_m_sa_units_delivery->MFO_1->CurrentValue;
		$frm_9_m_sa_units_delivery->MFO_2->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->MFO_2->OldValue = $frm_9_m_sa_units_delivery->MFO_2->CurrentValue;
		$frm_9_m_sa_units_delivery->MFO_3->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->MFO_3->OldValue = $frm_9_m_sa_units_delivery->MFO_3->CurrentValue;
		$frm_9_m_sa_units_delivery->MFO_4->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->MFO_4->OldValue = $frm_9_m_sa_units_delivery->MFO_4->CurrentValue;
		$frm_9_m_sa_units_delivery->MFO_5->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->MFO_5->OldValue = $frm_9_m_sa_units_delivery->MFO_5->CurrentValue;
		$frm_9_m_sa_units_delivery->STO->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->STO->OldValue = $frm_9_m_sa_units_delivery->STO->CurrentValue;
		$frm_9_m_sa_units_delivery->GASS_AB->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->GASS_AB->OldValue = $frm_9_m_sa_units_delivery->GASS_AB->CurrentValue;
		$frm_9_m_sa_units_delivery->GASS_CD->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->GASS_CD->OldValue = $frm_9_m_sa_units_delivery->GASS_CD->CurrentValue;
		$frm_9_m_sa_units_delivery->GASS->CurrentValue = NULL;
		$frm_9_m_sa_units_delivery->GASS->OldValue = $frm_9_m_sa_units_delivery->GASS->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_9_m_sa_units_delivery;
		if (!$frm_9_m_sa_units_delivery->cu_sequence->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->cu_sequence->setFormValue($objForm->GetValue("x_cu_sequence"));
		}
		$frm_9_m_sa_units_delivery->cu_sequence->setOldValue($objForm->GetValue("o_cu_sequence"));
		if (!$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->setFormValue($objForm->GetValue("x_t_cutOffDate_remarks"));
		}
		$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->setOldValue($objForm->GetValue("o_t_cutOffDate_remarks"));
		if (!$frm_9_m_sa_units_delivery->CU->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->CU->setFormValue($objForm->GetValue("x_CU"));
		}
		$frm_9_m_sa_units_delivery->CU->setOldValue($objForm->GetValue("o_CU"));
		if (!$frm_9_m_sa_units_delivery->DU_Office_Name->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->DU_Office_Name->setFormValue($objForm->GetValue("x_DU_Office_Name"));
		}
		$frm_9_m_sa_units_delivery->DU_Office_Name->setOldValue($objForm->GetValue("o_DU_Office_Name"));
		if (!$frm_9_m_sa_units_delivery->DU_Short_Name->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->DU_Short_Name->setFormValue($objForm->GetValue("x_DU_Short_Name"));
		}
		$frm_9_m_sa_units_delivery->DU_Short_Name->setOldValue($objForm->GetValue("o_DU_Short_Name"));
		if (!$frm_9_m_sa_units_delivery->Personnel_Count->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->Personnel_Count->setFormValue($objForm->GetValue("x_Personnel_Count"));
		}
		$frm_9_m_sa_units_delivery->Personnel_Count->setOldValue($objForm->GetValue("o_Personnel_Count"));
		if (!$frm_9_m_sa_units_delivery->MFO_1->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->MFO_1->setFormValue($objForm->GetValue("x_MFO_1"));
		}
		$frm_9_m_sa_units_delivery->MFO_1->setOldValue($objForm->GetValue("o_MFO_1"));
		if (!$frm_9_m_sa_units_delivery->MFO_2->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->MFO_2->setFormValue($objForm->GetValue("x_MFO_2"));
		}
		$frm_9_m_sa_units_delivery->MFO_2->setOldValue($objForm->GetValue("o_MFO_2"));
		if (!$frm_9_m_sa_units_delivery->MFO_3->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->MFO_3->setFormValue($objForm->GetValue("x_MFO_3"));
		}
		$frm_9_m_sa_units_delivery->MFO_3->setOldValue($objForm->GetValue("o_MFO_3"));
		if (!$frm_9_m_sa_units_delivery->MFO_4->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->MFO_4->setFormValue($objForm->GetValue("x_MFO_4"));
		}
		$frm_9_m_sa_units_delivery->MFO_4->setOldValue($objForm->GetValue("o_MFO_4"));
		if (!$frm_9_m_sa_units_delivery->MFO_5->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->MFO_5->setFormValue($objForm->GetValue("x_MFO_5"));
		}
		$frm_9_m_sa_units_delivery->MFO_5->setOldValue($objForm->GetValue("o_MFO_5"));
		if (!$frm_9_m_sa_units_delivery->STO->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->STO->setFormValue($objForm->GetValue("x_STO"));
		}
		$frm_9_m_sa_units_delivery->STO->setOldValue($objForm->GetValue("o_STO"));
		if (!$frm_9_m_sa_units_delivery->GASS_AB->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->GASS_AB->setFormValue($objForm->GetValue("x_GASS_AB"));
		}
		$frm_9_m_sa_units_delivery->GASS_AB->setOldValue($objForm->GetValue("o_GASS_AB"));
		if (!$frm_9_m_sa_units_delivery->GASS_CD->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->GASS_CD->setFormValue($objForm->GetValue("x_GASS_CD"));
		}
		$frm_9_m_sa_units_delivery->GASS_CD->setOldValue($objForm->GetValue("o_GASS_CD"));
		if (!$frm_9_m_sa_units_delivery->GASS->FldIsDetailKey) {
			$frm_9_m_sa_units_delivery->GASS->setFormValue($objForm->GetValue("x_GASS"));
		}
		$frm_9_m_sa_units_delivery->GASS->setOldValue($objForm->GetValue("o_GASS"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_9_m_sa_units_delivery;
		$frm_9_m_sa_units_delivery->cu_sequence->CurrentValue = $frm_9_m_sa_units_delivery->cu_sequence->FormValue;
		$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CurrentValue = $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->FormValue;
		$frm_9_m_sa_units_delivery->CU->CurrentValue = $frm_9_m_sa_units_delivery->CU->FormValue;
		$frm_9_m_sa_units_delivery->DU_Office_Name->CurrentValue = $frm_9_m_sa_units_delivery->DU_Office_Name->FormValue;
		$frm_9_m_sa_units_delivery->DU_Short_Name->CurrentValue = $frm_9_m_sa_units_delivery->DU_Short_Name->FormValue;
		$frm_9_m_sa_units_delivery->Personnel_Count->CurrentValue = $frm_9_m_sa_units_delivery->Personnel_Count->FormValue;
		$frm_9_m_sa_units_delivery->MFO_1->CurrentValue = $frm_9_m_sa_units_delivery->MFO_1->FormValue;
		$frm_9_m_sa_units_delivery->MFO_2->CurrentValue = $frm_9_m_sa_units_delivery->MFO_2->FormValue;
		$frm_9_m_sa_units_delivery->MFO_3->CurrentValue = $frm_9_m_sa_units_delivery->MFO_3->FormValue;
		$frm_9_m_sa_units_delivery->MFO_4->CurrentValue = $frm_9_m_sa_units_delivery->MFO_4->FormValue;
		$frm_9_m_sa_units_delivery->MFO_5->CurrentValue = $frm_9_m_sa_units_delivery->MFO_5->FormValue;
		$frm_9_m_sa_units_delivery->STO->CurrentValue = $frm_9_m_sa_units_delivery->STO->FormValue;
		$frm_9_m_sa_units_delivery->GASS_AB->CurrentValue = $frm_9_m_sa_units_delivery->GASS_AB->FormValue;
		$frm_9_m_sa_units_delivery->GASS_CD->CurrentValue = $frm_9_m_sa_units_delivery->GASS_CD->FormValue;
		$frm_9_m_sa_units_delivery->GASS->CurrentValue = $frm_9_m_sa_units_delivery->GASS->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_9_m_sa_units_delivery;

		// Call Recordset Selecting event
		$frm_9_m_sa_units_delivery->Recordset_Selecting($frm_9_m_sa_units_delivery->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_9_m_sa_units_delivery->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_9_m_sa_units_delivery->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_9_m_sa_units_delivery;
		$sFilter = $frm_9_m_sa_units_delivery->KeyFilter();

		// Call Row Selecting event
		$frm_9_m_sa_units_delivery->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_9_m_sa_units_delivery->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_units_delivery->SQL();
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
		global $conn, $frm_9_m_sa_units_delivery;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_9_m_sa_units_delivery->Row_Selected($row);
		$frm_9_m_sa_units_delivery->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_9_m_sa_units_delivery->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_9_m_sa_units_delivery->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_9_m_sa_units_delivery->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_9_m_sa_units_delivery->unit_delivery_name->setDbValue($rs->fields('unit_delivery_name'));
		$frm_9_m_sa_units_delivery->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_9_m_sa_units_delivery->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_9_m_sa_units_delivery->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_9_m_sa_units_delivery->CU->setDbValue($rs->fields('CU'));
		$frm_9_m_sa_units_delivery->DU_Office_Name->setDbValue($rs->fields('DU Office Name'));
		$frm_9_m_sa_units_delivery->DU_Short_Name->setDbValue($rs->fields('DU Short Name'));
		$frm_9_m_sa_units_delivery->Personnel_Count->setDbValue($rs->fields('Personnel Count'));
		$frm_9_m_sa_units_delivery->MFO_1->setDbValue($rs->fields('MFO 1'));
		$frm_9_m_sa_units_delivery->MFO_2->setDbValue($rs->fields('MFO 2'));
		$frm_9_m_sa_units_delivery->MFO_3->setDbValue($rs->fields('MFO 3'));
		$frm_9_m_sa_units_delivery->MFO_4->setDbValue($rs->fields('MFO 4'));
		$frm_9_m_sa_units_delivery->MFO_5->setDbValue($rs->fields('MFO 5'));
		$frm_9_m_sa_units_delivery->STO->setDbValue($rs->fields('STO'));
		$frm_9_m_sa_units_delivery->GASS_AB->setDbValue($rs->fields('GASS AB'));
		$frm_9_m_sa_units_delivery->GASS_CD->setDbValue($rs->fields('GASS CD'));
		$frm_9_m_sa_units_delivery->GASS->setDbValue($rs->fields('GASS'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_9_m_sa_units_delivery;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 0) {
		}

		// Load old recordset
		if ($bValidKey) {
			$frm_9_m_sa_units_delivery->CurrentFilter = $frm_9_m_sa_units_delivery->KeyFilter();
			$sSql = $frm_9_m_sa_units_delivery->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_units_delivery;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_9_m_sa_units_delivery->Row_Rendering();

		// Common render codes for all row types
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// cu_sequence
		// unit_delivery_name
		// cutOffDate_id
		// t_startDate
		// t_cutOffDate_fp
		// t_cutOffDate_remarks
		// CU
		// DU Office Name
		// DU Short Name
		// Personnel Count
		// MFO 1
		// MFO 2
		// MFO 3
		// MFO 4
		// MFO 5
		// STO
		// GASS AB
		// GASS CD
		// GASS

		if ($frm_9_m_sa_units_delivery->RowType == UP_ROWTYPE_VIEW) { // View row

			// cu_sequence
			$frm_9_m_sa_units_delivery->cu_sequence->ViewValue = $frm_9_m_sa_units_delivery->cu_sequence->CurrentValue;
			$frm_9_m_sa_units_delivery->cu_sequence->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->ViewValue = $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CurrentValue;
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// CU
			$frm_9_m_sa_units_delivery->CU->ViewValue = $frm_9_m_sa_units_delivery->CU->CurrentValue;
			$frm_9_m_sa_units_delivery->CU->ViewCustomAttributes = "";

			// DU Office Name
			$frm_9_m_sa_units_delivery->DU_Office_Name->ViewValue = $frm_9_m_sa_units_delivery->DU_Office_Name->CurrentValue;
			$frm_9_m_sa_units_delivery->DU_Office_Name->ViewCustomAttributes = "";

			// DU Short Name
			$frm_9_m_sa_units_delivery->DU_Short_Name->ViewValue = $frm_9_m_sa_units_delivery->DU_Short_Name->CurrentValue;
			$frm_9_m_sa_units_delivery->DU_Short_Name->ViewCustomAttributes = "";

			// Personnel Count
			$frm_9_m_sa_units_delivery->Personnel_Count->ViewValue = $frm_9_m_sa_units_delivery->Personnel_Count->CurrentValue;
			$frm_9_m_sa_units_delivery->Personnel_Count->ViewCustomAttributes = "";

			// MFO 1
			$frm_9_m_sa_units_delivery->MFO_1->ViewValue = $frm_9_m_sa_units_delivery->MFO_1->CurrentValue;
			$frm_9_m_sa_units_delivery->MFO_1->ViewCustomAttributes = "";

			// MFO 2
			$frm_9_m_sa_units_delivery->MFO_2->ViewValue = $frm_9_m_sa_units_delivery->MFO_2->CurrentValue;
			$frm_9_m_sa_units_delivery->MFO_2->ViewCustomAttributes = "";

			// MFO 3
			$frm_9_m_sa_units_delivery->MFO_3->ViewValue = $frm_9_m_sa_units_delivery->MFO_3->CurrentValue;
			$frm_9_m_sa_units_delivery->MFO_3->ViewCustomAttributes = "";

			// MFO 4
			$frm_9_m_sa_units_delivery->MFO_4->ViewValue = $frm_9_m_sa_units_delivery->MFO_4->CurrentValue;
			$frm_9_m_sa_units_delivery->MFO_4->ViewCustomAttributes = "";

			// MFO 5
			$frm_9_m_sa_units_delivery->MFO_5->ViewValue = $frm_9_m_sa_units_delivery->MFO_5->CurrentValue;
			$frm_9_m_sa_units_delivery->MFO_5->ViewCustomAttributes = "";

			// STO
			$frm_9_m_sa_units_delivery->STO->ViewValue = $frm_9_m_sa_units_delivery->STO->CurrentValue;
			$frm_9_m_sa_units_delivery->STO->ViewCustomAttributes = "";

			// GASS AB
			$frm_9_m_sa_units_delivery->GASS_AB->ViewValue = $frm_9_m_sa_units_delivery->GASS_AB->CurrentValue;
			$frm_9_m_sa_units_delivery->GASS_AB->ViewCustomAttributes = "";

			// GASS CD
			$frm_9_m_sa_units_delivery->GASS_CD->ViewValue = $frm_9_m_sa_units_delivery->GASS_CD->CurrentValue;
			$frm_9_m_sa_units_delivery->GASS_CD->ViewCustomAttributes = "";

			// GASS
			$frm_9_m_sa_units_delivery->GASS->ViewValue = $frm_9_m_sa_units_delivery->GASS->CurrentValue;
			$frm_9_m_sa_units_delivery->GASS->ViewCustomAttributes = "";

			// cu_sequence
			$frm_9_m_sa_units_delivery->cu_sequence->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->cu_sequence->HrefValue = "";
			$frm_9_m_sa_units_delivery->cu_sequence->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->HrefValue = "";
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->TooltipValue = "";

			// CU
			$frm_9_m_sa_units_delivery->CU->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->CU->HrefValue = "";
			$frm_9_m_sa_units_delivery->CU->TooltipValue = "";

			// DU Office Name
			$frm_9_m_sa_units_delivery->DU_Office_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->DU_Office_Name->HrefValue = "";
			$frm_9_m_sa_units_delivery->DU_Office_Name->TooltipValue = "";

			// DU Short Name
			$frm_9_m_sa_units_delivery->DU_Short_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->DU_Short_Name->HrefValue = "";
			$frm_9_m_sa_units_delivery->DU_Short_Name->TooltipValue = "";

			// Personnel Count
			$frm_9_m_sa_units_delivery->Personnel_Count->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->Personnel_Count->HrefValue = "";
			$frm_9_m_sa_units_delivery->Personnel_Count->TooltipValue = "";

			// MFO 1
			$frm_9_m_sa_units_delivery->MFO_1->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_1->HrefValue = "";
			$frm_9_m_sa_units_delivery->MFO_1->TooltipValue = "";

			// MFO 2
			$frm_9_m_sa_units_delivery->MFO_2->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_2->HrefValue = "";
			$frm_9_m_sa_units_delivery->MFO_2->TooltipValue = "";

			// MFO 3
			$frm_9_m_sa_units_delivery->MFO_3->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_3->HrefValue = "";
			$frm_9_m_sa_units_delivery->MFO_3->TooltipValue = "";

			// MFO 4
			$frm_9_m_sa_units_delivery->MFO_4->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_4->HrefValue = "";
			$frm_9_m_sa_units_delivery->MFO_4->TooltipValue = "";

			// MFO 5
			$frm_9_m_sa_units_delivery->MFO_5->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_5->HrefValue = "";
			$frm_9_m_sa_units_delivery->MFO_5->TooltipValue = "";

			// STO
			$frm_9_m_sa_units_delivery->STO->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->STO->HrefValue = "";
			$frm_9_m_sa_units_delivery->STO->TooltipValue = "";

			// GASS AB
			$frm_9_m_sa_units_delivery->GASS_AB->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->GASS_AB->HrefValue = "";
			$frm_9_m_sa_units_delivery->GASS_AB->TooltipValue = "";

			// GASS CD
			$frm_9_m_sa_units_delivery->GASS_CD->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->GASS_CD->HrefValue = "";
			$frm_9_m_sa_units_delivery->GASS_CD->TooltipValue = "";

			// GASS
			$frm_9_m_sa_units_delivery->GASS->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->GASS->HrefValue = "";
			$frm_9_m_sa_units_delivery->GASS->TooltipValue = "";
		} elseif ($frm_9_m_sa_units_delivery->RowType == UP_ROWTYPE_ADD) { // Add row

			// cu_sequence
			$frm_9_m_sa_units_delivery->cu_sequence->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->cu_sequence->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->cu_sequence->CurrentValue);

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CurrentValue);

			// CU
			$frm_9_m_sa_units_delivery->CU->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->CU->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->CU->CurrentValue);

			// DU Office Name
			$frm_9_m_sa_units_delivery->DU_Office_Name->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->DU_Office_Name->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->DU_Office_Name->CurrentValue);

			// DU Short Name
			$frm_9_m_sa_units_delivery->DU_Short_Name->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->DU_Short_Name->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->DU_Short_Name->CurrentValue);

			// Personnel Count
			$frm_9_m_sa_units_delivery->Personnel_Count->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->Personnel_Count->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->Personnel_Count->CurrentValue);

			// MFO 1
			$frm_9_m_sa_units_delivery->MFO_1->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_1->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->MFO_1->CurrentValue);

			// MFO 2
			$frm_9_m_sa_units_delivery->MFO_2->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_2->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->MFO_2->CurrentValue);

			// MFO 3
			$frm_9_m_sa_units_delivery->MFO_3->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_3->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->MFO_3->CurrentValue);

			// MFO 4
			$frm_9_m_sa_units_delivery->MFO_4->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_4->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->MFO_4->CurrentValue);

			// MFO 5
			$frm_9_m_sa_units_delivery->MFO_5->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_5->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->MFO_5->CurrentValue);

			// STO
			$frm_9_m_sa_units_delivery->STO->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->STO->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->STO->CurrentValue);

			// GASS AB
			$frm_9_m_sa_units_delivery->GASS_AB->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->GASS_AB->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->GASS_AB->CurrentValue);

			// GASS CD
			$frm_9_m_sa_units_delivery->GASS_CD->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->GASS_CD->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->GASS_CD->CurrentValue);

			// GASS
			$frm_9_m_sa_units_delivery->GASS->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->GASS->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->GASS->CurrentValue);

			// Edit refer script
			// cu_sequence

			$frm_9_m_sa_units_delivery->cu_sequence->HrefValue = "";

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->HrefValue = "";

			// CU
			$frm_9_m_sa_units_delivery->CU->HrefValue = "";

			// DU Office Name
			$frm_9_m_sa_units_delivery->DU_Office_Name->HrefValue = "";

			// DU Short Name
			$frm_9_m_sa_units_delivery->DU_Short_Name->HrefValue = "";

			// Personnel Count
			$frm_9_m_sa_units_delivery->Personnel_Count->HrefValue = "";

			// MFO 1
			$frm_9_m_sa_units_delivery->MFO_1->HrefValue = "";

			// MFO 2
			$frm_9_m_sa_units_delivery->MFO_2->HrefValue = "";

			// MFO 3
			$frm_9_m_sa_units_delivery->MFO_3->HrefValue = "";

			// MFO 4
			$frm_9_m_sa_units_delivery->MFO_4->HrefValue = "";

			// MFO 5
			$frm_9_m_sa_units_delivery->MFO_5->HrefValue = "";

			// STO
			$frm_9_m_sa_units_delivery->STO->HrefValue = "";

			// GASS AB
			$frm_9_m_sa_units_delivery->GASS_AB->HrefValue = "";

			// GASS CD
			$frm_9_m_sa_units_delivery->GASS_CD->HrefValue = "";

			// GASS
			$frm_9_m_sa_units_delivery->GASS->HrefValue = "";
		} elseif ($frm_9_m_sa_units_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// cu_sequence
			$frm_9_m_sa_units_delivery->cu_sequence->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->cu_sequence->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->cu_sequence->CurrentValue);

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CurrentValue);

			// CU
			$frm_9_m_sa_units_delivery->CU->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->CU->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->CU->CurrentValue);

			// DU Office Name
			$frm_9_m_sa_units_delivery->DU_Office_Name->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->DU_Office_Name->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->DU_Office_Name->CurrentValue);

			// DU Short Name
			$frm_9_m_sa_units_delivery->DU_Short_Name->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->DU_Short_Name->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->DU_Short_Name->CurrentValue);

			// Personnel Count
			$frm_9_m_sa_units_delivery->Personnel_Count->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->Personnel_Count->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->Personnel_Count->CurrentValue);

			// MFO 1
			$frm_9_m_sa_units_delivery->MFO_1->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_1->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->MFO_1->CurrentValue);

			// MFO 2
			$frm_9_m_sa_units_delivery->MFO_2->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_2->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->MFO_2->CurrentValue);

			// MFO 3
			$frm_9_m_sa_units_delivery->MFO_3->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_3->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->MFO_3->CurrentValue);

			// MFO 4
			$frm_9_m_sa_units_delivery->MFO_4->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_4->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->MFO_4->CurrentValue);

			// MFO 5
			$frm_9_m_sa_units_delivery->MFO_5->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_5->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->MFO_5->CurrentValue);

			// STO
			$frm_9_m_sa_units_delivery->STO->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->STO->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->STO->CurrentValue);

			// GASS AB
			$frm_9_m_sa_units_delivery->GASS_AB->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->GASS_AB->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->GASS_AB->CurrentValue);

			// GASS CD
			$frm_9_m_sa_units_delivery->GASS_CD->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->GASS_CD->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->GASS_CD->CurrentValue);

			// GASS
			$frm_9_m_sa_units_delivery->GASS->EditCustomAttributes = "";
			$frm_9_m_sa_units_delivery->GASS->EditValue = up_HtmlEncode($frm_9_m_sa_units_delivery->GASS->CurrentValue);

			// Edit refer script
			// cu_sequence

			$frm_9_m_sa_units_delivery->cu_sequence->HrefValue = "";

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->HrefValue = "";

			// CU
			$frm_9_m_sa_units_delivery->CU->HrefValue = "";

			// DU Office Name
			$frm_9_m_sa_units_delivery->DU_Office_Name->HrefValue = "";

			// DU Short Name
			$frm_9_m_sa_units_delivery->DU_Short_Name->HrefValue = "";

			// Personnel Count
			$frm_9_m_sa_units_delivery->Personnel_Count->HrefValue = "";

			// MFO 1
			$frm_9_m_sa_units_delivery->MFO_1->HrefValue = "";

			// MFO 2
			$frm_9_m_sa_units_delivery->MFO_2->HrefValue = "";

			// MFO 3
			$frm_9_m_sa_units_delivery->MFO_3->HrefValue = "";

			// MFO 4
			$frm_9_m_sa_units_delivery->MFO_4->HrefValue = "";

			// MFO 5
			$frm_9_m_sa_units_delivery->MFO_5->HrefValue = "";

			// STO
			$frm_9_m_sa_units_delivery->STO->HrefValue = "";

			// GASS AB
			$frm_9_m_sa_units_delivery->GASS_AB->HrefValue = "";

			// GASS CD
			$frm_9_m_sa_units_delivery->GASS_CD->HrefValue = "";

			// GASS
			$frm_9_m_sa_units_delivery->GASS->HrefValue = "";
		}
		if ($frm_9_m_sa_units_delivery->RowType == UP_ROWTYPE_ADD ||
			$frm_9_m_sa_units_delivery->RowType == UP_ROWTYPE_EDIT ||
			$frm_9_m_sa_units_delivery->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_9_m_sa_units_delivery->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_9_m_sa_units_delivery->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_9_m_sa_units_delivery->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_9_m_sa_units_delivery;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($frm_9_m_sa_units_delivery->cu_sequence->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_units_delivery->cu_sequence->FldErrMsg());
		}
		if (!up_CheckInteger($frm_9_m_sa_units_delivery->Personnel_Count->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_units_delivery->Personnel_Count->FldErrMsg());
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
		global $conn, $Language, $Security, $frm_9_m_sa_units_delivery;
		$DeleteRows = TRUE;
		$sSql = $frm_9_m_sa_units_delivery->SQL();
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
				$DeleteRows = $frm_9_m_sa_units_delivery->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_9_m_sa_units_delivery->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_9_m_sa_units_delivery->CancelMessage <> "") {
				$this->setFailureMessage($frm_9_m_sa_units_delivery->CancelMessage);
				$frm_9_m_sa_units_delivery->CancelMessage = "";
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
				$frm_9_m_sa_units_delivery->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_units_delivery;
		$sFilter = $frm_9_m_sa_units_delivery->KeyFilter();
		$frm_9_m_sa_units_delivery->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_units_delivery->SQL();
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

			// cu_sequence
			$frm_9_m_sa_units_delivery->cu_sequence->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->cu_sequence->CurrentValue, NULL, $frm_9_m_sa_units_delivery->cu_sequence->ReadOnly);

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CurrentValue, NULL, $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->ReadOnly);

			// CU
			$frm_9_m_sa_units_delivery->CU->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->CU->CurrentValue, NULL, $frm_9_m_sa_units_delivery->CU->ReadOnly);

			// DU Office Name
			$frm_9_m_sa_units_delivery->DU_Office_Name->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->DU_Office_Name->CurrentValue, NULL, $frm_9_m_sa_units_delivery->DU_Office_Name->ReadOnly);

			// DU Short Name
			$frm_9_m_sa_units_delivery->DU_Short_Name->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->DU_Short_Name->CurrentValue, NULL, $frm_9_m_sa_units_delivery->DU_Short_Name->ReadOnly);

			// Personnel Count
			$frm_9_m_sa_units_delivery->Personnel_Count->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->Personnel_Count->CurrentValue, NULL, $frm_9_m_sa_units_delivery->Personnel_Count->ReadOnly);

			// MFO 1
			$frm_9_m_sa_units_delivery->MFO_1->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->MFO_1->CurrentValue, NULL, $frm_9_m_sa_units_delivery->MFO_1->ReadOnly);

			// MFO 2
			$frm_9_m_sa_units_delivery->MFO_2->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->MFO_2->CurrentValue, NULL, $frm_9_m_sa_units_delivery->MFO_2->ReadOnly);

			// MFO 3
			$frm_9_m_sa_units_delivery->MFO_3->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->MFO_3->CurrentValue, NULL, $frm_9_m_sa_units_delivery->MFO_3->ReadOnly);

			// MFO 4
			$frm_9_m_sa_units_delivery->MFO_4->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->MFO_4->CurrentValue, NULL, $frm_9_m_sa_units_delivery->MFO_4->ReadOnly);

			// MFO 5
			$frm_9_m_sa_units_delivery->MFO_5->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->MFO_5->CurrentValue, NULL, $frm_9_m_sa_units_delivery->MFO_5->ReadOnly);

			// STO
			$frm_9_m_sa_units_delivery->STO->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->STO->CurrentValue, NULL, $frm_9_m_sa_units_delivery->STO->ReadOnly);

			// GASS AB
			$frm_9_m_sa_units_delivery->GASS_AB->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->GASS_AB->CurrentValue, NULL, $frm_9_m_sa_units_delivery->GASS_AB->ReadOnly);

			// GASS CD
			$frm_9_m_sa_units_delivery->GASS_CD->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->GASS_CD->CurrentValue, NULL, $frm_9_m_sa_units_delivery->GASS_CD->ReadOnly);

			// GASS
			$frm_9_m_sa_units_delivery->GASS->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->GASS->CurrentValue, NULL, $frm_9_m_sa_units_delivery->GASS->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_9_m_sa_units_delivery->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_9_m_sa_units_delivery->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_9_m_sa_units_delivery->CancelMessage <> "") {
					$this->setFailureMessage($frm_9_m_sa_units_delivery->CancelMessage);
					$frm_9_m_sa_units_delivery->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_9_m_sa_units_delivery->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $frm_9_m_sa_units_delivery;

		// Set up foreign key field value from Session
			if ($frm_9_m_sa_units_delivery->getCurrentMasterTable() == "frm_9_m_sa_units_cu") {
				$frm_9_m_sa_units_delivery->cu_id->CurrentValue = $frm_9_m_sa_units_delivery->cu_id->getSessionValue();
			}
		$rsnew = array();

		// cu_sequence
		$frm_9_m_sa_units_delivery->cu_sequence->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->cu_sequence->CurrentValue, NULL, FALSE);

		// t_cutOffDate_remarks
		$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CurrentValue, NULL, FALSE);

		// CU
		$frm_9_m_sa_units_delivery->CU->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->CU->CurrentValue, NULL, FALSE);

		// DU Office Name
		$frm_9_m_sa_units_delivery->DU_Office_Name->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->DU_Office_Name->CurrentValue, NULL, FALSE);

		// DU Short Name
		$frm_9_m_sa_units_delivery->DU_Short_Name->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->DU_Short_Name->CurrentValue, NULL, FALSE);

		// Personnel Count
		$frm_9_m_sa_units_delivery->Personnel_Count->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->Personnel_Count->CurrentValue, NULL, FALSE);

		// MFO 1
		$frm_9_m_sa_units_delivery->MFO_1->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->MFO_1->CurrentValue, NULL, FALSE);

		// MFO 2
		$frm_9_m_sa_units_delivery->MFO_2->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->MFO_2->CurrentValue, NULL, FALSE);

		// MFO 3
		$frm_9_m_sa_units_delivery->MFO_3->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->MFO_3->CurrentValue, NULL, FALSE);

		// MFO 4
		$frm_9_m_sa_units_delivery->MFO_4->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->MFO_4->CurrentValue, NULL, FALSE);

		// MFO 5
		$frm_9_m_sa_units_delivery->MFO_5->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->MFO_5->CurrentValue, NULL, FALSE);

		// STO
		$frm_9_m_sa_units_delivery->STO->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->STO->CurrentValue, NULL, FALSE);

		// GASS AB
		$frm_9_m_sa_units_delivery->GASS_AB->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->GASS_AB->CurrentValue, NULL, FALSE);

		// GASS CD
		$frm_9_m_sa_units_delivery->GASS_CD->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->GASS_CD->CurrentValue, NULL, FALSE);

		// GASS
		$frm_9_m_sa_units_delivery->GASS->SetDbValueDef($rsnew, $frm_9_m_sa_units_delivery->GASS->CurrentValue, NULL, FALSE);

		// cu_id
		if ($frm_9_m_sa_units_delivery->cu_id->getSessionValue() <> "") {
			$rsnew['cu_id'] = $frm_9_m_sa_units_delivery->cu_id->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_9_m_sa_units_delivery->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_9_m_sa_units_delivery->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_9_m_sa_units_delivery->CancelMessage <> "") {
				$this->setFailureMessage($frm_9_m_sa_units_delivery->CancelMessage);
				$frm_9_m_sa_units_delivery->CancelMessage = "";
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
			$frm_9_m_sa_units_delivery->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_9_m_sa_units_delivery;

		// Hide foreign keys
		$sMasterTblVar = $frm_9_m_sa_units_delivery->getCurrentMasterTable();
		if ($sMasterTblVar == "frm_9_m_sa_units_cu") {
			$frm_9_m_sa_units_delivery->cu_id->Visible = FALSE;
			if ($GLOBALS["frm_9_m_sa_units_cu"]->EventCancelled) $frm_9_m_sa_units_delivery->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $frm_9_m_sa_units_delivery->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_9_m_sa_units_delivery->getDetailFilter(); // Get detail filter
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