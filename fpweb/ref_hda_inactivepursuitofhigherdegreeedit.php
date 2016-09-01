<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_hda_inactivepursuitofhigherdegreeinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_hda_inactivepursuitofhigherdegree_edit = new cref_hda_inactivepursuitofhigherdegree_edit();
$Page =& $ref_hda_inactivepursuitofhigherdegree_edit;

// Page init
$ref_hda_inactivepursuitofhigherdegree_edit->Page_Init();

// Page main
$ref_hda_inactivepursuitofhigherdegree_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_hda_inactivepursuitofhigherdegree_edit = new up_Page("ref_hda_inactivepursuitofhigherdegree_edit");

// page properties
ref_hda_inactivepursuitofhigherdegree_edit.PageID = "edit"; // page ID
ref_hda_inactivepursuitofhigherdegree_edit.FormID = "fref_hda_inactivepursuitofhigherdegreeedit"; // form ID
var UP_PAGE_ID = ref_hda_inactivepursuitofhigherdegree_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
ref_hda_inactivepursuitofhigherdegree_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_hda_name"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_hda_inactivepursuitofhigherdegree->hda_name->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_hda_inActivePursuitofHigherDegree"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->FldErrMsg()) ?>");

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
ref_hda_inactivepursuitofhigherdegree_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_hda_inactivepursuitofhigherdegree_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_hda_inactivepursuitofhigherdegree_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_hda_inactivepursuitofhigherdegree_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_hda_inactivepursuitofhigherdegree->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_hda_inactivepursuitofhigherdegree->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_hda_inactivepursuitofhigherdegree_edit->ShowPageHeader(); ?>
<?php
$ref_hda_inactivepursuitofhigherdegree_edit->ShowMessage();
?>
<form name="fref_hda_inactivepursuitofhigherdegreeedit" id="fref_hda_inactivepursuitofhigherdegreeedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return ref_hda_inactivepursuitofhigherdegree_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="ref_hda_inactivepursuitofhigherdegree">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($ref_hda_inactivepursuitofhigherdegree->hda_ID->Visible) { // hda_ID ?>
	<tr id="r_hda_ID"<?php echo $ref_hda_inactivepursuitofhigherdegree->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_ID->FldCaption() ?></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_ID->CellAttributes() ?>><span id="el_hda_ID">
