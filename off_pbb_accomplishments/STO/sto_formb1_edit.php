<?php

session_name("pbb");
session_start();

//is the user logged in or not
if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

//if not, redirect the user
header('Location: ../login/login_mysqli.php');

exit;

}

//connect to the database
	include('../connect-db.php');

$mysqli = new mysqli($server, $user, $pass, $db);
$mysqli->set_charset("utf8");

//return an error for connection issues
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}
//get the id from the url
   $sto_formb1_quality_assessment_id = $_GET['id'];

$query = "SELECT sto_formb1_quality_assessment_id, unit_contributor_id, unit_delivery_id, focal_person_id, cu_id, cu_short_name, unit_delivery_name_cu, unit_contributor_name, sto_formb1_quality_assessment_quarter, ref_quality_assessment_standard_id, ref_quality_assessment_standard_name, sto_formb1_quality_assessment_type, sto_formb1_quality_assessment_certificate_holder, sto_formb1_quality_assessment_scope, sto_formb1_quality_assessment_certificate_number, sto_formb1_quality_assessment_certificate_date_reregistration, sto_formb1_quality_assessment_inquiry_date, sto_formb1_quality_assessment_attachment_levelling_scheme, sto_formb1_quality_assessment_attachment_certificate FROM tbl_sd_6_sto_formb1_quality_assessment WHERE sto_formb1_quality_assessment_id = " . $sto_formb1_quality_assessment_id;

$record_set = $mysqli->query($query);
$row = $record_set->fetch_assoc();

//extract the fields
	$quarter = $row['sto_formb1_quality_assessment_quarter'];		
	$qms_std = $row['ref_quality_assessment_standard_name'];
	$std_type = $row['sto_formb1_quality_assessment_type'];	
	$cert_holder = $row['sto_formb1_quality_assessment_certificate_holder'];
	$cert_scope = $row['sto_formb1_quality_assessment_scope'];
	$cert_number = $row['sto_formb1_quality_assessment_certificate_number'];
	
	$re_reg_cert_date = strtotime($row['sto_formb1_quality_assessment_certificate_date_reregistration']);
	$expiry_date = strtotime($row['sto_formb1_quality_assessment_inquiry_date']);

	$attachment_level_scheme = $row['sto_formb1_quality_assessment_attachment_levelling_scheme'];
	$attachment_level_scheme = rtrim($attachment_level_scheme,".pdf");
    $attachment_qms_cert = $row['sto_formb1_quality_assessment_attachment_certificate'];
	$attachment_qms_cert = rtrim($attachment_qms_cert,".pdf");

//get the session values
    $unit_contributor_id = $_SESSION['unit_contributor_id'];
	$unit_delivery_id = $_SESSION['unit_delivery_id'];
	$focal_person_id = $_SESSION['focal_person_id'];
	$cu_id = $_SESSION['cu_id'];
	$cu_short_name = $_SESSION['cu_short_name'];
	$unit_delivery_name_cu = $_SESSION['unit_delivery_name_cu'];
	$unit_contributor_name = $_SESSION['unit_contributor_name'];
	$sd_users_username = $_SESSION['sd_users_username'];
	
	$cutOffDate_id = $_SESSION['cutOffDate_id'];
	$t_startDate = $_SESSION['t_startDate'];
	$a_cutOffDate_contributor = $_SESSION['a_cutOffDate_contributor'];
	$a_cutOffDate_delivery = $_SESSION['a_cutOffDate_delivery'];
	$a_cutOffDate_fp = $_SESSION['a_cutOffDate_fp'];
	$a_cutOffDate_remarks = $_SESSION['a_cutOffDate_remarks'];

    $unit_delivery_name_short = $_SESSION['unit_delivery_name_short'];
	$unit_contributor_name_short = $_SESSION['unit_contributor_name_short'];

    //Generate sample filename
	date_default_timezone_set("Asia/Hong_Kong");
	$timestamp = time();
	$d = date("Ymd_His",$timestamp);
	$cu = preg_replace('/\s+/', ' ', $cu_short_name);
	$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
	$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);
	
	if (empty($attachment_level_scheme)){
	$file_name_sample1 = "sto_scanned_qms_levelling_scheme_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample1 = strtolower($file_name_sample1);
	$file_name_sample1 = preg_replace('/\s+/', '', $file_name_sample1);
	$attach_adv_service_req = $file_name_sample1;
	}
	
	if (empty($attachment_qms_cert)){
	$file_name_sample2 = "sto_scanned_qms_certificate_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample2 = strtolower($file_name_sample2);
	$file_name_sample2 = preg_replace('/\s+/', '', $file_name_sample2);
	$attach_rating_sample = $file_name_sample2;
	}

    //query the objects for the pulldown
	$query = $mysqli->query("SELECT ref_quality_assessment_standard_id, ref_quality_assessment_standard_name FROM `tbl_sd_6_sto_formb1_quality_assessment` ORDER BY ref_quality_assessment_standard_name ASC");
	
	//create an array of objects for each returned row
	while($array[] = $query->fetch_object());
	
    //remove the blank entry at the end of the array
	array_pop($array);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Form</title>

