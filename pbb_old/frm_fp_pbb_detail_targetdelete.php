<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_fp_pbb_detail_targetinfo.php" ?>
<?php include_once "frm_fp_rep_t_completion_status_unit_mfoinfo.php" ?>
<?php include_once "frm_fp_rep_t_completion_status_unit_piinfo.php" ?>
<?php include_once "frm_fp_rep_ta_form_a_cuinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_fp_pbb_detail_target_delete = new cfrm_fp_pbb_detail_target_delete();
$Page =& $frm_fp_pbb_detail_target_delete;

// Page init
$frm_fp_pbb_detail_target_delete->Page_Init();

// Page main
$frm_fp_pbb_detail_target_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_pbb_detail_target_delete = new up_Page("frm_fp_pbb_detail_target_delete");

// page properties
frm_fp_pbb_detail_target_delete.PageID = "delete"; // page ID
frm_fp_pbb_detail_target_delete.FormID = "ffrm_fp_pbb_detail_targetdelete"; // form ID
var UP_PAGE_ID = frm_fp_pbb_detail_target_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_fp_pbb_detail_target_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_pbb_detail_target_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_pbb_detail_target_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_pbb_detail_target_delete.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
//-->

</script>
<?php

// Load records for display
if ($frm_fp_pbb_detail_target_delete->Recordset = $frm_fp_pbb_detail_target_delete->LoadRecordset())
	$frm_fp_pbb_detail_target_deleteTotalRecs = $frm_fp_pbb_detail_target_delete->Recordset->RecordCount(); // Get record count
