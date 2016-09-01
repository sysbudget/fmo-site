<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_cu_executive_officesinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_cu_executive_offices_add = new cfrm_cu_executive_offices_add();
$Page =& $frm_cu_executive_offices_add;

// Page init
$frm_cu_executive_offices_add->Page_Init();

// Page main
$frm_cu_executive_offices_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_cu_executive_offices_add = new up_Page("frm_cu_executive_offices_add");

// page properties
frm_cu_executive_offices_add.PageID = "add"; // page ID
frm_cu_executive_offices_add.FormID = "ffrm_cu_executive_officesadd"; // form ID
var UP_PAGE_ID = frm_cu_executive_offices_add.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_cu_executive_offices_add.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_focal_person_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_cu_executive_offices->focal_person_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_cu_sequence"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_cu_executive_offices->cu_sequence->FldErrMsg()) ?>");

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
frm_cu_executive_offices_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_cu_executive_offices_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_cu_executive_offices_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_cu_executive_offices_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_cu_executive_offices->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_cu_executive_offices->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_cu_executive_offices_add->ShowPageHeader(); ?>
<?php
$frm_cu_executive_offices_add->ShowMessage();
?>
<form name="ffrm_cu_executive_officesadd" id="ffrm_cu_executive_officesadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return frm_cu_executive_offices_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="frm_cu_executive_offices">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_cu_executive_offices->focal_person_id->Visible) { // focal_person_id ?>
	<tr id="r_focal_person_id"<?php echo $frm_cu_executive_offices->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_cu_executive_offices->focal_person_id->FldCaption() ?></td>
		<td<?php echo $frm_cu_executive_offices->focal_person_id->CellAttributes() ?>><span id="el_focal_person_id">