<style>
body {margin:1; font-family:Calibri; font-size:14px;}
</style>

<script type="text/javascript">
var maxChar=255;
function limit(obj){
while(obj.value.length>maxChar){
obj.value=obj.value.replace(/.$/,'');//removes the last character
}
}
</script>

<link rel="stylesheet" href="../includes/jquery-ui.css" />

<script src="../includes/jquery-1.9.1.js"></script>
<script src="../includes/jquery-ui.js"></script>

<!--date checker-->
<script type="text/javascript" language="JavaScript">
function validateForm()
{

//provision for the var orig_date = document.getElementById("orig_cert_date");
 var re_reg_date = document.getElementById("re_reg_cert_date");
 var exp_date = document.getElementById("expiry_date");

//provision for the orig date
// if(isValidDate(orig_date.value)==false){
//  return false;
// }

 if(isValidDate(re_reg_date.value)==false){
  return false;
 }
 
//validate the date format
 if(isValidDate(exp_date.value)==false){
  return false;
 }
 
//validate if expiry date if prior to reg date
 if(checkEnteredDates(re_reg_date.value,exp_date.value)==false){
   return false;
  }
 
//set the values of the hidden variables
//provision for the ODATE.value= orig_date.value;
 RDATE.value= re_reg_date.value;
 EDATE.value= exp_date.value;
 
 return true;
} 

function checkEnteredDates(regdateval,expdateval){

//separate the year,month and day for the first date
 var regyear = regdateval.substring(6);
 var regmth  = regdateval.substring(0,2);
 var regday  = regdateval.substring(5,3);
 var regdate = new Date(regyear ,regmth ,regday);
 
//separate the year,month and day for the second date
 var expyear = expdateval.substring(6);
 var expmth  = expdateval.substring(0,2);
 var expday  = expdateval.substring(5,3);
 var expdate = new Date(expyear ,expmth ,expday );
 
 var datediffval = (expdate - regdate )/864e5;

if (datediffval <= -1) {
  alert("Registration date must be before the expiry date");
  return false;
  }

return true;

}  

</script>

<script type="text/javascript" language="JavaScript">
function isValidDate(dateStr) {
 
//check if the date format is MM/DD/YYYY
//separates date into month, day, and year variables
 var datePat = /^(\d{2,2})(\/)(\d{2,2})\2(\d{4}|\d{4})$/;
 
 var matchArray = dateStr.match(datePat); // is the format ok?
 if (matchArray == null) {
  alert("Date must be in MM/DD/YYYY format")
  return false;
 }
  
 month = matchArray[1]; 
 day = matchArray[3];
 year = matchArray[4];
 if (month < 1 || month > 12) { 
  alert("Month must be between 1 and 12");
  return false;
 }
 if (day < 1 || day > 31) {
  alert("Day must be between 1 and 31");
  return false;
 }
 if ((month==4 || month==6 || month==9 || month==11) && day==31) {
  alert("Month "+month+" doesn't have 31 days!")
  return false;
 }
 
 //check 29th of february
 if (month == 2) { 
  var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
  if (day>29 || (day==29 && !isleap)) {
   alert("February " + year + " doesn't have " + day + " days!");
   return false;
    }
 }
 return true;  // date is valid
}

</script>

<script type="text/javascript" language="JavaScript">
//provision for orig cert date
//$(function() {
//$( "#orig_cert_date" ).datepicker();
//});

$(function() {
$( "#re_reg_cert_date" ).datepicker();
});

