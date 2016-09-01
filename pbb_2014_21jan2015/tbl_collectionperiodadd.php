<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "tbl_collectionperiodinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_collectionperiod_add = new ctbl_collectionperiod_add();
$Page =& $tbl_collectionperiod_add;

// Page init
$tbl_collectionperiod_add->Page_Init();

// Page main
$tbl_collectionperiod_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_collectionperiod_add = new up_Page("tbl_collectionperiod_add");

// page properties
tbl_collectionperiod_add.PageID = "add"; // page ID
tbl_collectionperiod_add.FormID = "ftbl_collectionperiodadd"; // form ID
var UP_PAGE_ID = tbl_collectionperiod_add.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_collectionperiod_add.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_id_cu"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_collectionperiod->id_cu->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_collectionPeriod_cutOffDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_collectionperiod->collectionPeriod_cutOffDate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_remarks_cutOffDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_collectionperiod->remarks_cutOffDate->FldErrMsg()) ?>");

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
tbl_collectionperiod_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_collectionperiod_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_collectionperiod_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_collectionperiod_add.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-cold-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_collectionperiod->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_collectionperiod->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_collectionperiod_add->ShowPageHeader(); ?>
<?php
$tbl_collectionperiod_add->ShowMessage();
?>
<form name="ftbl_collectionperiodadd" id="ftbl_collectionperiodadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return tbl_collectionperiod_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="tbl_collectionperiod">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_collectionperiod->id_cu->Visible) { // id_cu ?>
	<tr id="r_id_cu"<?php echo $tbl_collectionperiod->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_collectionperiod->id_cu->FldCaption() ?></td>
		<td<?php echo $tbl_collectionperiod->id_cu->CellAttributes() ?>><span id="el_id_cu">
