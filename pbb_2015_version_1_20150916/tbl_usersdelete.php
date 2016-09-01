<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_users_delete = new ctbl_users_delete();
$Page =& $tbl_users_delete;

// Page init
$tbl_users_delete->Page_Init();

// Page main
$tbl_users_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_users_delete = new up_Page("tbl_users_delete");

// page properties
tbl_users_delete.PageID = "delete"; // page ID
tbl_users_delete.FormID = "ftbl_usersdelete"; // form ID
var UP_PAGE_ID = tbl_users_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_users_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_users_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_users_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_users_delete.ValidateRequired = false; // no JavaScript validation
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
if ($tbl_users_delete->Recordset = $tbl_users_delete->LoadRecordset())
	$tbl_users_deleteTotalRecs = $tbl_users_delete->Recordset->RecordCount(); // Get record count
if ($tbl_users_deleteTotalRecs <= 0) { // No record found, exit
	if ($tbl_users_delete->Recordset)
		$tbl_users_delete->Recordset->Close();
	$tbl_users_delete->Page_Terminate("tbl_userslist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_users->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_users->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_users_delete->ShowPageHeader(); ?>
<?php
$tbl_users_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="tbl_users">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($tbl_users_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $tbl_users->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $tbl_users->users_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_users->cu->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_users->units_id->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_users->cu_unit_name->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_users->users_name->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_users->users_nameLast->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_users->users_nameFirst->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_users->users_nameMiddle->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_users->users_userLoginName->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_users->users_password->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_users->users_userLevel->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_users->users_email->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_users->users_contactNo->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$tbl_users_delete->RecCnt = 0;
$i = 0;
while (!$tbl_users_delete->Recordset->EOF) {
	$tbl_users_delete->RecCnt++;

	// Set row properties
	$tbl_users->ResetAttrs();
	$tbl_users->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$tbl_users_delete->LoadRowValues($tbl_users_delete->Recordset);

	// Render row
	$tbl_users_delete->RenderRow();
?>
	<tr<?php echo $tbl_users->RowAttributes() ?>>
		<td<?php echo $tbl_users->users_ID->CellAttributes() ?>>
<div<?php echo $tbl_users->users_ID->ViewAttributes() ?>><?php echo $tbl_users->users_ID->ListViewValue() ?></div></td>
		<td<?php echo $tbl_users->cu->CellAttributes() ?>>
<div<?php echo $tbl_users->cu->ViewAttributes() ?>><?php echo $tbl_users->cu->ListViewValue() ?></div></td>
		<td<?php echo $tbl_users->units_id->CellAttributes() ?>>
<div<?php echo $tbl_users->units_id->ViewAttributes() ?>><?php echo $tbl_users->units_id->ListViewValue() ?></div></td>
		<td<?php echo $tbl_users->cu_unit_name->CellAttributes() ?>>
<div<?php echo $tbl_users->cu_unit_name->ViewAttributes() ?>><?php echo $tbl_users->cu_unit_name->ListViewValue() ?></div></td>
		<td<?php echo $tbl_users->users_name->CellAttributes() ?>>
<div<?php echo $tbl_users->users_name->ViewAttributes() ?>><?php echo $tbl_users->users_name->ListViewValue() ?></div></td>
		<td<?php echo $tbl_users->users_nameLast->CellAttributes() ?>>
<div<?php echo $tbl_users->users_nameLast->ViewAttributes() ?>><?php echo $tbl_users->users_nameLast->ListViewValue() ?></div></td>
		<td<?php echo $tbl_users->users_nameFirst->CellAttributes() ?>>
<div<?php echo $tbl_users->users_nameFirst->ViewAttributes() ?>><?php echo $tbl_users->users_nameFirst->ListViewValue() ?></div></td>
		<td<?php echo $tbl_users->users_nameMiddle->CellAttributes() ?>>
<div<?php echo $tbl_users->users_nameMiddle->ViewAttributes() ?>><?php echo $tbl_users->users_nameMiddle->ListViewValue() ?></div></td>
		<td<?php echo $tbl_users->users_userLoginName->CellAttributes() ?>>
<div<?php echo $tbl_users->users_userLoginName->ViewAttributes() ?>><?php echo $tbl_users->users_userLoginName->ListViewValue() ?></div></td>
		<td<?php echo $tbl_users->users_password->CellAttributes() ?>>
<div<?php echo $tbl_users->users_password->ViewAttributes() ?>><?php echo $tbl_users->users_password->ListViewValue() ?></div></td>
		<td<?php echo $tbl_users->users_userLevel->CellAttributes() ?>>
<div<?php echo $tbl_users->users_userLevel->ViewAttributes() ?>><?php echo $tbl_users->users_userLevel->ListViewValue() ?></div></td>
		<td<?php echo $tbl_users->users_email->CellAttributes() ?>>
<div<?php echo $tbl_users->users_email->ViewAttributes() ?>><?php echo $tbl_users->users_email->ListViewValue() ?></div></td>
		<td<?php echo $tbl_users->users_contactNo->CellAttributes() ?>>
<div<?php echo $tbl_users->users_contactNo->ViewAttributes() ?>><?php echo $tbl_users->users_contactNo->ListViewValue() ?></div></td>
	</tr>
<?php
	$tbl_users_delete->Recordset->MoveNext();
}
$tbl_users_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$tbl_users_delete->ShowPageFooter();
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
$tbl_users_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_users_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'tbl_users';

	// Page object name
	var $PageObjName = 'tbl_users_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_users;
		if ($tbl_users->UseTokenInUrl) $PageUrl .= "t=" . $tbl_users->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_users;
		if ($tbl_users->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_users_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_users)
		if (!isset($GLOBALS["tbl_users"])) {
			$GLOBALS["tbl_users"] = new ctbl_users();
			$GLOBALS["Table"] =& $GLOBALS["tbl_users"];
		}

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_users', TRUE);

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
		global $tbl_users;

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
			$this->Page_Terminate("tbl_userslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("tbl_userslist.php");
		}

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
		global $Language, $tbl_users;

		// Load key parameters
		$this->RecKeys = $tbl_users->GetRecordKeys(); // Load record keys
		$sFilter = $tbl_users->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("tbl_userslist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in tbl_users class, tbl_usersinfo.php

		$tbl_users->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$tbl_users->CurrentAction = $_POST["a_delete"];
		} else {
			$tbl_users->CurrentAction = "I"; // Display record
		}
		switch ($tbl_users->CurrentAction) {
			case "D": // Delete
				$tbl_users->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($tbl_users->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_users;

		// Call Recordset Selecting event
		$tbl_users->Recordset_Selecting($tbl_users->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_users->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_users->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_users;
		$sFilter = $tbl_users->KeyFilter();

		// Call Row Selecting event
		$tbl_users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_users->CurrentFilter = $sFilter;
		$sSql = $tbl_users->SQL();
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
		global $conn, $tbl_users;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_users->Row_Selected($row);
		$tbl_users->users_ID->setDbValue($rs->fields('users_ID'));
		$tbl_users->cu->setDbValue($rs->fields('cu'));
		$tbl_users->units_id->setDbValue($rs->fields('units_id'));
		$tbl_users->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$tbl_users->users_name->setDbValue($rs->fields('users_name'));
		$tbl_users->users_nameLast->setDbValue($rs->fields('users_nameLast'));
		$tbl_users->users_nameFirst->setDbValue($rs->fields('users_nameFirst'));
		$tbl_users->users_nameMiddle->setDbValue($rs->fields('users_nameMiddle'));
		$tbl_users->users_userLoginName->setDbValue($rs->fields('users_userLoginName'));
		$tbl_users->users_password->setDbValue($rs->fields('users_password'));
		$tbl_users->users_userLevel->setDbValue($rs->fields('users_userLevel'));
		$tbl_users->users_email->setDbValue($rs->fields('users_email'));
		$tbl_users->users_contactNo->setDbValue($rs->fields('users_contactNo'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_users;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_users->Row_Rendering();

		// Common render codes for all row types
		// users_ID
		// cu
		// units_id
		// cu_unit_name
		// users_name
		// users_nameLast
		// users_nameFirst
		// users_nameMiddle
		// users_userLoginName
		// users_password
		// users_userLevel
		// users_email
		// users_contactNo

		if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View row

			// users_ID
			$tbl_users->users_ID->ViewValue = $tbl_users->users_ID->CurrentValue;
			$tbl_users->users_ID->ViewCustomAttributes = "";

			// cu
			$tbl_users->cu->ViewValue = $tbl_users->cu->CurrentValue;
			$tbl_users->cu->ViewCustomAttributes = "";

			// units_id
			$tbl_users->units_id->ViewValue = $tbl_users->units_id->CurrentValue;
			$tbl_users->units_id->ViewCustomAttributes = "";

			// cu_unit_name
			$tbl_users->cu_unit_name->ViewValue = $tbl_users->cu_unit_name->CurrentValue;
			$tbl_users->cu_unit_name->ViewCustomAttributes = "";

			// users_name
			$tbl_users->users_name->ViewValue = $tbl_users->users_name->CurrentValue;
			$tbl_users->users_name->ViewCustomAttributes = "";

			// users_nameLast
			$tbl_users->users_nameLast->ViewValue = $tbl_users->users_nameLast->CurrentValue;
			$tbl_users->users_nameLast->ViewCustomAttributes = "";

			// users_nameFirst
			$tbl_users->users_nameFirst->ViewValue = $tbl_users->users_nameFirst->CurrentValue;
			$tbl_users->users_nameFirst->ViewCustomAttributes = "";

			// users_nameMiddle
			$tbl_users->users_nameMiddle->ViewValue = $tbl_users->users_nameMiddle->CurrentValue;
			$tbl_users->users_nameMiddle->ViewCustomAttributes = "";

			// users_userLoginName
			$tbl_users->users_userLoginName->ViewValue = $tbl_users->users_userLoginName->CurrentValue;
			$tbl_users->users_userLoginName->ViewCustomAttributes = "";

			// users_password
			$tbl_users->users_password->ViewValue = $tbl_users->users_password->CurrentValue;
			$tbl_users->users_password->ViewCustomAttributes = "";

			// users_userLevel
			if ($Security->CanAdmin()) { // System admin
			if (strval($tbl_users->users_userLevel->CurrentValue) <> "") {
				switch ($tbl_users->users_userLevel->CurrentValue) {
					case "-1":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(1) <> "" ? $tbl_users->users_userLevel->FldTagCaption(1) : $tbl_users->users_userLevel->CurrentValue;
						break;
					case "0":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(2) <> "" ? $tbl_users->users_userLevel->FldTagCaption(2) : $tbl_users->users_userLevel->CurrentValue;
						break;
					case "1":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(3) <> "" ? $tbl_users->users_userLevel->FldTagCaption(3) : $tbl_users->users_userLevel->CurrentValue;
						break;
					case "2":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(4) <> "" ? $tbl_users->users_userLevel->FldTagCaption(4) : $tbl_users->users_userLevel->CurrentValue;
						break;
					default:
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->CurrentValue;
				}
			} else {
				$tbl_users->users_userLevel->ViewValue = NULL;
			}
			} else {
				$tbl_users->users_userLevel->ViewValue = "********";
			}
			$tbl_users->users_userLevel->ViewCustomAttributes = "";

			// users_email
			$tbl_users->users_email->ViewValue = $tbl_users->users_email->CurrentValue;
			$tbl_users->users_email->ViewCustomAttributes = "";

			// users_contactNo
			$tbl_users->users_contactNo->ViewValue = $tbl_users->users_contactNo->CurrentValue;
			$tbl_users->users_contactNo->ViewCustomAttributes = "";

			// users_ID
			$tbl_users->users_ID->LinkCustomAttributes = "";
			$tbl_users->users_ID->HrefValue = "";
			$tbl_users->users_ID->TooltipValue = "";

			// cu
			$tbl_users->cu->LinkCustomAttributes = "";
			$tbl_users->cu->HrefValue = "";
			$tbl_users->cu->TooltipValue = "";

			// units_id
			$tbl_users->units_id->LinkCustomAttributes = "";
			$tbl_users->units_id->HrefValue = "";
			$tbl_users->units_id->TooltipValue = "";

			// cu_unit_name
			$tbl_users->cu_unit_name->LinkCustomAttributes = "";
			$tbl_users->cu_unit_name->HrefValue = "";
			$tbl_users->cu_unit_name->TooltipValue = "";

			// users_name
			$tbl_users->users_name->LinkCustomAttributes = "";
			$tbl_users->users_name->HrefValue = "";
			$tbl_users->users_name->TooltipValue = "";

			// users_nameLast
			$tbl_users->users_nameLast->LinkCustomAttributes = "";
			$tbl_users->users_nameLast->HrefValue = "";
			$tbl_users->users_nameLast->TooltipValue = "";

			// users_nameFirst
			$tbl_users->users_nameFirst->LinkCustomAttributes = "";
			$tbl_users->users_nameFirst->HrefValue = "";
			$tbl_users->users_nameFirst->TooltipValue = "";

			// users_nameMiddle
			$tbl_users->users_nameMiddle->LinkCustomAttributes = "";
			$tbl_users->users_nameMiddle->HrefValue = "";
			$tbl_users->users_nameMiddle->TooltipValue = "";

			// users_userLoginName
			$tbl_users->users_userLoginName->LinkCustomAttributes = "";
			$tbl_users->users_userLoginName->HrefValue = "";
			$tbl_users->users_userLoginName->TooltipValue = "";

			// users_password
			$tbl_users->users_password->LinkCustomAttributes = "";
			$tbl_users->users_password->HrefValue = "";
			$tbl_users->users_password->TooltipValue = "";

			// users_userLevel
			$tbl_users->users_userLevel->LinkCustomAttributes = "";
			$tbl_users->users_userLevel->HrefValue = "";
			$tbl_users->users_userLevel->TooltipValue = "";

			// users_email
			$tbl_users->users_email->LinkCustomAttributes = "";
			$tbl_users->users_email->HrefValue = "";
			$tbl_users->users_email->TooltipValue = "";

			// users_contactNo
			$tbl_users->users_contactNo->LinkCustomAttributes = "";
			$tbl_users->users_contactNo->HrefValue = "";
			$tbl_users->users_contactNo->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_users->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_users->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $tbl_users;
		$DeleteRows = TRUE;
		$sSql = $tbl_users->SQL();
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

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $tbl_users->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['users_ID'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_users->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_users->CancelMessage <> "") {
				$this->setFailureMessage($tbl_users->CancelMessage);
				$tbl_users->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$tbl_users->Row_Deleted($row);
			}
		}
		return $DeleteRows;
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
