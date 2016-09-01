<?php

// Global variable for table object
$tbl_faculty = NULL;

//
// Table class for tbl_faculty
//
class ctbl_faculty {
	var $TableVar = 'tbl_faculty';
	var $TableName = 'tbl_faculty';
	var $TableType = 'TABLE';
	var $faculty_ID;
	var $unitID;
	var $faculty_name;
	var $faculty_lastName;
	var $faculty_firstName;
	var $faculty_middleName;
	var $faculty_birthDate;
	var $gender_ID;
	var $faculty_hda_gen;
	var $faculty_inActivePursuitofHigherDegree_gen;
	var $faculty_highestDegreeListed;
	var $degreelevelFaculty_ID;
	var $faculty_isEnrolledOrInResidence;
	var $faculty_hasEarnedCreditUnits;
	var $faculty_candidate;
	var $faculty_authoritative_data;
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
	function ctbl_faculty() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// faculty_ID
		$this->faculty_ID = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_ID', 'faculty_ID', '`faculty_ID`', 3, -1, FALSE, '`faculty_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->faculty_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['faculty_ID'] =& $this->faculty_ID;

		// unitID
		$this->unitID = new cField('tbl_faculty', 'tbl_faculty', 'x_unitID', 'unitID', '`unitID`', 3, -1, FALSE, '`unitID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->unitID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['unitID'] =& $this->unitID;

		// faculty_name
		$this->faculty_name = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_name', 'faculty_name', '`faculty_name`', 200, -1, FALSE, '`faculty_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['faculty_name'] =& $this->faculty_name;

		// faculty_lastName
		$this->faculty_lastName = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_lastName', 'faculty_lastName', '`faculty_lastName`', 200, -1, FALSE, '`faculty_lastName`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['faculty_lastName'] =& $this->faculty_lastName;

		// faculty_firstName
		$this->faculty_firstName = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_firstName', 'faculty_firstName', '`faculty_firstName`', 200, -1, FALSE, '`faculty_firstName`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['faculty_firstName'] =& $this->faculty_firstName;

		// faculty_middleName
		$this->faculty_middleName = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_middleName', 'faculty_middleName', '`faculty_middleName`', 200, -1, FALSE, '`faculty_middleName`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['faculty_middleName'] =& $this->faculty_middleName;

		// faculty_birthDate
		$this->faculty_birthDate = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_birthDate', 'faculty_birthDate', '`faculty_birthDate`', 135, 6, FALSE, '`faculty_birthDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->faculty_birthDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['faculty_birthDate'] =& $this->faculty_birthDate;

