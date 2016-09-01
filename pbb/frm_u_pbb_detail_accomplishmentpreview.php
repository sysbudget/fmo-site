<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_u_pbb_detail_accomplishmentinfo.php" ?>
<?php include_once "frm_u_rep_a_eligible_status_unit_mfoinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$frm_u_pbb_detail_accomplishment_preview = new cfrm_u_pbb_detail_accomplishment_preview();
$Page =& $frm_u_pbb_detail_accomplishment_preview;

// Page init
$frm_u_pbb_detail_accomplishment_preview->Page_Init();

// Page main
$frm_u_pbb_detail_accomplishment_preview->Page_Main();
?>
<link href="phpcss/db_pbb_2015.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $frm_u_pbb_detail_accomplishment->TableCaption() ?>&nbsp;
<?php if ($frm_u_pbb_detail_accomplishment_preview->TotalRecs > 0) { ?>
(<?php echo $frm_u_pbb_detail_accomplishment_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $frm_u_pbb_detail_accomplishment_preview->ShowPageHeader(); ?>
<?php if ($frm_u_pbb_detail_accomplishment_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // cu_unit_name ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->cu_unit_name->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // mfo_name ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->mfo_name->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // target ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->target->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // t_numerator ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->t_numerator->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // t_denominator ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->t_denominator->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // t_remarks ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->t_remarks->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // accomplishment ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->accomplishment->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // a_numerator ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->a_numerator->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // a_denominator ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->a_denominator->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // a_supporting_docs ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->a_supporting_docs->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // a_remarks ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->a_remarks->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // a_rating_above_90 ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->a_rating_above_90->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // a_rating_below_90 ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->a_rating_below_90->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // a_supporting_docs_comparison ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->a_supporting_docs_comparison->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->units_id->Visible) { // a_cutOffDate_remarks ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_u_pbb_detail_accomplishment->a_cutOffDate_remarks->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$frm_u_pbb_detail_accomplishment_preview->RecCount = 0;
while ($frm_u_pbb_detail_accomplishment_preview->Recordset && !$frm_u_pbb_detail_accomplishment_preview->Recordset->EOF) {

	// Init row class and style
	$frm_u_pbb_detail_accomplishment_preview->RecCount++;
	$frm_u_pbb_detail_accomplishment->CssClass = "";
	$frm_u_pbb_detail_accomplishment->CssStyle = "";
	$frm_u_pbb_detail_accomplishment->LoadListRowValues($frm_u_pbb_detail_accomplishment_preview->Recordset);

	// Render row
	$frm_u_pbb_detail_accomplishment->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$frm_u_pbb_detail_accomplishment->RenderListRow();
?>
	<tr<?php echo $frm_u_pbb_detail_accomplishment->RowAttributes() ?>>
<?php if ($frm_u_pbb_detail_accomplishment->cu_unit_name->Visible) { // cu_unit_name ?>
		<!-- cu_unit_name -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->cu_unit_name->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->cu_unit_name->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->mfo_name->Visible) { // mfo_name ?>
		<!-- mfo_name -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->mfo_name->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->mfo_name->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->mfo_name->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->target->Visible) { // target ?>
		<!-- target -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->target->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->target->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->target->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->t_numerator->Visible) { // t_numerator ?>
		<!-- t_numerator -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->t_numerator->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->t_numerator->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->t_numerator->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->t_denominator->Visible) { // t_denominator ?>
		<!-- t_denominator -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->t_denominator->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->t_denominator->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->t_denominator->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->t_remarks->Visible) { // t_remarks ?>
		<!-- t_remarks -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->t_remarks->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->t_remarks->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->t_remarks->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->accomplishment->Visible) { // accomplishment ?>
		<!-- accomplishment -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->accomplishment->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->accomplishment->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->accomplishment->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->a_numerator->Visible) { // a_numerator ?>
		<!-- a_numerator -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->a_numerator->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->a_numerator->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->a_numerator->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->a_denominator->Visible) { // a_denominator ?>
		<!-- a_denominator -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->a_denominator->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->a_denominator->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->a_denominator->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->a_supporting_docs->Visible) { // a_supporting_docs ?>
		<!-- a_supporting_docs -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->a_supporting_docs->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->a_supporting_docs->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->a_supporting_docs->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->a_remarks->Visible) { // a_remarks ?>
		<!-- a_remarks -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->a_remarks->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->a_remarks->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->a_remarks->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->a_rating_above_90->Visible) { // a_rating_above_90 ?>
		<!-- a_rating_above_90 -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->a_rating_above_90->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->a_rating_above_90->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->a_rating_above_90->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->a_rating_below_90->Visible) { // a_rating_below_90 ?>
		<!-- a_rating_below_90 -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->a_rating_below_90->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->a_rating_below_90->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->a_rating_below_90->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->a_supporting_docs_comparison->Visible) { // a_supporting_docs_comparison ?>
		<!-- a_supporting_docs_comparison -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->a_supporting_docs_comparison->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->a_supporting_docs_comparison->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->a_supporting_docs_comparison->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_u_pbb_detail_accomplishment->a_cutOffDate_remarks->Visible) { // a_cutOffDate_remarks ?>
		<!-- a_cutOffDate_remarks -->
		<td<?php echo $frm_u_pbb_detail_accomplishment->a_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_u_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_u_pbb_detail_accomplishment->a_cutOffDate_remarks->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$frm_u_pbb_detail_accomplishment_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$frm_u_pbb_detail_accomplishment_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($frm_u_pbb_detail_accomplishment_preview->Recordset)
	$frm_u_pbb_detail_accomplishment_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$frm_u_pbb_detail_accomplishment_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_u_pbb_detail_accomplishment_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'frm_u_pbb_detail_accomplishment';

	// Page object name
	var $PageObjName = 'frm_u_pbb_detail_accomplishment_preview';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_u_pbb_detail_accomplishment;
		if ($frm_u_pbb_detail_accomplishment->UseTokenInUrl) $PageUrl .= "t=" . $frm_u_pbb_detail_accomplishment->TableVar . "&"; // Add page token
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
		global $objForm, $frm_u_pbb_detail_accomplishment;
		if ($frm_u_pbb_detail_accomplishment->UseTokenInUrl) {
			if ($objForm)
				return ($frm_u_pbb_detail_accomplishment->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_u_pbb_detail_accomplishment->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_u_pbb_detail_accomplishment_preview() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_u_pbb_detail_accomplishment)
		if (!isset($GLOBALS["frm_u_pbb_detail_accomplishment"])) {
			$GLOBALS["frm_u_pbb_detail_accomplishment"] = new cfrm_u_pbb_detail_accomplishment();
			$GLOBALS["Table"] =& $GLOBALS["frm_u_pbb_detail_accomplishment"];
		}

		// Table object (frm_u_rep_a_eligible_status_unit_mfo)
		if (!isset($GLOBALS['frm_u_rep_a_eligible_status_unit_mfo'])) $GLOBALS['frm_u_rep_a_eligible_status_unit_mfo'] = new cfrm_u_rep_a_eligible_status_unit_mfo();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'preview', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_u_pbb_detail_accomplishment', TRUE);

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
		global $frm_u_pbb_detail_accomplishment;

		// Security
		$Security = new cAdvancedSecurity();
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('frm_u_pbb_detail_accomplishment');
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
		global $Language, $frm_u_pbb_detail_accomplishment;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$frm_u_pbb_detail_accomplishment->Recordset_Selecting($filter);
		$this->Recordset = $frm_u_pbb_detail_accomplishment->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$frm_u_pbb_detail_accomplishment->Recordset_Selected($this->Recordset);
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
