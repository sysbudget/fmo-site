<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_9_m_sa_mfo_questionsinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_9_m_sa_mfo_questions_edit = new cfrm_9_m_sa_mfo_questions_edit();
$Page =& $frm_9_m_sa_mfo_questions_edit;

// Page init
$frm_9_m_sa_mfo_questions_edit->Page_Init();

// Page main
$frm_9_m_sa_mfo_questions_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_9_m_sa_mfo_questions_edit = new up_Page("frm_9_m_sa_mfo_questions_edit");

// page properties
frm_9_m_sa_mfo_questions_edit.PageID = "edit"; // page ID
frm_9_m_sa_mfo_questions_edit.FormID = "ffrm_9_m_sa_mfo_questionsedit"; // form ID
var UP_PAGE_ID = frm_9_m_sa_mfo_questions_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_9_m_sa_mfo_questions_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_mfo_question_online_pi_seq"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_mfo_question_online_computation_du_cu_summary"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FldErrMsg()) ?>");

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
frm_9_m_sa_mfo_questions_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_9_m_sa_mfo_questions_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_9_m_sa_mfo_questions_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_9_m_sa_mfo_questions_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_9_m_sa_mfo_questions->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_9_m_sa_mfo_questions->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_9_m_sa_mfo_questions_edit->ShowPageHeader(); ?>
<?php
$frm_9_m_sa_mfo_questions_edit->ShowMessage();
?>
<form name="ffrm_9_m_sa_mfo_questionsedit" id="ffrm_9_m_sa_mfo_questionsedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return frm_9_m_sa_mfo_questions_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="frm_9_m_sa_mfo_questions">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->Visible) { // mfo_question_online_pi_seq ?>
	<tr id="r_mfo_question_online_pi_seq"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CellAttributes() ?>><span id="el_mfo_question_online_pi_seq">
