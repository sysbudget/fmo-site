<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_uporgchart_cuinfo.php" ?>
<?php include_once "tbl_uporgchart_unitinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "tbl_uporgchart_unitgridcls.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_uporgchart_cu_edit = new ctbl_uporgchart_cu_edit();
$Page =& $tbl_uporgchart_cu_edit;

// Page init
$tbl_uporgchart_cu_edit->Page_Init();

// Page main
$tbl_uporgchart_cu_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_uporgchart_cu_edit = new up_Page("tbl_uporgchart_cu_edit");

// page properties
tbl_uporgchart_cu_edit.PageID = "edit"; // page ID
tbl_uporgchart_cu_edit.FormID = "ftbl_uporgchart_cuedit"; // form ID
var UP_PAGE_ID = tbl_uporgchart_cu_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_uporgchart_cu_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_ID"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_uporgchart_cu->ID->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_ID"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_uporgchart_cu->ID->FldErrMsg()) ?>");

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
tbl_uporgchart_cu_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_uporgchart_cu_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_uporgchart_cu_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_uporgchart_cu_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_uporgchart_cu->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_uporgchart_cu->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_uporgchart_cu_edit->ShowPageHeader(); ?>
<?php
$tbl_uporgchart_cu_edit->ShowMessage();
?>
<form name="ftbl_uporgchart_cuedit" id="ftbl_uporgchart_cuedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return tbl_uporgchart_cu_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="tbl_uporgchart_cu">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_uporgchart_cu->ID->Visible) { // ID ?>
	<tr id="r_ID"<?php echo $tbl_uporgchart_cu->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_cu->ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_uporgchart_cu->ID->CellAttributes() ?>><span id="el_ID">
