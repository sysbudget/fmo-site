<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_disciplinechedcodes_minorinfo.php" ?>
<?php include_once "ref_disciplinechedcodes_majorinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_disciplinechedcodes_minor_edit = new cref_disciplinechedcodes_minor_edit();
$Page =& $ref_disciplinechedcodes_minor_edit;

// Page init
$ref_disciplinechedcodes_minor_edit->Page_Init();

// Page main
$ref_disciplinechedcodes_minor_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_disciplinechedcodes_minor_edit = new up_Page("ref_disciplinechedcodes_minor_edit");

// page properties
ref_disciplinechedcodes_minor_edit.PageID = "edit"; // page ID
ref_disciplinechedcodes_minor_edit.FormID = "fref_disciplinechedcodes_minoredit"; // form ID
var UP_PAGE_ID = ref_disciplinechedcodes_minor_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
ref_disciplinechedcodes_minor_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_disCHED_disciplineSpecific_id"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_disCHED_disciplineSpecific_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_disCHED_disciplineSpecific_code"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_disCHED_disciplineSpecific_academicUse"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_disCHED_disciplineSpecific_academicUse"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldErrMsg()) ?>");

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
ref_disciplinechedcodes_minor_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_disciplinechedcodes_minor_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_disciplinechedcodes_minor_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_disciplinechedcodes_minor_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_disciplinechedcodes_minor->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_disciplinechedcodes_minor->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_disciplinechedcodes_minor_edit->ShowPageHeader(); ?>
<?php
$ref_disciplinechedcodes_minor_edit->ShowMessage();
?>
<form name="fref_disciplinechedcodes_minoredit" id="fref_disciplinechedcodes_minoredit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return ref_disciplinechedcodes_minor_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="ref_disciplinechedcodes_minor">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->Visible) { // disCHED_disciplineSpecific_id ?>
	<tr id="r_disCHED_disciplineSpecific_id"<?php echo $ref_disciplinechedcodes_minor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CellAttributes() ?>><span id="el_disCHED_disciplineSpecific_id">
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->EditValue ?></div>
<input type="hidden" name="x_disCHED_disciplineSpecific_id" id="x_disCHED_disciplineSpecific_id" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue) ?>">
</span><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->Visible) { // disCHED_disciplineSpecific_code ?>
	<tr id="r_disCHED_disciplineSpecific_code"<?php echo $ref_disciplinechedcodes_minor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FldCaption() ?></td>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CellAttributes() ?>><span id="el_disCHED_disciplineSpecific_code">
<input type="text" name="x_disCHED_disciplineSpecific_code" id="x_disCHED_disciplineSpecific_code" size="30" maxlength="255" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditAttributes() ?>>
</span><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->Visible) { // disCHED_disciplineSpecific_name ?>
	<tr id="r_disCHED_disciplineSpecific_name"<?php echo $ref_disciplinechedcodes_minor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->FldCaption() ?></td>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CellAttributes() ?>><span id="el_disCHED_disciplineSpecific_name">
<input type="text" name="x_disCHED_disciplineSpecific_name" id="x_disCHED_disciplineSpecific_name" size="30" maxlength="255" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditAttributes() ?>>
</span><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->Visible) { // disCHED_discipline_code ?>
	<tr id="r_disCHED_discipline_code"<?php echo $ref_disciplinechedcodes_minor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->FldCaption() ?></td>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->CellAttributes() ?>><span id="el_disCHED_discipline_code">
<?php if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->getSessionValue() <> "") { ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewValue ?></div>
<input type="hidden" id="x_disCHED_discipline_code" name="x_disCHED_discipline_code" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue) ?>">
<?php } else { ?>
<input type="text" name="x_disCHED_discipline_code" id="x_disCHED_discipline_code" size="30" maxlength="255" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->EditAttributes() ?>>
<?php } ?>
</span><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->Visible) { // disCHED_disciplineSpecific_academicUse ?>
	<tr id="r_disCHED_disciplineSpecific_academicUse"<?php echo $ref_disciplinechedcodes_minor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CellAttributes() ?>><span id="el_disCHED_disciplineSpecific_academicUse">
<input type="text" name="x_disCHED_disciplineSpecific_academicUse" id="x_disCHED_disciplineSpecific_academicUse" size="30" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditAttributes() ?>>
</span><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$ref_disciplinechedcodes_minor_edit->ShowPageFooter();
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
$ref_disciplinechedcodes_minor_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_disciplinechedcodes_minor_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'ref_disciplinechedcodes_minor';

	// Page object name
	var $PageObjName = 'ref_disciplinechedcodes_minor_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_disciplinechedcodes_minor;
		if ($ref_disciplinechedcodes_minor->UseTokenInUrl) $PageUrl .= "t=" . $ref_disciplinechedcodes_minor->TableVar . "&"; // Add page token
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
		global $objForm, $ref_disciplinechedcodes_minor;
		if ($ref_disciplinechedcodes_minor->UseTokenInUrl) {
			if ($objForm)
				return ($ref_disciplinechedcodes_minor->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_disciplinechedcodes_minor->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_disciplinechedcodes_minor_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_disciplinechedcodes_minor)
		if (!isset($GLOBALS["ref_disciplinechedcodes_minor"])) {
			$GLOBALS["ref_disciplinechedcodes_minor"] = new cref_disciplinechedcodes_minor();
			$GLOBALS["Table"] =& $GLOBALS["ref_disciplinechedcodes_minor"];
		}

		// Table object (ref_disciplinechedcodes_major)
		if (!isset($GLOBALS['ref_disciplinechedcodes_major'])) $GLOBALS['ref_disciplinechedcodes_major'] = new cref_disciplinechedcodes_major();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_disciplinechedcodes_minor', TRUE);

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
		global $ref_disciplinechedcodes_minor;

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
			$this->Page_Terminate("ref_disciplinechedcodes_minorlist.php");
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
		global $objForm, $Language, $gsFormError, $ref_disciplinechedcodes_minor;

		// Load key from QueryString
		if (@$_GET["disCHED_disciplineSpecific_id"] <> "")
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->setQueryStringValue($_GET["disCHED_disciplineSpecific_id"]);

		// Set up master detail parameters
		$this->SetUpMasterParms();
		if (@$_POST["a_edit"] <> "") {
			$ref_disciplinechedcodes_minor->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$ref_disciplinechedcodes_minor->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$ref_disciplinechedcodes_minor->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$ref_disciplinechedcodes_minor->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue == "")
			$this->Page_Terminate("ref_disciplinechedcodes_minorlist.php"); // Invalid key, return to list
		switch ($ref_disciplinechedcodes_minor->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("ref_disciplinechedcodes_minorlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$ref_disciplinechedcodes_minor->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $ref_disciplinechedcodes_minor->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$ref_disciplinechedcodes_minor->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$ref_disciplinechedcodes_minor->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$ref_disciplinechedcodes_minor->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $ref_disciplinechedcodes_minor;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $ref_disciplinechedcodes_minor;
		if (!$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldIsDetailKey) {
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->setFormValue($objForm->GetValue("x_disCHED_disciplineSpecific_id"));
		}
		if (!$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FldIsDetailKey) {
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->setFormValue($objForm->GetValue("x_disCHED_disciplineSpecific_code"));
		}
		if (!$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->FldIsDetailKey) {
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->setFormValue($objForm->GetValue("x_disCHED_disciplineSpecific_name"));
		}
		if (!$ref_disciplinechedcodes_minor->disCHED_discipline_code->FldIsDetailKey) {
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->setFormValue($objForm->GetValue("x_disCHED_discipline_code"));
		}
		if (!$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldIsDetailKey) {
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->setFormValue($objForm->GetValue("x_disCHED_disciplineSpecific_academicUse"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $ref_disciplinechedcodes_minor;
		$this->LoadRow();
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FormValue;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FormValue;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->FormValue;
		$ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->FormValue;
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_disciplinechedcodes_minor;
		$sFilter = $ref_disciplinechedcodes_minor->KeyFilter();

		// Call Row Selecting event
		$ref_disciplinechedcodes_minor->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_disciplinechedcodes_minor->CurrentFilter = $sFilter;
		$sSql = $ref_disciplinechedcodes_minor->SQL();
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
		global $conn, $ref_disciplinechedcodes_minor;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_disciplinechedcodes_minor->Row_Selected($row);
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->setDbValue($rs->fields('disCHED_disciplineSpecific_id'));
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->setDbValue($rs->fields('disCHED_disciplineSpecific_code'));
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->setDbValue($rs->fields('disCHED_disciplineSpecific_name'));
		$ref_disciplinechedcodes_minor->disCHED_discipline_code->setDbValue($rs->fields('disCHED_discipline_code'));
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->setDbValue($rs->fields('disCHED_disciplineSpecific_academicUse'));
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_nameList->setDbValue($rs->fields('disCHED_disciplineSpecific_nameList'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_disciplinechedcodes_minor;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_disciplinechedcodes_minor->Row_Rendering();

		// Common render codes for all row types
		// disCHED_disciplineSpecific_id
		// disCHED_disciplineSpecific_code
		// disCHED_disciplineSpecific_name
		// disCHED_discipline_code
		// disCHED_disciplineSpecific_academicUse
		// disCHED_disciplineSpecific_nameList

		if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_VIEW) { // View row

			// disCHED_disciplineSpecific_id
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_code
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ViewValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ViewValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ViewCustomAttributes = "";

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ViewValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_id
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->TooltipValue = "";

			// disCHED_disciplineSpecific_code
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->TooltipValue = "";

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->TooltipValue = "";

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->TooltipValue = "";

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->TooltipValue = "";
		} elseif ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// disCHED_disciplineSpecific_id
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->EditCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->EditValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_code
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue);

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue);

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->EditCustomAttributes = "";
			if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->getSessionValue() <> "") {
				$ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->getSessionValue();
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewCustomAttributes = "";
			} else {
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue);
			}

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditValue = up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue);

			// Edit refer script
			// disCHED_disciplineSpecific_id

			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->HrefValue = "";

			// disCHED_disciplineSpecific_code
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->HrefValue = "";

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->HrefValue = "";

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->HrefValue = "";

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->HrefValue = "";
		}
		if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_ADD ||
			$ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT ||
			$ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$ref_disciplinechedcodes_minor->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($ref_disciplinechedcodes_minor->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_disciplinechedcodes_minor->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $ref_disciplinechedcodes_minor;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FormValue) && $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldCaption());
		}
		if (!up_CheckInteger($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FormValue)) {
			up_AddMessage($gsFormError, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldErrMsg());
		}
		if (!up_CheckInteger($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FormValue)) {
			up_AddMessage($gsFormError, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FldErrMsg());
		}
		if (!is_null($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FormValue) && $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldCaption());
		}
		if (!up_CheckInteger($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FormValue)) {
			up_AddMessage($gsFormError, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldErrMsg());
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
		global $conn, $Security, $Language, $ref_disciplinechedcodes_minor;
		$sFilter = $ref_disciplinechedcodes_minor->KeyFilter();
		$ref_disciplinechedcodes_minor->CurrentFilter = $sFilter;
		$sSql = $ref_disciplinechedcodes_minor->SQL();
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

			// disCHED_disciplineSpecific_id
			// disCHED_disciplineSpecific_code

			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue, NULL, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ReadOnly);

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue, NULL, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ReadOnly);

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue, NULL, $ref_disciplinechedcodes_minor->disCHED_discipline_code->ReadOnly);

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->SetDbValueDef($rsnew, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue, 0, $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $ref_disciplinechedcodes_minor->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($ref_disciplinechedcodes_minor->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($ref_disciplinechedcodes_minor->CancelMessage <> "") {
					$this->setFailureMessage($ref_disciplinechedcodes_minor->CancelMessage);
					$ref_disciplinechedcodes_minor->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$ref_disciplinechedcodes_minor->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $ref_disciplinechedcodes_minor;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "ref_disciplinechedcodes_major") {
				$bValidMaster = TRUE;
				if (@$_GET["disCHED_discipline_code"] <> "") {
					$GLOBALS["ref_disciplinechedcodes_major"]->disCHED_discipline_code->setQueryStringValue($_GET["disCHED_discipline_code"]);
					$ref_disciplinechedcodes_minor->disCHED_discipline_code->setQueryStringValue($GLOBALS["ref_disciplinechedcodes_major"]->disCHED_discipline_code->QueryStringValue);
					$ref_disciplinechedcodes_minor->disCHED_discipline_code->setSessionValue($ref_disciplinechedcodes_minor->disCHED_discipline_code->QueryStringValue);
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$ref_disciplinechedcodes_minor->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$ref_disciplinechedcodes_minor->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "ref_disciplinechedcodes_major") {
				if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->QueryStringValue == "") $ref_disciplinechedcodes_minor->disCHED_discipline_code->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $ref_disciplinechedcodes_minor->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $ref_disciplinechedcodes_minor->getDetailFilter(); // Get detail filter
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_disciplinechedcodes_minor';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $ref_disciplinechedcodes_minor;
		$table = 'ref_disciplinechedcodes_minor';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['disCHED_disciplineSpecific_id'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
