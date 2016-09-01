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
if (!isset($_POST['var_ndr_id']))
{
	$query = "SELECT tbl_units_contributor.unit_contributor_name
			FROM tbl_sd_5_mfo5_6_death_rate INNER JOIN tbl_units_contributor
				ON tbl_sd_5_mfo5_6_death_rate.unit_contributor_id = tbl_units_contributor.unit_contributor_id
			WHERE tbl_units_contributor.unit_contributor_id = '$var_unit_contributor_id';";
	$record_set = $mysqli->query($query)->fetch_object();
	if ($record_set)
	{
		echo "<p>An existing record was found in the table already for " . $record_set->unit_contributor_name . ".</p><p>This record not saved.</p>";
		mysqli_close($mysqli);
		exit;
	}
}

$var_dischrg_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dischrg_01count']);
$var_d_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_d_01count']);
$var_dl48_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dl48_01count']);

$var_dischrg_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dischrg_02count']);
$var_d_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_d_02count']);
$var_dl48_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dl48_02count']);

$var_dischrg_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dischrg_03count']);;
$var_d_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_d_03count']);
$var_dl48_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dl48_03count']);

$var_dischrg_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dischrg_04count']);
$var_d_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_d_04count']);
$var_dl48_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dl48_04count']);

$var_dischrg_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dischrg_05count']);;
$var_d_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_d_05count']);
$var_dl48_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dl48_05count']);

$var_dischrg_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dischrg_06count']);
$var_d_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_d_06count']);
$var_dl48_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dl48_06count']);

$var_dischrg_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dischrg_07count']);
$var_d_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_d_07count']);
$var_dl48_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dl48_07count']);

$var_dischrg_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dischrg_08count']);
$var_d_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_d_08count']);
$var_dl48_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dl48_08count']);

$var_dischrg_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dischrg_09count']);
$var_d_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_d_09count']);
$var_dl48_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dl48_09count']);

$var_dischrg_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dischrg_10count']);
$var_d_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_d_10count']);
$var_dl48_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dl48_10count']);

$var_dischrg_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dischrg_11count']);
$var_d_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_d_11count']);
$var_dl48_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dl48_11count']);

$var_dischrg_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dischrg_12count']);
$var_d_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_d_12count']);
$var_dl48_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_dl48_12count']);

