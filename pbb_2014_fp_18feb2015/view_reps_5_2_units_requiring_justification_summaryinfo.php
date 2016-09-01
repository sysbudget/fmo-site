<?php

// Global variable for table object
$view_reps_5_2_units_requiring_justification_summary = NULL;

//
// Table class for view_reps_5_2_units_requiring_justification_summary
//
class cview_reps_5_2_units_requiring_justification_summary {
	var $TableVar = 'view_reps_5_2_units_requiring_justification_summary';
	var $TableName = 'view_reps_5_2_units_requiring_justification_summary';
	var $TableType = 'VIEW';
	var $Constituent_University;
	var $PIs_that_Passed;
	var $PIs_that_Requires_Justificiation;
	var $PIs_with_No_Accomplishment;
	var $No2E_of_PI_Participated;
	var $Sequence;
	var $focalperson_ID;
	var $fields = array();
	var $UseTokenInUrl = UP_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = UP_EXPORT_ORIGINAL_VALUE;
	var $ExportAll = TRUE;
	var $ExportPageBreakCount = 0; // Page break per every n record (PDF only)
	var $SendEmail; // Send email
	var $TableCustomInnerHtml; // Custom inner HTML
	var $BasicSearchKeyword; // Basic search keyword
	var $BasicSearchType; // Basic search type
	var $CurrentFilter; // Current filter
	var $CurrentOrder; // Current order
	var $CurrentOrderType; // Current order type
	var $RowType; // Row type
	var $CssClass; // CSS class
	var $CssStyle; // CSS style
	var $RowAttrs = array(); // Row custom attributes

	// Reset attributes for table object
	function ResetAttrs() {
		$this->CssClass = "";
		$this->CssStyle = "";
    	$this->RowAttrs = array();
		foreach ($this->fields as $fld) {
			$fld->ResetAttrs();
		}
	}

	// Setup field titles
	function SetupFieldTitles() {
		foreach ($this->fields as &$fld) {
			if (strval($fld->FldTitle()) <> "") {
				$fld->EditAttrs["onmouseover"] = "up_ShowTitle(this, '" . up_JsEncode3($fld->FldTitle()) . "');";
				$fld->EditAttrs["onmouseout"] = "up_HideTooltip();";
			}
		}
	}
	var $TableFilter = "";
	var $CurrentAction; // Current action
	var $LastAction; // Last action
	var $CurrentMode = ""; // Current mode
	var $UpdateConflict; // Update conflict
	var $EventName; // Event name
	var $EventCancelled; // Event cancelled
	var $CancelMessage; // Cancel message
	var $AllowAddDeleteRow = TRUE; // Allow add/delete row
	var $DetailAdd = FALSE; // Allow detail add
	var $DetailEdit = FALSE; // Allow detail edit
	var $GridAddRowCount = 5;

	// Check current action
	// - Add
	function IsAdd() {
		return $this->CurrentAction == "add";
	}

	// - Copy
	function IsCopy() {
		return $this->CurrentAction == "copy" || $this->CurrentAction == "C";
	}

	// - Edit
	function IsEdit() {
		return $this->CurrentAction == "edit";
	}

	// - Delete
	function IsDelete() {
		return $this->CurrentAction == "D";
	}

	// - Confirm
	function IsConfirm() {
		return $this->CurrentAction == "F";
	}

	// - Overwrite
	function IsOverwrite() {
		return $this->CurrentAction == "overwrite";
	}

	// - Cancel
	function IsCancel() {
		return $this->CurrentAction == "cancel";
	}

	// - Grid add
	function IsGridAdd() {
		return $this->CurrentAction == "gridadd";
	}

	// - Grid edit
	function IsGridEdit() {
		return $this->CurrentAction == "gridedit";
	}

	// - Insert
	function IsInsert() {
		return $this->CurrentAction == "insert" || $this->CurrentAction == "A";
	}

	// - Update
	function IsUpdate() {
		return $this->CurrentAction == "update" || $this->CurrentAction == "U";
	}

	// - Grid update
	function IsGridUpdate() {
		return $this->CurrentAction == "gridupdate";
	}

	// - Grid insert
	function IsGridInsert() {
		return $this->CurrentAction == "gridinsert";
	}

