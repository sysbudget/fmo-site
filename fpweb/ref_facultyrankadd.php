<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_facultyrankinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_facultyrank_add = new cref_facultyrank_add();
$Page =& $ref_facultyrank_add;

// Page init
$ref_facultyrank_add->Page_Init();

// Page main
$ref_facultyrank_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_facultyrank_add = new up_Page("ref_facultyrank_add");

// page properties
ref_facultyrank_add.PageID = "add"; // page ID
ref_facultyrank_add.FormID = "fref_facultyrankadd"; // form ID
var UP_PAGE_ID = ref_facultyrank_add.PageID; // for backward compatibility

// extend page with ValidateForm function
ref_facultyrank_add.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_facultyRank_facultyRank2012"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_facultyrank->facultyRank_facultyRank2012->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyRank_numericRank2012"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_facultyrank->facultyRank_numericRank2012->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyRank_ID"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($ref_facultyrank->facultyRank_ID->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_facultyRank_ID"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_facultyrank->facultyRank_ID->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyRank_category"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_facultyrank->facultyRank_category->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyRank_reportingCHED"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_facultyrank->facultyRank_reportingCHED->FldErrMsg()) ?>");

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
ref_facultyrank_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_facultyrank_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_facultyrank_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_facultyrank_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_facultyrank->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_facultyrank->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_facultyrank_add->ShowPageHeader(); ?>
<?php
$ref_facultyrank_add->ShowMessage();
?>
<form name="fref_facultyrankadd" id="fref_facultyrankadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return ref_facultyrank_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="ref_facultyrank">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($ref_facultyrank->facultyRank_facultyRank2012->Visible) { // facultyRank_facultyRank2012 ?>
	<tr id="r_facultyRank_facultyRank2012"<?php echo $ref_facultyrank->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultyrank->facultyRank_facultyRank2012->FldCaption() ?></td>
		<td<?php echo $ref_facultyrank->facultyRank_facultyRank2012->CellAttributes() ?>><span id="el_facultyRank_facultyRank2012">
