<?php

// Global variable for table object
$tbl_users = NULL;

//
// Table class for tbl_users
//
class ctbl_users {
	var $TableVar = 'tbl_users';
	var $TableName = 'tbl_users';
	var $TableType = 'TABLE';
	var $users_ID;
	var $cu;
	var $unitID;
	var $users_name;
	var $users_nameLast;
	var $users_nameFirst;
	var $users_nameMiddle;
	var $users_userLoginName;
	var $users_password;
	var $users_userLevel;
	var $users_email;
	var $users_contactNo;
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
	function ctbl_users() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// users_ID
		$this->users_ID = new cField('tbl_users', 'tbl_users', 'x_users_ID', 'users_ID', '`users_ID`', 3, -1, FALSE, '`users_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->users_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['users_ID'] =& $this->users_ID;

		// cu
		$this->cu = new cField('tbl_users', 'tbl_users', 'x_cu', 'cu', '`cu`', 200, -1, FALSE, '`cu`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['cu'] =& $this->cu;

		// unitID
		$this->unitID = new cField('tbl_users', 'tbl_users', 'x_unitID', 'unitID', '`unitID`', 3, -1, FALSE, '`unitID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->unitID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['unitID'] =& $this->unitID;

		// users_name
		$this->users_name = new cField('tbl_users', 'tbl_users', 'x_users_name', 'users_name', '`users_name`', 200, -1, FALSE, '`users_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['users_name'] =& $this->users_name;

		// users_nameLast
		$this->users_nameLast = new cField('tbl_users', 'tbl_users', 'x_users_nameLast', 'users_nameLast', '`users_nameLast`', 200, -1, FALSE, '`users_nameLast`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['users_nameLast'] =& $this->users_nameLast;

		// users_nameFirst
		$this->users_nameFirst = new cField('tbl_users', 'tbl_users', 'x_users_nameFirst', 'users_nameFirst', '`users_nameFirst`', 200, -1, FALSE, '`users_nameFirst`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['users_nameFirst'] =& $this->users_nameFirst;

		// users_nameMiddle
		$this->users_nameMiddle = new cField('tbl_users', 'tbl_users', 'x_users_nameMiddle', 'users_nameMiddle', '`users_nameMiddle`', 200, -1, FALSE, '`users_nameMiddle`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['users_nameMiddle'] =& $this->users_nameMiddle;

		// users_userLoginName
		$this->users_userLoginName = new cField('tbl_users', 'tbl_users', 'x_users_userLoginName', 'users_userLoginName', '`users_userLoginName`', 200, -1, FALSE, '`users_userLoginName`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['users_userLoginName'] =& $this->users_userLoginName;

		// users_password
		$this->users_password = new cField('tbl_users', 'tbl_users', 'x_users_password', 'users_password', '`users_password`', 200, -1, FALSE, '`users_password`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['users_password'] =& $this->users_password;

		// users_userLevel
		$this->users_userLevel = new cField('tbl_users', 'tbl_users', 'x_users_userLevel', 'users_userLevel', '`users_userLevel`', 3, -1, FALSE, '`users_userLevel`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->users_userLevel->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['users_userLevel'] =& $this->users_userLevel;

		// users_email
		$this->users_email = new cField('tbl_users', 'tbl_users', 'x_users_email', 'users_email', '`users_email`', 200, -1, FALSE, '`users_email`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['users_email'] =& $this->users_email;

		// users_contactNo
		$this->users_contactNo = new cField('tbl_users', 'tbl_users', 'x_users_contactNo', 'users_contactNo', '`users_contactNo`', 200, -1, FALSE, '`users_contactNo`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['users_contactNo'] =& $this->users_contactNo;
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
		return "tbl_users_Highlight";
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
		return "`tbl_users`";
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
			if (UP_ENCRYPTED_PASSWORD && $name == 'users_password')
				$value = (UP_CASE_SENSITIVE_PASSWORD) ? up_EncryptPassword($value) : up_EncryptPassword(strtolower($value));
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= up_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `tbl_users` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `tbl_users` SET ";
		foreach ($rs as $name => $value) {
			if (UP_ENCRYPTED_PASSWORD && $name == 'users_password') {
				$value = (UP_CASE_SENSITIVE_PASSWORD) ? up_EncryptPassword($value) : up_EncryptPassword(strtolower($value));
			}
			$SQL .= $this->fields[$name]->FldExpression . "=";
			$SQL .= up_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM `tbl_users` WHERE ";
		$SQL .= up_QuotedName('users_ID') . '=' . up_QuotedValue($rs['users_ID'], $this->users_ID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`users_ID` = @users_ID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->users_ID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@users_ID@", up_AdjustSql($this->users_ID->CurrentValue), $sKeyFilter); // Replace key value
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
			return "tbl_userslist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "tbl_userslist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("tbl_usersview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "tbl_usersadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("tbl_usersedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("tbl_usersadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("tbl_usersdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->users_ID->CurrentValue)) {
			$sUrl .= "users_ID=" . urlencode($this->users_ID->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=tbl_users" : "";
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
			$arKeys[] = @$_GET["users_ID"]; // users_ID

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
			$this->users_ID->CurrentValue = $key;
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
		$this->users_ID->setDbValue($rs->fields('users_ID'));
		$this->cu->setDbValue($rs->fields('cu'));
		$this->unitID->setDbValue($rs->fields('unitID'));
		$this->users_name->setDbValue($rs->fields('users_name'));
		$this->users_nameLast->setDbValue($rs->fields('users_nameLast'));
		$this->users_nameFirst->setDbValue($rs->fields('users_nameFirst'));
		$this->users_nameMiddle->setDbValue($rs->fields('users_nameMiddle'));
		$this->users_userLoginName->setDbValue($rs->fields('users_userLoginName'));
		$this->users_password->setDbValue($rs->fields('users_password'));
		$this->users_userLevel->setDbValue($rs->fields('users_userLevel'));
		$this->users_email->setDbValue($rs->fields('users_email'));
		$this->users_contactNo->setDbValue($rs->fields('users_contactNo'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// users_ID
		// cu
		// unitID
		// users_name
		// users_nameLast
		// users_nameFirst
		// users_nameMiddle
		// users_userLoginName
		// users_password
		// users_userLevel
		// users_email
		// users_contactNo
		// users_ID

		$this->users_ID->ViewValue = $this->users_ID->CurrentValue;
		$this->users_ID->ViewCustomAttributes = "";

		// cu
		$this->cu->ViewValue = $this->cu->CurrentValue;
		$this->cu->ViewCustomAttributes = "";

		// unitID
		$this->unitID->ViewValue = $this->unitID->CurrentValue;
		$this->unitID->ViewCustomAttributes = "";

		// users_name
		$this->users_name->ViewValue = $this->users_name->CurrentValue;
		$this->users_name->ViewCustomAttributes = "";

		// users_nameLast
		$this->users_nameLast->ViewValue = $this->users_nameLast->CurrentValue;
		$this->users_nameLast->ViewCustomAttributes = "";

		// users_nameFirst
		$this->users_nameFirst->ViewValue = $this->users_nameFirst->CurrentValue;
		$this->users_nameFirst->ViewCustomAttributes = "";

		// users_nameMiddle
		$this->users_nameMiddle->ViewValue = $this->users_nameMiddle->CurrentValue;
		$this->users_nameMiddle->ViewCustomAttributes = "";

		// users_userLoginName
		$this->users_userLoginName->ViewValue = $this->users_userLoginName->CurrentValue;
		$this->users_userLoginName->ViewCustomAttributes = "";

		// users_password
		$this->users_password->ViewValue = $this->users_password->CurrentValue;
		$this->users_password->ViewCustomAttributes = "";

		// users_userLevel
		if ($Security->CanAdmin()) { // System admin
		if (strval($this->users_userLevel->CurrentValue) <> "") {
			switch ($this->users_userLevel->CurrentValue) {
				case "-1":
					$this->users_userLevel->ViewValue = $this->users_userLevel->FldTagCaption(1) <> "" ? $this->users_userLevel->FldTagCaption(1) : $this->users_userLevel->CurrentValue;
					break;
				case "0":
					$this->users_userLevel->ViewValue = $this->users_userLevel->FldTagCaption(2) <> "" ? $this->users_userLevel->FldTagCaption(2) : $this->users_userLevel->CurrentValue;
					break;
				case "1":
					$this->users_userLevel->ViewValue = $this->users_userLevel->FldTagCaption(3) <> "" ? $this->users_userLevel->FldTagCaption(3) : $this->users_userLevel->CurrentValue;
					break;
				case "2":
					$this->users_userLevel->ViewValue = $this->users_userLevel->FldTagCaption(4) <> "" ? $this->users_userLevel->FldTagCaption(4) : $this->users_userLevel->CurrentValue;
					break;
				case "3":
					$this->users_userLevel->ViewValue = $this->users_userLevel->FldTagCaption(5) <> "" ? $this->users_userLevel->FldTagCaption(5) : $this->users_userLevel->CurrentValue;
					break;
				default:
					$this->users_userLevel->ViewValue = $this->users_userLevel->CurrentValue;
			}
		} else {
			$this->users_userLevel->ViewValue = NULL;
		}
		} else {
			$this->users_userLevel->ViewValue = "********";
		}
		$this->users_userLevel->ViewCustomAttributes = "";

		// users_email
		$this->users_email->ViewValue = $this->users_email->CurrentValue;
		$this->users_email->ViewCustomAttributes = "";

		// users_contactNo
		$this->users_contactNo->ViewValue = $this->users_contactNo->CurrentValue;
		$this->users_contactNo->ViewCustomAttributes = "";

		// users_ID
		$this->users_ID->LinkCustomAttributes = "";
		$this->users_ID->HrefValue = "";
		$this->users_ID->TooltipValue = "";

		// cu
		$this->cu->LinkCustomAttributes = "";
		$this->cu->HrefValue = "";
		$this->cu->TooltipValue = "";

		// unitID
		$this->unitID->LinkCustomAttributes = "";
		$this->unitID->HrefValue = "";
		$this->unitID->TooltipValue = "";

		// users_name
		$this->users_name->LinkCustomAttributes = "";
		$this->users_name->HrefValue = "";
		$this->users_name->TooltipValue = "";

		// users_nameLast
		$this->users_nameLast->LinkCustomAttributes = "";
		$this->users_nameLast->HrefValue = "";
		$this->users_nameLast->TooltipValue = "";

		// users_nameFirst
		$this->users_nameFirst->LinkCustomAttributes = "";
		$this->users_nameFirst->HrefValue = "";
		$this->users_nameFirst->TooltipValue = "";

		// users_nameMiddle
		$this->users_nameMiddle->LinkCustomAttributes = "";
		$this->users_nameMiddle->HrefValue = "";
		$this->users_nameMiddle->TooltipValue = "";

		// users_userLoginName
		$this->users_userLoginName->LinkCustomAttributes = "";
		$this->users_userLoginName->HrefValue = "";
		$this->users_userLoginName->TooltipValue = "";

		// users_password
		$this->users_password->LinkCustomAttributes = "";
		$this->users_password->HrefValue = "";
		$this->users_password->TooltipValue = "";

		// users_userLevel
		$this->users_userLevel->LinkCustomAttributes = "";
		$this->users_userLevel->HrefValue = "";
		$this->users_userLevel->TooltipValue = "";

		// users_email
		$this->users_email->LinkCustomAttributes = "";
		$this->users_email->HrefValue = "";
		$this->users_email->TooltipValue = "";

		// users_contactNo
		$this->users_contactNo->LinkCustomAttributes = "";
		$this->users_contactNo->HrefValue = "";
		$this->users_contactNo->TooltipValue = "";

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
					$XmlDoc->AddField('users_ID', $this->users_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu', $this->cu->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('unitID', $this->unitID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_name', $this->users_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_nameLast', $this->users_nameLast->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_nameFirst', $this->users_nameFirst->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_nameMiddle', $this->users_nameMiddle->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_userLoginName', $this->users_userLoginName->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_password', $this->users_password->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_userLevel', $this->users_userLevel->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_email', $this->users_email->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_contactNo', $this->users_contactNo->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('users_ID', $this->users_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu', $this->cu->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('unitID', $this->unitID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_name', $this->users_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_nameLast', $this->users_nameLast->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_nameFirst', $this->users_nameFirst->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_nameMiddle', $this->users_nameMiddle->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_userLoginName', $this->users_userLoginName->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_password', $this->users_password->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_userLevel', $this->users_userLevel->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_email', $this->users_email->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('users_contactNo', $this->users_contactNo->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->users_ID);
				$Doc->ExportCaption($this->cu);
				$Doc->ExportCaption($this->unitID);
				$Doc->ExportCaption($this->users_name);
				$Doc->ExportCaption($this->users_nameLast);
				$Doc->ExportCaption($this->users_nameFirst);
				$Doc->ExportCaption($this->users_nameMiddle);
				$Doc->ExportCaption($this->users_userLoginName);
				$Doc->ExportCaption($this->users_password);
				$Doc->ExportCaption($this->users_userLevel);
				$Doc->ExportCaption($this->users_email);
				$Doc->ExportCaption($this->users_contactNo);
			} else {
				$Doc->ExportCaption($this->users_ID);
				$Doc->ExportCaption($this->cu);
				$Doc->ExportCaption($this->unitID);
				$Doc->ExportCaption($this->users_name);
				$Doc->ExportCaption($this->users_nameLast);
				$Doc->ExportCaption($this->users_nameFirst);
				$Doc->ExportCaption($this->users_nameMiddle);
				$Doc->ExportCaption($this->users_userLoginName);
				$Doc->ExportCaption($this->users_password);
				$Doc->ExportCaption($this->users_userLevel);
				$Doc->ExportCaption($this->users_email);
				$Doc->ExportCaption($this->users_contactNo);
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
					$Doc->ExportField($this->users_ID);
					$Doc->ExportField($this->cu);
					$Doc->ExportField($this->unitID);
					$Doc->ExportField($this->users_name);
					$Doc->ExportField($this->users_nameLast);
					$Doc->ExportField($this->users_nameFirst);
					$Doc->ExportField($this->users_nameMiddle);
					$Doc->ExportField($this->users_userLoginName);
					$Doc->ExportField($this->users_password);
					$Doc->ExportField($this->users_userLevel);
					$Doc->ExportField($this->users_email);
					$Doc->ExportField($this->users_contactNo);
				} else {
					$Doc->ExportField($this->users_ID);
					$Doc->ExportField($this->cu);
					$Doc->ExportField($this->unitID);
					$Doc->ExportField($this->users_name);
					$Doc->ExportField($this->users_nameLast);
					$Doc->ExportField($this->users_nameFirst);
					$Doc->ExportField($this->users_nameMiddle);
					$Doc->ExportField($this->users_userLoginName);
					$Doc->ExportField($this->users_password);
					$Doc->ExportField($this->users_userLevel);
					$Doc->ExportField($this->users_email);
					$Doc->ExportField($this->users_contactNo);
				}
				$Doc->EndExportRow();
			}
			$Recordset->MoveNext();
		}
		$Doc->ExportTableFooter();
	}

	// User ID filter
	function UserIDFilter($userid) {
		$sUserIDFilter = '`unitID` = ' . up_QuotedValue($userid, UP_DATATYPE_NUMBER);
		return $sUserIDFilter;
	}

	// Add User ID filter
	function AddUserIDFilter($sFilter) {
		global $Security;
		if (!$Security->IsAdmin()) {
			$sFilterWrk = $Security->UserIDList();
			if ($sFilterWrk <> "")
				$sFilterWrk = '`unitID` IN (' . $sFilterWrk . ')';
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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `tbl_users` WHERE " . $this->AddUserIDFilter("");

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
