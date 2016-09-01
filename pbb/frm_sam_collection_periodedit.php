<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_sam_collection_periodinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_sam_collection_period_edit = new cfrm_sam_collection_period_edit();
$Page =& $frm_sam_collection_period_edit;

// Page init
$frm_sam_collection_period_edit->Page_Init();

// Page main
$frm_sam_collection_period_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_collection_period_edit = new up_Page("frm_sam_collection_period_edit");

// page properties
frm_sam_collection_period_edit.PageID = "edit"; // page ID
frm_sam_collection_period_edit.FormID = "ffrm_sam_collection_periodedit"; // form ID
var UP_PAGE_ID = frm_sam_collection_period_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_sam_collection_period_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_collection_year"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_sam_collection_period->collection_year->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_collection_year"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_collection_period->collection_year->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_collection_description"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_sam_collection_period->collection_description->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_collection_date"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_sam_collection_period->collection_date->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_collection_date"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_collection_period->collection_date->FldErrMsg()) ?>");

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
frm_sam_collection_period_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_collection_period_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_collection_period_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_collection_period_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_collection_period->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_sam_collection_period->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_sam_collection_period_edit->ShowPageHeader(); ?>
<?php
$frm_sam_collection_period_edit->ShowMessage();
?>
<form name="ffrm_sam_collection_periodedit" id="ffrm_sam_collection_periodedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return frm_sam_collection_period_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="frm_sam_collection_period">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_sam_collection_period->collection_year->Visible) { // collection_year ?>
	<tr id="r_collection_year"<?php echo $frm_sam_collection_period->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_collection_period->collection_year->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_sam_collection_period->collection_year->CellAttributes() ?>><span id="el_collection_year">
