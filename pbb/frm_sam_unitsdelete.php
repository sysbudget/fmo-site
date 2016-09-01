<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_sam_unitsinfo.php" ?>
<?php include_once "frm_sam_cu_executive_officesinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_sam_units_delete = new cfrm_sam_units_delete();
$Page =& $frm_sam_units_delete;

// Page init
$frm_sam_units_delete->Page_Init();

// Page main
$frm_sam_units_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_units_delete = new up_Page("frm_sam_units_delete");

// page properties
frm_sam_units_delete.PageID = "delete"; // page ID
frm_sam_units_delete.FormID = "ffrm_sam_unitsdelete"; // form ID
var UP_PAGE_ID = frm_sam_units_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_sam_units_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_units_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_units_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_units_delete.ValidateRequired = false; // no JavaScript validation
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
if ($frm_sam_units_delete->Recordset = $frm_sam_units_delete->LoadRecordset())
	$frm_sam_units_deleteTotalRecs = $frm_sam_units_delete->Recordset->RecordCount(); // Get record count
if ($frm_sam_units_deleteTotalRecs <= 0) { // No record found, exit
	if ($frm_sam_units_delete->Recordset)
		$frm_sam_units_delete->Recordset->Close();
	$frm_sam_units_delete->Page_Terminate("frm_sam_unitslist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_units->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_sam_units->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_sam_units_delete->ShowPageHeader(); ?>
<?php
$frm_sam_units_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="frm_sam_units">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($frm_sam_units_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $frm_sam_units->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $frm_sam_units->cu_unit_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_units->personnel_count->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_units->mfo_1->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_units->mfo_2->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_units->mfo_3->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_units->mfo_4->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_units->mfo_5->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_units->sto->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_units->gass->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_units->t_cutOffDate_remarks->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$frm_sam_units_delete->RecCnt = 0;
$i = 0;
while (!$frm_sam_units_delete->Recordset->EOF) {
	$frm_sam_units_delete->RecCnt++;

	// Set row properties
	$frm_sam_units->ResetAttrs();
	$frm_sam_units->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$frm_sam_units_delete->LoadRowValues($frm_sam_units_delete->Recordset);

	// Render row
	$frm_sam_units_delete->RenderRow();
?>
	<tr<?php echo $frm_sam_units->RowAttributes() ?>>
		<td<?php echo $frm_sam_units->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_sam_units->cu_unit_name->ViewAttributes() ?>><?php echo $frm_sam_units->cu_unit_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_units->personnel_count->CellAttributes() ?>>
<div<?php echo $frm_sam_units->personnel_count->ViewAttributes() ?>><?php echo $frm_sam_units->personnel_count->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_units->mfo_1->CellAttributes() ?>>
<div<?php echo $frm_sam_units->mfo_1->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_1->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_units->mfo_2->CellAttributes() ?>>
<div<?php echo $frm_sam_units->mfo_2->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_2->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_units->mfo_3->CellAttributes() ?>>
<div<?php echo $frm_sam_units->mfo_3->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_3->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_units->mfo_4->CellAttributes() ?>>
<div<?php echo $frm_sam_units->mfo_4->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_4->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_units->mfo_5->CellAttributes() ?>>
<div<?php echo $frm_sam_units->mfo_5->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_5->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_units->sto->CellAttributes() ?>>
<div<?php echo $frm_sam_units->sto->ViewAttributes() ?>><?php echo $frm_sam_units->sto->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_units->gass->CellAttributes() ?>>
<div<?php echo $frm_sam_units->gass->ViewAttributes() ?>><?php echo $frm_sam_units->gass->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_units->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_units->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_sam_units->t_cutOffDate_remarks->ListViewValue() ?></div></td>
	</tr>
<?php
	$frm_sam_units_delete->Recordset->MoveNext();
}
$frm_sam_units_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$frm_sam_units_delete->ShowPageFooter();
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
$frm_sam_units_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_units_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'frm_sam_units';

	// Page object name
	var $PageObjName = 'frm_sam_units_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_units;
		if ($frm_sam_units->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_units->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_units;
		if ($frm_sam_units->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_units->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_units->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_units_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_units)
		if (!isset($GLOBALS["frm_sam_units"])) {
			$GLOBALS["frm_sam_units"] = new cfrm_sam_units();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_units"];
		}

		// Table object (frm_sam_cu_executive_offices)
		if (!isset($GLOBALS['frm_sam_cu_executive_offices'])) $GLOBALS['frm_sam_cu_executive_offices'] = new cfrm_sam_cu_executive_offices();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_units', TRUE);

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
		global $frm_sam_units;

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
			$this->Page_Terminate("frm_sam_unitslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_sam_unitslist.php");
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
		global $Language, $frm_sam_units;

		// Load key parameters
		$this->RecKeys = $frm_sam_units->GetRecordKeys(); // Load record keys
		$sFilter = $frm_sam_units->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("frm_sam_unitslist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in frm_sam_units class, frm_sam_unitsinfo.php

		$frm_sam_units->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$frm_sam_units->CurrentAction = $_POST["a_delete"];
		} else {
			$frm_sam_units->CurrentAction = "I"; // Display record
		}
		switch ($frm_sam_units->CurrentAction) {
			case "D": // Delete
				$frm_sam_units->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($frm_sam_units->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_sam_units;

		// Call Recordset Selecting event
		$frm_sam_units->Recordset_Selecting($frm_sam_units->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_sam_units->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_sam_units->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_units;
		$sFilter = $frm_sam_units->KeyFilter();

		// Call Row Selecting event
		$frm_sam_units->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_units->CurrentFilter = $sFilter;
		$sSql = $frm_sam_units->SQL();
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
		global $conn, $frm_sam_units;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_units->Row_Selected($row);
		$frm_sam_units->units_id->setDbValue($rs->fields('units_id'));
		$frm_sam_units->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_sam_units->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_sam_units->unit_id->setDbValue($rs->fields('unit_id'));
		$frm_sam_units->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_sam_units->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_sam_units->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_sam_units->unit_name->setDbValue($rs->fields('unit_name'));
		$frm_sam_units->unit_name_short->setDbValue($rs->fields('unit_name_short'));
		$frm_sam_units->personnel_count->setDbValue($rs->fields('personnel_count'));
		$frm_sam_units->mfo_1->setDbValue($rs->fields('mfo_1'));
		$frm_sam_units->mfo_2->setDbValue($rs->fields('mfo_2'));
		$frm_sam_units->mfo_3->setDbValue($rs->fields('mfo_3'));
		$frm_sam_units->mfo_4->setDbValue($rs->fields('mfo_4'));
		$frm_sam_units->mfo_5->setDbValue($rs->fields('mfo_5'));
		$frm_sam_units->sto->setDbValue($rs->fields('sto'));
		$frm_sam_units->gass->setDbValue($rs->fields('gass'));
		$frm_sam_units->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_sam_units->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_sam_units->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_sam_units->t_startDate->setDbValue($rs->fields('t_startDate'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_units;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_sam_units->Row_Rendering();

		// Common render codes for all row types
		// units_id

		$frm_sam_units->units_id->CellCssStyle = "white-space: nowrap;";

		// cu_id
		$frm_sam_units->cu_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		// unit_id
		// cu_sequence
		// cu_short_name

		$frm_sam_units->cu_short_name->CellCssStyle = "white-space: nowrap;";

		// cu_unit_name
		$frm_sam_units->cu_unit_name->CellCssStyle = "white-space: nowrap;";

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
		// cutOffDate_id

		$frm_sam_units->cutOffDate_id->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_fp
		$frm_sam_units->t_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_remarks
		// t_startDate

		$frm_sam_units->t_startDate->CellCssStyle = "white-space: nowrap;";
		if ($frm_sam_units->RowType == UP_ROWTYPE_VIEW) { // View row

			// cu_unit_name
			$frm_sam_units->cu_unit_name->ViewValue = $frm_sam_units->cu_unit_name->CurrentValue;
			$frm_sam_units->cu_unit_name->ViewCustomAttributes = "";

			// personnel_count
			$frm_sam_units->personnel_count->ViewValue = $frm_sam_units->personnel_count->CurrentValue;
			$frm_sam_units->personnel_count->ViewCustomAttributes = "";

			// mfo_1
			if (strval($frm_sam_units->mfo_1->CurrentValue) <> "") {
				switch ($frm_sam_units->mfo_1->CurrentValue) {
					case "Y":
						$frm_sam_units->mfo_1->ViewValue = $frm_sam_units->mfo_1->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_1->FldTagCaption(1) : $frm_sam_units->mfo_1->CurrentValue;
						break;
					case "N":
						$frm_sam_units->mfo_1->ViewValue = $frm_sam_units->mfo_1->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_1->FldTagCaption(2) : $frm_sam_units->mfo_1->CurrentValue;
						break;
					default:
						$frm_sam_units->mfo_1->ViewValue = $frm_sam_units->mfo_1->CurrentValue;
				}
			} else {
				$frm_sam_units->mfo_1->ViewValue = NULL;
			}
			$frm_sam_units->mfo_1->ViewCustomAttributes = "";

			// mfo_2
			if (strval($frm_sam_units->mfo_2->CurrentValue) <> "") {
				switch ($frm_sam_units->mfo_2->CurrentValue) {
					case "Y":
						$frm_sam_units->mfo_2->ViewValue = $frm_sam_units->mfo_2->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_2->FldTagCaption(1) : $frm_sam_units->mfo_2->CurrentValue;
						break;
					case "N":
						$frm_sam_units->mfo_2->ViewValue = $frm_sam_units->mfo_2->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_2->FldTagCaption(2) : $frm_sam_units->mfo_2->CurrentValue;
						break;
					default:
						$frm_sam_units->mfo_2->ViewValue = $frm_sam_units->mfo_2->CurrentValue;
				}
			} else {
				$frm_sam_units->mfo_2->ViewValue = NULL;
			}
			$frm_sam_units->mfo_2->ViewCustomAttributes = "";

			// mfo_3
			if (strval($frm_sam_units->mfo_3->CurrentValue) <> "") {
				switch ($frm_sam_units->mfo_3->CurrentValue) {
					case "Y":
						$frm_sam_units->mfo_3->ViewValue = $frm_sam_units->mfo_3->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_3->FldTagCaption(1) : $frm_sam_units->mfo_3->CurrentValue;
						break;
					case "N":
						$frm_sam_units->mfo_3->ViewValue = $frm_sam_units->mfo_3->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_3->FldTagCaption(2) : $frm_sam_units->mfo_3->CurrentValue;
						break;
					default:
						$frm_sam_units->mfo_3->ViewValue = $frm_sam_units->mfo_3->CurrentValue;
				}
			} else {
				$frm_sam_units->mfo_3->ViewValue = NULL;
			}
			$frm_sam_units->mfo_3->ViewCustomAttributes = "";

			// mfo_4
			if (strval($frm_sam_units->mfo_4->CurrentValue) <> "") {
				switch ($frm_sam_units->mfo_4->CurrentValue) {
					case "Y":
						$frm_sam_units->mfo_4->ViewValue = $frm_sam_units->mfo_4->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_4->FldTagCaption(1) : $frm_sam_units->mfo_4->CurrentValue;
						break;
					case "N":
						$frm_sam_units->mfo_4->ViewValue = $frm_sam_units->mfo_4->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_4->FldTagCaption(2) : $frm_sam_units->mfo_4->CurrentValue;
						break;
					default:
						$frm_sam_units->mfo_4->ViewValue = $frm_sam_units->mfo_4->CurrentValue;
				}
			} else {
				$frm_sam_units->mfo_4->ViewValue = NULL;
			}
			$frm_sam_units->mfo_4->ViewCustomAttributes = "";

			// mfo_5
			if (strval($frm_sam_units->mfo_5->CurrentValue) <> "") {
				switch ($frm_sam_units->mfo_5->CurrentValue) {
					case "Y":
						$frm_sam_units->mfo_5->ViewValue = $frm_sam_units->mfo_5->FldTagCaption(1) <> "" ? $frm_sam_units->mfo_5->FldTagCaption(1) : $frm_sam_units->mfo_5->CurrentValue;
						break;
					case "N":
						$frm_sam_units->mfo_5->ViewValue = $frm_sam_units->mfo_5->FldTagCaption(2) <> "" ? $frm_sam_units->mfo_5->FldTagCaption(2) : $frm_sam_units->mfo_5->CurrentValue;
						break;
					default:
						$frm_sam_units->mfo_5->ViewValue = $frm_sam_units->mfo_5->CurrentValue;
				}
			} else {
				$frm_sam_units->mfo_5->ViewValue = NULL;
			}
			$frm_sam_units->mfo_5->ViewCustomAttributes = "";

			// sto
			if (strval($frm_sam_units->sto->CurrentValue) <> "") {
				switch ($frm_sam_units->sto->CurrentValue) {
					case "Y":
						$frm_sam_units->sto->ViewValue = $frm_sam_units->sto->FldTagCaption(1) <> "" ? $frm_sam_units->sto->FldTagCaption(1) : $frm_sam_units->sto->CurrentValue;
						break;
					case "N":
						$frm_sam_units->sto->ViewValue = $frm_sam_units->sto->FldTagCaption(2) <> "" ? $frm_sam_units->sto->FldTagCaption(2) : $frm_sam_units->sto->CurrentValue;
						break;
					default:
						$frm_sam_units->sto->ViewValue = $frm_sam_units->sto->CurrentValue;
				}
			} else {
				$frm_sam_units->sto->ViewValue = NULL;
			}
			$frm_sam_units->sto->ViewCustomAttributes = "";

			// gass
			if (strval($frm_sam_units->gass->CurrentValue) <> "") {
				switch ($frm_sam_units->gass->CurrentValue) {
					case "Y":
						$frm_sam_units->gass->ViewValue = $frm_sam_units->gass->FldTagCaption(1) <> "" ? $frm_sam_units->gass->FldTagCaption(1) : $frm_sam_units->gass->CurrentValue;
						break;
					case "N":
						$frm_sam_units->gass->ViewValue = $frm_sam_units->gass->FldTagCaption(2) <> "" ? $frm_sam_units->gass->FldTagCaption(2) : $frm_sam_units->gass->CurrentValue;
						break;
					default:
						$frm_sam_units->gass->ViewValue = $frm_sam_units->gass->CurrentValue;
				}
			} else {
				$frm_sam_units->gass->ViewValue = NULL;
			}
			$frm_sam_units->gass->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_sam_units->t_cutOffDate_remarks->ViewValue = $frm_sam_units->t_cutOffDate_remarks->CurrentValue;
			$frm_sam_units->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_sam_units->cu_unit_name->LinkCustomAttributes = "";
			$frm_sam_units->cu_unit_name->HrefValue = "";
			$frm_sam_units->cu_unit_name->TooltipValue = "";

			// personnel_count
			$frm_sam_units->personnel_count->LinkCustomAttributes = "";
			$frm_sam_units->personnel_count->HrefValue = "";
			$frm_sam_units->personnel_count->TooltipValue = "";

			// mfo_1
			$frm_sam_units->mfo_1->LinkCustomAttributes = "";
			$frm_sam_units->mfo_1->HrefValue = "";
			$frm_sam_units->mfo_1->TooltipValue = "";

			// mfo_2
			$frm_sam_units->mfo_2->LinkCustomAttributes = "";
			$frm_sam_units->mfo_2->HrefValue = "";
			$frm_sam_units->mfo_2->TooltipValue = "";

			// mfo_3
			$frm_sam_units->mfo_3->LinkCustomAttributes = "";
			$frm_sam_units->mfo_3->HrefValue = "";
			$frm_sam_units->mfo_3->TooltipValue = "";

			// mfo_4
			$frm_sam_units->mfo_4->LinkCustomAttributes = "";
			$frm_sam_units->mfo_4->HrefValue = "";
			$frm_sam_units->mfo_4->TooltipValue = "";

			// mfo_5
			$frm_sam_units->mfo_5->LinkCustomAttributes = "";
			$frm_sam_units->mfo_5->HrefValue = "";
			$frm_sam_units->mfo_5->TooltipValue = "";

			// sto
			$frm_sam_units->sto->LinkCustomAttributes = "";
			$frm_sam_units->sto->HrefValue = "";
			$frm_sam_units->sto->TooltipValue = "";

			// gass
			$frm_sam_units->gass->LinkCustomAttributes = "";
			$frm_sam_units->gass->HrefValue = "";
			$frm_sam_units->gass->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_sam_units->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_sam_units->t_cutOffDate_remarks->HrefValue = "";
			$frm_sam_units->t_cutOffDate_remarks->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_sam_units->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_units->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $frm_sam_units;
		$DeleteRows = TRUE;
		$sSql = $frm_sam_units->SQL();
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
				$DeleteRows = $frm_sam_units->Row_Deleting($row);
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
				$DeleteRows = $conn->Execute($frm_sam_units->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_sam_units->CancelMessage <> "") {
				$this->setFailureMessage($frm_sam_units->CancelMessage);
				$frm_sam_units->CancelMessage = "";
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
				$frm_sam_units->Row_Deleted($row);
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
