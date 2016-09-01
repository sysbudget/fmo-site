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
	$mfo4_formb_advisory_id = $_GET['id'];

$query = "SELECT 
unit_delivery_name_cu,
unit_contributor_name,
mfo4_formb_advisory_title,
mfo4_formb_advisory_place,
mfo4_formb_advisory_date,
mfo4_formb_advisory_request_mode,
mfo4_formb_advisory_no_of_persons_requested,
mfo4_formb_advisory_request_attachment,
mfo4_formb_advisory_survey_conducted,
mfo4_formb_advisory_no_of_requests_responded_witin_3_days,
mfo4_formb_advisory_no_of_persons_served,
mfo4_formb_advisory_survey_mode,
mfo4_formb_advisory_considered_in_gaa,
mfo4_formb_advisory_was_a_survey_conducted_to_rate_advisory,
mfo4_formb_advisory_no_of_presons_surveyed_to_rate_advisory,
mfo4_formb_advisory_surveyed_to_rate_advisory_no_answer,
mfo4_formb_advisory_surveyed_to_rate_advisory_bad,
mfo4_formb_advisory_surveyed_to_rate_advisory_fair,
mfo4_formb_advisory_surveyed_to_rate_advisory_good,
mfo4_formb_advisory_surveyed_to_rate_advisory_better,
mfo4_formb_advisory_surveyed_to_rate_advisory_best,
mfo4_formb_advisory_survey_form_to_rate_advisory_attachment,
mfo4_formb_advisory_no_of_lgu_communities_assisted,
mfo4_formb_advisory_was_a_survey_conducted_to_ask_if_timely,
mfo4_formb_advisory_no_of_presons_surveyed_to_ask_if_timely,
mfo4_formb_advisory_surveyed_to_ask_if_timely_no_answer,
mfo4_formb_advisory_surveyed_to_ask_if_timely_bad,
mfo4_formb_advisory_surveyed_to_ask_if_timely_fair,
mfo4_formb_advisory_surveyed_to_ask_if_timely_good,
mfo4_formb_advisory_surveyed_to_ask_if_timely_better,
mfo4_formb_advisory_surveyed_to_ask_if_timely_best,
mfo4_formb_advisory_survey_form_to_ask_if_timely_attachment,
mfo4_formb_advisory_survey_tally_sheet,
mfo4_formb_advisory_id
FROM tbl_sd_4_mfo4_formb_advisory 
WHERE mfo4_formb_advisory_id = " . $mfo4_formb_advisory_id;

$record_set = $mysqli->query($query);
$row = $record_set->fetch_assoc();

