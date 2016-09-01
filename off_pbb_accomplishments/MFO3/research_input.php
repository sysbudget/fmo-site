<?php
session_name("pbb");
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

// not logged in, move to login page

header('Location: ../login/login_mysqli.php');

exit;

}
// connect to the database
	include('../connect-db.php');
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Form</title>

<style>
body {margin:1; font-family:Calibri; font-size:14px;}
input {text-align: right;}
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

<!--Date Checker-->
<script type="text/javascript" language="JavaScript">
function validateForm()
{
 //Date Checker
// var stdate = document.getElementById("start_date");
// var endate = document.getElementById("end_date");

 //Check if up to current date
if (document.getElementById("completed_n").checked) {

 d = new Date();
 utc = d.getTime() + (d.getTimezoneOffset() * 60000);
 nd = new Date(utc + (3600000*16));
 var todayDate = nd.toISOString().split('T')[0]

 var std = document.getElementById("start_date").value;
 var tomorrow = new Date(std);
 tomorrow.setDate(tomorrow.getDate() + 1);
 var std = new Date(tomorrow).toISOString().slice(0,10);
 var stdate = document.getElementById("start_date");
 var endate = document.getElementById("start_date");
 
 if (std > todayDate){
 alert ("Date started " + std + " is over the current date");
 return false;
 }
}

if (document.getElementById("completed_y").checked) {
 d = new Date();
 utc = d.getTime() + (d.getTimezoneOffset() * 60000);
 nd = new Date(utc + (3600000*16));
 var todayDate = nd.toISOString().split('T')[0]

 var std = document.getElementById("start_date").value;
 var tomorrow = new Date(std);
 tomorrow.setDate(tomorrow.getDate() + 1);
 var std = new Date(tomorrow).toISOString().slice(0,10);
 var stdate = document.getElementById("start_date");
 var endate = document.getElementById("end_date");
 
 if (std > todayDate){
 alert ("Date started " + std + " is over the current date");
 return false;
 }

 d = new Date();
 utc = d.getTime() + (d.getTimezoneOffset() * 60000);
 nd = new Date(utc + (3600000*16));
 var todayDate = nd.toISOString().split('T')[0]

 var ed = document.getElementById("end_date").value;
 var tomorrow = new Date(ed);
 tomorrow.setDate(tomorrow.getDate() + 1);
 var ed = new Date(tomorrow).toISOString().slice(0,10);

 if (ed > todayDate){
 alert ("Date closed " + ed + " is over the current date");
 return false;
 }
}

 //Validate the format of the start date
 if(isValidDate(stdate.value)==false){
  return false;
 }

 //Validate the format of the end date
 if(isValidDate(endate.value)==false){
  return false;
 }

 //Validate end date to find out if it is prior to start date
 if(checkEnteredDates(stdate.value,endate.value)==false){
  return false;
 }

 //Set the values of the hidden variables
 FROMDATE.value= stdate.value;
 TODATE.value= endate.value;
 
 return true;
}

function checkEnteredDates(stdateval,endateval){
//seperate the year,month and day for the first date
 var stryear1 = stdateval.substring(6);
 var strmth1  = stdateval.substring(0,2);
 var strday1  = stdateval.substring(5,3);
 var date1    = new Date(stryear1 ,strmth1 ,strday1);
 
 //seperate the year,month and day for the second date
 var stryear2 = endateval.substring(6);
 var strmth2  = endateval.substring(0,2);
 var strday2  = endateval.substring(5,3);
 var date2    = new Date(stryear2 ,strmth2 ,strday2 );
 
 var datediffval = (date2 - date1 )/864e5;

if(datediffval <= -1){
  alert("Start date must be before the closing date");
  return false;
  }

return true;

}

<!--Check if whole number (5-23-16)-->
function checkban(obj)
{
    var x = obj.value;
    if ((x%1) != 0)
    {
		obj.value=obj.value.replace(/.$/,'');
        alert("Please input a whole number!");
        return false;
    }
}



</script>

