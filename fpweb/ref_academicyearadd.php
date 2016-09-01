<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_academicyearinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_academicyear_add = new cref_academicyear_add();
$Page =& $ref_academicyear_add;

// Page init
$ref_academicyear_add->Page_Init();

// Page main
$ref_academicyear_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_academicyear_add = new up_Page("ref_academicyear_add");

// page properties
ref_academicyear_add.PageID = "add"; // page ID
ref_academicyear_add.FormID = "fref_academicyearadd"; // form ID
var UP_PAGE_ID = ref_academicyear_add.PageID; // for backward compatibility

// extend page with ValidateForm function
ref_academicyear_add.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_academicYear_ay"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_academicyear->academicYear_ay->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_academicYear_sem"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_academicyear->academicYear_sem->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_academicYear_cutOffDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_academicyear->academicYear_cutOffDate->FldErrMsg()) ?>");

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
ref_academicyear_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_academicyear_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_academicyear_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_academicyear_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_academicyear->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_academicyear->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_academicyear_add->ShowPageHeader(); ?>
<?php
$ref_academicyear_add->ShowMessage();
?>
<form name="fref_academicyearadd" id="fref_academicyearadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return ref_academicyear_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="ref_academicyear">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($ref_academicyear->academicYear_ay->Visible) { // academicYear_ay ?>
	<tr id="r_academicYear_ay"<?php echo $ref_academicyear->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_academicyear->academicYear_ay->FldCaption() ?></td>
		<td<?php echo $ref_academicyear->academicYear_ay->CellAttributes() ?>><span id="el_academicYear_ay">
