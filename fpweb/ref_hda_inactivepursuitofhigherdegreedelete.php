<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_hda_inactivepursuitofhigherdegreeinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_hda_inactivepursuitofhigherdegree_delete = new cref_hda_inactivepursuitofhigherdegree_delete();
$Page =& $ref_hda_inactivepursuitofhigherdegree_delete;

// Page init
$ref_hda_inactivepursuitofhigherdegree_delete->Page_Init();

// Page main
$ref_hda_inactivepursuitofhigherdegree_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_hda_inactivepursuitofhigherdegree_delete = new up_Page("ref_hda_inactivepursuitofhigherdegree_delete");

// page properties
ref_hda_inactivepursuitofhigherdegree_delete.PageID = "delete"; // page ID
ref_hda_inactivepursuitofhigherdegree_delete.FormID = "fref_hda_inactivepursuitofhigherdegreedelete"; // form ID
var UP_PAGE_ID = ref_hda_inactivepursuitofhigherdegree_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
ref_hda_inactivepursuitofhigherdegree_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_hda_inactivepursuitofhigherdegree_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_hda_inactivepursuitofhigherdegree_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_hda_inactivepursuitofhigherdegree_delete.ValidateRequired = false; // no JavaScript validation
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
if ($ref_hda_inactivepursuitofhigherdegree_delete->Recordset = $ref_hda_inactivepursuitofhigherdegree_delete->LoadRecordset())
	$ref_hda_inactivepursuitofhigherdegree_deleteTotalRecs = $ref_hda_inactivepursuitofhigherdegree_delete->Recordset->RecordCount(); // Get record count
