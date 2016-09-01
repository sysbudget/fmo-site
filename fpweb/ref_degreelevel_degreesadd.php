<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_degreelevel_degreesinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_degreelevel_degrees_add = new cref_degreelevel_degrees_add();
$Page =& $ref_degreelevel_degrees_add;

// Page init
$ref_degreelevel_degrees_add->Page_Init();

// Page main
$ref_degreelevel_degrees_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_degreelevel_degrees_add = new up_Page("ref_degreelevel_degrees_add");

// page properties
ref_degreelevel_degrees_add.PageID = "add"; // page ID
ref_degreelevel_degrees_add.FormID = "fref_degreelevel_degreesadd"; // form ID
var UP_PAGE_ID = ref_degreelevel_degrees_add.PageID; // for backward compatibility

// extend page with ValidateForm function
ref_degreelevel_degrees_add.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_degreeLevel_ID"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($ref_degreelevel_degrees->degreeLevel_ID->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_degreeLevel_ID"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_degreelevel_degrees->degreeLevel_ID->FldErrMsg()) ?>");

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
ref_degreelevel_degrees_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_degreelevel_degrees_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_degreelevel_degrees_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_degreelevel_degrees_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_degreelevel_degrees->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_degreelevel_degrees->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_degreelevel_degrees_add->ShowPageHeader(); ?>
<?php
$ref_degreelevel_degrees_add->ShowMessage();
?>
<form name="fref_degreelevel_degreesadd" id="fref_degreelevel_degreesadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return ref_degreelevel_degrees_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="ref_degreelevel_degrees">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($ref_degreelevel_degrees->degreeLevel_ID->Visible) { // degreeLevel_ID ?>
	<tr id="r_degreeLevel_ID"<?php echo $ref_degreelevel_degrees->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_degreelevel_degrees->degreeLevel_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $ref_degreelevel_degrees->degreeLevel_ID->CellAttributes() ?>><span id="el_degreeLevel_ID">
