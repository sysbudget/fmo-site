<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_1_t_conu_pbb_detail_contributorinfo.php" ?>
<?php include_once "frm_1_t_conu_contributor_pi_statusinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "frm_1_t_conu_contributor_mfo_statusinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_1_t_conu_pbb_detail_contributor_edit = new cfrm_1_t_conu_pbb_detail_contributor_edit();
$Page =& $frm_1_t_conu_pbb_detail_contributor_edit;

// Page init
$frm_1_t_conu_pbb_detail_contributor_edit->Page_Init();

// Page main
$frm_1_t_conu_pbb_detail_contributor_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_1_t_conu_pbb_detail_contributor_edit = new up_Page("frm_1_t_conu_pbb_detail_contributor_edit");

// page properties
frm_1_t_conu_pbb_detail_contributor_edit.PageID = "edit"; // page ID
frm_1_t_conu_pbb_detail_contributor_edit.FormID = "ffrm_1_t_conu_pbb_detail_contributoredit"; // form ID
var UP_PAGE_ID = frm_1_t_conu_pbb_detail_contributor_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_1_t_conu_pbb_detail_contributor_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_Target"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_1_t_conu_pbb_detail_contributor->Target->FldErrMsg()) ?>");

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
frm_1_t_conu_pbb_detail_contributor_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_1_t_conu_pbb_detail_contributor_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_1_t_conu_pbb_detail_contributor_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_1_t_conu_pbb_detail_contributor_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_1_t_conu_pbb_detail_contributor->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_1_t_conu_pbb_detail_contributor->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_1_t_conu_pbb_detail_contributor_edit->ShowPageHeader(); ?>
<?php
$frm_1_t_conu_pbb_detail_contributor_edit->ShowMessage();
?>
<form name="ffrm_1_t_conu_pbb_detail_contributoredit" id="ffrm_1_t_conu_pbb_detail_contributoredit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return frm_1_t_conu_pbb_detail_contributor_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="frm_1_t_conu_pbb_detail_contributor">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->Visible) { // Delivery Unit ?>
	<tr id="r_Delivery_Unit"<?php echo $frm_1_t_conu_pbb_detail_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->FldCaption() ?></td>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->CellAttributes() ?>><span id="el_Delivery_Unit">
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->EditValue ?></div>
<input type="hidden" name="x_Delivery_Unit" id="x_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->CurrentValue) ?>">
</span><?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->Visible) { // Contributing Unit ?>
	<tr id="r_Contributing_Unit"<?php echo $frm_1_t_conu_pbb_detail_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->FldCaption() ?></td>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->CellAttributes() ?>><span id="el_Contributing_Unit">
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->EditValue ?></div>
<input type="hidden" name="x_Contributing_Unit" id="x_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->CurrentValue) ?>">
</span><?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->MFO->Visible) { // MFO ?>
	<tr id="r_MFO"<?php echo $frm_1_t_conu_pbb_detail_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->FldCaption() ?></td>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->CellAttributes() ?>><span id="el_MFO">
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->EditValue ?></div>
<input type="hidden" name="x_MFO" id="x_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->MFO->CurrentValue) ?>">
</span><?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->Question->Visible) { // Question ?>
	<tr id="r_Question"<?php echo $frm_1_t_conu_pbb_detail_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_1_t_conu_pbb_detail_contributor->Question->FldCaption() ?></td>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Question->CellAttributes() ?>><span id="el_Question">
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Question->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Question->EditValue ?></div>
<input type="hidden" name="x_Question" id="x_Question" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Question->CurrentValue) ?>">
</span><?php echo $frm_1_t_conu_pbb_detail_contributor->Question->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->Applicable->Visible) { // Applicable ?>
	<tr id="r_Applicable"<?php echo $frm_1_t_conu_pbb_detail_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->FldCaption() ?></td>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->CellAttributes() ?>><span id="el_Applicable">
<div id="tp_x_Applicable" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_Applicable" id="x_Applicable" value="{value}"<?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->EditAttributes() ?>></label></div>
<div id="dsl_x_Applicable" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_1_t_conu_pbb_detail_contributor->Applicable->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_1_t_conu_pbb_detail_contributor->Applicable->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_Applicable" id="x_Applicable" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->Target->Visible) { // Target ?>
	<tr id="r_Target"<?php echo $frm_1_t_conu_pbb_detail_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_1_t_conu_pbb_detail_contributor->Target->FldCaption() ?></td>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Target->CellAttributes() ?>><span id="el_Target">
<input type="text" name="x_Target" id="x_Target" size="30" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Target->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Target->EditAttributes() ?>>
</span><?php echo $frm_1_t_conu_pbb_detail_contributor->Target->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Remarks->Visible) { // Target Remarks ?>
	<tr id="r_Target_Remarks"<?php echo $frm_1_t_conu_pbb_detail_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->FldCaption() ?></td>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->CellAttributes() ?>><span id="el_Target_Remarks">
<textarea name="x_Target_Remarks" id="x_Target_Remarks" cols="0" rows="0"<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->EditAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->EditValue ?></textarea>
</span><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->Visible) { // Target Cut-Off Date ?>
	<tr id="r_Target_Cut2DOff_Date"<?php echo $frm_1_t_conu_pbb_detail_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->FldCaption() ?></td>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->CellAttributes() ?>><span id="el_Target_Cut2DOff_Date">
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->EditValue ?></div>
<input type="hidden" name="x_Target_Cut2DOff_Date" id="x_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->CurrentValue) ?>">
</span><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Message->Visible) { // Target Message ?>
	<tr id="r_Target_Message"<?php echo $frm_1_t_conu_pbb_detail_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->FldCaption() ?></td>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->CellAttributes() ?>><span id="el_Target_Message">
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->EditValue ?></div>
<input type="hidden" name="x_Target_Message" id="x_Target_Message" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Message->CurrentValue) ?>">
</span><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_pbb_contributor_id" id="x_pbb_contributor_id" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->pbb_contributor_id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$frm_1_t_conu_pbb_detail_contributor_edit->ShowPageFooter();
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
$frm_1_t_conu_pbb_detail_contributor_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_1_t_conu_pbb_detail_contributor_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'frm_1_t_conu_pbb_detail_contributor';

	// Page object name
	var $PageObjName = 'frm_1_t_conu_pbb_detail_contributor_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_1_t_conu_pbb_detail_contributor;
		if ($frm_1_t_conu_pbb_detail_contributor->UseTokenInUrl) $PageUrl .= "t=" . $frm_1_t_conu_pbb_detail_contributor->TableVar . "&"; // Add page token
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
		global $objForm, $frm_1_t_conu_pbb_detail_contributor;
		if ($frm_1_t_conu_pbb_detail_contributor->UseTokenInUrl) {
			if ($objForm)
				return ($frm_1_t_conu_pbb_detail_contributor->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_1_t_conu_pbb_detail_contributor->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_1_t_conu_pbb_detail_contributor_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_1_t_conu_pbb_detail_contributor)
		if (!isset($GLOBALS["frm_1_t_conu_pbb_detail_contributor"])) {
			$GLOBALS["frm_1_t_conu_pbb_detail_contributor"] = new cfrm_1_t_conu_pbb_detail_contributor();
			$GLOBALS["Table"] =& $GLOBALS["frm_1_t_conu_pbb_detail_contributor"];
		}

		// Table object (frm_1_t_conu_contributor_pi_status)
		if (!isset($GLOBALS['frm_1_t_conu_contributor_pi_status'])) $GLOBALS['frm_1_t_conu_contributor_pi_status'] = new cfrm_1_t_conu_contributor_pi_status();

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Table object (frm_1_t_conu_contributor_mfo_status)
		if (!isset($GLOBALS['frm_1_t_conu_contributor_mfo_status'])) $GLOBALS['frm_1_t_conu_contributor_mfo_status'] = new cfrm_1_t_conu_contributor_mfo_status();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_1_t_conu_pbb_detail_contributor', TRUE);

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
		global $frm_1_t_conu_pbb_detail_contributor;

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
			$this->Page_Terminate("frm_1_t_conu_pbb_detail_contributorlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_1_t_conu_pbb_detail_contributorlist.php");
		}

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
		global $objForm, $Language, $gsFormError, $frm_1_t_conu_pbb_detail_contributor;

		// Load key from QueryString
		if (@$_GET["pbb_contributor_id"] <> "")
			$frm_1_t_conu_pbb_detail_contributor->pbb_contributor_id->setQueryStringValue($_GET["pbb_contributor_id"]);

		// Set up master detail parameters
		$this->SetUpMasterParms();
		if (@$_POST["a_edit"] <> "") {
			$frm_1_t_conu_pbb_detail_contributor->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$frm_1_t_conu_pbb_detail_contributor->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$frm_1_t_conu_pbb_detail_contributor->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$frm_1_t_conu_pbb_detail_contributor->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($frm_1_t_conu_pbb_detail_contributor->pbb_contributor_id->CurrentValue == "")
			$this->Page_Terminate("frm_1_t_conu_pbb_detail_contributorlist.php"); // Invalid key, return to list
		switch ($frm_1_t_conu_pbb_detail_contributor->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("frm_1_t_conu_pbb_detail_contributorlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$frm_1_t_conu_pbb_detail_contributor->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $frm_1_t_conu_pbb_detail_contributor->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$frm_1_t_conu_pbb_detail_contributor->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$frm_1_t_conu_pbb_detail_contributor->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$frm_1_t_conu_pbb_detail_contributor->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_1_t_conu_pbb_detail_contributor;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_1_t_conu_pbb_detail_contributor;
		if (!$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->FldIsDetailKey) {
			$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->setFormValue($objForm->GetValue("x_Delivery_Unit"));
		}
		if (!$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->FldIsDetailKey) {
			$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->setFormValue($objForm->GetValue("x_Contributing_Unit"));
		}
		if (!$frm_1_t_conu_pbb_detail_contributor->MFO->FldIsDetailKey) {
			$frm_1_t_conu_pbb_detail_contributor->MFO->setFormValue($objForm->GetValue("x_MFO"));
		}
		if (!$frm_1_t_conu_pbb_detail_contributor->Question->FldIsDetailKey) {
			$frm_1_t_conu_pbb_detail_contributor->Question->setFormValue($objForm->GetValue("x_Question"));
		}
		if (!$frm_1_t_conu_pbb_detail_contributor->Applicable->FldIsDetailKey) {
			$frm_1_t_conu_pbb_detail_contributor->Applicable->setFormValue($objForm->GetValue("x_Applicable"));
		}
		if (!$frm_1_t_conu_pbb_detail_contributor->Target->FldIsDetailKey) {
			$frm_1_t_conu_pbb_detail_contributor->Target->setFormValue($objForm->GetValue("x_Target"));
		}
		if (!$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->FldIsDetailKey) {
			$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->setFormValue($objForm->GetValue("x_Target_Remarks"));
		}
		if (!$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->FldIsDetailKey) {
			$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->setFormValue($objForm->GetValue("x_Target_Cut2DOff_Date"));
		}
		if (!$frm_1_t_conu_pbb_detail_contributor->Target_Message->FldIsDetailKey) {
			$frm_1_t_conu_pbb_detail_contributor->Target_Message->setFormValue($objForm->GetValue("x_Target_Message"));
		}
		if (!$frm_1_t_conu_pbb_detail_contributor->pbb_contributor_id->FldIsDetailKey)
			$frm_1_t_conu_pbb_detail_contributor->pbb_contributor_id->setFormValue($objForm->GetValue("x_pbb_contributor_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_1_t_conu_pbb_detail_contributor;
		$this->LoadRow();
		$frm_1_t_conu_pbb_detail_contributor->pbb_contributor_id->CurrentValue = $frm_1_t_conu_pbb_detail_contributor->pbb_contributor_id->FormValue;
		$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->CurrentValue = $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->FormValue;
		$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->CurrentValue = $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->FormValue;
		$frm_1_t_conu_pbb_detail_contributor->MFO->CurrentValue = $frm_1_t_conu_pbb_detail_contributor->MFO->FormValue;
		$frm_1_t_conu_pbb_detail_contributor->Question->CurrentValue = $frm_1_t_conu_pbb_detail_contributor->Question->FormValue;
		$frm_1_t_conu_pbb_detail_contributor->Applicable->CurrentValue = $frm_1_t_conu_pbb_detail_contributor->Applicable->FormValue;
		$frm_1_t_conu_pbb_detail_contributor->Target->CurrentValue = $frm_1_t_conu_pbb_detail_contributor->Target->FormValue;
		$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->CurrentValue = $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->FormValue;
		$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->CurrentValue = $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->FormValue;
		$frm_1_t_conu_pbb_detail_contributor->Target_Message->CurrentValue = $frm_1_t_conu_pbb_detail_contributor->Target_Message->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_1_t_conu_pbb_detail_contributor;
		$sFilter = $frm_1_t_conu_pbb_detail_contributor->KeyFilter();

		// Call Row Selecting event
		$frm_1_t_conu_pbb_detail_contributor->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_1_t_conu_pbb_detail_contributor->CurrentFilter = $sFilter;
		$sSql = $frm_1_t_conu_pbb_detail_contributor->SQL();
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
		global $conn, $frm_1_t_conu_pbb_detail_contributor;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_1_t_conu_pbb_detail_contributor->Row_Selected($row);
		$frm_1_t_conu_pbb_detail_contributor->pbb_contributor_id->setDbValue($rs->fields('pbb_contributor_id'));
		$frm_1_t_conu_pbb_detail_contributor->pbb_delivery_id->setDbValue($rs->fields('pbb_delivery_id'));
		$frm_1_t_conu_pbb_detail_contributor->unit_contributor_id->setDbValue($rs->fields('unit_contributor_id'));
		$frm_1_t_conu_pbb_detail_contributor->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_1_t_conu_pbb_detail_contributor->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_1_t_conu_pbb_detail_contributor->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_1_t_conu_pbb_detail_contributor->CU->setDbValue($rs->fields('CU'));
		$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->setDbValue($rs->fields('Contributing Unit'));
		$frm_1_t_conu_pbb_detail_contributor->mfo_question_id->setDbValue($rs->fields('mfo_question_id'));
		$frm_1_t_conu_pbb_detail_contributor->mfo_question_online_pi_seq->setDbValue($rs->fields('mfo_question_online_pi_seq'));
		$frm_1_t_conu_pbb_detail_contributor->MFO->setDbValue($rs->fields('MFO'));
		$frm_1_t_conu_pbb_detail_contributor->Question->setDbValue($rs->fields('Question'));
		$frm_1_t_conu_pbb_detail_contributor->mfo_question_online_insert_question_mfo->setDbValue($rs->fields('mfo_question_online_insert_question_mfo'));
		$frm_1_t_conu_pbb_detail_contributor->mfo_question_online_insert_question_mfo_name_rep->setDbValue($rs->fields('mfo_question_online_insert_question_mfo_name_rep'));
		$frm_1_t_conu_pbb_detail_contributor->Applicable->setDbValue($rs->fields('Applicable'));
		$frm_1_t_conu_pbb_detail_contributor->Target->setDbValue($rs->fields('Target'));
		$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->setDbValue($rs->fields('Target Remarks'));
		$frm_1_t_conu_pbb_detail_contributor->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_1_t_conu_pbb_detail_contributor->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_1_t_conu_pbb_detail_contributor->t_cutOffDate_contributor->setDbValue($rs->fields('t_cutOffDate_contributor'));
		$frm_1_t_conu_pbb_detail_contributor->t_cutOffDate_delivery->setDbValue($rs->fields('t_cutOffDate_delivery'));
		$frm_1_t_conu_pbb_detail_contributor->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->setDbValue($rs->fields('Target Cut-Off Date'));
		$frm_1_t_conu_pbb_detail_contributor->Target_Message->setDbValue($rs->fields('Target Message'));
		$frm_1_t_conu_pbb_detail_contributor->pbb_contributor_derived_from_supporting_documents->setDbValue($rs->fields('pbb_contributor_derived_from_supporting_documents'));
		$frm_1_t_conu_pbb_detail_contributor->Accomplishment->setDbValue($rs->fields('Accomplishment'));
		$frm_1_t_conu_pbb_detail_contributor->Numerator->setDbValue($rs->fields('Numerator'));
		$frm_1_t_conu_pbb_detail_contributor->Jan2DMar_28N29->setDbValue($rs->fields('Jan-Mar (N)'));
		$frm_1_t_conu_pbb_detail_contributor->Apr2DJun_28N29->setDbValue($rs->fields('Apr-Jun (N)'));
		$frm_1_t_conu_pbb_detail_contributor->Jul2DSep_28N29->setDbValue($rs->fields('Jul-Sep (N)'));
		$frm_1_t_conu_pbb_detail_contributor->Oct2DNov_28N29->setDbValue($rs->fields('Oct-Nov (N)'));
		$frm_1_t_conu_pbb_detail_contributor->Denominator->setDbValue($rs->fields('Denominator'));
		$frm_1_t_conu_pbb_detail_contributor->Jan2DMar_28D29->setDbValue($rs->fields('Jan-Mar (D)'));
		$frm_1_t_conu_pbb_detail_contributor->Apr2DJun_28D29->setDbValue($rs->fields('Apr-Jun (D)'));
		$frm_1_t_conu_pbb_detail_contributor->Jul2DSep_28D29->setDbValue($rs->fields('Jul-Sep (D)'));
		$frm_1_t_conu_pbb_detail_contributor->Oct2DNov_28D29->setDbValue($rs->fields('Oct-Nov (D)'));
		$frm_1_t_conu_pbb_detail_contributor->Accomplishment_Remarks->setDbValue($rs->fields('Accomplishment Remarks'));
		$frm_1_t_conu_pbb_detail_contributor->a_startDate->setDbValue($rs->fields('a_startDate'));
		$frm_1_t_conu_pbb_detail_contributor->a_cutOffDate_contributor->setDbValue($rs->fields('a_cutOffDate_contributor'));
		$frm_1_t_conu_pbb_detail_contributor->a_cutOffDate_delivery->setDbValue($rs->fields('a_cutOffDate_delivery'));
		$frm_1_t_conu_pbb_detail_contributor->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_1_t_conu_pbb_detail_contributor->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
		$frm_1_t_conu_pbb_detail_contributor->pbb_contributor_a_rating->setDbValue($rs->fields('pbb_contributor_a_rating'));
		$frm_1_t_conu_pbb_detail_contributor->Below_10025_Performance_Rating->setDbValue($rs->fields('Below 100% Performance Rating'));
		$frm_1_t_conu_pbb_detail_contributor->mfo_question_report_mfo_name->setDbValue($rs->fields('mfo_question_report_mfo_name'));
		$frm_1_t_conu_pbb_detail_contributor->mfo_question_report_form_a_1_mfo->setDbValue($rs->fields('mfo_question_report_form_a_1_mfo'));
		$frm_1_t_conu_pbb_detail_contributor->mfo_question_report_form_a_1_sequence->setDbValue($rs->fields('mfo_question_report_form_a_1_sequence'));
		$frm_1_t_conu_pbb_detail_contributor->z10025_to_12025_Performance_Rating->setDbValue($rs->fields('100% to 120% Performance Rating'));
		$frm_1_t_conu_pbb_detail_contributor->Above_12025_Performance_Rating->setDbValue($rs->fields('Above 120% Performance Rating'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_1_t_conu_pbb_detail_contributor;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_1_t_conu_pbb_detail_contributor->Row_Rendering();

		// Common render codes for all row types
		// pbb_contributor_id
		// pbb_delivery_id
		// unit_contributor_id
		// unit_delivery_id
		// focal_person_id
		// cu_sequence
		// CU
		// Delivery Unit
		// Contributing Unit
		// mfo_question_id
		// mfo_question_online_pi_seq
		// MFO
		// Question
		// mfo_question_online_insert_question_mfo
		// mfo_question_online_insert_question_mfo_name_rep
		// Applicable
		// Target
		// Target Remarks
		// cutOffDate_id
		// t_startDate
		// t_cutOffDate_contributor
		// t_cutOffDate_delivery
		// t_cutOffDate_fp
		// Target Cut-Off Date
		// Target Message
		// pbb_contributor_derived_from_supporting_documents
		// Accomplishment
		// Numerator
		// Jan-Mar (N)
		// Apr-Jun (N)
		// Jul-Sep (N)
		// Oct-Nov (N)
		// Denominator
		// Jan-Mar (D)
		// Apr-Jun (D)
		// Jul-Sep (D)
		// Oct-Nov (D)
		// Accomplishment Remarks
		// a_startDate
		// a_cutOffDate_contributor
		// a_cutOffDate_delivery
		// a_cutOffDate_fp
		// a_cutOffDate_remarks
		// pbb_contributor_a_rating
		// Below 100% Performance Rating
		// mfo_question_report_mfo_name
		// mfo_question_report_form_a_1_mfo
		// mfo_question_report_form_a_1_sequence
		// 100% to 120% Performance Rating
		// Above 120% Performance Rating

		if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View row

			// Delivery Unit
			$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->ViewValue = $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->ViewCustomAttributes = "";

			// Contributing Unit
			$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->ViewValue = $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->ViewCustomAttributes = "";

			// MFO
			$frm_1_t_conu_pbb_detail_contributor->MFO->ViewValue = $frm_1_t_conu_pbb_detail_contributor->MFO->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->MFO->ViewCustomAttributes = "";

			// Question
			$frm_1_t_conu_pbb_detail_contributor->Question->ViewValue = $frm_1_t_conu_pbb_detail_contributor->Question->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->Question->ViewCustomAttributes = "";

			// Applicable
			if (strval($frm_1_t_conu_pbb_detail_contributor->Applicable->CurrentValue) <> "") {
				switch ($frm_1_t_conu_pbb_detail_contributor->Applicable->CurrentValue) {
					case "Y":
						$frm_1_t_conu_pbb_detail_contributor->Applicable->ViewValue = $frm_1_t_conu_pbb_detail_contributor->Applicable->FldTagCaption(1) <> "" ? $frm_1_t_conu_pbb_detail_contributor->Applicable->FldTagCaption(1) : $frm_1_t_conu_pbb_detail_contributor->Applicable->CurrentValue;
						break;
					case "N":
						$frm_1_t_conu_pbb_detail_contributor->Applicable->ViewValue = $frm_1_t_conu_pbb_detail_contributor->Applicable->FldTagCaption(2) <> "" ? $frm_1_t_conu_pbb_detail_contributor->Applicable->FldTagCaption(2) : $frm_1_t_conu_pbb_detail_contributor->Applicable->CurrentValue;
						break;
					default:
						$frm_1_t_conu_pbb_detail_contributor->Applicable->ViewValue = $frm_1_t_conu_pbb_detail_contributor->Applicable->CurrentValue;
				}
			} else {
				$frm_1_t_conu_pbb_detail_contributor->Applicable->ViewValue = NULL;
			}
			$frm_1_t_conu_pbb_detail_contributor->Applicable->ViewCustomAttributes = "";

			// Target
			$frm_1_t_conu_pbb_detail_contributor->Target->ViewValue = $frm_1_t_conu_pbb_detail_contributor->Target->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->Target->CssStyle = "font-weight:bold;text-align:right;";
			$frm_1_t_conu_pbb_detail_contributor->Target->ViewCustomAttributes = "";

			// Target Remarks
			$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->ViewValue = $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->ViewCustomAttributes = "";

			// Target Cut-Off Date
			$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->ViewValue = $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->ViewCustomAttributes = "";

			// Target Message
			$frm_1_t_conu_pbb_detail_contributor->Target_Message->ViewValue = $frm_1_t_conu_pbb_detail_contributor->Target_Message->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->Target_Message->ViewCustomAttributes = "";

			// Delivery Unit
			$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->LinkCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->HrefValue = "";
			$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->TooltipValue = "";

			// Contributing Unit
			$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->LinkCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->HrefValue = "";
			$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->TooltipValue = "";

			// MFO
			$frm_1_t_conu_pbb_detail_contributor->MFO->LinkCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->MFO->HrefValue = "";
			$frm_1_t_conu_pbb_detail_contributor->MFO->TooltipValue = "";

			// Question
			$frm_1_t_conu_pbb_detail_contributor->Question->LinkCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Question->HrefValue = "";
			$frm_1_t_conu_pbb_detail_contributor->Question->TooltipValue = "";

			// Applicable
			$frm_1_t_conu_pbb_detail_contributor->Applicable->LinkCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Applicable->HrefValue = "";
			$frm_1_t_conu_pbb_detail_contributor->Applicable->TooltipValue = "";

			// Target
			$frm_1_t_conu_pbb_detail_contributor->Target->LinkCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Target->HrefValue = "";
			$frm_1_t_conu_pbb_detail_contributor->Target->TooltipValue = "";

			// Target Remarks
			$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->LinkCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->HrefValue = "";
			$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->TooltipValue = "";

			// Target Cut-Off Date
			$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->LinkCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->HrefValue = "";
			$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->TooltipValue = "";

			// Target Message
			$frm_1_t_conu_pbb_detail_contributor->Target_Message->LinkCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Target_Message->HrefValue = "";
			$frm_1_t_conu_pbb_detail_contributor->Target_Message->TooltipValue = "";
		} elseif ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// Delivery Unit
			$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->EditCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->EditValue = $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->ViewCustomAttributes = "";

			// Contributing Unit
			$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->EditCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->EditValue = $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->ViewCustomAttributes = "";

			// MFO
			$frm_1_t_conu_pbb_detail_contributor->MFO->EditCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->MFO->EditValue = $frm_1_t_conu_pbb_detail_contributor->MFO->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->MFO->ViewCustomAttributes = "";

			// Question
			$frm_1_t_conu_pbb_detail_contributor->Question->EditCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Question->EditValue = $frm_1_t_conu_pbb_detail_contributor->Question->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->Question->ViewCustomAttributes = "";

			// Applicable
			$frm_1_t_conu_pbb_detail_contributor->Applicable->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $frm_1_t_conu_pbb_detail_contributor->Applicable->FldTagCaption(1) <> "" ? $frm_1_t_conu_pbb_detail_contributor->Applicable->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $frm_1_t_conu_pbb_detail_contributor->Applicable->FldTagCaption(2) <> "" ? $frm_1_t_conu_pbb_detail_contributor->Applicable->FldTagCaption(2) : "N");
			$frm_1_t_conu_pbb_detail_contributor->Applicable->EditValue = $arwrk;

			// Target
			$frm_1_t_conu_pbb_detail_contributor->Target->EditCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Target->EditValue = up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target->CurrentValue);

			// Target Remarks
			$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->EditCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->EditValue = up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Remarks->CurrentValue);

			// Target Cut-Off Date
			$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->EditCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->EditValue = $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->ViewCustomAttributes = "";

			// Target Message
			$frm_1_t_conu_pbb_detail_contributor->Target_Message->EditCustomAttributes = "";
			$frm_1_t_conu_pbb_detail_contributor->Target_Message->EditValue = $frm_1_t_conu_pbb_detail_contributor->Target_Message->CurrentValue;
			$frm_1_t_conu_pbb_detail_contributor->Target_Message->ViewCustomAttributes = "";

			// Edit refer script
			// Delivery Unit

			$frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->HrefValue = "";

			// Contributing Unit
			$frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->HrefValue = "";

			// MFO
			$frm_1_t_conu_pbb_detail_contributor->MFO->HrefValue = "";

			// Question
			$frm_1_t_conu_pbb_detail_contributor->Question->HrefValue = "";

			// Applicable
			$frm_1_t_conu_pbb_detail_contributor->Applicable->HrefValue = "";

			// Target
			$frm_1_t_conu_pbb_detail_contributor->Target->HrefValue = "";

			// Target Remarks
			$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->HrefValue = "";

			// Target Cut-Off Date
			$frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->HrefValue = "";

			// Target Message
			$frm_1_t_conu_pbb_detail_contributor->Target_Message->HrefValue = "";
		}
		if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD ||
			$frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT ||
			$frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_1_t_conu_pbb_detail_contributor->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_1_t_conu_pbb_detail_contributor->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_1_t_conu_pbb_detail_contributor->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_1_t_conu_pbb_detail_contributor;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckNumber($frm_1_t_conu_pbb_detail_contributor->Target->FormValue)) {
			up_AddMessage($gsFormError, $frm_1_t_conu_pbb_detail_contributor->Target->FldErrMsg());
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
		global $conn, $Security, $Language, $frm_1_t_conu_pbb_detail_contributor;
		$sFilter = $frm_1_t_conu_pbb_detail_contributor->KeyFilter();
		$frm_1_t_conu_pbb_detail_contributor->CurrentFilter = $sFilter;
		$sSql = $frm_1_t_conu_pbb_detail_contributor->SQL();
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

			// Applicable
			$frm_1_t_conu_pbb_detail_contributor->Applicable->SetDbValueDef($rsnew, $frm_1_t_conu_pbb_detail_contributor->Applicable->CurrentValue, NULL, $frm_1_t_conu_pbb_detail_contributor->Applicable->ReadOnly);

			// Target
			$frm_1_t_conu_pbb_detail_contributor->Target->SetDbValueDef($rsnew, $frm_1_t_conu_pbb_detail_contributor->Target->CurrentValue, NULL, $frm_1_t_conu_pbb_detail_contributor->Target->ReadOnly);

			// Target Remarks
			$frm_1_t_conu_pbb_detail_contributor->Target_Remarks->SetDbValueDef($rsnew, $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->CurrentValue, NULL, $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_1_t_conu_pbb_detail_contributor->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_1_t_conu_pbb_detail_contributor->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_1_t_conu_pbb_detail_contributor->CancelMessage <> "") {
					$this->setFailureMessage($frm_1_t_conu_pbb_detail_contributor->CancelMessage);
					$frm_1_t_conu_pbb_detail_contributor->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_1_t_conu_pbb_detail_contributor->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_1_t_conu_pbb_detail_contributor;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "frm_1_t_conu_contributor_pi_status") {
				$bValidMaster = TRUE;
				if (@$_GET["unit_contributor_id"] <> "") {
					$GLOBALS["frm_1_t_conu_contributor_pi_status"]->unit_contributor_id->setQueryStringValue($_GET["unit_contributor_id"]);
					$frm_1_t_conu_pbb_detail_contributor->unit_contributor_id->setQueryStringValue($GLOBALS["frm_1_t_conu_contributor_pi_status"]->unit_contributor_id->QueryStringValue);
					$frm_1_t_conu_pbb_detail_contributor->unit_contributor_id->setSessionValue($frm_1_t_conu_pbb_detail_contributor->unit_contributor_id->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_1_t_conu_contributor_pi_status"]->unit_contributor_id->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
				if (@$_GET["MFO_SEQ"] <> "") {
					$GLOBALS["frm_1_t_conu_contributor_pi_status"]->MFO_SEQ->setQueryStringValue($_GET["MFO_SEQ"]);
					$frm_1_t_conu_pbb_detail_contributor->mfo_question_online_insert_question_mfo->setQueryStringValue($GLOBALS["frm_1_t_conu_contributor_pi_status"]->MFO_SEQ->QueryStringValue);
					$frm_1_t_conu_pbb_detail_contributor->mfo_question_online_insert_question_mfo->setSessionValue($frm_1_t_conu_pbb_detail_contributor->mfo_question_online_insert_question_mfo->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_1_t_conu_contributor_pi_status"]->MFO_SEQ->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$frm_1_t_conu_pbb_detail_contributor->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$frm_1_t_conu_pbb_detail_contributor->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "frm_1_t_conu_contributor_pi_status") {
				if ($frm_1_t_conu_pbb_detail_contributor->unit_contributor_id->QueryStringValue == "") $frm_1_t_conu_pbb_detail_contributor->unit_contributor_id->setSessionValue("");
				if ($frm_1_t_conu_pbb_detail_contributor->mfo_question_online_insert_question_mfo->QueryStringValue == "") $frm_1_t_conu_pbb_detail_contributor->mfo_question_online_insert_question_mfo->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $frm_1_t_conu_pbb_detail_contributor->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_1_t_conu_pbb_detail_contributor->getDetailFilter(); // Get detail filter
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
