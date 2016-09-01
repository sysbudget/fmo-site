<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_disciplinechedcodes_minorinfo.php" ?>
<?php include_once "ref_disciplinechedcodes_majorinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$ref_disciplinechedcodes_minor_preview = new cref_disciplinechedcodes_minor_preview();
$Page =& $ref_disciplinechedcodes_minor_preview;

// Page init
$ref_disciplinechedcodes_minor_preview->Page_Init();

// Page main
$ref_disciplinechedcodes_minor_preview->Page_Main();
?>
<link href="phpcss/db_facultyprofile_web_2D_20130515.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $ref_disciplinechedcodes_minor->TableCaption() ?>&nbsp;
<?php if ($ref_disciplinechedcodes_minor_preview->TotalRecs > 0) { ?>
(<?php echo $ref_disciplinechedcodes_minor_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $ref_disciplinechedcodes_minor_preview->ShowPageHeader(); ?>
<?php if ($ref_disciplinechedcodes_minor_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->Visible) { // disCHED_disciplineSpecific_id ?>
			<td valign="top"><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldCaption() ?></td>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->Visible) { // disCHED_disciplineSpecific_code ?>
			<td valign="top"><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FldCaption() ?></td>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->Visible) { // disCHED_disciplineSpecific_name ?>
			<td valign="top"><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->FldCaption() ?></td>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->Visible) { // disCHED_discipline_code ?>
			<td valign="top"><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->FldCaption() ?></td>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->Visible) { // disCHED_disciplineSpecific_academicUse ?>
			<td valign="top"><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ref_disciplinechedcodes_minor_preview->RecCount = 0;
while ($ref_disciplinechedcodes_minor_preview->Recordset && !$ref_disciplinechedcodes_minor_preview->Recordset->EOF) {

	// Init row class and style
	$ref_disciplinechedcodes_minor_preview->RecCount++;
	$ref_disciplinechedcodes_minor->CssClass = "";
	$ref_disciplinechedcodes_minor->CssStyle = "";
	$ref_disciplinechedcodes_minor->LoadListRowValues($ref_disciplinechedcodes_minor_preview->Recordset);

	// Render row
	$ref_disciplinechedcodes_minor->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$ref_disciplinechedcodes_minor->RenderListRow();
?>
	<tr<?php echo $ref_disciplinechedcodes_minor->RowAttributes() ?>>
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->Visible) { // disCHED_disciplineSpecific_id ?>
		<!-- disCHED_disciplineSpecific_id -->
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->Visible) { // disCHED_disciplineSpecific_code ?>
		<!-- disCHED_disciplineSpecific_code -->
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->Visible) { // disCHED_disciplineSpecific_name ?>
		<!-- disCHED_disciplineSpecific_name -->
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->Visible) { // disCHED_discipline_code ?>
		<!-- disCHED_discipline_code -->
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->Visible) { // disCHED_disciplineSpecific_academicUse ?>
		<!-- disCHED_disciplineSpecific_academicUse -->
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$ref_disciplinechedcodes_minor_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$ref_disciplinechedcodes_minor_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($ref_disciplinechedcodes_minor_preview->Recordset)
	$ref_disciplinechedcodes_minor_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$ref_disciplinechedcodes_minor_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_disciplinechedcodes_minor_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'ref_disciplinechedcodes_minor';

	// Page object name
	var $PageObjName = 'ref_disciplinechedcodes_minor_preview';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_disciplinechedcodes_minor;
		if ($ref_disciplinechedcodes_minor->UseTokenInUrl) $PageUrl .= "t=" . $ref_disciplinechedcodes_minor->TableVar . "&"; // Add page token
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
		global $objForm, $ref_disciplinechedcodes_minor;
		if ($ref_disciplinechedcodes_minor->UseTokenInUrl) {
			if ($objForm)
				return ($ref_disciplinechedcodes_minor->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_disciplinechedcodes_minor->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_disciplinechedcodes_minor_preview() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_disciplinechedcodes_minor)
		if (!isset($GLOBALS["ref_disciplinechedcodes_minor"])) {
			$GLOBALS["ref_disciplinechedcodes_minor"] = new cref_disciplinechedcodes_minor();
			$GLOBALS["Table"] =& $GLOBALS["ref_disciplinechedcodes_minor"];
		}

		// Table object (ref_disciplinechedcodes_major)
		if (!isset($GLOBALS['ref_disciplinechedcodes_major'])) $GLOBALS['ref_disciplinechedcodes_major'] = new cref_disciplinechedcodes_major();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'preview', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_disciplinechedcodes_minor', TRUE);

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
		global $ref_disciplinechedcodes_minor;

		// Security
		$Security = new cAdvancedSecurity();
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('ref_disciplinechedcodes_minor');
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
		global $Language, $ref_disciplinechedcodes_minor;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$ref_disciplinechedcodes_minor->Recordset_Selecting($filter);
		$this->Recordset = $ref_disciplinechedcodes_minor->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$ref_disciplinechedcodes_minor->Recordset_Selected($this->Recordset);
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
