<?php

// Global variable for table object
$frm_sam_rep_a_monitor_above_100 = NULL;

//
// Table class for frm_sam_rep_a_monitor_above_100
//
class cfrm_sam_rep_a_monitor_above_100 {
	var $TableVar = 'frm_sam_rep_a_monitor_above_100';
	var $TableName = 'frm_sam_rep_a_monitor_above_100';
	var $TableType = 'TABLE';
	var $units_id;
	var $focal_person_id;
	var $Delivery_Unit;
	var $MFO;
	var $Question;
	var $Target;
	var $Target_Numerator_28TN29;
	var $Target_Denominator_28TD29;
	var $Accomplishment;
	var $Accomplishment_Numerator_28AN29;
	var $Accomplishment_Denominator_28AD29;
	var $Performance_Rating_28PR29;
	var $PR_Below_9025;
	var $PR_9025_and_Above;
	var $Over_110_Performance_Rating;
	var $Numerator_Difference_28AN_2D_TN29;
	var $AN_is_higher_than_TD_28AN_2D_TD29;
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
	function cfrm_sam_rep_a_monitor_above_100() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// units_id
		$this->units_id = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_units_id', 'units_id', '`units_id`', 3, -1, FALSE, '`units_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->units_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['units_id'] =& $this->units_id;

		// focal_person_id
		$this->focal_person_id = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_focal_person_id', 'focal_person_id', '`focal_person_id`', 3, -1, FALSE, '`focal_person_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focal_person_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focal_person_id'] =& $this->focal_person_id;

		// Delivery Unit
		$this->Delivery_Unit = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_Delivery_Unit', 'Delivery Unit', '`Delivery Unit`', 200, -1, FALSE, '`Delivery Unit`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Delivery Unit'] =& $this->Delivery_Unit;

		// MFO
		$this->MFO = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_MFO', 'MFO', '`MFO`', 200, -1, FALSE, '`MFO`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['MFO'] =& $this->MFO;

		// Question
		$this->Question = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_Question', 'Question', '`Question`', 200, -1, FALSE, '`Question`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Question'] =& $this->Question;

		// Target
		$this->Target = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_Target', 'Target', '`Target`', 5, -1, FALSE, '`Target`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target'] =& $this->Target;

		// Target Numerator (TN)
		$this->Target_Numerator_28TN29 = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_Target_Numerator_28TN29', 'Target Numerator (TN)', '`Target Numerator (TN)`', 5, -1, FALSE, '`Target Numerator (TN)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_Numerator_28TN29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target Numerator (TN)'] =& $this->Target_Numerator_28TN29;

		// Target Denominator (TD)
		$this->Target_Denominator_28TD29 = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_Target_Denominator_28TD29', 'Target Denominator (TD)', '`Target Denominator (TD)`', 5, -1, FALSE, '`Target Denominator (TD)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_Denominator_28TD29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target Denominator (TD)'] =& $this->Target_Denominator_28TD29;

		// Accomplishment
		$this->Accomplishment = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_Accomplishment', 'Accomplishment', '`Accomplishment`', 5, -1, FALSE, '`Accomplishment`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment'] =& $this->Accomplishment;

		// Accomplishment Numerator (AN)
		$this->Accomplishment_Numerator_28AN29 = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_Accomplishment_Numerator_28AN29', 'Accomplishment Numerator (AN)', '`Accomplishment Numerator (AN)`', 5, -1, FALSE, '`Accomplishment Numerator (AN)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_Numerator_28AN29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment Numerator (AN)'] =& $this->Accomplishment_Numerator_28AN29;

		// Accomplishment Denominator (AD)
		$this->Accomplishment_Denominator_28AD29 = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_Accomplishment_Denominator_28AD29', 'Accomplishment Denominator (AD)', '`Accomplishment Denominator (AD)`', 5, -1, FALSE, '`Accomplishment Denominator (AD)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_Denominator_28AD29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment Denominator (AD)'] =& $this->Accomplishment_Denominator_28AD29;

