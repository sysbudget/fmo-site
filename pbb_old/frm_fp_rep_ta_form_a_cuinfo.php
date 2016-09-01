<?php

// Global variable for table object
$frm_fp_rep_ta_form_a_cu = NULL;

//
// Table class for frm_fp_rep_ta_form_a_cu
//
class cfrm_fp_rep_ta_form_a_cu {
	var $TableVar = 'frm_fp_rep_ta_form_a_cu';
	var $TableName = 'frm_fp_rep_ta_form_a_cu';
	var $TableType = 'TABLE';
	var $id;
	var $focal_person_id;
	var $CU_Office;
	var $Sequence;
	var $MFO;
	var $Question;
	var $Participating_Units_Count;
	var $Target;
	var $Numerator_28T29;
	var $Denominator_28T29;
	var $Accomplishment;
	var $Numerator_28A29;
	var $Denominator_28A29;
	var $Rating;
	var $Supporting_Documents_Count;
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
	function cfrm_fp_rep_ta_form_a_cu() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// id
		$this->id = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_id', 'id', '`id`', 20, -1, FALSE, '`id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['id'] =& $this->id;

		// focal_person_id
		$this->focal_person_id = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_focal_person_id', 'focal_person_id', '`focal_person_id`', 3, -1, FALSE, '`focal_person_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focal_person_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focal_person_id'] =& $this->focal_person_id;

		// CU Office
		$this->CU_Office = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_CU_Office', 'CU Office', '`CU Office`', 200, -1, FALSE, '`CU Office`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['CU Office'] =& $this->CU_Office;

		// Sequence
		$this->Sequence = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_Sequence', 'Sequence', '`Sequence`', 3, -1, FALSE, '`Sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Sequence'] =& $this->Sequence;

		// MFO
		$this->MFO = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_MFO', 'MFO', '`MFO`', 200, -1, FALSE, '`MFO`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['MFO'] =& $this->MFO;

		// Question
		$this->Question = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_Question', 'Question', '`Question`', 200, -1, FALSE, '`Question`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Question'] =& $this->Question;

		// Participating Units Count
		$this->Participating_Units_Count = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_Participating_Units_Count', 'Participating Units Count', '`Participating Units Count`', 20, -1, FALSE, '`Participating Units Count`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Participating_Units_Count->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Participating Units Count'] =& $this->Participating_Units_Count;

		// Target
		$this->Target = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_Target', 'Target', '`Target`', 5, -1, FALSE, '`Target`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target'] =& $this->Target;

		// Numerator (T)
		$this->Numerator_28T29 = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_Numerator_28T29', 'Numerator (T)', '`Numerator (T)`', 5, -1, FALSE, '`Numerator (T)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Numerator_28T29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Numerator (T)'] =& $this->Numerator_28T29;

		// Denominator (T)
		$this->Denominator_28T29 = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_Denominator_28T29', 'Denominator (T)', '`Denominator (T)`', 5, -1, FALSE, '`Denominator (T)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Denominator_28T29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Denominator (T)'] =& $this->Denominator_28T29;

		// Accomplishment
		$this->Accomplishment = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_Accomplishment', 'Accomplishment', '`Accomplishment`', 5, -1, FALSE, '`Accomplishment`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment'] =& $this->Accomplishment;

		// Numerator (A)
		$this->Numerator_28A29 = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_Numerator_28A29', 'Numerator (A)', '`Numerator (A)`', 5, -1, FALSE, '`Numerator (A)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Numerator_28A29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Numerator (A)'] =& $this->Numerator_28A29;

