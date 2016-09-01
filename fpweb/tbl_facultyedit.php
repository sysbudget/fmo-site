<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_facultyinfo.php" ?>
<?php include_once "tbl_degreesinfo.php" ?>
<?php include_once "tbl_uporgchart_unitinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "tbl_degreesgridcls.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_faculty_edit = new ctbl_faculty_edit();
$Page =& $tbl_faculty_edit;

// Page init
$tbl_faculty_edit->Page_Init();

// Page main
$tbl_faculty_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_faculty_edit = new up_Page("tbl_faculty_edit");

// page properties
tbl_faculty_edit.PageID = "edit"; // page ID
tbl_faculty_edit.FormID = "ftbl_facultyedit"; // form ID
var UP_PAGE_ID = tbl_faculty_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_faculty_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_faculty_lastName"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_faculty->faculty_lastName->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_faculty_firstName"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_faculty->faculty_firstName->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_faculty_birthDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_faculty->faculty_birthDate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_gender_ID"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_faculty->gender_ID->FldCaption()) ?>");

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
tbl_faculty_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_faculty_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_faculty_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_faculty_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var up_DHTMLEditors = [];

//-->
</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-cold-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
//-->

</script>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_faculty->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_faculty->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_faculty_edit->ShowPageHeader(); ?>
<?php
$tbl_faculty_edit->ShowMessage();
?>
<form name="ftbl_facultyedit" id="ftbl_facultyedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return tbl_faculty_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="tbl_faculty">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_faculty->unitID->Visible) { // unitID ?>
	<tr id="r_unitID"<?php echo $tbl_faculty->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_faculty->unitID->FldCaption() ?></td>
		<td<?php echo $tbl_faculty->unitID->CellAttributes() ?>><span id="el_unitID">