$(function() {
$( "#expiry_date" ).datepicker();
});
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename1()
{
var file_name1 = "";
var file_size1 = "";
var file_ext1 = "";
var file_name_sample1 = "";
var file_name1 = document.getElementById('uploadFile1').files[0].name;
var file_ext1 = file_name1.substring(file_name1.lastIndexOf('.')+1);
var file_size1 = document.getElementById('uploadFile1').files[0].size;
var file_name_sample1 = document.getElementById('file_name_sample1').value;
var file_name_sample1 = file_name_sample1 + ".pdf";

	if (file_name1 != file_name_sample1)
		{
		alert("Use the required filename. " + " " + file_name1 + " is not similar with the prescribed filename");
		document.getElementById('uploadFile1').value="";
		return false;
		}

	if (file_size1 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line");
		document.getElementById('uploadFile1').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename2()
{
var file_name2 = "";
var file_size2 = "";
var file_ext2 = "";
var file_name_sample2 = "";
var file_name2 = document.getElementById('uploadFile2').files[0].name;
var file_ext2 = file_name2.substring(file_name2.lastIndexOf('.')+1);
var file_size2 = document.getElementById('uploadFile2').files[0].size;
var file_name_sample2 = document.getElementById('file_name_sample2').value;
var file_name_sample2 = file_name_sample2 + ".pdf";

	if (file_name2 != file_name_sample2)
		{
		alert("Use the required filename. " + " " + file_name2 + " is not similar with the prescribed filename");
		document.getElementById('uploadFile2').value="";
		return false;
		}

	if (file_size2 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line");
		document.getElementById('uploadFile2').value="";
		return false;
		}
}
</script>

</head>

<body onload='loadCategories()'>
<div class="viewbody">
<h2>STO B.1: International QMS Certificate - Edit Record</h2>
<a href="sto_formb1_view_all.php">View All Records</a>
<hr/>

<!-- user editing starts here -->
<form name="edit_sto_formb1" id="edit_sto_formb1" method="post" action="sto_formb1_save_edited.php" onsubmit="return validateForm()" enctype="multipart/form-date">
<table>

<tr>
    <td width="155"><div align="right">QMS Standard</div><div align="right"></div></td> 
    <td width="500"><textarea name="qms_std" cols="50" rows="6" onkeyup="limit(qms_std)" onblur="limit(qms_std)" required><?php print $qms_std; ?></textarea>    </td>
</tr>

<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(Use 255 as max. char.)</i><br/></div>
   	<br />
    </td>
</tr>

<tr>
    <td width="155"><div align="right">Certificate Holder</div><div align="right"></div></td> 
    <td width="500"><textarea name="cert_holder" cols="50" rows="6" onkeyup="limit(cert_holder)" onblur="limit(cert_holder)" required><?php print $cert_holder; ?></textarea>    </td>
</tr>

<tr>
	<tr></tr>
    <td></td>
    <td colspan="2" scope="row"><div align="left">
    <i>(Use 255 as max. char.)</i><br/></div>
	<br />
    </td>
</tr>

<tr>
    <td width="155"><div align="right">Scope</div><div align="right"></div></td> 
    <td width="500"><textarea name="cert_scope" cols="50" rows="6" onkeyup="limit(cert_scope)" onblur="limit(cert_scope)" required><?php print $cert_scope; ?></textarea>    </td>
</tr>

<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(Use 255 as max. char.)</i><br/></div>
	<br />
    </td>
</tr>

<tr>
    <td width="155"><div align="right">Certificate/Appendix Number</div><div align="right"></div></td> 
    <td width="500"><textarea name="cert_number" cols="50" rows="6" onkeyup="limit(cert_number)" onblur="limit(cert_number)" required><?php print $cert_number; ?></textarea>    </td>
</tr>

<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(Use 255 as max. char.)</i><br/></div>
	<br />
    </td>
</tr>

<tr>
    <td><div align="right">Date of Latest Registration</div></td>
	<td><input type="text" name="re_reg_cert_date" id="re_reg_cert_date" size="12" value="<?php print date("m/d/Y",$re_reg_cert_date); ?>" required></td>
</tr>

<tr>
   <td></td>
   <td colspan="2" scope="row"><div align="left">
   <i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar)</i><br/></div>
   <br />
   </td>
</tr>

<tr>
    <td><div align="right">Expiry Date</div></td>
	<td><input type="text" name="expiry_date" id="expiry_date" size="12" value="<?php print date("m/d/Y",$expiry_date); ?>" required></td>
</tr>

<tr>
    <td></td>
    <td colspan="2" scope="row"><div align="left">
    <i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar)</i><br/></div>
	<br />
    </td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 1 Filename</div></td>
    <td width="500"><textarea name="file_name_display1" id="file_name_display1" readonly cols="50" rows="6" required><?php print $attachment_level_scheme; ?></textarea></td>
	<input name="file_name_sample1" hidden id="file_name_sample1" value="<?php print $attachment_level_scheme; ?>" />
</tr>

<tr>
	<tr></tr>
    <td></td>
    <td colspan="2" scope="row"><div align="left">
    <i>(Copy the above prescribed filename to your computer to upload the PDF copy of QMS Levelling Scheme)</i><br/></div>
	<br />
    </td>
</tr>

<tr>
	<td align="right">File to upload Attachment 1</td>
    <td><input type="file" name="uploadFile1" id="uploadFile1" required onblur="alertFilename1(uploadFile1)"></td>
</tr>

<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit)</i><br/></div>
   	<br />
    </td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 2 Filename</div></td>
    <td width="500"><textarea name="file_name_display2" id="file_name_display2" readonly cols="50" rows="6" required><?php print $attachment_qms_cert; ?></textarea></td>
	<input name="file_name_sample2" hidden id="file_name_sample2" value="<?php print $attachment_qms_cert; ?>" />
</tr>

<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(Copy the above prescribed filename to your computer to upload the PDF copy of QMS Certificate)</i><br/></div>
	<br />
    </td>
</tr>

<tr>
	<td align="right">File to upload Attachment 2</td>
    <td><input type="file" name="uploadFile2" id="uploadFile2" required onblur="alertFilename2(uploadFile2)"></td>
</tr>

<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit)</i><br/></div>
   	<br />
    </td>
</tr>

<tr>
   	<th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" />
       <input type="hidden" name="sto_formb1_quality_assessment_id" value="<?php print $sto_formb1_quality_assessment_id; ?>"><button type="submit">Submit</button></div>
	</th>
    </tr>

</table>
</form>
<?php
	//free query sets and close the connection 
	$query->close();
	$mysqli->close();
?>
</body>
</html>