<input type="text" name="x_focal_person_id" id="x_focal_person_id" size="30" value="<?php echo $frm_cu_executive_offices->focal_person_id->EditValue ?>"<?php echo $frm_cu_executive_offices->focal_person_id->EditAttributes() ?>>
</span><?php echo $frm_cu_executive_offices->focal_person_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_cu_executive_offices->cu_sequence->Visible) { // cu_sequence ?>
	<tr id="r_cu_sequence"<?php echo $frm_cu_executive_offices->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_cu_executive_offices->cu_sequence->FldCaption() ?></td>
		<td<?php echo $frm_cu_executive_offices->cu_sequence->CellAttributes() ?>><span id="el_cu_sequence">
<input type="text" name="x_cu_sequence" id="x_cu_sequence" size="30" value="<?php echo $frm_cu_executive_offices->cu_sequence->EditValue ?>"<?php echo $frm_cu_executive_offices->cu_sequence->EditAttributes() ?>>
</span><?php echo $frm_cu_executive_offices->cu_sequence->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_cu_executive_offices->cu_short_name->Visible) { // cu_short_name ?>
	<tr id="r_cu_short_name"<?php echo $frm_cu_executive_offices->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_cu_executive_offices->cu_short_name->FldCaption() ?></td>
		<td<?php echo $frm_cu_executive_offices->cu_short_name->CellAttributes() ?>><span id="el_cu_short_name">
<input type="text" name="x_cu_short_name" id="x_cu_short_name" size="30" maxlength="255" value="<?php echo $frm_cu_executive_offices->cu_short_name->EditValue ?>"<?php echo $frm_cu_executive_offices->cu_short_name->EditAttributes() ?>>
</span><?php echo $frm_cu_executive_offices->cu_short_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_cu_executive_offices->focal_person_office->Visible) { // focal_person_office ?>
	<tr id="r_focal_person_office"<?php echo $frm_cu_executive_offices->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_cu_executive_offices->focal_person_office->FldCaption() ?></td>
		<td<?php echo $frm_cu_executive_offices->focal_person_office->CellAttributes() ?>><span id="el_focal_person_office">
<input type="text" name="x_focal_person_office" id="x_focal_person_office" size="30" maxlength="255" value="<?php echo $frm_cu_executive_offices->focal_person_office->EditValue ?>"<?php echo $frm_cu_executive_offices->focal_person_office->EditAttributes() ?>>
</span><?php echo $frm_cu_executive_offices->focal_person_office->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$frm_cu_executive_offices_add->ShowPageFooter();
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
$frm_cu_executive_offices_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_cu_executive_offices_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'frm_cu_executive_offices';

	// Page object name
	var $PageObjName = 'frm_cu_executive_offices_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_cu_executive_offices;
		if ($frm_cu_executive_offices->UseTokenInUrl) $PageUrl .= "t=" . $frm_cu_executive_offices->TableVar . "&"; // Add page token
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
		global $objForm, $frm_cu_executive_offices;
		if ($frm_cu_executive_offices->UseTokenInUrl) {
			if ($objForm)
				return ($frm_cu_executive_offices->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_cu_executive_offices->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_cu_executive_offices_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_cu_executive_offices)
		if (!isset($GLOBALS["frm_cu_executive_offices"])) {
			$GLOBALS["frm_cu_executive_offices"] = new cfrm_cu_executive_offices();
			$GLOBALS["Table"] =& $GLOBALS["frm_cu_executive_offices"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_cu_executive_offices', TRUE);

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
		global $frm_cu_executive_offices;

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
			$this->Page_Terminate("frm_cu_executive_officeslist.php");
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
		global $objForm, $Language, $gsFormError, $frm_cu_executive_offices;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$frm_cu_executive_offices->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$frm_cu_executive_offices->CurrentAction = "I"; // Form error, reset action
				$frm_cu_executive_offices->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["cu_id"] != "") {
				$frm_cu_executive_offices->cu_id->setQueryStringValue($_GET["cu_id"]);
				$frm_cu_executive_offices->setKey("cu_id", $frm_cu_executive_offices->cu_id->CurrentValue); // Set up key
			} else {
				$frm_cu_executive_offices->setKey("cu_id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$frm_cu_executive_offices->CurrentAction = "C"; // Copy record
			} else {
				$frm_cu_executive_offices->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($frm_cu_executive_offices->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("frm_cu_executive_officeslist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$frm_cu_executive_offices->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $frm_cu_executive_offices->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "frm_cu_executive_officesview.php")
						$sReturnUrl = $frm_cu_executive_offices->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$frm_cu_executive_offices->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$frm_cu_executive_offices->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$frm_cu_executive_offices->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_cu_executive_offices;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_cu_executive_offices;
		$frm_cu_executive_offices->focal_person_id->CurrentValue = NULL;
		$frm_cu_executive_offices->focal_person_id->OldValue = $frm_cu_executive_offices->focal_person_id->CurrentValue;
		$frm_cu_executive_offices->cu_sequence->CurrentValue = NULL;
		$frm_cu_executive_offices->cu_sequence->OldValue = $frm_cu_executive_offices->cu_sequence->CurrentValue;
		$frm_cu_executive_offices->cu_short_name->CurrentValue = NULL;
		$frm_cu_executive_offices->cu_short_name->OldValue = $frm_cu_executive_offices->cu_short_name->CurrentValue;
		$frm_cu_executive_offices->focal_person_office->CurrentValue = NULL;
		$frm_cu_executive_offices->focal_person_office->OldValue = $frm_cu_executive_offices->focal_person_office->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_cu_executive_offices;
		if (!$frm_cu_executive_offices->focal_person_id->FldIsDetailKey) {
			$frm_cu_executive_offices->focal_person_id->setFormValue($objForm->GetValue("x_focal_person_id"));
		}
		if (!$frm_cu_executive_offices->cu_sequence->FldIsDetailKey) {
			$frm_cu_executive_offices->cu_sequence->setFormValue($objForm->GetValue("x_cu_sequence"));
		}
		if (!$frm_cu_executive_offices->cu_short_name->FldIsDetailKey) {
			$frm_cu_executive_offices->cu_short_name->setFormValue($objForm->GetValue("x_cu_short_name"));
		}
		if (!$frm_cu_executive_offices->focal_person_office->FldIsDetailKey) {
			$frm_cu_executive_offices->focal_person_office->setFormValue($objForm->GetValue("x_focal_person_office"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_cu_executive_offices;
		$this->LoadOldRecord();
		$frm_cu_executive_offices->focal_person_id->CurrentValue = $frm_cu_executive_offices->focal_person_id->FormValue;
		$frm_cu_executive_offices->cu_sequence->CurrentValue = $frm_cu_executive_offices->cu_sequence->FormValue;
		$frm_cu_executive_offices->cu_short_name->CurrentValue = $frm_cu_executive_offices->cu_short_name->FormValue;
		$frm_cu_executive_offices->focal_person_office->CurrentValue = $frm_cu_executive_offices->focal_person_office->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_cu_executive_offices;
		$sFilter = $frm_cu_executive_offices->KeyFilter();

		// Call Row Selecting event
		$frm_cu_executive_offices->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_cu_executive_offices->CurrentFilter = $sFilter;
		$sSql = $frm_cu_executive_offices->SQL();
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
		global $conn, $frm_cu_executive_offices;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_cu_executive_offices->Row_Selected($row);
		$frm_cu_executive_offices->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_cu_executive_offices->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_cu_executive_offices->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_cu_executive_offices->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_cu_executive_offices->focal_person_office->setDbValue($rs->fields('focal_person_office'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_cu_executive_offices;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_cu_executive_offices->getKey("cu_id")) <> "")
			$frm_cu_executive_offices->cu_id->CurrentValue = $frm_cu_executive_offices->getKey("cu_id"); // cu_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_cu_executive_offices->CurrentFilter = $frm_cu_executive_offices->KeyFilter();
			$sSql = $frm_cu_executive_offices->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_cu_executive_offices;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_cu_executive_offices->Row_Rendering();

		// Common render codes for all row types
		// cu_id
		// focal_person_id
		// cu_sequence
		// cu_short_name
		// focal_person_office

		if ($frm_cu_executive_offices->RowType == UP_ROWTYPE_VIEW) { // View row

			// cu_id
			$frm_cu_executive_offices->cu_id->ViewValue = $frm_cu_executive_offices->cu_id->CurrentValue;
			$frm_cu_executive_offices->cu_id->ViewCustomAttributes = "";

			// focal_person_id
			$frm_cu_executive_offices->focal_person_id->ViewValue = $frm_cu_executive_offices->focal_person_id->CurrentValue;
			$frm_cu_executive_offices->focal_person_id->ViewCustomAttributes = "";

			// cu_sequence
			$frm_cu_executive_offices->cu_sequence->ViewValue = $frm_cu_executive_offices->cu_sequence->CurrentValue;
			$frm_cu_executive_offices->cu_sequence->ViewCustomAttributes = "";

			// cu_short_name
			$frm_cu_executive_offices->cu_short_name->ViewValue = $frm_cu_executive_offices->cu_short_name->CurrentValue;
			$frm_cu_executive_offices->cu_short_name->ViewCustomAttributes = "";

			// focal_person_office
			$frm_cu_executive_offices->focal_person_office->ViewValue = $frm_cu_executive_offices->focal_person_office->CurrentValue;
			$frm_cu_executive_offices->focal_person_office->ViewCustomAttributes = "";

			// focal_person_id
			$frm_cu_executive_offices->focal_person_id->LinkCustomAttributes = "";
			$frm_cu_executive_offices->focal_person_id->HrefValue = "";
			$frm_cu_executive_offices->focal_person_id->TooltipValue = "";

			// cu_sequence
			$frm_cu_executive_offices->cu_sequence->LinkCustomAttributes = "";
			$frm_cu_executive_offices->cu_sequence->HrefValue = "";
			$frm_cu_executive_offices->cu_sequence->TooltipValue = "";

			// cu_short_name
			$frm_cu_executive_offices->cu_short_name->LinkCustomAttributes = "";
			$frm_cu_executive_offices->cu_short_name->HrefValue = "";
			$frm_cu_executive_offices->cu_short_name->TooltipValue = "";

			// focal_person_office
			$frm_cu_executive_offices->focal_person_office->LinkCustomAttributes = "";
			$frm_cu_executive_offices->focal_person_office->HrefValue = "";
			$frm_cu_executive_offices->focal_person_office->TooltipValue = "";
		} elseif ($frm_cu_executive_offices->RowType == UP_ROWTYPE_ADD) { // Add row

			// focal_person_id
			$frm_cu_executive_offices->focal_person_id->EditCustomAttributes = "";
			$frm_cu_executive_offices->focal_person_id->EditValue = up_HtmlEncode($frm_cu_executive_offices->focal_person_id->CurrentValue);

			// cu_sequence
			$frm_cu_executive_offices->cu_sequence->EditCustomAttributes = "";
			$frm_cu_executive_offices->cu_sequence->EditValue = up_HtmlEncode($frm_cu_executive_offices->cu_sequence->CurrentValue);

			// cu_short_name
			$frm_cu_executive_offices->cu_short_name->EditCustomAttributes = "";
			$frm_cu_executive_offices->cu_short_name->EditValue = up_HtmlEncode($frm_cu_executive_offices->cu_short_name->CurrentValue);

			// focal_person_office
			$frm_cu_executive_offices->focal_person_office->EditCustomAttributes = "";
			$frm_cu_executive_offices->focal_person_office->EditValue = up_HtmlEncode($frm_cu_executive_offices->focal_person_office->CurrentValue);

			// Edit refer script
			// focal_person_id

			$frm_cu_executive_offices->focal_person_id->HrefValue = "";

			// cu_sequence
			$frm_cu_executive_offices->cu_sequence->HrefValue = "";

			// cu_short_name
			$frm_cu_executive_offices->cu_short_name->HrefValue = "";

			// focal_person_office
			$frm_cu_executive_offices->focal_person_office->HrefValue = "";
		}
		if ($frm_cu_executive_offices->RowType == UP_ROWTYPE_ADD ||
			$frm_cu_executive_offices->RowType == UP_ROWTYPE_EDIT ||
			$frm_cu_executive_offices->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_cu_executive_offices->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_cu_executive_offices->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_cu_executive_offices->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_cu_executive_offices;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($frm_cu_executive_offices->focal_person_id->FormValue)) {
			up_AddMessage($gsFormError, $frm_cu_executive_offices->focal_person_id->FldErrMsg());
		}
		if (!up_CheckInteger($frm_cu_executive_offices->cu_sequence->FormValue)) {
			up_AddMessage($gsFormError, $frm_cu_executive_offices->cu_sequence->FldErrMsg());
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
		global $conn, $Language, $Security, $frm_cu_executive_offices;
		$rsnew = array();

		// focal_person_id
		$frm_cu_executive_offices->focal_person_id->SetDbValueDef($rsnew, $frm_cu_executive_offices->focal_person_id->CurrentValue, NULL, FALSE);

		// cu_sequence
		$frm_cu_executive_offices->cu_sequence->SetDbValueDef($rsnew, $frm_cu_executive_offices->cu_sequence->CurrentValue, NULL, FALSE);

		// cu_short_name
		$frm_cu_executive_offices->cu_short_name->SetDbValueDef($rsnew, $frm_cu_executive_offices->cu_short_name->CurrentValue, NULL, FALSE);

		// focal_person_office
		$frm_cu_executive_offices->focal_person_office->SetDbValueDef($rsnew, $frm_cu_executive_offices->focal_person_office->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_cu_executive_offices->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_cu_executive_offices->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_cu_executive_offices->CancelMessage <> "") {
				$this->setFailureMessage($frm_cu_executive_offices->CancelMessage);
				$frm_cu_executive_offices->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$frm_cu_executive_offices->cu_id->setDbValue($conn->Insert_ID());
			$rsnew['cu_id'] = $frm_cu_executive_offices->cu_id->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$frm_cu_executive_offices->Row_Inserted($rs, $rsnew);
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