//If the ID for a particular Record has been passed as parameter by the calling program, then execute an SQL Update to save the Record fields.
//Otherwise, execute an SQL Insert to add a new Record.
if (isset($_POST['var_ndr_id']))
{
	$var_ndr_id = mysql_entities_fix_string($mysqli, $_POST['var_ndr_id']);
	
	$query = "UPDATE tbl_sd_5_mfo5_6_death_rate
		SET
		unit_contributor_id = '$var_unit_contributor_id',
		unit_delivery_id = '$var_unit_delivery_id',
		focal_person_id = '$focal_person_id',
		cu_id = '$cu_id',
		cu_short_name = '$cu_short_name',
		mfo5_6_death_rate_jan_discharges = '$var_dischrg_01count',
		mfo5_6_death_rate_jan_deaths = '$var_d_01count',
		mfo5_6_death_rate_jan_deaths_less_48hrs = '$var_dl48_01count',
		mfo5_6_death_rate_feb_discharges = '$var_dischrg_02count',
		mfo5_6_death_rate_feb_deaths = '$var_d_02count',
		mfo5_6_death_rate_feb_deaths_less_48hrs = '$var_dl48_02count',
		mfo5_6_death_rate_mar_discharges = '$var_dischrg_03count',
		mfo5_6_death_rate_mar_deaths = '$var_d_03count',
		mfo5_6_death_rate_mar_deaths_less_48hrs = '$var_dl48_03count',
		mfo5_6_death_rate_apr_discharges = '$var_dischrg_04count',
		mfo5_6_death_rate_apr_deaths = '$var_d_04count',
		mfo5_6_death_rate_apr_deaths_less_48hrs = '$var_dl48_04count',
		mfo5_6_death_rate_may_discharges = '$var_dischrg_05count',
		mfo5_6_death_rate_may_deaths = '$var_d_05count',
		mfo5_6_death_rate_may_deaths_less_48hrs = '$var_dl48_05count',
		mfo5_6_death_rate_jun_discharges = '$var_dischrg_06count',
		mfo5_6_death_rate_jun_deaths = '$var_d_06count',
		mfo5_6_death_rate_jun_deaths_less_48hrs = '$var_dl48_06count',
		mfo5_6_death_rate_jul_discharges = '$var_dischrg_07count',
		mfo5_6_death_rate_jul_deaths = '$var_d_07count',
		mfo5_6_death_rate_jul_deaths_less_48hrs = '$var_dl48_07count',
		mfo5_6_death_rate_aug_discharges = '$var_dischrg_08count',
		mfo5_6_death_rate_aug_deaths = '$var_d_08count',
		mfo5_6_death_rate_aug_deaths_less_48hrs = '$var_dl48_08count',
		mfo5_6_death_rate_sep_discharges = '$var_dischrg_09count',
		mfo5_6_death_rate_sep_deaths = '$var_d_09count',
		mfo5_6_death_rate_sep_deaths_less_48hrs = '$var_dl48_09count',
		mfo5_6_death_rate_oct_discharges = '$var_dischrg_10count',
		mfo5_6_death_rate_oct_deaths = '$var_d_10count',
		mfo5_6_death_rate_oct_deaths_less_48hrs = '$var_dl48_10count',
		mfo5_6_death_rate_nov_discharges = '$var_dischrg_11count',
		mfo5_6_death_rate_nov_deaths = '$var_d_11count',
		mfo5_6_death_rate_nov_deaths_less_48hrs = '$var_dl48_11count',
		mfo5_6_death_rate_dec_discharges = '$var_dischrg_12count',
		mfo5_6_death_rate_dec_deaths = '$var_d_12count',
		mfo5_6_death_rate_dec_deaths_less_48hrs = '$var_dl48_12count'
		WHERE mfo5_6_death_rate_id = '$var_ndr_id';";
		
}
else
	$query = "INSERT INTO tbl_sd_5_mfo5_6_death_rate
			(
				unit_contributor_id,
				unit_delivery_id,
				focal_person_id,
				cu_id,
				cu_short_name,
				mfo5_6_death_rate_jan_discharges,
				mfo5_6_death_rate_jan_deaths,
				mfo5_6_death_rate_jan_deaths_less_48hrs,
				mfo5_6_death_rate_feb_discharges,
				mfo5_6_death_rate_feb_deaths,
				mfo5_6_death_rate_feb_deaths_less_48hrs,
				mfo5_6_death_rate_mar_discharges,
				mfo5_6_death_rate_mar_deaths,
				mfo5_6_death_rate_mar_deaths_less_48hrs,
				mfo5_6_death_rate_apr_discharges,
				mfo5_6_death_rate_apr_deaths,
				mfo5_6_death_rate_apr_deaths_less_48hrs,
				mfo5_6_death_rate_may_discharges,
				mfo5_6_death_rate_may_deaths,
				mfo5_6_death_rate_may_deaths_less_48hrs,
				mfo5_6_death_rate_jun_discharges,
				mfo5_6_death_rate_jun_deaths,
				mfo5_6_death_rate_jun_deaths_less_48hrs,
				mfo5_6_death_rate_jul_discharges,
				mfo5_6_death_rate_jul_deaths,
				mfo5_6_death_rate_jul_deaths_less_48hrs,
				mfo5_6_death_rate_aug_discharges,
				mfo5_6_death_rate_aug_deaths,
				mfo5_6_death_rate_aug_deaths_less_48hrs,
				mfo5_6_death_rate_sep_discharges,
				mfo5_6_death_rate_sep_deaths,
				mfo5_6_death_rate_sep_deaths_less_48hrs,
				mfo5_6_death_rate_oct_discharges,
				mfo5_6_death_rate_oct_deaths,
				mfo5_6_death_rate_oct_deaths_less_48hrs,
				mfo5_6_death_rate_nov_discharges,
				mfo5_6_death_rate_nov_deaths,
				mfo5_6_death_rate_nov_deaths_less_48hrs,
				mfo5_6_death_rate_dec_discharges,
				mfo5_6_death_rate_dec_deaths,
				mfo5_6_death_rate_dec_deaths_less_48hrs
			)
			VALUES
			(
			'$var_unit_contributor_id',
			'$var_unit_delivery_id',
			'$focal_person_id',
			'$cu_id',
			'$cu_short_name',
			'$var_dischrg_01count',
			'$var_d_01count',
			'$var_dl48_01count',
			'$var_dischrg_02count',
			'$var_d_02count',
			'$var_dl48_02count',
			'$var_dischrg_03count',
			'$var_d_03count',
			'$var_dl48_03count',
			'$var_dischrg_04count',
			'$var_d_04count',
			'$var_dl48_04count',
			'$var_dischrg_05count',
			'$var_d_05count',
			'$var_dl48_05count',
			'$var_dischrg_06count',
			'$var_d_06count',
			'$var_dl48_06count',
			'$var_dischrg_07count',
			'$var_d_07count',
			'$var_dl48_07count',
			'$var_dischrg_08count',
			'$var_d_08count',
			'$var_dl48_08count',
			'$var_dischrg_09count',
			'$var_d_09count',
			'$var_dl48_09count',
			'$var_dischrg_10count',
			'$var_d_10count',
			'$var_dl48_10count',
			'$var_dischrg_11count',
			'$var_d_11count',
			'$var_dl48_11count',
			'$var_dischrg_12count',
			'$var_d_12count',
			'$var_dl48_12count'
			);";

if (!mysqli_query($mysqli,$query))
{
	$error=mysqli_error($mysqli);
	mysqli_close($mysqli);
	die('Error: ' . $error);
	exit;
}

mysqli_close($mysqli);
header("Location: deathrates_view_all.php");
exit;

?>
