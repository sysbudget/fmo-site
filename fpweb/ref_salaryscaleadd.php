<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_salaryscaleinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_salaryscale_add = new cref_salaryscale_add();
$Page =& $ref_salaryscale_add;

// Page init
$ref_salaryscale_add->Page_Init();

// Page main
$ref_salaryscale_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_salaryscale_add = new up_Page("ref_salaryscale_add");

// page properties
ref_salaryscale_add.PageID = "add"; // page ID
ref_salaryscale_add.FormID = "fref_salaryscaleadd"; // form ID
var UP_PAGE_ID = ref_salaryscale_add.PageID; // for backward compatibility

// extend page with ValidateForm function
ref_salaryscale_add.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_salaryScale_sg"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_salaryscale->salaryScale_sg->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_salaryScale_step"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_salaryscale->salaryScale_step->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_salaryScale_monthlyRate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_salaryscale->salaryScale_monthlyRate->FldErrMsg()) ?>");

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
ref_salaryscale_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_salaryscale_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_salaryscale_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_salaryscale_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_salaryscale->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_salaryscale->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_salaryscale_add->ShowPageHeader(); ?>
<?php
$ref_salaryscale_add->ShowMessage();
?>
<form name="fref_salaryscaleadd" id="fref_salaryscaleadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return ref_salaryscale_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="ref_salaryscale">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($ref_salaryscale->salaryScale_code->Visible) { // salaryScale_code ?>
	<tr id="r_salaryScale_code"<?php echo $ref_salaryscale->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_salaryscale->salaryScale_code->FldCaption() ?></td>
		<td<?php echo $ref_salaryscale->salaryScale_code->CellAttributes() ?>><span id="el_salaryScale_code">
