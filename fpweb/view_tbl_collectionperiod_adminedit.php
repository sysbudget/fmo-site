<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "view_tbl_collectionperiod_admininfo.php" ?>
<?php include_once "tbl_uporgchart_unitinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "view_tbl_profile_admininfo.php" ?>
<?php include_once "view_tbl_profile_admingridcls.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$view_tbl_collectionperiod_admin_edit = new cview_tbl_collectionperiod_admin_edit();
$Page =& $view_tbl_collectionperiod_admin_edit;

// Page init
$view_tbl_collectionperiod_admin_edit->Page_Init();

// Page main
$view_tbl_collectionperiod_admin_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var view_tbl_collectionperiod_admin_edit = new up_Page("view_tbl_collectionperiod_admin_edit");

// page properties
view_tbl_collectionperiod_admin_edit.PageID = "edit"; // page ID
view_tbl_collectionperiod_admin_edit.FormID = "fview_tbl_collectionperiod_adminedit"; // form ID
var UP_PAGE_ID = view_tbl_collectionperiod_admin_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
view_tbl_collectionperiod_admin_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_collectionPeriod_ay"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_collectionperiod_admin->collectionPeriod_ay->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_collectionPeriod_sem"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_collectionperiod_admin->collectionPeriod_sem->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_collectionPeriod_cutOffDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FldErrMsg()) ?>");

		// Set up row object
		var row = {};
		row["index"] = infix;
		for (var j = 0; j < fobj.elements.length; j++) {
			var el = fobj.elements[j];
			var len = infix.length + 2;
			if (el.name.substr(0, len) == "x" + infix + "_") {
				var elname = "x_" + el.name.substr(len);
				if (upLang.isObject(row[elname])) { // already exists
					if (upLang.isArray(row[elname])) {
						row[elname][row[elname].length] = el; // add to array
					} else {
						row[elname] = [row[elname], el]; // convert to array
					}
				} else {
					row[elname] = el;
				}
			}
		}
		fobj.row = row;

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}

	// Process detail page
	var detailpage = (fobj.detailpage) ? fobj.detailpage.value : "";
	if (detailpage != "") {
		return eval(detailpage+".ValidateForm(fobj)");
	}
	return true;
}

// extend page with Form_CustomValidate function
view_tbl_collectionperiod_admin_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
view_tbl_collectionperiod_admin_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
view_tbl_collectionperiod_admin_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
view_tbl_collectionperiod_admin_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var up_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
//-->

</script>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $view_tbl_collectionperiod_admin->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $view_tbl_collectionperiod_admin->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $view_tbl_collectionperiod_admin_edit->ShowPageHeader(); ?>
<?php
$view_tbl_collectionperiod_admin_edit->ShowMessage();
?>
<form name="fview_tbl_collectionperiod_adminedit" id="fview_tbl_collectionperiod_adminedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return view_tbl_collectionperiod_admin_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="view_tbl_collectionperiod_admin">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_ay->Visible) { // collectionPeriod_ay ?>
	<tr id="r_collectionPeriod_ay"<?php echo $view_tbl_collectionperiod_admin->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->FldCaption() ?></td>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->CellAttributes() ?>><span id="el_collectionPeriod_ay">
