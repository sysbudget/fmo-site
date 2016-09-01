<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "view_tbl_collectionperiod_admininfo.php" ?>
<?php include_once "tbl_uporgchart_unitinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$view_tbl_collectionperiod_admin_delete = new cview_tbl_collectionperiod_admin_delete();
$Page =& $view_tbl_collectionperiod_admin_delete;

// Page init
$view_tbl_collectionperiod_admin_delete->Page_Init();

// Page main
$view_tbl_collectionperiod_admin_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var view_tbl_collectionperiod_admin_delete = new up_Page("view_tbl_collectionperiod_admin_delete");

// page properties
view_tbl_collectionperiod_admin_delete.PageID = "delete"; // page ID
view_tbl_collectionperiod_admin_delete.FormID = "fview_tbl_collectionperiod_admindelete"; // form ID
var UP_PAGE_ID = view_tbl_collectionperiod_admin_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
view_tbl_collectionperiod_admin_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
view_tbl_collectionperiod_admin_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
view_tbl_collectionperiod_admin_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
view_tbl_collectionperiod_admin_delete.ValidateRequired = false; // no JavaScript validation
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
if ($view_tbl_collectionperiod_admin_delete->Recordset = $view_tbl_collectionperiod_admin_delete->LoadRecordset())
	$view_tbl_collectionperiod_admin_deleteTotalRecs = $view_tbl_collectionperiod_admin_delete->Recordset->RecordCount(); // Get record count
