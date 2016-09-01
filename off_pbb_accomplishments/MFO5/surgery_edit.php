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
	header('Location: surgery_view_all.php');
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
$query = "SELECT * FROM tbl_sd_5_mfo5_3_4_11_surgeries WHERE tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_4_11_surgeries_id = '$var_id';";
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
	$var_surg_id = $record_set->mfo5_3_4_11_surgeries_id;
    $var_emer_01count = $record_set->mfo5_4_surgeries_jan_emergency;
    $var_elec_01count = $record_set->mfo5_3_surgeries_jan_elective;
    $var_elec_wait_01count = $record_set->mfo5_11_surgeries_jan_elective_waiting;
    $var_emer_02count = $record_set->mfo5_4_surgeries_feb_emergency;
    $var_elec_02count = $record_set->mfo5_3_surgeries_feb_elective;
    $var_elec_wait_02count = $record_set->mfo5_11_surgeries_feb_elective_waiting;
    $var_emer_03count = $record_set->mfo5_4_surgeries_mar_emergency;
    $var_elec_03count = $record_set->mfo5_3_surgeries_mar_elective;
    $var_elec_wait_03count = $record_set->mfo5_11_surgeries_mar_elective_waiting;
    
	$var_emer_q1count = $var_emer_01count + $var_emer_02count + $var_emer_03count;
    $var_elec_q1count = $var_elec_01count + $var_elec_02count + $var_elec_03count;
	$weeks_elec_q1count = ($var_elec_wait_01count*$var_elec_01count)+($var_elec_wait_02count*$var_elec_02count)+($var_elec_wait_03count*$var_elec_03count);
	$var_elec_wait_q1count = floor(getAverage($weeks_elec_q1count, $var_elec_q1count));
	
    $var_emer_04count = $record_set->mfo5_4_surgeries_apr_emergency;
    $var_elec_04count = $record_set->mfo5_3_surgeries_apr_elective;
    $var_elec_wait_04count = $record_set->mfo5_11_surgeries_apr_elective_waiting;
    $var_emer_05count = $record_set->mfo5_4_surgeries_may_emergency;
    $var_elec_05count = $record_set->mfo5_3_surgeries_may_elective;
    $var_elec_wait_05count = $record_set->mfo5_11_surgeries_may_elective_waiting;
	$var_emer_06count = $record_set->mfo5_4_surgeries_jun_emergency;
    $var_elec_06count = $record_set->mfo5_3_surgeries_jun_elective;
    $var_elec_wait_06count = $record_set->mfo5_11_surgeries_jun_elective_waiting;
    
	$var_emer_q2count = $var_emer_04count + $var_emer_05count + $var_emer_06count;
    $var_elec_q2count = $var_elec_04count + $var_elec_05count + $var_elec_06count;
	$weeks_elec_q2count = ($var_elec_wait_04count*$var_elec_04count)+($var_elec_wait_05count*$var_elec_05count)+($var_elec_wait_06count*$var_elec_06count);
	$var_elec_wait_q2count = floor(getAverage($weeks_elec_q2count, $var_elec_q2count));
	
	$var_emer_07count = $record_set->mfo5_4_surgeries_jul_emergency;
    $var_elec_07count = $record_set->mfo5_3_surgeries_jul_elective;
    $var_elec_wait_07count = $record_set->mfo5_11_surgeries_jul_elective_waiting;
    $var_emer_08count = $record_set->mfo5_4_surgeries_aug_emergency;
    $var_elec_08count = $record_set->mfo5_3_surgeries_aug_elective;
    $var_elec_wait_08count = $record_set->mfo5_11_surgeries_aug_elective_waiting;
    $var_emer_09count = $record_set->mfo5_4_surgeries_sep_emergency;
    $var_elec_09count = $record_set->mfo5_3_surgeries_sep_elective;
    $var_elec_wait_09count = $record_set->mfo5_11_surgeries_sep_elective_waiting;
	
	$var_emer_q3count = $var_emer_07count + $var_emer_08count + $var_emer_09count;
    $var_elec_q3count = $var_elec_07count + $var_elec_08count + $var_elec_09count;
	$weeks_elec_q3count = ($var_elec_wait_07count*$var_elec_07count)+($var_elec_wait_08count*$var_elec_08count)+($var_elec_wait_09count*$var_elec_09count);
	$var_elec_wait_q3count = floor(getAverage($weeks_elec_q3count, $var_elec_q3count));
	
    $var_emer_10count = $record_set->mfo5_4_surgeries_oct_emergency;
    $var_elec_10count = $record_set->mfo5_3_surgeries_oct_elective;
    $var_elec_wait_10count = $record_set->mfo5_11_surgeries_oct_elective_waiting;
    $var_emer_11count = $record_set->mfo5_4_surgeries_nov_emergency;
    $var_elec_11count = $record_set->mfo5_3_surgeries_nov_elective;
    $var_elec_wait_11count = $record_set->mfo5_11_surgeries_nov_elective_waiting;
    $var_emer_12count = $record_set->mfo5_4_surgeries_dec_emergency;
    $var_elec_12count = $record_set->mfo5_3_surgeries_dec_elective;
    $var_elec_wait_12count = $record_set->mfo5_11_surgeries_dec_elective_waiting;
	
	$var_emer_q4count = $var_emer_10count + $var_emer_11count + $var_emer_12count;
    $var_elec_q4count = $var_elec_10count + $var_elec_11count + $var_elec_12count;
	$weeks_elec_q4count = ($var_elec_wait_10count*$var_elec_10count)+($var_elec_wait_11count*$var_elec_11count)+($var_elec_wait_12count*$var_elec_12count);
	$var_elec_wait_q4count = floor(getAverage($weeks_elec_q4count, $var_elec_q4count));
	
	$var_emer_totalcount = $var_emer_q1count + $var_emer_q2count + $var_emer_q3count + $var_emer_q4count;
	$var_elec_totalcount = $var_elec_q1count + $var_elec_q2count + $var_elec_q3count + $var_elec_q4count;
	$weeks_elec_totalcount = $weeks_elec_q1count + $weeks_elec_q2count + $weeks_elec_q3count + $weeks_elec_q4count;
	$var_elec_wait_totalcount = floor(getAverage($weeks_elec_totalcount, $var_elec_totalcount));
	
	$mysqli->close();
}
else
{
	$mysqli->close();
	header('Location: surgery_view_all.php');
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
<script src="validfn-surgery.js"></script>

</head>
<body>

	<div class="viewbody">
	<h2>MFO 5: Surgical Operations - Edit Record</h2>
	<div class="viewlinks"><p><a href="surgery_view_all.php">View All Records</a></p></div>
	<hr/>

	<!-- Edit form here -->
	<form name="EditForm" id="EditForm" method="post" action="surgery_insert_update.php" onsubmit="return isValidForm()">

		<?php include_once('surgery_table.php'); ?>
		
		<br>
		<div align="left">
			<!-- <input type="reset" value="Clear"> -->
			<input type="hidden" name="var_surg_id" value="<?php if (isset($var_surg_id)) echo $var_surg_id; ?>"><button type="submit">Submit</button>
		</div>
	</form>
    
	</div>
</body>
</html>