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

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
$mysqli->set_charset("utf8");

//Return an error if we have connection issues
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}
// get the id from the url
	$mfo3_formc_patented_id = $_GET['id'];

$query = "SELECT
mfo3_form_program_id,
unit_contributor_id,
unit_delivery_id,
focal_person_id,
cu_id,
cu_short_name,
unit_delivery_name_cu,
unit_contributor_name,
research_type_id,
research_type_name,
mfo3_form_research_title,
mfo3_form_research_duration_in_months_plan,
mfo3_form_research_month_year_started,
mfo3_form_research_month_year_completed,
mfo3_formc_patented_patent_title,
mfo3_formc_patented_quarter,
mfo3_formc_patented_date_submitted_for_patenting,
mfo3_formc_patented_application_id_no,
mfo3_formc_patented_date_patented,
mfo3_formc_patented_patent_id_no,
mfo3_formc_patented_inventor_name,
mfo3_form_research_name_of_authors,
mfo3_formc_patented_patent_attachment,
mfo3_formc_patented_considered_in_gaa,
mfo3_formc_patented_id
FROM tbl_sd_3_mfo3_formc_patented
WHERE mfo3_formc_patented_id = " . $mfo3_formc_patented_id;

$record_set = $mysqli->query($query);
$row = $record_set->fetch_assoc();

//Extract fields.
	$unit_contributor_id = $row['unit_contributor_id'];
	$unit_delivery_id = $row['unit_delivery_id'];
	$focal_person_id = $row['focal_person_id'];
	$cu_id = $row['cu_id'];
	$cu_short_name = $row['cu_short_name'];
	$unit_delivery_name_cu = $row['unit_delivery_name_cu'];
	$unit_contributor_name = $row['unit_contributor_name'];
	$mfo3_form_program_id = $row['mfo3_form_program_id'];
	$research_type_id = $row['research_type_id'];
	$research_type_name = $row['research_type_name'];
	$rsrch_title = $row['mfo3_form_research_title'];
	$proj_duration = $row['mfo3_form_research_duration_in_months_plan'];
	$start_date = strtotime($row['mfo3_form_research_month_year_started']);
	$end_date = strtotime($row['mfo3_form_research_month_year_completed']);
	$author = $row['mfo3_form_research_name_of_authors'];

	$pat_title = $row['mfo3_formc_patented_patent_title'];
	$appli_date = strtotime($row['mfo3_formc_patented_date_submitted_for_patenting']);
	$appli_num = $row['mfo3_formc_patented_application_id_no'];
	$pat_date = strtotime($row['mfo3_formc_patented_date_patented']);
	$pat_num = $row['mfo3_formc_patented_patent_id_no'];
	$pat_inventor = $row['mfo3_formc_patented_inventor_name'];	
	$considered_gaa_bp = $row['mfo3_formc_patented_considered_in_gaa'];


	$a = $row['mfo3_formc_patented_patent_attachment'];
	$pat_attachment = rtrim($a,".pdf");

//Get session values
	$cutOffDate_id = $_SESSION['cutOffDate_id'];
	$t_startDate = $_SESSION['t_startDate'];
	$a_cutOffDate_contributor = $_SESSION['a_cutOffDate_contributor'];
	$a_cutOffDate_delivery = $_SESSION['a_cutOffDate_delivery'];
	$a_cutOffDate_fp = $_SESSION['a_cutOffDate_fp'];
	$a_cutOffDate_remarks = $_SESSION['a_cutOffDate_remarks'];

	$cu_short_name = $_SESSION['cu_short_name'];
	$unit_delivery_name_short = $_SESSION['unit_delivery_name_short'];
	$unit_contributor_name_short = $_SESSION['unit_contributor_name_short'];

//Generate sample filename
	date_default_timezone_set("Asia/Hong_Kong");
	$timestamp = time();
	$d = date("Ymd_His",$timestamp);
	$cu = preg_replace('/\s+/', ' ', $cu_short_name);
	$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
	$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);
	
	if (empty($pat_attachment)){
	$file_name_sample = "mfo3_research_approval_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample = strtolower($file_name_sample);
	$file_name_sample = preg_replace('/\s+/', '', $file_name_sample);
	$pat_attachment = $file_name_sample;
	}

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