//Extract fields.
	$advisory_title = $row['mfo4_formb_advisory_title'];
	$advisory_venue = $row['mfo4_formb_advisory_place'];
	$start_date = strtotime($row['mfo4_formb_advisory_date']);
	$request_mode = $row['mfo4_formb_advisory_request_mode'];
	$request_count = $row['mfo4_formb_advisory_no_of_persons_requested'];
	$survey_conducted = $row['mfo4_formb_advisory_survey_conducted'];
	$request_acted = $row['mfo4_formb_advisory_no_of_requests_responded_witin_3_days'];
	$client_count = $row['mfo4_formb_advisory_no_of_persons_served'];
	$considered_gaa_bp = $row['mfo4_formb_advisory_considered_in_gaa'];
	$rating_conducted = $row['mfo4_formb_advisory_was_a_survey_conducted_to_rate_advisory'];
	$rating_mode = $row['mfo4_formb_advisory_survey_mode'];
	$rating_survey_size = $row['mfo4_formb_advisory_no_of_presons_surveyed_to_rate_advisory'];
	$no_rating_count = $row['mfo4_formb_advisory_surveyed_to_rate_advisory_no_answer'];
	$poor_rating_count = $row['mfo4_formb_advisory_surveyed_to_rate_advisory_bad'];
	$fair_rating_count = $row['mfo4_formb_advisory_surveyed_to_rate_advisory_fair'];
	$good_rating_count = $row['mfo4_formb_advisory_surveyed_to_rate_advisory_good'];
	$better_rating_count = $row['mfo4_formb_advisory_surveyed_to_rate_advisory_better'];
	$best_rating_count = $row['mfo4_formb_advisory_surveyed_to_rate_advisory_best'];
	$assisted_count = $row['mfo4_formb_advisory_no_of_lgu_communities_assisted'];
	$timeliness_conducted = $row['mfo4_formb_advisory_was_a_survey_conducted_to_ask_if_timely'];
	$timeliness_survey_size = $row['mfo4_formb_advisory_no_of_presons_surveyed_to_ask_if_timely'];
	$no_timeliness_count = $row['mfo4_formb_advisory_surveyed_to_ask_if_timely_no_answer'];
	$poor_timeliness_count = $row['mfo4_formb_advisory_surveyed_to_ask_if_timely_bad'];
	$fair_timeliness_count = $row['mfo4_formb_advisory_surveyed_to_ask_if_timely_fair'];
	$good_timeliness_count = $row['mfo4_formb_advisory_surveyed_to_ask_if_timely_good'];
	$better_timeliness_count = $row['mfo4_formb_advisory_surveyed_to_ask_if_timely_better'];
	$best_timeliness_count = $row['mfo4_formb_advisory_surveyed_to_ask_if_timely_best'];
	$mfo4_formb_advisory_id = $row['mfo4_formb_advisory_id'];

	if ($request_count == 0){$request_count = "";}
	if ($request_acted == 0){$request_acted = "";}
	if ($rating_survey_size == 0){$rating_survey_size = "";}
	if ($no_rating_count == 0){$no_rating_count = "";}
	if ($poor_rating_count == 0){$poor_rating_count = "";}
	if ($fair_rating_count == 0){$fair_rating_count = "";}
	if ($good_rating_count == 0){$good_rating_count = "";}
	if ($better_rating_count == 0){$better_rating_count = "";}
	if ($best_rating_count == 0){$best_rating_count = "";}
	if ($timeliness_survey_size == 0){$timeliness_survey_size = "";}
	if ($no_timeliness_count == 0){$no_timeliness_count = "";}
	if ($poor_timeliness_count == 0){$poor_timeliness_count = "";}
	if ($fair_timeliness_count == 0){$fair_timeliness_count = "";}
	if ($good_timeliness_count == 0){$good_timeliness_count = "";}
	if ($better_timeliness_count == 0){$better_timeliness_count = "";}
	if ($best_timeliness_count == 0){$best_timeliness_count = "";}

	$a = $row['mfo4_formb_advisory_request_attachment'];
	$attach_adv_service_req = rtrim($a,".pdf");
	$b = $row['mfo4_formb_advisory_survey_form_to_rate_advisory_attachment'];
	$attach_rating_sample = rtrim($b,".pdf");
	$c = $row['mfo4_formb_advisory_survey_form_to_ask_if_timely_attachment'];
	$attach_timeliness_sample = rtrim($c,".pdf");
	$d = $row['mfo4_formb_advisory_survey_tally_sheet'];
	$attach_tally_sheet = rtrim($d,".pdf");

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

	//Generate sample filename
	date_default_timezone_set("Asia/Hong_Kong");
	$timestamp = time();
	$d = date("Ymd_His",$timestamp);
	$cu = preg_replace('/\s+/', ' ', $cu_short_name);
	$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
	$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);
	
	if (empty($attach_adv_service_req)){
	$file_name_sample1 = "mfo4_advisory_request_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample1 = strtolower($file_name_sample1);
	$file_name_sample1 = preg_replace('/\s+/', '', $file_name_sample1);
	$attach_adv_service_req = $file_name_sample1;
	}
	
	if (empty($attach_rating_sample)){
	$file_name_sample2 = "mfo4_advisory_rating_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample2 = strtolower($file_name_sample2);
	$file_name_sample2 = preg_replace('/\s+/', '', $file_name_sample2);
	$attach_rating_sample = $file_name_sample2;
	}

	if (empty($attach_timeliness_sample)){
	$file_name_sample3 = "mfo4_advisory_timeliness_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample3 = strtolower($file_name_sample3);
	$file_name_sample3 = preg_replace('/\s+/', '', $file_name_sample3);
	$attach_timeliness_sample = $file_name_sample3;
	}

	if (empty($attach_tally_sheet)){
	$file_name_sample4 = "mfo4_advisory_tally_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample4 = strtolower($file_name_sample4);
	$file_name_sample4 = preg_replace('/\s+/', '', $file_name_sample4);
	$attach_tally_sheet = $file_name_sample4;
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

<script type="text/javascript" language="JavaScript">
//Check if survey conducted
function check_survey()
{
	if (document.getElementById("rc2").checked) {
   		document.getElementById("rating_survey_size").disabled = true;
   		document.getElementById("no_rating_count").disabled = true;
   		document.getElementById("poor_rating_count").disabled = true;
   		document.getElementById("fair_rating_count").disabled = true;
   		document.getElementById("good_rating_count").disabled = true;
   		document.getElementById("better_rating_count").disabled = true;
   		document.getElementById("best_rating_count").disabled = true;
   		document.getElementById("uploadFile2").disabled = true;
		}

	if (document.getElementById("tc2").checked) {
   		document.getElementById("timeliness_survey_size").disabled = true;
   		document.getElementById("no_timeliness_count").disabled = true;
   		document.getElementById("poor_timeliness_count").disabled = true;
   		document.getElementById("fair_timeliness_count").disabled = true;
   		document.getElementById("good_timeliness_count").disabled = true;
   		document.getElementById("better_timeliness_count").disabled = true;
   		document.getElementById("best_timeliness_count").disabled = true;
   		document.getElementById("uploadFile3").disabled = true;
	}

	if (document.getElementById("rc2").checked && document.getElementById("tc2").checked) {
   		document.getElementById("uploadFile4").disabled = true;
	}

}

function disable_survey()
{
	if (document.getElementById("c1").checked) {
   		document.getElementById("rc1").checked = true;
		document.getElementById("tc1").checked = true;
		document.getElementById("rm1").disabled = false;
		document.getElementById("rm2").disabled = false;
		
   		document.getElementById("rating_survey_size").disabled = false;
   		document.getElementById("no_rating_count").disabled = false;
   		document.getElementById("poor_rating_count").disabled = false;
   		document.getElementById("fair_rating_count").disabled = false;
   		document.getElementById("good_rating_count").disabled = false;
   		document.getElementById("better_rating_count").disabled = false;
   		document.getElementById("best_rating_count").disabled = false;
   		document.getElementById("uploadFile2").disabled = false;
   		document.getElementById("timeliness_survey_size").disabled = false;
   		document.getElementById("no_timeliness_count").disabled = false;
   		document.getElementById("poor_timeliness_count").disabled = false;
   		document.getElementById("fair_timeliness_count").disabled = false;
   		document.getElementById("good_timeliness_count").disabled = false;
   		document.getElementById("better_timeliness_count").disabled = false;
   		document.getElementById("best_timeliness_count").disabled = false;
   		document.getElementById("uploadFile3").disabled = false;
   		document.getElementById("uploadFile4").disabled = false;
	}
	else
	{
		document.getElementById("rm1").disabled = true;
		document.getElementById("rm2").disabled = true;
   		document.getElementById("rc1").checked = false;
   		document.getElementById("rc2").checked = true;
		document.getElementById("tc1").checked = false;
		document.getElementById("tc2").checked = true;
   		document.getElementById("rating_survey_size").disabled = true;
   		document.getElementById("no_rating_count").disabled = true;
   		document.getElementById("poor_rating_count").disabled = true;
   		document.getElementById("fair_rating_count").disabled = true;
   		document.getElementById("good_rating_count").disabled = true;
   		document.getElementById("better_rating_count").disabled = true;
   		document.getElementById("best_rating_count").disabled = true;
   		document.getElementById("uploadFile2").disabled = true;
   		document.getElementById("timeliness_survey_size").disabled = true;
   		document.getElementById("no_timeliness_count").disabled = true;
   		document.getElementById("poor_timeliness_count").disabled = true;
   		document.getElementById("fair_timeliness_count").disabled = true;
   		document.getElementById("good_timeliness_count").disabled = true;
   		document.getElementById("better_timeliness_count").disabled = true;
   		document.getElementById("best_timeliness_count").disabled = true;
   		document.getElementById("uploadFile3").disabled = true;
   		document.getElementById("uploadFile4").disabled = true;
   		document.getElementById("rating_survey_size").value = "";
   		document.getElementById("no_rating_count").value = "";
   		document.getElementById("poor_rating_count").value = "";
   		document.getElementById("fair_rating_count").value = "";
   		document.getElementById("good_rating_count").value = "";
   		document.getElementById("better_rating_count").value = "";
   		document.getElementById("best_rating_count").value = "";
   		document.getElementById("timeliness_survey_size").value = "";
   		document.getElementById("no_timeliness_count").value = "";
   		document.getElementById("poor_timeliness_count").value = "";
   		document.getElementById("fair_timeliness_count").value = "";
   		document.getElementById("good_timeliness_count").value = "";
   		document.getElementById("better_timeliness_count").value = "";
   		document.getElementById("best_timeliness_count").value = "";
	}
	
}
</script>

<script type="text/javascript" language="JavaScript">
//Check if rating conducted
function disable_rating()
{
	if (document.getElementById("rc1").checked) {
		document.getElementById("rm1").disabled = false;
		document.getElementById("rm2").disabled = false;
   		document.getElementById("rating_survey_size").disabled = false;
   		document.getElementById("no_rating_count").disabled = false;
   		document.getElementById("poor_rating_count").disabled = false;
   		document.getElementById("fair_rating_count").disabled = false;
   		document.getElementById("good_rating_count").disabled = false;
   		document.getElementById("better_rating_count").disabled = false;
   		document.getElementById("best_rating_count").disabled = false;
   		document.getElementById("uploadFile2").disabled = false;
	}
	else
	{
   		document.getElementById("rating_survey_size").disabled = true;
   		document.getElementById("no_rating_count").disabled = true;
   		document.getElementById("poor_rating_count").disabled = true;
   		document.getElementById("fair_rating_count").disabled = true;
   		document.getElementById("good_rating_count").disabled = true;
   		document.getElementById("better_rating_count").disabled = true;
   		document.getElementById("best_rating_count").disabled = true;
   		document.getElementById("uploadFile2").disabled = true;
   		document.getElementById("rating_survey_size").value = "";
   		document.getElementById("no_rating_count").value = "";
   		document.getElementById("poor_rating_count").value = "";
   		document.getElementById("fair_rating_count").value = "";
   		document.getElementById("good_rating_count").value = "";
   		document.getElementById("better_rating_count").value = "";
   		document.getElementById("best_rating_count").value = "";
	}
  //Check if rating and timeliness is set to NO
	if (document.getElementById("rc2").checked && document.getElementById("tc2").checked) {
   		document.getElementById("uploadFile4").disabled = true;
		document.getElementById("c2").checked = true;
   		document.getElementById("rm1").disabled = true;
   		document.getElementById("rm2").disabled = true;
	}
	else
   	{
		document.getElementById("uploadFile4").disabled = false;
		document.getElementById("c1").checked = true;
   		document.getElementById("rm1").disabled = false;
   		document.getElementById("rm2").disabled = false;
	}	
}
</script>

<script type="text/javascript" language="JavaScript">
//Check if survey conducted
function disable_timeliness()
{
	if (document.getElementById("tc1").checked) {
		document.getElementById("rm1").disabled = false;
		document.getElementById("rm2").disabled = false;
   		document.getElementById("timeliness_survey_size").disabled = false;
   		document.getElementById("no_timeliness_count").disabled = false;
   		document.getElementById("poor_timeliness_count").disabled = false;
   		document.getElementById("fair_timeliness_count").disabled = false;
   		document.getElementById("good_timeliness_count").disabled = false;
   		document.getElementById("better_timeliness_count").disabled = false;
   		document.getElementById("best_timeliness_count").disabled = false;
   		document.getElementById("uploadFile3").disabled = false;
	}
	else
	{
   		document.getElementById("timeliness_survey_size").disabled = true;
   		document.getElementById("no_timeliness_count").disabled = true;
   		document.getElementById("poor_timeliness_count").disabled = true;
   		document.getElementById("fair_timeliness_count").disabled = true;
   		document.getElementById("good_timeliness_count").disabled = true;
   		document.getElementById("better_timeliness_count").disabled = true;
   		document.getElementById("best_timeliness_count").disabled = true;
   		document.getElementById("uploadFile3").disabled = true;
   		document.getElementById("timeliness_survey_size").value = "";
   		document.getElementById("no_timeliness_count").value = "";
   		document.getElementById("poor_timeliness_count").value = "";
   		document.getElementById("fair_timeliness_count").value = "";
   		document.getElementById("good_timeliness_count").value = "";
   		document.getElementById("better_timeliness_count").value = "";
   		document.getElementById("best_timeliness_count").value = "";
	}
  //Check if rating and timeliness is set to NO
	if (document.getElementById("rc2").checked && document.getElementById("tc2").checked) {
   		document.getElementById("uploadFile4").disabled = true;
		document.getElementById("c2").checked = true;
   		document.getElementById("rm1").disabled = true;
   		document.getElementById("rm2").disabled = true;
	}
	else
   	{
		document.getElementById("uploadFile4").disabled = false;
		document.getElementById("c1").checked = true;
   		document.getElementById("rm1").disabled = false;
   		document.getElementById("rm2").disabled = false;
	}	
}
</script>

<script type="text/javascript" language="JavaScript">
function validateForm()
{
  //Check rating survey size equal total rating answers
    var rs = 1*(document.getElementById("rating_survey_size").value);
   	var nrc = 1*(document.getElementById("no_rating_count").value);
   	var prc = 1*(document.getElementById("poor_rating_count").value);
   	var frc = 1*(document.getElementById("fair_rating_count").value);
   	var grc = 1*(document.getElementById("good_rating_count").value);
   	var btrc = 1*(document.getElementById("better_rating_count").value);
   	var bsrc = 1*(document.getElementById("best_rating_count").value);
	var tra = nrc + prc + frc + grc + btrc + bsrc;
	if (rs != tra)
	{
        alert("The rating survey size of " + rs + " is not equal with the total rating survey of " + tra);
		    var tra = 0;
			var rs = 0;
        return false;
	}

  //Check rating survey size equal total rating answers
    var ts = 1*(document.getElementById("timeliness_survey_size").value);
   	var ntc = 1*(document.getElementById("no_timeliness_count").value);
   	var ptc = 1*(document.getElementById("poor_timeliness_count").value);
   	var ftc = 1*(document.getElementById("fair_timeliness_count").value);
   	var gtc = 1*(document.getElementById("good_timeliness_count").value);
   	var bttc = 1*(document.getElementById("better_timeliness_count").value);
   	var bstc = 1*(document.getElementById("best_timeliness_count").value);
	var tta = ntc + ptc + ftc + gtc + bttc + bstc;
	if (ts != tta)
	{
        alert("The timeliness survey size of " + ts + "  is not equal with the total timeliness survey of " + tta);
		    var tta = 0;
			var ts = 0;
        return false;
	}

  //Check number of trainees and request acted upon
	var y = 0;
	var z = 0;
	var y = parseInt(document.getElementById("request_count").value);
	var z = parseInt(document.getElementById("request_acted").value);
	if (y < z)
	{
        alert("The number of request acted within 3 days can not be more than the request count!");
        return false;
	}

	var a = 0;
	var b = 0;
	var c = 0;
	var a = 1*(document.getElementById("client_count").value);
	var b = 1*(document.getElementById("rating_survey_size").value);
	var c = 1*(document.getElementById("timeliness_survey_size").value);
	if (a < b)	{
        alert("The advisory survey size can not be more than the number of clients");
        return false;
	}

	if (a < c)	{
        alert("The timeliness survey size can not be more than the number of clients");
        return false;
	}

 //Date Checker
 var stdate = document.getElementById("start_date");
 var endate = document.getElementById("end_date");

 //Check if inclusive within the year 2016 up to current date
 d = new Date();
 utc = d.getTime() + (d.getTimezoneOffset() * 60000);
 nd = new Date(utc + (3600000*16));
 var todayDate = nd.toISOString().split('T')[0]

 var std = document.getElementById("start_date").value;
 var tomorrow = new Date(std);
 tomorrow.setDate(tomorrow.getDate() + 1);
 var std = new Date(tomorrow).toISOString().slice(0,10);

 var beginDate = new Date(2016,0,2).toISOString().slice(0,10);
 var endDate = new Date(2017,0,1).toISOString().slice(0,10);

 if (std < beginDate || std > endDate){
 alert ("Date started " + std + " does not fall in the year 2016");
 return false;
 }
 else if (std > todayDate){
 alert ("Date started " + std + " is over the current date ");
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
  alert("Start date must be before the end date");
  return false;
  }

return true;

}

//Check if whole number (5-23-16)
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
		alert("Use the required filename. " + " " + file_name1 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile1').value="";
		return false;
		}

	if (file_size1 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
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
		alert("Use the required filename. " + " " + file_name2 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile2').value="";
		return false;
		}

	if (file_size2 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile2').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename3()
{
var file_name3 = "";
var file_size3 = "";
var file_ext3 = "";
var file_name_sample3 = "";
var file_name3 = document.getElementById('uploadFile3').files[0].name;
var file_ext3 = file_name3.substring(file_name3.lastIndexOf('.')+1);
var file_size3 = document.getElementById('uploadFile3').files[0].size;
var file_name_sample3 = document.getElementById('file_name_sample3').value;
var file_name_sample3 = file_name_sample3 + ".pdf";

	if (file_name3 != file_name_sample3)
		{
		alert("Use the required filename. " + " " + file_name3 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile3').value="";
		return false;
		}

	if (file_size3 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile3').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename4()
{
var file_name4 = "";
var file_size4 = "";
var file_ext4 = "";
var file_name_sample4 = "";
var file_name4 = document.getElementById('uploadFile4').files[0].name;
var file_ext4 = file_name4.substring(file_name4.lastIndexOf('.')+1);
var file_size4 = document.getElementById('uploadFile4').files[0].size;
var file_name_sample4 = document.getElementById('file_name_sample4').value;
var file_name_sample4 = file_name_sample4 + ".pdf";

	if (file_name4 != file_name_sample4)
		{
		alert("Use the required filename. " + " " + file_name4 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile4').value="";
		return false;
		}

	if (file_size4 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile4').value="";
		return false;
		}
}
</script>

</head>

<body onload = 'check_survey()'>
<div class="viewbody">
<h2>MFO4: Advisory Services - Edit Record</h2>
<a href="training_view_all.php">View All Records</a>
<hr/>

<!-- Edit form here -->
<form name="edit_advisory_form" id="edit_advisory_form" method="post" action="advisory_save_edited.php" onsubmit="return validateForm()" enctype="multipart/form-data">
<table>
<tr>
   	<td width="155"><div align="right">
	<strong>Advisory Service</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Title</div><div align="right"></div></td> 
    <td width="500"><textarea name="advisory_title" cols="50" rows="6" onkeyup="limit(advisory_title)" onblur="limit(advisory_title)" required><?php print $advisory_title; ?></textarea></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(use 255 as max char)</i><br/></div>
	   	</td>
</tr>

<tr>
    <td width="155"><div align="right">Venue</div><div align="right"></div></td> 
    <td width="500"><textarea name="advisory_venue" cols="50" rows="6" onkeyup="limit(advisory_venue)" onblur="limit(advisory_venue)" required><?php print $advisory_venue; ?></textarea></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(use 255 as max char)</i><br/></div>
	   	</td>
</tr>

<tr>
    <td width="155"><div align="right">Date</div></td>
    <td width="500"><input name="start_date" type="text" required id="start_date" value="<?php print date("m/d/Y",$start_date); ?>" size="11"/></td>
</tr>

	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar)</i><br/></div>
	   	</td>
	</tr>

<tr>
		<td><hr /></td>
</tr>

<tr>
   	<td><div align="right">
	<strong>Advisory Request</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Request Mode</div></td>
 	<td width="500">
    <input type="radio" name="request_mode" <?php if (isset($request_mode) && $request_mode=="Informal/Oral") echo "checked";?>  value="Informal/Oral">Informal/Oral
   	<input type="radio" name="request_mode" <?php if (isset($request_mode) && $request_mode=="Formal/Written") echo "checked";?>  value="Formal/Written">Formal/Written
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Request Count</div></td>
    <td width="500"><input name="request_count" type="number" min="0" required id="request_count" placeholder="0" value="<?php print $request_count; ?>" size="11" onkeyup="checkban(request_count)" onblur="checkban(request_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Number of Requests<br/>Acted Within 3 Days</div></td>
    <td width="500"><input name="request_acted" type="number" min="0" required id="request_acted" placeholder="0" value="<?php print $request_acted; ?>" size="11" onkeyup="checkban(request_acted)" onblur="checkban(request_acted)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Number of Clients</div></td>
    <td width="500"><input name="client_count" type="number" min="0" required id="client_count" placeholder="0" value="<?php print $client_count; ?>" size="11" onkeyup="checkban(client_count)" onblur="checkban(client_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 1 Filename</div></td>
    <td width="500"><textarea name="file_name_display1" id="file_name_display1" readonly cols="50" rows="6" required><?php print $attach_adv_service_req; ?></textarea></td>
	<input name="file_name_sample1" hidden id="file_name_sample1" value="<?php print $attach_adv_service_req; ?>" />
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Copy the above prescribed filename to upload the PDF copy of the Advisory Service Request)</i><br/></div>
	   	</td>
</tr>

<tr>
	<td align="right">File 1 to upload</td>
    <td><input type="file" name="uploadFile1" id="uploadFile1" required onblur="alertFilename1(uploadFile1)"></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit)</i><br/></div>
	   	</td>
</tr>

<tr>
    <td width="155"><div align="right">Is this advisory service included in the Budget Proposal Form B for the year?</div></td>
 	<td width="500">
    <input type="radio" name="considered_gaa_bp" <?php if (isset($considered_gaa_bp) && $considered_gaa_bp=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" name="considered_gaa_bp" <?php if (isset($considered_gaa_bp) && $considered_gaa_bp=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Survey Conducted</div></td>
 	<td width="500">
    <input type="radio" onchange="disable_survey(survey_conducted)" id="c1" name="survey_conducted" <?php if (isset($survey_conducted) && $survey_conducted=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="disable_survey(survey_conducted)" id="c2" name="survey_conducted" <?php if (isset($survey_conducted) && $survey_conducted=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Survey Mode</div></td>
 	<td width="500">
    <input type="radio" id="rm1" name="rating_mode" required <?php if (isset($rating_mode) && $rating_mode=="Conventional") echo "checked";?>  value="Conventional">Conventional
   	<input type="radio" id="rm2" name="rating_mode" <?php if (isset($rating_mode) && $rating_mode=="Online") echo "checked";?>  value="Online">Online
	</td>
</tr>

<tr>
		<td><hr /></td>
</tr>

<tr>
   	<td><div align="right">
	<strong>Rating</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Was the Advisory Service Rated?</div></td>
 	<td width="500">
    <input type="radio" onchange="disable_rating(rating_conducted)" id="rc1" name="rating_conducted" <?php if (isset($rating_conducted) && $rating_conducted=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="disable_rating(rating_conducted)" id="rc2" name="rating_conducted" <?php if (isset($rating_conducted) && $rating_conducted=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Size</div></td>
    <td width="500"><input name="rating_survey_size" type="number" min="0" required id="rating_survey_size" placeholder="0" value="<?php print $rating_survey_size; ?>" size="11" onkeyup="checkban(rating_survey_size)" onblur="checkban(rating_survey_size)" /></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Number of Clients who Rate the Advisory Service as</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">No Answer Count on Rating</div></td>
    <td width="500"><input name="no_rating_count" type="number" min="0" required id="no_rating_count" placeholder="0" value="<?php print $no_rating_count; ?>" size="11" onkeyup="checkban(no_rating_count)" onblur="checkban(no_rating_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Poor Count on Rating</div></td>
    <td width="500"><input name="poor_rating_count" type="number" min="0" required id="poor_rating_count" placeholder="0" value="<?php print $poor_rating_count; ?>" size="11" onkeyup="checkban(poor_rating_count)" onblur="checkban(poor_rating_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Fair Count on Rating</div></td>
    <td width="500"><input name="fair_rating_count" type="number" min="0" required id="fair_rating_count" placeholder="0" value="<?php print $fair_rating_count; ?>" size="11" onkeyup="checkban(fair_rating_count)" onblur="checkban(fair_rating_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Good Count on Rating</div></td>
    <td width="500"><input name="good_rating_count" type="number" min="0" required id="good_rating_count" placeholder="0" value="<?php print $good_rating_count; ?>" size="11" onkeyup="checkban(good_rating_count)" onblur="checkban(good_rating_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Better Count on Rating</div></td>
    <td width="500"><input name="better_rating_count" type="number" min="0" required id="better_rating_count" placeholder="0" value="<?php print $better_rating_count; ?>" size="11" onkeyup="checkban(better_rating_count)" onblur="checkban(better_rating_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Best Count on Rating</div></td>
    <td width="500"><input name="best_rating_count" type="number" min="0" required id="best_rating_count" placeholder="0" value="<?php print $best_rating_count; ?>" size="11" onkeyup="checkban(best_rating_count)" onblur="checkban(best_rating_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 2 Filename</div></td>
    <td width="500"><textarea name="file_name_display2" id="file_name_display2" readonly cols="50" rows="6" required><?php print $attach_rating_sample; ?></textarea></td>
	<input name="file_name_sample2" hidden id="file_name_sample2" value="<?php print $attach_rating_sample; ?>" />
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Copy the above prescribed filename to upload the PDF copy of the Accomplished Advisory Service Rating Survey Form Sample)</i><br/></div>
	   	</td>
</tr>

<tr>
	<td align="right">File 2 to upload</td>
    <td><input type="file" name="uploadFile2" id="uploadFile2" required onblur="alertFilename2(uploadFile2)"></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit)</i><br/></div>
	   	</td>
</tr>

<tr>
    <td width="155"><div align="right">LGu/Communities/Clientele Assisted Count</div></td>
    <td width="500"><input name="assisted_count" type="number" min="0" required id="assisted_count" placeholder="0" value="<?php print $assisted_count; ?>" size="11" onkeyup="checkban(assisted_count)" onblur="checkban(assisted_count)" /></td>
</tr>

<tr>
		<td><hr /></td>
</tr>

<tr>
   	<td><div align="right">
	<strong>Timeliness</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Was the Timeliness on Advisory Service Rated?</div></td>
 	<td width="500">
    <input type="radio" onchange="disable_timeliness(timeliness_conducted)" id="tc1" name="timeliness_conducted" <?php if (isset($timeliness_conducted) && $timeliness_conducted=="Y") echo "checked";?>  value="Y">Yes
    <input type="radio" onchange="disable_timeliness(timeliness_conducted)" id="tc2" name="timeliness_conducted" <?php if (isset($timeliness_conducted) && $timeliness_conducted=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Size</div></td>
    <td width="500"><input name="timeliness_survey_size" type="number" min="0" required id="timeliness_survey_size" placeholder="0" value="<?php print $timeliness_survey_size; ?>" size="11" onkeyup="checkban(timeliness_survey_size)" onblur="checkban(timeliness_survey_size)" /></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Number of Clients Trained who Received Advisory Services who rate TIMELINESS of Service as</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">No Answer Count on Timeliness</div></td>
    <td width="500"><input name="no_timeliness_count" type="number" min="0" required id="no_timeliness_count" placeholder="0" value="<?php print $no_timeliness_count; ?>" size="11" onkeyup="checkban(no_timeliness_count)" onblur="checkban(no_timeliness_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Poor Count on Timeliness</div></td>
    <td width="500"><input name="poor_timeliness_count" type="number" min="0" required id="poor_timeliness_count" placeholder="0" value="<?php print $poor_timeliness_count; ?>" size="11" onkeyup="checkban(poor_timeliness_count)" onblur="checkban(poor_timeliness_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Fair Count on Timeliness</div></td>
    <td width="500"><input name="fair_timeliness_count" type="number" min="0" required id="fair_timeliness_count" placeholder="0" value="<?php print $fair_timeliness_count; ?>" size="11" onkeyup="checkban(fair_timeliness_count)" onblur="checkban(fair_timeliness_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Good Count on Timeliness</div></td>
    <td width="500"><input name="good_timeliness_count" type="number" min="0" required id="good_timeliness_count" placeholder="0" value="<?php print $good_timeliness_count; ?>" size="11" onkeyup="checkban(good_timeliness_count)" onblur="checkban(good_timeliness_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Better Count on Timeliness</div></td>
    <td width="500"><input name="better_timeliness_count" type="number" min="0" required id="better_timeliness_count" placeholder="0" value="<?php print $better_timeliness_count; ?>" size="11" onkeyup="checkban(better_timeliness_count)" onblur="checkban(better_timeliness_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Best Count on Timeliness</div></td>
    <td width="500"><input name="best_timeliness_count" type="number" min="0" required id="best_timeliness_count" placeholder="0" value="<?php print $best_timeliness_count; ?>" size="11" onkeyup="checkban(best_timeliness_count)" onblur="checkban(best_timeliness_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 3 Filename</div></td>
    <td width="500"><textarea name="file_name_display3" id="file_name_display3" readonly cols="50" rows="6" required><?php print $attach_timeliness_sample; ?></textarea></td>
	<input name="file_name_sample3" hidden id="file_name_sample3" value="<?php print $attach_timeliness_sample; ?>" />
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Copy the above prescribed filename to upload the PDF copy of the Accomplished Advisory Service Timeliness Survey Form Sample)</i><br/></div>
	   	</td>
</tr>

<tr>
	<td align="right">File 3 to upload</td>
    <td><input type="file" name="uploadFile3" id="uploadFile3" required onblur="alertFilename3(uploadFile3)"></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit)</i><br/></div>
	   	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 4 Filename</div></td>
    <td width="500"><textarea name="file_name_display4" id="file_name_display4" readonly cols="50" rows="6" required><?php print $attach_tally_sheet; ?></textarea></td>
	<input name="file_name_sample4" hidden id="file_name_sample4" value="<?php print $attach_tally_sheet; ?>" />
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Copy the above prescribed filename to upload the PDF copy of the Advisory Service Survey Tally Sheets Endorsed by the Unit Head)</i><br/></div>
	   	</td>
</tr>

<tr>
	<td align="right">File 4 to upload</td>
    <td><input type="file" name="uploadFile4" id="uploadFile4" required onblur="alertFilename4(uploadFile4)"></td>
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
       <input type="hidden" name="mfo4_formb_advisory_id" value="<?php print $mfo4_formb_advisory_id; ?>"><button type="submit">Submit</button></div>
	</th>
    </tr>

</table>
</form>
<?php
	//Free result set and close connection 
	$mysqli->close();
?>
</body>
</html>