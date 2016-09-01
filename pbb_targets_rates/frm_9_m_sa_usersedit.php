<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_9_m_sa_users_edit = new cfrm_9_m_sa_users_edit();
$Page =& $frm_9_m_sa_users_edit;

// Page init
$frm_9_m_sa_users_edit->Page_Init();

// Page main
$frm_9_m_sa_users_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_9_m_sa_users_edit = new up_Page("frm_9_m_sa_users_edit");

// page properties
frm_9_m_sa_users_edit.PageID = "edit"; // page ID
frm_9_m_sa_users_edit.FormID = "ffrm_9_m_sa_usersedit"; // form ID
var UP_PAGE_ID = frm_9_m_sa_users_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_9_m_sa_users_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_User_Level"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_9_m_sa_users->User_Level->FldCaption()) ?>");

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
frm_9_m_sa_users_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_9_m_sa_users_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_9_m_sa_users_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_9_m_sa_users_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_9_m_sa_users->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_9_m_sa_users->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_9_m_sa_users_edit->ShowPageHeader(); ?>
<?php
$frm_9_m_sa_users_edit->ShowMessage();
?>
<form name="ffrm_9_m_sa_usersedit" id="ffrm_9_m_sa_usersedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return frm_9_m_sa_users_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="frm_9_m_sa_users">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_9_m_sa_users->CU->Visible) { // CU ?>
	<tr id="r_CU"<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_users->CU->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_users->CU->CellAttributes() ?>><span id="el_CU">
<input type="text" name="x_CU" id="x_CU" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_users->CU->EditValue ?>"<?php echo $frm_9_m_sa_users->CU->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_users->CU->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_users->Delivery_Unit->Visible) { // Delivery Unit ?>
	<tr id="r_Delivery_Unit"<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_users->Delivery_Unit->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_users->Delivery_Unit->CellAttributes() ?>><span id="el_Delivery_Unit">
<input type="text" name="x_Delivery_Unit" id="x_Delivery_Unit" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_users->Delivery_Unit->EditValue ?>"<?php echo $frm_9_m_sa_users->Delivery_Unit->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_users->Delivery_Unit->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_users->Contributor_Unit->Visible) { // Contributor Unit ?>
	<tr id="r_Contributor_Unit"<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_users->Contributor_Unit->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_users->Contributor_Unit->CellAttributes() ?>><span id="el_Contributor_Unit">
<input type="text" name="x_Contributor_Unit" id="x_Contributor_Unit" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_users->Contributor_Unit->EditValue ?>"<?php echo $frm_9_m_sa_users->Contributor_Unit->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_users->Contributor_Unit->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_users->Login_Name->Visible) { // Login Name ?>
	<tr id="r_Login_Name"<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_users->Login_Name->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_users->Login_Name->CellAttributes() ?>><span id="el_Login_Name">
