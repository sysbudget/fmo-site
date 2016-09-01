<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "view_tbl_uporgchart_cu_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$tbl_users_preview = new ctbl_users_preview();
$Page =& $tbl_users_preview;

// Page init
$tbl_users_preview->Page_Init();

// Page main
$tbl_users_preview->Page_Main();
?>
<link href="phpcss/db_facultyprofile_web_2D_20130515.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $tbl_users->TableCaption() ?>&nbsp;
<?php if ($tbl_users_preview->TotalRecs > 0) { ?>
(<?php echo $tbl_users_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $tbl_users_preview->ShowPageHeader(); ?>
<?php if ($tbl_users_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($tbl_users->unitID->Visible) { // users_ID ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_users->users_ID->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_users->unitID->Visible) { // unitID ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_users->unitID->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_users->unitID->Visible) { // users_name ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_users->users_name->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_users->unitID->Visible) { // users_userLoginName ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_users->users_userLoginName->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_users->unitID->Visible) { // users_password ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_users->users_password->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_users->unitID->Visible) { // users_userLevel ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_users->users_userLevel->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_users->unitID->Visible) { // users_email ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_users->users_email->FldCaption() ?></td>
<?php } ?>
<?php if ($tbl_users->unitID->Visible) { // users_contactNo ?>
			<td valign="top" style="white-space: nowrap;"><?php echo $tbl_users->users_contactNo->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$tbl_users_preview->RecCount = 0;
while ($tbl_users_preview->Recordset && !$tbl_users_preview->Recordset->EOF) {

	// Init row class and style
	$tbl_users_preview->RecCount++;
	$tbl_users->CssClass = "";
	$tbl_users->CssStyle = "";
	$tbl_users->LoadListRowValues($tbl_users_preview->Recordset);

	// Render row
	$tbl_users->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$tbl_users->RenderListRow();
?>
	<tr<?php echo $tbl_users->RowAttributes() ?>>
<?php if ($tbl_users->users_ID->Visible) { // users_ID ?>
		<!-- users_ID -->
		<td<?php echo $tbl_users->users_ID->CellAttributes() ?>>
<div<?php echo $tbl_users->users_ID->ViewAttributes() ?>><?php echo $tbl_users->users_ID->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_users->unitID->Visible) { // unitID ?>
		<!-- unitID -->
		<td<?php echo $tbl_users->unitID->CellAttributes() ?>>
<div<?php echo $tbl_users->unitID->ViewAttributes() ?>><?php echo $tbl_users->unitID->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_users->users_name->Visible) { // users_name ?>
		<!-- users_name -->
		<td<?php echo $tbl_users->users_name->CellAttributes() ?>>
<div<?php echo $tbl_users->users_name->ViewAttributes() ?>><?php echo $tbl_users->users_name->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_users->users_userLoginName->Visible) { // users_userLoginName ?>
		<!-- users_userLoginName -->
		<td<?php echo $tbl_users->users_userLoginName->CellAttributes() ?>>
<div<?php echo $tbl_users->users_userLoginName->ViewAttributes() ?>><?php echo $tbl_users->users_userLoginName->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_users->users_password->Visible) { // users_password ?>
		<!-- users_password -->
		<td<?php echo $tbl_users->users_password->CellAttributes() ?>>
<div<?php echo $tbl_users->users_password->ViewAttributes() ?>><?php echo $tbl_users->users_password->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_users->users_userLevel->Visible) { // users_userLevel ?>
		<!-- users_userLevel -->
		<td<?php echo $tbl_users->users_userLevel->CellAttributes() ?>>
<div<?php echo $tbl_users->users_userLevel->ViewAttributes() ?>><?php echo $tbl_users->users_userLevel->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_users->users_email->Visible) { // users_email ?>
		<!-- users_email -->
		<td<?php echo $tbl_users->users_email->CellAttributes() ?>>
<div<?php echo $tbl_users->users_email->ViewAttributes() ?>><?php echo $tbl_users->users_email->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($tbl_users->users_contactNo->Visible) { // users_contactNo ?>
		<!-- users_contactNo -->
		<td<?php echo $tbl_users->users_contactNo->CellAttributes() ?>>
<div<?php echo $tbl_users->users_contactNo->ViewAttributes() ?>><?php echo $tbl_users->users_contactNo->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$tbl_users_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$tbl_users_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($tbl_users_preview->Recordset)
	$tbl_users_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$tbl_users_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_users_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'tbl_users';

	// Page object name
	var $PageObjName = 'tbl_users_preview';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_users;
		if ($tbl_users->UseTokenInUrl) $PageUrl .= "t=" . $tbl_users->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_users;
		if ($tbl_users->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_users_preview() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_users)
		if (!isset($GLOBALS["tbl_users"])) {
			$GLOBALS["tbl_users"] = new ctbl_users();
			$GLOBALS["Table"] =& $GLOBALS["tbl_users"];
		}

		// Table object (view_tbl_uporgchart_cu_users)
		if (!isset($GLOBALS['view_tbl_uporgchart_cu_users'])) $GLOBALS['view_tbl_uporgchart_cu_users'] = new cview_tbl_uporgchart_cu_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'preview', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_users', TRUE);

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
		global $tbl_users;

		// Security
		$Security = new cAdvancedSecurity();
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('tbl_users');
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
		global $Language, $tbl_users;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$tbl_users->Recordset_Selecting($filter);
		$this->Recordset = $tbl_users->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$tbl_users->Recordset_Selected($this->Recordset);
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
