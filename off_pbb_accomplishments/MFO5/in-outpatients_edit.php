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
	header('Location: in-outpatients_view_all.php');
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
$query = "SELECT * FROM tbl_sd_5_mfo5_1_2_10_inpatients_outpatient WHERE mfo5_1_2_10_inpatients_outpatient_id = '$var_id';";
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
	$var_ipop_id = $record_set->mfo5_1_2_10_inpatients_outpatient_id;
    $var_ip_01count = $record_set->mfo5_1__inpatients_jan_count;
    $var_op_01count = $record_set->mfo5_2_outpatient_jan_count;
    $var_op_attn_01count = $record_set->mfo5_10_outpatient_jan_attended_in_2hrs;
	$var_op_attn_01count_pct = getAverage($var_op_attn_01count, $var_op_01count)*100;

    $var_ip_02count = $record_set->mfo5_1__inpatients_feb_count;
    $var_op_02count = $record_set->mfo5_2_outpatient_feb_count;
    $var_op_attn_02count = $record_set->mfo5_10_outpatient_feb_attended_in_2hrs;
	$var_op_attn_02count_pct = getAverage($var_op_attn_02count, $var_op_02count)*100;
	
    $var_ip_03count = $record_set->mfo5_1__inpatients_mar_count;
    $var_op_03count = $record_set->mfo5_2_outpatient_mar_count;
    $var_op_attn_03count = $record_set->mfo5_10_outpatient_mar_attended_in_2hrs;
	$var_op_attn_03count_pct = getAverage($var_op_attn_03count, $var_op_03count)*100;
    
	$var_ip_q1count = $var_ip_01count + $var_ip_02count + $var_ip_03count;
    $var_op_q1count = $var_op_01count + $var_op_02count + $var_op_03count;
    $var_op_attn_q1count = $var_op_attn_01count + $var_op_attn_02count + $var_op_attn_03count;
	$var_op_attn_q1count_pct = getAverage($var_op_attn_q1count, $var_op_q1count)*100;
	
    $var_ip_04count = $record_set->mfo5_1__inpatients_apr_count;
    $var_op_04count = $record_set->mfo5_2_outpatient_apr_count;
    $var_op_attn_04count = $record_set->mfo5_10_outpatient_apr_attended_in_2hrs;
	$var_op_attn_04count_pct = getAverage($var_op_attn_04count, $var_op_04count)*100;

    $var_ip_05count = $record_set->mfo5_1__inpatients_may_count;
    $var_op_05count = $record_set->mfo5_2_outpatient_may_count;
    $var_op_attn_05count = $record_set->mfo5_10_outpatient_may_attended_in_2hrs;
	$var_op_attn_05count_pct = getAverage($var_op_attn_05count, $var_op_05count)*100;

	$var_ip_06count = $record_set->mfo5_1__inpatients_jun_count;
    $var_op_06count = $record_set->mfo5_2_outpatient_jun_count;
    $var_op_attn_06count = $record_set->mfo5_10_outpatient_jun_attended_in_2hrs;
	$var_op_attn_06count_pct = getAverage($var_op_attn_06count, $var_op_06count)*100;
    
	$var_ip_q2count = $var_ip_04count + $var_ip_05count + $var_ip_06count;
    $var_op_q2count = $var_op_04count + $var_op_05count + $var_op_06count;
    $var_op_attn_q2count = $var_op_attn_04count + $var_op_attn_05count + $var_op_attn_06count;
	$var_op_attn_q2count_pct = getAverage($var_op_attn_q2count, $var_op_q2count)*100;
	
	$var_ip_07count = $record_set->mfo5_1__inpatients_jul_count;
    $var_op_07count = $record_set->mfo5_2_outpatient_jul_count;
    $var_op_attn_07count = $record_set->mfo5_10_outpatient_jul_attended_in_2hrs;
	$var_op_attn_07count_pct = getAverage($var_op_attn_07count, $var_op_07count)*100;

    $var_ip_08count = $record_set->mfo5_1__inpatients_aug_count;
    $var_op_08count = $record_set->mfo5_2_outpatient_aug_count;
    $var_op_attn_08count = $record_set->mfo5_10_outpatient_aug_attended_in_2hrs;
	$var_op_attn_08count_pct = getAverage($var_op_attn_08count, $var_op_08count)*100;
	
    $var_ip_09count = $record_set->mfo5_1__inpatients_sep_count;
    $var_op_09count = $record_set->mfo5_2_outpatient_sep_count;
    $var_op_attn_09count = $record_set->mfo5_10_outpatient_sep_attended_in_2hrs;
	$var_op_attn_09count_pct = getAverage($var_op_attn_09count, $var_op_09count)*100;
	
	$var_ip_q3count = $var_ip_07count + $var_ip_08count + $var_ip_09count;
    $var_op_q3count = $var_op_07count + $var_op_08count + $var_op_09count;
    $var_op_attn_q3count = $var_op_attn_07count + $var_op_attn_08count + $var_op_attn_09count;
	$var_op_attn_q3count_pct = getAverage($var_op_attn_q3count, $var_op_q3count)*100;
	
    $var_ip_10count = $record_set->mfo5_1__inpatients_oct_count;
    $var_op_10count = $record_set->mfo5_2_outpatient_oct_count;
    $var_op_attn_10count = $record_set->mfo5_10_outpatient_oct_attended_in_2hrs;
	$var_op_attn_10count_pct = getAverage($var_op_attn_10count, $var_op_10count)*100;

    $var_ip_11count = $record_set->mfo5_1__inpatients_nov_count;
    $var_op_11count = $record_set->mfo5_2_outpatient_nov_count;
    $var_op_attn_11count = $record_set->mfo5_10_outpatient_nov_attended_in_2hrs;
	$var_op_attn_11count_pct = getAverage($var_op_attn_11count, $var_op_11count)*100;

    $var_ip_12count = $record_set->mfo5_1__inpatients_dec_count;
    $var_op_12count = $record_set->mfo5_2_outpatient_dec_count;
    $var_op_attn_12count = $record_set->mfo5_10_outpatient_dec_attended_in_2hrs;
	$var_op_attn_12count_pct = getAverage($var_op_attn_12count, $var_op_12count)*100;
	
	$var_ip_q4count = $var_ip_10count + $var_ip_11count + $var_ip_12count;
    $var_op_q4count = $var_op_10count + $var_op_11count + $var_op_12count;
    $var_op_attn_q4count = $var_op_attn_10count + $var_op_attn_11count + $var_op_attn_12count;
	$var_op_attn_q4count_pct = getAverage($var_op_attn_q4count, $var_op_q4count)*100;

	$var_ip_totalcount = $var_ip_q1count + $var_ip_q2count + $var_ip_q3count + $var_ip_q4count;
	$var_op_totalcount = $var_op_q1count + $var_op_q2count + $var_op_q3count + $var_op_q4count;
	$var_op_attn_totalcount = $var_op_attn_q1count + $var_op_attn_q2count + $var_op_attn_q3count + $var_op_attn_q4count; 
	$var_op_attn_totalcount_pct = getAverage($var_op_attn_totalcount, $var_op_totalcount)*100;
	
	$mysqli->close();
}
else
{
	$mysqli->close();
	header('Location: in-outpatients_view_all.php');
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
<script src="validfn-iopatients.js"></script>

</head>
<body>

	<div class="viewbody">
	<h2>MFO 5: In-Patient and Out-Patient Care - Edit Record</h2>
	<div class="viewlinks"><p><a href="in-outpatients_view_all.php">View All Records</a></p></div>
	<hr/>

	<!-- Edit form here -->
	<form name="EditForm" id="EditForm" method="post" action="in-outpatients_insert_update.php" onsubmit="return isValidForm()">

		<?php include_once('in-outpatients_table.php'); ?>
		
		<br>
		<div align="left">
			<!-- <input type="reset" value="Clear"> -->
			<input type="hidden" name="var_ipop_id" value="<?php if (isset($var_ipop_id)) echo $var_ipop_id; ?>"><button type="submit">Submit</button>
		</div>
	</form>
    
	</div>
</body>
</html>