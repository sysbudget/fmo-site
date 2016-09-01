<?php

// Global variable for table object
$ref_hda_inactivepursuitofhigherdegree = NULL;

//
// Table class for ref_hda_inactivepursuitofhigherdegree
//
class cref_hda_inactivepursuitofhigherdegree {
	var $TableVar = 'ref_hda_inactivepursuitofhigherdegree';
	var $TableName = 'ref_hda_inactivepursuitofhigherdegree';
	var $TableType = 'TABLE';
	var $hda_ID;
	var $hda_name;
	var $hda_inActivePursuitofHigherDegree;
	var $hda_degreeLevel_degrees;
	var $hda_degreeLevel_faculty_ID;
	var $hda_isEnrolledOrInResidence;
	var $hda_hasEarnedCreditUnits;
	var $hda_candidate;
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
	function cref_hda_inactivepursuitofhigherdegree() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// hda_ID
		$this->hda_ID = new cField('ref_hda_inactivepursuitofhigherdegree', 'ref_hda_inactivepursuitofhigherdegree', 'x_hda_ID', 'hda_ID', '`hda_ID`', 3, -1, FALSE, '`hda_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->hda_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['hda_ID'] =& $this->hda_ID;

		// hda_name
		$this->hda_name = new cField('ref_hda_inactivepursuitofhigherdegree', 'ref_hda_inactivepursuitofhigherdegree', 'x_hda_name', 'hda_name', '`hda_name`', 3, -1, FALSE, '`hda_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->hda_name->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['hda_name'] =& $this->hda_name;

		// hda_inActivePursuitofHigherDegree
		$this->hda_inActivePursuitofHigherDegree = new cField('ref_hda_inactivepursuitofhigherdegree', 'ref_hda_inactivepursuitofhigherdegree', 'x_hda_inActivePursuitofHigherDegree', 'hda_inActivePursuitofHigherDegree', '`hda_inActivePursuitofHigherDegree`', 3, -1, FALSE, '`hda_inActivePursuitofHigherDegree`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->hda_inActivePursuitofHigherDegree->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['hda_inActivePursuitofHigherDegree'] =& $this->hda_inActivePursuitofHigherDegree;

		// hda_degreeLevel_degrees
		$this->hda_degreeLevel_degrees = new cField('ref_hda_inactivepursuitofhigherdegree', 'ref_hda_inactivepursuitofhigherdegree', 'x_hda_degreeLevel_degrees', 'hda_degreeLevel_degrees', '`hda_degreeLevel_degrees`', 3, -1, FALSE, '`hda_degreeLevel_degrees`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->hda_degreeLevel_degrees->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['hda_degreeLevel_degrees'] =& $this->hda_degreeLevel_degrees;

		// hda_degreeLevel_faculty_ID
		$this->hda_degreeLevel_faculty_ID = new cField('ref_hda_inactivepursuitofhigherdegree', 'ref_hda_inactivepursuitofhigherdegree', 'x_hda_degreeLevel_faculty_ID', 'hda_degreeLevel_faculty_ID', '`hda_degreeLevel_faculty_ID`', 3, -1, FALSE, '`hda_degreeLevel_faculty_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->hda_degreeLevel_faculty_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['hda_degreeLevel_faculty_ID'] =& $this->hda_degreeLevel_faculty_ID;

		// hda_isEnrolledOrInResidence
		$this->hda_isEnrolledOrInResidence = new cField('ref_hda_inactivepursuitofhigherdegree', 'ref_hda_inactivepursuitofhigherdegree', 'x_hda_isEnrolledOrInResidence', 'hda_isEnrolledOrInResidence', '`hda_isEnrolledOrInResidence`', 200, -1, FALSE, '`hda_isEnrolledOrInResidence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['hda_isEnrolledOrInResidence'] =& $this->hda_isEnrolledOrInResidence;

		// hda_hasEarnedCreditUnits
		$this->hda_hasEarnedCreditUnits = new cField('ref_hda_inactivepursuitofhigherdegree', 'ref_hda_inactivepursuitofhigherdegree', 'x_hda_hasEarnedCreditUnits', 'hda_hasEarnedCreditUnits', '`hda_hasEarnedCreditUnits`', 200, -1, FALSE, '`hda_hasEarnedCreditUnits`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['hda_hasEarnedCreditUnits'] =& $this->hda_hasEarnedCreditUnits;

		// hda_candidate
		$this->hda_candidate = new cField('ref_hda_inactivepursuitofhigherdegree', 'ref_hda_inactivepursuitofhigherdegree', 'x_hda_candidate', 'hda_candidate', '`hda_candidate`', 200, -1, FALSE, '`hda_candidate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['hda_candidate'] =& $this->hda_candidate;
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
		return "ref_hda_inactivepursuitofhigherdegree_Highlight";
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
		return "`ref_hda_inactivepursuitofhigherdegree`";
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
		return "INSERT INTO `ref_hda_inactivepursuitofhigherdegree` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `ref_hda_inactivepursuitofhigherdegree` SET ";
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
		$SQL = "DELETE FROM `ref_hda_inactivepursuitofhigherdegree` WHERE ";
		$SQL .= up_QuotedName('hda_ID') . '=' . up_QuotedValue($rs['hda_ID'], $this->hda_ID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`hda_ID` = @hda_ID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->hda_ID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@hda_ID@", up_AdjustSql($this->hda_ID->CurrentValue), $sKeyFilter); // Replace key value
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
			return "ref_hda_inactivepursuitofhigherdegreelist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "ref_hda_inactivepursuitofhigherdegreelist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("ref_hda_inactivepursuitofhigherdegreeview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "ref_hda_inactivepursuitofhigherdegreeadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("ref_hda_inactivepursuitofhigherdegreeedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("ref_hda_inactivepursuitofhigherdegreeadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("ref_hda_inactivepursuitofhigherdegreedelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->hda_ID->CurrentValue)) {
			$sUrl .= "hda_ID=" . urlencode($this->hda_ID->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=ref_hda_inactivepursuitofhigherdegree" : "";
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
			$arKeys[] = @$_GET["hda_ID"]; // hda_ID

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
			$this->hda_ID->CurrentValue = $key;
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
		$this->hda_ID->setDbValue($rs->fields('hda_ID'));
		$this->hda_name->setDbValue($rs->fields('hda_name'));
		$this->hda_inActivePursuitofHigherDegree->setDbValue($rs->fields('hda_inActivePursuitofHigherDegree'));
		$this->hda_degreeLevel_degrees->setDbValue($rs->fields('hda_degreeLevel_degrees'));
		$this->hda_degreeLevel_faculty_ID->setDbValue($rs->fields('hda_degreeLevel_faculty_ID'));
		$this->hda_isEnrolledOrInResidence->setDbValue($rs->fields('hda_isEnrolledOrInResidence'));
		$this->hda_hasEarnedCreditUnits->setDbValue($rs->fields('hda_hasEarnedCreditUnits'));
		$this->hda_candidate->setDbValue($rs->fields('hda_candidate'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// hda_ID

		$this->hda_ID->CellCssStyle = "white-space: nowrap;";

		// hda_name
		$this->hda_name->CellCssStyle = "white-space: nowrap;";

		// hda_inActivePursuitofHigherDegree
		$this->hda_inActivePursuitofHigherDegree->CellCssStyle = "white-space: nowrap;";

		// hda_degreeLevel_degrees
		$this->hda_degreeLevel_degrees->CellCssStyle = "white-space: nowrap;";

		// hda_degreeLevel_faculty_ID
		$this->hda_degreeLevel_faculty_ID->CellCssStyle = "white-space: nowrap;";

		// hda_isEnrolledOrInResidence
		$this->hda_isEnrolledOrInResidence->CellCssStyle = "white-space: nowrap;";

		// hda_hasEarnedCreditUnits
		$this->hda_hasEarnedCreditUnits->CellCssStyle = "white-space: nowrap;";

		// hda_candidate
		$this->hda_candidate->CellCssStyle = "white-space: nowrap;";

		// hda_ID
		$this->hda_ID->ViewValue = $this->hda_ID->CurrentValue;
		$this->hda_ID->ViewCustomAttributes = "";

		// hda_name
		$this->hda_name->ViewValue = $this->hda_name->CurrentValue;
		$this->hda_name->ViewCustomAttributes = "";

		// hda_inActivePursuitofHigherDegree
		$this->hda_inActivePursuitofHigherDegree->ViewValue = $this->hda_inActivePursuitofHigherDegree->CurrentValue;
		$this->hda_inActivePursuitofHigherDegree->ViewCustomAttributes = "";

		// hda_degreeLevel_degrees
		if (strval($this->hda_degreeLevel_degrees->CurrentValue) <> "") {
			$sFilterWrk = "`degreeLevel_ID` = " . up_AdjustSql($this->hda_degreeLevel_degrees->CurrentValue) . "";
		$sSqlWrk = "SELECT `degreeLevel_name` FROM `ref_degreelevel_degrees`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
		$sSqlWrk .= " ORDER BY `degreeLevel_name` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->hda_degreeLevel_degrees->ViewValue = $rswrk->fields('degreeLevel_name');
				$rswrk->Close();
			} else {
				$this->hda_degreeLevel_degrees->ViewValue = $this->hda_degreeLevel_degrees->CurrentValue;
			}
		} else {
			$this->hda_degreeLevel_degrees->ViewValue = NULL;
		}
		$this->hda_degreeLevel_degrees->ViewCustomAttributes = "";

		// hda_degreeLevel_faculty_ID
		if (strval($this->hda_degreeLevel_faculty_ID->CurrentValue) <> "") {
			$sFilterWrk = "`degreelevelFaculty_ID` = " . up_AdjustSql($this->hda_degreeLevel_faculty_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `degreelevelFaculty_name` FROM `ref_degreelevel_faculty`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
		$sSqlWrk .= " ORDER BY `degreelevelFaculty_name` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->hda_degreeLevel_faculty_ID->ViewValue = $rswrk->fields('degreelevelFaculty_name');
				$rswrk->Close();
			} else {
				$this->hda_degreeLevel_faculty_ID->ViewValue = $this->hda_degreeLevel_faculty_ID->CurrentValue;
			}
		} else {
			$this->hda_degreeLevel_faculty_ID->ViewValue = NULL;
		}
		$this->hda_degreeLevel_faculty_ID->ViewCustomAttributes = "";

		// hda_isEnrolledOrInResidence
		$this->hda_isEnrolledOrInResidence->ViewValue = $this->hda_isEnrolledOrInResidence->CurrentValue;
		$this->hda_isEnrolledOrInResidence->ViewCustomAttributes = "";

		// hda_hasEarnedCreditUnits
		$this->hda_hasEarnedCreditUnits->ViewValue = $this->hda_hasEarnedCreditUnits->CurrentValue;
		$this->hda_hasEarnedCreditUnits->ViewCustomAttributes = "";

		// hda_candidate
		$this->hda_candidate->ViewValue = $this->hda_candidate->CurrentValue;
		$this->hda_candidate->ViewCustomAttributes = "";

		// hda_ID
		$this->hda_ID->LinkCustomAttributes = "";
		$this->hda_ID->HrefValue = "";
		$this->hda_ID->TooltipValue = "";

		// hda_name
		$this->hda_name->LinkCustomAttributes = "";
		$this->hda_name->HrefValue = "";
		$this->hda_name->TooltipValue = "";

		// hda_inActivePursuitofHigherDegree
		$this->hda_inActivePursuitofHigherDegree->LinkCustomAttributes = "";
		$this->hda_inActivePursuitofHigherDegree->HrefValue = "";
		$this->hda_inActivePursuitofHigherDegree->TooltipValue = "";

		// hda_degreeLevel_degrees
		$this->hda_degreeLevel_degrees->LinkCustomAttributes = "";
		$this->hda_degreeLevel_degrees->HrefValue = "";
		$this->hda_degreeLevel_degrees->TooltipValue = "";

		// hda_degreeLevel_faculty_ID
		$this->hda_degreeLevel_faculty_ID->LinkCustomAttributes = "";
		$this->hda_degreeLevel_faculty_ID->HrefValue = "";
		$this->hda_degreeLevel_faculty_ID->TooltipValue = "";

		// hda_isEnrolledOrInResidence
		$this->hda_isEnrolledOrInResidence->LinkCustomAttributes = "";
		$this->hda_isEnrolledOrInResidence->HrefValue = "";
		$this->hda_isEnrolledOrInResidence->TooltipValue = "";

		// hda_hasEarnedCreditUnits
		$this->hda_hasEarnedCreditUnits->LinkCustomAttributes = "";
		$this->hda_hasEarnedCreditUnits->HrefValue = "";
		$this->hda_hasEarnedCreditUnits->TooltipValue = "";

		// hda_candidate
		$this->hda_candidate->LinkCustomAttributes = "";
		$this->hda_candidate->HrefValue = "";
		$this->hda_candidate->TooltipValue = "";

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
					$XmlDoc->AddField('hda_ID', $this->hda_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_name', $this->hda_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_inActivePursuitofHigherDegree', $this->hda_inActivePursuitofHigherDegree->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_degreeLevel_degrees', $this->hda_degreeLevel_degrees->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_degreeLevel_faculty_ID', $this->hda_degreeLevel_faculty_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_isEnrolledOrInResidence', $this->hda_isEnrolledOrInResidence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_hasEarnedCreditUnits', $this->hda_hasEarnedCreditUnits->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_candidate', $this->hda_candidate->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('hda_ID', $this->hda_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_name', $this->hda_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_inActivePursuitofHigherDegree', $this->hda_inActivePursuitofHigherDegree->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_degreeLevel_degrees', $this->hda_degreeLevel_degrees->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_degreeLevel_faculty_ID', $this->hda_degreeLevel_faculty_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_isEnrolledOrInResidence', $this->hda_isEnrolledOrInResidence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_hasEarnedCreditUnits', $this->hda_hasEarnedCreditUnits->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('hda_candidate', $this->hda_candidate->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->hda_ID);
				$Doc->ExportCaption($this->hda_name);
				$Doc->ExportCaption($this->hda_inActivePursuitofHigherDegree);
				$Doc->ExportCaption($this->hda_degreeLevel_degrees);
				$Doc->ExportCaption($this->hda_degreeLevel_faculty_ID);
				$Doc->ExportCaption($this->hda_isEnrolledOrInResidence);
				$Doc->ExportCaption($this->hda_hasEarnedCreditUnits);
				$Doc->ExportCaption($this->hda_candidate);
			} else {
				$Doc->ExportCaption($this->hda_ID);
				$Doc->ExportCaption($this->hda_name);
				$Doc->ExportCaption($this->hda_inActivePursuitofHigherDegree);
				$Doc->ExportCaption($this->hda_degreeLevel_degrees);
				$Doc->ExportCaption($this->hda_degreeLevel_faculty_ID);
				$Doc->ExportCaption($this->hda_isEnrolledOrInResidence);
				$Doc->ExportCaption($this->hda_hasEarnedCreditUnits);
				$Doc->ExportCaption($this->hda_candidate);
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
					$Doc->ExportField($this->hda_ID);
					$Doc->ExportField($this->hda_name);
					$Doc->ExportField($this->hda_inActivePursuitofHigherDegree);
					$Doc->ExportField($this->hda_degreeLevel_degrees);
					$Doc->ExportField($this->hda_degreeLevel_faculty_ID);
					$Doc->ExportField($this->hda_isEnrolledOrInResidence);
					$Doc->ExportField($this->hda_hasEarnedCreditUnits);
					$Doc->ExportField($this->hda_candidate);
				} else {
					$Doc->ExportField($this->hda_ID);
					$Doc->ExportField($this->hda_name);
					$Doc->ExportField($this->hda_inActivePursuitofHigherDegree);
					$Doc->ExportField($this->hda_degreeLevel_degrees);
					$Doc->ExportField($this->hda_degreeLevel_faculty_ID);
					$Doc->ExportField($this->hda_isEnrolledOrInResidence);
					$Doc->ExportField($this->hda_hasEarnedCreditUnits);
					$Doc->ExportField($this->hda_candidate);
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
