<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_9_m_sa_units_deliveryinfo.php" ?>
<?php include_once "frm_9_m_sa_units_cuinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_9_m_sa_units_delivery_delete = new cfrm_9_m_sa_units_delivery_delete();
$Page =& $frm_9_m_sa_units_delivery_delete;

// Page init
$frm_9_m_sa_units_delivery_delete->Page_Init();

// Page main
$frm_9_m_sa_units_delivery_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_9_m_sa_units_delivery_delete = new up_Page("frm_9_m_sa_units_delivery_delete");

// page properties
frm_9_m_sa_units_delivery_delete.PageID = "delete"; // page ID
frm_9_m_sa_units_delivery_delete.FormID = "ffrm_9_m_sa_units_deliverydelete"; // form ID
var UP_PAGE_ID = frm_9_m_sa_units_delivery_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_9_m_sa_units_delivery_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_9_m_sa_units_delivery_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_9_m_sa_units_delivery_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_9_m_sa_units_delivery_delete.ValidateRequired = false; // no JavaScript validation
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
if ($frm_9_m_sa_units_delivery_delete->Recordset = $frm_9_m_sa_units_delivery_delete->LoadRecordset())
	$frm_9_m_sa_units_delivery_deleteTotalRecs = $frm_9_m_sa_units_delivery_delete->Recordset->RecordCount(); // Get record count
