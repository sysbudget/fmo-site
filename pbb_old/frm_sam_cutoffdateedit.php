<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_sam_cutoffdateinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_sam_cutoffdate_edit = new cfrm_sam_cutoffdate_edit();
$Page =& $frm_sam_cutoffdate_edit;

// Page init
$frm_sam_cutoffdate_edit->Page_Init();

// Page main
$frm_sam_cutoffdate_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_cutoffdate_edit = new up_Page("frm_sam_cutoffdate_edit");

// page properties
frm_sam_cutoffdate_edit.PageID = "edit"; // page ID
frm_sam_cutoffdate_edit.FormID = "ffrm_sam_cutoffdateedit"; // form ID
var UP_PAGE_ID = frm_sam_cutoffdate_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_sam_cutoffdate_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_t_startDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_cutoffdate->t_startDate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_cutOffDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_cutoffdate->t_cutOffDate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_cutOffDate_fp"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_cutoffdate->t_cutOffDate_fp->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_startDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_cutoffdate->a_startDate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_cutOffDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_cutoffdate->a_cutOffDate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_cutOffDate_fp"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_cutoffdate->a_cutOffDate_fp->FldErrMsg()) ?>");

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
frm_sam_cutoffdate_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_cutoffdate_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_cutoffdate_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_cutoffdate_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_cutoffdate->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_sam_cutoffdate->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_sam_cutoffdate_edit->ShowPageHeader(); ?>
<?php
$frm_sam_cutoffdate_edit->ShowMessage();
?>
<form name="ffrm_sam_cutoffdateedit" id="ffrm_sam_cutoffdateedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return frm_sam_cutoffdate_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="frm_sam_cutoffdate">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_sam_cutoffdate->focal_person_id->Visible) { // focal_person_id ?>
	<tr id="r_focal_person_id"<?php echo $frm_sam_cutoffdate->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_cutoffdate->focal_person_id->FldCaption() ?></td>
		<td<?php echo $frm_sam_cutoffdate->focal_person_id->CellAttributes() ?>><span id="el_focal_person_id">
<select id="x_focal_person_id" name="x_focal_person_id"<?php echo $frm_sam_cutoffdate->focal_person_id->EditAttributes() ?>>
<?php
if (is_array($frm_sam_cutoffdate->focal_person_id->EditValue)) {
	$arwrk = $frm_sam_cutoffdate->focal_person_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_cutoffdate->focal_person_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $frm_sam_cutoffdate->focal_person_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_cutoffdate->t_startDate->Visible) { // t_startDate ?>
	<tr id="r_t_startDate"<?php echo $frm_sam_cutoffdate->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_cutoffdate->t_startDate->FldCaption() ?></td>
		<td<?php echo $frm_sam_cutoffdate->t_startDate->CellAttributes() ?>><span id="el_t_startDate">
<input type="text" name="x_t_startDate" id="x_t_startDate" value="<?php echo $frm_sam_cutoffdate->t_startDate->EditValue ?>"<?php echo $frm_sam_cutoffdate->t_startDate->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x_t_startDate" name="cal_x_t_startDate" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_t_startDate", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x_t_startDate" // button id
});
</script>
</span><?php echo $frm_sam_cutoffdate->t_startDate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_cutoffdate->t_cutOffDate->Visible) { // t_cutOffDate ?>
	<tr id="r_t_cutOffDate"<?php echo $frm_sam_cutoffdate->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_cutoffdate->t_cutOffDate->FldCaption() ?></td>
		<td<?php echo $frm_sam_cutoffdate->t_cutOffDate->CellAttributes() ?>><span id="el_t_cutOffDate">
<input type="text" name="x_t_cutOffDate" id="x_t_cutOffDate" value="<?php echo $frm_sam_cutoffdate->t_cutOffDate->EditValue ?>"<?php echo $frm_sam_cutoffdate->t_cutOffDate->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x_t_cutOffDate" name="cal_x_t_cutOffDate" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_t_cutOffDate", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x_t_cutOffDate" // button id
});
</script>
</span><?php echo $frm_sam_cutoffdate->t_cutOffDate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_cutoffdate->t_cutOffDate_fp->Visible) { // t_cutOffDate_fp ?>
	<tr id="r_t_cutOffDate_fp"<?php echo $frm_sam_cutoffdate->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_cutoffdate->t_cutOffDate_fp->FldCaption() ?></td>
		<td<?php echo $frm_sam_cutoffdate->t_cutOffDate_fp->CellAttributes() ?>><span id="el_t_cutOffDate_fp">
<input type="text" name="x_t_cutOffDate_fp" id="x_t_cutOffDate_fp" value="<?php echo $frm_sam_cutoffdate->t_cutOffDate_fp->EditValue ?>"<?php echo $frm_sam_cutoffdate->t_cutOffDate_fp->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x_t_cutOffDate_fp" name="cal_x_t_cutOffDate_fp" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_t_cutOffDate_fp", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x_t_cutOffDate_fp" // button id
});
</script>
</span><?php echo $frm_sam_cutoffdate->t_cutOffDate_fp->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_cutoffdate->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
	<tr id="r_t_cutOffDate_remarks"<?php echo $frm_sam_cutoffdate->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_cutoffdate->t_cutOffDate_remarks->FldCaption() ?></td>
		<td<?php echo $frm_sam_cutoffdate->t_cutOffDate_remarks->CellAttributes() ?>><span id="el_t_cutOffDate_remarks">
