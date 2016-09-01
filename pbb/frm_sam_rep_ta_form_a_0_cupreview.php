<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_sam_rep_ta_form_a_0_cuinfo.php" ?>
<?php include_once "frm_sam_rep_ta_form_a_0info.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$frm_sam_rep_ta_form_a_0_cu_preview = new cfrm_sam_rep_ta_form_a_0_cu_preview();
$Page =& $frm_sam_rep_ta_form_a_0_cu_preview;

// Page init
$frm_sam_rep_ta_form_a_0_cu_preview->Page_Init();

// Page main
$frm_sam_rep_ta_form_a_0_cu_preview->Page_Main();
?>
<link href="phpcss/db_pbb_2015.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $frm_sam_rep_ta_form_a_0_cu->TableCaption() ?>&nbsp;
<?php if ($frm_sam_rep_ta_form_a_0_cu_preview->TotalRecs > 0) { ?>
(<?php echo $frm_sam_rep_ta_form_a_0_cu_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $frm_sam_rep_ta_form_a_0_cu_preview->ShowPageHeader(); ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // CU Office ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Participating Units Count ?>
			<td valign="top"><?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Target ?>
			<td valign="top"><?php echo $frm_sam_rep_ta_form_a_0_cu->Target->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Numerator (T) ?>
			<td valign="top"><?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Denominator (T) ?>
			<td valign="top"><?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Accomplishment ?>
			<td valign="top"><?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Numerator (A) ?>
			<td valign="top"><?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Denominator (A) ?>
			<td valign="top"><?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Supporting Documents Count ?>
			<td valign="top"><?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Rating ?>
			<td valign="top"><?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$frm_sam_rep_ta_form_a_0_cu_preview->RecCount = 0;
while ($frm_sam_rep_ta_form_a_0_cu_preview->Recordset && !$frm_sam_rep_ta_form_a_0_cu_preview->Recordset->EOF) {

	// Init row class and style
	$frm_sam_rep_ta_form_a_0_cu_preview->RecCount++;
	$frm_sam_rep_ta_form_a_0_cu->CssClass = "";
	$frm_sam_rep_ta_form_a_0_cu->CssStyle = "";
	$frm_sam_rep_ta_form_a_0_cu->LoadListRowValues($frm_sam_rep_ta_form_a_0_cu_preview->Recordset);

	// Render row
	$frm_sam_rep_ta_form_a_0_cu->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$frm_sam_rep_ta_form_a_0_cu->RenderListRow();
?>
	<tr<?php echo $frm_sam_rep_ta_form_a_0_cu->RowAttributes() ?>>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CU_Office->Visible) { // CU Office ?>
		<!-- CU Office -->
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->Visible) { // Participating Units Count ?>
		<!-- Participating Units Count -->
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Target->Visible) { // Target ?>
		<!-- Target -->
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Target->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Target->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Target->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->Visible) { // Numerator (T) ?>
		<!-- Numerator (T) -->
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->Visible) { // Denominator (T) ?>
		<!-- Denominator (T) -->
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Accomplishment->Visible) { // Accomplishment ?>
		<!-- Accomplishment -->
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->Visible) { // Numerator (A) ?>
		<!-- Numerator (A) -->
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->Visible) { // Denominator (A) ?>
		<!-- Denominator (A) -->
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->Visible) { // Supporting Documents Count ?>
		<!-- Supporting Documents Count -->
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Rating ?>
		<!-- Rating -->
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$frm_sam_rep_ta_form_a_0_cu_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$frm_sam_rep_ta_form_a_0_cu_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($frm_sam_rep_ta_form_a_0_cu_preview->Recordset)
	$frm_sam_rep_ta_form_a_0_cu_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$frm_sam_rep_ta_form_a_0_cu_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_rep_ta_form_a_0_cu_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'frm_sam_rep_ta_form_a_0_cu';

	// Page object name
	var $PageObjName = 'frm_sam_rep_ta_form_a_0_cu_preview';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_rep_ta_form_a_0_cu;
		if ($frm_sam_rep_ta_form_a_0_cu->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_rep_ta_form_a_0_cu->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_rep_ta_form_a_0_cu;
		if ($frm_sam_rep_ta_form_a_0_cu->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_rep_ta_form_a_0_cu->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_rep_ta_form_a_0_cu->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_rep_ta_form_a_0_cu_preview() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_rep_ta_form_a_0_cu)
		if (!isset($GLOBALS["frm_sam_rep_ta_form_a_0_cu"])) {
			$GLOBALS["frm_sam_rep_ta_form_a_0_cu"] = new cfrm_sam_rep_ta_form_a_0_cu();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_rep_ta_form_a_0_cu"];
		}

		// Table object (frm_sam_rep_ta_form_a_0)
		if (!isset($GLOBALS['frm_sam_rep_ta_form_a_0'])) $GLOBALS['frm_sam_rep_ta_form_a_0'] = new cfrm_sam_rep_ta_form_a_0();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'preview', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_rep_ta_form_a_0_cu', TRUE);

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
		global $frm_sam_rep_ta_form_a_0_cu;

		// Security
		$Security = new cAdvancedSecurity();
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('frm_sam_rep_ta_form_a_0_cu');
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
		global $Language, $frm_sam_rep_ta_form_a_0_cu;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$frm_sam_rep_ta_form_a_0_cu->Recordset_Selecting($filter);
		$this->Recordset = $frm_sam_rep_ta_form_a_0_cu->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$frm_sam_rep_ta_form_a_0_cu->Recordset_Selected($this->Recordset);
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
