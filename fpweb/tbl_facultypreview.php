<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_facultyinfo.php" ?>
<?php include_once "tbl_uporgchart_unitinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$tbl_faculty_preview = new ctbl_faculty_preview();
$Page =& $tbl_faculty_preview;

// Page init
$tbl_faculty_preview->Page_Init();

// Page main
$tbl_faculty_preview->Page_Main();
?>
<link href="phpcss/db_facultyprofile_web_2D_20130515.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $tbl_faculty->TableCaption() ?>&nbsp;
<?php if ($tbl_faculty_preview->TotalRecs > 0) { ?>
(<?php echo $tbl_faculty_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $tbl_faculty_preview->ShowPageHeader(); ?>
<?php if ($tbl_faculty_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($tbl_faculty->faculty_ID->Visible) { // faculty_name ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_faculty->faculty_name->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_faculty->faculty_ID->Visible) { // faculty_birthDate ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_faculty->faculty_birthDate->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_faculty->faculty_ID->Visible) { // gender_ID ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_faculty->gender_ID->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_faculty->faculty_ID->Visible) { // faculty_highestDegreeListed ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_faculty->faculty_highestDegreeListed->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_faculty->faculty_ID->Visible) { // degreelevelFaculty_ID ?>
			<td valign="top"><?php echo $tbl_faculty->degreelevelFaculty_ID->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$tbl_faculty_preview->RecCount = 0;
while ($tbl_faculty_preview->Recordset && !$tbl_faculty_preview->Recordset->EOF) {

	// Init row class and style
	$tbl_faculty_preview->RecCount++;
	$tbl_faculty->CssClass = "";
	$tbl_faculty->CssStyle = "";
	$tbl_faculty->LoadListRowValues($tbl_faculty_preview->Recordset);

	// Render row
	$tbl_faculty->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$tbl_faculty->RenderListRow();
?>
	<tr<?php echo $tbl_faculty->RowAttributes() ?>>
<?php if ($tbl_faculty->faculty_name->Visible) { // faculty_name ?>
		<!-- faculty_name -->
		<td<?php echo $tbl_faculty->faculty_name->CellAttributes() ?>>
<div<?php echo $tbl_faculty->faculty_name->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_name->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_faculty->faculty_birthDate->Visible) { // faculty_birthDate ?>
		<!-- faculty_birthDate -->
		<td<?php echo $tbl_faculty->faculty_birthDate->CellAttributes() ?>>
<div<?php echo $tbl_faculty->faculty_birthDate->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_birthDate->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_faculty->gender_ID->Visible) { // gender_ID ?>
		<!-- gender_ID -->
		<td<?php echo $tbl_faculty->gender_ID->CellAttributes() ?>>
<div<?php echo $tbl_faculty->gender_ID->ViewAttributes() ?>><?php echo $tbl_faculty->gender_ID->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_faculty->faculty_highestDegreeListed->Visible) { // faculty_highestDegreeListed ?>
		<!-- faculty_highestDegreeListed -->
		<td<?php echo $tbl_faculty->faculty_highestDegreeListed->CellAttributes() ?>>
<div<?php echo $tbl_faculty->faculty_highestDegreeListed->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_highestDegreeListed->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_faculty->degreelevelFaculty_ID->Visible) { // degreelevelFaculty_ID ?>
		<!-- degreelevelFaculty_ID -->
		<td<?php echo $tbl_faculty->degreelevelFaculty_ID->CellAttributes() ?>>
<div<?php echo $tbl_faculty->degreelevelFaculty_ID->ViewAttributes() ?>><?php echo $tbl_faculty->degreelevelFaculty_ID->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$tbl_faculty_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$tbl_faculty_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($tbl_faculty_preview->Recordset)
	$tbl_faculty_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$tbl_faculty_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_faculty_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'tbl_faculty';

	// Page object name
	var $PageObjName = 'tbl_faculty_preview';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_faculty;
		if ($tbl_faculty->UseTokenInUrl) $PageUrl .= "t=" . $tbl_faculty->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_faculty;
		if ($tbl_faculty->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_faculty->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_faculty->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_faculty_preview() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_faculty)
		if (!isset($GLOBALS["tbl_faculty"])) {
			$GLOBALS["tbl_faculty"] = new ctbl_faculty();
			$GLOBALS["Table"] =& $GLOBALS["tbl_faculty"];
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
			define("UP_TABLE_NAME", 'tbl_faculty', TRUE);

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
		global $tbl_faculty;

		// Security
		$Security = new cAdvancedSecurity();
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('tbl_faculty');
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
		global $Language, $tbl_faculty;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$tbl_faculty->Recordset_Selecting($filter);
		$this->Recordset = $tbl_faculty->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$tbl_faculty->Recordset_Selected($this->Recordset);
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
