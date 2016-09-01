<?php

// Global variable for table object
$tbl_collectionperiod = NULL;

//
// Table class for tbl_collectionperiod
//
class ctbl_collectionperiod {
	var $TableVar = 'tbl_collectionperiod';
	var $TableName = 'tbl_collectionperiod';
	var $TableType = 'TABLE';
	var $collectionPeriod_ID;
	var $id_cu;
	var $cu_name;
	var $collectionPeriod_cutOffDate;
	var $collectionPeriod_status;
	var $remarks_cutOffDate;
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
	function ctbl_collectionperiod() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// collectionPeriod_ID
		$this->collectionPeriod_ID = new cField('tbl_collectionperiod', 'tbl_collectionperiod', 'x_collectionPeriod_ID', 'collectionPeriod_ID', '`collectionPeriod_ID`', 3, -1, FALSE, '`collectionPeriod_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->collectionPeriod_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['collectionPeriod_ID'] =& $this->collectionPeriod_ID;

		// id_cu
		$this->id_cu = new cField('tbl_collectionperiod', 'tbl_collectionperiod', 'x_id_cu', 'id_cu', '`id_cu`', 3, -1, FALSE, '`id_cu`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->id_cu->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['id_cu'] =& $this->id_cu;

		// cu_name
		$this->cu_name = new cField('tbl_collectionperiod', 'tbl_collectionperiod', 'x_cu_name', 'cu_name', '`cu_name`', 200, -1, FALSE, '`cu_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['cu_name'] =& $this->cu_name;

		// collectionPeriod_cutOffDate
		$this->collectionPeriod_cutOffDate = new cField('tbl_collectionperiod', 'tbl_collectionperiod', 'x_collectionPeriod_cutOffDate', 'collectionPeriod_cutOffDate', '`collectionPeriod_cutOffDate`', 135, 6, FALSE, '`collectionPeriod_cutOffDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->collectionPeriod_cutOffDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['collectionPeriod_cutOffDate'] =& $this->collectionPeriod_cutOffDate;

		// collectionPeriod_status
		$this->collectionPeriod_status = new cField('tbl_collectionperiod', 'tbl_collectionperiod', 'x_collectionPeriod_status', 'collectionPeriod_status', '`collectionPeriod_status`', 200, -1, FALSE, '`collectionPeriod_status`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['collectionPeriod_status'] =& $this->collectionPeriod_status;

		// remarks_cutOffDate
		$this->remarks_cutOffDate = new cField('tbl_collectionperiod', 'tbl_collectionperiod', 'x_remarks_cutOffDate', 'remarks_cutOffDate', '`remarks_cutOffDate`', 135, 6, FALSE, '`remarks_cutOffDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->remarks_cutOffDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['remarks_cutOffDate'] =& $this->remarks_cutOffDate;
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
		return "tbl_collectionperiod_Highlight";
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
		return "`tbl_collectionperiod`";
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
		return "INSERT INTO `tbl_collectionperiod` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `tbl_collectionperiod` SET ";
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
		$SQL = "DELETE FROM `tbl_collectionperiod` WHERE ";
		$SQL .= up_QuotedName('collectionPeriod_ID') . '=' . up_QuotedValue($rs['collectionPeriod_ID'], $this->collectionPeriod_ID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`collectionPeriod_ID` = @collectionPeriod_ID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->collectionPeriod_ID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@collectionPeriod_ID@", up_AdjustSql($this->collectionPeriod_ID->CurrentValue), $sKeyFilter); // Replace key value
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
			return "tbl_collectionperiodlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "tbl_collectionperiodlist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("tbl_collectionperiodview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "tbl_collectionperiodadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("tbl_collectionperiodedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("tbl_collectionperiodadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("tbl_collectionperioddelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->collectionPeriod_ID->CurrentValue)) {
			$sUrl .= "collectionPeriod_ID=" . urlencode($this->collectionPeriod_ID->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=tbl_collectionperiod" : "";
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
			$arKeys[] = @$_GET["collectionPeriod_ID"]; // collectionPeriod_ID

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
			$this->collectionPeriod_ID->CurrentValue = $key;
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
		$this->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$this->id_cu->setDbValue($rs->fields('id_cu'));
		$this->cu_name->setDbValue($rs->fields('cu_name'));
		$this->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$this->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
		$this->remarks_cutOffDate->setDbValue($rs->fields('remarks_cutOffDate'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// collectionPeriod_ID

		$this->collectionPeriod_ID->CellCssStyle = "white-space: nowrap;";

		// id_cu
		$this->id_cu->CellCssStyle = "white-space: nowrap;";

		// cu_name
		$this->cu_name->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_cutOffDate
		$this->collectionPeriod_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_status
		$this->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";

		// remarks_cutOffDate
		// collectionPeriod_ID

		$this->collectionPeriod_ID->ViewValue = $this->collectionPeriod_ID->CurrentValue;
		$this->collectionPeriod_ID->ViewCustomAttributes = "";

		// id_cu
		$this->id_cu->ViewValue = $this->id_cu->CurrentValue;
		$this->id_cu->ViewCustomAttributes = "";

		// cu_name
		$this->cu_name->ViewValue = $this->cu_name->CurrentValue;
		$this->cu_name->ViewCustomAttributes = "";

		// collectionPeriod_cutOffDate
		$this->collectionPeriod_cutOffDate->ViewValue = $this->collectionPeriod_cutOffDate->CurrentValue;
		$this->collectionPeriod_cutOffDate->ViewValue = up_FormatDateTime($this->collectionPeriod_cutOffDate->ViewValue, 6);
		$this->collectionPeriod_cutOffDate->ViewCustomAttributes = "";

		// collectionPeriod_status
		if (strval($this->collectionPeriod_status->CurrentValue) <> "") {
			switch ($this->collectionPeriod_status->CurrentValue) {
				case "A":
					$this->collectionPeriod_status->ViewValue = $this->collectionPeriod_status->FldTagCaption(1) <> "" ? $this->collectionPeriod_status->FldTagCaption(1) : $this->collectionPeriod_status->CurrentValue;
					break;
				case "I":
					$this->collectionPeriod_status->ViewValue = $this->collectionPeriod_status->FldTagCaption(2) <> "" ? $this->collectionPeriod_status->FldTagCaption(2) : $this->collectionPeriod_status->CurrentValue;
					break;
				default:
					$this->collectionPeriod_status->ViewValue = $this->collectionPeriod_status->CurrentValue;
			}
		} else {
			$this->collectionPeriod_status->ViewValue = NULL;
		}
		$this->collectionPeriod_status->ViewCustomAttributes = "";

		// remarks_cutOffDate
		$this->remarks_cutOffDate->ViewValue = $this->remarks_cutOffDate->CurrentValue;
		$this->remarks_cutOffDate->ViewValue = up_FormatDateTime($this->remarks_cutOffDate->ViewValue, 6);
		$this->remarks_cutOffDate->ViewCustomAttributes = "";

		// collectionPeriod_ID
		$this->collectionPeriod_ID->LinkCustomAttributes = "";
		$this->collectionPeriod_ID->HrefValue = "";
		$this->collectionPeriod_ID->TooltipValue = "";

		// id_cu
		$this->id_cu->LinkCustomAttributes = "";
		$this->id_cu->HrefValue = "";
		$this->id_cu->TooltipValue = "";

		// cu_name
		$this->cu_name->LinkCustomAttributes = "";
		$this->cu_name->HrefValue = "";
		$this->cu_name->TooltipValue = "";

		// collectionPeriod_cutOffDate
		$this->collectionPeriod_cutOffDate->LinkCustomAttributes = "";
		$this->collectionPeriod_cutOffDate->HrefValue = "";
		$this->collectionPeriod_cutOffDate->TooltipValue = "";

		// collectionPeriod_status
		$this->collectionPeriod_status->LinkCustomAttributes = "";
		$this->collectionPeriod_status->HrefValue = "";
		$this->collectionPeriod_status->TooltipValue = "";

		// remarks_cutOffDate
		$this->remarks_cutOffDate->LinkCustomAttributes = "";
		$this->remarks_cutOffDate->HrefValue = "";
		$this->remarks_cutOffDate->TooltipValue = "";

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
					$XmlDoc->AddField('collectionPeriod_ID', $this->collectionPeriod_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('id_cu', $this->id_cu->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_name', $this->cu_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('collectionPeriod_cutOffDate', $this->collectionPeriod_cutOffDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('collectionPeriod_status', $this->collectionPeriod_status->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('remarks_cutOffDate', $this->remarks_cutOffDate->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('id_cu', $this->id_cu->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_name', $this->cu_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('collectionPeriod_cutOffDate', $this->collectionPeriod_cutOffDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('collectionPeriod_status', $this->collectionPeriod_status->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('remarks_cutOffDate', $this->remarks_cutOffDate->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->collectionPeriod_ID);
				$Doc->ExportCaption($this->id_cu);
				$Doc->ExportCaption($this->cu_name);
				$Doc->ExportCaption($this->collectionPeriod_cutOffDate);
				$Doc->ExportCaption($this->collectionPeriod_status);
				$Doc->ExportCaption($this->remarks_cutOffDate);
			} else {
				$Doc->ExportCaption($this->id_cu);
				$Doc->ExportCaption($this->cu_name);
				$Doc->ExportCaption($this->collectionPeriod_cutOffDate);
				$Doc->ExportCaption($this->collectionPeriod_status);
				$Doc->ExportCaption($this->remarks_cutOffDate);
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
					$Doc->ExportField($this->collectionPeriod_ID);
					$Doc->ExportField($this->id_cu);
					$Doc->ExportField($this->cu_name);
					$Doc->ExportField($this->collectionPeriod_cutOffDate);
					$Doc->ExportField($this->collectionPeriod_status);
					$Doc->ExportField($this->remarks_cutOffDate);
				} else {
					$Doc->ExportField($this->id_cu);
					$Doc->ExportField($this->cu_name);
					$Doc->ExportField($this->collectionPeriod_cutOffDate);
					$Doc->ExportField($this->collectionPeriod_status);
					$Doc->ExportField($this->remarks_cutOffDate);
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