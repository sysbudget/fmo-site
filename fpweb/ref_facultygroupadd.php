<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_facultygroupinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_facultygroup_add = new cref_facultygroup_add();
$Page =& $ref_facultygroup_add;

// Page init
$ref_facultygroup_add->Page_Init();

// Page main
$ref_facultygroup_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_facultygroup_add = new up_Page("ref_facultygroup_add");

// page properties
ref_facultygroup_add.PageID = "add"; // page ID
ref_facultygroup_add.FormID = "fref_facultygroupadd"; // form ID
var UP_PAGE_ID = ref_facultygroup_add.PageID; // for backward compatibility

// extend page with ValidateForm function
ref_facultygroup_add.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_facultyGroup_CHEDFullTimeEquivalent"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->FldErrMsg()) ?>");

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
ref_facultygroup_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_facultygroup_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_facultygroup_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_facultygroup_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_facultygroup->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_facultygroup->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_facultygroup_add->ShowPageHeader(); ?>
<?php
$ref_facultygroup_add->ShowMessage();
?>
<form name="fref_facultygroupadd" id="fref_facultygroupadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return ref_facultygroup_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="ref_facultygroup">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($ref_facultygroup->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
	<tr id="r_facultyGroup_CHEDCode"<?php echo $ref_facultygroup->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultygroup->facultyGroup_CHEDCode->FldCaption() ?></td>
		<td<?php echo $ref_facultygroup->facultyGroup_CHEDCode->CellAttributes() ?>><span id="el_facultyGroup_CHEDCode">
