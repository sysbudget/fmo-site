<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_fp_rep_a_eligible_status_unitinfo.php" ?>
<?php include_once "frm_fp_rep_a_eligible_statusinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$frm_fp_rep_a_eligible_status_unit_preview = new cfrm_fp_rep_a_eligible_status_unit_preview();
$Page =& $frm_fp_rep_a_eligible_status_unit_preview;

// Page init
$frm_fp_rep_a_eligible_status_unit_preview->Page_Init();

// Page main
$frm_fp_rep_a_eligible_status_unit_preview->Page_Main();
?>
<link href="phpcss/db_pbb_2015.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $frm_fp_rep_a_eligible_status_unit->TableCaption() ?>&nbsp;
<?php if ($frm_fp_rep_a_eligible_status_unit_preview->TotalRecs > 0) { ?>
(<?php echo $frm_fp_rep_a_eligible_status_unit_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $frm_fp_rep_a_eligible_status_unit_preview->ShowPageHeader(); ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($frm_fp_rep_a_eligible_status_unit->focal_person_id->Visible) { // cu_unit_name ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->focal_person_id->Visible) { // personnel_count ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->focal_person_id->Visible) { // Participated MFO Count ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->focal_person_id->Visible) { // Not Started MFO Count ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->focal_person_id->Visible) { // % Not Started MFO ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->focal_person_id->Visible) { // Status ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->Status->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->focal_person_id->Visible) { // Not Eligible MFO Count ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->focal_person_id->Visible) { // % Not Eligible MFO Count ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->focal_person_id->Visible) { // Eligible MFO Count ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->focal_person_id->Visible) { // % Eligible MFO Count ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->focal_person_id->Visible) { // Remarks ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$frm_fp_rep_a_eligible_status_unit_preview->RecCount = 0;
while ($frm_fp_rep_a_eligible_status_unit_preview->Recordset && !$frm_fp_rep_a_eligible_status_unit_preview->Recordset->EOF) {

	// Init row class and style
	$frm_fp_rep_a_eligible_status_unit_preview->RecCount++;
	$frm_fp_rep_a_eligible_status_unit->CssClass = "";
	$frm_fp_rep_a_eligible_status_unit->CssStyle = "";
	$frm_fp_rep_a_eligible_status_unit->LoadListRowValues($frm_fp_rep_a_eligible_status_unit_preview->Recordset);

	// Render row
	$frm_fp_rep_a_eligible_status_unit->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$frm_fp_rep_a_eligible_status_unit->RenderListRow();
?>
	<tr<?php echo $frm_fp_rep_a_eligible_status_unit->RowAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit->cu_unit_name->Visible) { // cu_unit_name ?>
		<!-- cu_unit_name -->
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->personnel_count->Visible) { // personnel_count ?>
		<!-- personnel_count -->
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->Visible) { // Participated MFO Count ?>
		<!-- Participated MFO Count -->
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->Visible) { // Not Started MFO Count ?>
		<!-- Not Started MFO Count -->
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->Visible) { // % Not Started MFO ?>
		<!-- % Not Started MFO -->
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->Status->Visible) { // Status ?>
		<!-- Status -->
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->Status->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Status->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Status->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->Visible) { // Not Eligible MFO Count ?>
		<!-- Not Eligible MFO Count -->
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->Visible) { // % Not Eligible MFO Count ?>
		<!-- % Not Eligible MFO Count -->
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->Visible) { // Eligible MFO Count ?>
		<!-- Eligible MFO Count -->
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->Visible) { // % Eligible MFO Count ?>
		<!-- % Eligible MFO Count -->
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->Remarks->Visible) { // Remarks ?>
		<!-- Remarks -->
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$frm_fp_rep_a_eligible_status_unit_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$frm_fp_rep_a_eligible_status_unit_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($frm_fp_rep_a_eligible_status_unit_preview->Recordset)
	$frm_fp_rep_a_eligible_status_unit_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$frm_fp_rep_a_eligible_status_unit_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_rep_a_eligible_status_unit_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'frm_fp_rep_a_eligible_status_unit';

	// Page object name
	var $PageObjName = 'frm_fp_rep_a_eligible_status_unit_preview';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_rep_a_eligible_status_unit;
		if ($frm_fp_rep_a_eligible_status_unit->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_rep_a_eligible_status_unit->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_rep_a_eligible_status_unit;
		if ($frm_fp_rep_a_eligible_status_unit->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_rep_a_eligible_status_unit->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_rep_a_eligible_status_unit->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_rep_a_eligible_status_unit_preview() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_rep_a_eligible_status_unit)
		if (!isset($GLOBALS["frm_fp_rep_a_eligible_status_unit"])) {
			$GLOBALS["frm_fp_rep_a_eligible_status_unit"] = new cfrm_fp_rep_a_eligible_status_unit();
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_rep_a_eligible_status_unit"];
		}

		// Table object (frm_fp_rep_a_eligible_status)
		if (!isset($GLOBALS['frm_fp_rep_a_eligible_status'])) $GLOBALS['frm_fp_rep_a_eligible_status'] = new cfrm_fp_rep_a_eligible_status();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'preview', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_rep_a_eligible_status_unit', TRUE);

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
		global $frm_fp_rep_a_eligible_status_unit;

		// Security
		$Security = new cAdvancedSecurity();
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('frm_fp_rep_a_eligible_status_unit');
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
		global $Language, $frm_fp_rep_a_eligible_status_unit;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$frm_fp_rep_a_eligible_status_unit->Recordset_Selecting($filter);
		$this->Recordset = $frm_fp_rep_a_eligible_status_unit->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$frm_fp_rep_a_eligible_status_unit->Recordset_Selected($this->Recordset);
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