		// Performance Rating (PR)
		$this->Performance_Rating_28PR29 = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_Performance_Rating_28PR29', 'Performance Rating (PR)', '`Performance Rating (PR)`', 5, -1, FALSE, '`Performance Rating (PR)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Performance_Rating_28PR29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Performance Rating (PR)'] =& $this->Performance_Rating_28PR29;

		// PR Below 90%
		$this->PR_Below_9025 = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_PR_Below_9025', 'PR Below 90%', '`PR Below 90%`', 5, -1, FALSE, '`PR Below 90%`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PR_Below_9025->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['PR Below 90%'] =& $this->PR_Below_9025;

		// PR 90% and Above
		$this->PR_9025_and_Above = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_PR_9025_and_Above', 'PR 90% and Above', '`PR 90% and Above`', 5, -1, FALSE, '`PR 90% and Above`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PR_9025_and_Above->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['PR 90% and Above'] =& $this->PR_9025_and_Above;

		// Over 110 Performance Rating
		$this->Over_110_Performance_Rating = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_Over_110_Performance_Rating', 'Over 110 Performance Rating', '`Over 110 Performance Rating`', 200, -1, FALSE, '`Over 110 Performance Rating`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Over 110 Performance Rating'] =& $this->Over_110_Performance_Rating;

		// Numerator Difference (AN - TN)
		$this->Numerator_Difference_28AN_2D_TN29 = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_Numerator_Difference_28AN_2D_TN29', 'Numerator Difference (AN - TN)', '`Numerator Difference (AN - TN)`', 5, -1, FALSE, '`Numerator Difference (AN - TN)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Numerator_Difference_28AN_2D_TN29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Numerator Difference (AN - TN)'] =& $this->Numerator_Difference_28AN_2D_TN29;

