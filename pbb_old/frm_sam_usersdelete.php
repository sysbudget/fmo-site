<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_sam_usersinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_sam_users_delete = new cfrm_sam_users_delete();
$Page =& $frm_sam_users_delete;

// Page init
$frm_sam_users_delete->Page_Init();

// Page main
$frm_sam_users_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_users_delete = new up_Page("frm_sam_users_delete");

// page properties
frm_sam_users_delete.PageID = "delete"; // page ID
frm_sam_users_delete.FormID = "ffrm_sam_usersdelete"; // form ID
var UP_PAGE_ID = frm_sam_users_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_sam_users_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_users_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_users_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_users_delete.ValidateRequired = false; // no JavaScript validation
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
if ($frm_sam_users_delete->Recordset = $frm_sam_users_delete->LoadRecordset())
	$frm_sam_users_deleteTotalRecs = $frm_sam_users_delete->Recordset->RecordCount(); // Get record count
if ($frm_sam_users_deleteTotalRecs <= 0) { // No record found, exit
	if ($frm_sam_users_delete->Recordset)
		$frm_sam_users_delete->Recordset->Close();
	$frm_sam_users_delete->Page_Terminate("frm_sam_userslist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_users->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_sam_users->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_sam_users_delete->ShowPageHeader(); ?>
<?php
$frm_sam_users_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="frm_sam_users">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($frm_sam_users_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $frm_sam_users->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $frm_sam_users->users_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_users->cu->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_users->units_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_users->cu_unit_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_users->users_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_users->users_nameLast->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_users->users_nameFirst->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_users->users_nameMiddle->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_users->users_userLoginName->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_users->users_password->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_users->users_userLevel->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_users->users_email->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_sam_users->users_contactNo->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$frm_sam_users_delete->RecCnt = 0;
$i = 0;
while (!$frm_sam_users_delete->Recordset->EOF) {
	$frm_sam_users_delete->RecCnt++;

	// Set row properties
	$frm_sam_users->ResetAttrs();
	$frm_sam_users->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$frm_sam_users_delete->LoadRowValues($frm_sam_users_delete->Recordset);

	// Render row
	$frm_sam_users_delete->RenderRow();
?>
	<tr<?php echo $frm_sam_users->RowAttributes() ?>>
		<td<?php echo $frm_sam_users->users_ID->CellAttributes() ?>>
<div<?php echo $frm_sam_users->users_ID->ViewAttributes() ?>><?php echo $frm_sam_users->users_ID->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_users->cu->CellAttributes() ?>>
<div<?php echo $frm_sam_users->cu->ViewAttributes() ?>><?php echo $frm_sam_users->cu->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_users->units_id->CellAttributes() ?>>
<div<?php echo $frm_sam_users->units_id->ViewAttributes() ?>><?php echo $frm_sam_users->units_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_users->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_sam_users->cu_unit_name->ViewAttributes() ?>><?php echo $frm_sam_users->cu_unit_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_users->users_name->CellAttributes() ?>>
<div<?php echo $frm_sam_users->users_name->ViewAttributes() ?>><?php echo $frm_sam_users->users_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_users->users_nameLast->CellAttributes() ?>>
<div<?php echo $frm_sam_users->users_nameLast->ViewAttributes() ?>><?php echo $frm_sam_users->users_nameLast->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_users->users_nameFirst->CellAttributes() ?>>
<div<?php echo $frm_sam_users->users_nameFirst->ViewAttributes() ?>><?php echo $frm_sam_users->users_nameFirst->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_users->users_nameMiddle->CellAttributes() ?>>
<div<?php echo $frm_sam_users->users_nameMiddle->ViewAttributes() ?>><?php echo $frm_sam_users->users_nameMiddle->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_users->users_userLoginName->CellAttributes() ?>>
<div<?php echo $frm_sam_users->users_userLoginName->ViewAttributes() ?>><?php echo $frm_sam_users->users_userLoginName->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_users->users_password->CellAttributes() ?>>
<div<?php echo $frm_sam_users->users_password->ViewAttributes() ?>><?php echo $frm_sam_users->users_password->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_users->users_userLevel->CellAttributes() ?>>
<div<?php echo $frm_sam_users->users_userLevel->ViewAttributes() ?>><?php echo $frm_sam_users->users_userLevel->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_users->users_email->CellAttributes() ?>>
<div<?php echo $frm_sam_users->users_email->ViewAttributes() ?>><?php echo $frm_sam_users->users_email->ListViewValue() ?></div></td>
		<td<?php echo $frm_sam_users->users_contactNo->CellAttributes() ?>>
<div<?php echo $frm_sam_users->users_contactNo->ViewAttributes() ?>><?php echo $frm_sam_users->users_contactNo->ListViewValue() ?></div></td>
	</tr>
<?php
	$frm_sam_users_delete->Recordset->MoveNext();
}
$frm_sam_users_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$frm_sam_users_delete->ShowPageFooter();
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
$frm_sam_users_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_users_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'frm_sam_users';

	// Page object name
	var $PageObjName = 'frm_sam_users_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_users;
		if ($frm_sam_users->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_users->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_users;
		if ($frm_sam_users->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_users_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_users)
		if (!isset($GLOBALS["frm_sam_users"])) {
			$GLOBALS["frm_sam_users"] = new cfrm_sam_users();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_users"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_users', TRUE);

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
		global $frm_sam_users;

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
			$this->Page_Terminate("frm_sam_userslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_sam_userslist.php");
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
		global $Language, $frm_sam_users;

		// Load key parameters
		$this->RecKeys = $frm_sam_users->GetRecordKeys(); // Load record keys
		$sFilter = $frm_sam_users->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("frm_sam_userslist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in frm_sam_users class, frm_sam_usersinfo.php

		$frm_sam_users->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$frm_sam_users->CurrentAction = $_POST["a_delete"];
		} else {
			$frm_sam_users->CurrentAction = "I"; // Display record
		}
		switch ($frm_sam_users->CurrentAction) {
			case "D": // Delete
				$frm_sam_users->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($frm_sam_users->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_sam_users;

		// Call Recordset Selecting event
		$frm_sam_users->Recordset_Selecting($frm_sam_users->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_sam_users->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_sam_users->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_users;
		$sFilter = $frm_sam_users->KeyFilter();

		// Call Row Selecting event
		$frm_sam_users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_users->CurrentFilter = $sFilter;
		$sSql = $frm_sam_users->SQL();
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
		global $conn, $frm_sam_users;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_users->Row_Selected($row);
		$frm_sam_users->users_ID->setDbValue($rs->fields('users_ID'));
		$frm_sam_users->cu->setDbValue($rs->fields('cu'));
		$frm_sam_users->units_id->setDbValue($rs->fields('units_id'));
		$frm_sam_users->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_sam_users->users_name->setDbValue($rs->fields('users_name'));
		$frm_sam_users->users_nameLast->setDbValue($rs->fields('users_nameLast'));
		$frm_sam_users->users_nameFirst->setDbValue($rs->fields('users_nameFirst'));
		$frm_sam_users->users_nameMiddle->setDbValue($rs->fields('users_nameMiddle'));
		$frm_sam_users->users_userLoginName->setDbValue($rs->fields('users_userLoginName'));
		$frm_sam_users->users_password->setDbValue($rs->fields('users_password'));
		$frm_sam_users->users_userLevel->setDbValue($rs->fields('users_userLevel'));
		$frm_sam_users->users_email->setDbValue($rs->fields('users_email'));
		$frm_sam_users->users_contactNo->setDbValue($rs->fields('users_contactNo'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_users;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_sam_users->Row_Rendering();

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

		if ($frm_sam_users->RowType == UP_ROWTYPE_VIEW) { // View row

			// users_ID
			$frm_sam_users->users_ID->ViewValue = $frm_sam_users->users_ID->CurrentValue;
			$frm_sam_users->users_ID->ViewCustomAttributes = "";

			// cu
			$frm_sam_users->cu->ViewValue = $frm_sam_users->cu->CurrentValue;
			$frm_sam_users->cu->ViewCustomAttributes = "";

			// units_id
			$frm_sam_users->units_id->ViewValue = $frm_sam_users->units_id->CurrentValue;
			$frm_sam_users->units_id->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_sam_users->cu_unit_name->ViewValue = $frm_sam_users->cu_unit_name->CurrentValue;
			$frm_sam_users->cu_unit_name->ViewCustomAttributes = "";

			// users_name
			$frm_sam_users->users_name->ViewValue = $frm_sam_users->users_name->CurrentValue;
			$frm_sam_users->users_name->ViewCustomAttributes = "";

			// users_nameLast
			$frm_sam_users->users_nameLast->ViewValue = $frm_sam_users->users_nameLast->CurrentValue;
			$frm_sam_users->users_nameLast->ViewCustomAttributes = "";

			// users_nameFirst
			$frm_sam_users->users_nameFirst->ViewValue = $frm_sam_users->users_nameFirst->CurrentValue;
			$frm_sam_users->users_nameFirst->ViewCustomAttributes = "";

			// users_nameMiddle
			$frm_sam_users->users_nameMiddle->ViewValue = $frm_sam_users->users_nameMiddle->CurrentValue;
			$frm_sam_users->users_nameMiddle->ViewCustomAttributes = "";

			// users_userLoginName
			$frm_sam_users->users_userLoginName->ViewValue = $frm_sam_users->users_userLoginName->CurrentValue;
			$frm_sam_users->users_userLoginName->ViewCustomAttributes = "";

			// users_password
			$frm_sam_users->users_password->ViewValue = $frm_sam_users->users_password->CurrentValue;
			$frm_sam_users->users_password->ViewCustomAttributes = "";

			// users_userLevel
			if (strval($frm_sam_users->users_userLevel->CurrentValue) <> "") {
				switch ($frm_sam_users->users_userLevel->CurrentValue) {
					case "-1":
						$frm_sam_users->users_userLevel->ViewValue = $frm_sam_users->users_userLevel->FldTagCaption(1) <> "" ? $frm_sam_users->users_userLevel->FldTagCaption(1) : $frm_sam_users->users_userLevel->CurrentValue;
						break;
					case "0":
						$frm_sam_users->users_userLevel->ViewValue = $frm_sam_users->users_userLevel->FldTagCaption(2) <> "" ? $frm_sam_users->users_userLevel->FldTagCaption(2) : $frm_sam_users->users_userLevel->CurrentValue;
						break;
					case "1":
						$frm_sam_users->users_userLevel->ViewValue = $frm_sam_users->users_userLevel->FldTagCaption(3) <> "" ? $frm_sam_users->users_userLevel->FldTagCaption(3) : $frm_sam_users->users_userLevel->CurrentValue;
						break;
					case "2":
						$frm_sam_users->users_userLevel->ViewValue = $frm_sam_users->users_userLevel->FldTagCaption(4) <> "" ? $frm_sam_users->users_userLevel->FldTagCaption(4) : $frm_sam_users->users_userLevel->CurrentValue;
						break;
					default:
						$frm_sam_users->users_userLevel->ViewValue = $frm_sam_users->users_userLevel->CurrentValue;
				}
			} else {
				$frm_sam_users->users_userLevel->ViewValue = NULL;
			}
			$frm_sam_users->users_userLevel->ViewCustomAttributes = "";

			// users_email
			$frm_sam_users->users_email->ViewValue = $frm_sam_users->users_email->CurrentValue;
			$frm_sam_users->users_email->ViewCustomAttributes = "";

			// users_contactNo
			$frm_sam_users->users_contactNo->ViewValue = $frm_sam_users->users_contactNo->CurrentValue;
			$frm_sam_users->users_contactNo->ViewCustomAttributes = "";

			// users_ID
			$frm_sam_users->users_ID->LinkCustomAttributes = "";
			$frm_sam_users->users_ID->HrefValue = "";
			$frm_sam_users->users_ID->TooltipValue = "";

			// cu
			$frm_sam_users->cu->LinkCustomAttributes = "";
			$frm_sam_users->cu->HrefValue = "";
			$frm_sam_users->cu->TooltipValue = "";

			// units_id
			$frm_sam_users->units_id->LinkCustomAttributes = "";
			$frm_sam_users->units_id->HrefValue = "";
			$frm_sam_users->units_id->TooltipValue = "";

			// cu_unit_name
			$frm_sam_users->cu_unit_name->LinkCustomAttributes = "";
			$frm_sam_users->cu_unit_name->HrefValue = "";
			$frm_sam_users->cu_unit_name->TooltipValue = "";

			// users_name
			$frm_sam_users->users_name->LinkCustomAttributes = "";
			$frm_sam_users->users_name->HrefValue = "";
			$frm_sam_users->users_name->TooltipValue = "";

			// users_nameLast
			$frm_sam_users->users_nameLast->LinkCustomAttributes = "";
			$frm_sam_users->users_nameLast->HrefValue = "";
			$frm_sam_users->users_nameLast->TooltipValue = "";

			// users_nameFirst
			$frm_sam_users->users_nameFirst->LinkCustomAttributes = "";
			$frm_sam_users->users_nameFirst->HrefValue = "";
			$frm_sam_users->users_nameFirst->TooltipValue = "";

			// users_nameMiddle
			$frm_sam_users->users_nameMiddle->LinkCustomAttributes = "";
			$frm_sam_users->users_nameMiddle->HrefValue = "";
			$frm_sam_users->users_nameMiddle->TooltipValue = "";

			// users_userLoginName
			$frm_sam_users->users_userLoginName->LinkCustomAttributes = "";
			$frm_sam_users->users_userLoginName->HrefValue = "";
			$frm_sam_users->users_userLoginName->TooltipValue = "";

			// users_password
			$frm_sam_users->users_password->LinkCustomAttributes = "";
			$frm_sam_users->users_password->HrefValue = "";
			$frm_sam_users->users_password->TooltipValue = "";

			// users_userLevel
			$frm_sam_users->users_userLevel->LinkCustomAttributes = "";
			$frm_sam_users->users_userLevel->HrefValue = "";
			$frm_sam_users->users_userLevel->TooltipValue = "";

			// users_email
			$frm_sam_users->users_email->LinkCustomAttributes = "";
			$frm_sam_users->users_email->HrefValue = "";
			$frm_sam_users->users_email->TooltipValue = "";

			// users_contactNo
			$frm_sam_users->users_contactNo->LinkCustomAttributes = "";
			$frm_sam_users->users_contactNo->HrefValue = "";
			$frm_sam_users->users_contactNo->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_sam_users->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_users->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $frm_sam_users;
		$DeleteRows = TRUE;
		$sSql = $frm_sam_users->SQL();
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
				$DeleteRows = $frm_sam_users->Row_Deleting($row);
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
				$DeleteRows = $conn->Execute($frm_sam_users->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_sam_users->CancelMessage <> "") {
				$this->setFailureMessage($frm_sam_users->CancelMessage);
				$frm_sam_users->CancelMessage = "";
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
				$frm_sam_users->Row_Deleted($row);
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
