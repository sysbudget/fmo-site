<?php

// Compatibility with UP Faculty Profile Report
if (!isset($Language)) {
	include_once "upcfg1.php";
	include_once "upshared1.php";
	$Language = new cLanguage();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo $Language->ProjectPhrase("BodyTitle") ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo up_YuiHost() ?>build/menu/assets/skins/sam/menu.css">
<link rel="stylesheet" type="text/css" href="phpcss/upmenu.css">
<link rel="stylesheet" type="text/css" href="<?php echo up_YuiHost() ?>build/tabview/assets/skins/sam/tabview.css">
<link rel="stylesheet" type="text/css" href="<?php echo up_YuiHost() ?>build/container/assets/skins/sam/container.css">
<link rel="stylesheet" type="text/css" href="<?php echo up_YuiHost() ?>build/autocomplete/assets/skins/sam/autocomplete.css">
<link rel="stylesheet" type="text/css" href="<?php echo up_YuiHost() ?>build/resize/assets/skins/sam/resize.css">
<link rel="stylesheet" type="text/css" href="<?php echo UP_PROJECT_STYLESHEET_FILENAME ?>">
<!-- *** Note: include additional jQuery css files here *** -->
<script type="text/javascript" src="<?php echo up_YuiHost() ?>build/utilities/utilities.js"></script>
<script type="text/javascript" src="<?php echo up_YuiHost() ?>build/tabview/tabview-min.js"></script>
<script type="text/javascript" src="<?php echo up_YuiHost() ?>build/container/container-min.js"></script>
<script type="text/javascript" src="<?php echo up_YuiHost() ?>build/datasource/datasource-min.js"></script>
<script type="text/javascript" src="<?php echo up_YuiHost() ?>build/autocomplete/autocomplete-min.js"></script>
<script type="text/javascript" src="<?php echo up_YuiHost() ?>build/resize/resize-min.js"></script>
<script type="text/javascript" src="<?php echo up_YuiHost() ?>build/menu/menu.js"></script>
<script type="text/javascript" src="<?php echo up_jQueryHost(); ?>jquery.min.js"></script>
<!-- *** Note: include additional jQuery js files here *** -->
<script type="text/javascript">
<!--
var UP_LANGUAGE_ID = "<?php echo $gsLanguage ?>";
var UP_DATE_SEPARATOR = "/"; 
if (UP_DATE_SEPARATOR == "") UP_DATE_SEPARATOR = "/"; // Default date separator
var UP_UPLOAD_ALLOWED_FILE_EXT = "gif,jpg,jpeg,bmp,png,doc,xls,pdf,zip"; // Allowed upload file extension
var UP_FIELD_SEP = ", "; // Default field separator

// Ajax settings
var UP_RECORD_DELIMITER = "\r";
var UP_FIELD_DELIMITER = "|";
var UP_LOOKUP_FILE_NAME = "uplookup1.php"; // Lookup file name
var UP_AUTO_SUGGEST_MAX_ENTRIES = <?php echo UP_AUTO_SUGGEST_MAX_ENTRIES ?>; // Auto-Suggest max entries

// Common JavaScript messages
var UP_ADDOPT_BUTTON_SUBMIT_TEXT = "<?php echo up_JsEncode2(up_BtnCaption($Language->Phrase("AddBtn"))) ?>";
var UP_EMAIL_EXPORT_BUTTON_SUBMIT_TEXT = "<?php echo up_JsEncode2(up_BtnCaption($Language->Phrase("SendEmailBtn"))) ?>";
var UP_BUTTON_CANCEL_TEXT = "<?php echo up_JsEncode2(up_BtnCaption($Language->Phrase("CancelBtn"))) ?>";
var upTooltipDiv;
var up_TooltipTimer = null;

//-->
</script>
<script type="text/javascript" src="phpjs/upp1.js"></script>
<script type="text/javascript" src="phpjs/userfn1.js"></script>
<script type="text/javascript">
<!--
<?php echo $Language->ToJSON() ?>

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
//-->

</script>
<meta name="generator" content="UPFacultyProfile v1.0.0">
</head>
<body class="yui-skin-sam">
<div class="upLayout">
	<!-- content (begin) -->
  <table cellspacing="0" class="upContentTable">
		<tr>
			<td class="upMenuColumn">
			<!-- left column (begin) -->
<?php include_once "upmenu.php" ?>

<!-- Tracy added next p -->
<p class="upbudgetofficeclass upTitle">a. For the Deans/Directors/Chairpersons: Please designate a staff member to encode your Unit’s faculty profile<br><br>
 b. For the designated encoder, if you forgot your login details or you do not have a user name and password, click <a href="http://goo.gl/forms/DcCmTwAKs4" target="_blank" title="Designated Encoder">here</a>.<br><br>
 c. Click <a href="https://drive.google.com/file/d/0B-GEKsyq3IuedXQxdDE4emJTRzQ/view?usp=sharing" target="_blank" title="UP Faculty Profile User's Guide">here to get the 2015 User's Guide</a>.<br><br>
 d	Update Faculty Profile with data from the following:<br>
- official faculty workload for the First Semester/Trimester of AY 2015-2016<br>
- personal information, academic degrees earned and other info as of December 1, 2015<br><br>
 e. Include ALL REGULAR faculty members in your unit, whether on active duty or leave of absence.<br>
 f. Include only NON-REGULAR faculty with active appointments, even without workload (Lecturers, Professors Emeriti, Visiting, Clinical, Adjunct, Teaching Associates, Preceptors, WOC, etc).<br><br>
 Please complete and finalize <b>on or before January 08, 2016.</b><br><br>
 If you have questions, please send them to <a href="mailto:sysbudget@up.edu.ph">sysbudget@up.edu.ph</a>
   <br><br><b>MARAMING SALAMAT PO!</b>
</p>
			<!-- left column (end) -->
			</td>
	    <td class="upContentColumn">
			<!-- right column (begin) -->
				<p class="upbudgetofficeclass upTitle"><b><?php echo $Language->ProjectPhrase("BodyTitle") ?></b></p>
