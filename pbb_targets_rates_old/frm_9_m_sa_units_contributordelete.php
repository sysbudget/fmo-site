<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_9_m_sa_units_contributorinfo.php" ?>
<?php include_once "frm_9_m_sa_units_deliveryinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_9_m_sa_units_contributor_delete = new cfrm_9_m_sa_units_contributor_delete();
$Page =& $frm_9_m_sa_units_contributor_delete;

// Page init
$frm_9_m_sa_units_contributor_delete->Page_Init();

// Page main
$frm_9_m_sa_units_contributor_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_9_m_sa_units_contributor_delete = new up_Page("frm_9_m_sa_units_contributor_delete");

// page properties
frm_9_m_sa_units_contributor_delete.PageID = "delete"; // page ID
frm_9_m_sa_units_contributor_delete.FormID = "ffrm_9_m_sa_units_contributordelete"; // form ID
var UP_PAGE_ID = frm_9_m_sa_units_contributor_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_9_m_sa_units_contributor_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_9_m_sa_units_contributor_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_9_m_sa_units_contributor_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_9_m_sa_units_contributor_delete.ValidateRequired = false; // no JavaScript validation
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
if ($frm_9_m_sa_units_contributor_delete->Recordset = $frm_9_m_sa_units_contributor_delete->LoadRecordset())
	$frm_9_m_sa_units_contributor_deleteTotalRecs = $frm_9_m_sa_units_contributor_delete->Recordset->RecordCount(); // Get record count
