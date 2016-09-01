<?php

// Global variable for table object
$ref_disciplinechedcodes_minor = NULL;

//
// Table class for ref_disciplinechedcodes_minor
//
class cref_disciplinechedcodes_minor {
	var $TableVar = 'ref_disciplinechedcodes_minor';
	var $TableName = 'ref_disciplinechedcodes_minor';
	var $TableType = 'TABLE';
	var $disCHED_disciplineSpecific_id;
	var $disCHED_disciplineSpecific_code;
	var $disCHED_disciplineSpecific_name;
	var $disCHED_discipline_code;
	var $disCHED_disciplineSpecific_academicUse;
	var $disCHED_disciplineSpecific_nameList;
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
	function cref_disciplinechedcodes_minor() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// disCHED_disciplineSpecific_id
		$this->disCHED_disciplineSpecific_id = new cField('ref_disciplinechedcodes_minor', 'ref_disciplinechedcodes_minor', 'x_disCHED_disciplineSpecific_id', 'disCHED_disciplineSpecific_id', '`disCHED_disciplineSpecific_id`', 3, -1, FALSE, '`disCHED_disciplineSpecific_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->disCHED_disciplineSpecific_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['disCHED_disciplineSpecific_id'] =& $this->disCHED_disciplineSpecific_id;

		// disCHED_disciplineSpecific_code
		$this->disCHED_disciplineSpecific_code = new cField('ref_disciplinechedcodes_minor', 'ref_disciplinechedcodes_minor', 'x_disCHED_disciplineSpecific_code', 'disCHED_disciplineSpecific_code', '`disCHED_disciplineSpecific_code`', 3, -1, FALSE, '`disCHED_disciplineSpecific_code`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->disCHED_disciplineSpecific_code->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['disCHED_disciplineSpecific_code'] =& $this->disCHED_disciplineSpecific_code;

		// disCHED_disciplineSpecific_name
		$this->disCHED_disciplineSpecific_name = new cField('ref_disciplinechedcodes_minor', 'ref_disciplinechedcodes_minor', 'x_disCHED_disciplineSpecific_name', 'disCHED_disciplineSpecific_name', '`disCHED_disciplineSpecific_name`', 200, -1, FALSE, '`disCHED_disciplineSpecific_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['disCHED_disciplineSpecific_name'] =& $this->disCHED_disciplineSpecific_name;

		// disCHED_discipline_code
		$this->disCHED_discipline_code = new cField('ref_disciplinechedcodes_minor', 'ref_disciplinechedcodes_minor', 'x_disCHED_discipline_code', 'disCHED_discipline_code', '`disCHED_discipline_code`', 200, -1, FALSE, '`disCHED_discipline_code`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['disCHED_discipline_code'] =& $this->disCHED_discipline_code;

		// disCHED_disciplineSpecific_academicUse
		$this->disCHED_disciplineSpecific_academicUse = new cField('ref_disciplinechedcodes_minor', 'ref_disciplinechedcodes_minor', 'x_disCHED_disciplineSpecific_academicUse', 'disCHED_disciplineSpecific_academicUse', '`disCHED_disciplineSpecific_academicUse`', 16, -1, FALSE, '`disCHED_disciplineSpecific_academicUse`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->disCHED_disciplineSpecific_academicUse->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['disCHED_disciplineSpecific_academicUse'] =& $this->disCHED_disciplineSpecific_academicUse;

		// disCHED_disciplineSpecific_nameList
		$this->disCHED_disciplineSpecific_nameList = new cField('ref_disciplinechedcodes_minor', 'ref_disciplinechedcodes_minor', 'x_disCHED_disciplineSpecific_nameList', 'disCHED_disciplineSpecific_nameList', '`disCHED_disciplineSpecific_nameList`', 200, -1, FALSE, '`disCHED_disciplineSpecific_nameList`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['disCHED_disciplineSpecific_nameList'] =& $this->disCHED_disciplineSpecific_nameList;
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
		return "ref_disciplinechedcodes_minor_Highlight";
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

	// Current master table name
	function getCurrentMasterTable() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_MASTER_TABLE];
	}

	function setCurrentMasterTable($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_MASTER_TABLE] = $v;
	}

	// Session master WHERE clause
	function getMasterFilter() {

		// Master filter
		$sMasterFilter = "";
		if ($this->getCurrentMasterTable() == "ref_disciplinechedcodes_major") {
			if ($this->disCHED_discipline_code->getSessionValue() <> "")
				$sMasterFilter .= "`disCHED_discipline_code`=" . up_QuotedValue($this->disCHED_discipline_code->getSessionValue(), UP_DATATYPE_STRING);
			else
				return "";
		}
		return $sMasterFilter;
	}

	// Session detail WHERE clause
	function getDetailFilter() {

		// Detail filter
		$sDetailFilter = "";
		if ($this->getCurrentMasterTable() == "ref_disciplinechedcodes_major") {
			if ($this->disCHED_discipline_code->getSessionValue() <> "")
				$sDetailFilter .= "`disCHED_discipline_code`=" . up_QuotedValue($this->disCHED_discipline_code->getSessionValue(), UP_DATATYPE_STRING);
			else
				return "";
		}
		return $sDetailFilter;
	}

	// Master filter
	function SqlMasterFilter_ref_disciplinechedcodes_major() {
		return "`disCHED_discipline_code`='@disCHED_discipline_code@'";
	}

	// Detail filter
	function SqlDetailFilter_ref_disciplinechedcodes_major() {
		return "`disCHED_discipline_code`='@disCHED_discipline_code@'";
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`ref_disciplinechedcodes_minor`";
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
		return "`disCHED_disciplineSpecific_name` ASC";
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
		return "INSERT INTO `ref_disciplinechedcodes_minor` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `ref_disciplinechedcodes_minor` SET ";
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
		$SQL = "DELETE FROM `ref_disciplinechedcodes_minor` WHERE ";
		$SQL .= up_QuotedName('disCHED_disciplineSpecific_id') . '=' . up_QuotedValue($rs['disCHED_disciplineSpecific_id'], $this->disCHED_disciplineSpecific_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`disCHED_disciplineSpecific_id` = @disCHED_disciplineSpecific_id@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->disCHED_disciplineSpecific_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@disCHED_disciplineSpecific_id@", up_AdjustSql($this->disCHED_disciplineSpecific_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "ref_disciplinechedcodes_minorlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "ref_disciplinechedcodes_minorlist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("ref_disciplinechedcodes_minorview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "ref_disciplinechedcodes_minoradd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("ref_disciplinechedcodes_minoredit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("ref_disciplinechedcodes_minoradd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("ref_disciplinechedcodes_minordelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->disCHED_disciplineSpecific_id->CurrentValue)) {
			$sUrl .= "disCHED_disciplineSpecific_id=" . urlencode($this->disCHED_disciplineSpecific_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=ref_disciplinechedcodes_minor" : "";
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
			$arKeys[] = @$_GET["disCHED_disciplineSpecific_id"]; // disCHED_disciplineSpecific_id

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
			$this->disCHED_disciplineSpecific_id->CurrentValue = $key;
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
		$this->disCHED_disciplineSpecific_id->setDbValue($rs->fields('disCHED_disciplineSpecific_id'));
		$this->disCHED_disciplineSpecific_code->setDbValue($rs->fields('disCHED_disciplineSpecific_code'));
		$this->disCHED_disciplineSpecific_name->setDbValue($rs->fields('disCHED_disciplineSpecific_name'));
		$this->disCHED_discipline_code->setDbValue($rs->fields('disCHED_discipline_code'));
		$this->disCHED_disciplineSpecific_academicUse->setDbValue($rs->fields('disCHED_disciplineSpecific_academicUse'));
		$this->disCHED_disciplineSpecific_nameList->setDbValue($rs->fields('disCHED_disciplineSpecific_nameList'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// disCHED_disciplineSpecific_id
		// disCHED_disciplineSpecific_code
		// disCHED_disciplineSpecific_name
		// disCHED_discipline_code
		// disCHED_disciplineSpecific_academicUse
		// disCHED_disciplineSpecific_nameList

		$this->disCHED_disciplineSpecific_nameList->CellCssStyle = "white-space: nowrap;";

		// disCHED_disciplineSpecific_id
		$this->disCHED_disciplineSpecific_id->ViewValue = $this->disCHED_disciplineSpecific_id->CurrentValue;
		$this->disCHED_disciplineSpecific_id->ViewCustomAttributes = "";

		// disCHED_disciplineSpecific_code
		$this->disCHED_disciplineSpecific_code->ViewValue = $this->disCHED_disciplineSpecific_code->CurrentValue;
		$this->disCHED_disciplineSpecific_code->ViewCustomAttributes = "";

		// disCHED_disciplineSpecific_name
		$this->disCHED_disciplineSpecific_name->ViewValue = $this->disCHED_disciplineSpecific_name->CurrentValue;
		$this->disCHED_disciplineSpecific_name->ViewCustomAttributes = "";

		// disCHED_discipline_code
		$this->disCHED_discipline_code->ViewValue = $this->disCHED_discipline_code->CurrentValue;
		$this->disCHED_discipline_code->ViewCustomAttributes = "";

		// disCHED_disciplineSpecific_academicUse
		$this->disCHED_disciplineSpecific_academicUse->ViewValue = $this->disCHED_disciplineSpecific_academicUse->CurrentValue;
		$this->disCHED_disciplineSpecific_academicUse->ViewCustomAttributes = "";

		// disCHED_disciplineSpecific_nameList
		$this->disCHED_disciplineSpecific_nameList->ViewValue = $this->disCHED_disciplineSpecific_nameList->CurrentValue;
		$this->disCHED_disciplineSpecific_nameList->ViewCustomAttributes = "";

		// disCHED_disciplineSpecific_id
		$this->disCHED_disciplineSpecific_id->LinkCustomAttributes = "";
		$this->disCHED_disciplineSpecific_id->HrefValue = "";
		$this->disCHED_disciplineSpecific_id->TooltipValue = "";

		// disCHED_disciplineSpecific_code
		$this->disCHED_disciplineSpecific_code->LinkCustomAttributes = "";
		$this->disCHED_disciplineSpecific_code->HrefValue = "";
		$this->disCHED_disciplineSpecific_code->TooltipValue = "";

		// disCHED_disciplineSpecific_name
		$this->disCHED_disciplineSpecific_name->LinkCustomAttributes = "";
		$this->disCHED_disciplineSpecific_name->HrefValue = "";
		$this->disCHED_disciplineSpecific_name->TooltipValue = "";

		// disCHED_discipline_code
		$this->disCHED_discipline_code->LinkCustomAttributes = "";
		$this->disCHED_discipline_code->HrefValue = "";
		$this->disCHED_discipline_code->TooltipValue = "";

		// disCHED_disciplineSpecific_academicUse
		$this->disCHED_disciplineSpecific_academicUse->LinkCustomAttributes = "";
		$this->disCHED_disciplineSpecific_academicUse->HrefValue = "";
		$this->disCHED_disciplineSpecific_academicUse->TooltipValue = "";

		// disCHED_disciplineSpecific_nameList
		$this->disCHED_disciplineSpecific_nameList->LinkCustomAttributes = "";
		$this->disCHED_disciplineSpecific_nameList->HrefValue = "";
		$this->disCHED_disciplineSpecific_nameList->TooltipValue = "";

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
					$XmlDoc->AddField('disCHED_disciplineSpecific_id', $this->disCHED_disciplineSpecific_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('disCHED_disciplineSpecific_code', $this->disCHED_disciplineSpecific_code->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('disCHED_disciplineSpecific_name', $this->disCHED_disciplineSpecific_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('disCHED_discipline_code', $this->disCHED_discipline_code->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('disCHED_disciplineSpecific_academicUse', $this->disCHED_disciplineSpecific_academicUse->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('disCHED_disciplineSpecific_id', $this->disCHED_disciplineSpecific_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('disCHED_disciplineSpecific_code', $this->disCHED_disciplineSpecific_code->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('disCHED_disciplineSpecific_name', $this->disCHED_disciplineSpecific_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('disCHED_discipline_code', $this->disCHED_discipline_code->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('disCHED_disciplineSpecific_academicUse', $this->disCHED_disciplineSpecific_academicUse->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->disCHED_disciplineSpecific_id);
				$Doc->ExportCaption($this->disCHED_disciplineSpecific_code);
				$Doc->ExportCaption($this->disCHED_disciplineSpecific_name);
				$Doc->ExportCaption($this->disCHED_discipline_code);
				$Doc->ExportCaption($this->disCHED_disciplineSpecific_academicUse);
			} else {
				$Doc->ExportCaption($this->disCHED_disciplineSpecific_id);
				$Doc->ExportCaption($this->disCHED_disciplineSpecific_code);
				$Doc->ExportCaption($this->disCHED_disciplineSpecific_name);
				$Doc->ExportCaption($this->disCHED_discipline_code);
				$Doc->ExportCaption($this->disCHED_disciplineSpecific_academicUse);
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
					$Doc->ExportField($this->disCHED_disciplineSpecific_id);
					$Doc->ExportField($this->disCHED_disciplineSpecific_code);
					$Doc->ExportField($this->disCHED_disciplineSpecific_name);
					$Doc->ExportField($this->disCHED_discipline_code);
					$Doc->ExportField($this->disCHED_disciplineSpecific_academicUse);
				} else {
					$Doc->ExportField($this->disCHED_disciplineSpecific_id);
					$Doc->ExportField($this->disCHED_disciplineSpecific_code);
					$Doc->ExportField($this->disCHED_disciplineSpecific_name);
					$Doc->ExportField($this->disCHED_discipline_code);
					$Doc->ExportField($this->disCHED_disciplineSpecific_academicUse);
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