<input type="text" name="x_Login_Name" id="x_Login_Name" size="30" maxlength="12" value="<?php echo $frm_9_m_sa_users->Login_Name->EditValue ?>"<?php echo $frm_9_m_sa_users->Login_Name->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_users->Login_Name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_users->Password->Visible) { // Password ?>
	<tr id="r_Password"<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_users->Password->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_users->Password->CellAttributes() ?>><span id="el_Password">
<input type="password" name="x_Password" id="x_Password" value="<?php echo $frm_9_m_sa_users->Password->EditValue ?>" size="30" maxlength="15"<?php echo $frm_9_m_sa_users->Password->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_users->Password->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_users->User_Level->Visible) { // User Level ?>
	<tr id="r_User_Level"<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_users->User_Level->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_9_m_sa_users->User_Level->CellAttributes() ?>><span id="el_User_Level">
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $frm_9_m_sa_users->User_Level->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->User_Level->EditValue ?></div>
<?php } else { ?>
<select id="x_User_Level" name="x_User_Level"<?php echo $frm_9_m_sa_users->User_Level->EditAttributes() ?>>
<?php
if (is_array($frm_9_m_sa_users->User_Level->EditValue)) {
	$arwrk = $frm_9_m_sa_users->User_Level->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_9_m_sa_users->User_Level->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $frm_9_m_sa_users->User_Level->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_users->Last_Name->Visible) { // Last Name ?>
	<tr id="r_Last_Name"<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_users->Last_Name->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_users->Last_Name->CellAttributes() ?>><span id="el_Last_Name">
<input type="text" name="x_Last_Name" id="x_Last_Name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_users->Last_Name->EditValue ?>"<?php echo $frm_9_m_sa_users->Last_Name->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_users->Last_Name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_users->First_Name->Visible) { // First Name ?>
	<tr id="r_First_Name"<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_users->First_Name->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_users->First_Name->CellAttributes() ?>><span id="el_First_Name">
<input type="text" name="x_First_Name" id="x_First_Name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_users->First_Name->EditValue ?>"<?php echo $frm_9_m_sa_users->First_Name->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_users->First_Name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_users->Middle_Name->Visible) { // Middle Name ?>
	<tr id="r_Middle_Name"<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_users->Middle_Name->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_users->Middle_Name->CellAttributes() ?>><span id="el_Middle_Name">
<input type="text" name="x_Middle_Name" id="x_Middle_Name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_users->Middle_Name->EditValue ?>"<?php echo $frm_9_m_sa_users->Middle_Name->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_users->Middle_Name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_users->zEmail->Visible) { // Email ?>
	<tr id="r_zEmail"<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_users->zEmail->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_users->zEmail->CellAttributes() ?>><span id="el_zEmail">
<input type="text" name="x_zEmail" id="x_zEmail" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_users->zEmail->EditValue ?>"<?php echo $frm_9_m_sa_users->zEmail->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_users->zEmail->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_users->Contact_No2E->Visible) { // Contact No. ?>
	<tr id="r_Contact_No2E"<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_users->Contact_No2E->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_users->Contact_No2E->CellAttributes() ?>><span id="el_Contact_No2E">
<input type="text" name="x_Contact_No2E" id="x_Contact_No2E" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_users->Contact_No2E->EditValue ?>"<?php echo $frm_9_m_sa_users->Contact_No2E->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_users->Contact_No2E->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_users_id" id="x_users_id" value="<?php echo up_HtmlEncode($frm_9_m_sa_users->users_id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$frm_9_m_sa_users_edit->ShowPageFooter();
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
$frm_9_m_sa_users_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_9_m_sa_users_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'frm_9_m_sa_users';

	// Page object name
	var $PageObjName = 'frm_9_m_sa_users_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_9_m_sa_users;
		if ($frm_9_m_sa_users->UseTokenInUrl) $PageUrl .= "t=" . $frm_9_m_sa_users->TableVar . "&"; // Add page token
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
		global $objForm, $frm_9_m_sa_users;
		if ($frm_9_m_sa_users->UseTokenInUrl) {
			if ($objForm)
				return ($frm_9_m_sa_users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_9_m_sa_users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_9_m_sa_users_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS["frm_9_m_sa_users"])) {
			$GLOBALS["frm_9_m_sa_users"] = new cfrm_9_m_sa_users();
			$GLOBALS["Table"] =& $GLOBALS["frm_9_m_sa_users"];
		}

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_9_m_sa_users', TRUE);

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
		global $frm_9_m_sa_users;

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
			$this->Page_Terminate("frm_9_m_sa_userslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_9_m_sa_userslist.php");
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
		global $objForm, $Language, $gsFormError, $frm_9_m_sa_users;

		// Load key from QueryString
		if (@$_GET["users_id"] <> "")
			$frm_9_m_sa_users->users_id->setQueryStringValue($_GET["users_id"]);
		if (@$_POST["a_edit"] <> "") {
			$frm_9_m_sa_users->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$frm_9_m_sa_users->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$frm_9_m_sa_users->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$frm_9_m_sa_users->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($frm_9_m_sa_users->users_id->CurrentValue == "")
			$this->Page_Terminate("frm_9_m_sa_userslist.php"); // Invalid key, return to list
		switch ($frm_9_m_sa_users->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("frm_9_m_sa_userslist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$frm_9_m_sa_users->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $frm_9_m_sa_users->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$frm_9_m_sa_users->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$frm_9_m_sa_users->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$frm_9_m_sa_users->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_9_m_sa_users;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_9_m_sa_users;
		if (!$frm_9_m_sa_users->CU->FldIsDetailKey) {
			$frm_9_m_sa_users->CU->setFormValue($objForm->GetValue("x_CU"));
		}
		if (!$frm_9_m_sa_users->Delivery_Unit->FldIsDetailKey) {
			$frm_9_m_sa_users->Delivery_Unit->setFormValue($objForm->GetValue("x_Delivery_Unit"));
		}
		if (!$frm_9_m_sa_users->Contributor_Unit->FldIsDetailKey) {
			$frm_9_m_sa_users->Contributor_Unit->setFormValue($objForm->GetValue("x_Contributor_Unit"));
		}
		if (!$frm_9_m_sa_users->Login_Name->FldIsDetailKey) {
			$frm_9_m_sa_users->Login_Name->setFormValue($objForm->GetValue("x_Login_Name"));
		}
		if (!$frm_9_m_sa_users->Password->FldIsDetailKey) {
			$frm_9_m_sa_users->Password->setFormValue($objForm->GetValue("x_Password"));
		}
		if (!$frm_9_m_sa_users->User_Level->FldIsDetailKey) {
			$frm_9_m_sa_users->User_Level->setFormValue($objForm->GetValue("x_User_Level"));
		}
		if (!$frm_9_m_sa_users->Last_Name->FldIsDetailKey) {
			$frm_9_m_sa_users->Last_Name->setFormValue($objForm->GetValue("x_Last_Name"));
		}
		if (!$frm_9_m_sa_users->First_Name->FldIsDetailKey) {
			$frm_9_m_sa_users->First_Name->setFormValue($objForm->GetValue("x_First_Name"));
		}
		if (!$frm_9_m_sa_users->Middle_Name->FldIsDetailKey) {
			$frm_9_m_sa_users->Middle_Name->setFormValue($objForm->GetValue("x_Middle_Name"));
		}
		if (!$frm_9_m_sa_users->zEmail->FldIsDetailKey) {
			$frm_9_m_sa_users->zEmail->setFormValue($objForm->GetValue("x_zEmail"));
		}
		if (!$frm_9_m_sa_users->Contact_No2E->FldIsDetailKey) {
			$frm_9_m_sa_users->Contact_No2E->setFormValue($objForm->GetValue("x_Contact_No2E"));
		}
		if (!$frm_9_m_sa_users->users_id->FldIsDetailKey)
			$frm_9_m_sa_users->users_id->setFormValue($objForm->GetValue("x_users_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_9_m_sa_users;
		$this->LoadRow();
		$frm_9_m_sa_users->users_id->CurrentValue = $frm_9_m_sa_users->users_id->FormValue;
		$frm_9_m_sa_users->CU->CurrentValue = $frm_9_m_sa_users->CU->FormValue;
		$frm_9_m_sa_users->Delivery_Unit->CurrentValue = $frm_9_m_sa_users->Delivery_Unit->FormValue;
		$frm_9_m_sa_users->Contributor_Unit->CurrentValue = $frm_9_m_sa_users->Contributor_Unit->FormValue;
		$frm_9_m_sa_users->Login_Name->CurrentValue = $frm_9_m_sa_users->Login_Name->FormValue;
		$frm_9_m_sa_users->Password->CurrentValue = $frm_9_m_sa_users->Password->FormValue;
		$frm_9_m_sa_users->User_Level->CurrentValue = $frm_9_m_sa_users->User_Level->FormValue;
		$frm_9_m_sa_users->Last_Name->CurrentValue = $frm_9_m_sa_users->Last_Name->FormValue;
		$frm_9_m_sa_users->First_Name->CurrentValue = $frm_9_m_sa_users->First_Name->FormValue;
		$frm_9_m_sa_users->Middle_Name->CurrentValue = $frm_9_m_sa_users->Middle_Name->FormValue;
		$frm_9_m_sa_users->zEmail->CurrentValue = $frm_9_m_sa_users->zEmail->FormValue;
		$frm_9_m_sa_users->Contact_No2E->CurrentValue = $frm_9_m_sa_users->Contact_No2E->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_9_m_sa_users;
		$sFilter = $frm_9_m_sa_users->KeyFilter();

		// Call Row Selecting event
		$frm_9_m_sa_users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_9_m_sa_users->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_users->SQL();
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
		global $conn, $frm_9_m_sa_users;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_9_m_sa_users->Row_Selected($row);
		$frm_9_m_sa_users->users_id->setDbValue($rs->fields('users_id'));
		$frm_9_m_sa_users->unit_contributor_id->setDbValue($rs->fields('unit_contributor_id'));
		$frm_9_m_sa_users->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_9_m_sa_users->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_9_m_sa_users->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_9_m_sa_users->CU->setDbValue($rs->fields('CU'));
		$frm_9_m_sa_users->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$frm_9_m_sa_users->Contributor_Unit->setDbValue($rs->fields('Contributor Unit'));
		$frm_9_m_sa_users->Login_Name->setDbValue($rs->fields('Login Name'));
		$frm_9_m_sa_users->Password->setDbValue($rs->fields('Password'));
		$frm_9_m_sa_users->User_Level->setDbValue($rs->fields('User Level'));
		$frm_9_m_sa_users->User_Name->setDbValue($rs->fields('User Name'));
		$frm_9_m_sa_users->Last_Name->setDbValue($rs->fields('Last Name'));
		$frm_9_m_sa_users->First_Name->setDbValue($rs->fields('First Name'));
		$frm_9_m_sa_users->Middle_Name->setDbValue($rs->fields('Middle Name'));
		$frm_9_m_sa_users->zEmail->setDbValue($rs->fields('Email'));
		$frm_9_m_sa_users->Contact_No2E->setDbValue($rs->fields('Contact No.'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_users;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_9_m_sa_users->Row_Rendering();

		// Common render codes for all row types
		// users_id
		// unit_contributor_id
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// CU
		// Delivery Unit
		// Contributor Unit
		// Login Name
		// Password
		// User Level
		// User Name
		// Last Name
		// First Name
		// Middle Name
		// Email
		// Contact No.

		if ($frm_9_m_sa_users->RowType == UP_ROWTYPE_VIEW) { // View row

			// CU
			$frm_9_m_sa_users->CU->ViewValue = $frm_9_m_sa_users->CU->CurrentValue;
			$frm_9_m_sa_users->CU->ViewCustomAttributes = "";

			// Delivery Unit
			$frm_9_m_sa_users->Delivery_Unit->ViewValue = $frm_9_m_sa_users->Delivery_Unit->CurrentValue;
			$frm_9_m_sa_users->Delivery_Unit->ViewCustomAttributes = "";

			// Contributor Unit
			$frm_9_m_sa_users->Contributor_Unit->ViewValue = $frm_9_m_sa_users->Contributor_Unit->CurrentValue;
			$frm_9_m_sa_users->Contributor_Unit->ViewCustomAttributes = "";

			// Login Name
			$frm_9_m_sa_users->Login_Name->ViewValue = $frm_9_m_sa_users->Login_Name->CurrentValue;
			$frm_9_m_sa_users->Login_Name->ViewCustomAttributes = "";

			// Password
			$frm_9_m_sa_users->Password->ViewValue = "********";
			$frm_9_m_sa_users->Password->ViewCustomAttributes = "";

			// User Level
			if ($Security->CanAdmin()) { // System admin
			if (strval($frm_9_m_sa_users->User_Level->CurrentValue) <> "") {
				switch ($frm_9_m_sa_users->User_Level->CurrentValue) {
					case "-1":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(1) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(1) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "0":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(2) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(2) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "1":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(3) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(3) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "2":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(4) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(4) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "3":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(5) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(5) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "4":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(6) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(6) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					default:
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->CurrentValue;
				}
			} else {
				$frm_9_m_sa_users->User_Level->ViewValue = NULL;
			}
			} else {
				$frm_9_m_sa_users->User_Level->ViewValue = "********";
			}
			$frm_9_m_sa_users->User_Level->ViewCustomAttributes = "";

			// User Name
			$frm_9_m_sa_users->User_Name->ViewValue = $frm_9_m_sa_users->User_Name->CurrentValue;
			$frm_9_m_sa_users->User_Name->ViewCustomAttributes = "";

			// Last Name
			$frm_9_m_sa_users->Last_Name->ViewValue = $frm_9_m_sa_users->Last_Name->CurrentValue;
			$frm_9_m_sa_users->Last_Name->ViewCustomAttributes = "";

			// First Name
			$frm_9_m_sa_users->First_Name->ViewValue = $frm_9_m_sa_users->First_Name->CurrentValue;
			$frm_9_m_sa_users->First_Name->ViewCustomAttributes = "";

			// Middle Name
			$frm_9_m_sa_users->Middle_Name->ViewValue = $frm_9_m_sa_users->Middle_Name->CurrentValue;
			$frm_9_m_sa_users->Middle_Name->ViewCustomAttributes = "";

			// Email
			$frm_9_m_sa_users->zEmail->ViewValue = $frm_9_m_sa_users->zEmail->CurrentValue;
			$frm_9_m_sa_users->zEmail->ViewCustomAttributes = "";

			// Contact No.
			$frm_9_m_sa_users->Contact_No2E->ViewValue = $frm_9_m_sa_users->Contact_No2E->CurrentValue;
			$frm_9_m_sa_users->Contact_No2E->ViewCustomAttributes = "";

			// CU
			$frm_9_m_sa_users->CU->LinkCustomAttributes = "";
			$frm_9_m_sa_users->CU->HrefValue = "";
			$frm_9_m_sa_users->CU->TooltipValue = "";

			// Delivery Unit
			$frm_9_m_sa_users->Delivery_Unit->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Delivery_Unit->HrefValue = "";
			$frm_9_m_sa_users->Delivery_Unit->TooltipValue = "";

			// Contributor Unit
			$frm_9_m_sa_users->Contributor_Unit->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Contributor_Unit->HrefValue = "";
			$frm_9_m_sa_users->Contributor_Unit->TooltipValue = "";

			// Login Name
			$frm_9_m_sa_users->Login_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Login_Name->HrefValue = "";
			$frm_9_m_sa_users->Login_Name->TooltipValue = "";

			// Password
			$frm_9_m_sa_users->Password->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Password->HrefValue = "";
			$frm_9_m_sa_users->Password->TooltipValue = "";

			// User Level
			$frm_9_m_sa_users->User_Level->LinkCustomAttributes = "";
			$frm_9_m_sa_users->User_Level->HrefValue = "";
			$frm_9_m_sa_users->User_Level->TooltipValue = "";

			// Last Name
			$frm_9_m_sa_users->Last_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Last_Name->HrefValue = "";
			$frm_9_m_sa_users->Last_Name->TooltipValue = "";

			// First Name
			$frm_9_m_sa_users->First_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_users->First_Name->HrefValue = "";
			$frm_9_m_sa_users->First_Name->TooltipValue = "";

			// Middle Name
			$frm_9_m_sa_users->Middle_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Middle_Name->HrefValue = "";
			$frm_9_m_sa_users->Middle_Name->TooltipValue = "";

			// Email
			$frm_9_m_sa_users->zEmail->LinkCustomAttributes = "";
			$frm_9_m_sa_users->zEmail->HrefValue = "";
			$frm_9_m_sa_users->zEmail->TooltipValue = "";

			// Contact No.
			$frm_9_m_sa_users->Contact_No2E->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Contact_No2E->HrefValue = "";
			$frm_9_m_sa_users->Contact_No2E->TooltipValue = "";
		} elseif ($frm_9_m_sa_users->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// CU
			$frm_9_m_sa_users->CU->EditCustomAttributes = "";
			$frm_9_m_sa_users->CU->EditValue = up_HtmlEncode($frm_9_m_sa_users->CU->CurrentValue);

			// Delivery Unit
			$frm_9_m_sa_users->Delivery_Unit->EditCustomAttributes = "";
			$frm_9_m_sa_users->Delivery_Unit->EditValue = up_HtmlEncode($frm_9_m_sa_users->Delivery_Unit->CurrentValue);

			// Contributor Unit
			$frm_9_m_sa_users->Contributor_Unit->EditCustomAttributes = "";
			$frm_9_m_sa_users->Contributor_Unit->EditValue = up_HtmlEncode($frm_9_m_sa_users->Contributor_Unit->CurrentValue);

			// Login Name
			$frm_9_m_sa_users->Login_Name->EditCustomAttributes = "";
			$frm_9_m_sa_users->Login_Name->EditValue = up_HtmlEncode($frm_9_m_sa_users->Login_Name->CurrentValue);

			// Password
			$frm_9_m_sa_users->Password->EditCustomAttributes = "";
			$frm_9_m_sa_users->Password->EditValue = up_HtmlEncode($frm_9_m_sa_users->Password->CurrentValue);

			// User Level
			$frm_9_m_sa_users->User_Level->EditCustomAttributes = "";
			if (!$Security->CanAdmin()) { // System admin
				$frm_9_m_sa_users->User_Level->EditValue = "********";
			} else {
			$arwrk = array();
			$arwrk[] = array("-1", $frm_9_m_sa_users->User_Level->FldTagCaption(1) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(1) : "-1");
			$arwrk[] = array("0", $frm_9_m_sa_users->User_Level->FldTagCaption(2) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(2) : "0");
			$arwrk[] = array("1", $frm_9_m_sa_users->User_Level->FldTagCaption(3) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(3) : "1");
			$arwrk[] = array("2", $frm_9_m_sa_users->User_Level->FldTagCaption(4) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(4) : "2");
			$arwrk[] = array("3", $frm_9_m_sa_users->User_Level->FldTagCaption(5) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(5) : "3");
			$arwrk[] = array("4", $frm_9_m_sa_users->User_Level->FldTagCaption(6) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(6) : "4");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$frm_9_m_sa_users->User_Level->EditValue = $arwrk;
			}

			// Last Name
			$frm_9_m_sa_users->Last_Name->EditCustomAttributes = "";
			$frm_9_m_sa_users->Last_Name->EditValue = up_HtmlEncode($frm_9_m_sa_users->Last_Name->CurrentValue);

			// First Name
			$frm_9_m_sa_users->First_Name->EditCustomAttributes = "";
			$frm_9_m_sa_users->First_Name->EditValue = up_HtmlEncode($frm_9_m_sa_users->First_Name->CurrentValue);

			// Middle Name
			$frm_9_m_sa_users->Middle_Name->EditCustomAttributes = "";
			$frm_9_m_sa_users->Middle_Name->EditValue = up_HtmlEncode($frm_9_m_sa_users->Middle_Name->CurrentValue);

			// Email
			$frm_9_m_sa_users->zEmail->EditCustomAttributes = "";
			$frm_9_m_sa_users->zEmail->EditValue = up_HtmlEncode($frm_9_m_sa_users->zEmail->CurrentValue);

			// Contact No.
			$frm_9_m_sa_users->Contact_No2E->EditCustomAttributes = "";
			$frm_9_m_sa_users->Contact_No2E->EditValue = up_HtmlEncode($frm_9_m_sa_users->Contact_No2E->CurrentValue);

			// Edit refer script
			// CU

			$frm_9_m_sa_users->CU->HrefValue = "";

			// Delivery Unit
			$frm_9_m_sa_users->Delivery_Unit->HrefValue = "";

			// Contributor Unit
			$frm_9_m_sa_users->Contributor_Unit->HrefValue = "";

			// Login Name
			$frm_9_m_sa_users->Login_Name->HrefValue = "";

			// Password
			$frm_9_m_sa_users->Password->HrefValue = "";

			// User Level
			$frm_9_m_sa_users->User_Level->HrefValue = "";

			// Last Name
			$frm_9_m_sa_users->Last_Name->HrefValue = "";

			// First Name
			$frm_9_m_sa_users->First_Name->HrefValue = "";

			// Middle Name
			$frm_9_m_sa_users->Middle_Name->HrefValue = "";

			// Email
			$frm_9_m_sa_users->zEmail->HrefValue = "";

			// Contact No.
			$frm_9_m_sa_users->Contact_No2E->HrefValue = "";
		}
		if ($frm_9_m_sa_users->RowType == UP_ROWTYPE_ADD ||
			$frm_9_m_sa_users->RowType == UP_ROWTYPE_EDIT ||
			$frm_9_m_sa_users->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_9_m_sa_users->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_9_m_sa_users->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_9_m_sa_users->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_9_m_sa_users;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($frm_9_m_sa_users->User_Level->FormValue) && $frm_9_m_sa_users->User_Level->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_9_m_sa_users->User_Level->FldCaption());
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
		global $conn, $Security, $Language, $frm_9_m_sa_users;
		$sFilter = $frm_9_m_sa_users->KeyFilter();
			if ($frm_9_m_sa_users->unit_contributor_id->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(`unit_contributor_id` = " . up_AdjustSql($frm_9_m_sa_users->unit_contributor_id->CurrentValue) . ")";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$frm_9_m_sa_users->CurrentFilter = $sFilterChk;
			$sSqlChk = $frm_9_m_sa_users->SQL();
			$conn->raiseErrorFn = 'up_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'unit_contributor_id', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $frm_9_m_sa_users->unit_contributor_id->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
			if ($frm_9_m_sa_users->Login_Name->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(`Login Name` = '" . up_AdjustSql($frm_9_m_sa_users->Login_Name->CurrentValue) . "')";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$frm_9_m_sa_users->CurrentFilter = $sFilterChk;
			$sSqlChk = $frm_9_m_sa_users->SQL();
			$conn->raiseErrorFn = 'up_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'Login Name', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $frm_9_m_sa_users->Login_Name->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
			if ($frm_9_m_sa_users->Password->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(`Password` = '" . up_AdjustSql($frm_9_m_sa_users->Password->CurrentValue) . "')";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$frm_9_m_sa_users->CurrentFilter = $sFilterChk;
			$sSqlChk = $frm_9_m_sa_users->SQL();
			$conn->raiseErrorFn = 'up_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'Password', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $frm_9_m_sa_users->Password->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
		$frm_9_m_sa_users->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_users->SQL();
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

			// CU
			$frm_9_m_sa_users->CU->SetDbValueDef($rsnew, $frm_9_m_sa_users->CU->CurrentValue, NULL, $frm_9_m_sa_users->CU->ReadOnly);

			// Delivery Unit
			$frm_9_m_sa_users->Delivery_Unit->SetDbValueDef($rsnew, $frm_9_m_sa_users->Delivery_Unit->CurrentValue, NULL, $frm_9_m_sa_users->Delivery_Unit->ReadOnly);

			// Contributor Unit
			$frm_9_m_sa_users->Contributor_Unit->SetDbValueDef($rsnew, $frm_9_m_sa_users->Contributor_Unit->CurrentValue, NULL, $frm_9_m_sa_users->Contributor_Unit->ReadOnly);

			// Login Name
			$frm_9_m_sa_users->Login_Name->SetDbValueDef($rsnew, $frm_9_m_sa_users->Login_Name->CurrentValue, NULL, $frm_9_m_sa_users->Login_Name->ReadOnly);

			// Password
			$frm_9_m_sa_users->Password->SetDbValueDef($rsnew, $frm_9_m_sa_users->Password->CurrentValue, NULL, $frm_9_m_sa_users->Password->ReadOnly || (UP_ENCRYPTED_PASSWORD && $rs->fields('Password') == $frm_9_m_sa_users->Password->CurrentValue));

			// User Level
			if ($Security->CanAdmin()) { // System admin
			$frm_9_m_sa_users->User_Level->SetDbValueDef($rsnew, $frm_9_m_sa_users->User_Level->CurrentValue, 0, $frm_9_m_sa_users->User_Level->ReadOnly);
			}

			// Last Name
			$frm_9_m_sa_users->Last_Name->SetDbValueDef($rsnew, $frm_9_m_sa_users->Last_Name->CurrentValue, NULL, $frm_9_m_sa_users->Last_Name->ReadOnly);

			// First Name
			$frm_9_m_sa_users->First_Name->SetDbValueDef($rsnew, $frm_9_m_sa_users->First_Name->CurrentValue, NULL, $frm_9_m_sa_users->First_Name->ReadOnly);

			// Middle Name
			$frm_9_m_sa_users->Middle_Name->SetDbValueDef($rsnew, $frm_9_m_sa_users->Middle_Name->CurrentValue, NULL, $frm_9_m_sa_users->Middle_Name->ReadOnly);

			// Email
			$frm_9_m_sa_users->zEmail->SetDbValueDef($rsnew, $frm_9_m_sa_users->zEmail->CurrentValue, NULL, $frm_9_m_sa_users->zEmail->ReadOnly);

			// Contact No.
			$frm_9_m_sa_users->Contact_No2E->SetDbValueDef($rsnew, $frm_9_m_sa_users->Contact_No2E->CurrentValue, NULL, $frm_9_m_sa_users->Contact_No2E->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_9_m_sa_users->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_9_m_sa_users->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_9_m_sa_users->CancelMessage <> "") {
					$this->setFailureMessage($frm_9_m_sa_users->CancelMessage);
					$frm_9_m_sa_users->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_9_m_sa_users->Row_Updated($rsold, $rsnew);
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
