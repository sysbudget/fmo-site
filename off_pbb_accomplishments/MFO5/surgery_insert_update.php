<?php

include_once('../phpfn-mfo1.php');
include_once('getPGHRates.php');

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
if (!isset($_POST['var_surg_id']))
{
	$query = "SELECT tbl_units_contributor.unit_contributor_name
			FROM tbl_sd_5_mfo5_3_4_11_surgeries INNER JOIN tbl_units_contributor
				ON tbl_sd_5_mfo5_3_4_11_surgeries.unit_contributor_id = tbl_units_contributor.unit_contributor_id
			WHERE tbl_units_contributor.unit_contributor_id = '$var_unit_contributor_id';";
	$record_set = $mysqli->query($query)->fetch_object();
	if ($record_set)
	{
		echo "<p>An existing record was found in the table already for " . $record_set->unit_contributor_name . ".</p><p>This record not saved.</p>";
		mysqli_close($mysqli);
		exit;
	}
}

$var_emer_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_emer_01count']);
$var_elec_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_01count']);
$var_elec_wait_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_wait_01count']);
$var_emer_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_emer_02count']);
$var_elec_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_02count']);
$var_elec_wait_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_wait_02count']);
$var_emer_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_emer_03count']);
$var_elec_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_03count']);
$var_elec_wait_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_wait_03count']);
$var_emer_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_emer_04count']);
$var_elec_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_04count']);
$var_elec_wait_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_wait_04count']);
$var_emer_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_emer_05count']);
$var_elec_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_05count']);
$var_elec_wait_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_wait_05count']);
$var_emer_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_emer_06count']);
$var_elec_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_06count']);
$var_elec_wait_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_wait_06count']);
$var_emer_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_emer_07count']);
$var_elec_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_07count']);
$var_elec_wait_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_wait_07count']);
$var_emer_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_emer_08count']);
$var_elec_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_08count']);
$var_elec_wait_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_wait_08count']);
$var_emer_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_emer_09count']);
$var_elec_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_09count']);
$var_elec_wait_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_wait_09count']);
$var_emer_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_emer_10count']);
$var_elec_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_10count']);
$var_elec_wait_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_wait_10count']);
$var_emer_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_emer_11count']);
$var_elec_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_11count']);
$var_elec_wait_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_wait_11count']);
$var_emer_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_emer_12count']);
$var_elec_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_12count']);
$var_elec_wait_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_elec_wait_12count']);

