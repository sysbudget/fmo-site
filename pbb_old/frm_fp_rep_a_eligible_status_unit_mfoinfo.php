<?php

// Global variable for table object
$frm_fp_rep_a_eligible_status_unit_mfo = NULL;

//
// Table class for frm_fp_rep_a_eligible_status_unit_mfo
//
class cfrm_fp_rep_a_eligible_status_unit_mfo {
	var $TableVar = 'frm_fp_rep_a_eligible_status_unit_mfo';
	var $TableName = 'frm_fp_rep_a_eligible_status_unit_mfo';
	var $TableType = 'TABLE';
	var $focal_person_id;
	var $cu_short_name;
	var $cu_sequence;
	var $units_id;
	var $cu_unit_name;
	var $mfo;
	var $mfo_name_rep;
	var $budget;
	var $Participated_PI;
	var $Not_Started_PI;
	var $z25_Not_Started_PI;
	var $Status;
	var $Not_Eligible_PI_Count;
	var $z25_Not_Eligible_PI_Count;
	var $Eligible_PI_Count;
	var $z25_Eligible_PI_Count;
	var $Remarks;
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
	function cfrm_fp_rep_a_eligible_status_unit_mfo() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// focal_person_id
		$this->focal_person_id = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_focal_person_id', 'focal_person_id', '`focal_person_id`', 3, -1, FALSE, '`focal_person_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focal_person_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focal_person_id'] =& $this->focal_person_id;

		// cu_short_name
		$this->cu_short_name = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_cu_short_name', 'cu_short_name', '`cu_short_name`', 200, -1, FALSE, '`cu_short_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['cu_short_name'] =& $this->cu_short_name;

		// cu_sequence
		$this->cu_sequence = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_cu_sequence', 'cu_sequence', '`cu_sequence`', 3, -1, FALSE, '`cu_sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cu_sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cu_sequence'] =& $this->cu_sequence;

		// units_id
		$this->units_id = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_units_id', 'units_id', '`units_id`', 3, -1, FALSE, '`units_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->units_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['units_id'] =& $this->units_id;

