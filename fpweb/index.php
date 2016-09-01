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
		if ($Security->AllowList('tbl_uporgchart_cu'))
			$this->Page_Terminate("tbl_uporgchart_culist.php");
		if ($Security->AllowList('ref_academicyear'))
		$this->Page_Terminate("ref_academicyearlist.php"); // Exit and go to default page
		if ($Security->AllowList('ref_degreelevel_degrees'))
			$this->Page_Terminate("ref_degreelevel_degreeslist.php");
		if ($Security->AllowList('ref_degreelevel_faculty'))
			$this->Page_Terminate("ref_degreelevel_facultylist.php");
		if ($Security->AllowList('ref_disciplinechedcodes_major'))
			$this->Page_Terminate("ref_disciplinechedcodes_majorlist.php");
		if ($Security->AllowList('ref_disciplinechedcodes_minor'))
			$this->Page_Terminate("ref_disciplinechedcodes_minorlist.php");
		if ($Security->AllowList('ref_facultygroup'))
			$this->Page_Terminate("ref_facultygrouplist.php");
		if ($Security->AllowList('ref_facultyrank'))
			$this->Page_Terminate("ref_facultyranklist.php");
		if ($Security->AllowList('ref_hda_inactivepursuitofhigherdegree'))
			$this->Page_Terminate("ref_hda_inactivepursuitofhigherdegreelist.php");
		if ($Security->AllowList('ref_leavecode'))
			$this->Page_Terminate("ref_leavecodelist.php");
		if ($Security->AllowList('ref_salaryscale'))
			$this->Page_Terminate("ref_salaryscalelist.php");
		if ($Security->AllowList('ref_tenurecode'))
			$this->Page_Terminate("ref_tenurecodelist.php");
		if ($Security->AllowList('tbl_audittrail'))
			$this->Page_Terminate("tbl_audittraillist.php");
		if ($Security->AllowList('tbl_collectionperiod'))
			$this->Page_Terminate("tbl_collectionperiodlist.php");
		if ($Security->AllowList('tbl_degrees'))
			$this->Page_Terminate("tbl_degreeslist.php");
		if ($Security->AllowList('tbl_faculty'))
			$this->Page_Terminate("tbl_facultylist.php");
		if ($Security->AllowList('tbl_profile'))
			$this->Page_Terminate("tbl_profilelist.php");
		if ($Security->AllowList('tbl_uporgchart_cu'))
			$this->Page_Terminate("tbl_uporgchart_culist.php");
		if ($Security->AllowList('tbl_uporgchart_location'))
			$this->Page_Terminate("tbl_uporgchart_locationlist.php");
		if ($Security->AllowList('tbl_uporgchart_unit'))
			$this->Page_Terminate("tbl_uporgchart_unitlist.php");
		if ($Security->AllowList('tbl_users'))
			$this->Page_Terminate("tbl_userslist.php");
		if ($Security->AllowList('view_tbl_profile_admin'))
			$this->Page_Terminate("view_tbl_profile_adminlist.php");
		if ($Security->AllowList('view_tbl_uporgchart_cu_users'))
			$this->Page_Terminate("view_tbl_uporgchart_cu_userslist.php");
		if ($Security->AllowList('view_tbl_collectionperiod_admin'))
			$this->Page_Terminate("view_tbl_collectionperiod_adminlist.php");
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
