<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "tbl_collectionperiodinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_collectionperiod_delete = new ctbl_collectionperiod_delete();
$Page =& $tbl_collectionperiod_delete;

// Page init
$tbl_collectionperiod_delete->Page_Init();

// Page main
$tbl_collectionperiod_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_collectionperiod_delete = new up_Page("tbl_collectionperiod_delete");

// page properties
tbl_collectionperiod_delete.PageID = "delete"; // page ID
tbl_collectionperiod_delete.FormID = "ftbl_collectionperioddelete"; // form ID
var UP_PAGE_ID = tbl_collectionperiod_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_collectionperiod_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_collectionperiod_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_collectionperiod_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_collectionperiod_delete.ValidateRequired = false; // no JavaScript validation
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
if ($tbl_collectionperiod_delete->Recordset = $tbl_collectionperiod_delete->LoadRecordset())
	$tbl_collectionperiod_deleteTotalRecs = $tbl_collectionperiod_delete->Recordset->RecordCount(); // Get record count
if ($tbl_collectionperiod_deleteTotalRecs <= 0) { // No record found, exit
	if ($tbl_collectionperiod_delete->Recordset)
		$tbl_collectionperiod_delete->Recordset->Close();
	$tbl_collectionperiod_delete->Page_Terminate("tbl_collectionperiodlist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_collectionperiod->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_collectionperiod->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_collectionperiod_delete->ShowPageHeader(); ?>
<?php
$tbl_collectionperiod_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="tbl_collectionperiod">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($tbl_collectionperiod_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $tbl_collectionperiod->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $tbl_collectionperiod->id_cu->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_collectionperiod->cu_name->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_collectionperiod->collectionPeriod_status->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_collectionperiod->remarks_cutOffDate->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$tbl_collectionperiod_delete->RecCnt = 0;
$i = 0;
while (!$tbl_collectionperiod_delete->Recordset->EOF) {
	$tbl_collectionperiod_delete->RecCnt++;

	// Set row properties
	$tbl_collectionperiod->ResetAttrs();
	$tbl_collectionperiod->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$tbl_collectionperiod_delete->LoadRowValues($tbl_collectionperiod_delete->Recordset);

	// Render row
	$tbl_collectionperiod_delete->RenderRow();
?>
	<tr<?php echo $tbl_collectionperiod->RowAttributes() ?>>
		<td<?php echo $tbl_collectionperiod->id_cu->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->id_cu->ViewAttributes() ?>><?php echo $tbl_collectionperiod->id_cu->ListViewValue() ?></div></td>
		<td<?php echo $tbl_collectionperiod->cu_name->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->cu_name->ViewAttributes() ?>><?php echo $tbl_collectionperiod->cu_name->ListViewValue() ?></div></td>
		<td<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->ListViewValue() ?></div></td>
		<td<?php echo $tbl_collectionperiod->collectionPeriod_status->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->collectionPeriod_status->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_status->ListViewValue() ?></div></td>
		<td<?php echo $tbl_collectionperiod->remarks_cutOffDate->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->remarks_cutOffDate->ViewAttributes() ?>><?php echo $tbl_collectionperiod->remarks_cutOffDate->ListViewValue() ?></div></td>
	</tr>
<?php
	$tbl_collectionperiod_delete->Recordset->MoveNext();
}
$tbl_collectionperiod_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$tbl_collectionperiod_delete->ShowPageFooter();
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
$tbl_collectionperiod_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_collectionperiod_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'tbl_collectionperiod';

	// Page object name
	var $PageObjName = 'tbl_collectionperiod_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_collectionperiod;
		if ($tbl_collectionperiod->UseTokenInUrl) $PageUrl .= "t=" . $tbl_collectionperiod->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_collectionperiod;
		if ($tbl_collectionperiod->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_collectionperiod->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_collectionperiod->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_collectionperiod_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_collectionperiod)
		if (!isset($GLOBALS["tbl_collectionperiod"])) {
			$GLOBALS["tbl_collectionperiod"] = new ctbl_collectionperiod();
			$GLOBALS["Table"] =& $GLOBALS["tbl_collectionperiod"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_collectionperiod', TRUE);

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
		global $tbl_collectionperiod;

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
			$this->Page_Terminate("tbl_collectionperiodlist.php");
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
		global $Language, $tbl_collectionperiod;

		// Load key parameters
		$this->RecKeys = $tbl_collectionperiod->GetRecordKeys(); // Load record keys
		$sFilter = $tbl_collectionperiod->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("tbl_collectionperiodlist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in tbl_collectionperiod class, tbl_collectionperiodinfo.php

		$tbl_collectionperiod->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$tbl_collectionperiod->CurrentAction = $_POST["a_delete"];
		} else {
			$tbl_collectionperiod->CurrentAction = "I"; // Display record
		}
		switch ($tbl_collectionperiod->CurrentAction) {
			case "D": // Delete
				$tbl_collectionperiod->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($tbl_collectionperiod->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_collectionperiod;

		// Call Recordset Selecting event
		$tbl_collectionperiod->Recordset_Selecting($tbl_collectionperiod->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_collectionperiod->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_collectionperiod->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_collectionperiod;
		$sFilter = $tbl_collectionperiod->KeyFilter();

		// Call Row Selecting event
		$tbl_collectionperiod->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_collectionperiod->CurrentFilter = $sFilter;
		$sSql = $tbl_collectionperiod->SQL();
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
		global $conn, $tbl_collectionperiod;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_collectionperiod->Row_Selected($row);
		$tbl_collectionperiod->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$tbl_collectionperiod->id_cu->setDbValue($rs->fields('id_cu'));
		$tbl_collectionperiod->cu_name->setDbValue($rs->fields('cu_name'));
		$tbl_collectionperiod->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$tbl_collectionperiod->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
		$tbl_collectionperiod->remarks_cutOffDate->setDbValue($rs->fields('remarks_cutOffDate'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_collectionperiod;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_collectionperiod->Row_Rendering();

		// Common render codes for all row types
		// collectionPeriod_ID

		$tbl_collectionperiod->collectionPeriod_ID->CellCssStyle = "white-space: nowrap;";

		// id_cu
		$tbl_collectionperiod->id_cu->CellCssStyle = "white-space: nowrap;";

		// cu_name
		$tbl_collectionperiod->cu_name->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_cutOffDate
		$tbl_collectionperiod->collectionPeriod_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_status
		$tbl_collectionperiod->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";

		// remarks_cutOffDate
		if ($tbl_collectionperiod->RowType == UP_ROWTYPE_VIEW) { // View row

			// id_cu
			$tbl_collectionperiod->id_cu->ViewValue = $tbl_collectionperiod->id_cu->CurrentValue;
			$tbl_collectionperiod->id_cu->ViewCustomAttributes = "";

			// cu_name
			$tbl_collectionperiod->cu_name->ViewValue = $tbl_collectionperiod->cu_name->CurrentValue;
			$tbl_collectionperiod->cu_name->ViewCustomAttributes = "";

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue = $tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue;
			$tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue = up_FormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue, 6);
			$tbl_collectionperiod->collectionPeriod_cutOffDate->ViewCustomAttributes = "";

			// collectionPeriod_status
			if (strval($tbl_collectionperiod->collectionPeriod_status->CurrentValue) <> "") {
				switch ($tbl_collectionperiod->collectionPeriod_status->CurrentValue) {
					case "A":
						$tbl_collectionperiod->collectionPeriod_status->ViewValue = $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(1) <> "" ? $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(1) : $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
						break;
					case "I":
						$tbl_collectionperiod->collectionPeriod_status->ViewValue = $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(2) <> "" ? $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(2) : $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
						break;
					default:
						$tbl_collectionperiod->collectionPeriod_status->ViewValue = $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
				}
			} else {
				$tbl_collectionperiod->collectionPeriod_status->ViewValue = NULL;
			}
			$tbl_collectionperiod->collectionPeriod_status->ViewCustomAttributes = "";

			// remarks_cutOffDate
			$tbl_collectionperiod->remarks_cutOffDate->ViewValue = $tbl_collectionperiod->remarks_cutOffDate->CurrentValue;
			$tbl_collectionperiod->remarks_cutOffDate->ViewValue = up_FormatDateTime($tbl_collectionperiod->remarks_cutOffDate->ViewValue, 6);
			$tbl_collectionperiod->remarks_cutOffDate->ViewCustomAttributes = "";

			// id_cu
			$tbl_collectionperiod->id_cu->LinkCustomAttributes = "";
			$tbl_collectionperiod->id_cu->HrefValue = "";
			$tbl_collectionperiod->id_cu->TooltipValue = "";

			// cu_name
			$tbl_collectionperiod->cu_name->LinkCustomAttributes = "";
			$tbl_collectionperiod->cu_name->HrefValue = "";
			$tbl_collectionperiod->cu_name->TooltipValue = "";

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->LinkCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_cutOffDate->HrefValue = "";
			$tbl_collectionperiod->collectionPeriod_cutOffDate->TooltipValue = "";

			// collectionPeriod_status
			$tbl_collectionperiod->collectionPeriod_status->LinkCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_status->HrefValue = "";
			$tbl_collectionperiod->collectionPeriod_status->TooltipValue = "";

			// remarks_cutOffDate
			$tbl_collectionperiod->remarks_cutOffDate->LinkCustomAttributes = "";
			$tbl_collectionperiod->remarks_cutOffDate->HrefValue = "";
			$tbl_collectionperiod->remarks_cutOffDate->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_collectionperiod->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_collectionperiod->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $tbl_collectionperiod;
		$DeleteRows = TRUE;
		$sSql = $tbl_collectionperiod->SQL();
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
				$DeleteRows = $tbl_collectionperiod->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['collectionPeriod_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_collectionperiod->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_collectionperiod->CancelMessage <> "") {
				$this->setFailureMessage($tbl_collectionperiod->CancelMessage);
				$tbl_collectionperiod->CancelMessage = "";
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
				$tbl_collectionperiod->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_collectionperiod';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $tbl_collectionperiod;
		$table = 'tbl_collectionperiod';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['collectionPeriod_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $tbl_collectionperiod->fields) && $tbl_collectionperiod->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_collectionperiod->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($tbl_collectionperiod->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
