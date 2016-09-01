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
	header('Location: re-admit_view_all.php');
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
$query = "SELECT * FROM tbl_sd_5_mfo5_9_readmitted_cases WHERE tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_id = '$var_id';";
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
	$var_readmit_id = $record_set->mfo5_9_readmitted_cases_id;

    $var_patients_01count = $record_set->mfo5_9_readmitted_cases_jan_discharges;
    $var_readmit_01count = $record_set->mfo5_9_readmitted_cases_jan_readmitted_within_3months;
	$var_readmit_01count_pct = 100*getAverage($var_readmit_01count, $var_patients_01count);

    $var_patients_02count = $record_set->mfo5_9_readmitted_cases_feb_discharges;
    $var_readmit_02count = $record_set->mfo5_9_readmitted_cases_feb_readmitted_within_3months;
	$var_readmit_02count_pct = 100*getAverage($var_readmit_02count, $var_patients_02count);

    $var_patients_03count = $record_set->mfo5_9_readmitted_cases_mar_discharges;
    $var_readmit_03count = $record_set->mfo5_9_readmitted_cases_mar_readmitted_within_3months;
	$var_readmit_03count_pct = 100*getAverage($var_readmit_03count, $var_patients_03count);
    
	$var_patients_q1count = $record_set->mfo5_9_readmitted_cases_qtr1_discharges;
    $var_readmit_q1count = $record_set->mfo5_9_readmitted_cases_qtr1_readmitted_within_3months;
	$var_readmit_q1count_pct = $record_set->mfo5_9_readmitted_cases_qtr1_percentage;
	
    $var_patients_04count = $record_set->mfo5_9_readmitted_cases_apr_discharges;
    $var_readmit_04count = $record_set->mfo5_9_readmitted_cases_apr_readmitted_within_3months;
	$var_readmit_04count_pct = 100*getAverage($var_readmit_04count, $var_patients_04count);

    $var_patients_05count = $record_set->mfo5_9_readmitted_cases_may_discharges;
    $var_readmit_05count = $record_set->mfo5_9_readmitted_cases_may_readmitted_within_3months;
	$var_readmit_05count_pct = 100*getAverage($var_readmit_05count, $var_patients_05count);

	$var_patients_06count = $record_set->mfo5_9_readmitted_cases_jun_discharges;
    $var_readmit_06count = $record_set->mfo5_9_readmitted_cases_jun_readmitted_within_3months;
	$var_readmit_06count_pct = 100*getAverage($var_readmit_06count, $var_patients_06count);

	$var_patients_q2count = $record_set->mfo5_9_readmitted_cases_qtr2_discharges;
    $var_readmit_q2count = $record_set->mfo5_9_readmitted_cases_qtr2_readmitted_within_3months;
	$var_readmit_q2count_pct = $record_set->mfo5_9_readmitted_cases_qtr2_percentage;
	
	$var_patients_07count = $record_set->mfo5_9_readmitted_cases_jul_discharges;
    $var_readmit_07count = $record_set->mfo5_9_readmitted_cases_jul_readmitted_within_3months;
	$var_readmit_07count_pct = 100*getAverage($var_readmit_07count, $var_patients_07count);

    $var_patients_08count = $record_set->mfo5_9_readmitted_cases_aug_discharges;
    $var_readmit_08count = $record_set->mfo5_9_readmitted_cases_aug_readmitted_within_3months;
	$var_readmit_08count_pct = 100*getAverage($var_readmit_08count, $var_patients_08count);

    $var_patients_09count = $record_set->mfo5_9_readmitted_cases_sep_discharges;
    $var_readmit_09count = $record_set->mfo5_9_readmitted_cases_sep_readmitted_within_3months;
	$var_readmit_09count_pct = 100*getAverage($var_readmit_09count, $var_patients_09count);
	
	$var_patients_q3count = $record_set->mfo5_9_readmitted_cases_qtr3_discharges;
    $var_readmit_q3count = $record_set->mfo5_9_readmitted_cases_qtr3_readmitted_within_3months;
	$var_readmit_q3count_pct = $record_set->mfo5_9_readmitted_cases_qtr3_percentage;
	
    $var_patients_10count = $record_set->mfo5_9_readmitted_cases_oct_discharges;
    $var_readmit_10count = $record_set->mfo5_9_readmitted_cases_oct_readmitted_within_3months;
	$var_readmit_10count_pct = 100*getAverage($var_readmit_10count, $var_patients_10count);

    $var_patients_11count = $record_set->mfo5_9_readmitted_cases_nov_discharges;
    $var_readmit_11count = $record_set->mfo5_9_readmitted_cases_nov_readmitted_within_3months;
	$var_readmit_11count_pct = 100*getAverage($var_readmit_11count, $var_patients_11count);

    $var_patients_12count = $record_set->mfo5_9_readmitted_cases_dec_discharges;
    $var_readmit_12count = $record_set->mfo5_9_readmitted_cases_dec_readmitted_within_3months;
	$var_readmit_12count_pct = 100*getAverage($var_readmit_12count, $var_patients_12count);
	
	$var_patients_q4count = $record_set->mfo5_9_readmitted_cases_qtr4_discharges;
    $var_readmit_q4count = $record_set->mfo5_9_readmitted_cases_qtr4_readmitted_within_3months;
	$var_readmit_q4count_pct = $record_set->mfo5_9_readmitted_cases_qtr4_percentage;
	
	$var_patients_totalcount=$var_patients_q1count+$var_patients_q2count+$var_patients_q3count+$var_patients_q4count;
	$var_readmit_totalcount=$var_readmit_q1count+$var_readmit_q2count+$var_readmit_q3count+$var_readmit_q4count;
	$var_readmit_totalcount_pct = 100*getAverage($var_readmit_totalcount, $var_patients_totalcount);
	
	$mysqli->close();
}
else
{
	$mysqli->close();
	header('Location: re-admit_view_all.php');
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
<script src="validfn-re-admit.js"></script>

</head>
<body>

	<div class="viewbody">
	<h2>MFO 5: Mental and Drug Rehabilitation Readmission Rates - Edit Record</h2>
	<div class="viewlinks"><p><a href="re-admit_view_all.php">View All Records</a></p></div>
	<hr/>

	<!-- Edit form here -->
	<form name="EditForm" id="EditForm" method="post" action="re-admit_insert_update.php" onsubmit="return isValidForm()">

		<?php include_once('re-admit_table.php'); ?>
		
		<br>
		<div align="left">
			<!-- <input type="reset" value="Clear"> -->
			<input type="hidden" name="var_readmit_id" value="<?php if (isset($var_readmit_id)) echo $var_readmit_id; ?>"><button type="submit">Submit</button>
		</div>
	</form>
    
	</div>
</body>
</html>