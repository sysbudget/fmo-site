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
		if ($Security->AllowList('frm_u_rep_t_completion_status_unit_mfo'))
		$this->Page_Terminate("frm_u_rep_t_completion_status_unit_mfolist.php"); // Exit and go to default page
		if ($Security->AllowList('frm_fp_pbb_detail_accomplishment'))
			$this->Page_Terminate("frm_fp_pbb_detail_accomplishmentlist.php");
		if ($Security->AllowList('frm_fp_pbb_detail_target'))
			$this->Page_Terminate("frm_fp_pbb_detail_targetlist.php");
		if ($Security->AllowList('frm_fp_rep_a_eligible_status'))
			$this->Page_Terminate("frm_fp_rep_a_eligible_statuslist.php");
		if ($Security->AllowList('frm_fp_rep_a_eligible_status_unit'))
			$this->Page_Terminate("frm_fp_rep_a_eligible_status_unitlist.php");
		if ($Security->AllowList('frm_fp_rep_a_eligible_status_unit_mfo'))
			$this->Page_Terminate("frm_fp_rep_a_eligible_status_unit_mfolist.php");
		if ($Security->AllowList('frm_fp_rep_t_completion_status_unit_mfo'))
			$this->Page_Terminate("frm_fp_rep_t_completion_status_unit_mfolist.php");
		if ($Security->AllowList('frm_fp_rep_t_completion_status_unit_pi'))
			$this->Page_Terminate("frm_fp_rep_t_completion_status_unit_pilist.php");
		if ($Security->AllowList('frm_fp_rep_ta_form_a_1'))
			$this->Page_Terminate("frm_fp_rep_ta_form_a_1list.php");
		if ($Security->AllowList('frm_fp_rep_ta_form_a_1_iatf'))
			$this->Page_Terminate("frm_fp_rep_ta_form_a_1_iatflist.php");
		if ($Security->AllowList('frm_fp_rep_ta_form_a_1_iatf_header'))
			$this->Page_Terminate("frm_fp_rep_ta_form_a_1_iatf_headerlist.php");
		if ($Security->AllowList('frm_fp_rep_ta_form_a_cu'))
			$this->Page_Terminate("frm_fp_rep_ta_form_a_culist.php");
		if ($Security->AllowList('frm_fp_units'))
			$this->Page_Terminate("frm_fp_unitslist.php");
		if ($Security->AllowList('frm_sam_collection_period'))
			$this->Page_Terminate("frm_sam_collection_periodlist.php");
		if ($Security->AllowList('frm_sam_cu_executive_offices'))
			$this->Page_Terminate("frm_sam_cu_executive_officeslist.php");
		if ($Security->AllowList('frm_sam_cutoffdate'))
			$this->Page_Terminate("frm_sam_cutoffdatelist.php");
		if ($Security->AllowList('frm_sam_mfo_questions'))
			$this->Page_Terminate("frm_sam_mfo_questionslist.php");
		if ($Security->AllowList('frm_sam_mfo_questions_cu'))
			$this->Page_Terminate("frm_sam_mfo_questions_culist.php");
		if ($Security->AllowList('frm_sam_pbb_detail'))
			$this->Page_Terminate("frm_sam_pbb_detaillist.php");
		if ($Security->AllowList('frm_sam_rep_a_monitor_above_100'))
			$this->Page_Terminate("frm_sam_rep_a_monitor_above_100list.php");
		if ($Security->AllowList('frm_sam_rep_t_completion_status'))
			$this->Page_Terminate("frm_sam_rep_t_completion_statuslist.php");
		if ($Security->AllowList('frm_sam_rep_t_completion_status_unit_mfo'))
			$this->Page_Terminate("frm_sam_rep_t_completion_status_unit_mfolist.php");
		if ($Security->AllowList('frm_sam_rep_t_completion_status_unit_pi'))
			$this->Page_Terminate("frm_sam_rep_t_completion_status_unit_pilist.php");
		if ($Security->AllowList('frm_sam_rep_ta_form_a_0_cu'))
			$this->Page_Terminate("frm_sam_rep_ta_form_a_0_culist.php");
		if ($Security->AllowList('frm_sam_rep_ta_form_a_1'))
			$this->Page_Terminate("frm_sam_rep_ta_form_a_1list.php");
		if ($Security->AllowList('frm_sam_rep_ta_val_form_a_0_based_on_cu'))
			$this->Page_Terminate("frm_sam_rep_ta_val_form_a_0_based_on_culist.php");
		if ($Security->AllowList('frm_sam_units'))
			$this->Page_Terminate("frm_sam_unitslist.php");
		if ($Security->AllowList('frm_sam_users'))
			$this->Page_Terminate("frm_sam_userslist.php");
		if ($Security->AllowList('frm_u_pbb_detail_accomplishment'))
			$this->Page_Terminate("frm_u_pbb_detail_accomplishmentlist.php");
		if ($Security->AllowList('frm_u_pbb_detail_target'))
			$this->Page_Terminate("frm_u_pbb_detail_targetlist.php");
		if ($Security->AllowList('frm_u_rep_a_eligible_status_unit_mfo'))
			$this->Page_Terminate("frm_u_rep_a_eligible_status_unit_mfolist.php");
		if ($Security->AllowList('frm_u_rep_ta_form_a_1'))
			$this->Page_Terminate("frm_u_rep_ta_form_a_1list.php");
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