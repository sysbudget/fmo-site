<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_degreesinfo.php" ?>
<?php include_once "tbl_facultyinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$tbl_degrees_preview = new ctbl_degrees_preview();
$Page =& $tbl_degrees_preview;

// Page init
$tbl_degrees_preview->Page_Init();

// Page main
$tbl_degrees_preview->Page_Main();
?>
<link href="phpcss/db_facultyprofile_web_2D_20130515.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $tbl_degrees->TableCaption() ?>&nbsp;
<?php if ($tbl_degrees_preview->TotalRecs > 0) { ?>
(<?php echo $tbl_degrees_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $tbl_degrees_preview->ShowPageHeader(); ?>
<?php if ($tbl_degrees_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($tbl_degrees->degrees_ID->Visible) { // degrees_level ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_level->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_degrees->degrees_ID->Visible) { // degrees_disciplineCode ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_disciplineCode->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_degrees->degrees_ID->Visible) { // degrees_fieldOfStudy ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_fieldOfStudy->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_degrees->degrees_ID->Visible) { // degrees_wroteThesisDissertation ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_wroteThesisDissertation->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_degrees->degrees_ID->Visible) { // degrees_primaryDegree ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_primaryDegree->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$tbl_degrees_preview->RecCount = 0;
while ($tbl_degrees_preview->Recordset && !$tbl_degrees_preview->Recordset->EOF) {

	// Init row class and style
	$tbl_degrees_preview->RecCount++;
	$tbl_degrees->CssClass = "";
	$tbl_degrees->CssStyle = "";
	$tbl_degrees->LoadListRowValues($tbl_degrees_preview->Recordset);

	// Render row
	$tbl_degrees->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$tbl_degrees->RenderListRow();
?>
	<tr<?php echo $tbl_degrees->RowAttributes() ?>>
<?php if ($tbl_degrees->degrees_level->Visible) { // degrees_level ?>
		<!-- degrees_level -->
		<td<?php echo $tbl_degrees->degrees_level->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_level->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_level->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_degrees->degrees_disciplineCode->Visible) { // degrees_disciplineCode ?>
		<!-- degrees_disciplineCode -->
		<td<?php echo $tbl_degrees->degrees_disciplineCode->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_disciplineCode->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_disciplineCode->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_degrees->degrees_fieldOfStudy->Visible) { // degrees_fieldOfStudy ?>
		<!-- degrees_fieldOfStudy -->
		<td<?php echo $tbl_degrees->degrees_fieldOfStudy->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_fieldOfStudy->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_fieldOfStudy->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_degrees->degrees_wroteThesisDissertation->Visible) { // degrees_wroteThesisDissertation ?>
		<!-- degrees_wroteThesisDissertation -->
		<td<?php echo $tbl_degrees->degrees_wroteThesisDissertation->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_wroteThesisDissertation->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_wroteThesisDissertation->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_degrees->degrees_primaryDegree->Visible) { // degrees_primaryDegree ?>
		<!-- degrees_primaryDegree -->
		<td<?php echo $tbl_degrees->degrees_primaryDegree->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_primaryDegree->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_primaryDegree->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$tbl_degrees_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$tbl_degrees_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($tbl_degrees_preview->Recordset)
	$tbl_degrees_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$tbl_degrees_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_degrees_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'tbl_degrees';

	// Page object name
	var $PageObjName = 'tbl_degrees_preview';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_degrees;
		if ($tbl_degrees->UseTokenInUrl) $PageUrl .= "t=" . $tbl_degrees->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_degrees;
		if ($tbl_degrees->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_degrees->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_degrees->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_degrees_preview() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_degrees)
		if (!isset($GLOBALS["tbl_degrees"])) {
			$GLOBALS["tbl_degrees"] = new ctbl_degrees();
			$GLOBALS["Table"] =& $GLOBALS["tbl_degrees"];
		}

		// Table object (tbl_faculty)
		if (!isset($GLOBALS['tbl_faculty'])) $GLOBALS['tbl_faculty'] = new ctbl_faculty();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'preview', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_degrees', TRUE);

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
		global $tbl_degrees;

		// Security
		$Security = new cAdvancedSecurity();
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('tbl_degrees');
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
		global $Language, $tbl_degrees;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$tbl_degrees->Recordset_Selecting($filter);
		$this->Recordset = $tbl_degrees->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$tbl_degrees->Recordset_Selected($this->Recordset);
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
