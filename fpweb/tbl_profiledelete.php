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
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_profile_delete = new ctbl_profile_delete();
$Page =& $tbl_profile_delete;

// Page init
$tbl_profile_delete->Page_Init();

// Page main
$tbl_profile_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_profile_delete = new up_Page("tbl_profile_delete");

// page properties
tbl_profile_delete.PageID = "delete"; // page ID
tbl_profile_delete.FormID = "ftbl_profiledelete"; // form ID
var UP_PAGE_ID = tbl_profile_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_profile_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_profile_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_profile_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_profile_delete.ValidateRequired = false; // no JavaScript validation
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
if ($tbl_profile_delete->Recordset = $tbl_profile_delete->LoadRecordset())
	$tbl_profile_deleteTotalRecs = $tbl_profile_delete->Recordset->RecordCount(); // Get record count
if ($tbl_profile_deleteTotalRecs <= 0) { // No record found, exit
	if ($tbl_profile_delete->Recordset)
		$tbl_profile_delete->Recordset->Close();
	$tbl_profile_delete->Page_Terminate("tbl_profilelist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_profile->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_profile->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_profile_delete->ShowPageHeader(); ?>
<?php
$tbl_profile_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="tbl_profile">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($tbl_profile_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $tbl_profile->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $tbl_profile->faculty_name->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyGroup_CHEDCode->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyRank_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_tenureCode->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_leaveCode->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_totalHrs_basic->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_totalSCH_basic->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_totalCr_ugrad->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_totalCr_graduate->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_totalHrs_graduate->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_totalSCH_graduate->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$tbl_profile_delete->RecCnt = 0;
$i = 0;
while (!$tbl_profile_delete->Recordset->EOF) {
	$tbl_profile_delete->RecCnt++;

	// Set row properties
	$tbl_profile->ResetAttrs();
	$tbl_profile->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$tbl_profile_delete->LoadRowValues($tbl_profile_delete->Recordset);

	// Render row
	$tbl_profile_delete->RenderRow();
?>
	<tr<?php echo $tbl_profile->RowAttributes() ?>>
		<td<?php echo $tbl_profile->faculty_name->CellAttributes() ?>>
<div<?php echo $tbl_profile->faculty_name->ViewAttributes() ?>><?php echo $tbl_profile->faculty_name->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyGroup_CHEDCode->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyGroup_CHEDCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyGroup_CHEDCode->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyRank_ID->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyRank_ID->ViewAttributes() ?>><?php echo $tbl_profile->facultyRank_ID->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_tenureCode->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_tenureCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_tenureCode->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_leaveCode->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_leaveCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_leaveCode->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_totalHrs_basic->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_basic->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_basic->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_totalSCH_basic->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_basic->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_basic->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalCr_ugrad->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_totalCr_graduate->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalCr_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalCr_graduate->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_graduate->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_graduate->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->ListViewValue() ?></div></td>
		<td<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ListViewValue() ?></div></td>
	</tr>
<?php
	$tbl_profile_delete->Recordset->MoveNext();
}
$tbl_profile_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$tbl_profile_delete->ShowPageFooter();
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
$tbl_profile_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_profile_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'tbl_profile';

	// Page object name
	var $PageObjName = 'tbl_profile_delete';

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
	function ctbl_profile_delete() {
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
			define("UP_PAGE_ID", 'delete', TRUE);

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
			$this->Page_Terminate("tbl_profilelist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("tbl_profilelist.php");
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
		global $Language, $tbl_profile;

		// Load key parameters
		$this->RecKeys = $tbl_profile->GetRecordKeys(); // Load record keys
		$sFilter = $tbl_profile->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("tbl_profilelist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in tbl_profile class, tbl_profileinfo.php

		$tbl_profile->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$tbl_profile->CurrentAction = $_POST["a_delete"];
		} else {
			$tbl_profile->CurrentAction = "I"; // Display record
		}
		switch ($tbl_profile->CurrentAction) {
			case "D": // Delete
				$tbl_profile->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($tbl_profile->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_profile;

		// Call Recordset Selecting event
		$tbl_profile->Recordset_Selecting($tbl_profile->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_profile->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_profile->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_profile;
		$sFilter = $tbl_profile->KeyFilter();

		// Call Row Selecting event
		$tbl_profile->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_profile->CurrentFilter = $sFilter;
		$sSql = $tbl_profile->SQL();
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
		global $conn, $tbl_profile;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_profile->Row_Selected($row);
		$tbl_profile->facultyprofile_ID->setDbValue($rs->fields('facultyprofile_ID'));
		$tbl_profile->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$tbl_profile->faculty_name->setDbValue($rs->fields('faculty_name'));
		$tbl_profile->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$tbl_profile->cu->setDbValue($rs->fields('cu'));
		$tbl_profile->collectionPeriod_ay->setDbValue($rs->fields('collectionPeriod_ay'));
		$tbl_profile->collectionPeriod_sem->setDbValue($rs->fields('collectionPeriod_sem'));
		$tbl_profile->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$tbl_profile->unitID->setDbValue($rs->fields('unitID'));
		$tbl_profile->facultyprofile_homeUnit_ID->setDbValue($rs->fields('facultyprofile_homeUnit_ID'));
		$tbl_profile->facultyprofile_isHomeUnit->setDbValue($rs->fields('facultyprofile_isHomeUnit'));
		$tbl_profile->facultyGroup_CHEDCode->setDbValue($rs->fields('facultyGroup_CHEDCode'));
		$tbl_profile->facultyRank_ID->setDbValue($rs->fields('facultyRank_ID'));
		$tbl_profile->facultyprofile_sg->setDbValue($rs->fields('facultyprofile_sg'));
		$tbl_profile->facultyprofile_annualSalary->setDbValue($rs->fields('facultyprofile_annualSalary'));
		$tbl_profile->facultyprofile_fte->setDbValue($rs->fields('facultyprofile_fte'));
		$tbl_profile->facultyprofile_tenureCode->setDbValue($rs->fields('facultyprofile_tenureCode'));
		$tbl_profile->facultyprofile_leaveCode->setDbValue($rs->fields('facultyprofile_leaveCode'));
		$tbl_profile->facultyprofile_disCHED_disciplineMajorCode_gen->setDbValue($rs->fields('facultyprofile_disCHED_disciplineMajorCode_gen'));
		$tbl_profile->disCHED_disciplineCode_gen->setDbValue($rs->fields('disCHED_disciplineCode_gen'));
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_1_primaryTeachingLoad'));
		$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_2_primaryTeachingLoad'));
		$tbl_profile->facultyprofile_labHrs_basic->setDbValue($rs->fields('facultyprofile_labHrs_basic'));
		$tbl_profile->facultyprofile_lecHrs_basic->setDbValue($rs->fields('facultyprofile_lecHrs_basic'));
		$tbl_profile->facultyprofile_totalHrs_basic->setDbValue($rs->fields('facultyprofile_totalHrs_basic'));
		$tbl_profile->facultyprofile_labSCH_basic->setDbValue($rs->fields('facultyprofile_labSCH_basic'));
		$tbl_profile->facultyprofile_lecSCH_basic->setDbValue($rs->fields('facultyprofile_lecSCH_basic'));
		$tbl_profile->facultyprofile_totalSCH_basic->setDbValue($rs->fields('facultyprofile_totalSCH_basic'));
		$tbl_profile->facultyprofile_labCr_ugrad->setDbValue($rs->fields('facultyprofile_labCr_ugrad'));
		$tbl_profile->facultyprofile_lecCr_ugrad->setDbValue($rs->fields('facultyprofile_lecCr_ugrad'));
		$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_ugrad'));
		$tbl_profile->facultyprofile_totalCr_ugrad->setDbValue($rs->fields('facultyprofile_totalCr_ugrad'));
		$tbl_profile->facultyprofile_labHrs_ugrad->setDbValue($rs->fields('facultyprofile_labHrs_ugrad'));
		$tbl_profile->facultyprofile_lecHrs_ugrad->setDbValue($rs->fields('facultyprofile_lecHrs_ugrad'));
		$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_ugrad'));
		$tbl_profile->facultyprofile_totalHrs_ugrad->setDbValue($rs->fields('facultyprofile_totalHrs_ugrad'));
		$tbl_profile->facultyprofile_labSCH_ugrad->setDbValue($rs->fields('facultyprofile_labSCH_ugrad'));
		$tbl_profile->facultyprofile_lecSCH_ugrad->setDbValue($rs->fields('facultyprofile_lecSCH_ugrad'));
		$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_ugrad'));
		$tbl_profile->facultyprofile_totalSCH_ugrad->setDbValue($rs->fields('facultyprofile_totalSCH_ugrad'));
		$tbl_profile->facultyprofile_labCr_graduate->setDbValue($rs->fields('facultyprofile_labCr_graduate'));
		$tbl_profile->facultyprofile_lecCr_graduate->setDbValue($rs->fields('facultyprofile_lecCr_graduate'));
		$tbl_profile->facultyprofile_mixedLabLecCr_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_graduate'));
		$tbl_profile->facultyprofile_totalCr_graduate->setDbValue($rs->fields('facultyprofile_totalCr_graduate'));
		$tbl_profile->facultyprofile_labHrs_graduate->setDbValue($rs->fields('facultyprofile_labHrs_graduate'));
		$tbl_profile->facultyprofile_lecHrs_graduate->setDbValue($rs->fields('facultyprofile_lecHrs_graduate'));
		$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_graduate'));
		$tbl_profile->facultyprofile_totalHrs_graduate->setDbValue($rs->fields('facultyprofile_totalHrs_graduate'));
		$tbl_profile->facultyprofile_labSCH_graduate->setDbValue($rs->fields('facultyprofile_labSCH_graduate'));
		$tbl_profile->facultyprofile_lecSCH_graduate->setDbValue($rs->fields('facultyprofile_lecSCH_graduate'));
		$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_graduate'));
		$tbl_profile->facultyprofile_totalSCH_graduate->setDbValue($rs->fields('facultyprofile_totalSCH_graduate'));
		$tbl_profile->facultyprofile_researchLoad->setDbValue($rs->fields('facultyprofile_researchLoad'));
		$tbl_profile->facultyprofile_extensionServicesLoad->setDbValue($rs->fields('facultyprofile_extensionServicesLoad'));
		$tbl_profile->facultyprofile_studyLoad->setDbValue($rs->fields('facultyprofile_studyLoad'));
		$tbl_profile->facultyprofile_forProductionLoad->setDbValue($rs->fields('facultyprofile_forProductionLoad'));
		$tbl_profile->facultyprofile_administrativeLoad->setDbValue($rs->fields('facultyprofile_administrativeLoad'));
		$tbl_profile->facultyprofile_otherLoadCredits->setDbValue($rs->fields('facultyprofile_otherLoadCredits'));
		$tbl_profile->facultyprofile_total_nonTeachingLoad->setDbValue($rs->fields('facultyprofile_total_nonTeachingLoad'));
		$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->setDbValue($rs->fields('facultyprofile_totalWorkloadInCreditUnits_gen'));
		$tbl_profile->facultyprofile_remarks->setDbValue($rs->fields('facultyprofile_remarks'));
		$tbl_profile->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_profile;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_profile->Row_Rendering();

		// Common render codes for all row types
		// facultyprofile_ID

		$tbl_profile->facultyprofile_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_ID
		$tbl_profile->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_name
		$tbl_profile->faculty_name->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ID
		$tbl_profile->collectionPeriod_ID->CellCssStyle = "white-space: nowrap;";

		// cu
		$tbl_profile->cu->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ay
		$tbl_profile->collectionPeriod_ay->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_sem
		$tbl_profile->collectionPeriod_sem->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_cutOffDate
		$tbl_profile->collectionPeriod_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// unitID
		$tbl_profile->unitID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_homeUnit_ID
		$tbl_profile->facultyprofile_homeUnit_ID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_isHomeUnit
		$tbl_profile->facultyprofile_isHomeUnit->CellCssStyle = "white-space: nowrap;";

		// facultyGroup_CHEDCode
		$tbl_profile->facultyGroup_CHEDCode->CellCssStyle = "white-space: nowrap;";

		// facultyRank_ID
		$tbl_profile->facultyRank_ID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_sg
		$tbl_profile->facultyprofile_sg->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_annualSalary
		$tbl_profile->facultyprofile_annualSalary->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_fte
		$tbl_profile->facultyprofile_fte->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_tenureCode
		$tbl_profile->facultyprofile_tenureCode->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_leaveCode
		$tbl_profile->facultyprofile_leaveCode->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_disCHED_disciplineMajorCode_gen
		$tbl_profile->facultyprofile_disCHED_disciplineMajorCode_gen->CellCssStyle = "white-space: nowrap;";

		// disCHED_disciplineCode_gen
		$tbl_profile->disCHED_disciplineCode_gen->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_specificDiscipline_1_primaryTeachingLoad
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_specificDiscipline_2_primaryTeachingLoad
		$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_basic
		$tbl_profile->facultyprofile_labHrs_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_basic
		$tbl_profile->facultyprofile_lecHrs_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_basic
		// facultyprofile_labSCH_basic

		$tbl_profile->facultyprofile_labSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_basic
		$tbl_profile->facultyprofile_lecSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_basic
		$tbl_profile->facultyprofile_totalSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labCr_ugrad
		$tbl_profile->facultyprofile_labCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecCr_ugrad
		$tbl_profile->facultyprofile_lecCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecCr_ugrad
		$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalCr_ugrad
		$tbl_profile->facultyprofile_totalCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_ugrad
		$tbl_profile->facultyprofile_labHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_ugrad
		$tbl_profile->facultyprofile_lecHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecHrs_ugrad
		$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_ugrad
		$tbl_profile->facultyprofile_totalHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labSCH_ugrad
		$tbl_profile->facultyprofile_labSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_ugrad
		$tbl_profile->facultyprofile_lecSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecSCH_ugrad
		$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_ugrad
		$tbl_profile->facultyprofile_totalSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labCr_graduate
		$tbl_profile->facultyprofile_labCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecCr_graduate
		$tbl_profile->facultyprofile_lecCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecCr_graduate
		$tbl_profile->facultyprofile_mixedLabLecCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalCr_graduate
		$tbl_profile->facultyprofile_totalCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_graduate
		$tbl_profile->facultyprofile_labHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_graduate
		$tbl_profile->facultyprofile_lecHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecHrs_graduate
		$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_graduate
		$tbl_profile->facultyprofile_totalHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labSCH_graduate
		$tbl_profile->facultyprofile_labSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_graduate
		$tbl_profile->facultyprofile_lecSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecSCH_graduate
		$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_graduate
		$tbl_profile->facultyprofile_totalSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_researchLoad
		$tbl_profile->facultyprofile_researchLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_extensionServicesLoad
		$tbl_profile->facultyprofile_extensionServicesLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_studyLoad
		$tbl_profile->facultyprofile_studyLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_forProductionLoad
		$tbl_profile->facultyprofile_forProductionLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_administrativeLoad
		$tbl_profile->facultyprofile_administrativeLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_otherLoadCredits
		$tbl_profile->facultyprofile_otherLoadCredits->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_total_nonTeachingLoad
		$tbl_profile->facultyprofile_total_nonTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalWorkloadInCreditUnits_gen
		$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_remarks
		$tbl_profile->facultyprofile_remarks->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_status
		$tbl_profile->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";
		if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View row

			// faculty_name
			$tbl_profile->faculty_name->ViewValue = $tbl_profile->faculty_name->CurrentValue;
			$tbl_profile->faculty_name->ViewCustomAttributes = "";

			// facultyGroup_CHEDCode
			if (strval($tbl_profile->facultyGroup_CHEDCode->CurrentValue) <> "") {
				$sFilterWrk = "`facultyGroup_CHEDCode` = '" . up_AdjustSql($tbl_profile->facultyGroup_CHEDCode->CurrentValue) . "'";
			$sSqlWrk = "SELECT `facultyGroup_description` FROM `ref_facultygroup`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `facultyGroup_description` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyGroup_CHEDCode->ViewValue = $rswrk->fields('facultyGroup_description');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyGroup_CHEDCode->ViewValue = $tbl_profile->facultyGroup_CHEDCode->CurrentValue;
				}
			} else {
				$tbl_profile->facultyGroup_CHEDCode->ViewValue = NULL;
			}
			$tbl_profile->facultyGroup_CHEDCode->ViewCustomAttributes = "";

			// facultyRank_ID
			if (strval($tbl_profile->facultyRank_ID->CurrentValue) <> "") {
				$sFilterWrk = "`facultyRank_ID` = " . up_AdjustSql($tbl_profile->facultyRank_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `facultyRank_UPRank` FROM `ref_facultyrank`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `facultyRank_UPRank` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyRank_ID->ViewValue = $rswrk->fields('facultyRank_UPRank');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyRank_ID->ViewValue = $tbl_profile->facultyRank_ID->CurrentValue;
				}
			} else {
				$tbl_profile->facultyRank_ID->ViewValue = NULL;
			}
			$tbl_profile->facultyRank_ID->ViewCustomAttributes = "";

			// facultyprofile_sg
			$tbl_profile->facultyprofile_sg->ViewValue = $tbl_profile->facultyprofile_sg->CurrentValue;
			$tbl_profile->facultyprofile_sg->ViewCustomAttributes = "";

			// facultyprofile_annualSalary
			$tbl_profile->facultyprofile_annualSalary->ViewValue = $tbl_profile->facultyprofile_annualSalary->CurrentValue;
			$tbl_profile->facultyprofile_annualSalary->ViewCustomAttributes = "";

			// facultyprofile_tenureCode
			if (strval($tbl_profile->facultyprofile_tenureCode->CurrentValue) <> "") {
				$sFilterWrk = "`tenureCode_ID` = " . up_AdjustSql($tbl_profile->facultyprofile_tenureCode->CurrentValue) . "";
			$sSqlWrk = "SELECT `tenureCode_description` FROM `ref_tenurecode`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `tenureCode_description` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyprofile_tenureCode->ViewValue = $rswrk->fields('tenureCode_description');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_tenureCode->ViewValue = $tbl_profile->facultyprofile_tenureCode->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_tenureCode->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_tenureCode->ViewCustomAttributes = "";

			// facultyprofile_leaveCode
			if (strval($tbl_profile->facultyprofile_leaveCode->CurrentValue) <> "") {
				$sFilterWrk = "`leaveCode_ID` = " . up_AdjustSql($tbl_profile->facultyprofile_leaveCode->CurrentValue) . "";
			$sSqlWrk = "SELECT `leaveCode_description` FROM `ref_leavecode`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `leaveCode_description` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyprofile_leaveCode->ViewValue = $rswrk->fields('leaveCode_description');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_leaveCode->ViewValue = $tbl_profile->facultyprofile_leaveCode->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_leaveCode->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_leaveCode->ViewCustomAttributes = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			if (strval($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) <> "") {
				$sFilterWrk = "`disCHED_disciplineSpecific_code` = " . up_AdjustSql($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) . "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_nameList` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = $rswrk->fields('disCHED_disciplineSpecific_nameList');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_specificDiscipline_2_primaryTeachingLoad
			if (strval($tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue) <> "") {
				$sFilterWrk = "`disCHED_disciplineSpecific_code` = " . up_AdjustSql($tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue) . "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_nameList` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = $rswrk->fields('disCHED_disciplineSpecific_nameList');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = $tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_labHrs_basic
			$tbl_profile->facultyprofile_labHrs_basic->ViewValue = $tbl_profile->facultyprofile_labHrs_basic->CurrentValue;
			$tbl_profile->facultyprofile_labHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_basic
			$tbl_profile->facultyprofile_lecHrs_basic->ViewValue = $tbl_profile->facultyprofile_lecHrs_basic->CurrentValue;
			$tbl_profile->facultyprofile_lecHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_basic
			$tbl_profile->facultyprofile_totalHrs_basic->ViewValue = $tbl_profile->facultyprofile_totalHrs_basic->CurrentValue;
			$tbl_profile->facultyprofile_totalHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_labSCH_basic
			$tbl_profile->facultyprofile_labSCH_basic->ViewValue = $tbl_profile->facultyprofile_labSCH_basic->CurrentValue;
			$tbl_profile->facultyprofile_labSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_basic
			$tbl_profile->facultyprofile_lecSCH_basic->ViewValue = $tbl_profile->facultyprofile_lecSCH_basic->CurrentValue;
			$tbl_profile->facultyprofile_lecSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_basic
			$tbl_profile->facultyprofile_totalSCH_basic->ViewValue = $tbl_profile->facultyprofile_totalSCH_basic->CurrentValue;
			$tbl_profile->facultyprofile_totalSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_labCr_ugrad
			$tbl_profile->facultyprofile_labCr_ugrad->ViewValue = $tbl_profile->facultyprofile_labCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_labCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecCr_ugrad
			$tbl_profile->facultyprofile_lecCr_ugrad->ViewValue = $tbl_profile->facultyprofile_lecCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_lecCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecCr_ugrad
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->ViewValue = $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalCr_ugrad
			$tbl_profile->facultyprofile_totalCr_ugrad->ViewValue = $tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_totalCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labHrs_ugrad
			$tbl_profile->facultyprofile_labHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_labHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_labHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_ugrad
			$tbl_profile->facultyprofile_lecHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_lecHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_lecHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecHrs_ugrad
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_ugrad
			$tbl_profile->facultyprofile_totalHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_totalHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labSCH_ugrad
			$tbl_profile->facultyprofile_labSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_labSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_labSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_ugrad
			$tbl_profile->facultyprofile_lecSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_lecSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_lecSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecSCH_ugrad
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_ugrad
			$tbl_profile->facultyprofile_totalSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_totalSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labCr_graduate
			$tbl_profile->facultyprofile_labCr_graduate->ViewValue = $tbl_profile->facultyprofile_labCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_labCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecCr_graduate
			$tbl_profile->facultyprofile_lecCr_graduate->ViewValue = $tbl_profile->facultyprofile_lecCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_lecCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecCr_graduate
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->ViewValue = $tbl_profile->facultyprofile_mixedLabLecCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalCr_graduate
			$tbl_profile->facultyprofile_totalCr_graduate->ViewValue = $tbl_profile->facultyprofile_totalCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_totalCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_labHrs_graduate
			$tbl_profile->facultyprofile_labHrs_graduate->ViewValue = $tbl_profile->facultyprofile_labHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_labHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_graduate
			$tbl_profile->facultyprofile_lecHrs_graduate->ViewValue = $tbl_profile->facultyprofile_lecHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_lecHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecHrs_graduate
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->ViewValue = $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_graduate
			$tbl_profile->facultyprofile_totalHrs_graduate->ViewValue = $tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_totalHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_labSCH_graduate
			$tbl_profile->facultyprofile_labSCH_graduate->ViewValue = $tbl_profile->facultyprofile_labSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_labSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_graduate
			$tbl_profile->facultyprofile_lecSCH_graduate->ViewValue = $tbl_profile->facultyprofile_lecSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_lecSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecSCH_graduate
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->ViewValue = $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_graduate
			$tbl_profile->facultyprofile_totalSCH_graduate->ViewValue = $tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_totalSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_researchLoad
			$tbl_profile->facultyprofile_researchLoad->ViewValue = $tbl_profile->facultyprofile_researchLoad->CurrentValue;
			$tbl_profile->facultyprofile_researchLoad->ViewCustomAttributes = "";

			// facultyprofile_extensionServicesLoad
			$tbl_profile->facultyprofile_extensionServicesLoad->ViewValue = $tbl_profile->facultyprofile_extensionServicesLoad->CurrentValue;
			$tbl_profile->facultyprofile_extensionServicesLoad->ViewCustomAttributes = "";

			// facultyprofile_studyLoad
			$tbl_profile->facultyprofile_studyLoad->ViewValue = $tbl_profile->facultyprofile_studyLoad->CurrentValue;
			$tbl_profile->facultyprofile_studyLoad->ViewCustomAttributes = "";

			// facultyprofile_forProductionLoad
			$tbl_profile->facultyprofile_forProductionLoad->ViewValue = $tbl_profile->facultyprofile_forProductionLoad->CurrentValue;
			$tbl_profile->facultyprofile_forProductionLoad->ViewCustomAttributes = "";

			// facultyprofile_administrativeLoad
			$tbl_profile->facultyprofile_administrativeLoad->ViewValue = $tbl_profile->facultyprofile_administrativeLoad->CurrentValue;
			$tbl_profile->facultyprofile_administrativeLoad->ViewCustomAttributes = "";

			// facultyprofile_otherLoadCredits
			$tbl_profile->facultyprofile_otherLoadCredits->ViewValue = $tbl_profile->facultyprofile_otherLoadCredits->CurrentValue;
			$tbl_profile->facultyprofile_otherLoadCredits->ViewCustomAttributes = "";

			// facultyprofile_total_nonTeachingLoad
			$tbl_profile->facultyprofile_total_nonTeachingLoad->ViewValue = $tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue;
			$tbl_profile->facultyprofile_total_nonTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewValue = $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue;
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewCustomAttributes = "";

			// facultyprofile_remarks
			$tbl_profile->facultyprofile_remarks->ViewValue = $tbl_profile->facultyprofile_remarks->CurrentValue;
			$tbl_profile->facultyprofile_remarks->ViewCustomAttributes = "";

			// faculty_name
			$tbl_profile->faculty_name->LinkCustomAttributes = "";
			$tbl_profile->faculty_name->HrefValue = "";
			$tbl_profile->faculty_name->TooltipValue = "";

			// facultyGroup_CHEDCode
			$tbl_profile->facultyGroup_CHEDCode->LinkCustomAttributes = "";
			$tbl_profile->facultyGroup_CHEDCode->HrefValue = "";
			$tbl_profile->facultyGroup_CHEDCode->TooltipValue = "";

			// facultyRank_ID
			$tbl_profile->facultyRank_ID->LinkCustomAttributes = "";
			$tbl_profile->facultyRank_ID->HrefValue = "";
			$tbl_profile->facultyRank_ID->TooltipValue = "";

			// facultyprofile_tenureCode
			$tbl_profile->facultyprofile_tenureCode->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_tenureCode->HrefValue = "";
			$tbl_profile->facultyprofile_tenureCode->TooltipValue = "";

			// facultyprofile_leaveCode
			$tbl_profile->facultyprofile_leaveCode->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_leaveCode->HrefValue = "";
			$tbl_profile->facultyprofile_leaveCode->TooltipValue = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->HrefValue = "";
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->TooltipValue = "";

			// facultyprofile_totalHrs_basic
			$tbl_profile->facultyprofile_totalHrs_basic->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_basic->HrefValue = "";
			$tbl_profile->facultyprofile_totalHrs_basic->TooltipValue = "";

			// facultyprofile_totalSCH_basic
			$tbl_profile->facultyprofile_totalSCH_basic->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_basic->HrefValue = "";
			$tbl_profile->facultyprofile_totalSCH_basic->TooltipValue = "";

			// facultyprofile_totalCr_ugrad
			$tbl_profile->facultyprofile_totalCr_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalCr_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_totalCr_ugrad->TooltipValue = "";

			// facultyprofile_totalHrs_ugrad
			$tbl_profile->facultyprofile_totalHrs_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_totalHrs_ugrad->TooltipValue = "";

			// facultyprofile_totalSCH_ugrad
			$tbl_profile->facultyprofile_totalSCH_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_totalSCH_ugrad->TooltipValue = "";

			// facultyprofile_totalCr_graduate
			$tbl_profile->facultyprofile_totalCr_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalCr_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_totalCr_graduate->TooltipValue = "";

			// facultyprofile_totalHrs_graduate
			$tbl_profile->facultyprofile_totalHrs_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_totalHrs_graduate->TooltipValue = "";

			// facultyprofile_totalSCH_graduate
			$tbl_profile->facultyprofile_totalSCH_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_totalSCH_graduate->TooltipValue = "";

			// facultyprofile_total_nonTeachingLoad
			$tbl_profile->facultyprofile_total_nonTeachingLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_total_nonTeachingLoad->HrefValue = "";
			$tbl_profile->facultyprofile_total_nonTeachingLoad->TooltipValue = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->HrefValue = "";
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_profile->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_profile->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $tbl_profile;
		$DeleteRows = TRUE;
		$sSql = $tbl_profile->SQL();
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
		$this->WriteAuditTrailDummy($Language->Phrase("BatchDeleteBegin")); // Batch delete begin

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $tbl_profile->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['facultyprofile_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_profile->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_profile->CancelMessage <> "") {
				$this->setFailureMessage($tbl_profile->CancelMessage);
				$tbl_profile->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
			if ($DeleteRows) {
				foreach ($rsold as $row)
					$this->WriteAuditTrailOnDelete($row);
			}
			$this->WriteAuditTrailDummy($Language->Phrase("BatchDeleteSuccess")); // Batch delete success
		} else {
			$conn->RollbackTrans(); // Rollback changes
			$this->WriteAuditTrailDummy($Language->Phrase("BatchDeleteRollback")); // Batch delete rollback
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$tbl_profile->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_profile';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $tbl_profile;
		$table = 'tbl_profile';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['facultyprofile_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $tbl_profile->fields) && $tbl_profile->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_profile->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($tbl_profile->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
					$oldvalue = "[XML]"; // XML field
				} else {
					$oldvalue = $rs[$fldname];
				}
				up_WriteAuditTrail("log", $dt, $id, $curUser, "D", $table, $fldname, $key, $oldvalue, "");
			}
		}
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