<input type="text" name="x_academicYear_ay" id="x_academicYear_ay" size="30" value="<?php echo $ref_academicyear->academicYear_ay->EditValue ?>"<?php echo $ref_academicyear->academicYear_ay->EditAttributes() ?>>
</span><?php echo $ref_academicyear->academicYear_ay->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_academicyear->academicYear_sem->Visible) { // academicYear_sem ?>
	<tr id="r_academicYear_sem"<?php echo $ref_academicyear->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_academicyear->academicYear_sem->FldCaption() ?></td>
		<td<?php echo $ref_academicyear->academicYear_sem->CellAttributes() ?>><span id="el_academicYear_sem">
<input type="text" name="x_academicYear_sem" id="x_academicYear_sem" size="30" value="<?php echo $ref_academicyear->academicYear_sem->EditValue ?>"<?php echo $ref_academicyear->academicYear_sem->EditAttributes() ?>>
</span><?php echo $ref_academicyear->academicYear_sem->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_academicyear->academicYear_cutOffDate->Visible) { // academicYear_cutOffDate ?>
	<tr id="r_academicYear_cutOffDate"<?php echo $ref_academicyear->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_academicyear->academicYear_cutOffDate->FldCaption() ?></td>
		<td<?php echo $ref_academicyear->academicYear_cutOffDate->CellAttributes() ?>><span id="el_academicYear_cutOffDate">
<input type="text" name="x_academicYear_cutOffDate" id="x_academicYear_cutOffDate" value="<?php echo $ref_academicyear->academicYear_cutOffDate->EditValue ?>"<?php echo $ref_academicyear->academicYear_cutOffDate->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x_academicYear_cutOffDate" name="cal_x_academicYear_cutOffDate" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_academicYear_cutOffDate", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x_academicYear_cutOffDate" // button id
});
</script>
</span><?php echo $ref_academicyear->academicYear_cutOffDate->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$ref_academicyear_add->ShowPageFooter();
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
$ref_academicyear_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_academicyear_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'ref_academicyear';

	// Page object name
	var $PageObjName = 'ref_academicyear_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_academicyear;
		if ($ref_academicyear->UseTokenInUrl) $PageUrl .= "t=" . $ref_academicyear->TableVar . "&"; // Add page token
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
		global $objForm, $ref_academicyear;
		if ($ref_academicyear->UseTokenInUrl) {
			if ($objForm)
				return ($ref_academicyear->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_academicyear->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_academicyear_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_academicyear)
		if (!isset($GLOBALS["ref_academicyear"])) {
			$GLOBALS["ref_academicyear"] = new cref_academicyear();
			$GLOBALS["Table"] =& $GLOBALS["ref_academicyear"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_academicyear', TRUE);

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
		global $ref_academicyear;

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
			$this->Page_Terminate("ref_academicyearlist.php");
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
		global $objForm, $Language, $gsFormError, $ref_academicyear;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$ref_academicyear->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$ref_academicyear->CurrentAction = "I"; // Form error, reset action
				$ref_academicyear->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["academicYear_ID"] != "") {
				$ref_academicyear->academicYear_ID->setQueryStringValue($_GET["academicYear_ID"]);
				$ref_academicyear->setKey("academicYear_ID", $ref_academicyear->academicYear_ID->CurrentValue); // Set up key
			} else {
				$ref_academicyear->setKey("academicYear_ID", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$ref_academicyear->CurrentAction = "C"; // Copy record
			} else {
				$ref_academicyear->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($ref_academicyear->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("ref_academicyearlist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$ref_academicyear->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $ref_academicyear->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "ref_academicyearview.php")
						$sReturnUrl = $ref_academicyear->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$ref_academicyear->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$ref_academicyear->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$ref_academicyear->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $ref_academicyear;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $ref_academicyear;
		$ref_academicyear->academicYear_ay->CurrentValue = NULL;
		$ref_academicyear->academicYear_ay->OldValue = $ref_academicyear->academicYear_ay->CurrentValue;
		$ref_academicyear->academicYear_sem->CurrentValue = NULL;
		$ref_academicyear->academicYear_sem->OldValue = $ref_academicyear->academicYear_sem->CurrentValue;
		$ref_academicyear->academicYear_cutOffDate->CurrentValue = NULL;
		$ref_academicyear->academicYear_cutOffDate->OldValue = $ref_academicyear->academicYear_cutOffDate->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $ref_academicyear;
		if (!$ref_academicyear->academicYear_ay->FldIsDetailKey) {
			$ref_academicyear->academicYear_ay->setFormValue($objForm->GetValue("x_academicYear_ay"));
		}
		if (!$ref_academicyear->academicYear_sem->FldIsDetailKey) {
			$ref_academicyear->academicYear_sem->setFormValue($objForm->GetValue("x_academicYear_sem"));
		}
		if (!$ref_academicyear->academicYear_cutOffDate->FldIsDetailKey) {
			$ref_academicyear->academicYear_cutOffDate->setFormValue($objForm->GetValue("x_academicYear_cutOffDate"));
			$ref_academicyear->academicYear_cutOffDate->CurrentValue = up_UnFormatDateTime($ref_academicyear->academicYear_cutOffDate->CurrentValue, 6);
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $ref_academicyear;
		$this->LoadOldRecord();
		$ref_academicyear->academicYear_ay->CurrentValue = $ref_academicyear->academicYear_ay->FormValue;
		$ref_academicyear->academicYear_sem->CurrentValue = $ref_academicyear->academicYear_sem->FormValue;
		$ref_academicyear->academicYear_cutOffDate->CurrentValue = $ref_academicyear->academicYear_cutOffDate->FormValue;
		$ref_academicyear->academicYear_cutOffDate->CurrentValue = up_UnFormatDateTime($ref_academicyear->academicYear_cutOffDate->CurrentValue, 6);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_academicyear;
		$sFilter = $ref_academicyear->KeyFilter();

		// Call Row Selecting event
		$ref_academicyear->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_academicyear->CurrentFilter = $sFilter;
		$sSql = $ref_academicyear->SQL();
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
		global $conn, $ref_academicyear;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_academicyear->Row_Selected($row);
		$ref_academicyear->academicYear_ID->setDbValue($rs->fields('academicYear_ID'));
		$ref_academicyear->academicYear_ay->setDbValue($rs->fields('academicYear_ay'));
		$ref_academicyear->academicYear_sem->setDbValue($rs->fields('academicYear_sem'));
		$ref_academicyear->academicYear_cutOffDate->setDbValue($rs->fields('academicYear_cutOffDate'));
		$ref_academicyear->academicYear_status->setDbValue($rs->fields('academicYear_status'));
	}

	// Load old record
	function LoadOldRecord() {
		global $ref_academicyear;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($ref_academicyear->getKey("academicYear_ID")) <> "")
			$ref_academicyear->academicYear_ID->CurrentValue = $ref_academicyear->getKey("academicYear_ID"); // academicYear_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$ref_academicyear->CurrentFilter = $ref_academicyear->KeyFilter();
			$sSql = $ref_academicyear->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_academicyear;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_academicyear->Row_Rendering();

		// Common render codes for all row types
		// academicYear_ID
		// academicYear_ay
		// academicYear_sem
		// academicYear_cutOffDate
		// academicYear_status

		if ($ref_academicyear->RowType == UP_ROWTYPE_VIEW) { // View row

			// academicYear_ay
			$ref_academicyear->academicYear_ay->ViewValue = $ref_academicyear->academicYear_ay->CurrentValue;
			$ref_academicyear->academicYear_ay->ViewCustomAttributes = "";

			// academicYear_sem
			$ref_academicyear->academicYear_sem->ViewValue = $ref_academicyear->academicYear_sem->CurrentValue;
			$ref_academicyear->academicYear_sem->ViewCustomAttributes = "";

			// academicYear_cutOffDate
			$ref_academicyear->academicYear_cutOffDate->ViewValue = $ref_academicyear->academicYear_cutOffDate->CurrentValue;
			$ref_academicyear->academicYear_cutOffDate->ViewValue = up_FormatDateTime($ref_academicyear->academicYear_cutOffDate->ViewValue, 6);
			$ref_academicyear->academicYear_cutOffDate->ViewCustomAttributes = "";

			// academicYear_ay
			$ref_academicyear->academicYear_ay->LinkCustomAttributes = "";
			$ref_academicyear->academicYear_ay->HrefValue = "";
			$ref_academicyear->academicYear_ay->TooltipValue = "";

			// academicYear_sem
			$ref_academicyear->academicYear_sem->LinkCustomAttributes = "";
			$ref_academicyear->academicYear_sem->HrefValue = "";
			$ref_academicyear->academicYear_sem->TooltipValue = "";

			// academicYear_cutOffDate
			$ref_academicyear->academicYear_cutOffDate->LinkCustomAttributes = "";
			$ref_academicyear->academicYear_cutOffDate->HrefValue = "";
			$ref_academicyear->academicYear_cutOffDate->TooltipValue = "";
		} elseif ($ref_academicyear->RowType == UP_ROWTYPE_ADD) { // Add row

			// academicYear_ay
			$ref_academicyear->academicYear_ay->EditCustomAttributes = "";
			$ref_academicyear->academicYear_ay->EditValue = up_HtmlEncode($ref_academicyear->academicYear_ay->CurrentValue);

			// academicYear_sem
			$ref_academicyear->academicYear_sem->EditCustomAttributes = "";
			$ref_academicyear->academicYear_sem->EditValue = up_HtmlEncode($ref_academicyear->academicYear_sem->CurrentValue);

			// academicYear_cutOffDate
			$ref_academicyear->academicYear_cutOffDate->EditCustomAttributes = "";
			$ref_academicyear->academicYear_cutOffDate->EditValue = up_HtmlEncode(up_FormatDateTime($ref_academicyear->academicYear_cutOffDate->CurrentValue, 6));

			// Edit refer script
			// academicYear_ay

			$ref_academicyear->academicYear_ay->HrefValue = "";

			// academicYear_sem
			$ref_academicyear->academicYear_sem->HrefValue = "";

			// academicYear_cutOffDate
			$ref_academicyear->academicYear_cutOffDate->HrefValue = "";
		}
		if ($ref_academicyear->RowType == UP_ROWTYPE_ADD ||
			$ref_academicyear->RowType == UP_ROWTYPE_EDIT ||
			$ref_academicyear->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$ref_academicyear->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($ref_academicyear->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_academicyear->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $ref_academicyear;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($ref_academicyear->academicYear_ay->FormValue)) {
			up_AddMessage($gsFormError, $ref_academicyear->academicYear_ay->FldErrMsg());
		}
		if (!up_CheckInteger($ref_academicyear->academicYear_sem->FormValue)) {
			up_AddMessage($gsFormError, $ref_academicyear->academicYear_sem->FldErrMsg());
		}
		if (!up_CheckUSDate($ref_academicyear->academicYear_cutOffDate->FormValue)) {
			up_AddMessage($gsFormError, $ref_academicyear->academicYear_cutOffDate->FldErrMsg());
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
		global $conn, $Language, $Security, $ref_academicyear;
		$rsnew = array();

		// academicYear_ay
		$ref_academicyear->academicYear_ay->SetDbValueDef($rsnew, $ref_academicyear->academicYear_ay->CurrentValue, NULL, FALSE);

		// academicYear_sem
		$ref_academicyear->academicYear_sem->SetDbValueDef($rsnew, $ref_academicyear->academicYear_sem->CurrentValue, NULL, FALSE);

		// academicYear_cutOffDate
		$ref_academicyear->academicYear_cutOffDate->SetDbValueDef($rsnew, up_UnFormatDateTime($ref_academicyear->academicYear_cutOffDate->CurrentValue, 6), NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $ref_academicyear->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($ref_academicyear->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($ref_academicyear->CancelMessage <> "") {
				$this->setFailureMessage($ref_academicyear->CancelMessage);
				$ref_academicyear->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$ref_academicyear->academicYear_ID->setDbValue($conn->Insert_ID());
			$rsnew['academicYear_ID'] = $ref_academicyear->academicYear_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$ref_academicyear->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_academicyear';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $ref_academicyear;
		$table = 'ref_academicyear';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['academicYear_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($ref_academicyear->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_academicyear->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($ref_academicyear->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
