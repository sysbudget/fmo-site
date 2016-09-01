<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_9_m_sa_users_delete = new cfrm_9_m_sa_users_delete();
$Page =& $frm_9_m_sa_users_delete;

// Page init
$frm_9_m_sa_users_delete->Page_Init();

// Page main
$frm_9_m_sa_users_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_9_m_sa_users_delete = new up_Page("frm_9_m_sa_users_delete");

// page properties
frm_9_m_sa_users_delete.PageID = "delete"; // page ID
frm_9_m_sa_users_delete.FormID = "ffrm_9_m_sa_usersdelete"; // form ID
var UP_PAGE_ID = frm_9_m_sa_users_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_9_m_sa_users_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_9_m_sa_users_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_9_m_sa_users_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_9_m_sa_users_delete.ValidateRequired = false; // no JavaScript validation
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
if ($frm_9_m_sa_users_delete->Recordset = $frm_9_m_sa_users_delete->LoadRecordset())
	$frm_9_m_sa_users_deleteTotalRecs = $frm_9_m_sa_users_delete->Recordset->RecordCount(); // Get record count
if ($frm_9_m_sa_users_deleteTotalRecs <= 0) { // No record found, exit
	if ($frm_9_m_sa_users_delete->Recordset)
		$frm_9_m_sa_users_delete->Recordset->Close();
	$frm_9_m_sa_users_delete->Page_Terminate("frm_9_m_sa_userslist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_9_m_sa_users->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_9_m_sa_users->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_9_m_sa_users_delete->ShowPageHeader(); ?>
<?php
$frm_9_m_sa_users_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="frm_9_m_sa_users">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($frm_9_m_sa_users_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $frm_9_m_sa_users->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $frm_9_m_sa_users->CU->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_users->Delivery_Unit->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_users->Contributor_Unit->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_users->Login_Name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_users->Password->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_users->User_Level->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_users->User_Name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_users->zEmail->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_9_m_sa_users->Contact_No2E->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$frm_9_m_sa_users_delete->RecCnt = 0;
$i = 0;
while (!$frm_9_m_sa_users_delete->Recordset->EOF) {
	$frm_9_m_sa_users_delete->RecCnt++;

	// Set row properties
	$frm_9_m_sa_users->ResetAttrs();
	$frm_9_m_sa_users->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$frm_9_m_sa_users_delete->LoadRowValues($frm_9_m_sa_users_delete->Recordset);

	// Render row
	$frm_9_m_sa_users_delete->RenderRow();
?>
	<tr<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
		<td<?php echo $frm_9_m_sa_users->CU->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->CU->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->CU->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_users->Delivery_Unit->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->Delivery_Unit->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_users->Contributor_Unit->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->Contributor_Unit->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->Contributor_Unit->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_users->Login_Name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->Login_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->Login_Name->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_users->Password->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->Password->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->Password->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_users->User_Level->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->User_Level->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->User_Level->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_users->User_Name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->User_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->User_Name->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_users->zEmail->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->zEmail->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->zEmail->ListViewValue() ?></div></td>
		<td<?php echo $frm_9_m_sa_users->Contact_No2E->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->Contact_No2E->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->Contact_No2E->ListViewValue() ?></div></td>
	</tr>
<?php
	$frm_9_m_sa_users_delete->Recordset->MoveNext();
}
$frm_9_m_sa_users_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$frm_9_m_sa_users_delete->ShowPageFooter();
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
$frm_9_m_sa_users_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_9_m_sa_users_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'frm_9_m_sa_users';

	// Page object name
	var $PageObjName = 'frm_9_m_sa_users_delete';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_9_m_sa_users;
		if ($frm_9_m_sa_users->UseTokenInUrl) $PageUrl .= "t=" . $frm_9_m_sa_users->TableVar . "&"; // Add page token
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
		global $objForm, $frm_9_m_sa_users;
		if ($frm_9_m_sa_users->UseTokenInUrl) {
			if ($objForm)
				return ($frm_9_m_sa_users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_9_m_sa_users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_9_m_sa_users_delete() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS["frm_9_m_sa_users"])) {
			$GLOBALS["frm_9_m_sa_users"] = new cfrm_9_m_sa_users();
			$GLOBALS["Table"] =& $GLOBALS["frm_9_m_sa_users"];
		}

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_9_m_sa_users', TRUE);

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
		global $frm_9_m_sa_users;

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
			$this->Page_Terminate("frm_9_m_sa_userslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_9_m_sa_userslist.php");
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
		global $Language, $frm_9_m_sa_users;

		// Load key parameters
		$this->RecKeys = $frm_9_m_sa_users->GetRecordKeys(); // Load record keys
		$sFilter = $frm_9_m_sa_users->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("frm_9_m_sa_userslist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in frm_9_m_sa_users class, frm_9_m_sa_usersinfo.php

		$frm_9_m_sa_users->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$frm_9_m_sa_users->CurrentAction = $_POST["a_delete"];
		} else {
			$frm_9_m_sa_users->CurrentAction = "I"; // Display record
		}
		switch ($frm_9_m_sa_users->CurrentAction) {
			case "D": // Delete
				$frm_9_m_sa_users->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($frm_9_m_sa_users->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_9_m_sa_users;

		// Call Recordset Selecting event
		$frm_9_m_sa_users->Recordset_Selecting($frm_9_m_sa_users->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_9_m_sa_users->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_9_m_sa_users->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_9_m_sa_users;
		$sFilter = $frm_9_m_sa_users->KeyFilter();

		// Call Row Selecting event
		$frm_9_m_sa_users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_9_m_sa_users->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_users->SQL();
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
		global $conn, $frm_9_m_sa_users;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_9_m_sa_users->Row_Selected($row);
		$frm_9_m_sa_users->users_id->setDbValue($rs->fields('users_id'));
		$frm_9_m_sa_users->unit_contributor_id->setDbValue($rs->fields('unit_contributor_id'));
		$frm_9_m_sa_users->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_9_m_sa_users->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_9_m_sa_users->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_9_m_sa_users->CU->setDbValue($rs->fields('CU'));
		$frm_9_m_sa_users->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$frm_9_m_sa_users->Contributor_Unit->setDbValue($rs->fields('Contributor Unit'));
		$frm_9_m_sa_users->Login_Name->setDbValue($rs->fields('Login Name'));
		$frm_9_m_sa_users->Password->setDbValue($rs->fields('Password'));
		$frm_9_m_sa_users->User_Level->setDbValue($rs->fields('User Level'));
		$frm_9_m_sa_users->User_Name->setDbValue($rs->fields('User Name'));
		$frm_9_m_sa_users->Last_Name->setDbValue($rs->fields('Last Name'));
		$frm_9_m_sa_users->First_Name->setDbValue($rs->fields('First Name'));
		$frm_9_m_sa_users->Middle_Name->setDbValue($rs->fields('Middle Name'));
		$frm_9_m_sa_users->zEmail->setDbValue($rs->fields('Email'));
		$frm_9_m_sa_users->Contact_No2E->setDbValue($rs->fields('Contact No.'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_users;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_9_m_sa_users->Row_Rendering();

		// Common render codes for all row types
		// users_id
		// unit_contributor_id
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// CU

		$frm_9_m_sa_users->CU->CellCssStyle = "white-space: nowrap;";

		// Delivery Unit
		$frm_9_m_sa_users->Delivery_Unit->CellCssStyle = "white-space: nowrap;";

		// Contributor Unit
		$frm_9_m_sa_users->Contributor_Unit->CellCssStyle = "white-space: nowrap;";

		// Login Name
		$frm_9_m_sa_users->Login_Name->CellCssStyle = "white-space: nowrap;";

		// Password
		$frm_9_m_sa_users->Password->CellCssStyle = "white-space: nowrap;";

		// User Level
		$frm_9_m_sa_users->User_Level->CellCssStyle = "white-space: nowrap;";

		// User Name
		$frm_9_m_sa_users->User_Name->CellCssStyle = "white-space: nowrap;";

		// Last Name
		$frm_9_m_sa_users->Last_Name->CellCssStyle = "white-space: nowrap;";

		// First Name
		$frm_9_m_sa_users->First_Name->CellCssStyle = "white-space: nowrap;";

		// Middle Name
		$frm_9_m_sa_users->Middle_Name->CellCssStyle = "white-space: nowrap;";

		// Email
		$frm_9_m_sa_users->zEmail->CellCssStyle = "white-space: nowrap;";

		// Contact No.
		$frm_9_m_sa_users->Contact_No2E->CellCssStyle = "white-space: nowrap;";
		if ($frm_9_m_sa_users->RowType == UP_ROWTYPE_VIEW) { // View row

			// CU
			$frm_9_m_sa_users->CU->ViewValue = $frm_9_m_sa_users->CU->CurrentValue;
			$frm_9_m_sa_users->CU->ViewCustomAttributes = "";

			// Delivery Unit
			$frm_9_m_sa_users->Delivery_Unit->ViewValue = $frm_9_m_sa_users->Delivery_Unit->CurrentValue;
			$frm_9_m_sa_users->Delivery_Unit->ViewCustomAttributes = "";

			// Contributor Unit
			$frm_9_m_sa_users->Contributor_Unit->ViewValue = $frm_9_m_sa_users->Contributor_Unit->CurrentValue;
			$frm_9_m_sa_users->Contributor_Unit->ViewCustomAttributes = "";

			// Login Name
			$frm_9_m_sa_users->Login_Name->ViewValue = $frm_9_m_sa_users->Login_Name->CurrentValue;
			$frm_9_m_sa_users->Login_Name->ViewCustomAttributes = "";

			// Password
			$frm_9_m_sa_users->Password->ViewValue = $frm_9_m_sa_users->Password->CurrentValue;
			$frm_9_m_sa_users->Password->ViewCustomAttributes = "";

			// User Level
			if ($Security->CanAdmin()) { // System admin
			if (strval($frm_9_m_sa_users->User_Level->CurrentValue) <> "") {
				switch ($frm_9_m_sa_users->User_Level->CurrentValue) {
					case "-1":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(1) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(1) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "0":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(2) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(2) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "1":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(3) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(3) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "2":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(4) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(4) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "3":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(5) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(5) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "4":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(6) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(6) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					default:
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->CurrentValue;
				}
			} else {
				$frm_9_m_sa_users->User_Level->ViewValue = NULL;
			}
			} else {
				$frm_9_m_sa_users->User_Level->ViewValue = "********";
			}
			$frm_9_m_sa_users->User_Level->ViewCustomAttributes = "";

			// User Name
			$frm_9_m_sa_users->User_Name->ViewValue = $frm_9_m_sa_users->User_Name->CurrentValue;
			$frm_9_m_sa_users->User_Name->ViewCustomAttributes = "";

			// Email
			$frm_9_m_sa_users->zEmail->ViewValue = $frm_9_m_sa_users->zEmail->CurrentValue;
			$frm_9_m_sa_users->zEmail->ViewCustomAttributes = "";

			// Contact No.
			$frm_9_m_sa_users->Contact_No2E->ViewValue = $frm_9_m_sa_users->Contact_No2E->CurrentValue;
			$frm_9_m_sa_users->Contact_No2E->ViewCustomAttributes = "";

			// CU
			$frm_9_m_sa_users->CU->LinkCustomAttributes = "";
			$frm_9_m_sa_users->CU->HrefValue = "";
			$frm_9_m_sa_users->CU->TooltipValue = "";

			// Delivery Unit
			$frm_9_m_sa_users->Delivery_Unit->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Delivery_Unit->HrefValue = "";
			$frm_9_m_sa_users->Delivery_Unit->TooltipValue = "";

			// Contributor Unit
			$frm_9_m_sa_users->Contributor_Unit->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Contributor_Unit->HrefValue = "";
			$frm_9_m_sa_users->Contributor_Unit->TooltipValue = "";

			// Login Name
			$frm_9_m_sa_users->Login_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Login_Name->HrefValue = "";
			$frm_9_m_sa_users->Login_Name->TooltipValue = "";

			// Password
			$frm_9_m_sa_users->Password->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Password->HrefValue = "";
			$frm_9_m_sa_users->Password->TooltipValue = "";

			// User Level
			$frm_9_m_sa_users->User_Level->LinkCustomAttributes = "";
			$frm_9_m_sa_users->User_Level->HrefValue = "";
			$frm_9_m_sa_users->User_Level->TooltipValue = "";

			// User Name
			$frm_9_m_sa_users->User_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_users->User_Name->HrefValue = "";
			$frm_9_m_sa_users->User_Name->TooltipValue = "";

			// Email
			$frm_9_m_sa_users->zEmail->LinkCustomAttributes = "";
			$frm_9_m_sa_users->zEmail->HrefValue = "";
			$frm_9_m_sa_users->zEmail->TooltipValue = "";

			// Contact No.
			$frm_9_m_sa_users->Contact_No2E->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Contact_No2E->HrefValue = "";
			$frm_9_m_sa_users->Contact_No2E->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_9_m_sa_users->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_9_m_sa_users->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $frm_9_m_sa_users;
		$DeleteRows = TRUE;
		$sSql = $frm_9_m_sa_users->SQL();
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
				$DeleteRows = $frm_9_m_sa_users->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['users_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_9_m_sa_users->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_9_m_sa_users->CancelMessage <> "") {
				$this->setFailureMessage($frm_9_m_sa_users->CancelMessage);
				$frm_9_m_sa_users->CancelMessage = "";
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
				$frm_9_m_sa_users->Row_Deleted($row);
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
