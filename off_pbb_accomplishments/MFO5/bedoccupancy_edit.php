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
	header('Location: bedoccupancy_view_all.php');
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
$query = "SELECT * FROM tbl_sd_5_mfo5_5_12_beds WHERE mfo5_5_12_beds_id = '$var_id';";
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
	$var_bed_id = $record_set->mfo5_5_12_beds_id;
	
    $var_beds_01count = $record_set->mfo5_5_beds_jan_count;
    $var_ipdays_01count = $record_set->mfo5_12_beds_jan_inpatient_days;
    $var_days_01count = $record_set->mfo5_12_beds_jan_days;
	$var_bed_days_01count = $var_beds_01count*$var_days_01count;
	$var_bor_01count_pct = getBedOccupancyRate($var_bed_days_01count, $var_ipdays_01count);
	$var_beds_totalcount = $var_beds_01count;
	
    $var_beds_02count = $record_set->mfo5_5_beds_feb_count;
    $var_ipdays_02count = $record_set->mfo5_12_beds_feb_inpatient_days;
    $var_days_02count = $record_set->mfo5_12_beds_feb_days;
	$var_bed_days_02count = $var_beds_02count*$var_days_02count;
	$var_bor_02count_pct = getBedOccupancyRate($var_bed_days_02count, $var_ipdays_02count);
	$var_beds_totalcount = $var_beds_totalcount+$var_beds_02count;
	
    $var_beds_03count = $record_set->mfo5_5_beds_mar_count;
    $var_ipdays_03count = $record_set->mfo5_12_beds_mar_inpatient_days;
    $var_days_03count = $record_set->mfo5_12_beds_mar_days;
	$var_bed_days_03count = $var_beds_03count*$var_days_03count;
	$var_bor_03count_pct = getBedOccupancyRate($var_bed_days_03count, $var_ipdays_03count);
	$var_beds_totalcount = $var_beds_totalcount+$var_beds_03count;
    
	$var_beds_q1count = $record_set->mfo5_5_beds_qtr1_count;
    $var_ipdays_q1count = $record_set->mfo5_12_beds_qtr1_inpatient_days;
    $var_days_q1count = $record_set->mfo5_12_beds_qtr1_days;
	// $var_bed_days_q1count = $var_bed_days_01count + $var_bed_days_02count + $var_bed_days_03count;
	$var_bed_days_q1count = $var_beds_q1count*$var_days_q1count;
	$var_bor_q1count_pct = getBedOccupancyRate($var_bed_days_q1count, $var_ipdays_q1count);
	
    $var_beds_04count = $record_set->mfo5_5_beds_apr_count;
    $var_ipdays_04count = $record_set->mfo5_12_beds_apr_inpatient_days;
    $var_days_04count = $record_set->mfo5_12_beds_apr_days;
	$var_bed_days_04count = $var_beds_04count*$var_days_04count;
	$var_bor_04count_pct = getBedOccupancyRate($var_bed_days_04count, $var_ipdays_04count);
	$var_beds_totalcount = $var_beds_totalcount+$var_beds_04count;
	
    $var_beds_05count = $record_set->mfo5_5_beds_may_count;
    $var_ipdays_05count = $record_set->mfo5_12_beds_may_inpatient_days;
    $var_days_05count = $record_set->mfo5_12_beds_may_days;
	$var_bed_days_05count = $var_beds_05count*$var_days_05count;
	$var_bor_05count_pct = getBedOccupancyRate($var_bed_days_05count, $var_ipdays_05count);
	$var_beds_totalcount = $var_beds_totalcount+$var_beds_05count;
	
	$var_beds_06count = $record_set->mfo5_5_beds_jun_count;
    $var_ipdays_06count = $record_set->mfo5_12_beds_jun_inpatient_days;
    $var_days_06count = $record_set->mfo5_12_beds_jun_days;
	$var_bed_days_06count = $var_beds_06count*$var_days_06count;
	$var_bor_06count_pct = getBedOccupancyRate($var_bed_days_06count, $var_ipdays_06count);
	$var_beds_totalcount = $var_beds_totalcount+$var_beds_06count;
    
	$var_beds_q2count = $record_set->mfo5_5_beds_qtr2_count;
    $var_ipdays_q2count = $record_set->mfo5_12_beds_qtr2_inpatient_days;
    $var_days_q2count = $record_set->mfo5_12_beds_qtr2_days;
	// $var_bed_days_q2count = $var_bed_days_04count + $var_bed_days_05count + $var_bed_days_06count;
	$var_bed_days_q2count = $var_beds_q1count*$var_days_q2count;
	$var_bor_q2count_pct = getBedOccupancyRate($var_bed_days_q2count, $var_ipdays_q2count);
	
	$var_beds_07count = $record_set->mfo5_5_beds_jul_count;
    $var_ipdays_07count = $record_set->mfo5_12_beds_jul_inpatient_days;
    $var_days_07count = $record_set->mfo5_12_beds_jul_days;
	$var_bed_days_07count = $var_beds_07count*$var_days_07count;
	$var_bor_07count_pct = getBedOccupancyRate($var_bed_days_07count, $var_ipdays_07count);
	$var_beds_totalcount = $var_beds_totalcount+$var_beds_07count;
	
    $var_beds_08count = $record_set->mfo5_5_beds_aug_count;
    $var_ipdays_08count = $record_set->mfo5_12_beds_aug_inpatient_days;
    $var_days_08count = $record_set->mfo5_12_beds_aug_days;
	$var_bed_days_08count = $var_beds_08count*$var_days_08count;
	$var_bor_08count_pct = getBedOccupancyRate($var_bed_days_08count, $var_ipdays_08count);
	$var_beds_totalcount = $var_beds_totalcount+$var_beds_08count;
	
    $var_beds_09count = $record_set->mfo5_5_beds_sep_count;
    $var_ipdays_09count = $record_set->mfo5_12_beds_sep_inpatient_days;
    $var_days_09count = $record_set->mfo5_12_beds_sep_days;
	$var_bed_days_09count = $var_beds_09count*$var_days_09count;
	$var_bor_09count_pct = getBedOccupancyRate($var_bed_days_09count, $var_ipdays_09count);
	$var_beds_totalcount = $var_beds_totalcount+$var_beds_09count;
	
	$var_beds_q3count = $record_set->mfo5_5_beds_qtr3_count;
    $var_ipdays_q3count = $record_set->mfo5_12_beds_qtr3_inpatient_days;
    $var_days_q3count = $record_set->mfo5_12_beds_qtr3_days;
	// $var_bed_days_q3count = $var_bed_days_07count + $var_bed_days_08count + $var_bed_days_09count;
	$var_bed_days_q3count = $var_beds_q3count*$var_days_q3count;
	$var_bor_q3count_pct = getBedOccupancyRate($var_bed_days_q3count, $var_ipdays_q3count);
	
    $var_beds_10count = $record_set->mfo5_5_beds_oct_count;
    $var_ipdays_10count = $record_set->mfo5_12_beds_oct_inpatient_days;
    $var_days_10count = $record_set->mfo5_12_beds_oct_days;
	$var_bed_days_10count = $var_beds_10count*$var_days_10count;
	$var_bor_10count_pct = getBedOccupancyRate($var_bed_days_10count, $var_ipdays_10count);
	$var_beds_totalcount = $var_beds_totalcount+$var_beds_10count;
	
    $var_beds_11count = $record_set->mfo5_5_beds_nov_count;
    $var_ipdays_11count = $record_set->mfo5_12_beds_nov_inpatient_days;
    $var_days_11count = $record_set->mfo5_12_beds_nov_days;
	$var_bed_days_11count = $var_beds_11count*$var_days_11count;
	$var_bor_11count_pct = getBedOccupancyRate($var_bed_days_11count, $var_ipdays_11count);
	$var_beds_totalcount = $var_beds_totalcount+$var_beds_11count;

    $var_beds_12count = $record_set->mfo5_5_beds_dec_count;
    $var_ipdays_12count = $record_set->mfo5_12_beds_dec_inpatient_days;
    $var_days_12count = $record_set->mfo5_12_beds_dec_days;
	$var_bed_days_12count = $var_beds_12count*$var_days_12count;
	$var_bor_12count_pct = getBedOccupancyRate($var_bed_days_12count, $var_ipdays_12count);
	$var_beds_totalcount = $var_beds_totalcount+$var_beds_12count;
	
	$var_beds_q4count = $record_set->mfo5_5_beds_qtr4_count;
    $var_ipdays_q4count = $record_set->mfo5_12_beds_qtr4_inpatient_days;
    $var_days_q4count = $record_set->mfo5_12_beds_qtr4_days;
	// $var_bed_days_q4count = $var_bed_days_10count + $var_bed_days_11count + $var_bed_days_12count;
	$var_bed_days_q4count = $var_beds_q4count*$var_days_q4count;
	$var_bor_q4count_pct = getBedOccupancyRate($var_bed_days_q4count, $var_ipdays_q4count);

	$var_beds_totalcount = $record_set->mfo5_5_beds_all_count;
	$var_ipdays_totalcount = $record_set->mfo5_12_beds_all_inpatient_days;
	$var_days_totalcount = $record_set->mfo5_12_beds_all_days;
	// $var_bed_days_totalcount = $var_bed_days_q1count + $var_bed_days_q2count + $var_bed_days_q3count + $var_bed_days_q4count;
	$var_bed_days_totalcount = $var_beds_totalcount*$var_days_totalcount;
	$var_bor_totalcount_pct = getBedOccupancyRate($var_bed_days_totalcount, $var_ipdays_totalcount);
	
	$mysqli->close();
}
else
{
	$mysqli->close();
	header('Location: bedoccupancy_view_all.php');
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
<script src="validfn-beds.js"></script>

</head>
<body>

	<div class="viewbody">
	<h2>MFO 5: Bed Occupancy Rates - Edit Record</h2>
	<div class="viewlinks"><p><a href="bedoccupancy_view_all.php">View All Records</a></p></div>
	<hr/>

	<!-- Edit form here -->
	<form name="EditForm" id="EditForm" method="post" action="bedoccupancy_insert_update.php" onsubmit="return isValidForm()">

		<?php include_once('bedoccupancy_table.php'); ?>
		
		<br>
		<div align="left">
			<!-- <input type="reset" value="Clear"> -->
			<input type="hidden" name="var_bed_id" value="<?php if (isset($var_bed_id)) echo $var_bed_id; ?>"><button type="submit">Submit</button>
		</div>
	</form>
    
	</div>
</body>
</html>