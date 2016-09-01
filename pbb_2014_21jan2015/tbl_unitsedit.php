<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "tbl_unitsinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_units_edit = new ctbl_units_edit();
$Page =& $tbl_units_edit;

// Page init
$tbl_units_edit->Page_Init();

// Page main
$tbl_units_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_units_edit = new up_Page("tbl_units_edit");

// page properties
tbl_units_edit.PageID = "edit"; // page ID
tbl_units_edit.FormID = "ftbl_unitsedit"; // form ID
var UP_PAGE_ID = tbl_units_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_units_edit.ValidateForm = function(fobj) {
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
tbl_units_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_units_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_units_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_units_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_units->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_units->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_units_edit->ShowPageHeader(); ?>
<?php
$tbl_units_edit->ShowMessage();
?>
<form name="ftbl_unitsedit" id="ftbl_unitsedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return tbl_units_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="tbl_units">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_units->unit_bo->Visible) { // unit_bo ?>
	<tr id="r_unit_bo"<?php echo $tbl_units->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_units->unit_bo->FldCaption() ?></td>
		<td<?php echo $tbl_units->unit_bo->CellAttributes() ?>><span id="el_unit_bo">
<input type="text" name="x_unit_bo" id="x_unit_bo" size="30" maxlength="255" value="<?php echo $tbl_units->unit_bo->EditValue ?>"<?php echo $tbl_units->unit_bo->EditAttributes() ?>>
</span><?php echo $tbl_units->unit_bo->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_units->unit_cu->Visible) { // unit_cu ?>
	<tr id="r_unit_cu"<?php echo $tbl_units->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_units->unit_cu->FldCaption() ?></td>
		<td<?php echo $tbl_units->unit_cu->CellAttributes() ?>><span id="el_unit_cu">
<input type="text" name="x_unit_cu" id="x_unit_cu" size="30" maxlength="255" value="<?php echo $tbl_units->unit_cu->EditValue ?>"<?php echo $tbl_units->unit_cu->EditAttributes() ?>>
</span><?php echo $tbl_units->unit_cu->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_units->cu->Visible) { // cu ?>
	<tr id="r_cu"<?php echo $tbl_units->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_units->cu->FldCaption() ?></td>
		<td<?php echo $tbl_units->cu->CellAttributes() ?>><span id="el_cu">
<input type="text" name="x_cu" id="x_cu" size="30" maxlength="6" value="<?php echo $tbl_units->cu->EditValue ?>"<?php echo $tbl_units->cu->EditAttributes() ?>>
</span><?php echo $tbl_units->cu->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_id" id="x_id" value="<?php echo up_HtmlEncode($tbl_units->id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$tbl_units_edit->ShowPageFooter();
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
$tbl_units_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_units_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'tbl_units';

	// Page object name
	var $PageObjName = 'tbl_units_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_units;
		if ($tbl_units->UseTokenInUrl) $PageUrl .= "t=" . $tbl_units->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_units;
		if ($tbl_units->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_units->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_units->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_units_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_units)
		if (!isset($GLOBALS["tbl_units"])) {
			$GLOBALS["tbl_units"] = new ctbl_units();
			$GLOBALS["Table"] =& $GLOBALS["tbl_units"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_units', TRUE);

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
		global $tbl_units;

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
			$this->Page_Terminate("tbl_unitslist.php");
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
		global $objForm, $Language, $gsFormError, $tbl_units;

		// Load key from QueryString
		if (@$_GET["id"] <> "")
			$tbl_units->id->setQueryStringValue($_GET["id"]);
		if (@$_POST["a_edit"] <> "") {
			$tbl_units->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$tbl_units->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$tbl_units->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$tbl_units->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($tbl_units->id->CurrentValue == "")
			$this->Page_Terminate("tbl_unitslist.php"); // Invalid key, return to list
		switch ($tbl_units->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("tbl_unitslist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$tbl_units->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $tbl_units->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$tbl_units->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$tbl_units->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$tbl_units->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_units;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_units;
		if (!$tbl_units->unit_bo->FldIsDetailKey) {
			$tbl_units->unit_bo->setFormValue($objForm->GetValue("x_unit_bo"));
		}
		if (!$tbl_units->unit_cu->FldIsDetailKey) {
			$tbl_units->unit_cu->setFormValue($objForm->GetValue("x_unit_cu"));
		}
		if (!$tbl_units->cu->FldIsDetailKey) {
			$tbl_units->cu->setFormValue($objForm->GetValue("x_cu"));
		}
		if (!$tbl_units->id->FldIsDetailKey)
			$tbl_units->id->setFormValue($objForm->GetValue("x_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_units;
		$this->LoadRow();
		$tbl_units->id->CurrentValue = $tbl_units->id->FormValue;
		$tbl_units->unit_bo->CurrentValue = $tbl_units->unit_bo->FormValue;
		$tbl_units->unit_cu->CurrentValue = $tbl_units->unit_cu->FormValue;
		$tbl_units->cu->CurrentValue = $tbl_units->cu->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_units;
		$sFilter = $tbl_units->KeyFilter();

		// Call Row Selecting event
		$tbl_units->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_units->CurrentFilter = $sFilter;
		$sSql = $tbl_units->SQL();
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
		global $conn, $tbl_units;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_units->Row_Selected($row);
		$tbl_units->id->setDbValue($rs->fields('id'));
		$tbl_units->unit_bo->setDbValue($rs->fields('unit_bo'));
		$tbl_units->unit_cu->setDbValue($rs->fields('unit_cu'));
		$tbl_units->cu->setDbValue($rs->fields('cu'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_units;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_units->Row_Rendering();

		// Common render codes for all row types
		// id
		// unit_bo
		// unit_cu
		// cu

		if ($tbl_units->RowType == UP_ROWTYPE_VIEW) { // View row

			// unit_bo
			$tbl_units->unit_bo->ViewValue = $tbl_units->unit_bo->CurrentValue;
			$tbl_units->unit_bo->ViewCustomAttributes = "";

			// unit_cu
			$tbl_units->unit_cu->ViewValue = $tbl_units->unit_cu->CurrentValue;
			$tbl_units->unit_cu->ViewCustomAttributes = "";

			// cu
			$tbl_units->cu->ViewValue = $tbl_units->cu->CurrentValue;
			$tbl_units->cu->ViewCustomAttributes = "";

			// unit_bo
			$tbl_units->unit_bo->LinkCustomAttributes = "";
			$tbl_units->unit_bo->HrefValue = "";
			$tbl_units->unit_bo->TooltipValue = "";

			// unit_cu
			$tbl_units->unit_cu->LinkCustomAttributes = "";
			$tbl_units->unit_cu->HrefValue = "";
			$tbl_units->unit_cu->TooltipValue = "";

			// cu
			$tbl_units->cu->LinkCustomAttributes = "";
			$tbl_units->cu->HrefValue = "";
			$tbl_units->cu->TooltipValue = "";
		} elseif ($tbl_units->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// unit_bo
			$tbl_units->unit_bo->EditCustomAttributes = "";
			$tbl_units->unit_bo->EditValue = up_HtmlEncode($tbl_units->unit_bo->CurrentValue);

			// unit_cu
			$tbl_units->unit_cu->EditCustomAttributes = "";
			$tbl_units->unit_cu->EditValue = up_HtmlEncode($tbl_units->unit_cu->CurrentValue);

			// cu
			$tbl_units->cu->EditCustomAttributes = "";
			$tbl_units->cu->EditValue = up_HtmlEncode($tbl_units->cu->CurrentValue);

			// Edit refer script
			// unit_bo

			$tbl_units->unit_bo->HrefValue = "";

			// unit_cu
			$tbl_units->unit_cu->HrefValue = "";

			// cu
			$tbl_units->cu->HrefValue = "";
		}
		if ($tbl_units->RowType == UP_ROWTYPE_ADD ||
			$tbl_units->RowType == UP_ROWTYPE_EDIT ||
			$tbl_units->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_units->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_units->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_units->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_units;

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
		global $conn, $Security, $Language, $tbl_units;
		$sFilter = $tbl_units->KeyFilter();
		$tbl_units->CurrentFilter = $sFilter;
		$sSql = $tbl_units->SQL();
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

			// unit_bo
			$tbl_units->unit_bo->SetDbValueDef($rsnew, $tbl_units->unit_bo->CurrentValue, NULL, $tbl_units->unit_bo->ReadOnly);

			// unit_cu
			$tbl_units->unit_cu->SetDbValueDef($rsnew, $tbl_units->unit_cu->CurrentValue, NULL, $tbl_units->unit_cu->ReadOnly);

			// cu
			$tbl_units->cu->SetDbValueDef($rsnew, $tbl_units->cu->CurrentValue, NULL, $tbl_units->cu->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $tbl_units->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($tbl_units->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_units->CancelMessage <> "") {
					$this->setFailureMessage($tbl_units->CancelMessage);
					$tbl_units->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_units->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_units';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $tbl_units;
		$table = 'tbl_units';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['id'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($tbl_units->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_units->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($tbl_units->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($tbl_units->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