<input type="text" name="x_mfo_question_online_pi_seq" id="x_mfo_question_online_pi_seq" size="30" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->Visible) { // mfo_question_online_mfo_name ?>
	<tr id="r_mfo_question_online_mfo_name"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CellAttributes() ?>><span id="el_mfo_question_online_mfo_name">
<input type="text" name="x_mfo_question_online_mfo_name" id="x_mfo_question_online_mfo_name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->Visible) { // mfo_question_online_pi_question ?>
	<tr id="r_mfo_question_online_pi_question"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CellAttributes() ?>><span id="el_mfo_question_online_pi_question">
<input type="text" name="x_mfo_question_online_pi_question" id="x_mfo_question_online_pi_question" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->Visible) { // mfo_question_online_computation_du_cu_summary_name ?>
	<tr id="r_mfo_question_online_computation_du_cu_summary_name"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CellAttributes() ?>><span id="el_mfo_question_online_computation_du_cu_summary_name">
<input type="text" name="x_mfo_question_online_computation_du_cu_summary_name" id="x_mfo_question_online_computation_du_cu_summary_name" size="30" maxlength="45" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->Visible) { // mfo_question_online_computation_du_cu_summary ?>
	<tr id="r_mfo_question_online_computation_du_cu_summary"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CellAttributes() ?>><span id="el_mfo_question_online_computation_du_cu_summary">
<input type="text" name="x_mfo_question_online_computation_du_cu_summary" id="x_mfo_question_online_computation_du_cu_summary" size="30" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_mfo_question_id" id="x_mfo_question_id" value="<?php echo up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$frm_9_m_sa_mfo_questions_edit->ShowPageFooter();
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
$frm_9_m_sa_mfo_questions_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_9_m_sa_mfo_questions_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'frm_9_m_sa_mfo_questions';

	// Page object name
	var $PageObjName = 'frm_9_m_sa_mfo_questions_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_9_m_sa_mfo_questions;
		if ($frm_9_m_sa_mfo_questions->UseTokenInUrl) $PageUrl .= "t=" . $frm_9_m_sa_mfo_questions->TableVar . "&"; // Add page token
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
		global $objForm, $frm_9_m_sa_mfo_questions;
		if ($frm_9_m_sa_mfo_questions->UseTokenInUrl) {
			if ($objForm)
				return ($frm_9_m_sa_mfo_questions->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_9_m_sa_mfo_questions->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_9_m_sa_mfo_questions_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_mfo_questions)
		if (!isset($GLOBALS["frm_9_m_sa_mfo_questions"])) {
			$GLOBALS["frm_9_m_sa_mfo_questions"] = new cfrm_9_m_sa_mfo_questions();
			$GLOBALS["Table"] =& $GLOBALS["frm_9_m_sa_mfo_questions"];
		}

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_9_m_sa_mfo_questions', TRUE);

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
		global $frm_9_m_sa_mfo_questions;

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
			$this->Page_Terminate("frm_9_m_sa_mfo_questionslist.php");
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
		global $objForm, $Language, $gsFormError, $frm_9_m_sa_mfo_questions;

		// Load key from QueryString
		if (@$_GET["mfo_question_id"] <> "")
			$frm_9_m_sa_mfo_questions->mfo_question_id->setQueryStringValue($_GET["mfo_question_id"]);
		if (@$_POST["a_edit"] <> "") {
			$frm_9_m_sa_mfo_questions->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$frm_9_m_sa_mfo_questions->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$frm_9_m_sa_mfo_questions->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$frm_9_m_sa_mfo_questions->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($frm_9_m_sa_mfo_questions->mfo_question_id->CurrentValue == "")
			$this->Page_Terminate("frm_9_m_sa_mfo_questionslist.php"); // Invalid key, return to list
		switch ($frm_9_m_sa_mfo_questions->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("frm_9_m_sa_mfo_questionslist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$frm_9_m_sa_mfo_questions->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $frm_9_m_sa_mfo_questions->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$frm_9_m_sa_mfo_questions->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$frm_9_m_sa_mfo_questions->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$frm_9_m_sa_mfo_questions->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_9_m_sa_mfo_questions;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_9_m_sa_mfo_questions;
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->setFormValue($objForm->GetValue("x_mfo_question_online_pi_seq"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->setFormValue($objForm->GetValue("x_mfo_question_online_mfo_name"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->setFormValue($objForm->GetValue("x_mfo_question_online_pi_question"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->setFormValue($objForm->GetValue("x_mfo_question_online_computation_du_cu_summary_name"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->setFormValue($objForm->GetValue("x_mfo_question_online_computation_du_cu_summary"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_id->FldIsDetailKey)
			$frm_9_m_sa_mfo_questions->mfo_question_id->setFormValue($objForm->GetValue("x_mfo_question_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_9_m_sa_mfo_questions;
		$this->LoadRow();
		$frm_9_m_sa_mfo_questions->mfo_question_id->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_id->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_9_m_sa_mfo_questions;
		$sFilter = $frm_9_m_sa_mfo_questions->KeyFilter();

		// Call Row Selecting event
		$frm_9_m_sa_mfo_questions->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_9_m_sa_mfo_questions->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_mfo_questions->SQL();
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
		global $conn, $frm_9_m_sa_mfo_questions;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_9_m_sa_mfo_questions->Row_Selected($row);
		$frm_9_m_sa_mfo_questions->mfo_question_id->setDbValue($rs->fields('mfo_question_id'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->setDbValue($rs->fields('mfo_question_online_pi_seq'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->setDbValue($rs->fields('mfo_question_online_mfo_name'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->setDbValue($rs->fields('mfo_question_online_pi_question'));
		$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->setDbValue($rs->fields('mfo_question_expected_answer'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->setDbValue($rs->fields('mfo_question_online_insert_question_mfo'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->setDbValue($rs->fields('mfo_question_online_insert_question_mfo_name_rep'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->setDbValue($rs->fields('mfo_question_online_computation_du_cu_summary_name'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->setDbValue($rs->fields('mfo_question_online_computation_du_cu_summary'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->setDbValue($rs->fields('mfo_question_online_computation_denominator'));
		$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->setDbValue($rs->fields('mfo_question_supporting_document_requirement'));
		$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->setDbValue($rs->fields('mfo_question_expected_trend'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->setDbValue($rs->fields('mfo_question_online_ask_y_n'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->setDbValue($rs->fields('mfo_question_online_pi_question_numerator'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->setDbValue($rs->fields('mfo_question_online_pi_question_denominator'));
		$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->setDbValue($rs->fields('mfo_question_expected_numerator'));
		$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->setDbValue($rs->fields('mfo_question_expected_denominator'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->setDbValue($rs->fields('mfo_question_report_mfo_name'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->setDbValue($rs->fields('mfo_question_report_form_a_pi_question'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->setDbValue($rs->fields('mfo_question_report_form_a_1_mfo'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->setDbValue($rs->fields('mfo_question_report_form_a_1_sequence'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->setDbValue($rs->fields('mfo_question_report_form_a_gaa_value'));
		$frm_9_m_sa_mfo_questions->pi_no->setDbValue($rs->fields('pi_no'));
		$frm_9_m_sa_mfo_questions->pi_sub->setDbValue($rs->fields('pi_sub'));
		$frm_9_m_sa_mfo_questions->iatf_2013->setDbValue($rs->fields('iatf_2013'));
		$frm_9_m_sa_mfo_questions->iatf_2014->setDbValue($rs->fields('iatf_2014'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_mfo_questions;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_9_m_sa_mfo_questions->Row_Rendering();

		// Common render codes for all row types
		// mfo_question_id
		// mfo_question_online_pi_seq
		// mfo_question_online_mfo_name
		// mfo_question_online_pi_question
		// mfo_question_expected_answer
		// mfo_question_online_insert_question_mfo
		// mfo_question_online_insert_question_mfo_name_rep
		// mfo_question_online_computation_du_cu_summary_name
		// mfo_question_online_computation_du_cu_summary
		// mfo_question_online_computation_denominator
		// mfo_question_supporting_document_requirement
		// mfo_question_expected_trend
		// mfo_question_online_ask_y_n
		// mfo_question_online_pi_question_numerator
		// mfo_question_online_pi_question_denominator
		// mfo_question_expected_numerator
		// mfo_question_expected_denominator
		// mfo_question_report_mfo_name
		// mfo_question_report_form_a_pi_question
		// mfo_question_report_form_a_1_mfo
		// mfo_question_report_form_a_1_sequence
		// mfo_question_report_form_a_gaa_value
		// pi_no
		// pi_sub
		// iatf_2013
		// iatf_2014

		if ($frm_9_m_sa_mfo_questions->RowType == UP_ROWTYPE_VIEW) { // View row

			// mfo_question_online_pi_seq
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->ViewCustomAttributes = "";

			// mfo_question_online_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->ViewCustomAttributes = "";

			// mfo_question_online_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->ViewCustomAttributes = "";

			// mfo_question_online_computation_du_cu_summary_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->ViewCustomAttributes = "";

			// mfo_question_online_computation_du_cu_summary
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->ViewCustomAttributes = "";

			// mfo_question_online_pi_seq
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->TooltipValue = "";

			// mfo_question_online_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->TooltipValue = "";

			// mfo_question_online_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->TooltipValue = "";

			// mfo_question_online_computation_du_cu_summary_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->TooltipValue = "";

			// mfo_question_online_computation_du_cu_summary
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->TooltipValue = "";
		} elseif ($frm_9_m_sa_mfo_questions->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// mfo_question_online_pi_seq
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CurrentValue);

			// mfo_question_online_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CurrentValue);

			// mfo_question_online_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CurrentValue);

			// mfo_question_online_computation_du_cu_summary_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CurrentValue);

			// mfo_question_online_computation_du_cu_summary
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CurrentValue);

			// Edit refer script
			// mfo_question_online_pi_seq

			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->HrefValue = "";

			// mfo_question_online_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->HrefValue = "";

			// mfo_question_online_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->HrefValue = "";

			// mfo_question_online_computation_du_cu_summary_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->HrefValue = "";

			// mfo_question_online_computation_du_cu_summary
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->HrefValue = "";
		}
		if ($frm_9_m_sa_mfo_questions->RowType == UP_ROWTYPE_ADD ||
			$frm_9_m_sa_mfo_questions->RowType == UP_ROWTYPE_EDIT ||
			$frm_9_m_sa_mfo_questions->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_9_m_sa_mfo_questions->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_9_m_sa_mfo_questions->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_9_m_sa_mfo_questions->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_9_m_sa_mfo_questions;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FldErrMsg());
		}
		if (!up_CheckInteger($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FldErrMsg());
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
		global $conn, $Security, $Language, $frm_9_m_sa_mfo_questions;
		$sFilter = $frm_9_m_sa_mfo_questions->KeyFilter();
		$frm_9_m_sa_mfo_questions->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_mfo_questions->SQL();
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

			// mfo_question_online_pi_seq
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CurrentValue, NULL, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->ReadOnly);

			// mfo_question_online_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CurrentValue, NULL, $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->ReadOnly);

			// mfo_question_online_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CurrentValue, NULL, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->ReadOnly);

			// mfo_question_online_computation_du_cu_summary_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CurrentValue, NULL, $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->ReadOnly);

			// mfo_question_online_computation_du_cu_summary
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CurrentValue, NULL, $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_9_m_sa_mfo_questions->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_9_m_sa_mfo_questions->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_9_m_sa_mfo_questions->CancelMessage <> "") {
					$this->setFailureMessage($frm_9_m_sa_mfo_questions->CancelMessage);
					$frm_9_m_sa_mfo_questions->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_9_m_sa_mfo_questions->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
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