if ($view_tbl_collectionperiod_admin_deleteTotalRecs <= 0) { // No record found, exit
	if ($view_tbl_collectionperiod_admin_delete->Recordset)
		$view_tbl_collectionperiod_admin_delete->Recordset->Close();
	$view_tbl_collectionperiod_admin_delete->Page_Terminate("view_tbl_collectionperiod_adminlist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $view_tbl_collectionperiod_admin->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $view_tbl_collectionperiod_admin->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $view_tbl_collectionperiod_admin_delete->ShowPageHeader(); ?>
<?php
$view_tbl_collectionperiod_admin_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="view_tbl_collectionperiod_admin">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($view_tbl_collectionperiod_admin_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $view_tbl_collectionperiod_admin->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->FldCaption() ?></td>
		<td valign="top"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->FldCaption() ?></td>
		<td valign="top"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FldCaption() ?></td>
		<td valign="top"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$view_tbl_collectionperiod_admin_delete->RecCnt = 0;
$i = 0;
while (!$view_tbl_collectionperiod_admin_delete->Recordset->EOF) {
	$view_tbl_collectionperiod_admin_delete->RecCnt++;

	// Set row properties
	$view_tbl_collectionperiod_admin->ResetAttrs();
	$view_tbl_collectionperiod_admin->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$view_tbl_collectionperiod_admin_delete->LoadRowValues($view_tbl_collectionperiod_admin_delete->Recordset);

	// Render row
	$view_tbl_collectionperiod_admin_delete->RenderRow();
?>
	<tr<?php echo $view_tbl_collectionperiod_admin->RowAttributes() ?>>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->CellAttributes() ?>>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->ListViewValue() ?></div></td>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->CellAttributes() ?>>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->ListViewValue() ?></div></td>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CellAttributes() ?>>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ListViewValue() ?></div></td>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->CellAttributes() ?>>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->ListViewValue() ?></div></td>
	</tr>
<?php
	$view_tbl_collectionperiod_admin_delete->Recordset->MoveNext();
}
$view_tbl_collectionperiod_admin_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$view_tbl_collectionperiod_admin_delete->ShowPageFooter();
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
$view_tbl_collectionperiod_admin_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cview_tbl_collectionperiod_admin_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'view_tbl_collectionperiod_admin';

	// Page object name
	var $PageObjName = 'view_tbl_collectionperiod_admin_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $view_tbl_collectionperiod_admin;
		if ($view_tbl_collectionperiod_admin->UseTokenInUrl) $PageUrl .= "t=" . $view_tbl_collectionperiod_admin->TableVar . "&"; // Add page token
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
		global $objForm, $view_tbl_collectionperiod_admin;
		if ($view_tbl_collectionperiod_admin->UseTokenInUrl) {
			if ($objForm)
				return ($view_tbl_collectionperiod_admin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($view_tbl_collectionperiod_admin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cview_tbl_collectionperiod_admin_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (view_tbl_collectionperiod_admin)
		if (!isset($GLOBALS["view_tbl_collectionperiod_admin"])) {
			$GLOBALS["view_tbl_collectionperiod_admin"] = new cview_tbl_collectionperiod_admin();
			$GLOBALS["Table"] =& $GLOBALS["view_tbl_collectionperiod_admin"];
		}

		// Table object (tbl_uporgchart_unit)
		if (!isset($GLOBALS['tbl_uporgchart_unit'])) $GLOBALS['tbl_uporgchart_unit'] = new ctbl_uporgchart_unit();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'view_tbl_collectionperiod_admin', TRUE);

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
		global $view_tbl_collectionperiod_admin;

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
			$this->Page_Terminate("view_tbl_collectionperiod_adminlist.php");
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
		global $Language, $view_tbl_collectionperiod_admin;

		// Load key parameters
		$this->RecKeys = $view_tbl_collectionperiod_admin->GetRecordKeys(); // Load record keys
		$sFilter = $view_tbl_collectionperiod_admin->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("view_tbl_collectionperiod_adminlist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in view_tbl_collectionperiod_admin class, view_tbl_collectionperiod_admininfo.php

		$view_tbl_collectionperiod_admin->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$view_tbl_collectionperiod_admin->CurrentAction = $_POST["a_delete"];
		} else {
			$view_tbl_collectionperiod_admin->CurrentAction = "I"; // Display record
		}
		switch ($view_tbl_collectionperiod_admin->CurrentAction) {
			case "D": // Delete
				$view_tbl_collectionperiod_admin->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($view_tbl_collectionperiod_admin->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $view_tbl_collectionperiod_admin;

		// Call Recordset Selecting event
		$view_tbl_collectionperiod_admin->Recordset_Selecting($view_tbl_collectionperiod_admin->CurrentFilter);

		// Load List page SQL
		$sSql = $view_tbl_collectionperiod_admin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$view_tbl_collectionperiod_admin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $view_tbl_collectionperiod_admin;
		$sFilter = $view_tbl_collectionperiod_admin->KeyFilter();

		// Call Row Selecting event
		$view_tbl_collectionperiod_admin->Row_Selecting($sFilter);

		// Load SQL based on filter
		$view_tbl_collectionperiod_admin->CurrentFilter = $sFilter;
		$sSql = $view_tbl_collectionperiod_admin->SQL();
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
		global $conn, $view_tbl_collectionperiod_admin;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$view_tbl_collectionperiod_admin->Row_Selected($row);
		$view_tbl_collectionperiod_admin->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$view_tbl_collectionperiod_admin->cu->setDbValue($rs->fields('cu'));
		$view_tbl_collectionperiod_admin->unitID->setDbValue($rs->fields('unitID'));
		$view_tbl_collectionperiod_admin->academicYear_ID->setDbValue($rs->fields('academicYear_ID'));
		$view_tbl_collectionperiod_admin->collectionPeriod_ay->setDbValue($rs->fields('collectionPeriod_ay'));
		$view_tbl_collectionperiod_admin->collectionPeriod_sem->setDbValue($rs->fields('collectionPeriod_sem'));
		$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$view_tbl_collectionperiod_admin->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $view_tbl_collectionperiod_admin;

		// Initialize URLs
		// Call Row_Rendering event

		$view_tbl_collectionperiod_admin->Row_Rendering();

		// Common render codes for all row types
		// collectionPeriod_ID

		$view_tbl_collectionperiod_admin->collectionPeriod_ID->CellCssStyle = "white-space: nowrap;";

		// cu
		$view_tbl_collectionperiod_admin->cu->CellCssStyle = "white-space: nowrap;";

		// unitID
		$view_tbl_collectionperiod_admin->unitID->CellCssStyle = "white-space: nowrap;";

		// academicYear_ID
		$view_tbl_collectionperiod_admin->academicYear_ID->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ay
		$view_tbl_collectionperiod_admin->collectionPeriod_ay->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_sem
		$view_tbl_collectionperiod_admin->collectionPeriod_sem->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_cutOffDate
		$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_status
		$view_tbl_collectionperiod_admin->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";
		if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_VIEW) { // View row

			// collectionPeriod_ay
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_ay->CurrentValue;
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->ViewCustomAttributes = "";

			// collectionPeriod_sem
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_sem->CurrentValue;
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->ViewCustomAttributes = "";

			// collectionPeriod_cutOffDate
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CurrentValue;
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewValue = up_FormatDateTime($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewValue, 6);
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewCustomAttributes = "";

			// collectionPeriod_status
			if (strval($view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue) <> "") {
				switch ($view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue) {
					case "1":
						$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(1) <> "" ? $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(1) : $view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue;
						break;
					case "2":
						$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(2) <> "" ? $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(2) : $view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue;
						break;
					default:
						$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue;
				}
			} else {
				$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue = NULL;
			}
			$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewCustomAttributes = "";

			// collectionPeriod_ay
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->LinkCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->HrefValue = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->TooltipValue = "";

			// collectionPeriod_sem
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->LinkCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->HrefValue = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->TooltipValue = "";

			// collectionPeriod_cutOffDate
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->LinkCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->HrefValue = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->TooltipValue = "";

			// collectionPeriod_status
			$view_tbl_collectionperiod_admin->collectionPeriod_status->LinkCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_status->HrefValue = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_status->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($view_tbl_collectionperiod_admin->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$view_tbl_collectionperiod_admin->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $view_tbl_collectionperiod_admin;
		$DeleteRows = TRUE;
		$sSql = $view_tbl_collectionperiod_admin->SQL();
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
				$DeleteRows = $view_tbl_collectionperiod_admin->Row_Deleting($row);
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
				$DeleteRows = $conn->Execute($view_tbl_collectionperiod_admin->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($view_tbl_collectionperiod_admin->CancelMessage <> "") {
				$this->setFailureMessage($view_tbl_collectionperiod_admin->CancelMessage);
				$view_tbl_collectionperiod_admin->CancelMessage = "";
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
				$view_tbl_collectionperiod_admin->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'view_tbl_collectionperiod_admin';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $view_tbl_collectionperiod_admin;
		$table = 'view_tbl_collectionperiod_admin';

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
			if (array_key_exists($fldname, $view_tbl_collectionperiod_admin->fields) && $view_tbl_collectionperiod_admin->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($view_tbl_collectionperiod_admin->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($view_tbl_collectionperiod_admin->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
