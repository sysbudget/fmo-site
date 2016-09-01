<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$default = new cdefault();
$Page =& $default;

// Page init
$default->Page_Init();

// Page main
$default->Page_Main();
?>
<?php include_once "header.php" ?>
<?php
$default->ShowMessage();
?>
<?php include_once "footer.php" ?>
<?php
$default->Page_Terminate();
?>
<?php

//
// Page class
//
class cdefault {

	// Page ID
	var $PageID = 'default';

	// Page object name
	var $PageObjName = 'default';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
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

	//
	// Page class constructor
	//
	function cdefault() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// User table object (tbl_users)
		if (!isset($GLOBALS["tbl_users"])) $GLOBALS["tbl_users"] = new ctbl_users;

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'default', TRUE);

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

	//
	// Page main
	//
	function Page_Main() {
		global $Security, $Language;
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		$Security->LoadUserLevel(); // load User Level
		if ($Security->AllowList('view_trans_tbl_accomplishment_a_mfo_1'))
		$this->Page_Terminate("view_trans_tbl_accomplishment_a_mfo_1list.php"); // Exit and go to default page
		if ($Security->AllowList('tbl_units'))
			$this->Page_Terminate("tbl_unitslist.php");
		if ($Security->AllowList('view_trans_tbl_accomplishment_a_mfo_2'))
			$this->Page_Terminate("view_trans_tbl_accomplishment_a_mfo_2list.php");
		if ($Security->AllowList('view_trans_tbl_accomplishment_a_mfo_3'))
			$this->Page_Terminate("view_trans_tbl_accomplishment_a_mfo_3list.php");
		if ($Security->AllowList('view_trans_tbl_accomplishment_a_mfo_4'))
			$this->Page_Terminate("view_trans_tbl_accomplishment_a_mfo_4list.php");
		if ($Security->AllowList('view_trans_tbl_accomplishment_a_mfo_5'))
			$this->Page_Terminate("view_trans_tbl_accomplishment_a_mfo_5list.php");
		if ($Security->AllowList('view_trans_tbl_accomplishment_b_sto'))
			$this->Page_Terminate("view_trans_tbl_accomplishment_b_stolist.php");
		if ($Security->AllowList('view_trans_tbl_accomplishment_c_gass'))
			$this->Page_Terminate("view_trans_tbl_accomplishment_c_gasslist.php");
		if ($Security->AllowList('tbl_users'))
			$this->Page_Terminate("tbl_userslist.php");
		if ($Security->AllowList('view_trans_cu_tbl_accomplishment_a_mfo_1'))
			$this->Page_Terminate("view_trans_cu_tbl_accomplishment_a_mfo_1list.php");
		if ($Security->AllowList('view_trans_cu_tbl_accomplishment_a_mfo_2'))
			$this->Page_Terminate("view_trans_cu_tbl_accomplishment_a_mfo_2list.php");
		if ($Security->AllowList('view_trans_cu_tbl_accomplishment_a_mfo_3'))
			$this->Page_Terminate("view_trans_cu_tbl_accomplishment_a_mfo_3list.php");
		if ($Security->AllowList('view_trans_cu_tbl_accomplishment_a_mfo_4'))
			$this->Page_Terminate("view_trans_cu_tbl_accomplishment_a_mfo_4list.php");
		if ($Security->AllowList('view_trans_cu_tbl_accomplishment_a_mfo_5'))
			$this->Page_Terminate("view_trans_cu_tbl_accomplishment_a_mfo_5list.php");
		if ($Security->AllowList('view_trans_cu_tbl_accomplishment_b_sto'))
			$this->Page_Terminate("view_trans_cu_tbl_accomplishment_b_stolist.php");
		if ($Security->AllowList('view_trans_cu_tbl_accomplishment_c_gass'))
			$this->Page_Terminate("view_trans_cu_tbl_accomplishment_c_gasslist.php");
		if ($Security->AllowList('tbl_collectionperiod'))
			$this->Page_Terminate("tbl_collectionperiodlist.php");
		if ($Security->AllowList('view_reps_1_3_forma'))
			$this->Page_Terminate("view_reps_1_3_formalist.php");
		if ($Security->AllowList('audittrail'))
			$this->Page_Terminate("audittraillist.php");
		if ($Security->AllowList('view_reps_2_2_forma_1'))
			$this->Page_Terminate("view_reps_2_2_forma_1list.php");
		if ($Security->AllowList('view_reps_3_3_completion_status'))
			$this->Page_Terminate("view_reps_3_3_completion_statuslist.php");
		if ($Security->AllowList('view_reps_4_3_eligible_status'))
			$this->Page_Terminate("view_reps_4_3_eligible_statuslist.php");
		if ($Security->IsLoggedIn()) {
			$this->setFailureMessage($Language->Phrase("NoPermission") . "<br><br><a href=\"logout.php\">" . $Language->Phrase("BackToLogin") . "</a>");
		} else {
			$this->Page_Terminate("login.php"); // Exit and go to login page
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
}
?>
