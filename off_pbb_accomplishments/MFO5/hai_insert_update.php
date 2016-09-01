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
if (!isset($_POST['var_hai_id']))
{
	$query = "SELECT tbl_units_contributor.unit_contributor_name
			FROM tbl_sd_5_mfo5_8_infection_rate INNER JOIN tbl_units_contributor
				ON tbl_sd_5_mfo5_8_infection_rate.unit_contributor_id = tbl_units_contributor.unit_contributor_id
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
$var_patientshai_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patientshai_01count']);

$var_patients_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_02count']);
$var_patientshai_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patientshai_02count']);

$var_patients_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_03count']);;
$var_patientshai_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patientshai_03count']);

$var_patients_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_04count']);
$var_patientshai_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patientshai_04count']);

$var_patients_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_05count']);;
$var_patientshai_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patientshai_05count']);

$var_patients_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_06count']);
$var_patientshai_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patientshai_06count']);

$var_patients_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_07count']);
$var_patientshai_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patientshai_07count']);

$var_patients_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_08count']);
$var_patientshai_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patientshai_08count']);

$var_patients_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_09count']);
$var_patientshai_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patientshai_09count']);

$var_patients_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_10count']);
$var_patientshai_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patientshai_10count']);

$var_patients_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_11count']);
$var_patientshai_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patientshai_11count']);

$var_patients_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patients_12count']);
$var_patientshai_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_patientshai_12count']);

//If the ID for a particular Record has been passed as parameter by the calling program, then execute an SQL Update to save the Record fields.
//Otherwise, execute an SQL Insert to add a new Record.
if (isset($_POST['var_hai_id']))
{
	$var_hai_id = mysql_entities_fix_string($mysqli, $_POST['var_hai_id']);
	
	$query = "UPDATE tbl_sd_5_mfo5_8_infection_rate
		SET
		unit_contributor_id = '$var_unit_contributor_id',
		unit_delivery_id = '$var_unit_delivery_id',
		focal_person_id = '$focal_person_id',
		cu_id = '$cu_id',
		cu_short_name = '$cu_short_name',
		mfo5_8_infection_rate_jan_patients = '$var_patients_01count',
		mfo5_8_infection_rate_jan_patients_infected = '$var_patientshai_01count',
		mfo5_8_infection_rate_feb_patients = '$var_patients_02count',
		mfo5_8_infection_rate_feb_patients_infected = '$var_patientshai_02count',
		mfo5_8_infection_rate_mar_patients = '$var_patients_03count',
		mfo5_8_infection_rate_mar_patients_infected = '$var_patientshai_03count',
		mfo5_8_infection_rate_apr_patients = '$var_patients_04count',
		mfo5_8_infection_rate_apr_patients_infected = '$var_patientshai_04count',
		mfo5_8_infection_rate_may_patients = '$var_patients_05count',
		mfo5_8_infection_rate_may_patients_infected = '$var_patientshai_05count',
		mfo5_8_infection_rate_jun_patients = '$var_patients_06count',
		mfo5_8_infection_rate_jun_patients_infected = '$var_patientshai_06count',
		mfo5_8_infection_rate_jul_patients = '$var_patients_07count',
		mfo5_8_infection_rate_jul_patients_infected = '$var_patientshai_07count',
		mfo5_8_infection_rate_aug_patients = '$var_patients_08count',
		mfo5_8_infection_rate_aug_patients_infected = '$var_patientshai_08count',
		mfo5_8_infection_rate_sep_patients = '$var_patients_09count',
		mfo5_8_infection_rate_sep_patients_infected = '$var_patientshai_09count',
		mfo5_8_infection_rate_oct_patients = '$var_patients_10count',
		mfo5_8_infection_rate_oct_patients_infected = '$var_patientshai_10count',
		mfo5_8_infection_rate_nov_patients = '$var_patients_11count',
		mfo5_8_infection_rate_nov_patients_infected = '$var_patientshai_11count',
		mfo5_8_infection_rate_dec_patients = '$var_patients_12count',
		mfo5_8_infection_rate_dec_patients_infected = '$var_patientshai_12count'
		WHERE mfo5_8_infection_rate_id = '$var_hai_id';";
		
}
else
	$query = "INSERT INTO tbl_sd_5_mfo5_8_infection_rate
			(
				unit_contributor_id,
				unit_delivery_id,
				focal_person_id,
				cu_id,
				cu_short_name,
				mfo5_8_infection_rate_jan_patients,
				mfo5_8_infection_rate_jan_patients_infected,
				mfo5_8_infection_rate_feb_patients,
				mfo5_8_infection_rate_feb_patients_infected,
				mfo5_8_infection_rate_mar_patients,
				mfo5_8_infection_rate_mar_patients_infected,
				mfo5_8_infection_rate_apr_patients,
				mfo5_8_infection_rate_apr_patients_infected,
				mfo5_8_infection_rate_may_patients,
				mfo5_8_infection_rate_may_patients_infected,
				mfo5_8_infection_rate_jun_patients,
				mfo5_8_infection_rate_jun_patients_infected,
				mfo5_8_infection_rate_jul_patients,
				mfo5_8_infection_rate_jul_patients_infected,
				mfo5_8_infection_rate_aug_patients,
				mfo5_8_infection_rate_aug_patients_infected,
				mfo5_8_infection_rate_sep_patients,
				mfo5_8_infection_rate_sep_patients_infected,
				mfo5_8_infection_rate_oct_patients,
				mfo5_8_infection_rate_oct_patients_infected,
				mfo5_8_infection_rate_nov_patients,
				mfo5_8_infection_rate_nov_patients_infected,
				mfo5_8_infection_rate_dec_patients,
				mfo5_8_infection_rate_dec_patients_infected
			)
			VALUES
			(
			'$var_unit_contributor_id',
			'$var_unit_delivery_id',
			'$focal_person_id',
			'$cu_id',
			'$cu_short_name',
			'$var_patients_01count',
			'$var_patientshai_01count',
			'$var_patients_02count',
			'$var_patientshai_02count',
			'$var_patients_03count',
			'$var_patientshai_03count',
			'$var_patients_04count',
			'$var_patientshai_04count',
			'$var_patients_05count',
			'$var_patientshai_05count',
			'$var_patients_06count',
			'$var_patientshai_06count',
			'$var_patients_07count',
			'$var_patientshai_07count',
			'$var_patients_08count',
			'$var_patientshai_08count',
			'$var_patients_09count',
			'$var_patientshai_09count',
			'$var_patients_10count',
			'$var_patientshai_10count',
			'$var_patients_11count',
			'$var_patientshai_11count',
			'$var_patients_12count',
			'$var_patientshai_12count'
			);";

if (!mysqli_query($mysqli,$query))
{
	$error=mysqli_error($mysqli);
	mysqli_close($mysqli);
	die('Error: ' . $error);
	exit;
}

mysqli_close($mysqli);
header("Location: hai_view_all.php");
exit;

?>
