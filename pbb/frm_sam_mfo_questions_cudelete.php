<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_sam_mfo_questions_cuinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_sam_mfo_questions_cu_delete = new cfrm_sam_mfo_questions_cu_delete();
$Page =& $frm_sam_mfo_questions_cu_delete;

// Page init
$frm_sam_mfo_questions_cu_delete->Page_Init();

// Page main
$frm_sam_mfo_questions_cu_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_mfo_questions_cu_delete = new up_Page("frm_sam_mfo_questions_cu_delete");

// page properties
frm_sam_mfo_questions_cu_delete.PageID = "delete"; // page ID
frm_sam_mfo_questions_cu_delete.FormID = "ffrm_sam_mfo_questions_cudelete"; // form ID
var UP_PAGE_ID = frm_sam_mfo_questions_cu_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_sam_mfo_questions_cu_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_mfo_questions_cu_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_mfo_questions_cu_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_mfo_questions_cu_delete.ValidateRequired = false; // no JavaScript validation
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
if ($frm_sam_mfo_questions_cu_delete->Recordset = $frm_sam_mfo_questions_cu_delete->LoadRecordset())
	$frm_sam_mfo_questions_cu_deleteTotalRecs = $frm_sam_mfo_questions_cu_delete->Recordset->RecordCount(); // Get record count
