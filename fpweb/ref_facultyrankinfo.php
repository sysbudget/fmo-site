<?php

// Global variable for table object
$ref_facultyrank = NULL;

//
// Table class for ref_facultyrank
//
class cref_facultyrank {
	var $TableVar = 'ref_facultyrank';
	var $TableName = 'ref_facultyrank';
	var $TableType = 'TABLE';
	var $facultyRank_facultyRank2012;
	var $facultyRank_numericRank2012;
	var $facultyRank_ID;
	var $facultyRank_UPRank;
	var $facultyRank_rankGroup;
	var $facultyRank_isRegular;
	var $facultyRank_category;
	var $facultyRank_salaryScale;
	var $facultyRank_reportingDBM;
	var $facultyRank_reportingCHED;
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
	function cref_facultyrank() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// facultyRank_facultyRank2012
		$this->facultyRank_facultyRank2012 = new cField('ref_facultyrank', 'ref_facultyrank', 'x_facultyRank_facultyRank2012', 'facultyRank_facultyRank2012', '`facultyRank_facultyRank2012`', 3, -1, FALSE, '`facultyRank_facultyRank2012`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyRank_facultyRank2012->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyRank_facultyRank2012'] =& $this->facultyRank_facultyRank2012;

		// facultyRank_numericRank2012
		$this->facultyRank_numericRank2012 = new cField('ref_facultyrank', 'ref_facultyrank', 'x_facultyRank_numericRank2012', 'facultyRank_numericRank2012', '`facultyRank_numericRank2012`', 3, -1, FALSE, '`facultyRank_numericRank2012`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyRank_numericRank2012->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyRank_numericRank2012'] =& $this->facultyRank_numericRank2012;

		// facultyRank_ID
		$this->facultyRank_ID = new cField('ref_facultyrank', 'ref_facultyrank', 'x_facultyRank_ID', 'facultyRank_ID', '`facultyRank_ID`', 3, -1, FALSE, '`facultyRank_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyRank_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyRank_ID'] =& $this->facultyRank_ID;