<!-- script to check dates -->
<script type="text/javascript" language="JavaScript">
function validateForm()
{
 var stdate = document.getElementById("start_date");
 var endate = document.getElementById("pat_date");

 //Check if patent date is up to current date
 var ed = document.getElementById("appli_date").value;
 var sdd = document.getElementById("start_date").value;

 var tom_ed = new Date(ed);
 tom_ed.setDate(tom_ed.getDate() + 1);
 var ed = new Date(tom_ed).toISOString().slice(0,10);
 var tom_sdd = new Date(sdd);
 tom_sdd.setDate(tom_sdd.getDate() + 1);
 var sdd = new Date(tom_sdd).toISOString().slice(0,10);

 if (ed < sdd){
 alert ("Application date can not be prior to start date of the research " + sdd);
 return false;
 }

 //Check if patent date is up to current date
 var ed = document.getElementById("appli_date").value;
 d = new Date();
 utc = d.getTime() + (d.getTimezoneOffset() * 60000);
 nd = new Date(utc + (3600000*16));
 var todayDate = nd.toISOString().split('T')[0]

 var tomorrow = new Date(ed);
 tomorrow.setDate(tomorrow.getDate() + 1);
 var ed = new Date(tomorrow).toISOString().slice(0,10);

 var beginDate = new Date(2016,0,2).toISOString().slice(0,10);
 var endDate = new Date(2017,0,1).toISOString().slice(0,10);

 if (ed < beginDate || ed > endDate){
 alert ("Date of application " + ed + " does not fall in the year 2016");
 return false;
 }
 else if (ed > todayDate){
 alert ("Date of applicatioin " + ed + " is over the current date");
 return false;
 }

 //Check if patent date is up to current date
 var ed = document.getElementById("pat_date").value;
 d = new Date();
 utc = d.getTime() + (d.getTimezoneOffset() * 60000);
 nd = new Date(utc + (3600000*16));
 var todayDate = nd.toISOString().split('T')[0]

 var tomorrow = new Date(ed);
 tomorrow.setDate(tomorrow.getDate() + 1);
 var ed = new Date(tomorrow).toISOString().slice(0,10);

 var beginDate = new Date(2016,0,2).toISOString().slice(0,10);
 var endDate = new Date(2017,0,1).toISOString().slice(0,10);

 if (ed < beginDate || ed > endDate){
 alert ("Date of patent " + ed + " does not fall in the year 2016");
 return false;
 }
 else if (ed > todayDate){
 alert ("Date of patent " + ed + " is over the current date");
 return false;
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
 //FROMDATE.value= stdate.value;
 //TODATE.value= endate.value;

 var stdate = document.getElementById("appli_date");
 var endate = document.getElementById("pat_date");

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
 //FROMDATE.value= stdate.value;
 //TODATE.value= endate.value;
 
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
  alert("Patent date can not be prior to start date of the research " + stdateval);
  return false;
  }

return true;

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
$( "#appli_date" ).datepicker();
});

