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
if (!isset($_POST['var_bed_id']))
{
	$query = "SELECT tbl_units_contributor.unit_contributor_name
			FROM tbl_sd_5_mfo5_5_12_beds INNER JOIN tbl_units_contributor
				ON tbl_sd_5_mfo5_5_12_beds.unit_contributor_id = tbl_units_contributor.unit_contributor_id
			WHERE tbl_units_contributor.unit_contributor_id = '$var_unit_contributor_id';";
	$record_set = $mysqli->query($query)->fetch_object();
	if ($record_set)
	{
		echo "<p>An existing record was found in the table already for " . $record_set->unit_contributor_name . ".</p><p>This record not saved.</p>";
		mysqli_close($mysqli);
		exit;
	}
}

// #ChangeNextYear
$year = 2016;

$var_beds_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_beds_01count']);
$var_ipdays_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ipdays_01count']);

$var_beds_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_beds_02count']);
$var_ipdays_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ipdays_02count']);

$var_beds_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_beds_03count']);;
$var_ipdays_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ipdays_03count']);

$var_beds_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_beds_04count']);
$var_ipdays_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ipdays_04count']);

$var_beds_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_beds_05count']);;
$var_ipdays_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ipdays_05count']);

$var_beds_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_beds_06count']);
$var_ipdays_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ipdays_06count']);

$var_beds_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_beds_07count']);
$var_ipdays_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ipdays_07count']);

$var_beds_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_beds_08count']);
$var_ipdays_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ipdays_08count']);

$var_beds_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_beds_09count']);
$var_ipdays_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ipdays_09count']);

$var_beds_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_beds_10count']);
$var_ipdays_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ipdays_10count']);

$var_beds_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_beds_11count']);
$var_ipdays_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ipdays_11count']);

$var_beds_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_beds_12count']);
$var_ipdays_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_ipdays_12count']);

