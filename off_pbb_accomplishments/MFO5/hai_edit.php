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
	header('Location: hai_view_all.php');
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

// connect to the database
include_once('../connect-db.php');

// get the id from the url
$var_id = $_GET['id'];

// retrieve the record with such id
$query = "SELECT * FROM tbl_sd_5_mfo5_8_infection_rate WHERE tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_id = '$var_id';";
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
	
	// set form variables to values in the retrieved row
	$var_hai_id = $record_set->mfo5_8_infection_rate_id;

    $var_patients_01count = $record_set->mfo5_8_infection_rate_jan_patients;
    $var_patientshai_01count = $record_set->mfo5_8_infection_rate_jan_patients_infected;
	$var_hai_01count_pct = 100*getAverage($var_patientshai_01count, $var_patients_01count);

    $var_patients_02count = $record_set->mfo5_8_infection_rate_feb_patients;
    $var_patientshai_02count = $record_set->mfo5_8_infection_rate_feb_patients_infected;
	$var_hai_02count_pct = 100*getAverage($var_patientshai_02count, $var_patients_02count);

    $var_patients_03count = $record_set->mfo5_8_infection_rate_mar_patients;
    $var_patientshai_03count = $record_set->mfo5_8_infection_rate_mar_patients_infected;
	$var_hai_03count_pct = 100*getAverage($var_patientshai_03count, $var_patients_03count);
    
	$var_patients_q1count = $record_set->mfo5_8_infection_rate_qtr1_patients;
    $var_patientshai_q1count = $record_set->mfo5_8_infection_rate_qtr1_patients_infected;
	$var_hai_q1count_pct = $record_set->mfo5_8_infection_rate_qtr1_percentage;
	
    $var_patients_04count = $record_set->mfo5_8_infection_rate_apr_patients;
    $var_patientshai_04count = $record_set->mfo5_8_infection_rate_apr_patients_infected;
	$var_hai_04count_pct = 100*getAverage($var_patientshai_04count, $var_patients_04count);

    $var_patients_05count = $record_set->mfo5_8_infection_rate_may_patients;
    $var_patientshai_05count = $record_set->mfo5_8_infection_rate_may_patients_infected;
	$var_hai_05count_pct = 100*getAverage($var_patientshai_05count, $var_patients_05count);

	$var_patients_06count = $record_set->mfo5_8_infection_rate_jun_patients;
    $var_patientshai_06count = $record_set->mfo5_8_infection_rate_jun_patients_infected;
	$var_hai_06count_pct = 100*getAverage($var_patientshai_06count, $var_patients_06count);

	$var_patients_q2count = $record_set->mfo5_8_infection_rate_qtr2_patients;
    $var_patientshai_q2count = $record_set->mfo5_8_infection_rate_qtr2_patients_infected;
	$var_hai_q2count_pct = $record_set->mfo5_8_infection_rate_qtr2_percentage;
	
	$var_patients_07count = $record_set->mfo5_8_infection_rate_jul_patients;
    $var_patientshai_07count = $record_set->mfo5_8_infection_rate_jul_patients_infected;
	$var_hai_07count_pct = 100*getAverage($var_patientshai_07count, $var_patients_07count);

    $var_patients_08count = $record_set->mfo5_8_infection_rate_aug_patients;
    $var_patientshai_08count = $record_set->mfo5_8_infection_rate_aug_patients_infected;
	$var_hai_08count_pct = 100*getAverage($var_patientshai_08count, $var_patients_08count);

    $var_patients_09count = $record_set->mfo5_8_infection_rate_sep_patients;
    $var_patientshai_09count = $record_set->mfo5_8_infection_rate_sep_patients_infected;
	$var_hai_09count_pct = 100*getAverage($var_patientshai_09count, $var_patients_09count);
	
	$var_patients_q3count = $record_set->mfo5_8_infection_rate_qtr3_patients;
    $var_patientshai_q3count = $record_set->mfo5_8_infection_rate_qtr3_patients_infected;
	$var_hai_q3count_pct = $record_set->mfo5_8_infection_rate_qtr3_percentage;
	
    $var_patients_10count = $record_set->mfo5_8_infection_rate_oct_patients;
    $var_patientshai_10count = $record_set->mfo5_8_infection_rate_oct_patients_infected;
	$var_hai_10count_pct = 100*getAverage($var_patientshai_10count, $var_patients_10count);

    $var_patients_11count = $record_set->mfo5_8_infection_rate_nov_patients;
    $var_patientshai_11count = $record_set->mfo5_8_infection_rate_nov_patients_infected;
	$var_hai_11count_pct = 100*getAverage($var_patientshai_11count, $var_patients_11count);

    $var_patients_12count = $record_set->mfo5_8_infection_rate_dec_patients;
    $var_patientshai_12count = $record_set->mfo5_8_infection_rate_dec_patients_infected;
	$var_hai_12count_pct = 100*getAverage($var_patientshai_12count, $var_patients_12count);
	
	$var_patients_q4count = $record_set->mfo5_8_infection_rate_qtr4_patients;
    $var_patientshai_q4count = $record_set->mfo5_8_infection_rate_qtr4_patients_infected;
	$var_hai_q4count_pct = $record_set->mfo5_8_infection_rate_qtr4_percentage;
	
	$var_patients_totalcount=$var_patients_q1count+$var_patients_q2count+$var_patients_q3count+$var_patients_q4count;
	$var_patientshai_totalcount=$var_patientshai_q1count+$var_patientshai_q2count+$var_patientshai_q3count+$var_patientshai_q4count;
	$var_hai_totalcount_pct = 100*getAverage($var_patientshai_totalcount, $var_patients_totalcount);
	
	$mysqli->close();
}
else
{
	$mysqli->close();
	header('Location: hai_view_all.php');
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
<script src="validfn-hai.js"></script>

</head>
<body>

	<div class="viewbody">
	<h2>MFO 5: Hospital-Acquired Infection (HAI) Rates - Edit Record</h2>
	<div class="viewlinks"><p><a href="hai_view_all.php">View All Records</a></p></div>
	<hr/>

	<!-- Edit form here -->
	<form name="EditForm" id="EditForm" method="post" action="hai_insert_update.php" onsubmit="return isValidForm()">

		<?php include_once('hai_table.php'); ?>
		
		<br>
		<div align="left">
			<!-- <input type="reset" value="Clear"> -->
			<input type="hidden" name="var_hai_id" value="<?php if (isset($var_hai_id)) echo $var_hai_id; ?>"><button type="submit">Submit</button>
		</div>
	</form>
    
	</div>
</body>
</html>