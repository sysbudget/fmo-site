<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_disciplinechedcodes_minorinfo.php" ?>
<?php include_once "ref_disciplinechedcodes_majorinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_disciplinechedcodes_minor_delete = new cref_disciplinechedcodes_minor_delete();
$Page =& $ref_disciplinechedcodes_minor_delete;

// Page init
$ref_disciplinechedcodes_minor_delete->Page_Init();

// Page main
$ref_disciplinechedcodes_minor_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_disciplinechedcodes_minor_delete = new up_Page("ref_disciplinechedcodes_minor_delete");

// page properties
ref_disciplinechedcodes_minor_delete.PageID = "delete"; // page ID
ref_disciplinechedcodes_minor_delete.FormID = "fref_disciplinechedcodes_minordelete"; // form ID
var UP_PAGE_ID = ref_disciplinechedcodes_minor_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
ref_disciplinechedcodes_minor_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_disciplinechedcodes_minor_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_disciplinechedcodes_minor_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_disciplinechedcodes_minor_delete.ValidateRequired = false; // no JavaScript validation
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
if ($ref_disciplinechedcodes_minor_delete->Recordset = $ref_disciplinechedcodes_minor_delete->LoadRecordset())
	$ref_disciplinechedcodes_minor_deleteTotalRecs = $ref_disciplinechedcodes_minor_delete->Recordset->RecordCount(); // Get record count
