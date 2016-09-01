<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_degreelevel_degreesinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_degreelevel_degrees_edit = new cref_degreelevel_degrees_edit();
$Page =& $ref_degreelevel_degrees_edit;

// Page init
$ref_degreelevel_degrees_edit->Page_Init();

// Page main
$ref_degreelevel_degrees_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_degreelevel_degrees_edit = new up_Page("ref_degreelevel_degrees_edit");

// page properties
ref_degreelevel_degrees_edit.PageID = "edit"; // page ID
ref_degreelevel_degrees_edit.FormID = "fref_degreelevel_degreesedit"; // form ID
var UP_PAGE_ID = ref_degreelevel_degrees_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
ref_degreelevel_degrees_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_degreeLevel_ID"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($ref_degreelevel_degrees->degreeLevel_ID->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_degreeLevel_ID"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_degreelevel_degrees->degreeLevel_ID->FldErrMsg()) ?>");

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
ref_degreelevel_degrees_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_degreelevel_degrees_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_degreelevel_degrees_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_degreelevel_degrees_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_degreelevel_degrees->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_degreelevel_degrees->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_degreelevel_degrees_edit->ShowPageHeader(); ?>
<?php
$ref_degreelevel_degrees_edit->ShowMessage();
?>
<form name="fref_degreelevel_degreesedit" id="fref_degreelevel_degreesedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return ref_degreelevel_degrees_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="ref_degreelevel_degrees">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($ref_degreelevel_degrees->degreeLevel_ID->Visible) { // degreeLevel_ID ?>
	<tr id="r_degreeLevel_ID"<?php echo $ref_degreelevel_degrees->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_degreelevel_degrees->degreeLevel_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $ref_degreelevel_degrees->degreeLevel_ID->CellAttributes() ?>><span id="el_degreeLevel_ID">
