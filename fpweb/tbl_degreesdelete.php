<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_degreesinfo.php" ?>
<?php include_once "tbl_facultyinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_degrees_delete = new ctbl_degrees_delete();
$Page =& $tbl_degrees_delete;

// Page init
$tbl_degrees_delete->Page_Init();

// Page main
$tbl_degrees_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_degrees_delete = new up_Page("tbl_degrees_delete");

// page properties
tbl_degrees_delete.PageID = "delete"; // page ID
tbl_degrees_delete.FormID = "ftbl_degreesdelete"; // form ID
var UP_PAGE_ID = tbl_degrees_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_degrees_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_degrees_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_degrees_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_degrees_delete.ValidateRequired = false; // no JavaScript validation
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
if ($tbl_degrees_delete->Recordset = $tbl_degrees_delete->LoadRecordset())
	$tbl_degrees_deleteTotalRecs = $tbl_degrees_delete->Recordset->RecordCount(); // Get record count
if ($tbl_degrees_deleteTotalRecs <= 0) { // No record found, exit
	if ($tbl_degrees_delete->Recordset)
		$tbl_degrees_delete->Recordset->Close();
	$tbl_degrees_delete->Page_Terminate("tbl_degreeslist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_degrees->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_degrees->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_degrees_delete->ShowPageHeader(); ?>
<?php
$tbl_degrees_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="tbl_degrees">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($tbl_degrees_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $tbl_degrees->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $tbl_degrees->degrees_level->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_degrees->degrees_disciplineCode->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_degrees->degrees_fieldOfStudy->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_degrees->degrees_wroteThesisDissertation->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_degrees->degrees_primaryDegree->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$tbl_degrees_delete->RecCnt = 0;
$i = 0;
while (!$tbl_degrees_delete->Recordset->EOF) {
	$tbl_degrees_delete->RecCnt++;

	// Set row properties
	$tbl_degrees->ResetAttrs();
	$tbl_degrees->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$tbl_degrees_delete->LoadRowValues($tbl_degrees_delete->Recordset);

	// Render row
	$tbl_degrees_delete->RenderRow();
?>
	<tr<?php echo $tbl_degrees->RowAttributes() ?>>
		<td<?php echo $tbl_degrees->degrees_level->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_level->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_level->ListViewValue() ?></div></td>
		<td<?php echo $tbl_degrees->degrees_disciplineCode->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_disciplineCode->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_disciplineCode->ListViewValue() ?></div></td>
		<td<?php echo $tbl_degrees->degrees_fieldOfStudy->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_fieldOfStudy->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_fieldOfStudy->ListViewValue() ?></div></td>
		<td<?php echo $tbl_degrees->degrees_wroteThesisDissertation->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_wroteThesisDissertation->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_wroteThesisDissertation->ListViewValue() ?></div></td>
		<td<?php echo $tbl_degrees->degrees_primaryDegree->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_primaryDegree->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_primaryDegree->ListViewValue() ?></div></td>
	</tr>
<?php
	$tbl_degrees_delete->Recordset->MoveNext();
}
$tbl_degrees_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$tbl_degrees_delete->ShowPageFooter();
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
$tbl_degrees_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_degrees_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'tbl_degrees';

	// Page object name
	var $PageObjName = 'tbl_degrees_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_degrees;
		if ($tbl_degrees->UseTokenInUrl) $PageUrl .= "t=" . $tbl_degrees->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_degrees;
		if ($tbl_degrees->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_degrees->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_degrees->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_degrees_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_degrees)
		if (!isset($GLOBALS["tbl_degrees"])) {
			$GLOBALS["tbl_degrees"] = new ctbl_degrees();
			$GLOBALS["Table"] =& $GLOBALS["tbl_degrees"];
		}

		// Table object (tbl_faculty)
		if (!isset($GLOBALS['tbl_faculty'])) $GLOBALS['tbl_faculty'] = new ctbl_faculty();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_degrees', TRUE);

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
		global $tbl_degrees;

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
			$this->Page_Terminate("tbl_degreeslist.php");
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
		global $Language, $tbl_degrees;

		// Load key parameters
		$this->RecKeys = $tbl_degrees->GetRecordKeys(); // Load record keys
		$sFilter = $tbl_degrees->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("tbl_degreeslist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in tbl_degrees class, tbl_degreesinfo.php

		$tbl_degrees->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$tbl_degrees->CurrentAction = $_POST["a_delete"];
		} else {
			$tbl_degrees->CurrentAction = "I"; // Display record
		}
		switch ($tbl_degrees->CurrentAction) {
			case "D": // Delete
				$tbl_degrees->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($tbl_degrees->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_degrees;

		// Call Recordset Selecting event
		$tbl_degrees->Recordset_Selecting($tbl_degrees->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_degrees->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_degrees->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_degrees;
		$sFilter = $tbl_degrees->KeyFilter();

		// Call Row Selecting event
		$tbl_degrees->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_degrees->CurrentFilter = $sFilter;
		$sSql = $tbl_degrees->SQL();
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
		global $conn, $tbl_degrees;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_degrees->Row_Selected($row);
		$tbl_degrees->degrees_ID->setDbValue($rs->fields('degrees_ID'));
		$tbl_degrees->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$tbl_degrees->degrees_level->setDbValue($rs->fields('degrees_level'));
		$tbl_degrees->degrees_disciplineCode->setDbValue($rs->fields('degrees_disciplineCode'));
		$tbl_degrees->degrees_fieldOfStudy->setDbValue($rs->fields('degrees_fieldOfStudy'));
		$tbl_degrees->degrees_wroteThesisDissertation->setDbValue($rs->fields('degrees_wroteThesisDissertation'));
		$tbl_degrees->degrees_primaryDegree->setDbValue($rs->fields('degrees_primaryDegree'));
		$tbl_degrees->degrees_authoritative_data->setDbValue($rs->fields('degrees_authoritative_data'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_degrees;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_degrees->Row_Rendering();

		// Common render codes for all row types
		// degrees_ID

		$tbl_degrees->degrees_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_ID
		$tbl_degrees->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// degrees_level
		$tbl_degrees->degrees_level->CellCssStyle = "white-space: nowrap;";

		// degrees_disciplineCode
		$tbl_degrees->degrees_disciplineCode->CellCssStyle = "white-space: nowrap;";

		// degrees_fieldOfStudy
		$tbl_degrees->degrees_fieldOfStudy->CellCssStyle = "white-space: nowrap;";

		// degrees_wroteThesisDissertation
		$tbl_degrees->degrees_wroteThesisDissertation->CellCssStyle = "white-space: nowrap;";

		// degrees_primaryDegree
		$tbl_degrees->degrees_primaryDegree->CellCssStyle = "white-space: nowrap;";

		// degrees_authoritative_data
		$tbl_degrees->degrees_authoritative_data->CellCssStyle = "white-space: nowrap;";
		if ($tbl_degrees->RowType == UP_ROWTYPE_VIEW) { // View row

			// degrees_level
			if (strval($tbl_degrees->degrees_level->CurrentValue) <> "") {
				$sFilterWrk = "`degreeLevel_ID` = " . up_AdjustSql($tbl_degrees->degrees_level->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreeLevel_name` FROM `ref_degreelevel_degrees`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_degrees->degrees_level->ViewValue = $rswrk->fields('degreeLevel_name');
					$rswrk->Close();
				} else {
					$tbl_degrees->degrees_level->ViewValue = $tbl_degrees->degrees_level->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_level->ViewValue = NULL;
			}
			$tbl_degrees->degrees_level->ViewCustomAttributes = "";

			// degrees_disciplineCode
			if (strval($tbl_degrees->degrees_disciplineCode->CurrentValue) <> "") {
				$sFilterWrk = "`disCHED_disciplineSpecific_code` = " . up_AdjustSql($tbl_degrees->degrees_disciplineCode->CurrentValue) . "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_nameList` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_degrees->degrees_disciplineCode->ViewValue = $rswrk->fields('disCHED_disciplineSpecific_nameList');
					$rswrk->Close();
				} else {
					$tbl_degrees->degrees_disciplineCode->ViewValue = $tbl_degrees->degrees_disciplineCode->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_disciplineCode->ViewValue = NULL;
			}
			$tbl_degrees->degrees_disciplineCode->ViewCustomAttributes = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->ViewValue = $tbl_degrees->degrees_fieldOfStudy->CurrentValue;
			$tbl_degrees->degrees_fieldOfStudy->ViewCustomAttributes = "";

			// degrees_wroteThesisDissertation
			if (strval($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) <> "") {
				switch ($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) {
					case "Y":
						$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) : $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
						break;
					case "N":
						$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) : $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
						break;
					default:
						$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = NULL;
			}
			$tbl_degrees->degrees_wroteThesisDissertation->ViewCustomAttributes = "";

			// degrees_primaryDegree
			if (strval($tbl_degrees->degrees_primaryDegree->CurrentValue) <> "") {
				switch ($tbl_degrees->degrees_primaryDegree->CurrentValue) {
					case "Y":
						$tbl_degrees->degrees_primaryDegree->ViewValue = $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) : $tbl_degrees->degrees_primaryDegree->CurrentValue;
						break;
					case "N":
						$tbl_degrees->degrees_primaryDegree->ViewValue = $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) : $tbl_degrees->degrees_primaryDegree->CurrentValue;
						break;
					default:
						$tbl_degrees->degrees_primaryDegree->ViewValue = $tbl_degrees->degrees_primaryDegree->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_primaryDegree->ViewValue = NULL;
			}
			$tbl_degrees->degrees_primaryDegree->ViewCustomAttributes = "";

			// degrees_level
			$tbl_degrees->degrees_level->LinkCustomAttributes = "";
			$tbl_degrees->degrees_level->HrefValue = "";
			$tbl_degrees->degrees_level->TooltipValue = "";

			// degrees_disciplineCode
			$tbl_degrees->degrees_disciplineCode->LinkCustomAttributes = "";
			$tbl_degrees->degrees_disciplineCode->HrefValue = "";
			$tbl_degrees->degrees_disciplineCode->TooltipValue = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->LinkCustomAttributes = "";
			$tbl_degrees->degrees_fieldOfStudy->HrefValue = "";
			$tbl_degrees->degrees_fieldOfStudy->TooltipValue = "";

			// degrees_wroteThesisDissertation
			$tbl_degrees->degrees_wroteThesisDissertation->LinkCustomAttributes = "";
			$tbl_degrees->degrees_wroteThesisDissertation->HrefValue = "";
			$tbl_degrees->degrees_wroteThesisDissertation->TooltipValue = "";

			// degrees_primaryDegree
			$tbl_degrees->degrees_primaryDegree->LinkCustomAttributes = "";
			$tbl_degrees->degrees_primaryDegree->HrefValue = "";
			$tbl_degrees->degrees_primaryDegree->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_degrees->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_degrees->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $tbl_degrees;
		$DeleteRows = TRUE;
		$sSql = $tbl_degrees->SQL();
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
				$DeleteRows = $tbl_degrees->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['degrees_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_degrees->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_degrees->CancelMessage <> "") {
				$this->setFailureMessage($tbl_degrees->CancelMessage);
				$tbl_degrees->CancelMessage = "";
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
				$tbl_degrees->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_degrees';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $tbl_degrees;
		$table = 'tbl_degrees';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['degrees_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $tbl_degrees->fields) && $tbl_degrees->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($tbl_degrees->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
