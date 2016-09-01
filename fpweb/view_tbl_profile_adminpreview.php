<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "view_tbl_profile_admininfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "view_tbl_collectionperiod_admininfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$view_tbl_profile_admin_preview = new cview_tbl_profile_admin_preview();
$Page =& $view_tbl_profile_admin_preview;

// Page init
$view_tbl_profile_admin_preview->Page_Init();

// Page main
$view_tbl_profile_admin_preview->Page_Main();
?>
<link href="phpcss/db_facultyprofile_web_2D_20130515.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $view_tbl_profile_admin->TableCaption() ?>&nbsp;
<?php if ($view_tbl_profile_admin_preview->TotalRecs > 0) { ?>
(<?php echo $view_tbl_profile_admin_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $view_tbl_profile_admin_preview->ShowPageHeader(); ?>
<?php if ($view_tbl_profile_admin_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // faculty_name ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->faculty_name->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyGroup_CHEDCode ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyRank_ID ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyRank_ID->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_tenureCode ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_leaveCode ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalHrs_basic ?>
			<td valign="top"><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalSCH_basic ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalCr_ugrad ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalHrs_ugrad ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalSCH_ugrad ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalCr_graduate ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalHrs_graduate ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalSCH_graduate ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_total_nonTeachingLoad ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->FldCaption() ?></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_tbl_profile_admin_preview->RecCount = 0;
while ($view_tbl_profile_admin_preview->Recordset && !$view_tbl_profile_admin_preview->Recordset->EOF) {

	// Init row class and style
	$view_tbl_profile_admin_preview->RecCount++;
	$view_tbl_profile_admin->CssClass = "";
	$view_tbl_profile_admin->CssStyle = "";
	$view_tbl_profile_admin->LoadListRowValues($view_tbl_profile_admin_preview->Recordset);

	// Render row
	$view_tbl_profile_admin->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$view_tbl_profile_admin->RenderListRow();
?>
	<tr<?php echo $view_tbl_profile_admin->RowAttributes() ?>>
<?php if ($view_tbl_profile_admin->faculty_name->Visible) { // faculty_name ?>
		<!-- faculty_name -->
		<td<?php echo $view_tbl_profile_admin->faculty_name->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->faculty_name->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->faculty_name->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
		<!-- facultyGroup_CHEDCode -->
		<td<?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyRank_ID->Visible) { // facultyRank_ID ?>
		<!-- facultyRank_ID -->
		<td<?php echo $view_tbl_profile_admin->facultyRank_ID->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyRank_ID->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyRank_ID->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
		<!-- facultyprofile_tenureCode -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
		<!-- facultyprofile_leaveCode -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
		<!-- facultyprofile_specificDiscipline_1_primaryTeachingLoad -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_basic->Visible) { // facultyprofile_totalHrs_basic ?>
		<!-- facultyprofile_totalHrs_basic -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_basic->Visible) { // facultyprofile_totalSCH_basic ?>
		<!-- facultyprofile_totalSCH_basic -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->Visible) { // facultyprofile_totalCr_ugrad ?>
		<!-- facultyprofile_totalCr_ugrad -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->Visible) { // facultyprofile_totalHrs_ugrad ?>
		<!-- facultyprofile_totalHrs_ugrad -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->Visible) { // facultyprofile_totalSCH_ugrad ?>
		<!-- facultyprofile_totalSCH_ugrad -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalCr_graduate->Visible) { // facultyprofile_totalCr_graduate ?>
		<!-- facultyprofile_totalCr_graduate -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->Visible) { // facultyprofile_totalHrs_graduate ?>
		<!-- facultyprofile_totalHrs_graduate -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->Visible) { // facultyprofile_totalSCH_graduate ?>
		<!-- facultyprofile_totalSCH_graduate -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->Visible) { // facultyprofile_total_nonTeachingLoad ?>
		<!-- facultyprofile_total_nonTeachingLoad -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
		<!-- facultyprofile_totalWorkloadInCreditUnits_gen -->
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$view_tbl_profile_admin_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$view_tbl_profile_admin_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($view_tbl_profile_admin_preview->Recordset)
	$view_tbl_profile_admin_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$view_tbl_profile_admin_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class cview_tbl_profile_admin_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'view_tbl_profile_admin';

	// Page object name
	var $PageObjName = 'view_tbl_profile_admin_preview';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $view_tbl_profile_admin;
		if ($view_tbl_profile_admin->UseTokenInUrl) $PageUrl .= "t=" . $view_tbl_profile_admin->TableVar . "&"; // Add page token
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
		global $objForm, $view_tbl_profile_admin;
		if ($view_tbl_profile_admin->UseTokenInUrl) {
			if ($objForm)
				return ($view_tbl_profile_admin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($view_tbl_profile_admin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cview_tbl_profile_admin_preview() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (view_tbl_profile_admin)
		if (!isset($GLOBALS["view_tbl_profile_admin"])) {
			$GLOBALS["view_tbl_profile_admin"] = new cview_tbl_profile_admin();
			$GLOBALS["Table"] =& $GLOBALS["view_tbl_profile_admin"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Table object (view_tbl_collectionperiod_admin)
		if (!isset($GLOBALS['view_tbl_collectionperiod_admin'])) $GLOBALS['view_tbl_collectionperiod_admin'] = new cview_tbl_collectionperiod_admin();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'preview', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'view_tbl_profile_admin', TRUE);

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
		global $view_tbl_profile_admin;

		// Security
		$Security = new cAdvancedSecurity();
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('view_tbl_profile_admin');
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
		global $Language, $view_tbl_profile_admin;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$view_tbl_profile_admin->Recordset_Selecting($filter);
		$this->Recordset = $view_tbl_profile_admin->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$view_tbl_profile_admin->Recordset_Selected($this->Recordset);
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
