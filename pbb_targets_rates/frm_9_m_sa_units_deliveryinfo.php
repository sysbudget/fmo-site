<?php

// Global variable for table object
$frm_9_m_sa_units_delivery = NULL;

//
// Table class for frm_9_m_sa_units_delivery
//
class cfrm_9_m_sa_units_delivery {
	var $TableVar = 'frm_9_m_sa_units_delivery';
	var $TableName = 'frm_9_m_sa_units_delivery';
	var $TableType = 'TABLE';
	var $unit_delivery_id;
	var $focal_person_id;
	var $cu_id;
	var $cu_sequence;
	var $unit_delivery_name;
	var $cutOffDate_id;
	var $t_startDate;
	var $t_cutOffDate_fp;
	var $t_cutOffDate_remarks;
	var $CU;
	var $DU_Office_Name;
	var $DU_Short_Name;
	var $Personnel_Count;
	var $MFO_1;
	var $MFO_2;
	var $MFO_3;
	var $MFO_4;
	var $MFO_5;
	var $STO;
	var $GASS_AB;
	var $GASS_CD;
	var $GASS;
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
	function cfrm_9_m_sa_units_delivery() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// unit_delivery_id
		$this->unit_delivery_id = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_unit_delivery_id', 'unit_delivery_id', '`unit_delivery_id`', 3, -1, FALSE, '`unit_delivery_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->unit_delivery_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['unit_delivery_id'] =& $this->unit_delivery_id;

		// focal_person_id
		$this->focal_person_id = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_focal_person_id', 'focal_person_id', '`focal_person_id`', 3, -1, FALSE, '`focal_person_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focal_person_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focal_person_id'] =& $this->focal_person_id;

		// cu_id
		$this->cu_id = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_cu_id', 'cu_id', '`cu_id`', 3, -1, FALSE, '`cu_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cu_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cu_id'] =& $this->cu_id;

		// cu_sequence
		$this->cu_sequence = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_cu_sequence', 'cu_sequence', '`cu_sequence`', 3, -1, FALSE, '`cu_sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cu_sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cu_sequence'] =& $this->cu_sequence;

		// unit_delivery_name
		$this->unit_delivery_name = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_unit_delivery_name', 'unit_delivery_name', '`unit_delivery_name`', 200, -1, FALSE, '`unit_delivery_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['unit_delivery_name'] =& $this->unit_delivery_name;

		// cutOffDate_id
		$this->cutOffDate_id = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_cutOffDate_id', 'cutOffDate_id', '`cutOffDate_id`', 3, -1, FALSE, '`cutOffDate_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cutOffDate_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cutOffDate_id'] =& $this->cutOffDate_id;

		// t_startDate
		$this->t_startDate = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_t_startDate', 't_startDate', '`t_startDate`', 135, 6, FALSE, '`t_startDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_startDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['t_startDate'] =& $this->t_startDate;

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_t_cutOffDate_fp', 't_cutOffDate_fp', '`t_cutOffDate_fp`', 135, 6, FALSE, '`t_cutOffDate_fp`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_cutOffDate_fp->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['t_cutOffDate_fp'] =& $this->t_cutOffDate_fp;

		// t_cutOffDate_remarks
		$this->t_cutOffDate_remarks = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_t_cutOffDate_remarks', 't_cutOffDate_remarks', '`t_cutOffDate_remarks`', 200, -1, FALSE, '`t_cutOffDate_remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['t_cutOffDate_remarks'] =& $this->t_cutOffDate_remarks;

		// CU
		$this->CU = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_CU', 'CU', '`CU`', 200, -1, FALSE, '`CU`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['CU'] =& $this->CU;

		// DU Office Name
		$this->DU_Office_Name = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_DU_Office_Name', 'DU Office Name', '`DU Office Name`', 200, -1, FALSE, '`DU Office Name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['DU Office Name'] =& $this->DU_Office_Name;

		// DU Short Name
		$this->DU_Short_Name = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_DU_Short_Name', 'DU Short Name', '`DU Short Name`', 200, -1, FALSE, '`DU Short Name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['DU Short Name'] =& $this->DU_Short_Name;

