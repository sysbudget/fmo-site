<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_uporgchart_unitinfo.php" ?>
<?php include_once "tbl_uporgchart_cuinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_uporgchart_unit_delete = new ctbl_uporgchart_unit_delete();
$Page =& $tbl_uporgchart_unit_delete;

// Page init
$tbl_uporgchart_unit_delete->Page_Init();

// Page main
$tbl_uporgchart_unit_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_uporgchart_unit_delete = new up_Page("tbl_uporgchart_unit_delete");

// page properties
tbl_uporgchart_unit_delete.PageID = "delete"; // page ID
tbl_uporgchart_unit_delete.FormID = "ftbl_uporgchart_unitdelete"; // form ID
var UP_PAGE_ID = tbl_uporgchart_unit_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_uporgchart_unit_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_uporgchart_unit_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_uporgchart_unit_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_uporgchart_unit_delete.ValidateRequired = false; // no JavaScript validation
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
if ($tbl_uporgchart_unit_delete->Recordset = $tbl_uporgchart_unit_delete->LoadRecordset())
	$tbl_uporgchart_unit_deleteTotalRecs = $tbl_uporgchart_unit_delete->Recordset->RecordCount(); // Get record count
if ($tbl_uporgchart_unit_deleteTotalRecs <= 0) { // No record found, exit
	if ($tbl_uporgchart_unit_delete->Recordset)
		$tbl_uporgchart_unit_delete->Recordset->Close();
	$tbl_uporgchart_unit_delete->Page_Terminate("tbl_uporgchart_unitlist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_uporgchart_unit->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_uporgchart_unit->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_uporgchart_unit_delete->ShowPageHeader(); ?>
<?php
$tbl_uporgchart_unit_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="tbl_uporgchart_unit">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($tbl_uporgchart_unit_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $tbl_uporgchart_unit->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $tbl_uporgchart_unit->nameOfUnit->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$tbl_uporgchart_unit_delete->RecCnt = 0;
$i = 0;
while (!$tbl_uporgchart_unit_delete->Recordset->EOF) {
	$tbl_uporgchart_unit_delete->RecCnt++;

	// Set row properties
	$tbl_uporgchart_unit->ResetAttrs();
	$tbl_uporgchart_unit->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$tbl_uporgchart_unit_delete->LoadRowValues($tbl_uporgchart_unit_delete->Recordset);

	// Render row
	$tbl_uporgchart_unit_delete->RenderRow();
?>
	<tr<?php echo $tbl_uporgchart_unit->RowAttributes() ?>>
		<td<?php echo $tbl_uporgchart_unit->nameOfUnit->CellAttributes() ?>>
<div<?php echo $tbl_uporgchart_unit->nameOfUnit->ViewAttributes() ?>><?php echo $tbl_uporgchart_unit->nameOfUnit->ListViewValue() ?></div></td>
	</tr>
<?php
	$tbl_uporgchart_unit_delete->Recordset->MoveNext();
}
$tbl_uporgchart_unit_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$tbl_uporgchart_unit_delete->ShowPageFooter();
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
$tbl_uporgchart_unit_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_uporgchart_unit_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'tbl_uporgchart_unit';

	// Page object name
	var $PageObjName = 'tbl_uporgchart_unit_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_uporgchart_unit;
		if ($tbl_uporgchart_unit->UseTokenInUrl) $PageUrl .= "t=" . $tbl_uporgchart_unit->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_uporgchart_unit;
		if ($tbl_uporgchart_unit->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_uporgchart_unit->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_uporgchart_unit->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_uporgchart_unit_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_uporgchart_unit)
		if (!isset($GLOBALS["tbl_uporgchart_unit"])) {
			$GLOBALS["tbl_uporgchart_unit"] = new ctbl_uporgchart_unit();
			$GLOBALS["Table"] =& $GLOBALS["tbl_uporgchart_unit"];
		}

		// Table object (tbl_uporgchart_cu)
		if (!isset($GLOBALS['tbl_uporgchart_cu'])) $GLOBALS['tbl_uporgchart_cu'] = new ctbl_uporgchart_cu();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_uporgchart_unit', TRUE);

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
		global $tbl_uporgchart_unit;

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
			$this->Page_Terminate("tbl_uporgchart_unitlist.php");
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
		global $Language, $tbl_uporgchart_unit;

		// Load key parameters
		$this->RecKeys = $tbl_uporgchart_unit->GetRecordKeys(); // Load record keys
		$sFilter = $tbl_uporgchart_unit->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("tbl_uporgchart_unitlist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in tbl_uporgchart_unit class, tbl_uporgchart_unitinfo.php

		$tbl_uporgchart_unit->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$tbl_uporgchart_unit->CurrentAction = $_POST["a_delete"];
		} else {
			$tbl_uporgchart_unit->CurrentAction = "I"; // Display record
		}
		switch ($tbl_uporgchart_unit->CurrentAction) {
			case "D": // Delete
				$tbl_uporgchart_unit->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($tbl_uporgchart_unit->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_uporgchart_unit;

		// Call Recordset Selecting event
		$tbl_uporgchart_unit->Recordset_Selecting($tbl_uporgchart_unit->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_uporgchart_unit->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_uporgchart_unit->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_uporgchart_unit;
		$sFilter = $tbl_uporgchart_unit->KeyFilter();

		// Call Row Selecting event
		$tbl_uporgchart_unit->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_uporgchart_unit->CurrentFilter = $sFilter;
		$sSql = $tbl_uporgchart_unit->SQL();
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
		global $conn, $tbl_uporgchart_unit;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_uporgchart_unit->Row_Selected($row);
		$tbl_uporgchart_unit->unitID->setDbValue($rs->fields('unitID'));
		$tbl_uporgchart_unit->cu->setDbValue($rs->fields('cu'));
		$tbl_uporgchart_unit->location->setDbValue($rs->fields('location'));
		$tbl_uporgchart_unit->parentUnit->setDbValue($rs->fields('parentUnit'));
		$tbl_uporgchart_unit->nameOfUnit->setDbValue($rs->fields('nameOfUnit'));
		$tbl_uporgchart_unit->plantillaOrgCode->setDbValue($rs->fields('plantillaOrgCode'));
		$tbl_uporgchart_unit->orgLevel->setDbValue($rs->fields('orgLevel'));
		$tbl_uporgchart_unit->cuUnitName->setDbValue($rs->fields('cuUnitName'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_uporgchart_unit;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_uporgchart_unit->Row_Rendering();

		// Common render codes for all row types
		// unitID

		$tbl_uporgchart_unit->unitID->CellCssStyle = "white-space: nowrap;";

		// cu
		$tbl_uporgchart_unit->cu->CellCssStyle = "white-space: nowrap;";

		// location
		$tbl_uporgchart_unit->location->CellCssStyle = "white-space: nowrap;";

		// parentUnit
		$tbl_uporgchart_unit->parentUnit->CellCssStyle = "white-space: nowrap;";

		// nameOfUnit
		$tbl_uporgchart_unit->nameOfUnit->CellCssStyle = "white-space: nowrap;";

		// plantillaOrgCode
		$tbl_uporgchart_unit->plantillaOrgCode->CellCssStyle = "white-space: nowrap;";

		// orgLevel
		$tbl_uporgchart_unit->orgLevel->CellCssStyle = "white-space: nowrap;";

		// cuUnitName
		$tbl_uporgchart_unit->cuUnitName->CellCssStyle = "white-space: nowrap;";
		if ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_VIEW) { // View row

			// nameOfUnit
			$tbl_uporgchart_unit->nameOfUnit->ViewValue = $tbl_uporgchart_unit->nameOfUnit->CurrentValue;
			$tbl_uporgchart_unit->nameOfUnit->ViewCustomAttributes = "";

			// nameOfUnit
			$tbl_uporgchart_unit->nameOfUnit->LinkCustomAttributes = "";
			$tbl_uporgchart_unit->nameOfUnit->HrefValue = "";
			$tbl_uporgchart_unit->nameOfUnit->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_uporgchart_unit->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_uporgchart_unit->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $tbl_uporgchart_unit;
		$DeleteRows = TRUE;
		$sSql = $tbl_uporgchart_unit->SQL();
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
				$DeleteRows = $tbl_uporgchart_unit->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['unitID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_uporgchart_unit->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_uporgchart_unit->CancelMessage <> "") {
				$this->setFailureMessage($tbl_uporgchart_unit->CancelMessage);
				$tbl_uporgchart_unit->CancelMessage = "";
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
				$tbl_uporgchart_unit->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_uporgchart_unit';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $tbl_uporgchart_unit;
		$table = 'tbl_uporgchart_unit';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['unitID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $tbl_uporgchart_unit->fields) && $tbl_uporgchart_unit->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_uporgchart_unit->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($tbl_uporgchart_unit->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
