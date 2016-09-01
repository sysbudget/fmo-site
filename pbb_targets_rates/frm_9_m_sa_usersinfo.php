<?php

// Global variable for table object
$frm_9_m_sa_users = NULL;

//
// Table class for frm_9_m_sa_users
//
class cfrm_9_m_sa_users {
	var $TableVar = 'frm_9_m_sa_users';
	var $TableName = 'frm_9_m_sa_users';
	var $TableType = 'TABLE';
	var $users_id;
	var $unit_contributor_id;
	var $unit_delivery_id;
	var $focal_person_id;
	var $cu_id;
	var $CU;
	var $Delivery_Unit;
	var $Contributor_Unit;
	var $Login_Name;
	var $Password;
	var $User_Level;
	var $User_Name;
	var $Last_Name;
	var $First_Name;
	var $Middle_Name;
	var $zEmail;
	var $Contact_No2E;
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
	function cfrm_9_m_sa_users() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// users_id
		$this->users_id = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_users_id', 'users_id', '`users_id`', 3, -1, FALSE, '`users_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->users_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['users_id'] =& $this->users_id;

		// unit_contributor_id
		$this->unit_contributor_id = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_unit_contributor_id', 'unit_contributor_id', '`unit_contributor_id`', 3, -1, FALSE, '`unit_contributor_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->unit_contributor_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['unit_contributor_id'] =& $this->unit_contributor_id;

		// unit_delivery_id
		$this->unit_delivery_id = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_unit_delivery_id', 'unit_delivery_id', '`unit_delivery_id`', 3, -1, FALSE, '`unit_delivery_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->unit_delivery_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['unit_delivery_id'] =& $this->unit_delivery_id;

		// focal_person_id
		$this->focal_person_id = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_focal_person_id', 'focal_person_id', '`focal_person_id`', 3, -1, FALSE, '`focal_person_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focal_person_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focal_person_id'] =& $this->focal_person_id;

		// cu_id
		$this->cu_id = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_cu_id', 'cu_id', '`cu_id`', 3, -1, FALSE, '`cu_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cu_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cu_id'] =& $this->cu_id;

		// CU
		$this->CU = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_CU', 'CU', '`CU`', 200, -1, FALSE, '`CU`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['CU'] =& $this->CU;

		// Delivery Unit
		$this->Delivery_Unit = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_Delivery_Unit', 'Delivery Unit', '`Delivery Unit`', 200, -1, FALSE, '`Delivery Unit`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Delivery Unit'] =& $this->Delivery_Unit;

		// Contributor Unit
		$this->Contributor_Unit = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_Contributor_Unit', 'Contributor Unit', '`Contributor Unit`', 200, -1, FALSE, '`Contributor Unit`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Contributor Unit'] =& $this->Contributor_Unit;

		// Login Name
		$this->Login_Name = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_Login_Name', 'Login Name', '`Login Name`', 200, -1, FALSE, '`Login Name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Login Name'] =& $this->Login_Name;

		// Password
		$this->Password = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_Password', 'Password', '`Password`', 200, -1, FALSE, '`Password`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Password'] =& $this->Password;

		// User Level
		$this->User_Level = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_User_Level', 'User Level', '`User Level`', 3, -1, FALSE, '`User Level`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->User_Level->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['User Level'] =& $this->User_Level;

		// User Name
		$this->User_Name = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_User_Name', 'User Name', '`User Name`', 200, -1, FALSE, '`User Name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['User Name'] =& $this->User_Name;

		// Last Name
		$this->Last_Name = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_Last_Name', 'Last Name', '`Last Name`', 200, -1, FALSE, '`Last Name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Last Name'] =& $this->Last_Name;

		// First Name
		$this->First_Name = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_First_Name', 'First Name', '`First Name`', 200, -1, FALSE, '`First Name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['First Name'] =& $this->First_Name;

		// Middle Name
		$this->Middle_Name = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_Middle_Name', 'Middle Name', '`Middle Name`', 200, -1, FALSE, '`Middle Name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Middle Name'] =& $this->Middle_Name;