<div<?php echo $tbl_faculty->unitID->ViewAttributes() ?>><?php echo $tbl_faculty->unitID->EditValue ?></div>
<input type="hidden" name="x_unitID" id="x_unitID" value="<?php echo up_HtmlEncode($tbl_faculty->unitID->CurrentValue) ?>">
</span><?php echo $tbl_faculty->unitID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_faculty->faculty_lastName->Visible) { // faculty_lastName ?>
	<tr id="r_faculty_lastName"<?php echo $tbl_faculty->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_faculty->faculty_lastName->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_faculty->faculty_lastName->CellAttributes() ?>><span id="el_faculty_lastName">
<input type="text" name="x_faculty_lastName" id="x_faculty_lastName" size="30" maxlength="255" value="<?php echo $tbl_faculty->faculty_lastName->EditValue ?>"<?php echo $tbl_faculty->faculty_lastName->EditAttributes() ?>>
</span><?php echo $tbl_faculty->faculty_lastName->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_faculty->faculty_firstName->Visible) { // faculty_firstName ?>
	<tr id="r_faculty_firstName"<?php echo $tbl_faculty->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_faculty->faculty_firstName->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_faculty->faculty_firstName->CellAttributes() ?>><span id="el_faculty_firstName">
<input type="text" name="x_faculty_firstName" id="x_faculty_firstName" size="30" maxlength="255" value="<?php echo $tbl_faculty->faculty_firstName->EditValue ?>"<?php echo $tbl_faculty->faculty_firstName->EditAttributes() ?>>
</span><?php echo $tbl_faculty->faculty_firstName->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_faculty->faculty_middleName->Visible) { // faculty_middleName ?>
	<tr id="r_faculty_middleName"<?php echo $tbl_faculty->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_faculty->faculty_middleName->FldCaption() ?></td>
		<td<?php echo $tbl_faculty->faculty_middleName->CellAttributes() ?>><span id="el_faculty_middleName">
<input type="text" name="x_faculty_middleName" id="x_faculty_middleName" size="30" maxlength="255" value="<?php echo $tbl_faculty->faculty_middleName->EditValue ?>"<?php echo $tbl_faculty->faculty_middleName->EditAttributes() ?>>
</span><?php echo $tbl_faculty->faculty_middleName->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_faculty->faculty_birthDate->Visible) { // faculty_birthDate ?>
	<tr id="r_faculty_birthDate"<?php echo $tbl_faculty->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_faculty->faculty_birthDate->FldCaption() ?></td>
		<td<?php echo $tbl_faculty->faculty_birthDate->CellAttributes() ?>><span id="el_faculty_birthDate">
<input type="text" name="x_faculty_birthDate" id="x_faculty_birthDate" value="<?php echo $tbl_faculty->faculty_birthDate->EditValue ?>"<?php echo $tbl_faculty->faculty_birthDate->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x_faculty_birthDate" name="cal_x_faculty_birthDate" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_faculty_birthDate", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x_faculty_birthDate" // button id
});
</script>
</span><?php echo $tbl_faculty->faculty_birthDate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_faculty->gender_ID->Visible) { // gender_ID ?>
	<tr id="r_gender_ID"<?php echo $tbl_faculty->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_faculty->gender_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_faculty->gender_ID->CellAttributes() ?>><span id="el_gender_ID">
<div id="tp_x_gender_ID" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_gender_ID" id="x_gender_ID" value="{value}"<?php echo $tbl_faculty->gender_ID->EditAttributes() ?>></label></div>
<div id="dsl_x_gender_ID" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_faculty->gender_ID->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_faculty->gender_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_gender_ID" id="x_gender_ID" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_faculty->gender_ID->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $tbl_faculty->gender_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_faculty->degreelevelFaculty_ID->Visible) { // degreelevelFaculty_ID ?>
	<tr id="r_degreelevelFaculty_ID"<?php echo $tbl_faculty->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_faculty->degreelevelFaculty_ID->FldCaption() ?></td>
		<td<?php echo $tbl_faculty->degreelevelFaculty_ID->CellAttributes() ?>><span id="el_degreelevelFaculty_ID">
<select id="x_degreelevelFaculty_ID" name="x_degreelevelFaculty_ID"<?php echo $tbl_faculty->degreelevelFaculty_ID->EditAttributes() ?>>
<?php
if (is_array($tbl_faculty->degreelevelFaculty_ID->EditValue)) {
	$arwrk = $tbl_faculty->degreelevelFaculty_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_faculty->degreelevelFaculty_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $tbl_faculty->degreelevelFaculty_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_faculty->faculty_isEnrolledOrInResidence->Visible) { // faculty_isEnrolledOrInResidence ?>
	<tr id="r_faculty_isEnrolledOrInResidence"<?php echo $tbl_faculty->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_faculty->faculty_isEnrolledOrInResidence->FldCaption() ?></td>
		<td<?php echo $tbl_faculty->faculty_isEnrolledOrInResidence->CellAttributes() ?>><span id="el_faculty_isEnrolledOrInResidence">
<select id="x_faculty_isEnrolledOrInResidence" name="x_faculty_isEnrolledOrInResidence"<?php echo $tbl_faculty->faculty_isEnrolledOrInResidence->EditAttributes() ?>>
<?php
if (is_array($tbl_faculty->faculty_isEnrolledOrInResidence->EditValue)) {
	$arwrk = $tbl_faculty->faculty_isEnrolledOrInResidence->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_faculty->faculty_isEnrolledOrInResidence->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $tbl_faculty->faculty_isEnrolledOrInResidence->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_faculty->faculty_hasEarnedCreditUnits->Visible) { // faculty_hasEarnedCreditUnits ?>
	<tr id="r_faculty_hasEarnedCreditUnits"<?php echo $tbl_faculty->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_faculty->faculty_hasEarnedCreditUnits->FldCaption() ?></td>
		<td<?php echo $tbl_faculty->faculty_hasEarnedCreditUnits->CellAttributes() ?>><span id="el_faculty_hasEarnedCreditUnits">
<select id="x_faculty_hasEarnedCreditUnits" name="x_faculty_hasEarnedCreditUnits"<?php echo $tbl_faculty->faculty_hasEarnedCreditUnits->EditAttributes() ?>>
<?php
if (is_array($tbl_faculty->faculty_hasEarnedCreditUnits->EditValue)) {
	$arwrk = $tbl_faculty->faculty_hasEarnedCreditUnits->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_faculty->faculty_hasEarnedCreditUnits->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $tbl_faculty->faculty_hasEarnedCreditUnits->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_faculty->faculty_candidate->Visible) { // faculty_candidate ?>
	<tr id="r_faculty_candidate"<?php echo $tbl_faculty->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_faculty->faculty_candidate->FldCaption() ?></td>
		<td<?php echo $tbl_faculty->faculty_candidate->CellAttributes() ?>><span id="el_faculty_candidate">
<select id="x_faculty_candidate" name="x_faculty_candidate"<?php echo $tbl_faculty->faculty_candidate->EditAttributes() ?>>
<?php
if (is_array($tbl_faculty->faculty_candidate->EditValue)) {
	$arwrk = $tbl_faculty->faculty_candidate->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_faculty->faculty_candidate->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $tbl_faculty->faculty_candidate->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_faculty_ID" id="x_faculty_ID" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_ID->CurrentValue) ?>">
<p>
<?php if ($tbl_faculty->getCurrentDetailTable() == "tbl_degrees" && $tbl_degrees->DetailEdit) { ?>
<br>
<?php include_once "tbl_degreesgrid.php" ?>
<br>
<?php } ?>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$tbl_faculty_edit->ShowPageFooter();
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
$tbl_faculty_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_faculty_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'tbl_faculty';

	// Page object name
	var $PageObjName = 'tbl_faculty_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_faculty;
		if ($tbl_faculty->UseTokenInUrl) $PageUrl .= "t=" . $tbl_faculty->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_faculty;
		if ($tbl_faculty->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_faculty->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_faculty->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_faculty_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_faculty)
		if (!isset($GLOBALS["tbl_faculty"])) {
			$GLOBALS["tbl_faculty"] = new ctbl_faculty();
			$GLOBALS["Table"] =& $GLOBALS["tbl_faculty"];
		}

		// Table object (tbl_degrees)
		if (!isset($GLOBALS['tbl_degrees'])) $GLOBALS['tbl_degrees'] = new ctbl_degrees();

		// Table object (tbl_uporgchart_unit)
		if (!isset($GLOBALS['tbl_uporgchart_unit'])) $GLOBALS['tbl_uporgchart_unit'] = new ctbl_uporgchart_unit();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_faculty', TRUE);

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
		global $tbl_faculty;

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
			$this->Page_Terminate("tbl_facultylist.php");
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
		global $objForm, $Language, $gsFormError, $tbl_faculty;

		// Load key from QueryString
		if (@$_GET["faculty_ID"] <> "")
			$tbl_faculty->faculty_ID->setQueryStringValue($_GET["faculty_ID"]);

		// Set up master detail parameters
		$this->SetUpMasterParms();
		if (@$_POST["a_edit"] <> "") {
			$tbl_faculty->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Set up detail parameters
			$this->SetUpDetailParms();

			// Validate form
			if (!$this->ValidateForm()) {
				$tbl_faculty->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$tbl_faculty->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$tbl_faculty->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($tbl_faculty->faculty_ID->CurrentValue == "")
			$this->Page_Terminate("tbl_facultylist.php"); // Invalid key, return to list

		// Set up detail parameters
		$this->SetUpDetailParms();
		switch ($tbl_faculty->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("tbl_facultylist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$tbl_faculty->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					if ($tbl_faculty->getCurrentDetailTable() <> "") // Master/detail edit
						$sReturnUrl = $tbl_faculty->getDetailUrl();
					else
						$sReturnUrl = $tbl_faculty->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$tbl_faculty->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$tbl_faculty->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$tbl_faculty->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_faculty;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_faculty;
		if (!$tbl_faculty->unitID->FldIsDetailKey) {
			$tbl_faculty->unitID->setFormValue($objForm->GetValue("x_unitID"));
		}
		if (!$tbl_faculty->faculty_lastName->FldIsDetailKey) {
			$tbl_faculty->faculty_lastName->setFormValue($objForm->GetValue("x_faculty_lastName"));
		}
		if (!$tbl_faculty->faculty_firstName->FldIsDetailKey) {
			$tbl_faculty->faculty_firstName->setFormValue($objForm->GetValue("x_faculty_firstName"));
		}
		if (!$tbl_faculty->faculty_middleName->FldIsDetailKey) {
			$tbl_faculty->faculty_middleName->setFormValue($objForm->GetValue("x_faculty_middleName"));
		}
		if (!$tbl_faculty->faculty_birthDate->FldIsDetailKey) {
			$tbl_faculty->faculty_birthDate->setFormValue($objForm->GetValue("x_faculty_birthDate"));
			$tbl_faculty->faculty_birthDate->CurrentValue = up_UnFormatDateTime($tbl_faculty->faculty_birthDate->CurrentValue, 6);
		}
		if (!$tbl_faculty->gender_ID->FldIsDetailKey) {
			$tbl_faculty->gender_ID->setFormValue($objForm->GetValue("x_gender_ID"));
		}
		if (!$tbl_faculty->degreelevelFaculty_ID->FldIsDetailKey) {
			$tbl_faculty->degreelevelFaculty_ID->setFormValue($objForm->GetValue("x_degreelevelFaculty_ID"));
		}
		if (!$tbl_faculty->faculty_isEnrolledOrInResidence->FldIsDetailKey) {
			$tbl_faculty->faculty_isEnrolledOrInResidence->setFormValue($objForm->GetValue("x_faculty_isEnrolledOrInResidence"));
		}
		if (!$tbl_faculty->faculty_hasEarnedCreditUnits->FldIsDetailKey) {
			$tbl_faculty->faculty_hasEarnedCreditUnits->setFormValue($objForm->GetValue("x_faculty_hasEarnedCreditUnits"));
		}
		if (!$tbl_faculty->faculty_candidate->FldIsDetailKey) {
			$tbl_faculty->faculty_candidate->setFormValue($objForm->GetValue("x_faculty_candidate"));
		}
		if (!$tbl_faculty->faculty_ID->FldIsDetailKey)
			$tbl_faculty->faculty_ID->setFormValue($objForm->GetValue("x_faculty_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_faculty;
		$this->LoadRow();
		$tbl_faculty->faculty_ID->CurrentValue = $tbl_faculty->faculty_ID->FormValue;
		$tbl_faculty->unitID->CurrentValue = $tbl_faculty->unitID->FormValue;
		$tbl_faculty->faculty_lastName->CurrentValue = $tbl_faculty->faculty_lastName->FormValue;
		$tbl_faculty->faculty_firstName->CurrentValue = $tbl_faculty->faculty_firstName->FormValue;
		$tbl_faculty->faculty_middleName->CurrentValue = $tbl_faculty->faculty_middleName->FormValue;
		$tbl_faculty->faculty_birthDate->CurrentValue = $tbl_faculty->faculty_birthDate->FormValue;
		$tbl_faculty->faculty_birthDate->CurrentValue = up_UnFormatDateTime($tbl_faculty->faculty_birthDate->CurrentValue, 6);
		$tbl_faculty->gender_ID->CurrentValue = $tbl_faculty->gender_ID->FormValue;
		$tbl_faculty->degreelevelFaculty_ID->CurrentValue = $tbl_faculty->degreelevelFaculty_ID->FormValue;
		$tbl_faculty->faculty_isEnrolledOrInResidence->CurrentValue = $tbl_faculty->faculty_isEnrolledOrInResidence->FormValue;
		$tbl_faculty->faculty_hasEarnedCreditUnits->CurrentValue = $tbl_faculty->faculty_hasEarnedCreditUnits->FormValue;
		$tbl_faculty->faculty_candidate->CurrentValue = $tbl_faculty->faculty_candidate->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_faculty;
		$sFilter = $tbl_faculty->KeyFilter();

		// Call Row Selecting event
		$tbl_faculty->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_faculty->CurrentFilter = $sFilter;
		$sSql = $tbl_faculty->SQL();
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
		global $conn, $tbl_faculty;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_faculty->Row_Selected($row);
		$tbl_faculty->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$tbl_faculty->unitID->setDbValue($rs->fields('unitID'));
		$tbl_faculty->faculty_name->setDbValue($rs->fields('faculty_name'));
		$tbl_faculty->faculty_lastName->setDbValue($rs->fields('faculty_lastName'));
		$tbl_faculty->faculty_firstName->setDbValue($rs->fields('faculty_firstName'));
		$tbl_faculty->faculty_middleName->setDbValue($rs->fields('faculty_middleName'));
		$tbl_faculty->faculty_birthDate->setDbValue($rs->fields('faculty_birthDate'));
		$tbl_faculty->gender_ID->setDbValue($rs->fields('gender_ID'));
		$tbl_faculty->faculty_hda_gen->setDbValue($rs->fields('faculty_hda_gen'));
		$tbl_faculty->faculty_inActivePursuitofHigherDegree_gen->setDbValue($rs->fields('faculty_inActivePursuitofHigherDegree_gen'));
		$tbl_faculty->faculty_highestDegreeListed->setDbValue($rs->fields('faculty_highestDegreeListed'));
		$tbl_faculty->degreelevelFaculty_ID->setDbValue($rs->fields('degreelevelFaculty_ID'));
		$tbl_faculty->faculty_isEnrolledOrInResidence->setDbValue($rs->fields('faculty_isEnrolledOrInResidence'));
		$tbl_faculty->faculty_hasEarnedCreditUnits->setDbValue($rs->fields('faculty_hasEarnedCreditUnits'));
		$tbl_faculty->faculty_candidate->setDbValue($rs->fields('faculty_candidate'));
		$tbl_faculty->faculty_authoritative_data->setDbValue($rs->fields('faculty_authoritative_data'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_faculty;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_faculty->Row_Rendering();

		// Common render codes for all row types
		// faculty_ID
		// unitID
		// faculty_name
		// faculty_lastName
		// faculty_firstName
		// faculty_middleName
		// faculty_birthDate
		// gender_ID
		// faculty_hda_gen
		// faculty_inActivePursuitofHigherDegree_gen
		// faculty_highestDegreeListed
		// degreelevelFaculty_ID
		// faculty_isEnrolledOrInResidence
		// faculty_hasEarnedCreditUnits
		// faculty_candidate
		// faculty_authoritative_data

		if ($tbl_faculty->RowType == UP_ROWTYPE_VIEW) { // View row

			// unitID
			$tbl_faculty->unitID->ViewValue = $tbl_faculty->unitID->CurrentValue;
			if (strval($tbl_faculty->unitID->CurrentValue) <> "") {
				$sFilterWrk = "`unitID` = " . up_AdjustSql($tbl_faculty->unitID->CurrentValue) . "";
			$sSqlWrk = "SELECT `nameOfUnit` FROM `tbl_uporgchart_unit`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_faculty->unitID->ViewValue = $rswrk->fields('nameOfUnit');
					$rswrk->Close();
				} else {
					$tbl_faculty->unitID->ViewValue = $tbl_faculty->unitID->CurrentValue;
				}
			} else {
				$tbl_faculty->unitID->ViewValue = NULL;
			}
			$tbl_faculty->unitID->ViewCustomAttributes = "";

			// faculty_name
			$tbl_faculty->faculty_name->ViewValue = $tbl_faculty->faculty_name->CurrentValue;
			$tbl_faculty->faculty_name->ViewCustomAttributes = "";

			// faculty_lastName
			$tbl_faculty->faculty_lastName->ViewValue = $tbl_faculty->faculty_lastName->CurrentValue;
			$tbl_faculty->faculty_lastName->ViewCustomAttributes = "";

			// faculty_firstName
			$tbl_faculty->faculty_firstName->ViewValue = $tbl_faculty->faculty_firstName->CurrentValue;
			$tbl_faculty->faculty_firstName->ViewCustomAttributes = "";

			// faculty_middleName
			$tbl_faculty->faculty_middleName->ViewValue = $tbl_faculty->faculty_middleName->CurrentValue;
			$tbl_faculty->faculty_middleName->ViewCustomAttributes = "";

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->ViewValue = $tbl_faculty->faculty_birthDate->CurrentValue;
			$tbl_faculty->faculty_birthDate->ViewValue = up_FormatDateTime($tbl_faculty->faculty_birthDate->ViewValue, 6);
			$tbl_faculty->faculty_birthDate->ViewCustomAttributes = "";

			// gender_ID
			if (strval($tbl_faculty->gender_ID->CurrentValue) <> "") {
				switch ($tbl_faculty->gender_ID->CurrentValue) {
					case "F":
						$tbl_faculty->gender_ID->ViewValue = $tbl_faculty->gender_ID->FldTagCaption(1) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(1) : $tbl_faculty->gender_ID->CurrentValue;
						break;
					case "M":
						$tbl_faculty->gender_ID->ViewValue = $tbl_faculty->gender_ID->FldTagCaption(2) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(2) : $tbl_faculty->gender_ID->CurrentValue;
						break;
					default:
						$tbl_faculty->gender_ID->ViewValue = $tbl_faculty->gender_ID->CurrentValue;
				}
			} else {
				$tbl_faculty->gender_ID->ViewValue = NULL;
			}
			$tbl_faculty->gender_ID->ViewCustomAttributes = "";

			// faculty_highestDegreeListed
			$tbl_faculty->faculty_highestDegreeListed->ViewValue = $tbl_faculty->faculty_highestDegreeListed->CurrentValue;
			if (strval($tbl_faculty->faculty_highestDegreeListed->CurrentValue) <> "") {
				$sFilterWrk = "`degreeLevel_ID` = " . up_AdjustSql($tbl_faculty->faculty_highestDegreeListed->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreeLevel_name` FROM `ref_degreelevel_degrees`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_faculty->faculty_highestDegreeListed->ViewValue = $rswrk->fields('degreeLevel_name');
					$rswrk->Close();
				} else {
					$tbl_faculty->faculty_highestDegreeListed->ViewValue = $tbl_faculty->faculty_highestDegreeListed->CurrentValue;
				}
			} else {
				$tbl_faculty->faculty_highestDegreeListed->ViewValue = NULL;
			}
			$tbl_faculty->faculty_highestDegreeListed->ViewCustomAttributes = "";

			// degreelevelFaculty_ID
			if (strval($tbl_faculty->degreelevelFaculty_ID->CurrentValue) <> "") {
				$sFilterWrk = "`degreelevelFaculty_ID` = " . up_AdjustSql($tbl_faculty->degreelevelFaculty_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreelevelFaculty_name` FROM `ref_degreelevel_faculty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `degreelevelFaculty_name` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_faculty->degreelevelFaculty_ID->ViewValue = $rswrk->fields('degreelevelFaculty_name');
					$rswrk->Close();
				} else {
					$tbl_faculty->degreelevelFaculty_ID->ViewValue = $tbl_faculty->degreelevelFaculty_ID->CurrentValue;
				}
			} else {
				$tbl_faculty->degreelevelFaculty_ID->ViewValue = NULL;
			}
			$tbl_faculty->degreelevelFaculty_ID->ViewCustomAttributes = "";

			// faculty_isEnrolledOrInResidence
			if (strval($tbl_faculty->faculty_isEnrolledOrInResidence->CurrentValue) <> "") {
				switch ($tbl_faculty->faculty_isEnrolledOrInResidence->CurrentValue) {
					case "Y":
						$tbl_faculty->faculty_isEnrolledOrInResidence->ViewValue = $tbl_faculty->faculty_isEnrolledOrInResidence->FldTagCaption(1) <> "" ? $tbl_faculty->faculty_isEnrolledOrInResidence->FldTagCaption(1) : $tbl_faculty->faculty_isEnrolledOrInResidence->CurrentValue;
						break;
					case "N":
						$tbl_faculty->faculty_isEnrolledOrInResidence->ViewValue = $tbl_faculty->faculty_isEnrolledOrInResidence->FldTagCaption(2) <> "" ? $tbl_faculty->faculty_isEnrolledOrInResidence->FldTagCaption(2) : $tbl_faculty->faculty_isEnrolledOrInResidence->CurrentValue;
						break;
					default:
						$tbl_faculty->faculty_isEnrolledOrInResidence->ViewValue = $tbl_faculty->faculty_isEnrolledOrInResidence->CurrentValue;
				}
			} else {
				$tbl_faculty->faculty_isEnrolledOrInResidence->ViewValue = NULL;
			}
			$tbl_faculty->faculty_isEnrolledOrInResidence->ViewCustomAttributes = "";

			// faculty_hasEarnedCreditUnits
			if (strval($tbl_faculty->faculty_hasEarnedCreditUnits->CurrentValue) <> "") {
				switch ($tbl_faculty->faculty_hasEarnedCreditUnits->CurrentValue) {
					case "Y":
						$tbl_faculty->faculty_hasEarnedCreditUnits->ViewValue = $tbl_faculty->faculty_hasEarnedCreditUnits->FldTagCaption(1) <> "" ? $tbl_faculty->faculty_hasEarnedCreditUnits->FldTagCaption(1) : $tbl_faculty->faculty_hasEarnedCreditUnits->CurrentValue;
						break;
					case "N":
						$tbl_faculty->faculty_hasEarnedCreditUnits->ViewValue = $tbl_faculty->faculty_hasEarnedCreditUnits->FldTagCaption(2) <> "" ? $tbl_faculty->faculty_hasEarnedCreditUnits->FldTagCaption(2) : $tbl_faculty->faculty_hasEarnedCreditUnits->CurrentValue;
						break;
					default:
						$tbl_faculty->faculty_hasEarnedCreditUnits->ViewValue = $tbl_faculty->faculty_hasEarnedCreditUnits->CurrentValue;
				}
			} else {
				$tbl_faculty->faculty_hasEarnedCreditUnits->ViewValue = NULL;
			}
			$tbl_faculty->faculty_hasEarnedCreditUnits->ViewCustomAttributes = "";

			// faculty_candidate
			if (strval($tbl_faculty->faculty_candidate->CurrentValue) <> "") {
				switch ($tbl_faculty->faculty_candidate->CurrentValue) {
					case "Y":
						$tbl_faculty->faculty_candidate->ViewValue = $tbl_faculty->faculty_candidate->FldTagCaption(1) <> "" ? $tbl_faculty->faculty_candidate->FldTagCaption(1) : $tbl_faculty->faculty_candidate->CurrentValue;
						break;
					case "N":
						$tbl_faculty->faculty_candidate->ViewValue = $tbl_faculty->faculty_candidate->FldTagCaption(2) <> "" ? $tbl_faculty->faculty_candidate->FldTagCaption(2) : $tbl_faculty->faculty_candidate->CurrentValue;
						break;
					default:
						$tbl_faculty->faculty_candidate->ViewValue = $tbl_faculty->faculty_candidate->CurrentValue;
				}
			} else {
				$tbl_faculty->faculty_candidate->ViewValue = NULL;
			}
			$tbl_faculty->faculty_candidate->ViewCustomAttributes = "";

			// unitID
			$tbl_faculty->unitID->LinkCustomAttributes = "";
			$tbl_faculty->unitID->HrefValue = "";
			$tbl_faculty->unitID->TooltipValue = "";

			// faculty_lastName
			$tbl_faculty->faculty_lastName->LinkCustomAttributes = "";
			$tbl_faculty->faculty_lastName->HrefValue = "";
			$tbl_faculty->faculty_lastName->TooltipValue = "";

			// faculty_firstName
			$tbl_faculty->faculty_firstName->LinkCustomAttributes = "";
			$tbl_faculty->faculty_firstName->HrefValue = "";
			$tbl_faculty->faculty_firstName->TooltipValue = "";

			// faculty_middleName
			$tbl_faculty->faculty_middleName->LinkCustomAttributes = "";
			$tbl_faculty->faculty_middleName->HrefValue = "";
			$tbl_faculty->faculty_middleName->TooltipValue = "";

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->LinkCustomAttributes = "";
			$tbl_faculty->faculty_birthDate->HrefValue = "";
			$tbl_faculty->faculty_birthDate->TooltipValue = "";

			// gender_ID
			$tbl_faculty->gender_ID->LinkCustomAttributes = "";
			$tbl_faculty->gender_ID->HrefValue = "";
			$tbl_faculty->gender_ID->TooltipValue = "";

			// degreelevelFaculty_ID
			$tbl_faculty->degreelevelFaculty_ID->LinkCustomAttributes = "";
			$tbl_faculty->degreelevelFaculty_ID->HrefValue = "";
			$tbl_faculty->degreelevelFaculty_ID->TooltipValue = "";

			// faculty_isEnrolledOrInResidence
			$tbl_faculty->faculty_isEnrolledOrInResidence->LinkCustomAttributes = "";
			$tbl_faculty->faculty_isEnrolledOrInResidence->HrefValue = "";
			$tbl_faculty->faculty_isEnrolledOrInResidence->TooltipValue = "";

			// faculty_hasEarnedCreditUnits
			$tbl_faculty->faculty_hasEarnedCreditUnits->LinkCustomAttributes = "";
			$tbl_faculty->faculty_hasEarnedCreditUnits->HrefValue = "";
			$tbl_faculty->faculty_hasEarnedCreditUnits->TooltipValue = "";

			// faculty_candidate
			$tbl_faculty->faculty_candidate->LinkCustomAttributes = "";
			$tbl_faculty->faculty_candidate->HrefValue = "";
			$tbl_faculty->faculty_candidate->TooltipValue = "";
		} elseif ($tbl_faculty->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// unitID
			$tbl_faculty->unitID->EditCustomAttributes = "";
			$tbl_faculty->unitID->EditValue = $tbl_faculty->unitID->CurrentValue;
			if (strval($tbl_faculty->unitID->CurrentValue) <> "") {
				$sFilterWrk = "`unitID` = " . up_AdjustSql($tbl_faculty->unitID->CurrentValue) . "";
			$sSqlWrk = "SELECT `nameOfUnit` FROM `tbl_uporgchart_unit`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_faculty->unitID->EditValue = $rswrk->fields('nameOfUnit');
					$rswrk->Close();
				} else {
					$tbl_faculty->unitID->EditValue = $tbl_faculty->unitID->CurrentValue;
				}
			} else {
				$tbl_faculty->unitID->EditValue = NULL;
			}
			$tbl_faculty->unitID->ViewCustomAttributes = "";

			// faculty_lastName
			$tbl_faculty->faculty_lastName->EditCustomAttributes = "";
			$tbl_faculty->faculty_lastName->EditValue = up_HtmlEncode($tbl_faculty->faculty_lastName->CurrentValue);

			// faculty_firstName
			$tbl_faculty->faculty_firstName->EditCustomAttributes = "";
			$tbl_faculty->faculty_firstName->EditValue = up_HtmlEncode($tbl_faculty->faculty_firstName->CurrentValue);

			// faculty_middleName
			$tbl_faculty->faculty_middleName->EditCustomAttributes = "";
			$tbl_faculty->faculty_middleName->EditValue = up_HtmlEncode($tbl_faculty->faculty_middleName->CurrentValue);

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->EditCustomAttributes = "";
			$tbl_faculty->faculty_birthDate->EditValue = up_HtmlEncode(up_FormatDateTime($tbl_faculty->faculty_birthDate->CurrentValue, 6));

			// gender_ID
			$tbl_faculty->gender_ID->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("F", $tbl_faculty->gender_ID->FldTagCaption(1) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(1) : "F");
			$arwrk[] = array("M", $tbl_faculty->gender_ID->FldTagCaption(2) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(2) : "M");
			$tbl_faculty->gender_ID->EditValue = $arwrk;

			// degreelevelFaculty_ID
			$tbl_faculty->degreelevelFaculty_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `degreelevelFaculty_ID`, `degreelevelFaculty_name` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `ref_degreelevel_faculty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `degreelevelFaculty_name` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_faculty->degreelevelFaculty_ID->EditValue = $arwrk;

			// faculty_isEnrolledOrInResidence
			$tbl_faculty->faculty_isEnrolledOrInResidence->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $tbl_faculty->faculty_isEnrolledOrInResidence->FldTagCaption(1) <> "" ? $tbl_faculty->faculty_isEnrolledOrInResidence->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $tbl_faculty->faculty_isEnrolledOrInResidence->FldTagCaption(2) <> "" ? $tbl_faculty->faculty_isEnrolledOrInResidence->FldTagCaption(2) : "N");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_faculty->faculty_isEnrolledOrInResidence->EditValue = $arwrk;

			// faculty_hasEarnedCreditUnits
			$tbl_faculty->faculty_hasEarnedCreditUnits->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $tbl_faculty->faculty_hasEarnedCreditUnits->FldTagCaption(1) <> "" ? $tbl_faculty->faculty_hasEarnedCreditUnits->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $tbl_faculty->faculty_hasEarnedCreditUnits->FldTagCaption(2) <> "" ? $tbl_faculty->faculty_hasEarnedCreditUnits->FldTagCaption(2) : "N");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_faculty->faculty_hasEarnedCreditUnits->EditValue = $arwrk;

			// faculty_candidate
			$tbl_faculty->faculty_candidate->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $tbl_faculty->faculty_candidate->FldTagCaption(1) <> "" ? $tbl_faculty->faculty_candidate->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $tbl_faculty->faculty_candidate->FldTagCaption(2) <> "" ? $tbl_faculty->faculty_candidate->FldTagCaption(2) : "N");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_faculty->faculty_candidate->EditValue = $arwrk;

			// Edit refer script
			// unitID

			$tbl_faculty->unitID->HrefValue = "";

			// faculty_lastName
			$tbl_faculty->faculty_lastName->HrefValue = "";

			// faculty_firstName
			$tbl_faculty->faculty_firstName->HrefValue = "";

			// faculty_middleName
			$tbl_faculty->faculty_middleName->HrefValue = "";

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->HrefValue = "";

			// gender_ID
			$tbl_faculty->gender_ID->HrefValue = "";

			// degreelevelFaculty_ID
			$tbl_faculty->degreelevelFaculty_ID->HrefValue = "";

			// faculty_isEnrolledOrInResidence
			$tbl_faculty->faculty_isEnrolledOrInResidence->HrefValue = "";

			// faculty_hasEarnedCreditUnits
			$tbl_faculty->faculty_hasEarnedCreditUnits->HrefValue = "";

			// faculty_candidate
			$tbl_faculty->faculty_candidate->HrefValue = "";
		}
		if ($tbl_faculty->RowType == UP_ROWTYPE_ADD ||
			$tbl_faculty->RowType == UP_ROWTYPE_EDIT ||
			$tbl_faculty->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_faculty->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_faculty->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_faculty->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_faculty;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($tbl_faculty->faculty_lastName->FormValue) && $tbl_faculty->faculty_lastName->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_faculty->faculty_lastName->FldCaption());
		}
		if (!is_null($tbl_faculty->faculty_firstName->FormValue) && $tbl_faculty->faculty_firstName->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_faculty->faculty_firstName->FldCaption());
		}
		if (!up_CheckUSDate($tbl_faculty->faculty_birthDate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_faculty->faculty_birthDate->FldErrMsg());
		}
		if ($tbl_faculty->gender_ID->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_faculty->gender_ID->FldCaption());
		}

		// Validate detail grid
		if ($tbl_faculty->getCurrentDetailTable() == "tbl_degrees" && $GLOBALS["tbl_degrees"]->DetailEdit) {
			$tbl_degrees_grid = new ctbl_degrees_grid(); // get detail page object
			$tbl_degrees_grid->ValidateGridForm();
			$tbl_degrees_grid = NULL;
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
		global $conn, $Security, $Language, $tbl_faculty;
		$sFilter = $tbl_faculty->KeyFilter();
		$tbl_faculty->CurrentFilter = $sFilter;
		$sSql = $tbl_faculty->SQL();
		$conn->raiseErrorFn = 'up_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Begin transaction
			if ($tbl_faculty->getCurrentDetailTable() <> "")
				$conn->BeginTrans();

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// faculty_lastName
			$tbl_faculty->faculty_lastName->SetDbValueDef($rsnew, $tbl_faculty->faculty_lastName->CurrentValue, NULL, $tbl_faculty->faculty_lastName->ReadOnly);

			// faculty_firstName
			$tbl_faculty->faculty_firstName->SetDbValueDef($rsnew, $tbl_faculty->faculty_firstName->CurrentValue, NULL, $tbl_faculty->faculty_firstName->ReadOnly);

			// faculty_middleName
			$tbl_faculty->faculty_middleName->SetDbValueDef($rsnew, $tbl_faculty->faculty_middleName->CurrentValue, NULL, $tbl_faculty->faculty_middleName->ReadOnly);

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->SetDbValueDef($rsnew, up_UnFormatDateTime($tbl_faculty->faculty_birthDate->CurrentValue, 6), NULL, $tbl_faculty->faculty_birthDate->ReadOnly);

			// gender_ID
			$tbl_faculty->gender_ID->SetDbValueDef($rsnew, $tbl_faculty->gender_ID->CurrentValue, NULL, $tbl_faculty->gender_ID->ReadOnly);

			// degreelevelFaculty_ID
			$tbl_faculty->degreelevelFaculty_ID->SetDbValueDef($rsnew, $tbl_faculty->degreelevelFaculty_ID->CurrentValue, NULL, $tbl_faculty->degreelevelFaculty_ID->ReadOnly);

			// faculty_isEnrolledOrInResidence
			$tbl_faculty->faculty_isEnrolledOrInResidence->SetDbValueDef($rsnew, $tbl_faculty->faculty_isEnrolledOrInResidence->CurrentValue, NULL, $tbl_faculty->faculty_isEnrolledOrInResidence->ReadOnly);

			// faculty_hasEarnedCreditUnits
			$tbl_faculty->faculty_hasEarnedCreditUnits->SetDbValueDef($rsnew, $tbl_faculty->faculty_hasEarnedCreditUnits->CurrentValue, NULL, $tbl_faculty->faculty_hasEarnedCreditUnits->ReadOnly);

			// faculty_candidate
			$tbl_faculty->faculty_candidate->SetDbValueDef($rsnew, $tbl_faculty->faculty_candidate->CurrentValue, NULL, $tbl_faculty->faculty_candidate->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $tbl_faculty->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($tbl_faculty->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';

				// Update detail records
				if ($EditRow) {
					if ($tbl_faculty->getCurrentDetailTable() == "tbl_degrees" && $GLOBALS["tbl_degrees"]->DetailEdit) {
						$tbl_degrees_grid = new ctbl_degrees_grid(); // get detail page object
						$EditRow = $tbl_degrees_grid->GridUpdate();
						$tbl_degrees_grid = NULL;
					}
				}

				// Commit/Rollback transaction
				if ($tbl_faculty->getCurrentDetailTable() <> "") {
					if ($EditRow) {
						$conn->CommitTrans(); // Commit transaction
					} else {
						$conn->RollbackTrans(); // Rollback transaction
					}
				}
			} else {
				if ($tbl_faculty->CancelMessage <> "") {
					$this->setFailureMessage($tbl_faculty->CancelMessage);
					$tbl_faculty->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_faculty->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_faculty;
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
					$tbl_faculty->unitID->setQueryStringValue($GLOBALS["tbl_uporgchart_unit"]->unitID->QueryStringValue);
					$tbl_faculty->unitID->setSessionValue($tbl_faculty->unitID->QueryStringValue);
					if (!is_numeric($GLOBALS["tbl_uporgchart_unit"]->unitID->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$tbl_faculty->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$tbl_faculty->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "tbl_uporgchart_unit") {
				if ($tbl_faculty->unitID->QueryStringValue == "") $tbl_faculty->unitID->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $tbl_faculty->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_faculty->getDetailFilter(); // Get detail filter
	}

	// Set up detail parms based on QueryString
	function SetUpDetailParms() {
		global $tbl_faculty;
		$bValidDetail = FALSE;

		// Get the keys for master table
		if (isset($_GET[UP_TABLE_SHOW_DETAIL])) {
			$sDetailTblVar = $_GET[UP_TABLE_SHOW_DETAIL];
			$tbl_faculty->setCurrentDetailTable($sDetailTblVar);
		} else {
			$sDetailTblVar = $tbl_faculty->getCurrentDetailTable();
		}
		if ($sDetailTblVar <> "") {
			if ($sDetailTblVar == "tbl_degrees") {
				if (!isset($GLOBALS["tbl_degrees"]))
					$GLOBALS["tbl_degrees"] = new ctbl_degrees;
				if ($GLOBALS["tbl_degrees"]->DetailEdit) {
					$GLOBALS["tbl_degrees"]->CurrentMode = "edit";
					$GLOBALS["tbl_degrees"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["tbl_degrees"]->setCurrentMasterTable($tbl_faculty->TableVar);
					$GLOBALS["tbl_degrees"]->setStartRecordNumber(1);
					$GLOBALS["tbl_degrees"]->faculty_ID->FldIsDetailKey = TRUE;
					$GLOBALS["tbl_degrees"]->faculty_ID->CurrentValue = $tbl_faculty->faculty_ID->CurrentValue;
					$GLOBALS["tbl_degrees"]->faculty_ID->setSessionValue($GLOBALS["tbl_degrees"]->faculty_ID->CurrentValue);
				}
			}
		}
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_faculty';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $tbl_faculty;
		$table = 'tbl_faculty';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['faculty_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($tbl_faculty->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($tbl_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($tbl_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
