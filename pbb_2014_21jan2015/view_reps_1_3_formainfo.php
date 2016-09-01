<?php

// Global variable for table object
$view_reps_1_3_forma = NULL;

//
// Table class for view_reps_1_3_forma
//
class cview_reps_1_3_forma {
	var $TableVar = 'view_reps_1_3_forma';
	var $TableName = 'view_reps_1_3_forma';
	var $TableType = 'VIEW';
	var $MFO;
	var $Units;
	var $PI_No;
	var $PI_Sub;
	var $PI_Description;
	var $Target_Sum;
	var $Target_Avg;
	var $Target_Geomean;
	var $Accomplishment_Sum;
	var $Accomplishment_Avg;
	var $Accomplishment_Geomean;
	var $Performance_Sum;
	var $Performance_Avg;
	var $Performance_Geomean;
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
	function cview_reps_1_3_forma() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// MFO
		$this->MFO = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_MFO', 'MFO', '`MFO`', 3, -1, FALSE, '`MFO`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->MFO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['MFO'] =& $this->MFO;

		// Units
		$this->Units = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_Units', 'Units', '`Units`', 201, -1, FALSE, '`Units`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Units'] =& $this->Units;

		// PI No
		$this->PI_No = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_PI_No', 'PI No', '`PI No`', 20, -1, FALSE, '`PI No`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_No->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI No'] =& $this->PI_No;

		// PI Sub
		$this->PI_Sub = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_PI_Sub', 'PI Sub', '`PI Sub`', 200, -1, FALSE, '`PI Sub`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Sub'] =& $this->PI_Sub;

		// PI Description
		$this->PI_Description = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_PI_Description', 'PI Description', '`PI Description`', 200, -1, FALSE, '`PI Description`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Description'] =& $this->PI_Description;

		// Target Sum
		$this->Target_Sum = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_Target_Sum', 'Target Sum', '`Target Sum`', 5, -1, FALSE, '`Target Sum`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_Sum->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target Sum'] =& $this->Target_Sum;

		// Target Avg
		$this->Target_Avg = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_Target_Avg', 'Target Avg', '`Target Avg`', 5, -1, FALSE, '`Target Avg`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_Avg->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target Avg'] =& $this->Target_Avg;

		// Target Geomean
		$this->Target_Geomean = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_Target_Geomean', 'Target Geomean', '`Target Geomean`', 5, -1, FALSE, '`Target Geomean`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_Geomean->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target Geomean'] =& $this->Target_Geomean;

		// Accomplishment Sum
		$this->Accomplishment_Sum = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_Accomplishment_Sum', 'Accomplishment Sum', '`Accomplishment Sum`', 5, -1, FALSE, '`Accomplishment Sum`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_Sum->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment Sum'] =& $this->Accomplishment_Sum;

		// Accomplishment Avg
		$this->Accomplishment_Avg = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_Accomplishment_Avg', 'Accomplishment Avg', '`Accomplishment Avg`', 5, -1, FALSE, '`Accomplishment Avg`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_Avg->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment Avg'] =& $this->Accomplishment_Avg;

		// Accomplishment Geomean
		$this->Accomplishment_Geomean = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_Accomplishment_Geomean', 'Accomplishment Geomean', '`Accomplishment Geomean`', 5, -1, FALSE, '`Accomplishment Geomean`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_Geomean->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment Geomean'] =& $this->Accomplishment_Geomean;

		// Performance Sum
		$this->Performance_Sum = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_Performance_Sum', 'Performance Sum', '`Performance Sum`', 5, -1, FALSE, '`Performance Sum`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Performance_Sum->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Performance Sum'] =& $this->Performance_Sum;

		// Performance Avg
		$this->Performance_Avg = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_Performance_Avg', 'Performance Avg', '`Performance Avg`', 5, -1, FALSE, '`Performance Avg`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Performance_Avg->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Performance Avg'] =& $this->Performance_Avg;