<input type="text" name="x_id_cu" id="x_id_cu" size="30" value="<?php echo $tbl_collectionperiod->id_cu->EditValue ?>"<?php echo $tbl_collectionperiod->id_cu->EditAttributes() ?>>
</span><?php echo $tbl_collectionperiod->id_cu->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_collectionperiod->cu_name->Visible) { // cu_name ?>
	<tr id="r_cu_name"<?php echo $tbl_collectionperiod->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_collectionperiod->cu_name->FldCaption() ?></td>
		<td<?php echo $tbl_collectionperiod->cu_name->CellAttributes() ?>><span id="el_cu_name">
<input type="text" name="x_cu_name" id="x_cu_name" size="30" maxlength="255" value="<?php echo $tbl_collectionperiod->cu_name->EditValue ?>"<?php echo $tbl_collectionperiod->cu_name->EditAttributes() ?>>
</span><?php echo $tbl_collectionperiod->cu_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_collectionperiod->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
	<tr id="r_collectionPeriod_cutOffDate"<?php echo $tbl_collectionperiod->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->FldCaption() ?></td>
		<td<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->CellAttributes() ?>><span id="el_collectionPeriod_cutOffDate">
<input type="text" name="x_collectionPeriod_cutOffDate" id="x_collectionPeriod_cutOffDate" value="<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->EditValue ?>"<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x_collectionPeriod_cutOffDate" name="cal_x_collectionPeriod_cutOffDate" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_collectionPeriod_cutOffDate", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x_collectionPeriod_cutOffDate" // button id
});
</script>
</span><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_collectionperiod->remarks_cutOffDate->Visible) { // remarks_cutOffDate ?>
	<tr id="r_remarks_cutOffDate"<?php echo $tbl_collectionperiod->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_collectionperiod->remarks_cutOffDate->FldCaption() ?></td>
		<td<?php echo $tbl_collectionperiod->remarks_cutOffDate->CellAttributes() ?>><span id="el_remarks_cutOffDate">
<input type="text" name="x_remarks_cutOffDate" id="x_remarks_cutOffDate" value="<?php echo $tbl_collectionperiod->remarks_cutOffDate->EditValue ?>"<?php echo $tbl_collectionperiod->remarks_cutOffDate->EditAttributes() ?>>
</span><?php echo $tbl_collectionperiod->remarks_cutOffDate->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$tbl_collectionperiod_add->ShowPageFooter();
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
$tbl_collectionperiod_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_collectionperiod_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'tbl_collectionperiod';

	// Page object name
	var $PageObjName = 'tbl_collectionperiod_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_collectionperiod;
		if ($tbl_collectionperiod->UseTokenInUrl) $PageUrl .= "t=" . $tbl_collectionperiod->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_collectionperiod;
		if ($tbl_collectionperiod->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_collectionperiod->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_collectionperiod->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_collectionperiod_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_collectionperiod)
		if (!isset($GLOBALS["tbl_collectionperiod"])) {
			$GLOBALS["tbl_collectionperiod"] = new ctbl_collectionperiod();
			$GLOBALS["Table"] =& $GLOBALS["tbl_collectionperiod"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_collectionperiod', TRUE);

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
		global $tbl_collectionperiod;

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
			$this->Page_Terminate("tbl_collectionperiodlist.php");
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
		global $objForm, $Language, $gsFormError, $tbl_collectionperiod;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$tbl_collectionperiod->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$tbl_collectionperiod->CurrentAction = "I"; // Form error, reset action
				$tbl_collectionperiod->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["collectionPeriod_ID"] != "") {
				$tbl_collectionperiod->collectionPeriod_ID->setQueryStringValue($_GET["collectionPeriod_ID"]);
				$tbl_collectionperiod->setKey("collectionPeriod_ID", $tbl_collectionperiod->collectionPeriod_ID->CurrentValue); // Set up key
			} else {
				$tbl_collectionperiod->setKey("collectionPeriod_ID", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$tbl_collectionperiod->CurrentAction = "C"; // Copy record
			} else {
				$tbl_collectionperiod->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($tbl_collectionperiod->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("tbl_collectionperiodlist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$tbl_collectionperiod->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $tbl_collectionperiod->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "tbl_collectionperiodview.php")
						$sReturnUrl = $tbl_collectionperiod->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$tbl_collectionperiod->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$tbl_collectionperiod->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$tbl_collectionperiod->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_collectionperiod;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $tbl_collectionperiod;
		$tbl_collectionperiod->id_cu->CurrentValue = NULL;
		$tbl_collectionperiod->id_cu->OldValue = $tbl_collectionperiod->id_cu->CurrentValue;
		$tbl_collectionperiod->cu_name->CurrentValue = NULL;
		$tbl_collectionperiod->cu_name->OldValue = $tbl_collectionperiod->cu_name->CurrentValue;
		$tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue = NULL;
		$tbl_collectionperiod->collectionPeriod_cutOffDate->OldValue = $tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue;
		$tbl_collectionperiod->remarks_cutOffDate->CurrentValue = NULL;
		$tbl_collectionperiod->remarks_cutOffDate->OldValue = $tbl_collectionperiod->remarks_cutOffDate->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_collectionperiod;
		if (!$tbl_collectionperiod->id_cu->FldIsDetailKey) {
			$tbl_collectionperiod->id_cu->setFormValue($objForm->GetValue("x_id_cu"));
		}
		if (!$tbl_collectionperiod->cu_name->FldIsDetailKey) {
			$tbl_collectionperiod->cu_name->setFormValue($objForm->GetValue("x_cu_name"));
		}
		if (!$tbl_collectionperiod->collectionPeriod_cutOffDate->FldIsDetailKey) {
			$tbl_collectionperiod->collectionPeriod_cutOffDate->setFormValue($objForm->GetValue("x_collectionPeriod_cutOffDate"));
			$tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue = up_UnFormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue, 6);
		}
		if (!$tbl_collectionperiod->remarks_cutOffDate->FldIsDetailKey) {
			$tbl_collectionperiod->remarks_cutOffDate->setFormValue($objForm->GetValue("x_remarks_cutOffDate"));
			$tbl_collectionperiod->remarks_cutOffDate->CurrentValue = up_UnFormatDateTime($tbl_collectionperiod->remarks_cutOffDate->CurrentValue, 6);
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_collectionperiod;
		$this->LoadOldRecord();
		$tbl_collectionperiod->id_cu->CurrentValue = $tbl_collectionperiod->id_cu->FormValue;
		$tbl_collectionperiod->cu_name->CurrentValue = $tbl_collectionperiod->cu_name->FormValue;
		$tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue = $tbl_collectionperiod->collectionPeriod_cutOffDate->FormValue;
		$tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue = up_UnFormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue, 6);
		$tbl_collectionperiod->remarks_cutOffDate->CurrentValue = $tbl_collectionperiod->remarks_cutOffDate->FormValue;
		$tbl_collectionperiod->remarks_cutOffDate->CurrentValue = up_UnFormatDateTime($tbl_collectionperiod->remarks_cutOffDate->CurrentValue, 6);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_collectionperiod;
		$sFilter = $tbl_collectionperiod->KeyFilter();

		// Call Row Selecting event
		$tbl_collectionperiod->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_collectionperiod->CurrentFilter = $sFilter;
		$sSql = $tbl_collectionperiod->SQL();
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
		global $conn, $tbl_collectionperiod;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_collectionperiod->Row_Selected($row);
		$tbl_collectionperiod->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$tbl_collectionperiod->id_cu->setDbValue($rs->fields('id_cu'));
		$tbl_collectionperiod->cu_name->setDbValue($rs->fields('cu_name'));
		$tbl_collectionperiod->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$tbl_collectionperiod->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
		$tbl_collectionperiod->remarks_cutOffDate->setDbValue($rs->fields('remarks_cutOffDate'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_collectionperiod;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($tbl_collectionperiod->getKey("collectionPeriod_ID")) <> "")
			$tbl_collectionperiod->collectionPeriod_ID->CurrentValue = $tbl_collectionperiod->getKey("collectionPeriod_ID"); // collectionPeriod_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_collectionperiod->CurrentFilter = $tbl_collectionperiod->KeyFilter();
			$sSql = $tbl_collectionperiod->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_collectionperiod;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_collectionperiod->Row_Rendering();

		// Common render codes for all row types
		// collectionPeriod_ID
		// id_cu
		// cu_name
		// collectionPeriod_cutOffDate
		// collectionPeriod_status
		// remarks_cutOffDate

		if ($tbl_collectionperiod->RowType == UP_ROWTYPE_VIEW) { // View row

			// id_cu
			$tbl_collectionperiod->id_cu->ViewValue = $tbl_collectionperiod->id_cu->CurrentValue;
			$tbl_collectionperiod->id_cu->ViewCustomAttributes = "";

			// cu_name
			$tbl_collectionperiod->cu_name->ViewValue = $tbl_collectionperiod->cu_name->CurrentValue;
			$tbl_collectionperiod->cu_name->ViewCustomAttributes = "";

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue = $tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue;
			$tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue = up_FormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue, 6);
			$tbl_collectionperiod->collectionPeriod_cutOffDate->ViewCustomAttributes = "";

			// collectionPeriod_status
			if (strval($tbl_collectionperiod->collectionPeriod_status->CurrentValue) <> "") {
				switch ($tbl_collectionperiod->collectionPeriod_status->CurrentValue) {
					case "A":
						$tbl_collectionperiod->collectionPeriod_status->ViewValue = $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(1) <> "" ? $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(1) : $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
						break;
					case "I":
						$tbl_collectionperiod->collectionPeriod_status->ViewValue = $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(2) <> "" ? $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(2) : $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
						break;
					default:
						$tbl_collectionperiod->collectionPeriod_status->ViewValue = $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
				}
			} else {
				$tbl_collectionperiod->collectionPeriod_status->ViewValue = NULL;
			}
			$tbl_collectionperiod->collectionPeriod_status->ViewCustomAttributes = "";

			// remarks_cutOffDate
			$tbl_collectionperiod->remarks_cutOffDate->ViewValue = $tbl_collectionperiod->remarks_cutOffDate->CurrentValue;
			$tbl_collectionperiod->remarks_cutOffDate->ViewValue = up_FormatDateTime($tbl_collectionperiod->remarks_cutOffDate->ViewValue, 6);
			$tbl_collectionperiod->remarks_cutOffDate->ViewCustomAttributes = "";

			// id_cu
			$tbl_collectionperiod->id_cu->LinkCustomAttributes = "";
			$tbl_collectionperiod->id_cu->HrefValue = "";
			$tbl_collectionperiod->id_cu->TooltipValue = "";

			// cu_name
			$tbl_collectionperiod->cu_name->LinkCustomAttributes = "";
			$tbl_collectionperiod->cu_name->HrefValue = "";
			$tbl_collectionperiod->cu_name->TooltipValue = "";

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->LinkCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_cutOffDate->HrefValue = "";
			$tbl_collectionperiod->collectionPeriod_cutOffDate->TooltipValue = "";

			// remarks_cutOffDate
			$tbl_collectionperiod->remarks_cutOffDate->LinkCustomAttributes = "";
			$tbl_collectionperiod->remarks_cutOffDate->HrefValue = "";
			$tbl_collectionperiod->remarks_cutOffDate->TooltipValue = "";
		} elseif ($tbl_collectionperiod->RowType == UP_ROWTYPE_ADD) { // Add row

			// id_cu
			$tbl_collectionperiod->id_cu->EditCustomAttributes = "";
			$tbl_collectionperiod->id_cu->EditValue = up_HtmlEncode($tbl_collectionperiod->id_cu->CurrentValue);

			// cu_name
			$tbl_collectionperiod->cu_name->EditCustomAttributes = "";
			$tbl_collectionperiod->cu_name->EditValue = up_HtmlEncode($tbl_collectionperiod->cu_name->CurrentValue);

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->EditCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_cutOffDate->EditValue = up_HtmlEncode(up_FormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue, 6));

			// remarks_cutOffDate
			$tbl_collectionperiod->remarks_cutOffDate->EditCustomAttributes = "";
			$tbl_collectionperiod->remarks_cutOffDate->EditValue = up_HtmlEncode(up_FormatDateTime($tbl_collectionperiod->remarks_cutOffDate->CurrentValue, 6));

			// Edit refer script
			// id_cu

			$tbl_collectionperiod->id_cu->HrefValue = "";

			// cu_name
			$tbl_collectionperiod->cu_name->HrefValue = "";

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->HrefValue = "";

			// remarks_cutOffDate
			$tbl_collectionperiod->remarks_cutOffDate->HrefValue = "";
		}
		if ($tbl_collectionperiod->RowType == UP_ROWTYPE_ADD ||
			$tbl_collectionperiod->RowType == UP_ROWTYPE_EDIT ||
			$tbl_collectionperiod->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_collectionperiod->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_collectionperiod->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_collectionperiod->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_collectionperiod;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($tbl_collectionperiod->id_cu->FormValue)) {
			up_AddMessage($gsFormError, $tbl_collectionperiod->id_cu->FldErrMsg());
		}
		if (!up_CheckUSDate($tbl_collectionperiod->collectionPeriod_cutOffDate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_collectionperiod->collectionPeriod_cutOffDate->FldErrMsg());
		}
		if (!up_CheckUSDate($tbl_collectionperiod->remarks_cutOffDate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_collectionperiod->remarks_cutOffDate->FldErrMsg());
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
		global $conn, $Language, $Security, $tbl_collectionperiod;
		$rsnew = array();

		// id_cu
		$tbl_collectionperiod->id_cu->SetDbValueDef($rsnew, $tbl_collectionperiod->id_cu->CurrentValue, NULL, FALSE);

		// cu_name
		$tbl_collectionperiod->cu_name->SetDbValueDef($rsnew, $tbl_collectionperiod->cu_name->CurrentValue, NULL, FALSE);

		// collectionPeriod_cutOffDate
		$tbl_collectionperiod->collectionPeriod_cutOffDate->SetDbValueDef($rsnew, up_UnFormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue, 6), NULL, FALSE);

		// remarks_cutOffDate
		$tbl_collectionperiod->remarks_cutOffDate->SetDbValueDef($rsnew, up_UnFormatDateTime($tbl_collectionperiod->remarks_cutOffDate->CurrentValue, 6), NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $tbl_collectionperiod->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($tbl_collectionperiod->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($tbl_collectionperiod->CancelMessage <> "") {
				$this->setFailureMessage($tbl_collectionperiod->CancelMessage);
				$tbl_collectionperiod->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$tbl_collectionperiod->collectionPeriod_ID->setDbValue($conn->Insert_ID());
			$rsnew['collectionPeriod_ID'] = $tbl_collectionperiod->collectionPeriod_ID->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$tbl_collectionperiod->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_collectionperiod';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $tbl_collectionperiod;
		$table = 'tbl_collectionperiod';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['collectionPeriod_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($tbl_collectionperiod->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_collectionperiod->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($tbl_collectionperiod->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
