<?php

// Global variable for table object
$frm_u_rep_t_completion_status_unit_mfo = NULL;

//
// Table class for frm_u_rep_t_completion_status_unit_mfo
//
class cfrm_u_rep_t_completion_status_unit_mfo {
	var $TableVar = 'frm_u_rep_t_completion_status_unit_mfo';
	var $TableName = 'frm_u_rep_t_completion_status_unit_mfo';
	var $TableType = 'TABLE';
	var $focal_person_id;
	var $cu_short_name;
	var $units_id;
	var $cu_unit_name;
	var $mfo;
	var $mfo_name_rep;
	var $budget;
	var $No2E_of_PIs_28A29;
	var $Applicable_PIs_28B29;
	var $Not_Applicable_PIs_28C29;
	var $PI_with_Target_28D29;
	var $Remarks_28A_3D_C29;
	var $Remarks_28B_3E_D29;
	var $Remarks_28D_3D_029;
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
	function cfrm_u_rep_t_completion_status_unit_mfo() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// focal_person_id
		$this->focal_person_id = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_focal_person_id', 'focal_person_id', '`focal_person_id`', 3, -1, FALSE, '`focal_person_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focal_person_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focal_person_id'] =& $this->focal_person_id;

		// cu_short_name
		$this->cu_short_name = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_cu_short_name', 'cu_short_name', '`cu_short_name`', 200, -1, FALSE, '`cu_short_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['cu_short_name'] =& $this->cu_short_name;

		// units_id
		$this->units_id = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_units_id', 'units_id', '`units_id`', 3, -1, FALSE, '`units_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->units_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['units_id'] =& $this->units_id;

		// cu_unit_name
		$this->cu_unit_name = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_cu_unit_name', 'cu_unit_name', '`cu_unit_name`', 200, -1, FALSE, '`cu_unit_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['cu_unit_name'] =& $this->cu_unit_name;

		// mfo
		$this->mfo = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_mfo', 'mfo', '`mfo`', 3, -1, FALSE, '`mfo`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo'] =& $this->mfo;

		// mfo_name_rep
		$this->mfo_name_rep = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_mfo_name_rep', 'mfo_name_rep', '`mfo_name_rep`', 200, -1, FALSE, '`mfo_name_rep`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_name_rep'] =& $this->mfo_name_rep;

		// budget
		$this->budget = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_budget', 'budget', '`budget`', 131, -1, FALSE, '`budget`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->budget->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['budget'] =& $this->budget;

		// No. of PIs (A)
		$this->No2E_of_PIs_28A29 = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_No2E_of_PIs_28A29', 'No. of PIs (A)', '`No. of PIs (A)`', 20, -1, FALSE, '`No. of PIs (A)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->No2E_of_PIs_28A29->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['No. of PIs (A)'] =& $this->No2E_of_PIs_28A29;

		// Applicable PIs (B)
		$this->Applicable_PIs_28B29 = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_Applicable_PIs_28B29', 'Applicable PIs (B)', '`Applicable PIs (B)`', 20, -1, FALSE, '`Applicable PIs (B)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Applicable_PIs_28B29->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Applicable PIs (B)'] =& $this->Applicable_PIs_28B29;

		// Not Applicable PIs (C)
		$this->Not_Applicable_PIs_28C29 = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_Not_Applicable_PIs_28C29', 'Not Applicable PIs (C)', '`Not Applicable PIs (C)`', 20, -1, FALSE, '`Not Applicable PIs (C)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Not_Applicable_PIs_28C29->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Not Applicable PIs (C)'] =& $this->Not_Applicable_PIs_28C29;

		// PI with Target (D)
		$this->PI_with_Target_28D29 = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_PI_with_Target_28D29', 'PI with Target (D)', '`PI with Target (D)`', 20, -1, FALSE, '`PI with Target (D)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_with_Target_28D29->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI with Target (D)'] =& $this->PI_with_Target_28D29;

		// Remarks (A = C)
		$this->Remarks_28A_3D_C29 = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_Remarks_28A_3D_C29', 'Remarks (A = C)', '`Remarks (A = C)`', 200, -1, FALSE, '`Remarks (A = C)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (A = C)'] =& $this->Remarks_28A_3D_C29;

		// Remarks (B > D)
		$this->Remarks_28B_3E_D29 = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_Remarks_28B_3E_D29', 'Remarks (B > D)', '`Remarks (B > D)`', 200, -1, FALSE, '`Remarks (B > D)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (B > D)'] =& $this->Remarks_28B_3E_D29;