		// Performance Geomean
		$this->Performance_Geomean = new cField('view_reps_1_3_forma', 'view_reps_1_3_forma', 'x_Performance_Geomean', 'Performance Geomean', '`Performance Geomean`', 5, -1, FALSE, '`Performance Geomean`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Performance_Geomean->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Performance Geomean'] =& $this->Performance_Geomean;
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
		return "view_reps_1_3_forma_Highlight";
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
		return "`view_reps_1_3_forma`";
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
		return "INSERT INTO `view_reps_1_3_forma` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `view_reps_1_3_forma` SET ";
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
		$SQL = "DELETE FROM `view_reps_1_3_forma` WHERE ";
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
			return "view_reps_1_3_formalist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "view_reps_1_3_formalist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("view_reps_1_3_formaview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "view_reps_1_3_formaadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("view_reps_1_3_formaedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("view_reps_1_3_formaadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("view_reps_1_3_formadelete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=view_reps_1_3_forma" : "";
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
		$this->MFO->setDbValue($rs->fields('MFO'));
		$this->Units->setDbValue($rs->fields('Units'));
		$this->PI_No->setDbValue($rs->fields('PI No'));
		$this->PI_Sub->setDbValue($rs->fields('PI Sub'));
		$this->PI_Description->setDbValue($rs->fields('PI Description'));
		$this->Target_Sum->setDbValue($rs->fields('Target Sum'));
		$this->Target_Avg->setDbValue($rs->fields('Target Avg'));
		$this->Target_Geomean->setDbValue($rs->fields('Target Geomean'));
		$this->Accomplishment_Sum->setDbValue($rs->fields('Accomplishment Sum'));
		$this->Accomplishment_Avg->setDbValue($rs->fields('Accomplishment Avg'));
		$this->Accomplishment_Geomean->setDbValue($rs->fields('Accomplishment Geomean'));
		$this->Performance_Sum->setDbValue($rs->fields('Performance Sum'));
		$this->Performance_Avg->setDbValue($rs->fields('Performance Avg'));
		$this->Performance_Geomean->setDbValue($rs->fields('Performance Geomean'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// MFO

		$this->MFO->CellCssStyle = "white-space: nowrap;";

		// Units
		$this->Units->CellCssStyle = "white-space: nowrap;";

		// PI No
		$this->PI_No->CellCssStyle = "white-space: nowrap;";

		// PI Sub
		$this->PI_Sub->CellCssStyle = "white-space: nowrap;";

		// PI Description
		$this->PI_Description->CellCssStyle = "white-space: nowrap;";

		// Target Sum
		$this->Target_Sum->CellCssStyle = "white-space: nowrap;";

		// Target Avg
		$this->Target_Avg->CellCssStyle = "white-space: nowrap;";

		// Target Geomean
		$this->Target_Geomean->CellCssStyle = "white-space: nowrap;";

		// Accomplishment Sum
		$this->Accomplishment_Sum->CellCssStyle = "white-space: nowrap;";

		// Accomplishment Avg
		$this->Accomplishment_Avg->CellCssStyle = "white-space: nowrap;";

		// Accomplishment Geomean
		$this->Accomplishment_Geomean->CellCssStyle = "white-space: nowrap;";

		// Performance Sum
		$this->Performance_Sum->CellCssStyle = "white-space: nowrap;";

		// Performance Avg
		$this->Performance_Avg->CellCssStyle = "white-space: nowrap;";

		// Performance Geomean
		$this->Performance_Geomean->CellCssStyle = "white-space: nowrap;";

		// MFO
		$this->MFO->ViewValue = $this->MFO->CurrentValue;
		$this->MFO->ViewCustomAttributes = "";

		// Units
		$this->Units->ViewValue = $this->Units->CurrentValue;
		$this->Units->ViewCustomAttributes = "";

		// PI No
		$this->PI_No->ViewValue = $this->PI_No->CurrentValue;
		$this->PI_No->ViewCustomAttributes = "";

		// PI Sub
		$this->PI_Sub->ViewValue = $this->PI_Sub->CurrentValue;
		$this->PI_Sub->ViewCustomAttributes = "";

		// PI Description
		$this->PI_Description->ViewValue = $this->PI_Description->CurrentValue;
		$this->PI_Description->ViewCustomAttributes = "";

		// Target Sum
		$this->Target_Sum->ViewValue = $this->Target_Sum->CurrentValue;
		$this->Target_Sum->ViewCustomAttributes = "";

		// Target Avg
		$this->Target_Avg->ViewValue = $this->Target_Avg->CurrentValue;
		$this->Target_Avg->ViewCustomAttributes = "";

		// Target Geomean
		$this->Target_Geomean->ViewValue = $this->Target_Geomean->CurrentValue;
		$this->Target_Geomean->ViewCustomAttributes = "";

		// Accomplishment Sum
		$this->Accomplishment_Sum->ViewValue = $this->Accomplishment_Sum->CurrentValue;
		$this->Accomplishment_Sum->ViewCustomAttributes = "";

		// Accomplishment Avg
		$this->Accomplishment_Avg->ViewValue = $this->Accomplishment_Avg->CurrentValue;
		$this->Accomplishment_Avg->ViewCustomAttributes = "";

		// Accomplishment Geomean
		$this->Accomplishment_Geomean->ViewValue = $this->Accomplishment_Geomean->CurrentValue;
		$this->Accomplishment_Geomean->ViewCustomAttributes = "";

		// Performance Sum
		$this->Performance_Sum->ViewValue = $this->Performance_Sum->CurrentValue;
		$this->Performance_Sum->ViewCustomAttributes = "";

		// Performance Avg
		$this->Performance_Avg->ViewValue = $this->Performance_Avg->CurrentValue;
		$this->Performance_Avg->ViewCustomAttributes = "";

		// Performance Geomean
		$this->Performance_Geomean->ViewValue = $this->Performance_Geomean->CurrentValue;
		$this->Performance_Geomean->ViewCustomAttributes = "";

		// MFO
		$this->MFO->LinkCustomAttributes = "";
		$this->MFO->HrefValue = "";
		$this->MFO->TooltipValue = "";

		// Units
		$this->Units->LinkCustomAttributes = "";
		$this->Units->HrefValue = "";
		$this->Units->TooltipValue = "";

		// PI No
		$this->PI_No->LinkCustomAttributes = "";
		$this->PI_No->HrefValue = "";
		$this->PI_No->TooltipValue = "";

		// PI Sub
		$this->PI_Sub->LinkCustomAttributes = "";
		$this->PI_Sub->HrefValue = "";
		$this->PI_Sub->TooltipValue = "";

		// PI Description
		$this->PI_Description->LinkCustomAttributes = "";
		$this->PI_Description->HrefValue = "";
		$this->PI_Description->TooltipValue = "";

		// Target Sum
		$this->Target_Sum->LinkCustomAttributes = "";
		$this->Target_Sum->HrefValue = "";
		$this->Target_Sum->TooltipValue = "";

		// Target Avg
		$this->Target_Avg->LinkCustomAttributes = "";
		$this->Target_Avg->HrefValue = "";
		$this->Target_Avg->TooltipValue = "";

		// Target Geomean
		$this->Target_Geomean->LinkCustomAttributes = "";
		$this->Target_Geomean->HrefValue = "";
		$this->Target_Geomean->TooltipValue = "";

		// Accomplishment Sum
		$this->Accomplishment_Sum->LinkCustomAttributes = "";
		$this->Accomplishment_Sum->HrefValue = "";
		$this->Accomplishment_Sum->TooltipValue = "";

		// Accomplishment Avg
		$this->Accomplishment_Avg->LinkCustomAttributes = "";
		$this->Accomplishment_Avg->HrefValue = "";
		$this->Accomplishment_Avg->TooltipValue = "";

		// Accomplishment Geomean
		$this->Accomplishment_Geomean->LinkCustomAttributes = "";
		$this->Accomplishment_Geomean->HrefValue = "";
		$this->Accomplishment_Geomean->TooltipValue = "";

		// Performance Sum
		$this->Performance_Sum->LinkCustomAttributes = "";
		$this->Performance_Sum->HrefValue = "";
		$this->Performance_Sum->TooltipValue = "";

		// Performance Avg
		$this->Performance_Avg->LinkCustomAttributes = "";
		$this->Performance_Avg->HrefValue = "";
		$this->Performance_Avg->TooltipValue = "";

		// Performance Geomean
		$this->Performance_Geomean->LinkCustomAttributes = "";
		$this->Performance_Geomean->HrefValue = "";
		$this->Performance_Geomean->TooltipValue = "";

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
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Units', $this->Units->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_No', $this->PI_No->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Sub', $this->PI_Sub->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Description', $this->PI_Description->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Sum', $this->Target_Sum->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Avg', $this->Target_Avg->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Geomean', $this->Target_Geomean->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_Sum', $this->Accomplishment_Sum->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_Avg', $this->Accomplishment_Avg->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_Geomean', $this->Accomplishment_Geomean->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Sum', $this->Performance_Sum->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Avg', $this->Performance_Avg->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Geomean', $this->Performance_Geomean->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_No', $this->PI_No->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Sub', $this->PI_Sub->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Description', $this->PI_Description->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Sum', $this->Target_Sum->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Avg', $this->Target_Avg->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Geomean', $this->Target_Geomean->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_Sum', $this->Accomplishment_Sum->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_Avg', $this->Accomplishment_Avg->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_Geomean', $this->Accomplishment_Geomean->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Sum', $this->Performance_Sum->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Avg', $this->Performance_Avg->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Geomean', $this->Performance_Geomean->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->Units);
				$Doc->ExportCaption($this->PI_No);
				$Doc->ExportCaption($this->PI_Sub);
				$Doc->ExportCaption($this->PI_Description);
				$Doc->ExportCaption($this->Target_Sum);
				$Doc->ExportCaption($this->Target_Avg);
				$Doc->ExportCaption($this->Target_Geomean);
				$Doc->ExportCaption($this->Accomplishment_Sum);
				$Doc->ExportCaption($this->Accomplishment_Avg);
				$Doc->ExportCaption($this->Accomplishment_Geomean);
				$Doc->ExportCaption($this->Performance_Sum);
				$Doc->ExportCaption($this->Performance_Avg);
				$Doc->ExportCaption($this->Performance_Geomean);
			} else {
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->PI_No);
				$Doc->ExportCaption($this->PI_Sub);
				$Doc->ExportCaption($this->PI_Description);
				$Doc->ExportCaption($this->Target_Sum);
				$Doc->ExportCaption($this->Target_Avg);
				$Doc->ExportCaption($this->Target_Geomean);
				$Doc->ExportCaption($this->Accomplishment_Sum);
				$Doc->ExportCaption($this->Accomplishment_Avg);
				$Doc->ExportCaption($this->Accomplishment_Geomean);
				$Doc->ExportCaption($this->Performance_Sum);
				$Doc->ExportCaption($this->Performance_Avg);
				$Doc->ExportCaption($this->Performance_Geomean);
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
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->Units);
					$Doc->ExportField($this->PI_No);
					$Doc->ExportField($this->PI_Sub);
					$Doc->ExportField($this->PI_Description);
					$Doc->ExportField($this->Target_Sum);
					$Doc->ExportField($this->Target_Avg);
					$Doc->ExportField($this->Target_Geomean);
					$Doc->ExportField($this->Accomplishment_Sum);
					$Doc->ExportField($this->Accomplishment_Avg);
					$Doc->ExportField($this->Accomplishment_Geomean);
					$Doc->ExportField($this->Performance_Sum);
					$Doc->ExportField($this->Performance_Avg);
					$Doc->ExportField($this->Performance_Geomean);
				} else {
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->PI_No);
					$Doc->ExportField($this->PI_Sub);
					$Doc->ExportField($this->PI_Description);
					$Doc->ExportField($this->Target_Sum);
					$Doc->ExportField($this->Target_Avg);
					$Doc->ExportField($this->Target_Geomean);
					$Doc->ExportField($this->Accomplishment_Sum);
					$Doc->ExportField($this->Accomplishment_Avg);
					$Doc->ExportField($this->Accomplishment_Geomean);
					$Doc->ExportField($this->Performance_Sum);
					$Doc->ExportField($this->Performance_Avg);
					$Doc->ExportField($this->Performance_Geomean);
				}
				$Doc->EndExportRow();
			}
			$Recordset->MoveNext();
		}
		$Doc->ExportTableFooter();
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
