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
 var target_date = document.getElementById("target_date");
 var approved_date = document.getElementById("approved_date");

//alidate the date format

 if(isValidDate(target_date.value)==false){
  return false;
 }
 
 if(isValidDate(approved_date.value)==false){
  return false;
 }
 
//validate if the approved date if prior to target date
 if(checkEnteredDates(target_date.value,approved_date.value)==false){
   return false;
  }
 
//set the values of the hidden variables
//provision for the ODATE.value= orig_date.value;
 TDATE.value= target_date.value;
 ADATE.value= approved_ate.value;
 
 return true;
} 

function checkEnteredDates(targetdateval,approveddateval){

//separate the year,month and day of the dates
 var targetyear = targetdateval.substring(6);
 var targetmth  = targetdateval.substring(0,2);
 var targetday  = targetdateval.substring(5,3);
 var targetdate = new Date(targetyear ,targetmth ,targetday);
 
 var approvedyear = approveddateval.substring(6);
 var approvedmth  = approveddateval.substring(0,2);
 var approvedday  = approveddateval.substring(5,3);
 var approveddate = new Date(approvedyear ,approvedmth ,approvedday );
 
 var datediffval = (targetdate - approveddate )/864e5;

if (datediffval <= -1) {
  alert("Approval date of QMS manuals must be before the ISO certification target date");
  return false;
  }

return true;

}

</script>
 
<script type="text/javascript" language="JavaScript">
function isValidDate(dateStr) {
 

//check the MM/DD/YYYY format
//separate the date into month, day, and year variables
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
 
 //check the 29th of february
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

$(function() {
$( "#target_date" ).datepicker();
});

$(function() {
$( "#approved_date" ).datepicker();
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
<h2>STO B.2: ISO-Aligned QMS Documentation - Input Form</h2>
<a href="sto_formb2_view_all.php">View All Records</a>
<hr/>

<?php
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

	//query the objects for the pulldown
    $query = $mysqli->query("SELECT sto_formb2_iso_aligned_id, sto_formb2_iso_aligned_aspired_standard FROM `tbl_sd_6_sto_formb2_iso_aligned` ORDER BY sto_formb2_iso_aligned_aspired_standard ASC");
	
	//create an array of objects for each returned row
	while($array[] = $query->fetch_object());
	
    //remove the blanks at end of array
	array_pop($array);

    //Generate sample filename
	date_default_timezone_set("Asia/Hong_Kong");
	$timestamp = time();
	$d = date("Ymd_His",$timestamp);
	$cu = preg_replace('/\s+/', ' ', $cu_short_name);
	$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
	$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);

	$file_name_sample1 = "sto_pdf_file_ISO_aligned_approved_quality_manual_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample1 = strtolower($file_name_sample1);
	$file_name_sample1 = preg_replace('/\s+/', '', $file_name_sample1);

	$file_name_sample2 = "sto_pdf_file_ISO_aligned_approved_procedures_and_work_instructions_manual_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample2 = strtolower($file_name_sample2);
	$file_name_sample2 = preg_replace('/\s+/', '', $file_name_sample2);
?>

<!-- edit form here -->
<form name="inputForm" action="sto_formb2_insert.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
<table>

<tr>
    <td width="155"><div align="right">Aspired ISO Standard</div></td> 
    <td width="500"><textarea name="aspired_std" cols="50" rows="6" onkeyup="limit(aspired_std)" onblur="limit(aspired_std)" required></textarea></td>
</tr>

<tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(Use 255 as max. char.)</i><br/></div>
   	<br />
    </td>
</tr>

<tr>
    <td><div align="right">ISO Certification Target Date</div></td>
    <td><input name="target_date" type="text" required id="target_date" value="" size="11"/></td>
</tr>

<tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar)</i><br/></div>
   	<br />
    </td>
</tr>

<tr>
    <td width="155"><div align="right">QMS Holder</div></td> 
    <td width="500"><textarea name="qms_holder" cols="50" rows="6" onkeyup="limit(qms_holder)" onblur="limit(qms_holder)" required></textarea></td>
</tr>

<tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(Use 255 as max. char.)</i><br/></div>
	<br />
    </td>
</tr>

<tr>
    <td width="155"><div align="right">QMS Scope</div></td> 
    <td width="500"><textarea name="qms_scope" cols="50" rows="6" onkeyup="limit(qms_scope)" onblur="limit(qms_scope)" required></textarea></td>
</tr>

<tr>
    <td></td>
    <td colspan="2" scope="row"><div align="left">
    <i>(Use 255 as max. char.)</i><br/></div>
	<br />
    </td>
</tr>

<tr>
    <td><div align="right">Approval Date of Required QMS Manuals</div></td>
    <td><input name="approved_date" type="text" required id="approved_date" value="" size="11"/></td>
</tr>

<tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar)</i><br/></div>
	<br />
    </td>
</tr>

<!-- Attachment 1--->
<tr>
    <td width="155"><div align="right">Prescribed Attachment 1 Filename</div></td>
    <td width="500"><textarea name="file_name_display1" id="file_name_display1" readonly cols="50" rows="6" required><?php print $file_name_sample1; ?></textarea></td>
	<input name="file_name_sample1" hidden id="file_name_sample1" value="<?php print $file_name_sample1; ?>" />
</tr>

<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(Copy the above prescribed filename to your computer to upload the PDF copy of ISO-Aligned, Approved Quality Manual)</i><br/></div>
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
    <td width="500"><textarea name="file_name_display2" id="file_name_display2" readonly cols="50" rows="6" required><?php print $file_name_sample2; ?></textarea></td>
	<input name="file_name_sample2" hidden id="file_name_sample2" value="<?php print $file_name_sample2; ?>" />
</tr>

<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(Copy the above prescribed filename to your computer to upload the PDF copy of ISO-Aligned, Approved Procedures and Work Instructions Manual)</i><br/></div>
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
       <input type="submit" name="submit" value="Submit"/>
     </div></th>
</tr>

</table>
</form>
<?php
	//free the result set and close the connection 
	$query->close();
	$mysqli->close();
?>
</body>
</html>
