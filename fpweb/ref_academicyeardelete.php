<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_academicyearinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_academicyear_delete = new cref_academicyear_delete();
$Page =& $ref_academicyear_delete;

// Page init
$ref_academicyear_delete->Page_Init();

// Page main
$ref_academicyear_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ref_academicyear_delete = new up_Page("ref_academicyear_delete");

// page properties
ref_academicyear_delete.PageID = "delete"; // page ID
ref_academicyear_delete.FormID = "fref_academicyeardelete"; // form ID
var UP_PAGE_ID = ref_academicyear_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
ref_academicyear_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_academicyear_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_academicyear_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_academicyear_delete.ValidateRequired = false; // no JavaScript validation
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
if ($ref_academicyear_delete->Recordset = $ref_academicyear_delete->LoadRecordset())
	$ref_academicyear_deleteTotalRecs = $ref_academicyear_delete->Recordset->RecordCount(); // Get record count
if ($ref_academicyear_deleteTotalRecs <= 0) { // No record found, exit
	if ($ref_academicyear_delete->Recordset)
		$ref_academicyear_delete->Recordset->Close();
	$ref_academicyear_delete->Page_Terminate("ref_academicyearlist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_academicyear->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $ref_academicyear->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $ref_academicyear_delete->ShowPageHeader(); ?>
<?php
$ref_academicyear_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="ref_academicyear">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($ref_academicyear_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $ref_academicyear->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $ref_academicyear->academicYear_ay->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_academicyear->academicYear_sem->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_academicyear->academicYear_cutOffDate->FldCaption() ?></td>
		<td valign="top"><?php echo $ref_academicyear->academicYear_status->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$ref_academicyear_delete->RecCnt = 0;
$i = 0;
while (!$ref_academicyear_delete->Recordset->EOF) {
	$ref_academicyear_delete->RecCnt++;

	// Set row properties
	$ref_academicyear->ResetAttrs();
	$ref_academicyear->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$ref_academicyear_delete->LoadRowValues($ref_academicyear_delete->Recordset);

	// Render row
	$ref_academicyear_delete->RenderRow();
?>
	<tr<?php echo $ref_academicyear->RowAttributes() ?>>
		<td<?php echo $ref_academicyear->academicYear_ay->CellAttributes() ?>>
<div<?php echo $ref_academicyear->academicYear_ay->ViewAttributes() ?>><?php echo $ref_academicyear->academicYear_ay->ListViewValue() ?></div></td>
		<td<?php echo $ref_academicyear->academicYear_sem->CellAttributes() ?>>
<div<?php echo $ref_academicyear->academicYear_sem->ViewAttributes() ?>><?php echo $ref_academicyear->academicYear_sem->ListViewValue() ?></div></td>
		<td<?php echo $ref_academicyear->academicYear_cutOffDate->CellAttributes() ?>>
<div<?php echo $ref_academicyear->academicYear_cutOffDate->ViewAttributes() ?>><?php echo $ref_academicyear->academicYear_cutOffDate->ListViewValue() ?></div></td>
		<td<?php echo $ref_academicyear->academicYear_status->CellAttributes() ?>>
<div<?php echo $ref_academicyear->academicYear_status->ViewAttributes() ?>><?php echo $ref_academicyear->academicYear_status->ListViewValue() ?></div></td>
	</tr>
<?php
	$ref_academicyear_delete->Recordset->MoveNext();
}
$ref_academicyear_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$ref_academicyear_delete->ShowPageFooter();
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
$ref_academicyear_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_academicyear_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'ref_academicyear';

	// Page object name
	var $PageObjName = 'ref_academicyear_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_academicyear;
		if ($ref_academicyear->UseTokenInUrl) $PageUrl .= "t=" . $ref_academicyear->TableVar . "&"; // Add page token
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
		global $objForm, $ref_academicyear;
		if ($ref_academicyear->UseTokenInUrl) {
			if ($objForm)
				return ($ref_academicyear->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_academicyear->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_academicyear_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_academicyear)
		if (!isset($GLOBALS["ref_academicyear"])) {
			$GLOBALS["ref_academicyear"] = new cref_academicyear();
			$GLOBALS["Table"] =& $GLOBALS["ref_academicyear"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_academicyear', TRUE);

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
		global $ref_academicyear;

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
			$this->Page_Terminate("ref_academicyearlist.php");
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
		global $Language, $ref_academicyear;

		// Load key parameters
		$this->RecKeys = $ref_academicyear->GetRecordKeys(); // Load record keys
		$sFilter = $ref_academicyear->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("ref_academicyearlist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in ref_academicyear class, ref_academicyearinfo.php

		$ref_academicyear->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$ref_academicyear->CurrentAction = $_POST["a_delete"];
		} else {
			$ref_academicyear->CurrentAction = "I"; // Display record
		}
		switch ($ref_academicyear->CurrentAction) {
			case "D": // Delete
				$ref_academicyear->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($ref_academicyear->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $ref_academicyear;

		// Call Recordset Selecting event
		$ref_academicyear->Recordset_Selecting($ref_academicyear->CurrentFilter);

		// Load List page SQL
		$sSql = $ref_academicyear->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$ref_academicyear->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_academicyear;
		$sFilter = $ref_academicyear->KeyFilter();

		// Call Row Selecting event
		$ref_academicyear->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_academicyear->CurrentFilter = $sFilter;
		$sSql = $ref_academicyear->SQL();
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
		global $conn, $ref_academicyear;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_academicyear->Row_Selected($row);
		$ref_academicyear->academicYear_ID->setDbValue($rs->fields('academicYear_ID'));
		$ref_academicyear->academicYear_ay->setDbValue($rs->fields('academicYear_ay'));
		$ref_academicyear->academicYear_sem->setDbValue($rs->fields('academicYear_sem'));
		$ref_academicyear->academicYear_cutOffDate->setDbValue($rs->fields('academicYear_cutOffDate'));
		$ref_academicyear->academicYear_status->setDbValue($rs->fields('academicYear_status'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_academicyear;

		// Initialize URLs
		// Call Row_Rendering event

		$ref_academicyear->Row_Rendering();

		// Common render codes for all row types
		// academicYear_ID

		$ref_academicyear->academicYear_ID->CellCssStyle = "white-space: nowrap;";

		// academicYear_ay
		$ref_academicyear->academicYear_ay->CellCssStyle = "white-space: nowrap;";

		// academicYear_sem
		$ref_academicyear->academicYear_sem->CellCssStyle = "white-space: nowrap;";

		// academicYear_cutOffDate
		$ref_academicyear->academicYear_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// academicYear_status
		$ref_academicyear->academicYear_status->CellCssStyle = "white-space: nowrap;";
		if ($ref_academicyear->RowType == UP_ROWTYPE_VIEW) { // View row

			// academicYear_ay
			$ref_academicyear->academicYear_ay->ViewValue = $ref_academicyear->academicYear_ay->CurrentValue;
			$ref_academicyear->academicYear_ay->ViewCustomAttributes = "";

			// academicYear_sem
			$ref_academicyear->academicYear_sem->ViewValue = $ref_academicyear->academicYear_sem->CurrentValue;
			$ref_academicyear->academicYear_sem->ViewCustomAttributes = "";

			// academicYear_cutOffDate
			$ref_academicyear->academicYear_cutOffDate->ViewValue = $ref_academicyear->academicYear_cutOffDate->CurrentValue;
			$ref_academicyear->academicYear_cutOffDate->ViewValue = up_FormatDateTime($ref_academicyear->academicYear_cutOffDate->ViewValue, 6);
			$ref_academicyear->academicYear_cutOffDate->ViewCustomAttributes = "";

			// academicYear_status
			if (strval($ref_academicyear->academicYear_status->CurrentValue) <> "") {
				switch ($ref_academicyear->academicYear_status->CurrentValue) {
					case "1":
						$ref_academicyear->academicYear_status->ViewValue = $ref_academicyear->academicYear_status->FldTagCaption(1) <> "" ? $ref_academicyear->academicYear_status->FldTagCaption(1) : $ref_academicyear->academicYear_status->CurrentValue;
						break;
					case "2":
						$ref_academicyear->academicYear_status->ViewValue = $ref_academicyear->academicYear_status->FldTagCaption(2) <> "" ? $ref_academicyear->academicYear_status->FldTagCaption(2) : $ref_academicyear->academicYear_status->CurrentValue;
						break;
					default:
						$ref_academicyear->academicYear_status->ViewValue = $ref_academicyear->academicYear_status->CurrentValue;
				}
			} else {
				$ref_academicyear->academicYear_status->ViewValue = NULL;
			}
			$ref_academicyear->academicYear_status->ViewCustomAttributes = "";

			// academicYear_ay
			$ref_academicyear->academicYear_ay->LinkCustomAttributes = "";
			$ref_academicyear->academicYear_ay->HrefValue = "";
			$ref_academicyear->academicYear_ay->TooltipValue = "";

			// academicYear_sem
			$ref_academicyear->academicYear_sem->LinkCustomAttributes = "";
			$ref_academicyear->academicYear_sem->HrefValue = "";
			$ref_academicyear->academicYear_sem->TooltipValue = "";

			// academicYear_cutOffDate
			$ref_academicyear->academicYear_cutOffDate->LinkCustomAttributes = "";
			$ref_academicyear->academicYear_cutOffDate->HrefValue = "";
			$ref_academicyear->academicYear_cutOffDate->TooltipValue = "";

			// academicYear_status
			$ref_academicyear->academicYear_status->LinkCustomAttributes = "";
			$ref_academicyear->academicYear_status->HrefValue = "";
			$ref_academicyear->academicYear_status->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($ref_academicyear->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_academicyear->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $ref_academicyear;
		$DeleteRows = TRUE;
		$sSql = $ref_academicyear->SQL();
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
				$DeleteRows = $ref_academicyear->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['academicYear_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($ref_academicyear->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($ref_academicyear->CancelMessage <> "") {
				$this->setFailureMessage($ref_academicyear->CancelMessage);
				$ref_academicyear->CancelMessage = "";
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
				$ref_academicyear->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'ref_academicyear';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $ref_academicyear;
		$table = 'ref_academicyear';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['academicYear_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $ref_academicyear->fields) && $ref_academicyear->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($ref_academicyear->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($ref_academicyear->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