		// Remarks (D = 0)
		$this->Remarks_28D_3D_029 = new cField('frm_u_rep_t_completion_status_unit_mfo', 'frm_u_rep_t_completion_status_unit_mfo', 'x_Remarks_28D_3D_029', 'Remarks (D = 0)', '`Remarks (D = 0)`', 200, -1, FALSE, '`Remarks (D = 0)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (D = 0)'] =& $this->Remarks_28D_3D_029;
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
		return "frm_u_rep_t_completion_status_unit_mfo_Highlight";
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
		if ($this->getCurrentDetailTable() == "frm_u_pbb_detail_target") {
			$sDetailUrl = $GLOBALS["frm_u_pbb_detail_target"]->ListUrl() . "?showmaster=" . $this->TableVar;
			$sDetailUrl .= "&units_id=" . $this->units_id->CurrentValue;
			$sDetailUrl .= "&focal_person_id=" . $this->focal_person_id->CurrentValue;
			$sDetailUrl .= "&mfo=" . $this->mfo->CurrentValue;
		}
		return $sDetailUrl;
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`frm_u_rep_t_completion_status_unit_mfo`";
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
		return "INSERT INTO `frm_u_rep_t_completion_status_unit_mfo` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_u_rep_t_completion_status_unit_mfo` SET ";
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
		$SQL = "DELETE FROM `frm_u_rep_t_completion_status_unit_mfo` WHERE ";
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
			return "frm_u_rep_t_completion_status_unit_mfolist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_u_rep_t_completion_status_unit_mfolist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_u_rep_t_completion_status_unit_mfoview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_u_rep_t_completion_status_unit_mfoadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_u_rep_t_completion_status_unit_mfoedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_u_rep_t_completion_status_unit_mfoadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_u_rep_t_completion_status_unit_mfodelete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_u_rep_t_completion_status_unit_mfo" : "";
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
		$this->units_id->setDbValue($rs->fields('units_id'));
		$this->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$this->mfo->setDbValue($rs->fields('mfo'));
		$this->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$this->budget->setDbValue($rs->fields('budget'));
		$this->No2E_of_PIs_28A29->setDbValue($rs->fields('No. of PIs (A)'));
		$this->Applicable_PIs_28B29->setDbValue($rs->fields('Applicable PIs (B)'));
		$this->Not_Applicable_PIs_28C29->setDbValue($rs->fields('Not Applicable PIs (C)'));
		$this->PI_with_Target_28D29->setDbValue($rs->fields('PI with Target (D)'));
		$this->Remarks_28A_3D_C29->setDbValue($rs->fields('Remarks (A = C)'));
		$this->Remarks_28B_3E_D29->setDbValue($rs->fields('Remarks (B > D)'));
		$this->Remarks_28D_3D_029->setDbValue($rs->fields('Remarks (D = 0)'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// focal_person_id
		// cu_short_name
		// units_id
		// cu_unit_name
		// mfo
		// mfo_name_rep
		// budget
		// No. of PIs (A)
		// Applicable PIs (B)
		// Not Applicable PIs (C)
		// PI with Target (D)
		// Remarks (A = C)
		// Remarks (B > D)
		// Remarks (D = 0)
		// focal_person_id

		$this->focal_person_id->ViewValue = $this->focal_person_id->CurrentValue;
		$this->focal_person_id->ViewCustomAttributes = "";

		// cu_short_name
		$this->cu_short_name->ViewValue = $this->cu_short_name->CurrentValue;
		$this->cu_short_name->ViewCustomAttributes = "";

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

		// No. of PIs (A)
		$this->No2E_of_PIs_28A29->ViewValue = $this->No2E_of_PIs_28A29->CurrentValue;
		$this->No2E_of_PIs_28A29->ViewCustomAttributes = "";

		// Applicable PIs (B)
		$this->Applicable_PIs_28B29->ViewValue = $this->Applicable_PIs_28B29->CurrentValue;
		$this->Applicable_PIs_28B29->ViewCustomAttributes = "";

		// Not Applicable PIs (C)
		$this->Not_Applicable_PIs_28C29->ViewValue = $this->Not_Applicable_PIs_28C29->CurrentValue;
		$this->Not_Applicable_PIs_28C29->ViewCustomAttributes = "";

		// PI with Target (D)
		$this->PI_with_Target_28D29->ViewValue = $this->PI_with_Target_28D29->CurrentValue;
		$this->PI_with_Target_28D29->ViewCustomAttributes = "";

		// Remarks (A = C)
		$this->Remarks_28A_3D_C29->ViewValue = $this->Remarks_28A_3D_C29->CurrentValue;
		$this->Remarks_28A_3D_C29->ViewCustomAttributes = "";

		// Remarks (B > D)
		$this->Remarks_28B_3E_D29->ViewValue = $this->Remarks_28B_3E_D29->CurrentValue;
		$this->Remarks_28B_3E_D29->ViewCustomAttributes = "";

		// Remarks (D = 0)
		$this->Remarks_28D_3D_029->ViewValue = $this->Remarks_28D_3D_029->CurrentValue;
		$this->Remarks_28D_3D_029->ViewCustomAttributes = "";

		// focal_person_id
		$this->focal_person_id->LinkCustomAttributes = "";
		$this->focal_person_id->HrefValue = "";
		$this->focal_person_id->TooltipValue = "";

		// cu_short_name
		$this->cu_short_name->LinkCustomAttributes = "";
		$this->cu_short_name->HrefValue = "";
		$this->cu_short_name->TooltipValue = "";

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

		// No. of PIs (A)
		$this->No2E_of_PIs_28A29->LinkCustomAttributes = "";
		$this->No2E_of_PIs_28A29->HrefValue = "";
		$this->No2E_of_PIs_28A29->TooltipValue = "";

		// Applicable PIs (B)
		$this->Applicable_PIs_28B29->LinkCustomAttributes = "";
		$this->Applicable_PIs_28B29->HrefValue = "";
		$this->Applicable_PIs_28B29->TooltipValue = "";

		// Not Applicable PIs (C)
		$this->Not_Applicable_PIs_28C29->LinkCustomAttributes = "";
		$this->Not_Applicable_PIs_28C29->HrefValue = "";
		$this->Not_Applicable_PIs_28C29->TooltipValue = "";

		// PI with Target (D)
		$this->PI_with_Target_28D29->LinkCustomAttributes = "";
		$this->PI_with_Target_28D29->HrefValue = "";
		$this->PI_with_Target_28D29->TooltipValue = "";

		// Remarks (A = C)
		$this->Remarks_28A_3D_C29->LinkCustomAttributes = "";
		$this->Remarks_28A_3D_C29->HrefValue = "";
		$this->Remarks_28A_3D_C29->TooltipValue = "";

		// Remarks (B > D)
		$this->Remarks_28B_3E_D29->LinkCustomAttributes = "";
		$this->Remarks_28B_3E_D29->HrefValue = "";
		$this->Remarks_28B_3E_D29->TooltipValue = "";

		// Remarks (D = 0)
		$this->Remarks_28D_3D_029->LinkCustomAttributes = "";
		$this->Remarks_28D_3D_029->HrefValue = "";
		$this->Remarks_28D_3D_029->TooltipValue = "";

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
					$XmlDoc->AddField('units_id', $this->units_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_unit_name', $this->cu_unit_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo', $this->mfo->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_name_rep', $this->mfo_name_rep->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('budget', $this->budget->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('No2E_of_PIs_28A29', $this->No2E_of_PIs_28A29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Applicable_PIs_28B29', $this->Applicable_PIs_28B29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Not_Applicable_PIs_28C29', $this->Not_Applicable_PIs_28C29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_with_Target_28D29', $this->PI_with_Target_28D29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28A_3D_C29', $this->Remarks_28A_3D_C29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28B_3E_D29', $this->Remarks_28B_3E_D29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28D_3D_029', $this->Remarks_28D_3D_029->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->units_id);
				$Doc->ExportCaption($this->cu_unit_name);
				$Doc->ExportCaption($this->mfo);
				$Doc->ExportCaption($this->mfo_name_rep);
				$Doc->ExportCaption($this->budget);
				$Doc->ExportCaption($this->No2E_of_PIs_28A29);
				$Doc->ExportCaption($this->Applicable_PIs_28B29);
				$Doc->ExportCaption($this->Not_Applicable_PIs_28C29);
				$Doc->ExportCaption($this->PI_with_Target_28D29);
				$Doc->ExportCaption($this->Remarks_28A_3D_C29);
				$Doc->ExportCaption($this->Remarks_28B_3E_D29);
				$Doc->ExportCaption($this->Remarks_28D_3D_029);
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
					$Doc->ExportField($this->units_id);
					$Doc->ExportField($this->cu_unit_name);
					$Doc->ExportField($this->mfo);
					$Doc->ExportField($this->mfo_name_rep);
					$Doc->ExportField($this->budget);
					$Doc->ExportField($this->No2E_of_PIs_28A29);
					$Doc->ExportField($this->Applicable_PIs_28B29);
					$Doc->ExportField($this->Not_Applicable_PIs_28C29);
					$Doc->ExportField($this->PI_with_Target_28D29);
					$Doc->ExportField($this->Remarks_28A_3D_C29);
					$Doc->ExportField($this->Remarks_28B_3E_D29);
					$Doc->ExportField($this->Remarks_28D_3D_029);
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
				$sFilterWrk = '`units_id` IN (' . $sFilterWrk . ')';
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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `frm_u_rep_t_completion_status_unit_mfo` WHERE " . $this->AddUserIDFilter("");

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