if ($ref_disciplinechedcodes_minor_deleteTotalRecs <= 0) { // No record found, exit
	if ($ref_disciplinechedcodes_minor_delete->Recordset)
		$ref_disciplinechedcodes_minor_delete->Recordset->Close();
	$ref_disciplinechedcodes_minor_delete->Page_Terminate("ref_disciplinechedcodes_minorlist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_disciplinechedcodes_minor->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_disciplinechedcodes_minor->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_disciplinechedcodes_minor_delete->ShowPageHeader(); ?>
<?php
$ref_disciplinechedcodes_minor_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="ref_disciplinechedcodes_minor">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($ref_disciplinechedcodes_minor_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $ref_disciplinechedcodes_minor->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$ref_disciplinechedcodes_minor_delete->RecCnt = 0;
$i = 0;
while (!$ref_disciplinechedcodes_minor_delete->Recordset->EOF) {
	$ref_disciplinechedcodes_minor_delete->RecCnt++;

	// Set row properties
	$ref_disciplinechedcodes_minor->ResetAttrs();
	$ref_disciplinechedcodes_minor->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$ref_disciplinechedcodes_minor_delete->LoadRowValues($ref_disciplinechedcodes_minor_delete->Recordset);

	// Render row
	$ref_disciplinechedcodes_minor_delete->RenderRow();
?>
	<tr<?php echo $ref_disciplinechedcodes_minor->RowAttributes() ?>>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ListViewValue() ?></div></td>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ListViewValue() ?></div></td>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ListViewValue() ?></div></td>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ListViewValue() ?></div></td>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ListViewValue() ?></div></td>
	</tr>
<?php
	$ref_disciplinechedcodes_minor_delete->Recordset->MoveNext();
}
$ref_disciplinechedcodes_minor_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$ref_disciplinechedcodes_minor_delete->ShowPageFooter();
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
$ref_disciplinechedcodes_minor_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_disciplinechedcodes_minor_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'ref_disciplinechedcodes_minor';

	// Page object name
	var $PageObjName = 'ref_disciplinechedcodes_minor_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_disciplinechedcodes_minor;
		if ($ref_disciplinechedcodes_minor->UseTokenInUrl) $PageUrl .= "t=" . $ref_disciplinechedcodes_minor->TableVar . "&"; // Add page token
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
		global $objForm, $ref_disciplinechedcodes_minor;
		if ($ref_disciplinechedcodes_minor->UseTokenInUrl) {
			if ($objForm)
				return ($ref_disciplinechedcodes_minor->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_disciplinechedcodes_minor->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_disciplinechedcodes_minor_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_disciplinechedcodes_minor)
		if (!isset($GLOBALS["ref_disciplinechedcodes_minor"])) {
			$GLOBALS["ref_disciplinechedcodes_minor"] = new cref_disciplinechedcodes_minor();
			$GLOBALS["Table"] =& $GLOBALS["ref_disciplinechedcodes_minor"];
		}

		// Table object (ref_disciplinechedcodes_major)
		if (!isset($GLOBALS['ref_disciplinechedcodes_major'])) $GLOBALS['ref_disciplinechedcodes_major'] = new cref_disciplinechedcodes_major();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_disciplinechedcodes_minor', TRUE);

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
		global $ref_disciplinechedcodes_minor;

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
			$this->Page_Terminate("ref_disciplinechedcodes_minorlist.php");
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
		global $Language, $ref_disciplinechedcodes_minor;

		// Load key parameters
		$this->RecKeys = $ref_disciplinechedcodes_minor->GetRecordKeys(); // Load record keys
		$sFilter = $ref_disciplinechedcodes_minor->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("ref_disciplinechedcodes_minorlist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in ref_disciplinechedcodes_minor class, ref_disciplinechedcodes_minorinfo.php

		$ref_disciplinechedcodes_minor->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$ref_disciplinechedcodes_minor->CurrentAction = $_POST["a_delete"];
		} else {
			$ref_disciplinechedcodes_minor->CurrentAction = "I"; // Display record
		}
		switch ($ref_disciplinechedcodes_minor->CurrentAction) {
			case "D": // Delete
				$ref_disciplinechedcodes_minor->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($ref_disciplinechedcodes_minor->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $ref_disciplinechedcodes_minor;

		// Call Recordset Selecting event
		$ref_disciplinechedcodes_minor->Recordset_Selecting($ref_disciplinechedcodes_minor->CurrentFilter);

		// Load List page SQL
		$sSql = $ref_disciplinechedcodes_minor->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$ref_disciplinechedcodes_minor->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_disciplinechedcodes_minor;
		$sFilter = $ref_disciplinechedcodes_minor->KeyFilter();

		// Call Row Selecting event
		$ref_disciplinechedcodes_minor->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_disciplinechedcodes_minor->CurrentFilter = $sFilter;
		$sSql = $ref_disciplinechedcodes_minor->SQL();
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
		global $conn, $ref_disciplinechedcodes_minor;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_disciplinechedcodes_minor->Row_Selected($row);
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->setDbValue($rs->fields('disCHED_disciplineSpecific_id'));
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->setDbValue($rs->fields('disCHED_disciplineSpecific_code'));
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->setDbValue($rs->fields('disCHED_disciplineSpecific_name'));
		$ref_disciplinechedcodes_minor->disCHED_discipline_code->setDbValue($rs->fields('disCHED_discipline_code'));
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->setDbValue($rs->fields('disCHED_disciplineSpecific_academicUse'));
		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_nameList->setDbValue($rs->fields('disCHED_disciplineSpecific_nameList'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_disciplinechedcodes_minor;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_disciplinechedcodes_minor->Row_Rendering();

		// Common render codes for all row types
		// disCHED_disciplineSpecific_id
		// disCHED_disciplineSpecific_code
		// disCHED_disciplineSpecific_name
		// disCHED_discipline_code
		// disCHED_disciplineSpecific_academicUse
		// disCHED_disciplineSpecific_nameList

		$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_nameList->CellCssStyle = "white-space: nowrap;";
		if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_VIEW) { // View row

			// disCHED_disciplineSpecific_id
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_code
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ViewValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ViewValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ViewCustomAttributes = "";

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewValue = $ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ViewValue = $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue;
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ViewCustomAttributes = "";

			// disCHED_disciplineSpecific_id
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->TooltipValue = "";

			// disCHED_disciplineSpecific_code
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->TooltipValue = "";

			// disCHED_disciplineSpecific_name
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->TooltipValue = "";

			// disCHED_discipline_code
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_discipline_code->TooltipValue = "";

			// disCHED_disciplineSpecific_academicUse
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->HrefValue = "";
			$ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($ref_disciplinechedcodes_minor->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_disciplinechedcodes_minor->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $ref_disciplinechedcodes_minor;
		$DeleteRows = TRUE;
		$sSql = $ref_disciplinechedcodes_minor->SQL();
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
				$DeleteRows = $ref_disciplinechedcodes_minor->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['disCHED_disciplineSpecific_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($ref_disciplinechedcodes_minor->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($ref_disciplinechedcodes_minor->CancelMessage <> "") {
				$this->setFailureMessage($ref_disciplinechedcodes_minor->CancelMessage);
				$ref_disciplinechedcodes_minor->CancelMessage = "";
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
				$ref_disciplinechedcodes_minor->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_disciplinechedcodes_minor';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $ref_disciplinechedcodes_minor;
		$table = 'ref_disciplinechedcodes_minor';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['disCHED_disciplineSpecific_id'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $ref_disciplinechedcodes_minor->fields) && $ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($ref_disciplinechedcodes_minor->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
