<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_fp_units_accomplishmentinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_fp_units_accomplishment_delete = new cfrm_fp_units_accomplishment_delete();
$Page =& $frm_fp_units_accomplishment_delete;

// Page init
$frm_fp_units_accomplishment_delete->Page_Init();

// Page main
$frm_fp_units_accomplishment_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_units_accomplishment_delete = new up_Page("frm_fp_units_accomplishment_delete");

// page properties
frm_fp_units_accomplishment_delete.PageID = "delete"; // page ID
frm_fp_units_accomplishment_delete.FormID = "ffrm_fp_units_accomplishmentdelete"; // form ID
var UP_PAGE_ID = frm_fp_units_accomplishment_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_fp_units_accomplishment_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_units_accomplishment_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_units_accomplishment_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_units_accomplishment_delete.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
//-->

</script>
<?php

// Load records for display
if ($frm_fp_units_accomplishment_delete->Recordset = $frm_fp_units_accomplishment_delete->LoadRecordset())
	$frm_fp_units_accomplishment_deleteTotalRecs = $frm_fp_units_accomplishment_delete->Recordset->RecordCount(); // Get record count
if ($frm_fp_units_accomplishment_deleteTotalRecs <= 0) { // No record found, exit
	if ($frm_fp_units_accomplishment_delete->Recordset)
		$frm_fp_units_accomplishment_delete->Recordset->Close();
	$frm_fp_units_accomplishment_delete->Page_Terminate("frm_fp_units_accomplishmentlist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_units_accomplishment->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_fp_units_accomplishment->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_fp_units_accomplishment_delete->ShowPageHeader(); ?>
<?php
$frm_fp_units_accomplishment_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="frm_fp_units_accomplishment">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($frm_fp_units_accomplishment_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $frm_fp_units_accomplishment->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $frm_fp_units_accomplishment->units_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->focal_person_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->unit_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->cu_sequence->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->cu_short_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->cu_unit_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->unit_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->unit_name_short->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->personnel_count->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->mfo_1->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->mfo_2->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->mfo_3->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->mfo_4->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->mfo_5->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->sto->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->gass->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->users_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->users_nameLast->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->users_nameFirst->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->users_nameMiddle->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->users_userLoginName->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->users_password->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->users_email->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->users_contactNo->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->tbl_cutOffDate_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->t_cutOffDate->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_units_accomplishment->t_cutOffDate_remarks->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$frm_fp_units_accomplishment_delete->RecCnt = 0;
$i = 0;
while (!$frm_fp_units_accomplishment_delete->Recordset->EOF) {
	$frm_fp_units_accomplishment_delete->RecCnt++;

	// Set row properties
	$frm_fp_units_accomplishment->ResetAttrs();
	$frm_fp_units_accomplishment->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$frm_fp_units_accomplishment_delete->LoadRowValues($frm_fp_units_accomplishment_delete->Recordset);

	// Render row
	$frm_fp_units_accomplishment_delete->RenderRow();
?>
	<tr<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td<?php echo $frm_fp_units_accomplishment->units_id->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->units_id->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->units_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->focal_person_id->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->focal_person_id->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->focal_person_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->unit_id->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->unit_id->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->unit_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->cu_sequence->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->cu_sequence->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->cu_sequence->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->cu_short_name->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->cu_short_name->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->cu_short_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->cu_unit_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->unit_name->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->unit_name->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->unit_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->unit_name_short->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->unit_name_short->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->unit_name_short->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->personnel_count->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->personnel_count->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->personnel_count->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->mfo_1->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->mfo_1->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->mfo_1->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->mfo_2->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->mfo_2->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->mfo_2->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->mfo_3->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->mfo_3->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->mfo_3->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->mfo_4->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->mfo_4->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->mfo_4->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->mfo_5->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->mfo_5->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->mfo_5->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->sto->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->sto->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->sto->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->gass->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->gass->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->gass->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->users_name->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->users_name->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->users_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->users_nameLast->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->users_nameLast->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->users_nameLast->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->users_nameFirst->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->users_nameFirst->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->users_nameFirst->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->users_nameMiddle->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->users_nameMiddle->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->users_nameMiddle->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->users_userLoginName->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->users_userLoginName->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->users_userLoginName->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->users_password->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->users_password->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->users_password->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->users_email->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->users_email->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->users_email->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->users_contactNo->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->users_contactNo->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->users_contactNo->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->tbl_cutOffDate_id->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->tbl_cutOffDate_id->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->tbl_cutOffDate_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->t_cutOffDate->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->t_cutOffDate->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->t_cutOffDate->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_units_accomplishment->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_units_accomplishment->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->t_cutOffDate_remarks->ListViewValue() ?></div></td>
	</tr>
<?php
	$frm_fp_units_accomplishment_delete->Recordset->MoveNext();
}
$frm_fp_units_accomplishment_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$frm_fp_units_accomplishment_delete->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include_once "footer.php" ?>
<?php
$frm_fp_units_accomplishment_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_units_accomplishment_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'frm_fp_units_accomplishment';

	// Page object name
	var $PageObjName = 'frm_fp_units_accomplishment_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_units_accomplishment;
		if ($frm_fp_units_accomplishment->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_units_accomplishment->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_units_accomplishment;
		if ($frm_fp_units_accomplishment->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_units_accomplishment->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_units_accomplishment->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_units_accomplishment_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_units_accomplishment)
		if (!isset($GLOBALS["frm_fp_units_accomplishment"])) {
			$GLOBALS["frm_fp_units_accomplishment"] = new cfrm_fp_units_accomplishment();
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_units_accomplishment"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_units_accomplishment', TRUE);

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
		global $frm_fp_units_accomplishment;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->TableName);
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanDelete()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("frm_fp_units_accomplishmentlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_fp_units_accomplishmentlist.php");
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
	var $TotalRecs = 0;
	var $RecCnt;
	var $RecKeys = array();
	var $Recordset;

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $frm_fp_units_accomplishment;

		// Load key parameters
		$this->RecKeys = $frm_fp_units_accomplishment->GetRecordKeys(); // Load record keys
		$sFilter = $frm_fp_units_accomplishment->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("frm_fp_units_accomplishmentlist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in frm_fp_units_accomplishment class, frm_fp_units_accomplishmentinfo.php

		$frm_fp_units_accomplishment->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$frm_fp_units_accomplishment->CurrentAction = $_POST["a_delete"];
		} else {
			$frm_fp_units_accomplishment->CurrentAction = "I"; // Display record
		}
		switch ($frm_fp_units_accomplishment->CurrentAction) {
			case "D": // Delete
				$frm_fp_units_accomplishment->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($frm_fp_units_accomplishment->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_fp_units_accomplishment;

		// Call Recordset Selecting event
		$frm_fp_units_accomplishment->Recordset_Selecting($frm_fp_units_accomplishment->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_fp_units_accomplishment->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_fp_units_accomplishment->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_units_accomplishment;
		$sFilter = $frm_fp_units_accomplishment->KeyFilter();

		// Call Row Selecting event
		$frm_fp_units_accomplishment->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_units_accomplishment->CurrentFilter = $sFilter;
		$sSql = $frm_fp_units_accomplishment->SQL();
		$res = FALSE;
		$rs = up_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $frm_fp_units_accomplishment;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_units_accomplishment->Row_Selected($row);
		$frm_fp_units_accomplishment->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_units_accomplishment->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_units_accomplishment->unit_id->setDbValue($rs->fields('unit_id'));
		$frm_fp_units_accomplishment->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_fp_units_accomplishment->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_fp_units_accomplishment->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_fp_units_accomplishment->unit_name->setDbValue($rs->fields('unit_name'));
		$frm_fp_units_accomplishment->unit_name_short->setDbValue($rs->fields('unit_name_short'));
		$frm_fp_units_accomplishment->personnel_count->setDbValue($rs->fields('personnel_count'));
		$frm_fp_units_accomplishment->mfo_1->setDbValue($rs->fields('mfo_1'));
		$frm_fp_units_accomplishment->mfo_2->setDbValue($rs->fields('mfo_2'));
		$frm_fp_units_accomplishment->mfo_3->setDbValue($rs->fields('mfo_3'));
		$frm_fp_units_accomplishment->mfo_4->setDbValue($rs->fields('mfo_4'));
		$frm_fp_units_accomplishment->mfo_5->setDbValue($rs->fields('mfo_5'));
		$frm_fp_units_accomplishment->sto->setDbValue($rs->fields('sto'));
		$frm_fp_units_accomplishment->gass->setDbValue($rs->fields('gass'));
		$frm_fp_units_accomplishment->users_name->setDbValue($rs->fields('users_name'));
		$frm_fp_units_accomplishment->users_nameLast->setDbValue($rs->fields('users_nameLast'));
		$frm_fp_units_accomplishment->users_nameFirst->setDbValue($rs->fields('users_nameFirst'));
		$frm_fp_units_accomplishment->users_nameMiddle->setDbValue($rs->fields('users_nameMiddle'));
		$frm_fp_units_accomplishment->users_userLoginName->setDbValue($rs->fields('users_userLoginName'));
		$frm_fp_units_accomplishment->users_password->setDbValue($rs->fields('users_password'));
		$frm_fp_units_accomplishment->users_email->setDbValue($rs->fields('users_email'));
		$frm_fp_units_accomplishment->users_contactNo->setDbValue($rs->fields('users_contactNo'));
		$frm_fp_units_accomplishment->tbl_cutOffDate_id->setDbValue($rs->fields('tbl_cutOffDate_id'));
		$frm_fp_units_accomplishment->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$frm_fp_units_accomplishment->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_units_accomplishment;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_fp_units_accomplishment->Row_Rendering();

		// Common render codes for all row types
		// units_id
		// focal_person_id
		// unit_id
		// cu_sequence
		// cu_short_name
		// cu_unit_name
		// unit_name
		// unit_name_short
		// personnel_count
		// mfo_1
		// mfo_2
		// mfo_3
		// mfo_4
		// mfo_5
		// sto
		// gass
		// users_name
		// users_nameLast
		// users_nameFirst
		// users_nameMiddle
		// users_userLoginName
		// users_password
		// users_email
		// users_contactNo
		// tbl_cutOffDate_id
		// t_cutOffDate
		// t_cutOffDate_remarks

		if ($frm_fp_units_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View row

			// units_id
			$frm_fp_units_accomplishment->units_id->ViewValue = $frm_fp_units_accomplishment->units_id->CurrentValue;
			$frm_fp_units_accomplishment->units_id->ViewCustomAttributes = "";

			// focal_person_id
			$frm_fp_units_accomplishment->focal_person_id->ViewValue = $frm_fp_units_accomplishment->focal_person_id->CurrentValue;
			$frm_fp_units_accomplishment->focal_person_id->ViewCustomAttributes = "";

			// unit_id
			$frm_fp_units_accomplishment->unit_id->ViewValue = $frm_fp_units_accomplishment->unit_id->CurrentValue;
			$frm_fp_units_accomplishment->unit_id->ViewCustomAttributes = "";

			// cu_sequence
			$frm_fp_units_accomplishment->cu_sequence->ViewValue = $frm_fp_units_accomplishment->cu_sequence->CurrentValue;
			$frm_fp_units_accomplishment->cu_sequence->ViewCustomAttributes = "";

			// cu_short_name
			$frm_fp_units_accomplishment->cu_short_name->ViewValue = $frm_fp_units_accomplishment->cu_short_name->CurrentValue;
			$frm_fp_units_accomplishment->cu_short_name->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_fp_units_accomplishment->cu_unit_name->ViewValue = $frm_fp_units_accomplishment->cu_unit_name->CurrentValue;
			$frm_fp_units_accomplishment->cu_unit_name->ViewCustomAttributes = "";

			// unit_name
			$frm_fp_units_accomplishment->unit_name->ViewValue = $frm_fp_units_accomplishment->unit_name->CurrentValue;
			$frm_fp_units_accomplishment->unit_name->ViewCustomAttributes = "";

			// unit_name_short
			$frm_fp_units_accomplishment->unit_name_short->ViewValue = $frm_fp_units_accomplishment->unit_name_short->CurrentValue;
			$frm_fp_units_accomplishment->unit_name_short->ViewCustomAttributes = "";

			// personnel_count
			$frm_fp_units_accomplishment->personnel_count->ViewValue = $frm_fp_units_accomplishment->personnel_count->CurrentValue;
			$frm_fp_units_accomplishment->personnel_count->ViewCustomAttributes = "";

			// mfo_1
			$frm_fp_units_accomplishment->mfo_1->ViewValue = $frm_fp_units_accomplishment->mfo_1->CurrentValue;
			$frm_fp_units_accomplishment->mfo_1->ViewCustomAttributes = "";

			// mfo_2
			$frm_fp_units_accomplishment->mfo_2->ViewValue = $frm_fp_units_accomplishment->mfo_2->CurrentValue;
			$frm_fp_units_accomplishment->mfo_2->ViewCustomAttributes = "";

			// mfo_3
			$frm_fp_units_accomplishment->mfo_3->ViewValue = $frm_fp_units_accomplishment->mfo_3->CurrentValue;
			$frm_fp_units_accomplishment->mfo_3->ViewCustomAttributes = "";

			// mfo_4
			$frm_fp_units_accomplishment->mfo_4->ViewValue = $frm_fp_units_accomplishment->mfo_4->CurrentValue;
			$frm_fp_units_accomplishment->mfo_4->ViewCustomAttributes = "";

			// mfo_5
			$frm_fp_units_accomplishment->mfo_5->ViewValue = $frm_fp_units_accomplishment->mfo_5->CurrentValue;
			$frm_fp_units_accomplishment->mfo_5->ViewCustomAttributes = "";

			// sto
			$frm_fp_units_accomplishment->sto->ViewValue = $frm_fp_units_accomplishment->sto->CurrentValue;
			$frm_fp_units_accomplishment->sto->ViewCustomAttributes = "";

			// gass
			$frm_fp_units_accomplishment->gass->ViewValue = $frm_fp_units_accomplishment->gass->CurrentValue;
			$frm_fp_units_accomplishment->gass->ViewCustomAttributes = "";

			// users_name
			$frm_fp_units_accomplishment->users_name->ViewValue = $frm_fp_units_accomplishment->users_name->CurrentValue;
			$frm_fp_units_accomplishment->users_name->ViewCustomAttributes = "";

			// users_nameLast
			$frm_fp_units_accomplishment->users_nameLast->ViewValue = $frm_fp_units_accomplishment->users_nameLast->CurrentValue;
			$frm_fp_units_accomplishment->users_nameLast->ViewCustomAttributes = "";

			// users_nameFirst
			$frm_fp_units_accomplishment->users_nameFirst->ViewValue = $frm_fp_units_accomplishment->users_nameFirst->CurrentValue;
			$frm_fp_units_accomplishment->users_nameFirst->ViewCustomAttributes = "";

			// users_nameMiddle
			$frm_fp_units_accomplishment->users_nameMiddle->ViewValue = $frm_fp_units_accomplishment->users_nameMiddle->CurrentValue;
			$frm_fp_units_accomplishment->users_nameMiddle->ViewCustomAttributes = "";

			// users_userLoginName
			$frm_fp_units_accomplishment->users_userLoginName->ViewValue = $frm_fp_units_accomplishment->users_userLoginName->CurrentValue;
			$frm_fp_units_accomplishment->users_userLoginName->ViewCustomAttributes = "";

			// users_password
			$frm_fp_units_accomplishment->users_password->ViewValue = $frm_fp_units_accomplishment->users_password->CurrentValue;
			$frm_fp_units_accomplishment->users_password->ViewCustomAttributes = "";

			// users_email
			$frm_fp_units_accomplishment->users_email->ViewValue = $frm_fp_units_accomplishment->users_email->CurrentValue;
			$frm_fp_units_accomplishment->users_email->ViewCustomAttributes = "";

			// users_contactNo
			$frm_fp_units_accomplishment->users_contactNo->ViewValue = $frm_fp_units_accomplishment->users_contactNo->CurrentValue;
			$frm_fp_units_accomplishment->users_contactNo->ViewCustomAttributes = "";

			// tbl_cutOffDate_id
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->ViewValue = $frm_fp_units_accomplishment->tbl_cutOffDate_id->CurrentValue;
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->ViewCustomAttributes = "";

			// t_cutOffDate
			$frm_fp_units_accomplishment->t_cutOffDate->ViewValue = $frm_fp_units_accomplishment->t_cutOffDate->CurrentValue;
			$frm_fp_units_accomplishment->t_cutOffDate->ViewValue = up_FormatDateTime($frm_fp_units_accomplishment->t_cutOffDate->ViewValue, 6);
			$frm_fp_units_accomplishment->t_cutOffDate->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->ViewValue = $frm_fp_units_accomplishment->t_cutOffDate_remarks->CurrentValue;
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// units_id
			$frm_fp_units_accomplishment->units_id->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->units_id->HrefValue = "";
			$frm_fp_units_accomplishment->units_id->TooltipValue = "";

			// focal_person_id
			$frm_fp_units_accomplishment->focal_person_id->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->focal_person_id->HrefValue = "";
			$frm_fp_units_accomplishment->focal_person_id->TooltipValue = "";

			// unit_id
			$frm_fp_units_accomplishment->unit_id->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->unit_id->HrefValue = "";
			$frm_fp_units_accomplishment->unit_id->TooltipValue = "";

			// cu_sequence
			$frm_fp_units_accomplishment->cu_sequence->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->cu_sequence->HrefValue = "";
			$frm_fp_units_accomplishment->cu_sequence->TooltipValue = "";

			// cu_short_name
			$frm_fp_units_accomplishment->cu_short_name->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->cu_short_name->HrefValue = "";
			$frm_fp_units_accomplishment->cu_short_name->TooltipValue = "";

			// cu_unit_name
			$frm_fp_units_accomplishment->cu_unit_name->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->cu_unit_name->HrefValue = "";
			$frm_fp_units_accomplishment->cu_unit_name->TooltipValue = "";

			// unit_name
			$frm_fp_units_accomplishment->unit_name->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->unit_name->HrefValue = "";
			$frm_fp_units_accomplishment->unit_name->TooltipValue = "";

			// unit_name_short
			$frm_fp_units_accomplishment->unit_name_short->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->unit_name_short->HrefValue = "";
			$frm_fp_units_accomplishment->unit_name_short->TooltipValue = "";

			// personnel_count
			$frm_fp_units_accomplishment->personnel_count->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->personnel_count->HrefValue = "";
			$frm_fp_units_accomplishment->personnel_count->TooltipValue = "";

			// mfo_1
			$frm_fp_units_accomplishment->mfo_1->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_1->HrefValue = "";
			$frm_fp_units_accomplishment->mfo_1->TooltipValue = "";

			// mfo_2
			$frm_fp_units_accomplishment->mfo_2->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_2->HrefValue = "";
			$frm_fp_units_accomplishment->mfo_2->TooltipValue = "";

			// mfo_3
			$frm_fp_units_accomplishment->mfo_3->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_3->HrefValue = "";
			$frm_fp_units_accomplishment->mfo_3->TooltipValue = "";

			// mfo_4
			$frm_fp_units_accomplishment->mfo_4->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_4->HrefValue = "";
			$frm_fp_units_accomplishment->mfo_4->TooltipValue = "";

			// mfo_5
			$frm_fp_units_accomplishment->mfo_5->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_5->HrefValue = "";
			$frm_fp_units_accomplishment->mfo_5->TooltipValue = "";

			// sto
			$frm_fp_units_accomplishment->sto->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->sto->HrefValue = "";
			$frm_fp_units_accomplishment->sto->TooltipValue = "";

			// gass
			$frm_fp_units_accomplishment->gass->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->gass->HrefValue = "";
			$frm_fp_units_accomplishment->gass->TooltipValue = "";

			// users_name
			$frm_fp_units_accomplishment->users_name->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_name->HrefValue = "";
			$frm_fp_units_accomplishment->users_name->TooltipValue = "";

			// users_nameLast
			$frm_fp_units_accomplishment->users_nameLast->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_nameLast->HrefValue = "";
			$frm_fp_units_accomplishment->users_nameLast->TooltipValue = "";

			// users_nameFirst
			$frm_fp_units_accomplishment->users_nameFirst->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_nameFirst->HrefValue = "";
			$frm_fp_units_accomplishment->users_nameFirst->TooltipValue = "";

			// users_nameMiddle
			$frm_fp_units_accomplishment->users_nameMiddle->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_nameMiddle->HrefValue = "";
			$frm_fp_units_accomplishment->users_nameMiddle->TooltipValue = "";

			// users_userLoginName
			$frm_fp_units_accomplishment->users_userLoginName->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_userLoginName->HrefValue = "";
			$frm_fp_units_accomplishment->users_userLoginName->TooltipValue = "";

			// users_password
			$frm_fp_units_accomplishment->users_password->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_password->HrefValue = "";
			$frm_fp_units_accomplishment->users_password->TooltipValue = "";

			// users_email
			$frm_fp_units_accomplishment->users_email->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_email->HrefValue = "";
			$frm_fp_units_accomplishment->users_email->TooltipValue = "";

			// users_contactNo
			$frm_fp_units_accomplishment->users_contactNo->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_contactNo->HrefValue = "";
			$frm_fp_units_accomplishment->users_contactNo->TooltipValue = "";

			// tbl_cutOffDate_id
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->HrefValue = "";
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->TooltipValue = "";

			// t_cutOffDate
			$frm_fp_units_accomplishment->t_cutOffDate->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->t_cutOffDate->HrefValue = "";
			$frm_fp_units_accomplishment->t_cutOffDate->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->HrefValue = "";
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_fp_units_accomplishment->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_units_accomplishment->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $frm_fp_units_accomplishment;
		$DeleteRows = TRUE;
		$sSql = $frm_fp_units_accomplishment->SQL();
		$conn->raiseErrorFn = 'up_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
			$rs->Close();
			return FALSE;
		}
		if (!$Security->CanDelete()) {
			$this->setFailureMessage($Language->Phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$conn->BeginTrans();

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $frm_fp_units_accomplishment->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['units_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_fp_units_accomplishment->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_fp_units_accomplishment->CancelMessage <> "") {
				$this->setFailureMessage($frm_fp_units_accomplishment->CancelMessage);
				$frm_fp_units_accomplishment->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$frm_fp_units_accomplishment->Row_Deleted($row);
			}
		}
		return $DeleteRows;
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
