<?php

include_once('getPGHrates.php');

session_name("pbb");
session_start();

// is the one accessing this page logged in or not?
if ( !isset($_SESSION['user_id']) || !$_SESSION['user_id'])
{
	// not logged in, move to login page
	header('Location: ../login/login_mysqli.php');
	exit;
}

// confirm that the 'id' variable has been set
if ( !isset($_GET['id']) || !is_numeric($_GET['id']) )
{
	header('Location: pssurvey_view_all.php');
	exit;
}

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

// connect to the database
include_once('../connect-db.php');

// get the id from the url
$var_id = $_GET['id'];

// retrieve the record with such id
$query = "SELECT * FROM tbl_sd_5_mfo5_7_rate_of_hospital_services WHERE tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_id = '$var_id';";
$record_set = $mysqli->query($query)->fetch_object();

if ($record_set)
{
	// Get the header record
	$var_unit_delivery_id = $record_set->unit_delivery_id;
	$var_unit_contributor_id = $record_set->unit_contributor_id;
	
	$result = $mysqli->query("SELECT unit_delivery_name_cu, unit_contributor_name FROM tbl_units_contributor WHERE unit_contributor_id = '$var_unit_contributor_id';")->fetch_object();

	if ($result)
	{
			// set form variables to values in the retrieved row
			$var_unit_delivery_name_cu = $result->unit_delivery_name_cu;
			$var_unit_contributor_name = $result->unit_contributor_name;
	}
	
	$file_extname = ".pdf";
	
	// set form variables to values in the retrieved row
	$var_pss_id = $record_set->mfo5_7_rate_of_hospital_services_id;

    $var_clients_01count = $record_set->mfo5_7_rate_of_hospital_services_jan_clients_surveyed;
    $var_satisfactorybetter_01count = $record_set->mfo5_7_rate_of_hospital_services_jan_rate_satisfactory;
	$var_satisfactorybetter_01count_pct = 100*getAverage($var_satisfactorybetter_01count, $var_clients_01count);
	$var_attachmt1 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_jan_attachment);

    $var_clients_02count = $record_set->mfo5_7_rate_of_hospital_services_feb_clients_surveyed;
    $var_satisfactorybetter_02count = $record_set->mfo5_7_rate_of_hospital_services_feb_rate_satisfactory;
	$var_satisfactorybetter_02count_pct = 100*getAverage($var_satisfactorybetter_02count, $var_clients_02count);
	$var_attachmt2 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_feb_attachment);
	
    $var_clients_03count = $record_set->mfo5_7_rate_of_hospital_services_mar_clients_surveyed;
    $var_satisfactorybetter_03count = $record_set->mfo5_7_rate_of_hospital_services_mar_rate_satisfactory;
	$var_satisfactorybetter_03count_pct = 100*getAverage($var_satisfactorybetter_03count, $var_clients_03count);
	$var_attachmt3 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_mar_attachment);
    
	$var_clients_q1count = $record_set->mfo5_7_rate_of_hospital_services_qtr1_clients_surveyed;
    $var_satisfactorybetter_q1count = $record_set->mfo5_7_rate_of_hospital_services_qtr1_rate_satisfactory;
	$var_satisfactorybetter_q1count_pct = $record_set->mfo5_7_rate_of_hospital_services_qtr1_percentage;
	
    $var_clients_04count = $record_set->mfo5_7_rate_of_hospital_services_apr_clients_surveyed;
    $var_satisfactorybetter_04count = $record_set->mfo5_7_rate_of_hospital_services_apr_rate_satisfactory;
	$var_satisfactorybetter_04count_pct = 100*getAverage($var_satisfactorybetter_04count, $var_clients_04count);
	$var_attachmt4 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_apr_attachment);
	
    $var_clients_05count = $record_set->mfo5_7_rate_of_hospital_services_may_clients_surveyed;
    $var_satisfactorybetter_05count = $record_set->mfo5_7_rate_of_hospital_services_may_rate_satisfactory;
	$var_satisfactorybetter_05count_pct = 100*getAverage($var_satisfactorybetter_05count, $var_clients_05count);
	$var_attachmt5 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_may_attachment);

	$var_clients_06count = $record_set->mfo5_7_rate_of_hospital_services_jun_clients_surveyed;
    $var_satisfactorybetter_06count = $record_set->mfo5_7_rate_of_hospital_services_jun_rate_satisfactory;
	$var_satisfactorybetter_06count_pct = 100*getAverage($var_satisfactorybetter_06count, $var_clients_06count);
	$var_attachmt6 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_jun_attachment);

	$var_clients_q2count = $record_set->mfo5_7_rate_of_hospital_services_qtr2_clients_surveyed;
    $var_satisfactorybetter_q2count = $record_set->mfo5_7_rate_of_hospital_services_qtr2_rate_satisfactory;
	$var_satisfactorybetter_q2count_pct = $record_set->mfo5_7_rate_of_hospital_services_qtr2_percentage;
	
	$var_clients_07count = $record_set->mfo5_7_rate_of_hospital_services_jul_clients_surveyed;
    $var_satisfactorybetter_07count = $record_set->mfo5_7_rate_of_hospital_services_jul_rate_satisfactory;
	$var_satisfactorybetter_07count_pct = 100*getAverage($var_satisfactorybetter_07count, $var_clients_07count);
	$var_attachmt7 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_jul_attachment);

    $var_clients_08count = $record_set->mfo5_7_rate_of_hospital_services_aug_clients_surveyed;
    $var_satisfactorybetter_08count = $record_set->mfo5_7_rate_of_hospital_services_aug_rate_satisfactory;
	$var_satisfactorybetter_08count_pct = 100*getAverage($var_satisfactorybetter_08count, $var_clients_08count);
	$var_attachmt8 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_aug_attachment);

    $var_clients_09count = $record_set->mfo5_7_rate_of_hospital_services_sep_clients_surveyed;
    $var_satisfactorybetter_09count = $record_set->mfo5_7_rate_of_hospital_services_sep_rate_satisfactory;
	$var_satisfactorybetter_09count_pct = 100*getAverage($var_satisfactorybetter_09count, $var_clients_09count);
	$var_attachmt9 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_sep_attachment);
	
	$var_clients_q3count = $record_set->mfo5_7_rate_of_hospital_services_qtr3_clients_surveyed;
    $var_satisfactorybetter_q3count = $record_set->mfo5_7_rate_of_hospital_services_qtr3_rate_satisfactory;
	$var_satisfactorybetter_q3count_pct = $record_set->mfo5_7_rate_of_hospital_services_qtr3_percentage;
	
    $var_clients_10count = $record_set->mfo5_7_rate_of_hospital_services_oct_clients_surveyed;
    $var_satisfactorybetter_10count = $record_set->mfo5_7_rate_of_hospital_services_oct_rate_satisfactory;
	$var_satisfactorybetter_10count_pct = 100*getAverage($var_satisfactorybetter_10count, $var_clients_10count);
	$var_attachmt10 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_oct_attachment);

    $var_clients_11count = $record_set->mfo5_7_rate_of_hospital_services_nov_clients_surveyed;
    $var_satisfactorybetter_11count = $record_set->mfo5_7_rate_of_hospital_services_nov_rate_satisfactory;
	$var_satisfactorybetter_11count_pct = 100*getAverage($var_satisfactorybetter_11count, $var_clients_11count);
	$var_attachmt11 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_nov_attachment);

    $var_clients_12count = $record_set->mfo5_7_rate_of_hospital_services_dec_clients_surveyed;
    $var_satisfactorybetter_12count = $record_set->mfo5_7_rate_of_hospital_services_dec_rate_satisfactory;
	$var_satisfactorybetter_12count_pct = 100*getAverage($var_satisfactorybetter_12count, $var_clients_12count);
	$var_attachmt12 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_dec_attachment);
	
	$var_clients_q4count = $record_set->mfo5_7_rate_of_hospital_services_qtr4_clients_surveyed;
    $var_satisfactorybetter_q4count = $record_set->mfo5_7_rate_of_hospital_services_qtr4_rate_satisfactory;
	$var_satisfactorybetter_q4count_pct = $record_set->mfo5_7_rate_of_hospital_services_qtr4_percentage;
	
	$var_clients_totalcount=$var_clients_q1count+$var_clients_q2count+$var_clients_q3count+$var_clients_q4count;
	$var_satisfactorybetter_totalcount=$var_satisfactorybetter_q1count+$var_satisfactorybetter_q2count+$var_satisfactorybetter_q3count+$var_satisfactorybetter_q4count;
	$var_satisfactorybetter_totalcount_pct = 100*getAverage($var_satisfactorybetter_totalcount, $var_clients_totalcount);
	$var_attachmt13 = str_ireplace($file_extname, "", $record_set->mfo5_7_rate_of_hospital_services_all_attachment_questionnaire);

	// upload: Generate sample filename
	include_once('pssurvey_setnames.php');
	
	$mysqli->close();
}
else
{
	$mysqli->close();
	header('Location: pssurvey_view_all.php');
	exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Record</title>

<style>
body {margin:1; font-family:Calibri; font-size:14px;}
</style>

<link rel="stylesheet" href="../includes/jquery-ui.css" />
<script src="../includes/jquery-1.9.1.js"></script>
<script src="../includes/jquery-ui.js"></script>

<!-- include the next Javascript files -->
<script src="../validfn-mfo1.js"></script>
<script src="validfn-pssurvey.js"></script>

</head>
<body>

	<div class="viewbody">
	<h2>MFO 5: Patient Satisfaction Survey - Edit Record</h2>
	<div class="viewlinks"><p><a href="pssurvey_view_all.php">View All Records</a></p></div>
	<hr/>

	<!-- Edit form here -->
	<form name="EditForm" id="EditForm" method="post" action="pssurvey_insert_update.php" onsubmit="return isValidForm()" enctype="multipart/form-data">

		<?php include_once('pssurvey_table.php'); ?>
		
		<br>
		<div align="left">
			<!-- <input type="reset" value="Clear"> -->
			<input type="hidden" name="var_pss_id" value="<?php if (isset($var_pss_id)) echo $var_pss_id; ?>"><button type="submit">Submit</button>
		</div>
	</form>
    
	</div>
</body>
</html>