		// cu_unit_name
		$this->cu_unit_name = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_cu_unit_name', 'cu_unit_name', '`cu_unit_name`', 200, -1, FALSE, '`cu_unit_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['cu_unit_name'] =& $this->cu_unit_name;

		// mfo
		$this->mfo = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_mfo', 'mfo', '`mfo`', 3, -1, FALSE, '`mfo`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo'] =& $this->mfo;

		// mfo_name_rep
		$this->mfo_name_rep = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_mfo_name_rep', 'mfo_name_rep', '`mfo_name_rep`', 200, -1, FALSE, '`mfo_name_rep`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_name_rep'] =& $this->mfo_name_rep;

		// budget
		$this->budget = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_budget', 'budget', '`budget`', 131, -1, FALSE, '`budget`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->budget->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['budget'] =& $this->budget;

		// Participated PI
		$this->Participated_PI = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_Participated_PI', 'Participated PI', '`Participated PI`', 20, -1, FALSE, '`Participated PI`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Participated_PI->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Participated PI'] =& $this->Participated_PI;

		// Not Started PI
		$this->Not_Started_PI = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_Not_Started_PI', 'Not Started PI', '`Not Started PI`', 20, -1, FALSE, '`Not Started PI`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Not_Started_PI->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Not Started PI'] =& $this->Not_Started_PI;

		// % Not Started PI
		$this->z25_Not_Started_PI = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_z25_Not_Started_PI', '% Not Started PI', '`% Not Started PI`', 131, -1, FALSE, '`% Not Started PI`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z25_Not_Started_PI->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['% Not Started PI'] =& $this->z25_Not_Started_PI;

		// Status
		$this->Status = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_Status', 'Status', '`Status`', 200, -1, FALSE, '`Status`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Status'] =& $this->Status;

		// Not Eligible PI Count
		$this->Not_Eligible_PI_Count = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_Not_Eligible_PI_Count', 'Not Eligible PI Count', '`Not Eligible PI Count`', 20, -1, FALSE, '`Not Eligible PI Count`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Not_Eligible_PI_Count->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Not Eligible PI Count'] =& $this->Not_Eligible_PI_Count;

		// % Not Eligible PI Count
		$this->z25_Not_Eligible_PI_Count = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_z25_Not_Eligible_PI_Count', '% Not Eligible PI Count', '`% Not Eligible PI Count`', 131, -1, FALSE, '`% Not Eligible PI Count`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z25_Not_Eligible_PI_Count->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['% Not Eligible PI Count'] =& $this->z25_Not_Eligible_PI_Count;

		// Eligible PI Count
		$this->Eligible_PI_Count = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_Eligible_PI_Count', 'Eligible PI Count', '`Eligible PI Count`', 20, -1, FALSE, '`Eligible PI Count`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Eligible_PI_Count->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Eligible PI Count'] =& $this->Eligible_PI_Count;

		// % Eligible PI Count
		$this->z25_Eligible_PI_Count = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_z25_Eligible_PI_Count', '% Eligible PI Count', '`% Eligible PI Count`', 131, -1, FALSE, '`% Eligible PI Count`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z25_Eligible_PI_Count->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['% Eligible PI Count'] =& $this->z25_Eligible_PI_Count;

		// Remarks
		$this->Remarks = new cField('frm_fp_rep_a_eligible_status_unit_mfo', 'frm_fp_rep_a_eligible_status_unit_mfo', 'x_Remarks', 'Remarks', '`Remarks`', 200, -1, FALSE, '`Remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks'] =& $this->Remarks;
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
		return "frm_fp_rep_a_eligible_status_unit_mfo_Highlight";
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
		if ($this->getCurrentMasterTable() == "frm_fp_rep_a_eligible_status_unit") {
			if ($this->units_id->getSessionValue() <> "")
				$sMasterFilter .= "`units_id`=" . up_QuotedValue($this->units_id->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sMasterFilter;
	}

	// Session detail WHERE clause
	function getDetailFilter() {

		// Detail filter
		$sDetailFilter = "";
		if ($this->getCurrentMasterTable() == "frm_fp_rep_a_eligible_status_unit") {
			if ($this->units_id->getSessionValue() <> "")
				$sDetailFilter .= "`units_id`=" . up_QuotedValue($this->units_id->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sDetailFilter;
	}

	// Master filter
	function SqlMasterFilter_frm_fp_rep_a_eligible_status_unit() {
		return "`units_id`=@units_id@";
	}

	// Detail filter
	function SqlDetailFilter_frm_fp_rep_a_eligible_status_unit() {
		return "`units_id`=@units_id@";
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
		if ($this->getCurrentDetailTable() == "frm_fp_pbb_detail_accomplishment") {
			$sDetailUrl = $GLOBALS["frm_fp_pbb_detail_accomplishment"]->ListUrl() . "?showmaster=" . $this->TableVar;
			$sDetailUrl .= "&units_id=" . $this->units_id->CurrentValue;
			$sDetailUrl .= "&mfo=" . $this->mfo->CurrentValue;
		}
		return $sDetailUrl;
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`frm_fp_rep_a_eligible_status_unit_mfo`";
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
		return "INSERT INTO `frm_fp_rep_a_eligible_status_unit_mfo` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_fp_rep_a_eligible_status_unit_mfo` SET ";
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
		$SQL = "DELETE FROM `frm_fp_rep_a_eligible_status_unit_mfo` WHERE ";
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
			return "frm_fp_rep_a_eligible_status_unit_mfolist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_fp_rep_a_eligible_status_unit_mfolist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_fp_rep_a_eligible_status_unit_mfoview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_fp_rep_a_eligible_status_unit_mfoadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_fp_rep_a_eligible_status_unit_mfoedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_fp_rep_a_eligible_status_unit_mfoadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_fp_rep_a_eligible_status_unit_mfodelete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_fp_rep_a_eligible_status_unit_mfo" : "";
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
		$this->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$this->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$this->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$this->units_id->setDbValue($rs->fields('units_id'));
		$this->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$this->mfo->setDbValue($rs->fields('mfo'));
		$this->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$this->budget->setDbValue($rs->fields('budget'));
		$this->Participated_PI->setDbValue($rs->fields('Participated PI'));
		$this->Not_Started_PI->setDbValue($rs->fields('Not Started PI'));
		$this->z25_Not_Started_PI->setDbValue($rs->fields('% Not Started PI'));
		$this->Status->setDbValue($rs->fields('Status'));
		$this->Not_Eligible_PI_Count->setDbValue($rs->fields('Not Eligible PI Count'));
		$this->z25_Not_Eligible_PI_Count->setDbValue($rs->fields('% Not Eligible PI Count'));
		$this->Eligible_PI_Count->setDbValue($rs->fields('Eligible PI Count'));
		$this->z25_Eligible_PI_Count->setDbValue($rs->fields('% Eligible PI Count'));
		$this->Remarks->setDbValue($rs->fields('Remarks'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// focal_person_id

		$this->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// cu_short_name
		$this->cu_short_name->CellCssStyle = "white-space: nowrap;";

		// cu_sequence
		$this->cu_sequence->CellCssStyle = "white-space: nowrap;";

		// units_id
		$this->units_id->CellCssStyle = "white-space: nowrap;";

		// cu_unit_name
		$this->cu_unit_name->CellCssStyle = "white-space: nowrap;";

		// mfo
		$this->mfo->CellCssStyle = "white-space: nowrap;";

		// mfo_name_rep
		$this->mfo_name_rep->CellCssStyle = "white-space: nowrap;";

		// budget
		$this->budget->CellCssStyle = "white-space: nowrap;";

		// Participated PI
		$this->Participated_PI->CellCssStyle = "white-space: nowrap;";

		// Not Started PI
		$this->Not_Started_PI->CellCssStyle = "white-space: nowrap;";

		// % Not Started PI
		$this->z25_Not_Started_PI->CellCssStyle = "white-space: nowrap;";

		// Status
		$this->Status->CellCssStyle = "white-space: nowrap;";

		// Not Eligible PI Count
		$this->Not_Eligible_PI_Count->CellCssStyle = "white-space: nowrap;";

		// % Not Eligible PI Count
		$this->z25_Not_Eligible_PI_Count->CellCssStyle = "white-space: nowrap;";

		// Eligible PI Count
		$this->Eligible_PI_Count->CellCssStyle = "white-space: nowrap;";

		// % Eligible PI Count
		$this->z25_Eligible_PI_Count->CellCssStyle = "white-space: nowrap;";

		// Remarks
		$this->Remarks->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$this->focal_person_id->ViewValue = $this->focal_person_id->CurrentValue;
		$this->focal_person_id->ViewCustomAttributes = "";

		// cu_short_name
		$this->cu_short_name->ViewValue = $this->cu_short_name->CurrentValue;
		$this->cu_short_name->ViewCustomAttributes = "";

		// cu_sequence
		$this->cu_sequence->ViewValue = $this->cu_sequence->CurrentValue;
		$this->cu_sequence->ViewCustomAttributes = "";

		// units_id
		$this->units_id->ViewValue = $this->units_id->CurrentValue;
		$this->units_id->ViewCustomAttributes = "";

		// cu_unit_name
		$this->cu_unit_name->ViewValue = $this->cu_unit_name->CurrentValue;
		$this->cu_unit_name->ViewCustomAttributes = "";

		// mfo
		$this->mfo->ViewValue = $this->mfo->CurrentValue;
		$this->mfo->ViewCustomAttributes = "";

		// mfo_name_rep
		$this->mfo_name_rep->ViewValue = $this->mfo_name_rep->CurrentValue;
		$this->mfo_name_rep->ViewCustomAttributes = "";

		// budget
		$this->budget->ViewValue = $this->budget->CurrentValue;
		$this->budget->ViewCustomAttributes = "";

		// Participated PI
		$this->Participated_PI->ViewValue = $this->Participated_PI->CurrentValue;
		$this->Participated_PI->ViewCustomAttributes = "";

		// Not Started PI
		$this->Not_Started_PI->ViewValue = $this->Not_Started_PI->CurrentValue;
		$this->Not_Started_PI->ViewCustomAttributes = "";

		// % Not Started PI
		$this->z25_Not_Started_PI->ViewValue = $this->z25_Not_Started_PI->CurrentValue;
		$this->z25_Not_Started_PI->ViewCustomAttributes = "";

		// Status
		$this->Status->ViewValue = $this->Status->CurrentValue;
		$this->Status->ViewCustomAttributes = "";

		// Not Eligible PI Count
		$this->Not_Eligible_PI_Count->ViewValue = $this->Not_Eligible_PI_Count->CurrentValue;
		$this->Not_Eligible_PI_Count->ViewCustomAttributes = "";

		// % Not Eligible PI Count
		$this->z25_Not_Eligible_PI_Count->ViewValue = $this->z25_Not_Eligible_PI_Count->CurrentValue;
		$this->z25_Not_Eligible_PI_Count->ViewCustomAttributes = "";

		// Eligible PI Count
		$this->Eligible_PI_Count->ViewValue = $this->Eligible_PI_Count->CurrentValue;
		$this->Eligible_PI_Count->ViewCustomAttributes = "";

		// % Eligible PI Count
		$this->z25_Eligible_PI_Count->ViewValue = $this->z25_Eligible_PI_Count->CurrentValue;
		$this->z25_Eligible_PI_Count->ViewCustomAttributes = "";

		// Remarks
		$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
		$this->Remarks->ViewCustomAttributes = "";

		// focal_person_id
		$this->focal_person_id->LinkCustomAttributes = "";
		$this->focal_person_id->HrefValue = "";
		$this->focal_person_id->TooltipValue = "";

		// cu_short_name
		$this->cu_short_name->LinkCustomAttributes = "";
		$this->cu_short_name->HrefValue = "";
		$this->cu_short_name->TooltipValue = "";

		// cu_sequence
		$this->cu_sequence->LinkCustomAttributes = "";
		$this->cu_sequence->HrefValue = "";
		$this->cu_sequence->TooltipValue = "";

		// units_id
		$this->units_id->LinkCustomAttributes = "";
		$this->units_id->HrefValue = "";
		$this->units_id->TooltipValue = "";

		// cu_unit_name
		$this->cu_unit_name->LinkCustomAttributes = "";
		$this->cu_unit_name->HrefValue = "";
		$this->cu_unit_name->TooltipValue = "";

		// mfo
		$this->mfo->LinkCustomAttributes = "";
		$this->mfo->HrefValue = "";
		$this->mfo->TooltipValue = "";

		// mfo_name_rep
		$this->mfo_name_rep->LinkCustomAttributes = "";
		$this->mfo_name_rep->HrefValue = "";
		$this->mfo_name_rep->TooltipValue = "";

		// budget
		$this->budget->LinkCustomAttributes = "";
		$this->budget->HrefValue = "";
		$this->budget->TooltipValue = "";

		// Participated PI
		$this->Participated_PI->LinkCustomAttributes = "";
		$this->Participated_PI->HrefValue = "";
		$this->Participated_PI->TooltipValue = "";

		// Not Started PI
		$this->Not_Started_PI->LinkCustomAttributes = "";
		$this->Not_Started_PI->HrefValue = "";
		$this->Not_Started_PI->TooltipValue = "";

		// % Not Started PI
		$this->z25_Not_Started_PI->LinkCustomAttributes = "";
		$this->z25_Not_Started_PI->HrefValue = "";
		$this->z25_Not_Started_PI->TooltipValue = "";

		// Status
		$this->Status->LinkCustomAttributes = "";
		$this->Status->HrefValue = "";
		$this->Status->TooltipValue = "";

		// Not Eligible PI Count
		$this->Not_Eligible_PI_Count->LinkCustomAttributes = "";
		$this->Not_Eligible_PI_Count->HrefValue = "";
		$this->Not_Eligible_PI_Count->TooltipValue = "";

		// % Not Eligible PI Count
		$this->z25_Not_Eligible_PI_Count->LinkCustomAttributes = "";
		$this->z25_Not_Eligible_PI_Count->HrefValue = "";
		$this->z25_Not_Eligible_PI_Count->TooltipValue = "";

		// Eligible PI Count
		$this->Eligible_PI_Count->LinkCustomAttributes = "";
		$this->Eligible_PI_Count->HrefValue = "";
		$this->Eligible_PI_Count->TooltipValue = "";

		// % Eligible PI Count
		$this->z25_Eligible_PI_Count->LinkCustomAttributes = "";
		$this->z25_Eligible_PI_Count->HrefValue = "";
		$this->z25_Eligible_PI_Count->TooltipValue = "";

		// Remarks
		$this->Remarks->LinkCustomAttributes = "";
		$this->Remarks->HrefValue = "";
		$this->Remarks->TooltipValue = "";

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
					$XmlDoc->AddField('focal_person_id', $this->focal_person_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_short_name', $this->cu_short_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_sequence', $this->cu_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('units_id', $this->units_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_unit_name', $this->cu_unit_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo', $this->mfo->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_name_rep', $this->mfo_name_rep->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('budget', $this->budget->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Participated_PI', $this->Participated_PI->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Not_Started_PI', $this->Not_Started_PI->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z25_Not_Started_PI', $this->z25_Not_Started_PI->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Status', $this->Status->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Not_Eligible_PI_Count', $this->Not_Eligible_PI_Count->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z25_Not_Eligible_PI_Count', $this->z25_Not_Eligible_PI_Count->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Eligible_PI_Count', $this->Eligible_PI_Count->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z25_Eligible_PI_Count', $this->z25_Eligible_PI_Count->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks', $this->Remarks->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
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
				$Doc->ExportCaption($this->focal_person_id);
				$Doc->ExportCaption($this->cu_short_name);
				$Doc->ExportCaption($this->cu_sequence);
				$Doc->ExportCaption($this->units_id);
				$Doc->ExportCaption($this->cu_unit_name);
				$Doc->ExportCaption($this->mfo);
				$Doc->ExportCaption($this->mfo_name_rep);
				$Doc->ExportCaption($this->budget);
				$Doc->ExportCaption($this->Participated_PI);
				$Doc->ExportCaption($this->Not_Started_PI);
				$Doc->ExportCaption($this->z25_Not_Started_PI);
				$Doc->ExportCaption($this->Status);
				$Doc->ExportCaption($this->Not_Eligible_PI_Count);
				$Doc->ExportCaption($this->z25_Not_Eligible_PI_Count);
				$Doc->ExportCaption($this->Eligible_PI_Count);
				$Doc->ExportCaption($this->z25_Eligible_PI_Count);
				$Doc->ExportCaption($this->Remarks);
			} else {
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
					$Doc->ExportField($this->focal_person_id);
					$Doc->ExportField($this->cu_short_name);
					$Doc->ExportField($this->cu_sequence);
					$Doc->ExportField($this->units_id);
					$Doc->ExportField($this->cu_unit_name);
					$Doc->ExportField($this->mfo);
					$Doc->ExportField($this->mfo_name_rep);
					$Doc->ExportField($this->budget);
					$Doc->ExportField($this->Participated_PI);
					$Doc->ExportField($this->Not_Started_PI);
					$Doc->ExportField($this->z25_Not_Started_PI);
					$Doc->ExportField($this->Status);
					$Doc->ExportField($this->Not_Eligible_PI_Count);
					$Doc->ExportField($this->z25_Not_Eligible_PI_Count);
					$Doc->ExportField($this->Eligible_PI_Count);
					$Doc->ExportField($this->z25_Eligible_PI_Count);
					$Doc->ExportField($this->Remarks);
				} else {
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
				$sFilterWrk = '`focal_person_id` IN (' . $sFilterWrk . ')';
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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `frm_fp_rep_a_eligible_status_unit_mfo` WHERE " . $this->AddUserIDFilter("");

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

	// Add master User ID filter
	function AddMasterUserIDFilter($sFilter, $sCurrentMasterTable) {
		$sFilterWrk = $sFilter;
		if ($sCurrentMasterTable == "frm_fp_rep_a_eligible_status_unit") {
			$sFilterWrk = $GLOBALS["frm_fp_rep_a_eligible_status_unit"]->AddUserIDFilter($sFilterWrk);
		}
		return $sFilterWrk;
	}

	// Add detail User ID filter
	function AddDetailUserIDFilter($sFilter, $sCurrentMasterTable) {
		$sFilterWrk = $sFilter;
		if ($sCurrentMasterTable == "frm_fp_rep_a_eligible_status_unit") {
			$sSubqueryWrk = $GLOBALS["frm_fp_rep_a_eligible_status_unit"]->GetUserIDSubquery($this->units_id, $GLOBALS["frm_fp_rep_a_eligible_status_unit"]->units_id);
			if ($sSubqueryWrk <> "") {
				if ($sFilterWrk <> "") {
					$sFilterWrk = "($sFilterWrk) AND ($sSubqueryWrk)";
				} else {
					$sFilterWrk = $sSubqueryWrk;
				}
			}
		}
		return $sFilterWrk;
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
