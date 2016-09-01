<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_sam_cutoffdateinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_sam_cutoffdate_delete = new cfrm_sam_cutoffdate_delete();
$Page =& $frm_sam_cutoffdate_delete;

// Page init
$frm_sam_cutoffdate_delete->Page_Init();

// Page main
$frm_sam_cutoffdate_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_cutoffdate_delete = new up_Page("frm_sam_cutoffdate_delete");

// page properties
frm_sam_cutoffdate_delete.PageID = "delete"; // page ID
frm_sam_cutoffdate_delete.FormID = "ffrm_sam_cutoffdatedelete"; // form ID
var UP_PAGE_ID = frm_sam_cutoffdate_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_sam_cutoffdate_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_cutoffdate_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_cutoffdate_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_cutoffdate_delete.ValidateRequired = false; // no JavaScript validation
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
if ($frm_sam_cutoffdate_delete->Recordset = $frm_sam_cutoffdate_delete->LoadRecordset())
	$frm_sam_cutoffdate_deleteTotalRecs = $frm_sam_cutoffdate_delete->Recordset->RecordCount(); // Get record count
if ($frm_sam_cutoffdate_deleteTotalRecs <= 0) { // No record found, exit
	if ($frm_sam_cutoffdate_delete->Recordset)
		$frm_sam_cutoffdate_delete->Recordset->Close();
	$frm_sam_cutoffdate_delete->Page_Terminate("frm_sam_cutoffdatelist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_cutoffdate->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_sam_cutoffdate->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_sam_cutoffdate_delete->ShowPageHeader(); ?>
<?php
$frm_sam_cutoffdate_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="frm_sam_cutoffdate">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($frm_sam_cutoffdate_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $frm_sam_cutoffdate->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $frm_sam_cutoffdate->focal_person_office->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_cutoffdate->t_startDate->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_cutoffdate->t_cutOffDate->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_cutoffdate->t_cutOffDate_fp->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_cutoffdate->t_cutOffDate_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_cutoffdate->a_startDate->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_cutoffdate->a_cutOffDate->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_cutoffdate->a_cutOffDate_fp->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_cutoffdate->a_cutOffDate_remarks->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$frm_sam_cutoffdate_delete->RecCnt = 0;
$i = 0;
while (!$frm_sam_cutoffdate_delete->Recordset->EOF) {
	$frm_sam_cutoffdate_delete->RecCnt++;

	// Set row properties
	$frm_sam_cutoffdate->ResetAttrs();
	$frm_sam_cutoffdate->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$frm_sam_cutoffdate_delete->LoadRowValues($frm_sam_cutoffdate_delete->Recordset);

	// Render row
	$frm_sam_cutoffdate_delete->RenderRow();
?>
	<tr<?php echo $frm_sam_cutoffdate->RowAttributes() ?>>
		<td<?php echo $frm_sam_cutoffdate->focal_person_office->CellAttributes() ?>>
<div<?php echo $frm_sam_cutoffdate->focal_person_office->ViewAttributes() ?>><?php echo $frm_sam_cutoffdate->focal_person_office->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_cutoffdate->t_startDate->CellAttributes() ?>>
<div<?php echo $frm_sam_cutoffdate->t_startDate->ViewAttributes() ?>><?php echo $frm_sam_cutoffdate->t_startDate->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_cutoffdate->t_cutOffDate->CellAttributes() ?>>
<div<?php echo $frm_sam_cutoffdate->t_cutOffDate->ViewAttributes() ?>><?php echo $frm_sam_cutoffdate->t_cutOffDate->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_cutoffdate->t_cutOffDate_fp->CellAttributes() ?>>
<div<?php echo $frm_sam_cutoffdate->t_cutOffDate_fp->ViewAttributes() ?>><?php echo $frm_sam_cutoffdate->t_cutOffDate_fp->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_cutoffdate->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_cutoffdate->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_sam_cutoffdate->t_cutOffDate_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_cutoffdate->a_startDate->CellAttributes() ?>>
<div<?php echo $frm_sam_cutoffdate->a_startDate->ViewAttributes() ?>><?php echo $frm_sam_cutoffdate->a_startDate->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_cutoffdate->a_cutOffDate->CellAttributes() ?>>
<div<?php echo $frm_sam_cutoffdate->a_cutOffDate->ViewAttributes() ?>><?php echo $frm_sam_cutoffdate->a_cutOffDate->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_cutoffdate->a_cutOffDate_fp->CellAttributes() ?>>
<div<?php echo $frm_sam_cutoffdate->a_cutOffDate_fp->ViewAttributes() ?>><?php echo $frm_sam_cutoffdate->a_cutOffDate_fp->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_cutoffdate->a_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_cutoffdate->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_sam_cutoffdate->a_cutOffDate_remarks->ListViewValue() ?></div></td>
	</tr>
<?php
	$frm_sam_cutoffdate_delete->Recordset->MoveNext();
}
$frm_sam_cutoffdate_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$frm_sam_cutoffdate_delete->ShowPageFooter();
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
$frm_sam_cutoffdate_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_cutoffdate_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'frm_sam_cutoffdate';

	// Page object name
	var $PageObjName = 'frm_sam_cutoffdate_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_cutoffdate;
		if ($frm_sam_cutoffdate->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_cutoffdate->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_cutoffdate;
		if ($frm_sam_cutoffdate->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_cutoffdate->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_cutoffdate->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_cutoffdate_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_cutoffdate)
		if (!isset($GLOBALS["frm_sam_cutoffdate"])) {
			$GLOBALS["frm_sam_cutoffdate"] = new cfrm_sam_cutoffdate();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_cutoffdate"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_cutoffdate', TRUE);

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
		global $frm_sam_cutoffdate;

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
			$this->Page_Terminate("frm_sam_cutoffdatelist.php");
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
		global $Language, $frm_sam_cutoffdate;

		// Load key parameters
		$this->RecKeys = $frm_sam_cutoffdate->GetRecordKeys(); // Load record keys
		$sFilter = $frm_sam_cutoffdate->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("frm_sam_cutoffdatelist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in frm_sam_cutoffdate class, frm_sam_cutoffdateinfo.php

		$frm_sam_cutoffdate->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$frm_sam_cutoffdate->CurrentAction = $_POST["a_delete"];
		} else {
			$frm_sam_cutoffdate->CurrentAction = "I"; // Display record
		}
		switch ($frm_sam_cutoffdate->CurrentAction) {
			case "D": // Delete
				$frm_sam_cutoffdate->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($frm_sam_cutoffdate->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_sam_cutoffdate;

		// Call Recordset Selecting event
		$frm_sam_cutoffdate->Recordset_Selecting($frm_sam_cutoffdate->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_sam_cutoffdate->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_sam_cutoffdate->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_cutoffdate;
		$sFilter = $frm_sam_cutoffdate->KeyFilter();

		// Call Row Selecting event
		$frm_sam_cutoffdate->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_cutoffdate->CurrentFilter = $sFilter;
		$sSql = $frm_sam_cutoffdate->SQL();
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
		global $conn, $frm_sam_cutoffdate;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_cutoffdate->Row_Selected($row);
		$frm_sam_cutoffdate->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_sam_cutoffdate->collection_id->setDbValue($rs->fields('collection_id'));
		$frm_sam_cutoffdate->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_sam_cutoffdate->focal_person_office->setDbValue($rs->fields('focal_person_office'));
		$frm_sam_cutoffdate->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_sam_cutoffdate->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$frm_sam_cutoffdate->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_sam_cutoffdate->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_sam_cutoffdate->a_startDate->setDbValue($rs->fields('a_startDate'));
		$frm_sam_cutoffdate->a_cutOffDate->setDbValue($rs->fields('a_cutOffDate'));
		$frm_sam_cutoffdate->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_sam_cutoffdate->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_cutoffdate;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_sam_cutoffdate->Row_Rendering();

		// Common render codes for all row types
		// cutOffDate_id

		$frm_sam_cutoffdate->cutOffDate_id->CellCssStyle = "white-space: nowrap;";

		// collection_id
		$frm_sam_cutoffdate->collection_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$frm_sam_cutoffdate->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_office
		$frm_sam_cutoffdate->focal_person_office->CellCssStyle = "white-space: nowrap;";

		// t_startDate
		// t_cutOffDate

		$frm_sam_cutoffdate->t_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_fp
		// t_cutOffDate_remarks

		$frm_sam_cutoffdate->t_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";

		// a_startDate
		// a_cutOffDate

		$frm_sam_cutoffdate->a_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate_fp
		// a_cutOffDate_remarks

		$frm_sam_cutoffdate->a_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";
		if ($frm_sam_cutoffdate->RowType == UP_ROWTYPE_VIEW) { // View row

			// focal_person_office
			$frm_sam_cutoffdate->focal_person_office->ViewValue = $frm_sam_cutoffdate->focal_person_office->CurrentValue;
			$frm_sam_cutoffdate->focal_person_office->ViewCustomAttributes = "";

			// t_startDate
			$frm_sam_cutoffdate->t_startDate->ViewValue = $frm_sam_cutoffdate->t_startDate->CurrentValue;
			$frm_sam_cutoffdate->t_startDate->ViewValue = up_FormatDateTime($frm_sam_cutoffdate->t_startDate->ViewValue, 6);
			$frm_sam_cutoffdate->t_startDate->ViewCustomAttributes = "";

			// t_cutOffDate
			$frm_sam_cutoffdate->t_cutOffDate->ViewValue = $frm_sam_cutoffdate->t_cutOffDate->CurrentValue;
			$frm_sam_cutoffdate->t_cutOffDate->ViewValue = up_FormatDateTime($frm_sam_cutoffdate->t_cutOffDate->ViewValue, 6);
			$frm_sam_cutoffdate->t_cutOffDate->ViewCustomAttributes = "";

			// t_cutOffDate_fp
			$frm_sam_cutoffdate->t_cutOffDate_fp->ViewValue = $frm_sam_cutoffdate->t_cutOffDate_fp->CurrentValue;
			$frm_sam_cutoffdate->t_cutOffDate_fp->ViewValue = up_FormatDateTime($frm_sam_cutoffdate->t_cutOffDate_fp->ViewValue, 6);
			$frm_sam_cutoffdate->t_cutOffDate_fp->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_sam_cutoffdate->t_cutOffDate_remarks->ViewValue = $frm_sam_cutoffdate->t_cutOffDate_remarks->CurrentValue;
			$frm_sam_cutoffdate->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// a_startDate
			$frm_sam_cutoffdate->a_startDate->ViewValue = $frm_sam_cutoffdate->a_startDate->CurrentValue;
			$frm_sam_cutoffdate->a_startDate->ViewValue = up_FormatDateTime($frm_sam_cutoffdate->a_startDate->ViewValue, 6);
			$frm_sam_cutoffdate->a_startDate->ViewCustomAttributes = "";

			// a_cutOffDate
			$frm_sam_cutoffdate->a_cutOffDate->ViewValue = $frm_sam_cutoffdate->a_cutOffDate->CurrentValue;
			$frm_sam_cutoffdate->a_cutOffDate->ViewValue = up_FormatDateTime($frm_sam_cutoffdate->a_cutOffDate->ViewValue, 6);
			$frm_sam_cutoffdate->a_cutOffDate->ViewCustomAttributes = "";

			// a_cutOffDate_fp
			$frm_sam_cutoffdate->a_cutOffDate_fp->ViewValue = $frm_sam_cutoffdate->a_cutOffDate_fp->CurrentValue;
			$frm_sam_cutoffdate->a_cutOffDate_fp->ViewValue = up_FormatDateTime($frm_sam_cutoffdate->a_cutOffDate_fp->ViewValue, 6);
			$frm_sam_cutoffdate->a_cutOffDate_fp->ViewCustomAttributes = "";

			// a_cutOffDate_remarks
			$frm_sam_cutoffdate->a_cutOffDate_remarks->ViewValue = $frm_sam_cutoffdate->a_cutOffDate_remarks->CurrentValue;
			$frm_sam_cutoffdate->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// focal_person_office
			$frm_sam_cutoffdate->focal_person_office->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->focal_person_office->HrefValue = "";
			$frm_sam_cutoffdate->focal_person_office->TooltipValue = "";

			// t_startDate
			$frm_sam_cutoffdate->t_startDate->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->t_startDate->HrefValue = "";
			$frm_sam_cutoffdate->t_startDate->TooltipValue = "";

			// t_cutOffDate
			$frm_sam_cutoffdate->t_cutOffDate->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->t_cutOffDate->HrefValue = "";
			$frm_sam_cutoffdate->t_cutOffDate->TooltipValue = "";

			// t_cutOffDate_fp
			$frm_sam_cutoffdate->t_cutOffDate_fp->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->t_cutOffDate_fp->HrefValue = "";
			$frm_sam_cutoffdate->t_cutOffDate_fp->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_sam_cutoffdate->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->t_cutOffDate_remarks->HrefValue = "";
			$frm_sam_cutoffdate->t_cutOffDate_remarks->TooltipValue = "";

			// a_startDate
			$frm_sam_cutoffdate->a_startDate->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->a_startDate->HrefValue = "";
			$frm_sam_cutoffdate->a_startDate->TooltipValue = "";

			// a_cutOffDate
			$frm_sam_cutoffdate->a_cutOffDate->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->a_cutOffDate->HrefValue = "";
			$frm_sam_cutoffdate->a_cutOffDate->TooltipValue = "";

			// a_cutOffDate_fp
			$frm_sam_cutoffdate->a_cutOffDate_fp->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->a_cutOffDate_fp->HrefValue = "";
			$frm_sam_cutoffdate->a_cutOffDate_fp->TooltipValue = "";

			// a_cutOffDate_remarks
			$frm_sam_cutoffdate->a_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_sam_cutoffdate->a_cutOffDate_remarks->HrefValue = "";
			$frm_sam_cutoffdate->a_cutOffDate_remarks->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_sam_cutoffdate->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_cutoffdate->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $frm_sam_cutoffdate;
		$DeleteRows = TRUE;
		$sSql = $frm_sam_cutoffdate->SQL();
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
				$DeleteRows = $frm_sam_cutoffdate->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['cutOffDate_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_sam_cutoffdate->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_sam_cutoffdate->CancelMessage <> "") {
				$this->setFailureMessage($frm_sam_cutoffdate->CancelMessage);
				$frm_sam_cutoffdate->CancelMessage = "";
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
				$frm_sam_cutoffdate->Row_Deleted($row);
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