if ($frm_9_m_sa_units_delivery_deleteTotalRecs <= 0) { // No record found, exit
	if ($frm_9_m_sa_units_delivery_delete->Recordset)
		$frm_9_m_sa_units_delivery_delete->Recordset->Close();
	$frm_9_m_sa_units_delivery_delete->Page_Terminate("frm_9_m_sa_units_deliverylist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_9_m_sa_units_delivery->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_9_m_sa_units_delivery->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_9_m_sa_units_delivery_delete->ShowPageHeader(); ?>
<?php
$frm_9_m_sa_units_delivery_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="frm_9_m_sa_units_delivery">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($frm_9_m_sa_units_delivery_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $frm_9_m_sa_units_delivery->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->cu_sequence->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->unit_delivery_name_cu->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->unit_delivery_name_short->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->unit_delivery_personnel_count->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_1->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_2->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_3->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_4->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_5->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->unit_delivery_sto->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->unit_delivery_gass_ab->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->unit_delivery_gass_cd->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->unit_delivery_gass->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$frm_9_m_sa_units_delivery_delete->RecCnt = 0;
$i = 0;
while (!$frm_9_m_sa_units_delivery_delete->Recordset->EOF) {
	$frm_9_m_sa_units_delivery_delete->RecCnt++;

	// Set row properties
	$frm_9_m_sa_units_delivery->ResetAttrs();
	$frm_9_m_sa_units_delivery->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$frm_9_m_sa_units_delivery_delete->LoadRowValues($frm_9_m_sa_units_delivery_delete->Recordset);

	// Render row
	$frm_9_m_sa_units_delivery_delete->RenderRow();
?>
	<tr<?php echo $frm_9_m_sa_units_delivery->RowAttributes() ?>>
		<td<?php echo $frm_9_m_sa_units_delivery->cu_sequence->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->cu_sequence->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->cu_sequence->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->unit_delivery_name_cu->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->unit_delivery_name_cu->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->unit_delivery_name_cu->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->unit_delivery_name_short->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->unit_delivery_name_short->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->unit_delivery_name_short->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->unit_delivery_personnel_count->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->unit_delivery_personnel_count->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->unit_delivery_personnel_count->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_1->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_1->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_1->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_2->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_2->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_2->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_3->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_3->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_3->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_4->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_4->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_4->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_5->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_5->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->unit_delivery_mfo_5->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->unit_delivery_sto->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->unit_delivery_sto->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->unit_delivery_sto->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->unit_delivery_gass_ab->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->unit_delivery_gass_ab->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->unit_delivery_gass_ab->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->unit_delivery_gass_cd->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->unit_delivery_gass_cd->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->unit_delivery_gass_cd->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->unit_delivery_gass->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->unit_delivery_gass->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->unit_delivery_gass->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->ListViewValue() ?></div></td>
	</tr>
<?php
	$frm_9_m_sa_units_delivery_delete->Recordset->MoveNext();
}
$frm_9_m_sa_units_delivery_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$frm_9_m_sa_units_delivery_delete->ShowPageFooter();
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
$frm_9_m_sa_units_delivery_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_9_m_sa_units_delivery_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'frm_9_m_sa_units_delivery';

	// Page object name
	var $PageObjName = 'frm_9_m_sa_units_delivery_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_9_m_sa_units_delivery;
		if ($frm_9_m_sa_units_delivery->UseTokenInUrl) $PageUrl .= "t=" . $frm_9_m_sa_units_delivery->TableVar . "&"; // Add page token
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
		global $objForm, $frm_9_m_sa_units_delivery;
		if ($frm_9_m_sa_units_delivery->UseTokenInUrl) {
			if ($objForm)
				return ($frm_9_m_sa_units_delivery->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_9_m_sa_units_delivery->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_9_m_sa_units_delivery_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_units_delivery)
		if (!isset($GLOBALS["frm_9_m_sa_units_delivery"])) {
			$GLOBALS["frm_9_m_sa_units_delivery"] = new cfrm_9_m_sa_units_delivery();
			$GLOBALS["Table"] =& $GLOBALS["frm_9_m_sa_units_delivery"];
		}

		// Table object (frm_9_m_sa_units_cu)
		if (!isset($GLOBALS['frm_9_m_sa_units_cu'])) $GLOBALS['frm_9_m_sa_units_cu'] = new cfrm_9_m_sa_units_cu();

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_9_m_sa_units_delivery', TRUE);

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
		global $frm_9_m_sa_units_delivery;

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
			$this->Page_Terminate("frm_9_m_sa_units_deliverylist.php");
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
		global $Language, $frm_9_m_sa_units_delivery;

		// Load key parameters
		$this->RecKeys = $frm_9_m_sa_units_delivery->GetRecordKeys(); // Load record keys
		$sFilter = $frm_9_m_sa_units_delivery->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("frm_9_m_sa_units_deliverylist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in frm_9_m_sa_units_delivery class, frm_9_m_sa_units_deliveryinfo.php

		$frm_9_m_sa_units_delivery->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$frm_9_m_sa_units_delivery->CurrentAction = $_POST["a_delete"];
		} else {
			$frm_9_m_sa_units_delivery->CurrentAction = "I"; // Display record
		}
		switch ($frm_9_m_sa_units_delivery->CurrentAction) {
			case "D": // Delete
				$frm_9_m_sa_units_delivery->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($frm_9_m_sa_units_delivery->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_9_m_sa_units_delivery;

		// Call Recordset Selecting event
		$frm_9_m_sa_units_delivery->Recordset_Selecting($frm_9_m_sa_units_delivery->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_9_m_sa_units_delivery->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_9_m_sa_units_delivery->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_9_m_sa_units_delivery;
		$sFilter = $frm_9_m_sa_units_delivery->KeyFilter();

		// Call Row Selecting event
		$frm_9_m_sa_units_delivery->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_9_m_sa_units_delivery->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_units_delivery->SQL();
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
		global $conn, $frm_9_m_sa_units_delivery;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_9_m_sa_units_delivery->Row_Selected($row);
		$frm_9_m_sa_units_delivery->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_9_m_sa_units_delivery->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_9_m_sa_units_delivery->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_9_m_sa_units_delivery->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_9_m_sa_units_delivery->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_9_m_sa_units_delivery->unit_delivery_name_cu->setDbValue($rs->fields('unit_delivery_name_cu'));
		$frm_9_m_sa_units_delivery->unit_delivery_name->setDbValue($rs->fields('unit_delivery_name'));
		$frm_9_m_sa_units_delivery->unit_delivery_name_short->setDbValue($rs->fields('unit_delivery_name_short'));
		$frm_9_m_sa_units_delivery->unit_delivery_personnel_count->setDbValue($rs->fields('unit_delivery_personnel_count'));
		$frm_9_m_sa_units_delivery->unit_delivery_mfo_1->setDbValue($rs->fields('unit_delivery_mfo_1'));
		$frm_9_m_sa_units_delivery->unit_delivery_mfo_2->setDbValue($rs->fields('unit_delivery_mfo_2'));
		$frm_9_m_sa_units_delivery->unit_delivery_mfo_3->setDbValue($rs->fields('unit_delivery_mfo_3'));
		$frm_9_m_sa_units_delivery->unit_delivery_mfo_4->setDbValue($rs->fields('unit_delivery_mfo_4'));
		$frm_9_m_sa_units_delivery->unit_delivery_mfo_5->setDbValue($rs->fields('unit_delivery_mfo_5'));
		$frm_9_m_sa_units_delivery->unit_delivery_sto->setDbValue($rs->fields('unit_delivery_sto'));
		$frm_9_m_sa_units_delivery->unit_delivery_gass_ab->setDbValue($rs->fields('unit_delivery_gass_ab'));
		$frm_9_m_sa_units_delivery->unit_delivery_gass_cd->setDbValue($rs->fields('unit_delivery_gass_cd'));
		$frm_9_m_sa_units_delivery->unit_delivery_gass->setDbValue($rs->fields('unit_delivery_gass'));
		$frm_9_m_sa_units_delivery->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_9_m_sa_units_delivery->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_9_m_sa_units_delivery->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_units_delivery;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_9_m_sa_units_delivery->Row_Rendering();

		// Common render codes for all row types
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// cu_sequence
		// cu_short_name
		// unit_delivery_name_cu
		// unit_delivery_name
		// unit_delivery_name_short
		// unit_delivery_personnel_count
		// unit_delivery_mfo_1
		// unit_delivery_mfo_2
		// unit_delivery_mfo_3
		// unit_delivery_mfo_4
		// unit_delivery_mfo_5
		// unit_delivery_sto
		// unit_delivery_gass_ab
		// unit_delivery_gass_cd
		// unit_delivery_gass
		// cutOffDate_id
		// t_startDate
		// t_cutOffDate_fp
		// t_cutOffDate_remarks

		if ($frm_9_m_sa_units_delivery->RowType == UP_ROWTYPE_VIEW) { // View row

			// cu_sequence
			$frm_9_m_sa_units_delivery->cu_sequence->ViewValue = $frm_9_m_sa_units_delivery->cu_sequence->CurrentValue;
			$frm_9_m_sa_units_delivery->cu_sequence->ViewCustomAttributes = "";

			// unit_delivery_name_cu
			$frm_9_m_sa_units_delivery->unit_delivery_name_cu->ViewValue = $frm_9_m_sa_units_delivery->unit_delivery_name_cu->CurrentValue;
			$frm_9_m_sa_units_delivery->unit_delivery_name_cu->ViewCustomAttributes = "";

			// unit_delivery_name_short
			$frm_9_m_sa_units_delivery->unit_delivery_name_short->ViewValue = $frm_9_m_sa_units_delivery->unit_delivery_name_short->CurrentValue;
			$frm_9_m_sa_units_delivery->unit_delivery_name_short->ViewCustomAttributes = "";

			// unit_delivery_personnel_count
			$frm_9_m_sa_units_delivery->unit_delivery_personnel_count->ViewValue = $frm_9_m_sa_units_delivery->unit_delivery_personnel_count->CurrentValue;
			$frm_9_m_sa_units_delivery->unit_delivery_personnel_count->ViewCustomAttributes = "";

			// unit_delivery_mfo_1
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_1->ViewValue = $frm_9_m_sa_units_delivery->unit_delivery_mfo_1->CurrentValue;
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_1->ViewCustomAttributes = "";

			// unit_delivery_mfo_2
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_2->ViewValue = $frm_9_m_sa_units_delivery->unit_delivery_mfo_2->CurrentValue;
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_2->ViewCustomAttributes = "";

			// unit_delivery_mfo_3
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_3->ViewValue = $frm_9_m_sa_units_delivery->unit_delivery_mfo_3->CurrentValue;
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_3->ViewCustomAttributes = "";

			// unit_delivery_mfo_4
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_4->ViewValue = $frm_9_m_sa_units_delivery->unit_delivery_mfo_4->CurrentValue;
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_4->ViewCustomAttributes = "";

			// unit_delivery_mfo_5
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_5->ViewValue = $frm_9_m_sa_units_delivery->unit_delivery_mfo_5->CurrentValue;
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_5->ViewCustomAttributes = "";

			// unit_delivery_sto
			$frm_9_m_sa_units_delivery->unit_delivery_sto->ViewValue = $frm_9_m_sa_units_delivery->unit_delivery_sto->CurrentValue;
			$frm_9_m_sa_units_delivery->unit_delivery_sto->ViewCustomAttributes = "";

			// unit_delivery_gass_ab
			$frm_9_m_sa_units_delivery->unit_delivery_gass_ab->ViewValue = $frm_9_m_sa_units_delivery->unit_delivery_gass_ab->CurrentValue;
			$frm_9_m_sa_units_delivery->unit_delivery_gass_ab->ViewCustomAttributes = "";

			// unit_delivery_gass_cd
			$frm_9_m_sa_units_delivery->unit_delivery_gass_cd->ViewValue = $frm_9_m_sa_units_delivery->unit_delivery_gass_cd->CurrentValue;
			$frm_9_m_sa_units_delivery->unit_delivery_gass_cd->ViewCustomAttributes = "";

			// unit_delivery_gass
			$frm_9_m_sa_units_delivery->unit_delivery_gass->ViewValue = $frm_9_m_sa_units_delivery->unit_delivery_gass->CurrentValue;
			$frm_9_m_sa_units_delivery->unit_delivery_gass->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->ViewValue = $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CurrentValue;
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// cu_sequence
			$frm_9_m_sa_units_delivery->cu_sequence->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->cu_sequence->HrefValue = "";
			$frm_9_m_sa_units_delivery->cu_sequence->TooltipValue = "";

			// unit_delivery_name_cu
			$frm_9_m_sa_units_delivery->unit_delivery_name_cu->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->unit_delivery_name_cu->HrefValue = "";
			$frm_9_m_sa_units_delivery->unit_delivery_name_cu->TooltipValue = "";

			// unit_delivery_name_short
			$frm_9_m_sa_units_delivery->unit_delivery_name_short->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->unit_delivery_name_short->HrefValue = "";
			$frm_9_m_sa_units_delivery->unit_delivery_name_short->TooltipValue = "";

			// unit_delivery_personnel_count
			$frm_9_m_sa_units_delivery->unit_delivery_personnel_count->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->unit_delivery_personnel_count->HrefValue = "";
			$frm_9_m_sa_units_delivery->unit_delivery_personnel_count->TooltipValue = "";

			// unit_delivery_mfo_1
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_1->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_1->HrefValue = "";
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_1->TooltipValue = "";

			// unit_delivery_mfo_2
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_2->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_2->HrefValue = "";
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_2->TooltipValue = "";

			// unit_delivery_mfo_3
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_3->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_3->HrefValue = "";
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_3->TooltipValue = "";

			// unit_delivery_mfo_4
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_4->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_4->HrefValue = "";
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_4->TooltipValue = "";

			// unit_delivery_mfo_5
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_5->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_5->HrefValue = "";
			$frm_9_m_sa_units_delivery->unit_delivery_mfo_5->TooltipValue = "";

			// unit_delivery_sto
			$frm_9_m_sa_units_delivery->unit_delivery_sto->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->unit_delivery_sto->HrefValue = "";
			$frm_9_m_sa_units_delivery->unit_delivery_sto->TooltipValue = "";

			// unit_delivery_gass_ab
			$frm_9_m_sa_units_delivery->unit_delivery_gass_ab->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->unit_delivery_gass_ab->HrefValue = "";
			$frm_9_m_sa_units_delivery->unit_delivery_gass_ab->TooltipValue = "";

			// unit_delivery_gass_cd
			$frm_9_m_sa_units_delivery->unit_delivery_gass_cd->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->unit_delivery_gass_cd->HrefValue = "";
			$frm_9_m_sa_units_delivery->unit_delivery_gass_cd->TooltipValue = "";

			// unit_delivery_gass
			$frm_9_m_sa_units_delivery->unit_delivery_gass->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->unit_delivery_gass->HrefValue = "";
			$frm_9_m_sa_units_delivery->unit_delivery_gass->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->HrefValue = "";
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_9_m_sa_units_delivery->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_9_m_sa_units_delivery->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $frm_9_m_sa_units_delivery;
		$DeleteRows = TRUE;
		$sSql = $frm_9_m_sa_units_delivery->SQL();
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
				$DeleteRows = $frm_9_m_sa_units_delivery->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['unit_delivery_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_9_m_sa_units_delivery->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_9_m_sa_units_delivery->CancelMessage <> "") {
				$this->setFailureMessage($frm_9_m_sa_units_delivery->CancelMessage);
				$frm_9_m_sa_units_delivery->CancelMessage = "";
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
				$frm_9_m_sa_units_delivery->Row_Deleted($row);
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