<input type="text" name="x_facultyGroup_CHEDCode" id="x_facultyGroup_CHEDCode" size="30" maxlength="255" value="<?php echo $ref_facultygroup->facultyGroup_CHEDCode->EditValue ?>"<?php echo $ref_facultygroup->facultyGroup_CHEDCode->EditAttributes() ?>>
</span><?php echo $ref_facultygroup->facultyGroup_CHEDCode->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_facultygroup->facultyGroup_description->Visible) { // facultyGroup_description ?>
	<tr id="r_facultyGroup_description"<?php echo $ref_facultygroup->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultygroup->facultyGroup_description->FldCaption() ?></td>
		<td<?php echo $ref_facultygroup->facultyGroup_description->CellAttributes() ?>><span id="el_facultyGroup_description">
<input type="text" name="x_facultyGroup_description" id="x_facultyGroup_description" size="30" maxlength="255" value="<?php echo $ref_facultygroup->facultyGroup_description->EditValue ?>"<?php echo $ref_facultygroup->facultyGroup_description->EditAttributes() ?>>
</span><?php echo $ref_facultygroup->facultyGroup_description->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->Visible) { // facultyGroup_CHEDFullTimeEquivalent ?>
	<tr id="r_facultyGroup_CHEDFullTimeEquivalent"<?php echo $ref_facultygroup->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->FldCaption() ?></td>
		<td<?php echo $ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->CellAttributes() ?>><span id="el_facultyGroup_CHEDFullTimeEquivalent">
<input type="text" name="x_facultyGroup_CHEDFullTimeEquivalent" id="x_facultyGroup_CHEDFullTimeEquivalent" size="30" value="<?php echo $ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->EditValue ?>"<?php echo $ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->EditAttributes() ?>>
</span><?php echo $ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$ref_facultygroup_add->ShowPageFooter();
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
$ref_facultygroup_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_facultygroup_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'ref_facultygroup';

	// Page object name
	var $PageObjName = 'ref_facultygroup_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_facultygroup;
		if ($ref_facultygroup->UseTokenInUrl) $PageUrl .= "t=" . $ref_facultygroup->TableVar . "&"; // Add page token
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
		global $objForm, $ref_facultygroup;
		if ($ref_facultygroup->UseTokenInUrl) {
			if ($objForm)
				return ($ref_facultygroup->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_facultygroup->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_facultygroup_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_facultygroup)
		if (!isset($GLOBALS["ref_facultygroup"])) {
			$GLOBALS["ref_facultygroup"] = new cref_facultygroup();
			$GLOBALS["Table"] =& $GLOBALS["ref_facultygroup"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_facultygroup', TRUE);

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
		global $ref_facultygroup;

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
			$this->Page_Terminate("ref_facultygrouplist.php");
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
		global $objForm, $Language, $gsFormError, $ref_facultygroup;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$ref_facultygroup->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$ref_facultygroup->CurrentAction = "I"; // Form error, reset action
				$ref_facultygroup->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["facultyGroup_ID"] != "") {
				$ref_facultygroup->facultyGroup_ID->setQueryStringValue($_GET["facultyGroup_ID"]);
				$ref_facultygroup->setKey("facultyGroup_ID", $ref_facultygroup->facultyGroup_ID->CurrentValue); // Set up key
			} else {
				$ref_facultygroup->setKey("facultyGroup_ID", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$ref_facultygroup->CurrentAction = "C"; // Copy record
			} else {
				$ref_facultygroup->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($ref_facultygroup->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("ref_facultygrouplist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$ref_facultygroup->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $ref_facultygroup->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "ref_facultygroupview.php")
						$sReturnUrl = $ref_facultygroup->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$ref_facultygroup->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$ref_facultygroup->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$ref_facultygroup->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $ref_facultygroup;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $ref_facultygroup;
		$ref_facultygroup->facultyGroup_CHEDCode->CurrentValue = NULL;
		$ref_facultygroup->facultyGroup_CHEDCode->OldValue = $ref_facultygroup->facultyGroup_CHEDCode->CurrentValue;
		$ref_facultygroup->facultyGroup_description->CurrentValue = NULL;
		$ref_facultygroup->facultyGroup_description->OldValue = $ref_facultygroup->facultyGroup_description->CurrentValue;
		$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->CurrentValue = NULL;
		$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->OldValue = $ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $ref_facultygroup;
		if (!$ref_facultygroup->facultyGroup_CHEDCode->FldIsDetailKey) {
			$ref_facultygroup->facultyGroup_CHEDCode->setFormValue($objForm->GetValue("x_facultyGroup_CHEDCode"));
		}
		if (!$ref_facultygroup->facultyGroup_description->FldIsDetailKey) {
			$ref_facultygroup->facultyGroup_description->setFormValue($objForm->GetValue("x_facultyGroup_description"));
		}
		if (!$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->FldIsDetailKey) {
			$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->setFormValue($objForm->GetValue("x_facultyGroup_CHEDFullTimeEquivalent"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $ref_facultygroup;
		$this->LoadOldRecord();
		$ref_facultygroup->facultyGroup_CHEDCode->CurrentValue = $ref_facultygroup->facultyGroup_CHEDCode->FormValue;
		$ref_facultygroup->facultyGroup_description->CurrentValue = $ref_facultygroup->facultyGroup_description->FormValue;
		$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->CurrentValue = $ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_facultygroup;
		$sFilter = $ref_facultygroup->KeyFilter();

		// Call Row Selecting event
		$ref_facultygroup->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_facultygroup->CurrentFilter = $sFilter;
		$sSql = $ref_facultygroup->SQL();
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
		global $conn, $ref_facultygroup;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_facultygroup->Row_Selected($row);
		$ref_facultygroup->facultyGroup_ID->setDbValue($rs->fields('facultyGroup_ID'));
		$ref_facultygroup->facultyGroup_CHEDCode->setDbValue($rs->fields('facultyGroup_CHEDCode'));
		$ref_facultygroup->facultyGroup_description->setDbValue($rs->fields('facultyGroup_description'));
		$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->setDbValue($rs->fields('facultyGroup_CHEDFullTimeEquivalent'));
	}

	// Load old record
	function LoadOldRecord() {
		global $ref_facultygroup;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($ref_facultygroup->getKey("facultyGroup_ID")) <> "")
			$ref_facultygroup->facultyGroup_ID->CurrentValue = $ref_facultygroup->getKey("facultyGroup_ID"); // facultyGroup_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$ref_facultygroup->CurrentFilter = $ref_facultygroup->KeyFilter();
			$sSql = $ref_facultygroup->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_facultygroup;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_facultygroup->Row_Rendering();

		// Common render codes for all row types
		// facultyGroup_ID
		// facultyGroup_CHEDCode
		// facultyGroup_description
		// facultyGroup_CHEDFullTimeEquivalent

		if ($ref_facultygroup->RowType == UP_ROWTYPE_VIEW) { // View row

			// facultyGroup_CHEDCode
			$ref_facultygroup->facultyGroup_CHEDCode->ViewValue = $ref_facultygroup->facultyGroup_CHEDCode->CurrentValue;
			$ref_facultygroup->facultyGroup_CHEDCode->ViewCustomAttributes = "";

			// facultyGroup_description
			$ref_facultygroup->facultyGroup_description->ViewValue = $ref_facultygroup->facultyGroup_description->CurrentValue;
			$ref_facultygroup->facultyGroup_description->ViewCustomAttributes = "";

			// facultyGroup_CHEDFullTimeEquivalent
			$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->ViewValue = $ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->CurrentValue;
			$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->ViewCustomAttributes = "";

			// facultyGroup_CHEDCode
			$ref_facultygroup->facultyGroup_CHEDCode->LinkCustomAttributes = "";
			$ref_facultygroup->facultyGroup_CHEDCode->HrefValue = "";
			$ref_facultygroup->facultyGroup_CHEDCode->TooltipValue = "";

			// facultyGroup_description
			$ref_facultygroup->facultyGroup_description->LinkCustomAttributes = "";
			$ref_facultygroup->facultyGroup_description->HrefValue = "";
			$ref_facultygroup->facultyGroup_description->TooltipValue = "";

			// facultyGroup_CHEDFullTimeEquivalent
			$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->LinkCustomAttributes = "";
			$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->HrefValue = "";
			$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->TooltipValue = "";
		} elseif ($ref_facultygroup->RowType == UP_ROWTYPE_ADD) { // Add row

			// facultyGroup_CHEDCode
			$ref_facultygroup->facultyGroup_CHEDCode->EditCustomAttributes = "";
			$ref_facultygroup->facultyGroup_CHEDCode->EditValue = up_HtmlEncode($ref_facultygroup->facultyGroup_CHEDCode->CurrentValue);

			// facultyGroup_description
			$ref_facultygroup->facultyGroup_description->EditCustomAttributes = "";
			$ref_facultygroup->facultyGroup_description->EditValue = up_HtmlEncode($ref_facultygroup->facultyGroup_description->CurrentValue);

			// facultyGroup_CHEDFullTimeEquivalent
			$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->EditCustomAttributes = "";
			$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->EditValue = up_HtmlEncode($ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->CurrentValue);

			// Edit refer script
			// facultyGroup_CHEDCode

			$ref_facultygroup->facultyGroup_CHEDCode->HrefValue = "";

			// facultyGroup_description
			$ref_facultygroup->facultyGroup_description->HrefValue = "";

			// facultyGroup_CHEDFullTimeEquivalent
			$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->HrefValue = "";
		}
		if ($ref_facultygroup->RowType == UP_ROWTYPE_ADD ||
			$ref_facultygroup->RowType == UP_ROWTYPE_EDIT ||
			$ref_facultygroup->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$ref_facultygroup->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($ref_facultygroup->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_facultygroup->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $ref_facultygroup;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckNumber($ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->FormValue)) {
			up_AddMessage($gsFormError, $ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->FldErrMsg());
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
		global $conn, $Language, $Security, $ref_facultygroup;
		$rsnew = array();

		// facultyGroup_CHEDCode
		$ref_facultygroup->facultyGroup_CHEDCode->SetDbValueDef($rsnew, $ref_facultygroup->facultyGroup_CHEDCode->CurrentValue, NULL, FALSE);

		// facultyGroup_description
		$ref_facultygroup->facultyGroup_description->SetDbValueDef($rsnew, $ref_facultygroup->facultyGroup_description->CurrentValue, NULL, FALSE);

		// facultyGroup_CHEDFullTimeEquivalent
		$ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->SetDbValueDef($rsnew, $ref_facultygroup->facultyGroup_CHEDFullTimeEquivalent->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $ref_facultygroup->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($ref_facultygroup->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($ref_facultygroup->CancelMessage <> "") {
				$this->setFailureMessage($ref_facultygroup->CancelMessage);
				$ref_facultygroup->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$ref_facultygroup->facultyGroup_ID->setDbValue($conn->Insert_ID());
			$rsnew['facultyGroup_ID'] = $ref_facultygroup->facultyGroup_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$ref_facultygroup->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_facultygroup';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $ref_facultygroup;
		$table = 'ref_facultygroup';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['facultyGroup_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($ref_facultygroup->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_facultygroup->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($ref_facultygroup->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
