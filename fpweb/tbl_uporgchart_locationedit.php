<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_uporgchart_locationinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_uporgchart_location_edit = new ctbl_uporgchart_location_edit();
$Page =& $tbl_uporgchart_location_edit;

// Page init
$tbl_uporgchart_location_edit->Page_Init();

// Page main
$tbl_uporgchart_location_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_uporgchart_location_edit = new up_Page("tbl_uporgchart_location_edit");

// page properties
tbl_uporgchart_location_edit.PageID = "edit"; // page ID
tbl_uporgchart_location_edit.FormID = "ftbl_uporgchart_locationedit"; // form ID
var UP_PAGE_ID = tbl_uporgchart_location_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_uporgchart_location_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_id"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_uporgchart_location->id->FldCaption()) ?>");

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
tbl_uporgchart_location_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_uporgchart_location_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_uporgchart_location_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_uporgchart_location_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_uporgchart_location->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_uporgchart_location->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_uporgchart_location_edit->ShowPageHeader(); ?>
<?php
$tbl_uporgchart_location_edit->ShowMessage();
?>
<form name="ftbl_uporgchart_locationedit" id="ftbl_uporgchart_locationedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return tbl_uporgchart_location_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="tbl_uporgchart_location">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_uporgchart_location->id->Visible) { // id ?>
	<tr id="r_id"<?php echo $tbl_uporgchart_location->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_location->id->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_uporgchart_location->id->CellAttributes() ?>><span id="el_id">
