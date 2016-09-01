<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_sam_usersinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_sam_users_add = new cfrm_sam_users_add();
$Page =& $frm_sam_users_add;

// Page init
$frm_sam_users_add->Page_Init();

// Page main
$frm_sam_users_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_users_add = new up_Page("frm_sam_users_add");

// page properties
frm_sam_users_add.PageID = "add"; // page ID
frm_sam_users_add.FormID = "ffrm_sam_usersadd"; // form ID
var UP_PAGE_ID = frm_sam_users_add.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_sam_users_add.ValidateForm = function(fobj) {
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
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_sam_users->users_nameLast->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_nameFirst"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_sam_users->users_nameFirst->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_userLoginName"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_sam_users->users_userLoginName->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_password"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_sam_users->users_password->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_userLevel"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_sam_users->users_userLevel->FldCaption()) ?>");

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
frm_sam_users_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_users_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_users_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_users_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_users->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_sam_users->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_sam_users_add->ShowPageHeader(); ?>
<?php
$frm_sam_users_add->ShowMessage();
?>
<form name="ffrm_sam_usersadd" id="ffrm_sam_usersadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return frm_sam_users_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="frm_sam_users">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_sam_users->cu->Visible) { // cu ?>
	<tr id="r_cu"<?php echo $frm_sam_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_users->cu->FldCaption() ?></td>
		<td<?php echo $frm_sam_users->cu->CellAttributes() ?>><span id="el_cu">