<div<?php echo $tbl_uporgchart_cu->ID->ViewAttributes() ?>><?php echo $tbl_uporgchart_cu->ID->EditValue ?></div>
<input type="hidden" name="x_ID" id="x_ID" value="<?php echo up_HtmlEncode($tbl_uporgchart_cu->ID->CurrentValue) ?>">
</span><?php echo $tbl_uporgchart_cu->ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_cu->code->Visible) { // code ?>
	<tr id="r_code"<?php echo $tbl_uporgchart_cu->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_cu->code->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_cu->code->CellAttributes() ?>><span id="el_code">
<input type="text" name="x_code" id="x_code" size="30" maxlength="1" value="<?php echo $tbl_uporgchart_cu->code->EditValue ?>"<?php echo $tbl_uporgchart_cu->code->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_cu->code->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_cu->shortName->Visible) { // shortName ?>
	<tr id="r_shortName"<?php echo $tbl_uporgchart_cu->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_cu->shortName->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_cu->shortName->CellAttributes() ?>><span id="el_shortName">
<input type="text" name="x_shortName" id="x_shortName" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_cu->shortName->EditValue ?>"<?php echo $tbl_uporgchart_cu->shortName->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_cu->shortName->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_cu->name->Visible) { // name ?>
	<tr id="r_name"<?php echo $tbl_uporgchart_cu->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_cu->name->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_cu->name->CellAttributes() ?>><span id="el_name">
<input type="text" name="x_name" id="x_name" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_cu->name->EditValue ?>"<?php echo $tbl_uporgchart_cu->name->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_cu->name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_cu->acronym->Visible) { // acronym ?>
	<tr id="r_acronym"<?php echo $tbl_uporgchart_cu->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_cu->acronym->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_cu->acronym->CellAttributes() ?>><span id="el_acronym">
<input type="text" name="x_acronym" id="x_acronym" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_cu->acronym->EditValue ?>"<?php echo $tbl_uporgchart_cu->acronym->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_cu->acronym->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_cu->address->Visible) { // address ?>
	<tr id="r_address"<?php echo $tbl_uporgchart_cu->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_cu->address->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_cu->address->CellAttributes() ?>><span id="el_address">
<input type="text" name="x_address" id="x_address" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_cu->address->EditValue ?>"<?php echo $tbl_uporgchart_cu->address->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_cu->address->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<?php if ($tbl_uporgchart_cu->getCurrentDetailTable() == "tbl_uporgchart_unit" && $tbl_uporgchart_unit->DetailEdit) { ?>
<br>
<?php include_once "tbl_uporgchart_unitgrid.php" ?>
<br>
<?php } ?>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$tbl_uporgchart_cu_edit->ShowPageFooter();
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
$tbl_uporgchart_cu_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_uporgchart_cu_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'tbl_uporgchart_cu';

	// Page object name
	var $PageObjName = 'tbl_uporgchart_cu_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_uporgchart_cu;
		if ($tbl_uporgchart_cu->UseTokenInUrl) $PageUrl .= "t=" . $tbl_uporgchart_cu->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_uporgchart_cu;
		if ($tbl_uporgchart_cu->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_uporgchart_cu->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_uporgchart_cu->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_uporgchart_cu_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_uporgchart_cu)
		if (!isset($GLOBALS["tbl_uporgchart_cu"])) {
			$GLOBALS["tbl_uporgchart_cu"] = new ctbl_uporgchart_cu();
			$GLOBALS["Table"] =& $GLOBALS["tbl_uporgchart_cu"];
		}

		// Table object (tbl_uporgchart_unit)
		if (!isset($GLOBALS['tbl_uporgchart_unit'])) $GLOBALS['tbl_uporgchart_unit'] = new ctbl_uporgchart_unit();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_uporgchart_cu', TRUE);

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
		global $tbl_uporgchart_cu;

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
			$this->Page_Terminate("tbl_uporgchart_culist.php");
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
		global $objForm, $Language, $gsFormError, $tbl_uporgchart_cu;

		// Load key from QueryString
		if (@$_GET["ID"] <> "")
			$tbl_uporgchart_cu->ID->setQueryStringValue($_GET["ID"]);
		if (@$_POST["a_edit"] <> "") {
			$tbl_uporgchart_cu->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Set up detail parameters
			$this->SetUpDetailParms();

			// Validate form
			if (!$this->ValidateForm()) {
				$tbl_uporgchart_cu->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$tbl_uporgchart_cu->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$tbl_uporgchart_cu->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($tbl_uporgchart_cu->ID->CurrentValue == "")
			$this->Page_Terminate("tbl_uporgchart_culist.php"); // Invalid key, return to list

		// Set up detail parameters
		$this->SetUpDetailParms();
		switch ($tbl_uporgchart_cu->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("tbl_uporgchart_culist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$tbl_uporgchart_cu->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					if ($tbl_uporgchart_cu->getCurrentDetailTable() <> "") // Master/detail edit
						$sReturnUrl = $tbl_uporgchart_cu->getDetailUrl();
					else
						$sReturnUrl = $tbl_uporgchart_cu->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$tbl_uporgchart_cu->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$tbl_uporgchart_cu->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$tbl_uporgchart_cu->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_uporgchart_cu;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_uporgchart_cu;
		if (!$tbl_uporgchart_cu->ID->FldIsDetailKey) {
			$tbl_uporgchart_cu->ID->setFormValue($objForm->GetValue("x_ID"));
		}
		if (!$tbl_uporgchart_cu->code->FldIsDetailKey) {
			$tbl_uporgchart_cu->code->setFormValue($objForm->GetValue("x_code"));
		}
		if (!$tbl_uporgchart_cu->shortName->FldIsDetailKey) {
			$tbl_uporgchart_cu->shortName->setFormValue($objForm->GetValue("x_shortName"));
		}
		if (!$tbl_uporgchart_cu->name->FldIsDetailKey) {
			$tbl_uporgchart_cu->name->setFormValue($objForm->GetValue("x_name"));
		}
		if (!$tbl_uporgchart_cu->acronym->FldIsDetailKey) {
			$tbl_uporgchart_cu->acronym->setFormValue($objForm->GetValue("x_acronym"));
		}
		if (!$tbl_uporgchart_cu->address->FldIsDetailKey) {
			$tbl_uporgchart_cu->address->setFormValue($objForm->GetValue("x_address"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_uporgchart_cu;
		$this->LoadRow();
		$tbl_uporgchart_cu->ID->CurrentValue = $tbl_uporgchart_cu->ID->FormValue;
		$tbl_uporgchart_cu->code->CurrentValue = $tbl_uporgchart_cu->code->FormValue;
		$tbl_uporgchart_cu->shortName->CurrentValue = $tbl_uporgchart_cu->shortName->FormValue;
		$tbl_uporgchart_cu->name->CurrentValue = $tbl_uporgchart_cu->name->FormValue;
		$tbl_uporgchart_cu->acronym->CurrentValue = $tbl_uporgchart_cu->acronym->FormValue;
		$tbl_uporgchart_cu->address->CurrentValue = $tbl_uporgchart_cu->address->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_uporgchart_cu;
		$sFilter = $tbl_uporgchart_cu->KeyFilter();

		// Call Row Selecting event
		$tbl_uporgchart_cu->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_uporgchart_cu->CurrentFilter = $sFilter;
		$sSql = $tbl_uporgchart_cu->SQL();
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
		global $conn, $tbl_uporgchart_cu;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_uporgchart_cu->Row_Selected($row);
		$tbl_uporgchart_cu->ID->setDbValue($rs->fields('ID'));
		$tbl_uporgchart_cu->code->setDbValue($rs->fields('code'));
		$tbl_uporgchart_cu->shortName->setDbValue($rs->fields('shortName'));
		$tbl_uporgchart_cu->name->setDbValue($rs->fields('name'));
		$tbl_uporgchart_cu->acronym->setDbValue($rs->fields('acronym'));
		$tbl_uporgchart_cu->address->setDbValue($rs->fields('address'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_uporgchart_cu;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_uporgchart_cu->Row_Rendering();

		// Common render codes for all row types
		// ID
		// code
		// shortName
		// name
		// acronym
		// address

		if ($tbl_uporgchart_cu->RowType == UP_ROWTYPE_VIEW) { // View row

			// ID
			$tbl_uporgchart_cu->ID->ViewValue = $tbl_uporgchart_cu->ID->CurrentValue;
			$tbl_uporgchart_cu->ID->ViewCustomAttributes = "";

			// code
			$tbl_uporgchart_cu->code->ViewValue = $tbl_uporgchart_cu->code->CurrentValue;
			$tbl_uporgchart_cu->code->ViewCustomAttributes = "";

			// shortName
			$tbl_uporgchart_cu->shortName->ViewValue = $tbl_uporgchart_cu->shortName->CurrentValue;
			$tbl_uporgchart_cu->shortName->ViewCustomAttributes = "";

			// name
			$tbl_uporgchart_cu->name->ViewValue = $tbl_uporgchart_cu->name->CurrentValue;
			$tbl_uporgchart_cu->name->ViewCustomAttributes = "";

			// acronym
			$tbl_uporgchart_cu->acronym->ViewValue = $tbl_uporgchart_cu->acronym->CurrentValue;
			$tbl_uporgchart_cu->acronym->ViewCustomAttributes = "";

			// address
			$tbl_uporgchart_cu->address->ViewValue = $tbl_uporgchart_cu->address->CurrentValue;
			$tbl_uporgchart_cu->address->ViewCustomAttributes = "";

			// ID
			$tbl_uporgchart_cu->ID->LinkCustomAttributes = "";
			$tbl_uporgchart_cu->ID->HrefValue = "";
			$tbl_uporgchart_cu->ID->TooltipValue = "";

			// code
			$tbl_uporgchart_cu->code->LinkCustomAttributes = "";
			$tbl_uporgchart_cu->code->HrefValue = "";
			$tbl_uporgchart_cu->code->TooltipValue = "";

			// shortName
			$tbl_uporgchart_cu->shortName->LinkCustomAttributes = "";
			$tbl_uporgchart_cu->shortName->HrefValue = "";
			$tbl_uporgchart_cu->shortName->TooltipValue = "";

			// name
			$tbl_uporgchart_cu->name->LinkCustomAttributes = "";
			$tbl_uporgchart_cu->name->HrefValue = "";
			$tbl_uporgchart_cu->name->TooltipValue = "";

			// acronym
			$tbl_uporgchart_cu->acronym->LinkCustomAttributes = "";
			$tbl_uporgchart_cu->acronym->HrefValue = "";
			$tbl_uporgchart_cu->acronym->TooltipValue = "";

			// address
			$tbl_uporgchart_cu->address->LinkCustomAttributes = "";
			$tbl_uporgchart_cu->address->HrefValue = "";
			$tbl_uporgchart_cu->address->TooltipValue = "";
		} elseif ($tbl_uporgchart_cu->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// ID
			$tbl_uporgchart_cu->ID->EditCustomAttributes = "";
			$tbl_uporgchart_cu->ID->EditValue = $tbl_uporgchart_cu->ID->CurrentValue;
			$tbl_uporgchart_cu->ID->ViewCustomAttributes = "";

			// code
			$tbl_uporgchart_cu->code->EditCustomAttributes = "";
			$tbl_uporgchart_cu->code->EditValue = up_HtmlEncode($tbl_uporgchart_cu->code->CurrentValue);

			// shortName
			$tbl_uporgchart_cu->shortName->EditCustomAttributes = "";
			$tbl_uporgchart_cu->shortName->EditValue = up_HtmlEncode($tbl_uporgchart_cu->shortName->CurrentValue);

			// name
			$tbl_uporgchart_cu->name->EditCustomAttributes = "";
			$tbl_uporgchart_cu->name->EditValue = up_HtmlEncode($tbl_uporgchart_cu->name->CurrentValue);

			// acronym
			$tbl_uporgchart_cu->acronym->EditCustomAttributes = "";
			$tbl_uporgchart_cu->acronym->EditValue = up_HtmlEncode($tbl_uporgchart_cu->acronym->CurrentValue);

			// address
			$tbl_uporgchart_cu->address->EditCustomAttributes = "";
			$tbl_uporgchart_cu->address->EditValue = up_HtmlEncode($tbl_uporgchart_cu->address->CurrentValue);

			// Edit refer script
			// ID

			$tbl_uporgchart_cu->ID->HrefValue = "";

			// code
			$tbl_uporgchart_cu->code->HrefValue = "";

			// shortName
			$tbl_uporgchart_cu->shortName->HrefValue = "";

			// name
			$tbl_uporgchart_cu->name->HrefValue = "";

			// acronym
			$tbl_uporgchart_cu->acronym->HrefValue = "";

			// address
			$tbl_uporgchart_cu->address->HrefValue = "";
		}
		if ($tbl_uporgchart_cu->RowType == UP_ROWTYPE_ADD ||
			$tbl_uporgchart_cu->RowType == UP_ROWTYPE_EDIT ||
			$tbl_uporgchart_cu->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_uporgchart_cu->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_uporgchart_cu->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_uporgchart_cu->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_uporgchart_cu;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($tbl_uporgchart_cu->ID->FormValue) && $tbl_uporgchart_cu->ID->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_uporgchart_cu->ID->FldCaption());
		}
		if (!up_CheckInteger($tbl_uporgchart_cu->ID->FormValue)) {
			up_AddMessage($gsFormError, $tbl_uporgchart_cu->ID->FldErrMsg());
		}

		// Validate detail grid
		if ($tbl_uporgchart_cu->getCurrentDetailTable() == "tbl_uporgchart_unit" && $GLOBALS["tbl_uporgchart_unit"]->DetailEdit) {
			$tbl_uporgchart_unit_grid = new ctbl_uporgchart_unit_grid(); // get detail page object
			$tbl_uporgchart_unit_grid->ValidateGridForm();
			$tbl_uporgchart_unit_grid = NULL;
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
		global $conn, $Security, $Language, $tbl_uporgchart_cu;
		$sFilter = $tbl_uporgchart_cu->KeyFilter();
		$tbl_uporgchart_cu->CurrentFilter = $sFilter;
		$sSql = $tbl_uporgchart_cu->SQL();
		$conn->raiseErrorFn = 'up_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Begin transaction
			if ($tbl_uporgchart_cu->getCurrentDetailTable() <> "")
				$conn->BeginTrans();

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// ID
			// code

			$tbl_uporgchart_cu->code->SetDbValueDef($rsnew, $tbl_uporgchart_cu->code->CurrentValue, NULL, $tbl_uporgchart_cu->code->ReadOnly);

			// shortName
			$tbl_uporgchart_cu->shortName->SetDbValueDef($rsnew, $tbl_uporgchart_cu->shortName->CurrentValue, NULL, $tbl_uporgchart_cu->shortName->ReadOnly);

			// name
			$tbl_uporgchart_cu->name->SetDbValueDef($rsnew, $tbl_uporgchart_cu->name->CurrentValue, NULL, $tbl_uporgchart_cu->name->ReadOnly);

			// acronym
			$tbl_uporgchart_cu->acronym->SetDbValueDef($rsnew, $tbl_uporgchart_cu->acronym->CurrentValue, NULL, $tbl_uporgchart_cu->acronym->ReadOnly);

			// address
			$tbl_uporgchart_cu->address->SetDbValueDef($rsnew, $tbl_uporgchart_cu->address->CurrentValue, NULL, $tbl_uporgchart_cu->address->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $tbl_uporgchart_cu->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($tbl_uporgchart_cu->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';

				// Update detail records
				if ($EditRow) {
					if ($tbl_uporgchart_cu->getCurrentDetailTable() == "tbl_uporgchart_unit" && $GLOBALS["tbl_uporgchart_unit"]->DetailEdit) {
						$tbl_uporgchart_unit_grid = new ctbl_uporgchart_unit_grid(); // get detail page object
						$EditRow = $tbl_uporgchart_unit_grid->GridUpdate();
						$tbl_uporgchart_unit_grid = NULL;
					}
				}

				// Commit/Rollback transaction
				if ($tbl_uporgchart_cu->getCurrentDetailTable() <> "") {
					if ($EditRow) {
						$conn->CommitTrans(); // Commit transaction
					} else {
						$conn->RollbackTrans(); // Rollback transaction
					}
				}
			} else {
				if ($tbl_uporgchart_cu->CancelMessage <> "") {
					$this->setFailureMessage($tbl_uporgchart_cu->CancelMessage);
					$tbl_uporgchart_cu->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_uporgchart_cu->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Set up detail parms based on QueryString
	function SetUpDetailParms() {
		global $tbl_uporgchart_cu;
		$bValidDetail = FALSE;

		// Get the keys for master table
		if (isset($_GET[UP_TABLE_SHOW_DETAIL])) {
			$sDetailTblVar = $_GET[UP_TABLE_SHOW_DETAIL];
			$tbl_uporgchart_cu->setCurrentDetailTable($sDetailTblVar);
		} else {
			$sDetailTblVar = $tbl_uporgchart_cu->getCurrentDetailTable();
		}
		if ($sDetailTblVar <> "") {
			if ($sDetailTblVar == "tbl_uporgchart_unit") {
				if (!isset($GLOBALS["tbl_uporgchart_unit"]))
					$GLOBALS["tbl_uporgchart_unit"] = new ctbl_uporgchart_unit;
				if ($GLOBALS["tbl_uporgchart_unit"]->DetailEdit) {
					$GLOBALS["tbl_uporgchart_unit"]->CurrentMode = "edit";
					$GLOBALS["tbl_uporgchart_unit"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["tbl_uporgchart_unit"]->setCurrentMasterTable($tbl_uporgchart_cu->TableVar);
					$GLOBALS["tbl_uporgchart_unit"]->setStartRecordNumber(1);
					$GLOBALS["tbl_uporgchart_unit"]->cu->FldIsDetailKey = TRUE;
					$GLOBALS["tbl_uporgchart_unit"]->cu->CurrentValue = $tbl_uporgchart_cu->code->CurrentValue;
					$GLOBALS["tbl_uporgchart_unit"]->cu->setSessionValue($GLOBALS["tbl_uporgchart_unit"]->cu->CurrentValue);
				}
			}
		}
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_uporgchart_cu';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $tbl_uporgchart_cu;
		$table = 'tbl_uporgchart_cu';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($tbl_uporgchart_cu->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_uporgchart_cu->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($tbl_uporgchart_cu->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($tbl_uporgchart_cu->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