	// - Grid overwrite
	function IsGridOverwrite() {
		return $this->CurrentAction == "gridoverwrite";
	}

	// Check last action
	// - Cancelled
	function IsCanceled() {
		return $this->LastAction == "cancel" && $this->CurrentAction == "";
	}

	// - Inline inserted
	function IsInlineInserted() {
		return $this->LastAction == "insert" && $this->CurrentAction == "";
	}

	// - Inline updated
	function IsInlineUpdated() {
		return $this->LastAction == "update" && $this->CurrentAction == "";
	}

	// - Grid updated
	function IsGridUpdated() {
		return $this->LastAction == "gridupdate" && $this->CurrentAction == "";
	}

	// - Grid inserted
	function IsGridInserted() {
		return $this->LastAction == "gridinsert" && $this->CurrentAction == "";
	}

	//
	// Table class constructor
	//
	function cview_reps_5_2_units_requiring_justification_summary() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// Constituent University
		$this->Constituent_University = new cField('view_reps_5_2_units_requiring_justification_summary', 'view_reps_5_2_units_requiring_justification_summary', 'x_Constituent_University', 'Constituent University', '`Constituent University`', 200, -1, FALSE, '`Constituent University`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Constituent University'] =& $this->Constituent_University;

		// PIs that Passed
		$this->PIs_that_Passed = new cField('view_reps_5_2_units_requiring_justification_summary', 'view_reps_5_2_units_requiring_justification_summary', 'x_PIs_that_Passed', 'PIs that Passed', '`PIs that Passed`', 20, -1, FALSE, '`PIs that Passed`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PIs_that_Passed->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PIs that Passed'] =& $this->PIs_that_Passed;

		// PIs that Requires Justificiation
		$this->PIs_that_Requires_Justificiation = new cField('view_reps_5_2_units_requiring_justification_summary', 'view_reps_5_2_units_requiring_justification_summary', 'x_PIs_that_Requires_Justificiation', 'PIs that Requires Justificiation', '`PIs that Requires Justificiation`', 20, -1, FALSE, '`PIs that Requires Justificiation`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PIs_that_Requires_Justificiation->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PIs that Requires Justificiation'] =& $this->PIs_that_Requires_Justificiation;

		// PIs with No Accomplishment
		$this->PIs_with_No_Accomplishment = new cField('view_reps_5_2_units_requiring_justification_summary', 'view_reps_5_2_units_requiring_justification_summary', 'x_PIs_with_No_Accomplishment', 'PIs with No Accomplishment', '`PIs with No Accomplishment`', 20, -1, FALSE, '`PIs with No Accomplishment`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PIs_with_No_Accomplishment->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PIs with No Accomplishment'] =& $this->PIs_with_No_Accomplishment;

		// No. of PI Participated
		$this->No2E_of_PI_Participated = new cField('view_reps_5_2_units_requiring_justification_summary', 'view_reps_5_2_units_requiring_justification_summary', 'x_No2E_of_PI_Participated', 'No. of PI Participated', '`No. of PI Participated`', 20, -1, FALSE, '`No. of PI Participated`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->No2E_of_PI_Participated->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['No. of PI Participated'] =& $this->No2E_of_PI_Participated;

		// Sequence
		$this->Sequence = new cField('view_reps_5_2_units_requiring_justification_summary', 'view_reps_5_2_units_requiring_justification_summary', 'x_Sequence', 'Sequence', '`Sequence`', 21, -1, FALSE, '`Sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Sequence'] =& $this->Sequence;

		// focalperson_ID
		$this->focalperson_ID = new cField('view_reps_5_2_units_requiring_justification_summary', 'view_reps_5_2_units_requiring_justification_summary', 'x_focalperson_ID', 'focalperson_ID', '`focalperson_ID`', 3, -1, FALSE, '`focalperson_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focalperson_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focalperson_ID'] =& $this->focalperson_ID;
	}

	// Get field values
	function GetFieldValues($propertyname) {
		$values = array();
		foreach ($this->fields as $fldname => $fld)
			$values[$fldname] =& $fld->$propertyname;
		return $values;
	}

	// Table caption
	function TableCaption() {
		global $Language;
		return $Language->TablePhrase($this->TableVar, "TblCaption");
	}

