<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "audittrailinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$audittrail_edit = new caudittrail_edit();
$Page =& $audittrail_edit;

// Page init
$audittrail_edit->Page_Init();

// Page main
$audittrail_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var audittrail_edit = new up_Page("audittrail_edit");

// page properties
audittrail_edit.PageID = "edit"; // page ID
audittrail_edit.FormID = "faudittrailedit"; // form ID
var UP_PAGE_ID = audittrail_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
audittrail_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_datetime"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($audittrail->datetime->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_datetime"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($audittrail->datetime->FldErrMsg()) ?>");

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
audittrail_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
audittrail_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
audittrail_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
audittrail_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $audittrail->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $audittrail->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $audittrail_edit->ShowPageHeader(); ?>
<?php
$audittrail_edit->ShowMessage();
?>
<form name="faudittrailedit" id="faudittrailedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return audittrail_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="audittrail">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($audittrail->id->Visible) { // id ?>
	<tr id="r_id"<?php echo $audittrail->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $audittrail->id->FldCaption() ?></td>
		<td<?php echo $audittrail->id->CellAttributes() ?>><span id="el_id">
<div<?php echo $audittrail->id->ViewAttributes() ?>><?php echo $audittrail->id->EditValue ?></div>
<input type="hidden" name="x_id" id="x_id" value="<?php echo up_HtmlEncode($audittrail->id->CurrentValue) ?>">
</span><?php echo $audittrail->id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($audittrail->datetime->Visible) { // datetime ?>
	<tr id="r_datetime"<?php echo $audittrail->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $audittrail->datetime->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $audittrail->datetime->CellAttributes() ?>><span id="el_datetime">
<input type="text" name="x_datetime" id="x_datetime" value="<?php echo $audittrail->datetime->EditValue ?>"<?php echo $audittrail->datetime->EditAttributes() ?>>
</span><?php echo $audittrail->datetime->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($audittrail->script->Visible) { // script ?>
	<tr id="r_script"<?php echo $audittrail->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $audittrail->script->FldCaption() ?></td>
		<td<?php echo $audittrail->script->CellAttributes() ?>><span id="el_script">
<input type="text" name="x_script" id="x_script" size="30" maxlength="80" value="<?php echo $audittrail->script->EditValue ?>"<?php echo $audittrail->script->EditAttributes() ?>>
</span><?php echo $audittrail->script->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($audittrail->user->Visible) { // user ?>
	<tr id="r_user"<?php echo $audittrail->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $audittrail->user->FldCaption() ?></td>
		<td<?php echo $audittrail->user->CellAttributes() ?>><span id="el_user">
<input type="text" name="x_user" id="x_user" size="30" maxlength="80" value="<?php echo $audittrail->user->EditValue ?>"<?php echo $audittrail->user->EditAttributes() ?>>
</span><?php echo $audittrail->user->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($audittrail->action->Visible) { // action ?>
	<tr id="r_action"<?php echo $audittrail->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $audittrail->action->FldCaption() ?></td>
		<td<?php echo $audittrail->action->CellAttributes() ?>><span id="el_action">
<input type="text" name="x_action" id="x_action" size="30" maxlength="80" value="<?php echo $audittrail->action->EditValue ?>"<?php echo $audittrail->action->EditAttributes() ?>>
</span><?php echo $audittrail->action->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($audittrail->ztable->Visible) { // table ?>
	<tr id="r_ztable"<?php echo $audittrail->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $audittrail->ztable->FldCaption() ?></td>
		<td<?php echo $audittrail->ztable->CellAttributes() ?>><span id="el_ztable">
<input type="text" name="x_ztable" id="x_ztable" size="30" maxlength="80" value="<?php echo $audittrail->ztable->EditValue ?>"<?php echo $audittrail->ztable->EditAttributes() ?>>
</span><?php echo $audittrail->ztable->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($audittrail->zfield->Visible) { // field ?>
	<tr id="r_zfield"<?php echo $audittrail->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $audittrail->zfield->FldCaption() ?></td>
		<td<?php echo $audittrail->zfield->CellAttributes() ?>><span id="el_zfield">
<input type="text" name="x_zfield" id="x_zfield" size="30" maxlength="80" value="<?php echo $audittrail->zfield->EditValue ?>"<?php echo $audittrail->zfield->EditAttributes() ?>>
</span><?php echo $audittrail->zfield->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($audittrail->keyvalue->Visible) { // keyvalue ?>
	<tr id="r_keyvalue"<?php echo $audittrail->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $audittrail->keyvalue->FldCaption() ?></td>
		<td<?php echo $audittrail->keyvalue->CellAttributes() ?>><span id="el_keyvalue">
<textarea name="x_keyvalue" id="x_keyvalue" cols="35" rows="4"<?php echo $audittrail->keyvalue->EditAttributes() ?>><?php echo $audittrail->keyvalue->EditValue ?></textarea>
</span><?php echo $audittrail->keyvalue->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($audittrail->oldvalue->Visible) { // oldvalue ?>
	<tr id="r_oldvalue"<?php echo $audittrail->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $audittrail->oldvalue->FldCaption() ?></td>
		<td<?php echo $audittrail->oldvalue->CellAttributes() ?>><span id="el_oldvalue">
<textarea name="x_oldvalue" id="x_oldvalue" cols="35" rows="4"<?php echo $audittrail->oldvalue->EditAttributes() ?>><?php echo $audittrail->oldvalue->EditValue ?></textarea>
</span><?php echo $audittrail->oldvalue->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($audittrail->newvalue->Visible) { // newvalue ?>
	<tr id="r_newvalue"<?php echo $audittrail->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $audittrail->newvalue->FldCaption() ?></td>
		<td<?php echo $audittrail->newvalue->CellAttributes() ?>><span id="el_newvalue">
<textarea name="x_newvalue" id="x_newvalue" cols="35" rows="4"<?php echo $audittrail->newvalue->EditAttributes() ?>><?php echo $audittrail->newvalue->EditValue ?></textarea>
</span><?php echo $audittrail->newvalue->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$audittrail_edit->ShowPageFooter();
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
$audittrail_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class caudittrail_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'audittrail';

	// Page object name
	var $PageObjName = 'audittrail_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $audittrail;
		if ($audittrail->UseTokenInUrl) $PageUrl .= "t=" . $audittrail->TableVar . "&"; // Add page token
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
		global $objForm, $audittrail;
		if ($audittrail->UseTokenInUrl) {
			if ($objForm)
				return ($audittrail->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($audittrail->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function caudittrail_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (audittrail)
		if (!isset($GLOBALS["audittrail"])) {
			$GLOBALS["audittrail"] = new caudittrail();
			$GLOBALS["Table"] =& $GLOBALS["audittrail"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'audittrail', TRUE);

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
		global $audittrail;

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
			$this->Page_Terminate("audittraillist.php");
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
		global $objForm, $Language, $gsFormError, $audittrail;

		// Load key from QueryString
		if (@$_GET["id"] <> "")
			$audittrail->id->setQueryStringValue($_GET["id"]);
		if (@$_POST["a_edit"] <> "") {
			$audittrail->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$audittrail->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$audittrail->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$audittrail->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($audittrail->id->CurrentValue == "")
			$this->Page_Terminate("audittraillist.php"); // Invalid key, return to list
		switch ($audittrail->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("audittraillist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$audittrail->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $audittrail->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$audittrail->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$audittrail->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$audittrail->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $audittrail;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $audittrail;
		if (!$audittrail->id->FldIsDetailKey)
			$audittrail->id->setFormValue($objForm->GetValue("x_id"));
		if (!$audittrail->datetime->FldIsDetailKey) {
			$audittrail->datetime->setFormValue($objForm->GetValue("x_datetime"));
			$audittrail->datetime->CurrentValue = up_UnFormatDateTime($audittrail->datetime->CurrentValue, 6);
		}
		if (!$audittrail->script->FldIsDetailKey) {
			$audittrail->script->setFormValue($objForm->GetValue("x_script"));
		}
		if (!$audittrail->user->FldIsDetailKey) {
			$audittrail->user->setFormValue($objForm->GetValue("x_user"));
		}
		if (!$audittrail->action->FldIsDetailKey) {
			$audittrail->action->setFormValue($objForm->GetValue("x_action"));
		}
		if (!$audittrail->ztable->FldIsDetailKey) {
			$audittrail->ztable->setFormValue($objForm->GetValue("x_ztable"));
		}
		if (!$audittrail->zfield->FldIsDetailKey) {
			$audittrail->zfield->setFormValue($objForm->GetValue("x_zfield"));
		}
		if (!$audittrail->keyvalue->FldIsDetailKey) {
			$audittrail->keyvalue->setFormValue($objForm->GetValue("x_keyvalue"));
		}
		if (!$audittrail->oldvalue->FldIsDetailKey) {
			$audittrail->oldvalue->setFormValue($objForm->GetValue("x_oldvalue"));
		}
		if (!$audittrail->newvalue->FldIsDetailKey) {
			$audittrail->newvalue->setFormValue($objForm->GetValue("x_newvalue"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $audittrail;
		$this->LoadRow();
		$audittrail->id->CurrentValue = $audittrail->id->FormValue;
		$audittrail->datetime->CurrentValue = $audittrail->datetime->FormValue;
		$audittrail->datetime->CurrentValue = up_UnFormatDateTime($audittrail->datetime->CurrentValue, 6);
		$audittrail->script->CurrentValue = $audittrail->script->FormValue;
		$audittrail->user->CurrentValue = $audittrail->user->FormValue;
		$audittrail->action->CurrentValue = $audittrail->action->FormValue;
		$audittrail->ztable->CurrentValue = $audittrail->ztable->FormValue;
		$audittrail->zfield->CurrentValue = $audittrail->zfield->FormValue;
		$audittrail->keyvalue->CurrentValue = $audittrail->keyvalue->FormValue;
		$audittrail->oldvalue->CurrentValue = $audittrail->oldvalue->FormValue;
		$audittrail->newvalue->CurrentValue = $audittrail->newvalue->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $audittrail;
		$sFilter = $audittrail->KeyFilter();

		// Call Row Selecting event
		$audittrail->Row_Selecting($sFilter);

		// Load SQL based on filter
		$audittrail->CurrentFilter = $sFilter;
		$sSql = $audittrail->SQL();
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
		global $conn, $audittrail;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$audittrail->Row_Selected($row);
		$audittrail->id->setDbValue($rs->fields('id'));
		$audittrail->datetime->setDbValue($rs->fields('datetime'));
		$audittrail->script->setDbValue($rs->fields('script'));
		$audittrail->user->setDbValue($rs->fields('user'));
		$audittrail->action->setDbValue($rs->fields('action'));
		$audittrail->ztable->setDbValue($rs->fields('table'));
		$audittrail->zfield->setDbValue($rs->fields('field'));
		$audittrail->keyvalue->setDbValue($rs->fields('keyvalue'));
		$audittrail->oldvalue->setDbValue($rs->fields('oldvalue'));
		$audittrail->newvalue->setDbValue($rs->fields('newvalue'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $audittrail;

		// Initialize URLs
		// Call Row_Rendering event

		$audittrail->Row_Rendering();

		// Common render codes for all row types
		// id
		// datetime
		// script
		// user
		// action
		// table
		// field
		// keyvalue
		// oldvalue
		// newvalue

		if ($audittrail->RowType == UP_ROWTYPE_VIEW) { // View row

			// id
			$audittrail->id->ViewValue = $audittrail->id->CurrentValue;
			$audittrail->id->ViewCustomAttributes = "";

			// datetime
			$audittrail->datetime->ViewValue = $audittrail->datetime->CurrentValue;
			$audittrail->datetime->ViewValue = up_FormatDateTime($audittrail->datetime->ViewValue, 6);
			$audittrail->datetime->ViewCustomAttributes = "";

			// script
			$audittrail->script->ViewValue = $audittrail->script->CurrentValue;
			$audittrail->script->ViewCustomAttributes = "";

			// user
			$audittrail->user->ViewValue = $audittrail->user->CurrentValue;
			$audittrail->user->ViewCustomAttributes = "";

			// action
			$audittrail->action->ViewValue = $audittrail->action->CurrentValue;
			$audittrail->action->ViewCustomAttributes = "";

			// table
			$audittrail->ztable->ViewValue = $audittrail->ztable->CurrentValue;
			$audittrail->ztable->ViewCustomAttributes = "";

			// field
			$audittrail->zfield->ViewValue = $audittrail->zfield->CurrentValue;
			$audittrail->zfield->ViewCustomAttributes = "";

			// keyvalue
			$audittrail->keyvalue->ViewValue = $audittrail->keyvalue->CurrentValue;
			$audittrail->keyvalue->ViewCustomAttributes = "";

			// oldvalue
			$audittrail->oldvalue->ViewValue = $audittrail->oldvalue->CurrentValue;
			$audittrail->oldvalue->ViewCustomAttributes = "";

			// newvalue
			$audittrail->newvalue->ViewValue = $audittrail->newvalue->CurrentValue;
			$audittrail->newvalue->ViewCustomAttributes = "";

			// id
			$audittrail->id->LinkCustomAttributes = "";
			$audittrail->id->HrefValue = "";
			$audittrail->id->TooltipValue = "";

			// datetime
			$audittrail->datetime->LinkCustomAttributes = "";
			$audittrail->datetime->HrefValue = "";
			$audittrail->datetime->TooltipValue = "";

			// script
			$audittrail->script->LinkCustomAttributes = "";
			$audittrail->script->HrefValue = "";
			$audittrail->script->TooltipValue = "";

			// user
			$audittrail->user->LinkCustomAttributes = "";
			$audittrail->user->HrefValue = "";
			$audittrail->user->TooltipValue = "";

			// action
			$audittrail->action->LinkCustomAttributes = "";
			$audittrail->action->HrefValue = "";
			$audittrail->action->TooltipValue = "";

			// table
			$audittrail->ztable->LinkCustomAttributes = "";
			$audittrail->ztable->HrefValue = "";
			$audittrail->ztable->TooltipValue = "";

			// field
			$audittrail->zfield->LinkCustomAttributes = "";
			$audittrail->zfield->HrefValue = "";
			$audittrail->zfield->TooltipValue = "";

			// keyvalue
			$audittrail->keyvalue->LinkCustomAttributes = "";
			$audittrail->keyvalue->HrefValue = "";
			$audittrail->keyvalue->TooltipValue = "";

			// oldvalue
			$audittrail->oldvalue->LinkCustomAttributes = "";
			$audittrail->oldvalue->HrefValue = "";
			$audittrail->oldvalue->TooltipValue = "";

			// newvalue
			$audittrail->newvalue->LinkCustomAttributes = "";
			$audittrail->newvalue->HrefValue = "";
			$audittrail->newvalue->TooltipValue = "";
		} elseif ($audittrail->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// id
			$audittrail->id->EditCustomAttributes = "";
			$audittrail->id->EditValue = $audittrail->id->CurrentValue;
			$audittrail->id->ViewCustomAttributes = "";

			// datetime
			$audittrail->datetime->EditCustomAttributes = "";
			$audittrail->datetime->EditValue = up_HtmlEncode(up_FormatDateTime($audittrail->datetime->CurrentValue, 6));

			// script
			$audittrail->script->EditCustomAttributes = "";
			$audittrail->script->EditValue = up_HtmlEncode($audittrail->script->CurrentValue);

			// user
			$audittrail->user->EditCustomAttributes = "";
			$audittrail->user->EditValue = up_HtmlEncode($audittrail->user->CurrentValue);

			// action
			$audittrail->action->EditCustomAttributes = "";
			$audittrail->action->EditValue = up_HtmlEncode($audittrail->action->CurrentValue);

			// table
			$audittrail->ztable->EditCustomAttributes = "";
			$audittrail->ztable->EditValue = up_HtmlEncode($audittrail->ztable->CurrentValue);

			// field
			$audittrail->zfield->EditCustomAttributes = "";
			$audittrail->zfield->EditValue = up_HtmlEncode($audittrail->zfield->CurrentValue);

			// keyvalue
			$audittrail->keyvalue->EditCustomAttributes = "";
			$audittrail->keyvalue->EditValue = up_HtmlEncode($audittrail->keyvalue->CurrentValue);

			// oldvalue
			$audittrail->oldvalue->EditCustomAttributes = "";
			$audittrail->oldvalue->EditValue = up_HtmlEncode($audittrail->oldvalue->CurrentValue);

			// newvalue
			$audittrail->newvalue->EditCustomAttributes = "";
			$audittrail->newvalue->EditValue = up_HtmlEncode($audittrail->newvalue->CurrentValue);

			// Edit refer script
			// id

			$audittrail->id->HrefValue = "";

			// datetime
			$audittrail->datetime->HrefValue = "";

			// script
			$audittrail->script->HrefValue = "";

			// user
			$audittrail->user->HrefValue = "";

			// action
			$audittrail->action->HrefValue = "";

			// table
			$audittrail->ztable->HrefValue = "";

			// field
			$audittrail->zfield->HrefValue = "";

			// keyvalue
			$audittrail->keyvalue->HrefValue = "";

			// oldvalue
			$audittrail->oldvalue->HrefValue = "";

			// newvalue
			$audittrail->newvalue->HrefValue = "";
		}
		if ($audittrail->RowType == UP_ROWTYPE_ADD ||
			$audittrail->RowType == UP_ROWTYPE_EDIT ||
			$audittrail->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$audittrail->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($audittrail->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$audittrail->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $audittrail;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($audittrail->datetime->FormValue) && $audittrail->datetime->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $audittrail->datetime->FldCaption());
		}
		if (!up_CheckUSDate($audittrail->datetime->FormValue)) {
			up_AddMessage($gsFormError, $audittrail->datetime->FldErrMsg());
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
		global $conn, $Security, $Language, $audittrail;
		$sFilter = $audittrail->KeyFilter();
		$audittrail->CurrentFilter = $sFilter;
		$sSql = $audittrail->SQL();
		$conn->raiseErrorFn = 'up_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// datetime
			$audittrail->datetime->SetDbValueDef($rsnew, up_UnFormatDateTime($audittrail->datetime->CurrentValue, 6), up_CurrentDate(), $audittrail->datetime->ReadOnly);

			// script
			$audittrail->script->SetDbValueDef($rsnew, $audittrail->script->CurrentValue, NULL, $audittrail->script->ReadOnly);

			// user
			$audittrail->user->SetDbValueDef($rsnew, $audittrail->user->CurrentValue, NULL, $audittrail->user->ReadOnly);

			// action
			$audittrail->action->SetDbValueDef($rsnew, $audittrail->action->CurrentValue, NULL, $audittrail->action->ReadOnly);

			// table
			$audittrail->ztable->SetDbValueDef($rsnew, $audittrail->ztable->CurrentValue, NULL, $audittrail->ztable->ReadOnly);

			// field
			$audittrail->zfield->SetDbValueDef($rsnew, $audittrail->zfield->CurrentValue, NULL, $audittrail->zfield->ReadOnly);

			// keyvalue
			$audittrail->keyvalue->SetDbValueDef($rsnew, $audittrail->keyvalue->CurrentValue, NULL, $audittrail->keyvalue->ReadOnly);

			// oldvalue
			$audittrail->oldvalue->SetDbValueDef($rsnew, $audittrail->oldvalue->CurrentValue, NULL, $audittrail->oldvalue->ReadOnly);

			// newvalue
			$audittrail->newvalue->SetDbValueDef($rsnew, $audittrail->newvalue->CurrentValue, NULL, $audittrail->newvalue->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $audittrail->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($audittrail->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($audittrail->CancelMessage <> "") {
					$this->setFailureMessage($audittrail->CancelMessage);
					$audittrail->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$audittrail->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'audittrail';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $audittrail;
		$table = 'audittrail';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['id'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($audittrail->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($audittrail->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($audittrail->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($audittrail->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
