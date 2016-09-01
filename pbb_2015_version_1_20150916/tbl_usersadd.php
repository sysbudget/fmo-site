<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_users_add = new ctbl_users_add();
$Page =& $tbl_users_add;

// Page init
$tbl_users_add->Page_Init();

// Page main
$tbl_users_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_users_add = new up_Page("tbl_users_add");

// page properties
tbl_users_add.PageID = "add"; // page ID
tbl_users_add.FormID = "ftbl_usersadd"; // form ID
var UP_PAGE_ID = tbl_users_add.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_users_add.ValidateForm = function(fobj) {
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
tbl_users_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_users_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_users_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_users_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_users->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_users->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_users_add->ShowPageHeader(); ?>
<?php
$tbl_users_add->ShowMessage();
?>
<form name="ftbl_usersadd" id="ftbl_usersadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return tbl_users_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="tbl_users">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_users->cu->Visible) { // cu ?>
	<tr id="r_cu"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->cu->FldCaption() ?></td>
		<td<?php echo $tbl_users->cu->CellAttributes() ?>><span id="el_cu">
<input type="text" name="x_cu" id="x_cu" size="30" maxlength="6" value="<?php echo $tbl_users->cu->EditValue ?>"<?php echo $tbl_users->cu->EditAttributes() ?>>
</span><?php echo $tbl_users->cu->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->units_id->Visible) { // units_id ?>
	<tr id="r_units_id"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->units_id->FldCaption() ?></td>
		<td<?php echo $tbl_users->units_id->CellAttributes() ?>><span id="el_units_id">
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $tbl_users->units_id->ViewAttributes() ?>><?php echo $tbl_users->units_id->EditValue ?></div>
<input type="hidden" name="x_units_id" id="x_units_id" value="<?php echo up_HtmlEncode($tbl_users->units_id->CurrentValue) ?>">
<?php } else { ?>
<input type="text" name="x_units_id" id="x_units_id" size="30" maxlength="255" value="<?php echo $tbl_users->units_id->EditValue ?>"<?php echo $tbl_users->units_id->EditAttributes() ?>>
<?php } ?>
</span><?php echo $tbl_users->units_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->cu_unit_name->Visible) { // cu_unit_name ?>
	<tr id="r_cu_unit_name"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->cu_unit_name->FldCaption() ?></td>
		<td<?php echo $tbl_users->cu_unit_name->CellAttributes() ?>><span id="el_cu_unit_name">
<input type="text" name="x_cu_unit_name" id="x_cu_unit_name" size="30" maxlength="255" value="<?php echo $tbl_users->cu_unit_name->EditValue ?>"<?php echo $tbl_users->cu_unit_name->EditAttributes() ?>>
</span><?php echo $tbl_users->cu_unit_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->users_name->Visible) { // users_name ?>
	<tr id="r_users_name"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_name->FldCaption() ?></td>
		<td<?php echo $tbl_users->users_name->CellAttributes() ?>><span id="el_users_name">
<input type="text" name="x_users_name" id="x_users_name" size="30" maxlength="255" value="<?php echo $tbl_users->users_name->EditValue ?>"<?php echo $tbl_users->users_name->EditAttributes() ?>>
</span><?php echo $tbl_users->users_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->users_nameLast->Visible) { // users_nameLast ?>
	<tr id="r_users_nameLast"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_nameLast->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_users->users_nameLast->CellAttributes() ?>><span id="el_users_nameLast">
<input type="text" name="x_users_nameLast" id="x_users_nameLast" size="30" maxlength="255" value="<?php echo $tbl_users->users_nameLast->EditValue ?>"<?php echo $tbl_users->users_nameLast->EditAttributes() ?>>
</span><?php echo $tbl_users->users_nameLast->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->users_nameFirst->Visible) { // users_nameFirst ?>
	<tr id="r_users_nameFirst"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_nameFirst->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_users->users_nameFirst->CellAttributes() ?>><span id="el_users_nameFirst">
<input type="text" name="x_users_nameFirst" id="x_users_nameFirst" size="30" maxlength="255" value="<?php echo $tbl_users->users_nameFirst->EditValue ?>"<?php echo $tbl_users->users_nameFirst->EditAttributes() ?>>
</span><?php echo $tbl_users->users_nameFirst->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_users->users_nameMiddle->Visible) { // users_nameMiddle ?>
	<tr id="r_users_nameMiddle"<?php echo $tbl_users->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_users->users_nameMiddle->FldCaption() ?></td>
		<td<?php echo $tbl_users->users_nameMiddle->CellAttributes() ?>><span id="el_users_nameMiddle">
<input type="text" name="x_users_nameMiddle" id="x_users_nameMiddle" size="30" maxlength="255" value="<?php echo $tbl_users->users_nameMiddle->EditValue ?>"<?php echo $tbl_users->users_nameMiddle->EditAttributes() ?>>
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
<input type="text" name="x_users_password" id="x_users_password" size="30" maxlength="15" value="<?php echo $tbl_users->users_password->EditValue ?>"<?php echo $tbl_users->users_password->EditAttributes() ?>>
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
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$tbl_users_add->ShowPageFooter();
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
$tbl_users_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_users_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'tbl_users';

	// Page object name
	var $PageObjName = 'tbl_users_add';

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
	function ctbl_users_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_users)
		if (!isset($GLOBALS["tbl_users"])) {
			$GLOBALS["tbl_users"] = new ctbl_users();
			$GLOBALS["Table"] =& $GLOBALS["tbl_users"];
		}

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

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
		if (!$Security->CanAdd()) {
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
	var $DbMasterFilter = "";
	var $DbDetailFilter = "";
	var $Priv = 0;
	var $OldRecordset;
	var $CopyRecord;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $tbl_users;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$tbl_users->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$tbl_users->CurrentAction = "I"; // Form error, reset action
				$tbl_users->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["users_ID"] != "") {
				$tbl_users->users_ID->setQueryStringValue($_GET["users_ID"]);
				$tbl_users->setKey("users_ID", $tbl_users->users_ID->CurrentValue); // Set up key
			} else {
				$tbl_users->setKey("users_ID", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$tbl_users->CurrentAction = "C"; // Copy record
			} else {
				$tbl_users->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($tbl_users->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("tbl_userslist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$tbl_users->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $tbl_users->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "tbl_usersview.php")
						$sReturnUrl = $tbl_users->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$tbl_users->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$tbl_users->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
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

	// Load default values
	function LoadDefaultValues() {
		global $tbl_users;
		$tbl_users->cu->CurrentValue = NULL;
		$tbl_users->cu->OldValue = $tbl_users->cu->CurrentValue;
		$tbl_users->units_id->CurrentValue = CurrentUserID();
		$tbl_users->cu_unit_name->CurrentValue = NULL;
		$tbl_users->cu_unit_name->OldValue = $tbl_users->cu_unit_name->CurrentValue;
		$tbl_users->users_name->CurrentValue = NULL;
		$tbl_users->users_name->OldValue = $tbl_users->users_name->CurrentValue;
		$tbl_users->users_nameLast->CurrentValue = NULL;
		$tbl_users->users_nameLast->OldValue = $tbl_users->users_nameLast->CurrentValue;
		$tbl_users->users_nameFirst->CurrentValue = NULL;
		$tbl_users->users_nameFirst->OldValue = $tbl_users->users_nameFirst->CurrentValue;
		$tbl_users->users_nameMiddle->CurrentValue = NULL;
		$tbl_users->users_nameMiddle->OldValue = $tbl_users->users_nameMiddle->CurrentValue;
		$tbl_users->users_userLoginName->CurrentValue = NULL;
		$tbl_users->users_userLoginName->OldValue = $tbl_users->users_userLoginName->CurrentValue;
		$tbl_users->users_password->CurrentValue = NULL;
		$tbl_users->users_password->OldValue = $tbl_users->users_password->CurrentValue;
		$tbl_users->users_userLevel->CurrentValue = 1;
		$tbl_users->users_email->CurrentValue = NULL;
		$tbl_users->users_email->OldValue = $tbl_users->users_email->CurrentValue;
		$tbl_users->users_contactNo->CurrentValue = NULL;
		$tbl_users->users_contactNo->OldValue = $tbl_users->users_contactNo->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_users;
		if (!$tbl_users->cu->FldIsDetailKey) {
			$tbl_users->cu->setFormValue($objForm->GetValue("x_cu"));
		}
		if (!$tbl_users->units_id->FldIsDetailKey) {
			$tbl_users->units_id->setFormValue($objForm->GetValue("x_units_id"));
		}
		if (!$tbl_users->cu_unit_name->FldIsDetailKey) {
			$tbl_users->cu_unit_name->setFormValue($objForm->GetValue("x_cu_unit_name"));
		}
		if (!$tbl_users->users_name->FldIsDetailKey) {
			$tbl_users->users_name->setFormValue($objForm->GetValue("x_users_name"));
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
		$this->LoadOldRecord();
		$tbl_users->cu->CurrentValue = $tbl_users->cu->FormValue;
		$tbl_users->units_id->CurrentValue = $tbl_users->units_id->FormValue;
		$tbl_users->cu_unit_name->CurrentValue = $tbl_users->cu_unit_name->FormValue;
		$tbl_users->users_name->CurrentValue = $tbl_users->users_name->FormValue;
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
		$tbl_users->units_id->setDbValue($rs->fields('units_id'));
		$tbl_users->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
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

	// Load old record
	function LoadOldRecord() {
		global $tbl_users;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($tbl_users->getKey("users_ID")) <> "")
			$tbl_users->users_ID->CurrentValue = $tbl_users->getKey("users_ID"); // users_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_users->CurrentFilter = $tbl_users->KeyFilter();
			$sSql = $tbl_users->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
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

		if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View row

			// users_ID
			$tbl_users->users_ID->ViewValue = $tbl_users->users_ID->CurrentValue;
			$tbl_users->users_ID->ViewCustomAttributes = "";

			// cu
			$tbl_users->cu->ViewValue = $tbl_users->cu->CurrentValue;
			$tbl_users->cu->ViewCustomAttributes = "";

			// units_id
			$tbl_users->units_id->ViewValue = $tbl_users->units_id->CurrentValue;
			$tbl_users->units_id->ViewCustomAttributes = "";

			// cu_unit_name
			$tbl_users->cu_unit_name->ViewValue = $tbl_users->cu_unit_name->CurrentValue;
			$tbl_users->cu_unit_name->ViewCustomAttributes = "";

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
			$tbl_users->users_password->ViewValue = $tbl_users->users_password->CurrentValue;
			$tbl_users->users_password->ViewCustomAttributes = "";

			// users_userLevel
			if ($Security->CanAdmin()) { // System admin
			if (strval($tbl_users->users_userLevel->CurrentValue) <> "") {
				switch ($tbl_users->users_userLevel->CurrentValue) {
					case "-1":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(1) <> "" ? $tbl_users->users_userLevel->FldTagCaption(1) : $tbl_users->users_userLevel->CurrentValue;
						break;
					case "0":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(2) <> "" ? $tbl_users->users_userLevel->FldTagCaption(2) : $tbl_users->users_userLevel->CurrentValue;
						break;
					case "1":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(3) <> "" ? $tbl_users->users_userLevel->FldTagCaption(3) : $tbl_users->users_userLevel->CurrentValue;
						break;
					case "2":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(4) <> "" ? $tbl_users->users_userLevel->FldTagCaption(4) : $tbl_users->users_userLevel->CurrentValue;
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

			// cu
			$tbl_users->cu->LinkCustomAttributes = "";
			$tbl_users->cu->HrefValue = "";
			$tbl_users->cu->TooltipValue = "";

			// units_id
			$tbl_users->units_id->LinkCustomAttributes = "";
			$tbl_users->units_id->HrefValue = "";
			$tbl_users->units_id->TooltipValue = "";

			// cu_unit_name
			$tbl_users->cu_unit_name->LinkCustomAttributes = "";
			$tbl_users->cu_unit_name->HrefValue = "";
			$tbl_users->cu_unit_name->TooltipValue = "";

			// users_name
			$tbl_users->users_name->LinkCustomAttributes = "";
			$tbl_users->users_name->HrefValue = "";
			$tbl_users->users_name->TooltipValue = "";

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
		} elseif ($tbl_users->RowType == UP_ROWTYPE_ADD) { // Add row

			// cu
			$tbl_users->cu->EditCustomAttributes = "";
			$tbl_users->cu->EditValue = up_HtmlEncode($tbl_users->cu->CurrentValue);

			// units_id
			$tbl_users->units_id->EditCustomAttributes = "";
			if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
				$tbl_users->units_id->CurrentValue = CurrentUserID();
			$tbl_users->units_id->EditValue = $tbl_users->units_id->CurrentValue;
			$tbl_users->units_id->ViewCustomAttributes = "";
			} else {
			$tbl_users->units_id->EditValue = up_HtmlEncode($tbl_users->units_id->CurrentValue);
			}

			// cu_unit_name
			$tbl_users->cu_unit_name->EditCustomAttributes = "";
			$tbl_users->cu_unit_name->EditValue = up_HtmlEncode($tbl_users->cu_unit_name->CurrentValue);

			// users_name
			$tbl_users->users_name->EditCustomAttributes = "";
			$tbl_users->users_name->EditValue = up_HtmlEncode($tbl_users->users_name->CurrentValue);

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
			$arwrk[] = array("-1", $tbl_users->users_userLevel->FldTagCaption(1) <> "" ? $tbl_users->users_userLevel->FldTagCaption(1) : "-1");
			$arwrk[] = array("0", $tbl_users->users_userLevel->FldTagCaption(2) <> "" ? $tbl_users->users_userLevel->FldTagCaption(2) : "0");
			$arwrk[] = array("1", $tbl_users->users_userLevel->FldTagCaption(3) <> "" ? $tbl_users->users_userLevel->FldTagCaption(3) : "1");
			$arwrk[] = array("2", $tbl_users->users_userLevel->FldTagCaption(4) <> "" ? $tbl_users->users_userLevel->FldTagCaption(4) : "2");
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
			// cu

			$tbl_users->cu->HrefValue = "";

			// units_id
			$tbl_users->units_id->HrefValue = "";

			// cu_unit_name
			$tbl_users->cu_unit_name->HrefValue = "";

			// users_name
			$tbl_users->users_name->HrefValue = "";

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

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $tbl_users;

		// Check if valid User ID
		$bValidUser = FALSE;
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$bValidUser = $Security->IsValidUserID($tbl_users->units_id->CurrentValue);
			if (!$bValidUser) {
				$sUserIdMsg = str_replace("%c", CurrentUserID(), $Language->Phrase("UnAuthorizedUserID"));
				$sUserIdMsg = str_replace("%u", $tbl_users->units_id->CurrentValue, $sUserIdMsg);
				$this->setFailureMessage($sUserIdMsg);
				return FALSE;
			}
		}
		if ($tbl_users->users_userLoginName->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(users_userLoginName = '" . up_AdjustSql($tbl_users->users_userLoginName->CurrentValue) . "')";
			$rsChk = $tbl_users->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'users_userLoginName', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $tbl_users->users_userLoginName->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		if ($tbl_users->users_password->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(users_password = '" . up_AdjustSql($tbl_users->users_password->CurrentValue) . "')";
			$rsChk = $tbl_users->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'users_password', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $tbl_users->users_password->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$rsnew = array();

		// cu
		$tbl_users->cu->SetDbValueDef($rsnew, $tbl_users->cu->CurrentValue, NULL, FALSE);

		// units_id
		$tbl_users->units_id->SetDbValueDef($rsnew, $tbl_users->units_id->CurrentValue, NULL, FALSE);

		// cu_unit_name
		$tbl_users->cu_unit_name->SetDbValueDef($rsnew, $tbl_users->cu_unit_name->CurrentValue, NULL, FALSE);

		// users_name
		$tbl_users->users_name->SetDbValueDef($rsnew, $tbl_users->users_name->CurrentValue, NULL, FALSE);

		// users_nameLast
		$tbl_users->users_nameLast->SetDbValueDef($rsnew, $tbl_users->users_nameLast->CurrentValue, NULL, FALSE);

		// users_nameFirst
		$tbl_users->users_nameFirst->SetDbValueDef($rsnew, $tbl_users->users_nameFirst->CurrentValue, NULL, FALSE);

		// users_nameMiddle
		$tbl_users->users_nameMiddle->SetDbValueDef($rsnew, $tbl_users->users_nameMiddle->CurrentValue, NULL, FALSE);

		// users_userLoginName
		$tbl_users->users_userLoginName->SetDbValueDef($rsnew, $tbl_users->users_userLoginName->CurrentValue, NULL, FALSE);

		// users_password
		$tbl_users->users_password->SetDbValueDef($rsnew, $tbl_users->users_password->CurrentValue, NULL, FALSE);

		// users_userLevel
		if ($Security->CanAdmin()) { // System admin
		$tbl_users->users_userLevel->SetDbValueDef($rsnew, $tbl_users->users_userLevel->CurrentValue, 0, strval($tbl_users->users_userLevel->CurrentValue) == "");
		}

		// users_email
		$tbl_users->users_email->SetDbValueDef($rsnew, $tbl_users->users_email->CurrentValue, NULL, FALSE);

		// users_contactNo
		$tbl_users->users_contactNo->SetDbValueDef($rsnew, $tbl_users->users_contactNo->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $tbl_users->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($tbl_users->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($tbl_users->CancelMessage <> "") {
				$this->setFailureMessage($tbl_users->CancelMessage);
				$tbl_users->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$tbl_users->users_ID->setDbValue($conn->Insert_ID());
			$rsnew['users_ID'] = $tbl_users->users_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$tbl_users->Row_Inserted($rs, $rsnew);
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
