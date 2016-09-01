<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_degreelevel_facultyinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_degreelevel_faculty_add = new cref_degreelevel_faculty_add();
$Page =& $ref_degreelevel_faculty_add;

// Page init
$ref_degreelevel_faculty_add->Page_Init();

// Page main
$ref_degreelevel_faculty_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_degreelevel_faculty_add = new up_Page("ref_degreelevel_faculty_add");

// page properties
ref_degreelevel_faculty_add.PageID = "add"; // page ID
ref_degreelevel_faculty_add.FormID = "fref_degreelevel_facultyadd"; // form ID
var UP_PAGE_ID = ref_degreelevel_faculty_add.PageID; // for backward compatibility

// extend page with ValidateForm function
ref_degreelevel_faculty_add.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";

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
ref_degreelevel_faculty_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_degreelevel_faculty_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_degreelevel_faculty_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_degreelevel_faculty_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_degreelevel_faculty->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_degreelevel_faculty->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_degreelevel_faculty_add->ShowPageHeader(); ?>
<?php
$ref_degreelevel_faculty_add->ShowMessage();
?>
<form name="fref_degreelevel_facultyadd" id="fref_degreelevel_facultyadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return ref_degreelevel_faculty_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="ref_degreelevel_faculty">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($ref_degreelevel_faculty->degreelevelFaculty_name->Visible) { // degreelevelFaculty_name ?>
	<tr id="r_degreelevelFaculty_name"<?php echo $ref_degreelevel_faculty->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_degreelevel_faculty->degreelevelFaculty_name->FldCaption() ?></td>
		<td<?php echo $ref_degreelevel_faculty->degreelevelFaculty_name->CellAttributes() ?>><span id="el_degreelevelFaculty_name">
