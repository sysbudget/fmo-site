<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_profileinfo.php" ?>
<?php include_once "tbl_collectionperiodinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$tbl_profile_preview = new ctbl_profile_preview();
$Page =& $tbl_profile_preview;

// Page init
$tbl_profile_preview->Page_Init();

// Page main
$tbl_profile_preview->Page_Main();
?>
<link href="phpcss/db_facultyprofile_web_2D_20130515.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $tbl_profile->TableCaption() ?>&nbsp;
<?php if ($tbl_profile_preview->TotalRecs > 0) { ?>
(<?php echo $tbl_profile_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $tbl_profile_preview->ShowPageHeader(); ?>
<?php if ($tbl_profile_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($tbl_profile->unitID->Visible) { // faculty_name ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->faculty_name->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyGroup_CHEDCode ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyGroup_CHEDCode->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyRank_ID ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyRank_ID->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_tenureCode ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_tenureCode->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_leaveCode ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_leaveCode->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_totalHrs_basic ?>
			<td valign="top"><?php echo $tbl_profile->facultyprofile_totalHrs_basic->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_totalSCH_basic ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalSCH_basic->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_totalCr_ugrad ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalCr_ugrad->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_totalHrs_ugrad ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_totalSCH_ugrad ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_totalCr_graduate ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalCr_graduate->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_totalHrs_graduate ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalHrs_graduate->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_totalSCH_graduate ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalSCH_graduate->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_total_nonTeachingLoad ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_profile->unitID->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$tbl_profile_preview->RecCount = 0;
while ($tbl_profile_preview->Recordset && !$tbl_profile_preview->Recordset->EOF) {

	// Init row class and style
	$tbl_profile_preview->RecCount++;
	$tbl_profile->CssClass = "";
	$tbl_profile->CssStyle = "";
	$tbl_profile->LoadListRowValues($tbl_profile_preview->Recordset);

	// Render row
	$tbl_profile->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$tbl_profile->RenderListRow();
?>
	<tr<?php echo $tbl_profile->RowAttributes() ?>>
<?php if ($tbl_profile->faculty_name->Visible) { // faculty_name ?>
		<!-- faculty_name -->
		<td<?php echo $tbl_profile->faculty_name->CellAttributes() ?>>
<div<?php echo $tbl_profile->faculty_name->ViewAttributes() ?>><?php echo $tbl_profile->faculty_name->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
		<!-- facultyGroup_CHEDCode -->
		<td<?php echo $tbl_profile->facultyGroup_CHEDCode->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyGroup_CHEDCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyGroup_CHEDCode->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyRank_ID->Visible) { // facultyRank_ID ?>
		<!-- facultyRank_ID -->
		<td<?php echo $tbl_profile->facultyRank_ID->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyRank_ID->ViewAttributes() ?>><?php echo $tbl_profile->facultyRank_ID->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
		<!-- facultyprofile_tenureCode -->
		<td<?php echo $tbl_profile->facultyprofile_tenureCode->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_tenureCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_tenureCode->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
		<!-- facultyprofile_leaveCode -->
		<td<?php echo $tbl_profile->facultyprofile_leaveCode->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_leaveCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_leaveCode->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
		<!-- facultyprofile_specificDiscipline_1_primaryTeachingLoad -->
		<td<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_totalHrs_basic->Visible) { // facultyprofile_totalHrs_basic ?>
		<!-- facultyprofile_totalHrs_basic -->
		<td<?php echo $tbl_profile->facultyprofile_totalHrs_basic->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_basic->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_basic->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_totalSCH_basic->Visible) { // facultyprofile_totalSCH_basic ?>
		<!-- facultyprofile_totalSCH_basic -->
		<td<?php echo $tbl_profile->facultyprofile_totalSCH_basic->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_basic->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_basic->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_totalCr_ugrad->Visible) { // facultyprofile_totalCr_ugrad ?>
		<!-- facultyprofile_totalCr_ugrad -->
		<td<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalCr_ugrad->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_totalHrs_ugrad->Visible) { // facultyprofile_totalHrs_ugrad ?>
		<!-- facultyprofile_totalHrs_ugrad -->
		<td<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_totalSCH_ugrad->Visible) { // facultyprofile_totalSCH_ugrad ?>
		<!-- facultyprofile_totalSCH_ugrad -->
		<td<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_totalCr_graduate->Visible) { // facultyprofile_totalCr_graduate ?>
		<!-- facultyprofile_totalCr_graduate -->
		<td<?php echo $tbl_profile->facultyprofile_totalCr_graduate->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalCr_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalCr_graduate->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_totalHrs_graduate->Visible) { // facultyprofile_totalHrs_graduate ?>
		<!-- facultyprofile_totalHrs_graduate -->
		<td<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_graduate->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_totalSCH_graduate->Visible) { // facultyprofile_totalSCH_graduate ?>
		<!-- facultyprofile_totalSCH_graduate -->
		<td<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_graduate->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_total_nonTeachingLoad->Visible) { // facultyprofile_total_nonTeachingLoad ?>
		<!-- facultyprofile_total_nonTeachingLoad -->
		<td<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
		<!-- facultyprofile_totalWorkloadInCreditUnits_gen -->
		<td<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$tbl_profile_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$tbl_profile_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($tbl_profile_preview->Recordset)
	$tbl_profile_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$tbl_profile_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_profile_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'tbl_profile';

	// Page object name
	var $PageObjName = 'tbl_profile_preview';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_profile;
		if ($tbl_profile->UseTokenInUrl) $PageUrl .= "t=" . $tbl_profile->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_profile;
		if ($tbl_profile->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_profile->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_profile->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_profile_preview() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_profile)
		if (!isset($GLOBALS["tbl_profile"])) {
			$GLOBALS["tbl_profile"] = new ctbl_profile();
			$GLOBALS["Table"] =& $GLOBALS["tbl_profile"];
		}

		// Table object (tbl_collectionperiod)
		if (!isset($GLOBALS['tbl_collectionperiod'])) $GLOBALS['tbl_collectionperiod'] = new ctbl_collectionperiod();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'preview', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_profile', TRUE);

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
		global $tbl_profile;

		// Security
		$Security = new cAdvancedSecurity();
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('tbl_profile');
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
		global $Language, $tbl_profile;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$tbl_profile->Recordset_Selecting($filter);
		$this->Recordset = $tbl_profile->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$tbl_profile->Recordset_Selected($this->Recordset);
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
