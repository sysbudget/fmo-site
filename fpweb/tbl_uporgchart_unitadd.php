<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_uporgchart_unitinfo.php" ?>
<?php include_once "tbl_collectionperiodinfo.php" ?>
<?php include_once "tbl_facultyinfo.php" ?>
<?php include_once "tbl_uporgchart_cuinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "view_tbl_collectionperiod_admininfo.php" ?>
<?php include_once "tbl_facultygridcls.php" ?>
<?php include_once "tbl_collectionperiodgridcls.php" ?>
<?php include_once "view_tbl_collectionperiod_admingridcls.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_uporgchart_unit_add = new ctbl_uporgchart_unit_add();
$Page =& $tbl_uporgchart_unit_add;

// Page init
$tbl_uporgchart_unit_add->Page_Init();

// Page main
$tbl_uporgchart_unit_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_uporgchart_unit_add = new up_Page("tbl_uporgchart_unit_add");

// page properties
tbl_uporgchart_unit_add.PageID = "add"; // page ID
tbl_uporgchart_unit_add.FormID = "ftbl_uporgchart_unitadd"; // form ID
var UP_PAGE_ID = tbl_uporgchart_unit_add.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_uporgchart_unit_add.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_unitID"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_uporgchart_unit->unitID->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_unitID"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_uporgchart_unit->unitID->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_parentUnit"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_uporgchart_unit->parentUnit->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_orgLevel"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_uporgchart_unit->orgLevel->FldErrMsg()) ?>");

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
tbl_uporgchart_unit_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_uporgchart_unit_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_uporgchart_unit_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_uporgchart_unit_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_uporgchart_unit->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_uporgchart_unit->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_uporgchart_unit_add->ShowPageHeader(); ?>
<?php
$tbl_uporgchart_unit_add->ShowMessage();
?>
<form name="ftbl_uporgchart_unitadd" id="ftbl_uporgchart_unitadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return tbl_uporgchart_unit_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="tbl_uporgchart_unit">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_uporgchart_unit->unitID->Visible) { // unitID ?>
	<tr id="r_unitID"<?php echo $tbl_uporgchart_unit->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_unit->unitID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $tbl_uporgchart_unit->unitID->CellAttributes() ?>><span id="el_unitID">