if ($frm_9_m_sa_units_contributor_deleteTotalRecs <= 0) { // No record found, exit
	if ($frm_9_m_sa_units_contributor_delete->Recordset)
		$frm_9_m_sa_units_contributor_delete->Recordset->Close();
	$frm_9_m_sa_units_contributor_delete->Page_Terminate("frm_9_m_sa_units_contributorlist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_9_m_sa_units_contributor->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_9_m_sa_units_contributor->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_9_m_sa_units_contributor_delete->ShowPageHeader(); ?>
<?php
$frm_9_m_sa_units_contributor_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="frm_9_m_sa_units_contributor">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($frm_9_m_sa_units_contributor_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $frm_9_m_sa_units_contributor->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_name_short->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_sto->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$frm_9_m_sa_units_contributor_delete->RecCnt = 0;
$i = 0;
while (!$frm_9_m_sa_units_contributor_delete->Recordset->EOF) {
	$frm_9_m_sa_units_contributor_delete->RecCnt++;

	// Set row properties
	$frm_9_m_sa_units_contributor->ResetAttrs();
	$frm_9_m_sa_units_contributor->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$frm_9_m_sa_units_contributor_delete->LoadRowValues($frm_9_m_sa_units_contributor_delete->Recordset);

	// Render row
	$frm_9_m_sa_units_contributor_delete->RenderRow();
?>
	<tr<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_name_short->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_name_short->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_name_short->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_sto->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_sto->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_sto->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass->ListViewValue() ?></div></td>
	</tr>
<?php
	$frm_9_m_sa_units_contributor_delete->Recordset->MoveNext();
}
$frm_9_m_sa_units_contributor_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$frm_9_m_sa_units_contributor_delete->ShowPageFooter();
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
$frm_9_m_sa_units_contributor_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_9_m_sa_units_contributor_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'frm_9_m_sa_units_contributor';

	// Page object name
	var $PageObjName = 'frm_9_m_sa_units_contributor_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_9_m_sa_units_contributor;
		if ($frm_9_m_sa_units_contributor->UseTokenInUrl) $PageUrl .= "t=" . $frm_9_m_sa_units_contributor->TableVar . "&"; // Add page token
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
		global $objForm, $frm_9_m_sa_units_contributor;
		if ($frm_9_m_sa_units_contributor->UseTokenInUrl) {
			if ($objForm)
				return ($frm_9_m_sa_units_contributor->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_9_m_sa_units_contributor->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_9_m_sa_units_contributor_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_units_contributor)
		if (!isset($GLOBALS["frm_9_m_sa_units_contributor"])) {
			$GLOBALS["frm_9_m_sa_units_contributor"] = new cfrm_9_m_sa_units_contributor();
			$GLOBALS["Table"] =& $GLOBALS["frm_9_m_sa_units_contributor"];
		}

		// Table object (frm_9_m_sa_units_delivery)
		if (!isset($GLOBALS['frm_9_m_sa_units_delivery'])) $GLOBALS['frm_9_m_sa_units_delivery'] = new cfrm_9_m_sa_units_delivery();

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_9_m_sa_units_contributor', TRUE);

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
		global $frm_9_m_sa_units_contributor;

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
			$this->Page_Terminate("frm_9_m_sa_units_contributorlist.php");
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
	var $TotalRecs = 0;
	var $RecCnt;
	var $RecKeys = array();
	var $Recordset;

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $frm_9_m_sa_units_contributor;

		// Load key parameters
		$this->RecKeys = $frm_9_m_sa_units_contributor->GetRecordKeys(); // Load record keys
		$sFilter = $frm_9_m_sa_units_contributor->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("frm_9_m_sa_units_contributorlist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in frm_9_m_sa_units_contributor class, frm_9_m_sa_units_contributorinfo.php

		$frm_9_m_sa_units_contributor->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$frm_9_m_sa_units_contributor->CurrentAction = $_POST["a_delete"];
		} else {
			$frm_9_m_sa_units_contributor->CurrentAction = "I"; // Display record
		}
		switch ($frm_9_m_sa_units_contributor->CurrentAction) {
			case "D": // Delete
				$frm_9_m_sa_units_contributor->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($frm_9_m_sa_units_contributor->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_9_m_sa_units_contributor;

		// Call Recordset Selecting event
		$frm_9_m_sa_units_contributor->Recordset_Selecting($frm_9_m_sa_units_contributor->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_9_m_sa_units_contributor->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_9_m_sa_units_contributor->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_9_m_sa_units_contributor;
		$sFilter = $frm_9_m_sa_units_contributor->KeyFilter();

		// Call Row Selecting event
		$frm_9_m_sa_units_contributor->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_9_m_sa_units_contributor->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_units_contributor->SQL();
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
		global $conn, $frm_9_m_sa_units_contributor;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_9_m_sa_units_contributor->Row_Selected($row);
		$frm_9_m_sa_units_contributor->unit_contributor_id->setDbValue($rs->fields('unit_contributor_id'));
		$frm_9_m_sa_units_contributor->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_9_m_sa_units_contributor->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_9_m_sa_units_contributor->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_9_m_sa_units_contributor->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_9_m_sa_units_contributor->unit_delivery_name_cu->setDbValue($rs->fields('unit_delivery_name_cu'));
		$frm_9_m_sa_units_contributor->unit_contributor_name->setDbValue($rs->fields('unit_contributor_name'));
		$frm_9_m_sa_units_contributor->unit_contributor_name_short->setDbValue($rs->fields('unit_contributor_name_short'));
		$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->setDbValue($rs->fields('unit_contributor_personnel_count'));
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->setDbValue($rs->fields('unit_contributor_mfo_1'));
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->setDbValue($rs->fields('unit_contributor_mfo_2'));
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->setDbValue($rs->fields('unit_contributor_mfo_3'));
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->setDbValue($rs->fields('unit_contributor_mfo_4'));
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->setDbValue($rs->fields('unit_contributor_mfo_5'));
		$frm_9_m_sa_units_contributor->unit_contributor_sto->setDbValue($rs->fields('unit_contributor_sto'));
		$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->setDbValue($rs->fields('unit_contributor_gass_ab'));
		$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->setDbValue($rs->fields('unit_contributor_gass_cd'));
		$frm_9_m_sa_units_contributor->unit_contributor_gass->setDbValue($rs->fields('unit_contributor_gass'));
		$frm_9_m_sa_units_contributor->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_9_m_sa_units_contributor->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_9_m_sa_units_contributor->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_9_m_sa_units_contributor->a_startDate->setDbValue($rs->fields('a_startDate'));
		$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->setDbValue($rs->fields('a_cutOffDate_contributor'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_units_contributor;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_9_m_sa_units_contributor->Row_Rendering();

		// Common render codes for all row types
		// unit_contributor_id
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// cu_short_name
		// unit_delivery_name_cu
		// unit_contributor_name
		// unit_contributor_name_short
		// unit_contributor_personnel_count
		// unit_contributor_mfo_1
		// unit_contributor_mfo_2
		// unit_contributor_mfo_3
		// unit_contributor_mfo_4
		// unit_contributor_mfo_5
		// unit_contributor_sto
		// unit_contributor_gass_ab
		// unit_contributor_gass_cd
		// unit_contributor_gass
		// cutOffDate_id
		// t_startDate
		// t_cutOffDate_fp
		// t_cutOffDate_remarks
		// a_startDate
		// a_cutOffDate_contributor

		if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View row

			// unit_contributor_name
			$frm_9_m_sa_units_contributor->unit_contributor_name->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_name->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_name->ViewCustomAttributes = "";

			// unit_contributor_name_short
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_name_short->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->ViewCustomAttributes = "";

			// unit_contributor_personnel_count
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->ViewCustomAttributes = "";

			// unit_contributor_mfo_1
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->ViewCustomAttributes = "";

			// unit_contributor_mfo_2
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->ViewCustomAttributes = "";

			// unit_contributor_mfo_3
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->ViewCustomAttributes = "";

			// unit_contributor_mfo_4
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->ViewCustomAttributes = "";

			// unit_contributor_mfo_5
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->ViewCustomAttributes = "";

			// unit_contributor_sto
			$frm_9_m_sa_units_contributor->unit_contributor_sto->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_sto->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_sto->ViewCustomAttributes = "";

			// unit_contributor_gass_ab
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->ViewCustomAttributes = "";

			// unit_contributor_gass_cd
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->ViewCustomAttributes = "";

			// unit_contributor_gass
			$frm_9_m_sa_units_contributor->unit_contributor_gass->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_gass->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_gass->ViewCustomAttributes = "";

			// unit_contributor_name
			$frm_9_m_sa_units_contributor->unit_contributor_name->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_name->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_name->TooltipValue = "";

			// unit_contributor_name_short
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->TooltipValue = "";

			// unit_contributor_personnel_count
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->TooltipValue = "";

			// unit_contributor_mfo_1
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->TooltipValue = "";

			// unit_contributor_mfo_2
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->TooltipValue = "";

			// unit_contributor_mfo_3
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->TooltipValue = "";

			// unit_contributor_mfo_4
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->TooltipValue = "";

			// unit_contributor_mfo_5
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->TooltipValue = "";

			// unit_contributor_sto
			$frm_9_m_sa_units_contributor->unit_contributor_sto->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_sto->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_sto->TooltipValue = "";

			// unit_contributor_gass_ab
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->TooltipValue = "";

			// unit_contributor_gass_cd
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->TooltipValue = "";

			// unit_contributor_gass
			$frm_9_m_sa_units_contributor->unit_contributor_gass->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_9_m_sa_units_contributor->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_9_m_sa_units_contributor->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $frm_9_m_sa_units_contributor;
		$DeleteRows = TRUE;
		$sSql = $frm_9_m_sa_units_contributor->SQL();
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
				$DeleteRows = $frm_9_m_sa_units_contributor->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['unit_contributor_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_9_m_sa_units_contributor->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_9_m_sa_units_contributor->CancelMessage <> "") {
				$this->setFailureMessage($frm_9_m_sa_units_contributor->CancelMessage);
				$frm_9_m_sa_units_contributor->CancelMessage = "";
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
				$frm_9_m_sa_units_contributor->Row_Deleted($row);
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