if ($frm_fp_pbb_detail_target_deleteTotalRecs <= 0) { // No record found, exit
	if ($frm_fp_pbb_detail_target_delete->Recordset)
		$frm_fp_pbb_detail_target_delete->Recordset->Close();
	$frm_fp_pbb_detail_target_delete->Page_Terminate("frm_fp_pbb_detail_targetlist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_pbb_detail_target->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_fp_pbb_detail_target->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_fp_pbb_detail_target_delete->ShowPageHeader(); ?>
<?php
$frm_fp_pbb_detail_target_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="frm_fp_pbb_detail_target">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($frm_fp_pbb_detail_target_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $frm_fp_pbb_detail_target->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->applicable->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->cu_unit_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->mfo_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->target->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->t_numerator->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->t_denominator->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->t_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->t_cutOffDate_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->accomplishment->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->a_numerator->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->a_denominator->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->a_supporting_docs->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->a_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->a_cutOffDate_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->a_rating_above_90->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->a_rating_below_90->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_target->a_supporting_docs_comparison->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$frm_fp_pbb_detail_target_delete->RecCnt = 0;
$i = 0;
while (!$frm_fp_pbb_detail_target_delete->Recordset->EOF) {
	$frm_fp_pbb_detail_target_delete->RecCnt++;

	// Set row properties
	$frm_fp_pbb_detail_target->ResetAttrs();
	$frm_fp_pbb_detail_target->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$frm_fp_pbb_detail_target_delete->LoadRowValues($frm_fp_pbb_detail_target_delete->Recordset);

	// Render row
	$frm_fp_pbb_detail_target_delete->RenderRow();
?>
	<tr<?php echo $frm_fp_pbb_detail_target->RowAttributes() ?>>
		<td<?php echo $frm_fp_pbb_detail_target->applicable->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->applicable->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->applicable->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->cu_unit_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->mfo_name->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->mfo_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->mfo_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->target->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->target->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->target->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->t_numerator->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->t_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->t_numerator->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->t_denominator->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->t_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->t_denominator->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->t_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->t_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->t_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->t_cutOffDate_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->accomplishment->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->accomplishment->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->accomplishment->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->a_numerator->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->a_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->a_numerator->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->a_denominator->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->a_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->a_denominator->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->a_supporting_docs->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->a_supporting_docs->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->a_supporting_docs->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->a_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->a_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->a_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->a_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->a_cutOffDate_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->a_rating_above_90->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->a_rating_above_90->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->a_rating_above_90->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->a_rating_below_90->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->a_rating_below_90->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->a_rating_below_90->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_target->a_supporting_docs_comparison->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_target->a_supporting_docs_comparison->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_target->a_supporting_docs_comparison->ListViewValue() ?></div></td>
	</tr>
<?php
	$frm_fp_pbb_detail_target_delete->Recordset->MoveNext();
}
$frm_fp_pbb_detail_target_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$frm_fp_pbb_detail_target_delete->ShowPageFooter();
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
$frm_fp_pbb_detail_target_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_pbb_detail_target_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'frm_fp_pbb_detail_target';

	// Page object name
	var $PageObjName = 'frm_fp_pbb_detail_target_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_pbb_detail_target;
		if ($frm_fp_pbb_detail_target->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_pbb_detail_target->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_pbb_detail_target;
		if ($frm_fp_pbb_detail_target->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_pbb_detail_target->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_pbb_detail_target->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_pbb_detail_target_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_pbb_detail_target)
		if (!isset($GLOBALS["frm_fp_pbb_detail_target"])) {
			$GLOBALS["frm_fp_pbb_detail_target"] = new cfrm_fp_pbb_detail_target();
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_pbb_detail_target"];
		}

		// Table object (frm_fp_rep_t_completion_status_unit_mfo)
		if (!isset($GLOBALS['frm_fp_rep_t_completion_status_unit_mfo'])) $GLOBALS['frm_fp_rep_t_completion_status_unit_mfo'] = new cfrm_fp_rep_t_completion_status_unit_mfo();

		// Table object (frm_fp_rep_t_completion_status_unit_pi)
		if (!isset($GLOBALS['frm_fp_rep_t_completion_status_unit_pi'])) $GLOBALS['frm_fp_rep_t_completion_status_unit_pi'] = new cfrm_fp_rep_t_completion_status_unit_pi();

		// Table object (frm_fp_rep_ta_form_a_cu)
		if (!isset($GLOBALS['frm_fp_rep_ta_form_a_cu'])) $GLOBALS['frm_fp_rep_ta_form_a_cu'] = new cfrm_fp_rep_ta_form_a_cu();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_pbb_detail_target', TRUE);

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
		global $frm_fp_pbb_detail_target;

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
		if (!$Security->CanDelete()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("frm_fp_pbb_detail_targetlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_fp_pbb_detail_targetlist.php");
		}

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
	var $TotalRecs = 0;
	var $RecCnt;
	var $RecKeys = array();
	var $Recordset;

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $frm_fp_pbb_detail_target;

		// Load key parameters
		$this->RecKeys = $frm_fp_pbb_detail_target->GetRecordKeys(); // Load record keys
		$sFilter = $frm_fp_pbb_detail_target->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("frm_fp_pbb_detail_targetlist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in frm_fp_pbb_detail_target class, frm_fp_pbb_detail_targetinfo.php

		$frm_fp_pbb_detail_target->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$frm_fp_pbb_detail_target->CurrentAction = $_POST["a_delete"];
		} else {
			$frm_fp_pbb_detail_target->CurrentAction = "I"; // Display record
		}
		switch ($frm_fp_pbb_detail_target->CurrentAction) {
			case "D": // Delete
				$frm_fp_pbb_detail_target->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($frm_fp_pbb_detail_target->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_fp_pbb_detail_target;

		// Call Recordset Selecting event
		$frm_fp_pbb_detail_target->Recordset_Selecting($frm_fp_pbb_detail_target->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_fp_pbb_detail_target->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_fp_pbb_detail_target->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_pbb_detail_target;
		$sFilter = $frm_fp_pbb_detail_target->KeyFilter();

		// Call Row Selecting event
		$frm_fp_pbb_detail_target->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_pbb_detail_target->CurrentFilter = $sFilter;
		$sSql = $frm_fp_pbb_detail_target->SQL();
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
		global $conn, $frm_fp_pbb_detail_target;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_pbb_detail_target->Row_Selected($row);
		$frm_fp_pbb_detail_target->pbb_id->setDbValue($rs->fields('pbb_id'));
		$frm_fp_pbb_detail_target->applicable->setDbValue($rs->fields('applicable'));
		$frm_fp_pbb_detail_target->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_pbb_detail_target->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_fp_pbb_detail_target->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_fp_pbb_detail_target->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_fp_pbb_detail_target->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_pbb_detail_target->mfo_id->setDbValue($rs->fields('mfo_id'));
		$frm_fp_pbb_detail_target->mfo_sequence->setDbValue($rs->fields('mfo_sequence'));
		$frm_fp_pbb_detail_target->mfo->setDbValue($rs->fields('mfo'));
		$frm_fp_pbb_detail_target->pi_no->setDbValue($rs->fields('pi_no'));
		$frm_fp_pbb_detail_target->pi_sub->setDbValue($rs->fields('pi_sub'));
		$frm_fp_pbb_detail_target->mfo_name->setDbValue($rs->fields('mfo_name'));
		$frm_fp_pbb_detail_target->pi_question->setDbValue($rs->fields('pi_question'));
		$frm_fp_pbb_detail_target->target->setDbValue($rs->fields('target'));
		$frm_fp_pbb_detail_target->t_numerator->setDbValue($rs->fields('t_numerator'));
		$frm_fp_pbb_detail_target->t_numerator_qtr1->setDbValue($rs->fields('t_numerator_qtr1'));
		$frm_fp_pbb_detail_target->t_numerator_qtr2->setDbValue($rs->fields('t_numerator_qtr2'));
		$frm_fp_pbb_detail_target->t_numerator_qtr3->setDbValue($rs->fields('t_numerator_qtr3'));
		$frm_fp_pbb_detail_target->t_numerator_qtr4->setDbValue($rs->fields('t_numerator_qtr4'));
		$frm_fp_pbb_detail_target->t_denominator->setDbValue($rs->fields('t_denominator'));
		$frm_fp_pbb_detail_target->t_denominator_qtr1->setDbValue($rs->fields('t_denominator_qtr1'));
		$frm_fp_pbb_detail_target->t_denominator_qtr2->setDbValue($rs->fields('t_denominator_qtr2'));
		$frm_fp_pbb_detail_target->t_denominator_qtr3->setDbValue($rs->fields('t_denominator_qtr3'));
		$frm_fp_pbb_detail_target->t_denominator_qtr4->setDbValue($rs->fields('t_denominator_qtr4'));
		$frm_fp_pbb_detail_target->t_remarks->setDbValue($rs->fields('t_remarks'));
		$frm_fp_pbb_detail_target->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$frm_fp_pbb_detail_target->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_fp_pbb_detail_target->accomplishment->setDbValue($rs->fields('accomplishment'));
		$frm_fp_pbb_detail_target->a_numerator->setDbValue($rs->fields('a_numerator'));
		$frm_fp_pbb_detail_target->a_numerator_qtr1->setDbValue($rs->fields('a_numerator_qtr1'));
		$frm_fp_pbb_detail_target->a_numerator_qtr2->setDbValue($rs->fields('a_numerator_qtr2'));
		$frm_fp_pbb_detail_target->a_numerator_qtr3->setDbValue($rs->fields('a_numerator_qtr3'));
		$frm_fp_pbb_detail_target->a_numerator_qtr4->setDbValue($rs->fields('a_numerator_qtr4'));
		$frm_fp_pbb_detail_target->a_denominator->setDbValue($rs->fields('a_denominator'));
		$frm_fp_pbb_detail_target->a_denominator_qtr1->setDbValue($rs->fields('a_denominator_qtr1'));
		$frm_fp_pbb_detail_target->a_denominator_qtr2->setDbValue($rs->fields('a_denominator_qtr2'));
		$frm_fp_pbb_detail_target->a_denominator_qtr3->setDbValue($rs->fields('a_denominator_qtr3'));
		$frm_fp_pbb_detail_target->a_denominator_qtr4->setDbValue($rs->fields('a_denominator_qtr4'));
		$frm_fp_pbb_detail_target->a_supporting_docs->setDbValue($rs->fields('a_supporting_docs'));
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr1->setDbValue($rs->fields('a_supporting_docs_qtr1'));
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr2->setDbValue($rs->fields('a_supporting_docs_qtr2'));
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr3->setDbValue($rs->fields('a_supporting_docs_qtr3'));
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr4->setDbValue($rs->fields('a_supporting_docs_qtr4'));
		$frm_fp_pbb_detail_target->a_remarks->setDbValue($rs->fields('a_remarks'));
		$frm_fp_pbb_detail_target->a_cutOffDate->setDbValue($rs->fields('a_cutOffDate'));
		$frm_fp_pbb_detail_target->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
		$frm_fp_pbb_detail_target->a_rating->setDbValue($rs->fields('a_rating'));
		$frm_fp_pbb_detail_target->a_rating_above_90->setDbValue($rs->fields('a_rating_above_90'));
		$frm_fp_pbb_detail_target->a_rating_below_90->setDbValue($rs->fields('a_rating_below_90'));
		$frm_fp_pbb_detail_target->a_supporting_docs_comparison->setDbValue($rs->fields('a_supporting_docs_comparison'));
		$frm_fp_pbb_detail_target->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_fp_pbb_detail_target->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$frm_fp_pbb_detail_target->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_fp_pbb_detail_target->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_fp_pbb_detail_target->form_a_1_sequence->setDbValue($rs->fields('form_a_1_sequence'));
		$frm_fp_pbb_detail_target->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_fp_pbb_detail_target->a_startDate->setDbValue($rs->fields('a_startDate'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_pbb_detail_target;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_fp_pbb_detail_target->Row_Rendering();

		// Common render codes for all row types
		// pbb_id

		$frm_fp_pbb_detail_target->pbb_id->CellCssStyle = "white-space: nowrap;";

		// applicable
		$frm_fp_pbb_detail_target->applicable->CellCssStyle = "white-space: nowrap;";

		// units_id
		$frm_fp_pbb_detail_target->units_id->CellCssStyle = "white-space: nowrap;";

		// cu_sequence
		$frm_fp_pbb_detail_target->cu_sequence->CellCssStyle = "white-space: nowrap;";

		// cu_short_name
		$frm_fp_pbb_detail_target->cu_short_name->CellCssStyle = "white-space: nowrap;";

		// cu_unit_name
		$frm_fp_pbb_detail_target->cu_unit_name->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$frm_fp_pbb_detail_target->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// mfo_id
		$frm_fp_pbb_detail_target->mfo_id->CellCssStyle = "white-space: nowrap;";

		// mfo_sequence
		$frm_fp_pbb_detail_target->mfo_sequence->CellCssStyle = "white-space: nowrap;";

		// mfo
		$frm_fp_pbb_detail_target->mfo->CellCssStyle = "white-space: nowrap;";

		// pi_no
		$frm_fp_pbb_detail_target->pi_no->CellCssStyle = "white-space: nowrap;";

		// pi_sub
		$frm_fp_pbb_detail_target->pi_sub->CellCssStyle = "white-space: nowrap;";

		// mfo_name
		$frm_fp_pbb_detail_target->mfo_name->CellCssStyle = "white-space: nowrap;";

		// pi_question
		$frm_fp_pbb_detail_target->pi_question->CellCssStyle = "width: 400px; white-space: nowrap;";

		// target
		$frm_fp_pbb_detail_target->target->CellCssStyle = "white-space: nowrap;";

		// t_numerator
		$frm_fp_pbb_detail_target->t_numerator->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr1
		$frm_fp_pbb_detail_target->t_numerator_qtr1->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr2
		$frm_fp_pbb_detail_target->t_numerator_qtr2->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr3
		$frm_fp_pbb_detail_target->t_numerator_qtr3->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr4
		$frm_fp_pbb_detail_target->t_numerator_qtr4->CellCssStyle = "white-space: nowrap;";

		// t_denominator
		$frm_fp_pbb_detail_target->t_denominator->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr1
		$frm_fp_pbb_detail_target->t_denominator_qtr1->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr2
		$frm_fp_pbb_detail_target->t_denominator_qtr2->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr3
		$frm_fp_pbb_detail_target->t_denominator_qtr3->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr4
		$frm_fp_pbb_detail_target->t_denominator_qtr4->CellCssStyle = "white-space: nowrap;";

		// t_remarks
		$frm_fp_pbb_detail_target->t_remarks->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate
		$frm_fp_pbb_detail_target->t_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_remarks
		$frm_fp_pbb_detail_target->t_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";

		// accomplishment
		$frm_fp_pbb_detail_target->accomplishment->CellCssStyle = "white-space: nowrap;";

		// a_numerator
		$frm_fp_pbb_detail_target->a_numerator->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr1
		$frm_fp_pbb_detail_target->a_numerator_qtr1->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr2
		$frm_fp_pbb_detail_target->a_numerator_qtr2->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr3
		$frm_fp_pbb_detail_target->a_numerator_qtr3->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr4
		$frm_fp_pbb_detail_target->a_numerator_qtr4->CellCssStyle = "white-space: nowrap;";

		// a_denominator
		$frm_fp_pbb_detail_target->a_denominator->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr1
		$frm_fp_pbb_detail_target->a_denominator_qtr1->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr2
		$frm_fp_pbb_detail_target->a_denominator_qtr2->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr3
		$frm_fp_pbb_detail_target->a_denominator_qtr3->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr4
		$frm_fp_pbb_detail_target->a_denominator_qtr4->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs
		$frm_fp_pbb_detail_target->a_supporting_docs->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr1
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr1->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr2
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr2->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr3
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr3->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr4
		$frm_fp_pbb_detail_target->a_supporting_docs_qtr4->CellCssStyle = "white-space: nowrap;";

		// a_remarks
		$frm_fp_pbb_detail_target->a_remarks->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate
		$frm_fp_pbb_detail_target->a_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate_remarks
		$frm_fp_pbb_detail_target->a_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";

		// a_rating
		$frm_fp_pbb_detail_target->a_rating->CellCssStyle = "white-space: nowrap;";

		// a_rating_above_90
		$frm_fp_pbb_detail_target->a_rating_above_90->CellCssStyle = "white-space: nowrap;";

		// a_rating_below_90
		$frm_fp_pbb_detail_target->a_rating_below_90->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_comparison
		$frm_fp_pbb_detail_target->a_supporting_docs_comparison->CellCssStyle = "white-space: nowrap;";

		// cutOffDate_id
		$frm_fp_pbb_detail_target->cutOffDate_id->CellCssStyle = "white-space: nowrap;";

		// mfo_name_rep
		$frm_fp_pbb_detail_target->mfo_name_rep->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_fp
		$frm_fp_pbb_detail_target->t_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate_fp
		$frm_fp_pbb_detail_target->a_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// form_a_1_sequence
		$frm_fp_pbb_detail_target->form_a_1_sequence->CellCssStyle = "white-space: nowrap;";

		// t_startDate
		$frm_fp_pbb_detail_target->t_startDate->CellCssStyle = "white-space: nowrap;";

		// a_startDate
		$frm_fp_pbb_detail_target->a_startDate->CellCssStyle = "white-space: nowrap;";
		if ($frm_fp_pbb_detail_target->RowType == UP_ROWTYPE_VIEW) { // View row

			// applicable
			if (strval($frm_fp_pbb_detail_target->applicable->CurrentValue) <> "") {
				switch ($frm_fp_pbb_detail_target->applicable->CurrentValue) {
					case "Y":
						$frm_fp_pbb_detail_target->applicable->ViewValue = $frm_fp_pbb_detail_target->applicable->FldTagCaption(1) <> "" ? $frm_fp_pbb_detail_target->applicable->FldTagCaption(1) : $frm_fp_pbb_detail_target->applicable->CurrentValue;
						break;
					case "N":
						$frm_fp_pbb_detail_target->applicable->ViewValue = $frm_fp_pbb_detail_target->applicable->FldTagCaption(2) <> "" ? $frm_fp_pbb_detail_target->applicable->FldTagCaption(2) : $frm_fp_pbb_detail_target->applicable->CurrentValue;
						break;
					default:
						$frm_fp_pbb_detail_target->applicable->ViewValue = $frm_fp_pbb_detail_target->applicable->CurrentValue;
				}
			} else {
				$frm_fp_pbb_detail_target->applicable->ViewValue = NULL;
			}
			$frm_fp_pbb_detail_target->applicable->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_fp_pbb_detail_target->cu_unit_name->ViewValue = $frm_fp_pbb_detail_target->cu_unit_name->CurrentValue;
			$frm_fp_pbb_detail_target->cu_unit_name->ViewCustomAttributes = "";

			// mfo_name
			$frm_fp_pbb_detail_target->mfo_name->ViewValue = $frm_fp_pbb_detail_target->mfo_name->CurrentValue;
			$frm_fp_pbb_detail_target->mfo_name->ViewCustomAttributes = "";

			// target
			$frm_fp_pbb_detail_target->target->ViewValue = $frm_fp_pbb_detail_target->target->CurrentValue;
			$frm_fp_pbb_detail_target->target->CssStyle = "font-weight:bold;text-align:right;";
			$frm_fp_pbb_detail_target->target->ViewCustomAttributes = "";

			// t_numerator
			$frm_fp_pbb_detail_target->t_numerator->ViewValue = $frm_fp_pbb_detail_target->t_numerator->CurrentValue;
			$frm_fp_pbb_detail_target->t_numerator->CssStyle = "text-align:right;";
			$frm_fp_pbb_detail_target->t_numerator->ViewCustomAttributes = "";

			// t_denominator
			$frm_fp_pbb_detail_target->t_denominator->ViewValue = $frm_fp_pbb_detail_target->t_denominator->CurrentValue;
			$frm_fp_pbb_detail_target->t_denominator->CssStyle = "text-align:right;";
			$frm_fp_pbb_detail_target->t_denominator->ViewCustomAttributes = "";

			// t_remarks
			$frm_fp_pbb_detail_target->t_remarks->ViewValue = $frm_fp_pbb_detail_target->t_remarks->CurrentValue;
			$frm_fp_pbb_detail_target->t_remarks->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->ViewValue = $frm_fp_pbb_detail_target->t_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// accomplishment
			$frm_fp_pbb_detail_target->accomplishment->ViewValue = $frm_fp_pbb_detail_target->accomplishment->CurrentValue;
			$frm_fp_pbb_detail_target->accomplishment->CssStyle = "font-weight:bold;";
			$frm_fp_pbb_detail_target->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$frm_fp_pbb_detail_target->a_numerator->ViewValue = $frm_fp_pbb_detail_target->a_numerator->CurrentValue;
			$frm_fp_pbb_detail_target->a_numerator->ViewCustomAttributes = "";

			// a_denominator
			$frm_fp_pbb_detail_target->a_denominator->ViewValue = $frm_fp_pbb_detail_target->a_denominator->CurrentValue;
			$frm_fp_pbb_detail_target->a_denominator->ViewCustomAttributes = "";

			// a_supporting_docs
			$frm_fp_pbb_detail_target->a_supporting_docs->ViewValue = $frm_fp_pbb_detail_target->a_supporting_docs->CurrentValue;
			$frm_fp_pbb_detail_target->a_supporting_docs->CssStyle = "font-weight:bold;";
			$frm_fp_pbb_detail_target->a_supporting_docs->ViewCustomAttributes = "";

			// a_remarks
			$frm_fp_pbb_detail_target->a_remarks->ViewValue = $frm_fp_pbb_detail_target->a_remarks->CurrentValue;
			$frm_fp_pbb_detail_target->a_remarks->ViewCustomAttributes = "";

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->ViewValue = $frm_fp_pbb_detail_target->a_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// a_rating_above_90
			$frm_fp_pbb_detail_target->a_rating_above_90->ViewValue = $frm_fp_pbb_detail_target->a_rating_above_90->CurrentValue;
			$frm_fp_pbb_detail_target->a_rating_above_90->ViewCustomAttributes = "";

			// a_rating_below_90
			$frm_fp_pbb_detail_target->a_rating_below_90->ViewValue = $frm_fp_pbb_detail_target->a_rating_below_90->CurrentValue;
			$frm_fp_pbb_detail_target->a_rating_below_90->ViewCustomAttributes = "";

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->ViewValue = $frm_fp_pbb_detail_target->a_supporting_docs_comparison->CurrentValue;
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->ViewCustomAttributes = "";

			// applicable
			$frm_fp_pbb_detail_target->applicable->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->applicable->HrefValue = "";
			$frm_fp_pbb_detail_target->applicable->TooltipValue = "";

			// cu_unit_name
			$frm_fp_pbb_detail_target->cu_unit_name->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->cu_unit_name->HrefValue = "";
			$frm_fp_pbb_detail_target->cu_unit_name->TooltipValue = "";

			// mfo_name
			$frm_fp_pbb_detail_target->mfo_name->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->mfo_name->HrefValue = "";
			$frm_fp_pbb_detail_target->mfo_name->TooltipValue = "";

			// target
			$frm_fp_pbb_detail_target->target->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->target->HrefValue = "";
			$frm_fp_pbb_detail_target->target->TooltipValue = "";

			// t_numerator
			$frm_fp_pbb_detail_target->t_numerator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_numerator->HrefValue = "";
			$frm_fp_pbb_detail_target->t_numerator->TooltipValue = "";

			// t_denominator
			$frm_fp_pbb_detail_target->t_denominator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_denominator->HrefValue = "";
			$frm_fp_pbb_detail_target->t_denominator->TooltipValue = "";

			// t_remarks
			$frm_fp_pbb_detail_target->t_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_remarks->HrefValue = "";
			$frm_fp_pbb_detail_target->t_remarks->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->HrefValue = "";
			$frm_fp_pbb_detail_target->t_cutOffDate_remarks->TooltipValue = "";

			// accomplishment
			$frm_fp_pbb_detail_target->accomplishment->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->accomplishment->HrefValue = "";
			$frm_fp_pbb_detail_target->accomplishment->TooltipValue = "";

			// a_numerator
			$frm_fp_pbb_detail_target->a_numerator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_numerator->HrefValue = "";
			$frm_fp_pbb_detail_target->a_numerator->TooltipValue = "";

			// a_denominator
			$frm_fp_pbb_detail_target->a_denominator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_denominator->HrefValue = "";
			$frm_fp_pbb_detail_target->a_denominator->TooltipValue = "";

			// a_supporting_docs
			$frm_fp_pbb_detail_target->a_supporting_docs->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_supporting_docs->HrefValue = "";
			$frm_fp_pbb_detail_target->a_supporting_docs->TooltipValue = "";

			// a_remarks
			$frm_fp_pbb_detail_target->a_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_remarks->HrefValue = "";
			$frm_fp_pbb_detail_target->a_remarks->TooltipValue = "";

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->HrefValue = "";
			$frm_fp_pbb_detail_target->a_cutOffDate_remarks->TooltipValue = "";

			// a_rating_above_90
			$frm_fp_pbb_detail_target->a_rating_above_90->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_rating_above_90->HrefValue = "";
			$frm_fp_pbb_detail_target->a_rating_above_90->TooltipValue = "";

			// a_rating_below_90
			$frm_fp_pbb_detail_target->a_rating_below_90->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_rating_below_90->HrefValue = "";
			$frm_fp_pbb_detail_target->a_rating_below_90->TooltipValue = "";

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->HrefValue = "";
			$frm_fp_pbb_detail_target->a_supporting_docs_comparison->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_fp_pbb_detail_target->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_pbb_detail_target->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $frm_fp_pbb_detail_target;
		$DeleteRows = TRUE;
		$sSql = $frm_fp_pbb_detail_target->SQL();
		$conn->raiseErrorFn = 'up_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
			$rs->Close();
			return FALSE;
		}
		if (!$Security->CanDelete()) {
			$this->setFailureMessage($Language->Phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$conn->BeginTrans();

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $frm_fp_pbb_detail_target->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['pbb_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_fp_pbb_detail_target->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_fp_pbb_detail_target->CancelMessage <> "") {
				$this->setFailureMessage($frm_fp_pbb_detail_target->CancelMessage);
				$frm_fp_pbb_detail_target->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$frm_fp_pbb_detail_target->Row_Deleted($row);
			}
		}
		return $DeleteRows;
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
}
?>
