<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_fp_unitsinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_fp_units_add = new cfrm_fp_units_add();
$Page =& $frm_fp_units_add;

// Page init
$frm_fp_units_add->Page_Init();

// Page main
$frm_fp_units_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_units_add = new up_Page("frm_fp_units_add");

// page properties
frm_fp_units_add.PageID = "add"; // page ID
frm_fp_units_add.FormID = "ffrm_fp_unitsadd"; // form ID
var UP_PAGE_ID = frm_fp_units_add.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_fp_units_add.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_personnel_count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_units->personnel_count->FldErrMsg()) ?>");

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
frm_fp_units_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_units_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_units_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_units_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_units->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_fp_units->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_fp_units_add->ShowPageHeader(); ?>
<?php
$frm_fp_units_add->ShowMessage();
?>
<form name="ffrm_fp_unitsadd" id="ffrm_fp_unitsadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return frm_fp_units_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="frm_fp_units">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_fp_units->unit_name->Visible) { // unit_name ?>
	<tr id="r_unit_name"<?php echo $frm_fp_units->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units->unit_name->FldCaption() ?></td>
		<td<?php echo $frm_fp_units->unit_name->CellAttributes() ?>><span id="el_unit_name">
<input type="text" name="x_unit_name" id="x_unit_name" size="30" maxlength="255" value="<?php echo $frm_fp_units->unit_name->EditValue ?>"<?php echo $frm_fp_units->unit_name->EditAttributes() ?>>
</span><?php echo $frm_fp_units->unit_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units->personnel_count->Visible) { // personnel_count ?>
	<tr id="r_personnel_count"<?php echo $frm_fp_units->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units->personnel_count->FldCaption() ?></td>
		<td<?php echo $frm_fp_units->personnel_count->CellAttributes() ?>><span id="el_personnel_count">
<input type="text" name="x_personnel_count" id="x_personnel_count" size="30" value="<?php echo $frm_fp_units->personnel_count->EditValue ?>"<?php echo $frm_fp_units->personnel_count->EditAttributes() ?>>
</span><?php echo $frm_fp_units->personnel_count->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units->mfo_1->Visible) { // mfo_1 ?>
	<tr id="r_mfo_1"<?php echo $frm_fp_units->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units->mfo_1->FldCaption() ?></td>
		<td<?php echo $frm_fp_units->mfo_1->CellAttributes() ?>><span id="el_mfo_1">
<div id="tp_x_mfo_1" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_mfo_1" id="x_mfo_1" value="{value}"<?php echo $frm_fp_units->mfo_1->EditAttributes() ?>></label></div>
<div id="dsl_x_mfo_1" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_fp_units->mfo_1->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_fp_units->mfo_1->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_mfo_1" id="x_mfo_1" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_fp_units->mfo_1->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $frm_fp_units->mfo_1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units->mfo_2->Visible) { // mfo_2 ?>
	<tr id="r_mfo_2"<?php echo $frm_fp_units->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units->mfo_2->FldCaption() ?></td>
		<td<?php echo $frm_fp_units->mfo_2->CellAttributes() ?>><span id="el_mfo_2">
<div id="tp_x_mfo_2" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_mfo_2" id="x_mfo_2" value="{value}"<?php echo $frm_fp_units->mfo_2->EditAttributes() ?>></label></div>
<div id="dsl_x_mfo_2" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_fp_units->mfo_2->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_fp_units->mfo_2->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_mfo_2" id="x_mfo_2" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_fp_units->mfo_2->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $frm_fp_units->mfo_2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units->mfo_3->Visible) { // mfo_3 ?>
	<tr id="r_mfo_3"<?php echo $frm_fp_units->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units->mfo_3->FldCaption() ?></td>
		<td<?php echo $frm_fp_units->mfo_3->CellAttributes() ?>><span id="el_mfo_3">
<div id="tp_x_mfo_3" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_mfo_3" id="x_mfo_3" value="{value}"<?php echo $frm_fp_units->mfo_3->EditAttributes() ?>></label></div>
<div id="dsl_x_mfo_3" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_fp_units->mfo_3->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_fp_units->mfo_3->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_mfo_3" id="x_mfo_3" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_fp_units->mfo_3->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $frm_fp_units->mfo_3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units->mfo_4->Visible) { // mfo_4 ?>
	<tr id="r_mfo_4"<?php echo $frm_fp_units->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units->mfo_4->FldCaption() ?></td>
		<td<?php echo $frm_fp_units->mfo_4->CellAttributes() ?>><span id="el_mfo_4">
<div id="tp_x_mfo_4" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_mfo_4" id="x_mfo_4" value="{value}"<?php echo $frm_fp_units->mfo_4->EditAttributes() ?>></label></div>
<div id="dsl_x_mfo_4" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_fp_units->mfo_4->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_fp_units->mfo_4->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_mfo_4" id="x_mfo_4" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_fp_units->mfo_4->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $frm_fp_units->mfo_4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units->mfo_5->Visible) { // mfo_5 ?>
	<tr id="r_mfo_5"<?php echo $frm_fp_units->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units->mfo_5->FldCaption() ?></td>
		<td<?php echo $frm_fp_units->mfo_5->CellAttributes() ?>><span id="el_mfo_5">
<div id="tp_x_mfo_5" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_mfo_5" id="x_mfo_5" value="{value}"<?php echo $frm_fp_units->mfo_5->EditAttributes() ?>></label></div>
<div id="dsl_x_mfo_5" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_fp_units->mfo_5->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_fp_units->mfo_5->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_mfo_5" id="x_mfo_5" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_fp_units->mfo_5->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $frm_fp_units->mfo_5->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units->sto->Visible) { // sto ?>
	<tr id="r_sto"<?php echo $frm_fp_units->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units->sto->FldCaption() ?></td>
		<td<?php echo $frm_fp_units->sto->CellAttributes() ?>><span id="el_sto">
<div id="tp_x_sto" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_sto" id="x_sto" value="{value}"<?php echo $frm_fp_units->sto->EditAttributes() ?>></label></div>
<div id="dsl_x_sto" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_fp_units->sto->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_fp_units->sto->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_sto" id="x_sto" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_fp_units->sto->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $frm_fp_units->sto->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units->gass->Visible) { // gass ?>
	<tr id="r_gass"<?php echo $frm_fp_units->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units->gass->FldCaption() ?></td>
		<td<?php echo $frm_fp_units->gass->CellAttributes() ?>><span id="el_gass">
<div id="tp_x_gass" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_gass" id="x_gass" value="{value}"<?php echo $frm_fp_units->gass->EditAttributes() ?>></label></div>
<div id="dsl_x_gass" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_fp_units->gass->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_fp_units->gass->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_gass" id="x_gass" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_fp_units->gass->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $frm_fp_units->gass->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$frm_fp_units_add->ShowPageFooter();
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
$frm_fp_units_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_units_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'frm_fp_units';

	// Page object name
	var $PageObjName = 'frm_fp_units_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_units;
		if ($frm_fp_units->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_units->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_units;
		if ($frm_fp_units->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_units->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_units->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_units_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_units)
		if (!isset($GLOBALS["frm_fp_units"])) {
			$GLOBALS["frm_fp_units"] = new cfrm_fp_units();
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_units"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_units', TRUE);

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
		global $frm_fp_units;

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
			$this->Page_Terminate("frm_fp_unitslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_fp_unitslist.php");
		}

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
		global $objForm, $Language, $gsFormError, $frm_fp_units;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$frm_fp_units->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$frm_fp_units->CurrentAction = "I"; // Form error, reset action
				$frm_fp_units->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["units_id"] != "") {
				$frm_fp_units->units_id->setQueryStringValue($_GET["units_id"]);
				$frm_fp_units->setKey("units_id", $frm_fp_units->units_id->CurrentValue); // Set up key
			} else {
				$frm_fp_units->setKey("units_id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$frm_fp_units->CurrentAction = "C"; // Copy record
			} else {
				$frm_fp_units->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($frm_fp_units->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("frm_fp_unitslist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$frm_fp_units->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $frm_fp_units->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "frm_fp_unitsview.php")
						$sReturnUrl = $frm_fp_units->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$frm_fp_units->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$frm_fp_units->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$frm_fp_units->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_fp_units;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_fp_units;
		$frm_fp_units->unit_name->CurrentValue = NULL;
		$frm_fp_units->unit_name->OldValue = $frm_fp_units->unit_name->CurrentValue;
		$frm_fp_units->personnel_count->CurrentValue = NULL;
		$frm_fp_units->personnel_count->OldValue = $frm_fp_units->personnel_count->CurrentValue;
		$frm_fp_units->mfo_1->CurrentValue = "Y";
		$frm_fp_units->mfo_2->CurrentValue = "Y";
		$frm_fp_units->mfo_3->CurrentValue = "Y";
		$frm_fp_units->mfo_4->CurrentValue = "Y";
		$frm_fp_units->mfo_5->CurrentValue = "Y";
		$frm_fp_units->sto->CurrentValue = "Y";
		$frm_fp_units->gass->CurrentValue = "Y";
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_fp_units;
		if (!$frm_fp_units->unit_name->FldIsDetailKey) {
			$frm_fp_units->unit_name->setFormValue($objForm->GetValue("x_unit_name"));
		}
		if (!$frm_fp_units->personnel_count->FldIsDetailKey) {
			$frm_fp_units->personnel_count->setFormValue($objForm->GetValue("x_personnel_count"));
		}
		if (!$frm_fp_units->mfo_1->FldIsDetailKey) {
			$frm_fp_units->mfo_1->setFormValue($objForm->GetValue("x_mfo_1"));
		}
		if (!$frm_fp_units->mfo_2->FldIsDetailKey) {
			$frm_fp_units->mfo_2->setFormValue($objForm->GetValue("x_mfo_2"));
		}
		if (!$frm_fp_units->mfo_3->FldIsDetailKey) {
			$frm_fp_units->mfo_3->setFormValue($objForm->GetValue("x_mfo_3"));
		}
		if (!$frm_fp_units->mfo_4->FldIsDetailKey) {
			$frm_fp_units->mfo_4->setFormValue($objForm->GetValue("x_mfo_4"));
		}
		if (!$frm_fp_units->mfo_5->FldIsDetailKey) {
			$frm_fp_units->mfo_5->setFormValue($objForm->GetValue("x_mfo_5"));
		}
		if (!$frm_fp_units->sto->FldIsDetailKey) {
			$frm_fp_units->sto->setFormValue($objForm->GetValue("x_sto"));
		}
		if (!$frm_fp_units->gass->FldIsDetailKey) {
			$frm_fp_units->gass->setFormValue($objForm->GetValue("x_gass"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_fp_units;
		$this->LoadOldRecord();
		$frm_fp_units->unit_name->CurrentValue = $frm_fp_units->unit_name->FormValue;
		$frm_fp_units->personnel_count->CurrentValue = $frm_fp_units->personnel_count->FormValue;
		$frm_fp_units->mfo_1->CurrentValue = $frm_fp_units->mfo_1->FormValue;
		$frm_fp_units->mfo_2->CurrentValue = $frm_fp_units->mfo_2->FormValue;
		$frm_fp_units->mfo_3->CurrentValue = $frm_fp_units->mfo_3->FormValue;
		$frm_fp_units->mfo_4->CurrentValue = $frm_fp_units->mfo_4->FormValue;
		$frm_fp_units->mfo_5->CurrentValue = $frm_fp_units->mfo_5->FormValue;
		$frm_fp_units->sto->CurrentValue = $frm_fp_units->sto->FormValue;
		$frm_fp_units->gass->CurrentValue = $frm_fp_units->gass->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_units;
		$sFilter = $frm_fp_units->KeyFilter();

		// Call Row Selecting event
		$frm_fp_units->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_units->CurrentFilter = $sFilter;
		$sSql = $frm_fp_units->SQL();
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
		global $conn, $frm_fp_units;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_units->Row_Selected($row);
		$frm_fp_units->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_units->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_units->unit_id->setDbValue($rs->fields('unit_id'));
		$frm_fp_units->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_fp_units->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_fp_units->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_fp_units->unit_name->setDbValue($rs->fields('unit_name'));
		$frm_fp_units->unit_name_short->setDbValue($rs->fields('unit_name_short'));
		$frm_fp_units->personnel_count->setDbValue($rs->fields('personnel_count'));
		$frm_fp_units->mfo_1->setDbValue($rs->fields('mfo_1'));
		$frm_fp_units->mfo_2->setDbValue($rs->fields('mfo_2'));
		$frm_fp_units->mfo_3->setDbValue($rs->fields('mfo_3'));
		$frm_fp_units->mfo_4->setDbValue($rs->fields('mfo_4'));
		$frm_fp_units->mfo_5->setDbValue($rs->fields('mfo_5'));
		$frm_fp_units->sto->setDbValue($rs->fields('sto'));
		$frm_fp_units->gass->setDbValue($rs->fields('gass'));
		$frm_fp_units->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_fp_units->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_fp_units->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_fp_units->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_fp_units->t_startDate->setDbValue($rs->fields('t_startDate'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_fp_units;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_fp_units->getKey("units_id")) <> "")
			$frm_fp_units->units_id->CurrentValue = $frm_fp_units->getKey("units_id"); // units_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_fp_units->CurrentFilter = $frm_fp_units->KeyFilter();
			$sSql = $frm_fp_units->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_units;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_fp_units->Row_Rendering();

		// Common render codes for all row types
		// units_id
		// focal_person_id
		// unit_id
		// cu_sequence
		// cu_short_name
		// cu_unit_name
		// unit_name
		// unit_name_short
		// personnel_count
		// mfo_1
		// mfo_2
		// mfo_3
		// mfo_4
		// mfo_5
		// sto
		// gass
		// cutOffDate_id
		// t_cutOffDate_fp
		// t_cutOffDate_remarks
		// cu_id
		// t_startDate

		if ($frm_fp_units->RowType == UP_ROWTYPE_VIEW) { // View row

			// unit_name
			$frm_fp_units->unit_name->ViewValue = $frm_fp_units->unit_name->CurrentValue;
			$frm_fp_units->unit_name->ViewCustomAttributes = "";

			// personnel_count
			$frm_fp_units->personnel_count->ViewValue = $frm_fp_units->personnel_count->CurrentValue;
			$frm_fp_units->personnel_count->ViewCustomAttributes = "";

			// mfo_1
			if (strval($frm_fp_units->mfo_1->CurrentValue) <> "") {
				switch ($frm_fp_units->mfo_1->CurrentValue) {
					case "Y":
						$frm_fp_units->mfo_1->ViewValue = $frm_fp_units->mfo_1->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_1->FldTagCaption(1) : $frm_fp_units->mfo_1->CurrentValue;
						break;
					case "N":
						$frm_fp_units->mfo_1->ViewValue = $frm_fp_units->mfo_1->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_1->FldTagCaption(2) : $frm_fp_units->mfo_1->CurrentValue;
						break;
					default:
						$frm_fp_units->mfo_1->ViewValue = $frm_fp_units->mfo_1->CurrentValue;
				}
			} else {
				$frm_fp_units->mfo_1->ViewValue = NULL;
			}
			$frm_fp_units->mfo_1->ViewCustomAttributes = "";

			// mfo_2
			if (strval($frm_fp_units->mfo_2->CurrentValue) <> "") {
				switch ($frm_fp_units->mfo_2->CurrentValue) {
					case "Y":
						$frm_fp_units->mfo_2->ViewValue = $frm_fp_units->mfo_2->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_2->FldTagCaption(1) : $frm_fp_units->mfo_2->CurrentValue;
						break;
					case "N":
						$frm_fp_units->mfo_2->ViewValue = $frm_fp_units->mfo_2->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_2->FldTagCaption(2) : $frm_fp_units->mfo_2->CurrentValue;
						break;
					default:
						$frm_fp_units->mfo_2->ViewValue = $frm_fp_units->mfo_2->CurrentValue;
				}
			} else {
				$frm_fp_units->mfo_2->ViewValue = NULL;
			}
			$frm_fp_units->mfo_2->ViewCustomAttributes = "";

			// mfo_3
			if (strval($frm_fp_units->mfo_3->CurrentValue) <> "") {
				switch ($frm_fp_units->mfo_3->CurrentValue) {
					case "Y":
						$frm_fp_units->mfo_3->ViewValue = $frm_fp_units->mfo_3->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_3->FldTagCaption(1) : $frm_fp_units->mfo_3->CurrentValue;
						break;
					case "N":
						$frm_fp_units->mfo_3->ViewValue = $frm_fp_units->mfo_3->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_3->FldTagCaption(2) : $frm_fp_units->mfo_3->CurrentValue;
						break;
					default:
						$frm_fp_units->mfo_3->ViewValue = $frm_fp_units->mfo_3->CurrentValue;
				}
			} else {
				$frm_fp_units->mfo_3->ViewValue = NULL;
			}
			$frm_fp_units->mfo_3->ViewCustomAttributes = "";

			// mfo_4
			if (strval($frm_fp_units->mfo_4->CurrentValue) <> "") {
				switch ($frm_fp_units->mfo_4->CurrentValue) {
					case "Y":
						$frm_fp_units->mfo_4->ViewValue = $frm_fp_units->mfo_4->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_4->FldTagCaption(1) : $frm_fp_units->mfo_4->CurrentValue;
						break;
					case "N":
						$frm_fp_units->mfo_4->ViewValue = $frm_fp_units->mfo_4->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_4->FldTagCaption(2) : $frm_fp_units->mfo_4->CurrentValue;
						break;
					default:
						$frm_fp_units->mfo_4->ViewValue = $frm_fp_units->mfo_4->CurrentValue;
				}
			} else {
				$frm_fp_units->mfo_4->ViewValue = NULL;
			}
			$frm_fp_units->mfo_4->ViewCustomAttributes = "";

			// mfo_5
			if (strval($frm_fp_units->mfo_5->CurrentValue) <> "") {
				switch ($frm_fp_units->mfo_5->CurrentValue) {
					case "Y":
						$frm_fp_units->mfo_5->ViewValue = $frm_fp_units->mfo_5->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_5->FldTagCaption(1) : $frm_fp_units->mfo_5->CurrentValue;
						break;
					case "N":
						$frm_fp_units->mfo_5->ViewValue = $frm_fp_units->mfo_5->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_5->FldTagCaption(2) : $frm_fp_units->mfo_5->CurrentValue;
						break;
					default:
						$frm_fp_units->mfo_5->ViewValue = $frm_fp_units->mfo_5->CurrentValue;
				}
			} else {
				$frm_fp_units->mfo_5->ViewValue = NULL;
			}
			$frm_fp_units->mfo_5->ViewCustomAttributes = "";

			// sto
			if (strval($frm_fp_units->sto->CurrentValue) <> "") {
				switch ($frm_fp_units->sto->CurrentValue) {
					case "Y":
						$frm_fp_units->sto->ViewValue = $frm_fp_units->sto->FldTagCaption(1) <> "" ? $frm_fp_units->sto->FldTagCaption(1) : $frm_fp_units->sto->CurrentValue;
						break;
					case "N":
						$frm_fp_units->sto->ViewValue = $frm_fp_units->sto->FldTagCaption(2) <> "" ? $frm_fp_units->sto->FldTagCaption(2) : $frm_fp_units->sto->CurrentValue;
						break;
					default:
						$frm_fp_units->sto->ViewValue = $frm_fp_units->sto->CurrentValue;
				}
			} else {
				$frm_fp_units->sto->ViewValue = NULL;
			}
			$frm_fp_units->sto->ViewCustomAttributes = "";

			// gass
			if (strval($frm_fp_units->gass->CurrentValue) <> "") {
				switch ($frm_fp_units->gass->CurrentValue) {
					case "Y":
						$frm_fp_units->gass->ViewValue = $frm_fp_units->gass->FldTagCaption(1) <> "" ? $frm_fp_units->gass->FldTagCaption(1) : $frm_fp_units->gass->CurrentValue;
						break;
					case "N":
						$frm_fp_units->gass->ViewValue = $frm_fp_units->gass->FldTagCaption(2) <> "" ? $frm_fp_units->gass->FldTagCaption(2) : $frm_fp_units->gass->CurrentValue;
						break;
					default:
						$frm_fp_units->gass->ViewValue = $frm_fp_units->gass->CurrentValue;
				}
			} else {
				$frm_fp_units->gass->ViewValue = NULL;
			}
			$frm_fp_units->gass->ViewCustomAttributes = "";

			// unit_name
			$frm_fp_units->unit_name->LinkCustomAttributes = "";
			$frm_fp_units->unit_name->HrefValue = "";
			$frm_fp_units->unit_name->TooltipValue = "";

			// personnel_count
			$frm_fp_units->personnel_count->LinkCustomAttributes = "";
			$frm_fp_units->personnel_count->HrefValue = "";
			$frm_fp_units->personnel_count->TooltipValue = "";

			// mfo_1
			$frm_fp_units->mfo_1->LinkCustomAttributes = "";
			$frm_fp_units->mfo_1->HrefValue = "";
			$frm_fp_units->mfo_1->TooltipValue = "";

			// mfo_2
			$frm_fp_units->mfo_2->LinkCustomAttributes = "";
			$frm_fp_units->mfo_2->HrefValue = "";
			$frm_fp_units->mfo_2->TooltipValue = "";

			// mfo_3
			$frm_fp_units->mfo_3->LinkCustomAttributes = "";
			$frm_fp_units->mfo_3->HrefValue = "";
			$frm_fp_units->mfo_3->TooltipValue = "";

			// mfo_4
			$frm_fp_units->mfo_4->LinkCustomAttributes = "";
			$frm_fp_units->mfo_4->HrefValue = "";
			$frm_fp_units->mfo_4->TooltipValue = "";

			// mfo_5
			$frm_fp_units->mfo_5->LinkCustomAttributes = "";
			$frm_fp_units->mfo_5->HrefValue = "";
			$frm_fp_units->mfo_5->TooltipValue = "";

			// sto
			$frm_fp_units->sto->LinkCustomAttributes = "";
			$frm_fp_units->sto->HrefValue = "";
			$frm_fp_units->sto->TooltipValue = "";

			// gass
			$frm_fp_units->gass->LinkCustomAttributes = "";
			$frm_fp_units->gass->HrefValue = "";
			$frm_fp_units->gass->TooltipValue = "";
		} elseif ($frm_fp_units->RowType == UP_ROWTYPE_ADD) { // Add row

			// unit_name
			$frm_fp_units->unit_name->EditCustomAttributes = "";
			$frm_fp_units->unit_name->EditValue = up_HtmlEncode($frm_fp_units->unit_name->CurrentValue);

			// personnel_count
			$frm_fp_units->personnel_count->EditCustomAttributes = "";
			$frm_fp_units->personnel_count->EditValue = up_HtmlEncode($frm_fp_units->personnel_count->CurrentValue);

			// mfo_1
			$frm_fp_units->mfo_1->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_fp_units->mfo_1->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_1->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_fp_units->mfo_1->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_1->FldTagCaption(2) : "N");
			$frm_fp_units->mfo_1->EditValue = $arwrk;

			// mfo_2
			$frm_fp_units->mfo_2->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_fp_units->mfo_2->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_2->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_fp_units->mfo_2->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_2->FldTagCaption(2) : "N");
			$frm_fp_units->mfo_2->EditValue = $arwrk;

			// mfo_3
			$frm_fp_units->mfo_3->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_fp_units->mfo_3->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_3->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_fp_units->mfo_3->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_3->FldTagCaption(2) : "N");
			$frm_fp_units->mfo_3->EditValue = $arwrk;

			// mfo_4
			$frm_fp_units->mfo_4->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_fp_units->mfo_4->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_4->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_fp_units->mfo_4->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_4->FldTagCaption(2) : "N");
			$frm_fp_units->mfo_4->EditValue = $arwrk;

			// mfo_5
			$frm_fp_units->mfo_5->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_fp_units->mfo_5->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_5->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_fp_units->mfo_5->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_5->FldTagCaption(2) : "N");
			$frm_fp_units->mfo_5->EditValue = $arwrk;

			// sto
			$frm_fp_units->sto->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_fp_units->sto->FldTagCaption(1) <> "" ? $frm_fp_units->sto->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_fp_units->sto->FldTagCaption(2) <> "" ? $frm_fp_units->sto->FldTagCaption(2) : "N");
			$frm_fp_units->sto->EditValue = $arwrk;

			// gass
			$frm_fp_units->gass->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_fp_units->gass->FldTagCaption(1) <> "" ? $frm_fp_units->gass->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_fp_units->gass->FldTagCaption(2) <> "" ? $frm_fp_units->gass->FldTagCaption(2) : "N");
			$frm_fp_units->gass->EditValue = $arwrk;

			// Edit refer script
			// unit_name

			$frm_fp_units->unit_name->HrefValue = "";

			// personnel_count
			$frm_fp_units->personnel_count->HrefValue = "";

			// mfo_1
			$frm_fp_units->mfo_1->HrefValue = "";

			// mfo_2
			$frm_fp_units->mfo_2->HrefValue = "";

			// mfo_3
			$frm_fp_units->mfo_3->HrefValue = "";

			// mfo_4
			$frm_fp_units->mfo_4->HrefValue = "";

			// mfo_5
			$frm_fp_units->mfo_5->HrefValue = "";

			// sto
			$frm_fp_units->sto->HrefValue = "";

			// gass
			$frm_fp_units->gass->HrefValue = "";
		}
		if ($frm_fp_units->RowType == UP_ROWTYPE_ADD ||
			$frm_fp_units->RowType == UP_ROWTYPE_EDIT ||
			$frm_fp_units->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_fp_units->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_fp_units->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_units->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_fp_units;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($frm_fp_units->personnel_count->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_units->personnel_count->FldErrMsg());
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
		global $conn, $Language, $Security, $frm_fp_units;
		$rsnew = array();

		// unit_name
		$frm_fp_units->unit_name->SetDbValueDef($rsnew, $frm_fp_units->unit_name->CurrentValue, NULL, FALSE);

		// personnel_count
		$frm_fp_units->personnel_count->SetDbValueDef($rsnew, $frm_fp_units->personnel_count->CurrentValue, NULL, FALSE);

		// mfo_1
		$frm_fp_units->mfo_1->SetDbValueDef($rsnew, $frm_fp_units->mfo_1->CurrentValue, NULL, strval($frm_fp_units->mfo_1->CurrentValue) == "");

		// mfo_2
		$frm_fp_units->mfo_2->SetDbValueDef($rsnew, $frm_fp_units->mfo_2->CurrentValue, NULL, strval($frm_fp_units->mfo_2->CurrentValue) == "");

		// mfo_3
		$frm_fp_units->mfo_3->SetDbValueDef($rsnew, $frm_fp_units->mfo_3->CurrentValue, NULL, strval($frm_fp_units->mfo_3->CurrentValue) == "");

		// mfo_4
		$frm_fp_units->mfo_4->SetDbValueDef($rsnew, $frm_fp_units->mfo_4->CurrentValue, NULL, strval($frm_fp_units->mfo_4->CurrentValue) == "");

		// mfo_5
		$frm_fp_units->mfo_5->SetDbValueDef($rsnew, $frm_fp_units->mfo_5->CurrentValue, NULL, strval($frm_fp_units->mfo_5->CurrentValue) == "");

		// sto
		$frm_fp_units->sto->SetDbValueDef($rsnew, $frm_fp_units->sto->CurrentValue, NULL, strval($frm_fp_units->sto->CurrentValue) == "");

		// gass
		$frm_fp_units->gass->SetDbValueDef($rsnew, $frm_fp_units->gass->CurrentValue, NULL, strval($frm_fp_units->gass->CurrentValue) == "");

		// focal_person_id
		if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['focal_person_id'] = CurrentUserID();
		}

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_fp_units->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_fp_units->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_fp_units->CancelMessage <> "") {
				$this->setFailureMessage($frm_fp_units->CancelMessage);
				$frm_fp_units->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$frm_fp_units->units_id->setDbValue($conn->Insert_ID());
			$rsnew['units_id'] = $frm_fp_units->units_id->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$frm_fp_units->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
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