//If the ID for a particular Record has been passed as parameter by the calling program, then execute an SQL Update to save the Record fields.
//Otherwise, execute an SQL Insert to add a new Record.
if (isset($_POST['var_bed_id']))
{
	$var_bed_id = mysql_entities_fix_string($mysqli, $_POST['var_bed_id']);
	
	$query = "UPDATE tbl_sd_5_mfo5_5_12_beds
		SET
		unit_contributor_id = '$var_unit_contributor_id',
		unit_delivery_id = '$var_unit_delivery_id',
		focal_person_id = '$focal_person_id',
		cu_id = '$cu_id',
		cu_short_name = '$cu_short_name',
		mfo5_5_beds_jan_count = '$var_beds_01count',
		mfo5_12_beds_jan_inpatient_days = '$var_ipdays_01count',
		mfo5_12_beds_jan_days = DAYOFMONTH(LAST_DAY(CONCAT('$year', '-01-01'))),
		mfo5_5_beds_feb_count = '$var_beds_02count',
		mfo5_12_beds_feb_inpatient_days = '$var_ipdays_02count',
		mfo5_12_beds_feb_days = DAYOFMONTH(LAST_DAY(CONCAT('$year', '-02-01'))),
		mfo5_5_beds_mar_count = '$var_beds_03count',
		mfo5_12_beds_mar_inpatient_days = '$var_ipdays_03count',
		mfo5_12_beds_mar_days = DAYOFMONTH(LAST_DAY(CONCAT('$year', '-03-01'))),
		mfo5_5_beds_apr_count = '$var_beds_04count',
		mfo5_12_beds_apr_inpatient_days = '$var_ipdays_04count',
		mfo5_12_beds_apr_days = DAYOFMONTH(LAST_DAY(CONCAT('$year', '-04-01'))),
		mfo5_5_beds_may_count = '$var_beds_05count',
		mfo5_12_beds_may_inpatient_days = '$var_ipdays_05count',
		mfo5_12_beds_may_days = DAYOFMONTH(LAST_DAY(CONCAT('$year', '-05-01'))),
		mfo5_5_beds_jun_count = '$var_beds_06count',
		mfo5_12_beds_jun_inpatient_days = '$var_ipdays_06count',
		mfo5_12_beds_jun_days = DAYOFMONTH(LAST_DAY(CONCAT('$year', '-06-01'))),
		mfo5_5_beds_jul_count = '$var_beds_07count',
		mfo5_12_beds_jul_inpatient_days = '$var_ipdays_07count',
		mfo5_12_beds_jul_days = DAYOFMONTH(LAST_DAY(CONCAT('$year', '-07-01'))),
		mfo5_5_beds_aug_count = '$var_beds_08count',
		mfo5_12_beds_aug_inpatient_days = '$var_ipdays_08count',
		mfo5_12_beds_aug_days = DAYOFMONTH(LAST_DAY(CONCAT('$year', '-08-01'))),
		mfo5_5_beds_sep_count = '$var_beds_09count',
		mfo5_12_beds_sep_inpatient_days = '$var_ipdays_09count',
		mfo5_12_beds_sep_days = DAYOFMONTH(LAST_DAY(CONCAT('$year', '-09-01'))),
		mfo5_5_beds_oct_count = '$var_beds_10count',
		mfo5_12_beds_oct_inpatient_days = '$var_ipdays_10count',
		mfo5_12_beds_oct_days = DAYOFMONTH(LAST_DAY(CONCAT('$year', '-10-01'))),
		mfo5_5_beds_nov_count = '$var_beds_11count',
		mfo5_12_beds_nov_inpatient_days = '$var_ipdays_11count',
		mfo5_12_beds_nov_days = DAYOFMONTH(LAST_DAY(CONCAT('$year', '-11-01'))),
		mfo5_5_beds_dec_count = '$var_beds_12count',
		mfo5_12_beds_dec_inpatient_days = '$var_ipdays_12count',
		mfo5_12_beds_dec_days = DAYOFMONTH(LAST_DAY(CONCAT('$year', '-12-01')))
		WHERE mfo5_5_12_beds_id = '$var_bed_id';";
		
}
else
	$query = "INSERT INTO tbl_sd_5_mfo5_5_12_beds
			(
				unit_contributor_id,
				unit_delivery_id,
				focal_person_id,
				cu_id,
				cu_short_name,
				mfo5_5_beds_jan_count,
				mfo5_12_beds_jan_inpatient_days,
				mfo5_12_beds_jan_days,
				mfo5_5_beds_feb_count,
				mfo5_12_beds_feb_inpatient_days,
				mfo5_12_beds_feb_days,
				mfo5_5_beds_mar_count,
				mfo5_12_beds_mar_inpatient_days,
				mfo5_12_beds_mar_days,
				mfo5_5_beds_apr_count,
				mfo5_12_beds_apr_inpatient_days,
				mfo5_12_beds_apr_days,
				mfo5_5_beds_may_count,
				mfo5_12_beds_may_inpatient_days,
				mfo5_12_beds_may_days,
				mfo5_5_beds_jun_count,
				mfo5_12_beds_jun_inpatient_days,
				mfo5_12_beds_jun_days,
				mfo5_5_beds_jul_count,
				mfo5_12_beds_jul_inpatient_days,
				mfo5_12_beds_jul_days,
				mfo5_5_beds_aug_count,
				mfo5_12_beds_aug_inpatient_days,
				mfo5_12_beds_aug_days,
				mfo5_5_beds_sep_count,
				mfo5_12_beds_sep_inpatient_days,
				mfo5_12_beds_sep_days,
				mfo5_5_beds_oct_count,
				mfo5_12_beds_oct_inpatient_days,
				mfo5_12_beds_oct_days,
				mfo5_5_beds_nov_count,
				mfo5_12_beds_nov_inpatient_days,
				mfo5_12_beds_nov_days,
				mfo5_5_beds_dec_count,
				mfo5_12_beds_dec_inpatient_days,
				mfo5_12_beds_dec_days
			)
			VALUES
			(
			'$var_unit_contributor_id',
			'$var_unit_delivery_id',
			'$focal_person_id',
			'$cu_id',
			'$cu_short_name',
			'$var_beds_01count',
			'$var_ipdays_01count',
			DAYOFMONTH(LAST_DAY(CONCAT('$year', '-01-01'))),
			'$var_beds_02count',
			'$var_ipdays_02count',
			DAYOFMONTH(LAST_DAY(CONCAT('$year', '-02-01'))),
			'$var_beds_03count',
			'$var_ipdays_03count',
			DAYOFMONTH(LAST_DAY(CONCAT('$year', '-03-01'))),
			'$var_beds_04count',
			'$var_ipdays_04count',
			DAYOFMONTH(LAST_DAY(CONCAT('$year', '-04-01'))),
			'$var_beds_05count',
			'$var_ipdays_05count',
			DAYOFMONTH(LAST_DAY(CONCAT('$year', '-05-01'))),
			'$var_beds_06count',
			'$var_ipdays_06count',
			DAYOFMONTH(LAST_DAY(CONCAT('$year', '-06-01'))),
			'$var_beds_07count',
			'$var_ipdays_07count',
			DAYOFMONTH(LAST_DAY(CONCAT('$year', '-07-01'))),
			'$var_beds_08count',
			'$var_ipdays_08count',
			DAYOFMONTH(LAST_DAY(CONCAT('$year', '-08-01'))),
			'$var_beds_09count',
			'$var_ipdays_09count',
			DAYOFMONTH(LAST_DAY(CONCAT('$year', '-09-01'))),
			'$var_beds_10count',
			'$var_ipdays_10count',
			DAYOFMONTH(LAST_DAY(CONCAT('$year', '-10-01'))),
			'$var_beds_11count',
			'$var_ipdays_11count',
			DAYOFMONTH(LAST_DAY(CONCAT('$year', '-11-01'))),
			'$var_beds_12count',
			'$var_ipdays_12count',
			DAYOFMONTH(LAST_DAY(CONCAT('$year', '-12-01')))
			);";

if (!mysqli_query($mysqli,$query))
{
	$error=mysqli_error($mysqli);
	mysqli_close($mysqli);
	die('Error: ' . $error);
	exit;
}

mysqli_close($mysqli);
header("Location: bedoccupancy_view_all.php");
exit;

?>