//If the ID for a particular Record has been passed as parameter by the calling program, then execute an SQL Update to save the Record fields.
//Otherwise, execute an SQL Insert to add a new Record.
if (isset($_POST['var_surg_id']))
{
	$var_surg_id = mysql_entities_fix_string($mysqli, $_POST['var_surg_id']);
	
	$query = "UPDATE tbl_sd_5_mfo5_3_4_11_surgeries
		SET
		unit_contributor_id = '$var_unit_contributor_id',
		unit_delivery_id = '$var_unit_delivery_id',
		focal_person_id = '$focal_person_id',
		cu_id = '$cu_id',
		cu_short_name = '$cu_short_name',
		mfo5_4_surgeries_jan_emergency = '$var_emer_01count',
		mfo5_3_surgeries_jan_elective = '$var_elec_01count',
		mfo5_11_surgeries_jan_elective_waiting = '$var_elec_wait_01count',
		mfo5_4_surgeries_feb_emergency = '$var_emer_02count',
		mfo5_3_surgeries_feb_elective = '$var_elec_02count',
		mfo5_11_surgeries_feb_elective_waiting = '$var_elec_wait_02count',
		mfo5_4_surgeries_mar_emergency = '$var_emer_03count',
		mfo5_3_surgeries_mar_elective = '$var_elec_03count',
		mfo5_11_surgeries_mar_elective_waiting = '$var_elec_wait_03count',
		mfo5_4_surgeries_apr_emergency = '$var_emer_04count',
		mfo5_3_surgeries_apr_elective = '$var_elec_04count',
		mfo5_11_surgeries_apr_elective_waiting = '$var_elec_wait_04count',
		mfo5_4_surgeries_may_emergency = '$var_emer_05count',
		mfo5_3_surgeries_may_elective = '$var_elec_05count',
		mfo5_11_surgeries_may_elective_waiting = '$var_elec_wait_05count',
		mfo5_4_surgeries_jun_emergency = '$var_emer_06count',
		mfo5_3_surgeries_jun_elective = '$var_elec_06count',
		mfo5_11_surgeries_jun_elective_waiting = '$var_elec_wait_06count',
		mfo5_4_surgeries_jul_emergency = '$var_emer_07count',
		mfo5_3_surgeries_jul_elective = '$var_elec_07count',
		mfo5_11_surgeries_jul_elective_waiting = '$var_elec_wait_07count',
		mfo5_4_surgeries_aug_emergency = '$var_emer_08count',
		mfo5_3_surgeries_aug_elective = '$var_elec_08count',
		mfo5_11_surgeries_aug_elective_waiting = '$var_elec_wait_08count',
		mfo5_4_surgeries_sep_emergency = '$var_emer_09count',
		mfo5_3_surgeries_sep_elective = '$var_elec_09count',
		mfo5_11_surgeries_sep_elective_waiting = '$var_elec_wait_09count',
		mfo5_4_surgeries_oct_emergency = '$var_emer_10count',
		mfo5_3_surgeries_oct_elective = '$var_elec_10count',
		mfo5_11_surgeries_oct_elective_waiting = '$var_elec_wait_10count',
		mfo5_4_surgeries_nov_emergency = '$var_emer_11count',
		mfo5_3_surgeries_nov_elective = '$var_elec_11count',
		mfo5_11_surgeries_nov_elective_waiting = '$var_elec_wait_11count',
		mfo5_4_surgeries_dec_emergency = '$var_emer_12count',
		mfo5_3_surgeries_dec_elective = '$var_elec_12count',
		mfo5_11_surgeries_dec_elective_waiting = '$var_elec_wait_12count'
		WHERE mfo5_3_4_11_surgeries_id = '$var_surg_id';";
		
}
else
	$query = "INSERT INTO tbl_sd_5_mfo5_3_4_11_surgeries
			(
				unit_contributor_id,
				unit_delivery_id,
				focal_person_id,
				cu_id,
				cu_short_name,
				mfo5_4_surgeries_jan_emergency,
				mfo5_3_surgeries_jan_elective,
				mfo5_11_surgeries_jan_elective_waiting,
				mfo5_4_surgeries_feb_emergency,
				mfo5_3_surgeries_feb_elective,
				mfo5_11_surgeries_feb_elective_waiting,
				mfo5_4_surgeries_mar_emergency,
				mfo5_3_surgeries_mar_elective,
				mfo5_11_surgeries_mar_elective_waiting,
				mfo5_4_surgeries_apr_emergency,
				mfo5_3_surgeries_apr_elective,
				mfo5_11_surgeries_apr_elective_waiting,
				mfo5_4_surgeries_may_emergency,
				mfo5_3_surgeries_may_elective,
				mfo5_11_surgeries_may_elective_waiting,
				mfo5_4_surgeries_jun_emergency,
				mfo5_3_surgeries_jun_elective,
				mfo5_11_surgeries_jun_elective_waiting,
				mfo5_4_surgeries_jul_emergency,
				mfo5_3_surgeries_jul_elective,
				mfo5_11_surgeries_jul_elective_waiting,
				mfo5_4_surgeries_aug_emergency,
				mfo5_3_surgeries_aug_elective,
				mfo5_11_surgeries_aug_elective_waiting,
				mfo5_4_surgeries_sep_emergency,
				mfo5_3_surgeries_sep_elective,
				mfo5_11_surgeries_sep_elective_waiting,
				mfo5_4_surgeries_oct_emergency,
				mfo5_3_surgeries_oct_elective,
				mfo5_11_surgeries_oct_elective_waiting,
				mfo5_4_surgeries_nov_emergency,
				mfo5_3_surgeries_nov_elective,
				mfo5_11_surgeries_nov_elective_waiting,
				mfo5_4_surgeries_dec_emergency,
				mfo5_3_surgeries_dec_elective,
				mfo5_11_surgeries_dec_elective_waiting
			)
			VALUES
			(
			'$var_unit_contributor_id',
			'$var_unit_delivery_id',
			'$focal_person_id',
			'$cu_id',
			'$cu_short_name',
			'$var_emer_01count',
			'$var_elec_01count',
			'$var_elec_wait_01count',
			'$var_emer_02count',
			'$var_elec_02count',
			'$var_elec_wait_02count',
			'$var_emer_03count',
			'$var_elec_03count',
			'$var_elec_wait_03count',
			'$var_emer_04count',
			'$var_elec_04count',
			'$var_elec_wait_04count',
			'$var_emer_05count',
			'$var_elec_05count',
			'$var_elec_wait_05count',
			'$var_emer_06count',
			'$var_elec_06count',
			'$var_elec_wait_06count',
			'$var_emer_07count',
			'$var_elec_07count',
			'$var_elec_wait_07count',
			'$var_emer_08count',
			'$var_elec_08count',
			'$var_elec_wait_08count',
			'$var_emer_09count',
			'$var_elec_09count',
			'$var_elec_wait_09count',
			'$var_emer_10count',
			'$var_elec_10count',
			'$var_elec_wait_10count',
			'$var_emer_11count',
			'$var_elec_11count',
			'$var_elec_wait_11count',
			'$var_emer_12count',
			'$var_elec_12count',
			'$var_elec_wait_12count'
			);";

if (!mysqli_query($mysqli,$query))
{
	$error=mysqli_error($mysqli);
	mysqli_close($mysqli);
	die('Error: ' . $error);
	exit;
}

mysqli_close($mysqli);
header("Location: surgery_view_all.php");
exit;

?>