<input type="text" name="x_t_cutOffDate_remarks" id="x_t_cutOffDate_remarks" size="30" maxlength="255" value="<?php echo $frm_sam_cutoffdate->t_cutOffDate_remarks->EditValue ?>"<?php echo $frm_sam_cutoffdate->t_cutOffDate_remarks->EditAttributes() ?>>
</span><?php echo $frm_sam_cutoffdate->t_cutOffDate_remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_cutoffdate->a_startDate->Visible) { // a_startDate ?>
	<tr id="r_a_startDate"<?php echo $frm_sam_cutoffdate->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_cutoffdate->a_startDate->FldCaption() ?></td>
		<td<?php echo $frm_sam_cutoffdate->a_startDate->CellAttributes() ?>><span id="el_a_startDate">
<input type="text" name="x_a_startDate" id="x_a_startDate" value="<?php echo $frm_sam_cutoffdate->a_startDate->EditValue ?>"<?php echo $frm_sam_cutoffdate->a_startDate->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x_a_startDate" name="cal_x_a_startDate" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_a_startDate", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x_a_startDate" // button id
});
</script>
</span><?php echo $frm_sam_cutoffdate->a_startDate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_cutoffdate->a_cutOffDate->Visible) { // a_cutOffDate ?>
	<tr id="r_a_cutOffDate"<?php echo $frm_sam_cutoffdate->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_cutoffdate->a_cutOffDate->FldCaption() ?></td>
		<td<?php echo $frm_sam_cutoffdate->a_cutOffDate->CellAttributes() ?>><span id="el_a_cutOffDate">
<input type="text" name="x_a_cutOffDate" id="x_a_cutOffDate" value="<?php echo $frm_sam_cutoffdate->a_cutOffDate->EditValue ?>"<?php echo $frm_sam_cutoffdate->a_cutOffDate->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x_a_cutOffDate" name="cal_x_a_cutOffDate" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_a_cutOffDate", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x_a_cutOffDate" // button id
});
</script>
</span><?php echo $frm_sam_cutoffdate->a_cutOffDate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_cutoffdate->a_cutOffDate_fp->Visible) { // a_cutOffDate_fp ?>
	<tr id="r_a_cutOffDate_fp"<?php echo $frm_sam_cutoffdate->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_cutoffdate->a_cutOffDate_fp->FldCaption() ?></td>
		<td<?php echo $frm_sam_cutoffdate->a_cutOffDate_fp->CellAttributes() ?>><span id="el_a_cutOffDate_fp">
<input type="text" name="x_a_cutOffDate_fp" id="x_a_cutOffDate_fp" value="<?php echo $frm_sam_cutoffdate->a_cutOffDate_fp->EditValue ?>"<?php echo $frm_sam_cutoffdate->a_cutOffDate_fp->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x_a_cutOffDate_fp" name="cal_x_a_cutOffDate_fp" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_a_cutOffDate_fp", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x_a_cutOffDate_fp" // button id
});
</script>
</span><?php echo $frm_sam_cutoffdate->a_cutOffDate_fp->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_cutoffdate->a_cutOffDate_remarks->Visible) { // a_cutOffDate_remarks ?>
	<tr id="r_a_cutOffDate_remarks"<?php echo $frm_sam_cutoffdate->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_cutoffdate->a_cutOffDate_remarks->FldCaption() ?></td>
		<td<?php echo $frm_sam_cutoffdate->a_cutOffDate_remarks->CellAttributes() ?>><span id="el_a_cutOffDate_remarks">
<input type="text" name="x_a_cutOffDate_remarks" id="x_a_cutOffDate_remarks" size="30" maxlength="255" value="<?php echo $frm_sam_cutoffdate->a_cutOffDate_remarks->EditValue ?>"<?php echo $frm_sam_cutoffdate->a_cutOffDate_remarks->EditAttributes() ?>>
</span><?php echo $frm_sam_cutoffdate->a_cutOffDate_remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_cutOffDate_id" id="x_cutOffDate_id" value="<?php echo up_HtmlEncode($frm_sam_cutoffdate->cutOffDate_id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$frm_sam_cutoffdate_edit->ShowPageFooter();
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
$frm_sam_cutoffdate_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_cutoffdate_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'frm_sam_cutoffdate';

	// Page object name
	var $PageObjName = 'frm_sam_cutoffdate_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_cutoffdate;
		if ($frm_sam_cutoffdate->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_cutoffdate->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_cutoffdate;
		if ($frm_sam_cutoffdate->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_cutoffdate->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_cutoffdate->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_cutoffdate_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_cutoffdate)
		if (!isset($GLOBALS["frm_sam_cutoffdate"])) {
			$GLOBALS["frm_sam_cutoffdate"] = new cfrm_sam_cutoffdate();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_cutoffdate"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_cutoffdate', TRUE);

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
		global $frm_sam_cutoffdate;

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
			$this->Page_Terminate("frm_sam_cutoffdatelist.php");
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
		global $objForm, $Language, $gsFormError, $frm_sam_cutoffdate;

		// Load key from QueryString
		if (@$_GET["cutOffDate_id"] <> "")
			$frm_sam_cutoffdate->cutOffDate_id->setQueryStringValue($_GET["cutOffDate_id"]);
		if (@$_POST["a_edit"] <> "") {
			$frm_sam_cutoffdate->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$frm_sam_cutoffdate->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$frm_sam_cutoffdate->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$frm_sam_cutoffdate->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($frm_sam_cutoffdate->cutOffDate_id->CurrentValue == "")
			$this->Page_Terminate("frm_sam_cutoffdatelist.php"); // Invalid key, return to list
		switch ($frm_sam_cutoffdate->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("frm_sam_cutoffdatelist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$frm_sam_cutoffdate->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $frm_sam_cutoffdate->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$frm_sam_cutoffdate->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$frm_sam_cutoffdate->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$frm_sam_cutoffdate->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_sam_cutoffdate;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_sam_cutoffdate;
		if (!$frm_sam_cutoffdate->focal_person_id->FldIsDetailKey) {
			$frm_sam_cutoffdate->focal_person_id->setFormValue($objForm->GetValue("x_focal_person_id"));
		}
		if (!$frm_sam_cutoffdate->t_startDate->FldIsDetailKey) {
			$frm_sam_cutoffdate->t_startDate->setFormValue($objForm->GetValue("x_t_startDate"));
			$frm_sam_cutoffdate->t_startDate->CurrentValue = up_UnFormatDateTime($frm_sam_cutoffdate->t_startDate->CurrentValue, 6);
		}
		if (!$frm_sam_cutoffdate->t_cutOffDate->FldIsDetailKey) {
			$frm_sam_cutoffdate->t_cutOffDate->setFormValue($objForm->GetValue("x_t_cutOffDate"));
			$frm_sam_cutoffdate->t_cutOffDate->CurrentValue = up_UnFormatDateTime($frm_sam_cutoffdate->t_cutOffDate->CurrentValue, 6);
		}
		if (!$frm_sam_cutoffdate->t_cutOffDate_fp->FldIsDetailKey) {
			$frm_sam_cutoffdate->t_cutOffDate_fp->setFormValue($objForm->GetValue("x_t_cutOffDate_fp"));
			$frm_sam_cutoffdate->t_cutOffDate_fp->CurrentValue = up_UnFormatDateTime($frm_sam_cutoffdate->t_cutOffDate_fp->CurrentValue, 6);
		}
		if (!$frm_sam_cutoffdate->t_cutOffDate_remarks->FldIsDetailKey) {
			$frm_sam_cutoffdate->t_cutOffDate_remarks->setFormValue($objForm->GetValue("x_t_cutOffDate_remarks"));
		}
		if (!$frm_sam_cutoffdate->a_startDate->FldIsDetailKey) {
			$frm_sam_cutoffdate->a_startDate->setFormValue($objForm->GetValue("x_a_startDate"));
			$frm_sam_cutoffdate->a_startDate->CurrentValue = up_UnFormatDateTime($frm_sam_cutoffdate->a_startDate->CurrentValue, 6);
		}
		if (!$frm_sam_cutoffdate->a_cutOffDate->FldIsDetailKey) {
			$frm_sam_cutoffdate->a_cutOffDate->setFormValue($objForm->GetValue("x_a_cutOffDate"));
			$frm_sam_cutoffdate->a_cutOffDate->CurrentValue = up_UnFormatDateTime($frm_sam_cutoffdate->a_cutOffDate->CurrentValue, 6);
		}
		if (!$frm_sam_cutoffdate->a_cutOffDate_fp->FldIsDetailKey) {
			$frm_sam_cutoffdate->a_cutOffDate_fp->setFormValue($objForm->GetValue("x_a_cutOffDate_fp"));
			$frm_sam_cutoffdate->a_cutOffDate_fp->CurrentValue = up_UnFormatDateTime($frm_sam_cutoffdate->a_cutOffDate_fp->CurrentValue, 6);
		}
		if (!$frm_sam_cutoffdate->a_cutOffDate_remarks->FldIsDetailKey) {
			$frm_sam_cutoffdate->a_cutOffDate_remarks->setFormValue($objForm->GetValue("x_a_cutOffDate_remarks"));
		}
		if (!$frm_sam_cutoffdate->cutOffDate_id->FldIsDetailKey)
			$frm_sam_cutoffdate->cutOffDate_id->setFormValue($objForm->GetValue("x_cutOffDate_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_sam_cutoffdate;
		$this->LoadRow();
		$frm_sam_cutoffdate->cutOffDate_id->CurrentValue = $frm_sam_cutoffdate->cutOffDate_id->FormValue;
		$frm_sam_cutoffdate->focal_person_id->CurrentValue = $frm_sam_cutoffdate->focal_person_id->FormValue;
		$frm_sam_cutoffdate->t_startDate->CurrentValue = $frm_sam_cutoffdate->t_startDate->FormValue;
		$frm_sam_cutoffdate->t_startDate->CurrentValue = up_UnFormatDateTime($frm_sam_cutoffdate->t_startDate->CurrentValue, 6);
		$frm_sam_cutoffdate->t_cutOffDate->CurrentValue = $frm_sam_cutoffdate->t_cutOffDate->FormValue;
		$frm_sam_cutoffdate->t_cutOffDate->CurrentValue = up_UnFormatDateTime($frm_sam_cutoffdate->t_cutOffDate->CurrentValue, 6);
		$frm_sam_cutoffdate->t_cutOffDate_fp->CurrentValue = $frm_sam_cutoffdate->t_cutOffDate_fp->FormValue;
		$frm_sam_cutoffdate->t_cutOffDate_fp->CurrentValue = up_UnFormatDateTime($frm_sam_cutoffdate->t_cutOffDate_fp->CurrentValue, 6);
		$frm_sam_cutoffdate->t_cutOffDate_remarks->CurrentValue = $frm_sam_cutoffdate->t_cutOffDate_remarks->FormValue;
		$frm_sam_cutoffdate->a_startDate->CurrentValue = $frm_sam_cutoffdate->a_startDate->FormValue;
		$frm_sam_cutoffdate->a_startDate->CurrentValue = up_UnFormatDateTime($frm_sam_cutoffdate->a_startDate->CurrentValue, 6);
		$frm_sam_cutoffdate->a_cutOffDate->CurrentValue = $frm_sam_cutoffdate->a_cutOffDate->FormValue;
		$frm_sam_cutoffdate->a_cutOffDate->CurrentValue = up_UnFormatDateTime($frm_sam_cutoffdate->a_cutOffDate->CurrentValue, 6);
		$frm_sam_cutoffdate->a_cutOffDate_fp->CurrentValue = $frm_sam_cutoffdate->a_cutOffDate_fp->FormValue;
		$frm_sam_cutoffdate->a_cutOffDate_fp->CurrentValue = up_UnFormatDateTime($frm_sam_cutoffdate->a_cutOffDate_fp->CurrentValue, 6);
		$frm_sam_cutoffdate->a_cutOffDate_remarks->CurrentValue = $frm_sam_cutoffdate->a_cutOffDate_remarks->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_cutoffdate;
		$sFilter = $frm_sam_cutoffdate->KeyFilter();

		// Call Row Selecting event
		$frm_sam_cutoffdate->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_cutoffdate->CurrentFilter = $sFilter;
		$sSql = $frm_sam_cutoffdate->SQL();
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
		global $conn, $frm_sam_cutoffdate;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_cutoffdate->Row_Selected($row);
		$frm_sam_cutoffdate->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_sam_cutoffdate->collection_id->setDbValue($rs->fields('collection_id'));
		$frm_sam_cutoffdate->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_sam_cutoffdate->focal_person_office->setDbValue($rs->fields('focal_person_office'));
		$frm_sam_cutoffdate->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_sam_cutoffdate->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$frm_sam_cutoffdate->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_sam_cutoffdate->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_sam_cutoffdate->a_startDate->setDbValue($rs->fields('a_startDate'));
		$frm_sam_cutoffdate->a_cutOffDate->setDbValue($rs->fields('a_cutOffDate'));
		$frm_sam_cutoffdate->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_sam_cutoffdate->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_cutoffdate;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_sam_cutoffdate->Row_Rendering();

		// Common render codes for all row types
		// cutOffDate_id
		// collection_id
		// focal_person_id
		// focal_person_office
		// t_startDate
		// t_cutOffDate
		// t_cutOffDate_fp
		// t_cutOffDate_remarks
		// a_startDate
		// a_cutOffDate
		// a_cutOffDate_fp
		// a_cutOffDate_remarks

		if ($frm_sam_cutoffdate->RowType == UP_ROWTYPE_VIEW) { // View row

			// focal_person_id
			if (strval($frm_sam_cutoffdate->focal_person_id->CurrentValue) <> "") {
				$sFilterWrk = "`focal_person_id` = " . up_AdjustSql($frm_sam_cutoffdate->focal_person_id->CurrentValue) . "";
			$sSqlWrk = "SELECT `focal_person_office` FROM `tbl_cu_executive_offices`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$frm_sam_cutoffdate->focal_person_id->ViewValue = $rswrk->fields('focal_person_office');
					$rswrk->Close();
				} else {
					$frm_sam_cutoffdate->focal_person_id->ViewValue = $frm_sam_cutoffdate->focal_person_id->CurrentValue;
				}
			} else {
				$frm_sam_cutoffdate->focal_person_id->ViewValue = NULL;
			}
			$frm_sam_cutoffdate->focal_person_id->ViewCustomAttributes = "";

			// t_startDate
			$frm_sam_cutoffdate->t_startDate->ViewValue = $frm_sam_cutoffdate->t_startDate->CurrentValue;
			$frm_sam_cutoffdate->t_startDate->ViewValue = up_FormatDateTime($frm_sam_cutoffdate->t_startDate->ViewValue, 6);
			$frm_sam_cutoffdate->t_startDate->ViewCustomAttributes = "";

			// t_cutOffDate
			$frm_sam_cutoffdate->t_cutOffDate->ViewValue = $frm_sam_cutoffdate->t_cutOffDate->CurrentValue;
			$frm_sam_cutoffdate->t_cutOffDate->ViewValue = up_FormatDateTime($frm_sam_cutoffdate->t_cutOffDate->ViewValue, 6);
			$frm_sam_cutoffdate->t_cutOffDate->ViewCustomAttributes = "";

			// t_cutOffDate_fp
			$frm_sam_cutoffdate->t_cutOffDate_fp->ViewValue = $frm_sam_cutoffdate->t_cutOffDate_fp->CurrentValue;
			$frm_sam_cutoffdate->t_cutOffDate_fp->ViewValue = up_FormatDateTime($frm_sam_cutoffdate->t_cutOffDate_fp->ViewValue, 6);
			$frm_sam_cutoffdate->t_cutOffDate_fp->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_sam_cutoffdate->t_cutOffDate_remarks->ViewValue = $frm_sam_cutoffdate->t_cutOffDate_remarks->CurrentValue;
			$frm_sam_cutoffdate->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// a_startDate
			$frm_sam_cutoffdate->a_startDate->ViewValue = $frm_sam_cutoffdate->a_startDate->CurrentValue;
			$frm_sam_cutoffdate->a_startDate->ViewValue = up_FormatDateTime($frm_sam_cutoffdate->a_startDate->ViewValue, 6);
			$frm_sam_cutoffdate->a_startDate->ViewCustomAttributes = "";

			// a_cutOffDate
			$frm_sam_cutoffdate->a_cutOffDate->ViewValue = $frm_sam_cutoffdate->a_cutOffDate->CurrentValue;
			$frm_sam_cutoffdate->a_cutOffDate->ViewValue = up_FormatDateTime($frm_sam_cutoffdate->a_cutOffDate->ViewValue, 6);
			$frm_sam_cutoffdate->a_cutOffDate->ViewCustomAttributes = "";

			// a_cutOffDate_fp
			$frm_sam_cutoffdate->a_cutOffDate_fp->ViewValue = $frm_sam_cutoffdate->a_cutOffDate_fp->CurrentValue;
			$frm_sam_cutoffdate->a_cutOffDate_fp->ViewValue = up_FormatDateTime($frm_sam_cutoffdate->a_cutOffDate_fp->ViewValue, 6);
			$frm_sam_cutoffdate->a_cutOffDate_fp->ViewCustomAttributes = "";

			// a_cutOffDate_remarks
			$frm_sam_cutoffdate->a_cutOffDate_remarks->ViewValue = $frm_sam_cutoffdate->a_cutOffDate_remarks->CurrentValue;
			$frm_sam_cutoffdate->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// focal_person_id
			$frm_sam_cutoffdate->focal_person_id->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->focal_person_id->HrefValue = "";
			$frm_sam_cutoffdate->focal_person_id->TooltipValue = "";

			// t_startDate
			$frm_sam_cutoffdate->t_startDate->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->t_startDate->HrefValue = "";
			$frm_sam_cutoffdate->t_startDate->TooltipValue = "";

			// t_cutOffDate
			$frm_sam_cutoffdate->t_cutOffDate->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->t_cutOffDate->HrefValue = "";
			$frm_sam_cutoffdate->t_cutOffDate->TooltipValue = "";

			// t_cutOffDate_fp
			$frm_sam_cutoffdate->t_cutOffDate_fp->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->t_cutOffDate_fp->HrefValue = "";
			$frm_sam_cutoffdate->t_cutOffDate_fp->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_sam_cutoffdate->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->t_cutOffDate_remarks->HrefValue = "";
			$frm_sam_cutoffdate->t_cutOffDate_remarks->TooltipValue = "";

			// a_startDate
			$frm_sam_cutoffdate->a_startDate->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->a_startDate->HrefValue = "";
			$frm_sam_cutoffdate->a_startDate->TooltipValue = "";

			// a_cutOffDate
			$frm_sam_cutoffdate->a_cutOffDate->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->a_cutOffDate->HrefValue = "";
			$frm_sam_cutoffdate->a_cutOffDate->TooltipValue = "";

			// a_cutOffDate_fp
			$frm_sam_cutoffdate->a_cutOffDate_fp->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->a_cutOffDate_fp->HrefValue = "";
			$frm_sam_cutoffdate->a_cutOffDate_fp->TooltipValue = "";

			// a_cutOffDate_remarks
			$frm_sam_cutoffdate->a_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->a_cutOffDate_remarks->HrefValue = "";
			$frm_sam_cutoffdate->a_cutOffDate_remarks->TooltipValue = "";
		} elseif ($frm_sam_cutoffdate->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// focal_person_id
			$frm_sam_cutoffdate->focal_person_id->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `focal_person_id`, `focal_person_office` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `tbl_cu_executive_offices`";
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
			$frm_sam_cutoffdate->focal_person_id->EditValue = $arwrk;

			// t_startDate
			$frm_sam_cutoffdate->t_startDate->EditCustomAttributes = "";
			$frm_sam_cutoffdate->t_startDate->EditValue = up_HtmlEncode(up_FormatDateTime($frm_sam_cutoffdate->t_startDate->CurrentValue, 6));

			// t_cutOffDate
			$frm_sam_cutoffdate->t_cutOffDate->EditCustomAttributes = "";
			$frm_sam_cutoffdate->t_cutOffDate->EditValue = up_HtmlEncode(up_FormatDateTime($frm_sam_cutoffdate->t_cutOffDate->CurrentValue, 6));

			// t_cutOffDate_fp
			$frm_sam_cutoffdate->t_cutOffDate_fp->EditCustomAttributes = "";
			$frm_sam_cutoffdate->t_cutOffDate_fp->EditValue = up_HtmlEncode(up_FormatDateTime($frm_sam_cutoffdate->t_cutOffDate_fp->CurrentValue, 6));

			// t_cutOffDate_remarks
			$frm_sam_cutoffdate->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_sam_cutoffdate->t_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_sam_cutoffdate->t_cutOffDate_remarks->CurrentValue);

			// a_startDate
			$frm_sam_cutoffdate->a_startDate->EditCustomAttributes = "";
			$frm_sam_cutoffdate->a_startDate->EditValue = up_HtmlEncode(up_FormatDateTime($frm_sam_cutoffdate->a_startDate->CurrentValue, 6));

			// a_cutOffDate
			$frm_sam_cutoffdate->a_cutOffDate->EditCustomAttributes = "";
			$frm_sam_cutoffdate->a_cutOffDate->EditValue = up_HtmlEncode(up_FormatDateTime($frm_sam_cutoffdate->a_cutOffDate->CurrentValue, 6));

			// a_cutOffDate_fp
			$frm_sam_cutoffdate->a_cutOffDate_fp->EditCustomAttributes = "";
			$frm_sam_cutoffdate->a_cutOffDate_fp->EditValue = up_HtmlEncode(up_FormatDateTime($frm_sam_cutoffdate->a_cutOffDate_fp->CurrentValue, 6));

			// a_cutOffDate_remarks
			$frm_sam_cutoffdate->a_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_sam_cutoffdate->a_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_sam_cutoffdate->a_cutOffDate_remarks->CurrentValue);

			// Edit refer script
			// focal_person_id

			$frm_sam_cutoffdate->focal_person_id->HrefValue = "";

			// t_startDate
			$frm_sam_cutoffdate->t_startDate->HrefValue = "";

			// t_cutOffDate
			$frm_sam_cutoffdate->t_cutOffDate->HrefValue = "";

			// t_cutOffDate_fp
			$frm_sam_cutoffdate->t_cutOffDate_fp->HrefValue = "";

			// t_cutOffDate_remarks
			$frm_sam_cutoffdate->t_cutOffDate_remarks->HrefValue = "";

			// a_startDate
			$frm_sam_cutoffdate->a_startDate->HrefValue = "";

			// a_cutOffDate
			$frm_sam_cutoffdate->a_cutOffDate->HrefValue = "";

			// a_cutOffDate_fp
			$frm_sam_cutoffdate->a_cutOffDate_fp->HrefValue = "";

			// a_cutOffDate_remarks
			$frm_sam_cutoffdate->a_cutOffDate_remarks->HrefValue = "";
		}
		if ($frm_sam_cutoffdate->RowType == UP_ROWTYPE_ADD ||
			$frm_sam_cutoffdate->RowType == UP_ROWTYPE_EDIT ||
			$frm_sam_cutoffdate->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_sam_cutoffdate->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_sam_cutoffdate->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_cutoffdate->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_sam_cutoffdate;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckUSDate($frm_sam_cutoffdate->t_startDate->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_cutoffdate->t_startDate->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_sam_cutoffdate->t_cutOffDate->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_cutoffdate->t_cutOffDate->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_sam_cutoffdate->t_cutOffDate_fp->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_cutoffdate->t_cutOffDate_fp->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_sam_cutoffdate->a_startDate->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_cutoffdate->a_startDate->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_sam_cutoffdate->a_cutOffDate->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_cutoffdate->a_cutOffDate->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_sam_cutoffdate->a_cutOffDate_fp->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_cutoffdate->a_cutOffDate_fp->FldErrMsg());
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
		global $conn, $Security, $Language, $frm_sam_cutoffdate;
		$sFilter = $frm_sam_cutoffdate->KeyFilter();
		$frm_sam_cutoffdate->CurrentFilter = $sFilter;
		$sSql = $frm_sam_cutoffdate->SQL();
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

			// focal_person_id
			$frm_sam_cutoffdate->focal_person_id->SetDbValueDef($rsnew, $frm_sam_cutoffdate->focal_person_id->CurrentValue, NULL, $frm_sam_cutoffdate->focal_person_id->ReadOnly);

			// t_startDate
			$frm_sam_cutoffdate->t_startDate->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_sam_cutoffdate->t_startDate->CurrentValue, 6), NULL, $frm_sam_cutoffdate->t_startDate->ReadOnly);

			// t_cutOffDate
			$frm_sam_cutoffdate->t_cutOffDate->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_sam_cutoffdate->t_cutOffDate->CurrentValue, 6), NULL, $frm_sam_cutoffdate->t_cutOffDate->ReadOnly);

			// t_cutOffDate_fp
			$frm_sam_cutoffdate->t_cutOffDate_fp->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_sam_cutoffdate->t_cutOffDate_fp->CurrentValue, 6), NULL, $frm_sam_cutoffdate->t_cutOffDate_fp->ReadOnly);

			// t_cutOffDate_remarks
			$frm_sam_cutoffdate->t_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_sam_cutoffdate->t_cutOffDate_remarks->CurrentValue, NULL, $frm_sam_cutoffdate->t_cutOffDate_remarks->ReadOnly);

			// a_startDate
			$frm_sam_cutoffdate->a_startDate->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_sam_cutoffdate->a_startDate->CurrentValue, 6), NULL, $frm_sam_cutoffdate->a_startDate->ReadOnly);

			// a_cutOffDate
			$frm_sam_cutoffdate->a_cutOffDate->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_sam_cutoffdate->a_cutOffDate->CurrentValue, 6), NULL, $frm_sam_cutoffdate->a_cutOffDate->ReadOnly);

			// a_cutOffDate_fp
			$frm_sam_cutoffdate->a_cutOffDate_fp->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_sam_cutoffdate->a_cutOffDate_fp->CurrentValue, 6), NULL, $frm_sam_cutoffdate->a_cutOffDate_fp->ReadOnly);

			// a_cutOffDate_remarks
			$frm_sam_cutoffdate->a_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_sam_cutoffdate->a_cutOffDate_remarks->CurrentValue, NULL, $frm_sam_cutoffdate->a_cutOffDate_remarks->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_sam_cutoffdate->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_sam_cutoffdate->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_sam_cutoffdate->CancelMessage <> "") {
					$this->setFailureMessage($frm_sam_cutoffdate->CancelMessage);
					$frm_sam_cutoffdate->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_sam_cutoffdate->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
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