<input type="text" name="x_cu" id="x_cu" size="30" maxlength="6" value="<?php echo $frm_sam_users->cu->EditValue ?>"<?php echo $frm_sam_users->cu->EditAttributes() ?>>
</span><?php echo $frm_sam_users->cu->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_users->units_id->Visible) { // units_id ?>
	<tr id="r_units_id"<?php echo $frm_sam_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_users->units_id->FldCaption() ?></td>
		<td<?php echo $frm_sam_users->units_id->CellAttributes() ?>><span id="el_units_id">
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $frm_sam_users->units_id->ViewAttributes() ?>><?php echo $frm_sam_users->units_id->EditValue ?></div>
<input type="hidden" name="x_units_id" id="x_units_id" value="<?php echo up_HtmlEncode($frm_sam_users->units_id->CurrentValue) ?>">
<?php } else { ?>
<input type="text" name="x_units_id" id="x_units_id" size="30" maxlength="255" value="<?php echo $frm_sam_users->units_id->EditValue ?>"<?php echo $frm_sam_users->units_id->EditAttributes() ?>>
<?php } ?>
</span><?php echo $frm_sam_users->units_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_users->cu_unit_name->Visible) { // cu_unit_name ?>
	<tr id="r_cu_unit_name"<?php echo $frm_sam_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_users->cu_unit_name->FldCaption() ?></td>
		<td<?php echo $frm_sam_users->cu_unit_name->CellAttributes() ?>><span id="el_cu_unit_name">
<input type="text" name="x_cu_unit_name" id="x_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_sam_users->cu_unit_name->EditValue ?>"<?php echo $frm_sam_users->cu_unit_name->EditAttributes() ?>>
</span><?php echo $frm_sam_users->cu_unit_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_users->users_name->Visible) { // users_name ?>
	<tr id="r_users_name"<?php echo $frm_sam_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_users->users_name->FldCaption() ?></td>
		<td<?php echo $frm_sam_users->users_name->CellAttributes() ?>><span id="el_users_name">
<input type="text" name="x_users_name" id="x_users_name" size="30" maxlength="255" value="<?php echo $frm_sam_users->users_name->EditValue ?>"<?php echo $frm_sam_users->users_name->EditAttributes() ?>>
</span><?php echo $frm_sam_users->users_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_users->users_nameLast->Visible) { // users_nameLast ?>
	<tr id="r_users_nameLast"<?php echo $frm_sam_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_users->users_nameLast->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_sam_users->users_nameLast->CellAttributes() ?>><span id="el_users_nameLast">
<input type="text" name="x_users_nameLast" id="x_users_nameLast" size="30" maxlength="255" value="<?php echo $frm_sam_users->users_nameLast->EditValue ?>"<?php echo $frm_sam_users->users_nameLast->EditAttributes() ?>>
</span><?php echo $frm_sam_users->users_nameLast->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_users->users_nameFirst->Visible) { // users_nameFirst ?>
	<tr id="r_users_nameFirst"<?php echo $frm_sam_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_users->users_nameFirst->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_sam_users->users_nameFirst->CellAttributes() ?>><span id="el_users_nameFirst">
<input type="text" name="x_users_nameFirst" id="x_users_nameFirst" size="30" maxlength="255" value="<?php echo $frm_sam_users->users_nameFirst->EditValue ?>"<?php echo $frm_sam_users->users_nameFirst->EditAttributes() ?>>
</span><?php echo $frm_sam_users->users_nameFirst->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_users->users_nameMiddle->Visible) { // users_nameMiddle ?>
	<tr id="r_users_nameMiddle"<?php echo $frm_sam_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_users->users_nameMiddle->FldCaption() ?></td>
		<td<?php echo $frm_sam_users->users_nameMiddle->CellAttributes() ?>><span id="el_users_nameMiddle">
<input type="text" name="x_users_nameMiddle" id="x_users_nameMiddle" size="30" maxlength="255" value="<?php echo $frm_sam_users->users_nameMiddle->EditValue ?>"<?php echo $frm_sam_users->users_nameMiddle->EditAttributes() ?>>
</span><?php echo $frm_sam_users->users_nameMiddle->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_users->users_userLoginName->Visible) { // users_userLoginName ?>
	<tr id="r_users_userLoginName"<?php echo $frm_sam_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_users->users_userLoginName->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_sam_users->users_userLoginName->CellAttributes() ?>><span id="el_users_userLoginName">
<input type="text" name="x_users_userLoginName" id="x_users_userLoginName" size="30" maxlength="12" value="<?php echo $frm_sam_users->users_userLoginName->EditValue ?>"<?php echo $frm_sam_users->users_userLoginName->EditAttributes() ?>>
</span><?php echo $frm_sam_users->users_userLoginName->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_users->users_password->Visible) { // users_password ?>
	<tr id="r_users_password"<?php echo $frm_sam_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_users->users_password->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_sam_users->users_password->CellAttributes() ?>><span id="el_users_password">
<input type="text" name="x_users_password" id="x_users_password" size="30" maxlength="15" value="<?php echo $frm_sam_users->users_password->EditValue ?>"<?php echo $frm_sam_users->users_password->EditAttributes() ?>>
</span><?php echo $frm_sam_users->users_password->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_users->users_userLevel->Visible) { // users_userLevel ?>
	<tr id="r_users_userLevel"<?php echo $frm_sam_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_users->users_userLevel->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_sam_users->users_userLevel->CellAttributes() ?>><span id="el_users_userLevel">
<select id="x_users_userLevel" name="x_users_userLevel"<?php echo $frm_sam_users->users_userLevel->EditAttributes() ?>>
<?php
if (is_array($frm_sam_users->users_userLevel->EditValue)) {
	$arwrk = $frm_sam_users->users_userLevel->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_users->users_userLevel->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $frm_sam_users->users_userLevel->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_users->users_email->Visible) { // users_email ?>
	<tr id="r_users_email"<?php echo $frm_sam_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_users->users_email->FldCaption() ?></td>
		<td<?php echo $frm_sam_users->users_email->CellAttributes() ?>><span id="el_users_email">
<input type="text" name="x_users_email" id="x_users_email" size="30" maxlength="255" value="<?php echo $frm_sam_users->users_email->EditValue ?>"<?php echo $frm_sam_users->users_email->EditAttributes() ?>>
</span><?php echo $frm_sam_users->users_email->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_sam_users->users_contactNo->Visible) { // users_contactNo ?>
	<tr id="r_users_contactNo"<?php echo $frm_sam_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_sam_users->users_contactNo->FldCaption() ?></td>
		<td<?php echo $frm_sam_users->users_contactNo->CellAttributes() ?>><span id="el_users_contactNo">
<input type="text" name="x_users_contactNo" id="x_users_contactNo" size="30" maxlength="255" value="<?php echo $frm_sam_users->users_contactNo->EditValue ?>"<?php echo $frm_sam_users->users_contactNo->EditAttributes() ?>>
</span><?php echo $frm_sam_users->users_contactNo->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$frm_sam_users_add->ShowPageFooter();
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
$frm_sam_users_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_users_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'frm_sam_users';

	// Page object name
	var $PageObjName = 'frm_sam_users_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_users;
		if ($frm_sam_users->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_users->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_users;
		if ($frm_sam_users->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_users_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_users)
		if (!isset($GLOBALS["frm_sam_users"])) {
			$GLOBALS["frm_sam_users"] = new cfrm_sam_users();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_users"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_users', TRUE);

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
		global $frm_sam_users;

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
			$this->Page_Terminate("frm_sam_userslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_sam_userslist.php");
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
		global $objForm, $Language, $gsFormError, $frm_sam_users;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$frm_sam_users->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$frm_sam_users->CurrentAction = "I"; // Form error, reset action
				$frm_sam_users->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["users_ID"] != "") {
				$frm_sam_users->users_ID->setQueryStringValue($_GET["users_ID"]);
				$frm_sam_users->setKey("users_ID", $frm_sam_users->users_ID->CurrentValue); // Set up key
			} else {
				$frm_sam_users->setKey("users_ID", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$frm_sam_users->CurrentAction = "C"; // Copy record
			} else {
				$frm_sam_users->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($frm_sam_users->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("frm_sam_userslist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$frm_sam_users->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $frm_sam_users->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "frm_sam_usersview.php")
						$sReturnUrl = $frm_sam_users->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$frm_sam_users->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$frm_sam_users->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$frm_sam_users->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_sam_users;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_sam_users;
		$frm_sam_users->cu->CurrentValue = NULL;
		$frm_sam_users->cu->OldValue = $frm_sam_users->cu->CurrentValue;
		$frm_sam_users->units_id->CurrentValue = CurrentUserID();
		$frm_sam_users->cu_unit_name->CurrentValue = NULL;
		$frm_sam_users->cu_unit_name->OldValue = $frm_sam_users->cu_unit_name->CurrentValue;
		$frm_sam_users->users_name->CurrentValue = NULL;
		$frm_sam_users->users_name->OldValue = $frm_sam_users->users_name->CurrentValue;
		$frm_sam_users->users_nameLast->CurrentValue = NULL;
		$frm_sam_users->users_nameLast->OldValue = $frm_sam_users->users_nameLast->CurrentValue;
		$frm_sam_users->users_nameFirst->CurrentValue = NULL;
		$frm_sam_users->users_nameFirst->OldValue = $frm_sam_users->users_nameFirst->CurrentValue;
		$frm_sam_users->users_nameMiddle->CurrentValue = NULL;
		$frm_sam_users->users_nameMiddle->OldValue = $frm_sam_users->users_nameMiddle->CurrentValue;
		$frm_sam_users->users_userLoginName->CurrentValue = NULL;
		$frm_sam_users->users_userLoginName->OldValue = $frm_sam_users->users_userLoginName->CurrentValue;
		$frm_sam_users->users_password->CurrentValue = NULL;
		$frm_sam_users->users_password->OldValue = $frm_sam_users->users_password->CurrentValue;
		$frm_sam_users->users_userLevel->CurrentValue = 1;
		$frm_sam_users->users_email->CurrentValue = NULL;
		$frm_sam_users->users_email->OldValue = $frm_sam_users->users_email->CurrentValue;
		$frm_sam_users->users_contactNo->CurrentValue = NULL;
		$frm_sam_users->users_contactNo->OldValue = $frm_sam_users->users_contactNo->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_sam_users;
		if (!$frm_sam_users->cu->FldIsDetailKey) {
			$frm_sam_users->cu->setFormValue($objForm->GetValue("x_cu"));
		}
		if (!$frm_sam_users->units_id->FldIsDetailKey) {
			$frm_sam_users->units_id->setFormValue($objForm->GetValue("x_units_id"));
		}
		if (!$frm_sam_users->cu_unit_name->FldIsDetailKey) {
			$frm_sam_users->cu_unit_name->setFormValue($objForm->GetValue("x_cu_unit_name"));
		}
		if (!$frm_sam_users->users_name->FldIsDetailKey) {
			$frm_sam_users->users_name->setFormValue($objForm->GetValue("x_users_name"));
		}
		if (!$frm_sam_users->users_nameLast->FldIsDetailKey) {
			$frm_sam_users->users_nameLast->setFormValue($objForm->GetValue("x_users_nameLast"));
		}
		if (!$frm_sam_users->users_nameFirst->FldIsDetailKey) {
			$frm_sam_users->users_nameFirst->setFormValue($objForm->GetValue("x_users_nameFirst"));
		}
		if (!$frm_sam_users->users_nameMiddle->FldIsDetailKey) {
			$frm_sam_users->users_nameMiddle->setFormValue($objForm->GetValue("x_users_nameMiddle"));
		}
		if (!$frm_sam_users->users_userLoginName->FldIsDetailKey) {
			$frm_sam_users->users_userLoginName->setFormValue($objForm->GetValue("x_users_userLoginName"));
		}
		if (!$frm_sam_users->users_password->FldIsDetailKey) {
			$frm_sam_users->users_password->setFormValue($objForm->GetValue("x_users_password"));
		}
		if (!$frm_sam_users->users_userLevel->FldIsDetailKey) {
			$frm_sam_users->users_userLevel->setFormValue($objForm->GetValue("x_users_userLevel"));
		}
		if (!$frm_sam_users->users_email->FldIsDetailKey) {
			$frm_sam_users->users_email->setFormValue($objForm->GetValue("x_users_email"));
		}
		if (!$frm_sam_users->users_contactNo->FldIsDetailKey) {
			$frm_sam_users->users_contactNo->setFormValue($objForm->GetValue("x_users_contactNo"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_sam_users;
		$this->LoadOldRecord();
		$frm_sam_users->cu->CurrentValue = $frm_sam_users->cu->FormValue;
		$frm_sam_users->units_id->CurrentValue = $frm_sam_users->units_id->FormValue;
		$frm_sam_users->cu_unit_name->CurrentValue = $frm_sam_users->cu_unit_name->FormValue;
		$frm_sam_users->users_name->CurrentValue = $frm_sam_users->users_name->FormValue;
		$frm_sam_users->users_nameLast->CurrentValue = $frm_sam_users->users_nameLast->FormValue;
		$frm_sam_users->users_nameFirst->CurrentValue = $frm_sam_users->users_nameFirst->FormValue;
		$frm_sam_users->users_nameMiddle->CurrentValue = $frm_sam_users->users_nameMiddle->FormValue;
		$frm_sam_users->users_userLoginName->CurrentValue = $frm_sam_users->users_userLoginName->FormValue;
		$frm_sam_users->users_password->CurrentValue = $frm_sam_users->users_password->FormValue;
		$frm_sam_users->users_userLevel->CurrentValue = $frm_sam_users->users_userLevel->FormValue;
		$frm_sam_users->users_email->CurrentValue = $frm_sam_users->users_email->FormValue;
		$frm_sam_users->users_contactNo->CurrentValue = $frm_sam_users->users_contactNo->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_users;
		$sFilter = $frm_sam_users->KeyFilter();

		// Call Row Selecting event
		$frm_sam_users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_users->CurrentFilter = $sFilter;
		$sSql = $frm_sam_users->SQL();
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
		global $conn, $frm_sam_users;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_users->Row_Selected($row);
		$frm_sam_users->users_ID->setDbValue($rs->fields('users_ID'));
		$frm_sam_users->cu->setDbValue($rs->fields('cu'));
		$frm_sam_users->units_id->setDbValue($rs->fields('units_id'));
		$frm_sam_users->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_sam_users->users_name->setDbValue($rs->fields('users_name'));
		$frm_sam_users->users_nameLast->setDbValue($rs->fields('users_nameLast'));
		$frm_sam_users->users_nameFirst->setDbValue($rs->fields('users_nameFirst'));
		$frm_sam_users->users_nameMiddle->setDbValue($rs->fields('users_nameMiddle'));
		$frm_sam_users->users_userLoginName->setDbValue($rs->fields('users_userLoginName'));
		$frm_sam_users->users_password->setDbValue($rs->fields('users_password'));
		$frm_sam_users->users_userLevel->setDbValue($rs->fields('users_userLevel'));
		$frm_sam_users->users_email->setDbValue($rs->fields('users_email'));
		$frm_sam_users->users_contactNo->setDbValue($rs->fields('users_contactNo'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_sam_users;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_sam_users->getKey("users_ID")) <> "")
			$frm_sam_users->users_ID->CurrentValue = $frm_sam_users->getKey("users_ID"); // users_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_sam_users->CurrentFilter = $frm_sam_users->KeyFilter();
			$sSql = $frm_sam_users->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_users;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_sam_users->Row_Rendering();

		// Common render codes for all row types
		// users_ID
		// cu
		// units_id
		// cu_unit_name
		// users_name
		// users_nameLast
		// users_nameFirst
		// users_nameMiddle
		// users_userLoginName
		// users_password
		// users_userLevel
		// users_email
		// users_contactNo

		if ($frm_sam_users->RowType == UP_ROWTYPE_VIEW) { // View row

			// cu
			$frm_sam_users->cu->ViewValue = $frm_sam_users->cu->CurrentValue;
			$frm_sam_users->cu->ViewCustomAttributes = "";

			// units_id
			$frm_sam_users->units_id->ViewValue = $frm_sam_users->units_id->CurrentValue;
			$frm_sam_users->units_id->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_sam_users->cu_unit_name->ViewValue = $frm_sam_users->cu_unit_name->CurrentValue;
			$frm_sam_users->cu_unit_name->ViewCustomAttributes = "";

			// users_name
			$frm_sam_users->users_name->ViewValue = $frm_sam_users->users_name->CurrentValue;
			$frm_sam_users->users_name->ViewCustomAttributes = "";

			// users_nameLast
			$frm_sam_users->users_nameLast->ViewValue = $frm_sam_users->users_nameLast->CurrentValue;
			$frm_sam_users->users_nameLast->ViewCustomAttributes = "";

			// users_nameFirst
			$frm_sam_users->users_nameFirst->ViewValue = $frm_sam_users->users_nameFirst->CurrentValue;
			$frm_sam_users->users_nameFirst->ViewCustomAttributes = "";

			// users_nameMiddle
			$frm_sam_users->users_nameMiddle->ViewValue = $frm_sam_users->users_nameMiddle->CurrentValue;
			$frm_sam_users->users_nameMiddle->ViewCustomAttributes = "";

			// users_userLoginName
			$frm_sam_users->users_userLoginName->ViewValue = $frm_sam_users->users_userLoginName->CurrentValue;
			$frm_sam_users->users_userLoginName->ViewCustomAttributes = "";

			// users_password
			$frm_sam_users->users_password->ViewValue = $frm_sam_users->users_password->CurrentValue;
			$frm_sam_users->users_password->ViewCustomAttributes = "";

			// users_userLevel
			if (strval($frm_sam_users->users_userLevel->CurrentValue) <> "") {
				switch ($frm_sam_users->users_userLevel->CurrentValue) {
					case "-1":
						$frm_sam_users->users_userLevel->ViewValue = $frm_sam_users->users_userLevel->FldTagCaption(1) <> "" ? $frm_sam_users->users_userLevel->FldTagCaption(1) : $frm_sam_users->users_userLevel->CurrentValue;
						break;
					case "0":
						$frm_sam_users->users_userLevel->ViewValue = $frm_sam_users->users_userLevel->FldTagCaption(2) <> "" ? $frm_sam_users->users_userLevel->FldTagCaption(2) : $frm_sam_users->users_userLevel->CurrentValue;
						break;
					case "1":
						$frm_sam_users->users_userLevel->ViewValue = $frm_sam_users->users_userLevel->FldTagCaption(3) <> "" ? $frm_sam_users->users_userLevel->FldTagCaption(3) : $frm_sam_users->users_userLevel->CurrentValue;
						break;
					case "2":
						$frm_sam_users->users_userLevel->ViewValue = $frm_sam_users->users_userLevel->FldTagCaption(4) <> "" ? $frm_sam_users->users_userLevel->FldTagCaption(4) : $frm_sam_users->users_userLevel->CurrentValue;
						break;
					default:
						$frm_sam_users->users_userLevel->ViewValue = $frm_sam_users->users_userLevel->CurrentValue;
				}
			} else {
				$frm_sam_users->users_userLevel->ViewValue = NULL;
			}
			$frm_sam_users->users_userLevel->ViewCustomAttributes = "";

			// users_email
			$frm_sam_users->users_email->ViewValue = $frm_sam_users->users_email->CurrentValue;
			$frm_sam_users->users_email->ViewCustomAttributes = "";

			// users_contactNo
			$frm_sam_users->users_contactNo->ViewValue = $frm_sam_users->users_contactNo->CurrentValue;
			$frm_sam_users->users_contactNo->ViewCustomAttributes = "";

			// cu
			$frm_sam_users->cu->LinkCustomAttributes = "";
			$frm_sam_users->cu->HrefValue = "";
			$frm_sam_users->cu->TooltipValue = "";

			// units_id
			$frm_sam_users->units_id->LinkCustomAttributes = "";
			$frm_sam_users->units_id->HrefValue = "";
			$frm_sam_users->units_id->TooltipValue = "";

			// cu_unit_name
			$frm_sam_users->cu_unit_name->LinkCustomAttributes = "";
			$frm_sam_users->cu_unit_name->HrefValue = "";
			$frm_sam_users->cu_unit_name->TooltipValue = "";

			// users_name
			$frm_sam_users->users_name->LinkCustomAttributes = "";
			$frm_sam_users->users_name->HrefValue = "";
			$frm_sam_users->users_name->TooltipValue = "";

			// users_nameLast
			$frm_sam_users->users_nameLast->LinkCustomAttributes = "";
			$frm_sam_users->users_nameLast->HrefValue = "";
			$frm_sam_users->users_nameLast->TooltipValue = "";

			// users_nameFirst
			$frm_sam_users->users_nameFirst->LinkCustomAttributes = "";
			$frm_sam_users->users_nameFirst->HrefValue = "";
			$frm_sam_users->users_nameFirst->TooltipValue = "";

			// users_nameMiddle
			$frm_sam_users->users_nameMiddle->LinkCustomAttributes = "";
			$frm_sam_users->users_nameMiddle->HrefValue = "";
			$frm_sam_users->users_nameMiddle->TooltipValue = "";

			// users_userLoginName
			$frm_sam_users->users_userLoginName->LinkCustomAttributes = "";
			$frm_sam_users->users_userLoginName->HrefValue = "";
			$frm_sam_users->users_userLoginName->TooltipValue = "";

			// users_password
			$frm_sam_users->users_password->LinkCustomAttributes = "";
			$frm_sam_users->users_password->HrefValue = "";
			$frm_sam_users->users_password->TooltipValue = "";

			// users_userLevel
			$frm_sam_users->users_userLevel->LinkCustomAttributes = "";
			$frm_sam_users->users_userLevel->HrefValue = "";
			$frm_sam_users->users_userLevel->TooltipValue = "";

			// users_email
			$frm_sam_users->users_email->LinkCustomAttributes = "";
			$frm_sam_users->users_email->HrefValue = "";
			$frm_sam_users->users_email->TooltipValue = "";

			// users_contactNo
			$frm_sam_users->users_contactNo->LinkCustomAttributes = "";
			$frm_sam_users->users_contactNo->HrefValue = "";
			$frm_sam_users->users_contactNo->TooltipValue = "";
		} elseif ($frm_sam_users->RowType == UP_ROWTYPE_ADD) { // Add row

			// cu
			$frm_sam_users->cu->EditCustomAttributes = "";
			$frm_sam_users->cu->EditValue = up_HtmlEncode($frm_sam_users->cu->CurrentValue);

			// units_id
			$frm_sam_users->units_id->EditCustomAttributes = "";
			if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
				$frm_sam_users->units_id->CurrentValue = CurrentUserID();
			$frm_sam_users->units_id->EditValue = $frm_sam_users->units_id->CurrentValue;
			$frm_sam_users->units_id->ViewCustomAttributes = "";
			} else {
			$frm_sam_users->units_id->EditValue = up_HtmlEncode($frm_sam_users->units_id->CurrentValue);
			}

			// cu_unit_name
			$frm_sam_users->cu_unit_name->EditCustomAttributes = "";
			$frm_sam_users->cu_unit_name->EditValue = up_HtmlEncode($frm_sam_users->cu_unit_name->CurrentValue);

			// users_name
			$frm_sam_users->users_name->EditCustomAttributes = "";
			$frm_sam_users->users_name->EditValue = up_HtmlEncode($frm_sam_users->users_name->CurrentValue);

			// users_nameLast
			$frm_sam_users->users_nameLast->EditCustomAttributes = "";
			$frm_sam_users->users_nameLast->EditValue = up_HtmlEncode($frm_sam_users->users_nameLast->CurrentValue);

			// users_nameFirst
			$frm_sam_users->users_nameFirst->EditCustomAttributes = "";
			$frm_sam_users->users_nameFirst->EditValue = up_HtmlEncode($frm_sam_users->users_nameFirst->CurrentValue);

			// users_nameMiddle
			$frm_sam_users->users_nameMiddle->EditCustomAttributes = "";
			$frm_sam_users->users_nameMiddle->EditValue = up_HtmlEncode($frm_sam_users->users_nameMiddle->CurrentValue);

			// users_userLoginName
			$frm_sam_users->users_userLoginName->EditCustomAttributes = "";
			$frm_sam_users->users_userLoginName->EditValue = up_HtmlEncode($frm_sam_users->users_userLoginName->CurrentValue);

			// users_password
			$frm_sam_users->users_password->EditCustomAttributes = "";
			$frm_sam_users->users_password->EditValue = up_HtmlEncode($frm_sam_users->users_password->CurrentValue);

			// users_userLevel
			$frm_sam_users->users_userLevel->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("-1", $frm_sam_users->users_userLevel->FldTagCaption(1) <> "" ? $frm_sam_users->users_userLevel->FldTagCaption(1) : "-1");
			$arwrk[] = array("0", $frm_sam_users->users_userLevel->FldTagCaption(2) <> "" ? $frm_sam_users->users_userLevel->FldTagCaption(2) : "0");
			$arwrk[] = array("1", $frm_sam_users->users_userLevel->FldTagCaption(3) <> "" ? $frm_sam_users->users_userLevel->FldTagCaption(3) : "1");
			$arwrk[] = array("2", $frm_sam_users->users_userLevel->FldTagCaption(4) <> "" ? $frm_sam_users->users_userLevel->FldTagCaption(4) : "2");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$frm_sam_users->users_userLevel->EditValue = $arwrk;

			// users_email
			$frm_sam_users->users_email->EditCustomAttributes = "";
			$frm_sam_users->users_email->EditValue = up_HtmlEncode($frm_sam_users->users_email->CurrentValue);

			// users_contactNo
			$frm_sam_users->users_contactNo->EditCustomAttributes = "";
			$frm_sam_users->users_contactNo->EditValue = up_HtmlEncode($frm_sam_users->users_contactNo->CurrentValue);

			// Edit refer script
			// cu

			$frm_sam_users->cu->HrefValue = "";

			// units_id
			$frm_sam_users->units_id->HrefValue = "";

			// cu_unit_name
			$frm_sam_users->cu_unit_name->HrefValue = "";

			// users_name
			$frm_sam_users->users_name->HrefValue = "";

			// users_nameLast
			$frm_sam_users->users_nameLast->HrefValue = "";

			// users_nameFirst
			$frm_sam_users->users_nameFirst->HrefValue = "";

			// users_nameMiddle
			$frm_sam_users->users_nameMiddle->HrefValue = "";

			// users_userLoginName
			$frm_sam_users->users_userLoginName->HrefValue = "";

			// users_password
			$frm_sam_users->users_password->HrefValue = "";

			// users_userLevel
			$frm_sam_users->users_userLevel->HrefValue = "";

			// users_email
			$frm_sam_users->users_email->HrefValue = "";

			// users_contactNo
			$frm_sam_users->users_contactNo->HrefValue = "";
		}
		if ($frm_sam_users->RowType == UP_ROWTYPE_ADD ||
			$frm_sam_users->RowType == UP_ROWTYPE_EDIT ||
			$frm_sam_users->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_sam_users->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_sam_users->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_users->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_sam_users;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($frm_sam_users->users_nameLast->FormValue) && $frm_sam_users->users_nameLast->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_sam_users->users_nameLast->FldCaption());
		}
		if (!is_null($frm_sam_users->users_nameFirst->FormValue) && $frm_sam_users->users_nameFirst->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_sam_users->users_nameFirst->FldCaption());
		}
		if (!is_null($frm_sam_users->users_userLoginName->FormValue) && $frm_sam_users->users_userLoginName->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_sam_users->users_userLoginName->FldCaption());
		}
		if (!is_null($frm_sam_users->users_password->FormValue) && $frm_sam_users->users_password->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_sam_users->users_password->FldCaption());
		}
		if (!is_null($frm_sam_users->users_userLevel->FormValue) && $frm_sam_users->users_userLevel->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_sam_users->users_userLevel->FldCaption());
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
		global $conn, $Language, $Security, $frm_sam_users;

		// Check if valid User ID
		$bValidUser = FALSE;
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$bValidUser = $Security->IsValidUserID($frm_sam_users->units_id->CurrentValue);
			if (!$bValidUser) {
				$sUserIdMsg = str_replace("%c", CurrentUserID(), $Language->Phrase("UnAuthorizedUserID"));
				$sUserIdMsg = str_replace("%u", $frm_sam_users->units_id->CurrentValue, $sUserIdMsg);
				$this->setFailureMessage($sUserIdMsg);
				return FALSE;
			}
		}
		if ($frm_sam_users->users_userLoginName->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(users_userLoginName = '" . up_AdjustSql($frm_sam_users->users_userLoginName->CurrentValue) . "')";
			$rsChk = $frm_sam_users->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'users_userLoginName', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $frm_sam_users->users_userLoginName->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		if ($frm_sam_users->users_password->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(users_password = '" . up_AdjustSql($frm_sam_users->users_password->CurrentValue) . "')";
			$rsChk = $frm_sam_users->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'users_password', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $frm_sam_users->users_password->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$rsnew = array();

		// cu
		$frm_sam_users->cu->SetDbValueDef($rsnew, $frm_sam_users->cu->CurrentValue, NULL, FALSE);

		// units_id
		$frm_sam_users->units_id->SetDbValueDef($rsnew, $frm_sam_users->units_id->CurrentValue, NULL, FALSE);

		// cu_unit_name
		$frm_sam_users->cu_unit_name->SetDbValueDef($rsnew, $frm_sam_users->cu_unit_name->CurrentValue, NULL, FALSE);

		// users_name
		$frm_sam_users->users_name->SetDbValueDef($rsnew, $frm_sam_users->users_name->CurrentValue, NULL, FALSE);

		// users_nameLast
		$frm_sam_users->users_nameLast->SetDbValueDef($rsnew, $frm_sam_users->users_nameLast->CurrentValue, NULL, FALSE);

		// users_nameFirst
		$frm_sam_users->users_nameFirst->SetDbValueDef($rsnew, $frm_sam_users->users_nameFirst->CurrentValue, NULL, FALSE);

		// users_nameMiddle
		$frm_sam_users->users_nameMiddle->SetDbValueDef($rsnew, $frm_sam_users->users_nameMiddle->CurrentValue, NULL, FALSE);

		// users_userLoginName
		$frm_sam_users->users_userLoginName->SetDbValueDef($rsnew, $frm_sam_users->users_userLoginName->CurrentValue, NULL, FALSE);

		// users_password
		$frm_sam_users->users_password->SetDbValueDef($rsnew, $frm_sam_users->users_password->CurrentValue, NULL, FALSE);

		// users_userLevel
		$frm_sam_users->users_userLevel->SetDbValueDef($rsnew, $frm_sam_users->users_userLevel->CurrentValue, 0, strval($frm_sam_users->users_userLevel->CurrentValue) == "");

		// users_email
		$frm_sam_users->users_email->SetDbValueDef($rsnew, $frm_sam_users->users_email->CurrentValue, NULL, FALSE);

		// users_contactNo
		$frm_sam_users->users_contactNo->SetDbValueDef($rsnew, $frm_sam_users->users_contactNo->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_sam_users->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_sam_users->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_sam_users->CancelMessage <> "") {
				$this->setFailureMessage($frm_sam_users->CancelMessage);
				$frm_sam_users->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$frm_sam_users->users_ID->setDbValue($conn->Insert_ID());
			$rsnew['users_ID'] = $frm_sam_users->users_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$frm_sam_users->Row_Inserted($rs, $rsnew);
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
