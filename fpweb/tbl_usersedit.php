<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "view_tbl_uporgchart_cu_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_users_edit = new ctbl_users_edit();
$Page =& $tbl_users_edit;

// Page init
$tbl_users_edit->Page_Init();

// Page main
$tbl_users_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_users_edit = new up_Page("tbl_users_edit");

// page properties
tbl_users_edit.PageID = "edit"; // page ID
tbl_users_edit.FormID = "ftbl_usersedit"; // form ID
var UP_PAGE_ID = tbl_users_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_users_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_users_nameLast"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_users->users_nameLast->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_nameFirst"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_users->users_nameFirst->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_userLoginName"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_users->users_userLoginName->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_password"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_users->users_password->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_userLevel"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_users->users_userLevel->FldCaption()) ?>");

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
tbl_users_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_users_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_users_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_users_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_users->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_users->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_users_edit->ShowPageHeader(); ?>
<?php
$tbl_users_edit->ShowMessage();
?>
<form name="ftbl_usersedit" id="ftbl_usersedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return tbl_users_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="tbl_users">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_users->users_ID->Visible) { // users_ID ?>
	<tr id="r_users_ID"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_ID->FldCaption() ?></td>
		<td<?php echo $tbl_users->users_ID->CellAttributes() ?>><span id="el_users_ID">
