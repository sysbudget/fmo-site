<?php

session_name("pbb");
session_start();

//is user logged in or not
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
 
 var sto_date = document.getElementById("survey_date");
 
 var surv_date = Date.parse(sto_date.value);
 var today = new Date();
 var surv_date = new Date(surv_date);
 
 if(surv_date > today)
 {
   alert("Date must be before today");
   return false;
 }
 
//set the values of the hidden variables
 SDATE.value= sto_date.value;
 return true;
} 

</script>

<script type="text/javascript" language="JavaScript">
 //check if the date is in MM/DD/YYYY format
 //separates the date into month, day, and year variables
 var datePat = /^(\d{2,2})(\/)(\d{2,2})\2(\d{4}|\d{4})$/;
 
 var matchArray = dateStr.match(datePat);
 if (matchArray == null) {
  alert("Date must be in MM/DD/YYYY format")
  return false;
 }

 month = matchArray[1];
 day = matchArray[3];
 year = matchArray[4];
 if (year < 2016 || year > 2016) {
   alert("Year must be 2016");
   return false;
 }
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
 
 // check the 29th of february
 if (month == 2) { 
   var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
   if (day>29 || (day==29 && !isleap)) {
     alert("February " + year + " doesn't have " + day + " days!");
     return false;
   }
}
    return true;
}

</script>

<script type="text/javascript" language="JavaScript">
$(function() {
$( "#survey_date" ).datepicker();
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
		alert("Use the required filename. " + " " + file_name + " is not similar with the prescribed filename");
		document.getElementById('uploadFile').value="";
		return false;
		}

	if (file_size >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph and indicate the prescribed filename in the subject line");
		document.getElementById('uploadFile').value="";
		return false;
		}
}
</script>

</head>
<body onload='loadCategories()'>

<div class="viewbody">
<h2>STO A: Service Satisfaction Survey - Input New Record</h2>
<a href="sto_forma_view_all.php">View All Records</a>
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

	//query the pulldown objects
    $query1 = $mysqli->query("SELECT sto_forma_rated_service_id, ref_service_received_name FROM `tbl_sd_6_sto_forma_rated_service` ORDER BY ref_service_received_name ASC");
	$query3 = $mysqli->query("SELECT ref_service_received_id, ref_service_received_name FROM `tbl_sd_ref_service_received` ORDER BY ref_service_received_id ASC");
	$query4 = $mysqli->query("SELECT ref_service_rating_id, ref_service_rating_name FROM `tbl_sd_ref_service_rating` ORDER BY ref_service_rating_name ASC");
	
	//create an array for each returned row
	while($array1[] = $query1->fetch_object());
	
    //remove blank entry at end of array
	array_pop($array1);
	
    //repeat the process for the next query
    while($array3[] = $query3->fetch_object());
	array_pop($array3);

    //repeat the process for the next query
    while($array4[] = $query4->fetch_object());
	array_pop($array4);

    //Generate attachment filename
	date_default_timezone_set("Asia/Hong_Kong");
	$timestamp = time();
	$d = date("Ymd_His",$timestamp);
	$cu = preg_replace('/\s+/', ' ', $cu_short_name);
	$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
	$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);

	$file_name_sample = "sto_sample_filled_up_questionnaire_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample = strtolower($file_name_sample);
	$file_name_sample = preg_replace('/\s+/', '', $file_name_sample);

?>

<!-- user interface -->
<form name="inputForm" action="sto_forma_insert.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
<table>

<tr>
    <td><div align="right"><b>Service Provider: <b></div></td> 
    <td><b> <?php print $unit_contributor_name; ?> <b></td>
</tr>

<tr>
    <td></td>
    <td colspan="2" scope="row"><div align="left">
    <i>(Contributing unit)</i><br/></div>
    <br />
    </td> 
</tr>

<tr>
    <td><div align="right"><b>Service Recipient:</b></div></td>
</tr>

<tr>
    <td width="155"><div align="right">Name of Survey Respondent and Position</div></td> 
    <td width="500"><textarea name="surveyed_unit_head" cols="50" rows="6" onkeyup="limit(surveyed_unit_head)" onblur="limit(surveyed_unit_head)" required></textarea></td>
</tr>

