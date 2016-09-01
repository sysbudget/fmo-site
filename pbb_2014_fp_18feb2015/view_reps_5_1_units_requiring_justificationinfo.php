<?php

// Global variable for table object
$view_reps_5_1_units_requiring_justification = NULL;

//
// Table class for view_reps_5_1_units_requiring_justification
//
class cview_reps_5_1_units_requiring_justification {
	var $TableVar = 'view_reps_5_1_units_requiring_justification';
	var $TableName = 'view_reps_5_1_units_requiring_justification';
	var $TableType = 'VIEW';
	var $ID;
	var $Sequence;
	var $Constituent_University;
	var $Unit;
	var $MFO;
	var $PI_No;
	var $PI_Sub;
	var $Rating;
	var $Above_9025_Rating;
	var $Below_9025_Rating;
	var $Rating_Above_11025_and_Below_9025;
	var $Unit_Remarks;
	var $focalperson_ID;
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
	function cview_reps_5_1_units_requiring_justification() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// ID
		$this->ID = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_ID', 'ID', '`ID`', 3, -1, FALSE, '`ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['ID'] =& $this->ID;

		// Sequence
		$this->Sequence = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_Sequence', 'Sequence', '`Sequence`', 21, -1, FALSE, '`Sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Sequence'] =& $this->Sequence;

		// Constituent University
		$this->Constituent_University = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_Constituent_University', 'Constituent University', '`Constituent University`', 200, -1, FALSE, '`Constituent University`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Constituent University'] =& $this->Constituent_University;

		// Unit
		$this->Unit = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_Unit', 'Unit', '`Unit`', 200, -1, FALSE, '`Unit`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Unit'] =& $this->Unit;

		// MFO
		$this->MFO = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_MFO', 'MFO', '`MFO`', 3, -1, FALSE, '`MFO`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->MFO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['MFO'] =& $this->MFO;

		// PI No
		$this->PI_No = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_PI_No', 'PI No', '`PI No`', 20, -1, FALSE, '`PI No`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_No->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI No'] =& $this->PI_No;

		// PI Sub
		$this->PI_Sub = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_PI_Sub', 'PI Sub', '`PI Sub`', 200, -1, FALSE, '`PI Sub`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Sub'] =& $this->PI_Sub;

		// Rating
		$this->Rating = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_Rating', 'Rating', '`Rating`', 5, -1, FALSE, '`Rating`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Rating->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Rating'] =& $this->Rating;

		// Above 90% Rating
		$this->Above_9025_Rating = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_Above_9025_Rating', 'Above 90% Rating', '`Above 90% Rating`', 5, -1, FALSE, '`Above 90% Rating`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Above_9025_Rating->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Above 90% Rating'] =& $this->Above_9025_Rating;

		// Below 90% Rating
		$this->Below_9025_Rating = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_Below_9025_Rating', 'Below 90% Rating', '`Below 90% Rating`', 5, -1, FALSE, '`Below 90% Rating`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_Rating->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% Rating'] =& $this->Below_9025_Rating;

		// Rating Above 110% and Below 90%
		$this->Rating_Above_11025_and_Below_9025 = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_Rating_Above_11025_and_Below_9025', 'Rating Above 110% and Below 90%', '`Rating Above 110% and Below 90%`', 200, -1, FALSE, '`Rating Above 110% and Below 90%`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Rating Above 110% and Below 90%'] =& $this->Rating_Above_11025_and_Below_9025;

