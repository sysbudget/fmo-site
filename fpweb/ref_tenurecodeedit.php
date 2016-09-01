<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_tenurecodeinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_tenurecode_edit = new cref_tenurecode_edit();
$Page =& $ref_tenurecode_edit;

// Page init
$ref_tenurecode_edit->Page_Init();

// Page main
$ref_tenurecode_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_tenurecode_edit = new up_Page("ref_tenurecode_edit");

// page properties
ref_tenurecode_edit.PageID = "edit"; // page ID
ref_tenurecode_edit.FormID = "fref_tenurecodeedit"; // form ID
var UP_PAGE_ID = ref_tenurecode_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
ref_tenurecode_edit.ValidateForm = function(fobj) {
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
ref_tenurecode_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_tenurecode_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_tenurecode_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_tenurecode_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_tenurecode->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_tenurecode->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_tenurecode_edit->ShowPageHeader(); ?>
<?php
$ref_tenurecode_edit->ShowMessage();
?>
<form name="fref_tenurecodeedit" id="fref_tenurecodeedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return ref_tenurecode_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="ref_tenurecode">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($ref_tenurecode->tenureCode_ID->Visible) { // tenureCode_ID ?>
	<tr id="r_tenureCode_ID"<?php echo $ref_tenurecode->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_tenurecode->tenureCode_ID->FldCaption() ?></td>
		<td<?php echo $ref_tenurecode->tenureCode_ID->CellAttributes() ?>><span id="el_tenureCode_ID">
<div<?php echo $ref_tenurecode->tenureCode_ID->ViewAttributes() ?>><?php echo $ref_tenurecode->tenureCode_ID->EditValue ?></div>
<input type="hidden" name="x_tenureCode_ID" id="x_tenureCode_ID" value="<?php echo up_HtmlEncode($ref_tenurecode->tenureCode_ID->CurrentValue) ?>">
</span><?php echo $ref_tenurecode->tenureCode_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_tenurecode->tenureCode_description->Visible) { // tenureCode_description ?>
	<tr id="r_tenureCode_description"<?php echo $ref_tenurecode->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_tenurecode->tenureCode_description->FldCaption() ?></td>
		<td<?php echo $ref_tenurecode->tenureCode_description->CellAttributes() ?>><span id="el_tenureCode_description">
<input type="text" name="x_tenureCode_description" id="x_tenureCode_description" size="30" maxlength="255" value="<?php echo $ref_tenurecode->tenureCode_description->EditValue ?>"<?php echo $ref_tenurecode->tenureCode_description->EditAttributes() ?>>
</span><?php echo $ref_tenurecode->tenureCode_description->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$ref_tenurecode_edit->ShowPageFooter();
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
$ref_tenurecode_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_tenurecode_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'ref_tenurecode';

	// Page object name
	var $PageObjName = 'ref_tenurecode_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_tenurecode;
		if ($ref_tenurecode->UseTokenInUrl) $PageUrl .= "t=" . $ref_tenurecode->TableVar . "&"; // Add page token
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
		global $objForm, $ref_tenurecode;
		if ($ref_tenurecode->UseTokenInUrl) {
			if ($objForm)
				return ($ref_tenurecode->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_tenurecode->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_tenurecode_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_tenurecode)
		if (!isset($GLOBALS["ref_tenurecode"])) {
			$GLOBALS["ref_tenurecode"] = new cref_tenurecode();
			$GLOBALS["Table"] =& $GLOBALS["ref_tenurecode"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_tenurecode', TRUE);

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
		global $ref_tenurecode;

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
			$this->Page_Terminate("ref_tenurecodelist.php");
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
	var $DbMasterFilter;
	var $DbDetailFilter;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $ref_tenurecode;

		// Load key from QueryString
		if (@$_GET["tenureCode_ID"] <> "")
			$ref_tenurecode->tenureCode_ID->setQueryStringValue($_GET["tenureCode_ID"]);
		if (@$_POST["a_edit"] <> "") {
			$ref_tenurecode->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$ref_tenurecode->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$ref_tenurecode->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$ref_tenurecode->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($ref_tenurecode->tenureCode_ID->CurrentValue == "")
			$this->Page_Terminate("ref_tenurecodelist.php"); // Invalid key, return to list
		switch ($ref_tenurecode->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("ref_tenurecodelist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$ref_tenurecode->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $ref_tenurecode->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$ref_tenurecode->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$ref_tenurecode->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$ref_tenurecode->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $ref_tenurecode;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $ref_tenurecode;
		if (!$ref_tenurecode->tenureCode_ID->FldIsDetailKey)
			$ref_tenurecode->tenureCode_ID->setFormValue($objForm->GetValue("x_tenureCode_ID"));
		if (!$ref_tenurecode->tenureCode_description->FldIsDetailKey) {
			$ref_tenurecode->tenureCode_description->setFormValue($objForm->GetValue("x_tenureCode_description"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $ref_tenurecode;
		$this->LoadRow();
		$ref_tenurecode->tenureCode_ID->CurrentValue = $ref_tenurecode->tenureCode_ID->FormValue;
		$ref_tenurecode->tenureCode_description->CurrentValue = $ref_tenurecode->tenureCode_description->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_tenurecode;
		$sFilter = $ref_tenurecode->KeyFilter();

		// Call Row Selecting event
		$ref_tenurecode->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_tenurecode->CurrentFilter = $sFilter;
		$sSql = $ref_tenurecode->SQL();
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
		global $conn, $ref_tenurecode;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_tenurecode->Row_Selected($row);
		$ref_tenurecode->tenureCode_ID->setDbValue($rs->fields('tenureCode_ID'));
		$ref_tenurecode->tenureCode_description->setDbValue($rs->fields('tenureCode_description'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_tenurecode;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_tenurecode->Row_Rendering();

		// Common render codes for all row types
		// tenureCode_ID
		// tenureCode_description

		if ($ref_tenurecode->RowType == UP_ROWTYPE_VIEW) { // View row

			// tenureCode_ID
			$ref_tenurecode->tenureCode_ID->ViewValue = $ref_tenurecode->tenureCode_ID->CurrentValue;
			$ref_tenurecode->tenureCode_ID->ViewCustomAttributes = "";

			// tenureCode_description
			$ref_tenurecode->tenureCode_description->ViewValue = $ref_tenurecode->tenureCode_description->CurrentValue;
			$ref_tenurecode->tenureCode_description->ViewCustomAttributes = "";

			// tenureCode_ID
			$ref_tenurecode->tenureCode_ID->LinkCustomAttributes = "";
			$ref_tenurecode->tenureCode_ID->HrefValue = "";
			$ref_tenurecode->tenureCode_ID->TooltipValue = "";

			// tenureCode_description
			$ref_tenurecode->tenureCode_description->LinkCustomAttributes = "";
			$ref_tenurecode->tenureCode_description->HrefValue = "";
			$ref_tenurecode->tenureCode_description->TooltipValue = "";
		} elseif ($ref_tenurecode->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// tenureCode_ID
			$ref_tenurecode->tenureCode_ID->EditCustomAttributes = "";
			$ref_tenurecode->tenureCode_ID->EditValue = $ref_tenurecode->tenureCode_ID->CurrentValue;
			$ref_tenurecode->tenureCode_ID->ViewCustomAttributes = "";

			// tenureCode_description
			$ref_tenurecode->tenureCode_description->EditCustomAttributes = "";
			$ref_tenurecode->tenureCode_description->EditValue = up_HtmlEncode($ref_tenurecode->tenureCode_description->CurrentValue);

			// Edit refer script
			// tenureCode_ID

			$ref_tenurecode->tenureCode_ID->HrefValue = "";

			// tenureCode_description
			$ref_tenurecode->tenureCode_description->HrefValue = "";
		}
		if ($ref_tenurecode->RowType == UP_ROWTYPE_ADD ||
			$ref_tenurecode->RowType == UP_ROWTYPE_EDIT ||
			$ref_tenurecode->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$ref_tenurecode->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($ref_tenurecode->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_tenurecode->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $ref_tenurecode;

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

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $ref_tenurecode;
		$sFilter = $ref_tenurecode->KeyFilter();
		$ref_tenurecode->CurrentFilter = $sFilter;
		$sSql = $ref_tenurecode->SQL();
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

			// tenureCode_description
			$ref_tenurecode->tenureCode_description->SetDbValueDef($rsnew, $ref_tenurecode->tenureCode_description->CurrentValue, NULL, $ref_tenurecode->tenureCode_description->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $ref_tenurecode->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($ref_tenurecode->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($ref_tenurecode->CancelMessage <> "") {
					$this->setFailureMessage($ref_tenurecode->CancelMessage);
					$ref_tenurecode->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$ref_tenurecode->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_tenurecode';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $ref_tenurecode;
		$table = 'ref_tenurecode';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['tenureCode_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($ref_tenurecode->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_tenurecode->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($ref_tenurecode->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($ref_tenurecode->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
