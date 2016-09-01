<?php

// Global variable for table object
$frm_sam_rep_ta_form_a_0 = NULL;

//
// Table class for frm_sam_rep_ta_form_a_0
//
class cfrm_sam_rep_ta_form_a_0 {
	var $TableVar = 'frm_sam_rep_ta_form_a_0';
	var $TableName = 'frm_sam_rep_ta_form_a_0';
	var $TableType = 'TABLE';
	var $Sequence;
	var $MFO;
	var $Question;
	var $GAA;
	var $Sum_2F_Avg;
	var $Numerator_28T29;
	var $Denominator_28T29;
	var $Remarks;
	var $Participating_Units_Count;
	var $Participating_Units;
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
	function cfrm_sam_rep_ta_form_a_0() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// Sequence
		$this->Sequence = new cField('frm_sam_rep_ta_form_a_0', 'frm_sam_rep_ta_form_a_0', 'x_Sequence', 'Sequence', '`Sequence`', 3, -1, FALSE, '`Sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Sequence'] =& $this->Sequence;

		// MFO
		$this->MFO = new cField('frm_sam_rep_ta_form_a_0', 'frm_sam_rep_ta_form_a_0', 'x_MFO', 'MFO', '`MFO`', 200, -1, FALSE, '`MFO`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['MFO'] =& $this->MFO;

		// Question
		$this->Question = new cField('frm_sam_rep_ta_form_a_0', 'frm_sam_rep_ta_form_a_0', 'x_Question', 'Question', '`Question`', 200, -1, FALSE, '`Question`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Question'] =& $this->Question;

		// GAA
		$this->GAA = new cField('frm_sam_rep_ta_form_a_0', 'frm_sam_rep_ta_form_a_0', 'x_GAA', 'GAA', '`GAA`', 5, -1, FALSE, '`GAA`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->GAA->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['GAA'] =& $this->GAA;

		// Sum / Avg
		$this->Sum_2F_Avg = new cField('frm_sam_rep_ta_form_a_0', 'frm_sam_rep_ta_form_a_0', 'x_Sum_2F_Avg', 'Sum / Avg', '`Sum / Avg`', 5, -1, FALSE, '`Sum / Avg`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Sum_2F_Avg->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Sum / Avg'] =& $this->Sum_2F_Avg;

		// Numerator (T)
		$this->Numerator_28T29 = new cField('frm_sam_rep_ta_form_a_0', 'frm_sam_rep_ta_form_a_0', 'x_Numerator_28T29', 'Numerator (T)', '`Numerator (T)`', 5, -1, FALSE, '`Numerator (T)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Numerator_28T29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Numerator (T)'] =& $this->Numerator_28T29;

		// Denominator (T)
		$this->Denominator_28T29 = new cField('frm_sam_rep_ta_form_a_0', 'frm_sam_rep_ta_form_a_0', 'x_Denominator_28T29', 'Denominator (T)', '`Denominator (T)`', 5, -1, FALSE, '`Denominator (T)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Denominator_28T29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Denominator (T)'] =& $this->Denominator_28T29;

		// Remarks
		$this->Remarks = new cField('frm_sam_rep_ta_form_a_0', 'frm_sam_rep_ta_form_a_0', 'x_Remarks', 'Remarks', '`Remarks`', 200, -1, FALSE, '`Remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks'] =& $this->Remarks;

		// Participating Units Count
		$this->Participating_Units_Count = new cField('frm_sam_rep_ta_form_a_0', 'frm_sam_rep_ta_form_a_0', 'x_Participating_Units_Count', 'Participating Units Count', '`Participating Units Count`', 20, -1, FALSE, '`Participating Units Count`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Participating_Units_Count->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Participating Units Count'] =& $this->Participating_Units_Count;

		// Participating Units
		$this->Participating_Units = new cField('frm_sam_rep_ta_form_a_0', 'frm_sam_rep_ta_form_a_0', 'x_Participating_Units', 'Participating Units', '`Participating Units`', 201, -1, FALSE, '`Participating Units`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Participating Units'] =& $this->Participating_Units;
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
		return "frm_sam_rep_ta_form_a_0_Highlight";
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
		if ($this->getCurrentDetailTable() == "frm_sam_rep_ta_form_a_0_cu") {
			$sDetailUrl = $GLOBALS["frm_sam_rep_ta_form_a_0_cu"]->ListUrl() . "?showmaster=" . $this->TableVar;
			$sDetailUrl .= "&Sequence=" . $this->Sequence->CurrentValue;
		}
		return $sDetailUrl;
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`frm_sam_rep_ta_form_a_0`";
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
		return "INSERT INTO `frm_sam_rep_ta_form_a_0` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_sam_rep_ta_form_a_0` SET ";
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
		$SQL = "DELETE FROM `frm_sam_rep_ta_form_a_0` WHERE ";
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
			return "frm_sam_rep_ta_form_a_0list.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_sam_rep_ta_form_a_0list.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_sam_rep_ta_form_a_0view.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_sam_rep_ta_form_a_0add.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_sam_rep_ta_form_a_0edit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_sam_rep_ta_form_a_0add.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_sam_rep_ta_form_a_0delete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_sam_rep_ta_form_a_0" : "";
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
		$this->Sequence->setDbValue($rs->fields('Sequence'));
		$this->MFO->setDbValue($rs->fields('MFO'));
		$this->Question->setDbValue($rs->fields('Question'));
		$this->GAA->setDbValue($rs->fields('GAA'));
		$this->Sum_2F_Avg->setDbValue($rs->fields('Sum / Avg'));
		$this->Numerator_28T29->setDbValue($rs->fields('Numerator (T)'));
		$this->Denominator_28T29->setDbValue($rs->fields('Denominator (T)'));
		$this->Remarks->setDbValue($rs->fields('Remarks'));
		$this->Participating_Units_Count->setDbValue($rs->fields('Participating Units Count'));
		$this->Participating_Units->setDbValue($rs->fields('Participating Units'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// Sequence

		$this->Sequence->CellCssStyle = "white-space: nowrap;";

		// MFO
		$this->MFO->CellCssStyle = "white-space: nowrap;";

		// Question
		// GAA

		$this->GAA->CellCssStyle = "white-space: nowrap;";

		// Sum / Avg
		$this->Sum_2F_Avg->CellCssStyle = "white-space: nowrap;";

		// Numerator (T)
		$this->Numerator_28T29->CellCssStyle = "white-space: nowrap;";

		// Denominator (T)
		$this->Denominator_28T29->CellCssStyle = "white-space: nowrap;";

		// Remarks
		$this->Remarks->CellCssStyle = "white-space: nowrap;";

		// Participating Units Count
		$this->Participating_Units_Count->CellCssStyle = "white-space: nowrap;";

		// Participating Units
		$this->Participating_Units->CellCssStyle = "white-space: nowrap;";

		// Sequence
		$this->Sequence->ViewValue = $this->Sequence->CurrentValue;
		$this->Sequence->ViewCustomAttributes = "";

		// MFO
		$this->MFO->ViewValue = $this->MFO->CurrentValue;
		$this->MFO->ViewCustomAttributes = "";

		// Question
		$this->Question->ViewValue = $this->Question->CurrentValue;
		$this->Question->ViewCustomAttributes = "";

		// GAA
		$this->GAA->ViewValue = $this->GAA->CurrentValue;
		$this->GAA->CssStyle = "font-weight:bold;text-align:right;";
		$this->GAA->ViewCustomAttributes = "";

		// Sum / Avg
		$this->Sum_2F_Avg->ViewValue = $this->Sum_2F_Avg->CurrentValue;
		$this->Sum_2F_Avg->CssStyle = "font-weight:bold;text-align:right;";
		$this->Sum_2F_Avg->ViewCustomAttributes = "";

		// Numerator (T)
		$this->Numerator_28T29->ViewValue = $this->Numerator_28T29->CurrentValue;
		$this->Numerator_28T29->CssStyle = "text-align:right;";
		$this->Numerator_28T29->ViewCustomAttributes = "";

		// Denominator (T)
		$this->Denominator_28T29->ViewValue = $this->Denominator_28T29->CurrentValue;
		$this->Denominator_28T29->CssStyle = "text-align:right;";
		$this->Denominator_28T29->ViewCustomAttributes = "";

		// Remarks
		$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
		$this->Remarks->CssStyle = "font-weight:bold;";
		$this->Remarks->ViewCustomAttributes = "";

		// Participating Units Count
		$this->Participating_Units_Count->ViewValue = $this->Participating_Units_Count->CurrentValue;
		$this->Participating_Units_Count->ViewCustomAttributes = "";

		// Participating Units
		$this->Participating_Units->ViewValue = $this->Participating_Units->CurrentValue;
		$this->Participating_Units->ViewCustomAttributes = "";

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

		// GAA
		$this->GAA->LinkCustomAttributes = "";
		$this->GAA->HrefValue = "";
		$this->GAA->TooltipValue = "";

		// Sum / Avg
		$this->Sum_2F_Avg->LinkCustomAttributes = "";
		$this->Sum_2F_Avg->HrefValue = "";
		$this->Sum_2F_Avg->TooltipValue = "";

		// Numerator (T)
		$this->Numerator_28T29->LinkCustomAttributes = "";
		$this->Numerator_28T29->HrefValue = "";
		$this->Numerator_28T29->TooltipValue = "";

		// Denominator (T)
		$this->Denominator_28T29->LinkCustomAttributes = "";
		$this->Denominator_28T29->HrefValue = "";
		$this->Denominator_28T29->TooltipValue = "";

		// Remarks
		$this->Remarks->LinkCustomAttributes = "";
		$this->Remarks->HrefValue = "";
		$this->Remarks->TooltipValue = "";

		// Participating Units Count
		$this->Participating_Units_Count->LinkCustomAttributes = "";
		$this->Participating_Units_Count->HrefValue = "";
		$this->Participating_Units_Count->TooltipValue = "";

		// Participating Units
		$this->Participating_Units->LinkCustomAttributes = "";
		$this->Participating_Units->HrefValue = "";
		$this->Participating_Units->TooltipValue = "";

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
					$XmlDoc->AddField('Sequence', $this->Sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Question', $this->Question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('GAA', $this->GAA->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Sum_2F_Avg', $this->Sum_2F_Avg->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Numerator_28T29', $this->Numerator_28T29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Denominator_28T29', $this->Denominator_28T29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks', $this->Remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Participating_Units_Count', $this->Participating_Units_Count->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Participating_Units', $this->Participating_Units->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Question', $this->Question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('GAA', $this->GAA->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Sum_2F_Avg', $this->Sum_2F_Avg->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Numerator_28T29', $this->Numerator_28T29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Denominator_28T29', $this->Denominator_28T29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks', $this->Remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Participating_Units_Count', $this->Participating_Units_Count->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->Sequence);
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->Question);
				$Doc->ExportCaption($this->GAA);
				$Doc->ExportCaption($this->Sum_2F_Avg);
				$Doc->ExportCaption($this->Numerator_28T29);
				$Doc->ExportCaption($this->Denominator_28T29);
				$Doc->ExportCaption($this->Remarks);
				$Doc->ExportCaption($this->Participating_Units_Count);
				$Doc->ExportCaption($this->Participating_Units);
			} else {
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->Question);
				$Doc->ExportCaption($this->GAA);
				$Doc->ExportCaption($this->Sum_2F_Avg);
				$Doc->ExportCaption($this->Numerator_28T29);
				$Doc->ExportCaption($this->Denominator_28T29);
				$Doc->ExportCaption($this->Remarks);
				$Doc->ExportCaption($this->Participating_Units_Count);
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
					$Doc->ExportField($this->Sequence);
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->Question);
					$Doc->ExportField($this->GAA);
					$Doc->ExportField($this->Sum_2F_Avg);
					$Doc->ExportField($this->Numerator_28T29);
					$Doc->ExportField($this->Denominator_28T29);
					$Doc->ExportField($this->Remarks);
					$Doc->ExportField($this->Participating_Units_Count);
					$Doc->ExportField($this->Participating_Units);
				} else {
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->Question);
					$Doc->ExportField($this->GAA);
					$Doc->ExportField($this->Sum_2F_Avg);
					$Doc->ExportField($this->Numerator_28T29);
					$Doc->ExportField($this->Denominator_28T29);
					$Doc->ExportField($this->Remarks);
					$Doc->ExportField($this->Participating_Units_Count);
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