<input type="text" name="x_collection_year" id="x_collection_year" size="30" value="<?php echo $frm_sam_collection_period->collection_year->EditValue ?>"<?php echo $frm_sam_collection_period->collection_year->EditAttributes() ?>>
</span><?php echo $frm_sam_collection_period->collection_year->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_collection_period->collection_description->Visible) { // collection_description ?>
	<tr id="r_collection_description"<?php echo $frm_sam_collection_period->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_collection_period->collection_description->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_sam_collection_period->collection_description->CellAttributes() ?>><span id="el_collection_description">
<input type="text" name="x_collection_description" id="x_collection_description" size="30" maxlength="12" value="<?php echo $frm_sam_collection_period->collection_description->EditValue ?>"<?php echo $frm_sam_collection_period->collection_description->EditAttributes() ?>>
</span><?php echo $frm_sam_collection_period->collection_description->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_collection_period->collection_date->Visible) { // collection_date ?>
	<tr id="r_collection_date"<?php echo $frm_sam_collection_period->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_collection_period->collection_date->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_sam_collection_period->collection_date->CellAttributes() ?>><span id="el_collection_date">
<input type="text" name="x_collection_date" id="x_collection_date" value="<?php echo $frm_sam_collection_period->collection_date->EditValue ?>"<?php echo $frm_sam_collection_period->collection_date->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x_collection_date" name="cal_x_collection_date" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_collection_date", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x_collection_date" // button id
});
</script>
</span><?php echo $frm_sam_collection_period->collection_date->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_collection_id" id="x_collection_id" value="<?php echo up_HtmlEncode($frm_sam_collection_period->collection_id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$frm_sam_collection_period_edit->ShowPageFooter();
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
$frm_sam_collection_period_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_collection_period_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'frm_sam_collection_period';

	// Page object name
	var $PageObjName = 'frm_sam_collection_period_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_collection_period;
		if ($frm_sam_collection_period->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_collection_period->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_collection_period;
		if ($frm_sam_collection_period->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_collection_period->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_collection_period->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_collection_period_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_collection_period)
		if (!isset($GLOBALS["frm_sam_collection_period"])) {
			$GLOBALS["frm_sam_collection_period"] = new cfrm_sam_collection_period();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_collection_period"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_collection_period', TRUE);

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
		global $frm_sam_collection_period;

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
			$this->Page_Terminate("frm_sam_collection_periodlist.php");
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
		global $objForm, $Language, $gsFormError, $frm_sam_collection_period;

		// Load key from QueryString
		if (@$_GET["collection_id"] <> "")
			$frm_sam_collection_period->collection_id->setQueryStringValue($_GET["collection_id"]);
		if (@$_POST["a_edit"] <> "") {
			$frm_sam_collection_period->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$frm_sam_collection_period->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$frm_sam_collection_period->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$frm_sam_collection_period->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($frm_sam_collection_period->collection_id->CurrentValue == "")
			$this->Page_Terminate("frm_sam_collection_periodlist.php"); // Invalid key, return to list
		switch ($frm_sam_collection_period->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("frm_sam_collection_periodlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$frm_sam_collection_period->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $frm_sam_collection_period->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$frm_sam_collection_period->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$frm_sam_collection_period->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$frm_sam_collection_period->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_sam_collection_period;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_sam_collection_period;
		if (!$frm_sam_collection_period->collection_year->FldIsDetailKey) {
			$frm_sam_collection_period->collection_year->setFormValue($objForm->GetValue("x_collection_year"));
		}
		if (!$frm_sam_collection_period->collection_description->FldIsDetailKey) {
			$frm_sam_collection_period->collection_description->setFormValue($objForm->GetValue("x_collection_description"));
		}
		if (!$frm_sam_collection_period->collection_date->FldIsDetailKey) {
			$frm_sam_collection_period->collection_date->setFormValue($objForm->GetValue("x_collection_date"));
			$frm_sam_collection_period->collection_date->CurrentValue = up_UnFormatDateTime($frm_sam_collection_period->collection_date->CurrentValue, 6);
		}
		if (!$frm_sam_collection_period->collection_id->FldIsDetailKey)
			$frm_sam_collection_period->collection_id->setFormValue($objForm->GetValue("x_collection_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_sam_collection_period;
		$this->LoadRow();
		$frm_sam_collection_period->collection_id->CurrentValue = $frm_sam_collection_period->collection_id->FormValue;
		$frm_sam_collection_period->collection_year->CurrentValue = $frm_sam_collection_period->collection_year->FormValue;
		$frm_sam_collection_period->collection_description->CurrentValue = $frm_sam_collection_period->collection_description->FormValue;
		$frm_sam_collection_period->collection_date->CurrentValue = $frm_sam_collection_period->collection_date->FormValue;
		$frm_sam_collection_period->collection_date->CurrentValue = up_UnFormatDateTime($frm_sam_collection_period->collection_date->CurrentValue, 6);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_collection_period;
		$sFilter = $frm_sam_collection_period->KeyFilter();

		// Call Row Selecting event
		$frm_sam_collection_period->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_collection_period->CurrentFilter = $sFilter;
		$sSql = $frm_sam_collection_period->SQL();
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
		global $conn, $frm_sam_collection_period;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_collection_period->Row_Selected($row);
		$frm_sam_collection_period->collection_id->setDbValue($rs->fields('collection_id'));
		$frm_sam_collection_period->collection_year->setDbValue($rs->fields('collection_year'));
		$frm_sam_collection_period->collection_description->setDbValue($rs->fields('collection_description'));
		$frm_sam_collection_period->collection_date->setDbValue($rs->fields('collection_date'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_collection_period;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_sam_collection_period->Row_Rendering();

		// Common render codes for all row types
		// collection_id
		// collection_year
		// collection_description
		// collection_date

		if ($frm_sam_collection_period->RowType == UP_ROWTYPE_VIEW) { // View row

			// collection_year
			$frm_sam_collection_period->collection_year->ViewValue = $frm_sam_collection_period->collection_year->CurrentValue;
			$frm_sam_collection_period->collection_year->ViewCustomAttributes = "";

			// collection_description
			$frm_sam_collection_period->collection_description->ViewValue = $frm_sam_collection_period->collection_description->CurrentValue;
			$frm_sam_collection_period->collection_description->ViewCustomAttributes = "";

			// collection_date
			$frm_sam_collection_period->collection_date->ViewValue = $frm_sam_collection_period->collection_date->CurrentValue;
			$frm_sam_collection_period->collection_date->ViewValue = up_FormatDateTime($frm_sam_collection_period->collection_date->ViewValue, 6);
			$frm_sam_collection_period->collection_date->ViewCustomAttributes = "";

			// collection_year
			$frm_sam_collection_period->collection_year->LinkCustomAttributes = "";
			$frm_sam_collection_period->collection_year->HrefValue = "";
			$frm_sam_collection_period->collection_year->TooltipValue = "";

			// collection_description
			$frm_sam_collection_period->collection_description->LinkCustomAttributes = "";
			$frm_sam_collection_period->collection_description->HrefValue = "";
			$frm_sam_collection_period->collection_description->TooltipValue = "";

			// collection_date
			$frm_sam_collection_period->collection_date->LinkCustomAttributes = "";
			$frm_sam_collection_period->collection_date->HrefValue = "";
			$frm_sam_collection_period->collection_date->TooltipValue = "";
		} elseif ($frm_sam_collection_period->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// collection_year
			$frm_sam_collection_period->collection_year->EditCustomAttributes = "";
			$frm_sam_collection_period->collection_year->EditValue = up_HtmlEncode($frm_sam_collection_period->collection_year->CurrentValue);

			// collection_description
			$frm_sam_collection_period->collection_description->EditCustomAttributes = "";
			$frm_sam_collection_period->collection_description->EditValue = up_HtmlEncode($frm_sam_collection_period->collection_description->CurrentValue);

			// collection_date
			$frm_sam_collection_period->collection_date->EditCustomAttributes = "";
			$frm_sam_collection_period->collection_date->EditValue = up_HtmlEncode(up_FormatDateTime($frm_sam_collection_period->collection_date->CurrentValue, 6));

			// Edit refer script
			// collection_year

			$frm_sam_collection_period->collection_year->HrefValue = "";

			// collection_description
			$frm_sam_collection_period->collection_description->HrefValue = "";

			// collection_date
			$frm_sam_collection_period->collection_date->HrefValue = "";
		}
		if ($frm_sam_collection_period->RowType == UP_ROWTYPE_ADD ||
			$frm_sam_collection_period->RowType == UP_ROWTYPE_EDIT ||
			$frm_sam_collection_period->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_sam_collection_period->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_sam_collection_period->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_collection_period->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_sam_collection_period;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($frm_sam_collection_period->collection_year->FormValue) && $frm_sam_collection_period->collection_year->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_sam_collection_period->collection_year->FldCaption());
		}
		if (!up_CheckInteger($frm_sam_collection_period->collection_year->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_collection_period->collection_year->FldErrMsg());
		}
		if (!is_null($frm_sam_collection_period->collection_description->FormValue) && $frm_sam_collection_period->collection_description->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_sam_collection_period->collection_description->FldCaption());
		}
		if (!is_null($frm_sam_collection_period->collection_date->FormValue) && $frm_sam_collection_period->collection_date->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_sam_collection_period->collection_date->FldCaption());
		}
		if (!up_CheckUSDate($frm_sam_collection_period->collection_date->FormValue)) {
			up_AddMessage($gsFormError, $frm_sam_collection_period->collection_date->FldErrMsg());
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
		global $conn, $Security, $Language, $frm_sam_collection_period;
		$sFilter = $frm_sam_collection_period->KeyFilter();
		$frm_sam_collection_period->CurrentFilter = $sFilter;
		$sSql = $frm_sam_collection_period->SQL();
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

			// collection_year
			$frm_sam_collection_period->collection_year->SetDbValueDef($rsnew, $frm_sam_collection_period->collection_year->CurrentValue, 0, $frm_sam_collection_period->collection_year->ReadOnly);

			// collection_description
			$frm_sam_collection_period->collection_description->SetDbValueDef($rsnew, $frm_sam_collection_period->collection_description->CurrentValue, "", $frm_sam_collection_period->collection_description->ReadOnly);

			// collection_date
			$frm_sam_collection_period->collection_date->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_sam_collection_period->collection_date->CurrentValue, 6), up_CurrentDate(), $frm_sam_collection_period->collection_date->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_sam_collection_period->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_sam_collection_period->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_sam_collection_period->CancelMessage <> "") {
					$this->setFailureMessage($frm_sam_collection_period->CancelMessage);
					$frm_sam_collection_period->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_sam_collection_period->Row_Updated($rsold, $rsnew);
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