		// Personnel Count
		$this->Personnel_Count = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_Personnel_Count', 'Personnel Count', '`Personnel Count`', 3, -1, FALSE, '`Personnel Count`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Personnel_Count->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Personnel Count'] =& $this->Personnel_Count;

		// MFO 1
		$this->MFO_1 = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_MFO_1', 'MFO 1', '`MFO 1`', 200, -1, FALSE, '`MFO 1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['MFO 1'] =& $this->MFO_1;

		// MFO 2
		$this->MFO_2 = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_MFO_2', 'MFO 2', '`MFO 2`', 200, -1, FALSE, '`MFO 2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['MFO 2'] =& $this->MFO_2;

		// MFO 3
		$this->MFO_3 = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_MFO_3', 'MFO 3', '`MFO 3`', 200, -1, FALSE, '`MFO 3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['MFO 3'] =& $this->MFO_3;

		// MFO 4
		$this->MFO_4 = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_MFO_4', 'MFO 4', '`MFO 4`', 200, -1, FALSE, '`MFO 4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['MFO 4'] =& $this->MFO_4;

		// MFO 5
		$this->MFO_5 = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_MFO_5', 'MFO 5', '`MFO 5`', 200, -1, FALSE, '`MFO 5`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['MFO 5'] =& $this->MFO_5;

		// STO
		$this->STO = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_STO', 'STO', '`STO`', 200, -1, FALSE, '`STO`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['STO'] =& $this->STO;

		// GASS AB
		$this->GASS_AB = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_GASS_AB', 'GASS AB', '`GASS AB`', 200, -1, FALSE, '`GASS AB`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['GASS AB'] =& $this->GASS_AB;

		// GASS CD
		$this->GASS_CD = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_GASS_CD', 'GASS CD', '`GASS CD`', 200, -1, FALSE, '`GASS CD`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['GASS CD'] =& $this->GASS_CD;

