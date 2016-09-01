<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_sam_pbb_detailinfo.php" ?>
<?php include_once "frm_sam_rep_ta_form_a_0_cuinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_sam_pbb_detail_delete = new cfrm_sam_pbb_detail_delete();
$Page =& $frm_sam_pbb_detail_delete;

// Page init
$frm_sam_pbb_detail_delete->Page_Init();

// Page main
$frm_sam_pbb_detail_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_pbb_detail_delete = new up_Page("frm_sam_pbb_detail_delete");

// page properties
frm_sam_pbb_detail_delete.PageID = "delete"; // page ID
frm_sam_pbb_detail_delete.FormID = "ffrm_sam_pbb_detaildelete"; // form ID
var UP_PAGE_ID = frm_sam_pbb_detail_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_sam_pbb_detail_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_pbb_detail_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_pbb_detail_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_pbb_detail_delete.ValidateRequired = false; // no JavaScript validation
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
if ($frm_sam_pbb_detail_delete->Recordset = $frm_sam_pbb_detail_delete->LoadRecordset())
	$frm_sam_pbb_detail_deleteTotalRecs = $frm_sam_pbb_detail_delete->Recordset->RecordCount(); // Get record count
if ($frm_sam_pbb_detail_deleteTotalRecs <= 0) { // No record found, exit
	if ($frm_sam_pbb_detail_delete->Recordset)
		$frm_sam_pbb_detail_delete->Recordset->Close();
	$frm_sam_pbb_detail_delete->Page_Terminate("frm_sam_pbb_detaillist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_pbb_detail->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_sam_pbb_detail->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_sam_pbb_detail_delete->ShowPageHeader(); ?>
<?php
$frm_sam_pbb_detail_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="frm_sam_pbb_detail">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($frm_sam_pbb_detail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $frm_sam_pbb_detail->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $frm_sam_pbb_detail->applicable->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->cu_unit_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->mfo_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->target->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->t_numerator->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->t_denominator->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->t_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->t_cutOffDate_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->accomplishment->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->a_numerator->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->a_denominator->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->a_supporting_docs->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->a_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->a_cutOffDate_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->a_rating_above_90->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->a_rating_below_90->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_pbb_detail->a_supporting_docs_comparison->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$frm_sam_pbb_detail_delete->RecCnt = 0;
$i = 0;
while (!$frm_sam_pbb_detail_delete->Recordset->EOF) {
	$frm_sam_pbb_detail_delete->RecCnt++;

	// Set row properties
	$frm_sam_pbb_detail->ResetAttrs();
	$frm_sam_pbb_detail->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$frm_sam_pbb_detail_delete->LoadRowValues($frm_sam_pbb_detail_delete->Recordset);

	// Render row
	$frm_sam_pbb_detail_delete->RenderRow();
?>
	<tr<?php echo $frm_sam_pbb_detail->RowAttributes() ?>>
		<td<?php echo $frm_sam_pbb_detail->applicable->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->applicable->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->applicable->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->cu_unit_name->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->cu_unit_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->mfo_name->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->mfo_name->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->mfo_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->target->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->target->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->target->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->t_numerator->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->t_numerator->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->t_numerator->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->t_denominator->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->t_denominator->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->t_denominator->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->t_remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->t_remarks->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->t_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->t_cutOffDate_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->accomplishment->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->accomplishment->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->accomplishment->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->a_numerator->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_numerator->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_numerator->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->a_denominator->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_denominator->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_denominator->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->a_supporting_docs->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_supporting_docs->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_supporting_docs->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->a_remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_remarks->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->a_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_cutOffDate_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->a_rating_above_90->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_rating_above_90->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_rating_above_90->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->a_rating_below_90->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_rating_below_90->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_rating_below_90->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_pbb_detail->a_supporting_docs_comparison->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_supporting_docs_comparison->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_supporting_docs_comparison->ListViewValue() ?></div></td>
	</tr>
<?php
	$frm_sam_pbb_detail_delete->Recordset->MoveNext();
}
$frm_sam_pbb_detail_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$frm_sam_pbb_detail_delete->ShowPageFooter();
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
$frm_sam_pbb_detail_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_pbb_detail_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'frm_sam_pbb_detail';

	// Page object name
	var $PageObjName = 'frm_sam_pbb_detail_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_pbb_detail;
		if ($frm_sam_pbb_detail->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_pbb_detail->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_pbb_detail;
		if ($frm_sam_pbb_detail->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_pbb_detail->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_pbb_detail->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_pbb_detail_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_pbb_detail)
		if (!isset($GLOBALS["frm_sam_pbb_detail"])) {
			$GLOBALS["frm_sam_pbb_detail"] = new cfrm_sam_pbb_detail();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_pbb_detail"];
		}

		// Table object (frm_sam_rep_ta_form_a_0_cu)
		if (!isset($GLOBALS['frm_sam_rep_ta_form_a_0_cu'])) $GLOBALS['frm_sam_rep_ta_form_a_0_cu'] = new cfrm_sam_rep_ta_form_a_0_cu();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_pbb_detail', TRUE);

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
		global $frm_sam_pbb_detail;

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
			$this->Page_Terminate("frm_sam_pbb_detaillist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_sam_pbb_detaillist.php");
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
		global $Language, $frm_sam_pbb_detail;

		// Load key parameters
		$this->RecKeys = $frm_sam_pbb_detail->GetRecordKeys(); // Load record keys
		$sFilter = $frm_sam_pbb_detail->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("frm_sam_pbb_detaillist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in frm_sam_pbb_detail class, frm_sam_pbb_detailinfo.php

		$frm_sam_pbb_detail->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$frm_sam_pbb_detail->CurrentAction = $_POST["a_delete"];
		} else {
			$frm_sam_pbb_detail->CurrentAction = "I"; // Display record
		}
		switch ($frm_sam_pbb_detail->CurrentAction) {
			case "D": // Delete
				$frm_sam_pbb_detail->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($frm_sam_pbb_detail->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_sam_pbb_detail;

		// Call Recordset Selecting event
		$frm_sam_pbb_detail->Recordset_Selecting($frm_sam_pbb_detail->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_sam_pbb_detail->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_sam_pbb_detail->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_pbb_detail;
		$sFilter = $frm_sam_pbb_detail->KeyFilter();

		// Call Row Selecting event
		$frm_sam_pbb_detail->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_pbb_detail->CurrentFilter = $sFilter;
		$sSql = $frm_sam_pbb_detail->SQL();
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
		global $conn, $frm_sam_pbb_detail;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_pbb_detail->Row_Selected($row);
		$frm_sam_pbb_detail->pbb_id->setDbValue($rs->fields('pbb_id'));
		$frm_sam_pbb_detail->applicable->setDbValue($rs->fields('applicable'));
		$frm_sam_pbb_detail->units_id->setDbValue($rs->fields('units_id'));
		$frm_sam_pbb_detail->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_sam_pbb_detail->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_sam_pbb_detail->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_sam_pbb_detail->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_sam_pbb_detail->mfo_id->setDbValue($rs->fields('mfo_id'));
		$frm_sam_pbb_detail->mfo_sequence->setDbValue($rs->fields('mfo_sequence'));
		$frm_sam_pbb_detail->mfo->setDbValue($rs->fields('mfo'));
		$frm_sam_pbb_detail->pi_no->setDbValue($rs->fields('pi_no'));
		$frm_sam_pbb_detail->pi_sub->setDbValue($rs->fields('pi_sub'));
		$frm_sam_pbb_detail->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$frm_sam_pbb_detail->mfo_name->setDbValue($rs->fields('mfo_name'));
		$frm_sam_pbb_detail->pi_question->setDbValue($rs->fields('pi_question'));
		$frm_sam_pbb_detail->target->setDbValue($rs->fields('target'));
		$frm_sam_pbb_detail->t_numerator->setDbValue($rs->fields('t_numerator'));
		$frm_sam_pbb_detail->t_numerator_qtr1->setDbValue($rs->fields('t_numerator_qtr1'));
		$frm_sam_pbb_detail->t_numerator_qtr2->setDbValue($rs->fields('t_numerator_qtr2'));
		$frm_sam_pbb_detail->t_numerator_qtr3->setDbValue($rs->fields('t_numerator_qtr3'));
		$frm_sam_pbb_detail->t_numerator_qtr4->setDbValue($rs->fields('t_numerator_qtr4'));
		$frm_sam_pbb_detail->t_denominator->setDbValue($rs->fields('t_denominator'));
		$frm_sam_pbb_detail->t_denominator_qtr1->setDbValue($rs->fields('t_denominator_qtr1'));
		$frm_sam_pbb_detail->t_denominator_qtr2->setDbValue($rs->fields('t_denominator_qtr2'));
		$frm_sam_pbb_detail->t_denominator_qtr3->setDbValue($rs->fields('t_denominator_qtr3'));
		$frm_sam_pbb_detail->t_denominator_qtr4->setDbValue($rs->fields('t_denominator_qtr4'));
		$frm_sam_pbb_detail->t_remarks->setDbValue($rs->fields('t_remarks'));
		$frm_sam_pbb_detail->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$frm_sam_pbb_detail->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_sam_pbb_detail->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_sam_pbb_detail->accomplishment->setDbValue($rs->fields('accomplishment'));
		$frm_sam_pbb_detail->a_numerator->setDbValue($rs->fields('a_numerator'));
		$frm_sam_pbb_detail->a_numerator_qtr1->setDbValue($rs->fields('a_numerator_qtr1'));
		$frm_sam_pbb_detail->a_numerator_qtr2->setDbValue($rs->fields('a_numerator_qtr2'));
		$frm_sam_pbb_detail->a_numerator_qtr3->setDbValue($rs->fields('a_numerator_qtr3'));
		$frm_sam_pbb_detail->a_numerator_qtr4->setDbValue($rs->fields('a_numerator_qtr4'));
		$frm_sam_pbb_detail->a_denominator->setDbValue($rs->fields('a_denominator'));
		$frm_sam_pbb_detail->a_denominator_qtr1->setDbValue($rs->fields('a_denominator_qtr1'));
		$frm_sam_pbb_detail->a_denominator_qtr2->setDbValue($rs->fields('a_denominator_qtr2'));
		$frm_sam_pbb_detail->a_denominator_qtr3->setDbValue($rs->fields('a_denominator_qtr3'));
		$frm_sam_pbb_detail->a_denominator_qtr4->setDbValue($rs->fields('a_denominator_qtr4'));
		$frm_sam_pbb_detail->a_supporting_docs->setDbValue($rs->fields('a_supporting_docs'));
		$frm_sam_pbb_detail->a_supporting_docs_qtr1->setDbValue($rs->fields('a_supporting_docs_qtr1'));
		$frm_sam_pbb_detail->a_supporting_docs_qtr2->setDbValue($rs->fields('a_supporting_docs_qtr2'));
		$frm_sam_pbb_detail->a_supporting_docs_qtr3->setDbValue($rs->fields('a_supporting_docs_qtr3'));
		$frm_sam_pbb_detail->a_supporting_docs_qtr4->setDbValue($rs->fields('a_supporting_docs_qtr4'));
		$frm_sam_pbb_detail->a_remarks->setDbValue($rs->fields('a_remarks'));
		$frm_sam_pbb_detail->a_cutOffDate->setDbValue($rs->fields('a_cutOffDate'));
		$frm_sam_pbb_detail->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_sam_pbb_detail->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
		$frm_sam_pbb_detail->a_rating->setDbValue($rs->fields('a_rating'));
		$frm_sam_pbb_detail->a_rating_above_90->setDbValue($rs->fields('a_rating_above_90'));
		$frm_sam_pbb_detail->a_rating_below_90->setDbValue($rs->fields('a_rating_below_90'));
		$frm_sam_pbb_detail->a_supporting_docs_comparison->setDbValue($rs->fields('a_supporting_docs_comparison'));
		$frm_sam_pbb_detail->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_sam_pbb_detail->form_a_1_sequence->setDbValue($rs->fields('form_a_1_sequence'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_pbb_detail;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_sam_pbb_detail->Row_Rendering();

		// Common render codes for all row types
		// pbb_id

		$frm_sam_pbb_detail->pbb_id->CellCssStyle = "white-space: nowrap;";

		// applicable
		$frm_sam_pbb_detail->applicable->CellCssStyle = "white-space: nowrap;";

		// units_id
		$frm_sam_pbb_detail->units_id->CellCssStyle = "white-space: nowrap;";

		// cu_sequence
		$frm_sam_pbb_detail->cu_sequence->CellCssStyle = "white-space: nowrap;";

		// cu_short_name
		$frm_sam_pbb_detail->cu_short_name->CellCssStyle = "white-space: nowrap;";

		// cu_unit_name
		$frm_sam_pbb_detail->cu_unit_name->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$frm_sam_pbb_detail->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// mfo_id
		$frm_sam_pbb_detail->mfo_id->CellCssStyle = "white-space: nowrap;";

		// mfo_sequence
		$frm_sam_pbb_detail->mfo_sequence->CellCssStyle = "white-space: nowrap;";

		// mfo
		$frm_sam_pbb_detail->mfo->CellCssStyle = "white-space: nowrap;";

		// pi_no
		$frm_sam_pbb_detail->pi_no->CellCssStyle = "white-space: nowrap;";

		// pi_sub
		$frm_sam_pbb_detail->pi_sub->CellCssStyle = "white-space: nowrap;";

		// mfo_name_rep
		$frm_sam_pbb_detail->mfo_name_rep->CellCssStyle = "white-space: nowrap;";

		// mfo_name
		$frm_sam_pbb_detail->mfo_name->CellCssStyle = "white-space: nowrap;";

		// pi_question
		$frm_sam_pbb_detail->pi_question->CellCssStyle = "width: 400px; white-space: nowrap;";

		// target
		$frm_sam_pbb_detail->target->CellCssStyle = "white-space: nowrap;";

		// t_numerator
		$frm_sam_pbb_detail->t_numerator->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr1
		$frm_sam_pbb_detail->t_numerator_qtr1->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr2
		$frm_sam_pbb_detail->t_numerator_qtr2->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr3
		$frm_sam_pbb_detail->t_numerator_qtr3->CellCssStyle = "white-space: nowrap;";

		// t_numerator_qtr4
		$frm_sam_pbb_detail->t_numerator_qtr4->CellCssStyle = "white-space: nowrap;";

		// t_denominator
		$frm_sam_pbb_detail->t_denominator->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr1
		$frm_sam_pbb_detail->t_denominator_qtr1->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr2
		$frm_sam_pbb_detail->t_denominator_qtr2->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr3
		$frm_sam_pbb_detail->t_denominator_qtr3->CellCssStyle = "white-space: nowrap;";

		// t_denominator_qtr4
		$frm_sam_pbb_detail->t_denominator_qtr4->CellCssStyle = "white-space: nowrap;";

		// t_remarks
		$frm_sam_pbb_detail->t_remarks->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate
		$frm_sam_pbb_detail->t_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_fp
		$frm_sam_pbb_detail->t_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_remarks
		$frm_sam_pbb_detail->t_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";

		// accomplishment
		$frm_sam_pbb_detail->accomplishment->CellCssStyle = "white-space: nowrap;";

		// a_numerator
		$frm_sam_pbb_detail->a_numerator->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr1
		$frm_sam_pbb_detail->a_numerator_qtr1->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr2
		$frm_sam_pbb_detail->a_numerator_qtr2->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr3
		$frm_sam_pbb_detail->a_numerator_qtr3->CellCssStyle = "white-space: nowrap;";

		// a_numerator_qtr4
		$frm_sam_pbb_detail->a_numerator_qtr4->CellCssStyle = "white-space: nowrap;";

		// a_denominator
		$frm_sam_pbb_detail->a_denominator->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr1
		$frm_sam_pbb_detail->a_denominator_qtr1->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr2
		$frm_sam_pbb_detail->a_denominator_qtr2->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr3
		$frm_sam_pbb_detail->a_denominator_qtr3->CellCssStyle = "white-space: nowrap;";

		// a_denominator_qtr4
		$frm_sam_pbb_detail->a_denominator_qtr4->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs
		$frm_sam_pbb_detail->a_supporting_docs->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr1
		$frm_sam_pbb_detail->a_supporting_docs_qtr1->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr2
		$frm_sam_pbb_detail->a_supporting_docs_qtr2->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr3
		$frm_sam_pbb_detail->a_supporting_docs_qtr3->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_qtr4
		$frm_sam_pbb_detail->a_supporting_docs_qtr4->CellCssStyle = "white-space: nowrap;";

		// a_remarks
		$frm_sam_pbb_detail->a_remarks->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate
		$frm_sam_pbb_detail->a_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate_fp
		$frm_sam_pbb_detail->a_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate_remarks
		$frm_sam_pbb_detail->a_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";

		// a_rating
		$frm_sam_pbb_detail->a_rating->CellCssStyle = "white-space: nowrap;";

		// a_rating_above_90
		$frm_sam_pbb_detail->a_rating_above_90->CellCssStyle = "white-space: nowrap;";

		// a_rating_below_90
		$frm_sam_pbb_detail->a_rating_below_90->CellCssStyle = "white-space: nowrap;";

		// a_supporting_docs_comparison
		$frm_sam_pbb_detail->a_supporting_docs_comparison->CellCssStyle = "white-space: nowrap;";

		// cutOffDate_id
		$frm_sam_pbb_detail->cutOffDate_id->CellCssStyle = "white-space: nowrap;";

		// form_a_1_sequence
		$frm_sam_pbb_detail->form_a_1_sequence->CellCssStyle = "white-space: nowrap;";
		if ($frm_sam_pbb_detail->RowType == UP_ROWTYPE_VIEW) { // View row

			// applicable
			if (strval($frm_sam_pbb_detail->applicable->CurrentValue) <> "") {
				switch ($frm_sam_pbb_detail->applicable->CurrentValue) {
					case "Y":
						$frm_sam_pbb_detail->applicable->ViewValue = $frm_sam_pbb_detail->applicable->FldTagCaption(1) <> "" ? $frm_sam_pbb_detail->applicable->FldTagCaption(1) : $frm_sam_pbb_detail->applicable->CurrentValue;
						break;
					case "N":
						$frm_sam_pbb_detail->applicable->ViewValue = $frm_sam_pbb_detail->applicable->FldTagCaption(2) <> "" ? $frm_sam_pbb_detail->applicable->FldTagCaption(2) : $frm_sam_pbb_detail->applicable->CurrentValue;
						break;
					default:
						$frm_sam_pbb_detail->applicable->ViewValue = $frm_sam_pbb_detail->applicable->CurrentValue;
				}
			} else {
				$frm_sam_pbb_detail->applicable->ViewValue = NULL;
			}
			$frm_sam_pbb_detail->applicable->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_sam_pbb_detail->cu_unit_name->ViewValue = $frm_sam_pbb_detail->cu_unit_name->CurrentValue;
			$frm_sam_pbb_detail->cu_unit_name->ViewCustomAttributes = "";

			// mfo_name
			$frm_sam_pbb_detail->mfo_name->ViewValue = $frm_sam_pbb_detail->mfo_name->CurrentValue;
			$frm_sam_pbb_detail->mfo_name->ViewCustomAttributes = "";

			// target
			$frm_sam_pbb_detail->target->ViewValue = $frm_sam_pbb_detail->target->CurrentValue;
			$frm_sam_pbb_detail->target->CssStyle = "font-weight:bold;text-align:right;";
			$frm_sam_pbb_detail->target->ViewCustomAttributes = "";

			// t_numerator
			$frm_sam_pbb_detail->t_numerator->ViewValue = $frm_sam_pbb_detail->t_numerator->CurrentValue;
			$frm_sam_pbb_detail->t_numerator->CssStyle = "text-align:right;";
			$frm_sam_pbb_detail->t_numerator->ViewCustomAttributes = "";

			// t_denominator
			$frm_sam_pbb_detail->t_denominator->ViewValue = $frm_sam_pbb_detail->t_denominator->CurrentValue;
			$frm_sam_pbb_detail->t_denominator->CssStyle = "text-align:right;";
			$frm_sam_pbb_detail->t_denominator->ViewCustomAttributes = "";

			// t_remarks
			$frm_sam_pbb_detail->t_remarks->ViewValue = $frm_sam_pbb_detail->t_remarks->CurrentValue;
			$frm_sam_pbb_detail->t_remarks->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_sam_pbb_detail->t_cutOffDate_remarks->ViewValue = $frm_sam_pbb_detail->t_cutOffDate_remarks->CurrentValue;
			$frm_sam_pbb_detail->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// accomplishment
			$frm_sam_pbb_detail->accomplishment->ViewValue = $frm_sam_pbb_detail->accomplishment->CurrentValue;
			$frm_sam_pbb_detail->accomplishment->CssStyle = "font-weight:bold;";
			$frm_sam_pbb_detail->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$frm_sam_pbb_detail->a_numerator->ViewValue = $frm_sam_pbb_detail->a_numerator->CurrentValue;
			$frm_sam_pbb_detail->a_numerator->ViewCustomAttributes = "";

			// a_denominator
			$frm_sam_pbb_detail->a_denominator->ViewValue = $frm_sam_pbb_detail->a_denominator->CurrentValue;
			$frm_sam_pbb_detail->a_denominator->ViewCustomAttributes = "";

			// a_supporting_docs
			$frm_sam_pbb_detail->a_supporting_docs->ViewValue = $frm_sam_pbb_detail->a_supporting_docs->CurrentValue;
			$frm_sam_pbb_detail->a_supporting_docs->CssStyle = "font-weight:bold;";
			$frm_sam_pbb_detail->a_supporting_docs->ViewCustomAttributes = "";

			// a_remarks
			$frm_sam_pbb_detail->a_remarks->ViewValue = $frm_sam_pbb_detail->a_remarks->CurrentValue;
			$frm_sam_pbb_detail->a_remarks->ViewCustomAttributes = "";

			// a_cutOffDate_remarks
			$frm_sam_pbb_detail->a_cutOffDate_remarks->ViewValue = $frm_sam_pbb_detail->a_cutOffDate_remarks->CurrentValue;
			$frm_sam_pbb_detail->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// a_rating_above_90
			$frm_sam_pbb_detail->a_rating_above_90->ViewValue = $frm_sam_pbb_detail->a_rating_above_90->CurrentValue;
			$frm_sam_pbb_detail->a_rating_above_90->ViewCustomAttributes = "";

			// a_rating_below_90
			$frm_sam_pbb_detail->a_rating_below_90->ViewValue = $frm_sam_pbb_detail->a_rating_below_90->CurrentValue;
			$frm_sam_pbb_detail->a_rating_below_90->ViewCustomAttributes = "";

			// a_supporting_docs_comparison
			$frm_sam_pbb_detail->a_supporting_docs_comparison->ViewValue = $frm_sam_pbb_detail->a_supporting_docs_comparison->CurrentValue;
			$frm_sam_pbb_detail->a_supporting_docs_comparison->ViewCustomAttributes = "";

			// applicable
			$frm_sam_pbb_detail->applicable->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->applicable->HrefValue = "";
			$frm_sam_pbb_detail->applicable->TooltipValue = "";

			// cu_unit_name
			$frm_sam_pbb_detail->cu_unit_name->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->cu_unit_name->HrefValue = "";
			$frm_sam_pbb_detail->cu_unit_name->TooltipValue = "";

			// mfo_name
			$frm_sam_pbb_detail->mfo_name->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->mfo_name->HrefValue = "";
			$frm_sam_pbb_detail->mfo_name->TooltipValue = "";

			// target
			$frm_sam_pbb_detail->target->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->target->HrefValue = "";
			$frm_sam_pbb_detail->target->TooltipValue = "";

			// t_numerator
			$frm_sam_pbb_detail->t_numerator->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->t_numerator->HrefValue = "";
			$frm_sam_pbb_detail->t_numerator->TooltipValue = "";

			// t_denominator
			$frm_sam_pbb_detail->t_denominator->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->t_denominator->HrefValue = "";
			$frm_sam_pbb_detail->t_denominator->TooltipValue = "";

			// t_remarks
			$frm_sam_pbb_detail->t_remarks->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->t_remarks->HrefValue = "";
			$frm_sam_pbb_detail->t_remarks->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_sam_pbb_detail->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->t_cutOffDate_remarks->HrefValue = "";
			$frm_sam_pbb_detail->t_cutOffDate_remarks->TooltipValue = "";

			// accomplishment
			$frm_sam_pbb_detail->accomplishment->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->accomplishment->HrefValue = "";
			$frm_sam_pbb_detail->accomplishment->TooltipValue = "";

			// a_numerator
			$frm_sam_pbb_detail->a_numerator->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_numerator->HrefValue = "";
			$frm_sam_pbb_detail->a_numerator->TooltipValue = "";

			// a_denominator
			$frm_sam_pbb_detail->a_denominator->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_denominator->HrefValue = "";
			$frm_sam_pbb_detail->a_denominator->TooltipValue = "";

			// a_supporting_docs
			$frm_sam_pbb_detail->a_supporting_docs->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_supporting_docs->HrefValue = "";
			$frm_sam_pbb_detail->a_supporting_docs->TooltipValue = "";

			// a_remarks
			$frm_sam_pbb_detail->a_remarks->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_remarks->HrefValue = "";
			$frm_sam_pbb_detail->a_remarks->TooltipValue = "";

			// a_cutOffDate_remarks
			$frm_sam_pbb_detail->a_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_cutOffDate_remarks->HrefValue = "";
			$frm_sam_pbb_detail->a_cutOffDate_remarks->TooltipValue = "";

			// a_rating_above_90
			$frm_sam_pbb_detail->a_rating_above_90->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_rating_above_90->HrefValue = "";
			$frm_sam_pbb_detail->a_rating_above_90->TooltipValue = "";

			// a_rating_below_90
			$frm_sam_pbb_detail->a_rating_below_90->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_rating_below_90->HrefValue = "";
			$frm_sam_pbb_detail->a_rating_below_90->TooltipValue = "";

			// a_supporting_docs_comparison
			$frm_sam_pbb_detail->a_supporting_docs_comparison->LinkCustomAttributes = "";
			$frm_sam_pbb_detail->a_supporting_docs_comparison->HrefValue = "";
			$frm_sam_pbb_detail->a_supporting_docs_comparison->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_sam_pbb_detail->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_pbb_detail->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $frm_sam_pbb_detail;
		$DeleteRows = TRUE;
		$sSql = $frm_sam_pbb_detail->SQL();
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
				$DeleteRows = $frm_sam_pbb_detail->Row_Deleting($row);
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
				$DeleteRows = $conn->Execute($frm_sam_pbb_detail->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_sam_pbb_detail->CancelMessage <> "") {
				$this->setFailureMessage($frm_sam_pbb_detail->CancelMessage);
				$frm_sam_pbb_detail->CancelMessage = "";
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
				$frm_sam_pbb_detail->Row_Deleted($row);
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
