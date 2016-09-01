<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_facultyinfo.php" ?>
<?php include_once "tbl_uporgchart_unitinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_faculty_delete = new ctbl_faculty_delete();
$Page =& $tbl_faculty_delete;

// Page init
$tbl_faculty_delete->Page_Init();

// Page main
$tbl_faculty_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_faculty_delete = new up_Page("tbl_faculty_delete");

// page properties
tbl_faculty_delete.PageID = "delete"; // page ID
tbl_faculty_delete.FormID = "ftbl_facultydelete"; // form ID
var UP_PAGE_ID = tbl_faculty_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_faculty_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_faculty_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_faculty_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_faculty_delete.ValidateRequired = false; // no JavaScript validation
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
if ($tbl_faculty_delete->Recordset = $tbl_faculty_delete->LoadRecordset())
	$tbl_faculty_deleteTotalRecs = $tbl_faculty_delete->Recordset->RecordCount(); // Get record count
if ($tbl_faculty_deleteTotalRecs <= 0) { // No record found, exit
	if ($tbl_faculty_delete->Recordset)
		$tbl_faculty_delete->Recordset->Close();
	$tbl_faculty_delete->Page_Terminate("tbl_facultylist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_faculty->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_faculty->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_faculty_delete->ShowPageHeader(); ?>
<?php
$tbl_faculty_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="tbl_faculty">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($tbl_faculty_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $tbl_faculty->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $tbl_faculty->faculty_name->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_faculty->faculty_birthDate->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_faculty->gender_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_faculty->faculty_highestDegreeListed->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_faculty->degreelevelFaculty_ID->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$tbl_faculty_delete->RecCnt = 0;
$i = 0;
while (!$tbl_faculty_delete->Recordset->EOF) {
	$tbl_faculty_delete->RecCnt++;

	// Set row properties
	$tbl_faculty->ResetAttrs();
	$tbl_faculty->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$tbl_faculty_delete->LoadRowValues($tbl_faculty_delete->Recordset);

	// Render row
	$tbl_faculty_delete->RenderRow();
?>
	<tr<?php echo $tbl_faculty->RowAttributes() ?>>
		<td<?php echo $tbl_faculty->faculty_name->CellAttributes() ?>>
<div<?php echo $tbl_faculty->faculty_name->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_name->ListViewValue() ?></div></td>
		<td<?php echo $tbl_faculty->faculty_birthDate->CellAttributes() ?>>
<div<?php echo $tbl_faculty->faculty_birthDate->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_birthDate->ListViewValue() ?></div></td>
		<td<?php echo $tbl_faculty->gender_ID->CellAttributes() ?>>
<div<?php echo $tbl_faculty->gender_ID->ViewAttributes() ?>><?php echo $tbl_faculty->gender_ID->ListViewValue() ?></div></td>
		<td<?php echo $tbl_faculty->faculty_highestDegreeListed->CellAttributes() ?>>
<div<?php echo $tbl_faculty->faculty_highestDegreeListed->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_highestDegreeListed->ListViewValue() ?></div></td>
		<td<?php echo $tbl_faculty->degreelevelFaculty_ID->CellAttributes() ?>>
<div<?php echo $tbl_faculty->degreelevelFaculty_ID->ViewAttributes() ?>><?php echo $tbl_faculty->degreelevelFaculty_ID->ListViewValue() ?></div></td>
	</tr>
<?php
	$tbl_faculty_delete->Recordset->MoveNext();
}
$tbl_faculty_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$tbl_faculty_delete->ShowPageFooter();
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
$tbl_faculty_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_faculty_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'tbl_faculty';

	// Page object name
	var $PageObjName = 'tbl_faculty_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_faculty;
		if ($tbl_faculty->UseTokenInUrl) $PageUrl .= "t=" . $tbl_faculty->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_faculty;
		if ($tbl_faculty->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_faculty->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_faculty->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_faculty_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_faculty)
		if (!isset($GLOBALS["tbl_faculty"])) {
			$GLOBALS["tbl_faculty"] = new ctbl_faculty();
			$GLOBALS["Table"] =& $GLOBALS["tbl_faculty"];
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
			define("UP_TABLE_NAME", 'tbl_faculty', TRUE);

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
		global $tbl_faculty;

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
			$this->Page_Terminate("tbl_facultylist.php");
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
		global $Language, $tbl_faculty;

		// Load key parameters
		$this->RecKeys = $tbl_faculty->GetRecordKeys(); // Load record keys
		$sFilter = $tbl_faculty->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("tbl_facultylist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in tbl_faculty class, tbl_facultyinfo.php

		$tbl_faculty->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$tbl_faculty->CurrentAction = $_POST["a_delete"];
		} else {
			$tbl_faculty->CurrentAction = "I"; // Display record
		}
		switch ($tbl_faculty->CurrentAction) {
			case "D": // Delete
				$tbl_faculty->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($tbl_faculty->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_faculty;

		// Call Recordset Selecting event
		$tbl_faculty->Recordset_Selecting($tbl_faculty->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_faculty->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_faculty->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_faculty;
		$sFilter = $tbl_faculty->KeyFilter();

		// Call Row Selecting event
		$tbl_faculty->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_faculty->CurrentFilter = $sFilter;
		$sSql = $tbl_faculty->SQL();
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
		global $conn, $tbl_faculty;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_faculty->Row_Selected($row);
		$tbl_faculty->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$tbl_faculty->unitID->setDbValue($rs->fields('unitID'));
		$tbl_faculty->faculty_name->setDbValue($rs->fields('faculty_name'));
		$tbl_faculty->faculty_lastName->setDbValue($rs->fields('faculty_lastName'));
		$tbl_faculty->faculty_firstName->setDbValue($rs->fields('faculty_firstName'));
		$tbl_faculty->faculty_middleName->setDbValue($rs->fields('faculty_middleName'));
		$tbl_faculty->faculty_birthDate->setDbValue($rs->fields('faculty_birthDate'));
		$tbl_faculty->gender_ID->setDbValue($rs->fields('gender_ID'));
		$tbl_faculty->faculty_hda_gen->setDbValue($rs->fields('faculty_hda_gen'));
		$tbl_faculty->faculty_inActivePursuitofHigherDegree_gen->setDbValue($rs->fields('faculty_inActivePursuitofHigherDegree_gen'));
		$tbl_faculty->faculty_highestDegreeListed->setDbValue($rs->fields('faculty_highestDegreeListed'));
		$tbl_faculty->degreelevelFaculty_ID->setDbValue($rs->fields('degreelevelFaculty_ID'));
		$tbl_faculty->faculty_isEnrolledOrInResidence->setDbValue($rs->fields('faculty_isEnrolledOrInResidence'));
		$tbl_faculty->faculty_hasEarnedCreditUnits->setDbValue($rs->fields('faculty_hasEarnedCreditUnits'));
		$tbl_faculty->faculty_candidate->setDbValue($rs->fields('faculty_candidate'));
		$tbl_faculty->faculty_authoritative_data->setDbValue($rs->fields('faculty_authoritative_data'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_faculty;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_faculty->Row_Rendering();

		// Common render codes for all row types
		// faculty_ID

		$tbl_faculty->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// unitID
		$tbl_faculty->unitID->CellCssStyle = "white-space: nowrap;";

		// faculty_name
		$tbl_faculty->faculty_name->CellCssStyle = "white-space: nowrap;";

		// faculty_lastName
		$tbl_faculty->faculty_lastName->CellCssStyle = "white-space: nowrap;";

		// faculty_firstName
		$tbl_faculty->faculty_firstName->CellCssStyle = "white-space: nowrap;";

		// faculty_middleName
		$tbl_faculty->faculty_middleName->CellCssStyle = "white-space: nowrap;";

		// faculty_birthDate
		$tbl_faculty->faculty_birthDate->CellCssStyle = "white-space: nowrap;";

		// gender_ID
		$tbl_faculty->gender_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_hda_gen
		$tbl_faculty->faculty_hda_gen->CellCssStyle = "white-space: nowrap;";

		// faculty_inActivePursuitofHigherDegree_gen
		$tbl_faculty->faculty_inActivePursuitofHigherDegree_gen->CellCssStyle = "white-space: nowrap;";

		// faculty_highestDegreeListed
		$tbl_faculty->faculty_highestDegreeListed->CellCssStyle = "white-space: nowrap;";

		// degreelevelFaculty_ID
		// faculty_isEnrolledOrInResidence

		$tbl_faculty->faculty_isEnrolledOrInResidence->CellCssStyle = "white-space: nowrap;";

		// faculty_hasEarnedCreditUnits
		$tbl_faculty->faculty_hasEarnedCreditUnits->CellCssStyle = "white-space: nowrap;";

		// faculty_candidate
		$tbl_faculty->faculty_candidate->CellCssStyle = "white-space: nowrap;";

		// faculty_authoritative_data
		$tbl_faculty->faculty_authoritative_data->CellCssStyle = "white-space: nowrap;";
		if ($tbl_faculty->RowType == UP_ROWTYPE_VIEW) { // View row

			// faculty_name
			$tbl_faculty->faculty_name->ViewValue = $tbl_faculty->faculty_name->CurrentValue;
			$tbl_faculty->faculty_name->ViewCustomAttributes = "";

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->ViewValue = $tbl_faculty->faculty_birthDate->CurrentValue;
			$tbl_faculty->faculty_birthDate->ViewValue = up_FormatDateTime($tbl_faculty->faculty_birthDate->ViewValue, 6);
			$tbl_faculty->faculty_birthDate->ViewCustomAttributes = "";

			// gender_ID
			if (strval($tbl_faculty->gender_ID->CurrentValue) <> "") {
				switch ($tbl_faculty->gender_ID->CurrentValue) {
					case "F":
						$tbl_faculty->gender_ID->ViewValue = $tbl_faculty->gender_ID->FldTagCaption(1) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(1) : $tbl_faculty->gender_ID->CurrentValue;
						break;
					case "M":
						$tbl_faculty->gender_ID->ViewValue = $tbl_faculty->gender_ID->FldTagCaption(2) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(2) : $tbl_faculty->gender_ID->CurrentValue;
						break;
					default:
						$tbl_faculty->gender_ID->ViewValue = $tbl_faculty->gender_ID->CurrentValue;
				}
			} else {
				$tbl_faculty->gender_ID->ViewValue = NULL;
			}
			$tbl_faculty->gender_ID->ViewCustomAttributes = "";

			// faculty_highestDegreeListed
			$tbl_faculty->faculty_highestDegreeListed->ViewValue = $tbl_faculty->faculty_highestDegreeListed->CurrentValue;
			if (strval($tbl_faculty->faculty_highestDegreeListed->CurrentValue) <> "") {
				$sFilterWrk = "`degreeLevel_ID` = " . up_AdjustSql($tbl_faculty->faculty_highestDegreeListed->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreeLevel_name` FROM `ref_degreelevel_degrees`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_faculty->faculty_highestDegreeListed->ViewValue = $rswrk->fields('degreeLevel_name');
					$rswrk->Close();
				} else {
					$tbl_faculty->faculty_highestDegreeListed->ViewValue = $tbl_faculty->faculty_highestDegreeListed->CurrentValue;
				}
			} else {
				$tbl_faculty->faculty_highestDegreeListed->ViewValue = NULL;
			}
			$tbl_faculty->faculty_highestDegreeListed->ViewCustomAttributes = "";

			// degreelevelFaculty_ID
			if (strval($tbl_faculty->degreelevelFaculty_ID->CurrentValue) <> "") {
				$sFilterWrk = "`degreelevelFaculty_ID` = " . up_AdjustSql($tbl_faculty->degreelevelFaculty_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreelevelFaculty_name` FROM `ref_degreelevel_faculty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `degreelevelFaculty_name` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_faculty->degreelevelFaculty_ID->ViewValue = $rswrk->fields('degreelevelFaculty_name');
					$rswrk->Close();
				} else {
					$tbl_faculty->degreelevelFaculty_ID->ViewValue = $tbl_faculty->degreelevelFaculty_ID->CurrentValue;
				}
			} else {
				$tbl_faculty->degreelevelFaculty_ID->ViewValue = NULL;
			}
			$tbl_faculty->degreelevelFaculty_ID->ViewCustomAttributes = "";

			// faculty_name
			$tbl_faculty->faculty_name->LinkCustomAttributes = "";
			$tbl_faculty->faculty_name->HrefValue = "";
			$tbl_faculty->faculty_name->TooltipValue = "";

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->LinkCustomAttributes = "";
			$tbl_faculty->faculty_birthDate->HrefValue = "";
			$tbl_faculty->faculty_birthDate->TooltipValue = "";

			// gender_ID
			$tbl_faculty->gender_ID->LinkCustomAttributes = "";
			$tbl_faculty->gender_ID->HrefValue = "";
			$tbl_faculty->gender_ID->TooltipValue = "";

			// faculty_highestDegreeListed
			$tbl_faculty->faculty_highestDegreeListed->LinkCustomAttributes = "";
			$tbl_faculty->faculty_highestDegreeListed->HrefValue = "";
			$tbl_faculty->faculty_highestDegreeListed->TooltipValue = "";

			// degreelevelFaculty_ID
			$tbl_faculty->degreelevelFaculty_ID->LinkCustomAttributes = "";
			$tbl_faculty->degreelevelFaculty_ID->HrefValue = "";
			$tbl_faculty->degreelevelFaculty_ID->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_faculty->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_faculty->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $tbl_faculty;
		$DeleteRows = TRUE;
		$sSql = $tbl_faculty->SQL();
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
				$DeleteRows = $tbl_faculty->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['faculty_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_faculty->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_faculty->CancelMessage <> "") {
				$this->setFailureMessage($tbl_faculty->CancelMessage);
				$tbl_faculty->CancelMessage = "";
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
				$tbl_faculty->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_faculty';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (delete page)
	function WriteAuditTrailOnDelete(&$rs) {
		global $tbl_faculty;
		$table = 'tbl_faculty';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rs['faculty_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $tbl_faculty->fields) && $tbl_faculty->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) {
					if (UP_AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($tbl_faculty->fields[$fldname]->FldDataType == UP_DATATYPE_XML) {
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
