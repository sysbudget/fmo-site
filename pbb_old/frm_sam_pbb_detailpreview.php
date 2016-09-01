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
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$frm_sam_pbb_detail_preview = new cfrm_sam_pbb_detail_preview();
$Page =& $frm_sam_pbb_detail_preview;

// Page init
$frm_sam_pbb_detail_preview->Page_Init();

// Page main
$frm_sam_pbb_detail_preview->Page_Main();
?>
<link href="phpcss/db_pbb_2015.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $frm_sam_pbb_detail->TableCaption() ?>&nbsp;
<?php if ($frm_sam_pbb_detail_preview->TotalRecs > 0) { ?>
(<?php echo $frm_sam_pbb_detail_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $frm_sam_pbb_detail_preview->ShowPageHeader(); ?>
<?php if ($frm_sam_pbb_detail_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // applicable ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->applicable->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // cu_unit_name ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->cu_unit_name->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // mfo_name ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->mfo_name->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // target ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->target->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // t_numerator ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->t_numerator->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // t_denominator ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->t_denominator->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // t_remarks ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->t_remarks->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // t_cutOffDate_remarks ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->t_cutOffDate_remarks->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // accomplishment ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->accomplishment->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // a_numerator ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->a_numerator->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // a_denominator ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->a_denominator->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // a_supporting_docs ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->a_supporting_docs->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // a_remarks ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->a_remarks->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // a_cutOffDate_remarks ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->a_cutOffDate_remarks->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // a_rating_above_90 ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->a_rating_above_90->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // a_rating_below_90 ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->a_rating_below_90->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->focal_person_id->Visible) { // a_supporting_docs_comparison ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_pbb_detail->a_supporting_docs_comparison->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$frm_sam_pbb_detail_preview->RecCount = 0;
while ($frm_sam_pbb_detail_preview->Recordset && !$frm_sam_pbb_detail_preview->Recordset->EOF) {

	// Init row class and style
	$frm_sam_pbb_detail_preview->RecCount++;
	$frm_sam_pbb_detail->CssClass = "";
	$frm_sam_pbb_detail->CssStyle = "";
	$frm_sam_pbb_detail->LoadListRowValues($frm_sam_pbb_detail_preview->Recordset);

	// Render row
	$frm_sam_pbb_detail->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$frm_sam_pbb_detail->RenderListRow();
?>
	<tr<?php echo $frm_sam_pbb_detail->RowAttributes() ?>>
<?php if ($frm_sam_pbb_detail->applicable->Visible) { // applicable ?>
		<!-- applicable -->
		<td<?php echo $frm_sam_pbb_detail->applicable->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->applicable->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->applicable->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->cu_unit_name->Visible) { // cu_unit_name ?>
		<!-- cu_unit_name -->
		<td<?php echo $frm_sam_pbb_detail->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->cu_unit_name->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->cu_unit_name->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->mfo_name->Visible) { // mfo_name ?>
		<!-- mfo_name -->
		<td<?php echo $frm_sam_pbb_detail->mfo_name->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->mfo_name->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->mfo_name->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->target->Visible) { // target ?>
		<!-- target -->
		<td<?php echo $frm_sam_pbb_detail->target->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->target->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->target->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->t_numerator->Visible) { // t_numerator ?>
		<!-- t_numerator -->
		<td<?php echo $frm_sam_pbb_detail->t_numerator->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->t_numerator->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->t_numerator->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->t_denominator->Visible) { // t_denominator ?>
		<!-- t_denominator -->
		<td<?php echo $frm_sam_pbb_detail->t_denominator->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->t_denominator->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->t_denominator->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->t_remarks->Visible) { // t_remarks ?>
		<!-- t_remarks -->
		<td<?php echo $frm_sam_pbb_detail->t_remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->t_remarks->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->t_remarks->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
		<!-- t_cutOffDate_remarks -->
		<td<?php echo $frm_sam_pbb_detail->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->t_cutOffDate_remarks->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->accomplishment->Visible) { // accomplishment ?>
		<!-- accomplishment -->
		<td<?php echo $frm_sam_pbb_detail->accomplishment->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->accomplishment->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->accomplishment->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->a_numerator->Visible) { // a_numerator ?>
		<!-- a_numerator -->
		<td<?php echo $frm_sam_pbb_detail->a_numerator->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_numerator->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_numerator->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->a_denominator->Visible) { // a_denominator ?>
		<!-- a_denominator -->
		<td<?php echo $frm_sam_pbb_detail->a_denominator->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_denominator->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_denominator->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->a_supporting_docs->Visible) { // a_supporting_docs ?>
		<!-- a_supporting_docs -->
		<td<?php echo $frm_sam_pbb_detail->a_supporting_docs->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_supporting_docs->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_supporting_docs->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->a_remarks->Visible) { // a_remarks ?>
		<!-- a_remarks -->
		<td<?php echo $frm_sam_pbb_detail->a_remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_remarks->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_remarks->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->a_cutOffDate_remarks->Visible) { // a_cutOffDate_remarks ?>
		<!-- a_cutOffDate_remarks -->
		<td<?php echo $frm_sam_pbb_detail->a_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_cutOffDate_remarks->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->a_rating_above_90->Visible) { // a_rating_above_90 ?>
		<!-- a_rating_above_90 -->
		<td<?php echo $frm_sam_pbb_detail->a_rating_above_90->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_rating_above_90->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_rating_above_90->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->a_rating_below_90->Visible) { // a_rating_below_90 ?>
		<!-- a_rating_below_90 -->
		<td<?php echo $frm_sam_pbb_detail->a_rating_below_90->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_rating_below_90->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_rating_below_90->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_pbb_detail->a_supporting_docs_comparison->Visible) { // a_supporting_docs_comparison ?>
		<!-- a_supporting_docs_comparison -->
		<td<?php echo $frm_sam_pbb_detail->a_supporting_docs_comparison->CellAttributes() ?>>
<div<?php echo $frm_sam_pbb_detail->a_supporting_docs_comparison->ViewAttributes() ?>><?php echo $frm_sam_pbb_detail->a_supporting_docs_comparison->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$frm_sam_pbb_detail_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$frm_sam_pbb_detail_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($frm_sam_pbb_detail_preview->Recordset)
	$frm_sam_pbb_detail_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$frm_sam_pbb_detail_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_pbb_detail_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'frm_sam_pbb_detail';

	// Page object name
	var $PageObjName = 'frm_sam_pbb_detail_preview';

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
	function cfrm_sam_pbb_detail_preview() {
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
			define("UP_PAGE_ID", 'preview', TRUE);

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
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('frm_sam_pbb_detail');
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			echo $Language->Phrase("NoPermission");
			exit();
		}
		if (!$Security->CanList()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			echo $Language->Phrase("NoPermission");
			exit();
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
	var $Recordset;
	var $TotalRecs;
	var $RecCount;

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $frm_sam_pbb_detail;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$frm_sam_pbb_detail->Recordset_Selecting($filter);
		$this->Recordset = $frm_sam_pbb_detail->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$frm_sam_pbb_detail->Recordset_Selected($this->Recordset);
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