$(function() {
$( "#pat_date" ).datepicker();
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

</head>

<body>

<div class="viewbody">
<h2>MFO3: Patent - Edit Record</h2>
<a href="patent_view_all.php">View All Records</a>
<hr/>

<!-- Edit form here -->
<form id="edit_patent_form" method="post" action="patent_save_edited.php" onsubmit="return validateForm()" enctype="multipart/form-data">

<input name="mfo3_form_program_id" type="hidden" value="<?php print $mfo3_form_program_id; ?>" />
<input name="unit_contributor_id" type="hidden" value="<?php print $unit_contributor_id; ?>" />
<input name="unit_delivery_id" type="hidden" value="<?php print $unit_delivery_id; ?>" />
<input name="focal_person_id" type="hidden" value="<?php print $focal_person_id; ?>" />
<input name="cu_id" type="hidden" value="<?php print $cu_id; ?>" />
<input name="cu_short_name" type="hidden" value="<?php print $cu_short_name; ?>" />
<input name="unit_delivery_name_cu" type="hidden" value="<?php print $unit_delivery_name_cu; ?>" />
<input name="unit_contributor_name" type="hidden" value="<?php print $unit_contributor_name; ?>" />
<input name="research_type_id" type="hidden" value="<?php print $research_type_id; ?>" />
<input name="research_type_name" type="hidden" value="<?php print $research_type_name; ?>" />
<input name="rsrch_title" type="hidden" value="<?php print $rsrch_title; ?>" />
<input name="proj_duration" type="hidden" value="<?php print $proj_duration; ?>" />
<input name="start_date" id="start_date" type="hidden" value="<?php print date ("m/d/Y",$start_date); ?>" />
<input name="end_date" id="end_date" type="hidden" value="<?php print date ("m/d/Y",$end_date); ?>" />
<input name="author" type="hidden" value="<?php print $author; ?>" />

<table>
	<tr>
    	<td width="155"><div align="right">Research Title</div><div align="right"></div></td> 
    	<td width="500"><textarea name="temp_rsrch_title" cols="50" rows="6" disabled><?php print $rsrch_title; ?></textarea></td>
	</tr>

    <tr>
    	<td width="155"><div align="right">Patent Title</div></td>
	   	<td width="500"><textarea name="pat_title" cols="50" rows="6" onkeyup="limit(pat_title)" onblur="limit(pat_title)" required style='text-align:left'><?php print $pat_title; ?></textarea></td>
  	</tr>

	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(use 255 char. max.)</i><br/></div>
	   	</td>
	</tr>

	<tr>
    	<td width="155"><div align="right">Application Date</div></td>
    	<td width="500"><input name="appli_date" type="text" required id="appli_date" value="<?php print date("m/d/Y",$appli_date); ?>" size="11"/></td>
	</tr>

	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar)</i><br/></div>
	   	</td>
	</tr>

	<tr>
    	<td width="155"><div align="right">Application No.</div></td>
    	<td width="500"><input name="appli_num" type="text" required id="appli_num" value="<?php print $appli_num; ?>" size="11"/></td>
	</tr>

    <tr>
	<tr>
    	<td width="155"><div align="right">Date Patented</div></td>
    	<td width="500"><input name="pat_date" type="text" required id="pat_date" value="<?php print date("m/d/Y",$pat_date); ?>" size="11"/></td>
	</tr>

	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar)</i><br/></div>
	   	</td>
	</tr>

	<tr>
    	<td width="155"><div align="right">Patent No.</div></td>
    	<td width="500"><input name="pat_num" type="text" required id="pat_num" value="<?php print $pat_num; ?>" size="11"/></td>
	</tr>
    <tr>
    	<td width="155"><div align="right">Name of Inventor/s</div></td>
	   	<td width="500"><textarea name="pat_inventor" cols="50" rows="6" onkeyup="limit(pat_inventor)" onblur="limit(pat_inventor)" required style='text-align:left'><?php print $pat_inventor; ?></textarea></td>
  	</tr>

	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(use 255 char. max and separate names with ";")</i><br/></div>
	   	</td>
	</tr>

<!-- Attachment --->
<tr>
    <td width="155"><div align="right">Prescribed Attachment Filename</div></td>
    <td width="500"><textarea name="file_name_display" id="file_name_display" readonly cols="50" rows="6" required><?php print $pat_attachment; ?></textarea></td>
	<input name="file_name_sample" hidden id="file_name_sample" value="<?php print $pat_attachment; ?>" />
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Copy the above prescribed filename to upload the PDF copy of the Patenting Document)</i><br/></div>
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
    <td width="155"><div align="right">Is this patent included in the Budget Proposal Form B for the year?</div></td>
 	<td width="500">
    <input type="radio" name="considered_gaa_bp" <?php if (isset($considered_gaa_bp) && $considered_gaa_bp=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" name="considered_gaa_bp" <?php if (isset($considered_gaa_bp) && $considered_gaa_bp=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
   	<th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" />
       <input type="hidden" name="mfo3_formc_patented_id" value="<?php print $mfo3_formc_patented_id; ?>"><button type="submit">Submit</button></div>
	</th>
    </tr>

</table>
</form>
<?php
	//Free result set and close connection 
	//$query1->close();
	//$mysqli->close();
?>
</body>
</html>