if ($ref_hda_inactivepursuitofhigherdegree_deleteTotalRecs <= 0) { // No record found, exit
	if ($ref_hda_inactivepursuitofhigherdegree_delete->Recordset)
		$ref_hda_inactivepursuitofhigherdegree_delete->Recordset->Close();
	$ref_hda_inactivepursuitofhigherdegree_delete->Page_Terminate("ref_hda_inactivepursuitofhigherdegreelist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_hda_inactivepursuitofhigherdegree->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_hda_inactivepursuitofhigherdegree->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_hda_inactivepursuitofhigherdegree_delete->ShowPageHeader(); ?>
<?php
$ref_hda_inactivepursuitofhigherdegree_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="ref_hda_inactivepursuitofhigherdegree">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($ref_hda_inactivepursuitofhigherdegree_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $ref_hda_inactivepursuitofhigherdegree->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_name->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_candidate->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$ref_hda_inactivepursuitofhigherdegree_delete->RecCnt = 0;
$i = 0;
while (!$ref_hda_inactivepursuitofhigherdegree_delete->Recordset->EOF) {
	$ref_hda_inactivepursuitofhigherdegree_delete->RecCnt++;

	// Set row properties
	$ref_hda_inactivepursuitofhigherdegree->ResetAttrs();
	$ref_hda_inactivepursuitofhigherdegree->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$ref_hda_inactivepursuitofhigherdegree_delete->LoadRowValues($ref_hda_inactivepursuitofhigherdegree_delete->Recordset);

	// Render row
	$ref_hda_inactivepursuitofhigherdegree_delete->RenderRow();
?>
	<tr<?php echo $ref_hda_inactivepursuitofhigherdegree->RowAttributes() ?>>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_ID->CellAttributes() ?>>
<div<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_ID->ViewAttributes() ?>><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_ID->ListViewValue() ?></div></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_name->CellAttributes() ?>>
<div<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_name->ViewAttributes() ?>><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_name->ListViewValue() ?></div></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->CellAttributes() ?>>
<div<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->ViewAttributes() ?>><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->ListViewValue() ?></div></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CellAttributes() ?>>
<div<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->ViewAttributes() ?>><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->ListViewValue() ?></div></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CellAttributes() ?>>
<div<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->ViewAttributes() ?>><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->ListViewValue() ?></div></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->CellAttributes() ?>>
<div<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->ViewAttributes() ?>><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->ListViewValue() ?></div></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->CellAttributes() ?>>
<div<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->ViewAttributes() ?>><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->ListViewValue() ?></div></td>
		<td<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_candidate->CellAttributes() ?>>
<div<?php echo $ref_hda_inactivepursuitofhigherdegree->hda_candidate->ViewAttributes() ?>><?php echo $ref_hda_inactivepursuitofhigherdegree->hda_candidate->ListViewValue() ?></div></td>
	</tr>
<?php
	$ref_hda_inactivepursuitofhigherdegree_delete->Recordset->MoveNext();
}
$ref_hda_inactivepursuitofhigherdegree_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$ref_hda_inactivepursuitofhigherdegree_delete->ShowPageFooter();
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
$ref_hda_inactivepursuitofhigherdegree_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_hda_inactivepursuitofhigherdegree_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'ref_hda_inactivepursuitofhigherdegree';

	// Page object name
	var $PageObjName = 'ref_hda_inactivepursuitofhigherdegree_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_hda_inactivepursuitofhigherdegree;
		if ($ref_hda_inactivepursuitofhigherdegree->UseTokenInUrl) $PageUrl .= "t=" . $ref_hda_inactivepursuitofhigherdegree->TableVar . "&"; // Add page token
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
		global $objForm, $ref_hda_inactivepursuitofhigherdegree;
		if ($ref_hda_inactivepursuitofhigherdegree->UseTokenInUrl) {
			if ($objForm)
				return ($ref_hda_inactivepursuitofhigherdegree->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_hda_inactivepursuitofhigherdegree->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_hda_inactivepursuitofhigherdegree_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_hda_inactivepursuitofhigherdegree)
		if (!isset($GLOBALS["ref_hda_inactivepursuitofhigherdegree"])) {
			$GLOBALS["ref_hda_inactivepursuitofhigherdegree"] = new cref_hda_inactivepursuitofhigherdegree();
			$GLOBALS["Table"] =& $GLOBALS["ref_hda_inactivepursuitofhigherdegree"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_hda_inactivepursuitofhigherdegree', TRUE);

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
		global $ref_hda_inactivepursuitofhigherdegree;

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
			$this->Page_Terminate("ref_hda_inactivepursuitofhigherdegreelist.php");
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
		global $Language, $ref_hda_inactivepursuitofhigherdegree;

		// Load key parameters
		$this->RecKeys = $ref_hda_inactivepursuitofhigherdegree->GetRecordKeys(); // Load record keys
		$sFilter = $ref_hda_inactivepursuitofhigherdegree->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("ref_hda_inactivepursuitofhigherdegreelist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in ref_hda_inactivepursuitofhigherdegree class, ref_hda_inactivepursuitofhigherdegreeinfo.php

		$ref_hda_inactivepursuitofhigherdegree->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$ref_hda_inactivepursuitofhigherdegree->CurrentAction = $_POST["a_delete"];
		} else {
			$ref_hda_inactivepursuitofhigherdegree->CurrentAction = "I"; // Display record
		}
		switch ($ref_hda_inactivepursuitofhigherdegree->CurrentAction) {
			case "D": // Delete
				$ref_hda_inactivepursuitofhigherdegree->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($ref_hda_inactivepursuitofhigherdegree->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $ref_hda_inactivepursuitofhigherdegree;

		// Call Recordset Selecting event
		$ref_hda_inactivepursuitofhigherdegree->Recordset_Selecting($ref_hda_inactivepursuitofhigherdegree->CurrentFilter);

		// Load List page SQL
		$sSql = $ref_hda_inactivepursuitofhigherdegree->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$ref_hda_inactivepursuitofhigherdegree->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_hda_inactivepursuitofhigherdegree;
		$sFilter = $ref_hda_inactivepursuitofhigherdegree->KeyFilter();

		// Call Row Selecting event
		$ref_hda_inactivepursuitofhigherdegree->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_hda_inactivepursuitofhigherdegree->CurrentFilter = $sFilter;
		$sSql = $ref_hda_inactivepursuitofhigherdegree->SQL();
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
		global $conn, $ref_hda_inactivepursuitofhigherdegree;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_hda_inactivepursuitofhigherdegree->Row_Selected($row);
		$ref_hda_inactivepursuitofhigherdegree->hda_ID->setDbValue($rs->fields('hda_ID'));
		$ref_hda_inactivepursuitofhigherdegree->hda_name->setDbValue($rs->fields('hda_name'));
		$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->setDbValue($rs->fields('hda_inActivePursuitofHigherDegree'));
		$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->setDbValue($rs->fields('hda_degreeLevel_degrees'));
		$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->setDbValue($rs->fields('hda_degreeLevel_faculty_ID'));
		$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->setDbValue($rs->fields('hda_isEnrolledOrInResidence'));
		$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->setDbValue($rs->fields('hda_hasEarnedCreditUnits'));
		$ref_hda_inactivepursuitofhigherdegree->hda_candidate->setDbValue($rs->fields('hda_candidate'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_hda_inactivepursuitofhigherdegree;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_hda_inactivepursuitofhigherdegree->Row_Rendering();

		// Common render codes for all row types
		// hda_ID

		$ref_hda_inactivepursuitofhigherdegree->hda_ID->CellCssStyle = "white-space: nowrap;";

		// hda_name
		$ref_hda_inactivepursuitofhigherdegree->hda_name->CellCssStyle = "white-space: nowrap;";

		// hda_inActivePursuitofHigherDegree
		$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->CellCssStyle = "white-space: nowrap;";

		// hda_degreeLevel_degrees
		$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CellCssStyle = "white-space: nowrap;";

		// hda_degreeLevel_faculty_ID
		$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CellCssStyle = "white-space: nowrap;";

		// hda_isEnrolledOrInResidence
		$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->CellCssStyle = "white-space: nowrap;";

		// hda_hasEarnedCreditUnits
		$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->CellCssStyle = "white-space: nowrap;";

		// hda_candidate
		$ref_hda_inactivepursuitofhigherdegree->hda_candidate->CellCssStyle = "white-space: nowrap;";
		if ($ref_hda_inactivepursuitofhigherdegree->RowType == UP_ROWTYPE_VIEW) { // View row

			// hda_ID
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_ID->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->ViewCustomAttributes = "";

			// hda_name
			$ref_hda_inactivepursuitofhigherdegree->hda_name->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_name->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_name->ViewCustomAttributes = "";

			// hda_inActivePursuitofHigherDegree
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->ViewCustomAttributes = "";

			// hda_degreeLevel_degrees
			if (strval($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CurrentValue) <> "") {
				$sFilterWrk = "`degreeLevel_ID` = " . up_AdjustSql($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreeLevel_name` FROM `ref_degreelevel_degrees`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `degreeLevel_name` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->ViewValue = $rswrk->fields('degreeLevel_name');
					$rswrk->Close();
				} else {
					$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->CurrentValue;
				}
			} else {
				$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->ViewValue = NULL;
			}
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->ViewCustomAttributes = "";

			// hda_degreeLevel_faculty_ID
			if (strval($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CurrentValue) <> "") {
				$sFilterWrk = "`degreelevelFaculty_ID` = " . up_AdjustSql($ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreelevelFaculty_name` FROM `ref_degreelevel_faculty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `degreelevelFaculty_name` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->ViewValue = $rswrk->fields('degreelevelFaculty_name');
					$rswrk->Close();
				} else {
					$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->CurrentValue;
				}
			} else {
				$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->ViewValue = NULL;
			}
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->ViewCustomAttributes = "";

			// hda_isEnrolledOrInResidence
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->ViewCustomAttributes = "";

			// hda_hasEarnedCreditUnits
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->ViewCustomAttributes = "";

			// hda_candidate
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->ViewValue = $ref_hda_inactivepursuitofhigherdegree->hda_candidate->CurrentValue;
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->ViewCustomAttributes = "";

			// hda_ID
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_ID->TooltipValue = "";

			// hda_name
			$ref_hda_inactivepursuitofhigherdegree->hda_name->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_name->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_name->TooltipValue = "";

			// hda_inActivePursuitofHigherDegree
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_inActivePursuitofHigherDegree->TooltipValue = "";

			// hda_degreeLevel_degrees
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_degrees->TooltipValue = "";

			// hda_degreeLevel_faculty_ID
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_degreeLevel_faculty_ID->TooltipValue = "";

			// hda_isEnrolledOrInResidence
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_isEnrolledOrInResidence->TooltipValue = "";

			// hda_hasEarnedCreditUnits
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_hasEarnedCreditUnits->TooltipValue = "";

			// hda_candidate
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->LinkCustomAttributes = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->HrefValue = "";
			$ref_hda_inactivepursuitofhigherdegree->hda_candidate->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($ref_hda_inactivepursuitofhigherdegree->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_hda_inactivepursuitofhigherdegree->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $ref_hda_inactivepursuitofhigherdegree;
		$DeleteRows = TRUE;
		$sSql = $ref_hda_inactivepursuitofhigherdegree->SQL();
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
				$DeleteRows = $ref_hda_inactivepursuitofhigherdegree->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['hda_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($ref_hda_inactivepursuitofhigherdegree->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($ref_hda_inactivepursuitofhigherdegree->CancelMessage <> "") {
				$this->setFailureMessage($ref_hda_inactivepursuitofhigherdegree->CancelMessage);
				$ref_hda_inactivepursuitofhigherdegree->CancelMessage = "";
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
				$ref_hda_inactivepursuitofhigherdegree->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_hda_inactivepursuitofhigherdegree';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $ref_hda_inactivepursuitofhigherdegree;
		$table = 'ref_hda_inactivepursuitofhigherdegree';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['hda_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $ref_hda_inactivepursuitofhigherdegree->fields) && $ref_hda_inactivepursuitofhigherdegree->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_hda_inactivepursuitofhigherdegree->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($ref_hda_inactivepursuitofhigherdegree->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