<div<?php echo $ref_degreelevel_degrees->degreeLevel_ID->ViewAttributes() ?>><?php echo $ref_degreelevel_degrees->degreeLevel_ID->EditValue ?></div>
<input type="hidden" name="x_degreeLevel_ID" id="x_degreeLevel_ID" value="<?php echo up_HtmlEncode($ref_degreelevel_degrees->degreeLevel_ID->CurrentValue) ?>">
</span><?php echo $ref_degreelevel_degrees->degreeLevel_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_degreelevel_degrees->degreeLevel_name->Visible) { // degreeLevel_name ?>
	<tr id="r_degreeLevel_name"<?php echo $ref_degreelevel_degrees->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_degreelevel_degrees->degreeLevel_name->FldCaption() ?></td>
		<td<?php echo $ref_degreelevel_degrees->degreeLevel_name->CellAttributes() ?>><span id="el_degreeLevel_name">
<input type="text" name="x_degreeLevel_name" id="x_degreeLevel_name" size="30" maxlength="255" value="<?php echo $ref_degreelevel_degrees->degreeLevel_name->EditValue ?>"<?php echo $ref_degreelevel_degrees->degreeLevel_name->EditAttributes() ?>>
</span><?php echo $ref_degreelevel_degrees->degreeLevel_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_degreelevel_degrees->degreeLevel_educationLevel->Visible) { // degreeLevel_educationLevel ?>
	<tr id="r_degreeLevel_educationLevel"<?php echo $ref_degreelevel_degrees->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_degreelevel_degrees->degreeLevel_educationLevel->FldCaption() ?></td>
		<td<?php echo $ref_degreelevel_degrees->degreeLevel_educationLevel->CellAttributes() ?>><span id="el_degreeLevel_educationLevel">
<input type="text" name="x_degreeLevel_educationLevel" id="x_degreeLevel_educationLevel" size="30" maxlength="255" value="<?php echo $ref_degreelevel_degrees->degreeLevel_educationLevel->EditValue ?>"<?php echo $ref_degreelevel_degrees->degreeLevel_educationLevel->EditAttributes() ?>>
</span><?php echo $ref_degreelevel_degrees->degreeLevel_educationLevel->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$ref_degreelevel_degrees_edit->ShowPageFooter();
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
$ref_degreelevel_degrees_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_degreelevel_degrees_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'ref_degreelevel_degrees';

	// Page object name
	var $PageObjName = 'ref_degreelevel_degrees_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_degreelevel_degrees;
		if ($ref_degreelevel_degrees->UseTokenInUrl) $PageUrl .= "t=" . $ref_degreelevel_degrees->TableVar . "&"; // Add page token
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
		global $objForm, $ref_degreelevel_degrees;
		if ($ref_degreelevel_degrees->UseTokenInUrl) {
			if ($objForm)
				return ($ref_degreelevel_degrees->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_degreelevel_degrees->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_degreelevel_degrees_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_degreelevel_degrees)
		if (!isset($GLOBALS["ref_degreelevel_degrees"])) {
			$GLOBALS["ref_degreelevel_degrees"] = new cref_degreelevel_degrees();
			$GLOBALS["Table"] =& $GLOBALS["ref_degreelevel_degrees"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_degreelevel_degrees', TRUE);

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
		global $ref_degreelevel_degrees;

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
			$this->Page_Terminate("ref_degreelevel_degreeslist.php");
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
		global $objForm, $Language, $gsFormError, $ref_degreelevel_degrees;

		// Load key from QueryString
		if (@$_GET["degreeLevel_ID"] <> "")
			$ref_degreelevel_degrees->degreeLevel_ID->setQueryStringValue($_GET["degreeLevel_ID"]);
		if (@$_POST["a_edit"] <> "") {
			$ref_degreelevel_degrees->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$ref_degreelevel_degrees->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$ref_degreelevel_degrees->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$ref_degreelevel_degrees->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($ref_degreelevel_degrees->degreeLevel_ID->CurrentValue == "")
			$this->Page_Terminate("ref_degreelevel_degreeslist.php"); // Invalid key, return to list
		switch ($ref_degreelevel_degrees->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("ref_degreelevel_degreeslist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$ref_degreelevel_degrees->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $ref_degreelevel_degrees->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$ref_degreelevel_degrees->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$ref_degreelevel_degrees->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$ref_degreelevel_degrees->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $ref_degreelevel_degrees;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $ref_degreelevel_degrees;
		if (!$ref_degreelevel_degrees->degreeLevel_ID->FldIsDetailKey) {
			$ref_degreelevel_degrees->degreeLevel_ID->setFormValue($objForm->GetValue("x_degreeLevel_ID"));
		}
		if (!$ref_degreelevel_degrees->degreeLevel_name->FldIsDetailKey) {
			$ref_degreelevel_degrees->degreeLevel_name->setFormValue($objForm->GetValue("x_degreeLevel_name"));
		}
		if (!$ref_degreelevel_degrees->degreeLevel_educationLevel->FldIsDetailKey) {
			$ref_degreelevel_degrees->degreeLevel_educationLevel->setFormValue($objForm->GetValue("x_degreeLevel_educationLevel"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $ref_degreelevel_degrees;
		$this->LoadRow();
		$ref_degreelevel_degrees->degreeLevel_ID->CurrentValue = $ref_degreelevel_degrees->degreeLevel_ID->FormValue;
		$ref_degreelevel_degrees->degreeLevel_name->CurrentValue = $ref_degreelevel_degrees->degreeLevel_name->FormValue;
		$ref_degreelevel_degrees->degreeLevel_educationLevel->CurrentValue = $ref_degreelevel_degrees->degreeLevel_educationLevel->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_degreelevel_degrees;
		$sFilter = $ref_degreelevel_degrees->KeyFilter();

		// Call Row Selecting event
		$ref_degreelevel_degrees->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_degreelevel_degrees->CurrentFilter = $sFilter;
		$sSql = $ref_degreelevel_degrees->SQL();
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
		global $conn, $ref_degreelevel_degrees;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_degreelevel_degrees->Row_Selected($row);
		$ref_degreelevel_degrees->degreeLevel_ID->setDbValue($rs->fields('degreeLevel_ID'));
		$ref_degreelevel_degrees->degreeLevel_name->setDbValue($rs->fields('degreeLevel_name'));
		$ref_degreelevel_degrees->degreeLevel_educationLevel->setDbValue($rs->fields('degreeLevel_educationLevel'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_degreelevel_degrees;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_degreelevel_degrees->Row_Rendering();

		// Common render codes for all row types
		// degreeLevel_ID
		// degreeLevel_name
		// degreeLevel_educationLevel

		if ($ref_degreelevel_degrees->RowType == UP_ROWTYPE_VIEW) { // View row

			// degreeLevel_ID
			$ref_degreelevel_degrees->degreeLevel_ID->ViewValue = $ref_degreelevel_degrees->degreeLevel_ID->CurrentValue;
			$ref_degreelevel_degrees->degreeLevel_ID->ViewCustomAttributes = "";

			// degreeLevel_name
			$ref_degreelevel_degrees->degreeLevel_name->ViewValue = $ref_degreelevel_degrees->degreeLevel_name->CurrentValue;
			$ref_degreelevel_degrees->degreeLevel_name->ViewCustomAttributes = "";

			// degreeLevel_educationLevel
			$ref_degreelevel_degrees->degreeLevel_educationLevel->ViewValue = $ref_degreelevel_degrees->degreeLevel_educationLevel->CurrentValue;
			$ref_degreelevel_degrees->degreeLevel_educationLevel->ViewCustomAttributes = "";

			// degreeLevel_ID
			$ref_degreelevel_degrees->degreeLevel_ID->LinkCustomAttributes = "";
			$ref_degreelevel_degrees->degreeLevel_ID->HrefValue = "";
			$ref_degreelevel_degrees->degreeLevel_ID->TooltipValue = "";

			// degreeLevel_name
			$ref_degreelevel_degrees->degreeLevel_name->LinkCustomAttributes = "";
			$ref_degreelevel_degrees->degreeLevel_name->HrefValue = "";
			$ref_degreelevel_degrees->degreeLevel_name->TooltipValue = "";

			// degreeLevel_educationLevel
			$ref_degreelevel_degrees->degreeLevel_educationLevel->LinkCustomAttributes = "";
			$ref_degreelevel_degrees->degreeLevel_educationLevel->HrefValue = "";
			$ref_degreelevel_degrees->degreeLevel_educationLevel->TooltipValue = "";
		} elseif ($ref_degreelevel_degrees->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// degreeLevel_ID
			$ref_degreelevel_degrees->degreeLevel_ID->EditCustomAttributes = "";
			$ref_degreelevel_degrees->degreeLevel_ID->EditValue = $ref_degreelevel_degrees->degreeLevel_ID->CurrentValue;
			$ref_degreelevel_degrees->degreeLevel_ID->ViewCustomAttributes = "";

			// degreeLevel_name
			$ref_degreelevel_degrees->degreeLevel_name->EditCustomAttributes = "";
			$ref_degreelevel_degrees->degreeLevel_name->EditValue = up_HtmlEncode($ref_degreelevel_degrees->degreeLevel_name->CurrentValue);

			// degreeLevel_educationLevel
			$ref_degreelevel_degrees->degreeLevel_educationLevel->EditCustomAttributes = "";
			$ref_degreelevel_degrees->degreeLevel_educationLevel->EditValue = up_HtmlEncode($ref_degreelevel_degrees->degreeLevel_educationLevel->CurrentValue);

			// Edit refer script
			// degreeLevel_ID

			$ref_degreelevel_degrees->degreeLevel_ID->HrefValue = "";

			// degreeLevel_name
			$ref_degreelevel_degrees->degreeLevel_name->HrefValue = "";

			// degreeLevel_educationLevel
			$ref_degreelevel_degrees->degreeLevel_educationLevel->HrefValue = "";
		}
		if ($ref_degreelevel_degrees->RowType == UP_ROWTYPE_ADD ||
			$ref_degreelevel_degrees->RowType == UP_ROWTYPE_EDIT ||
			$ref_degreelevel_degrees->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$ref_degreelevel_degrees->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($ref_degreelevel_degrees->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_degreelevel_degrees->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $ref_degreelevel_degrees;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($ref_degreelevel_degrees->degreeLevel_ID->FormValue) && $ref_degreelevel_degrees->degreeLevel_ID->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $ref_degreelevel_degrees->degreeLevel_ID->FldCaption());
		}
		if (!up_CheckInteger($ref_degreelevel_degrees->degreeLevel_ID->FormValue)) {
			up_AddMessage($gsFormError, $ref_degreelevel_degrees->degreeLevel_ID->FldErrMsg());
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
		global $conn, $Security, $Language, $ref_degreelevel_degrees;
		$sFilter = $ref_degreelevel_degrees->KeyFilter();
		$ref_degreelevel_degrees->CurrentFilter = $sFilter;
		$sSql = $ref_degreelevel_degrees->SQL();
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

			// degreeLevel_ID
			// degreeLevel_name

			$ref_degreelevel_degrees->degreeLevel_name->SetDbValueDef($rsnew, $ref_degreelevel_degrees->degreeLevel_name->CurrentValue, NULL, $ref_degreelevel_degrees->degreeLevel_name->ReadOnly);

			// degreeLevel_educationLevel
			$ref_degreelevel_degrees->degreeLevel_educationLevel->SetDbValueDef($rsnew, $ref_degreelevel_degrees->degreeLevel_educationLevel->CurrentValue, NULL, $ref_degreelevel_degrees->degreeLevel_educationLevel->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $ref_degreelevel_degrees->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($ref_degreelevel_degrees->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($ref_degreelevel_degrees->CancelMessage <> "") {
					$this->setFailureMessage($ref_degreelevel_degrees->CancelMessage);
					$ref_degreelevel_degrees->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$ref_degreelevel_degrees->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_degreelevel_degrees';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $ref_degreelevel_degrees;
		$table = 'ref_degreelevel_degrees';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['degreeLevel_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($ref_degreelevel_degrees->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_degreelevel_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($ref_degreelevel_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($ref_degreelevel_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
