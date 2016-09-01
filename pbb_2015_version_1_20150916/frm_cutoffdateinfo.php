<?php

// Global variable for table object
$frm_cutoffdate = NULL;

//
// Table class for frm_cutoffdate
//
class cfrm_cutoffdate {
	var $TableVar = 'frm_cutoffdate';
	var $TableName = 'frm_cutoffdate';
	var $TableType = 'TABLE';
	var $cutOffDate_id;
	var $collection_id;
	var $focal_person_id;
	var $focal_person_office;
	var $t_cutOffDate;
	var $t_cutOffDate_fp;
	var $t_cutOffDate_remarks;
	var $a_cutOffDate;
	var $a_cutOffDate_fp;
	var $a_cutOffDate_remarks;
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
	function cfrm_cutoffdate() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// cutOffDate_id
		$this->cutOffDate_id = new cField('frm_cutoffdate', 'frm_cutoffdate', 'x_cutOffDate_id', 'cutOffDate_id', '`cutOffDate_id`', 3, -1, FALSE, '`cutOffDate_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cutOffDate_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cutOffDate_id'] =& $this->cutOffDate_id;

		// collection_id
		$this->collection_id = new cField('frm_cutoffdate', 'frm_cutoffdate', 'x_collection_id', 'collection_id', '`collection_id`', 3, -1, FALSE, '`collection_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->collection_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['collection_id'] =& $this->collection_id;

		// focal_person_id
		$this->focal_person_id = new cField('frm_cutoffdate', 'frm_cutoffdate', 'x_focal_person_id', 'focal_person_id', '`focal_person_id`', 3, -1, FALSE, '`focal_person_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focal_person_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focal_person_id'] =& $this->focal_person_id;

		// focal_person_office
		$this->focal_person_office = new cField('frm_cutoffdate', 'frm_cutoffdate', 'x_focal_person_office', 'focal_person_office', '`focal_person_office`', 200, -1, FALSE, '`focal_person_office`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['focal_person_office'] =& $this->focal_person_office;

		// t_cutOffDate
		$this->t_cutOffDate = new cField('frm_cutoffdate', 'frm_cutoffdate', 'x_t_cutOffDate', 't_cutOffDate', '`t_cutOffDate`', 135, 6, FALSE, '`t_cutOffDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_cutOffDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['t_cutOffDate'] =& $this->t_cutOffDate;

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp = new cField('frm_cutoffdate', 'frm_cutoffdate', 'x_t_cutOffDate_fp', 't_cutOffDate_fp', '`t_cutOffDate_fp`', 135, 6, FALSE, '`t_cutOffDate_fp`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_cutOffDate_fp->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['t_cutOffDate_fp'] =& $this->t_cutOffDate_fp;

		// t_cutOffDate_remarks
		$this->t_cutOffDate_remarks = new cField('frm_cutoffdate', 'frm_cutoffdate', 'x_t_cutOffDate_remarks', 't_cutOffDate_remarks', '`t_cutOffDate_remarks`', 200, -1, FALSE, '`t_cutOffDate_remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['t_cutOffDate_remarks'] =& $this->t_cutOffDate_remarks;

		// a_cutOffDate
		$this->a_cutOffDate = new cField('frm_cutoffdate', 'frm_cutoffdate', 'x_a_cutOffDate', 'a_cutOffDate', '`a_cutOffDate`', 135, 6, FALSE, '`a_cutOffDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_cutOffDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['a_cutOffDate'] =& $this->a_cutOffDate;

		// a_cutOffDate_fp
		$this->a_cutOffDate_fp = new cField('frm_cutoffdate', 'frm_cutoffdate', 'x_a_cutOffDate_fp', 'a_cutOffDate_fp', '`a_cutOffDate_fp`', 135, 6, FALSE, '`a_cutOffDate_fp`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_cutOffDate_fp->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['a_cutOffDate_fp'] =& $this->a_cutOffDate_fp;

		// a_cutOffDate_remarks
		$this->a_cutOffDate_remarks = new cField('frm_cutoffdate', 'frm_cutoffdate', 'x_a_cutOffDate_remarks', 'a_cutOffDate_remarks', '`a_cutOffDate_remarks`', 200, -1, FALSE, '`a_cutOffDate_remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['a_cutOffDate_remarks'] =& $this->a_cutOffDate_remarks;
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
		return "frm_cutoffdate_Highlight";
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
		return "`frm_cutoffdate`";
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
		return "INSERT INTO `frm_cutoffdate` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_cutoffdate` SET ";
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
		$SQL = "DELETE FROM `frm_cutoffdate` WHERE ";
		$SQL .= up_QuotedName('cutOffDate_id') . '=' . up_QuotedValue($rs['cutOffDate_id'], $this->cutOffDate_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`cutOffDate_id` = @cutOffDate_id@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->cutOffDate_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@cutOffDate_id@", up_AdjustSql($this->cutOffDate_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "frm_cutoffdatelist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_cutoffdatelist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_cutoffdateview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_cutoffdateadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_cutoffdateedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_cutoffdateadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_cutoffdatedelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->cutOffDate_id->CurrentValue)) {
			$sUrl .= "cutOffDate_id=" . urlencode($this->cutOffDate_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_cutoffdate" : "";
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
			$arKeys[] = @$_GET["cutOffDate_id"]; // cutOffDate_id

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
			$this->cutOffDate_id->CurrentValue = $key;
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
		$this->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$this->collection_id->setDbValue($rs->fields('collection_id'));
		$this->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$this->focal_person_office->setDbValue($rs->fields('focal_person_office'));
		$this->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$this->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$this->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$this->a_cutOffDate->setDbValue($rs->fields('a_cutOffDate'));
		$this->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$this->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// cutOffDate_id

		$this->cutOffDate_id->CellCssStyle = "white-space: nowrap;";

		// collection_id
		$this->collection_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$this->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_office
		$this->focal_person_office->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate
		$this->t_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_fp
		// t_cutOffDate_remarks

		$this->t_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate
		$this->a_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate_fp
		// a_cutOffDate_remarks

		$this->a_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";

		// cutOffDate_id
		$this->cutOffDate_id->ViewValue = $this->cutOffDate_id->CurrentValue;
		$this->cutOffDate_id->ViewCustomAttributes = "";

		// collection_id
		$this->collection_id->ViewValue = $this->collection_id->CurrentValue;
		$this->collection_id->ViewCustomAttributes = "";

		// focal_person_id
		if (strval($this->focal_person_id->CurrentValue) <> "") {
			$sFilterWrk = "`focal_person_id` = " . up_AdjustSql($this->focal_person_id->CurrentValue) . "";
		$sSqlWrk = "SELECT `focal_person_office` FROM `tbl_cu_executive_offices`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->focal_person_id->ViewValue = $rswrk->fields('focal_person_office');
				$rswrk->Close();
			} else {
				$this->focal_person_id->ViewValue = $this->focal_person_id->CurrentValue;
			}
		} else {
			$this->focal_person_id->ViewValue = NULL;
		}
		$this->focal_person_id->ViewCustomAttributes = "";

		// focal_person_office
		$this->focal_person_office->ViewValue = $this->focal_person_office->CurrentValue;
		$this->focal_person_office->ViewCustomAttributes = "";

		// t_cutOffDate
		$this->t_cutOffDate->ViewValue = $this->t_cutOffDate->CurrentValue;
		$this->t_cutOffDate->ViewValue = up_FormatDateTime($this->t_cutOffDate->ViewValue, 6);
		$this->t_cutOffDate->ViewCustomAttributes = "";

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp->ViewValue = $this->t_cutOffDate_fp->CurrentValue;
		$this->t_cutOffDate_fp->ViewValue = up_FormatDateTime($this->t_cutOffDate_fp->ViewValue, 6);
		$this->t_cutOffDate_fp->ViewCustomAttributes = "";

		// t_cutOffDate_remarks
		$this->t_cutOffDate_remarks->ViewValue = $this->t_cutOffDate_remarks->CurrentValue;
		$this->t_cutOffDate_remarks->ViewCustomAttributes = "";

		// a_cutOffDate
		$this->a_cutOffDate->ViewValue = $this->a_cutOffDate->CurrentValue;
		$this->a_cutOffDate->ViewValue = up_FormatDateTime($this->a_cutOffDate->ViewValue, 6);
		$this->a_cutOffDate->ViewCustomAttributes = "";

		// a_cutOffDate_fp
		$this->a_cutOffDate_fp->ViewValue = $this->a_cutOffDate_fp->CurrentValue;
		$this->a_cutOffDate_fp->ViewValue = up_FormatDateTime($this->a_cutOffDate_fp->ViewValue, 6);
		$this->a_cutOffDate_fp->ViewCustomAttributes = "";

		// a_cutOffDate_remarks
		$this->a_cutOffDate_remarks->ViewValue = $this->a_cutOffDate_remarks->CurrentValue;
		$this->a_cutOffDate_remarks->ViewCustomAttributes = "";

		// cutOffDate_id
		$this->cutOffDate_id->LinkCustomAttributes = "";
		$this->cutOffDate_id->HrefValue = "";
		$this->cutOffDate_id->TooltipValue = "";

		// collection_id
		$this->collection_id->LinkCustomAttributes = "";
		$this->collection_id->HrefValue = "";
		$this->collection_id->TooltipValue = "";

		// focal_person_id
		$this->focal_person_id->LinkCustomAttributes = "";
		$this->focal_person_id->HrefValue = "";
		$this->focal_person_id->TooltipValue = "";

		// focal_person_office
		$this->focal_person_office->LinkCustomAttributes = "";
		$this->focal_person_office->HrefValue = "";
		$this->focal_person_office->TooltipValue = "";

		// t_cutOffDate
		$this->t_cutOffDate->LinkCustomAttributes = "";
		$this->t_cutOffDate->HrefValue = "";
		$this->t_cutOffDate->TooltipValue = "";

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp->LinkCustomAttributes = "";
		$this->t_cutOffDate_fp->HrefValue = "";
		$this->t_cutOffDate_fp->TooltipValue = "";

		// t_cutOffDate_remarks
		$this->t_cutOffDate_remarks->LinkCustomAttributes = "";
		$this->t_cutOffDate_remarks->HrefValue = "";
		$this->t_cutOffDate_remarks->TooltipValue = "";

		// a_cutOffDate
		$this->a_cutOffDate->LinkCustomAttributes = "";
		$this->a_cutOffDate->HrefValue = "";
		$this->a_cutOffDate->TooltipValue = "";

		// a_cutOffDate_fp
		$this->a_cutOffDate_fp->LinkCustomAttributes = "";
		$this->a_cutOffDate_fp->HrefValue = "";
		$this->a_cutOffDate_fp->TooltipValue = "";

		// a_cutOffDate_remarks
		$this->a_cutOffDate_remarks->LinkCustomAttributes = "";
		$this->a_cutOffDate_remarks->HrefValue = "";
		$this->a_cutOffDate_remarks->TooltipValue = "";

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
					$XmlDoc->AddField('cutOffDate_id', $this->cutOffDate_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focal_person_id', $this->focal_person_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focal_person_office', $this->focal_person_office->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate', $this->t_cutOffDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_fp', $this->t_cutOffDate_fp->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_remarks', $this->t_cutOffDate_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate', $this->a_cutOffDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate_fp', $this->a_cutOffDate_fp->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate_remarks', $this->a_cutOffDate_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('cutOffDate_id', $this->cutOffDate_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focal_person_id', $this->focal_person_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focal_person_office', $this->focal_person_office->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate', $this->t_cutOffDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_fp', $this->t_cutOffDate_fp->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_remarks', $this->t_cutOffDate_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate', $this->a_cutOffDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate_fp', $this->a_cutOffDate_fp->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate_remarks', $this->a_cutOffDate_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->cutOffDate_id);
				$Doc->ExportCaption($this->focal_person_id);
				$Doc->ExportCaption($this->focal_person_office);
				$Doc->ExportCaption($this->t_cutOffDate);
				$Doc->ExportCaption($this->t_cutOffDate_fp);
				$Doc->ExportCaption($this->t_cutOffDate_remarks);
				$Doc->ExportCaption($this->a_cutOffDate);
				$Doc->ExportCaption($this->a_cutOffDate_fp);
				$Doc->ExportCaption($this->a_cutOffDate_remarks);
			} else {
				$Doc->ExportCaption($this->cutOffDate_id);
				$Doc->ExportCaption($this->focal_person_id);
				$Doc->ExportCaption($this->focal_person_office);
				$Doc->ExportCaption($this->t_cutOffDate);
				$Doc->ExportCaption($this->t_cutOffDate_fp);
				$Doc->ExportCaption($this->t_cutOffDate_remarks);
				$Doc->ExportCaption($this->a_cutOffDate);
				$Doc->ExportCaption($this->a_cutOffDate_fp);
				$Doc->ExportCaption($this->a_cutOffDate_remarks);
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
					$Doc->ExportField($this->cutOffDate_id);
					$Doc->ExportField($this->focal_person_id);
					$Doc->ExportField($this->focal_person_office);
					$Doc->ExportField($this->t_cutOffDate);
					$Doc->ExportField($this->t_cutOffDate_fp);
					$Doc->ExportField($this->t_cutOffDate_remarks);
					$Doc->ExportField($this->a_cutOffDate);
					$Doc->ExportField($this->a_cutOffDate_fp);
					$Doc->ExportField($this->a_cutOffDate_remarks);
				} else {
					$Doc->ExportField($this->cutOffDate_id);
					$Doc->ExportField($this->focal_person_id);
					$Doc->ExportField($this->focal_person_office);
					$Doc->ExportField($this->t_cutOffDate);
					$Doc->ExportField($this->t_cutOffDate_fp);
					$Doc->ExportField($this->t_cutOffDate_remarks);
					$Doc->ExportField($this->a_cutOffDate);
					$Doc->ExportField($this->a_cutOffDate_fp);
					$Doc->ExportField($this->a_cutOffDate_remarks);
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