		// Unit Remarks
		$this->Unit_Remarks = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_Unit_Remarks', 'Unit Remarks', '`Unit Remarks`', 200, -1, FALSE, '`Unit Remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Unit Remarks'] =& $this->Unit_Remarks;

		// focalperson_ID
		$this->focalperson_ID = new cField('view_reps_5_1_units_requiring_justification', 'view_reps_5_1_units_requiring_justification', 'x_focalperson_ID', 'focalperson_ID', '`focalperson_ID`', 3, -1, FALSE, '`focalperson_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focalperson_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focalperson_ID'] =& $this->focalperson_ID;
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
		return "view_reps_5_1_units_requiring_justification_Highlight";
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
		return "`view_reps_5_1_units_requiring_justification`";
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
		return "INSERT INTO `view_reps_5_1_units_requiring_justification` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `view_reps_5_1_units_requiring_justification` SET ";
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
		$SQL = "DELETE FROM `view_reps_5_1_units_requiring_justification` WHERE ";
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
			return "view_reps_5_1_units_requiring_justificationlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "view_reps_5_1_units_requiring_justificationlist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("view_reps_5_1_units_requiring_justificationview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "view_reps_5_1_units_requiring_justificationadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("view_reps_5_1_units_requiring_justificationedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("view_reps_5_1_units_requiring_justificationadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("view_reps_5_1_units_requiring_justificationdelete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=view_reps_5_1_units_requiring_justification" : "";
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
		$this->ID->setDbValue($rs->fields('ID'));
		$this->Sequence->setDbValue($rs->fields('Sequence'));
		$this->Constituent_University->setDbValue($rs->fields('Constituent University'));
		$this->Unit->setDbValue($rs->fields('Unit'));
		$this->MFO->setDbValue($rs->fields('MFO'));
		$this->PI_No->setDbValue($rs->fields('PI No'));
		$this->PI_Sub->setDbValue($rs->fields('PI Sub'));
		$this->Rating->setDbValue($rs->fields('Rating'));
		$this->Above_9025_Rating->setDbValue($rs->fields('Above 90% Rating'));
		$this->Below_9025_Rating->setDbValue($rs->fields('Below 90% Rating'));
		$this->Rating_Above_11025_and_Below_9025->setDbValue($rs->fields('Rating Above 110% and Below 90%'));
		$this->Unit_Remarks->setDbValue($rs->fields('Unit Remarks'));
		$this->focalperson_ID->setDbValue($rs->fields('focalperson_ID'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// ID

		$this->ID->CellCssStyle = "white-space: nowrap;";

		// Sequence
		$this->Sequence->CellCssStyle = "white-space: nowrap;";

		// Constituent University
		$this->Constituent_University->CellCssStyle = "white-space: nowrap;";

		// Unit
		$this->Unit->CellCssStyle = "white-space: nowrap;";

		// MFO
		$this->MFO->CellCssStyle = "white-space: nowrap;";

		// PI No
		$this->PI_No->CellCssStyle = "white-space: nowrap;";

		// PI Sub
		// Rating

		$this->Rating->CellCssStyle = "white-space: nowrap;";

		// Above 90% Rating
		$this->Above_9025_Rating->CellCssStyle = "white-space: nowrap;";

		// Below 90% Rating
		$this->Below_9025_Rating->CellCssStyle = "white-space: nowrap;";

		// Rating Above 110% and Below 90%
		$this->Rating_Above_11025_and_Below_9025->CellCssStyle = "white-space: nowrap;";

		// Unit Remarks
		$this->Unit_Remarks->CellCssStyle = "white-space: nowrap;";

		// focalperson_ID
		// ID

		$this->ID->ViewValue = $this->ID->CurrentValue;
		$this->ID->ViewCustomAttributes = "";

		// Sequence
		$this->Sequence->ViewValue = $this->Sequence->CurrentValue;
		$this->Sequence->ViewCustomAttributes = "";

		// Constituent University
		$this->Constituent_University->ViewValue = $this->Constituent_University->CurrentValue;
		$this->Constituent_University->ViewCustomAttributes = "";

		// Unit
		$this->Unit->ViewValue = $this->Unit->CurrentValue;
		$this->Unit->ViewCustomAttributes = "";

		// MFO
		$this->MFO->ViewValue = $this->MFO->CurrentValue;
		$this->MFO->ViewCustomAttributes = "";

		// PI No
		$this->PI_No->ViewValue = $this->PI_No->CurrentValue;
		$this->PI_No->ViewCustomAttributes = "";

		// PI Sub
		$this->PI_Sub->ViewValue = $this->PI_Sub->CurrentValue;
		$this->PI_Sub->ViewCustomAttributes = "";

		// Rating
		$this->Rating->ViewValue = $this->Rating->CurrentValue;
		$this->Rating->ViewCustomAttributes = "";

		// Above 90% Rating
		$this->Above_9025_Rating->ViewValue = $this->Above_9025_Rating->CurrentValue;
		$this->Above_9025_Rating->ViewCustomAttributes = "";

		// Below 90% Rating
		$this->Below_9025_Rating->ViewValue = $this->Below_9025_Rating->CurrentValue;
		$this->Below_9025_Rating->ViewCustomAttributes = "";

		// Rating Above 110% and Below 90%
		$this->Rating_Above_11025_and_Below_9025->ViewValue = $this->Rating_Above_11025_and_Below_9025->CurrentValue;
		$this->Rating_Above_11025_and_Below_9025->ViewCustomAttributes = "";

		// Unit Remarks
		$this->Unit_Remarks->ViewValue = $this->Unit_Remarks->CurrentValue;
		$this->Unit_Remarks->ViewCustomAttributes = "";

		// focalperson_ID
		$this->focalperson_ID->ViewValue = $this->focalperson_ID->CurrentValue;
		$this->focalperson_ID->ViewCustomAttributes = "";

		// ID
		$this->ID->LinkCustomAttributes = "";
		$this->ID->HrefValue = "";
		$this->ID->TooltipValue = "";

		// Sequence
		$this->Sequence->LinkCustomAttributes = "";
		$this->Sequence->HrefValue = "";
		$this->Sequence->TooltipValue = "";

		// Constituent University
		$this->Constituent_University->LinkCustomAttributes = "";
		$this->Constituent_University->HrefValue = "";
		$this->Constituent_University->TooltipValue = "";

		// Unit
		$this->Unit->LinkCustomAttributes = "";
		$this->Unit->HrefValue = "";
		$this->Unit->TooltipValue = "";

		// MFO
		$this->MFO->LinkCustomAttributes = "";
		$this->MFO->HrefValue = "";
		$this->MFO->TooltipValue = "";

		// PI No
		$this->PI_No->LinkCustomAttributes = "";
		$this->PI_No->HrefValue = "";
		$this->PI_No->TooltipValue = "";

		// PI Sub
		$this->PI_Sub->LinkCustomAttributes = "";
		$this->PI_Sub->HrefValue = "";
		$this->PI_Sub->TooltipValue = "";

		// Rating
		$this->Rating->LinkCustomAttributes = "";
		$this->Rating->HrefValue = "";
		$this->Rating->TooltipValue = "";

		// Above 90% Rating
		$this->Above_9025_Rating->LinkCustomAttributes = "";
		$this->Above_9025_Rating->HrefValue = "";
		$this->Above_9025_Rating->TooltipValue = "";

		// Below 90% Rating
		$this->Below_9025_Rating->LinkCustomAttributes = "";
		$this->Below_9025_Rating->HrefValue = "";
		$this->Below_9025_Rating->TooltipValue = "";

		// Rating Above 110% and Below 90%
		$this->Rating_Above_11025_and_Below_9025->LinkCustomAttributes = "";
		$this->Rating_Above_11025_and_Below_9025->HrefValue = "";
		$this->Rating_Above_11025_and_Below_9025->TooltipValue = "";

		// Unit Remarks
		$this->Unit_Remarks->LinkCustomAttributes = "";
		$this->Unit_Remarks->HrefValue = "";
		$this->Unit_Remarks->TooltipValue = "";

		// focalperson_ID
		$this->focalperson_ID->LinkCustomAttributes = "";
		$this->focalperson_ID->HrefValue = "";
		$this->focalperson_ID->TooltipValue = "";

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
					$XmlDoc->AddField('ID', $this->ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Sequence', $this->Sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Constituent_University', $this->Constituent_University->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Unit', $this->Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_No', $this->PI_No->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Sub', $this->PI_Sub->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Rating', $this->Rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Above_9025_Rating', $this->Above_9025_Rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_Rating', $this->Below_9025_Rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Rating_Above_11025_and_Below_9025', $this->Rating_Above_11025_and_Below_9025->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Unit_Remarks', $this->Unit_Remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focalperson_ID', $this->focalperson_ID->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('ID', $this->ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Sequence', $this->Sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Constituent_University', $this->Constituent_University->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Unit', $this->Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_No', $this->PI_No->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Sub', $this->PI_Sub->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Rating', $this->Rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Above_9025_Rating', $this->Above_9025_Rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_Rating', $this->Below_9025_Rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Rating_Above_11025_and_Below_9025', $this->Rating_Above_11025_and_Below_9025->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Unit_Remarks', $this->Unit_Remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focalperson_ID', $this->focalperson_ID->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->ID);
				$Doc->ExportCaption($this->Sequence);
				$Doc->ExportCaption($this->Constituent_University);
				$Doc->ExportCaption($this->Unit);
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->PI_No);
				$Doc->ExportCaption($this->PI_Sub);
				$Doc->ExportCaption($this->Rating);
				$Doc->ExportCaption($this->Above_9025_Rating);
				$Doc->ExportCaption($this->Below_9025_Rating);
				$Doc->ExportCaption($this->Rating_Above_11025_and_Below_9025);
				$Doc->ExportCaption($this->Unit_Remarks);
				$Doc->ExportCaption($this->focalperson_ID);
			} else {
				$Doc->ExportCaption($this->ID);
				$Doc->ExportCaption($this->Sequence);
				$Doc->ExportCaption($this->Constituent_University);
				$Doc->ExportCaption($this->Unit);
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->PI_No);
				$Doc->ExportCaption($this->PI_Sub);
				$Doc->ExportCaption($this->Rating);
				$Doc->ExportCaption($this->Above_9025_Rating);
				$Doc->ExportCaption($this->Below_9025_Rating);
				$Doc->ExportCaption($this->Rating_Above_11025_and_Below_9025);
				$Doc->ExportCaption($this->Unit_Remarks);
				$Doc->ExportCaption($this->focalperson_ID);
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
					$Doc->ExportField($this->ID);
					$Doc->ExportField($this->Sequence);
					$Doc->ExportField($this->Constituent_University);
					$Doc->ExportField($this->Unit);
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->PI_No);
					$Doc->ExportField($this->PI_Sub);
					$Doc->ExportField($this->Rating);
					$Doc->ExportField($this->Above_9025_Rating);
					$Doc->ExportField($this->Below_9025_Rating);
					$Doc->ExportField($this->Rating_Above_11025_and_Below_9025);
					$Doc->ExportField($this->Unit_Remarks);
					$Doc->ExportField($this->focalperson_ID);
				} else {
					$Doc->ExportField($this->ID);
					$Doc->ExportField($this->Sequence);
					$Doc->ExportField($this->Constituent_University);
					$Doc->ExportField($this->Unit);
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->PI_No);
					$Doc->ExportField($this->PI_Sub);
					$Doc->ExportField($this->Rating);
					$Doc->ExportField($this->Above_9025_Rating);
					$Doc->ExportField($this->Below_9025_Rating);
					$Doc->ExportField($this->Rating_Above_11025_and_Below_9025);
					$Doc->ExportField($this->Unit_Remarks);
					$Doc->ExportField($this->focalperson_ID);
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
				$sFilterWrk = '`focalperson_ID` IN (' . $sFilterWrk . ')';
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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `view_reps_5_1_units_requiring_justification` WHERE " . $this->AddUserIDFilter("");

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
