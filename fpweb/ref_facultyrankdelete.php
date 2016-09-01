<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_facultyrankinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_facultyrank_delete = new cref_facultyrank_delete();
$Page =& $ref_facultyrank_delete;

// Page init
$ref_facultyrank_delete->Page_Init();

// Page main
$ref_facultyrank_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_facultyrank_delete = new up_Page("ref_facultyrank_delete");

// page properties
ref_facultyrank_delete.PageID = "delete"; // page ID
ref_facultyrank_delete.FormID = "fref_facultyrankdelete"; // form ID
var UP_PAGE_ID = ref_facultyrank_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
ref_facultyrank_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_facultyrank_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_facultyrank_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_facultyrank_delete.ValidateRequired = false; // no JavaScript validation
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
if ($ref_facultyrank_delete->Recordset = $ref_facultyrank_delete->LoadRecordset())
	$ref_facultyrank_deleteTotalRecs = $ref_facultyrank_delete->Recordset->RecordCount(); // Get record count
if ($ref_facultyrank_deleteTotalRecs <= 0) { // No record found, exit
	if ($ref_facultyrank_delete->Recordset)
		$ref_facultyrank_delete->Recordset->Close();
	$ref_facultyrank_delete->Page_Terminate("ref_facultyranklist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_facultyrank->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_facultyrank->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_facultyrank_delete->ShowPageHeader(); ?>
<?php
$ref_facultyrank_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="ref_facultyrank">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($ref_facultyrank_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $ref_facultyrank->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $ref_facultyrank->facultyRank_facultyRank2012->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_facultyrank->facultyRank_numericRank2012->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_facultyrank->facultyRank_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_facultyrank->facultyRank_UPRank->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_facultyrank->facultyRank_rankGroup->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_facultyrank->facultyRank_isRegular->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_facultyrank->facultyRank_category->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_facultyrank->facultyRank_salaryScale->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_facultyrank->facultyRank_reportingDBM->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_facultyrank->facultyRank_reportingCHED->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$ref_facultyrank_delete->RecCnt = 0;
$i = 0;
while (!$ref_facultyrank_delete->Recordset->EOF) {
	$ref_facultyrank_delete->RecCnt++;

	// Set row properties
	$ref_facultyrank->ResetAttrs();
	$ref_facultyrank->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$ref_facultyrank_delete->LoadRowValues($ref_facultyrank_delete->Recordset);

	// Render row
	$ref_facultyrank_delete->RenderRow();
?>
	<tr<?php echo $ref_facultyrank->RowAttributes() ?>>
		<td<?php echo $ref_facultyrank->facultyRank_facultyRank2012->CellAttributes() ?>>
<div<?php echo $ref_facultyrank->facultyRank_facultyRank2012->ViewAttributes() ?>><?php echo $ref_facultyrank->facultyRank_facultyRank2012->ListViewValue() ?></div></td>
		<td<?php echo $ref_facultyrank->facultyRank_numericRank2012->CellAttributes() ?>>
<div<?php echo $ref_facultyrank->facultyRank_numericRank2012->ViewAttributes() ?>><?php echo $ref_facultyrank->facultyRank_numericRank2012->ListViewValue() ?></div></td>
		<td<?php echo $ref_facultyrank->facultyRank_ID->CellAttributes() ?>>
<div<?php echo $ref_facultyrank->facultyRank_ID->ViewAttributes() ?>><?php echo $ref_facultyrank->facultyRank_ID->ListViewValue() ?></div></td>
		<td<?php echo $ref_facultyrank->facultyRank_UPRank->CellAttributes() ?>>
<div<?php echo $ref_facultyrank->facultyRank_UPRank->ViewAttributes() ?>><?php echo $ref_facultyrank->facultyRank_UPRank->ListViewValue() ?></div></td>
		<td<?php echo $ref_facultyrank->facultyRank_rankGroup->CellAttributes() ?>>
<div<?php echo $ref_facultyrank->facultyRank_rankGroup->ViewAttributes() ?>><?php echo $ref_facultyrank->facultyRank_rankGroup->ListViewValue() ?></div></td>
		<td<?php echo $ref_facultyrank->facultyRank_isRegular->CellAttributes() ?>>
<div<?php echo $ref_facultyrank->facultyRank_isRegular->ViewAttributes() ?>><?php echo $ref_facultyrank->facultyRank_isRegular->ListViewValue() ?></div></td>
		<td<?php echo $ref_facultyrank->facultyRank_category->CellAttributes() ?>>
<div<?php echo $ref_facultyrank->facultyRank_category->ViewAttributes() ?>><?php echo $ref_facultyrank->facultyRank_category->ListViewValue() ?></div></td>
		<td<?php echo $ref_facultyrank->facultyRank_salaryScale->CellAttributes() ?>>
<div<?php echo $ref_facultyrank->facultyRank_salaryScale->ViewAttributes() ?>><?php echo $ref_facultyrank->facultyRank_salaryScale->ListViewValue() ?></div></td>
		<td<?php echo $ref_facultyrank->facultyRank_reportingDBM->CellAttributes() ?>>
<div<?php echo $ref_facultyrank->facultyRank_reportingDBM->ViewAttributes() ?>><?php echo $ref_facultyrank->facultyRank_reportingDBM->ListViewValue() ?></div></td>
		<td<?php echo $ref_facultyrank->facultyRank_reportingCHED->CellAttributes() ?>>
<div<?php echo $ref_facultyrank->facultyRank_reportingCHED->ViewAttributes() ?>><?php echo $ref_facultyrank->facultyRank_reportingCHED->ListViewValue() ?></div></td>
	</tr>
<?php
	$ref_facultyrank_delete->Recordset->MoveNext();
}
$ref_facultyrank_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$ref_facultyrank_delete->ShowPageFooter();
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
$ref_facultyrank_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_facultyrank_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'ref_facultyrank';

	// Page object name
	var $PageObjName = 'ref_facultyrank_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_facultyrank;
		if ($ref_facultyrank->UseTokenInUrl) $PageUrl .= "t=" . $ref_facultyrank->TableVar . "&"; // Add page token
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
		global $objForm, $ref_facultyrank;
		if ($ref_facultyrank->UseTokenInUrl) {
			if ($objForm)
				return ($ref_facultyrank->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_facultyrank->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_facultyrank_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_facultyrank)
		if (!isset($GLOBALS["ref_facultyrank"])) {
			$GLOBALS["ref_facultyrank"] = new cref_facultyrank();
			$GLOBALS["Table"] =& $GLOBALS["ref_facultyrank"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_facultyrank', TRUE);

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
		global $ref_facultyrank;

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
			$this->Page_Terminate("ref_facultyranklist.php");
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
		global $Language, $ref_facultyrank;

		// Load key parameters
		$this->RecKeys = $ref_facultyrank->GetRecordKeys(); // Load record keys
		$sFilter = $ref_facultyrank->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("ref_facultyranklist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in ref_facultyrank class, ref_facultyrankinfo.php

		$ref_facultyrank->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$ref_facultyrank->CurrentAction = $_POST["a_delete"];
		} else {
			$ref_facultyrank->CurrentAction = "I"; // Display record
		}
		switch ($ref_facultyrank->CurrentAction) {
			case "D": // Delete
				$ref_facultyrank->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($ref_facultyrank->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $ref_facultyrank;

		// Call Recordset Selecting event
		$ref_facultyrank->Recordset_Selecting($ref_facultyrank->CurrentFilter);

		// Load List page SQL
		$sSql = $ref_facultyrank->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$ref_facultyrank->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_facultyrank;
		$sFilter = $ref_facultyrank->KeyFilter();

		// Call Row Selecting event
		$ref_facultyrank->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_facultyrank->CurrentFilter = $sFilter;
		$sSql = $ref_facultyrank->SQL();
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
		global $conn, $ref_facultyrank;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_facultyrank->Row_Selected($row);
		$ref_facultyrank->facultyRank_facultyRank2012->setDbValue($rs->fields('facultyRank_facultyRank2012'));
		$ref_facultyrank->facultyRank_numericRank2012->setDbValue($rs->fields('facultyRank_numericRank2012'));
		$ref_facultyrank->facultyRank_ID->setDbValue($rs->fields('facultyRank_ID'));
		$ref_facultyrank->facultyRank_UPRank->setDbValue($rs->fields('facultyRank_UPRank'));
		$ref_facultyrank->facultyRank_rankGroup->setDbValue($rs->fields('facultyRank_rankGroup'));
		$ref_facultyrank->facultyRank_isRegular->setDbValue($rs->fields('facultyRank_isRegular'));
		$ref_facultyrank->facultyRank_category->setDbValue($rs->fields('facultyRank_category'));
		$ref_facultyrank->facultyRank_salaryScale->setDbValue($rs->fields('facultyRank_salaryScale'));
		$ref_facultyrank->facultyRank_reportingDBM->setDbValue($rs->fields('facultyRank_reportingDBM'));
		$ref_facultyrank->facultyRank_reportingCHED->setDbValue($rs->fields('facultyRank_reportingCHED'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_facultyrank;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_facultyrank->Row_Rendering();

		// Common render codes for all row types
		// facultyRank_facultyRank2012

		$ref_facultyrank->facultyRank_facultyRank2012->CellCssStyle = "white-space: nowrap;";

		// facultyRank_numericRank2012
		$ref_facultyrank->facultyRank_numericRank2012->CellCssStyle = "white-space: nowrap;";

		// facultyRank_ID
		$ref_facultyrank->facultyRank_ID->CellCssStyle = "white-space: nowrap;";

		// facultyRank_UPRank
		$ref_facultyrank->facultyRank_UPRank->CellCssStyle = "white-space: nowrap;";

		// facultyRank_rankGroup
		$ref_facultyrank->facultyRank_rankGroup->CellCssStyle = "white-space: nowrap;";

		// facultyRank_isRegular
		$ref_facultyrank->facultyRank_isRegular->CellCssStyle = "white-space: nowrap;";

		// facultyRank_category
		$ref_facultyrank->facultyRank_category->CellCssStyle = "white-space: nowrap;";

		// facultyRank_salaryScale
		$ref_facultyrank->facultyRank_salaryScale->CellCssStyle = "white-space: nowrap;";

		// facultyRank_reportingDBM
		$ref_facultyrank->facultyRank_reportingDBM->CellCssStyle = "white-space: nowrap;";

		// facultyRank_reportingCHED
		$ref_facultyrank->facultyRank_reportingCHED->CellCssStyle = "white-space: nowrap;";
		if ($ref_facultyrank->RowType == UP_ROWTYPE_VIEW) { // View row

			// facultyRank_facultyRank2012
			$ref_facultyrank->facultyRank_facultyRank2012->ViewValue = $ref_facultyrank->facultyRank_facultyRank2012->CurrentValue;
			$ref_facultyrank->facultyRank_facultyRank2012->ViewCustomAttributes = "";

			// facultyRank_numericRank2012
			$ref_facultyrank->facultyRank_numericRank2012->ViewValue = $ref_facultyrank->facultyRank_numericRank2012->CurrentValue;
			$ref_facultyrank->facultyRank_numericRank2012->ViewCustomAttributes = "";

			// facultyRank_ID
			$ref_facultyrank->facultyRank_ID->ViewValue = $ref_facultyrank->facultyRank_ID->CurrentValue;
			$ref_facultyrank->facultyRank_ID->ViewCustomAttributes = "";

			// facultyRank_UPRank
			$ref_facultyrank->facultyRank_UPRank->ViewValue = $ref_facultyrank->facultyRank_UPRank->CurrentValue;
			$ref_facultyrank->facultyRank_UPRank->ViewCustomAttributes = "";

			// facultyRank_rankGroup
			$ref_facultyrank->facultyRank_rankGroup->ViewValue = $ref_facultyrank->facultyRank_rankGroup->CurrentValue;
			$ref_facultyrank->facultyRank_rankGroup->ViewCustomAttributes = "";

			// facultyRank_isRegular
			$ref_facultyrank->facultyRank_isRegular->ViewValue = $ref_facultyrank->facultyRank_isRegular->CurrentValue;
			$ref_facultyrank->facultyRank_isRegular->ViewCustomAttributes = "";

			// facultyRank_category
			$ref_facultyrank->facultyRank_category->ViewValue = $ref_facultyrank->facultyRank_category->CurrentValue;
			$ref_facultyrank->facultyRank_category->ViewCustomAttributes = "";

			// facultyRank_salaryScale
			$ref_facultyrank->facultyRank_salaryScale->ViewValue = $ref_facultyrank->facultyRank_salaryScale->CurrentValue;
			$ref_facultyrank->facultyRank_salaryScale->ViewCustomAttributes = "";

			// facultyRank_reportingDBM
			$ref_facultyrank->facultyRank_reportingDBM->ViewValue = $ref_facultyrank->facultyRank_reportingDBM->CurrentValue;
			$ref_facultyrank->facultyRank_reportingDBM->ViewCustomAttributes = "";

			// facultyRank_reportingCHED
			$ref_facultyrank->facultyRank_reportingCHED->ViewValue = $ref_facultyrank->facultyRank_reportingCHED->CurrentValue;
			$ref_facultyrank->facultyRank_reportingCHED->ViewCustomAttributes = "";

			// facultyRank_facultyRank2012
			$ref_facultyrank->facultyRank_facultyRank2012->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_facultyRank2012->HrefValue = "";
			$ref_facultyrank->facultyRank_facultyRank2012->TooltipValue = "";

			// facultyRank_numericRank2012
			$ref_facultyrank->facultyRank_numericRank2012->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_numericRank2012->HrefValue = "";
			$ref_facultyrank->facultyRank_numericRank2012->TooltipValue = "";

			// facultyRank_ID
			$ref_facultyrank->facultyRank_ID->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_ID->HrefValue = "";
			$ref_facultyrank->facultyRank_ID->TooltipValue = "";

			// facultyRank_UPRank
			$ref_facultyrank->facultyRank_UPRank->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_UPRank->HrefValue = "";
			$ref_facultyrank->facultyRank_UPRank->TooltipValue = "";

			// facultyRank_rankGroup
			$ref_facultyrank->facultyRank_rankGroup->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_rankGroup->HrefValue = "";
			$ref_facultyrank->facultyRank_rankGroup->TooltipValue = "";

			// facultyRank_isRegular
			$ref_facultyrank->facultyRank_isRegular->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_isRegular->HrefValue = "";
			$ref_facultyrank->facultyRank_isRegular->TooltipValue = "";

			// facultyRank_category
			$ref_facultyrank->facultyRank_category->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_category->HrefValue = "";
			$ref_facultyrank->facultyRank_category->TooltipValue = "";

			// facultyRank_salaryScale
			$ref_facultyrank->facultyRank_salaryScale->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_salaryScale->HrefValue = "";
			$ref_facultyrank->facultyRank_salaryScale->TooltipValue = "";

			// facultyRank_reportingDBM
			$ref_facultyrank->facultyRank_reportingDBM->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_reportingDBM->HrefValue = "";
			$ref_facultyrank->facultyRank_reportingDBM->TooltipValue = "";

			// facultyRank_reportingCHED
			$ref_facultyrank->facultyRank_reportingCHED->LinkCustomAttributes = "";
			$ref_facultyrank->facultyRank_reportingCHED->HrefValue = "";
			$ref_facultyrank->facultyRank_reportingCHED->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($ref_facultyrank->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_facultyrank->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $ref_facultyrank;
		$DeleteRows = TRUE;
		$sSql = $ref_facultyrank->SQL();
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
				$DeleteRows = $ref_facultyrank->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['facultyRank_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($ref_facultyrank->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($ref_facultyrank->CancelMessage <> "") {
				$this->setFailureMessage($ref_facultyrank->CancelMessage);
				$ref_facultyrank->CancelMessage = "";
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
				$ref_facultyrank->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_facultyrank';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $ref_facultyrank;
		$table = 'ref_facultyrank';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['facultyRank_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $ref_facultyrank->fields) && $ref_facultyrank->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_facultyrank->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($ref_facultyrank->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