<input type="text" name="x_collectionPeriod_ay" id="x_collectionPeriod_ay" size="30" value="<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->EditValue ?>"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->EditAttributes() ?>>
</span><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_sem->Visible) { // collectionPeriod_sem ?>
	<tr id="r_collectionPeriod_sem"<?php echo $view_tbl_collectionperiod_admin->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->FldCaption() ?></td>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->CellAttributes() ?>><span id="el_collectionPeriod_sem">
<input type="text" name="x_collectionPeriod_sem" id="x_collectionPeriod_sem" size="30" value="<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->EditValue ?>"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->EditAttributes() ?>>
</span><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
	<tr id="r_collectionPeriod_cutOffDate"<?php echo $view_tbl_collectionperiod_admin->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FldCaption() ?></td>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CellAttributes() ?>><span id="el_collectionPeriod_cutOffDate">
<input type="text" name="x_collectionPeriod_cutOffDate" id="x_collectionPeriod_cutOffDate" value="<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->EditValue ?>"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->EditAttributes() ?>>
</span><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_status->Visible) { // collectionPeriod_status ?>
	<tr id="r_collectionPeriod_status"<?php echo $view_tbl_collectionperiod_admin->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->FldCaption() ?></td>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->CellAttributes() ?>><span id="el_collectionPeriod_status">
<div id="tp_x_collectionPeriod_status" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_collectionPeriod_status" id="x_collectionPeriod_status" value="{value}"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->EditAttributes() ?>></label></div>
<div id="dsl_x_collectionPeriod_status" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $view_tbl_collectionperiod_admin->collectionPeriod_status->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_collectionPeriod_status" id="x_collectionPeriod_status" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_collectionPeriod_ID" id="x_collectionPeriod_ID" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_ID->CurrentValue) ?>">
<p>
<?php if ($view_tbl_collectionperiod_admin->getCurrentDetailTable() == "view_tbl_profile_admin" && $view_tbl_profile_admin->DetailEdit) { ?>
<br>
<?php include_once "view_tbl_profile_admingrid.php" ?>
<br>
<?php } ?>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$view_tbl_collectionperiod_admin_edit->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include_once "footer.php" ?>
<?php
$view_tbl_collectionperiod_admin_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cview_tbl_collectionperiod_admin_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'view_tbl_collectionperiod_admin';

	// Page object name
	var $PageObjName = 'view_tbl_collectionperiod_admin_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $view_tbl_collectionperiod_admin;
		if ($view_tbl_collectionperiod_admin->UseTokenInUrl) $PageUrl .= "t=" . $view_tbl_collectionperiod_admin->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Message
	function getMessage() {
		return @$_SESSION[UP_SESSION_MESSAGE];
	}

	function setMessage($v) {
		up_AddMessage($_SESSION[UP_SESSION_MESSAGE], $v);
	}

	function getFailureMessage() {
		return @$_SESSION[UP_SESSION_FAILURE_MESSAGE];
	}

	function setFailureMessage($v) {
		up_AddMessage($_SESSION[UP_SESSION_FAILURE_MESSAGE], $v);
	}

	function getSuccessMessage() {
		return @$_SESSION[UP_SESSION_SUCCESS_MESSAGE];
	}

	function setSuccessMessage($v) {
		up_AddMessage($_SESSION[UP_SESSION_SUCCESS_MESSAGE], $v);
	}

	// Show message
	function ShowMessage() {
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage, "");
		if ($sMessage <> "") { // Message in Session, display
			echo "<p class=\"upMessage\">" . $sMessage . "</p>";
			$_SESSION[UP_SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$sSuccessMessage = $this->getSuccessMessage();
		$this->Message_Showing($sSuccessMessage, "success");
		if ($sSuccessMessage <> "") { // Message in Session, display
			echo "<p class=\"upSuccessMessage\">" . $sSuccessMessage . "</p>";
			$_SESSION[UP_SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$sErrorMessage = $this->getFailureMessage();
		$this->Message_Showing($sErrorMessage, "failure");
		if ($sErrorMessage <> "") { // Message in Session, display
			echo "<p class=\"upErrorMessage\">" . $sErrorMessage . "</p>";
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
	}
	var $PageHeader;
	var $PageFooter;

	// Show Page Header
	function ShowPageHeader() {
		$sHeader = $this->PageHeader;
		$this->Page_DataRendering($sHeader);
		if ($sHeader <> "") { // Header exists, display
			echo "<p class=\"upbudgetofficeclass\">" . $sHeader . "</p>";
		}
	}

	// Show Page Footer
	function ShowPageFooter() {
		$sFooter = $this->PageFooter;
		$this->Page_DataRendered($sFooter);
		if ($sFooter <> "") { // Fotoer exists, display
			echo "<p class=\"upbudgetofficeclass\">" . $sFooter . "</p>";
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm, $view_tbl_collectionperiod_admin;
		if ($view_tbl_collectionperiod_admin->UseTokenInUrl) {
			if ($objForm)
				return ($view_tbl_collectionperiod_admin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($view_tbl_collectionperiod_admin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cview_tbl_collectionperiod_admin_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (view_tbl_collectionperiod_admin)
		if (!isset($GLOBALS["view_tbl_collectionperiod_admin"])) {
			$GLOBALS["view_tbl_collectionperiod_admin"] = new cview_tbl_collectionperiod_admin();
			$GLOBALS["Table"] =& $GLOBALS["view_tbl_collectionperiod_admin"];
		}

		// Table object (tbl_uporgchart_unit)
		if (!isset($GLOBALS['tbl_uporgchart_unit'])) $GLOBALS['tbl_uporgchart_unit'] = new ctbl_uporgchart_unit();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Table object (view_tbl_profile_admin)
		if (!isset($GLOBALS['view_tbl_profile_admin'])) $GLOBALS['view_tbl_profile_admin'] = new cview_tbl_profile_admin();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'view_tbl_collectionperiod_admin', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"])) $GLOBALS["gTimer"] = new cTimer();

		// Open connection
		if (!isset($conn)) $conn = up_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		global $view_tbl_collectionperiod_admin;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->TableName);
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanEdit()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("view_tbl_collectionperiod_adminlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Create form object
		$objForm = new cFormObj();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		$this->Page_Redirecting($url);

		 // Close connection
		$conn->Close();

		// Go to URL if specified
		if ($url <> "") {
			if (!UP_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
		exit();
	}
	var $DbMasterFilter;
	var $DbDetailFilter;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $view_tbl_collectionperiod_admin;

		// Load key from QueryString
		if (@$_GET["collectionPeriod_ID"] <> "")
			$view_tbl_collectionperiod_admin->collectionPeriod_ID->setQueryStringValue($_GET["collectionPeriod_ID"]);

		// Set up master detail parameters
		$this->SetUpMasterParms();
		if (@$_POST["a_edit"] <> "") {
			$view_tbl_collectionperiod_admin->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Set up detail parameters
			$this->SetUpDetailParms();

			// Validate form
			if (!$this->ValidateForm()) {
				$view_tbl_collectionperiod_admin->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$view_tbl_collectionperiod_admin->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$view_tbl_collectionperiod_admin->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($view_tbl_collectionperiod_admin->collectionPeriod_ID->CurrentValue == "")
			$this->Page_Terminate("view_tbl_collectionperiod_adminlist.php"); // Invalid key, return to list

		// Set up detail parameters
		$this->SetUpDetailParms();
		switch ($view_tbl_collectionperiod_admin->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("view_tbl_collectionperiod_adminlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$view_tbl_collectionperiod_admin->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					if ($view_tbl_collectionperiod_admin->getCurrentDetailTable() <> "") // Master/detail edit
						$sReturnUrl = $view_tbl_collectionperiod_admin->getDetailUrl();
					else
						$sReturnUrl = $view_tbl_collectionperiod_admin->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$view_tbl_collectionperiod_admin->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$view_tbl_collectionperiod_admin->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$view_tbl_collectionperiod_admin->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $view_tbl_collectionperiod_admin;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $view_tbl_collectionperiod_admin;
		if (!$view_tbl_collectionperiod_admin->collectionPeriod_ay->FldIsDetailKey) {
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->setFormValue($objForm->GetValue("x_collectionPeriod_ay"));
		}
		if (!$view_tbl_collectionperiod_admin->collectionPeriod_sem->FldIsDetailKey) {
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->setFormValue($objForm->GetValue("x_collectionPeriod_sem"));
		}
		if (!$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FldIsDetailKey) {
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->setFormValue($objForm->GetValue("x_collectionPeriod_cutOffDate"));
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CurrentValue = up_UnFormatDateTime($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CurrentValue, 6);
		}
		if (!$view_tbl_collectionperiod_admin->collectionPeriod_status->FldIsDetailKey) {
			$view_tbl_collectionperiod_admin->collectionPeriod_status->setFormValue($objForm->GetValue("x_collectionPeriod_status"));
		}
		if (!$view_tbl_collectionperiod_admin->collectionPeriod_ID->FldIsDetailKey)
			$view_tbl_collectionperiod_admin->collectionPeriod_ID->setFormValue($objForm->GetValue("x_collectionPeriod_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $view_tbl_collectionperiod_admin;
		$this->LoadRow();
		$view_tbl_collectionperiod_admin->collectionPeriod_ID->CurrentValue = $view_tbl_collectionperiod_admin->collectionPeriod_ID->FormValue;
		$view_tbl_collectionperiod_admin->collectionPeriod_ay->CurrentValue = $view_tbl_collectionperiod_admin->collectionPeriod_ay->FormValue;
		$view_tbl_collectionperiod_admin->collectionPeriod_sem->CurrentValue = $view_tbl_collectionperiod_admin->collectionPeriod_sem->FormValue;
		$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CurrentValue = $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FormValue;
		$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CurrentValue = up_UnFormatDateTime($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CurrentValue, 6);
		$view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue = $view_tbl_collectionperiod_admin->collectionPeriod_status->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $view_tbl_collectionperiod_admin;
		$sFilter = $view_tbl_collectionperiod_admin->KeyFilter();

		// Call Row Selecting event
		$view_tbl_collectionperiod_admin->Row_Selecting($sFilter);

		// Load SQL based on filter
		$view_tbl_collectionperiod_admin->CurrentFilter = $sFilter;
		$sSql = $view_tbl_collectionperiod_admin->SQL();
		$res = FALSE;
		$rs = up_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $view_tbl_collectionperiod_admin;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$view_tbl_collectionperiod_admin->Row_Selected($row);
		$view_tbl_collectionperiod_admin->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$view_tbl_collectionperiod_admin->cu->setDbValue($rs->fields('cu'));
		$view_tbl_collectionperiod_admin->unitID->setDbValue($rs->fields('unitID'));
		$view_tbl_collectionperiod_admin->academicYear_ID->setDbValue($rs->fields('academicYear_ID'));
		$view_tbl_collectionperiod_admin->collectionPeriod_ay->setDbValue($rs->fields('collectionPeriod_ay'));
		$view_tbl_collectionperiod_admin->collectionPeriod_sem->setDbValue($rs->fields('collectionPeriod_sem'));
		$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$view_tbl_collectionperiod_admin->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $view_tbl_collectionperiod_admin;

		// Initialize URLs
		// Call Row_Rendering event

		$view_tbl_collectionperiod_admin->Row_Rendering();

		// Common render codes for all row types
		// collectionPeriod_ID
		// cu
		// unitID
		// academicYear_ID
		// collectionPeriod_ay
		// collectionPeriod_sem
		// collectionPeriod_cutOffDate
		// collectionPeriod_status

		if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_VIEW) { // View row

			// collectionPeriod_ay
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_ay->CurrentValue;
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->ViewCustomAttributes = "";

			// collectionPeriod_sem
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_sem->CurrentValue;
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->ViewCustomAttributes = "";

			// collectionPeriod_cutOffDate
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CurrentValue;
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewValue = up_FormatDateTime($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewValue, 6);
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewCustomAttributes = "";

			// collectionPeriod_status
			if (strval($view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue) <> "") {
				switch ($view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue) {
					case "1":
						$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(1) <> "" ? $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(1) : $view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue;
						break;
					case "2":
						$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(2) <> "" ? $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(2) : $view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue;
						break;
					default:
						$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue;
				}
			} else {
				$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue = NULL;
			}
			$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewCustomAttributes = "";

			// collectionPeriod_ay
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->LinkCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->HrefValue = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->TooltipValue = "";

			// collectionPeriod_sem
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->LinkCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->HrefValue = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->TooltipValue = "";

			// collectionPeriod_cutOffDate
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->LinkCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->HrefValue = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->TooltipValue = "";

			// collectionPeriod_status
			$view_tbl_collectionperiod_admin->collectionPeriod_status->LinkCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_status->HrefValue = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_status->TooltipValue = "";
		} elseif ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// collectionPeriod_ay
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->EditCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->EditValue = up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_ay->CurrentValue);

			// collectionPeriod_sem
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->EditCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->EditValue = up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_sem->CurrentValue);

			// collectionPeriod_cutOffDate
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->EditCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->EditValue = up_HtmlEncode(up_FormatDateTime($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CurrentValue, 6));

			// collectionPeriod_status
			$view_tbl_collectionperiod_admin->collectionPeriod_status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(1) <> "" ? $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(1) : "1");
			$arwrk[] = array("2", $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(2) <> "" ? $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(2) : "2");
			$view_tbl_collectionperiod_admin->collectionPeriod_status->EditValue = $arwrk;

			// Edit refer script
			// collectionPeriod_ay

			$view_tbl_collectionperiod_admin->collectionPeriod_ay->HrefValue = "";

			// collectionPeriod_sem
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->HrefValue = "";

			// collectionPeriod_cutOffDate
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->HrefValue = "";

			// collectionPeriod_status
			$view_tbl_collectionperiod_admin->collectionPeriod_status->HrefValue = "";
		}
		if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_ADD ||
			$view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_EDIT ||
			$view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$view_tbl_collectionperiod_admin->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($view_tbl_collectionperiod_admin->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$view_tbl_collectionperiod_admin->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $view_tbl_collectionperiod_admin;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($view_tbl_collectionperiod_admin->collectionPeriod_ay->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_collectionperiod_admin->collectionPeriod_ay->FldErrMsg());
		}
		if (!up_CheckInteger($view_tbl_collectionperiod_admin->collectionPeriod_sem->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_collectionperiod_admin->collectionPeriod_sem->FldErrMsg());
		}
		if (!up_CheckUSDate($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FormValue)) {
			up_AddMessage($gsFormError, $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FldErrMsg());
		}

		// Validate detail grid
		if ($view_tbl_collectionperiod_admin->getCurrentDetailTable() == "view_tbl_profile_admin" && $GLOBALS["view_tbl_profile_admin"]->DetailEdit) {
			$view_tbl_profile_admin_grid = new cview_tbl_profile_admin_grid(); // get detail page object
			$view_tbl_profile_admin_grid->ValidateGridForm();
			$view_tbl_profile_admin_grid = NULL;
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			up_AddMessage($gsFormError, $sFormCustomError);
		}
		return $ValidateForm;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $view_tbl_collectionperiod_admin;
		$sFilter = $view_tbl_collectionperiod_admin->KeyFilter();
		$view_tbl_collectionperiod_admin->CurrentFilter = $sFilter;
		$sSql = $view_tbl_collectionperiod_admin->SQL();
		$conn->raiseErrorFn = 'up_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Begin transaction
			if ($view_tbl_collectionperiod_admin->getCurrentDetailTable() <> "")
				$conn->BeginTrans();

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// collectionPeriod_ay
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->SetDbValueDef($rsnew, $view_tbl_collectionperiod_admin->collectionPeriod_ay->CurrentValue, NULL, $view_tbl_collectionperiod_admin->collectionPeriod_ay->ReadOnly);

			// collectionPeriod_sem
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->SetDbValueDef($rsnew, $view_tbl_collectionperiod_admin->collectionPeriod_sem->CurrentValue, NULL, $view_tbl_collectionperiod_admin->collectionPeriod_sem->ReadOnly);

			// collectionPeriod_cutOffDate
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->SetDbValueDef($rsnew, up_UnFormatDateTime($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CurrentValue, 6), NULL, $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ReadOnly);

			// collectionPeriod_status
			$view_tbl_collectionperiod_admin->collectionPeriod_status->SetDbValueDef($rsnew, $view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue, NULL, $view_tbl_collectionperiod_admin->collectionPeriod_status->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $view_tbl_collectionperiod_admin->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($view_tbl_collectionperiod_admin->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';

				// Update detail records
				if ($EditRow) {
					if ($view_tbl_collectionperiod_admin->getCurrentDetailTable() == "view_tbl_profile_admin" && $GLOBALS["view_tbl_profile_admin"]->DetailEdit) {
						$view_tbl_profile_admin_grid = new cview_tbl_profile_admin_grid(); // get detail page object
						$EditRow = $view_tbl_profile_admin_grid->GridUpdate();
						$view_tbl_profile_admin_grid = NULL;
					}
				}

				// Commit/Rollback transaction
				if ($view_tbl_collectionperiod_admin->getCurrentDetailTable() <> "") {
					if ($EditRow) {
						$conn->CommitTrans(); // Commit transaction
					} else {
						$conn->RollbackTrans(); // Rollback transaction
					}
				}
			} else {
				if ($view_tbl_collectionperiod_admin->CancelMessage <> "") {
					$this->setFailureMessage($view_tbl_collectionperiod_admin->CancelMessage);
					$view_tbl_collectionperiod_admin->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$view_tbl_collectionperiod_admin->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $view_tbl_collectionperiod_admin;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "tbl_uporgchart_unit") {
				$bValidMaster = TRUE;
				if (@$_GET["unitID"] <> "") {
					$GLOBALS["tbl_uporgchart_unit"]->unitID->setQueryStringValue($_GET["unitID"]);
					$view_tbl_collectionperiod_admin->unitID->setQueryStringValue($GLOBALS["tbl_uporgchart_unit"]->unitID->QueryStringValue);
					$view_tbl_collectionperiod_admin->unitID->setSessionValue($view_tbl_collectionperiod_admin->unitID->QueryStringValue);
					if (!is_numeric($GLOBALS["tbl_uporgchart_unit"]->unitID->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$view_tbl_collectionperiod_admin->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$view_tbl_collectionperiod_admin->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "tbl_uporgchart_unit") {
				if ($view_tbl_collectionperiod_admin->unitID->QueryStringValue == "") $view_tbl_collectionperiod_admin->unitID->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $view_tbl_collectionperiod_admin->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $view_tbl_collectionperiod_admin->getDetailFilter(); // Get detail filter
	}

	// Set up detail parms based on QueryString
	function SetUpDetailParms() {
		global $view_tbl_collectionperiod_admin;
		$bValidDetail = FALSE;

		// Get the keys for master table
		if (isset($_GET[UP_TABLE_SHOW_DETAIL])) {
			$sDetailTblVar = $_GET[UP_TABLE_SHOW_DETAIL];
			$view_tbl_collectionperiod_admin->setCurrentDetailTable($sDetailTblVar);
		} else {
			$sDetailTblVar = $view_tbl_collectionperiod_admin->getCurrentDetailTable();
		}
		if ($sDetailTblVar <> "") {
			if ($sDetailTblVar == "view_tbl_profile_admin") {
				if (!isset($GLOBALS["view_tbl_profile_admin"]))
					$GLOBALS["view_tbl_profile_admin"] = new cview_tbl_profile_admin;
				if ($GLOBALS["view_tbl_profile_admin"]->DetailEdit) {
					$GLOBALS["view_tbl_profile_admin"]->CurrentMode = "edit";
					$GLOBALS["view_tbl_profile_admin"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["view_tbl_profile_admin"]->setCurrentMasterTable($view_tbl_collectionperiod_admin->TableVar);
					$GLOBALS["view_tbl_profile_admin"]->setStartRecordNumber(1);
					$GLOBALS["view_tbl_profile_admin"]->collectionPeriod_ID->FldIsDetailKey = TRUE;
					$GLOBALS["view_tbl_profile_admin"]->collectionPeriod_ID->CurrentValue = $view_tbl_collectionperiod_admin->collectionPeriod_ID->CurrentValue;
					$GLOBALS["view_tbl_profile_admin"]->collectionPeriod_ID->setSessionValue($GLOBALS["view_tbl_profile_admin"]->collectionPeriod_ID->CurrentValue);
				}
			}
		}
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'view_tbl_collectionperiod_admin';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $view_tbl_collectionperiod_admin;
		$table = 'view_tbl_collectionperiod_admin';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['collectionPeriod_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($view_tbl_collectionperiod_admin->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($view_tbl_collectionperiod_admin->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($view_tbl_collectionperiod_admin->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($view_tbl_collectionperiod_admin->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
						$oldvalue = "[XML]";
						$newvalue = "[XML]";
					} else {
						$oldvalue = $rsold[$fldname];
						$newvalue = $rsnew[$fldname];
					}
					up_WriteAuditTrail("log", $dt, $id, $usr, "U", $table, $fldname, $key, $oldvalue, $newvalue);
				}
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'
	function Message_Showing(&$msg, $type) {

		// Example:
		//if ($type == 'success') $msg = "your success message";

	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