<input type="text" name="x_degreeLevel_ID" id="x_degreeLevel_ID" size="30" value="<?php echo $ref_degreelevel_degrees->degreeLevel_ID->EditValue ?>"<?php echo $ref_degreelevel_degrees->degreeLevel_ID->EditAttributes() ?>>
</span><?php echo $ref_degreelevel_degrees->degreeLevel_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_degreelevel_degrees->degreeLevel_name->Visible) { // degreeLevel_name ?>
	<tr id="r_degreeLevel_name"<?php echo $ref_degreelevel_degrees->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_degreelevel_degrees->degreeLevel_name->FldCaption() ?></td>
		<td<?php echo $ref_degreelevel_degrees->degreeLevel_name->CellAttributes() ?>><span id="el_degreeLevel_name">
<input type="text" name="x_degreeLevel_name" id="x_degreeLevel_name" size="30" maxlength="255" value="<?php echo $ref_degreelevel_degrees->degreeLevel_name->EditValue ?>"<?php echo $ref_degreelevel_degrees->degreeLevel_name->EditAttributes() ?>>
</span><?php echo $ref_degreelevel_degrees->degreeLevel_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_degreelevel_degrees->degreeLevel_educationLevel->Visible) { // degreeLevel_educationLevel ?>
	<tr id="r_degreeLevel_educationLevel"<?php echo $ref_degreelevel_degrees->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_degreelevel_degrees->degreeLevel_educationLevel->FldCaption() ?></td>
		<td<?php echo $ref_degreelevel_degrees->degreeLevel_educationLevel->CellAttributes() ?>><span id="el_degreeLevel_educationLevel">
<input type="text" name="x_degreeLevel_educationLevel" id="x_degreeLevel_educationLevel" size="30" maxlength="255" value="<?php echo $ref_degreelevel_degrees->degreeLevel_educationLevel->EditValue ?>"<?php echo $ref_degreelevel_degrees->degreeLevel_educationLevel->EditAttributes() ?>>
</span><?php echo $ref_degreelevel_degrees->degreeLevel_educationLevel->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$ref_degreelevel_degrees_add->ShowPageFooter();
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
$ref_degreelevel_degrees_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_degreelevel_degrees_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'ref_degreelevel_degrees';

	// Page object name
	var $PageObjName = 'ref_degreelevel_degrees_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_degreelevel_degrees;
		if ($ref_degreelevel_degrees->UseTokenInUrl) $PageUrl .= "t=" . $ref_degreelevel_degrees->TableVar . "&"; // Add page token
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
		global $objForm, $ref_degreelevel_degrees;
		if ($ref_degreelevel_degrees->UseTokenInUrl) {
			if ($objForm)
				return ($ref_degreelevel_degrees->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_degreelevel_degrees->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_degreelevel_degrees_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_degreelevel_degrees)
		if (!isset($GLOBALS["ref_degreelevel_degrees"])) {
			$GLOBALS["ref_degreelevel_degrees"] = new cref_degreelevel_degrees();
			$GLOBALS["Table"] =& $GLOBALS["ref_degreelevel_degrees"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_degreelevel_degrees', TRUE);

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
		global $ref_degreelevel_degrees;

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
			$this->Page_Terminate("ref_degreelevel_degreeslist.php");
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
		global $objForm, $Language, $gsFormError, $ref_degreelevel_degrees;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$ref_degreelevel_degrees->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$ref_degreelevel_degrees->CurrentAction = "I"; // Form error, reset action
				$ref_degreelevel_degrees->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["degreeLevel_ID"] != "") {
				$ref_degreelevel_degrees->degreeLevel_ID->setQueryStringValue($_GET["degreeLevel_ID"]);
				$ref_degreelevel_degrees->setKey("degreeLevel_ID", $ref_degreelevel_degrees->degreeLevel_ID->CurrentValue); // Set up key
			} else {
				$ref_degreelevel_degrees->setKey("degreeLevel_ID", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$ref_degreelevel_degrees->CurrentAction = "C"; // Copy record
			} else {
				$ref_degreelevel_degrees->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($ref_degreelevel_degrees->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("ref_degreelevel_degreeslist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$ref_degreelevel_degrees->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $ref_degreelevel_degrees->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "ref_degreelevel_degreesview.php")
						$sReturnUrl = $ref_degreelevel_degrees->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$ref_degreelevel_degrees->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$ref_degreelevel_degrees->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$ref_degreelevel_degrees->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $ref_degreelevel_degrees;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $ref_degreelevel_degrees;
		$ref_degreelevel_degrees->degreeLevel_ID->CurrentValue = 0;
		$ref_degreelevel_degrees->degreeLevel_name->CurrentValue = NULL;
		$ref_degreelevel_degrees->degreeLevel_name->OldValue = $ref_degreelevel_degrees->degreeLevel_name->CurrentValue;
		$ref_degreelevel_degrees->degreeLevel_educationLevel->CurrentValue = NULL;
		$ref_degreelevel_degrees->degreeLevel_educationLevel->OldValue = $ref_degreelevel_degrees->degreeLevel_educationLevel->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $ref_degreelevel_degrees;
		if (!$ref_degreelevel_degrees->degreeLevel_ID->FldIsDetailKey) {
			$ref_degreelevel_degrees->degreeLevel_ID->setFormValue($objForm->GetValue("x_degreeLevel_ID"));
		}
		if (!$ref_degreelevel_degrees->degreeLevel_name->FldIsDetailKey) {
			$ref_degreelevel_degrees->degreeLevel_name->setFormValue($objForm->GetValue("x_degreeLevel_name"));
		}
		if (!$ref_degreelevel_degrees->degreeLevel_educationLevel->FldIsDetailKey) {
			$ref_degreelevel_degrees->degreeLevel_educationLevel->setFormValue($objForm->GetValue("x_degreeLevel_educationLevel"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $ref_degreelevel_degrees;
		$this->LoadOldRecord();
		$ref_degreelevel_degrees->degreeLevel_ID->CurrentValue = $ref_degreelevel_degrees->degreeLevel_ID->FormValue;
		$ref_degreelevel_degrees->degreeLevel_name->CurrentValue = $ref_degreelevel_degrees->degreeLevel_name->FormValue;
		$ref_degreelevel_degrees->degreeLevel_educationLevel->CurrentValue = $ref_degreelevel_degrees->degreeLevel_educationLevel->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_degreelevel_degrees;
		$sFilter = $ref_degreelevel_degrees->KeyFilter();

		// Call Row Selecting event
		$ref_degreelevel_degrees->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_degreelevel_degrees->CurrentFilter = $sFilter;
		$sSql = $ref_degreelevel_degrees->SQL();
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
		global $conn, $ref_degreelevel_degrees;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_degreelevel_degrees->Row_Selected($row);
		$ref_degreelevel_degrees->degreeLevel_ID->setDbValue($rs->fields('degreeLevel_ID'));
		$ref_degreelevel_degrees->degreeLevel_name->setDbValue($rs->fields('degreeLevel_name'));
		$ref_degreelevel_degrees->degreeLevel_educationLevel->setDbValue($rs->fields('degreeLevel_educationLevel'));
	}

	// Load old record
	function LoadOldRecord() {
		global $ref_degreelevel_degrees;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($ref_degreelevel_degrees->getKey("degreeLevel_ID")) <> "")
			$ref_degreelevel_degrees->degreeLevel_ID->CurrentValue = $ref_degreelevel_degrees->getKey("degreeLevel_ID"); // degreeLevel_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$ref_degreelevel_degrees->CurrentFilter = $ref_degreelevel_degrees->KeyFilter();
			$sSql = $ref_degreelevel_degrees->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_degreelevel_degrees;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_degreelevel_degrees->Row_Rendering();

		// Common render codes for all row types
		// degreeLevel_ID
		// degreeLevel_name
		// degreeLevel_educationLevel

		if ($ref_degreelevel_degrees->RowType == UP_ROWTYPE_VIEW) { // View row

			// degreeLevel_ID
			$ref_degreelevel_degrees->degreeLevel_ID->ViewValue = $ref_degreelevel_degrees->degreeLevel_ID->CurrentValue;
			$ref_degreelevel_degrees->degreeLevel_ID->ViewCustomAttributes = "";

			// degreeLevel_name
			$ref_degreelevel_degrees->degreeLevel_name->ViewValue = $ref_degreelevel_degrees->degreeLevel_name->CurrentValue;
			$ref_degreelevel_degrees->degreeLevel_name->ViewCustomAttributes = "";

			// degreeLevel_educationLevel
			$ref_degreelevel_degrees->degreeLevel_educationLevel->ViewValue = $ref_degreelevel_degrees->degreeLevel_educationLevel->CurrentValue;
			$ref_degreelevel_degrees->degreeLevel_educationLevel->ViewCustomAttributes = "";

			// degreeLevel_ID
			$ref_degreelevel_degrees->degreeLevel_ID->LinkCustomAttributes = "";
			$ref_degreelevel_degrees->degreeLevel_ID->HrefValue = "";
			$ref_degreelevel_degrees->degreeLevel_ID->TooltipValue = "";

			// degreeLevel_name
			$ref_degreelevel_degrees->degreeLevel_name->LinkCustomAttributes = "";
			$ref_degreelevel_degrees->degreeLevel_name->HrefValue = "";
			$ref_degreelevel_degrees->degreeLevel_name->TooltipValue = "";

			// degreeLevel_educationLevel
			$ref_degreelevel_degrees->degreeLevel_educationLevel->LinkCustomAttributes = "";
			$ref_degreelevel_degrees->degreeLevel_educationLevel->HrefValue = "";
			$ref_degreelevel_degrees->degreeLevel_educationLevel->TooltipValue = "";
		} elseif ($ref_degreelevel_degrees->RowType == UP_ROWTYPE_ADD) { // Add row

			// degreeLevel_ID
			$ref_degreelevel_degrees->degreeLevel_ID->EditCustomAttributes = "";
			$ref_degreelevel_degrees->degreeLevel_ID->EditValue = up_HtmlEncode($ref_degreelevel_degrees->degreeLevel_ID->CurrentValue);

			// degreeLevel_name
			$ref_degreelevel_degrees->degreeLevel_name->EditCustomAttributes = "";
			$ref_degreelevel_degrees->degreeLevel_name->EditValue = up_HtmlEncode($ref_degreelevel_degrees->degreeLevel_name->CurrentValue);

			// degreeLevel_educationLevel
			$ref_degreelevel_degrees->degreeLevel_educationLevel->EditCustomAttributes = "";
			$ref_degreelevel_degrees->degreeLevel_educationLevel->EditValue = up_HtmlEncode($ref_degreelevel_degrees->degreeLevel_educationLevel->CurrentValue);

			// Edit refer script
			// degreeLevel_ID

			$ref_degreelevel_degrees->degreeLevel_ID->HrefValue = "";

			// degreeLevel_name
			$ref_degreelevel_degrees->degreeLevel_name->HrefValue = "";

			// degreeLevel_educationLevel
			$ref_degreelevel_degrees->degreeLevel_educationLevel->HrefValue = "";
		}
		if ($ref_degreelevel_degrees->RowType == UP_ROWTYPE_ADD ||
			$ref_degreelevel_degrees->RowType == UP_ROWTYPE_EDIT ||
			$ref_degreelevel_degrees->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$ref_degreelevel_degrees->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($ref_degreelevel_degrees->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_degreelevel_degrees->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $ref_degreelevel_degrees;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($ref_degreelevel_degrees->degreeLevel_ID->FormValue) && $ref_degreelevel_degrees->degreeLevel_ID->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $ref_degreelevel_degrees->degreeLevel_ID->FldCaption());
		}
		if (!up_CheckInteger($ref_degreelevel_degrees->degreeLevel_ID->FormValue)) {
			up_AddMessage($gsFormError, $ref_degreelevel_degrees->degreeLevel_ID->FldErrMsg());
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
		global $conn, $Language, $Security, $ref_degreelevel_degrees;

		// Check if key value entered
		if ($ref_degreelevel_degrees->degreeLevel_ID->CurrentValue == "" && $ref_degreelevel_degrees->degreeLevel_ID->getSessionValue() == "") {
			$this->setFailureMessage($Language->Phrase("InvalidKeyValue"));
			return FALSE;
		}

		// Check for duplicate key
		$bCheckKey = TRUE;
		$sFilter = $ref_degreelevel_degrees->KeyFilter();
		if ($bCheckKey) {
			$rsChk = $ref_degreelevel_degrees->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sKeyErrMsg = str_replace("%f", $sFilter, $Language->Phrase("DupKey"));
				$this->setFailureMessage($sKeyErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		if ($ref_degreelevel_degrees->degreeLevel_ID->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(degreeLevel_ID = " . up_AdjustSql($ref_degreelevel_degrees->degreeLevel_ID->CurrentValue) . ")";
			$rsChk = $ref_degreelevel_degrees->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'degreeLevel_ID', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $ref_degreelevel_degrees->degreeLevel_ID->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$rsnew = array();

		// degreeLevel_ID
		$ref_degreelevel_degrees->degreeLevel_ID->SetDbValueDef($rsnew, $ref_degreelevel_degrees->degreeLevel_ID->CurrentValue, 0, strval($ref_degreelevel_degrees->degreeLevel_ID->CurrentValue) == "");

		// degreeLevel_name
		$ref_degreelevel_degrees->degreeLevel_name->SetDbValueDef($rsnew, $ref_degreelevel_degrees->degreeLevel_name->CurrentValue, NULL, FALSE);

		// degreeLevel_educationLevel
		$ref_degreelevel_degrees->degreeLevel_educationLevel->SetDbValueDef($rsnew, $ref_degreelevel_degrees->degreeLevel_educationLevel->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $ref_degreelevel_degrees->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($ref_degreelevel_degrees->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($ref_degreelevel_degrees->CancelMessage <> "") {
				$this->setFailureMessage($ref_degreelevel_degrees->CancelMessage);
				$ref_degreelevel_degrees->CancelMessage = "";
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
			$ref_degreelevel_degrees->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_degreelevel_degrees';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $ref_degreelevel_degrees;
		$table = 'ref_degreelevel_degrees';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['degreeLevel_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($ref_degreelevel_degrees->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_degreelevel_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($ref_degreelevel_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
