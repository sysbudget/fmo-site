<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_degreesinfo.php" ?>
<?php include_once "tbl_facultyinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_degrees_add = new ctbl_degrees_add();
$Page =& $tbl_degrees_add;

// Page init
$tbl_degrees_add->Page_Init();

// Page main
$tbl_degrees_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_degrees_add = new up_Page("tbl_degrees_add");

// page properties
tbl_degrees_add.PageID = "add"; // page ID
tbl_degrees_add.FormID = "ftbl_degreesadd"; // form ID
var UP_PAGE_ID = tbl_degrees_add.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_degrees_add.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_degrees_level"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_degrees->degrees_level->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_degrees_fieldOfStudy"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_degrees->degrees_fieldOfStudy->FldCaption()) ?>");

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
tbl_degrees_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_degrees_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_degrees_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_degrees_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_degrees->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_degrees->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_degrees_add->ShowPageHeader(); ?>
<?php
$tbl_degrees_add->ShowMessage();
?>
<form name="ftbl_degreesadd" id="ftbl_degreesadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return tbl_degrees_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="tbl_degrees">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_degrees->degrees_level->Visible) { // degrees_level ?>
	<tr id="r_degrees_level"<?php echo $tbl_degrees->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_degrees->degrees_level->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_degrees->degrees_level->CellAttributes() ?>><span id="el_degrees_level">
