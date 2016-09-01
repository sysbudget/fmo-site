<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php

//
// Page class
//
class cfrm_1_t_du_pbb_detail_delivery_grid {

	// Page ID
	var $PageID = 'grid';

	// Table name
	var $TableName = 'frm_1_t_du_pbb_detail_delivery';

	// Page object name
	var $PageObjName = 'frm_1_t_du_pbb_detail_delivery_grid';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_1_t_du_pbb_detail_delivery;
		if ($frm_1_t_du_pbb_detail_delivery->UseTokenInUrl) $PageUrl .= "t=" . $frm_1_t_du_pbb_detail_delivery->TableVar . "&"; // Add page token
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
		global $objForm, $frm_1_t_du_pbb_detail_delivery;
		if ($frm_1_t_du_pbb_detail_delivery->UseTokenInUrl) {
			if ($objForm)
				return ($frm_1_t_du_pbb_detail_delivery->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_1_t_du_pbb_detail_delivery->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_1_t_du_pbb_detail_delivery_grid() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_1_t_du_pbb_detail_delivery)
		if (!isset($GLOBALS["frm_1_t_du_pbb_detail_delivery"])) {
			$GLOBALS["frm_1_t_du_pbb_detail_delivery"] = new cfrm_1_t_du_pbb_detail_delivery();
			$GLOBALS["MasterTable"] =& $GLOBALS["Table"];
			$GLOBALS["Table"] =& $GLOBALS["frm_1_t_du_pbb_detail_delivery"];
		}

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'grid', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_1_t_du_pbb_detail_delivery', TRUE);

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
		global $frm_1_t_du_pbb_detail_delivery;

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
			$this->Page_Terminate("frm_1_t_du_pbb_detail_deliverylist.php");
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_1_t_du_pbb_detail_delivery->GridAddRowCount = $gridaddcnt;

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
		global $frm_1_t_du_pbb_detail_delivery;
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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_1_t_du_pbb_detail_delivery;

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
			if ($frm_1_t_du_pbb_detail_delivery->Export <> "" ||
				$frm_1_t_du_pbb_detail_delivery->CurrentAction == "gridadd" ||
				$frm_1_t_du_pbb_detail_delivery->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
			}

			// Show grid delete link for grid add / grid edit
			if ($frm_1_t_du_pbb_detail_delivery->AllowAddDeleteRow) {
				if ($frm_1_t_du_pbb_detail_delivery->CurrentAction == "gridadd" ||
					$frm_1_t_du_pbb_detail_delivery->CurrentAction == "gridedit") {
					$item = $this->ListOptions->GetItem("griddelete");
					if ($item) $item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($frm_1_t_du_pbb_detail_delivery->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_1_t_du_pbb_detail_delivery->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $frm_1_t_du_pbb_detail_delivery->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_1_t_du_pbb_detail_delivery->getDetailFilter(); // Restore detail filter

		// Add master User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			if ($frm_1_t_du_pbb_detail_delivery->getCurrentMasterTable() == "frm_1_t_du_delivery_pi_status")
				$this->DbMasterFilter = $frm_1_t_du_pbb_detail_delivery->AddMasterUserIDFilter($this->DbMasterFilter, "frm_1_t_du_delivery_pi_status"); // Add master User ID filter
		}
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_1_t_du_pbb_detail_delivery->getMasterFilter() <> "" && $frm_1_t_du_pbb_detail_delivery->getCurrentMasterTable() == "frm_1_t_du_delivery_pi_status") {
			global $frm_1_t_du_delivery_pi_status;
			$rsmaster = $frm_1_t_du_delivery_pi_status->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_1_t_du_pbb_detail_delivery->getReturnUrl()); // Return to caller
			} else {
				$frm_1_t_du_delivery_pi_status->LoadListRowValues($rsmaster);
				$frm_1_t_du_delivery_pi_status->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_1_t_du_delivery_pi_status->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_1_t_du_pbb_detail_delivery->setSessionWhere($sFilter);
		$frm_1_t_du_pbb_detail_delivery->CurrentFilter = "";
	}

	//  Exit inline mode
	function ClearInlineMode() {
		global $frm_1_t_du_pbb_detail_delivery;
		$frm_1_t_du_pbb_detail_delivery->LastAction = $frm_1_t_du_pbb_detail_delivery->CurrentAction; // Save last action
		$frm_1_t_du_pbb_detail_delivery->CurrentAction = ""; // Clear action
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
		global $conn, $Language, $objForm, $gsFormError, $frm_1_t_du_pbb_detail_delivery;
		$bGridUpdate = TRUE;

		// Get old recordset
		$frm_1_t_du_pbb_detail_delivery->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $frm_1_t_du_pbb_detail_delivery->SQL();
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
						$frm_1_t_du_pbb_detail_delivery->CurrentFilter = $frm_1_t_du_pbb_detail_delivery->KeyFilter();
						$bGridUpdate = $this->DeleteRows(); // Delete this row
					} else if (!$this->ValidateForm()) {
						$bGridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($gsFormError);
					} else {
						if ($rowaction == "insert") {
							$bGridUpdate = $this->AddRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$frm_1_t_du_pbb_detail_delivery->SendEmail = FALSE; // Do not send email on update success
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
			$frm_1_t_du_pbb_detail_delivery->EventCancelled = TRUE; // Set event cancelled
			$frm_1_t_du_pbb_detail_delivery->CurrentAction = "gridedit"; // Stay in Grid Edit mode
		}
		return $bGridUpdate;
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm, $frm_1_t_du_pbb_detail_delivery;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $frm_1_t_du_pbb_detail_delivery->KeyFilter();
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
		global $frm_1_t_du_pbb_detail_delivery;
		$arrKeyFlds = explode(UP_COMPOSITE_KEY_SEPARATOR, $key);
		if (count($arrKeyFlds) >= 1) {
			$frm_1_t_du_pbb_detail_delivery->pbb_delivery_id->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($frm_1_t_du_pbb_detail_delivery->pbb_delivery_id->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	function GridInsert() {
		global $conn, $Language, $objForm, $gsFormError, $frm_1_t_du_pbb_detail_delivery;
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
				$frm_1_t_du_pbb_detail_delivery->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->ValidateForm()) {
					$bGridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($gsFormError);
				} else {
					$bGridInsert = $this->AddRow($this->OldRecordset); // Insert this row
				}
				if ($bGridInsert) {
					if ($sKey <> "") $sKey .= UP_COMPOSITE_KEY_SEPARATOR;
					$sKey .= $frm_1_t_du_pbb_detail_delivery->pbb_delivery_id->CurrentValue;

					// Add filter for this record
					$sFilter = $frm_1_t_du_pbb_detail_delivery->KeyFilter();
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
			$frm_1_t_du_pbb_detail_delivery->CurrentFilter = $sWrkFilter;
			$sSql = $frm_1_t_du_pbb_detail_delivery->SQL();
			if ($rs = $conn->Execute($sSql)) {
				$rsnew = $rs->GetRows();
				$rs->Close();
			}
			$this->ClearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "") {
				$this->setFailureMessage($Language->Phrase("InsertFailed")); // Set insert failed message
			}
			$frm_1_t_du_pbb_detail_delivery->EventCancelled = TRUE; // Set event cancelled
			$frm_1_t_du_pbb_detail_delivery->CurrentAction = "gridadd"; // Stay in gridadd mode
		}
		return $bGridInsert;
	}

	// Check if empty row
	function EmptyRow() {
		global $frm_1_t_du_pbb_detail_delivery, $objForm;
		if ($objForm->HasValue("x_Delivery_Unit") && $objForm->HasValue("o_Delivery_Unit") && $frm_1_t_du_pbb_detail_delivery->Delivery_Unit->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->Delivery_Unit->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_MFO") && $objForm->HasValue("o_MFO") && $frm_1_t_du_pbb_detail_delivery->MFO->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->MFO->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Applicable") && $objForm->HasValue("o_Applicable") && $frm_1_t_du_pbb_detail_delivery->Applicable->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->Applicable->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Target") && $objForm->HasValue("o_Target") && $frm_1_t_du_pbb_detail_delivery->Target->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->Target->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Target_Cut2DOff_Date") && $objForm->HasValue("o_Target_Cut2DOff_Date") && $frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Accomplishment") && $objForm->HasValue("o_Accomplishment") && $frm_1_t_du_pbb_detail_delivery->Accomplishment->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->Accomplishment->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Numerator") && $objForm->HasValue("o_Numerator") && $frm_1_t_du_pbb_detail_delivery->Numerator->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->Numerator->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Denominator") && $objForm->HasValue("o_Denominator") && $frm_1_t_du_pbb_detail_delivery->Denominator->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->Denominator->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Accomplishment_Remarks") && $objForm->HasValue("o_Accomplishment_Remarks") && $frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_a_cutOffDate_remarks") && $objForm->HasValue("o_a_cutOffDate_remarks") && $frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Below_10025_Performance_Rating") && $objForm->HasValue("o_Below_10025_Performance_Rating") && $frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_z10025_to_12025_Performance_Rating") && $objForm->HasValue("o_z10025_to_12025_Performance_Rating") && $frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->OldValue)
			return FALSE;
		if ($objForm->HasValue("x_Above_12025_Performance_Rating") && $objForm->HasValue("o_Above_12025_Performance_Rating") && $frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->CurrentValue <> $frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->OldValue)
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
		global $objForm, $frm_1_t_du_pbb_detail_delivery;

		// Get row based on current index
		$objForm->Index = $idx;
		$this->LoadFormValues(); // Load form values
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_1_t_du_pbb_detail_delivery;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_1_t_du_pbb_detail_delivery->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_1_t_du_pbb_detail_delivery->CurrentOrderType = @$_GET["ordertype"];
			$frm_1_t_du_pbb_detail_delivery->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_1_t_du_pbb_detail_delivery;
		$sOrderBy = $frm_1_t_du_pbb_detail_delivery->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_1_t_du_pbb_detail_delivery->SqlOrderBy() <> "") {
				$sOrderBy = $frm_1_t_du_pbb_detail_delivery->SqlOrderBy();
				$frm_1_t_du_pbb_detail_delivery->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_1_t_du_pbb_detail_delivery;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_1_t_du_pbb_detail_delivery->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_1_t_du_pbb_detail_delivery->unit_delivery_id->setSessionValue("");
				$frm_1_t_du_pbb_detail_delivery->mfo_question_online_insert_question_mfo_name_rep->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_1_t_du_pbb_detail_delivery->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_1_t_du_pbb_detail_delivery->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_1_t_du_pbb_detail_delivery;

		// "griddelete"
		if ($frm_1_t_du_pbb_detail_delivery->AllowAddDeleteRow) {
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
		global $Security, $Language, $frm_1_t_du_pbb_detail_delivery, $objForm;
		$this->ListOptions->LoadDefault();

		// Set up row action and key
		if ($frm_1_t_du_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD)
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
		if ($frm_1_t_du_pbb_detail_delivery->AllowAddDeleteRow) {
			if ($frm_1_t_du_pbb_detail_delivery->CurrentMode == "add" || $frm_1_t_du_pbb_detail_delivery->CurrentMode == "copy" || $frm_1_t_du_pbb_detail_delivery->CurrentMode == "edit") {
				$oListOpt =& $this->ListOptions->Items["griddelete"];
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$oListOpt->Body = "&nbsp;";
				} else {
					$oListOpt->Body = "<a class=\"upGridLink\" href=\"javascript:void(0);\" onclick=\"up_DeleteGridRow(this, frm_1_t_du_pbb_detail_delivery_grid, " . $this->RowIndex . ");\">" . $Language->Phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($frm_1_t_du_pbb_detail_delivery->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . $frm_1_t_du_pbb_detail_delivery->pbb_delivery_id->CurrentValue . "\">";
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	function SetRecordKey(&$key, $rs) {
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs->fields('pbb_delivery_id');
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_1_t_du_pbb_detail_delivery;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_1_t_du_pbb_detail_delivery;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_1_t_du_pbb_detail_delivery->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_1_t_du_pbb_detail_delivery->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_1_t_du_pbb_detail_delivery->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_1_t_du_pbb_detail_delivery->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_1_t_du_pbb_detail_delivery->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_1_t_du_pbb_detail_delivery->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_1_t_du_pbb_detail_delivery;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_1_t_du_pbb_detail_delivery;
		$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->OldValue = $frm_1_t_du_pbb_detail_delivery->Delivery_Unit->CurrentValue;
		$frm_1_t_du_pbb_detail_delivery->MFO->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->MFO->OldValue = $frm_1_t_du_pbb_detail_delivery->MFO->CurrentValue;
		$frm_1_t_du_pbb_detail_delivery->Applicable->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->Applicable->OldValue = $frm_1_t_du_pbb_detail_delivery->Applicable->CurrentValue;
		$frm_1_t_du_pbb_detail_delivery->Target->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->Target->OldValue = $frm_1_t_du_pbb_detail_delivery->Target->CurrentValue;
		$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->OldValue = $frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->CurrentValue;
		$frm_1_t_du_pbb_detail_delivery->Accomplishment->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->Accomplishment->OldValue = $frm_1_t_du_pbb_detail_delivery->Accomplishment->CurrentValue;
		$frm_1_t_du_pbb_detail_delivery->Numerator->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->Numerator->OldValue = $frm_1_t_du_pbb_detail_delivery->Numerator->CurrentValue;
		$frm_1_t_du_pbb_detail_delivery->Denominator->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->Denominator->OldValue = $frm_1_t_du_pbb_detail_delivery->Denominator->CurrentValue;
		$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->OldValue = $frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->CurrentValue;
		$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->OldValue = $frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->CurrentValue;
		$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->OldValue = $frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->CurrentValue;
		$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->OldValue = $frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->CurrentValue;
		$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->CurrentValue = NULL;
		$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->OldValue = $frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_1_t_du_pbb_detail_delivery;
		if (!$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->setFormValue($objForm->GetValue("x_Delivery_Unit"));
		}
		$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->setOldValue($objForm->GetValue("o_Delivery_Unit"));
		if (!$frm_1_t_du_pbb_detail_delivery->MFO->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->MFO->setFormValue($objForm->GetValue("x_MFO"));
		}
		$frm_1_t_du_pbb_detail_delivery->MFO->setOldValue($objForm->GetValue("o_MFO"));
		if (!$frm_1_t_du_pbb_detail_delivery->Applicable->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->Applicable->setFormValue($objForm->GetValue("x_Applicable"));
		}
		$frm_1_t_du_pbb_detail_delivery->Applicable->setOldValue($objForm->GetValue("o_Applicable"));
		if (!$frm_1_t_du_pbb_detail_delivery->Target->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->Target->setFormValue($objForm->GetValue("x_Target"));
		}
		$frm_1_t_du_pbb_detail_delivery->Target->setOldValue($objForm->GetValue("o_Target"));
		if (!$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->setFormValue($objForm->GetValue("x_Target_Cut2DOff_Date"));
		}
		$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->setOldValue($objForm->GetValue("o_Target_Cut2DOff_Date"));
		if (!$frm_1_t_du_pbb_detail_delivery->Accomplishment->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->setFormValue($objForm->GetValue("x_Accomplishment"));
		}
		$frm_1_t_du_pbb_detail_delivery->Accomplishment->setOldValue($objForm->GetValue("o_Accomplishment"));
		if (!$frm_1_t_du_pbb_detail_delivery->Numerator->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->Numerator->setFormValue($objForm->GetValue("x_Numerator"));
		}
		$frm_1_t_du_pbb_detail_delivery->Numerator->setOldValue($objForm->GetValue("o_Numerator"));
		if (!$frm_1_t_du_pbb_detail_delivery->Denominator->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->Denominator->setFormValue($objForm->GetValue("x_Denominator"));
		}
		$frm_1_t_du_pbb_detail_delivery->Denominator->setOldValue($objForm->GetValue("o_Denominator"));
		if (!$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->setFormValue($objForm->GetValue("x_Accomplishment_Remarks"));
		}
		$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->setOldValue($objForm->GetValue("o_Accomplishment_Remarks"));
		if (!$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->setFormValue($objForm->GetValue("x_a_cutOffDate_remarks"));
		}
		$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->setOldValue($objForm->GetValue("o_a_cutOffDate_remarks"));
		if (!$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->setFormValue($objForm->GetValue("x_Below_10025_Performance_Rating"));
		}
		$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->setOldValue($objForm->GetValue("o_Below_10025_Performance_Rating"));
		if (!$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->setFormValue($objForm->GetValue("x_z10025_to_12025_Performance_Rating"));
		}
		$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->setOldValue($objForm->GetValue("o_z10025_to_12025_Performance_Rating"));
		if (!$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->FldIsDetailKey) {
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->setFormValue($objForm->GetValue("x_Above_12025_Performance_Rating"));
		}
		$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->setOldValue($objForm->GetValue("o_Above_12025_Performance_Rating"));
		if (!$frm_1_t_du_pbb_detail_delivery->pbb_delivery_id->FldIsDetailKey && $frm_1_t_du_pbb_detail_delivery->CurrentAction <> "gridadd" && $frm_1_t_du_pbb_detail_delivery->CurrentAction <> "add")
			$frm_1_t_du_pbb_detail_delivery->pbb_delivery_id->setFormValue($objForm->GetValue("x_pbb_delivery_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_1_t_du_pbb_detail_delivery;
		if ($frm_1_t_du_pbb_detail_delivery->CurrentAction <> "gridadd" && $frm_1_t_du_pbb_detail_delivery->CurrentAction <> "add")
			$frm_1_t_du_pbb_detail_delivery->pbb_delivery_id->CurrentValue = $frm_1_t_du_pbb_detail_delivery->pbb_delivery_id->FormValue;
		$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->CurrentValue = $frm_1_t_du_pbb_detail_delivery->Delivery_Unit->FormValue;
		$frm_1_t_du_pbb_detail_delivery->MFO->CurrentValue = $frm_1_t_du_pbb_detail_delivery->MFO->FormValue;
		$frm_1_t_du_pbb_detail_delivery->Applicable->CurrentValue = $frm_1_t_du_pbb_detail_delivery->Applicable->FormValue;
		$frm_1_t_du_pbb_detail_delivery->Target->CurrentValue = $frm_1_t_du_pbb_detail_delivery->Target->FormValue;
		$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->CurrentValue = $frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->FormValue;
		$frm_1_t_du_pbb_detail_delivery->Accomplishment->CurrentValue = $frm_1_t_du_pbb_detail_delivery->Accomplishment->FormValue;
		$frm_1_t_du_pbb_detail_delivery->Numerator->CurrentValue = $frm_1_t_du_pbb_detail_delivery->Numerator->FormValue;
		$frm_1_t_du_pbb_detail_delivery->Denominator->CurrentValue = $frm_1_t_du_pbb_detail_delivery->Denominator->FormValue;
		$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->CurrentValue = $frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->FormValue;
		$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->CurrentValue = $frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->FormValue;
		$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->CurrentValue = $frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->FormValue;
		$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->CurrentValue = $frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->FormValue;
		$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->CurrentValue = $frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_1_t_du_pbb_detail_delivery;

		// Call Recordset Selecting event
		$frm_1_t_du_pbb_detail_delivery->Recordset_Selecting($frm_1_t_du_pbb_detail_delivery->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_1_t_du_pbb_detail_delivery->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_1_t_du_pbb_detail_delivery->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_1_t_du_pbb_detail_delivery;
		$sFilter = $frm_1_t_du_pbb_detail_delivery->KeyFilter();

		// Call Row Selecting event
		$frm_1_t_du_pbb_detail_delivery->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_1_t_du_pbb_detail_delivery->CurrentFilter = $sFilter;
		$sSql = $frm_1_t_du_pbb_detail_delivery->SQL();
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
		global $conn, $frm_1_t_du_pbb_detail_delivery;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_1_t_du_pbb_detail_delivery->Row_Selected($row);
		$frm_1_t_du_pbb_detail_delivery->pbb_delivery_id->setDbValue($rs->fields('pbb_delivery_id'));
		$frm_1_t_du_pbb_detail_delivery->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_1_t_du_pbb_detail_delivery->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_1_t_du_pbb_detail_delivery->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_1_t_du_pbb_detail_delivery->mfo_question_id->setDbValue($rs->fields('mfo_question_id'));
		$frm_1_t_du_pbb_detail_delivery->mfo_question_online_pi_seq->setDbValue($rs->fields('mfo_question_online_pi_seq'));
		$frm_1_t_du_pbb_detail_delivery->mfo_question_online_insert_question_mfo->setDbValue($rs->fields('mfo_question_online_insert_question_mfo'));
		$frm_1_t_du_pbb_detail_delivery->mfo_question_online_insert_question_mfo_name_rep->setDbValue($rs->fields('mfo_question_online_insert_question_mfo_name_rep'));
		$frm_1_t_du_pbb_detail_delivery->mfo_question_report_mfo_name->setDbValue($rs->fields('mfo_question_report_mfo_name'));
		$frm_1_t_du_pbb_detail_delivery->mfo_question_report_form_a_1_mfo->setDbValue($rs->fields('mfo_question_report_form_a_1_mfo'));
		$frm_1_t_du_pbb_detail_delivery->mfo_question_report_form_a_1_sequence->setDbValue($rs->fields('mfo_question_report_form_a_1_sequence'));
		$frm_1_t_du_pbb_detail_delivery->pi_no->setDbValue($rs->fields('pi_no'));
		$frm_1_t_du_pbb_detail_delivery->pi_sub->setDbValue($rs->fields('pi_sub'));
		$frm_1_t_du_pbb_detail_delivery->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_1_t_du_pbb_detail_delivery->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_1_t_du_pbb_detail_delivery->t_cutOffDate_contributor->setDbValue($rs->fields('t_cutOffDate_contributor'));
		$frm_1_t_du_pbb_detail_delivery->t_cutOffDate_delivery->setDbValue($rs->fields('t_cutOffDate_delivery'));
		$frm_1_t_du_pbb_detail_delivery->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_1_t_du_pbb_detail_delivery->pbb_delivery_derived_from_supporting_documents->setDbValue($rs->fields('pbb_delivery_derived_from_supporting_documents'));
		$frm_1_t_du_pbb_detail_delivery->a_startDate->setDbValue($rs->fields('a_startDate'));
		$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_contributor->setDbValue($rs->fields('a_cutOffDate_contributor'));
		$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_delivery->setDbValue($rs->fields('a_cutOffDate_delivery'));
		$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_1_t_du_pbb_detail_delivery->pbb_delivery_a_rating->setDbValue($rs->fields('pbb_delivery_a_rating'));
		$frm_1_t_du_pbb_detail_delivery->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_1_t_du_pbb_detail_delivery->CU->setDbValue($rs->fields('CU'));
		$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$frm_1_t_du_pbb_detail_delivery->MFO->setDbValue($rs->fields('MFO'));
		$frm_1_t_du_pbb_detail_delivery->Question->setDbValue($rs->fields('Question'));
		$frm_1_t_du_pbb_detail_delivery->Applicable->setDbValue($rs->fields('Applicable'));
		$frm_1_t_du_pbb_detail_delivery->Target->setDbValue($rs->fields('Target'));
		$frm_1_t_du_pbb_detail_delivery->Target_Remarks->setDbValue($rs->fields('Target Remarks'));
		$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->setDbValue($rs->fields('Target Cut-Off Date'));
		$frm_1_t_du_pbb_detail_delivery->Accomplishment->setDbValue($rs->fields('Accomplishment'));
		$frm_1_t_du_pbb_detail_delivery->Numerator->setDbValue($rs->fields('Numerator'));
		$frm_1_t_du_pbb_detail_delivery->Jan2DMar_28N29->setDbValue($rs->fields('Jan-Mar (N)'));
		$frm_1_t_du_pbb_detail_delivery->Apr2DJun_28N29->setDbValue($rs->fields('Apr-Jun (N)'));
		$frm_1_t_du_pbb_detail_delivery->Jul2DSep_28N29->setDbValue($rs->fields('Jul-Sep (N)'));
		$frm_1_t_du_pbb_detail_delivery->Oct2DDec_28N29->setDbValue($rs->fields('Oct-Dec (N)'));
		$frm_1_t_du_pbb_detail_delivery->Denominator->setDbValue($rs->fields('Denominator'));
		$frm_1_t_du_pbb_detail_delivery->Jan2DMar_28D29->setDbValue($rs->fields('Jan-Mar (D)'));
		$frm_1_t_du_pbb_detail_delivery->Apr2DJun_28D29->setDbValue($rs->fields('Apr-Jun (D)'));
		$frm_1_t_du_pbb_detail_delivery->Jul2DSep_28D29->setDbValue($rs->fields('Jul-Sep (D)'));
		$frm_1_t_du_pbb_detail_delivery->Oct2DDec_28D29->setDbValue($rs->fields('Oct-Dec (D)'));
		$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->setDbValue($rs->fields('Accomplishment Remarks'));
		$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
		$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->setDbValue($rs->fields('Below 100% Performance Rating'));
		$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->setDbValue($rs->fields('100% to 120% Performance Rating'));
		$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->setDbValue($rs->fields('Above 120% Performance Rating'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_1_t_du_pbb_detail_delivery;

		// Load key values from Session
		$bValidKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$frm_1_t_du_pbb_detail_delivery->pbb_delivery_id->CurrentValue = strval($arKeys[0]); // pbb_delivery_id
			else
				$bValidKey = FALSE;
		}

		// Load old recordset
		if ($bValidKey) {
			$frm_1_t_du_pbb_detail_delivery->CurrentFilter = $frm_1_t_du_pbb_detail_delivery->KeyFilter();
			$sSql = $frm_1_t_du_pbb_detail_delivery->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_1_t_du_pbb_detail_delivery;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_1_t_du_pbb_detail_delivery->Row_Rendering();

		// Common render codes for all row types
		// pbb_delivery_id
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// mfo_question_id
		// mfo_question_online_pi_seq
		// mfo_question_online_insert_question_mfo
		// mfo_question_online_insert_question_mfo_name_rep
		// mfo_question_report_mfo_name
		// mfo_question_report_form_a_1_mfo
		// mfo_question_report_form_a_1_sequence
		// pi_no
		// pi_sub
		// cutOffDate_id
		// t_startDate
		// t_cutOffDate_contributor
		// t_cutOffDate_delivery
		// t_cutOffDate_fp
		// pbb_delivery_derived_from_supporting_documents
		// a_startDate
		// a_cutOffDate_contributor
		// a_cutOffDate_delivery
		// a_cutOffDate_fp
		// pbb_delivery_a_rating
		// cu_sequence
		// CU

		$frm_1_t_du_pbb_detail_delivery->CU->CellCssStyle = "white-space: nowrap;";

		// Delivery Unit
		$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->CellCssStyle = "white-space: nowrap;";

		// MFO
		$frm_1_t_du_pbb_detail_delivery->MFO->CellCssStyle = "white-space: nowrap;";

		// Question
		// Applicable
		// Target
		// Target Remarks
		// Target Cut-Off Date

		$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->CellCssStyle = "white-space: nowrap;";

		// Accomplishment
		// Numerator
		// Jan-Mar (N)
		// Apr-Jun (N)
		// Jul-Sep (N)
		// Oct-Dec (N)
		// Denominator
		// Jan-Mar (D)
		// Apr-Jun (D)
		// Jul-Sep (D)
		// Oct-Dec (D)
		// Accomplishment Remarks
		// a_cutOffDate_remarks
		// Below 100% Performance Rating
		// 100% to 120% Performance Rating
		// Above 120% Performance Rating

		if ($frm_1_t_du_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View row

			// Delivery Unit
			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->ViewValue = $frm_1_t_du_pbb_detail_delivery->Delivery_Unit->CurrentValue;
			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->ViewCustomAttributes = "";

			// MFO
			$frm_1_t_du_pbb_detail_delivery->MFO->ViewValue = $frm_1_t_du_pbb_detail_delivery->MFO->CurrentValue;
			$frm_1_t_du_pbb_detail_delivery->MFO->ViewCustomAttributes = "";

			// Applicable
			if (strval($frm_1_t_du_pbb_detail_delivery->Applicable->CurrentValue) <> "") {
				switch ($frm_1_t_du_pbb_detail_delivery->Applicable->CurrentValue) {
					case "Y":
						$frm_1_t_du_pbb_detail_delivery->Applicable->ViewValue = $frm_1_t_du_pbb_detail_delivery->Applicable->FldTagCaption(1) <> "" ? $frm_1_t_du_pbb_detail_delivery->Applicable->FldTagCaption(1) : $frm_1_t_du_pbb_detail_delivery->Applicable->CurrentValue;
						break;
					case "N":
						$frm_1_t_du_pbb_detail_delivery->Applicable->ViewValue = $frm_1_t_du_pbb_detail_delivery->Applicable->FldTagCaption(2) <> "" ? $frm_1_t_du_pbb_detail_delivery->Applicable->FldTagCaption(2) : $frm_1_t_du_pbb_detail_delivery->Applicable->CurrentValue;
						break;
					default:
						$frm_1_t_du_pbb_detail_delivery->Applicable->ViewValue = $frm_1_t_du_pbb_detail_delivery->Applicable->CurrentValue;
				}
			} else {
				$frm_1_t_du_pbb_detail_delivery->Applicable->ViewValue = NULL;
			}
			$frm_1_t_du_pbb_detail_delivery->Applicable->ViewCustomAttributes = "";

			// Target
			$frm_1_t_du_pbb_detail_delivery->Target->ViewValue = $frm_1_t_du_pbb_detail_delivery->Target->CurrentValue;
			$frm_1_t_du_pbb_detail_delivery->Target->ViewCustomAttributes = "";

			// Target Cut-Off Date
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->ViewValue = $frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->CurrentValue;
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->ViewCustomAttributes = "";

			// Accomplishment
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->ViewValue = $frm_1_t_du_pbb_detail_delivery->Accomplishment->CurrentValue;
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->ViewCustomAttributes = "";

			// Numerator
			$frm_1_t_du_pbb_detail_delivery->Numerator->ViewValue = $frm_1_t_du_pbb_detail_delivery->Numerator->CurrentValue;
			$frm_1_t_du_pbb_detail_delivery->Numerator->ViewCustomAttributes = "";

			// Denominator
			$frm_1_t_du_pbb_detail_delivery->Denominator->ViewValue = $frm_1_t_du_pbb_detail_delivery->Denominator->CurrentValue;
			$frm_1_t_du_pbb_detail_delivery->Denominator->ViewCustomAttributes = "";

			// Accomplishment Remarks
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->ViewValue = $frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->CurrentValue;
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->ViewCustomAttributes = "";

			// a_cutOffDate_remarks
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->ViewValue = $frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->CurrentValue;
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// Below 100% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->ViewValue = $frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->CurrentValue;
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->ViewCustomAttributes = "";

			// 100% to 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->ViewValue = $frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->CurrentValue;
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->ViewCustomAttributes = "";

			// Above 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->ViewValue = $frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->CurrentValue;
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->ViewCustomAttributes = "";

			// Delivery Unit
			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->TooltipValue = "";

			// MFO
			$frm_1_t_du_pbb_detail_delivery->MFO->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->MFO->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->MFO->TooltipValue = "";

			// Applicable
			$frm_1_t_du_pbb_detail_delivery->Applicable->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Applicable->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->Applicable->TooltipValue = "";

			// Target
			$frm_1_t_du_pbb_detail_delivery->Target->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Target->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->Target->TooltipValue = "";

			// Target Cut-Off Date
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->TooltipValue = "";

			// Accomplishment
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->TooltipValue = "";

			// Numerator
			$frm_1_t_du_pbb_detail_delivery->Numerator->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Numerator->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->Numerator->TooltipValue = "";

			// Denominator
			$frm_1_t_du_pbb_detail_delivery->Denominator->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Denominator->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->Denominator->TooltipValue = "";

			// Accomplishment Remarks
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->TooltipValue = "";

			// a_cutOffDate_remarks
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->TooltipValue = "";

			// Below 100% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->TooltipValue = "";

			// 100% to 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->TooltipValue = "";

			// Above 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->LinkCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->HrefValue = "";
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->TooltipValue = "";
		} elseif ($frm_1_t_du_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add row

			// Delivery Unit
			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Delivery_Unit->CurrentValue);

			// MFO
			$frm_1_t_du_pbb_detail_delivery->MFO->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->MFO->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->MFO->CurrentValue);

			// Applicable
			$frm_1_t_du_pbb_detail_delivery->Applicable->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_1_t_du_pbb_detail_delivery->Applicable->FldTagCaption(1) <> "" ? $frm_1_t_du_pbb_detail_delivery->Applicable->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_1_t_du_pbb_detail_delivery->Applicable->FldTagCaption(2) <> "" ? $frm_1_t_du_pbb_detail_delivery->Applicable->FldTagCaption(2) : "N");
			$frm_1_t_du_pbb_detail_delivery->Applicable->EditValue = $arwrk;

			// Target
			$frm_1_t_du_pbb_detail_delivery->Target->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Target->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Target->CurrentValue);

			// Target Cut-Off Date
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->CurrentValue);

			// Accomplishment
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Accomplishment->CurrentValue);

			// Numerator
			$frm_1_t_du_pbb_detail_delivery->Numerator->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Numerator->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Numerator->CurrentValue);

			// Denominator
			$frm_1_t_du_pbb_detail_delivery->Denominator->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Denominator->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Denominator->CurrentValue);

			// Accomplishment Remarks
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->CurrentValue);

			// a_cutOffDate_remarks
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->CurrentValue);

			// Below 100% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->CurrentValue);

			// 100% to 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->CurrentValue);

			// Above 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->CurrentValue);

			// Edit refer script
			// Delivery Unit

			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->HrefValue = "";

			// MFO
			$frm_1_t_du_pbb_detail_delivery->MFO->HrefValue = "";

			// Applicable
			$frm_1_t_du_pbb_detail_delivery->Applicable->HrefValue = "";

			// Target
			$frm_1_t_du_pbb_detail_delivery->Target->HrefValue = "";

			// Target Cut-Off Date
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->HrefValue = "";

			// Accomplishment
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->HrefValue = "";

			// Numerator
			$frm_1_t_du_pbb_detail_delivery->Numerator->HrefValue = "";

			// Denominator
			$frm_1_t_du_pbb_detail_delivery->Denominator->HrefValue = "";

			// Accomplishment Remarks
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->HrefValue = "";

			// a_cutOffDate_remarks
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->HrefValue = "";

			// Below 100% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->HrefValue = "";

			// 100% to 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->HrefValue = "";

			// Above 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->HrefValue = "";
		} elseif ($frm_1_t_du_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// Delivery Unit
			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Delivery_Unit->CurrentValue);

			// MFO
			$frm_1_t_du_pbb_detail_delivery->MFO->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->MFO->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->MFO->CurrentValue);

			// Applicable
			$frm_1_t_du_pbb_detail_delivery->Applicable->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_1_t_du_pbb_detail_delivery->Applicable->FldTagCaption(1) <> "" ? $frm_1_t_du_pbb_detail_delivery->Applicable->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_1_t_du_pbb_detail_delivery->Applicable->FldTagCaption(2) <> "" ? $frm_1_t_du_pbb_detail_delivery->Applicable->FldTagCaption(2) : "N");
			$frm_1_t_du_pbb_detail_delivery->Applicable->EditValue = $arwrk;

			// Target
			$frm_1_t_du_pbb_detail_delivery->Target->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Target->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Target->CurrentValue);

			// Target Cut-Off Date
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->CurrentValue);

			// Accomplishment
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Accomplishment->CurrentValue);

			// Numerator
			$frm_1_t_du_pbb_detail_delivery->Numerator->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Numerator->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Numerator->CurrentValue);

			// Denominator
			$frm_1_t_du_pbb_detail_delivery->Denominator->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Denominator->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Denominator->CurrentValue);

			// Accomplishment Remarks
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->CurrentValue);

			// a_cutOffDate_remarks
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->CurrentValue);

			// Below 100% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->CurrentValue);

			// 100% to 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->CurrentValue);

			// Above 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->EditCustomAttributes = "";
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->EditValue = up_HtmlEncode($frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->CurrentValue);

			// Edit refer script
			// Delivery Unit

			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->HrefValue = "";

			// MFO
			$frm_1_t_du_pbb_detail_delivery->MFO->HrefValue = "";

			// Applicable
			$frm_1_t_du_pbb_detail_delivery->Applicable->HrefValue = "";

			// Target
			$frm_1_t_du_pbb_detail_delivery->Target->HrefValue = "";

			// Target Cut-Off Date
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->HrefValue = "";

			// Accomplishment
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->HrefValue = "";

			// Numerator
			$frm_1_t_du_pbb_detail_delivery->Numerator->HrefValue = "";

			// Denominator
			$frm_1_t_du_pbb_detail_delivery->Denominator->HrefValue = "";

			// Accomplishment Remarks
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->HrefValue = "";

			// a_cutOffDate_remarks
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->HrefValue = "";

			// Below 100% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->HrefValue = "";

			// 100% to 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->HrefValue = "";

			// Above 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->HrefValue = "";
		}
		if ($frm_1_t_du_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD ||
			$frm_1_t_du_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT ||
			$frm_1_t_du_pbb_detail_delivery->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_1_t_du_pbb_detail_delivery->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_1_t_du_pbb_detail_delivery->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_1_t_du_pbb_detail_delivery->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_1_t_du_pbb_detail_delivery;

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckNumber($frm_1_t_du_pbb_detail_delivery->Target->FormValue)) {
			up_AddMessage($gsFormError, $frm_1_t_du_pbb_detail_delivery->Target->FldErrMsg());
		}
		if (!up_CheckNumber($frm_1_t_du_pbb_detail_delivery->Accomplishment->FormValue)) {
			up_AddMessage($gsFormError, $frm_1_t_du_pbb_detail_delivery->Accomplishment->FldErrMsg());
		}
		if (!up_CheckNumber($frm_1_t_du_pbb_detail_delivery->Numerator->FormValue)) {
			up_AddMessage($gsFormError, $frm_1_t_du_pbb_detail_delivery->Numerator->FldErrMsg());
		}
		if (!up_CheckNumber($frm_1_t_du_pbb_detail_delivery->Denominator->FormValue)) {
			up_AddMessage($gsFormError, $frm_1_t_du_pbb_detail_delivery->Denominator->FldErrMsg());
		}
		if (!up_CheckNumber($frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->FormValue)) {
			up_AddMessage($gsFormError, $frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->FldErrMsg());
		}
		if (!up_CheckNumber($frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->FormValue)) {
			up_AddMessage($gsFormError, $frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->FldErrMsg());
		}
		if (!up_CheckNumber($frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->FormValue)) {
			up_AddMessage($gsFormError, $frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->FldErrMsg());
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
		global $conn, $Language, $Security, $frm_1_t_du_pbb_detail_delivery;
		$DeleteRows = TRUE;
		$sSql = $frm_1_t_du_pbb_detail_delivery->SQL();
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
				$DeleteRows = $frm_1_t_du_pbb_detail_delivery->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['pbb_delivery_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_1_t_du_pbb_detail_delivery->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_1_t_du_pbb_detail_delivery->CancelMessage <> "") {
				$this->setFailureMessage($frm_1_t_du_pbb_detail_delivery->CancelMessage);
				$frm_1_t_du_pbb_detail_delivery->CancelMessage = "";
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
				$frm_1_t_du_pbb_detail_delivery->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $frm_1_t_du_pbb_detail_delivery;
		$sFilter = $frm_1_t_du_pbb_detail_delivery->KeyFilter();
		$frm_1_t_du_pbb_detail_delivery->CurrentFilter = $sFilter;
		$sSql = $frm_1_t_du_pbb_detail_delivery->SQL();
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

			// Delivery Unit
			$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Delivery_Unit->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->Delivery_Unit->ReadOnly);

			// MFO
			$frm_1_t_du_pbb_detail_delivery->MFO->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->MFO->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->MFO->ReadOnly);

			// Applicable
			$frm_1_t_du_pbb_detail_delivery->Applicable->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Applicable->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->Applicable->ReadOnly);

			// Target
			$frm_1_t_du_pbb_detail_delivery->Target->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Target->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->Target->ReadOnly);

			// Target Cut-Off Date
			$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->ReadOnly);

			// Accomplishment
			$frm_1_t_du_pbb_detail_delivery->Accomplishment->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Accomplishment->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->Accomplishment->ReadOnly);

			// Numerator
			$frm_1_t_du_pbb_detail_delivery->Numerator->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Numerator->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->Numerator->ReadOnly);

			// Denominator
			$frm_1_t_du_pbb_detail_delivery->Denominator->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Denominator->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->Denominator->ReadOnly);

			// Accomplishment Remarks
			$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->ReadOnly);

			// a_cutOffDate_remarks
			$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->ReadOnly);

			// Below 100% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->ReadOnly);

			// 100% to 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->ReadOnly);

			// Above 120% Performance Rating
			$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->CurrentValue, NULL, $frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_1_t_du_pbb_detail_delivery->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_1_t_du_pbb_detail_delivery->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_1_t_du_pbb_detail_delivery->CancelMessage <> "") {
					$this->setFailureMessage($frm_1_t_du_pbb_detail_delivery->CancelMessage);
					$frm_1_t_du_pbb_detail_delivery->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_1_t_du_pbb_detail_delivery->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $frm_1_t_du_pbb_detail_delivery;

		// Check if valid key values for master user
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $frm_1_t_du_pbb_detail_delivery->SqlMasterFilter_frm_1_t_du_delivery_pi_status();
			if (strval($frm_1_t_du_pbb_detail_delivery->unit_delivery_id->CurrentValue) <> "" &&
				$frm_1_t_du_pbb_detail_delivery->getCurrentMasterTable() == "frm_1_t_du_delivery_pi_status") {
				$sFilter = str_replace("@unit_delivery_id@", up_AdjustSql($frm_1_t_du_pbb_detail_delivery->unit_delivery_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if (strval($frm_1_t_du_pbb_detail_delivery->mfo_question_online_insert_question_mfo_name_rep->CurrentValue) <> "" &&
				$frm_1_t_du_pbb_detail_delivery->getCurrentMasterTable() == "frm_1_t_du_delivery_pi_status") {
				$sFilter = str_replace("@MFO@", up_AdjustSql($frm_1_t_du_pbb_detail_delivery->mfo_question_online_insert_question_mfo_name_rep->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if ($sFilter <> "") {
				$rsmaster = $GLOBALS["frm_1_t_du_delivery_pi_status"]->LoadRs($sFilter);
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
			if ($frm_1_t_du_pbb_detail_delivery->getCurrentMasterTable() == "frm_1_t_du_delivery_pi_status") {
				$frm_1_t_du_pbb_detail_delivery->unit_delivery_id->CurrentValue = $frm_1_t_du_pbb_detail_delivery->unit_delivery_id->getSessionValue();
				$frm_1_t_du_pbb_detail_delivery->mfo_question_online_insert_question_mfo_name_rep->CurrentValue = $frm_1_t_du_pbb_detail_delivery->mfo_question_online_insert_question_mfo_name_rep->getSessionValue();
			}
		$rsnew = array();

		// Delivery Unit
		$frm_1_t_du_pbb_detail_delivery->Delivery_Unit->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Delivery_Unit->CurrentValue, NULL, FALSE);

		// MFO
		$frm_1_t_du_pbb_detail_delivery->MFO->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->MFO->CurrentValue, NULL, FALSE);

		// Applicable
		$frm_1_t_du_pbb_detail_delivery->Applicable->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Applicable->CurrentValue, NULL, FALSE);

		// Target
		$frm_1_t_du_pbb_detail_delivery->Target->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Target->CurrentValue, NULL, FALSE);

		// Target Cut-Off Date
		$frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Target_Cut2DOff_Date->CurrentValue, NULL, FALSE);

		// Accomplishment
		$frm_1_t_du_pbb_detail_delivery->Accomplishment->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Accomplishment->CurrentValue, NULL, FALSE);

		// Numerator
		$frm_1_t_du_pbb_detail_delivery->Numerator->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Numerator->CurrentValue, NULL, FALSE);

		// Denominator
		$frm_1_t_du_pbb_detail_delivery->Denominator->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Denominator->CurrentValue, NULL, FALSE);

		// Accomplishment Remarks
		$frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Accomplishment_Remarks->CurrentValue, NULL, FALSE);

		// a_cutOffDate_remarks
		$frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->a_cutOffDate_remarks->CurrentValue, NULL, FALSE);

		// Below 100% Performance Rating
		$frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Below_10025_Performance_Rating->CurrentValue, NULL, FALSE);

		// 100% to 120% Performance Rating
		$frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->z10025_to_12025_Performance_Rating->CurrentValue, NULL, FALSE);

		// Above 120% Performance Rating
		$frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->SetDbValueDef($rsnew, $frm_1_t_du_pbb_detail_delivery->Above_12025_Performance_Rating->CurrentValue, NULL, FALSE);

		// unit_delivery_id
		if ($frm_1_t_du_pbb_detail_delivery->unit_delivery_id->getSessionValue() <> "") {
			$rsnew['unit_delivery_id'] = $frm_1_t_du_pbb_detail_delivery->unit_delivery_id->getSessionValue();
		} elseif (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['unit_delivery_id'] = CurrentUserID();
		}

		// mfo_question_online_insert_question_mfo_name_rep
		if ($frm_1_t_du_pbb_detail_delivery->mfo_question_online_insert_question_mfo_name_rep->getSessionValue() <> "") {
			$rsnew['mfo_question_online_insert_question_mfo_name_rep'] = $frm_1_t_du_pbb_detail_delivery->mfo_question_online_insert_question_mfo_name_rep->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_1_t_du_pbb_detail_delivery->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_1_t_du_pbb_detail_delivery->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_1_t_du_pbb_detail_delivery->CancelMessage <> "") {
				$this->setFailureMessage($frm_1_t_du_pbb_detail_delivery->CancelMessage);
				$frm_1_t_du_pbb_detail_delivery->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$frm_1_t_du_pbb_detail_delivery->pbb_delivery_id->setDbValue($conn->Insert_ID());
			$rsnew['pbb_delivery_id'] = $frm_1_t_du_pbb_detail_delivery->pbb_delivery_id->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$frm_1_t_du_pbb_detail_delivery->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_1_t_du_pbb_detail_delivery;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_1_t_du_pbb_detail_delivery->unit_delivery_id->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_1_t_du_pbb_detail_delivery;

		// Hide foreign keys
		$sMasterTblVar = $frm_1_t_du_pbb_detail_delivery->getCurrentMasterTable();
		if ($sMasterTblVar == "frm_1_t_du_delivery_pi_status") {
			$frm_1_t_du_pbb_detail_delivery->unit_delivery_id->Visible = FALSE;
			if ($GLOBALS["frm_1_t_du_delivery_pi_status"]->EventCancelled) $frm_1_t_du_pbb_detail_delivery->EventCancelled = TRUE;
			$frm_1_t_du_pbb_detail_delivery->mfo_question_online_insert_question_mfo_name_rep->Visible = FALSE;
			if ($GLOBALS["frm_1_t_du_delivery_pi_status"]->EventCancelled) $frm_1_t_du_pbb_detail_delivery->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $frm_1_t_du_pbb_detail_delivery->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_1_t_du_pbb_detail_delivery->getDetailFilter(); // Get detail filter
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
