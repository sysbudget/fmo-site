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
$login = new clogin();
$Page =& $login;

// Page init
$login->Page_Init();

// Page main
$login->Page_Main();
?>
<?php include_once "header.php" ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
//-->

</script>
<script type="text/javascript">
<!--
var login = new up_Page("login");

// extend page with ValidateForm function
login.ValidateForm = function(fobj)
{
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (!up_HasValue(fobj.username))
		return up_OnError(this, fobj.username, upLanguage.Phrase("EnterUid"));
	if (!up_HasValue(fobj.password))
		return up_OnError(this, fobj.password, upLanguage.Phrase("EnterPwd"));

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj)) return false;
	return true;
}

// extend page with Form_CustomValidate function
login.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// requires js validation
<?php if (UP_CLIENT_VALIDATE) { ?>
login.ValidateRequired = true;
<?php } else { ?>
login.ValidateRequired = false;
<?php } ?>

//-->
</script>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("LoginPage") ?></p>
<?php $login->ShowPageHeader(); ?>
<?php
$login->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return login.ValidateForm(this);">
<table border="0" cellspacing="0" cellpadding="4">
	<tr>
		<td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Username") ?></span></td>
		<td><span class="upbudgetofficeclass"><input type="text" name="username" id="username" size="20" value="<?php echo $login->Username ?>"></span></td>
	</tr>
	<tr>
		<td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Password") ?></span></td>
		<td><span class="upbudgetofficeclass"><input type="password" name="password" id="password" size="20"></span></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><span class="upbudgetofficeclass"><input type="submit" name="submit" id="submit" value="<?php echo up_BtnCaption($Language->Phrase("Login")) ?>"></span></td>
	</tr>
</table>
		<input type="hidden" name="rememberme" id="rememberme" value="">
</form>
<br>
<p class="upbudgetofficeclass">
</p>
<?php
$login->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your startup script here
// document.write("page loaded");
//-->

</script>
<?php include_once "footer.php" ?>
<?php
$login->Page_Terminate();
?>
<?php

//
// Page class
//
class clogin {

	// Page ID
	var $PageID = 'login';