<select id="x_degrees_level" name="x_degrees_level"<?php echo $tbl_degrees->degrees_level->EditAttributes() ?>>
<?php
if (is_array($tbl_degrees->degrees_level->EditValue)) {
	$arwrk = $tbl_degrees->degrees_level->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_level->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $tbl_degrees->degrees_level->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_degrees->degrees_disciplineCode->Visible) { // degrees_disciplineCode ?>
	<tr id="r_degrees_disciplineCode"<?php echo $tbl_degrees->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_degrees->degrees_disciplineCode->FldCaption() ?></td>
		<td<?php echo $tbl_degrees->degrees_disciplineCode->CellAttributes() ?>><span id="el_degrees_disciplineCode">
<select id="x_degrees_disciplineCode" name="x_degrees_disciplineCode"<?php echo $tbl_degrees->degrees_disciplineCode->EditAttributes() ?>>
<?php
if (is_array($tbl_degrees->degrees_disciplineCode->EditValue)) {
	$arwrk = $tbl_degrees->degrees_disciplineCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_disciplineCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $tbl_degrees->degrees_disciplineCode->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_degrees->degrees_fieldOfStudy->Visible) { // degrees_fieldOfStudy ?>
	<tr id="r_degrees_fieldOfStudy"<?php echo $tbl_degrees->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_degrees->degrees_fieldOfStudy->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_degrees->degrees_fieldOfStudy->CellAttributes() ?>><span id="el_degrees_fieldOfStudy">
<input type="text" name="x_degrees_fieldOfStudy" id="x_degrees_fieldOfStudy" size="30" maxlength="255" value="<?php echo $tbl_degrees->degrees_fieldOfStudy->EditValue ?>"<?php echo $tbl_degrees->degrees_fieldOfStudy->EditAttributes() ?>>
</span><?php echo $tbl_degrees->degrees_fieldOfStudy->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_degrees->degrees_wroteThesisDissertation->Visible) { // degrees_wroteThesisDissertation ?>
	<tr id="r_degrees_wroteThesisDissertation"<?php echo $tbl_degrees->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_degrees->degrees_wroteThesisDissertation->FldCaption() ?></td>
		<td<?php echo $tbl_degrees->degrees_wroteThesisDissertation->CellAttributes() ?>><span id="el_degrees_wroteThesisDissertation">
<div id="tp_x_degrees_wroteThesisDissertation" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_degrees_wroteThesisDissertation" id="x_degrees_wroteThesisDissertation" value="{value}"<?php echo $tbl_degrees->degrees_wroteThesisDissertation->EditAttributes() ?>></label></div>
<div id="dsl_x_degrees_wroteThesisDissertation" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_degrees->degrees_wroteThesisDissertation->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_degrees_wroteThesisDissertation" id="x_degrees_wroteThesisDissertation" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_degrees->degrees_wroteThesisDissertation->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $tbl_degrees->degrees_wroteThesisDissertation->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_degrees->degrees_primaryDegree->Visible) { // degrees_primaryDegree ?>
	<tr id="r_degrees_primaryDegree"<?php echo $tbl_degrees->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_degrees->degrees_primaryDegree->FldCaption() ?></td>
		<td<?php echo $tbl_degrees->degrees_primaryDegree->CellAttributes() ?>><span id="el_degrees_primaryDegree">
<div id="tp_x_degrees_primaryDegree" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_degrees_primaryDegree" id="x_degrees_primaryDegree" value="{value}"<?php echo $tbl_degrees->degrees_primaryDegree->EditAttributes() ?>></label></div>
<div id="dsl_x_degrees_primaryDegree" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_degrees->degrees_primaryDegree->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_primaryDegree->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_degrees_primaryDegree" id="x_degrees_primaryDegree" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_degrees->degrees_primaryDegree->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $tbl_degrees->degrees_primaryDegree->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if (strval($tbl_degrees->faculty_ID->getSessionValue()) <> "") { ?>
<input type="hidden" name="x_faculty_ID" id="x_faculty_ID" value="<?php echo up_HtmlEncode(strval($tbl_degrees->faculty_ID->getSessionValue())) ?>">
<?php } ?>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$tbl_degrees_add->ShowPageFooter();
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
$tbl_degrees_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_degrees_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'tbl_degrees';

	// Page object name
	var $PageObjName = 'tbl_degrees_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_degrees;
		if ($tbl_degrees->UseTokenInUrl) $PageUrl .= "t=" . $tbl_degrees->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_degrees;
		if ($tbl_degrees->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_degrees->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_degrees->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_degrees_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_degrees)
		if (!isset($GLOBALS["tbl_degrees"])) {
			$GLOBALS["tbl_degrees"] = new ctbl_degrees();
			$GLOBALS["Table"] =& $GLOBALS["tbl_degrees"];
		}

		// Table object (tbl_faculty)
		if (!isset($GLOBALS['tbl_faculty'])) $GLOBALS['tbl_faculty'] = new ctbl_faculty();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_degrees', TRUE);

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
		global $tbl_degrees;

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
			$this->Page_Terminate("tbl_degreeslist.php");
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
		global $objForm, $Language, $gsFormError, $tbl_degrees;

		// Set up master/detail parameters
		$this->SetUpMasterParms();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$tbl_degrees->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$tbl_degrees->CurrentAction = "I"; // Form error, reset action
				$tbl_degrees->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["degrees_ID"] != "") {
				$tbl_degrees->degrees_ID->setQueryStringValue($_GET["degrees_ID"]);
				$tbl_degrees->setKey("degrees_ID", $tbl_degrees->degrees_ID->CurrentValue); // Set up key
			} else {
				$tbl_degrees->setKey("degrees_ID", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$tbl_degrees->CurrentAction = "C"; // Copy record
			} else {
				$tbl_degrees->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($tbl_degrees->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("tbl_degreeslist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$tbl_degrees->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $tbl_degrees->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "tbl_degreesview.php")
						$sReturnUrl = $tbl_degrees->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$tbl_degrees->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$tbl_degrees->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$tbl_degrees->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_degrees;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $tbl_degrees;
		$tbl_degrees->degrees_level->CurrentValue = NULL;
		$tbl_degrees->degrees_level->OldValue = $tbl_degrees->degrees_level->CurrentValue;
		$tbl_degrees->degrees_disciplineCode->CurrentValue = NULL;
		$tbl_degrees->degrees_disciplineCode->OldValue = $tbl_degrees->degrees_disciplineCode->CurrentValue;
		$tbl_degrees->degrees_fieldOfStudy->CurrentValue = NULL;
		$tbl_degrees->degrees_fieldOfStudy->OldValue = $tbl_degrees->degrees_fieldOfStudy->CurrentValue;
		$tbl_degrees->degrees_wroteThesisDissertation->CurrentValue = NULL;
		$tbl_degrees->degrees_wroteThesisDissertation->OldValue = $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
		$tbl_degrees->degrees_primaryDegree->CurrentValue = NULL;
		$tbl_degrees->degrees_primaryDegree->OldValue = $tbl_degrees->degrees_primaryDegree->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_degrees;
		if (!$tbl_degrees->degrees_level->FldIsDetailKey) {
			$tbl_degrees->degrees_level->setFormValue($objForm->GetValue("x_degrees_level"));
		}
		if (!$tbl_degrees->degrees_disciplineCode->FldIsDetailKey) {
			$tbl_degrees->degrees_disciplineCode->setFormValue($objForm->GetValue("x_degrees_disciplineCode"));
		}
		if (!$tbl_degrees->degrees_fieldOfStudy->FldIsDetailKey) {
			$tbl_degrees->degrees_fieldOfStudy->setFormValue($objForm->GetValue("x_degrees_fieldOfStudy"));
		}
		if (!$tbl_degrees->degrees_wroteThesisDissertation->FldIsDetailKey) {
			$tbl_degrees->degrees_wroteThesisDissertation->setFormValue($objForm->GetValue("x_degrees_wroteThesisDissertation"));
		}
		if (!$tbl_degrees->degrees_primaryDegree->FldIsDetailKey) {
			$tbl_degrees->degrees_primaryDegree->setFormValue($objForm->GetValue("x_degrees_primaryDegree"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_degrees;
		$this->LoadOldRecord();
		$tbl_degrees->degrees_level->CurrentValue = $tbl_degrees->degrees_level->FormValue;
		$tbl_degrees->degrees_disciplineCode->CurrentValue = $tbl_degrees->degrees_disciplineCode->FormValue;
		$tbl_degrees->degrees_fieldOfStudy->CurrentValue = $tbl_degrees->degrees_fieldOfStudy->FormValue;
		$tbl_degrees->degrees_wroteThesisDissertation->CurrentValue = $tbl_degrees->degrees_wroteThesisDissertation->FormValue;
		$tbl_degrees->degrees_primaryDegree->CurrentValue = $tbl_degrees->degrees_primaryDegree->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_degrees;
		$sFilter = $tbl_degrees->KeyFilter();

		// Call Row Selecting event
		$tbl_degrees->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_degrees->CurrentFilter = $sFilter;
		$sSql = $tbl_degrees->SQL();
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
		global $conn, $tbl_degrees;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_degrees->Row_Selected($row);
		$tbl_degrees->degrees_ID->setDbValue($rs->fields('degrees_ID'));
		$tbl_degrees->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$tbl_degrees->degrees_level->setDbValue($rs->fields('degrees_level'));
		$tbl_degrees->degrees_disciplineCode->setDbValue($rs->fields('degrees_disciplineCode'));
		$tbl_degrees->degrees_fieldOfStudy->setDbValue($rs->fields('degrees_fieldOfStudy'));
		$tbl_degrees->degrees_wroteThesisDissertation->setDbValue($rs->fields('degrees_wroteThesisDissertation'));
		$tbl_degrees->degrees_primaryDegree->setDbValue($rs->fields('degrees_primaryDegree'));
		$tbl_degrees->degrees_authoritative_data->setDbValue($rs->fields('degrees_authoritative_data'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_degrees;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($tbl_degrees->getKey("degrees_ID")) <> "")
			$tbl_degrees->degrees_ID->CurrentValue = $tbl_degrees->getKey("degrees_ID"); // degrees_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_degrees->CurrentFilter = $tbl_degrees->KeyFilter();
			$sSql = $tbl_degrees->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_degrees;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_degrees->Row_Rendering();

		// Common render codes for all row types
		// degrees_ID
		// faculty_ID
		// degrees_level
		// degrees_disciplineCode
		// degrees_fieldOfStudy
		// degrees_wroteThesisDissertation
		// degrees_primaryDegree
		// degrees_authoritative_data

		if ($tbl_degrees->RowType == UP_ROWTYPE_VIEW) { // View row

			// degrees_level
			if (strval($tbl_degrees->degrees_level->CurrentValue) <> "") {
				$sFilterWrk = "`degreeLevel_ID` = " . up_AdjustSql($tbl_degrees->degrees_level->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreeLevel_name` FROM `ref_degreelevel_degrees`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_degrees->degrees_level->ViewValue = $rswrk->fields('degreeLevel_name');
					$rswrk->Close();
				} else {
					$tbl_degrees->degrees_level->ViewValue = $tbl_degrees->degrees_level->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_level->ViewValue = NULL;
			}
			$tbl_degrees->degrees_level->ViewCustomAttributes = "";

			// degrees_disciplineCode
			if (strval($tbl_degrees->degrees_disciplineCode->CurrentValue) <> "") {
				$sFilterWrk = "`disCHED_disciplineSpecific_code` = " . up_AdjustSql($tbl_degrees->degrees_disciplineCode->CurrentValue) . "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_nameList` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_degrees->degrees_disciplineCode->ViewValue = $rswrk->fields('disCHED_disciplineSpecific_nameList');
					$rswrk->Close();
				} else {
					$tbl_degrees->degrees_disciplineCode->ViewValue = $tbl_degrees->degrees_disciplineCode->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_disciplineCode->ViewValue = NULL;
			}
			$tbl_degrees->degrees_disciplineCode->ViewCustomAttributes = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->ViewValue = $tbl_degrees->degrees_fieldOfStudy->CurrentValue;
			$tbl_degrees->degrees_fieldOfStudy->ViewCustomAttributes = "";

			// degrees_wroteThesisDissertation
			if (strval($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) <> "") {
				switch ($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) {
					case "Y":
						$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) : $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
						break;
					case "N":
						$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) : $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
						break;
					default:
						$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = NULL;
			}
			$tbl_degrees->degrees_wroteThesisDissertation->ViewCustomAttributes = "";

			// degrees_primaryDegree
			if (strval($tbl_degrees->degrees_primaryDegree->CurrentValue) <> "") {
				switch ($tbl_degrees->degrees_primaryDegree->CurrentValue) {
					case "Y":
						$tbl_degrees->degrees_primaryDegree->ViewValue = $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) : $tbl_degrees->degrees_primaryDegree->CurrentValue;
						break;
					case "N":
						$tbl_degrees->degrees_primaryDegree->ViewValue = $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) : $tbl_degrees->degrees_primaryDegree->CurrentValue;
						break;
					default:
						$tbl_degrees->degrees_primaryDegree->ViewValue = $tbl_degrees->degrees_primaryDegree->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_primaryDegree->ViewValue = NULL;
			}
			$tbl_degrees->degrees_primaryDegree->ViewCustomAttributes = "";

			// degrees_level
			$tbl_degrees->degrees_level->LinkCustomAttributes = "";
			$tbl_degrees->degrees_level->HrefValue = "";
			$tbl_degrees->degrees_level->TooltipValue = "";

			// degrees_disciplineCode
			$tbl_degrees->degrees_disciplineCode->LinkCustomAttributes = "";
			$tbl_degrees->degrees_disciplineCode->HrefValue = "";
			$tbl_degrees->degrees_disciplineCode->TooltipValue = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->LinkCustomAttributes = "";
			$tbl_degrees->degrees_fieldOfStudy->HrefValue = "";
			$tbl_degrees->degrees_fieldOfStudy->TooltipValue = "";

			// degrees_wroteThesisDissertation
			$tbl_degrees->degrees_wroteThesisDissertation->LinkCustomAttributes = "";
			$tbl_degrees->degrees_wroteThesisDissertation->HrefValue = "";
			$tbl_degrees->degrees_wroteThesisDissertation->TooltipValue = "";

			// degrees_primaryDegree
			$tbl_degrees->degrees_primaryDegree->LinkCustomAttributes = "";
			$tbl_degrees->degrees_primaryDegree->HrefValue = "";
			$tbl_degrees->degrees_primaryDegree->TooltipValue = "";
		} elseif ($tbl_degrees->RowType == UP_ROWTYPE_ADD) { // Add row

			// degrees_level
			$tbl_degrees->degrees_level->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `degreeLevel_ID`, `degreeLevel_name` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `ref_degreelevel_degrees`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_degrees->degrees_level->EditValue = $arwrk;

			// degrees_disciplineCode
			$tbl_degrees->degrees_disciplineCode->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_code`, `disCHED_disciplineSpecific_nameList` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_degrees->degrees_disciplineCode->EditValue = $arwrk;

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->EditCustomAttributes = "";
			$tbl_degrees->degrees_fieldOfStudy->EditValue = up_HtmlEncode($tbl_degrees->degrees_fieldOfStudy->CurrentValue);

			// degrees_wroteThesisDissertation
			$tbl_degrees->degrees_wroteThesisDissertation->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) : "N");
			$tbl_degrees->degrees_wroteThesisDissertation->EditValue = $arwrk;

			// degrees_primaryDegree
			$tbl_degrees->degrees_primaryDegree->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) : "N");
			$tbl_degrees->degrees_primaryDegree->EditValue = $arwrk;

			// Edit refer script
			// degrees_level

			$tbl_degrees->degrees_level->HrefValue = "";

			// degrees_disciplineCode
			$tbl_degrees->degrees_disciplineCode->HrefValue = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->HrefValue = "";

			// degrees_wroteThesisDissertation
			$tbl_degrees->degrees_wroteThesisDissertation->HrefValue = "";

			// degrees_primaryDegree
			$tbl_degrees->degrees_primaryDegree->HrefValue = "";
		}
		if ($tbl_degrees->RowType == UP_ROWTYPE_ADD ||
			$tbl_degrees->RowType == UP_ROWTYPE_EDIT ||
			$tbl_degrees->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_degrees->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_degrees->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_degrees->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_degrees;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($tbl_degrees->degrees_level->FormValue) && $tbl_degrees->degrees_level->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_degrees->degrees_level->FldCaption());
		}
		if (!is_null($tbl_degrees->degrees_fieldOfStudy->FormValue) && $tbl_degrees->degrees_fieldOfStudy->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_degrees->degrees_fieldOfStudy->FldCaption());
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
		global $conn, $Language, $Security, $tbl_degrees;
		$rsnew = array();

		// degrees_level
		$tbl_degrees->degrees_level->SetDbValueDef($rsnew, $tbl_degrees->degrees_level->CurrentValue, NULL, FALSE);

		// degrees_disciplineCode
		$tbl_degrees->degrees_disciplineCode->SetDbValueDef($rsnew, $tbl_degrees->degrees_disciplineCode->CurrentValue, NULL, FALSE);

		// degrees_fieldOfStudy
		$tbl_degrees->degrees_fieldOfStudy->SetDbValueDef($rsnew, $tbl_degrees->degrees_fieldOfStudy->CurrentValue, NULL, FALSE);

		// degrees_wroteThesisDissertation
		$tbl_degrees->degrees_wroteThesisDissertation->SetDbValueDef($rsnew, $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue, NULL, FALSE);

		// degrees_primaryDegree
		$tbl_degrees->degrees_primaryDegree->SetDbValueDef($rsnew, $tbl_degrees->degrees_primaryDegree->CurrentValue, NULL, FALSE);

		// faculty_ID
		if ($tbl_degrees->faculty_ID->getSessionValue() <> "") {
			$rsnew['faculty_ID'] = $tbl_degrees->faculty_ID->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $tbl_degrees->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($tbl_degrees->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($tbl_degrees->CancelMessage <> "") {
				$this->setFailureMessage($tbl_degrees->CancelMessage);
				$tbl_degrees->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$tbl_degrees->degrees_ID->setDbValue($conn->Insert_ID());
			$rsnew['degrees_ID'] = $tbl_degrees->degrees_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$tbl_degrees->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_degrees;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "tbl_faculty") {
				$bValidMaster = TRUE;
				if (@$_GET["faculty_ID"] <> "") {
					$GLOBALS["tbl_faculty"]->faculty_ID->setQueryStringValue($_GET["faculty_ID"]);
					$tbl_degrees->faculty_ID->setQueryStringValue($GLOBALS["tbl_faculty"]->faculty_ID->QueryStringValue);
					$tbl_degrees->faculty_ID->setSessionValue($tbl_degrees->faculty_ID->QueryStringValue);
					if (!is_numeric($GLOBALS["tbl_faculty"]->faculty_ID->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$tbl_degrees->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$tbl_degrees->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "tbl_faculty") {
				if ($tbl_degrees->faculty_ID->QueryStringValue == "") $tbl_degrees->faculty_ID->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $tbl_degrees->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_degrees->getDetailFilter(); // Get detail filter
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_degrees';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $tbl_degrees;
		$table = 'tbl_degrees';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['degrees_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($tbl_degrees->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($tbl_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
