<?php

include_once('../phpfn-mfo1.php');

session_name("pbb");
session_start();

// is the one accessing this page logged in or not?
if ( !isset($_SESSION['user_id']) || !$_SESSION['user_id'])
{
	// not logged in, move to login page
	header('Location: ../login/login_mysqli.php');
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

//Connect to the database
include_once('../connect-db.php');

//Get form fields and sanitize.
$var_unit_delivery_id = mysql_entities_fix_string($mysqli, $_POST['var_unit_delivery_id']);
$var_unit_contributor_id = mysql_entities_fix_string($mysqli, $_POST['var_unit_contributor_id']);

//If adding a new record, validate for no duplicate existing
if (!isset($_POST['var_ipop_id']))
{
	$query = "SELECT tbl_units_contributor.unit_contributor_name
			FROM tbl_sd_5_mfo5_1_2_10_inpatients_outpatient INNER JOIN tbl_units_contributor
				ON tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.unit_contributor_id = tbl_units_contributor.unit_contributor_id
			WHERE tbl_units_contributor.unit_contributor_id = '$var_unit_contributor_id';";
	$record_set = $mysqli->query($query)->fetch_object();
	if ($record_set)
	{
		echo "<p>An existing record was found in the table already for " . $record_set->unit_contributor_name . ".</p><p>This record not saved.</p>";
		mysqli_close($mysqli);
		exit;
	}
}

$var_ip_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ip_01count']);
$var_op_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_01count']);
$var_op_attn_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_attn_01count']);
$var_ip_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ip_02count']);
$var_op_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_02count']);
$var_op_attn_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_attn_02count']);
$var_ip_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ip_03count']);
$var_op_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_03count']);
$var_op_attn_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_attn_03count']);
$var_ip_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ip_04count']);
$var_op_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_04count']);
$var_op_attn_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_attn_04count']);
$var_ip_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ip_05count']);
$var_op_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_05count']);
$var_op_attn_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_attn_05count']);
$var_ip_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ip_06count']);
$var_op_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_06count']);
$var_op_attn_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_attn_06count']);
$var_ip_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ip_07count']);
$var_op_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_07count']);
$var_op_attn_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_attn_07count']);
$var_ip_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ip_08count']);
$var_op_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_08count']);
$var_op_attn_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_attn_08count']);
$var_ip_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ip_09count']);
$var_op_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_09count']);
$var_op_attn_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_attn_09count']);
$var_ip_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ip_10count']);
$var_op_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_10count']);
$var_op_attn_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_attn_10count']);
$var_ip_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ip_11count']);
$var_op_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_11count']);
$var_op_attn_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_attn_11count']);
$var_ip_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ip_12count']);
$var_op_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_12count']);
$var_op_attn_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_op_attn_12count']);

//If the ID for a particular Record has been passed as parameter by the calling program, then execute an SQL Update to save the Record fields.
//Otherwise, execute an SQL Insert to add a new Record.
if (isset($_POST['var_ipop_id']))
{
	$var_ipop_id = mysql_entities_fix_string($mysqli, $_POST['var_ipop_id']);
	
	$query = "UPDATE tbl_sd_5_mfo5_1_2_10_inpatients_outpatient
		SET
		unit_contributor_id = '$var_unit_contributor_id',
		unit_delivery_id = '$var_unit_delivery_id',
		focal_person_id = '$focal_person_id',
		cu_id = '$cu_id',
		cu_short_name = '$cu_short_name',
		mfo5_1__inpatients_jan_count = '$var_ip_01count',
		mfo5_2_outpatient_jan_count = '$var_op_01count',
		mfo5_10_outpatient_jan_attended_in_2hrs = '$var_op_attn_01count',
		mfo5_1__inpatients_feb_count = '$var_ip_02count',
		mfo5_2_outpatient_feb_count = '$var_op_02count',
		mfo5_10_outpatient_feb_attended_in_2hrs = '$var_op_attn_02count',
		mfo5_1__inpatients_mar_count = '$var_ip_03count',
		mfo5_2_outpatient_mar_count = '$var_op_03count',
		mfo5_10_outpatient_mar_attended_in_2hrs = '$var_op_attn_03count',
		mfo5_1__inpatients_apr_count = '$var_ip_04count',
		mfo5_2_outpatient_apr_count = '$var_op_04count',
		mfo5_10_outpatient_apr_attended_in_2hrs = '$var_op_attn_04count',
		mfo5_1__inpatients_may_count = '$var_ip_05count',
		mfo5_2_outpatient_may_count = '$var_op_05count',
		mfo5_10_outpatient_may_attended_in_2hrs = '$var_op_attn_05count',
		mfo5_1__inpatients_jun_count = '$var_ip_06count',
		mfo5_2_outpatient_jun_count = '$var_op_06count',
		mfo5_10_outpatient_jun_attended_in_2hrs = '$var_op_attn_06count',
		mfo5_1__inpatients_jul_count = '$var_ip_07count',
		mfo5_2_outpatient_jul_count = '$var_op_07count',
		mfo5_10_outpatient_jul_attended_in_2hrs = '$var_op_attn_07count',
		mfo5_1__inpatients_aug_count = '$var_ip_08count',
		mfo5_2_outpatient_aug_count = '$var_op_08count',
		mfo5_10_outpatient_aug_attended_in_2hrs = '$var_op_attn_08count',
		mfo5_1__inpatients_sep_count = '$var_ip_09count',
		mfo5_2_outpatient_sep_count = '$var_op_09count',
		mfo5_10_outpatient_sep_attended_in_2hrs = '$var_op_attn_09count',
		mfo5_1__inpatients_oct_count = '$var_ip_10count',
		mfo5_2_outpatient_oct_count = '$var_op_10count',
		mfo5_10_outpatient_oct_attended_in_2hrs = '$var_op_attn_10count',
		mfo5_1__inpatients_nov_count = '$var_ip_11count',
		mfo5_2_outpatient_nov_count = '$var_op_11count',
		mfo5_10_outpatient_nov_attended_in_2hrs = '$var_op_attn_11count',
		mfo5_1__inpatients_dec_count = '$var_ip_12count',
		mfo5_2_outpatient_dec_count = '$var_op_12count',
		mfo5_10_outpatient_dec_attended_in_2hrs = '$var_op_attn_12count'
		WHERE mfo5_1_2_10_inpatients_outpatient_id = '$var_ipop_id';";
}
else
	$query = "INSERT INTO tbl_sd_5_mfo5_1_2_10_inpatients_outpatient
			(
				unit_contributor_id,
				unit_delivery_id,
				focal_person_id,
				cu_id,
				cu_short_name,
				mfo5_1__inpatients_jan_count,
				mfo5_2_outpatient_jan_count,
				mfo5_10_outpatient_jan_attended_in_2hrs,
				mfo5_1__inpatients_feb_count,
				mfo5_2_outpatient_feb_count,
				mfo5_10_outpatient_feb_attended_in_2hrs,
				mfo5_1__inpatients_mar_count,
				mfo5_2_outpatient_mar_count,
				mfo5_10_outpatient_mar_attended_in_2hrs,
				mfo5_1__inpatients_apr_count,
				mfo5_2_outpatient_apr_count,
				mfo5_10_outpatient_apr_attended_in_2hrs,
				mfo5_1__inpatients_may_count,
				mfo5_2_outpatient_may_count,
				mfo5_10_outpatient_may_attended_in_2hrs,
				mfo5_1__inpatients_jun_count,
				mfo5_2_outpatient_jun_count,
				mfo5_10_outpatient_jun_attended_in_2hrs,
				mfo5_1__inpatients_jul_count,
				mfo5_2_outpatient_jul_count,
				mfo5_10_outpatient_jul_attended_in_2hrs,
				mfo5_1__inpatients_aug_count,
				mfo5_2_outpatient_aug_count,
				mfo5_10_outpatient_aug_attended_in_2hrs,
				mfo5_1__inpatients_sep_count,
				mfo5_2_outpatient_sep_count,
				mfo5_10_outpatient_sep_attended_in_2hrs,
				mfo5_1__inpatients_oct_count,
				mfo5_2_outpatient_oct_count,
				mfo5_10_outpatient_oct_attended_in_2hrs,
				mfo5_1__inpatients_nov_count,
				mfo5_2_outpatient_nov_count,
				mfo5_10_outpatient_nov_attended_in_2hrs,
				mfo5_1__inpatients_dec_count,
				mfo5_2_outpatient_dec_count,
				mfo5_10_outpatient_dec_attended_in_2hrs
			)
			VALUES
			(
			'$var_unit_contributor_id',
			'$var_unit_delivery_id',
			'$focal_person_id',
			'$cu_id',
			'$cu_short_name',
			'$var_ip_01count',
			'$var_op_01count',
			'$var_op_attn_01count',
			'$var_ip_02count',
			'$var_op_02count',
			'$var_op_attn_02count',
			'$var_ip_03count',
			'$var_op_03count',
			'$var_op_attn_03count',
			'$var_ip_04count',
			'$var_op_04count',
			'$var_op_attn_04count',
			'$var_ip_05count',
			'$var_op_05count',
			'$var_op_attn_05count',
			'$var_ip_06count',
			'$var_op_06count',
			'$var_op_attn_06count',
			'$var_ip_07count',
			'$var_op_07count',
			'$var_op_attn_07count',
			'$var_ip_08count',
			'$var_op_08count',
			'$var_op_attn_08count',
			'$var_ip_09count',
			'$var_op_09count',
			'$var_op_attn_09count',
			'$var_ip_10count',
			'$var_op_10count',
			'$var_op_attn_10count',
			'$var_ip_11count',
			'$var_op_11count',
			'$var_op_attn_11count',
			'$var_ip_12count',
			'$var_op_12count',
			'$var_op_attn_12count'
			);";

if (!mysqli_query($mysqli,$query))
{
	$error=mysqli_error($mysqli);
	mysqli_close($mysqli);
	die('Error: ' . $error);
	exit;
}
		
mysqli_close($mysqli);
header("Location: in-outpatients_view_all.php");
exit;
	
?>