<div<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_ID->ViewAttributes() ?>><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_ID->EditValue ?></div>
<input type="hidden" name="x_hda_ID" id="x_hda_ID" value="<?php echo up_HtmlEncode($ref_hda_inactivepursuitofhigherdegree->hda_ID->CurrentValue) ?>">
</span><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_hda_inactivepursuitofhigherdegree->hda_name->Visible) { // hda_name ?>
	<tr id="r_hda_name"<?php echo $ref_hda_inactivepursuitofhigherdegree->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_name->FldCaption() ?></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_name->CellAttributes() ?>><span id="el_hda_name">
<input type="text" name="x_hda_name" id="x_hda_name" size="30" value="<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_name->EditValue ?>"<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_name->EditAttributes() ?>>
</span><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->Visible) { // hda_inActivePursuitofHigherDegree ?>
	<tr id="r_hda_inActivePursuitofHigherDegree"<?php echo $ref_hda_inactivepursuitofhigherdegree->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->FldCaption() ?></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->CellAttributes() ?>><span id="el_hda_inActivePursuitofHigherDegree">
<input type="text" name="x_hda_inActivePursuitofHigherDegree" id="x_hda_inActivePursuitofHigherDegree" size="30" value="<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->EditValue ?>"<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->EditAttributes() ?>>
</span><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->Visible) { // hda_degreeLevel_degrees ?>
	<tr id="r_hda_degreeLevel_degrees"<?php echo $ref_hda_inactivepursuitofhigherdegree->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->FldCaption() ?></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CellAttributes() ?>><span id="el_hda_degreeLevel_degrees">
<select id="x_hda_degreeLevel_degrees" name="x_hda_degreeLevel_degrees"<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->EditAttributes() ?>>
<?php
if (is_array($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->EditValue)) {
	$arwrk = $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->Visible) { // hda_degreeLevel_faculty_ID ?>
	<tr id="r_hda_degreeLevel_faculty_ID"<?php echo $ref_hda_inactivepursuitofhigherdegree->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->FldCaption() ?></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CellAttributes() ?>><span id="el_hda_degreeLevel_faculty_ID">
<select id="x_hda_degreeLevel_faculty_ID" name="x_hda_degreeLevel_faculty_ID"<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->EditAttributes() ?>>
<?php
if (is_array($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->EditValue)) {
	$arwrk = $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->Visible) { // hda_isEnrolledOrInResidence ?>
	<tr id="r_hda_isEnrolledOrInResidence"<?php echo $ref_hda_inactivepursuitofhigherdegree->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->FldCaption() ?></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->CellAttributes() ?>><span id="el_hda_isEnrolledOrInResidence">
<input type="text" name="x_hda_isEnrolledOrInResidence" id="x_hda_isEnrolledOrInResidence" size="30" maxlength="255" value="<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->EditValue ?>"<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->EditAttributes() ?>>
</span><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->Visible) { // hda_hasEarnedCreditUnits ?>
	<tr id="r_hda_hasEarnedCreditUnits"<?php echo $ref_hda_inactivepursuitofhigherdegree->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->FldCaption() ?></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->CellAttributes() ?>><span id="el_hda_hasEarnedCreditUnits">
<input type="text" name="x_hda_hasEarnedCreditUnits" id="x_hda_hasEarnedCreditUnits" size="30" maxlength="255" value="<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->EditValue ?>"<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->EditAttributes() ?>>
</span><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ref_hda_inactivepursuitofhigherdegree->hda_candidate->Visible) { // hda_candidate ?>
	<tr id="r_hda_candidate"<?php echo $ref_hda_inactivepursuitofhigherdegree->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_candidate->FldCaption() ?></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_candidate->CellAttributes() ?>><span id="el_hda_candidate">
<input type="text" name="x_hda_candidate" id="x_hda_candidate" size="30" maxlength="255" value="<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_candidate->EditValue ?>"<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_candidate->EditAttributes() ?>>
</span><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_candidate->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$ref_hda_inactivepursuitofhigherdegree_edit->ShowPageFooter();
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
$ref_hda_inactivepursuitofhigherdegree_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_hda_inactivepursuitofhigherdegree_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'ref_hda_inactivepursuitofhigherdegree';

	// Page object name
	var $PageObjName = 'ref_hda_inactivepursuitofhigherdegree_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_hda_inactivepursuitofhigherdegree;
		if ($ref_hda_inactivepursuitofhigherdegree->UseTokenInUrl) $PageUrl .= "t=" . $ref_hda_inactivepursuitofhigherdegree->TableVar . "&"; // Add page token
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
		global $objForm, $ref_hda_inactivepursuitofhigherdegree;
		if ($ref_hda_inactivepursuitofhigherdegree->UseTokenInUrl) {
			if ($objForm)
				return ($ref_hda_inactivepursuitofhigherdegree->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_hda_inactivepursuitofhigherdegree->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_hda_inactivepursuitofhigherdegree_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_hda_inactivepursuitofhigherdegree)
		if (!isset($GLOBALS["ref_hda_inactivepursuitofhigherdegree"])) {
			$GLOBALS["ref_hda_inactivepursuitofhigherdegree"] = new cref_hda_inactivepursuitofhigherdegree();
			$GLOBALS["Table"] =& $GLOBALS["ref_hda_inactivepursuitofhigherdegree"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_hda_inactivepursuitofhigherdegree', TRUE);

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
		global $ref_hda_inactivepursuitofhigherdegree;

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
			$this->Page_Terminate("ref_hda_inactivepursuitofhigherdegreelist.php");
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
		global $objForm, $Language, $gsFormError, $ref_hda_inactivepursuitofhigherdegree;

		// Load key from QueryString
		if (@$_GET["hda_ID"] <> "")
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->setQueryStringValue($_GET["hda_ID"]);
		if (@$_POST["a_edit"] <> "") {
			$ref_hda_inactivepursuitofhigherdegree->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$ref_hda_inactivepursuitofhigherdegree->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$ref_hda_inactivepursuitofhigherdegree->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$ref_hda_inactivepursuitofhigherdegree->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($ref_hda_inactivepursuitofhigherdegree->hda_ID->CurrentValue == "")
			$this->Page_Terminate("ref_hda_inactivepursuitofhigherdegreelist.php"); // Invalid key, return to list
		switch ($ref_hda_inactivepursuitofhigherdegree->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("ref_hda_inactivepursuitofhigherdegreelist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$ref_hda_inactivepursuitofhigherdegree->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $ref_hda_inactivepursuitofhigherdegree->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$ref_hda_inactivepursuitofhigherdegree->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$ref_hda_inactivepursuitofhigherdegree->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$ref_hda_inactivepursuitofhigherdegree->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $ref_hda_inactivepursuitofhigherdegree;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $ref_hda_inactivepursuitofhigherdegree;
		if (!$ref_hda_inactivepursuitofhigherdegree->hda_ID->FldIsDetailKey)
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->setFormValue($objForm->GetValue("x_hda_ID"));
		if (!$ref_hda_inactivepursuitofhigherdegree->hda_name->FldIsDetailKey) {
			$ref_hda_inactivepursuitofhigherdegree->hda_name->setFormValue($objForm->GetValue("x_hda_name"));
		}
		if (!$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->FldIsDetailKey) {
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->setFormValue($objForm->GetValue("x_hda_inActivePursuitofHigherDegree"));
		}
		if (!$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->FldIsDetailKey) {
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->setFormValue($objForm->GetValue("x_hda_degreeLevel_degrees"));
		}
		if (!$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->FldIsDetailKey) {
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->setFormValue($objForm->GetValue("x_hda_degreeLevel_faculty_ID"));
		}
		if (!$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->FldIsDetailKey) {
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->setFormValue($objForm->GetValue("x_hda_isEnrolledOrInResidence"));
		}
		if (!$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->FldIsDetailKey) {
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->setFormValue($objForm->GetValue("x_hda_hasEarnedCreditUnits"));
		}
		if (!$ref_hda_inactivepursuitofhigherdegree->hda_candidate->FldIsDetailKey) {
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->setFormValue($objForm->GetValue("x_hda_candidate"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $ref_hda_inactivepursuitofhigherdegree;
		$this->LoadRow();
		$ref_hda_inactivepursuitofhigherdegree->hda_ID->CurrentValue = $ref_hda_inactivepursuitofhigherdegree->hda_ID->FormValue;
		$ref_hda_inactivepursuitofhigherdegree->hda_name->CurrentValue = $ref_hda_inactivepursuitofhigherdegree->hda_name->FormValue;
		$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->CurrentValue = $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->FormValue;
		$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CurrentValue = $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->FormValue;
		$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CurrentValue = $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->FormValue;
		$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->CurrentValue = $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->FormValue;
		$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->CurrentValue = $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->FormValue;
		$ref_hda_inactivepursuitofhigherdegree->hda_candidate->CurrentValue = $ref_hda_inactivepursuitofhigherdegree->hda_candidate->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_hda_inactivepursuitofhigherdegree;
		$sFilter = $ref_hda_inactivepursuitofhigherdegree->KeyFilter();

		// Call Row Selecting event
		$ref_hda_inactivepursuitofhigherdegree->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_hda_inactivepursuitofhigherdegree->CurrentFilter = $sFilter;
		$sSql = $ref_hda_inactivepursuitofhigherdegree->SQL();
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
		global $conn, $ref_hda_inactivepursuitofhigherdegree;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_hda_inactivepursuitofhigherdegree->Row_Selected($row);
		$ref_hda_inactivepursuitofhigherdegree->hda_ID->setDbValue($rs->fields('hda_ID'));
		$ref_hda_inactivepursuitofhigherdegree->hda_name->setDbValue($rs->fields('hda_name'));
		$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->setDbValue($rs->fields('hda_inActivePursuitofHigherDegree'));
		$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->setDbValue($rs->fields('hda_degreeLevel_degrees'));
		$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->setDbValue($rs->fields('hda_degreeLevel_faculty_ID'));
		$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->setDbValue($rs->fields('hda_isEnrolledOrInResidence'));
		$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->setDbValue($rs->fields('hda_hasEarnedCreditUnits'));
		$ref_hda_inactivepursuitofhigherdegree->hda_candidate->setDbValue($rs->fields('hda_candidate'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_hda_inactivepursuitofhigherdegree;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_hda_inactivepursuitofhigherdegree->Row_Rendering();

		// Common render codes for all row types
		// hda_ID
		// hda_name
		// hda_inActivePursuitofHigherDegree
		// hda_degreeLevel_degrees
		// hda_degreeLevel_faculty_ID
		// hda_isEnrolledOrInResidence
		// hda_hasEarnedCreditUnits
		// hda_candidate

		if ($ref_hda_inactivepursuitofhigherdegree->RowType == UP_ROWTYPE_VIEW) { // View row

			// hda_ID
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_ID->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->ViewCustomAttributes = "";

			// hda_name
			$ref_hda_inactivepursuitofhigherdegree->hda_name->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_name->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_name->ViewCustomAttributes = "";

			// hda_inActivePursuitofHigherDegree
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->ViewCustomAttributes = "";

			// hda_degreeLevel_degrees
			if (strval($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CurrentValue) <> "") {
				$sFilterWrk = "`degreeLevel_ID` = " . up_AdjustSql($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreeLevel_name` FROM `ref_degreelevel_degrees`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `degreeLevel_name` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->ViewValue = $rswrk->fields('degreeLevel_name');
					$rswrk->Close();
				} else {
					$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CurrentValue;
				}
			} else {
				$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->ViewValue = NULL;
			}
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->ViewCustomAttributes = "";

			// hda_degreeLevel_faculty_ID
			if (strval($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CurrentValue) <> "") {
				$sFilterWrk = "`degreelevelFaculty_ID` = " . up_AdjustSql($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreelevelFaculty_name` FROM `ref_degreelevel_faculty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `degreelevelFaculty_name` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->ViewValue = $rswrk->fields('degreelevelFaculty_name');
					$rswrk->Close();
				} else {
					$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CurrentValue;
				}
			} else {
				$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->ViewValue = NULL;
			}
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->ViewCustomAttributes = "";

			// hda_isEnrolledOrInResidence
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->ViewCustomAttributes = "";

			// hda_hasEarnedCreditUnits
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->ViewCustomAttributes = "";

			// hda_candidate
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_candidate->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->ViewCustomAttributes = "";

			// hda_ID
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->TooltipValue = "";

			// hda_name
			$ref_hda_inactivepursuitofhigherdegree->hda_name->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_name->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_name->TooltipValue = "";

			// hda_inActivePursuitofHigherDegree
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->TooltipValue = "";

			// hda_degreeLevel_degrees
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->TooltipValue = "";

			// hda_degreeLevel_faculty_ID
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->TooltipValue = "";

			// hda_isEnrolledOrInResidence
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->TooltipValue = "";

			// hda_hasEarnedCreditUnits
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->TooltipValue = "";

			// hda_candidate
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->TooltipValue = "";
		} elseif ($ref_hda_inactivepursuitofhigherdegree->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// hda_ID
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->EditCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->EditValue = $ref_hda_inactivepursuitofhigherdegree->hda_ID->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->ViewCustomAttributes = "";

			// hda_name
			$ref_hda_inactivepursuitofhigherdegree->hda_name->EditCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_name->EditValue = up_HtmlEncode($ref_hda_inactivepursuitofhigherdegree->hda_name->CurrentValue);

			// hda_inActivePursuitofHigherDegree
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->EditCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->EditValue = up_HtmlEncode($ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->CurrentValue);

			// hda_degreeLevel_degrees
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `degreeLevel_ID`, `degreeLevel_name` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `ref_degreelevel_degrees`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `degreeLevel_name` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->EditValue = $arwrk;

			// hda_degreeLevel_faculty_ID
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `degreelevelFaculty_ID`, `degreelevelFaculty_name` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `ref_degreelevel_faculty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `degreelevelFaculty_name` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->EditValue = $arwrk;

			// hda_isEnrolledOrInResidence
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->EditCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->EditValue = up_HtmlEncode($ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->CurrentValue);

			// hda_hasEarnedCreditUnits
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->EditCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->EditValue = up_HtmlEncode($ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->CurrentValue);

			// hda_candidate
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->EditCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->EditValue = up_HtmlEncode($ref_hda_inactivepursuitofhigherdegree->hda_candidate->CurrentValue);

			// Edit refer script
			// hda_ID

			$ref_hda_inactivepursuitofhigherdegree->hda_ID->HrefValue = "";

			// hda_name
			$ref_hda_inactivepursuitofhigherdegree->hda_name->HrefValue = "";

			// hda_inActivePursuitofHigherDegree
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->HrefValue = "";

			// hda_degreeLevel_degrees
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->HrefValue = "";

			// hda_degreeLevel_faculty_ID
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->HrefValue = "";

			// hda_isEnrolledOrInResidence
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->HrefValue = "";

			// hda_hasEarnedCreditUnits
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->HrefValue = "";

			// hda_candidate
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->HrefValue = "";
		}
		if ($ref_hda_inactivepursuitofhigherdegree->RowType == UP_ROWTYPE_ADD ||
			$ref_hda_inactivepursuitofhigherdegree->RowType == UP_ROWTYPE_EDIT ||
			$ref_hda_inactivepursuitofhigherdegree->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$ref_hda_inactivepursuitofhigherdegree->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($ref_hda_inactivepursuitofhigherdegree->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_hda_inactivepursuitofhigherdegree->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $ref_hda_inactivepursuitofhigherdegree;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($ref_hda_inactivepursuitofhigherdegree->hda_name->FormValue)) {
			up_AddMessage($gsFormError, $ref_hda_inactivepursuitofhigherdegree->hda_name->FldErrMsg());
		}
		if (!up_CheckInteger($ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->FormValue)) {
			up_AddMessage($gsFormError, $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->FldErrMsg());
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
		global $conn, $Security, $Language, $ref_hda_inactivepursuitofhigherdegree;
		$sFilter = $ref_hda_inactivepursuitofhigherdegree->KeyFilter();
		$ref_hda_inactivepursuitofhigherdegree->CurrentFilter = $sFilter;
		$sSql = $ref_hda_inactivepursuitofhigherdegree->SQL();
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

			// hda_name
			$ref_hda_inactivepursuitofhigherdegree->hda_name->SetDbValueDef($rsnew, $ref_hda_inactivepursuitofhigherdegree->hda_name->CurrentValue, NULL, $ref_hda_inactivepursuitofhigherdegree->hda_name->ReadOnly);

			// hda_inActivePursuitofHigherDegree
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->SetDbValueDef($rsnew, $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->CurrentValue, NULL, $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->ReadOnly);

			// hda_degreeLevel_degrees
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->SetDbValueDef($rsnew, $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CurrentValue, NULL, $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->ReadOnly);

			// hda_degreeLevel_faculty_ID
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->SetDbValueDef($rsnew, $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CurrentValue, NULL, $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->ReadOnly);

			// hda_isEnrolledOrInResidence
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->SetDbValueDef($rsnew, $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->CurrentValue, NULL, $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->ReadOnly);

			// hda_hasEarnedCreditUnits
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->SetDbValueDef($rsnew, $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->CurrentValue, NULL, $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->ReadOnly);

			// hda_candidate
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->SetDbValueDef($rsnew, $ref_hda_inactivepursuitofhigherdegree->hda_candidate->CurrentValue, NULL, $ref_hda_inactivepursuitofhigherdegree->hda_candidate->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $ref_hda_inactivepursuitofhigherdegree->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($ref_hda_inactivepursuitofhigherdegree->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($ref_hda_inactivepursuitofhigherdegree->CancelMessage <> "") {
					$this->setFailureMessage($ref_hda_inactivepursuitofhigherdegree->CancelMessage);
					$ref_hda_inactivepursuitofhigherdegree->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$ref_hda_inactivepursuitofhigherdegree->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_hda_inactivepursuitofhigherdegree';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $ref_hda_inactivepursuitofhigherdegree;
		$table = 'ref_hda_inactivepursuitofhigherdegree';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['hda_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($ref_hda_inactivepursuitofhigherdegree->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_hda_inactivepursuitofhigherdegree->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($ref_hda_inactivepursuitofhigherdegree->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($ref_hda_inactivepursuitofhigherdegree->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
