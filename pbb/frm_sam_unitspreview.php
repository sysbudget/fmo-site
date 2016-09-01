<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_sam_unitsinfo.php" ?>
<?php include_once "frm_sam_cu_executive_officesinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$frm_sam_units_preview = new cfrm_sam_units_preview();
$Page =& $frm_sam_units_preview;

// Page init
$frm_sam_units_preview->Page_Init();

// Page main
$frm_sam_units_preview->Page_Main();
?>
<link href="phpcss/db_pbb_2015.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $frm_sam_units->TableCaption() ?>&nbsp;
<?php if ($frm_sam_units_preview->TotalRecs > 0) { ?>
(<?php echo $frm_sam_units_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $frm_sam_units_preview->ShowPageHeader(); ?>
<?php if ($frm_sam_units_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($frm_sam_units->focal_person_id->Visible) { // cu_unit_name ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $frm_sam_units->cu_unit_name->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_units->focal_person_id->Visible) { // personnel_count ?>
			<td valign="top"><?php echo $frm_sam_units->personnel_count->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_units->focal_person_id->Visible) { // mfo_1 ?>
			<td valign="top"><?php echo $frm_sam_units->mfo_1->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_units->focal_person_id->Visible) { // mfo_2 ?>
			<td valign="top"><?php echo $frm_sam_units->mfo_2->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_units->focal_person_id->Visible) { // mfo_3 ?>
			<td valign="top"><?php echo $frm_sam_units->mfo_3->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_units->focal_person_id->Visible) { // mfo_4 ?>
			<td valign="top"><?php echo $frm_sam_units->mfo_4->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_units->focal_person_id->Visible) { // mfo_5 ?>
			<td valign="top"><?php echo $frm_sam_units->mfo_5->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_units->focal_person_id->Visible) { // sto ?>
			<td valign="top"><?php echo $frm_sam_units->sto->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_units->focal_person_id->Visible) { // gass ?>
			<td valign="top"><?php echo $frm_sam_units->gass->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_sam_units->focal_person_id->Visible) { // t_cutOffDate_remarks ?>
			<td valign="top"><?php echo $frm_sam_units->t_cutOffDate_remarks->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$frm_sam_units_preview->RecCount = 0;
while ($frm_sam_units_preview->Recordset && !$frm_sam_units_preview->Recordset->EOF) {

	// Init row class and style
	$frm_sam_units_preview->RecCount++;
	$frm_sam_units->CssClass = "";
	$frm_sam_units->CssStyle = "";
	$frm_sam_units->LoadListRowValues($frm_sam_units_preview->Recordset);

	// Render row
	$frm_sam_units->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$frm_sam_units->RenderListRow();
?>
	<tr<?php echo $frm_sam_units->RowAttributes() ?>>
<?php if ($frm_sam_units->cu_unit_name->Visible) { // cu_unit_name ?>
		<!-- cu_unit_name -->
		<td<?php echo $frm_sam_units->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_sam_units->cu_unit_name->ViewAttributes() ?>><?php echo $frm_sam_units->cu_unit_name->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_units->personnel_count->Visible) { // personnel_count ?>
		<!-- personnel_count -->
		<td<?php echo $frm_sam_units->personnel_count->CellAttributes() ?>>
<div<?php echo $frm_sam_units->personnel_count->ViewAttributes() ?>><?php echo $frm_sam_units->personnel_count->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_units->mfo_1->Visible) { // mfo_1 ?>
		<!-- mfo_1 -->
		<td<?php echo $frm_sam_units->mfo_1->CellAttributes() ?>>
<div<?php echo $frm_sam_units->mfo_1->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_1->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_units->mfo_2->Visible) { // mfo_2 ?>
		<!-- mfo_2 -->
		<td<?php echo $frm_sam_units->mfo_2->CellAttributes() ?>>
<div<?php echo $frm_sam_units->mfo_2->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_2->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_units->mfo_3->Visible) { // mfo_3 ?>
		<!-- mfo_3 -->
		<td<?php echo $frm_sam_units->mfo_3->CellAttributes() ?>>
<div<?php echo $frm_sam_units->mfo_3->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_3->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_units->mfo_4->Visible) { // mfo_4 ?>
		<!-- mfo_4 -->
		<td<?php echo $frm_sam_units->mfo_4->CellAttributes() ?>>
<div<?php echo $frm_sam_units->mfo_4->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_4->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_units->mfo_5->Visible) { // mfo_5 ?>
		<!-- mfo_5 -->
		<td<?php echo $frm_sam_units->mfo_5->CellAttributes() ?>>
<div<?php echo $frm_sam_units->mfo_5->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_5->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_units->sto->Visible) { // sto ?>
		<!-- sto -->
		<td<?php echo $frm_sam_units->sto->CellAttributes() ?>>
<div<?php echo $frm_sam_units->sto->ViewAttributes() ?>><?php echo $frm_sam_units->sto->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_units->gass->Visible) { // gass ?>
		<!-- gass -->
		<td<?php echo $frm_sam_units->gass->CellAttributes() ?>>
<div<?php echo $frm_sam_units->gass->ViewAttributes() ?>><?php echo $frm_sam_units->gass->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_sam_units->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
		<!-- t_cutOffDate_remarks -->
		<td<?php echo $frm_sam_units->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_units->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_sam_units->t_cutOffDate_remarks->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$frm_sam_units_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$frm_sam_units_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($frm_sam_units_preview->Recordset)
	$frm_sam_units_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$frm_sam_units_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_units_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'frm_sam_units';

	// Page object name
	var $PageObjName = 'frm_sam_units_preview';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_units;
		if ($frm_sam_units->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_units->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_units;
		if ($frm_sam_units->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_units->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_units->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_units_preview() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_units)
		if (!isset($GLOBALS["frm_sam_units"])) {
			$GLOBALS["frm_sam_units"] = new cfrm_sam_units();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_units"];
		}

		// Table object (frm_sam_cu_executive_offices)
		if (!isset($GLOBALS['frm_sam_cu_executive_offices'])) $GLOBALS['frm_sam_cu_executive_offices'] = new cfrm_sam_cu_executive_offices();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'preview', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_units', TRUE);

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
		global $frm_sam_units;

		// Security
		$Security = new cAdvancedSecurity();
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('frm_sam_units');
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
		global $Language, $frm_sam_units;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$frm_sam_units->Recordset_Selecting($filter);
		$this->Recordset = $frm_sam_units->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$frm_sam_units->Recordset_Selected($this->Recordset);
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
