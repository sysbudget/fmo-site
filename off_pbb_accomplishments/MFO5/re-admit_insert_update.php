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
if (!isset($_POST['var_readmit_id']))
{
	$query = "SELECT tbl_units_contributor.unit_contributor_name
			FROM tbl_sd_5_mfo5_9_readmitted_cases INNER JOIN tbl_units_contributor
				ON tbl_sd_5_mfo5_9_readmitted_cases.unit_contributor_id = tbl_units_contributor.unit_contributor_id
			WHERE tbl_units_contributor.unit_contributor_id = '$var_unit_contributor_id';";
	$record_set = $mysqli->query($query)->fetch_object();
	if ($record_set)
	{
		echo "<p>An existing record was found in the table already for " . $record_set->unit_contributor_name . ".</p><p>This record not saved.</p>";
		mysqli_close($mysqli);
		exit;
	}
}

$var_patients_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_01count']);
$var_readmit_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_readmit_01count']);

$var_patients_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_02count']);
$var_readmit_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_readmit_02count']);

$var_patients_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_03count']);;
$var_readmit_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_readmit_03count']);

$var_patients_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_04count']);
$var_readmit_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_readmit_04count']);

$var_patients_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_05count']);;
$var_readmit_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_readmit_05count']);

$var_patients_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_06count']);
$var_readmit_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_readmit_06count']);

$var_patients_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_07count']);
$var_readmit_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_readmit_07count']);

$var_patients_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_08count']);
$var_readmit_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_readmit_08count']);

$var_patients_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_09count']);
$var_readmit_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_readmit_09count']);

$var_patients_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_10count']);
$var_readmit_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_readmit_10count']);

$var_patients_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_11count']);
$var_readmit_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_readmit_11count']);

$var_patients_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_12count']);
$var_readmit_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_readmit_12count']);

