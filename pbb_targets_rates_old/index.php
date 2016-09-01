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

		// User table object (frm_9_m_sa_users)
		if (!isset($GLOBALS["frm_9_m_sa_users"])) $GLOBALS["frm_9_m_sa_users"] = new cfrm_9_m_sa_users;

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
		global $frm_9_m_sa_users;

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
		if ($Security->AllowList('frm_2_a_fi_rep_form_a_raw_data_cu'))
		$this->Page_Terminate("frm_2_a_fi_rep_form_a_raw_data_culist.php"); // Exit and go to default page
		if ($Security->AllowList('frm_1_a_du_pbb_detail_delivery'))
			$this->Page_Terminate("frm_1_a_du_pbb_detail_deliverylist.php");
		if ($Security->AllowList('frm_1_t_conu_1_pbb_detail_contributor'))
			$this->Page_Terminate("frm_1_t_conu_1_pbb_detail_contributorlist.php");
		if ($Security->AllowList('frm_1_t_conu_contributor_mfo_status'))
			$this->Page_Terminate("frm_1_t_conu_contributor_mfo_statuslist.php");
		if ($Security->AllowList('frm_1_t_conu_contributor_pi_status'))
			$this->Page_Terminate("frm_1_t_conu_contributor_pi_statuslist.php");
		if ($Security->AllowList('frm_1_t_du_contributor_mfo_status'))
			$this->Page_Terminate("frm_1_t_du_contributor_mfo_statuslist.php");
		if ($Security->AllowList('frm_1_t_du_contributor_pi_status'))
			$this->Page_Terminate("frm_1_t_du_contributor_pi_statuslist.php");
		if ($Security->AllowList('frm_1_t_du_delivery_pi_status'))
			$this->Page_Terminate("frm_1_t_du_delivery_pi_statuslist.php");
		if ($Security->AllowList('frm_1_t_du_delivery_status'))
			$this->Page_Terminate("frm_1_t_du_delivery_statuslist.php");
		if ($Security->AllowList('frm_1_t_du_pbb_detail_contributor'))
			$this->Page_Terminate("frm_1_t_du_pbb_detail_contributorlist.php");
		if ($Security->AllowList('frm_1_t_fi_contributor_mfo_status'))
			$this->Page_Terminate("frm_1_t_fi_contributor_mfo_statuslist.php");
		if ($Security->AllowList('frm_1_t_fi_contributor_pi_status'))
			$this->Page_Terminate("frm_1_t_fi_contributor_pi_statuslist.php");
		if ($Security->AllowList('frm_1_t_fi_cu_status'))
			$this->Page_Terminate("frm_1_t_fi_cu_statuslist.php");
		if ($Security->AllowList('frm_1_t_fi_delivery_pi_status'))
			$this->Page_Terminate("frm_1_t_fi_delivery_pi_statuslist.php");
		if ($Security->AllowList('frm_1_t_fi_delivery_status'))
			$this->Page_Terminate("frm_1_t_fi_delivery_statuslist.php");
		if ($Security->AllowList('frm_1_t_fi_pbb_detail_contributor'))
			$this->Page_Terminate("frm_1_t_fi_pbb_detail_contributorlist.php");
		if ($Security->AllowList('frm_1_t_fi_pbb_detail_delivery'))
			$this->Page_Terminate("frm_1_t_fi_pbb_detail_deliverylist.php");
		if ($Security->AllowList('frm_1_t_fi_units_contributor'))
			$this->Page_Terminate("frm_1_t_fi_units_contributorlist.php");
		if ($Security->AllowList('frm_1_t_fi_units_delivery'))
			$this->Page_Terminate("frm_1_t_fi_units_deliverylist.php");
		if ($Security->AllowList('frm_2_a_conu_pbb_detail_contributor'))
			$this->Page_Terminate("frm_2_a_conu_pbb_detail_contributorlist.php");
		if ($Security->AllowList('frm_2_a_conu_rep_form_a_raw_data_du_conu'))
			$this->Page_Terminate("frm_2_a_conu_rep_form_a_raw_data_du_conulist.php");
		if ($Security->AllowList('frm_2_a_du_pbb_detail_contributor'))
			$this->Page_Terminate("frm_2_a_du_pbb_detail_contributorlist.php");
		if ($Security->AllowList('frm_2_a_du_rep_form_a_raw_data_cu_du'))
			$this->Page_Terminate("frm_2_a_du_rep_form_a_raw_data_cu_dulist.php");
		if ($Security->AllowList('frm_2_a_fi_pbb_detail_contributor'))
			$this->Page_Terminate("frm_2_a_fi_pbb_detail_contributorlist.php");
		if ($Security->AllowList('frm_2_a_fi_pbb_detail_delivery'))
			$this->Page_Terminate("frm_2_a_fi_pbb_detail_deliverylist.php");
		if ($Security->AllowList('frm_2_a_fi_rep_form_a_raw_data_cu_du'))
			$this->Page_Terminate("frm_2_a_fi_rep_form_a_raw_data_cu_dulist.php");
		if ($Security->AllowList('frm_9_m_sa_cutoffdate'))
			$this->Page_Terminate("frm_9_m_sa_cutoffdatelist.php");
		if ($Security->AllowList('frm_9_m_sa_mfo_questions'))
			$this->Page_Terminate("frm_9_m_sa_mfo_questionslist.php");
		if ($Security->AllowList('frm_9_m_sa_units_contributor'))
			$this->Page_Terminate("frm_9_m_sa_units_contributorlist.php");
		if ($Security->AllowList('frm_9_m_sa_units_cu'))
			$this->Page_Terminate("frm_9_m_sa_units_culist.php");
		if ($Security->AllowList('frm_9_m_sa_units_delivery'))
			$this->Page_Terminate("frm_9_m_sa_units_deliverylist.php");
		if ($Security->AllowList('frm_9_m_sa_users'))
			$this->Page_Terminate("frm_9_m_sa_userslist.php");
		if ($Security->AllowList('tbl_temp_conu'))
			$this->Page_Terminate("tbl_temp_conulist.php");
		if ($Security->AllowList('tbl_temp_cu'))
			$this->Page_Terminate("tbl_temp_culist.php");
		if ($Security->AllowList('tbl_temp_cu2'))
			$this->Page_Terminate("tbl_temp_cu2list.php");
		if ($Security->AllowList('tbl_temp_du'))
			$this->Page_Terminate("tbl_temp_dulist.php");
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