		// gender_ID
		$this->gender_ID = new cField('tbl_faculty', 'tbl_faculty', 'x_gender_ID', 'gender_ID', '`gender_ID`', 200, -1, FALSE, '`gender_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['gender_ID'] =& $this->gender_ID;

		// faculty_hda_gen
		$this->faculty_hda_gen = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_hda_gen', 'faculty_hda_gen', '`faculty_hda_gen`', 3, -1, FALSE, '`faculty_hda_gen`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->faculty_hda_gen->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['faculty_hda_gen'] =& $this->faculty_hda_gen;

		// faculty_inActivePursuitofHigherDegree_gen
		$this->faculty_inActivePursuitofHigherDegree_gen = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_inActivePursuitofHigherDegree_gen', 'faculty_inActivePursuitofHigherDegree_gen', '`faculty_inActivePursuitofHigherDegree_gen`', 3, -1, FALSE, '`faculty_inActivePursuitofHigherDegree_gen`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->faculty_inActivePursuitofHigherDegree_gen->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['faculty_inActivePursuitofHigherDegree_gen'] =& $this->faculty_inActivePursuitofHigherDegree_gen;

		// faculty_highestDegreeListed
		$this->faculty_highestDegreeListed = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_highestDegreeListed', 'faculty_highestDegreeListed', '`faculty_highestDegreeListed`', 3, -1, FALSE, '`faculty_highestDegreeListed`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->faculty_highestDegreeListed->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['faculty_highestDegreeListed'] =& $this->faculty_highestDegreeListed;

		// degreelevelFaculty_ID
		$this->degreelevelFaculty_ID = new cField('tbl_faculty', 'tbl_faculty', 'x_degreelevelFaculty_ID', 'degreelevelFaculty_ID', '`degreelevelFaculty_ID`', 3, -1, FALSE, '`degreelevelFaculty_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->degreelevelFaculty_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['degreelevelFaculty_ID'] =& $this->degreelevelFaculty_ID;

		// faculty_isEnrolledOrInResidence
		$this->faculty_isEnrolledOrInResidence = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_isEnrolledOrInResidence', 'faculty_isEnrolledOrInResidence', '`faculty_isEnrolledOrInResidence`', 200, -1, FALSE, '`faculty_isEnrolledOrInResidence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['faculty_isEnrolledOrInResidence'] =& $this->faculty_isEnrolledOrInResidence;

		// faculty_hasEarnedCreditUnits
		$this->faculty_hasEarnedCreditUnits = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_hasEarnedCreditUnits', 'faculty_hasEarnedCreditUnits', '`faculty_hasEarnedCreditUnits`', 200, -1, FALSE, '`faculty_hasEarnedCreditUnits`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['faculty_hasEarnedCreditUnits'] =& $this->faculty_hasEarnedCreditUnits;

		// faculty_candidate
		$this->faculty_candidate = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_candidate', 'faculty_candidate', '`faculty_candidate`', 200, -1, FALSE, '`faculty_candidate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['faculty_candidate'] =& $this->faculty_candidate;

		// faculty_authoritative_data
		$this->faculty_authoritative_data = new cField('tbl_faculty', 'tbl_faculty', 'x_faculty_authoritative_data', 'faculty_authoritative_data', '`faculty_authoritative_data`', 3, -1, FALSE, '`faculty_authoritative_data`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->faculty_authoritative_data->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['faculty_authoritative_data'] =& $this->faculty_authoritative_data;
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
		return "tbl_faculty_Highlight";
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
		if ($this->getCurrentMasterTable() == "tbl_uporgchart_unit") {
			if ($this->unitID->getSessionValue() <> "")
				$sMasterFilter .= "`unitID`=" . up_QuotedValue($this->unitID->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sMasterFilter;
	}

	// Session detail WHERE clause
	function getDetailFilter() {

		// Detail filter
		$sDetailFilter = "";
		if ($this->getCurrentMasterTable() == "tbl_uporgchart_unit") {
			if ($this->unitID->getSessionValue() <> "")
				$sDetailFilter .= "`unitID`=" . up_QuotedValue($this->unitID->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sDetailFilter;
	}

	// Master filter
	function SqlMasterFilter_tbl_uporgchart_unit() {
		return "`unitID`=@unitID@";
	}

	// Detail filter
	function SqlDetailFilter_tbl_uporgchart_unit() {
		return "`unitID`=@unitID@";
	}

	// Current detail table name
	function getCurrentDetailTable() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_DETAIL_TABLE];
	}

	function setCurrentDetailTable($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_DETAIL_TABLE] = $v;
	}

	// Get detail url
	function getDetailUrl() {

		// Detail url
		$sDetailUrl = "";
		if ($this->getCurrentDetailTable() == "tbl_degrees") {
			$sDetailUrl = $GLOBALS["tbl_degrees"]->ListUrl() . "?showmaster=" . $this->TableVar;
			$sDetailUrl .= "&faculty_ID=" . $this->faculty_ID->CurrentValue;
		}
		return $sDetailUrl;
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`tbl_faculty`";
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
		return "`faculty_name` ASC";
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
		return "INSERT INTO `tbl_faculty` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `tbl_faculty` SET ";
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
		$SQL = "DELETE FROM `tbl_faculty` WHERE ";
		$SQL .= up_QuotedName('faculty_ID') . '=' . up_QuotedValue($rs['faculty_ID'], $this->faculty_ID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`faculty_ID` = @faculty_ID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->faculty_ID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@faculty_ID@", up_AdjustSql($this->faculty_ID->CurrentValue), $sKeyFilter); // Replace key value
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
			return "tbl_facultylist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "tbl_facultylist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("tbl_facultyview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "tbl_facultyadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		if ($parm <> "")
			return $this->KeyUrl("tbl_facultyedit.php", $this->UrlParm($parm));
		else
			return $this->KeyUrl("tbl_facultyedit.php", $this->UrlParm(UP_TABLE_SHOW_DETAIL . "="));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		if ($parm <> "")
			return $this->KeyUrl("tbl_facultyadd.php", $this->UrlParm($parm));
		else
			return $this->KeyUrl("tbl_facultyadd.php", $this->UrlParm(UP_TABLE_SHOW_DETAIL . "="));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("tbl_facultydelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->faculty_ID->CurrentValue)) {
			$sUrl .= "faculty_ID=" . urlencode($this->faculty_ID->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=tbl_faculty" : "";
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
			$arKeys[] = @$_GET["faculty_ID"]; // faculty_ID

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
			$this->faculty_ID->CurrentValue = $key;
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
		$this->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$this->unitID->setDbValue($rs->fields('unitID'));
		$this->faculty_name->setDbValue($rs->fields('faculty_name'));
		$this->faculty_lastName->setDbValue($rs->fields('faculty_lastName'));
		$this->faculty_firstName->setDbValue($rs->fields('faculty_firstName'));
		$this->faculty_middleName->setDbValue($rs->fields('faculty_middleName'));
		$this->faculty_birthDate->setDbValue($rs->fields('faculty_birthDate'));
		$this->gender_ID->setDbValue($rs->fields('gender_ID'));
		$this->faculty_hda_gen->setDbValue($rs->fields('faculty_hda_gen'));
		$this->faculty_inActivePursuitofHigherDegree_gen->setDbValue($rs->fields('faculty_inActivePursuitofHigherDegree_gen'));
		$this->faculty_highestDegreeListed->setDbValue($rs->fields('faculty_highestDegreeListed'));
		$this->degreelevelFaculty_ID->setDbValue($rs->fields('degreelevelFaculty_ID'));
		$this->faculty_isEnrolledOrInResidence->setDbValue($rs->fields('faculty_isEnrolledOrInResidence'));
		$this->faculty_hasEarnedCreditUnits->setDbValue($rs->fields('faculty_hasEarnedCreditUnits'));
		$this->faculty_candidate->setDbValue($rs->fields('faculty_candidate'));
		$this->faculty_authoritative_data->setDbValue($rs->fields('faculty_authoritative_data'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// faculty_ID

		$this->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// unitID
		$this->unitID->CellCssStyle = "white-space: nowrap;";

		// faculty_name
		$this->faculty_name->CellCssStyle = "white-space: nowrap;";

		// faculty_lastName
		$this->faculty_lastName->CellCssStyle = "white-space: nowrap;";

		// faculty_firstName
		$this->faculty_firstName->CellCssStyle = "white-space: nowrap;";

		// faculty_middleName
		$this->faculty_middleName->CellCssStyle = "white-space: nowrap;";

		// faculty_birthDate
		$this->faculty_birthDate->CellCssStyle = "white-space: nowrap;";

		// gender_ID
		$this->gender_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_hda_gen
		$this->faculty_hda_gen->CellCssStyle = "white-space: nowrap;";

		// faculty_inActivePursuitofHigherDegree_gen
		$this->faculty_inActivePursuitofHigherDegree_gen->CellCssStyle = "white-space: nowrap;";

		// faculty_highestDegreeListed
		$this->faculty_highestDegreeListed->CellCssStyle = "white-space: nowrap;";

		// degreelevelFaculty_ID
		// faculty_isEnrolledOrInResidence

		$this->faculty_isEnrolledOrInResidence->CellCssStyle = "white-space: nowrap;";

		// faculty_hasEarnedCreditUnits
		$this->faculty_hasEarnedCreditUnits->CellCssStyle = "white-space: nowrap;";

		// faculty_candidate
		$this->faculty_candidate->CellCssStyle = "white-space: nowrap;";

		// faculty_authoritative_data
		$this->faculty_authoritative_data->CellCssStyle = "white-space: nowrap;";

		// faculty_ID
		$this->faculty_ID->ViewValue = $this->faculty_ID->CurrentValue;
		$this->faculty_ID->ViewCustomAttributes = "";

		// unitID
		$this->unitID->ViewValue = $this->unitID->CurrentValue;
		if (strval($this->unitID->CurrentValue) <> "") {
			$sFilterWrk = "`unitID` = " . up_AdjustSql($this->unitID->CurrentValue) . "";
		$sSqlWrk = "SELECT `nameOfUnit` FROM `tbl_uporgchart_unit`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->unitID->ViewValue = $rswrk->fields('nameOfUnit');
				$rswrk->Close();
			} else {
				$this->unitID->ViewValue = $this->unitID->CurrentValue;
			}
		} else {
			$this->unitID->ViewValue = NULL;
		}
		$this->unitID->ViewCustomAttributes = "";

		// faculty_name
		$this->faculty_name->ViewValue = $this->faculty_name->CurrentValue;
		$this->faculty_name->ViewCustomAttributes = "";

		// faculty_lastName
		$this->faculty_lastName->ViewValue = $this->faculty_lastName->CurrentValue;
		$this->faculty_lastName->ViewCustomAttributes = "";

		// faculty_firstName
		$this->faculty_firstName->ViewValue = $this->faculty_firstName->CurrentValue;
		$this->faculty_firstName->ViewCustomAttributes = "";

		// faculty_middleName
		$this->faculty_middleName->ViewValue = $this->faculty_middleName->CurrentValue;
		$this->faculty_middleName->ViewCustomAttributes = "";

		// faculty_birthDate
		$this->faculty_birthDate->ViewValue = $this->faculty_birthDate->CurrentValue;
		$this->faculty_birthDate->ViewValue = up_FormatDateTime($this->faculty_birthDate->ViewValue, 6);
		$this->faculty_birthDate->ViewCustomAttributes = "";

		// gender_ID
		if (strval($this->gender_ID->CurrentValue) <> "") {
			switch ($this->gender_ID->CurrentValue) {
				case "F":
					$this->gender_ID->ViewValue = $this->gender_ID->FldTagCaption(1) <> "" ? $this->gender_ID->FldTagCaption(1) : $this->gender_ID->CurrentValue;
					break;
				case "M":
					$this->gender_ID->ViewValue = $this->gender_ID->FldTagCaption(2) <> "" ? $this->gender_ID->FldTagCaption(2) : $this->gender_ID->CurrentValue;
					break;
				default:
					$this->gender_ID->ViewValue = $this->gender_ID->CurrentValue;
			}
		} else {
			$this->gender_ID->ViewValue = NULL;
		}
		$this->gender_ID->ViewCustomAttributes = "";

		// faculty_hda_gen
		$this->faculty_hda_gen->ViewValue = $this->faculty_hda_gen->CurrentValue;
		$this->faculty_hda_gen->ViewCustomAttributes = "";

		// faculty_inActivePursuitofHigherDegree_gen
		$this->faculty_inActivePursuitofHigherDegree_gen->ViewValue = $this->faculty_inActivePursuitofHigherDegree_gen->CurrentValue;
		$this->faculty_inActivePursuitofHigherDegree_gen->ViewCustomAttributes = "";

		// faculty_highestDegreeListed
		$this->faculty_highestDegreeListed->ViewValue = $this->faculty_highestDegreeListed->CurrentValue;
		if (strval($this->faculty_highestDegreeListed->CurrentValue) <> "") {
			$sFilterWrk = "`degreeLevel_ID` = " . up_AdjustSql($this->faculty_highestDegreeListed->CurrentValue) . "";
		$sSqlWrk = "SELECT `degreeLevel_name` FROM `ref_degreelevel_degrees`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->faculty_highestDegreeListed->ViewValue = $rswrk->fields('degreeLevel_name');
				$rswrk->Close();
			} else {
				$this->faculty_highestDegreeListed->ViewValue = $this->faculty_highestDegreeListed->CurrentValue;
			}
		} else {
			$this->faculty_highestDegreeListed->ViewValue = NULL;
		}
		$this->faculty_highestDegreeListed->ViewCustomAttributes = "";

		// degreelevelFaculty_ID
		if (strval($this->degreelevelFaculty_ID->CurrentValue) <> "") {
			$sFilterWrk = "`degreelevelFaculty_ID` = " . up_AdjustSql($this->degreelevelFaculty_ID->CurrentValue) . "";
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
				$this->degreelevelFaculty_ID->ViewValue = $rswrk->fields('degreelevelFaculty_name');
				$rswrk->Close();
			} else {
				$this->degreelevelFaculty_ID->ViewValue = $this->degreelevelFaculty_ID->CurrentValue;
			}
		} else {
			$this->degreelevelFaculty_ID->ViewValue = NULL;
		}
		$this->degreelevelFaculty_ID->ViewCustomAttributes = "";

		// faculty_isEnrolledOrInResidence
		if (strval($this->faculty_isEnrolledOrInResidence->CurrentValue) <> "") {
			switch ($this->faculty_isEnrolledOrInResidence->CurrentValue) {
				case "Y":
					$this->faculty_isEnrolledOrInResidence->ViewValue = $this->faculty_isEnrolledOrInResidence->FldTagCaption(1) <> "" ? $this->faculty_isEnrolledOrInResidence->FldTagCaption(1) : $this->faculty_isEnrolledOrInResidence->CurrentValue;
					break;
				case "N":
					$this->faculty_isEnrolledOrInResidence->ViewValue = $this->faculty_isEnrolledOrInResidence->FldTagCaption(2) <> "" ? $this->faculty_isEnrolledOrInResidence->FldTagCaption(2) : $this->faculty_isEnrolledOrInResidence->CurrentValue;
					break;
				default:
					$this->faculty_isEnrolledOrInResidence->ViewValue = $this->faculty_isEnrolledOrInResidence->CurrentValue;
			}
		} else {
			$this->faculty_isEnrolledOrInResidence->ViewValue = NULL;
		}
		$this->faculty_isEnrolledOrInResidence->ViewCustomAttributes = "";

		// faculty_hasEarnedCreditUnits
		if (strval($this->faculty_hasEarnedCreditUnits->CurrentValue) <> "") {
			switch ($this->faculty_hasEarnedCreditUnits->CurrentValue) {
				case "Y":
					$this->faculty_hasEarnedCreditUnits->ViewValue = $this->faculty_hasEarnedCreditUnits->FldTagCaption(1) <> "" ? $this->faculty_hasEarnedCreditUnits->FldTagCaption(1) : $this->faculty_hasEarnedCreditUnits->CurrentValue;
					break;
				case "N":
					$this->faculty_hasEarnedCreditUnits->ViewValue = $this->faculty_hasEarnedCreditUnits->FldTagCaption(2) <> "" ? $this->faculty_hasEarnedCreditUnits->FldTagCaption(2) : $this->faculty_hasEarnedCreditUnits->CurrentValue;
					break;
				default:
					$this->faculty_hasEarnedCreditUnits->ViewValue = $this->faculty_hasEarnedCreditUnits->CurrentValue;
			}
		} else {
			$this->faculty_hasEarnedCreditUnits->ViewValue = NULL;
		}
		$this->faculty_hasEarnedCreditUnits->ViewCustomAttributes = "";

		// faculty_candidate
		if (strval($this->faculty_candidate->CurrentValue) <> "") {
			switch ($this->faculty_candidate->CurrentValue) {
				case "Y":
					$this->faculty_candidate->ViewValue = $this->faculty_candidate->FldTagCaption(1) <> "" ? $this->faculty_candidate->FldTagCaption(1) : $this->faculty_candidate->CurrentValue;
					break;
				case "N":
					$this->faculty_candidate->ViewValue = $this->faculty_candidate->FldTagCaption(2) <> "" ? $this->faculty_candidate->FldTagCaption(2) : $this->faculty_candidate->CurrentValue;
					break;
				default:
					$this->faculty_candidate->ViewValue = $this->faculty_candidate->CurrentValue;
			}
		} else {
			$this->faculty_candidate->ViewValue = NULL;
		}
		$this->faculty_candidate->ViewCustomAttributes = "";

		// faculty_authoritative_data
		$this->faculty_authoritative_data->ViewValue = $this->faculty_authoritative_data->CurrentValue;
		$this->faculty_authoritative_data->ViewCustomAttributes = "";

		// faculty_ID
		$this->faculty_ID->LinkCustomAttributes = "";
		$this->faculty_ID->HrefValue = "";
		$this->faculty_ID->TooltipValue = "";

		// unitID
		$this->unitID->LinkCustomAttributes = "";
		$this->unitID->HrefValue = "";
		$this->unitID->TooltipValue = "";

		// faculty_name
		$this->faculty_name->LinkCustomAttributes = "";
		$this->faculty_name->HrefValue = "";
		$this->faculty_name->TooltipValue = "";

		// faculty_lastName
		$this->faculty_lastName->LinkCustomAttributes = "";
		$this->faculty_lastName->HrefValue = "";
		$this->faculty_lastName->TooltipValue = "";

		// faculty_firstName
		$this->faculty_firstName->LinkCustomAttributes = "";
		$this->faculty_firstName->HrefValue = "";
		$this->faculty_firstName->TooltipValue = "";

		// faculty_middleName
		$this->faculty_middleName->LinkCustomAttributes = "";
		$this->faculty_middleName->HrefValue = "";
		$this->faculty_middleName->TooltipValue = "";

		// faculty_birthDate
		$this->faculty_birthDate->LinkCustomAttributes = "";
		$this->faculty_birthDate->HrefValue = "";
		$this->faculty_birthDate->TooltipValue = "";

		// gender_ID
		$this->gender_ID->LinkCustomAttributes = "";
		$this->gender_ID->HrefValue = "";
		$this->gender_ID->TooltipValue = "";

		// faculty_hda_gen
		$this->faculty_hda_gen->LinkCustomAttributes = "";
		$this->faculty_hda_gen->HrefValue = "";
		$this->faculty_hda_gen->TooltipValue = "";

		// faculty_inActivePursuitofHigherDegree_gen
		$this->faculty_inActivePursuitofHigherDegree_gen->LinkCustomAttributes = "";
		$this->faculty_inActivePursuitofHigherDegree_gen->HrefValue = "";
		$this->faculty_inActivePursuitofHigherDegree_gen->TooltipValue = "";

		// faculty_highestDegreeListed
		$this->faculty_highestDegreeListed->LinkCustomAttributes = "";
		$this->faculty_highestDegreeListed->HrefValue = "";
		$this->faculty_highestDegreeListed->TooltipValue = "";

		// degreelevelFaculty_ID
		$this->degreelevelFaculty_ID->LinkCustomAttributes = "";
		$this->degreelevelFaculty_ID->HrefValue = "";
		$this->degreelevelFaculty_ID->TooltipValue = "";

		// faculty_isEnrolledOrInResidence
		$this->faculty_isEnrolledOrInResidence->LinkCustomAttributes = "";
		$this->faculty_isEnrolledOrInResidence->HrefValue = "";
		$this->faculty_isEnrolledOrInResidence->TooltipValue = "";

		// faculty_hasEarnedCreditUnits
		$this->faculty_hasEarnedCreditUnits->LinkCustomAttributes = "";
		$this->faculty_hasEarnedCreditUnits->HrefValue = "";
		$this->faculty_hasEarnedCreditUnits->TooltipValue = "";

		// faculty_candidate
		$this->faculty_candidate->LinkCustomAttributes = "";
		$this->faculty_candidate->HrefValue = "";
		$this->faculty_candidate->TooltipValue = "";

		// faculty_authoritative_data
		$this->faculty_authoritative_data->LinkCustomAttributes = "";
		$this->faculty_authoritative_data->HrefValue = "";
		$this->faculty_authoritative_data->TooltipValue = "";

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
					$XmlDoc->AddField('unitID', $this->unitID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('faculty_lastName', $this->faculty_lastName->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('faculty_firstName', $this->faculty_firstName->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('faculty_middleName', $this->faculty_middleName->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('faculty_birthDate', $this->faculty_birthDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('gender_ID', $this->gender_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('degreelevelFaculty_ID', $this->degreelevelFaculty_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('faculty_isEnrolledOrInResidence', $this->faculty_isEnrolledOrInResidence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('faculty_hasEarnedCreditUnits', $this->faculty_hasEarnedCreditUnits->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('faculty_candidate', $this->faculty_candidate->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('faculty_name', $this->faculty_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('faculty_birthDate', $this->faculty_birthDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('gender_ID', $this->gender_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('faculty_highestDegreeListed', $this->faculty_highestDegreeListed->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('degreelevelFaculty_ID', $this->degreelevelFaculty_ID->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->unitID);
				$Doc->ExportCaption($this->faculty_lastName);
				$Doc->ExportCaption($this->faculty_firstName);
				$Doc->ExportCaption($this->faculty_middleName);
				$Doc->ExportCaption($this->faculty_birthDate);
				$Doc->ExportCaption($this->gender_ID);
				$Doc->ExportCaption($this->degreelevelFaculty_ID);
				$Doc->ExportCaption($this->faculty_isEnrolledOrInResidence);
				$Doc->ExportCaption($this->faculty_hasEarnedCreditUnits);
				$Doc->ExportCaption($this->faculty_candidate);
			} else {
				$Doc->ExportCaption($this->faculty_name);
				$Doc->ExportCaption($this->faculty_birthDate);
				$Doc->ExportCaption($this->gender_ID);
				$Doc->ExportCaption($this->faculty_highestDegreeListed);
				$Doc->ExportCaption($this->degreelevelFaculty_ID);
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
					$Doc->ExportField($this->unitID);
					$Doc->ExportField($this->faculty_lastName);
					$Doc->ExportField($this->faculty_firstName);
					$Doc->ExportField($this->faculty_middleName);
					$Doc->ExportField($this->faculty_birthDate);
					$Doc->ExportField($this->gender_ID);
					$Doc->ExportField($this->degreelevelFaculty_ID);
					$Doc->ExportField($this->faculty_isEnrolledOrInResidence);
					$Doc->ExportField($this->faculty_hasEarnedCreditUnits);
					$Doc->ExportField($this->faculty_candidate);
				} else {
					$Doc->ExportField($this->faculty_name);
					$Doc->ExportField($this->faculty_birthDate);
					$Doc->ExportField($this->gender_ID);
					$Doc->ExportField($this->faculty_highestDegreeListed);
					$Doc->ExportField($this->degreelevelFaculty_ID);
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