<input type="text" name="x_degreelevelFaculty_name" id="x_degreelevelFaculty_name" size="30" maxlength="255" value="<?php echo $ref_degreelevel_faculty->degreelevelFaculty_name->EditValue ?>"<?php echo $ref_degreelevel_faculty->degreelevelFaculty_name->EditAttributes() ?>>
</span><?php echo $ref_degreelevel_faculty->degreelevelFaculty_name->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$ref_degreelevel_faculty_add->ShowPageFooter();
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
$ref_degreelevel_faculty_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_degreelevel_faculty_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'ref_degreelevel_faculty';

	// Page object name
	var $PageObjName = 'ref_degreelevel_faculty_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_degreelevel_faculty;
		if ($ref_degreelevel_faculty->UseTokenInUrl) $PageUrl .= "t=" . $ref_degreelevel_faculty->TableVar . "&"; // Add page token
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
		global $objForm, $ref_degreelevel_faculty;
		if ($ref_degreelevel_faculty->UseTokenInUrl) {
			if ($objForm)
				return ($ref_degreelevel_faculty->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_degreelevel_faculty->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_degreelevel_faculty_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_degreelevel_faculty)
		if (!isset($GLOBALS["ref_degreelevel_faculty"])) {
			$GLOBALS["ref_degreelevel_faculty"] = new cref_degreelevel_faculty();
			$GLOBALS["Table"] =& $GLOBALS["ref_degreelevel_faculty"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_degreelevel_faculty', TRUE);

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
		global $ref_degreelevel_faculty;

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
			$this->Page_Terminate("ref_degreelevel_facultylist.php");
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
		global $objForm, $Language, $gsFormError, $ref_degreelevel_faculty;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$ref_degreelevel_faculty->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$ref_degreelevel_faculty->CurrentAction = "I"; // Form error, reset action
				$ref_degreelevel_faculty->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["degreelevelFaculty_ID"] != "") {
				$ref_degreelevel_faculty->degreelevelFaculty_ID->setQueryStringValue($_GET["degreelevelFaculty_ID"]);
				$ref_degreelevel_faculty->setKey("degreelevelFaculty_ID", $ref_degreelevel_faculty->degreelevelFaculty_ID->CurrentValue); // Set up key
			} else {
				$ref_degreelevel_faculty->setKey("degreelevelFaculty_ID", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$ref_degreelevel_faculty->CurrentAction = "C"; // Copy record
			} else {
				$ref_degreelevel_faculty->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($ref_degreelevel_faculty->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("ref_degreelevel_facultylist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$ref_degreelevel_faculty->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $ref_degreelevel_faculty->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "ref_degreelevel_facultyview.php")
						$sReturnUrl = $ref_degreelevel_faculty->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$ref_degreelevel_faculty->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$ref_degreelevel_faculty->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$ref_degreelevel_faculty->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $ref_degreelevel_faculty;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $ref_degreelevel_faculty;
		$ref_degreelevel_faculty->degreelevelFaculty_name->CurrentValue = NULL;
		$ref_degreelevel_faculty->degreelevelFaculty_name->OldValue = $ref_degreelevel_faculty->degreelevelFaculty_name->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $ref_degreelevel_faculty;
		if (!$ref_degreelevel_faculty->degreelevelFaculty_name->FldIsDetailKey) {
			$ref_degreelevel_faculty->degreelevelFaculty_name->setFormValue($objForm->GetValue("x_degreelevelFaculty_name"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $ref_degreelevel_faculty;
		$this->LoadOldRecord();
		$ref_degreelevel_faculty->degreelevelFaculty_name->CurrentValue = $ref_degreelevel_faculty->degreelevelFaculty_name->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_degreelevel_faculty;
		$sFilter = $ref_degreelevel_faculty->KeyFilter();

		// Call Row Selecting event
		$ref_degreelevel_faculty->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_degreelevel_faculty->CurrentFilter = $sFilter;
		$sSql = $ref_degreelevel_faculty->SQL();
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
		global $conn, $ref_degreelevel_faculty;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_degreelevel_faculty->Row_Selected($row);
		$ref_degreelevel_faculty->degreelevelFaculty_ID->setDbValue($rs->fields('degreelevelFaculty_ID'));
		$ref_degreelevel_faculty->degreelevelFaculty_name->setDbValue($rs->fields('degreelevelFaculty_name'));
	}

	// Load old record
	function LoadOldRecord() {
		global $ref_degreelevel_faculty;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($ref_degreelevel_faculty->getKey("degreelevelFaculty_ID")) <> "")
			$ref_degreelevel_faculty->degreelevelFaculty_ID->CurrentValue = $ref_degreelevel_faculty->getKey("degreelevelFaculty_ID"); // degreelevelFaculty_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$ref_degreelevel_faculty->CurrentFilter = $ref_degreelevel_faculty->KeyFilter();
			$sSql = $ref_degreelevel_faculty->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_degreelevel_faculty;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_degreelevel_faculty->Row_Rendering();

		// Common render codes for all row types
		// degreelevelFaculty_ID
		// degreelevelFaculty_name

		if ($ref_degreelevel_faculty->RowType == UP_ROWTYPE_VIEW) { // View row

			// degreelevelFaculty_name
			$ref_degreelevel_faculty->degreelevelFaculty_name->ViewValue = $ref_degreelevel_faculty->degreelevelFaculty_name->CurrentValue;
			$ref_degreelevel_faculty->degreelevelFaculty_name->ViewCustomAttributes = "";

			// degreelevelFaculty_name
			$ref_degreelevel_faculty->degreelevelFaculty_name->LinkCustomAttributes = "";
			$ref_degreelevel_faculty->degreelevelFaculty_name->HrefValue = "";
			$ref_degreelevel_faculty->degreelevelFaculty_name->TooltipValue = "";
		} elseif ($ref_degreelevel_faculty->RowType == UP_ROWTYPE_ADD) { // Add row

			// degreelevelFaculty_name
			$ref_degreelevel_faculty->degreelevelFaculty_name->EditCustomAttributes = "";
			$ref_degreelevel_faculty->degreelevelFaculty_name->EditValue = up_HtmlEncode($ref_degreelevel_faculty->degreelevelFaculty_name->CurrentValue);

			// Edit refer script
			// degreelevelFaculty_name

			$ref_degreelevel_faculty->degreelevelFaculty_name->HrefValue = "";
		}
		if ($ref_degreelevel_faculty->RowType == UP_ROWTYPE_ADD ||
			$ref_degreelevel_faculty->RowType == UP_ROWTYPE_EDIT ||
			$ref_degreelevel_faculty->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$ref_degreelevel_faculty->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($ref_degreelevel_faculty->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_degreelevel_faculty->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $ref_degreelevel_faculty;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");

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
		global $conn, $Language, $Security, $ref_degreelevel_faculty;
		$rsnew = array();

		// degreelevelFaculty_name
		$ref_degreelevel_faculty->degreelevelFaculty_name->SetDbValueDef($rsnew, $ref_degreelevel_faculty->degreelevelFaculty_name->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $ref_degreelevel_faculty->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($ref_degreelevel_faculty->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($ref_degreelevel_faculty->CancelMessage <> "") {
				$this->setFailureMessage($ref_degreelevel_faculty->CancelMessage);
				$ref_degreelevel_faculty->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$ref_degreelevel_faculty->degreelevelFaculty_ID->setDbValue($conn->Insert_ID());
			$rsnew['degreelevelFaculty_ID'] = $ref_degreelevel_faculty->degreelevelFaculty_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$ref_degreelevel_faculty->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_degreelevel_faculty';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $ref_degreelevel_faculty;
		$table = 'ref_degreelevel_faculty';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['degreelevelFaculty_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($ref_degreelevel_faculty->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_degreelevel_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($ref_degreelevel_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