	// Page object name
	var $PageObjName = 'login';

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
		return TRUE;
	}

	//
	// Page class constructor
	//
	function clogin() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS["frm_9_m_sa_users"])) $GLOBALS["frm_9_m_sa_users"] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'login', TRUE);

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
	var $Username;
	var $LoginType;

	//
	// Page main
	//
	function Page_Main() {
		global $Security, $Language, $UserProfile, $gsFormError;
		$sPassword = "";
		$sLastUrl = $Security->LastUrl(); // Get last URL
		if ($sLastUrl == "")
			$sLastUrl = "index.php";
		if (IsLoggingIn()) {
			$this->Username = @$_SESSION[UP_SESSION_USER_PROFILE_USER_NAME];
			$sPassword = @$_SESSION[UP_SESSION_USER_PROFILE_PASSWORD];
			$this->LoginType = @$_SESSION[UP_SESSION_USER_PROFILE_LOGIN_TYPE];
			$bValidPwd = $Security->ValidateUser($this->Username, $sPassword, FALSE);
			if ($bValidPwd) {
				$_SESSION[UP_SESSION_USER_PROFILE_USER_NAME] = "";
				$_SESSION[UP_SESSION_USER_PROFILE_PASSWORD] = "";
				$_SESSION[UP_SESSION_USER_PROFILE_LOGIN_TYPE] = "";
			}
		} else {
			if (!$Security->IsLoggedIn())
				$Security->AutoLogin();
			$Security->LoadUserLevel(); // Load user level
			if (@$_POST["username"] <> "") {

				// Setup variables
				$this->Username = up_RemoveXSS(up_StripSlashes(@$_POST["username"]));
				$sPassword = up_StripSlashes(@$_POST["password"]);
				$this->LoginType = strtolower(@$_POST["rememberme"]);
				$bValidate = $this->ValidateForm($this->Username, $sPassword);
				if (!$bValidate)
					$this->setFailureMessage($gsFormError);
				$_SESSION[UP_SESSION_USER_PROFILE_USER_NAME] = $this->Username; // Save login user name
				$_SESSION[UP_SESSION_USER_PROFILE_LOGIN_TYPE] = $this->LoginType; // Save login type
			} else {
				if ($Security->IsLoggedIn()) {
					if ($this->getFailureMessage() == "")
						$this->Page_Terminate($sLastUrl); // Return to last accessed page
				}
				$bValidate = FALSE;

				// Restore settings
				if (@$_COOKIE[UP_PROJECT_NAME]['Checksum'] == strval(crc32(md5(UP_RANDOM_KEY))))
					$this->Username = TEAdecrypt(@$_COOKIE[UP_PROJECT_NAME]['Username'], UP_RANDOM_KEY);
				if (@$_COOKIE[UP_PROJECT_NAME]['AutoLogin'] == "autologin") {
					$this->LoginType = "a";
				} elseif (@$_COOKIE[UP_PROJECT_NAME]['AutoLogin'] == "rememberusername") {
					$this->LoginType = "u";
				} else {
					$this->LoginType = "";
				}
			}
			$bValidPwd = FALSE;
			if ($bValidate) {

				// Call Logging In event
				$bValidate = $this->User_LoggingIn($this->Username, $sPassword);
				if ($bValidate) {
					$bValidPwd = $Security->ValidateUser($this->Username, $sPassword, FALSE); // Manual login
					if (!$bValidPwd) {
						if ($this->getFailureMessage() == "")
							$this->setFailureMessage($Language->Phrase("InvalidUidPwd")); // Invalid user id/password
					}
				} else {
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->Phrase("LoginCancelled")); // Login cancelled
				}
			}
		}
		if ($bValidPwd) {

			// Write cookies
			if ($this->LoginType == "a") { // Auto login
				setcookie(UP_PROJECT_NAME . '[AutoLogin]',  "autologin", UP_COOKIE_EXPIRY_TIME); // Set autologin cookie
				setcookie(UP_PROJECT_NAME . '[Username]', TEAencrypt($this->Username, UP_RANDOM_KEY), UP_COOKIE_EXPIRY_TIME); // Set user name cookie
				setcookie(UP_PROJECT_NAME . '[Password]', TEAencrypt($sPassword, UP_RANDOM_KEY), UP_COOKIE_EXPIRY_TIME); // Set password cookie
				setcookie(UP_PROJECT_NAME . '[Checksum]', crc32(md5(UP_RANDOM_KEY)), UP_COOKIE_EXPIRY_TIME);
			} elseif ($this->LoginType == "u") { // Remember user name
				setcookie(UP_PROJECT_NAME . '[AutoLogin]', "rememberusername", UP_COOKIE_EXPIRY_TIME); // Set remember user name cookie
				setcookie(UP_PROJECT_NAME . '[Username]', TEAencrypt($this->Username, UP_RANDOM_KEY), UP_COOKIE_EXPIRY_TIME); // Set user name cookie
				setcookie(UP_PROJECT_NAME . '[Checksum]', crc32(md5(UP_RANDOM_KEY)), UP_COOKIE_EXPIRY_TIME);
			} else {
				setcookie(UP_PROJECT_NAME . '[AutoLogin]', "", UP_COOKIE_EXPIRY_TIME); // Clear auto login cookie
			}

			// Call loggedin event
			$this->User_LoggedIn($this->Username);
			$this->Page_Terminate($sLastUrl); // Return to last accessed URL
		} elseif ($this->Username <> "" && $sPassword <> "") {

			// Call user login error event
			$this->User_LoginError($this->Username, $sPassword);
		}
	}

	//
	// Validate form
	//
	function ValidateForm($usr, $pwd) {
		global $Language, $gsFormError;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return TRUE;
		if (trim($usr) == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterUid"));
		}
		if (trim($pwd) == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterPwd"));
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form Custom Validate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			up_AddMessage($gsFormError, $sFormCustomError);
		}
		return $ValidateForm;
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

	// User Logging In event
	function User_LoggingIn($usr, &$pwd) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// User Logged In event
	function User_LoggedIn($usr) {

		//echo "User Logged In";
	}

	// User Login Error event
	function User_LoginError($usr, $pwd) {

		//echo "User Login Error";
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