<input type="text" name="x_salaryScale_code" id="x_salaryScale_code" size="30" maxlength="255" value="<?php echo $ref_salaryscale->salaryScale_code->EditValue ?>"<?php echo $ref_salaryscale->salaryScale_code->EditAttributes() ?>>
</span><?php echo $ref_salaryscale->salaryScale_code->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_salaryscale->salaryScale_sg->Visible) { // salaryScale_sg ?>
	<tr id="r_salaryScale_sg"<?php echo $ref_salaryscale->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_salaryscale->salaryScale_sg->FldCaption() ?></td>
		<td<?php echo $ref_salaryscale->salaryScale_sg->CellAttributes() ?>><span id="el_salaryScale_sg">
<input type="text" name="x_salaryScale_sg" id="x_salaryScale_sg" size="30" value="<?php echo $ref_salaryscale->salaryScale_sg->EditValue ?>"<?php echo $ref_salaryscale->salaryScale_sg->EditAttributes() ?>>
</span><?php echo $ref_salaryscale->salaryScale_sg->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_salaryscale->salaryScale_step->Visible) { // salaryScale_step ?>
	<tr id="r_salaryScale_step"<?php echo $ref_salaryscale->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_salaryscale->salaryScale_step->FldCaption() ?></td>
		<td<?php echo $ref_salaryscale->salaryScale_step->CellAttributes() ?>><span id="el_salaryScale_step">
<input type="text" name="x_salaryScale_step" id="x_salaryScale_step" size="30" value="<?php echo $ref_salaryscale->salaryScale_step->EditValue ?>"<?php echo $ref_salaryscale->salaryScale_step->EditAttributes() ?>>
</span><?php echo $ref_salaryscale->salaryScale_step->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_salaryscale->salaryScale_monthlyRate->Visible) { // salaryScale_monthlyRate ?>
	<tr id="r_salaryScale_monthlyRate"<?php echo $ref_salaryscale->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_salaryscale->salaryScale_monthlyRate->FldCaption() ?></td>
		<td<?php echo $ref_salaryscale->salaryScale_monthlyRate->CellAttributes() ?>><span id="el_salaryScale_monthlyRate">
<input type="text" name="x_salaryScale_monthlyRate" id="x_salaryScale_monthlyRate" size="30" value="<?php echo $ref_salaryscale->salaryScale_monthlyRate->EditValue ?>"<?php echo $ref_salaryscale->salaryScale_monthlyRate->EditAttributes() ?>>
</span><?php echo $ref_salaryscale->salaryScale_monthlyRate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_salaryscale->salaryScale_status->Visible) { // salaryScale_status ?>
	<tr id="r_salaryScale_status"<?php echo $ref_salaryscale->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_salaryscale->salaryScale_status->FldCaption() ?></td>
		<td<?php echo $ref_salaryscale->salaryScale_status->CellAttributes() ?>><span id="el_salaryScale_status">
<div id="tp_x_salaryScale_status" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_salaryScale_status" id="x_salaryScale_status" value="{value}"<?php echo $ref_salaryscale->salaryScale_status->EditAttributes() ?>></label></div>
<div id="dsl_x_salaryScale_status" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $ref_salaryscale->salaryScale_status->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($ref_salaryscale->salaryScale_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_salaryScale_status" id="x_salaryScale_status" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $ref_salaryscale->salaryScale_status->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $ref_salaryscale->salaryScale_status->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$ref_salaryscale_add->ShowPageFooter();
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
$ref_salaryscale_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_salaryscale_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'ref_salaryscale';

	// Page object name
	var $PageObjName = 'ref_salaryscale_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_salaryscale;
		if ($ref_salaryscale->UseTokenInUrl) $PageUrl .= "t=" . $ref_salaryscale->TableVar . "&"; // Add page token
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
		global $objForm, $ref_salaryscale;
		if ($ref_salaryscale->UseTokenInUrl) {
			if ($objForm)
				return ($ref_salaryscale->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_salaryscale->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_salaryscale_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_salaryscale)
		if (!isset($GLOBALS["ref_salaryscale"])) {
			$GLOBALS["ref_salaryscale"] = new cref_salaryscale();
			$GLOBALS["Table"] =& $GLOBALS["ref_salaryscale"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_salaryscale', TRUE);

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
		global $ref_salaryscale;

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
		if (!$Security->CanAdd()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("ref_salaryscalelist.php");
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
	var $DbMasterFilter = "";
	var $DbDetailFilter = "";
	var $Priv = 0;
	var $OldRecordset;
	var $CopyRecord;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $ref_salaryscale;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$ref_salaryscale->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$ref_salaryscale->CurrentAction = "I"; // Form error, reset action
				$ref_salaryscale->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["salaryScale_ID"] != "") {
				$ref_salaryscale->salaryScale_ID->setQueryStringValue($_GET["salaryScale_ID"]);
				$ref_salaryscale->setKey("salaryScale_ID", $ref_salaryscale->salaryScale_ID->CurrentValue); // Set up key
			} else {
				$ref_salaryscale->setKey("salaryScale_ID", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$ref_salaryscale->CurrentAction = "C"; // Copy record
			} else {
				$ref_salaryscale->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($ref_salaryscale->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("ref_salaryscalelist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$ref_salaryscale->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $ref_salaryscale->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "ref_salaryscaleview.php")
						$sReturnUrl = $ref_salaryscale->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$ref_salaryscale->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$ref_salaryscale->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$ref_salaryscale->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $ref_salaryscale;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $ref_salaryscale;
		$ref_salaryscale->salaryScale_code->CurrentValue = NULL;
		$ref_salaryscale->salaryScale_code->OldValue = $ref_salaryscale->salaryScale_code->CurrentValue;
		$ref_salaryscale->salaryScale_sg->CurrentValue = NULL;
		$ref_salaryscale->salaryScale_sg->OldValue = $ref_salaryscale->salaryScale_sg->CurrentValue;
		$ref_salaryscale->salaryScale_step->CurrentValue = NULL;
		$ref_salaryscale->salaryScale_step->OldValue = $ref_salaryscale->salaryScale_step->CurrentValue;
		$ref_salaryscale->salaryScale_monthlyRate->CurrentValue = NULL;
		$ref_salaryscale->salaryScale_monthlyRate->OldValue = $ref_salaryscale->salaryScale_monthlyRate->CurrentValue;
		$ref_salaryscale->salaryScale_status->CurrentValue = "Y";
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $ref_salaryscale;
		if (!$ref_salaryscale->salaryScale_code->FldIsDetailKey) {
			$ref_salaryscale->salaryScale_code->setFormValue($objForm->GetValue("x_salaryScale_code"));
		}
		if (!$ref_salaryscale->salaryScale_sg->FldIsDetailKey) {
			$ref_salaryscale->salaryScale_sg->setFormValue($objForm->GetValue("x_salaryScale_sg"));
		}
		if (!$ref_salaryscale->salaryScale_step->FldIsDetailKey) {
			$ref_salaryscale->salaryScale_step->setFormValue($objForm->GetValue("x_salaryScale_step"));
		}
		if (!$ref_salaryscale->salaryScale_monthlyRate->FldIsDetailKey) {
			$ref_salaryscale->salaryScale_monthlyRate->setFormValue($objForm->GetValue("x_salaryScale_monthlyRate"));
		}
		if (!$ref_salaryscale->salaryScale_status->FldIsDetailKey) {
			$ref_salaryscale->salaryScale_status->setFormValue($objForm->GetValue("x_salaryScale_status"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $ref_salaryscale;
		$this->LoadOldRecord();
		$ref_salaryscale->salaryScale_code->CurrentValue = $ref_salaryscale->salaryScale_code->FormValue;
		$ref_salaryscale->salaryScale_sg->CurrentValue = $ref_salaryscale->salaryScale_sg->FormValue;
		$ref_salaryscale->salaryScale_step->CurrentValue = $ref_salaryscale->salaryScale_step->FormValue;
		$ref_salaryscale->salaryScale_monthlyRate->CurrentValue = $ref_salaryscale->salaryScale_monthlyRate->FormValue;
		$ref_salaryscale->salaryScale_status->CurrentValue = $ref_salaryscale->salaryScale_status->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_salaryscale;
		$sFilter = $ref_salaryscale->KeyFilter();

		// Call Row Selecting event
		$ref_salaryscale->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_salaryscale->CurrentFilter = $sFilter;
		$sSql = $ref_salaryscale->SQL();
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
		global $conn, $ref_salaryscale;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_salaryscale->Row_Selected($row);
		$ref_salaryscale->salaryScale_ID->setDbValue($rs->fields('salaryScale_ID'));
		$ref_salaryscale->salaryScale_code->setDbValue($rs->fields('salaryScale_code'));
		$ref_salaryscale->salaryScale_sg->setDbValue($rs->fields('salaryScale_sg'));
		$ref_salaryscale->salaryScale_step->setDbValue($rs->fields('salaryScale_step'));
		$ref_salaryscale->salaryScale_monthlyRate->setDbValue($rs->fields('salaryScale_monthlyRate'));
		$ref_salaryscale->salaryScale_annualSalary->setDbValue($rs->fields('salaryScale_annualSalary'));
		$ref_salaryscale->salaryScale_status->setDbValue($rs->fields('salaryScale_status'));
	}

	// Load old record
	function LoadOldRecord() {
		global $ref_salaryscale;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($ref_salaryscale->getKey("salaryScale_ID")) <> "")
			$ref_salaryscale->salaryScale_ID->CurrentValue = $ref_salaryscale->getKey("salaryScale_ID"); // salaryScale_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$ref_salaryscale->CurrentFilter = $ref_salaryscale->KeyFilter();
			$sSql = $ref_salaryscale->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_salaryscale;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_salaryscale->Row_Rendering();

		// Common render codes for all row types
		// salaryScale_ID
		// salaryScale_code
		// salaryScale_sg
		// salaryScale_step
		// salaryScale_monthlyRate
		// salaryScale_annualSalary
		// salaryScale_status

		if ($ref_salaryscale->RowType == UP_ROWTYPE_VIEW) { // View row

			// salaryScale_code
			$ref_salaryscale->salaryScale_code->ViewValue = $ref_salaryscale->salaryScale_code->CurrentValue;
			$ref_salaryscale->salaryScale_code->ViewCustomAttributes = "";

			// salaryScale_sg
			$ref_salaryscale->salaryScale_sg->ViewValue = $ref_salaryscale->salaryScale_sg->CurrentValue;
			$ref_salaryscale->salaryScale_sg->ViewCustomAttributes = "";

			// salaryScale_step
			$ref_salaryscale->salaryScale_step->ViewValue = $ref_salaryscale->salaryScale_step->CurrentValue;
			$ref_salaryscale->salaryScale_step->ViewCustomAttributes = "";

			// salaryScale_monthlyRate
			$ref_salaryscale->salaryScale_monthlyRate->ViewValue = $ref_salaryscale->salaryScale_monthlyRate->CurrentValue;
			$ref_salaryscale->salaryScale_monthlyRate->ViewCustomAttributes = "";

			// salaryScale_status
			if (strval($ref_salaryscale->salaryScale_status->CurrentValue) <> "") {
				switch ($ref_salaryscale->salaryScale_status->CurrentValue) {
					case "Y":
						$ref_salaryscale->salaryScale_status->ViewValue = $ref_salaryscale->salaryScale_status->FldTagCaption(1) <> "" ? $ref_salaryscale->salaryScale_status->FldTagCaption(1) : $ref_salaryscale->salaryScale_status->CurrentValue;
						break;
					case "N":
						$ref_salaryscale->salaryScale_status->ViewValue = $ref_salaryscale->salaryScale_status->FldTagCaption(2) <> "" ? $ref_salaryscale->salaryScale_status->FldTagCaption(2) : $ref_salaryscale->salaryScale_status->CurrentValue;
						break;
					default:
						$ref_salaryscale->salaryScale_status->ViewValue = $ref_salaryscale->salaryScale_status->CurrentValue;
				}
			} else {
				$ref_salaryscale->salaryScale_status->ViewValue = NULL;
			}
			$ref_salaryscale->salaryScale_status->ViewCustomAttributes = "";

			// salaryScale_code
			$ref_salaryscale->salaryScale_code->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_code->HrefValue = "";
			$ref_salaryscale->salaryScale_code->TooltipValue = "";

			// salaryScale_sg
			$ref_salaryscale->salaryScale_sg->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_sg->HrefValue = "";
			$ref_salaryscale->salaryScale_sg->TooltipValue = "";

			// salaryScale_step
			$ref_salaryscale->salaryScale_step->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_step->HrefValue = "";
			$ref_salaryscale->salaryScale_step->TooltipValue = "";

			// salaryScale_monthlyRate
			$ref_salaryscale->salaryScale_monthlyRate->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_monthlyRate->HrefValue = "";
			$ref_salaryscale->salaryScale_monthlyRate->TooltipValue = "";

			// salaryScale_status
			$ref_salaryscale->salaryScale_status->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_status->HrefValue = "";
			$ref_salaryscale->salaryScale_status->TooltipValue = "";
		} elseif ($ref_salaryscale->RowType == UP_ROWTYPE_ADD) { // Add row

			// salaryScale_code
			$ref_salaryscale->salaryScale_code->EditCustomAttributes = "";
			$ref_salaryscale->salaryScale_code->EditValue = up_HtmlEncode($ref_salaryscale->salaryScale_code->CurrentValue);

			// salaryScale_sg
			$ref_salaryscale->salaryScale_sg->EditCustomAttributes = "";
			$ref_salaryscale->salaryScale_sg->EditValue = up_HtmlEncode($ref_salaryscale->salaryScale_sg->CurrentValue);

			// salaryScale_step
			$ref_salaryscale->salaryScale_step->EditCustomAttributes = "";
			$ref_salaryscale->salaryScale_step->EditValue = up_HtmlEncode($ref_salaryscale->salaryScale_step->CurrentValue);

			// salaryScale_monthlyRate
			$ref_salaryscale->salaryScale_monthlyRate->EditCustomAttributes = "";
			$ref_salaryscale->salaryScale_monthlyRate->EditValue = up_HtmlEncode($ref_salaryscale->salaryScale_monthlyRate->CurrentValue);

			// salaryScale_status
			$ref_salaryscale->salaryScale_status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $ref_salaryscale->salaryScale_status->FldTagCaption(1) <> "" ? $ref_salaryscale->salaryScale_status->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $ref_salaryscale->salaryScale_status->FldTagCaption(2) <> "" ? $ref_salaryscale->salaryScale_status->FldTagCaption(2) : "N");
			$ref_salaryscale->salaryScale_status->EditValue = $arwrk;

			// Edit refer script
			// salaryScale_code

			$ref_salaryscale->salaryScale_code->HrefValue = "";

			// salaryScale_sg
			$ref_salaryscale->salaryScale_sg->HrefValue = "";

			// salaryScale_step
			$ref_salaryscale->salaryScale_step->HrefValue = "";

			// salaryScale_monthlyRate
			$ref_salaryscale->salaryScale_monthlyRate->HrefValue = "";

			// salaryScale_status
			$ref_salaryscale->salaryScale_status->HrefValue = "";
		}
		if ($ref_salaryscale->RowType == UP_ROWTYPE_ADD ||
			$ref_salaryscale->RowType == UP_ROWTYPE_EDIT ||
			$ref_salaryscale->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$ref_salaryscale->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($ref_salaryscale->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_salaryscale->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $ref_salaryscale;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($ref_salaryscale->salaryScale_sg->FormValue)) {
			up_AddMessage($gsFormError, $ref_salaryscale->salaryScale_sg->FldErrMsg());
		}
		if (!up_CheckInteger($ref_salaryscale->salaryScale_step->FormValue)) {
			up_AddMessage($gsFormError, $ref_salaryscale->salaryScale_step->FldErrMsg());
		}
		if (!up_CheckNumber($ref_salaryscale->salaryScale_monthlyRate->FormValue)) {
			up_AddMessage($gsFormError, $ref_salaryscale->salaryScale_monthlyRate->FldErrMsg());
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

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $ref_salaryscale;
		$rsnew = array();

		// salaryScale_code
		$ref_salaryscale->salaryScale_code->SetDbValueDef($rsnew, $ref_salaryscale->salaryScale_code->CurrentValue, NULL, FALSE);

		// salaryScale_sg
		$ref_salaryscale->salaryScale_sg->SetDbValueDef($rsnew, $ref_salaryscale->salaryScale_sg->CurrentValue, NULL, FALSE);

		// salaryScale_step
		$ref_salaryscale->salaryScale_step->SetDbValueDef($rsnew, $ref_salaryscale->salaryScale_step->CurrentValue, NULL, FALSE);

		// salaryScale_monthlyRate
		$ref_salaryscale->salaryScale_monthlyRate->SetDbValueDef($rsnew, $ref_salaryscale->salaryScale_monthlyRate->CurrentValue, NULL, FALSE);

		// salaryScale_status
		$ref_salaryscale->salaryScale_status->SetDbValueDef($rsnew, $ref_salaryscale->salaryScale_status->CurrentValue, NULL, strval($ref_salaryscale->salaryScale_status->CurrentValue) == "");

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $ref_salaryscale->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($ref_salaryscale->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($ref_salaryscale->CancelMessage <> "") {
				$this->setFailureMessage($ref_salaryscale->CancelMessage);
				$ref_salaryscale->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$ref_salaryscale->salaryScale_ID->setDbValue($conn->Insert_ID());
			$rsnew['salaryScale_ID'] = $ref_salaryscale->salaryScale_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$ref_salaryscale->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_salaryscale';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $ref_salaryscale;
		$table = 'ref_salaryscale';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['salaryScale_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($ref_salaryscale->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_salaryscale->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($ref_salaryscale->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
					$newvalue = "[XML]"; // XML Field
				} else {
					$newvalue = $rs[$fldname];
				}
				up_WriteAuditTrail("log", $dt, $id, $usr, "A", $table, $fldname, $key, "", $newvalue);
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
