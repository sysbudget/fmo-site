<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_collectionperiodinfo.php" ?>
<?php include_once "tbl_uporgchart_unitinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$tbl_collectionperiod_preview = new ctbl_collectionperiod_preview();
$Page =& $tbl_collectionperiod_preview;

// Page init
$tbl_collectionperiod_preview->Page_Init();

// Page main
$tbl_collectionperiod_preview->Page_Main();
?>
<link href="phpcss/db_facultyprofile_web_2D_20130515.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $tbl_collectionperiod->TableCaption() ?>&nbsp;
<?php if ($tbl_collectionperiod_preview->TotalRecs > 0) { ?>
(<?php echo $tbl_collectionperiod_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $tbl_collectionperiod_preview->ShowPageHeader(); ?>
<?php if ($tbl_collectionperiod_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($tbl_collectionperiod->unitID->Visible) { // collectionPeriod_ay ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_collectionperiod->collectionPeriod_ay->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_collectionperiod->unitID->Visible) { // collectionPeriod_sem ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_collectionperiod->collectionPeriod_sem->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_collectionperiod->unitID->Visible) { // collectionPeriod_cutOffDate ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_collectionperiod->unitID->Visible) { // collectionPeriod_status ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_collectionperiod->collectionPeriod_status->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$tbl_collectionperiod_preview->RecCount = 0;
while ($tbl_collectionperiod_preview->Recordset && !$tbl_collectionperiod_preview->Recordset->EOF) {

	// Init row class and style
	$tbl_collectionperiod_preview->RecCount++;
	$tbl_collectionperiod->CssClass = "";
	$tbl_collectionperiod->CssStyle = "";
	$tbl_collectionperiod->LoadListRowValues($tbl_collectionperiod_preview->Recordset);

	// Render row
	$tbl_collectionperiod->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$tbl_collectionperiod->RenderListRow();
?>
	<tr<?php echo $tbl_collectionperiod->RowAttributes() ?>>
<?php if ($tbl_collectionperiod->collectionPeriod_ay->Visible) { // collectionPeriod_ay ?>
		<!-- collectionPeriod_ay -->
		<td<?php echo $tbl_collectionperiod->collectionPeriod_ay->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->collectionPeriod_ay->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_ay->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_collectionperiod->collectionPeriod_sem->Visible) { // collectionPeriod_sem ?>
		<!-- collectionPeriod_sem -->
		<td<?php echo $tbl_collectionperiod->collectionPeriod_sem->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->collectionPeriod_sem->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_sem->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_collectionperiod->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
		<!-- collectionPeriod_cutOffDate -->
		<td<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_collectionperiod->collectionPeriod_status->Visible) { // collectionPeriod_status ?>
		<!-- collectionPeriod_status -->
		<td<?php echo $tbl_collectionperiod->collectionPeriod_status->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->collectionPeriod_status->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_status->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$tbl_collectionperiod_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$tbl_collectionperiod_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($tbl_collectionperiod_preview->Recordset)
	$tbl_collectionperiod_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$tbl_collectionperiod_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_collectionperiod_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'tbl_collectionperiod';

	// Page object name
	var $PageObjName = 'tbl_collectionperiod_preview';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_collectionperiod;
		if ($tbl_collectionperiod->UseTokenInUrl) $PageUrl .= "t=" . $tbl_collectionperiod->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_collectionperiod;
		if ($tbl_collectionperiod->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_collectionperiod->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_collectionperiod->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_collectionperiod_preview() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_collectionperiod)
		if (!isset($GLOBALS["tbl_collectionperiod"])) {
			$GLOBALS["tbl_collectionperiod"] = new ctbl_collectionperiod();
			$GLOBALS["Table"] =& $GLOBALS["tbl_collectionperiod"];
		}

		// Table object (tbl_uporgchart_unit)
		if (!isset($GLOBALS['tbl_uporgchart_unit'])) $GLOBALS['tbl_uporgchart_unit'] = new ctbl_uporgchart_unit();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'preview', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_collectionperiod', TRUE);

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
		global $tbl_collectionperiod;

		// Security
		$Security = new cAdvancedSecurity();
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('tbl_collectionperiod');
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
		global $Language, $tbl_collectionperiod;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$tbl_collectionperiod->Recordset_Selecting($filter);
		$this->Recordset = $tbl_collectionperiod->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$tbl_collectionperiod->Recordset_Selected($this->Recordset);
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