//If the ID for a particular Record has been passed as parameter by the calling program, then execute an SQL Update to save the Record fields.
//Otherwise, execute an SQL Insert to add a new Record.
if (isset($_POST['var_readmit_id']))
{
	$var_readmit_id = mysql_entities_fix_string($mysqli, $_POST['var_readmit_id']);
	
	$query = "UPDATE tbl_sd_5_mfo5_9_readmitted_cases
		SET
		unit_contributor_id = '$var_unit_contributor_id',
		unit_delivery_id = '$var_unit_delivery_id',
		focal_person_id = '$focal_person_id',
		cu_id = '$cu_id',
		cu_short_name = '$cu_short_name',
		mfo5_9_readmitted_cases_jan_discharges = '$var_patients_01count',
		mfo5_9_readmitted_cases_jan_readmitted_within_3months = '$var_readmit_01count',
		mfo5_9_readmitted_cases_feb_discharges = '$var_patients_02count',
		mfo5_9_readmitted_cases_feb_readmitted_within_3months = '$var_readmit_02count',
		mfo5_9_readmitted_cases_mar_discharges = '$var_patients_03count',
		mfo5_9_readmitted_cases_mar_readmitted_within_3months = '$var_readmit_03count',
		mfo5_9_readmitted_cases_apr_discharges = '$var_patients_04count',
		mfo5_9_readmitted_cases_apr_readmitted_within_3months = '$var_readmit_04count',
		mfo5_9_readmitted_cases_may_discharges = '$var_patients_05count',
		mfo5_9_readmitted_cases_may_readmitted_within_3months = '$var_readmit_05count',
		mfo5_9_readmitted_cases_jun_discharges = '$var_patients_06count',
		mfo5_9_readmitted_cases_jun_readmitted_within_3months = '$var_readmit_06count',
		mfo5_9_readmitted_cases_jul_discharges = '$var_patients_07count',
		mfo5_9_readmitted_cases_jul_readmitted_within_3months = '$var_readmit_07count',
		mfo5_9_readmitted_cases_aug_discharges = '$var_patients_08count',
		mfo5_9_readmitted_cases_aug_readmitted_within_3months = '$var_readmit_08count',
		mfo5_9_readmitted_cases_sep_discharges = '$var_patients_09count',
		mfo5_9_readmitted_cases_sep_readmitted_within_3months = '$var_readmit_09count',
		mfo5_9_readmitted_cases_oct_discharges = '$var_patients_10count',
		mfo5_9_readmitted_cases_oct_readmitted_within_3months = '$var_readmit_10count',
		mfo5_9_readmitted_cases_nov_discharges = '$var_patients_11count',
		mfo5_9_readmitted_cases_nov_readmitted_within_3months = '$var_readmit_11count',
		mfo5_9_readmitted_cases_dec_discharges = '$var_patients_12count',
		mfo5_9_readmitted_cases_dec_readmitted_within_3months = '$var_readmit_12count'
		WHERE mfo5_9_readmitted_cases_id = '$var_readmit_id';";
		
}
else
	$query = "INSERT INTO tbl_sd_5_mfo5_9_readmitted_cases
			(
				unit_contributor_id,
				unit_delivery_id,
				focal_person_id,
				cu_id,
				cu_short_name,
				mfo5_9_readmitted_cases_jan_discharges,
				mfo5_9_readmitted_cases_jan_readmitted_within_3months,
				mfo5_9_readmitted_cases_feb_discharges,
				mfo5_9_readmitted_cases_feb_readmitted_within_3months,
				mfo5_9_readmitted_cases_mar_discharges,
				mfo5_9_readmitted_cases_mar_readmitted_within_3months,
				mfo5_9_readmitted_cases_apr_discharges,
				mfo5_9_readmitted_cases_apr_readmitted_within_3months,
				mfo5_9_readmitted_cases_may_discharges,
				mfo5_9_readmitted_cases_may_readmitted_within_3months,
				mfo5_9_readmitted_cases_jun_discharges,
				mfo5_9_readmitted_cases_jun_readmitted_within_3months,
				mfo5_9_readmitted_cases_jul_discharges,
				mfo5_9_readmitted_cases_jul_readmitted_within_3months,
				mfo5_9_readmitted_cases_aug_discharges,
				mfo5_9_readmitted_cases_aug_readmitted_within_3months,
				mfo5_9_readmitted_cases_sep_discharges,
				mfo5_9_readmitted_cases_sep_readmitted_within_3months,
				mfo5_9_readmitted_cases_oct_discharges,
				mfo5_9_readmitted_cases_oct_readmitted_within_3months,
				mfo5_9_readmitted_cases_nov_discharges,
				mfo5_9_readmitted_cases_nov_readmitted_within_3months,
				mfo5_9_readmitted_cases_dec_discharges,
				mfo5_9_readmitted_cases_dec_readmitted_within_3months
			)
			VALUES
			(
			'$var_unit_contributor_id',
			'$var_unit_delivery_id',
			'$focal_person_id',
			'$cu_id',
			'$cu_short_name',
			'$var_patients_01count',
			'$var_readmit_01count',
			'$var_patients_02count',
			'$var_readmit_02count',
			'$var_patients_03count',
			'$var_readmit_03count',
			'$var_patients_04count',
			'$var_readmit_04count',
			'$var_patients_05count',
			'$var_readmit_05count',
			'$var_patients_06count',
			'$var_readmit_06count',
			'$var_patients_07count',
			'$var_readmit_07count',
			'$var_patients_08count',
			'$var_readmit_08count',
			'$var_patients_09count',
			'$var_readmit_09count',
			'$var_patients_10count',
			'$var_readmit_10count',
			'$var_patients_11count',
			'$var_readmit_11count',
			'$var_patients_12count',
			'$var_readmit_12count'
			);";

if (!mysqli_query($mysqli,$query))
{
	$error=mysqli_error($mysqli);
	mysqli_close($mysqli);
	die('Error: ' . $error);
	exit;
}

mysqli_close($mysqli);
header("Location: re-admit_view_all.php");
exit;

?>