<input type="text" name="x_unitID" id="x_unitID" size="30" value="<?php echo $tbl_uporgchart_unit->unitID->EditValue ?>"<?php echo $tbl_uporgchart_unit->unitID->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_unit->unitID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_unit->cu->Visible) { // cu ?>
	<tr id="r_cu"<?php echo $tbl_uporgchart_unit->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_unit->cu->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_unit->cu->CellAttributes() ?>><span id="el_cu">
<?php if ($tbl_uporgchart_unit->cu->getSessionValue() <> "") { ?>
<div<?php echo $tbl_uporgchart_unit->cu->ViewAttributes() ?>><?php echo $tbl_uporgchart_unit->cu->ViewValue ?></div>
<input type="hidden" id="x_cu" name="x_cu" value="<?php echo up_HtmlEncode($tbl_uporgchart_unit->cu->CurrentValue) ?>">
<?php } else { ?>
<span id="as_x_cu" style="white-space: nowrap; z-index: 8980">
	<input type="text" name="sv_x_cu" id="sv_x_cu" value="<?php echo $tbl_uporgchart_unit->cu->EditValue ?>" size="30"<?php echo $tbl_uporgchart_unit->cu->EditAttributes() ?>>&nbsp;<span id="em_x_cu" class="upMessage" style="display: none"><?php echo str_replace("%f", "phpimages/", $Language->Phrase("UnmatchedValue")) ?></span>
	<div id="sc_x_cu" style="z-index: 8980"></div>
</span>
<input type="hidden" name="x_cu" id="x_cu" value="<?php echo $tbl_uporgchart_unit->cu->CurrentValue ?>">
<?php
$sSqlWrk = "SELECT `code`, `shortName` FROM `tbl_uporgchart_cu`";
$sWhereWrk = "`shortName`  LIKE '{query_value}%'";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
$sSqlWrk .= " LIMIT " . UP_AUTO_SUGGEST_MAX_ENTRIES;
	$sSqlWrk = TEAencrypt($sSqlWrk, UP_RANDOM_KEY);
?>
<input type="hidden" name="s_x_cu" id="s_x_cu" value="<?php echo $sSqlWrk ?>">
<script type="text/javascript">
<!--
var oas_x_cu = new up_AutoSuggest("sv_x_cu", "sc_x_cu", "s_x_cu", "em_x_cu", "x_cu", "", false, UP_AUTO_SUGGEST_MAX_ENTRIES);
oas_x_cu.formatResult = function(ar) {	
	var df1 = ar[1];
	return df1;
};
oas_x_cu.ac.typeAhead = false;

//-->
</script>
<?php } ?>
</span><?php echo $tbl_uporgchart_unit->cu->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_unit->location->Visible) { // location ?>
	<tr id="r_location"<?php echo $tbl_uporgchart_unit->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_unit->location->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_unit->location->CellAttributes() ?>><span id="el_location">
<span id="as_x_location" style="white-space: nowrap; z-index: 8970">
	<input type="text" name="sv_x_location" id="sv_x_location" value="<?php echo $tbl_uporgchart_unit->location->EditValue ?>" size="30"<?php echo $tbl_uporgchart_unit->location->EditAttributes() ?>>&nbsp;<span id="em_x_location" class="upMessage" style="display: none"><?php echo str_replace("%f", "phpimages/", $Language->Phrase("UnmatchedValue")) ?></span>
	<div id="sc_x_location" style="z-index: 8970"></div>
</span>
<input type="hidden" name="x_location" id="x_location" value="<?php echo $tbl_uporgchart_unit->location->CurrentValue ?>">
<?php
$sSqlWrk = "SELECT `id`, `name` FROM `tbl_uporgchart_location`";
$sWhereWrk = "`name`  LIKE '{query_value}%'";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
$sSqlWrk .= " LIMIT " . UP_AUTO_SUGGEST_MAX_ENTRIES;
	$sSqlWrk = TEAencrypt($sSqlWrk, UP_RANDOM_KEY);
?>
<input type="hidden" name="s_x_location" id="s_x_location" value="<?php echo $sSqlWrk ?>">
<script type="text/javascript">
<!--
var oas_x_location = new up_AutoSuggest("sv_x_location", "sc_x_location", "s_x_location", "em_x_location", "x_location", "", false, UP_AUTO_SUGGEST_MAX_ENTRIES);
oas_x_location.formatResult = function(ar) {	
	var df1 = ar[1];
	return df1;
};
oas_x_location.ac.typeAhead = false;

//-->
</script>
</span><?php echo $tbl_uporgchart_unit->location->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_unit->parentUnit->Visible) { // parentUnit ?>
	<tr id="r_parentUnit"<?php echo $tbl_uporgchart_unit->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_unit->parentUnit->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_unit->parentUnit->CellAttributes() ?>><span id="el_parentUnit">
<input type="text" name="x_parentUnit" id="x_parentUnit" size="30" value="<?php echo $tbl_uporgchart_unit->parentUnit->EditValue ?>"<?php echo $tbl_uporgchart_unit->parentUnit->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_unit->parentUnit->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_unit->nameOfUnit->Visible) { // nameOfUnit ?>
	<tr id="r_nameOfUnit"<?php echo $tbl_uporgchart_unit->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_unit->nameOfUnit->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_unit->nameOfUnit->CellAttributes() ?>><span id="el_nameOfUnit">
<input type="text" name="x_nameOfUnit" id="x_nameOfUnit" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_unit->nameOfUnit->EditValue ?>"<?php echo $tbl_uporgchart_unit->nameOfUnit->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_unit->nameOfUnit->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_unit->plantillaOrgCode->Visible) { // plantillaOrgCode ?>
	<tr id="r_plantillaOrgCode"<?php echo $tbl_uporgchart_unit->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_unit->plantillaOrgCode->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_unit->plantillaOrgCode->CellAttributes() ?>><span id="el_plantillaOrgCode">
<input type="text" name="x_plantillaOrgCode" id="x_plantillaOrgCode" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_unit->plantillaOrgCode->EditValue ?>"<?php echo $tbl_uporgchart_unit->plantillaOrgCode->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_unit->plantillaOrgCode->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_uporgchart_unit->orgLevel->Visible) { // orgLevel ?>
	<tr id="r_orgLevel"<?php echo $tbl_uporgchart_unit->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_uporgchart_unit->orgLevel->FldCaption() ?></td>
		<td<?php echo $tbl_uporgchart_unit->orgLevel->CellAttributes() ?>><span id="el_orgLevel">
<input type="text" name="x_orgLevel" id="x_orgLevel" size="30" value="<?php echo $tbl_uporgchart_unit->orgLevel->EditValue ?>"<?php echo $tbl_uporgchart_unit->orgLevel->EditAttributes() ?>>
</span><?php echo $tbl_uporgchart_unit->orgLevel->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<?php if ($tbl_uporgchart_unit->getCurrentDetailTable() == "tbl_faculty" && $tbl_faculty->DetailAdd) { ?>
<br>
<?php include_once "tbl_facultygrid.php" ?>
<br>
<?php } ?>
<?php if ($tbl_uporgchart_unit->getCurrentDetailTable() == "tbl_collectionperiod" && $tbl_collectionperiod->DetailAdd) { ?>
<br>
<?php include_once "tbl_collectionperiodgrid.php" ?>
<br>
<?php } ?>
<?php if ($tbl_uporgchart_unit->getCurrentDetailTable() == "view_tbl_collectionperiod_admin" && $view_tbl_collectionperiod_admin->DetailAdd) { ?>
<br>
<?php include_once "view_tbl_collectionperiod_admingrid.php" ?>
<br>
<?php } ?>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$tbl_uporgchart_unit_add->ShowPageFooter();
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
$tbl_uporgchart_unit_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_uporgchart_unit_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'tbl_uporgchart_unit';

	// Page object name
	var $PageObjName = 'tbl_uporgchart_unit_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_uporgchart_unit;
		if ($tbl_uporgchart_unit->UseTokenInUrl) $PageUrl .= "t=" . $tbl_uporgchart_unit->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_uporgchart_unit;
		if ($tbl_uporgchart_unit->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_uporgchart_unit->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_uporgchart_unit->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_uporgchart_unit_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_uporgchart_unit)
		if (!isset($GLOBALS["tbl_uporgchart_unit"])) {
			$GLOBALS["tbl_uporgchart_unit"] = new ctbl_uporgchart_unit();
			$GLOBALS["Table"] =& $GLOBALS["tbl_uporgchart_unit"];
		}

		// Table object (tbl_collectionperiod)
		if (!isset($GLOBALS['tbl_collectionperiod'])) $GLOBALS['tbl_collectionperiod'] = new ctbl_collectionperiod();

		// Table object (tbl_faculty)
		if (!isset($GLOBALS['tbl_faculty'])) $GLOBALS['tbl_faculty'] = new ctbl_faculty();

		// Table object (tbl_uporgchart_cu)
		if (!isset($GLOBALS['tbl_uporgchart_cu'])) $GLOBALS['tbl_uporgchart_cu'] = new ctbl_uporgchart_cu();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Table object (view_tbl_collectionperiod_admin)
		if (!isset($GLOBALS['view_tbl_collectionperiod_admin'])) $GLOBALS['view_tbl_collectionperiod_admin'] = new cview_tbl_collectionperiod_admin();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_uporgchart_unit', TRUE);

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
		global $tbl_uporgchart_unit;

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
			$this->Page_Terminate("tbl_uporgchart_unitlist.php");
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
		global $objForm, $Language, $gsFormError, $tbl_uporgchart_unit;

		// Set up master/detail parameters
		$this->SetUpMasterParms();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$tbl_uporgchart_unit->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Set up detail parameters
			$this->SetUpDetailParms();

			// Validate form
			if (!$this->ValidateForm()) {
				$tbl_uporgchart_unit->CurrentAction = "I"; // Form error, reset action
				$tbl_uporgchart_unit->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["unitID"] != "") {
				$tbl_uporgchart_unit->unitID->setQueryStringValue($_GET["unitID"]);
				$tbl_uporgchart_unit->setKey("unitID", $tbl_uporgchart_unit->unitID->CurrentValue); // Set up key
			} else {
				$tbl_uporgchart_unit->setKey("unitID", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$tbl_uporgchart_unit->CurrentAction = "C"; // Copy record
			} else {
				$tbl_uporgchart_unit->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Set up detail parameters
		$this->SetUpDetailParms();

		// Perform action based on action code
		switch ($tbl_uporgchart_unit->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("tbl_uporgchart_unitlist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$tbl_uporgchart_unit->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					if ($tbl_uporgchart_unit->getCurrentDetailTable() <> "") // Master/detail add
						$sReturnUrl = $tbl_uporgchart_unit->getDetailUrl();
					else
						$sReturnUrl = $tbl_uporgchart_unit->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "tbl_uporgchart_unitview.php")
						$sReturnUrl = $tbl_uporgchart_unit->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$tbl_uporgchart_unit->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$tbl_uporgchart_unit->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$tbl_uporgchart_unit->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_uporgchart_unit;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $tbl_uporgchart_unit;
		$tbl_uporgchart_unit->unitID->CurrentValue = NULL;
		$tbl_uporgchart_unit->unitID->OldValue = $tbl_uporgchart_unit->unitID->CurrentValue;
		$tbl_uporgchart_unit->cu->CurrentValue = NULL;
		$tbl_uporgchart_unit->cu->OldValue = $tbl_uporgchart_unit->cu->CurrentValue;
		$tbl_uporgchart_unit->location->CurrentValue = NULL;
		$tbl_uporgchart_unit->location->OldValue = $tbl_uporgchart_unit->location->CurrentValue;
		$tbl_uporgchart_unit->parentUnit->CurrentValue = NULL;
		$tbl_uporgchart_unit->parentUnit->OldValue = $tbl_uporgchart_unit->parentUnit->CurrentValue;
		$tbl_uporgchart_unit->nameOfUnit->CurrentValue = NULL;
		$tbl_uporgchart_unit->nameOfUnit->OldValue = $tbl_uporgchart_unit->nameOfUnit->CurrentValue;
		$tbl_uporgchart_unit->plantillaOrgCode->CurrentValue = NULL;
		$tbl_uporgchart_unit->plantillaOrgCode->OldValue = $tbl_uporgchart_unit->plantillaOrgCode->CurrentValue;
		$tbl_uporgchart_unit->orgLevel->CurrentValue = NULL;
		$tbl_uporgchart_unit->orgLevel->OldValue = $tbl_uporgchart_unit->orgLevel->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_uporgchart_unit;
		if (!$tbl_uporgchart_unit->unitID->FldIsDetailKey) {
			$tbl_uporgchart_unit->unitID->setFormValue($objForm->GetValue("x_unitID"));
		}
		if (!$tbl_uporgchart_unit->cu->FldIsDetailKey) {
			$tbl_uporgchart_unit->cu->setFormValue($objForm->GetValue("x_cu"));
		}
		if (!$tbl_uporgchart_unit->location->FldIsDetailKey) {
			$tbl_uporgchart_unit->location->setFormValue($objForm->GetValue("x_location"));
		}
		if (!$tbl_uporgchart_unit->parentUnit->FldIsDetailKey) {
			$tbl_uporgchart_unit->parentUnit->setFormValue($objForm->GetValue("x_parentUnit"));
		}
		if (!$tbl_uporgchart_unit->nameOfUnit->FldIsDetailKey) {
			$tbl_uporgchart_unit->nameOfUnit->setFormValue($objForm->GetValue("x_nameOfUnit"));
		}
		if (!$tbl_uporgchart_unit->plantillaOrgCode->FldIsDetailKey) {
			$tbl_uporgchart_unit->plantillaOrgCode->setFormValue($objForm->GetValue("x_plantillaOrgCode"));
		}
		if (!$tbl_uporgchart_unit->orgLevel->FldIsDetailKey) {
			$tbl_uporgchart_unit->orgLevel->setFormValue($objForm->GetValue("x_orgLevel"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_uporgchart_unit;
		$this->LoadOldRecord();
		$tbl_uporgchart_unit->unitID->CurrentValue = $tbl_uporgchart_unit->unitID->FormValue;
		$tbl_uporgchart_unit->cu->CurrentValue = $tbl_uporgchart_unit->cu->FormValue;
		$tbl_uporgchart_unit->location->CurrentValue = $tbl_uporgchart_unit->location->FormValue;
		$tbl_uporgchart_unit->parentUnit->CurrentValue = $tbl_uporgchart_unit->parentUnit->FormValue;
		$tbl_uporgchart_unit->nameOfUnit->CurrentValue = $tbl_uporgchart_unit->nameOfUnit->FormValue;
		$tbl_uporgchart_unit->plantillaOrgCode->CurrentValue = $tbl_uporgchart_unit->plantillaOrgCode->FormValue;
		$tbl_uporgchart_unit->orgLevel->CurrentValue = $tbl_uporgchart_unit->orgLevel->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_uporgchart_unit;
		$sFilter = $tbl_uporgchart_unit->KeyFilter();

		// Call Row Selecting event
		$tbl_uporgchart_unit->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_uporgchart_unit->CurrentFilter = $sFilter;
		$sSql = $tbl_uporgchart_unit->SQL();
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
		global $conn, $tbl_uporgchart_unit;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_uporgchart_unit->Row_Selected($row);
		$tbl_uporgchart_unit->unitID->setDbValue($rs->fields('unitID'));
		$tbl_uporgchart_unit->cu->setDbValue($rs->fields('cu'));
		$tbl_uporgchart_unit->location->setDbValue($rs->fields('location'));
		$tbl_uporgchart_unit->parentUnit->setDbValue($rs->fields('parentUnit'));
		$tbl_uporgchart_unit->nameOfUnit->setDbValue($rs->fields('nameOfUnit'));
		$tbl_uporgchart_unit->plantillaOrgCode->setDbValue($rs->fields('plantillaOrgCode'));
		$tbl_uporgchart_unit->orgLevel->setDbValue($rs->fields('orgLevel'));
		$tbl_uporgchart_unit->cuUnitName->setDbValue($rs->fields('cuUnitName'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_uporgchart_unit;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($tbl_uporgchart_unit->getKey("unitID")) <> "")
			$tbl_uporgchart_unit->unitID->CurrentValue = $tbl_uporgchart_unit->getKey("unitID"); // unitID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_uporgchart_unit->CurrentFilter = $tbl_uporgchart_unit->KeyFilter();
			$sSql = $tbl_uporgchart_unit->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_uporgchart_unit;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_uporgchart_unit->Row_Rendering();

		// Common render codes for all row types
		// unitID
		// cu
		// location
		// parentUnit
		// nameOfUnit
		// plantillaOrgCode
		// orgLevel
		// cuUnitName

		if ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_VIEW) { // View row

			// unitID
			$tbl_uporgchart_unit->unitID->ViewValue = $tbl_uporgchart_unit->unitID->CurrentValue;
			$tbl_uporgchart_unit->unitID->ViewCustomAttributes = "";

			// cu
			$tbl_uporgchart_unit->cu->ViewValue = $tbl_uporgchart_unit->cu->CurrentValue;
			if (strval($tbl_uporgchart_unit->cu->CurrentValue) <> "") {
				$sFilterWrk = "`code` = '" . up_AdjustSql($tbl_uporgchart_unit->cu->CurrentValue) . "'";
			$sSqlWrk = "SELECT `shortName` FROM `tbl_uporgchart_cu`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_uporgchart_unit->cu->ViewValue = $rswrk->fields('shortName');
					$rswrk->Close();
				} else {
					$tbl_uporgchart_unit->cu->ViewValue = $tbl_uporgchart_unit->cu->CurrentValue;
				}
			} else {
				$tbl_uporgchart_unit->cu->ViewValue = NULL;
			}
			$tbl_uporgchart_unit->cu->ViewCustomAttributes = "";

			// location
			$tbl_uporgchart_unit->location->ViewValue = $tbl_uporgchart_unit->location->CurrentValue;
			if (strval($tbl_uporgchart_unit->location->CurrentValue) <> "") {
				$sFilterWrk = "`id` = '" . up_AdjustSql($tbl_uporgchart_unit->location->CurrentValue) . "'";
			$sSqlWrk = "SELECT `name` FROM `tbl_uporgchart_location`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_uporgchart_unit->location->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$tbl_uporgchart_unit->location->ViewValue = $tbl_uporgchart_unit->location->CurrentValue;
				}
			} else {
				$tbl_uporgchart_unit->location->ViewValue = NULL;
			}
			$tbl_uporgchart_unit->location->ViewCustomAttributes = "";

			// parentUnit
			$tbl_uporgchart_unit->parentUnit->ViewValue = $tbl_uporgchart_unit->parentUnit->CurrentValue;
			$tbl_uporgchart_unit->parentUnit->ViewCustomAttributes = "";

			// nameOfUnit
			$tbl_uporgchart_unit->nameOfUnit->ViewValue = $tbl_uporgchart_unit->nameOfUnit->CurrentValue;
			$tbl_uporgchart_unit->nameOfUnit->ViewCustomAttributes = "";

			// plantillaOrgCode
			$tbl_uporgchart_unit->plantillaOrgCode->ViewValue = $tbl_uporgchart_unit->plantillaOrgCode->CurrentValue;
			$tbl_uporgchart_unit->plantillaOrgCode->ViewCustomAttributes = "";

			// orgLevel
			$tbl_uporgchart_unit->orgLevel->ViewValue = $tbl_uporgchart_unit->orgLevel->CurrentValue;
			$tbl_uporgchart_unit->orgLevel->ViewCustomAttributes = "";

			// unitID
			$tbl_uporgchart_unit->unitID->LinkCustomAttributes = "";
			$tbl_uporgchart_unit->unitID->HrefValue = "";
			$tbl_uporgchart_unit->unitID->TooltipValue = "";

			// cu
			$tbl_uporgchart_unit->cu->LinkCustomAttributes = "";
			$tbl_uporgchart_unit->cu->HrefValue = "";
			$tbl_uporgchart_unit->cu->TooltipValue = "";

			// location
			$tbl_uporgchart_unit->location->LinkCustomAttributes = "";
			$tbl_uporgchart_unit->location->HrefValue = "";
			$tbl_uporgchart_unit->location->TooltipValue = "";

			// parentUnit
			$tbl_uporgchart_unit->parentUnit->LinkCustomAttributes = "";
			$tbl_uporgchart_unit->parentUnit->HrefValue = "";
			$tbl_uporgchart_unit->parentUnit->TooltipValue = "";

			// nameOfUnit
			$tbl_uporgchart_unit->nameOfUnit->LinkCustomAttributes = "";
			$tbl_uporgchart_unit->nameOfUnit->HrefValue = "";
			$tbl_uporgchart_unit->nameOfUnit->TooltipValue = "";

			// plantillaOrgCode
			$tbl_uporgchart_unit->plantillaOrgCode->LinkCustomAttributes = "";
			$tbl_uporgchart_unit->plantillaOrgCode->HrefValue = "";
			$tbl_uporgchart_unit->plantillaOrgCode->TooltipValue = "";

			// orgLevel
			$tbl_uporgchart_unit->orgLevel->LinkCustomAttributes = "";
			$tbl_uporgchart_unit->orgLevel->HrefValue = "";
			$tbl_uporgchart_unit->orgLevel->TooltipValue = "";
		} elseif ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_ADD) { // Add row

			// unitID
			$tbl_uporgchart_unit->unitID->EditCustomAttributes = "";
			$tbl_uporgchart_unit->unitID->EditValue = up_HtmlEncode($tbl_uporgchart_unit->unitID->CurrentValue);

			// cu
			$tbl_uporgchart_unit->cu->EditCustomAttributes = "";
			if ($tbl_uporgchart_unit->cu->getSessionValue() <> "") {
				$tbl_uporgchart_unit->cu->CurrentValue = $tbl_uporgchart_unit->cu->getSessionValue();
			$tbl_uporgchart_unit->cu->ViewValue = $tbl_uporgchart_unit->cu->CurrentValue;
			if (strval($tbl_uporgchart_unit->cu->CurrentValue) <> "") {
				$sFilterWrk = "`code` = '" . up_AdjustSql($tbl_uporgchart_unit->cu->CurrentValue) . "'";
			$sSqlWrk = "SELECT `shortName` FROM `tbl_uporgchart_cu`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_uporgchart_unit->cu->ViewValue = $rswrk->fields('shortName');
					$rswrk->Close();
				} else {
					$tbl_uporgchart_unit->cu->ViewValue = $tbl_uporgchart_unit->cu->CurrentValue;
				}
			} else {
				$tbl_uporgchart_unit->cu->ViewValue = NULL;
			}
			$tbl_uporgchart_unit->cu->ViewCustomAttributes = "";
			} else {
			$tbl_uporgchart_unit->cu->EditValue = up_HtmlEncode($tbl_uporgchart_unit->cu->CurrentValue);
			if (strval($tbl_uporgchart_unit->cu->CurrentValue) <> "") {
				$sFilterWrk = "`code` = '" . up_AdjustSql($tbl_uporgchart_unit->cu->CurrentValue) . "'";
			$sSqlWrk = "SELECT `shortName` FROM `tbl_uporgchart_cu`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_uporgchart_unit->cu->EditValue = $rswrk->fields('shortName');
					$rswrk->Close();
				} else {
					$tbl_uporgchart_unit->cu->EditValue = $tbl_uporgchart_unit->cu->CurrentValue;
				}
			} else {
				$tbl_uporgchart_unit->cu->EditValue = NULL;
			}
			}

			// location
			$tbl_uporgchart_unit->location->EditCustomAttributes = "";
			$tbl_uporgchart_unit->location->EditValue = up_HtmlEncode($tbl_uporgchart_unit->location->CurrentValue);
			if (strval($tbl_uporgchart_unit->location->CurrentValue) <> "") {
				$sFilterWrk = "`id` = '" . up_AdjustSql($tbl_uporgchart_unit->location->CurrentValue) . "'";
			$sSqlWrk = "SELECT `name` FROM `tbl_uporgchart_location`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_uporgchart_unit->location->EditValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$tbl_uporgchart_unit->location->EditValue = $tbl_uporgchart_unit->location->CurrentValue;
				}
			} else {
				$tbl_uporgchart_unit->location->EditValue = NULL;
			}

			// parentUnit
			$tbl_uporgchart_unit->parentUnit->EditCustomAttributes = "";
			$tbl_uporgchart_unit->parentUnit->EditValue = up_HtmlEncode($tbl_uporgchart_unit->parentUnit->CurrentValue);

			// nameOfUnit
			$tbl_uporgchart_unit->nameOfUnit->EditCustomAttributes = "";
			$tbl_uporgchart_unit->nameOfUnit->EditValue = up_HtmlEncode($tbl_uporgchart_unit->nameOfUnit->CurrentValue);

			// plantillaOrgCode
			$tbl_uporgchart_unit->plantillaOrgCode->EditCustomAttributes = "";
			$tbl_uporgchart_unit->plantillaOrgCode->EditValue = up_HtmlEncode($tbl_uporgchart_unit->plantillaOrgCode->CurrentValue);

			// orgLevel
			$tbl_uporgchart_unit->orgLevel->EditCustomAttributes = "";
			$tbl_uporgchart_unit->orgLevel->EditValue = up_HtmlEncode($tbl_uporgchart_unit->orgLevel->CurrentValue);

			// Edit refer script
			// unitID

			$tbl_uporgchart_unit->unitID->HrefValue = "";

			// cu
			$tbl_uporgchart_unit->cu->HrefValue = "";

			// location
			$tbl_uporgchart_unit->location->HrefValue = "";

			// parentUnit
			$tbl_uporgchart_unit->parentUnit->HrefValue = "";

			// nameOfUnit
			$tbl_uporgchart_unit->nameOfUnit->HrefValue = "";

			// plantillaOrgCode
			$tbl_uporgchart_unit->plantillaOrgCode->HrefValue = "";

			// orgLevel
			$tbl_uporgchart_unit->orgLevel->HrefValue = "";
		}
		if ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_ADD ||
			$tbl_uporgchart_unit->RowType == UP_ROWTYPE_EDIT ||
			$tbl_uporgchart_unit->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_uporgchart_unit->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_uporgchart_unit->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_uporgchart_unit->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_uporgchart_unit;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($tbl_uporgchart_unit->unitID->FormValue) && $tbl_uporgchart_unit->unitID->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $tbl_uporgchart_unit->unitID->FldCaption());
		}
		if (!up_CheckInteger($tbl_uporgchart_unit->unitID->FormValue)) {
			up_AddMessage($gsFormError, $tbl_uporgchart_unit->unitID->FldErrMsg());
		}
		if (!up_CheckInteger($tbl_uporgchart_unit->parentUnit->FormValue)) {
			up_AddMessage($gsFormError, $tbl_uporgchart_unit->parentUnit->FldErrMsg());
		}
		if (!up_CheckInteger($tbl_uporgchart_unit->orgLevel->FormValue)) {
			up_AddMessage($gsFormError, $tbl_uporgchart_unit->orgLevel->FldErrMsg());
		}

		// Validate detail grid
		if ($tbl_uporgchart_unit->getCurrentDetailTable() == "tbl_faculty" && $GLOBALS["tbl_faculty"]->DetailAdd) {
			$tbl_faculty_grid = new ctbl_faculty_grid(); // get detail page object
			$tbl_faculty_grid->ValidateGridForm();
			$tbl_faculty_grid = NULL;
		}
		if ($tbl_uporgchart_unit->getCurrentDetailTable() == "tbl_collectionperiod" && $GLOBALS["tbl_collectionperiod"]->DetailAdd) {
			$tbl_collectionperiod_grid = new ctbl_collectionperiod_grid(); // get detail page object
			$tbl_collectionperiod_grid->ValidateGridForm();
			$tbl_collectionperiod_grid = NULL;
		}
		if ($tbl_uporgchart_unit->getCurrentDetailTable() == "view_tbl_collectionperiod_admin" && $GLOBALS["view_tbl_collectionperiod_admin"]->DetailAdd) {
			$view_tbl_collectionperiod_admin_grid = new cview_tbl_collectionperiod_admin_grid(); // get detail page object
			$view_tbl_collectionperiod_admin_grid->ValidateGridForm();
			$view_tbl_collectionperiod_admin_grid = NULL;
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
		global $conn, $Language, $Security, $tbl_uporgchart_unit;

		// Check if key value entered
		if ($tbl_uporgchart_unit->unitID->CurrentValue == "" && $tbl_uporgchart_unit->unitID->getSessionValue() == "") {
			$this->setFailureMessage($Language->Phrase("InvalidKeyValue"));
			return FALSE;
		}

		// Check for duplicate key
		$bCheckKey = TRUE;
		$sFilter = $tbl_uporgchart_unit->KeyFilter();
		if ($bCheckKey) {
			$rsChk = $tbl_uporgchart_unit->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sKeyErrMsg = str_replace("%f", $sFilter, $Language->Phrase("DupKey"));
				$this->setFailureMessage($sKeyErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}

		// Begin transaction
		if ($tbl_uporgchart_unit->getCurrentDetailTable() <> "")
			$conn->BeginTrans();
		$rsnew = array();

		// unitID
		$tbl_uporgchart_unit->unitID->SetDbValueDef($rsnew, $tbl_uporgchart_unit->unitID->CurrentValue, 0, FALSE);

		// cu
		$tbl_uporgchart_unit->cu->SetDbValueDef($rsnew, $tbl_uporgchart_unit->cu->CurrentValue, NULL, FALSE);

		// location
		$tbl_uporgchart_unit->location->SetDbValueDef($rsnew, $tbl_uporgchart_unit->location->CurrentValue, NULL, FALSE);

		// parentUnit
		$tbl_uporgchart_unit->parentUnit->SetDbValueDef($rsnew, $tbl_uporgchart_unit->parentUnit->CurrentValue, NULL, FALSE);

		// nameOfUnit
		$tbl_uporgchart_unit->nameOfUnit->SetDbValueDef($rsnew, $tbl_uporgchart_unit->nameOfUnit->CurrentValue, NULL, FALSE);

		// plantillaOrgCode
		$tbl_uporgchart_unit->plantillaOrgCode->SetDbValueDef($rsnew, $tbl_uporgchart_unit->plantillaOrgCode->CurrentValue, NULL, FALSE);

		// orgLevel
		$tbl_uporgchart_unit->orgLevel->SetDbValueDef($rsnew, $tbl_uporgchart_unit->orgLevel->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $tbl_uporgchart_unit->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($tbl_uporgchart_unit->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($tbl_uporgchart_unit->CancelMessage <> "") {
				$this->setFailureMessage($tbl_uporgchart_unit->CancelMessage);
				$tbl_uporgchart_unit->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
		}

		// Add detail records
		if ($AddRow) {
			if ($tbl_uporgchart_unit->getCurrentDetailTable() == "tbl_faculty" && $GLOBALS["tbl_faculty"]->DetailAdd) {
				$GLOBALS["tbl_faculty"]->unitID->setSessionValue($tbl_uporgchart_unit->unitID->CurrentValue); // Set master key
				$tbl_faculty_grid = new ctbl_faculty_grid(); // get detail page object
				$AddRow = $tbl_faculty_grid->GridInsert();
				$tbl_faculty_grid = NULL;
			}
			if ($tbl_uporgchart_unit->getCurrentDetailTable() == "tbl_collectionperiod" && $GLOBALS["tbl_collectionperiod"]->DetailAdd) {
				$GLOBALS["tbl_collectionperiod"]->unitID->setSessionValue($tbl_uporgchart_unit->unitID->CurrentValue); // Set master key
				$tbl_collectionperiod_grid = new ctbl_collectionperiod_grid(); // get detail page object
				$AddRow = $tbl_collectionperiod_grid->GridInsert();
				$tbl_collectionperiod_grid = NULL;
			}
			if ($tbl_uporgchart_unit->getCurrentDetailTable() == "view_tbl_collectionperiod_admin" && $GLOBALS["view_tbl_collectionperiod_admin"]->DetailAdd) {
				$GLOBALS["view_tbl_collectionperiod_admin"]->unitID->setSessionValue($tbl_uporgchart_unit->unitID->CurrentValue); // Set master key
				$view_tbl_collectionperiod_admin_grid = new cview_tbl_collectionperiod_admin_grid(); // get detail page object
				$AddRow = $view_tbl_collectionperiod_admin_grid->GridInsert();
				$view_tbl_collectionperiod_admin_grid = NULL;
			}
		}

		// Commit/Rollback transaction
		if ($tbl_uporgchart_unit->getCurrentDetailTable() <> "") {
			if ($AddRow) {
				$conn->CommitTrans(); // Commit transaction
			} else {
				$conn->RollbackTrans(); // Rollback transaction
			}
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$tbl_uporgchart_unit->Row_Inserted($rs, $rsnew);
			$this->WriteAuditTrailOnAdd($rsnew);
		}
		return $AddRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_uporgchart_unit;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "tbl_uporgchart_cu") {
				$bValidMaster = TRUE;
				if (@$_GET["code"] <> "") {
					$GLOBALS["tbl_uporgchart_cu"]->code->setQueryStringValue($_GET["code"]);
					$tbl_uporgchart_unit->cu->setQueryStringValue($GLOBALS["tbl_uporgchart_cu"]->code->QueryStringValue);
					$tbl_uporgchart_unit->cu->setSessionValue($tbl_uporgchart_unit->cu->QueryStringValue);
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$tbl_uporgchart_unit->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$tbl_uporgchart_unit->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "tbl_uporgchart_cu") {
				if ($tbl_uporgchart_unit->cu->QueryStringValue == "") $tbl_uporgchart_unit->cu->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $tbl_uporgchart_unit->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_uporgchart_unit->getDetailFilter(); // Get detail filter
	}

	// Set up detail parms based on QueryString
	function SetUpDetailParms() {
		global $tbl_uporgchart_unit;
		$bValidDetail = FALSE;

		// Get the keys for master table
		if (isset($_GET[UP_TABLE_SHOW_DETAIL])) {
			$sDetailTblVar = $_GET[UP_TABLE_SHOW_DETAIL];
			$tbl_uporgchart_unit->setCurrentDetailTable($sDetailTblVar);
		} else {
			$sDetailTblVar = $tbl_uporgchart_unit->getCurrentDetailTable();
		}
		if ($sDetailTblVar <> "") {
			if ($sDetailTblVar == "tbl_faculty") {
				if (!isset($GLOBALS["tbl_faculty"]))
					$GLOBALS["tbl_faculty"] = new ctbl_faculty;
				if ($GLOBALS["tbl_faculty"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["tbl_faculty"]->CurrentMode = "copy";
					else
						$GLOBALS["tbl_faculty"]->CurrentMode = "add";
					$GLOBALS["tbl_faculty"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["tbl_faculty"]->setCurrentMasterTable($tbl_uporgchart_unit->TableVar);
					$GLOBALS["tbl_faculty"]->setStartRecordNumber(1);
					$GLOBALS["tbl_faculty"]->unitID->FldIsDetailKey = TRUE;
					$GLOBALS["tbl_faculty"]->unitID->CurrentValue = $tbl_uporgchart_unit->unitID->CurrentValue;
					$GLOBALS["tbl_faculty"]->unitID->setSessionValue($GLOBALS["tbl_faculty"]->unitID->CurrentValue);
				}
			}
			if ($sDetailTblVar == "tbl_collectionperiod") {
				if (!isset($GLOBALS["tbl_collectionperiod"]))
					$GLOBALS["tbl_collectionperiod"] = new ctbl_collectionperiod;
				if ($GLOBALS["tbl_collectionperiod"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["tbl_collectionperiod"]->CurrentMode = "copy";
					else
						$GLOBALS["tbl_collectionperiod"]->CurrentMode = "add";
					$GLOBALS["tbl_collectionperiod"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["tbl_collectionperiod"]->setCurrentMasterTable($tbl_uporgchart_unit->TableVar);
					$GLOBALS["tbl_collectionperiod"]->setStartRecordNumber(1);
					$GLOBALS["tbl_collectionperiod"]->unitID->FldIsDetailKey = TRUE;
					$GLOBALS["tbl_collectionperiod"]->unitID->CurrentValue = $tbl_uporgchart_unit->unitID->CurrentValue;
					$GLOBALS["tbl_collectionperiod"]->unitID->setSessionValue($GLOBALS["tbl_collectionperiod"]->unitID->CurrentValue);
				}
			}
			if ($sDetailTblVar == "view_tbl_collectionperiod_admin") {
				if (!isset($GLOBALS["view_tbl_collectionperiod_admin"]))
					$GLOBALS["view_tbl_collectionperiod_admin"] = new cview_tbl_collectionperiod_admin;
				if ($GLOBALS["view_tbl_collectionperiod_admin"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["view_tbl_collectionperiod_admin"]->CurrentMode = "copy";
					else
						$GLOBALS["view_tbl_collectionperiod_admin"]->CurrentMode = "add";
					$GLOBALS["view_tbl_collectionperiod_admin"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["view_tbl_collectionperiod_admin"]->setCurrentMasterTable($tbl_uporgchart_unit->TableVar);
					$GLOBALS["view_tbl_collectionperiod_admin"]->setStartRecordNumber(1);
					$GLOBALS["view_tbl_collectionperiod_admin"]->unitID->FldIsDetailKey = TRUE;
					$GLOBALS["view_tbl_collectionperiod_admin"]->unitID->CurrentValue = $tbl_uporgchart_unit->unitID->CurrentValue;
					$GLOBALS["view_tbl_collectionperiod_admin"]->unitID->setSessionValue($GLOBALS["view_tbl_collectionperiod_admin"]->unitID->CurrentValue);
				}
			}
		}
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_uporgchart_unit';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	function WriteAuditTrailOnAdd(&$rs) {
		global $tbl_uporgchart_unit;
		$table = 'tbl_uporgchart_unit';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['unitID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if ($tbl_uporgchart_unit->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_uporgchart_unit->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($tbl_uporgchart_unit->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