<div<?php echo $tbl_users->users_ID->ViewAttributes() ?>><?php echo $tbl_users->users_ID->EditValue ?></div>
<input type="hidden" name="x_users_ID" id="x_users_ID" value="<?php echo up_HtmlEncode($tbl_users->users_ID->CurrentValue) ?>">
</span><?php echo $tbl_users->users_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->unitID->Visible) { // unitID ?>
	<tr id="r_unitID"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->unitID->FldCaption() ?></td>
		<td<?php echo $tbl_users->unitID->CellAttributes() ?>><span id="el_unitID">
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $tbl_users->unitID->ViewAttributes() ?>><?php echo $tbl_users->unitID->EditValue ?></div>
<input type="hidden" name="x_unitID" id="x_unitID" value="<?php echo up_HtmlEncode($tbl_users->unitID->CurrentValue) ?>">
<?php } else { ?>
<select id="x_unitID" name="x_unitID"<?php echo $tbl_users->unitID->EditAttributes() ?>>
<?php
if (is_array($tbl_users->unitID->EditValue)) {
	$arwrk = $tbl_users->unitID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_users->unitID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<?php } ?>
</span><?php echo $tbl_users->unitID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->users_nameLast->Visible) { // users_nameLast ?>
	<tr id="r_users_nameLast"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_nameLast->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_users->users_nameLast->CellAttributes() ?>><span id="el_users_nameLast">
<input type="text" name="x_users_nameLast" id="x_users_nameLast" size="30" maxlength="45" value="<?php echo $tbl_users->users_nameLast->EditValue ?>"<?php echo $tbl_users->users_nameLast->EditAttributes() ?>>
</span><?php echo $tbl_users->users_nameLast->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->users_nameFirst->Visible) { // users_nameFirst ?>
	<tr id="r_users_nameFirst"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_nameFirst->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_users->users_nameFirst->CellAttributes() ?>><span id="el_users_nameFirst">
<input type="text" name="x_users_nameFirst" id="x_users_nameFirst" size="30" maxlength="45" value="<?php echo $tbl_users->users_nameFirst->EditValue ?>"<?php echo $tbl_users->users_nameFirst->EditAttributes() ?>>
</span><?php echo $tbl_users->users_nameFirst->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->users_nameMiddle->Visible) { // users_nameMiddle ?>
	<tr id="r_users_nameMiddle"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_nameMiddle->FldCaption() ?></td>
		<td<?php echo $tbl_users->users_nameMiddle->CellAttributes() ?>><span id="el_users_nameMiddle">
<input type="text" name="x_users_nameMiddle" id="x_users_nameMiddle" size="30" maxlength="45" value="<?php echo $tbl_users->users_nameMiddle->EditValue ?>"<?php echo $tbl_users->users_nameMiddle->EditAttributes() ?>>
</span><?php echo $tbl_users->users_nameMiddle->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->users_userLoginName->Visible) { // users_userLoginName ?>
	<tr id="r_users_userLoginName"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_userLoginName->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_users->users_userLoginName->CellAttributes() ?>><span id="el_users_userLoginName">
<input type="text" name="x_users_userLoginName" id="x_users_userLoginName" size="30" maxlength="12" value="<?php echo $tbl_users->users_userLoginName->EditValue ?>"<?php echo $tbl_users->users_userLoginName->EditAttributes() ?>>
</span><?php echo $tbl_users->users_userLoginName->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->users_password->Visible) { // users_password ?>
	<tr id="r_users_password"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_password->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_users->users_password->CellAttributes() ?>><span id="el_users_password">
<input type="password" name="x_users_password" id="x_users_password" value="<?php echo $tbl_users->users_password->EditValue ?>" size="30" maxlength="15"<?php echo $tbl_users->users_password->EditAttributes() ?>>
</span><?php echo $tbl_users->users_password->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->users_userLevel->Visible) { // users_userLevel ?>
	<tr id="r_users_userLevel"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_userLevel->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_users->users_userLevel->CellAttributes() ?>><span id="el_users_userLevel">
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $tbl_users->users_userLevel->ViewAttributes() ?>><?php echo $tbl_users->users_userLevel->EditValue ?></div>
<?php } else { ?>
<select id="x_users_userLevel" name="x_users_userLevel"<?php echo $tbl_users->users_userLevel->EditAttributes() ?>>
<?php
if (is_array($tbl_users->users_userLevel->EditValue)) {
	$arwrk = $tbl_users->users_userLevel->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_users->users_userLevel->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<?php } ?>
</span><?php echo $tbl_users->users_userLevel->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->users_email->Visible) { // users_email ?>
	<tr id="r_users_email"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_email->FldCaption() ?></td>
		<td<?php echo $tbl_users->users_email->CellAttributes() ?>><span id="el_users_email">
<input type="text" name="x_users_email" id="x_users_email" size="30" maxlength="255" value="<?php echo $tbl_users->users_email->EditValue ?>"<?php echo $tbl_users->users_email->EditAttributes() ?>>
</span><?php echo $tbl_users->users_email->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->users_contactNo->Visible) { // users_contactNo ?>
	<tr id="r_users_contactNo"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_contactNo->FldCaption() ?></td>
		<td<?php echo $tbl_users->users_contactNo->CellAttributes() ?>><span id="el_users_contactNo">
<input type="text" name="x_users_contactNo" id="x_users_contactNo" size="30" maxlength="255" value="<?php echo $tbl_users->users_contactNo->EditValue ?>"<?php echo $tbl_users->users_contactNo->EditAttributes() ?>>
</span><?php echo $tbl_users->users_contactNo->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$tbl_users_edit->ShowPageFooter();
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
$tbl_users_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_users_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'tbl_users';

	// Page object name
	var $PageObjName = 'tbl_users_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_users;
		if ($tbl_users->UseTokenInUrl) $PageUrl .= "t=" . $tbl_users->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_users;
		if ($tbl_users->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_users_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_users)
		if (!isset($GLOBALS["tbl_users"])) {
			$GLOBALS["tbl_users"] = new ctbl_users();
			$GLOBALS["Table"] =& $GLOBALS["tbl_users"];
		}

		// Table object (view_tbl_uporgchart_cu_users)
		if (!isset($GLOBALS['view_tbl_uporgchart_cu_users'])) $GLOBALS['view_tbl_uporgchart_cu_users'] = new cview_tbl_uporgchart_cu_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_users', TRUE);

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
		global $tbl_users;

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
			$this->Page_Terminate("tbl_userslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("tbl_userslist.php");
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
	var $DbMasterFilter;
	var $DbDetailFilter;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $tbl_users;

		// Load key from QueryString
		if (@$_GET["users_ID"] <> "")
			$tbl_users->users_ID->setQueryStringValue($_GET["users_ID"]);

		// Set up master detail parameters
		$this->SetUpMasterParms();
		if (@$_POST["a_edit"] <> "") {
			$tbl_users->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$tbl_users->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$tbl_users->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$tbl_users->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($tbl_users->users_ID->CurrentValue == "")
			$this->Page_Terminate("tbl_userslist.php"); // Invalid key, return to list
		switch ($tbl_users->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("tbl_userslist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$tbl_users->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $tbl_users->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$tbl_users->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$tbl_users->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$tbl_users->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_users;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_users;
		if (!$tbl_users->users_ID->FldIsDetailKey)
			$tbl_users->users_ID->setFormValue($objForm->GetValue("x_users_ID"));
		if (!$tbl_users->unitID->FldIsDetailKey) {
			$tbl_users->unitID->setFormValue($objForm->GetValue("x_unitID"));
		}
		if (!$tbl_users->users_nameLast->FldIsDetailKey) {
			$tbl_users->users_nameLast->setFormValue($objForm->GetValue("x_users_nameLast"));
		}
		if (!$tbl_users->users_nameFirst->FldIsDetailKey) {
			$tbl_users->users_nameFirst->setFormValue($objForm->GetValue("x_users_nameFirst"));
		}
		if (!$tbl_users->users_nameMiddle->FldIsDetailKey) {
			$tbl_users->users_nameMiddle->setFormValue($objForm->GetValue("x_users_nameMiddle"));
		}
		if (!$tbl_users->users_userLoginName->FldIsDetailKey) {
			$tbl_users->users_userLoginName->setFormValue($objForm->GetValue("x_users_userLoginName"));
		}
		if (!$tbl_users->users_password->FldIsDetailKey) {
			$tbl_users->users_password->setFormValue($objForm->GetValue("x_users_password"));
		}
		if (!$tbl_users->users_userLevel->FldIsDetailKey) {
			$tbl_users->users_userLevel->setFormValue($objForm->GetValue("x_users_userLevel"));
		}
		if (!$tbl_users->users_email->FldIsDetailKey) {
			$tbl_users->users_email->setFormValue($objForm->GetValue("x_users_email"));
		}
		if (!$tbl_users->users_contactNo->FldIsDetailKey) {
			$tbl_users->users_contactNo->setFormValue($objForm->GetValue("x_users_contactNo"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_users;
		$this->LoadRow();
		$tbl_users->users_ID->CurrentValue = $tbl_users->users_ID->FormValue;
		$tbl_users->unitID->CurrentValue = $tbl_users->unitID->FormValue;
		$tbl_users->users_nameLast->CurrentValue = $tbl_users->users_nameLast->FormValue;
		$tbl_users->users_nameFirst->CurrentValue = $tbl_users->users_nameFirst->FormValue;
		$tbl_users->users_nameMiddle->CurrentValue = $tbl_users->users_nameMiddle->FormValue;
		$tbl_users->users_userLoginName->CurrentValue = $tbl_users->users_userLoginName->FormValue;
		$tbl_users->users_password->CurrentValue = $tbl_users->users_password->FormValue;
		$tbl_users->users_userLevel->CurrentValue = $tbl_users->users_userLevel->FormValue;
		$tbl_users->users_email->CurrentValue = $tbl_users->users_email->FormValue;
		$tbl_users->users_contactNo->CurrentValue = $tbl_users->users_contactNo->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_users;
		$sFilter = $tbl_users->KeyFilter();

		// Call Row Selecting event
		$tbl_users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_users->CurrentFilter = $sFilter;
		$sSql = $tbl_users->SQL();
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
		global $conn, $tbl_users;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_users->Row_Selected($row);
		$tbl_users->users_ID->setDbValue($rs->fields('users_ID'));
		$tbl_users->cu->setDbValue($rs->fields('cu'));
		$tbl_users->unitID->setDbValue($rs->fields('unitID'));
		$tbl_users->users_name->setDbValue($rs->fields('users_name'));
		$tbl_users->users_nameLast->setDbValue($rs->fields('users_nameLast'));
		$tbl_users->users_nameFirst->setDbValue($rs->fields('users_nameFirst'));
		$tbl_users->users_nameMiddle->setDbValue($rs->fields('users_nameMiddle'));
		$tbl_users->users_userLoginName->setDbValue($rs->fields('users_userLoginName'));
		$tbl_users->users_password->setDbValue($rs->fields('users_password'));
		$tbl_users->users_userLevel->setDbValue($rs->fields('users_userLevel'));
		$tbl_users->users_email->setDbValue($rs->fields('users_email'));
		$tbl_users->users_contactNo->setDbValue($rs->fields('users_contactNo'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_users;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_users->Row_Rendering();

		// Common render codes for all row types
		// users_ID
		// cu
		// unitID
		// users_name
		// users_nameLast
		// users_nameFirst
		// users_nameMiddle
		// users_userLoginName
		// users_password
		// users_userLevel
		// users_email
		// users_contactNo

		if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View row

			// users_ID
			$tbl_users->users_ID->ViewValue = $tbl_users->users_ID->CurrentValue;
			$tbl_users->users_ID->ViewCustomAttributes = "";

			// unitID
			if (strval($tbl_users->unitID->CurrentValue) <> "") {
				$sFilterWrk = "`unitID` = " . up_AdjustSql($tbl_users->unitID->CurrentValue) . "";
			$sSqlWrk = "SELECT `cuUnitName` FROM `tbl_uporgchart_unit`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `cuUnitName` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_users->unitID->ViewValue = $rswrk->fields('cuUnitName');
					$rswrk->Close();
				} else {
					$tbl_users->unitID->ViewValue = $tbl_users->unitID->CurrentValue;
				}
			} else {
				$tbl_users->unitID->ViewValue = NULL;
			}
			$tbl_users->unitID->ViewCustomAttributes = "";

			// users_name
			$tbl_users->users_name->ViewValue = $tbl_users->users_name->CurrentValue;
			$tbl_users->users_name->ViewCustomAttributes = "";

			// users_nameLast
			$tbl_users->users_nameLast->ViewValue = $tbl_users->users_nameLast->CurrentValue;
			$tbl_users->users_nameLast->ViewCustomAttributes = "";

			// users_nameFirst
			$tbl_users->users_nameFirst->ViewValue = $tbl_users->users_nameFirst->CurrentValue;
			$tbl_users->users_nameFirst->ViewCustomAttributes = "";

			// users_nameMiddle
			$tbl_users->users_nameMiddle->ViewValue = $tbl_users->users_nameMiddle->CurrentValue;
			$tbl_users->users_nameMiddle->ViewCustomAttributes = "";

			// users_userLoginName
			$tbl_users->users_userLoginName->ViewValue = $tbl_users->users_userLoginName->CurrentValue;
			$tbl_users->users_userLoginName->ViewCustomAttributes = "";

			// users_password
			$tbl_users->users_password->ViewValue = "********";
			$tbl_users->users_password->ViewCustomAttributes = "";

			// users_userLevel
			if ($Security->CanAdmin()) { // System admin
			if (strval($tbl_users->users_userLevel->CurrentValue) <> "") {
				switch ($tbl_users->users_userLevel->CurrentValue) {
					case "1":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(1) <> "" ? $tbl_users->users_userLevel->FldTagCaption(1) : $tbl_users->users_userLevel->CurrentValue;
						break;
					case "-1":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(2) <> "" ? $tbl_users->users_userLevel->FldTagCaption(2) : $tbl_users->users_userLevel->CurrentValue;
						break;
					default:
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->CurrentValue;
				}
			} else {
				$tbl_users->users_userLevel->ViewValue = NULL;
			}
			} else {
				$tbl_users->users_userLevel->ViewValue = "********";
			}
			$tbl_users->users_userLevel->ViewCustomAttributes = "";

			// users_email
			$tbl_users->users_email->ViewValue = $tbl_users->users_email->CurrentValue;
			$tbl_users->users_email->ViewCustomAttributes = "";

			// users_contactNo
			$tbl_users->users_contactNo->ViewValue = $tbl_users->users_contactNo->CurrentValue;
			$tbl_users->users_contactNo->ViewCustomAttributes = "";

			// users_ID
			$tbl_users->users_ID->LinkCustomAttributes = "";
			$tbl_users->users_ID->HrefValue = "";
			$tbl_users->users_ID->TooltipValue = "";

			// unitID
			$tbl_users->unitID->LinkCustomAttributes = "";
			$tbl_users->unitID->HrefValue = "";
			$tbl_users->unitID->TooltipValue = "";

			// users_nameLast
			$tbl_users->users_nameLast->LinkCustomAttributes = "";
			$tbl_users->users_nameLast->HrefValue = "";
			$tbl_users->users_nameLast->TooltipValue = "";

			// users_nameFirst
			$tbl_users->users_nameFirst->LinkCustomAttributes = "";
			$tbl_users->users_nameFirst->HrefValue = "";
			$tbl_users->users_nameFirst->TooltipValue = "";

			// users_nameMiddle
			$tbl_users->users_nameMiddle->LinkCustomAttributes = "";
			$tbl_users->users_nameMiddle->HrefValue = "";
			$tbl_users->users_nameMiddle->TooltipValue = "";

			// users_userLoginName
			$tbl_users->users_userLoginName->LinkCustomAttributes = "";
			$tbl_users->users_userLoginName->HrefValue = "";
			$tbl_users->users_userLoginName->TooltipValue = "";

			// users_password
			$tbl_users->users_password->LinkCustomAttributes = "";
			$tbl_users->users_password->HrefValue = "";
			$tbl_users->users_password->TooltipValue = "";

			// users_userLevel
			$tbl_users->users_userLevel->LinkCustomAttributes = "";
			$tbl_users->users_userLevel->HrefValue = "";
			$tbl_users->users_userLevel->TooltipValue = "";

			// users_email
			$tbl_users->users_email->LinkCustomAttributes = "";
			$tbl_users->users_email->HrefValue = "";
			$tbl_users->users_email->TooltipValue = "";

			// users_contactNo
			$tbl_users->users_contactNo->LinkCustomAttributes = "";
			$tbl_users->users_contactNo->HrefValue = "";
			$tbl_users->users_contactNo->TooltipValue = "";
		} elseif ($tbl_users->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// users_ID
			$tbl_users->users_ID->EditCustomAttributes = "";
			$tbl_users->users_ID->EditValue = $tbl_users->users_ID->CurrentValue;
			$tbl_users->users_ID->ViewCustomAttributes = "";

			// unitID
			$tbl_users->unitID->EditCustomAttributes = "";
			if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
				$tbl_users->unitID->CurrentValue = CurrentUserID();
			if (strval($tbl_users->unitID->CurrentValue) <> "") {
				$sFilterWrk = "`unitID` = " . up_AdjustSql($tbl_users->unitID->CurrentValue) . "";
			$sSqlWrk = "SELECT `cuUnitName` FROM `tbl_uporgchart_unit`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `cuUnitName` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_users->unitID->EditValue = $rswrk->fields('cuUnitName');
					$rswrk->Close();
				} else {
					$tbl_users->unitID->EditValue = $tbl_users->unitID->CurrentValue;
				}
			} else {
				$tbl_users->unitID->EditValue = NULL;
			}
			$tbl_users->unitID->ViewCustomAttributes = "";
			} else {
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `unitID`, `cuUnitName` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `tbl_uporgchart_unit`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `cuUnitName` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_users->unitID->EditValue = $arwrk;
			}

			// users_nameLast
			$tbl_users->users_nameLast->EditCustomAttributes = "";
			$tbl_users->users_nameLast->EditValue = up_HtmlEncode($tbl_users->users_nameLast->CurrentValue);

			// users_nameFirst
			$tbl_users->users_nameFirst->EditCustomAttributes = "";
			$tbl_users->users_nameFirst->EditValue = up_HtmlEncode($tbl_users->users_nameFirst->CurrentValue);

			// users_nameMiddle
			$tbl_users->users_nameMiddle->EditCustomAttributes = "";
			$tbl_users->users_nameMiddle->EditValue = up_HtmlEncode($tbl_users->users_nameMiddle->CurrentValue);

			// users_userLoginName
			$tbl_users->users_userLoginName->EditCustomAttributes = "";
			$tbl_users->users_userLoginName->EditValue = up_HtmlEncode($tbl_users->users_userLoginName->CurrentValue);

			// users_password
			$tbl_users->users_password->EditCustomAttributes = "";
			$tbl_users->users_password->EditValue = up_HtmlEncode($tbl_users->users_password->CurrentValue);

			// users_userLevel
			$tbl_users->users_userLevel->EditCustomAttributes = "";
			if (!$Security->CanAdmin()) { // System admin
				$tbl_users->users_userLevel->EditValue = "********";
			} else {
			$arwrk = array();
			$arwrk[] = array("1", $tbl_users->users_userLevel->FldTagCaption(1) <> "" ? $tbl_users->users_userLevel->FldTagCaption(1) : "1");
			$arwrk[] = array("-1", $tbl_users->users_userLevel->FldTagCaption(2) <> "" ? $tbl_users->users_userLevel->FldTagCaption(2) : "-1");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_users->users_userLevel->EditValue = $arwrk;
			}

			// users_email
			$tbl_users->users_email->EditCustomAttributes = "";
			$tbl_users->users_email->EditValue = up_HtmlEncode($tbl_users->users_email->CurrentValue);

			// users_contactNo
			$tbl_users->users_contactNo->EditCustomAttributes = "";
			$tbl_users->users_contactNo->EditValue = up_HtmlEncode($tbl_users->users_contactNo->CurrentValue);

			// Edit refer script
			// users_ID

			$tbl_users->users_ID->HrefValue = "";

			// unitID
			$tbl_users->unitID->HrefValue = "";

			// users_nameLast
			$tbl_users->users_nameLast->HrefValue = "";

			// users_nameFirst
			$tbl_users->users_nameFirst->HrefValue = "";

			// users_nameMiddle
			$tbl_users->users_nameMiddle->HrefValue = "";

			// users_userLoginName
			$tbl_users->users_userLoginName->HrefValue = "";

			// users_password
			$tbl_users->users_password->HrefValue = "";

			// users_userLevel
			$tbl_users->users_userLevel->HrefValue = "";

			// users_email
			$tbl_users->users_email->HrefValue = "";

			// users_contactNo
			$tbl_users->users_contactNo->HrefValue = "";
		}
		if ($tbl_users->RowType == UP_ROWTYPE_ADD ||
			$tbl_users->RowType == UP_ROWTYPE_EDIT ||
			$tbl_users->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_users->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_users->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_users->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_users;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($tbl_users->users_nameLast->FormValue) && $tbl_users->users_nameLast->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_users->users_nameLast->FldCaption());
		}
		if (!is_null($tbl_users->users_nameFirst->FormValue) && $tbl_users->users_nameFirst->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_users->users_nameFirst->FldCaption());
		}
		if (!is_null($tbl_users->users_userLoginName->FormValue) && $tbl_users->users_userLoginName->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_users->users_userLoginName->FldCaption());
		}
		if (!is_null($tbl_users->users_password->FormValue) && $tbl_users->users_password->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_users->users_password->FldCaption());
		}
		if (!is_null($tbl_users->users_userLevel->FormValue) && $tbl_users->users_userLevel->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_users->users_userLevel->FldCaption());
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
		global $conn, $Security, $Language, $tbl_users;
		$sFilter = $tbl_users->KeyFilter();
			if ($tbl_users->users_userLoginName->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(`users_userLoginName` = '" . up_AdjustSql($tbl_users->users_userLoginName->CurrentValue) . "')";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$tbl_users->CurrentFilter = $sFilterChk;
			$sSqlChk = $tbl_users->SQL();
			$conn->raiseErrorFn = 'up_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'users_userLoginName', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $tbl_users->users_userLoginName->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
		$tbl_users->CurrentFilter = $sFilter;
		$sSql = $tbl_users->SQL();
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

			// unitID
			$tbl_users->unitID->SetDbValueDef($rsnew, $tbl_users->unitID->CurrentValue, NULL, $tbl_users->unitID->ReadOnly);

			// users_nameLast
			$tbl_users->users_nameLast->SetDbValueDef($rsnew, $tbl_users->users_nameLast->CurrentValue, "", $tbl_users->users_nameLast->ReadOnly);

			// users_nameFirst
			$tbl_users->users_nameFirst->SetDbValueDef($rsnew, $tbl_users->users_nameFirst->CurrentValue, "", $tbl_users->users_nameFirst->ReadOnly);

			// users_nameMiddle
			$tbl_users->users_nameMiddle->SetDbValueDef($rsnew, $tbl_users->users_nameMiddle->CurrentValue, NULL, $tbl_users->users_nameMiddle->ReadOnly);

			// users_userLoginName
			$tbl_users->users_userLoginName->SetDbValueDef($rsnew, $tbl_users->users_userLoginName->CurrentValue, "", $tbl_users->users_userLoginName->ReadOnly);

			// users_password
			$tbl_users->users_password->SetDbValueDef($rsnew, $tbl_users->users_password->CurrentValue, "", $tbl_users->users_password->ReadOnly || (UP_ENCRYPTED_PASSWORD && $rs->fields('users_password') == $tbl_users->users_password->CurrentValue));

			// users_userLevel
			if ($Security->CanAdmin()) { // System admin
			$tbl_users->users_userLevel->SetDbValueDef($rsnew, $tbl_users->users_userLevel->CurrentValue, 0, $tbl_users->users_userLevel->ReadOnly);
			}

			// users_email
			$tbl_users->users_email->SetDbValueDef($rsnew, $tbl_users->users_email->CurrentValue, NULL, $tbl_users->users_email->ReadOnly);

			// users_contactNo
			$tbl_users->users_contactNo->SetDbValueDef($rsnew, $tbl_users->users_contactNo->CurrentValue, NULL, $tbl_users->users_contactNo->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $tbl_users->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($tbl_users->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_users->CancelMessage <> "") {
					$this->setFailureMessage($tbl_users->CancelMessage);
					$tbl_users->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_users->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_users;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "view_tbl_uporgchart_cu_users") {
				$bValidMaster = TRUE;
				if (@$_GET["code"] <> "") {
					$GLOBALS["view_tbl_uporgchart_cu_users"]->code->setQueryStringValue($_GET["code"]);
					$tbl_users->cu->setQueryStringValue($GLOBALS["view_tbl_uporgchart_cu_users"]->code->QueryStringValue);
					$tbl_users->cu->setSessionValue($tbl_users->cu->QueryStringValue);
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$tbl_users->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$tbl_users->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "view_tbl_uporgchart_cu_users") {
				if ($tbl_users->cu->QueryStringValue == "") $tbl_users->cu->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $tbl_users->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_users->getDetailFilter(); // Get detail filter
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_users';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $tbl_users;
		$table = 'tbl_users';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['users_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($tbl_users->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_users->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($tbl_users->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($tbl_users->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
