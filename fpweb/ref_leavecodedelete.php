<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_leavecodeinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_leavecode_delete = new cref_leavecode_delete();
$Page =& $ref_leavecode_delete;

// Page init
$ref_leavecode_delete->Page_Init();

// Page main
$ref_leavecode_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_leavecode_delete = new up_Page("ref_leavecode_delete");

// page properties
ref_leavecode_delete.PageID = "delete"; // page ID
ref_leavecode_delete.FormID = "fref_leavecodedelete"; // form ID
var UP_PAGE_ID = ref_leavecode_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
ref_leavecode_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_leavecode_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_leavecode_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_leavecode_delete.ValidateRequired = false; // no JavaScript validation
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
if ($ref_leavecode_delete->Recordset = $ref_leavecode_delete->LoadRecordset())
	$ref_leavecode_deleteTotalRecs = $ref_leavecode_delete->Recordset->RecordCount(); // Get record count
if ($ref_leavecode_deleteTotalRecs <= 0) { // No record found, exit
	if ($ref_leavecode_delete->Recordset)
		$ref_leavecode_delete->Recordset->Close();
	$ref_leavecode_delete->Page_Terminate("ref_leavecodelist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_leavecode->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_leavecode->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_leavecode_delete->ShowPageHeader(); ?>
<?php
$ref_leavecode_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="ref_leavecode">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($ref_leavecode_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $ref_leavecode->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $ref_leavecode->leaveCode_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_leavecode->leaveCode_description->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$ref_leavecode_delete->RecCnt = 0;
$i = 0;
while (!$ref_leavecode_delete->Recordset->EOF) {
	$ref_leavecode_delete->RecCnt++;

	// Set row properties
	$ref_leavecode->ResetAttrs();
	$ref_leavecode->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$ref_leavecode_delete->LoadRowValues($ref_leavecode_delete->Recordset);

	// Render row
	$ref_leavecode_delete->RenderRow();
?>
	<tr<?php echo $ref_leavecode->RowAttributes() ?>>
		<td<?php echo $ref_leavecode->leaveCode_ID->CellAttributes() ?>>
<div<?php echo $ref_leavecode->leaveCode_ID->ViewAttributes() ?>><?php echo $ref_leavecode->leaveCode_ID->ListViewValue() ?></div></td>
		<td<?php echo $ref_leavecode->leaveCode_description->CellAttributes() ?>>
<div<?php echo $ref_leavecode->leaveCode_description->ViewAttributes() ?>><?php echo $ref_leavecode->leaveCode_description->ListViewValue() ?></div></td>
	</tr>
<?php
	$ref_leavecode_delete->Recordset->MoveNext();
}
$ref_leavecode_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$ref_leavecode_delete->ShowPageFooter();
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
$ref_leavecode_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_leavecode_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'ref_leavecode';

	// Page object name
	var $PageObjName = 'ref_leavecode_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_leavecode;
		if ($ref_leavecode->UseTokenInUrl) $PageUrl .= "t=" . $ref_leavecode->TableVar . "&"; // Add page token
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
		global $objForm, $ref_leavecode;
		if ($ref_leavecode->UseTokenInUrl) {
			if ($objForm)
				return ($ref_leavecode->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_leavecode->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_leavecode_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_leavecode)
		if (!isset($GLOBALS["ref_leavecode"])) {
			$GLOBALS["ref_leavecode"] = new cref_leavecode();
			$GLOBALS["Table"] =& $GLOBALS["ref_leavecode"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_leavecode', TRUE);

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
		global $ref_leavecode;

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
			$this->Page_Terminate("ref_leavecodelist.php");
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
		global $Language, $ref_leavecode;

		// Load key parameters
		$this->RecKeys = $ref_leavecode->GetRecordKeys(); // Load record keys
		$sFilter = $ref_leavecode->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("ref_leavecodelist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in ref_leavecode class, ref_leavecodeinfo.php

		$ref_leavecode->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$ref_leavecode->CurrentAction = $_POST["a_delete"];
		} else {
			$ref_leavecode->CurrentAction = "I"; // Display record
		}
		switch ($ref_leavecode->CurrentAction) {
			case "D": // Delete
				$ref_leavecode->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($ref_leavecode->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $ref_leavecode;

		// Call Recordset Selecting event
		$ref_leavecode->Recordset_Selecting($ref_leavecode->CurrentFilter);

		// Load List page SQL
		$sSql = $ref_leavecode->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$ref_leavecode->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_leavecode;
		$sFilter = $ref_leavecode->KeyFilter();

		// Call Row Selecting event
		$ref_leavecode->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_leavecode->CurrentFilter = $sFilter;
		$sSql = $ref_leavecode->SQL();
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
		global $conn, $ref_leavecode;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_leavecode->Row_Selected($row);
		$ref_leavecode->leaveCode_ID->setDbValue($rs->fields('leaveCode_ID'));
		$ref_leavecode->leaveCode_description->setDbValue($rs->fields('leaveCode_description'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_leavecode;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_leavecode->Row_Rendering();

		// Common render codes for all row types
		// leaveCode_ID
		// leaveCode_description

		if ($ref_leavecode->RowType == UP_ROWTYPE_VIEW) { // View row

			// leaveCode_ID
			$ref_leavecode->leaveCode_ID->ViewValue = $ref_leavecode->leaveCode_ID->CurrentValue;
			$ref_leavecode->leaveCode_ID->ViewCustomAttributes = "";

			// leaveCode_description
			$ref_leavecode->leaveCode_description->ViewValue = $ref_leavecode->leaveCode_description->CurrentValue;
			$ref_leavecode->leaveCode_description->ViewCustomAttributes = "";

			// leaveCode_ID
			$ref_leavecode->leaveCode_ID->LinkCustomAttributes = "";
			$ref_leavecode->leaveCode_ID->HrefValue = "";
			$ref_leavecode->leaveCode_ID->TooltipValue = "";

			// leaveCode_description
			$ref_leavecode->leaveCode_description->LinkCustomAttributes = "";
			$ref_leavecode->leaveCode_description->HrefValue = "";
			$ref_leavecode->leaveCode_description->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($ref_leavecode->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_leavecode->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $ref_leavecode;
		$DeleteRows = TRUE;
		$sSql = $ref_leavecode->SQL();
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
				$DeleteRows = $ref_leavecode->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['leaveCode_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($ref_leavecode->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($ref_leavecode->CancelMessage <> "") {
				$this->setFailureMessage($ref_leavecode->CancelMessage);
				$ref_leavecode->CancelMessage = "";
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
				$ref_leavecode->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_leavecode';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $ref_leavecode;
		$table = 'ref_leavecode';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['leaveCode_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $ref_leavecode->fields) && $ref_leavecode->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_leavecode->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($ref_leavecode->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
