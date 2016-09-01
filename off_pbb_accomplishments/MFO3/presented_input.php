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
	$mysqli = new mysqli($server, $user, $pass, $db);
	$mysqli->set_charset("utf8");

//Return an error if we have connection issues
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}

// get the id from the url
	$mfo3_form_program_id = $_GET['id'];

	$query = "SELECT unit_contributor_id, unit_delivery_id, focal_person_id, cu_id, cu_short_name, unit_delivery_name_cu, unit_contributor_name, research_type_id, research_type_name, mfo3_form_research_title, mfo3_form_research_duration_in_months_plan,  mfo3_form_research_month_year_started, mfo3_form_research_month_year_completed, mfo3_form_research_quarter, mfo3_form_research_completed, mfo3_form_research_completed_within_the_timeframe, mfo3_form_research_name_of_authors, mfo3_form_research_attachment, mfo3_form_program_id FROM tbl_sd_3_mfo3_form_research WHERE mfo3_form_program_id =" . $mfo3_form_program_id;

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
	$quarter = $row['mfo3_form_research_quarter'];
	$completed = $row['mfo3_form_research_completed'];	
	$proj_duration = $row['mfo3_form_research_duration_in_months_plan'];
	$start_date = strtotime($row['mfo3_form_research_month_year_started']);
	$end_date = strtotime($row['mfo3_form_research_month_year_completed']);
	$author = $row['mfo3_form_research_name_of_authors'];
	$completed_sched = $row['mfo3_form_research_completed_within_the_timeframe'];
	$attachment = $row['mfo3_form_research_attachment'];

	//Get session values
	$unit_delivery_name_short = $_SESSION['unit_delivery_name_short'];
	$unit_contributor_name_short = $_SESSION['unit_contributor_name_short'];

	//Generate sample filename
	date_default_timezone_set("Asia/Hong_Kong");
	$timestamp = time();
	$d = date("Ymd_His",$timestamp);
	$cu = preg_replace('/\s+/', ' ', $cu_short_name);
	$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
	$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);
	$file_name_sample = "mfo3_research_presented_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample = strtolower($file_name_sample);
	$file_name_sample = preg_replace('/\s+/', '', $file_name_sample);

//Query the database for the results we want
$query1 = $mysqli->query("SELECT conference_forum_type_id, conference_forum_type_name FROM `tbl_sd_ref_conference_forum_type` ORDER BY `conference_forum_type_name` ASC");

//Create an array of objects for each returned row
while($array1[] = $query1->fetch_object());
		
//Remove the blank entry at end of array
array_pop($array1);

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
 var endate = document.getElementById("confe_date");

 //Check if presentation date is up to current date
 var ed = document.getElementById("confe_date").value;

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
 alert ("Date presented " + ed + " does not fall in the year 2016");
 return false;
 }
 else if (ed > todayDate){
 alert ("Date presented " + ed + " is over the current date");
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
  alert("Presentation date can not be prior to the start date of the research " + stdateval);
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
$( "#confe_date" ).datepicker();
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
<h2>MFO3: Paper Presented - Input New Record</h2><hr/>

<!-- Edit form here -->
<form id="input_presented" method="post" action="presented_save.php" onsubmit="return validateForm()" enctype="multipart/form-data">

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
<input name="quarter" type="hidden" value="<?php print $quarter; ?>" />
<input name="completed" type="hidden" value="<?php print $completed; ?>" />
<input name="proj_duration" type="hidden" value="<?php print $proj_duration; ?>" />
<input name="start_date" id="start_date" type="hidden" value="<?php print date ("m/d/Y",$start_date); ?>" />
<input name="end_date" id="end_date" type="hidden" value="<?php print date ("m/d/Y",$end_date); ?>" />
<input name="author" type="hidden" value="<?php print $author; ?>" />
<input name="completed_sched" type="hidden" value="<?php print $completed_sched; ?>" />
<input name="attachment" type="hidden" value="<?php print $attachment; ?>" />

<table>
	<tr>
    	<td width="155"><div align="right">Research Title</div><div align="right"></div></td> 
    	<td width="500"><textarea name="temp_rsrch_title" cols="50" rows="6" disabled><?php print $rsrch_title; ?></textarea></td>
	</tr>

	<tr>
    	<td width="155"><div align="right">Date Presented</div></td>
    	<td width="500"><input name="confe_date" type="text" required id="confe_date" value="" size="11"/></td>
	</tr>

	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar)</i><br/></div>
	   	</td>
	</tr>

    <tr>
    	<td width="155"><div align="right">Paper Presenter</div></td>
	   	<td width="500"><textarea name="confe_presenter" cols="50" rows="6" onkeyup="limit(confe_presenter)" onblur="limit(confe_presenter)" required style='text-align:left'></textarea></td>
  	</tr>

	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(use ";" for separate names and 255 as max char)</i><br/></div>
	   	</td>
	</tr>

	<tr>
   		<td><div align="right">
		<strong>Conference</strong></div>
		</td>
	</tr>    
	<tr>
    	<td width="155"><div align="right">Type</div></td>
    	<td width="500"><select name="confe_type" size="1" required>
    	<option value="">Please Select :</option>
    	  <?php foreach($array1 as $option1) : ?>
    	  <option value="<?php echo $option1->conference_forum_type_id . ',' . $option1->conference_forum_type_name; ?>"><?php echo $option1->conference_forum_type_name; ?></option>
    	  <?php endforeach; ?>
    	 </select></td>
	</tr>
    <tr>
    	<td width="155"><div align="right">Venue</div></td>
	   	<td width="500"><textarea name="confe_venue" cols="50" rows="6" onkeyup="limit(confe_venue)" onblur="limit(confe_venue)" required style='text-align:left'></textarea></td>
  	</tr>

	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(use 255 as max char)</i><br/></div>
	   	</td>
	</tr>

    <tr>
    	<td width="155"><div align="right">Title</div></td>
	   	<td width="500"><textarea name="confe_title" cols="50" rows="6" onkeyup="limit(confe_title)" onblur="limit(confe_title)" required style='text-align:left'></textarea></td>
  	</tr>

	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(use 255 as max char)</i><br/></div>
	   	</td>
	</tr>

<!-- Attachment --->
<tr>
    <td width="155"><div align="right">Prescribed Attachment Filename</div></td>
    <td width="500"><textarea name="file_name_display" id="file_name_display" readonly cols="50" rows="6" required><?php print $file_name_sample; ?></textarea></td>
	<input name="file_name_sample" hidden id="file_name_sample" value="<?php print $file_name_sample; ?>" />
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Copy the above prescribed filename to upload the PDF copy of the Research Conference Program)</i><br/></div>
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
    <td width="155"><div align="right">Is this paper presentation included in the Budget Proposal Form B for the year?</div></td>
 	<td width="500">
    <input type="radio" name="considered_gaa_bp" checked <?php if (isset($considered_gaa_bp) && $considered_gaa_bp=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" name="considered_gaa_bp" <?php if (isset($considered_gaa_bp) && $considered_gaa_bp=="N") echo "checked";?>  value="N">No
	</td>
</tr>

    <tr>
   	<th rowspan="4" scope="row"><div align="center">
       <input type="reset" value="Clear" id="button" />
       <input type="submit"  value="Submit" />

		</div></th>
   </tr>
    
</table>

</form>

<?php
	//Free result set and close connection 
	$query1->close();
	$mysqli->close();
?>

</body>
</html>