	// Page caption
	function PageCaption($Page) {
		global $Language;
		$Caption = $Language->TablePhrase($this->TableVar, "TblPageCaption" . $Page);
		if ($Caption == "") $Caption = "Page " . $Page;
		return $Caption;
	}

	// Export return page
	function ExportReturnUrl() {
		$url = @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_EXPORT_RETURN_URL];
		return ($url <> "") ? $url : up_CurrentPage();
	}

	function setExportReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_EXPORT_RETURN_URL] = $v;
	}

	// Records per page
	function getRecordsPerPage() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_REC_PER_PAGE];
	}

	function setRecordsPerPage($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_REC_PER_PAGE] = $v;
	}

	// Start record number
	function getStartRecordNumber() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_START_REC];
	}

	function setStartRecordNumber($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_START_REC] = $v;
	}

	// Search highlight name
	function HighlightName() {
		return "view_reps_5_2_units_requiring_justification_summary_Highlight";
	}

	// Advanced search
	function getAdvancedSearch($fld) {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ADVANCED_SEARCH . "_" . $fld];
	}

	function setAdvancedSearch($fld, $v) {
		if (@$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ADVANCED_SEARCH . "_" . $fld] <> $v) {
			$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ADVANCED_SEARCH . "_" . $fld] = $v;
		}
	}

	// Basic search keyword
	function getSessionBasicSearchKeyword() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_BASIC_SEARCH];
	}

	function setSessionBasicSearchKeyword($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_BASIC_SEARCH] = $v;
	}

	// Basic search type
	function getSessionBasicSearchType() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_BASIC_SEARCH_TYPE];
	}

	function setSessionBasicSearchType($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_BASIC_SEARCH_TYPE] = $v;
	}

	// Search WHERE clause
	function getSearchWhere() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_SEARCH_WHERE];
	}

	function setSearchWhere($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_SEARCH_WHERE] = $v;
	}

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			$this->setSessionOrderBy($sSortField . " " . $sThisSort); // Save to Session
		} else {
			$ofld->setSort("");
		}
	}

	// Session WHERE clause
	function getSessionWhere() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_WHERE];
	}

	function setSessionWhere($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_WHERE] = $v;
	}

	// Session ORDER BY
	function getSessionOrderBy() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ORDER_BY];
	}

	function setSessionOrderBy($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ORDER_BY] = $v;
	}

	// Session key
	function getKey($fld) {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_KEY . "_" . $fld];
	}

	function setKey($fld, $v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_KEY . "_" . $fld] = $v;
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`view_reps_5_2_units_requiring_justification_summary`";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
		$sWhere = "";
		$this->TableFilter = "";
		up_AddFilter($sWhere, $this->TableFilter);
		return $sWhere;
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "";
	}

	// Check if Anonymous User is allowed
	function AllowAnonymousUser() {
		switch (UP_PAGE_ID) {
			case "add":
			case "register":
			case "addopt":
				return FALSE;
			case "edit":
			case "update":
				return FALSE;
			case "delete":
				return FALSE;
			case "view":
				return FALSE;
			case "search":
				return FALSE;
			default:
				return FALSE;
		}
	}

	// Apply User ID filters
	function ApplyUserIDFilters($sFilter) {
		global $Security;

		// Add User ID filter
		if (!$this->AllowAnonymousUser() && $Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $this->AddUserIDFilter($sFilter);
		}
		return $sFilter;
	}

	// Get SQL
	function GetSQL($where, $orderby) {
		return up_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$where, $orderby);
	}

	// Table SQL
	function SQL() {
		$sFilter = $this->CurrentFilter;
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = $this->getSessionOrderBy();
		return up_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Table SQL with List page filter
	function SelectSQL() {
		$sFilter = $this->getSessionWhere();
		up_AddFilter($sFilter, $this->CurrentFilter);
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = $this->getSessionOrderBy();
		return up_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(), $this->SqlGroupBy(),
			$this->SqlHaving(), $this->SqlOrderBy(), $sFilter, $sSort);
	}

	// Try to get record count
	function TryGetRecordCount($sSql) {
		global $conn;
		$cnt = -1;
		if ($this->TableType == 'TABLE' || $this->TableType == 'VIEW') {
			$sSql = "SELECT COUNT(*) FROM" . substr($sSql, 13);
		} else {
			$sSql = "SELECT COUNT(*) FROM (" . $sSql . ") UP_COUNT_TABLE";
		}
		if ($rs = $conn->Execute($sSql)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->Close();
			}
		}
		return intval($cnt);
	}

	// Get record count based on filter (for detail record count in master table pages)
	function LoadRecordCount($sFilter) {
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $sFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$sSql = $this->SQL();
		$cnt = $this->TryGetRecordCount($sSql);
		if ($cnt == -1) {
			if ($rs = $this->LoadRs($this->CurrentFilter)) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $origFilter;
		return intval($cnt);
	}

	// Get record count (for current List page)
	function SelectRecordCount() {
		global $conn;
		$origFilter = $this->CurrentFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$sSql = $this->SelectSQL();
		$cnt = $this->TryGetRecordCount($sSql);
		if ($cnt == -1) {
			if ($rs = $conn->Execute($this->SelectSQL())) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $origFilter;
		return intval($cnt);
	}

	// INSERT statement
	function InsertSQL(&$rs) {
		global $conn;
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= up_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `view_reps_5_2_units_requiring_justification_summary` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `view_reps_5_2_units_requiring_justification_summary` SET ";
		foreach ($rs as $name => $value) {
			$SQL .= $this->fields[$name]->FldExpression . "=";
			$SQL .= up_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM `view_reps_5_2_units_requiring_justification_summary` WHERE ";
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		return $sKeyFilter;
	}

	// Return page URL
	function getReturnUrl() {
		$name = UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL;

		// Get referer URL automatically
		if (up_ServerVar("HTTP_REFERER") <> "" && up_ReferPage() <> up_CurrentPage() && up_ReferPage() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = up_ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "view_reps_5_2_units_requiring_justification_summarylist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "view_reps_5_2_units_requiring_justification_summarylist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("view_reps_5_2_units_requiring_justification_summaryview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "view_reps_5_2_units_requiring_justification_summaryadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("view_reps_5_2_units_requiring_justification_summaryedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("view_reps_5_2_units_requiring_justification_summaryadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("view_reps_5_2_units_requiring_justification_summarydelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		return $sUrl;
	}

	// Sort URL
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			in_array($fld->FldType, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$sUrlParm = $this->UrlParm("order=" . urlencode($fld->FldName) . "&ordertype=" . $fld->ReverseSort());
			return up_CurrentPage() . "?" . $sUrlParm;
		} else {
			return "";
		}
	}

	// Add URL parameter
	function UrlParm($parm = "") {
		$UrlParm = ($this->UseTokenInUrl) ? "t=view_reps_5_2_units_requiring_justification_summary" : "";
		if ($parm <> "") {
			if ($UrlParm <> "")
				$UrlParm .= "&";
			$UrlParm .= $parm;
		}
		return $UrlParm;
	}

	// Get record keys from $_POST/$_GET/$_SESSION
	function GetRecordKeys() {
		$arKeys = array();
		$arKey = array();
		if (isset($_POST["key_m"])) {
			$arKeys = up_StripSlashes($_POST["key_m"]);
			$cnt = count($arKeys);
		} elseif (isset($_GET["key_m"])) {
			$arKeys = up_StripSlashes($_GET["key_m"]);
			$cnt = count($arKeys);
		} elseif (isset($_GET)) {

			//return $arKeys; // do not return yet, so the values will also be checked by the following code
		}

		// check keys
		$ar = array();
		foreach ($arKeys as $key) {
			$ar[] = $key;
		}
		return $ar;
	}

	// Get key filter
	function GetKeyFilter() {
		$arKeys = $this->GetRecordKeys();
		$sKeyFilter = "";
		foreach ($arKeys as $key) {
			if ($sKeyFilter <> "") $sKeyFilter .= " OR ";
			$sKeyFilter .= "(" . $this->KeyFilter() . ")";
		}
		return $sKeyFilter;
	}

	// Load rows based on filter
	function &LoadRs($sFilter) {
		global $conn;

		// Set up filter (SQL WHERE clause) and get return SQL
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		$rs = $conn->Execute($sSql);
		return $rs;
	}

	// Load row values from recordset
	function LoadListRowValues(&$rs) {
		$this->Constituent_University->setDbValue($rs->fields('Constituent University'));
		$this->PIs_that_Passed->setDbValue($rs->fields('PIs that Passed'));
		$this->PIs_that_Requires_Justificiation->setDbValue($rs->fields('PIs that Requires Justificiation'));
		$this->PIs_with_No_Accomplishment->setDbValue($rs->fields('PIs with No Accomplishment'));
		$this->No2E_of_PI_Participated->setDbValue($rs->fields('No. of PI Participated'));
		$this->Sequence->setDbValue($rs->fields('Sequence'));
		$this->focalperson_ID->setDbValue($rs->fields('focalperson_ID'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// Constituent University

		$this->Constituent_University->CellCssStyle = "white-space: nowrap;";

		// PIs that Passed
		$this->PIs_that_Passed->CellCssStyle = "white-space: nowrap;";

		// PIs that Requires Justificiation
		$this->PIs_that_Requires_Justificiation->CellCssStyle = "white-space: nowrap;";

		// PIs with No Accomplishment
		$this->PIs_with_No_Accomplishment->CellCssStyle = "white-space: nowrap;";

		// No. of PI Participated
		$this->No2E_of_PI_Participated->CellCssStyle = "white-space: nowrap;";

		// Sequence
		// focalperson_ID
		// Constituent University

		$this->Constituent_University->ViewValue = $this->Constituent_University->CurrentValue;
		$this->Constituent_University->ViewCustomAttributes = "";

		// PIs that Passed
		$this->PIs_that_Passed->ViewValue = $this->PIs_that_Passed->CurrentValue;
		$this->PIs_that_Passed->ViewCustomAttributes = "";

		// PIs that Requires Justificiation
		$this->PIs_that_Requires_Justificiation->ViewValue = $this->PIs_that_Requires_Justificiation->CurrentValue;
		$this->PIs_that_Requires_Justificiation->ViewCustomAttributes = "";

		// PIs with No Accomplishment
		$this->PIs_with_No_Accomplishment->ViewValue = $this->PIs_with_No_Accomplishment->CurrentValue;
		$this->PIs_with_No_Accomplishment->ViewCustomAttributes = "";

		// No. of PI Participated
		$this->No2E_of_PI_Participated->ViewValue = $this->No2E_of_PI_Participated->CurrentValue;
		$this->No2E_of_PI_Participated->ViewCustomAttributes = "";

		// Sequence
		$this->Sequence->ViewValue = $this->Sequence->CurrentValue;
		$this->Sequence->ViewCustomAttributes = "";

		// focalperson_ID
		$this->focalperson_ID->ViewValue = $this->focalperson_ID->CurrentValue;
		$this->focalperson_ID->ViewCustomAttributes = "";

		// Constituent University
		$this->Constituent_University->LinkCustomAttributes = "";
		$this->Constituent_University->HrefValue = "";
		$this->Constituent_University->TooltipValue = "";

		// PIs that Passed
		$this->PIs_that_Passed->LinkCustomAttributes = "";
		$this->PIs_that_Passed->HrefValue = "";
		$this->PIs_that_Passed->TooltipValue = "";

		// PIs that Requires Justificiation
		$this->PIs_that_Requires_Justificiation->LinkCustomAttributes = "";
		$this->PIs_that_Requires_Justificiation->HrefValue = "";
		$this->PIs_that_Requires_Justificiation->TooltipValue = "";

		// PIs with No Accomplishment
		$this->PIs_with_No_Accomplishment->LinkCustomAttributes = "";
		$this->PIs_with_No_Accomplishment->HrefValue = "";
		$this->PIs_with_No_Accomplishment->TooltipValue = "";

		// No. of PI Participated
		$this->No2E_of_PI_Participated->LinkCustomAttributes = "";
		$this->No2E_of_PI_Participated->HrefValue = "";
		$this->No2E_of_PI_Participated->TooltipValue = "";

		// Sequence
		$this->Sequence->LinkCustomAttributes = "";
		$this->Sequence->HrefValue = "";
		$this->Sequence->TooltipValue = "";

		// focalperson_ID
		$this->focalperson_ID->LinkCustomAttributes = "";
		$this->focalperson_ID->HrefValue = "";
		$this->focalperson_ID->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	function AggregateListRowValues() {
	}

	// Aggregate list row (for rendering)
	function AggregateListRow() {
	}

	// Export data in Xml Format
	function ExportXmlDocument(&$XmlDoc, $HasParent, &$Recordset, $StartRec, $StopRec, $ExportPageType = "") {
		if (!$Recordset || !$XmlDoc)
			return;
		if (!$HasParent)
			$XmlDoc->AddRoot($this->TableVar);

		// Move to first record
		$RecCnt = $StartRec - 1;
		if (!$Recordset->EOF) {
			$Recordset->MoveFirst();
			if ($StartRec > 1)
				$Recordset->Move($StartRec - 1);
		}
		while (!$Recordset->EOF && $RecCnt < $StopRec) {
			$RecCnt++;
			if (intval($RecCnt) >= intval($StartRec)) {
				$RowCnt = intval($RecCnt) - intval($StartRec) + 1;
				$this->LoadListRowValues($Recordset);

				// Render row
				$this->RowType = UP_ROWTYPE_VIEW; // Render view
				$this->ResetAttrs();
				$this->RenderListRow();
				if ($HasParent)
					$XmlDoc->AddRow($this->TableVar);
				else
					$XmlDoc->AddRow();
				if ($ExportPageType == "view") {
					$XmlDoc->AddField('Constituent_University', $this->Constituent_University->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PIs_that_Passed', $this->PIs_that_Passed->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PIs_that_Requires_Justificiation', $this->PIs_that_Requires_Justificiation->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PIs_with_No_Accomplishment', $this->PIs_with_No_Accomplishment->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('No2E_of_PI_Participated', $this->No2E_of_PI_Participated->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Sequence', $this->Sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focalperson_ID', $this->focalperson_ID->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('Constituent_University', $this->Constituent_University->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PIs_that_Passed', $this->PIs_that_Passed->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PIs_that_Requires_Justificiation', $this->PIs_that_Requires_Justificiation->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PIs_with_No_Accomplishment', $this->PIs_with_No_Accomplishment->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('No2E_of_PI_Participated', $this->No2E_of_PI_Participated->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Sequence', $this->Sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focalperson_ID', $this->focalperson_ID->ExportValue($this->Export, $this->ExportOriginalValue));
				}
			}
			$Recordset->MoveNext();
		}
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	function ExportDocument(&$Doc, &$Recordset, $StartRec, $StopRec, $ExportPageType = "") {
		if (!$Recordset || !$Doc)
			return;

		// Write header
		$Doc->ExportTableHeader();
		if ($Doc->Horizontal) { // Horizontal format, write header
			$Doc->BeginExportRow();
			if ($ExportPageType == "view") {
				$Doc->ExportCaption($this->Constituent_University);
				$Doc->ExportCaption($this->PIs_that_Passed);
				$Doc->ExportCaption($this->PIs_that_Requires_Justificiation);
				$Doc->ExportCaption($this->PIs_with_No_Accomplishment);
				$Doc->ExportCaption($this->No2E_of_PI_Participated);
				$Doc->ExportCaption($this->Sequence);
				$Doc->ExportCaption($this->focalperson_ID);
			} else {
				$Doc->ExportCaption($this->Constituent_University);
				$Doc->ExportCaption($this->PIs_that_Passed);
				$Doc->ExportCaption($this->PIs_that_Requires_Justificiation);
				$Doc->ExportCaption($this->PIs_with_No_Accomplishment);
				$Doc->ExportCaption($this->No2E_of_PI_Participated);
				$Doc->ExportCaption($this->Sequence);
				$Doc->ExportCaption($this->focalperson_ID);
			}
			if ($this->Export == "pdf") {
				$Doc->EndExportRow(TRUE);
			} else {
				$Doc->EndExportRow();
			}
		}

		// Move to first record
		$RecCnt = $StartRec - 1;
		if (!$Recordset->EOF) {
			$Recordset->MoveFirst();
			if ($StartRec > 1)
				$Recordset->Move($StartRec - 1);
		}
		while (!$Recordset->EOF && $RecCnt < $StopRec) {
			$RecCnt++;
			if (intval($RecCnt) >= intval($StartRec)) {
				$RowCnt = intval($RecCnt) - intval($StartRec) + 1;

				// Page break for PDF
				if ($this->Export == "pdf" && $this->ExportPageBreakCount > 0) {
					if ($RowCnt > 1 && ($RowCnt - 1) % $this->ExportPageBreakCount == 0)
						$Doc->ExportPageBreak();
				}
				$this->LoadListRowValues($Recordset);

				// Render row
				$this->RowType = UP_ROWTYPE_VIEW; // Render view
				$this->ResetAttrs();
				$this->RenderListRow();
				$Doc->BeginExportRow($RowCnt); // Allow CSS styles if enabled
				if ($ExportPageType == "view") {
					$Doc->ExportField($this->Constituent_University);
					$Doc->ExportField($this->PIs_that_Passed);
					$Doc->ExportField($this->PIs_that_Requires_Justificiation);
					$Doc->ExportField($this->PIs_with_No_Accomplishment);
					$Doc->ExportField($this->No2E_of_PI_Participated);
					$Doc->ExportField($this->Sequence);
					$Doc->ExportField($this->focalperson_ID);
				} else {
					$Doc->ExportField($this->Constituent_University);
					$Doc->ExportField($this->PIs_that_Passed);
					$Doc->ExportField($this->PIs_that_Requires_Justificiation);
					$Doc->ExportField($this->PIs_with_No_Accomplishment);
					$Doc->ExportField($this->No2E_of_PI_Participated);
					$Doc->ExportField($this->Sequence);
					$Doc->ExportField($this->focalperson_ID);
				}
				$Doc->EndExportRow();
			}
			$Recordset->MoveNext();
		}
		$Doc->ExportTableFooter();
	}

	// Add User ID filter
	function AddUserIDFilter($sFilter) {
		global $Security;
		if (!$Security->IsAdmin()) {
			$sFilterWrk = $Security->UserIDList();
			if ($sFilterWrk <> "")
				$sFilterWrk = '`focalperson_ID` IN (' . $sFilterWrk . ')';
			up_AddFilter($sFilterWrk, $sFilter);
			return $sFilterWrk;
		} else {
			return $sFilter;
		}
	}

	// User ID subquery
	function GetUserIDSubquery(&$fld, &$masterfld) {
		global $conn;
		$sWrk = "";
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `view_reps_5_2_units_requiring_justification_summary` WHERE " . $this->AddUserIDFilter("");

		// List all values
		if ($rs = $conn->Execute($sSql)) {
			while (!$rs->EOF) {
				if ($sWrk <> "") $sWrk .= ",";
				$sWrk .= up_QuotedValue($rs->fields[0], $masterfld->FldDataType);
				$rs->MoveNext();
			}
			$rs->Close();
		}
		if ($sWrk <> "") {
			$sWrk = $fld->FldExpression . " IN (" . $sWrk . ")";
		}
		return $sWrk;
	}

	// Row styles
	function RowStyles() {
		$sAtt = "";
		$sStyle = trim($this->CssStyle);
		if (@$this->RowAttrs["style"] <> "")
			$sStyle .= " " . $this->RowAttrs["style"];
		$sClass = trim($this->CssClass);
		if (@$this->RowAttrs["class"] <> "")
			$sClass .= " " . $this->RowAttrs["class"];
		if (trim($sStyle) <> "")
			$sAtt .= " style=\"" . trim($sStyle) . "\"";
		if (trim($sClass) <> "")
			$sAtt .= " class=\"" . trim($sClass) . "\"";
		return $sAtt;
	}

	// Row attributes
	function RowAttributes() {
		$sAtt = $this->RowStyles();
		if ($this->Export == "") {
			foreach ($this->RowAttrs as $k => $v) {
				if ($k <> "class" && $k <> "style" && trim($v) <> "")
					$sAtt .= " " . $k . "=\"" . trim($v) . "\"";
			}
		}
		return $sAtt;
	}

	// Field object by name
	function fields($fldname) {
		return $this->fields[$fldname];
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here	
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here	
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here	
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here	
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>); 

	}
}
?>