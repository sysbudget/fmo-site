<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_salaryscaleinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_salaryscale_delete = new cref_salaryscale_delete();
$Page =& $ref_salaryscale_delete;

// Page init
$ref_salaryscale_delete->Page_Init();

// Page main
$ref_salaryscale_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_salaryscale_delete = new up_Page("ref_salaryscale_delete");

// page properties
ref_salaryscale_delete.PageID = "delete"; // page ID
ref_salaryscale_delete.FormID = "fref_salaryscaledelete"; // form ID
var UP_PAGE_ID = ref_salaryscale_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
ref_salaryscale_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_salaryscale_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_salaryscale_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_salaryscale_delete.ValidateRequired = false; // no JavaScript validation
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
if ($ref_salaryscale_delete->Recordset = $ref_salaryscale_delete->LoadRecordset())
	$ref_salaryscale_deleteTotalRecs = $ref_salaryscale_delete->Recordset->RecordCount(); // Get record count
if ($ref_salaryscale_deleteTotalRecs <= 0) { // No record found, exit
	if ($ref_salaryscale_delete->Recordset)
		$ref_salaryscale_delete->Recordset->Close();
	$ref_salaryscale_delete->Page_Terminate("ref_salaryscalelist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_salaryscale->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_salaryscale->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_salaryscale_delete->ShowPageHeader(); ?>
<?php
$ref_salaryscale_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="ref_salaryscale">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($ref_salaryscale_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $ref_salaryscale->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $ref_salaryscale->salaryScale_code->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_salaryscale->salaryScale_sg->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_salaryscale->salaryScale_step->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_salaryscale->salaryScale_monthlyRate->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_salaryscale->salaryScale_status->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$ref_salaryscale_delete->RecCnt = 0;
$i = 0;
while (!$ref_salaryscale_delete->Recordset->EOF) {
	$ref_salaryscale_delete->RecCnt++;

	// Set row properties
	$ref_salaryscale->ResetAttrs();
	$ref_salaryscale->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$ref_salaryscale_delete->LoadRowValues($ref_salaryscale_delete->Recordset);

	// Render row
	$ref_salaryscale_delete->RenderRow();
?>
	<tr<?php echo $ref_salaryscale->RowAttributes() ?>>
		<td<?php echo $ref_salaryscale->salaryScale_code->CellAttributes() ?>>
<div<?php echo $ref_salaryscale->salaryScale_code->ViewAttributes() ?>><?php echo $ref_salaryscale->salaryScale_code->ListViewValue() ?></div></td>
		<td<?php echo $ref_salaryscale->salaryScale_sg->CellAttributes() ?>>
<div<?php echo $ref_salaryscale->salaryScale_sg->ViewAttributes() ?>><?php echo $ref_salaryscale->salaryScale_sg->ListViewValue() ?></div></td>
		<td<?php echo $ref_salaryscale->salaryScale_step->CellAttributes() ?>>
<div<?php echo $ref_salaryscale->salaryScale_step->ViewAttributes() ?>><?php echo $ref_salaryscale->salaryScale_step->ListViewValue() ?></div></td>
		<td<?php echo $ref_salaryscale->salaryScale_monthlyRate->CellAttributes() ?>>
<div<?php echo $ref_salaryscale->salaryScale_monthlyRate->ViewAttributes() ?>><?php echo $ref_salaryscale->salaryScale_monthlyRate->ListViewValue() ?></div></td>
		<td<?php echo $ref_salaryscale->salaryScale_status->CellAttributes() ?>>
<div<?php echo $ref_salaryscale->salaryScale_status->ViewAttributes() ?>><?php echo $ref_salaryscale->salaryScale_status->ListViewValue() ?></div></td>
	</tr>
<?php
	$ref_salaryscale_delete->Recordset->MoveNext();
}
$ref_salaryscale_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$ref_salaryscale_delete->ShowPageFooter();
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
$ref_salaryscale_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_salaryscale_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'ref_salaryscale';

	// Page object name
	var $PageObjName = 'ref_salaryscale_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_salaryscale;
		if ($ref_salaryscale->UseTokenInUrl) $PageUrl .= "t=" . $ref_salaryscale->TableVar . "&"; // Add page token
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
		global $objForm, $ref_salaryscale;
		if ($ref_salaryscale->UseTokenInUrl) {
			if ($objForm)
				return ($ref_salaryscale->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_salaryscale->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_salaryscale_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_salaryscale)
		if (!isset($GLOBALS["ref_salaryscale"])) {
			$GLOBALS["ref_salaryscale"] = new cref_salaryscale();
			$GLOBALS["Table"] =& $GLOBALS["ref_salaryscale"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_salaryscale', TRUE);

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
		global $ref_salaryscale;

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
			$this->Page_Terminate("ref_salaryscalelist.php");
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
		global $Language, $ref_salaryscale;

		// Load key parameters
		$this->RecKeys = $ref_salaryscale->GetRecordKeys(); // Load record keys
		$sFilter = $ref_salaryscale->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("ref_salaryscalelist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in ref_salaryscale class, ref_salaryscaleinfo.php

		$ref_salaryscale->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$ref_salaryscale->CurrentAction = $_POST["a_delete"];
		} else {
			$ref_salaryscale->CurrentAction = "I"; // Display record
		}
		switch ($ref_salaryscale->CurrentAction) {
			case "D": // Delete
				$ref_salaryscale->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($ref_salaryscale->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $ref_salaryscale;

		// Call Recordset Selecting event
		$ref_salaryscale->Recordset_Selecting($ref_salaryscale->CurrentFilter);

		// Load List page SQL
		$sSql = $ref_salaryscale->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$ref_salaryscale->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_salaryscale;
		$sFilter = $ref_salaryscale->KeyFilter();

		// Call Row Selecting event
		$ref_salaryscale->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_salaryscale->CurrentFilter = $sFilter;
		$sSql = $ref_salaryscale->SQL();
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
		global $conn, $ref_salaryscale;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_salaryscale->Row_Selected($row);
		$ref_salaryscale->salaryScale_ID->setDbValue($rs->fields('salaryScale_ID'));
		$ref_salaryscale->salaryScale_code->setDbValue($rs->fields('salaryScale_code'));
		$ref_salaryscale->salaryScale_sg->setDbValue($rs->fields('salaryScale_sg'));
		$ref_salaryscale->salaryScale_step->setDbValue($rs->fields('salaryScale_step'));
		$ref_salaryscale->salaryScale_monthlyRate->setDbValue($rs->fields('salaryScale_monthlyRate'));
		$ref_salaryscale->salaryScale_annualSalary->setDbValue($rs->fields('salaryScale_annualSalary'));
		$ref_salaryscale->salaryScale_status->setDbValue($rs->fields('salaryScale_status'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_salaryscale;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_salaryscale->Row_Rendering();

		// Common render codes for all row types
		// salaryScale_ID

		$ref_salaryscale->salaryScale_ID->CellCssStyle = "white-space: nowrap;";

		// salaryScale_code
		$ref_salaryscale->salaryScale_code->CellCssStyle = "white-space: nowrap;";

		// salaryScale_sg
		$ref_salaryscale->salaryScale_sg->CellCssStyle = "white-space: nowrap;";

		// salaryScale_step
		$ref_salaryscale->salaryScale_step->CellCssStyle = "white-space: nowrap;";

		// salaryScale_monthlyRate
		$ref_salaryscale->salaryScale_monthlyRate->CellCssStyle = "white-space: nowrap;";

		// salaryScale_annualSalary
		$ref_salaryscale->salaryScale_annualSalary->CellCssStyle = "white-space: nowrap;";

		// salaryScale_status
		$ref_salaryscale->salaryScale_status->CellCssStyle = "white-space: nowrap;";
		if ($ref_salaryscale->RowType == UP_ROWTYPE_VIEW) { // View row

			// salaryScale_code
			$ref_salaryscale->salaryScale_code->ViewValue = $ref_salaryscale->salaryScale_code->CurrentValue;
			$ref_salaryscale->salaryScale_code->ViewCustomAttributes = "";

			// salaryScale_sg
			$ref_salaryscale->salaryScale_sg->ViewValue = $ref_salaryscale->salaryScale_sg->CurrentValue;
			$ref_salaryscale->salaryScale_sg->ViewCustomAttributes = "";

			// salaryScale_step
			$ref_salaryscale->salaryScale_step->ViewValue = $ref_salaryscale->salaryScale_step->CurrentValue;
			$ref_salaryscale->salaryScale_step->ViewCustomAttributes = "";

			// salaryScale_monthlyRate
			$ref_salaryscale->salaryScale_monthlyRate->ViewValue = $ref_salaryscale->salaryScale_monthlyRate->CurrentValue;
			$ref_salaryscale->salaryScale_monthlyRate->ViewCustomAttributes = "";

			// salaryScale_status
			if (strval($ref_salaryscale->salaryScale_status->CurrentValue) <> "") {
				switch ($ref_salaryscale->salaryScale_status->CurrentValue) {
					case "Y":
						$ref_salaryscale->salaryScale_status->ViewValue = $ref_salaryscale->salaryScale_status->FldTagCaption(1) <> "" ? $ref_salaryscale->salaryScale_status->FldTagCaption(1) : $ref_salaryscale->salaryScale_status->CurrentValue;
						break;
					case "N":
						$ref_salaryscale->salaryScale_status->ViewValue = $ref_salaryscale->salaryScale_status->FldTagCaption(2) <> "" ? $ref_salaryscale->salaryScale_status->FldTagCaption(2) : $ref_salaryscale->salaryScale_status->CurrentValue;
						break;
					default:
						$ref_salaryscale->salaryScale_status->ViewValue = $ref_salaryscale->salaryScale_status->CurrentValue;
				}
			} else {
				$ref_salaryscale->salaryScale_status->ViewValue = NULL;
			}
			$ref_salaryscale->salaryScale_status->ViewCustomAttributes = "";

			// salaryScale_code
			$ref_salaryscale->salaryScale_code->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_code->HrefValue = "";
			$ref_salaryscale->salaryScale_code->TooltipValue = "";

			// salaryScale_sg
			$ref_salaryscale->salaryScale_sg->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_sg->HrefValue = "";
			$ref_salaryscale->salaryScale_sg->TooltipValue = "";

			// salaryScale_step
			$ref_salaryscale->salaryScale_step->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_step->HrefValue = "";
			$ref_salaryscale->salaryScale_step->TooltipValue = "";

			// salaryScale_monthlyRate
			$ref_salaryscale->salaryScale_monthlyRate->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_monthlyRate->HrefValue = "";
			$ref_salaryscale->salaryScale_monthlyRate->TooltipValue = "";

			// salaryScale_status
			$ref_salaryscale->salaryScale_status->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_status->HrefValue = "";
			$ref_salaryscale->salaryScale_status->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($ref_salaryscale->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_salaryscale->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $ref_salaryscale;
		$DeleteRows = TRUE;
		$sSql = $ref_salaryscale->SQL();
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
				$DeleteRows = $ref_salaryscale->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['salaryScale_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($ref_salaryscale->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($ref_salaryscale->CancelMessage <> "") {
				$this->setFailureMessage($ref_salaryscale->CancelMessage);
				$ref_salaryscale->CancelMessage = "";
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
				$ref_salaryscale->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_salaryscale';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $ref_salaryscale;
		$table = 'ref_salaryscale';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['salaryScale_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $ref_salaryscale->fields) && $ref_salaryscale->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_salaryscale->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($ref_salaryscale->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
