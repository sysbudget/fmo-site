<?php

// Global variable for table object
$frm_sam_units = NULL;

//
// Table class for frm_sam_units
//
class cfrm_sam_units {
	var $TableVar = 'frm_sam_units';
	var $TableName = 'frm_sam_units';
	var $TableType = 'TABLE';
	var $units_id;
	var $cu_id;
	var $focal_person_id;
	var $unit_id;
	var $cu_sequence;
	var $cu_short_name;
	var $cu_unit_name;
	var $unit_name;
	var $unit_name_short;
	var $personnel_count;
	var $mfo_1;
	var $mfo_2;
	var $mfo_3;
	var $mfo_4;
	var $mfo_5;
	var $sto;
	var $gass;
	var $cutOffDate_id;
	var $t_cutOffDate_fp;
	var $t_cutOffDate_remarks;
	var $t_startDate;
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
	function cfrm_sam_units() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// units_id
		$this->units_id = new cField('frm_sam_units', 'frm_sam_units', 'x_units_id', 'units_id', '`units_id`', 3, -1, FALSE, '`units_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->units_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['units_id'] =& $this->units_id;

		// cu_id
		$this->cu_id = new cField('frm_sam_units', 'frm_sam_units', 'x_cu_id', 'cu_id', '`cu_id`', 3, -1, FALSE, '`cu_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cu_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cu_id'] =& $this->cu_id;

		// focal_person_id
		$this->focal_person_id = new cField('frm_sam_units', 'frm_sam_units', 'x_focal_person_id', 'focal_person_id', '`focal_person_id`', 3, -1, FALSE, '`focal_person_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focal_person_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focal_person_id'] =& $this->focal_person_id;

		// unit_id
		$this->unit_id = new cField('frm_sam_units', 'frm_sam_units', 'x_unit_id', 'unit_id', '`unit_id`', 3, -1, FALSE, '`unit_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->unit_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['unit_id'] =& $this->unit_id;

		// cu_sequence
		$this->cu_sequence = new cField('frm_sam_units', 'frm_sam_units', 'x_cu_sequence', 'cu_sequence', '`cu_sequence`', 3, -1, FALSE, '`cu_sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cu_sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cu_sequence'] =& $this->cu_sequence;

		// cu_short_name
		$this->cu_short_name = new cField('frm_sam_units', 'frm_sam_units', 'x_cu_short_name', 'cu_short_name', '`cu_short_name`', 200, -1, FALSE, '`cu_short_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['cu_short_name'] =& $this->cu_short_name;

		// cu_unit_name
		$this->cu_unit_name = new cField('frm_sam_units', 'frm_sam_units', 'x_cu_unit_name', 'cu_unit_name', '`cu_unit_name`', 200, -1, FALSE, '`cu_unit_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['cu_unit_name'] =& $this->cu_unit_name;

		// unit_name
		$this->unit_name = new cField('frm_sam_units', 'frm_sam_units', 'x_unit_name', 'unit_name', '`unit_name`', 200, -1, FALSE, '`unit_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['unit_name'] =& $this->unit_name;

		// unit_name_short
		$this->unit_name_short = new cField('frm_sam_units', 'frm_sam_units', 'x_unit_name_short', 'unit_name_short', '`unit_name_short`', 200, -1, FALSE, '`unit_name_short`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['unit_name_short'] =& $this->unit_name_short;

		// personnel_count
		$this->personnel_count = new cField('frm_sam_units', 'frm_sam_units', 'x_personnel_count', 'personnel_count', '`personnel_count`', 3, -1, FALSE, '`personnel_count`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->personnel_count->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['personnel_count'] =& $this->personnel_count;

		// mfo_1
		$this->mfo_1 = new cField('frm_sam_units', 'frm_sam_units', 'x_mfo_1', 'mfo_1', '`mfo_1`', 200, -1, FALSE, '`mfo_1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_1'] =& $this->mfo_1;

		// mfo_2
		$this->mfo_2 = new cField('frm_sam_units', 'frm_sam_units', 'x_mfo_2', 'mfo_2', '`mfo_2`', 200, -1, FALSE, '`mfo_2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_2'] =& $this->mfo_2;

		// mfo_3
		$this->mfo_3 = new cField('frm_sam_units', 'frm_sam_units', 'x_mfo_3', 'mfo_3', '`mfo_3`', 200, -1, FALSE, '`mfo_3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_3'] =& $this->mfo_3;

		// mfo_4
		$this->mfo_4 = new cField('frm_sam_units', 'frm_sam_units', 'x_mfo_4', 'mfo_4', '`mfo_4`', 200, -1, FALSE, '`mfo_4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_4'] =& $this->mfo_4;

		// mfo_5
		$this->mfo_5 = new cField('frm_sam_units', 'frm_sam_units', 'x_mfo_5', 'mfo_5', '`mfo_5`', 200, -1, FALSE, '`mfo_5`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_5'] =& $this->mfo_5;

		// sto
		$this->sto = new cField('frm_sam_units', 'frm_sam_units', 'x_sto', 'sto', '`sto`', 200, -1, FALSE, '`sto`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['sto'] =& $this->sto;

		// gass
		$this->gass = new cField('frm_sam_units', 'frm_sam_units', 'x_gass', 'gass', '`gass`', 200, -1, FALSE, '`gass`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['gass'] =& $this->gass;

		// cutOffDate_id
		$this->cutOffDate_id = new cField('frm_sam_units', 'frm_sam_units', 'x_cutOffDate_id', 'cutOffDate_id', '`cutOffDate_id`', 3, -1, FALSE, '`cutOffDate_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cutOffDate_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cutOffDate_id'] =& $this->cutOffDate_id;

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp = new cField('frm_sam_units', 'frm_sam_units', 'x_t_cutOffDate_fp', 't_cutOffDate_fp', '`t_cutOffDate_fp`', 135, 6, FALSE, '`t_cutOffDate_fp`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_cutOffDate_fp->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['t_cutOffDate_fp'] =& $this->t_cutOffDate_fp;

		// t_cutOffDate_remarks
		$this->t_cutOffDate_remarks = new cField('frm_sam_units', 'frm_sam_units', 'x_t_cutOffDate_remarks', 't_cutOffDate_remarks', '`t_cutOffDate_remarks`', 200, -1, FALSE, '`t_cutOffDate_remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['t_cutOffDate_remarks'] =& $this->t_cutOffDate_remarks;

		// t_startDate
		$this->t_startDate = new cField('frm_sam_units', 'frm_sam_units', 'x_t_startDate', 't_startDate', '`t_startDate`', 135, 6, FALSE, '`t_startDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_startDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['t_startDate'] =& $this->t_startDate;
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
		return "frm_sam_units_Highlight";
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
		if ($this->getCurrentMasterTable() == "frm_sam_cu_executive_offices") {
			if ($this->focal_person_id->getSessionValue() <> "")
				$sMasterFilter .= "`focal_person_id`=" . up_QuotedValue($this->focal_person_id->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sMasterFilter;
	}

	// Session detail WHERE clause
	function getDetailFilter() {

		// Detail filter
		$sDetailFilter = "";
		if ($this->getCurrentMasterTable() == "frm_sam_cu_executive_offices") {
			if ($this->focal_person_id->getSessionValue() <> "")
				$sDetailFilter .= "`focal_person_id`=" . up_QuotedValue($this->focal_person_id->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sDetailFilter;
	}

	// Master filter
	function SqlMasterFilter_frm_sam_cu_executive_offices() {
		return "`focal_person_id`=@focal_person_id@";
	}

	// Detail filter
	function SqlDetailFilter_frm_sam_cu_executive_offices() {
		return "`focal_person_id`=@focal_person_id@";
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`frm_sam_units`";
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
		return "INSERT INTO `frm_sam_units` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_sam_units` SET ";
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
		$SQL = "DELETE FROM `frm_sam_units` WHERE ";
		$SQL .= up_QuotedName('units_id') . '=' . up_QuotedValue($rs['units_id'], $this->units_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`units_id` = @units_id@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->units_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@units_id@", up_AdjustSql($this->units_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "frm_sam_unitslist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_sam_unitslist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_sam_unitsview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_sam_unitsadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_sam_unitsedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_sam_unitsadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_sam_unitsdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->units_id->CurrentValue)) {
			$sUrl .= "units_id=" . urlencode($this->units_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_sam_units" : "";
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
			$arKeys[] = @$_GET["units_id"]; // units_id

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
			$this->units_id->CurrentValue = $key;
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
		$this->units_id->setDbValue($rs->fields('units_id'));
		$this->cu_id->setDbValue($rs->fields('cu_id'));
		$this->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$this->unit_id->setDbValue($rs->fields('unit_id'));
		$this->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$this->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$this->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$this->unit_name->setDbValue($rs->fields('unit_name'));
		$this->unit_name_short->setDbValue($rs->fields('unit_name_short'));
		$this->personnel_count->setDbValue($rs->fields('personnel_count'));
		$this->mfo_1->setDbValue($rs->fields('mfo_1'));
		$this->mfo_2->setDbValue($rs->fields('mfo_2'));
		$this->mfo_3->setDbValue($rs->fields('mfo_3'));
		$this->mfo_4->setDbValue($rs->fields('mfo_4'));
		$this->mfo_5->setDbValue($rs->fields('mfo_5'));
		$this->sto->setDbValue($rs->fields('sto'));
		$this->gass->setDbValue($rs->fields('gass'));
		$this->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$this->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$this->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$this->t_startDate->setDbValue($rs->fields('t_startDate'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// units_id

		$this->units_id->CellCssStyle = "white-space: nowrap;";

		// cu_id
		$this->cu_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		// unit_id
		// cu_sequence
		// cu_short_name

		$this->cu_short_name->CellCssStyle = "white-space: nowrap;";

		// cu_unit_name
		$this->cu_unit_name->CellCssStyle = "white-space: nowrap;";

		// unit_name
		// unit_name_short
		// personnel_count
		// mfo_1
		// mfo_2
		// mfo_3
		// mfo_4
		// mfo_5
		// sto
		// gass
		// cutOffDate_id

		$this->cutOffDate_id->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_remarks
		// t_startDate

		$this->t_startDate->CellCssStyle = "white-space: nowrap;";

		// units_id
		$this->units_id->ViewValue = $this->units_id->CurrentValue;
		$this->units_id->ViewCustomAttributes = "";

		// cu_id
		$this->cu_id->ViewValue = $this->cu_id->CurrentValue;
		$this->cu_id->ViewCustomAttributes = "";

		// focal_person_id
		$this->focal_person_id->ViewValue = $this->focal_person_id->CurrentValue;
		$this->focal_person_id->ViewCustomAttributes = "";

		// unit_id
		$this->unit_id->ViewValue = $this->unit_id->CurrentValue;
		$this->unit_id->ViewCustomAttributes = "";

		// cu_sequence
		$this->cu_sequence->ViewValue = $this->cu_sequence->CurrentValue;
		$this->cu_sequence->ViewCustomAttributes = "";

		// cu_short_name
		$this->cu_short_name->ViewValue = $this->cu_short_name->CurrentValue;
		$this->cu_short_name->ViewCustomAttributes = "";

		// cu_unit_name
		$this->cu_unit_name->ViewValue = $this->cu_unit_name->CurrentValue;
		$this->cu_unit_name->ViewCustomAttributes = "";

		// unit_name
		$this->unit_name->ViewValue = $this->unit_name->CurrentValue;
		$this->unit_name->ViewCustomAttributes = "";

		// unit_name_short
		$this->unit_name_short->ViewValue = $this->unit_name_short->CurrentValue;
		$this->unit_name_short->ViewCustomAttributes = "";

		// personnel_count
		$this->personnel_count->ViewValue = $this->personnel_count->CurrentValue;
		$this->personnel_count->ViewCustomAttributes = "";

		// mfo_1
		if (strval($this->mfo_1->CurrentValue) <> "") {
			switch ($this->mfo_1->CurrentValue) {
				case "Y":
					$this->mfo_1->ViewValue = $this->mfo_1->FldTagCaption(1) <> "" ? $this->mfo_1->FldTagCaption(1) : $this->mfo_1->CurrentValue;
					break;
				case "N":
					$this->mfo_1->ViewValue = $this->mfo_1->FldTagCaption(2) <> "" ? $this->mfo_1->FldTagCaption(2) : $this->mfo_1->CurrentValue;
					break;
				default:
					$this->mfo_1->ViewValue = $this->mfo_1->CurrentValue;
			}
		} else {
			$this->mfo_1->ViewValue = NULL;
		}
		$this->mfo_1->ViewCustomAttributes = "";

		// mfo_2
		if (strval($this->mfo_2->CurrentValue) <> "") {
			switch ($this->mfo_2->CurrentValue) {
				case "Y":
					$this->mfo_2->ViewValue = $this->mfo_2->FldTagCaption(1) <> "" ? $this->mfo_2->FldTagCaption(1) : $this->mfo_2->CurrentValue;
					break;
				case "N":
					$this->mfo_2->ViewValue = $this->mfo_2->FldTagCaption(2) <> "" ? $this->mfo_2->FldTagCaption(2) : $this->mfo_2->CurrentValue;
					break;
				default:
					$this->mfo_2->ViewValue = $this->mfo_2->CurrentValue;
			}
		} else {
			$this->mfo_2->ViewValue = NULL;
		}
		$this->mfo_2->ViewCustomAttributes = "";

		// mfo_3
		if (strval($this->mfo_3->CurrentValue) <> "") {
			switch ($this->mfo_3->CurrentValue) {
				case "Y":
					$this->mfo_3->ViewValue = $this->mfo_3->FldTagCaption(1) <> "" ? $this->mfo_3->FldTagCaption(1) : $this->mfo_3->CurrentValue;
					break;
				case "N":
					$this->mfo_3->ViewValue = $this->mfo_3->FldTagCaption(2) <> "" ? $this->mfo_3->FldTagCaption(2) : $this->mfo_3->CurrentValue;
					break;
				default:
					$this->mfo_3->ViewValue = $this->mfo_3->CurrentValue;
			}
		} else {
			$this->mfo_3->ViewValue = NULL;
		}
		$this->mfo_3->ViewCustomAttributes = "";

		// mfo_4
		if (strval($this->mfo_4->CurrentValue) <> "") {
			switch ($this->mfo_4->CurrentValue) {
				case "Y":
					$this->mfo_4->ViewValue = $this->mfo_4->FldTagCaption(1) <> "" ? $this->mfo_4->FldTagCaption(1) : $this->mfo_4->CurrentValue;
					break;
				case "N":
					$this->mfo_4->ViewValue = $this->mfo_4->FldTagCaption(2) <> "" ? $this->mfo_4->FldTagCaption(2) : $this->mfo_4->CurrentValue;
					break;
				default:
					$this->mfo_4->ViewValue = $this->mfo_4->CurrentValue;
			}
		} else {
			$this->mfo_4->ViewValue = NULL;
		}
		$this->mfo_4->ViewCustomAttributes = "";

		// mfo_5
		if (strval($this->mfo_5->CurrentValue) <> "") {
			switch ($this->mfo_5->CurrentValue) {
				case "Y":
					$this->mfo_5->ViewValue = $this->mfo_5->FldTagCaption(1) <> "" ? $this->mfo_5->FldTagCaption(1) : $this->mfo_5->CurrentValue;
					break;
				case "N":
					$this->mfo_5->ViewValue = $this->mfo_5->FldTagCaption(2) <> "" ? $this->mfo_5->FldTagCaption(2) : $this->mfo_5->CurrentValue;
					break;
				default:
					$this->mfo_5->ViewValue = $this->mfo_5->CurrentValue;
			}
		} else {
			$this->mfo_5->ViewValue = NULL;
		}
		$this->mfo_5->ViewCustomAttributes = "";

		// sto
		if (strval($this->sto->CurrentValue) <> "") {
			switch ($this->sto->CurrentValue) {
				case "Y":
					$this->sto->ViewValue = $this->sto->FldTagCaption(1) <> "" ? $this->sto->FldTagCaption(1) : $this->sto->CurrentValue;
					break;
				case "N":
					$this->sto->ViewValue = $this->sto->FldTagCaption(2) <> "" ? $this->sto->FldTagCaption(2) : $this->sto->CurrentValue;
					break;
				default:
					$this->sto->ViewValue = $this->sto->CurrentValue;
			}
		} else {
			$this->sto->ViewValue = NULL;
		}
		$this->sto->ViewCustomAttributes = "";

		// gass
		if (strval($this->gass->CurrentValue) <> "") {
			switch ($this->gass->CurrentValue) {
				case "Y":
					$this->gass->ViewValue = $this->gass->FldTagCaption(1) <> "" ? $this->gass->FldTagCaption(1) : $this->gass->CurrentValue;
					break;
				case "N":
					$this->gass->ViewValue = $this->gass->FldTagCaption(2) <> "" ? $this->gass->FldTagCaption(2) : $this->gass->CurrentValue;
					break;
				default:
					$this->gass->ViewValue = $this->gass->CurrentValue;
			}
		} else {
			$this->gass->ViewValue = NULL;
		}
		$this->gass->ViewCustomAttributes = "";

		// cutOffDate_id
		$this->cutOffDate_id->ViewValue = $this->cutOffDate_id->CurrentValue;
		$this->cutOffDate_id->ViewCustomAttributes = "";

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp->ViewValue = $this->t_cutOffDate_fp->CurrentValue;
		$this->t_cutOffDate_fp->ViewValue = up_FormatDateTime($this->t_cutOffDate_fp->ViewValue, 6);
		$this->t_cutOffDate_fp->ViewCustomAttributes = "";

		// t_cutOffDate_remarks
		$this->t_cutOffDate_remarks->ViewValue = $this->t_cutOffDate_remarks->CurrentValue;
		$this->t_cutOffDate_remarks->ViewCustomAttributes = "";

		// t_startDate
		$this->t_startDate->ViewValue = $this->t_startDate->CurrentValue;
		$this->t_startDate->ViewValue = up_FormatDateTime($this->t_startDate->ViewValue, 6);
		$this->t_startDate->ViewCustomAttributes = "";

		// units_id
		$this->units_id->LinkCustomAttributes = "";
		$this->units_id->HrefValue = "";
		$this->units_id->TooltipValue = "";

		// cu_id
		$this->cu_id->LinkCustomAttributes = "";
		$this->cu_id->HrefValue = "";
		$this->cu_id->TooltipValue = "";

		// focal_person_id
		$this->focal_person_id->LinkCustomAttributes = "";
		$this->focal_person_id->HrefValue = "";
		$this->focal_person_id->TooltipValue = "";

		// unit_id
		$this->unit_id->LinkCustomAttributes = "";
		$this->unit_id->HrefValue = "";
		$this->unit_id->TooltipValue = "";

		// cu_sequence
		$this->cu_sequence->LinkCustomAttributes = "";
		$this->cu_sequence->HrefValue = "";
		$this->cu_sequence->TooltipValue = "";

		// cu_short_name
		$this->cu_short_name->LinkCustomAttributes = "";
		$this->cu_short_name->HrefValue = "";
		$this->cu_short_name->TooltipValue = "";

		// cu_unit_name
		$this->cu_unit_name->LinkCustomAttributes = "";
		$this->cu_unit_name->HrefValue = "";
		$this->cu_unit_name->TooltipValue = "";

		// unit_name
		$this->unit_name->LinkCustomAttributes = "";
		$this->unit_name->HrefValue = "";
		$this->unit_name->TooltipValue = "";

		// unit_name_short
		$this->unit_name_short->LinkCustomAttributes = "";
		$this->unit_name_short->HrefValue = "";
		$this->unit_name_short->TooltipValue = "";

		// personnel_count
		$this->personnel_count->LinkCustomAttributes = "";
		$this->personnel_count->HrefValue = "";
		$this->personnel_count->TooltipValue = "";

		// mfo_1
		$this->mfo_1->LinkCustomAttributes = "";
		$this->mfo_1->HrefValue = "";
		$this->mfo_1->TooltipValue = "";

		// mfo_2
		$this->mfo_2->LinkCustomAttributes = "";
		$this->mfo_2->HrefValue = "";
		$this->mfo_2->TooltipValue = "";

		// mfo_3
		$this->mfo_3->LinkCustomAttributes = "";
		$this->mfo_3->HrefValue = "";
		$this->mfo_3->TooltipValue = "";

		// mfo_4
		$this->mfo_4->LinkCustomAttributes = "";
		$this->mfo_4->HrefValue = "";
		$this->mfo_4->TooltipValue = "";

		// mfo_5
		$this->mfo_5->LinkCustomAttributes = "";
		$this->mfo_5->HrefValue = "";
		$this->mfo_5->TooltipValue = "";

		// sto
		$this->sto->LinkCustomAttributes = "";
		$this->sto->HrefValue = "";
		$this->sto->TooltipValue = "";

		// gass
		$this->gass->LinkCustomAttributes = "";
		$this->gass->HrefValue = "";
		$this->gass->TooltipValue = "";

		// cutOffDate_id
		$this->cutOffDate_id->LinkCustomAttributes = "";
		$this->cutOffDate_id->HrefValue = "";
		$this->cutOffDate_id->TooltipValue = "";

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp->LinkCustomAttributes = "";
		$this->t_cutOffDate_fp->HrefValue = "";
		$this->t_cutOffDate_fp->TooltipValue = "";

		// t_cutOffDate_remarks
		$this->t_cutOffDate_remarks->LinkCustomAttributes = "";
		$this->t_cutOffDate_remarks->HrefValue = "";
		$this->t_cutOffDate_remarks->TooltipValue = "";

		// t_startDate
		$this->t_startDate->LinkCustomAttributes = "";
		$this->t_startDate->HrefValue = "";
		$this->t_startDate->TooltipValue = "";

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
					$XmlDoc->AddField('units_id', $this->units_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focal_person_id', $this->focal_person_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('unit_id', $this->unit_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_sequence', $this->cu_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_short_name', $this->cu_short_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_unit_name', $this->cu_unit_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('unit_name', $this->unit_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('unit_name_short', $this->unit_name_short->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('personnel_count', $this->personnel_count->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_1', $this->mfo_1->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_2', $this->mfo_2->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_3', $this->mfo_3->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_4', $this->mfo_4->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_5', $this->mfo_5->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('sto', $this->sto->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('gass', $this->gass->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_remarks', $this->t_cutOffDate_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->units_id);
				$Doc->ExportCaption($this->focal_person_id);
				$Doc->ExportCaption($this->unit_id);
				$Doc->ExportCaption($this->cu_sequence);
				$Doc->ExportCaption($this->cu_short_name);
				$Doc->ExportCaption($this->cu_unit_name);
				$Doc->ExportCaption($this->unit_name);
				$Doc->ExportCaption($this->unit_name_short);
				$Doc->ExportCaption($this->personnel_count);
				$Doc->ExportCaption($this->mfo_1);
				$Doc->ExportCaption($this->mfo_2);
				$Doc->ExportCaption($this->mfo_3);
				$Doc->ExportCaption($this->mfo_4);
				$Doc->ExportCaption($this->mfo_5);
				$Doc->ExportCaption($this->sto);
				$Doc->ExportCaption($this->gass);
				$Doc->ExportCaption($this->t_cutOffDate_remarks);
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
					$Doc->ExportField($this->units_id);
					$Doc->ExportField($this->focal_person_id);
					$Doc->ExportField($this->unit_id);
					$Doc->ExportField($this->cu_sequence);
					$Doc->ExportField($this->cu_short_name);
					$Doc->ExportField($this->cu_unit_name);
					$Doc->ExportField($this->unit_name);
					$Doc->ExportField($this->unit_name_short);
					$Doc->ExportField($this->personnel_count);
					$Doc->ExportField($this->mfo_1);
					$Doc->ExportField($this->mfo_2);
					$Doc->ExportField($this->mfo_3);
					$Doc->ExportField($this->mfo_4);
					$Doc->ExportField($this->mfo_5);
					$Doc->ExportField($this->sto);
					$Doc->ExportField($this->gass);
					$Doc->ExportField($this->t_cutOffDate_remarks);
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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `frm_sam_units` WHERE " . $this->AddUserIDFilter("");

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