		// Email
		$this->zEmail = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_zEmail', 'Email', '`Email`', 200, -1, FALSE, '`Email`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Email'] =& $this->zEmail;

		// Contact No.
		$this->Contact_No2E = new cField('frm_9_m_sa_users', 'frm_9_m_sa_users', 'x_Contact_No2E', 'Contact No.', '`Contact No.`', 200, -1, FALSE, '`Contact No.`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Contact No.'] =& $this->Contact_No2E;
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
		return "frm_9_m_sa_users_Highlight";
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
		return "`frm_9_m_sa_users`";
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
			if (UP_ENCRYPTED_PASSWORD && $name == 'Password')
				$value = (UP_CASE_SENSITIVE_PASSWORD) ? up_EncryptPassword($value) : up_EncryptPassword(strtolower($value));
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= up_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `frm_9_m_sa_users` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_9_m_sa_users` SET ";
		foreach ($rs as $name => $value) {
			if (UP_ENCRYPTED_PASSWORD && $name == 'Password') {
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
		$SQL = "DELETE FROM `frm_9_m_sa_users` WHERE ";
		$SQL .= up_QuotedName('users_id') . '=' . up_QuotedValue($rs['users_id'], $this->users_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`users_id` = @users_id@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->users_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@users_id@", up_AdjustSql($this->users_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "frm_9_m_sa_userslist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_9_m_sa_userslist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_9_m_sa_usersview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_9_m_sa_usersadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_9_m_sa_usersedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_9_m_sa_usersadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_9_m_sa_usersdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->users_id->CurrentValue)) {
			$sUrl .= "users_id=" . urlencode($this->users_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_9_m_sa_users" : "";
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
			$arKeys[] = @$_GET["users_id"]; // users_id

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
			$this->users_id->CurrentValue = $key;
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
		$this->users_id->setDbValue($rs->fields('users_id'));
		$this->unit_contributor_id->setDbValue($rs->fields('unit_contributor_id'));
		$this->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$this->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$this->cu_id->setDbValue($rs->fields('cu_id'));
		$this->CU->setDbValue($rs->fields('CU'));
		$this->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$this->Contributor_Unit->setDbValue($rs->fields('Contributor Unit'));
		$this->Login_Name->setDbValue($rs->fields('Login Name'));
		$this->Password->setDbValue($rs->fields('Password'));
		$this->User_Level->setDbValue($rs->fields('User Level'));
		$this->User_Name->setDbValue($rs->fields('User Name'));
		$this->Last_Name->setDbValue($rs->fields('Last Name'));
		$this->First_Name->setDbValue($rs->fields('First Name'));
		$this->Middle_Name->setDbValue($rs->fields('Middle Name'));
		$this->zEmail->setDbValue($rs->fields('Email'));
		$this->Contact_No2E->setDbValue($rs->fields('Contact No.'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// users_id
		// unit_contributor_id
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// CU

		$this->CU->CellCssStyle = "white-space: nowrap;";

		// Delivery Unit
		$this->Delivery_Unit->CellCssStyle = "white-space: nowrap;";

		// Contributor Unit
		$this->Contributor_Unit->CellCssStyle = "white-space: nowrap;";

		// Login Name
		$this->Login_Name->CellCssStyle = "white-space: nowrap;";

		// Password
		$this->Password->CellCssStyle = "white-space: nowrap;";

		// User Level
		$this->User_Level->CellCssStyle = "white-space: nowrap;";

		// User Name
		$this->User_Name->CellCssStyle = "white-space: nowrap;";

		// Last Name
		$this->Last_Name->CellCssStyle = "white-space: nowrap;";

		// First Name
		$this->First_Name->CellCssStyle = "white-space: nowrap;";

		// Middle Name
		$this->Middle_Name->CellCssStyle = "white-space: nowrap;";

		// Email
		$this->zEmail->CellCssStyle = "white-space: nowrap;";

		// Contact No.
		$this->Contact_No2E->CellCssStyle = "white-space: nowrap;";

		// users_id
		$this->users_id->ViewValue = $this->users_id->CurrentValue;
		$this->users_id->ViewCustomAttributes = "";

		// unit_contributor_id
		$this->unit_contributor_id->ViewValue = $this->unit_contributor_id->CurrentValue;
		$this->unit_contributor_id->ViewCustomAttributes = "";

		// unit_delivery_id
		$this->unit_delivery_id->ViewValue = $this->unit_delivery_id->CurrentValue;
		$this->unit_delivery_id->ViewCustomAttributes = "";

		// focal_person_id
		$this->focal_person_id->ViewValue = $this->focal_person_id->CurrentValue;
		$this->focal_person_id->ViewCustomAttributes = "";

		// cu_id
		$this->cu_id->ViewValue = $this->cu_id->CurrentValue;
		$this->cu_id->ViewCustomAttributes = "";

		// CU
		$this->CU->ViewValue = $this->CU->CurrentValue;
		$this->CU->ViewCustomAttributes = "";

		// Delivery Unit
		$this->Delivery_Unit->ViewValue = $this->Delivery_Unit->CurrentValue;
		$this->Delivery_Unit->ViewCustomAttributes = "";

		// Contributor Unit
		$this->Contributor_Unit->ViewValue = $this->Contributor_Unit->CurrentValue;
		$this->Contributor_Unit->ViewCustomAttributes = "";

		// Login Name
		$this->Login_Name->ViewValue = $this->Login_Name->CurrentValue;
		$this->Login_Name->ViewCustomAttributes = "";

		// Password
		$this->Password->ViewValue = "********";
		$this->Password->ViewCustomAttributes = "";

		// User Level
		if ($Security->CanAdmin()) { // System admin
		if (strval($this->User_Level->CurrentValue) <> "") {
			switch ($this->User_Level->CurrentValue) {
				case "-1":
					$this->User_Level->ViewValue = $this->User_Level->FldTagCaption(1) <> "" ? $this->User_Level->FldTagCaption(1) : $this->User_Level->CurrentValue;
					break;
				case "0":
					$this->User_Level->ViewValue = $this->User_Level->FldTagCaption(2) <> "" ? $this->User_Level->FldTagCaption(2) : $this->User_Level->CurrentValue;
					break;
				case "1":
					$this->User_Level->ViewValue = $this->User_Level->FldTagCaption(3) <> "" ? $this->User_Level->FldTagCaption(3) : $this->User_Level->CurrentValue;
					break;
				case "2":
					$this->User_Level->ViewValue = $this->User_Level->FldTagCaption(4) <> "" ? $this->User_Level->FldTagCaption(4) : $this->User_Level->CurrentValue;
					break;
				case "3":
					$this->User_Level->ViewValue = $this->User_Level->FldTagCaption(5) <> "" ? $this->User_Level->FldTagCaption(5) : $this->User_Level->CurrentValue;
					break;
				case "4":
					$this->User_Level->ViewValue = $this->User_Level->FldTagCaption(6) <> "" ? $this->User_Level->FldTagCaption(6) : $this->User_Level->CurrentValue;
					break;
				default:
					$this->User_Level->ViewValue = $this->User_Level->CurrentValue;
			}
		} else {
			$this->User_Level->ViewValue = NULL;
		}
		} else {
			$this->User_Level->ViewValue = "********";
		}
		$this->User_Level->ViewCustomAttributes = "";

		// User Name
		$this->User_Name->ViewValue = $this->User_Name->CurrentValue;
		$this->User_Name->ViewCustomAttributes = "";

		// Last Name
		$this->Last_Name->ViewValue = $this->Last_Name->CurrentValue;
		$this->Last_Name->ViewCustomAttributes = "";

		// First Name
		$this->First_Name->ViewValue = $this->First_Name->CurrentValue;
		$this->First_Name->ViewCustomAttributes = "";

		// Middle Name
		$this->Middle_Name->ViewValue = $this->Middle_Name->CurrentValue;
		$this->Middle_Name->ViewCustomAttributes = "";

		// Email
		$this->zEmail->ViewValue = $this->zEmail->CurrentValue;
		$this->zEmail->ViewCustomAttributes = "";

		// Contact No.
		$this->Contact_No2E->ViewValue = $this->Contact_No2E->CurrentValue;
		$this->Contact_No2E->ViewCustomAttributes = "";

		// users_id
		$this->users_id->LinkCustomAttributes = "";
		$this->users_id->HrefValue = "";
		$this->users_id->TooltipValue = "";

		// unit_contributor_id
		$this->unit_contributor_id->LinkCustomAttributes = "";
		$this->unit_contributor_id->HrefValue = "";
		$this->unit_contributor_id->TooltipValue = "";

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

		// CU
		$this->CU->LinkCustomAttributes = "";
		$this->CU->HrefValue = "";
		$this->CU->TooltipValue = "";

		// Delivery Unit
		$this->Delivery_Unit->LinkCustomAttributes = "";
		$this->Delivery_Unit->HrefValue = "";
		$this->Delivery_Unit->TooltipValue = "";

		// Contributor Unit
		$this->Contributor_Unit->LinkCustomAttributes = "";
		$this->Contributor_Unit->HrefValue = "";
		$this->Contributor_Unit->TooltipValue = "";

		// Login Name
		$this->Login_Name->LinkCustomAttributes = "";
		$this->Login_Name->HrefValue = "";
		$this->Login_Name->TooltipValue = "";

		// Password
		$this->Password->LinkCustomAttributes = "";
		$this->Password->HrefValue = "";
		$this->Password->TooltipValue = "";

		// User Level
		$this->User_Level->LinkCustomAttributes = "";
		$this->User_Level->HrefValue = "";
		$this->User_Level->TooltipValue = "";

		// User Name
		$this->User_Name->LinkCustomAttributes = "";
		$this->User_Name->HrefValue = "";
		$this->User_Name->TooltipValue = "";

		// Last Name
		$this->Last_Name->LinkCustomAttributes = "";
		$this->Last_Name->HrefValue = "";
		$this->Last_Name->TooltipValue = "";

		// First Name
		$this->First_Name->LinkCustomAttributes = "";
		$this->First_Name->HrefValue = "";
		$this->First_Name->TooltipValue = "";

		// Middle Name
		$this->Middle_Name->LinkCustomAttributes = "";
		$this->Middle_Name->HrefValue = "";
		$this->Middle_Name->TooltipValue = "";

		// Email
		$this->zEmail->LinkCustomAttributes = "";
		$this->zEmail->HrefValue = "";
		$this->zEmail->TooltipValue = "";

		// Contact No.
		$this->Contact_No2E->LinkCustomAttributes = "";
		$this->Contact_No2E->HrefValue = "";
		$this->Contact_No2E->TooltipValue = "";

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
					$XmlDoc->AddField('users_id', $this->users_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('unit_contributor_id', $this->unit_contributor_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('unit_delivery_id', $this->unit_delivery_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focal_person_id', $this->focal_person_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_id', $this->cu_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('CU', $this->CU->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Delivery_Unit', $this->Delivery_Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Contributor_Unit', $this->Contributor_Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Login_Name', $this->Login_Name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Password', $this->Password->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('User_Level', $this->User_Level->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('User_Name', $this->User_Name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Last_Name', $this->Last_Name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('First_Name', $this->First_Name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Middle_Name', $this->Middle_Name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('zEmail', $this->zEmail->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Contact_No2E', $this->Contact_No2E->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('CU', $this->CU->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Delivery_Unit', $this->Delivery_Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Contributor_Unit', $this->Contributor_Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Login_Name', $this->Login_Name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Password', $this->Password->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('User_Level', $this->User_Level->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('User_Name', $this->User_Name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('zEmail', $this->zEmail->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Contact_No2E', $this->Contact_No2E->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->users_id);
				$Doc->ExportCaption($this->unit_contributor_id);
				$Doc->ExportCaption($this->unit_delivery_id);
				$Doc->ExportCaption($this->focal_person_id);
				$Doc->ExportCaption($this->cu_id);
				$Doc->ExportCaption($this->CU);
				$Doc->ExportCaption($this->Delivery_Unit);
				$Doc->ExportCaption($this->Contributor_Unit);
				$Doc->ExportCaption($this->Login_Name);
				$Doc->ExportCaption($this->Password);
				$Doc->ExportCaption($this->User_Level);
				$Doc->ExportCaption($this->User_Name);
				$Doc->ExportCaption($this->Last_Name);
				$Doc->ExportCaption($this->First_Name);
				$Doc->ExportCaption($this->Middle_Name);
				$Doc->ExportCaption($this->zEmail);
				$Doc->ExportCaption($this->Contact_No2E);
			} else {
				$Doc->ExportCaption($this->CU);
				$Doc->ExportCaption($this->Delivery_Unit);
				$Doc->ExportCaption($this->Contributor_Unit);
				$Doc->ExportCaption($this->Login_Name);
				$Doc->ExportCaption($this->Password);
				$Doc->ExportCaption($this->User_Level);
				$Doc->ExportCaption($this->User_Name);
				$Doc->ExportCaption($this->zEmail);
				$Doc->ExportCaption($this->Contact_No2E);
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
					$Doc->ExportField($this->users_id);
					$Doc->ExportField($this->unit_contributor_id);
					$Doc->ExportField($this->unit_delivery_id);
					$Doc->ExportField($this->focal_person_id);
					$Doc->ExportField($this->cu_id);
					$Doc->ExportField($this->CU);
					$Doc->ExportField($this->Delivery_Unit);
					$Doc->ExportField($this->Contributor_Unit);
					$Doc->ExportField($this->Login_Name);
					$Doc->ExportField($this->Password);
					$Doc->ExportField($this->User_Level);
					$Doc->ExportField($this->User_Name);
					$Doc->ExportField($this->Last_Name);
					$Doc->ExportField($this->First_Name);
					$Doc->ExportField($this->Middle_Name);
					$Doc->ExportField($this->zEmail);
					$Doc->ExportField($this->Contact_No2E);
				} else {
					$Doc->ExportField($this->CU);
					$Doc->ExportField($this->Delivery_Unit);
					$Doc->ExportField($this->Contributor_Unit);
					$Doc->ExportField($this->Login_Name);
					$Doc->ExportField($this->Password);
					$Doc->ExportField($this->User_Level);
					$Doc->ExportField($this->User_Name);
					$Doc->ExportField($this->zEmail);
					$Doc->ExportField($this->Contact_No2E);
				}
				$Doc->EndExportRow();
			}
			$Recordset->MoveNext();
		}
		$Doc->ExportTableFooter();
	}

	// User ID filter
	function UserIDFilter($userid) {
		$sUserIDFilter = '`users_id` = ' . up_QuotedValue($userid, UP_DATATYPE_NUMBER);
		return $sUserIDFilter;
	}

	// Add User ID filter
	function AddUserIDFilter($sFilter) {
		global $Security;
		if (!$Security->IsAdmin()) {
			$sFilterWrk = $Security->UserIDList();
			if ($sFilterWrk <> "")
				$sFilterWrk = '`users_id` IN (' . $sFilterWrk . ')';
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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `frm_9_m_sa_users` WHERE " . $this->AddUserIDFilter("");

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