<input type="text" name="x_facultyRank_facultyRank2012" id="x_facultyRank_facultyRank2012" size="30" value="<?php echo $ref_facultyrank->facultyRank_facultyRank2012->EditValue ?>"<?php echo $ref_facultyrank->facultyRank_facultyRank2012->EditAttributes() ?>>
</span><?php echo $ref_facultyrank->facultyRank_facultyRank2012->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_facultyrank->facultyRank_numericRank2012->Visible) { // facultyRank_numericRank2012 ?>
	<tr id="r_facultyRank_numericRank2012"<?php echo $ref_facultyrank->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultyrank->facultyRank_numericRank2012->FldCaption() ?></td>
		<td<?php echo $ref_facultyrank->facultyRank_numericRank2012->CellAttributes() ?>><span id="el_facultyRank_numericRank2012">
<input type="text" name="x_facultyRank_numericRank2012" id="x_facultyRank_numericRank2012" size="30" value="<?php echo $ref_facultyrank->facultyRank_numericRank2012->EditValue ?>"<?php echo $ref_facultyrank->facultyRank_numericRank2012->EditAttributes() ?>>
</span><?php echo $ref_facultyrank->facultyRank_numericRank2012->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_facultyrank->facultyRank_ID->Visible) { // facultyRank_ID ?>
	<tr id="r_facultyRank_ID"<?php echo $ref_facultyrank->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultyrank->facultyRank_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $ref_facultyrank->facultyRank_ID->CellAttributes() ?>><span id="el_facultyRank_ID">
<input type="text" name="x_facultyRank_ID" id="x_facultyRank_ID" size="30" value="<?php echo $ref_facultyrank->facultyRank_ID->EditValue ?>"<?php echo $ref_facultyrank->facultyRank_ID->EditAttributes() ?>>
</span><?php echo $ref_facultyrank->facultyRank_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_facultyrank->facultyRank_UPRank->Visible) { // facultyRank_UPRank ?>
	<tr id="r_facultyRank_UPRank"<?php echo $ref_facultyrank->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultyrank->facultyRank_UPRank->FldCaption() ?></td>
		<td<?php echo $ref_facultyrank->facultyRank_UPRank->CellAttributes() ?>><span id="el_facultyRank_UPRank">
<input type="text" name="x_facultyRank_UPRank" id="x_facultyRank_UPRank" size="30" maxlength="255" value="<?php echo $ref_facultyrank->facultyRank_UPRank->EditValue ?>"<?php echo $ref_facultyrank->facultyRank_UPRank->EditAttributes() ?>>
</span><?php echo $ref_facultyrank->facultyRank_UPRank->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_facultyrank->facultyRank_rankGroup->Visible) { // facultyRank_rankGroup ?>
	<tr id="r_facultyRank_rankGroup"<?php echo $ref_facultyrank->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultyrank->facultyRank_rankGroup->FldCaption() ?></td>
		<td<?php echo $ref_facultyrank->facultyRank_rankGroup->CellAttributes() ?>><span id="el_facultyRank_rankGroup">
<input type="text" name="x_facultyRank_rankGroup" id="x_facultyRank_rankGroup" size="30" maxlength="255" value="<?php echo $ref_facultyrank->facultyRank_rankGroup->EditValue ?>"<?php echo $ref_facultyrank->facultyRank_rankGroup->EditAttributes() ?>>
</span><?php echo $ref_facultyrank->facultyRank_rankGroup->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_facultyrank->facultyRank_isRegular->Visible) { // facultyRank_isRegular ?>
	<tr id="r_facultyRank_isRegular"<?php echo $ref_facultyrank->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultyrank->facultyRank_isRegular->FldCaption() ?></td>
		<td<?php echo $ref_facultyrank->facultyRank_isRegular->CellAttributes() ?>><span id="el_facultyRank_isRegular">
<input type="text" name="x_facultyRank_isRegular" id="x_facultyRank_isRegular" size="30" maxlength="255" value="<?php echo $ref_facultyrank->facultyRank_isRegular->EditValue ?>"<?php echo $ref_facultyrank->facultyRank_isRegular->EditAttributes() ?>>
</span><?php echo $ref_facultyrank->facultyRank_isRegular->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_facultyrank->facultyRank_category->Visible) { // facultyRank_category ?>
	<tr id="r_facultyRank_category"<?php echo $ref_facultyrank->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultyrank->facultyRank_category->FldCaption() ?></td>
		<td<?php echo $ref_facultyrank->facultyRank_category->CellAttributes() ?>><span id="el_facultyRank_category">
<input type="text" name="x_facultyRank_category" id="x_facultyRank_category" size="30" value="<?php echo $ref_facultyrank->facultyRank_category->EditValue ?>"<?php echo $ref_facultyrank->facultyRank_category->EditAttributes() ?>>
</span><?php echo $ref_facultyrank->facultyRank_category->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_facultyrank->facultyRank_salaryScale->Visible) { // facultyRank_salaryScale ?>
	<tr id="r_facultyRank_salaryScale"<?php echo $ref_facultyrank->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultyrank->facultyRank_salaryScale->FldCaption() ?></td>
		<td<?php echo $ref_facultyrank->facultyRank_salaryScale->CellAttributes() ?>><span id="el_facultyRank_salaryScale">
<input type="text" name="x_facultyRank_salaryScale" id="x_facultyRank_salaryScale" size="30" maxlength="255" value="<?php echo $ref_facultyrank->facultyRank_salaryScale->EditValue ?>"<?php echo $ref_facultyrank->facultyRank_salaryScale->EditAttributes() ?>>
</span><?php echo $ref_facultyrank->facultyRank_salaryScale->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_facultyrank->facultyRank_reportingDBM->Visible) { // facultyRank_reportingDBM ?>
	<tr id="r_facultyRank_reportingDBM"<?php echo $ref_facultyrank->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultyrank->facultyRank_reportingDBM->FldCaption() ?></td>
		<td<?php echo $ref_facultyrank->facultyRank_reportingDBM->CellAttributes() ?>><span id="el_facultyRank_reportingDBM">
<input type="text" name="x_facultyRank_reportingDBM" id="x_facultyRank_reportingDBM" size="30" maxlength="255" value="<?php echo $ref_facultyrank->facultyRank_reportingDBM->EditValue ?>"<?php echo $ref_facultyrank->facultyRank_reportingDBM->EditAttributes() ?>>
</span><?php echo $ref_facultyrank->facultyRank_reportingDBM->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_facultyrank->facultyRank_reportingCHED->Visible) { // facultyRank_reportingCHED ?>
	<tr id="r_facultyRank_reportingCHED"<?php echo $ref_facultyrank->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultyrank->facultyRank_reportingCHED->FldCaption() ?></td>
		<td<?php echo $ref_facultyrank->facultyRank_reportingCHED->CellAttributes() ?>><span id="el_facultyRank_reportingCHED">
<input type="text" name="x_facultyRank_reportingCHED" id="x_facultyRank_reportingCHED" size="30" value="<?php echo $ref_facultyrank->facultyRank_reportingCHED->EditValue ?>"<?php echo $ref_facultyrank->facultyRank_reportingCHED->EditAttributes() ?>>
</span><?php echo $ref_facultyrank->facultyRank_reportingCHED->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$ref_facultyrank_add->ShowPageFooter();
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
$ref_facultyrank_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_facultyrank_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'ref_facultyrank';

	// Page object name
	var $PageObjName = 'ref_facultyrank_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_facultyrank;
		if ($ref_facultyrank->UseTokenInUrl) $PageUrl .= "t=" . $ref_facultyrank->TableVar . "&"; // Add page token
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
		global $objForm, $ref_facultyrank;
		if ($ref_facultyrank->UseTokenInUrl) {
			if ($objForm)
				return ($ref_facultyrank->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_facultyrank->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_facultyrank_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_facultyrank)
		if (!isset($GLOBALS["ref_facultyrank"])) {
			$GLOBALS["ref_facultyrank"] = new cref_facultyrank();
			$GLOBALS["Table"] =& $GLOBALS["ref_facultyrank"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_facultyrank', TRUE);

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
		global $ref_facultyrank;

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
			$this->Page_Terminate("ref_facultyranklist.php");
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
		global $objForm, $Language, $gsFormError, $ref_facultyrank;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$ref_facultyrank->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$ref_facultyrank->CurrentAction = "I"; // Form error, reset action
				$ref_facultyrank->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["facultyRank_ID"] != "") {
				$ref_facultyrank->facultyRank_ID->setQueryStringValue($_GET["facultyRank_ID"]);
				$ref_facultyrank->setKey("facultyRank_ID", $ref_facultyrank->facultyRank_ID->CurrentValue); // Set up key
			} else {
				$ref_facultyrank->setKey("facultyRank_ID", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$ref_facultyrank->CurrentAction = "C"; // Copy record
			} else {
				$ref_facultyrank->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($ref_facultyrank->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("ref_facultyranklist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$ref_facultyrank->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $ref_facultyrank->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "ref_facultyrankview.php")
						$sReturnUrl = $ref_facultyrank->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$ref_facultyrank->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$ref_facultyrank->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$ref_facultyrank->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $ref_facultyrank;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $ref_facultyrank;
		$ref_facultyrank->facultyRank_facultyRank2012->CurrentValue = NULL;
		$ref_facultyrank->facultyRank_facultyRank2012->OldValue = $ref_facultyrank->facultyRank_facultyRank2012->CurrentValue;
		$ref_facultyrank->facultyRank_numericRank2012->CurrentValue = NULL;
		$ref_facultyrank->facultyRank_numericRank2012->OldValue = $ref_facultyrank->facultyRank_numericRank2012->CurrentValue;
		$ref_facultyrank->facultyRank_ID->CurrentValue = NULL;
		$ref_facultyrank->facultyRank_ID->OldValue = $ref_facultyrank->facultyRank_ID->CurrentValue;
		$ref_facultyrank->facultyRank_UPRank->CurrentValue = NULL;
		$ref_facultyrank->facultyRank_UPRank->OldValue = $ref_facultyrank->facultyRank_UPRank->CurrentValue;
		$ref_facultyrank->facultyRank_rankGroup->CurrentValue = NULL;
		$ref_facultyrank->facultyRank_rankGroup->OldValue = $ref_facultyrank->facultyRank_rankGroup->CurrentValue;
		$ref_facultyrank->facultyRank_isRegular->CurrentValue = NULL;
		$ref_facultyrank->facultyRank_isRegular->OldValue = $ref_facultyrank->facultyRank_isRegular->CurrentValue;
		$ref_facultyrank->facultyRank_category->CurrentValue = NULL;
		$ref_facultyrank->facultyRank_category->OldValue = $ref_facultyrank->facultyRank_category->CurrentValue;
		$ref_facultyrank->facultyRank_salaryScale->CurrentValue = NULL;
		$ref_facultyrank->facultyRank_salaryScale->OldValue = $ref_facultyrank->facultyRank_salaryScale->CurrentValue;
		$ref_facultyrank->facultyRank_reportingDBM->CurrentValue = NULL;
		$ref_facultyrank->facultyRank_reportingDBM->OldValue = $ref_facultyrank->facultyRank_reportingDBM->CurrentValue;
		$ref_facultyrank->facultyRank_reportingCHED->CurrentValue = NULL;
		$ref_facultyrank->facultyRank_reportingCHED->OldValue = $ref_facultyrank->facultyRank_reportingCHED->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $ref_facultyrank;
		if (!$ref_facultyrank->facultyRank_facultyRank2012->FldIsDetailKey) {
			$ref_facultyrank->facultyRank_facultyRank2012->setFormValue($objForm->GetValue("x_facultyRank_facultyRank2012"));
		}
		if (!$ref_facultyrank->facultyRank_numericRank2012->FldIsDetailKey) {
			$ref_facultyrank->facultyRank_numericRank2012->setFormValue($objForm->GetValue("x_facultyRank_numericRank2012"));
		}
		if (!$ref_facultyrank->facultyRank_ID->FldIsDetailKey) {
			$ref_facultyrank->facultyRank_ID->setFormValue($objForm->GetValue("x_facultyRank_ID"));
		}
		if (!$ref_facultyrank->facultyRank_UPRank->FldIsDetailKey) {
			$ref_facultyrank->facultyRank_UPRank->setFormValue($objForm->GetValue("x_facultyRank_UPRank"));
		}
		if (!$ref_facultyrank->facultyRank_rankGroup->FldIsDetailKey) {
			$ref_facultyrank->facultyRank_rankGroup->setFormValue($objForm->GetValue("x_facultyRank_rankGroup"));
		}
		if (!$ref_facultyrank->facultyRank_isRegular->FldIsDetailKey) {
			$ref_facultyrank->facultyRank_isRegular->setFormValue($objForm->GetValue("x_facultyRank_isRegular"));
		}
		if (!$ref_facultyrank->facultyRank_category->FldIsDetailKey) {
			$ref_facultyrank->facultyRank_category->setFormValue($objForm->GetValue("x_facultyRank_category"));
		}
		if (!$ref_facultyrank->facultyRank_salaryScale->FldIsDetailKey) {
			$ref_facultyrank->facultyRank_salaryScale->setFormValue($objForm->GetValue("x_facultyRank_salaryScale"));
		}
		if (!$ref_facultyrank->facultyRank_reportingDBM->FldIsDetailKey) {
			$ref_facultyrank->facultyRank_reportingDBM->setFormValue($objForm->GetValue("x_facultyRank_reportingDBM"));
		}
		if (!$ref_facultyrank->facultyRank_reportingCHED->FldIsDetailKey) {
			$ref_facultyrank->facultyRank_reportingCHED->setFormValue($objForm->GetValue("x_facultyRank_reportingCHED"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $ref_facultyrank;
		$this->LoadOldRecord();
		$ref_facultyrank->facultyRank_facultyRank2012->CurrentValue = $ref_facultyrank->facultyRank_facultyRank2012->FormValue;
		$ref_facultyrank->facultyRank_numericRank2012->CurrentValue = $ref_facultyrank->facultyRank_numericRank2012->FormValue;
		$ref_facultyrank->facultyRank_ID->CurrentValue = $ref_facultyrank->facultyRank_ID->FormValue;
		$ref_facultyrank->facultyRank_UPRank->CurrentValue = $ref_facultyrank->facultyRank_UPRank->FormValue;
		$ref_facultyrank->facultyRank_rankGroup->CurrentValue = $ref_facultyrank->facultyRank_rankGroup->FormValue;
		$ref_facultyrank->facultyRank_isRegular->CurrentValue = $ref_facultyrank->facultyRank_isRegular->FormValue;
		$ref_facultyrank->facultyRank_category->CurrentValue = $ref_facultyrank->facultyRank_category->FormValue;
		$ref_facultyrank->facultyRank_salaryScale->CurrentValue = $ref_facultyrank->facultyRank_salaryScale->FormValue;
		$ref_facultyrank->facultyRank_reportingDBM->CurrentValue = $ref_facultyrank->facultyRank_reportingDBM->FormValue;
		$ref_facultyrank->facultyRank_reportingCHED->CurrentValue = $ref_facultyrank->facultyRank_reportingCHED->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_facultyrank;
		$sFilter = $ref_facultyrank->KeyFilter();

		// Call Row Selecting event
		$ref_facultyrank->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_facultyrank->CurrentFilter = $sFilter;
		$sSql = $ref_facultyrank->SQL();
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
		global $conn, $ref_facultyrank;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_facultyrank->Row_Selected($row);
		$ref_facultyrank->facultyRank_facultyRank2012->setDbValue($rs->fields('facultyRank_facultyRank2012'));
		$ref_facultyrank->facultyRank_numericRank2012->setDbValue($rs->fields('facultyRank_numericRank2012'));
		$ref_facultyrank->facultyRank_ID->setDbValue($rs->fields('facultyRank_ID'));
		$ref_facultyrank->facultyRank_UPRank->setDbValue($rs->fields('facultyRank_UPRank'));
		$ref_facultyrank->facultyRank_rankGroup->setDbValue($rs->fields('facultyRank_rankGroup'));
		$ref_facultyrank->facultyRank_isRegular->setDbValue($rs->fields('facultyRank_isRegular'));
		$ref_facultyrank->facultyRank_category->setDbValue($rs->fields('facultyRank_category'));
		$ref_facultyrank->facultyRank_salaryScale->setDbValue($rs->fields('facultyRank_salaryScale'));
		$ref_facultyrank->facultyRank_reportingDBM->setDbValue($rs->fields('facultyRank_reportingDBM'));
		$ref_facultyrank->facultyRank_reportingCHED->setDbValue($rs->fields('facultyRank_reportingCHED'));
	}

	// Load old record
	function LoadOldRecord() {
		global $ref_facultyrank;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($ref_facultyrank->getKey("facultyRank_ID")) <> "")
			$ref_facultyrank->facultyRank_ID->CurrentValue = $ref_facultyrank->getKey("facultyRank_ID"); // facultyRank_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$ref_facultyrank->CurrentFilter = $ref_facultyrank->KeyFilter();
			$sSql = $ref_facultyrank->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_facultyrank;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_facultyrank->Row_Rendering();

		// Common render codes for all row types
		// facultyRank_facultyRank2012
		// facultyRank_numericRank2012
		// facultyRank_ID
		// facultyRank_UPRank
		// facultyRank_rankGroup
		// facultyRank_isRegular
		// facultyRank_category
		// facultyRank_salaryScale
		// facultyRank_reportingDBM
		// facultyRank_reportingCHED

		if ($ref_facultyrank->RowType == UP_ROWTYPE_VIEW) { // View row

			// facultyRank_facultyRank2012
			$ref_facultyrank->facultyRank_facultyRank2012->ViewValue = $ref_facultyrank->facultyRank_facultyRank2012->CurrentValue;
			$ref_facultyrank->facultyRank_facultyRank2012->ViewCustomAttributes = "";

			// facultyRank_numericRank2012
			$ref_facultyrank->facultyRank_numericRank2012->ViewValue = $ref_facultyrank->facultyRank_numericRank2012->CurrentValue;
			$ref_facultyrank->facultyRank_numericRank2012->ViewCustomAttributes = "";

			// facultyRank_ID
			$ref_facultyrank->facultyRank_ID->ViewValue = $ref_facultyrank->facultyRank_ID->CurrentValue;
			$ref_facultyrank->facultyRank_ID->ViewCustomAttributes = "";

			// facultyRank_UPRank
			$ref_facultyrank->facultyRank_UPRank->ViewValue = $ref_facultyrank->facultyRank_UPRank->CurrentValue;
			$ref_facultyrank->facultyRank_UPRank->ViewCustomAttributes = "";

			// facultyRank_rankGroup
			$ref_facultyrank->facultyRank_rankGroup->ViewValue = $ref_facultyrank->facultyRank_rankGroup->CurrentValue;
			$ref_facultyrank->facultyRank_rankGroup->ViewCustomAttributes = "";

			// facultyRank_isRegular
			$ref_facultyrank->facultyRank_isRegular->ViewValue = $ref_facultyrank->facultyRank_isRegular->CurrentValue;
			$ref_facultyrank->facultyRank_isRegular->ViewCustomAttributes = "";

			// facultyRank_category
			$ref_facultyrank->facultyRank_category->ViewValue = $ref_facultyrank->facultyRank_category->CurrentValue;
			$ref_facultyrank->facultyRank_category->ViewCustomAttributes = "";

			// facultyRank_salaryScale
			$ref_facultyrank->facultyRank_salaryScale->ViewValue = $ref_facultyrank->facultyRank_salaryScale->CurrentValue;
			$ref_facultyrank->facultyRank_salaryScale->ViewCustomAttributes = "";

			// facultyRank_reportingDBM
			$ref_facultyrank->facultyRank_reportingDBM->ViewValue = $ref_facultyrank->facultyRank_reportingDBM->CurrentValue;
			$ref_facultyrank->facultyRank_reportingDBM->ViewCustomAttributes = "";

			// facultyRank_reportingCHED
			$ref_facultyrank->facultyRank_reportingCHED->ViewValue = $ref_facultyrank->facultyRank_reportingCHED->CurrentValue;
			$ref_facultyrank->facultyRank_reportingCHED->ViewCustomAttributes = "";

			// facultyRank_facultyRank2012
			$ref_facultyrank->facultyRank_facultyRank2012->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_facultyRank2012->HrefValue = "";
			$ref_facultyrank->facultyRank_facultyRank2012->TooltipValue = "";

			// facultyRank_numericRank2012
			$ref_facultyrank->facultyRank_numericRank2012->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_numericRank2012->HrefValue = "";
			$ref_facultyrank->facultyRank_numericRank2012->TooltipValue = "";

			// facultyRank_ID
			$ref_facultyrank->facultyRank_ID->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_ID->HrefValue = "";
			$ref_facultyrank->facultyRank_ID->TooltipValue = "";

			// facultyRank_UPRank
			$ref_facultyrank->facultyRank_UPRank->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_UPRank->HrefValue = "";
			$ref_facultyrank->facultyRank_UPRank->TooltipValue = "";

			// facultyRank_rankGroup
			$ref_facultyrank->facultyRank_rankGroup->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_rankGroup->HrefValue = "";
			$ref_facultyrank->facultyRank_rankGroup->TooltipValue = "";

			// facultyRank_isRegular
			$ref_facultyrank->facultyRank_isRegular->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_isRegular->HrefValue = "";
			$ref_facultyrank->facultyRank_isRegular->TooltipValue = "";

			// facultyRank_category
			$ref_facultyrank->facultyRank_category->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_category->HrefValue = "";
			$ref_facultyrank->facultyRank_category->TooltipValue = "";

			// facultyRank_salaryScale
			$ref_facultyrank->facultyRank_salaryScale->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_salaryScale->HrefValue = "";
			$ref_facultyrank->facultyRank_salaryScale->TooltipValue = "";

			// facultyRank_reportingDBM
			$ref_facultyrank->facultyRank_reportingDBM->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_reportingDBM->HrefValue = "";
			$ref_facultyrank->facultyRank_reportingDBM->TooltipValue = "";

			// facultyRank_reportingCHED
			$ref_facultyrank->facultyRank_reportingCHED->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_reportingCHED->HrefValue = "";
			$ref_facultyrank->facultyRank_reportingCHED->TooltipValue = "";
		} elseif ($ref_facultyrank->RowType == UP_ROWTYPE_ADD) { // Add row

			// facultyRank_facultyRank2012
			$ref_facultyrank->facultyRank_facultyRank2012->EditCustomAttributes = "";
			$ref_facultyrank->facultyRank_facultyRank2012->EditValue = up_HtmlEncode($ref_facultyrank->facultyRank_facultyRank2012->CurrentValue);

			// facultyRank_numericRank2012
			$ref_facultyrank->facultyRank_numericRank2012->EditCustomAttributes = "";
			$ref_facultyrank->facultyRank_numericRank2012->EditValue = up_HtmlEncode($ref_facultyrank->facultyRank_numericRank2012->CurrentValue);

			// facultyRank_ID
			$ref_facultyrank->facultyRank_ID->EditCustomAttributes = "";
			$ref_facultyrank->facultyRank_ID->EditValue = up_HtmlEncode($ref_facultyrank->facultyRank_ID->CurrentValue);

			// facultyRank_UPRank
			$ref_facultyrank->facultyRank_UPRank->EditCustomAttributes = "";
			$ref_facultyrank->facultyRank_UPRank->EditValue = up_HtmlEncode($ref_facultyrank->facultyRank_UPRank->CurrentValue);

			// facultyRank_rankGroup
			$ref_facultyrank->facultyRank_rankGroup->EditCustomAttributes = "";
			$ref_facultyrank->facultyRank_rankGroup->EditValue = up_HtmlEncode($ref_facultyrank->facultyRank_rankGroup->CurrentValue);

			// facultyRank_isRegular
			$ref_facultyrank->facultyRank_isRegular->EditCustomAttributes = "";
			$ref_facultyrank->facultyRank_isRegular->EditValue = up_HtmlEncode($ref_facultyrank->facultyRank_isRegular->CurrentValue);

			// facultyRank_category
			$ref_facultyrank->facultyRank_category->EditCustomAttributes = "";
			$ref_facultyrank->facultyRank_category->EditValue = up_HtmlEncode($ref_facultyrank->facultyRank_category->CurrentValue);

			// facultyRank_salaryScale
			$ref_facultyrank->facultyRank_salaryScale->EditCustomAttributes = "";
			$ref_facultyrank->facultyRank_salaryScale->EditValue = up_HtmlEncode($ref_facultyrank->facultyRank_salaryScale->CurrentValue);

			// facultyRank_reportingDBM
			$ref_facultyrank->facultyRank_reportingDBM->EditCustomAttributes = "";
			$ref_facultyrank->facultyRank_reportingDBM->EditValue = up_HtmlEncode($ref_facultyrank->facultyRank_reportingDBM->CurrentValue);

			// facultyRank_reportingCHED
			$ref_facultyrank->facultyRank_reportingCHED->EditCustomAttributes = "";
			$ref_facultyrank->facultyRank_reportingCHED->EditValue = up_HtmlEncode($ref_facultyrank->facultyRank_reportingCHED->CurrentValue);

			// Edit refer script
			// facultyRank_facultyRank2012

			$ref_facultyrank->facultyRank_facultyRank2012->HrefValue = "";

			// facultyRank_numericRank2012
			$ref_facultyrank->facultyRank_numericRank2012->HrefValue = "";

			// facultyRank_ID
			$ref_facultyrank->facultyRank_ID->HrefValue = "";

			// facultyRank_UPRank
			$ref_facultyrank->facultyRank_UPRank->HrefValue = "";

			// facultyRank_rankGroup
			$ref_facultyrank->facultyRank_rankGroup->HrefValue = "";

			// facultyRank_isRegular
			$ref_facultyrank->facultyRank_isRegular->HrefValue = "";

			// facultyRank_category
			$ref_facultyrank->facultyRank_category->HrefValue = "";

			// facultyRank_salaryScale
			$ref_facultyrank->facultyRank_salaryScale->HrefValue = "";

			// facultyRank_reportingDBM
			$ref_facultyrank->facultyRank_reportingDBM->HrefValue = "";

			// facultyRank_reportingCHED
			$ref_facultyrank->facultyRank_reportingCHED->HrefValue = "";
		}
		if ($ref_facultyrank->RowType == UP_ROWTYPE_ADD ||
			$ref_facultyrank->RowType == UP_ROWTYPE_EDIT ||
			$ref_facultyrank->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$ref_facultyrank->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($ref_facultyrank->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_facultyrank->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $ref_facultyrank;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($ref_facultyrank->facultyRank_facultyRank2012->FormValue)) {
			up_AddMessage($gsFormError, $ref_facultyrank->facultyRank_facultyRank2012->FldErrMsg());
		}
		if (!up_CheckInteger($ref_facultyrank->facultyRank_numericRank2012->FormValue)) {
			up_AddMessage($gsFormError, $ref_facultyrank->facultyRank_numericRank2012->FldErrMsg());
		}
		if (!is_null($ref_facultyrank->facultyRank_ID->FormValue) && $ref_facultyrank->facultyRank_ID->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $ref_facultyrank->facultyRank_ID->FldCaption());
		}
		if (!up_CheckInteger($ref_facultyrank->facultyRank_ID->FormValue)) {
			up_AddMessage($gsFormError, $ref_facultyrank->facultyRank_ID->FldErrMsg());
		}
		if (!up_CheckInteger($ref_facultyrank->facultyRank_category->FormValue)) {
			up_AddMessage($gsFormError, $ref_facultyrank->facultyRank_category->FldErrMsg());
		}
		if (!up_CheckInteger($ref_facultyrank->facultyRank_reportingCHED->FormValue)) {
			up_AddMessage($gsFormError, $ref_facultyrank->facultyRank_reportingCHED->FldErrMsg());
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
		global $conn, $Language, $Security, $ref_facultyrank;

		// Check if key value entered
		if ($ref_facultyrank->facultyRank_ID->CurrentValue == "" && $ref_facultyrank->facultyRank_ID->getSessionValue() == "") {
			$this->setFailureMessage($Language->Phrase("InvalidKeyValue"));
			return FALSE;
		}

		// Check for duplicate key
		$bCheckKey = TRUE;
		$sFilter = $ref_facultyrank->KeyFilter();
		if ($bCheckKey) {
			$rsChk = $ref_facultyrank->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sKeyErrMsg = str_replace("%f", $sFilter, $Language->Phrase("DupKey"));
				$this->setFailureMessage($sKeyErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		if ($ref_facultyrank->facultyRank_ID->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(facultyRank_ID = " . up_AdjustSql($ref_facultyrank->facultyRank_ID->CurrentValue) . ")";
			$rsChk = $ref_facultyrank->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'facultyRank_ID', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $ref_facultyrank->facultyRank_ID->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$rsnew = array();

		// facultyRank_facultyRank2012
		$ref_facultyrank->facultyRank_facultyRank2012->SetDbValueDef($rsnew, $ref_facultyrank->facultyRank_facultyRank2012->CurrentValue, NULL, FALSE);

		// facultyRank_numericRank2012
		$ref_facultyrank->facultyRank_numericRank2012->SetDbValueDef($rsnew, $ref_facultyrank->facultyRank_numericRank2012->CurrentValue, NULL, FALSE);

		// facultyRank_ID
		$ref_facultyrank->facultyRank_ID->SetDbValueDef($rsnew, $ref_facultyrank->facultyRank_ID->CurrentValue, 0, FALSE);

		// facultyRank_UPRank
		$ref_facultyrank->facultyRank_UPRank->SetDbValueDef($rsnew, $ref_facultyrank->facultyRank_UPRank->CurrentValue, NULL, FALSE);

		// facultyRank_rankGroup
		$ref_facultyrank->facultyRank_rankGroup->SetDbValueDef($rsnew, $ref_facultyrank->facultyRank_rankGroup->CurrentValue, NULL, FALSE);

		// facultyRank_isRegular
		$ref_facultyrank->facultyRank_isRegular->SetDbValueDef($rsnew, $ref_facultyrank->facultyRank_isRegular->CurrentValue, NULL, FALSE);

		// facultyRank_category
		$ref_facultyrank->facultyRank_category->SetDbValueDef($rsnew, $ref_facultyrank->facultyRank_category->CurrentValue, NULL, FALSE);

		// facultyRank_salaryScale
		$ref_facultyrank->facultyRank_salaryScale->SetDbValueDef($rsnew, $ref_facultyrank->facultyRank_salaryScale->CurrentValue, NULL, FALSE);

		// facultyRank_reportingDBM
		$ref_facultyrank->facultyRank_reportingDBM->SetDbValueDef($rsnew, $ref_facultyrank->facultyRank_reportingDBM->CurrentValue, NULL, FALSE);

		// facultyRank_reportingCHED
		$ref_facultyrank->facultyRank_reportingCHED->SetDbValueDef($rsnew, $ref_facultyrank->facultyRank_reportingCHED->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $ref_facultyrank->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($ref_facultyrank->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($ref_facultyrank->CancelMessage <> "") {
				$this->setFailureMessage($ref_facultyrank->CancelMessage);
				$ref_facultyrank->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$ref_facultyrank->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_facultyrank';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $ref_facultyrank;
		$table = 'ref_facultyrank';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['facultyRank_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($ref_facultyrank->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_facultyrank->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($ref_facultyrank->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