		// GASS
		$this->GASS = new cField('frm_9_m_sa_units_delivery', 'frm_9_m_sa_units_delivery', 'x_GASS', 'GASS', '`GASS`', 200, -1, FALSE, '`GASS`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['GASS'] =& $this->GASS;
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
		return "frm_9_m_sa_units_delivery_Highlight";
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
		if ($this->getCurrentMasterTable() == "frm_9_m_sa_units_cu") {
			if ($this->cu_id->getSessionValue() <> "")
				$sMasterFilter .= "`cu_id`=" . up_QuotedValue($this->cu_id->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sMasterFilter;
	}

	// Session detail WHERE clause
	function getDetailFilter() {

		// Detail filter
		$sDetailFilter = "";
		if ($this->getCurrentMasterTable() == "frm_9_m_sa_units_cu") {
			if ($this->cu_id->getSessionValue() <> "")
				$sDetailFilter .= "`cu_id`=" . up_QuotedValue($this->cu_id->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sDetailFilter;
	}

	// Master filter
	function SqlMasterFilter_frm_9_m_sa_units_cu() {
		return "`cu_id`=@cu_id@";
	}

	// Detail filter
	function SqlDetailFilter_frm_9_m_sa_units_cu() {
		return "`cu_id`=@cu_id@";
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
		if ($this->getCurrentDetailTable() == "frm_9_m_sa_units_contributor") {
			$sDetailUrl = $GLOBALS["frm_9_m_sa_units_contributor"]->ListUrl() . "?showmaster=" . $this->TableVar;
			$sDetailUrl .= "&unit_delivery_id=" . $this->unit_delivery_id->CurrentValue;
		}
		return $sDetailUrl;
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`frm_9_m_sa_units_delivery`";
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
		return "INSERT INTO `frm_9_m_sa_units_delivery` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_9_m_sa_units_delivery` SET ";
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
		$SQL = "DELETE FROM `frm_9_m_sa_units_delivery` WHERE ";
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
			return "frm_9_m_sa_units_deliverylist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_9_m_sa_units_deliverylist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_9_m_sa_units_deliveryview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_9_m_sa_units_deliveryadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_9_m_sa_units_deliveryedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_9_m_sa_units_deliveryadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_9_m_sa_units_deliverydelete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_9_m_sa_units_delivery" : "";
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
		$this->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$this->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$this->cu_id->setDbValue($rs->fields('cu_id'));
		$this->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$this->unit_delivery_name->setDbValue($rs->fields('unit_delivery_name'));
		$this->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$this->t_startDate->setDbValue($rs->fields('t_startDate'));
		$this->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$this->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$this->CU->setDbValue($rs->fields('CU'));
		$this->DU_Office_Name->setDbValue($rs->fields('DU Office Name'));
		$this->DU_Short_Name->setDbValue($rs->fields('DU Short Name'));
		$this->Personnel_Count->setDbValue($rs->fields('Personnel Count'));
		$this->MFO_1->setDbValue($rs->fields('MFO 1'));
		$this->MFO_2->setDbValue($rs->fields('MFO 2'));
		$this->MFO_3->setDbValue($rs->fields('MFO 3'));
		$this->MFO_4->setDbValue($rs->fields('MFO 4'));
		$this->MFO_5->setDbValue($rs->fields('MFO 5'));
		$this->STO->setDbValue($rs->fields('STO'));
		$this->GASS_AB->setDbValue($rs->fields('GASS AB'));
		$this->GASS_CD->setDbValue($rs->fields('GASS CD'));
		$this->GASS->setDbValue($rs->fields('GASS'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// cu_sequence
		// unit_delivery_name
		// cutOffDate_id
		// t_startDate
		// t_cutOffDate_fp
		// t_cutOffDate_remarks
		// CU
		// DU Office Name
		// DU Short Name
		// Personnel Count
		// MFO 1
		// MFO 2
		// MFO 3
		// MFO 4
		// MFO 5
		// STO
		// GASS AB
		// GASS CD
		// GASS
		// unit_delivery_id

		$this->unit_delivery_id->ViewValue = $this->unit_delivery_id->CurrentValue;
		$this->unit_delivery_id->ViewCustomAttributes = "";

		// focal_person_id
		$this->focal_person_id->ViewValue = $this->focal_person_id->CurrentValue;
		$this->focal_person_id->ViewCustomAttributes = "";

		// cu_id
		$this->cu_id->ViewValue = $this->cu_id->CurrentValue;
		$this->cu_id->ViewCustomAttributes = "";

		// cu_sequence
		$this->cu_sequence->ViewValue = $this->cu_sequence->CurrentValue;
		$this->cu_sequence->ViewCustomAttributes = "";

		// unit_delivery_name
		$this->unit_delivery_name->ViewValue = $this->unit_delivery_name->CurrentValue;
		$this->unit_delivery_name->ViewCustomAttributes = "";

		// cutOffDate_id
		$this->cutOffDate_id->ViewValue = $this->cutOffDate_id->CurrentValue;
		$this->cutOffDate_id->ViewCustomAttributes = "";

		// t_startDate
		$this->t_startDate->ViewValue = $this->t_startDate->CurrentValue;
		$this->t_startDate->ViewValue = up_FormatDateTime($this->t_startDate->ViewValue, 6);
		$this->t_startDate->ViewCustomAttributes = "";

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp->ViewValue = $this->t_cutOffDate_fp->CurrentValue;
		$this->t_cutOffDate_fp->ViewValue = up_FormatDateTime($this->t_cutOffDate_fp->ViewValue, 6);
		$this->t_cutOffDate_fp->ViewCustomAttributes = "";

		// t_cutOffDate_remarks
		$this->t_cutOffDate_remarks->ViewValue = $this->t_cutOffDate_remarks->CurrentValue;
		$this->t_cutOffDate_remarks->ViewCustomAttributes = "";

		// CU
		$this->CU->ViewValue = $this->CU->CurrentValue;
		$this->CU->ViewCustomAttributes = "";

		// DU Office Name
		$this->DU_Office_Name->ViewValue = $this->DU_Office_Name->CurrentValue;
		$this->DU_Office_Name->ViewCustomAttributes = "";

		// DU Short Name
		$this->DU_Short_Name->ViewValue = $this->DU_Short_Name->CurrentValue;
		$this->DU_Short_Name->ViewCustomAttributes = "";

		// Personnel Count
		$this->Personnel_Count->ViewValue = $this->Personnel_Count->CurrentValue;
		$this->Personnel_Count->ViewCustomAttributes = "";

		// MFO 1
		$this->MFO_1->ViewValue = $this->MFO_1->CurrentValue;
		$this->MFO_1->ViewCustomAttributes = "";

		// MFO 2
		$this->MFO_2->ViewValue = $this->MFO_2->CurrentValue;
		$this->MFO_2->ViewCustomAttributes = "";

		// MFO 3
		$this->MFO_3->ViewValue = $this->MFO_3->CurrentValue;
		$this->MFO_3->ViewCustomAttributes = "";

		// MFO 4
		$this->MFO_4->ViewValue = $this->MFO_4->CurrentValue;
		$this->MFO_4->ViewCustomAttributes = "";

		// MFO 5
		$this->MFO_5->ViewValue = $this->MFO_5->CurrentValue;
		$this->MFO_5->ViewCustomAttributes = "";

		// STO
		$this->STO->ViewValue = $this->STO->CurrentValue;
		$this->STO->ViewCustomAttributes = "";

		// GASS AB
		$this->GASS_AB->ViewValue = $this->GASS_AB->CurrentValue;
		$this->GASS_AB->ViewCustomAttributes = "";

		// GASS CD
		$this->GASS_CD->ViewValue = $this->GASS_CD->CurrentValue;
		$this->GASS_CD->ViewCustomAttributes = "";

		// GASS
		$this->GASS->ViewValue = $this->GASS->CurrentValue;
		$this->GASS->ViewCustomAttributes = "";

		// unit_delivery_id
		$this->unit_delivery_id->LinkCustomAttributes = "";
		$this->unit_delivery_id->HrefValue = "";
		$this->unit_delivery_id->TooltipValue = "";

		// focal_person_id
		$this->focal_person_id->LinkCustomAttributes = "";
		$this->focal_person_id->HrefValue = "";
		$this->focal_person_id->TooltipValue = "";

		// cu_id
		$this->cu_id->LinkCustomAttributes = "";
		$this->cu_id->HrefValue = "";
		$this->cu_id->TooltipValue = "";

		// cu_sequence
		$this->cu_sequence->LinkCustomAttributes = "";
		$this->cu_sequence->HrefValue = "";
		$this->cu_sequence->TooltipValue = "";

		// unit_delivery_name
		$this->unit_delivery_name->LinkCustomAttributes = "";
		$this->unit_delivery_name->HrefValue = "";
		$this->unit_delivery_name->TooltipValue = "";

		// cutOffDate_id
		$this->cutOffDate_id->LinkCustomAttributes = "";
		$this->cutOffDate_id->HrefValue = "";
		$this->cutOffDate_id->TooltipValue = "";

		// t_startDate
		$this->t_startDate->LinkCustomAttributes = "";
		$this->t_startDate->HrefValue = "";
		$this->t_startDate->TooltipValue = "";

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp->LinkCustomAttributes = "";
		$this->t_cutOffDate_fp->HrefValue = "";
		$this->t_cutOffDate_fp->TooltipValue = "";

		// t_cutOffDate_remarks
		$this->t_cutOffDate_remarks->LinkCustomAttributes = "";
		$this->t_cutOffDate_remarks->HrefValue = "";
		$this->t_cutOffDate_remarks->TooltipValue = "";

		// CU
		$this->CU->LinkCustomAttributes = "";
		$this->CU->HrefValue = "";
		$this->CU->TooltipValue = "";

		// DU Office Name
		$this->DU_Office_Name->LinkCustomAttributes = "";
		$this->DU_Office_Name->HrefValue = "";
		$this->DU_Office_Name->TooltipValue = "";

		// DU Short Name
		$this->DU_Short_Name->LinkCustomAttributes = "";
		$this->DU_Short_Name->HrefValue = "";
		$this->DU_Short_Name->TooltipValue = "";

		// Personnel Count
		$this->Personnel_Count->LinkCustomAttributes = "";
		$this->Personnel_Count->HrefValue = "";
		$this->Personnel_Count->TooltipValue = "";

		// MFO 1
		$this->MFO_1->LinkCustomAttributes = "";
		$this->MFO_1->HrefValue = "";
		$this->MFO_1->TooltipValue = "";

		// MFO 2
		$this->MFO_2->LinkCustomAttributes = "";
		$this->MFO_2->HrefValue = "";
		$this->MFO_2->TooltipValue = "";

		// MFO 3
		$this->MFO_3->LinkCustomAttributes = "";
		$this->MFO_3->HrefValue = "";
		$this->MFO_3->TooltipValue = "";

		// MFO 4
		$this->MFO_4->LinkCustomAttributes = "";
		$this->MFO_4->HrefValue = "";
		$this->MFO_4->TooltipValue = "";

		// MFO 5
		$this->MFO_5->LinkCustomAttributes = "";
		$this->MFO_5->HrefValue = "";
		$this->MFO_5->TooltipValue = "";

		// STO
		$this->STO->LinkCustomAttributes = "";
		$this->STO->HrefValue = "";
		$this->STO->TooltipValue = "";

		// GASS AB
		$this->GASS_AB->LinkCustomAttributes = "";
		$this->GASS_AB->HrefValue = "";
		$this->GASS_AB->TooltipValue = "";

		// GASS CD
		$this->GASS_CD->LinkCustomAttributes = "";
		$this->GASS_CD->HrefValue = "";
		$this->GASS_CD->TooltipValue = "";

		// GASS
		$this->GASS->LinkCustomAttributes = "";
		$this->GASS->HrefValue = "";
		$this->GASS->TooltipValue = "";

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
					$XmlDoc->AddField('unit_delivery_id', $this->unit_delivery_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focal_person_id', $this->focal_person_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_id', $this->cu_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_sequence', $this->cu_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('unit_delivery_name', $this->unit_delivery_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cutOffDate_id', $this->cutOffDate_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_startDate', $this->t_startDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_fp', $this->t_cutOffDate_fp->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_remarks', $this->t_cutOffDate_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('CU', $this->CU->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('DU_Office_Name', $this->DU_Office_Name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('DU_Short_Name', $this->DU_Short_Name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Personnel_Count', $this->Personnel_Count->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO_1', $this->MFO_1->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO_2', $this->MFO_2->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO_3', $this->MFO_3->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO_4', $this->MFO_4->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO_5', $this->MFO_5->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('STO', $this->STO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('GASS_AB', $this->GASS_AB->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('GASS_CD', $this->GASS_CD->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('GASS', $this->GASS->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('cu_sequence', $this->cu_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_remarks', $this->t_cutOffDate_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('CU', $this->CU->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('DU_Office_Name', $this->DU_Office_Name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('DU_Short_Name', $this->DU_Short_Name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Personnel_Count', $this->Personnel_Count->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO_1', $this->MFO_1->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO_2', $this->MFO_2->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO_3', $this->MFO_3->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO_4', $this->MFO_4->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO_5', $this->MFO_5->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('STO', $this->STO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('GASS_AB', $this->GASS_AB->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('GASS_CD', $this->GASS_CD->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('GASS', $this->GASS->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->unit_delivery_id);
				$Doc->ExportCaption($this->focal_person_id);
				$Doc->ExportCaption($this->cu_id);
				$Doc->ExportCaption($this->cu_sequence);
				$Doc->ExportCaption($this->unit_delivery_name);
				$Doc->ExportCaption($this->cutOffDate_id);
				$Doc->ExportCaption($this->t_startDate);
				$Doc->ExportCaption($this->t_cutOffDate_fp);
				$Doc->ExportCaption($this->t_cutOffDate_remarks);
				$Doc->ExportCaption($this->CU);
				$Doc->ExportCaption($this->DU_Office_Name);
				$Doc->ExportCaption($this->DU_Short_Name);
				$Doc->ExportCaption($this->Personnel_Count);
				$Doc->ExportCaption($this->MFO_1);
				$Doc->ExportCaption($this->MFO_2);
				$Doc->ExportCaption($this->MFO_3);
				$Doc->ExportCaption($this->MFO_4);
				$Doc->ExportCaption($this->MFO_5);
				$Doc->ExportCaption($this->STO);
				$Doc->ExportCaption($this->GASS_AB);
				$Doc->ExportCaption($this->GASS_CD);
				$Doc->ExportCaption($this->GASS);
			} else {
				$Doc->ExportCaption($this->cu_sequence);
				$Doc->ExportCaption($this->t_cutOffDate_remarks);
				$Doc->ExportCaption($this->CU);
				$Doc->ExportCaption($this->DU_Office_Name);
				$Doc->ExportCaption($this->DU_Short_Name);
				$Doc->ExportCaption($this->Personnel_Count);
				$Doc->ExportCaption($this->MFO_1);
				$Doc->ExportCaption($this->MFO_2);
				$Doc->ExportCaption($this->MFO_3);
				$Doc->ExportCaption($this->MFO_4);
				$Doc->ExportCaption($this->MFO_5);
				$Doc->ExportCaption($this->STO);
				$Doc->ExportCaption($this->GASS_AB);
				$Doc->ExportCaption($this->GASS_CD);
				$Doc->ExportCaption($this->GASS);
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
					$Doc->ExportField($this->unit_delivery_id);
					$Doc->ExportField($this->focal_person_id);
					$Doc->ExportField($this->cu_id);
					$Doc->ExportField($this->cu_sequence);
					$Doc->ExportField($this->unit_delivery_name);
					$Doc->ExportField($this->cutOffDate_id);
					$Doc->ExportField($this->t_startDate);
					$Doc->ExportField($this->t_cutOffDate_fp);
					$Doc->ExportField($this->t_cutOffDate_remarks);
					$Doc->ExportField($this->CU);
					$Doc->ExportField($this->DU_Office_Name);
					$Doc->ExportField($this->DU_Short_Name);
					$Doc->ExportField($this->Personnel_Count);
					$Doc->ExportField($this->MFO_1);
					$Doc->ExportField($this->MFO_2);
					$Doc->ExportField($this->MFO_3);
					$Doc->ExportField($this->MFO_4);
					$Doc->ExportField($this->MFO_5);
					$Doc->ExportField($this->STO);
					$Doc->ExportField($this->GASS_AB);
					$Doc->ExportField($this->GASS_CD);
					$Doc->ExportField($this->GASS);
				} else {
					$Doc->ExportField($this->cu_sequence);
					$Doc->ExportField($this->t_cutOffDate_remarks);
					$Doc->ExportField($this->CU);
					$Doc->ExportField($this->DU_Office_Name);
					$Doc->ExportField($this->DU_Short_Name);
					$Doc->ExportField($this->Personnel_Count);
					$Doc->ExportField($this->MFO_1);
					$Doc->ExportField($this->MFO_2);
					$Doc->ExportField($this->MFO_3);
					$Doc->ExportField($this->MFO_4);
					$Doc->ExportField($this->MFO_5);
					$Doc->ExportField($this->STO);
					$Doc->ExportField($this->GASS_AB);
					$Doc->ExportField($this->GASS_CD);
					$Doc->ExportField($this->GASS);
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