		// facultyRank_UPRank
		$this->facultyRank_UPRank = new cField('ref_facultyrank', 'ref_facultyrank', 'x_facultyRank_UPRank', 'facultyRank_UPRank', '`facultyRank_UPRank`', 200, -1, FALSE, '`facultyRank_UPRank`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['facultyRank_UPRank'] =& $this->facultyRank_UPRank;

		// facultyRank_rankGroup
		$this->facultyRank_rankGroup = new cField('ref_facultyrank', 'ref_facultyrank', 'x_facultyRank_rankGroup', 'facultyRank_rankGroup', '`facultyRank_rankGroup`', 200, -1, FALSE, '`facultyRank_rankGroup`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['facultyRank_rankGroup'] =& $this->facultyRank_rankGroup;

		// facultyRank_isRegular
		$this->facultyRank_isRegular = new cField('ref_facultyrank', 'ref_facultyrank', 'x_facultyRank_isRegular', 'facultyRank_isRegular', '`facultyRank_isRegular`', 200, -1, FALSE, '`facultyRank_isRegular`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['facultyRank_isRegular'] =& $this->facultyRank_isRegular;

		// facultyRank_category
		$this->facultyRank_category = new cField('ref_facultyrank', 'ref_facultyrank', 'x_facultyRank_category', 'facultyRank_category', '`facultyRank_category`', 3, -1, FALSE, '`facultyRank_category`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyRank_category->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyRank_category'] =& $this->facultyRank_category;

		// facultyRank_salaryScale
		$this->facultyRank_salaryScale = new cField('ref_facultyrank', 'ref_facultyrank', 'x_facultyRank_salaryScale', 'facultyRank_salaryScale', '`facultyRank_salaryScale`', 200, -1, FALSE, '`facultyRank_salaryScale`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['facultyRank_salaryScale'] =& $this->facultyRank_salaryScale;

		// facultyRank_reportingDBM
		$this->facultyRank_reportingDBM = new cField('ref_facultyrank', 'ref_facultyrank', 'x_facultyRank_reportingDBM', 'facultyRank_reportingDBM', '`facultyRank_reportingDBM`', 200, -1, FALSE, '`facultyRank_reportingDBM`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['facultyRank_reportingDBM'] =& $this->facultyRank_reportingDBM;

		// facultyRank_reportingCHED
		$this->facultyRank_reportingCHED = new cField('ref_facultyrank', 'ref_facultyrank', 'x_facultyRank_reportingCHED', 'facultyRank_reportingCHED', '`facultyRank_reportingCHED`', 3, -1, FALSE, '`facultyRank_reportingCHED`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyRank_reportingCHED->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyRank_reportingCHED'] =& $this->facultyRank_reportingCHED;
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
		return "ref_facultyrank_Highlight";
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
		return "`ref_facultyrank`";
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
		return "INSERT INTO `ref_facultyrank` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `ref_facultyrank` SET ";
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
		$SQL = "DELETE FROM `ref_facultyrank` WHERE ";
		$SQL .= up_QuotedName('facultyRank_ID') . '=' . up_QuotedValue($rs['facultyRank_ID'], $this->facultyRank_ID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`facultyRank_ID` = @facultyRank_ID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->facultyRank_ID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@facultyRank_ID@", up_AdjustSql($this->facultyRank_ID->CurrentValue), $sKeyFilter); // Replace key value
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
			return "ref_facultyranklist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "ref_facultyranklist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("ref_facultyrankview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "ref_facultyrankadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("ref_facultyrankedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("ref_facultyrankadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("ref_facultyrankdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->facultyRank_ID->CurrentValue)) {
			$sUrl .= "facultyRank_ID=" . urlencode($this->facultyRank_ID->CurrentValue);
		} else {
			return "javascript:alert(upLanguage.Phrase('InvalidRecord'));";
		}
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=ref_facultyrank" : "";
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
			$arKeys[] = @$_GET["facultyRank_ID"]; // facultyRank_ID

			//return $arKeys; // do not return yet, so the values will also be checked by the following code
		}

		// check keys
		$ar = array();
		foreach ($arKeys as $key) {
			if (!is_numeric($key))
				continue;
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
			$this->facultyRank_ID->CurrentValue = $key;
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
		$this->facultyRank_facultyRank2012->setDbValue($rs->fields('facultyRank_facultyRank2012'));
		$this->facultyRank_numericRank2012->setDbValue($rs->fields('facultyRank_numericRank2012'));
		$this->facultyRank_ID->setDbValue($rs->fields('facultyRank_ID'));
		$this->facultyRank_UPRank->setDbValue($rs->fields('facultyRank_UPRank'));
		$this->facultyRank_rankGroup->setDbValue($rs->fields('facultyRank_rankGroup'));
		$this->facultyRank_isRegular->setDbValue($rs->fields('facultyRank_isRegular'));
		$this->facultyRank_category->setDbValue($rs->fields('facultyRank_category'));
		$this->facultyRank_salaryScale->setDbValue($rs->fields('facultyRank_salaryScale'));
		$this->facultyRank_reportingDBM->setDbValue($rs->fields('facultyRank_reportingDBM'));
		$this->facultyRank_reportingCHED->setDbValue($rs->fields('facultyRank_reportingCHED'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// facultyRank_facultyRank2012

		$this->facultyRank_facultyRank2012->CellCssStyle = "white-space: nowrap;";

		// facultyRank_numericRank2012
		$this->facultyRank_numericRank2012->CellCssStyle = "white-space: nowrap;";

		// facultyRank_ID
		$this->facultyRank_ID->CellCssStyle = "white-space: nowrap;";

		// facultyRank_UPRank
		$this->facultyRank_UPRank->CellCssStyle = "white-space: nowrap;";

		// facultyRank_rankGroup
		$this->facultyRank_rankGroup->CellCssStyle = "white-space: nowrap;";

		// facultyRank_isRegular
		$this->facultyRank_isRegular->CellCssStyle = "white-space: nowrap;";

		// facultyRank_category
		$this->facultyRank_category->CellCssStyle = "white-space: nowrap;";

		// facultyRank_salaryScale
		$this->facultyRank_salaryScale->CellCssStyle = "white-space: nowrap;";

		// facultyRank_reportingDBM
		$this->facultyRank_reportingDBM->CellCssStyle = "white-space: nowrap;";

		// facultyRank_reportingCHED
		$this->facultyRank_reportingCHED->CellCssStyle = "white-space: nowrap;";

		// facultyRank_facultyRank2012
		$this->facultyRank_facultyRank2012->ViewValue = $this->facultyRank_facultyRank2012->CurrentValue;
		$this->facultyRank_facultyRank2012->ViewCustomAttributes = "";

		// facultyRank_numericRank2012
		$this->facultyRank_numericRank2012->ViewValue = $this->facultyRank_numericRank2012->CurrentValue;
		$this->facultyRank_numericRank2012->ViewCustomAttributes = "";

		// facultyRank_ID
		$this->facultyRank_ID->ViewValue = $this->facultyRank_ID->CurrentValue;
		$this->facultyRank_ID->ViewCustomAttributes = "";

		// facultyRank_UPRank
		$this->facultyRank_UPRank->ViewValue = $this->facultyRank_UPRank->CurrentValue;
		$this->facultyRank_UPRank->ViewCustomAttributes = "";

		// facultyRank_rankGroup
		$this->facultyRank_rankGroup->ViewValue = $this->facultyRank_rankGroup->CurrentValue;
		$this->facultyRank_rankGroup->ViewCustomAttributes = "";

		// facultyRank_isRegular
		$this->facultyRank_isRegular->ViewValue = $this->facultyRank_isRegular->CurrentValue;
		$this->facultyRank_isRegular->ViewCustomAttributes = "";

		// facultyRank_category
		$this->facultyRank_category->ViewValue = $this->facultyRank_category->CurrentValue;
		$this->facultyRank_category->ViewCustomAttributes = "";

		// facultyRank_salaryScale
		$this->facultyRank_salaryScale->ViewValue = $this->facultyRank_salaryScale->CurrentValue;
		$this->facultyRank_salaryScale->ViewCustomAttributes = "";

		// facultyRank_reportingDBM
		$this->facultyRank_reportingDBM->ViewValue = $this->facultyRank_reportingDBM->CurrentValue;
		$this->facultyRank_reportingDBM->ViewCustomAttributes = "";

		// facultyRank_reportingCHED
		$this->facultyRank_reportingCHED->ViewValue = $this->facultyRank_reportingCHED->CurrentValue;
		$this->facultyRank_reportingCHED->ViewCustomAttributes = "";

		// facultyRank_facultyRank2012
		$this->facultyRank_facultyRank2012->LinkCustomAttributes = "";
		$this->facultyRank_facultyRank2012->HrefValue = "";
		$this->facultyRank_facultyRank2012->TooltipValue = "";

		// facultyRank_numericRank2012
		$this->facultyRank_numericRank2012->LinkCustomAttributes = "";
		$this->facultyRank_numericRank2012->HrefValue = "";
		$this->facultyRank_numericRank2012->TooltipValue = "";

		// facultyRank_ID
		$this->facultyRank_ID->LinkCustomAttributes = "";
		$this->facultyRank_ID->HrefValue = "";
		$this->facultyRank_ID->TooltipValue = "";

		// facultyRank_UPRank
		$this->facultyRank_UPRank->LinkCustomAttributes = "";
		$this->facultyRank_UPRank->HrefValue = "";
		$this->facultyRank_UPRank->TooltipValue = "";

		// facultyRank_rankGroup
		$this->facultyRank_rankGroup->LinkCustomAttributes = "";
		$this->facultyRank_rankGroup->HrefValue = "";
		$this->facultyRank_rankGroup->TooltipValue = "";

		// facultyRank_isRegular
		$this->facultyRank_isRegular->LinkCustomAttributes = "";
		$this->facultyRank_isRegular->HrefValue = "";
		$this->facultyRank_isRegular->TooltipValue = "";

		// facultyRank_category
		$this->facultyRank_category->LinkCustomAttributes = "";
		$this->facultyRank_category->HrefValue = "";
		$this->facultyRank_category->TooltipValue = "";

		// facultyRank_salaryScale
		$this->facultyRank_salaryScale->LinkCustomAttributes = "";
		$this->facultyRank_salaryScale->HrefValue = "";
		$this->facultyRank_salaryScale->TooltipValue = "";

		// facultyRank_reportingDBM
		$this->facultyRank_reportingDBM->LinkCustomAttributes = "";
		$this->facultyRank_reportingDBM->HrefValue = "";
		$this->facultyRank_reportingDBM->TooltipValue = "";

		// facultyRank_reportingCHED
		$this->facultyRank_reportingCHED->LinkCustomAttributes = "";
		$this->facultyRank_reportingCHED->HrefValue = "";
		$this->facultyRank_reportingCHED->TooltipValue = "";

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
					$XmlDoc->AddField('facultyRank_facultyRank2012', $this->facultyRank_facultyRank2012->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_numericRank2012', $this->facultyRank_numericRank2012->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_ID', $this->facultyRank_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_UPRank', $this->facultyRank_UPRank->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_rankGroup', $this->facultyRank_rankGroup->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_isRegular', $this->facultyRank_isRegular->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_category', $this->facultyRank_category->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_salaryScale', $this->facultyRank_salaryScale->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_reportingDBM', $this->facultyRank_reportingDBM->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_reportingCHED', $this->facultyRank_reportingCHED->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('facultyRank_facultyRank2012', $this->facultyRank_facultyRank2012->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_numericRank2012', $this->facultyRank_numericRank2012->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_ID', $this->facultyRank_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_UPRank', $this->facultyRank_UPRank->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_rankGroup', $this->facultyRank_rankGroup->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_isRegular', $this->facultyRank_isRegular->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_category', $this->facultyRank_category->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_salaryScale', $this->facultyRank_salaryScale->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_reportingDBM', $this->facultyRank_reportingDBM->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_reportingCHED', $this->facultyRank_reportingCHED->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->facultyRank_facultyRank2012);
				$Doc->ExportCaption($this->facultyRank_numericRank2012);
				$Doc->ExportCaption($this->facultyRank_ID);
				$Doc->ExportCaption($this->facultyRank_UPRank);
				$Doc->ExportCaption($this->facultyRank_rankGroup);
				$Doc->ExportCaption($this->facultyRank_isRegular);
				$Doc->ExportCaption($this->facultyRank_category);
				$Doc->ExportCaption($this->facultyRank_salaryScale);
				$Doc->ExportCaption($this->facultyRank_reportingDBM);
				$Doc->ExportCaption($this->facultyRank_reportingCHED);
			} else {
				$Doc->ExportCaption($this->facultyRank_facultyRank2012);
				$Doc->ExportCaption($this->facultyRank_numericRank2012);
				$Doc->ExportCaption($this->facultyRank_ID);
				$Doc->ExportCaption($this->facultyRank_UPRank);
				$Doc->ExportCaption($this->facultyRank_rankGroup);
				$Doc->ExportCaption($this->facultyRank_isRegular);
				$Doc->ExportCaption($this->facultyRank_category);
				$Doc->ExportCaption($this->facultyRank_salaryScale);
				$Doc->ExportCaption($this->facultyRank_reportingDBM);
				$Doc->ExportCaption($this->facultyRank_reportingCHED);
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
					$Doc->ExportField($this->facultyRank_facultyRank2012);
					$Doc->ExportField($this->facultyRank_numericRank2012);
					$Doc->ExportField($this->facultyRank_ID);
					$Doc->ExportField($this->facultyRank_UPRank);
					$Doc->ExportField($this->facultyRank_rankGroup);
					$Doc->ExportField($this->facultyRank_isRegular);
					$Doc->ExportField($this->facultyRank_category);
					$Doc->ExportField($this->facultyRank_salaryScale);
					$Doc->ExportField($this->facultyRank_reportingDBM);
					$Doc->ExportField($this->facultyRank_reportingCHED);
				} else {
					$Doc->ExportField($this->facultyRank_facultyRank2012);
					$Doc->ExportField($this->facultyRank_numericRank2012);
					$Doc->ExportField($this->facultyRank_ID);
					$Doc->ExportField($this->facultyRank_UPRank);
					$Doc->ExportField($this->facultyRank_rankGroup);
					$Doc->ExportField($this->facultyRank_isRegular);
					$Doc->ExportField($this->facultyRank_category);
					$Doc->ExportField($this->facultyRank_salaryScale);
					$Doc->ExportField($this->facultyRank_reportingDBM);
					$Doc->ExportField($this->facultyRank_reportingCHED);
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