		// Denominator (A)
		$this->Denominator_28A29 = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_Denominator_28A29', 'Denominator (A)', '`Denominator (A)`', 5, -1, FALSE, '`Denominator (A)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Denominator_28A29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Denominator (A)'] =& $this->Denominator_28A29;

		// Rating
		$this->Rating = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_Rating', 'Rating', '`Rating`', 5, -1, FALSE, '`Rating`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Rating->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Rating'] =& $this->Rating;

		// Supporting Documents Count
		$this->Supporting_Documents_Count = new cField('frm_fp_rep_ta_form_a_cu', 'frm_fp_rep_ta_form_a_cu', 'x_Supporting_Documents_Count', 'Supporting Documents Count', '`Supporting Documents Count`', 5, -1, FALSE, '`Supporting Documents Count`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Supporting_Documents_Count->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Supporting Documents Count'] =& $this->Supporting_Documents_Count;
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
		return "frm_fp_rep_ta_form_a_cu_Highlight";
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
		if ($this->getCurrentDetailTable() == "frm_fp_pbb_detail_target") {
			$sDetailUrl = $GLOBALS["frm_fp_pbb_detail_target"]->ListUrl() . "?showmaster=" . $this->TableVar;
			$sDetailUrl .= "&mfo_sequence=" . $this->Sequence->CurrentValue;
			$sDetailUrl .= "&focal_person_id=" . $this->focal_person_id->CurrentValue;
		}
		return $sDetailUrl;
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`frm_fp_rep_ta_form_a_cu`";
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
		return "INSERT INTO `frm_fp_rep_ta_form_a_cu` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_fp_rep_ta_form_a_cu` SET ";
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
		$SQL = "DELETE FROM `frm_fp_rep_ta_form_a_cu` WHERE ";
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
			return "frm_fp_rep_ta_form_a_culist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_fp_rep_ta_form_a_culist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_fp_rep_ta_form_a_cuview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_fp_rep_ta_form_a_cuadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_fp_rep_ta_form_a_cuedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_fp_rep_ta_form_a_cuadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_fp_rep_ta_form_a_cudelete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_fp_rep_ta_form_a_cu" : "";
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
		$this->id->setDbValue($rs->fields('id'));
		$this->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$this->CU_Office->setDbValue($rs->fields('CU Office'));
		$this->Sequence->setDbValue($rs->fields('Sequence'));
		$this->MFO->setDbValue($rs->fields('MFO'));
		$this->Question->setDbValue($rs->fields('Question'));
		$this->Participating_Units_Count->setDbValue($rs->fields('Participating Units Count'));
		$this->Target->setDbValue($rs->fields('Target'));
		$this->Numerator_28T29->setDbValue($rs->fields('Numerator (T)'));
		$this->Denominator_28T29->setDbValue($rs->fields('Denominator (T)'));
		$this->Accomplishment->setDbValue($rs->fields('Accomplishment'));
		$this->Numerator_28A29->setDbValue($rs->fields('Numerator (A)'));
		$this->Denominator_28A29->setDbValue($rs->fields('Denominator (A)'));
		$this->Rating->setDbValue($rs->fields('Rating'));
		$this->Supporting_Documents_Count->setDbValue($rs->fields('Supporting Documents Count'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// id

		$this->id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$this->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// CU Office
		$this->CU_Office->CellCssStyle = "white-space: nowrap;";

		// Sequence
		$this->Sequence->CellCssStyle = "white-space: nowrap;";

		// MFO
		$this->MFO->CellCssStyle = "white-space: nowrap;";

		// Question
		$this->Question->CellCssStyle = "width: 400px;";

		// Participating Units Count
		$this->Participating_Units_Count->CellCssStyle = "white-space: nowrap;";

		// Target
		// Numerator (T)
		// Denominator (T)
		// Accomplishment
		// Numerator (A)
		// Denominator (A)
		// Rating
		// Supporting Documents Count
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// focal_person_id
		$this->focal_person_id->ViewValue = $this->focal_person_id->CurrentValue;
		$this->focal_person_id->ViewCustomAttributes = "";

		// CU Office
		$this->CU_Office->ViewValue = $this->CU_Office->CurrentValue;
		$this->CU_Office->ViewCustomAttributes = "";

		// Sequence
		$this->Sequence->ViewValue = $this->Sequence->CurrentValue;
		$this->Sequence->ViewCustomAttributes = "";

		// MFO
		$this->MFO->ViewValue = $this->MFO->CurrentValue;
		$this->MFO->ViewCustomAttributes = "";

		// Question
		$this->Question->ViewValue = $this->Question->CurrentValue;
		$this->Question->ViewCustomAttributes = "";

		// Participating Units Count
		$this->Participating_Units_Count->ViewValue = $this->Participating_Units_Count->CurrentValue;
		$this->Participating_Units_Count->ViewCustomAttributes = "";

		// Target
		$this->Target->ViewValue = $this->Target->CurrentValue;
		$this->Target->CssStyle = "font-weight:bold;text-align:right;";
		$this->Target->ViewCustomAttributes = "";

		// Numerator (T)
		$this->Numerator_28T29->ViewValue = $this->Numerator_28T29->CurrentValue;
		$this->Numerator_28T29->CssStyle = "text-align:right;";
		$this->Numerator_28T29->ViewCustomAttributes = "";

		// Denominator (T)
		$this->Denominator_28T29->ViewValue = $this->Denominator_28T29->CurrentValue;
		$this->Denominator_28T29->CssStyle = "text-align:right;";
		$this->Denominator_28T29->ViewCustomAttributes = "";

		// Accomplishment
		$this->Accomplishment->ViewValue = $this->Accomplishment->CurrentValue;
		$this->Accomplishment->CssStyle = "font-weight:bold;";
		$this->Accomplishment->ViewCustomAttributes = "";

		// Numerator (A)
		$this->Numerator_28A29->ViewValue = $this->Numerator_28A29->CurrentValue;
		$this->Numerator_28A29->CssStyle = "text-align:right;";
		$this->Numerator_28A29->ViewCustomAttributes = "";

		// Denominator (A)
		$this->Denominator_28A29->ViewValue = $this->Denominator_28A29->CurrentValue;
		$this->Denominator_28A29->CssStyle = "text-align:right;";
		$this->Denominator_28A29->ViewCustomAttributes = "";

		// Rating
		$this->Rating->ViewValue = $this->Rating->CurrentValue;
		$this->Rating->CssStyle = "font-weight:bold;text-align:right;";
		$this->Rating->ViewCustomAttributes = "";

		// Supporting Documents Count
		$this->Supporting_Documents_Count->ViewValue = $this->Supporting_Documents_Count->CurrentValue;
		$this->Supporting_Documents_Count->CssStyle = "font-weight:bold;text-align:right;";
		$this->Supporting_Documents_Count->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// focal_person_id
		$this->focal_person_id->LinkCustomAttributes = "";
		$this->focal_person_id->HrefValue = "";
		$this->focal_person_id->TooltipValue = "";

		// CU Office
		$this->CU_Office->LinkCustomAttributes = "";
		$this->CU_Office->HrefValue = "";
		$this->CU_Office->TooltipValue = "";

		// Sequence
		$this->Sequence->LinkCustomAttributes = "";
		$this->Sequence->HrefValue = "";
		$this->Sequence->TooltipValue = "";

		// MFO
		$this->MFO->LinkCustomAttributes = "";
		$this->MFO->HrefValue = "";
		$this->MFO->TooltipValue = "";

		// Question
		$this->Question->LinkCustomAttributes = "";
		$this->Question->HrefValue = "";
		$this->Question->TooltipValue = "";

		// Participating Units Count
		$this->Participating_Units_Count->LinkCustomAttributes = "";
		$this->Participating_Units_Count->HrefValue = "";
		$this->Participating_Units_Count->TooltipValue = "";

		// Target
		$this->Target->LinkCustomAttributes = "";
		$this->Target->HrefValue = "";
		$this->Target->TooltipValue = "";

		// Numerator (T)
		$this->Numerator_28T29->LinkCustomAttributes = "";
		$this->Numerator_28T29->HrefValue = "";
		$this->Numerator_28T29->TooltipValue = "";

		// Denominator (T)
		$this->Denominator_28T29->LinkCustomAttributes = "";
		$this->Denominator_28T29->HrefValue = "";
		$this->Denominator_28T29->TooltipValue = "";

		// Accomplishment
		$this->Accomplishment->LinkCustomAttributes = "";
		$this->Accomplishment->HrefValue = "";
		$this->Accomplishment->TooltipValue = "";

		// Numerator (A)
		$this->Numerator_28A29->LinkCustomAttributes = "";
		$this->Numerator_28A29->HrefValue = "";
		$this->Numerator_28A29->TooltipValue = "";

		// Denominator (A)
		$this->Denominator_28A29->LinkCustomAttributes = "";
		$this->Denominator_28A29->HrefValue = "";
		$this->Denominator_28A29->TooltipValue = "";

		// Rating
		$this->Rating->LinkCustomAttributes = "";
		$this->Rating->HrefValue = "";
		$this->Rating->TooltipValue = "";

		// Supporting Documents Count
		$this->Supporting_Documents_Count->LinkCustomAttributes = "";
		$this->Supporting_Documents_Count->HrefValue = "";
		$this->Supporting_Documents_Count->TooltipValue = "";

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
					$XmlDoc->AddField('id', $this->id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focal_person_id', $this->focal_person_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('CU_Office', $this->CU_Office->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Sequence', $this->Sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Question', $this->Question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Participating_Units_Count', $this->Participating_Units_Count->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target', $this->Target->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Numerator_28T29', $this->Numerator_28T29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Denominator_28T29', $this->Denominator_28T29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment', $this->Accomplishment->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Numerator_28A29', $this->Numerator_28A29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Denominator_28A29', $this->Denominator_28A29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Rating', $this->Rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Supporting_Documents_Count', $this->Supporting_Documents_Count->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->id);
				$Doc->ExportCaption($this->focal_person_id);
				$Doc->ExportCaption($this->CU_Office);
				$Doc->ExportCaption($this->Sequence);
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->Question);
				$Doc->ExportCaption($this->Participating_Units_Count);
				$Doc->ExportCaption($this->Target);
				$Doc->ExportCaption($this->Numerator_28T29);
				$Doc->ExportCaption($this->Denominator_28T29);
				$Doc->ExportCaption($this->Accomplishment);
				$Doc->ExportCaption($this->Numerator_28A29);
				$Doc->ExportCaption($this->Denominator_28A29);
				$Doc->ExportCaption($this->Rating);
				$Doc->ExportCaption($this->Supporting_Documents_Count);
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
					$Doc->ExportField($this->id);
					$Doc->ExportField($this->focal_person_id);
					$Doc->ExportField($this->CU_Office);
					$Doc->ExportField($this->Sequence);
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->Question);
					$Doc->ExportField($this->Participating_Units_Count);
					$Doc->ExportField($this->Target);
					$Doc->ExportField($this->Numerator_28T29);
					$Doc->ExportField($this->Denominator_28T29);
					$Doc->ExportField($this->Accomplishment);
					$Doc->ExportField($this->Numerator_28A29);
					$Doc->ExportField($this->Denominator_28A29);
					$Doc->ExportField($this->Rating);
					$Doc->ExportField($this->Supporting_Documents_Count);
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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `frm_fp_rep_ta_form_a_cu` WHERE " . $this->AddUserIDFilter("");

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