<script type="text/javascript" language="JavaScript">
function isValidDate(dateStr) {
 
 // Checks for the following valid date formats:
 // MM/DD/YYYY
 // Also separates date into month, day, and year variables
 var datePat = /^(\d{2,2})(\/)(\d{2,2})\2(\d{4}|\d{4})$/;
 
 var matchArray = dateStr.match(datePat); // is the format ok?
 if (matchArray == null) {
  alert("Date must be in MM/DD/YYYY format")
  return false;
 }
 
 month = matchArray[1]; // parse date into variables
 day = matchArray[3];
 year = matchArray[4];
 if (month < 1 || month > 12) { // check month range
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
 if (month == 2) { // check for february 29th
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
$( "#start_date" ).datepicker();
});

$(function() {
$( "#end_date" ).datepicker();
});
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename()
{
var file_name = "";
var file_size = "";
var file_ext = "";
var file_name_sample = "";
var file_name = document.getElementById('uploadFile').files[0].name;
var file_ext = file_name.substring(file_name.lastIndexOf('.')+1);
var file_size = document.getElementById('uploadFile').files[0].size;
var file_name_sample = document.getElementById('file_name_sample').value;
var file_name_sample = file_name_sample + ".pdf";

	if (file_name != file_name_sample)
		{
		alert("Use the required filename. " + " " + file_name + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile').value="";
		return false;
		}

	if (file_size >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function choice1()
{
	if (document.getElementById("completed_y").checked) {
   		document.getElementById("end_date").disabled = false;
	}
	else
	{
  		document.getElementById("end_date").disabled = true;
	}
}
</script>

</head>
<body>

<div class="viewbody">
<h2>MFO3: Research Project - Input Form</h2>
<a href="research_view_all.php">View All Records</a>
<hr/>

<?php
	//Get session values
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

	//Edit Me to get the values from the DB to initialize dropdown menus
	//Query the database for the results we want
	$query1 = $mysqli->query("SELECT research_type_id, research_type_name FROM `tbl_sd_ref_research_type` ORDER BY research_type_name ASC");

	//Create an array of objects for each returned row
	while($array1[] = $query1->fetch_object());
		
	//Remove the blank entry at end of array
	array_pop($array1);

	//Generate sample filename
	date_default_timezone_set("Asia/Hong_Kong");
	$timestamp = time();
	$d = date("Ymd_His",$timestamp);
	$cu = preg_replace('/\s+/', ' ', $cu_short_name);
	$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
	$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);
	$file_name_sample = "mfo3_research_approval_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample = strtolower($file_name_sample);
	$file_name_sample = preg_replace('/\s+/', '', $file_name_sample);
?>

<!-- Edit form here -->
<form name="inputForm" action="research_insert.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
<table>

<tr>
    <td width="155"><div align="right">Research Type</div></td>
    <td width="500"><select name="rsrch_type" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array1 as $option1) : ?>
      <option value="<?php echo $option1->research_type_id . ',' . $option1->research_type_name; ?>"><?php echo $option1->research_type_name; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>

<tr>
    <td width="155"><div align="right">Research Title</div><div align="right"></div></td> 
    <td width="500"><textarea name="rsrch_title" cols="50" rows="6" onkeyup="limit(rsrch_title)" onblur="limit(rsrch_title)" required></textarea></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Student thesis/dissertations are not acceptable; use 255 as max char)</i><br/></div>
	   	</td>
</tr>

<tr>
    <td width="155"><div align="right">Project / Study Duration <br/>(in months)</div></td>
    <td width="500"><input name="proj_duration" type="number" min="0" required id="proj_duration" value=1 size="11" onkeyup="checkban(proj_duration)" onblur="checkban(proj_duration)" /></td>
</tr>

<!-- Edit if you want to use Radio-->
<tr>
    <td width="155"><div align="right">Completed</div></td>
 	<td width="500">
    <input type="radio" name="completed" onchange="choice1(completed_y)" id="completed_y" checked <?php if (isset($completed) && $completed=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" name="completed" onchange="choice1(completed_n)" id="completed_n" <?php if (isset($completed) && $completed=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Date Started</div></td>
    <td width="500"><input name="start_date" id="start_date" type="text" required  value="" size="11"/></td>
</tr>

	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar)</i><br/></div>
	   	</td>
	</tr>

<tr>
    <td width="155"><div align="right">Date Closed</div></td>
    <td width="500"><input name="end_date" id="end_date" type="text" value="" size="11" /></td>
</tr>

	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar)</i><br/></div>
	   	</td>
	</tr>

<tr>
    <td width="155"><div align="right">Name of Author/s</div></td>
    <td width="500"><textarea name="author"  cols="50" rows="6" onkeyup="limit(author)" onblur="limit(author)" required></textarea></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(The researcher/s must be in a plantilla researcher position, faculty or faculty researcher; use  ";" for separate names and 255 as max char)</i><br/></div>
	   	</td>
</tr>

<!-- Attachment --->
<tr>
    <td width="155"><div align="right">Prescribed Attachment Filename</div></td>
    <td width="500"><textarea name="file_name_display" id="file_name_display" readonly cols="50" rows="6" ><?php print $file_name_sample; ?></textarea></td>
	<input name="file_name_sample" hidden id="file_name_sample" value="<?php print $file_name_sample; ?>" />
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Copy the above prescribed filename to upload the PDF copy of the Research Project Approval)</i><br/></div>
	   	</td>
</tr>

<tr>
	<td align="right">File to upload</td>
    <td><input type="file" name="uploadFile" id="uploadFile" required onblur="alertFilename(uploadFile)"></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit)</i><br/></div>
	   	</td>
</tr>

<tr>
    <td width="155"><div align="right">Is this research included in the Budget Proposal Form B for the year?</div></td>
 	<td width="500">
    <input type="radio" name="considered_gaa_bp" checked <?php if (isset($considered_gaa_bp) && $considered_gaa_bp=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" name="considered_gaa_bp" <?php if (isset($considered_gaa_bp) && $considered_gaa_bp=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" />
       <input type="submit" name="submit" value="Submit" />
     </div></th>
</tr>

</table>
</form>
<?php
	//Free result set and close connection 
	$query1->close();
	$mysqli->close();
?>