if ($frm_sam_mfo_questions_cu_deleteTotalRecs <= 0) { // No record found, exit
	if ($frm_sam_mfo_questions_cu_delete->Recordset)
		$frm_sam_mfo_questions_cu_delete->Recordset->Close();
	$frm_sam_mfo_questions_cu_delete->Page_Terminate("frm_sam_mfo_questions_culist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_mfo_questions_cu->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_sam_mfo_questions_cu->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_sam_mfo_questions_cu_delete->ShowPageHeader(); ?>
<?php
$frm_sam_mfo_questions_cu_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="frm_sam_mfo_questions_cu">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($frm_sam_mfo_questions_cu_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $frm_sam_mfo_questions_cu->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $frm_sam_mfo_questions_cu->target_quota_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_mfo_questions_cu->focal_person_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_mfo_questions_cu->cu_sequence->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_mfo_questions_cu->cu_short_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_mfo_questions_cu->focal_person_office->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_mfo_questions_cu->mfo_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_mfo_questions_cu->mfo_sequence->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_mfo_questions_cu->mfo_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_mfo_questions_cu->pi_question->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_mfo_questions_cu->target_quota->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$frm_sam_mfo_questions_cu_delete->RecCnt = 0;
$i = 0;
while (!$frm_sam_mfo_questions_cu_delete->Recordset->EOF) {
	$frm_sam_mfo_questions_cu_delete->RecCnt++;

	// Set row properties
	$frm_sam_mfo_questions_cu->ResetAttrs();
	$frm_sam_mfo_questions_cu->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$frm_sam_mfo_questions_cu_delete->LoadRowValues($frm_sam_mfo_questions_cu_delete->Recordset);

	// Render row
	$frm_sam_mfo_questions_cu_delete->RenderRow();
?>
	<tr<?php echo $frm_sam_mfo_questions_cu->RowAttributes() ?>>
		<td<?php echo $frm_sam_mfo_questions_cu->target_quota_id->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions_cu->target_quota_id->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions_cu->target_quota_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_mfo_questions_cu->focal_person_id->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions_cu->focal_person_id->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions_cu->focal_person_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_mfo_questions_cu->cu_sequence->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions_cu->cu_sequence->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions_cu->cu_sequence->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_mfo_questions_cu->cu_short_name->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions_cu->cu_short_name->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions_cu->cu_short_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_mfo_questions_cu->focal_person_office->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions_cu->focal_person_office->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions_cu->focal_person_office->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_mfo_questions_cu->mfo_id->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions_cu->mfo_id->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions_cu->mfo_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_mfo_questions_cu->mfo_sequence->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions_cu->mfo_sequence->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions_cu->mfo_sequence->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_mfo_questions_cu->mfo_name->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions_cu->mfo_name->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions_cu->mfo_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_mfo_questions_cu->pi_question->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions_cu->pi_question->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions_cu->pi_question->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_mfo_questions_cu->target_quota->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions_cu->target_quota->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions_cu->target_quota->ListViewValue() ?></div></td>
	</tr>
<?php
	$frm_sam_mfo_questions_cu_delete->Recordset->MoveNext();
}
$frm_sam_mfo_questions_cu_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$frm_sam_mfo_questions_cu_delete->ShowPageFooter();
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
$frm_sam_mfo_questions_cu_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_mfo_questions_cu_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'frm_sam_mfo_questions_cu';

	// Page object name
	var $PageObjName = 'frm_sam_mfo_questions_cu_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_mfo_questions_cu;
		if ($frm_sam_mfo_questions_cu->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_mfo_questions_cu->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_mfo_questions_cu;
		if ($frm_sam_mfo_questions_cu->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_mfo_questions_cu->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_mfo_questions_cu->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_mfo_questions_cu_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_mfo_questions_cu)
		if (!isset($GLOBALS["frm_sam_mfo_questions_cu"])) {
			$GLOBALS["frm_sam_mfo_questions_cu"] = new cfrm_sam_mfo_questions_cu();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_mfo_questions_cu"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_mfo_questions_cu', TRUE);

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
		global $frm_sam_mfo_questions_cu;

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
			$this->Page_Terminate("frm_sam_mfo_questions_culist.php");
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
		global $Language, $frm_sam_mfo_questions_cu;

		// Load key parameters
		$this->RecKeys = $frm_sam_mfo_questions_cu->GetRecordKeys(); // Load record keys
		$sFilter = $frm_sam_mfo_questions_cu->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("frm_sam_mfo_questions_culist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in frm_sam_mfo_questions_cu class, frm_sam_mfo_questions_cuinfo.php

		$frm_sam_mfo_questions_cu->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$frm_sam_mfo_questions_cu->CurrentAction = $_POST["a_delete"];
		} else {
			$frm_sam_mfo_questions_cu->CurrentAction = "I"; // Display record
		}
		switch ($frm_sam_mfo_questions_cu->CurrentAction) {
			case "D": // Delete
				$frm_sam_mfo_questions_cu->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($frm_sam_mfo_questions_cu->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_sam_mfo_questions_cu;

		// Call Recordset Selecting event
		$frm_sam_mfo_questions_cu->Recordset_Selecting($frm_sam_mfo_questions_cu->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_sam_mfo_questions_cu->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_sam_mfo_questions_cu->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_mfo_questions_cu;
		$sFilter = $frm_sam_mfo_questions_cu->KeyFilter();

		// Call Row Selecting event
		$frm_sam_mfo_questions_cu->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_mfo_questions_cu->CurrentFilter = $sFilter;
		$sSql = $frm_sam_mfo_questions_cu->SQL();
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
		global $conn, $frm_sam_mfo_questions_cu;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_mfo_questions_cu->Row_Selected($row);
		$frm_sam_mfo_questions_cu->target_quota_id->setDbValue($rs->fields('target_quota_id'));
		$frm_sam_mfo_questions_cu->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_sam_mfo_questions_cu->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_sam_mfo_questions_cu->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_sam_mfo_questions_cu->focal_person_office->setDbValue($rs->fields('focal_person_office'));
		$frm_sam_mfo_questions_cu->mfo_id->setDbValue($rs->fields('mfo_id'));
		$frm_sam_mfo_questions_cu->mfo_sequence->setDbValue($rs->fields('mfo_sequence'));
		$frm_sam_mfo_questions_cu->mfo_name->setDbValue($rs->fields('mfo_name'));
		$frm_sam_mfo_questions_cu->pi_question->setDbValue($rs->fields('pi_question'));
		$frm_sam_mfo_questions_cu->target_quota->setDbValue($rs->fields('target_quota'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_mfo_questions_cu;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_sam_mfo_questions_cu->Row_Rendering();

		// Common render codes for all row types
		// target_quota_id
		// focal_person_id
		// cu_sequence
		// cu_short_name
		// focal_person_office
		// mfo_id
		// mfo_sequence
		// mfo_name
		// pi_question
		// target_quota

		if ($frm_sam_mfo_questions_cu->RowType == UP_ROWTYPE_VIEW) { // View row

			// target_quota_id
			$frm_sam_mfo_questions_cu->target_quota_id->ViewValue = $frm_sam_mfo_questions_cu->target_quota_id->CurrentValue;
			$frm_sam_mfo_questions_cu->target_quota_id->ViewCustomAttributes = "";

			// focal_person_id
			$frm_sam_mfo_questions_cu->focal_person_id->ViewValue = $frm_sam_mfo_questions_cu->focal_person_id->CurrentValue;
			$frm_sam_mfo_questions_cu->focal_person_id->ViewCustomAttributes = "";

			// cu_sequence
			$frm_sam_mfo_questions_cu->cu_sequence->ViewValue = $frm_sam_mfo_questions_cu->cu_sequence->CurrentValue;
			$frm_sam_mfo_questions_cu->cu_sequence->ViewCustomAttributes = "";

			// cu_short_name
			$frm_sam_mfo_questions_cu->cu_short_name->ViewValue = $frm_sam_mfo_questions_cu->cu_short_name->CurrentValue;
			$frm_sam_mfo_questions_cu->cu_short_name->ViewCustomAttributes = "";

			// focal_person_office
			$frm_sam_mfo_questions_cu->focal_person_office->ViewValue = $frm_sam_mfo_questions_cu->focal_person_office->CurrentValue;
			$frm_sam_mfo_questions_cu->focal_person_office->ViewCustomAttributes = "";

			// mfo_id
			$frm_sam_mfo_questions_cu->mfo_id->ViewValue = $frm_sam_mfo_questions_cu->mfo_id->CurrentValue;
			$frm_sam_mfo_questions_cu->mfo_id->ViewCustomAttributes = "";

			// mfo_sequence
			$frm_sam_mfo_questions_cu->mfo_sequence->ViewValue = $frm_sam_mfo_questions_cu->mfo_sequence->CurrentValue;
			$frm_sam_mfo_questions_cu->mfo_sequence->ViewCustomAttributes = "";

			// mfo_name
			$frm_sam_mfo_questions_cu->mfo_name->ViewValue = $frm_sam_mfo_questions_cu->mfo_name->CurrentValue;
			$frm_sam_mfo_questions_cu->mfo_name->ViewCustomAttributes = "";

			// pi_question
			$frm_sam_mfo_questions_cu->pi_question->ViewValue = $frm_sam_mfo_questions_cu->pi_question->CurrentValue;
			$frm_sam_mfo_questions_cu->pi_question->ViewCustomAttributes = "";

			// target_quota
			$frm_sam_mfo_questions_cu->target_quota->ViewValue = $frm_sam_mfo_questions_cu->target_quota->CurrentValue;
			$frm_sam_mfo_questions_cu->target_quota->ViewCustomAttributes = "";

			// target_quota_id
			$frm_sam_mfo_questions_cu->target_quota_id->LinkCustomAttributes = "";
			$frm_sam_mfo_questions_cu->target_quota_id->HrefValue = "";
			$frm_sam_mfo_questions_cu->target_quota_id->TooltipValue = "";

			// focal_person_id
			$frm_sam_mfo_questions_cu->focal_person_id->LinkCustomAttributes = "";
			$frm_sam_mfo_questions_cu->focal_person_id->HrefValue = "";
			$frm_sam_mfo_questions_cu->focal_person_id->TooltipValue = "";

			// cu_sequence
			$frm_sam_mfo_questions_cu->cu_sequence->LinkCustomAttributes = "";
			$frm_sam_mfo_questions_cu->cu_sequence->HrefValue = "";
			$frm_sam_mfo_questions_cu->cu_sequence->TooltipValue = "";

			// cu_short_name
			$frm_sam_mfo_questions_cu->cu_short_name->LinkCustomAttributes = "";
			$frm_sam_mfo_questions_cu->cu_short_name->HrefValue = "";
			$frm_sam_mfo_questions_cu->cu_short_name->TooltipValue = "";

			// focal_person_office
			$frm_sam_mfo_questions_cu->focal_person_office->LinkCustomAttributes = "";
			$frm_sam_mfo_questions_cu->focal_person_office->HrefValue = "";
			$frm_sam_mfo_questions_cu->focal_person_office->TooltipValue = "";

			// mfo_id
			$frm_sam_mfo_questions_cu->mfo_id->LinkCustomAttributes = "";
			$frm_sam_mfo_questions_cu->mfo_id->HrefValue = "";
			$frm_sam_mfo_questions_cu->mfo_id->TooltipValue = "";

			// mfo_sequence
			$frm_sam_mfo_questions_cu->mfo_sequence->LinkCustomAttributes = "";
			$frm_sam_mfo_questions_cu->mfo_sequence->HrefValue = "";
			$frm_sam_mfo_questions_cu->mfo_sequence->TooltipValue = "";

			// mfo_name
			$frm_sam_mfo_questions_cu->mfo_name->LinkCustomAttributes = "";
			$frm_sam_mfo_questions_cu->mfo_name->HrefValue = "";
			$frm_sam_mfo_questions_cu->mfo_name->TooltipValue = "";

			// pi_question
			$frm_sam_mfo_questions_cu->pi_question->LinkCustomAttributes = "";
			$frm_sam_mfo_questions_cu->pi_question->HrefValue = "";
			$frm_sam_mfo_questions_cu->pi_question->TooltipValue = "";

			// target_quota
			$frm_sam_mfo_questions_cu->target_quota->LinkCustomAttributes = "";
			$frm_sam_mfo_questions_cu->target_quota->HrefValue = "";
			$frm_sam_mfo_questions_cu->target_quota->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_sam_mfo_questions_cu->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_mfo_questions_cu->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $frm_sam_mfo_questions_cu;
		$DeleteRows = TRUE;
		$sSql = $frm_sam_mfo_questions_cu->SQL();
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
				$DeleteRows = $frm_sam_mfo_questions_cu->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['target_quota_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_sam_mfo_questions_cu->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_sam_mfo_questions_cu->CancelMessage <> "") {
				$this->setFailureMessage($frm_sam_mfo_questions_cu->CancelMessage);
				$frm_sam_mfo_questions_cu->CancelMessage = "";
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
				$frm_sam_mfo_questions_cu->Row_Deleted($row);
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