<div<?php echo $tbl_uporgchart_location->id->ViewAttributes() ?>><?php echo $tbl_uporgchart_location->id->EditValue ?></div>
<input type="hidden" name="x_id" id="x_id" value="<?php echo up_HtmlEncode($tbl_uporgchart_location->id->CurrentValue) ?>">
</span><?php echo $tbl_uporgchart_location->id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_location->name->Visible) { // name ?>
	<tr id="r_name"<?php echo $tbl_uporgchart_location->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_location->name->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_location->name->CellAttributes() ?>><span id="el_name">
<input type="text" name="x_name" id="x_name" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_location->name->EditValue ?>"<?php echo $tbl_uporgchart_location->name->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_location->name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_location->address->Visible) { // address ?>
	<tr id="r_address"<?php echo $tbl_uporgchart_location->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_location->address->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_location->address->CellAttributes() ?>><span id="el_address">
<input type="text" name="x_address" id="x_address" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_location->address->EditValue ?>"<?php echo $tbl_uporgchart_location->address->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_location->address->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_location->region_id->Visible) { // region_id ?>
	<tr id="r_region_id"<?php echo $tbl_uporgchart_location->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_location->region_id->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_location->region_id->CellAttributes() ?>><span id="el_region_id">
<input type="text" name="x_region_id" id="x_region_id" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_location->region_id->EditValue ?>"<?php echo $tbl_uporgchart_location->region_id->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_location->region_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_location->zip_code->Visible) { // zip_code ?>
	<tr id="r_zip_code"<?php echo $tbl_uporgchart_location->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_location->zip_code->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_location->zip_code->CellAttributes() ?>><span id="el_zip_code">
<input type="text" name="x_zip_code" id="x_zip_code" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_location->zip_code->EditValue ?>"<?php echo $tbl_uporgchart_location->zip_code->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_location->zip_code->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_location->inst_code->Visible) { // inst_code ?>
	<tr id="r_inst_code"<?php echo $tbl_uporgchart_location->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_location->inst_code->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_location->inst_code->CellAttributes() ?>><span id="el_inst_code">
<input type="text" name="x_inst_code" id="x_inst_code" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_location->inst_code->EditValue ?>"<?php echo $tbl_uporgchart_location->inst_code->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_location->inst_code->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$tbl_uporgchart_location_edit->ShowPageFooter();
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
$tbl_uporgchart_location_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_uporgchart_location_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'tbl_uporgchart_location';

	// Page object name
	var $PageObjName = 'tbl_uporgchart_location_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_uporgchart_location;
		if ($tbl_uporgchart_location->UseTokenInUrl) $PageUrl .= "t=" . $tbl_uporgchart_location->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_uporgchart_location;
		if ($tbl_uporgchart_location->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_uporgchart_location->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_uporgchart_location->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_uporgchart_location_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_uporgchart_location)
		if (!isset($GLOBALS["tbl_uporgchart_location"])) {
			$GLOBALS["tbl_uporgchart_location"] = new ctbl_uporgchart_location();
			$GLOBALS["Table"] =& $GLOBALS["tbl_uporgchart_location"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_uporgchart_location', TRUE);

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
		global $tbl_uporgchart_location;

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
			$this->Page_Terminate("tbl_uporgchart_locationlist.php");
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
		global $objForm, $Language, $gsFormError, $tbl_uporgchart_location;

		// Load key from QueryString
		if (@$_GET["id"] <> "")
			$tbl_uporgchart_location->id->setQueryStringValue($_GET["id"]);
		if (@$_POST["a_edit"] <> "") {
			$tbl_uporgchart_location->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$tbl_uporgchart_location->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$tbl_uporgchart_location->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$tbl_uporgchart_location->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($tbl_uporgchart_location->id->CurrentValue == "")
			$this->Page_Terminate("tbl_uporgchart_locationlist.php"); // Invalid key, return to list
		switch ($tbl_uporgchart_location->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("tbl_uporgchart_locationlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$tbl_uporgchart_location->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $tbl_uporgchart_location->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$tbl_uporgchart_location->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$tbl_uporgchart_location->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$tbl_uporgchart_location->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_uporgchart_location;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_uporgchart_location;
		if (!$tbl_uporgchart_location->id->FldIsDetailKey) {
			$tbl_uporgchart_location->id->setFormValue($objForm->GetValue("x_id"));
		}
		if (!$tbl_uporgchart_location->name->FldIsDetailKey) {
			$tbl_uporgchart_location->name->setFormValue($objForm->GetValue("x_name"));
		}
		if (!$tbl_uporgchart_location->address->FldIsDetailKey) {
			$tbl_uporgchart_location->address->setFormValue($objForm->GetValue("x_address"));
		}
		if (!$tbl_uporgchart_location->region_id->FldIsDetailKey) {
			$tbl_uporgchart_location->region_id->setFormValue($objForm->GetValue("x_region_id"));
		}
		if (!$tbl_uporgchart_location->zip_code->FldIsDetailKey) {
			$tbl_uporgchart_location->zip_code->setFormValue($objForm->GetValue("x_zip_code"));
		}
		if (!$tbl_uporgchart_location->inst_code->FldIsDetailKey) {
			$tbl_uporgchart_location->inst_code->setFormValue($objForm->GetValue("x_inst_code"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_uporgchart_location;
		$this->LoadRow();
		$tbl_uporgchart_location->id->CurrentValue = $tbl_uporgchart_location->id->FormValue;
		$tbl_uporgchart_location->name->CurrentValue = $tbl_uporgchart_location->name->FormValue;
		$tbl_uporgchart_location->address->CurrentValue = $tbl_uporgchart_location->address->FormValue;
		$tbl_uporgchart_location->region_id->CurrentValue = $tbl_uporgchart_location->region_id->FormValue;
		$tbl_uporgchart_location->zip_code->CurrentValue = $tbl_uporgchart_location->zip_code->FormValue;
		$tbl_uporgchart_location->inst_code->CurrentValue = $tbl_uporgchart_location->inst_code->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_uporgchart_location;
		$sFilter = $tbl_uporgchart_location->KeyFilter();

		// Call Row Selecting event
		$tbl_uporgchart_location->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_uporgchart_location->CurrentFilter = $sFilter;
		$sSql = $tbl_uporgchart_location->SQL();
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
		global $conn, $tbl_uporgchart_location;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_uporgchart_location->Row_Selected($row);
		$tbl_uporgchart_location->id->setDbValue($rs->fields('id'));
		$tbl_uporgchart_location->name->setDbValue($rs->fields('name'));
		$tbl_uporgchart_location->address->setDbValue($rs->fields('address'));
		$tbl_uporgchart_location->region_id->setDbValue($rs->fields('region_id'));
		$tbl_uporgchart_location->zip_code->setDbValue($rs->fields('zip_code'));
		$tbl_uporgchart_location->inst_code->setDbValue($rs->fields('inst_code'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_uporgchart_location;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_uporgchart_location->Row_Rendering();

		// Common render codes for all row types
		// id
		// name
		// address
		// region_id
		// zip_code
		// inst_code

		if ($tbl_uporgchart_location->RowType == UP_ROWTYPE_VIEW) { // View row

			// id
			$tbl_uporgchart_location->id->ViewValue = $tbl_uporgchart_location->id->CurrentValue;
			$tbl_uporgchart_location->id->ViewCustomAttributes = "";

			// name
			$tbl_uporgchart_location->name->ViewValue = $tbl_uporgchart_location->name->CurrentValue;
			$tbl_uporgchart_location->name->ViewCustomAttributes = "";

			// address
			$tbl_uporgchart_location->address->ViewValue = $tbl_uporgchart_location->address->CurrentValue;
			$tbl_uporgchart_location->address->ViewCustomAttributes = "";

			// region_id
			$tbl_uporgchart_location->region_id->ViewValue = $tbl_uporgchart_location->region_id->CurrentValue;
			$tbl_uporgchart_location->region_id->ViewCustomAttributes = "";

			// zip_code
			$tbl_uporgchart_location->zip_code->ViewValue = $tbl_uporgchart_location->zip_code->CurrentValue;
			$tbl_uporgchart_location->zip_code->ViewCustomAttributes = "";

			// inst_code
			$tbl_uporgchart_location->inst_code->ViewValue = $tbl_uporgchart_location->inst_code->CurrentValue;
			$tbl_uporgchart_location->inst_code->ViewCustomAttributes = "";

			// id
			$tbl_uporgchart_location->id->LinkCustomAttributes = "";
			$tbl_uporgchart_location->id->HrefValue = "";
			$tbl_uporgchart_location->id->TooltipValue = "";

			// name
			$tbl_uporgchart_location->name->LinkCustomAttributes = "";
			$tbl_uporgchart_location->name->HrefValue = "";
			$tbl_uporgchart_location->name->TooltipValue = "";

			// address
			$tbl_uporgchart_location->address->LinkCustomAttributes = "";
			$tbl_uporgchart_location->address->HrefValue = "";
			$tbl_uporgchart_location->address->TooltipValue = "";

			// region_id
			$tbl_uporgchart_location->region_id->LinkCustomAttributes = "";
			$tbl_uporgchart_location->region_id->HrefValue = "";
			$tbl_uporgchart_location->region_id->TooltipValue = "";

			// zip_code
			$tbl_uporgchart_location->zip_code->LinkCustomAttributes = "";
			$tbl_uporgchart_location->zip_code->HrefValue = "";
			$tbl_uporgchart_location->zip_code->TooltipValue = "";

			// inst_code
			$tbl_uporgchart_location->inst_code->LinkCustomAttributes = "";
			$tbl_uporgchart_location->inst_code->HrefValue = "";
			$tbl_uporgchart_location->inst_code->TooltipValue = "";
		} elseif ($tbl_uporgchart_location->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// id
			$tbl_uporgchart_location->id->EditCustomAttributes = "";
			$tbl_uporgchart_location->id->EditValue = $tbl_uporgchart_location->id->CurrentValue;
			$tbl_uporgchart_location->id->ViewCustomAttributes = "";

			// name
			$tbl_uporgchart_location->name->EditCustomAttributes = "";
			$tbl_uporgchart_location->name->EditValue = up_HtmlEncode($tbl_uporgchart_location->name->CurrentValue);

			// address
			$tbl_uporgchart_location->address->EditCustomAttributes = "";
			$tbl_uporgchart_location->address->EditValue = up_HtmlEncode($tbl_uporgchart_location->address->CurrentValue);

			// region_id
			$tbl_uporgchart_location->region_id->EditCustomAttributes = "";
			$tbl_uporgchart_location->region_id->EditValue = up_HtmlEncode($tbl_uporgchart_location->region_id->CurrentValue);

			// zip_code
			$tbl_uporgchart_location->zip_code->EditCustomAttributes = "";
			$tbl_uporgchart_location->zip_code->EditValue = up_HtmlEncode($tbl_uporgchart_location->zip_code->CurrentValue);

			// inst_code
			$tbl_uporgchart_location->inst_code->EditCustomAttributes = "";
			$tbl_uporgchart_location->inst_code->EditValue = up_HtmlEncode($tbl_uporgchart_location->inst_code->CurrentValue);

			// Edit refer script
			// id

			$tbl_uporgchart_location->id->HrefValue = "";

			// name
			$tbl_uporgchart_location->name->HrefValue = "";

			// address
			$tbl_uporgchart_location->address->HrefValue = "";

			// region_id
			$tbl_uporgchart_location->region_id->HrefValue = "";

			// zip_code
			$tbl_uporgchart_location->zip_code->HrefValue = "";

			// inst_code
			$tbl_uporgchart_location->inst_code->HrefValue = "";
		}
		if ($tbl_uporgchart_location->RowType == UP_ROWTYPE_ADD ||
			$tbl_uporgchart_location->RowType == UP_ROWTYPE_EDIT ||
			$tbl_uporgchart_location->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_uporgchart_location->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_uporgchart_location->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_uporgchart_location->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_uporgchart_location;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($tbl_uporgchart_location->id->FormValue) && $tbl_uporgchart_location->id->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_uporgchart_location->id->FldCaption());
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

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $tbl_uporgchart_location;
		$sFilter = $tbl_uporgchart_location->KeyFilter();
		$tbl_uporgchart_location->CurrentFilter = $sFilter;
		$sSql = $tbl_uporgchart_location->SQL();
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

			// id
			// name

			$tbl_uporgchart_location->name->SetDbValueDef($rsnew, $tbl_uporgchart_location->name->CurrentValue, NULL, $tbl_uporgchart_location->name->ReadOnly);

			// address
			$tbl_uporgchart_location->address->SetDbValueDef($rsnew, $tbl_uporgchart_location->address->CurrentValue, NULL, $tbl_uporgchart_location->address->ReadOnly);

			// region_id
			$tbl_uporgchart_location->region_id->SetDbValueDef($rsnew, $tbl_uporgchart_location->region_id->CurrentValue, NULL, $tbl_uporgchart_location->region_id->ReadOnly);

			// zip_code
			$tbl_uporgchart_location->zip_code->SetDbValueDef($rsnew, $tbl_uporgchart_location->zip_code->CurrentValue, NULL, $tbl_uporgchart_location->zip_code->ReadOnly);

			// inst_code
			$tbl_uporgchart_location->inst_code->SetDbValueDef($rsnew, $tbl_uporgchart_location->inst_code->CurrentValue, NULL, $tbl_uporgchart_location->inst_code->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $tbl_uporgchart_location->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($tbl_uporgchart_location->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_uporgchart_location->CancelMessage <> "") {
					$this->setFailureMessage($tbl_uporgchart_location->CancelMessage);
					$tbl_uporgchart_location->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_uporgchart_location->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_uporgchart_location';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $tbl_uporgchart_location;
		$table = 'tbl_uporgchart_location';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['id'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($tbl_uporgchart_location->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_uporgchart_location->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($tbl_uporgchart_location->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($tbl_uporgchart_location->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