<tr>
   <td></td>
   <td colspan="2" scope="row"><div align="left">
   <i>(Complete name of respondent and position in UP; use 255 as max. char.)</i><br/></div>
   <br />
   </td>
</tr>      
       
<tr>
    <td width="155"><div align="right">UP Unit Name</div></td> 
    <td width="500"><textarea name="surveyed_unit" cols="50" rows="6" onkeyup="limit(surveyed_unit)" onblur="limit(surveyed_unit)" required></textarea></td>
</tr>

<tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
    <i>(UP Unit of survey respondent; use 255 as max. char.)</i><br/></div>
   	<br />
    </td>
</tr>
      
<tr>
    <td><div align="right">STO Service Received</div><br /></td>
    <td><select name="service_received" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array3 as $option3) : ?>
      <option value="<?php echo $option3->ref_service_received_id . ',' . $option3->ref_service_received_name; ?>"><?php echo $option3->ref_service_received_name; ?></option>
      <?php endforeach; ?>
     </select>
     </td>
</tr>

<tr>
    <td width="155"><div align="right">Details of STO Service Received</div></td> 
    <td width="500"><textarea name="service_detail" cols="50" rows="6" onkeyup="limit(service_detail)" onblur="limit(service_detail)" required></textarea></td>
</tr>

<tr>
    <td></td>
    <td colspan="2" scope="row"><div align="left">
    <i>(Use 255 as max. char.)</i></div>
    </td>
</tr>

<tr>
    <td width="155"><br /><div align="right">Was the STO Service Financed by the General Fund for the Year?</div></td>
 	<td width="500">
    <input type="radio" name="service_gaa" checked <?php if (isset($service_gaa) && $service_gaap=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" name="service_gaa" <?php if (isset($service_gaa) && $service_gaa=="N") echo "checked";?>  value="N">No
    <br />
    </td>
</tr>

<tr>
    <td><br /><div align="right">Survey Date</div></td>
    <td><input name="survey_date" type="text" required id="survey_date" value="" size="11"/></td>
</tr>

<tr>
   <td></td>
   <td colspan="2" scope="row"><div align="left">
   <i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar)</i><br/></div>
   <br />
   </td>
</tr>

<!-- radio sample-->
<tr>
   <td><div align="right">Survey Mode</div></td>
   <td>
   <input type="radio" name="survey_mode" checked <?php if (isset($survey_mode) && $survey_mode=="Conventioanl") echo "checked";?>  value="Conventional">Conventional
   <input type="radio" name="survey_mode" <?php if (isset($survey_mode) && $survey_mode=="Online") echo "checked";?>  value="Online">Online
   </td>
</tr>

<tr>  
    <td><br /><div align="right">Rating of STO Service</div></td>
    <td><select name="service_rating" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array4 as $option4) : ?>
      <option value="<?php echo $option4->ref_service_rating_id . ',' . $option4->ref_service_rating_name; ?>"><?php echo $option4->ref_service_rating_name; ?></option>
      <?php endforeach; ?>
     </select>
     </td>
</tr>

<tr>
    <td></td>
    <td colspan="2" scope="row"><div align="left">
    <i>(Please select an item in the list.)</i><br/></div>
    <br />
	</td>
</tr>

<!-- Attachment --->
<tr>
    <td width="155"><div align="right">Prescribed Attachment Filename</div></td>
    <td width="500"><textarea name="file_name_display" id="file_name_display" readonly cols="50" rows="6" required><?php print $file_name_sample; ?></textarea></td>
	<input name="file_name_sample" hidden id="file_name_sample" value="<?php print $file_name_sample; ?>" />
</tr>

<tr>
    <td></td>
    <td colspan="2" scope="row"><div align="left">
    <i>(Copy the above prescribed filename to your computer to upload the PDF copy of a filled-up questionnaire)</i></div>
    <br />
    </td>
</tr>

<tr>
	<td align="right">File to upload<br /></td>
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
    <th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" />
       <input type="submit" name="submit" value="Submit"/>
     </div></th>
</tr>

</table>
</form>
<?php
	//free up queries and close connection 
	$query1->close();
	$query3->close();
	$query4->close();
	$mysqli->close();
?>
</body>
</html>