		// AN is higher than TD (AN - TD)
		$this->AN_is_higher_than_TD_28AN_2D_TD29 = new cField('frm_sam_rep_a_monitor_above_100', 'frm_sam_rep_a_monitor_above_100', 'x_AN_is_higher_than_TD_28AN_2D_TD29', 'AN is higher than TD (AN - TD)', '`AN is higher than TD (AN - TD)`', 5, -1, FALSE, '`AN is higher than TD (AN - TD)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->AN_is_higher_than_TD_28AN_2D_TD29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['AN is higher than TD (AN - TD)'] =& $this->AN_is_higher_than_TD_28AN_2D_TD29;
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
		return "frm_sam_rep_a_monitor_above_100_Highlight";
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
			$sDetailUrl .= "&mfo_sequence=" . $this->MFO->CurrentValue;
		}
		return $sDetailUrl;
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`frm_sam_rep_a_monitor_above_100`";
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
		return "INSERT INTO `frm_sam_rep_a_monitor_above_100` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_sam_rep_a_monitor_above_100` SET ";
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
		$SQL = "DELETE FROM `frm_sam_rep_a_monitor_above_100` WHERE ";
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
			return "frm_sam_rep_a_monitor_above_100list.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_sam_rep_a_monitor_above_100list.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_sam_rep_a_monitor_above_100view.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_sam_rep_a_monitor_above_100add.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_sam_rep_a_monitor_above_100edit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_sam_rep_a_monitor_above_100add.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_sam_rep_a_monitor_above_100delete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_sam_rep_a_monitor_above_100" : "";
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
		$this->units_id->setDbValue($rs->fields('units_id'));
		$this->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$this->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$this->MFO->setDbValue($rs->fields('MFO'));
		$this->Question->setDbValue($rs->fields('Question'));
		$this->Target->setDbValue($rs->fields('Target'));
		$this->Target_Numerator_28TN29->setDbValue($rs->fields('Target Numerator (TN)'));
		$this->Target_Denominator_28TD29->setDbValue($rs->fields('Target Denominator (TD)'));
		$this->Accomplishment->setDbValue($rs->fields('Accomplishment'));
		$this->Accomplishment_Numerator_28AN29->setDbValue($rs->fields('Accomplishment Numerator (AN)'));
		$this->Accomplishment_Denominator_28AD29->setDbValue($rs->fields('Accomplishment Denominator (AD)'));
		$this->Performance_Rating_28PR29->setDbValue($rs->fields('Performance Rating (PR)'));
		$this->PR_Below_9025->setDbValue($rs->fields('PR Below 90%'));
		$this->PR_9025_and_Above->setDbValue($rs->fields('PR 90% and Above'));
		$this->Over_110_Performance_Rating->setDbValue($rs->fields('Over 110 Performance Rating'));
		$this->Numerator_Difference_28AN_2D_TN29->setDbValue($rs->fields('Numerator Difference (AN - TN)'));
		$this->AN_is_higher_than_TD_28AN_2D_TD29->setDbValue($rs->fields('AN is higher than TD (AN - TD)'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// units_id

		$this->units_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$this->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// Delivery Unit
		$this->Delivery_Unit->CellCssStyle = "white-space: nowrap;";

		// MFO
		$this->MFO->CellCssStyle = "white-space: nowrap;";

		// Question
		$this->Question->CellCssStyle = "white-space: nowrap;";

		// Target
		$this->Target->CellCssStyle = "white-space: nowrap;";

		// Target Numerator (TN)
		$this->Target_Numerator_28TN29->CellCssStyle = "white-space: nowrap;";

		// Target Denominator (TD)
		$this->Target_Denominator_28TD29->CellCssStyle = "white-space: nowrap;";

		// Accomplishment
		$this->Accomplishment->CellCssStyle = "white-space: nowrap;";

		// Accomplishment Numerator (AN)
		$this->Accomplishment_Numerator_28AN29->CellCssStyle = "white-space: nowrap;";

		// Accomplishment Denominator (AD)
		$this->Accomplishment_Denominator_28AD29->CellCssStyle = "white-space: nowrap;";

		// Performance Rating (PR)
		$this->Performance_Rating_28PR29->CellCssStyle = "white-space: nowrap;";

		// PR Below 90%
		$this->PR_Below_9025->CellCssStyle = "white-space: nowrap;";

		// PR 90% and Above
		$this->PR_9025_and_Above->CellCssStyle = "white-space: nowrap;";

		// Over 110 Performance Rating
		$this->Over_110_Performance_Rating->CellCssStyle = "white-space: nowrap;";

		// Numerator Difference (AN - TN)
		$this->Numerator_Difference_28AN_2D_TN29->CellCssStyle = "white-space: nowrap;";

		// AN is higher than TD (AN - TD)
		$this->AN_is_higher_than_TD_28AN_2D_TD29->CellCssStyle = "white-space: nowrap;";

		// units_id
		$this->units_id->ViewValue = $this->units_id->CurrentValue;
		$this->units_id->ViewCustomAttributes = "";

		// focal_person_id
		$this->focal_person_id->ViewValue = $this->focal_person_id->CurrentValue;
		$this->focal_person_id->ViewCustomAttributes = "";

		// Delivery Unit
		$this->Delivery_Unit->ViewValue = $this->Delivery_Unit->CurrentValue;
		$this->Delivery_Unit->ViewCustomAttributes = "";

		// MFO
		$this->MFO->ViewValue = $this->MFO->CurrentValue;
		$this->MFO->ViewCustomAttributes = "";

		// Question
		$this->Question->ViewValue = $this->Question->CurrentValue;
		$this->Question->ViewCustomAttributes = "";

		// Target
		$this->Target->ViewValue = $this->Target->CurrentValue;
		$this->Target->ViewCustomAttributes = "";

		// Target Numerator (TN)
		$this->Target_Numerator_28TN29->ViewValue = $this->Target_Numerator_28TN29->CurrentValue;
		$this->Target_Numerator_28TN29->ViewCustomAttributes = "";

		// Target Denominator (TD)
		$this->Target_Denominator_28TD29->ViewValue = $this->Target_Denominator_28TD29->CurrentValue;
		$this->Target_Denominator_28TD29->ViewCustomAttributes = "";

		// Accomplishment
		$this->Accomplishment->ViewValue = $this->Accomplishment->CurrentValue;
		$this->Accomplishment->ViewCustomAttributes = "";

		// Accomplishment Numerator (AN)
		$this->Accomplishment_Numerator_28AN29->ViewValue = $this->Accomplishment_Numerator_28AN29->CurrentValue;
		$this->Accomplishment_Numerator_28AN29->ViewCustomAttributes = "";

		// Accomplishment Denominator (AD)
		$this->Accomplishment_Denominator_28AD29->ViewValue = $this->Accomplishment_Denominator_28AD29->CurrentValue;
		$this->Accomplishment_Denominator_28AD29->ViewCustomAttributes = "";

		// Performance Rating (PR)
		$this->Performance_Rating_28PR29->ViewValue = $this->Performance_Rating_28PR29->CurrentValue;
		$this->Performance_Rating_28PR29->ViewCustomAttributes = "";

		// PR Below 90%
		$this->PR_Below_9025->ViewValue = $this->PR_Below_9025->CurrentValue;
		$this->PR_Below_9025->ViewCustomAttributes = "";

		// PR 90% and Above
		$this->PR_9025_and_Above->ViewValue = $this->PR_9025_and_Above->CurrentValue;
		$this->PR_9025_and_Above->ViewCustomAttributes = "";

		// Over 110 Performance Rating
		$this->Over_110_Performance_Rating->ViewValue = $this->Over_110_Performance_Rating->CurrentValue;
		$this->Over_110_Performance_Rating->ViewCustomAttributes = "";

		// Numerator Difference (AN - TN)
		$this->Numerator_Difference_28AN_2D_TN29->ViewValue = $this->Numerator_Difference_28AN_2D_TN29->CurrentValue;
		$this->Numerator_Difference_28AN_2D_TN29->ViewCustomAttributes = "";

		// AN is higher than TD (AN - TD)
		$this->AN_is_higher_than_TD_28AN_2D_TD29->ViewValue = $this->AN_is_higher_than_TD_28AN_2D_TD29->CurrentValue;
		$this->AN_is_higher_than_TD_28AN_2D_TD29->ViewCustomAttributes = "";

		// units_id
		$this->units_id->LinkCustomAttributes = "";
		$this->units_id->HrefValue = "";
		$this->units_id->TooltipValue = "";

		// focal_person_id
		$this->focal_person_id->LinkCustomAttributes = "";
		$this->focal_person_id->HrefValue = "";
		$this->focal_person_id->TooltipValue = "";

		// Delivery Unit
		$this->Delivery_Unit->LinkCustomAttributes = "";
		$this->Delivery_Unit->HrefValue = "";
		$this->Delivery_Unit->TooltipValue = "";

		// MFO
		$this->MFO->LinkCustomAttributes = "";
		$this->MFO->HrefValue = "";
		$this->MFO->TooltipValue = "";

		// Question
		$this->Question->LinkCustomAttributes = "";
		$this->Question->HrefValue = "";
		$this->Question->TooltipValue = "";

		// Target
		$this->Target->LinkCustomAttributes = "";
		$this->Target->HrefValue = "";
		$this->Target->TooltipValue = "";

		// Target Numerator (TN)
		$this->Target_Numerator_28TN29->LinkCustomAttributes = "";
		$this->Target_Numerator_28TN29->HrefValue = "";
		$this->Target_Numerator_28TN29->TooltipValue = "";

		// Target Denominator (TD)
		$this->Target_Denominator_28TD29->LinkCustomAttributes = "";
		$this->Target_Denominator_28TD29->HrefValue = "";
		$this->Target_Denominator_28TD29->TooltipValue = "";

		// Accomplishment
		$this->Accomplishment->LinkCustomAttributes = "";
		$this->Accomplishment->HrefValue = "";
		$this->Accomplishment->TooltipValue = "";

		// Accomplishment Numerator (AN)
		$this->Accomplishment_Numerator_28AN29->LinkCustomAttributes = "";
		$this->Accomplishment_Numerator_28AN29->HrefValue = "";
		$this->Accomplishment_Numerator_28AN29->TooltipValue = "";

		// Accomplishment Denominator (AD)
		$this->Accomplishment_Denominator_28AD29->LinkCustomAttributes = "";
		$this->Accomplishment_Denominator_28AD29->HrefValue = "";
		$this->Accomplishment_Denominator_28AD29->TooltipValue = "";

		// Performance Rating (PR)
		$this->Performance_Rating_28PR29->LinkCustomAttributes = "";
		$this->Performance_Rating_28PR29->HrefValue = "";
		$this->Performance_Rating_28PR29->TooltipValue = "";

		// PR Below 90%
		$this->PR_Below_9025->LinkCustomAttributes = "";
		$this->PR_Below_9025->HrefValue = "";
		$this->PR_Below_9025->TooltipValue = "";

		// PR 90% and Above
		$this->PR_9025_and_Above->LinkCustomAttributes = "";
		$this->PR_9025_and_Above->HrefValue = "";
		$this->PR_9025_and_Above->TooltipValue = "";

		// Over 110 Performance Rating
		$this->Over_110_Performance_Rating->LinkCustomAttributes = "";
		$this->Over_110_Performance_Rating->HrefValue = "";
		$this->Over_110_Performance_Rating->TooltipValue = "";

		// Numerator Difference (AN - TN)
		$this->Numerator_Difference_28AN_2D_TN29->LinkCustomAttributes = "";
		$this->Numerator_Difference_28AN_2D_TN29->HrefValue = "";
		$this->Numerator_Difference_28AN_2D_TN29->TooltipValue = "";

		// AN is higher than TD (AN - TD)
		$this->AN_is_higher_than_TD_28AN_2D_TD29->LinkCustomAttributes = "";
		$this->AN_is_higher_than_TD_28AN_2D_TD29->HrefValue = "";
		$this->AN_is_higher_than_TD_28AN_2D_TD29->TooltipValue = "";

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
					$XmlDoc->AddField('Delivery_Unit', $this->Delivery_Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Question', $this->Question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target', $this->Target->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Numerator_28TN29', $this->Target_Numerator_28TN29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Denominator_28TD29', $this->Target_Denominator_28TD29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment', $this->Accomplishment->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_Numerator_28AN29', $this->Accomplishment_Numerator_28AN29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_Denominator_28AD29', $this->Accomplishment_Denominator_28AD29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Rating_28PR29', $this->Performance_Rating_28PR29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PR_Below_9025', $this->PR_Below_9025->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PR_9025_and_Above', $this->PR_9025_and_Above->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Over_110_Performance_Rating', $this->Over_110_Performance_Rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Numerator_Difference_28AN_2D_TN29', $this->Numerator_Difference_28AN_2D_TN29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('AN_is_higher_than_TD_28AN_2D_TD29', $this->AN_is_higher_than_TD_28AN_2D_TD29->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('Delivery_Unit', $this->Delivery_Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Question', $this->Question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target', $this->Target->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Numerator_28TN29', $this->Target_Numerator_28TN29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Denominator_28TD29', $this->Target_Denominator_28TD29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment', $this->Accomplishment->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_Numerator_28AN29', $this->Accomplishment_Numerator_28AN29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_Denominator_28AD29', $this->Accomplishment_Denominator_28AD29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Rating_28PR29', $this->Performance_Rating_28PR29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PR_Below_9025', $this->PR_Below_9025->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PR_9025_and_Above', $this->PR_9025_and_Above->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Over_110_Performance_Rating', $this->Over_110_Performance_Rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Numerator_Difference_28AN_2D_TN29', $this->Numerator_Difference_28AN_2D_TN29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('AN_is_higher_than_TD_28AN_2D_TD29', $this->AN_is_higher_than_TD_28AN_2D_TD29->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->Delivery_Unit);
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->Question);
				$Doc->ExportCaption($this->Target);
				$Doc->ExportCaption($this->Target_Numerator_28TN29);
				$Doc->ExportCaption($this->Target_Denominator_28TD29);
				$Doc->ExportCaption($this->Accomplishment);
				$Doc->ExportCaption($this->Accomplishment_Numerator_28AN29);
				$Doc->ExportCaption($this->Accomplishment_Denominator_28AD29);
				$Doc->ExportCaption($this->Performance_Rating_28PR29);
				$Doc->ExportCaption($this->PR_Below_9025);
				$Doc->ExportCaption($this->PR_9025_and_Above);
				$Doc->ExportCaption($this->Over_110_Performance_Rating);
				$Doc->ExportCaption($this->Numerator_Difference_28AN_2D_TN29);
				$Doc->ExportCaption($this->AN_is_higher_than_TD_28AN_2D_TD29);
			} else {
				$Doc->ExportCaption($this->Delivery_Unit);
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->Question);
				$Doc->ExportCaption($this->Target);
				$Doc->ExportCaption($this->Target_Numerator_28TN29);
				$Doc->ExportCaption($this->Target_Denominator_28TD29);
				$Doc->ExportCaption($this->Accomplishment);
				$Doc->ExportCaption($this->Accomplishment_Numerator_28AN29);
				$Doc->ExportCaption($this->Accomplishment_Denominator_28AD29);
				$Doc->ExportCaption($this->Performance_Rating_28PR29);
				$Doc->ExportCaption($this->PR_Below_9025);
				$Doc->ExportCaption($this->PR_9025_and_Above);
				$Doc->ExportCaption($this->Over_110_Performance_Rating);
				$Doc->ExportCaption($this->Numerator_Difference_28AN_2D_TN29);
				$Doc->ExportCaption($this->AN_is_higher_than_TD_28AN_2D_TD29);
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
					$Doc->ExportField($this->Delivery_Unit);
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->Question);
					$Doc->ExportField($this->Target);
					$Doc->ExportField($this->Target_Numerator_28TN29);
					$Doc->ExportField($this->Target_Denominator_28TD29);
					$Doc->ExportField($this->Accomplishment);
					$Doc->ExportField($this->Accomplishment_Numerator_28AN29);
					$Doc->ExportField($this->Accomplishment_Denominator_28AD29);
					$Doc->ExportField($this->Performance_Rating_28PR29);
					$Doc->ExportField($this->PR_Below_9025);
					$Doc->ExportField($this->PR_9025_and_Above);
					$Doc->ExportField($this->Over_110_Performance_Rating);
					$Doc->ExportField($this->Numerator_Difference_28AN_2D_TN29);
					$Doc->ExportField($this->AN_is_higher_than_TD_28AN_2D_TD29);
				} else {
					$Doc->ExportField($this->Delivery_Unit);
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->Question);
					$Doc->ExportField($this->Target);
					$Doc->ExportField($this->Target_Numerator_28TN29);
					$Doc->ExportField($this->Target_Denominator_28TD29);
					$Doc->ExportField($this->Accomplishment);
					$Doc->ExportField($this->Accomplishment_Numerator_28AN29);
					$Doc->ExportField($this->Accomplishment_Denominator_28AD29);
					$Doc->ExportField($this->Performance_Rating_28PR29);
					$Doc->ExportField($this->PR_Below_9025);
					$Doc->ExportField($this->PR_9025_and_Above);
					$Doc->ExportField($this->Over_110_Performance_Rating);
					$Doc->ExportField($this->Numerator_Difference_28AN_2D_TN29);
					$Doc->ExportField($this->AN_is_higher_than_TD_28AN_2D_TD29);
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
