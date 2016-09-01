<?php

// Global variable for table object
$frm_mfo_questions = NULL;

//
// Table class for frm_mfo_questions
//
class cfrm_mfo_questions {
	var $TableVar = 'frm_mfo_questions';
	var $TableName = 'frm_mfo_questions';
	var $TableType = 'TABLE';
	var $mfo_id;
	var $mfo_sequence;
	var $gaa_value;
	var $mfo;
	var $pi_no;
	var $pi_sub;
	var $mfo_name_rep;
	var $mfo_name;
	var $pi_question;
	var $denominator;
	var $pi_type;
	var $expectations;
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
	function cfrm_mfo_questions() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// mfo_id
		$this->mfo_id = new cField('frm_mfo_questions', 'frm_mfo_questions', 'x_mfo_id', 'mfo_id', '`mfo_id`', 3, -1, FALSE, '`mfo_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_id'] =& $this->mfo_id;

		// mfo_sequence
		$this->mfo_sequence = new cField('frm_mfo_questions', 'frm_mfo_questions', 'x_mfo_sequence', 'mfo_sequence', '`mfo_sequence`', 3, -1, FALSE, '`mfo_sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_sequence'] =& $this->mfo_sequence;

		// gaa_value
		$this->gaa_value = new cField('frm_mfo_questions', 'frm_mfo_questions', 'x_gaa_value', 'gaa_value', '`gaa_value`', 5, -1, FALSE, '`gaa_value`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->gaa_value->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['gaa_value'] =& $this->gaa_value;

		// mfo
		$this->mfo = new cField('frm_mfo_questions', 'frm_mfo_questions', 'x_mfo', 'mfo', '`mfo`', 3, -1, FALSE, '`mfo`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo'] =& $this->mfo;

		// pi_no
		$this->pi_no = new cField('frm_mfo_questions', 'frm_mfo_questions', 'x_pi_no', 'pi_no', '`pi_no`', 20, -1, FALSE, '`pi_no`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->pi_no->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['pi_no'] =& $this->pi_no;

		// pi_sub
		$this->pi_sub = new cField('frm_mfo_questions', 'frm_mfo_questions', 'x_pi_sub', 'pi_sub', '`pi_sub`', 200, -1, FALSE, '`pi_sub`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['pi_sub'] =& $this->pi_sub;

		// mfo_name_rep
		$this->mfo_name_rep = new cField('frm_mfo_questions', 'frm_mfo_questions', 'x_mfo_name_rep', 'mfo_name_rep', '`mfo_name_rep`', 200, -1, FALSE, '`mfo_name_rep`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_name_rep'] =& $this->mfo_name_rep;

		// mfo_name
		$this->mfo_name = new cField('frm_mfo_questions', 'frm_mfo_questions', 'x_mfo_name', 'mfo_name', '`mfo_name`', 200, -1, FALSE, '`mfo_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_name'] =& $this->mfo_name;

		// pi_question
		$this->pi_question = new cField('frm_mfo_questions', 'frm_mfo_questions', 'x_pi_question', 'pi_question', '`pi_question`', 200, -1, FALSE, '`pi_question`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['pi_question'] =& $this->pi_question;

		// denominator
		$this->denominator = new cField('frm_mfo_questions', 'frm_mfo_questions', 'x_denominator', 'denominator', '`denominator`', 200, -1, FALSE, '`denominator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['denominator'] =& $this->denominator;

		// pi_type
		$this->pi_type = new cField('frm_mfo_questions', 'frm_mfo_questions', 'x_pi_type', 'pi_type', '`pi_type`', 200, -1, FALSE, '`pi_type`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['pi_type'] =& $this->pi_type;

		// expectations
		$this->expectations = new cField('frm_mfo_questions', 'frm_mfo_questions', 'x_expectations', 'expectations', '`expectations`', 200, -1, FALSE, '`expectations`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['expectations'] =& $this->expectations;
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
		return "frm_mfo_questions_Highlight";
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
		return "`frm_mfo_questions`";
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
		return "`mfo_sequence` ASC";
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
		return "INSERT INTO `frm_mfo_questions` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_mfo_questions` SET ";
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
		$SQL = "DELETE FROM `frm_mfo_questions` WHERE ";
		$SQL .= up_QuotedName('mfo_id') . '=' . up_QuotedValue($rs['mfo_id'], $this->mfo_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`mfo_id` = @mfo_id@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->mfo_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@mfo_id@", up_AdjustSql($this->mfo_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "frm_mfo_questionslist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_mfo_questionslist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_mfo_questionsview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_mfo_questionsadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_mfo_questionsedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_mfo_questionsadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_mfo_questionsdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->mfo_id->CurrentValue)) {
			$sUrl .= "mfo_id=" . urlencode($this->mfo_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_mfo_questions" : "";
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
			$arKeys[] = @$_GET["mfo_id"]; // mfo_id

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
			$this->mfo_id->CurrentValue = $key;
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
		$this->mfo_id->setDbValue($rs->fields('mfo_id'));
		$this->mfo_sequence->setDbValue($rs->fields('mfo_sequence'));
		$this->gaa_value->setDbValue($rs->fields('gaa_value'));
		$this->mfo->setDbValue($rs->fields('mfo'));
		$this->pi_no->setDbValue($rs->fields('pi_no'));
		$this->pi_sub->setDbValue($rs->fields('pi_sub'));
		$this->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$this->mfo_name->setDbValue($rs->fields('mfo_name'));
		$this->pi_question->setDbValue($rs->fields('pi_question'));
		$this->denominator->setDbValue($rs->fields('denominator'));
		$this->pi_type->setDbValue($rs->fields('pi_type'));
		$this->expectations->setDbValue($rs->fields('expectations'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// mfo_id

		$this->mfo_id->CellCssStyle = "white-space: nowrap;";

		// mfo_sequence
		$this->mfo_sequence->CellCssStyle = "white-space: nowrap;";

		// gaa_value
		$this->gaa_value->CellCssStyle = "white-space: nowrap;";

		// mfo
		$this->mfo->CellCssStyle = "white-space: nowrap;";

		// pi_no
		$this->pi_no->CellCssStyle = "white-space: nowrap;";

		// pi_sub
		$this->pi_sub->CellCssStyle = "white-space: nowrap;";

		// mfo_name_rep
		$this->mfo_name_rep->CellCssStyle = "white-space: nowrap;";

		// mfo_name
		$this->mfo_name->CellCssStyle = "white-space: nowrap;";

		// pi_question
		$this->pi_question->CellCssStyle = "white-space: nowrap;";

		// denominator
		$this->denominator->CellCssStyle = "white-space: nowrap;";

		// pi_type
		$this->pi_type->CellCssStyle = "white-space: nowrap;";

		// expectations
		// mfo_id

		$this->mfo_id->ViewValue = $this->mfo_id->CurrentValue;
		$this->mfo_id->ViewCustomAttributes = "";

		// mfo_sequence
		$this->mfo_sequence->ViewValue = $this->mfo_sequence->CurrentValue;
		$this->mfo_sequence->ViewCustomAttributes = "";

		// gaa_value
		$this->gaa_value->ViewValue = $this->gaa_value->CurrentValue;
		$this->gaa_value->ViewCustomAttributes = "";

		// mfo
		$this->mfo->ViewValue = $this->mfo->CurrentValue;
		$this->mfo->ViewCustomAttributes = "";

		// pi_no
		$this->pi_no->ViewValue = $this->pi_no->CurrentValue;
		$this->pi_no->ViewCustomAttributes = "";

		// pi_sub
		$this->pi_sub->ViewValue = $this->pi_sub->CurrentValue;
		$this->pi_sub->ViewCustomAttributes = "";

		// mfo_name_rep
		$this->mfo_name_rep->ViewValue = $this->mfo_name_rep->CurrentValue;
		$this->mfo_name_rep->ViewCustomAttributes = "";

		// mfo_name
		$this->mfo_name->ViewValue = $this->mfo_name->CurrentValue;
		$this->mfo_name->ViewCustomAttributes = "";

		// pi_question
		$this->pi_question->ViewValue = $this->pi_question->CurrentValue;
		$this->pi_question->ViewCustomAttributes = "";

		// denominator
		$this->denominator->ViewValue = $this->denominator->CurrentValue;
		$this->denominator->ViewCustomAttributes = "";

		// pi_type
		$this->pi_type->ViewValue = $this->pi_type->CurrentValue;
		$this->pi_type->ViewCustomAttributes = "";

		// expectations
		$this->expectations->ViewValue = $this->expectations->CurrentValue;
		$this->expectations->ViewCustomAttributes = "";

		// mfo_id
		$this->mfo_id->LinkCustomAttributes = "";
		$this->mfo_id->HrefValue = "";
		$this->mfo_id->TooltipValue = "";

		// mfo_sequence
		$this->mfo_sequence->LinkCustomAttributes = "";
		$this->mfo_sequence->HrefValue = "";
		$this->mfo_sequence->TooltipValue = "";

		// gaa_value
		$this->gaa_value->LinkCustomAttributes = "";
		$this->gaa_value->HrefValue = "";
		$this->gaa_value->TooltipValue = "";

		// mfo
		$this->mfo->LinkCustomAttributes = "";
		$this->mfo->HrefValue = "";
		$this->mfo->TooltipValue = "";

		// pi_no
		$this->pi_no->LinkCustomAttributes = "";
		$this->pi_no->HrefValue = "";
		$this->pi_no->TooltipValue = "";

		// pi_sub
		$this->pi_sub->LinkCustomAttributes = "";
		$this->pi_sub->HrefValue = "";
		$this->pi_sub->TooltipValue = "";

		// mfo_name_rep
		$this->mfo_name_rep->LinkCustomAttributes = "";
		$this->mfo_name_rep->HrefValue = "";
		$this->mfo_name_rep->TooltipValue = "";

		// mfo_name
		$this->mfo_name->LinkCustomAttributes = "";
		$this->mfo_name->HrefValue = "";
		$this->mfo_name->TooltipValue = "";

		// pi_question
		$this->pi_question->LinkCustomAttributes = "";
		$this->pi_question->HrefValue = "";
		$this->pi_question->TooltipValue = "";

		// denominator
		$this->denominator->LinkCustomAttributes = "";
		$this->denominator->HrefValue = "";
		$this->denominator->TooltipValue = "";

		// pi_type
		$this->pi_type->LinkCustomAttributes = "";
		$this->pi_type->HrefValue = "";
		$this->pi_type->TooltipValue = "";

		// expectations
		$this->expectations->LinkCustomAttributes = "";
		$this->expectations->HrefValue = "";
		$this->expectations->TooltipValue = "";

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
					$XmlDoc->AddField('mfo_id', $this->mfo_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_sequence', $this->mfo_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('gaa_value', $this->gaa_value->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo', $this->mfo->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_no', $this->pi_no->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_sub', $this->pi_sub->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_name_rep', $this->mfo_name_rep->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_name', $this->mfo_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_question', $this->pi_question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('denominator', $this->denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_type', $this->pi_type->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('expectations', $this->expectations->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('mfo_id', $this->mfo_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_sequence', $this->mfo_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('gaa_value', $this->gaa_value->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_name_rep', $this->mfo_name_rep->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_name', $this->mfo_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_question', $this->pi_question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('denominator', $this->denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_type', $this->pi_type->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('expectations', $this->expectations->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->mfo_id);
				$Doc->ExportCaption($this->mfo_sequence);
				$Doc->ExportCaption($this->gaa_value);
				$Doc->ExportCaption($this->mfo);
				$Doc->ExportCaption($this->pi_no);
				$Doc->ExportCaption($this->pi_sub);
				$Doc->ExportCaption($this->mfo_name_rep);
				$Doc->ExportCaption($this->mfo_name);
				$Doc->ExportCaption($this->pi_question);
				$Doc->ExportCaption($this->denominator);
				$Doc->ExportCaption($this->pi_type);
				$Doc->ExportCaption($this->expectations);
			} else {
				$Doc->ExportCaption($this->mfo_id);
				$Doc->ExportCaption($this->mfo_sequence);
				$Doc->ExportCaption($this->gaa_value);
				$Doc->ExportCaption($this->mfo_name_rep);
				$Doc->ExportCaption($this->mfo_name);
				$Doc->ExportCaption($this->pi_question);
				$Doc->ExportCaption($this->denominator);
				$Doc->ExportCaption($this->pi_type);
				$Doc->ExportCaption($this->expectations);
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
					$Doc->ExportField($this->mfo_id);
					$Doc->ExportField($this->mfo_sequence);
					$Doc->ExportField($this->gaa_value);
					$Doc->ExportField($this->mfo);
					$Doc->ExportField($this->pi_no);
					$Doc->ExportField($this->pi_sub);
					$Doc->ExportField($this->mfo_name_rep);
					$Doc->ExportField($this->mfo_name);
					$Doc->ExportField($this->pi_question);
					$Doc->ExportField($this->denominator);
					$Doc->ExportField($this->pi_type);
					$Doc->ExportField($this->expectations);
				} else {
					$Doc->ExportField($this->mfo_id);
					$Doc->ExportField($this->mfo_sequence);
					$Doc->ExportField($this->gaa_value);
					$Doc->ExportField($this->mfo_name_rep);
					$Doc->ExportField($this->mfo_name);
					$Doc->ExportField($this->pi_question);
					$Doc->ExportField($this->denominator);
					$Doc->ExportField($this->pi_type);
					$Doc->ExportField($this->expectations);
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
