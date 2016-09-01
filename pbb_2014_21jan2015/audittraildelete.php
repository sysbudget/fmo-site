<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "audittrailinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$audittrail_delete = new caudittrail_delete();
$Page =& $audittrail_delete;

// Page init
$audittrail_delete->Page_Init();

// Page main
$audittrail_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var audittrail_delete = new up_Page("audittrail_delete");

// page properties
audittrail_delete.PageID = "delete"; // page ID
audittrail_delete.FormID = "faudittraildelete"; // form ID
var UP_PAGE_ID = audittrail_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
audittrail_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
audittrail_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
audittrail_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
audittrail_delete.ValidateRequired = false; // no JavaScript validation
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
if ($audittrail_delete->Recordset = $audittrail_delete->LoadRecordset())
	$audittrail_deleteTotalRecs = $audittrail_delete->Recordset->RecordCount(); // Get record count
if ($audittrail_deleteTotalRecs <= 0) { // No record found, exit
	if ($audittrail_delete->Recordset)
		$audittrail_delete->Recordset->Close();
	$audittrail_delete->Page_Terminate("audittraillist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $audittrail->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $audittrail->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $audittrail_delete->ShowPageHeader(); ?>
<?php
$audittrail_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="audittrail">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($audittrail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $audittrail->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $audittrail->id->FldCaption() ?></td>
		<td valign="top"><?php echo $audittrail->datetime->FldCaption() ?></td>
		<td valign="top"><?php echo $audittrail->script->FldCaption() ?></td>
		<td valign="top"><?php echo $audittrail->user->FldCaption() ?></td>
		<td valign="top"><?php echo $audittrail->action->FldCaption() ?></td>
		<td valign="top"><?php echo $audittrail->ztable->FldCaption() ?></td>
		<td valign="top"><?php echo $audittrail->zfield->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$audittrail_delete->RecCnt = 0;
$i = 0;
while (!$audittrail_delete->Recordset->EOF) {
	$audittrail_delete->RecCnt++;

	// Set row properties
	$audittrail->ResetAttrs();
	$audittrail->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$audittrail_delete->LoadRowValues($audittrail_delete->Recordset);

	// Render row
	$audittrail_delete->RenderRow();
?>
	<tr<?php echo $audittrail->RowAttributes() ?>>
		<td<?php echo $audittrail->id->CellAttributes() ?>>
<div<?php echo $audittrail->id->ViewAttributes() ?>><?php echo $audittrail->id->ListViewValue() ?></div></td>
		<td<?php echo $audittrail->datetime->CellAttributes() ?>>
<div<?php echo $audittrail->datetime->ViewAttributes() ?>><?php echo $audittrail->datetime->ListViewValue() ?></div></td>
		<td<?php echo $audittrail->script->CellAttributes() ?>>
<div<?php echo $audittrail->script->ViewAttributes() ?>><?php echo $audittrail->script->ListViewValue() ?></div></td>
		<td<?php echo $audittrail->user->CellAttributes() ?>>
<div<?php echo $audittrail->user->ViewAttributes() ?>><?php echo $audittrail->user->ListViewValue() ?></div></td>
		<td<?php echo $audittrail->action->CellAttributes() ?>>
<div<?php echo $audittrail->action->ViewAttributes() ?>><?php echo $audittrail->action->ListViewValue() ?></div></td>
		<td<?php echo $audittrail->ztable->CellAttributes() ?>>
<div<?php echo $audittrail->ztable->ViewAttributes() ?>><?php echo $audittrail->ztable->ListViewValue() ?></div></td>
		<td<?php echo $audittrail->zfield->CellAttributes() ?>>
<div<?php echo $audittrail->zfield->ViewAttributes() ?>><?php echo $audittrail->zfield->ListViewValue() ?></div></td>
	</tr>
<?php
	$audittrail_delete->Recordset->MoveNext();
}
$audittrail_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$audittrail_delete->ShowPageFooter();
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
$audittrail_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class caudittrail_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'audittrail';

	// Page object name
	var $PageObjName = 'audittrail_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $audittrail;
		if ($audittrail->UseTokenInUrl) $PageUrl .= "t=" . $audittrail->TableVar . "&"; // Add page token
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
		global $objForm, $audittrail;
		if ($audittrail->UseTokenInUrl) {
			if ($objForm)
				return ($audittrail->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($audittrail->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function caudittrail_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (audittrail)
		if (!isset($GLOBALS["audittrail"])) {
			$GLOBALS["audittrail"] = new caudittrail();
			$GLOBALS["Table"] =& $GLOBALS["audittrail"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'audittrail', TRUE);

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
		global $audittrail;

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
			$this->Page_Terminate("audittraillist.php");
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
		global $Language, $audittrail;

		// Load key parameters
		$this->RecKeys = $audittrail->GetRecordKeys(); // Load record keys
		$sFilter = $audittrail->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("audittraillist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in audittrail class, audittrailinfo.php

		$audittrail->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$audittrail->CurrentAction = $_POST["a_delete"];
		} else {
			$audittrail->CurrentAction = "I"; // Display record
		}
		switch ($audittrail->CurrentAction) {
			case "D": // Delete
				$audittrail->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($audittrail->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $audittrail;

		// Call Recordset Selecting event
		$audittrail->Recordset_Selecting($audittrail->CurrentFilter);

		// Load List page SQL
		$sSql = $audittrail->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$audittrail->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $audittrail;
		$sFilter = $audittrail->KeyFilter();

		// Call Row Selecting event
		$audittrail->Row_Selecting($sFilter);

		// Load SQL based on filter
		$audittrail->CurrentFilter = $sFilter;
		$sSql = $audittrail->SQL();
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
		global $conn, $audittrail;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$audittrail->Row_Selected($row);
		$audittrail->id->setDbValue($rs->fields('id'));
		$audittrail->datetime->setDbValue($rs->fields('datetime'));
		$audittrail->script->setDbValue($rs->fields('script'));
		$audittrail->user->setDbValue($rs->fields('user'));
		$audittrail->action->setDbValue($rs->fields('action'));
		$audittrail->ztable->setDbValue($rs->fields('table'));
		$audittrail->zfield->setDbValue($rs->fields('field'));
		$audittrail->keyvalue->setDbValue($rs->fields('keyvalue'));
		$audittrail->oldvalue->setDbValue($rs->fields('oldvalue'));
		$audittrail->newvalue->setDbValue($rs->fields('newvalue'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $audittrail;

		// Initialize URLs
		// Call Row_Rendering event

		$audittrail->Row_Rendering();

		// Common render codes for all row types
		// id
		// datetime
		// script
		// user
		// action
		// table
		// field
		// keyvalue
		// oldvalue
		// newvalue

		if ($audittrail->RowType == UP_ROWTYPE_VIEW) { // View row

			// id
			$audittrail->id->ViewValue = $audittrail->id->CurrentValue;
			$audittrail->id->ViewCustomAttributes = "";

			// datetime
			$audittrail->datetime->ViewValue = $audittrail->datetime->CurrentValue;
			$audittrail->datetime->ViewValue = up_FormatDateTime($audittrail->datetime->ViewValue, 6);
			$audittrail->datetime->ViewCustomAttributes = "";

			// script
			$audittrail->script->ViewValue = $audittrail->script->CurrentValue;
			$audittrail->script->ViewCustomAttributes = "";

			// user
			$audittrail->user->ViewValue = $audittrail->user->CurrentValue;
			$audittrail->user->ViewCustomAttributes = "";

			// action
			$audittrail->action->ViewValue = $audittrail->action->CurrentValue;
			$audittrail->action->ViewCustomAttributes = "";

			// table
			$audittrail->ztable->ViewValue = $audittrail->ztable->CurrentValue;
			$audittrail->ztable->ViewCustomAttributes = "";

			// field
			$audittrail->zfield->ViewValue = $audittrail->zfield->CurrentValue;
			$audittrail->zfield->ViewCustomAttributes = "";

			// id
			$audittrail->id->LinkCustomAttributes = "";
			$audittrail->id->HrefValue = "";
			$audittrail->id->TooltipValue = "";

			// datetime
			$audittrail->datetime->LinkCustomAttributes = "";
			$audittrail->datetime->HrefValue = "";
			$audittrail->datetime->TooltipValue = "";

			// script
			$audittrail->script->LinkCustomAttributes = "";
			$audittrail->script->HrefValue = "";
			$audittrail->script->TooltipValue = "";

			// user
			$audittrail->user->LinkCustomAttributes = "";
			$audittrail->user->HrefValue = "";
			$audittrail->user->TooltipValue = "";

			// action
			$audittrail->action->LinkCustomAttributes = "";
			$audittrail->action->HrefValue = "";
			$audittrail->action->TooltipValue = "";

			// table
			$audittrail->ztable->LinkCustomAttributes = "";
			$audittrail->ztable->HrefValue = "";
			$audittrail->ztable->TooltipValue = "";

			// field
			$audittrail->zfield->LinkCustomAttributes = "";
			$audittrail->zfield->HrefValue = "";
			$audittrail->zfield->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($audittrail->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$audittrail->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $audittrail;
		$DeleteRows = TRUE;
		$sSql = $audittrail->SQL();
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
				$DeleteRows = $audittrail->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($audittrail->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($audittrail->CancelMessage <> "") {
				$this->setFailureMessage($audittrail->CancelMessage);
				$audittrail->CancelMessage = "";
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
				$audittrail->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'audittrail';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $audittrail;
		$table = 'audittrail';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['id'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $audittrail->fields) && $audittrail->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($audittrail->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($audittrail->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
