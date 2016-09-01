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

//Get the form fields and sanitize.
$var_forma_program_id = mysql_entities_fix_string($mysqli, $_POST['var_forma_program_id']);
$var_first_name = mysql_entities_fix_string($mysqli, $_POST['var_first_name']);
$var_last_name = mysql_entities_fix_string($mysqli, $_POST['var_last_name']);
$var_grad_date = mysql_entities_fix_string($mysqli, $_POST['var_grad_date']);
$var_trace_date = mysql_entities_fix_string($mysqli, $_POST['var_trace_date']);
$var_is_scholar = mysql_entities_fix_string($mysqli, $_POST['var_is_scholar']);
$var_stat_before_id = mysql_entities_fix_string($mysqli, $_POST['var_stat_before_id']);
$var_stat_after_id = mysql_entities_fix_string($mysqli, $_POST['var_stat_after_id']);
if (isset($_POST['var_hire_date']))
	$var_hire_date = mysql_entities_fix_string($mysqli, $_POST['var_hire_date']);
else
	$var_hire_date = mysql_entities_fix_string($mysqli, $_POST['hvar_hire_date']);

$var_hired_improved_id = mysql_entities_fix_string($mysqli, $_POST['var_hired_improved_id']);

if (isset($_POST['var_income_id']))
	$var_income_id = 1*mysql_entities_fix_string($mysqli, $_POST['var_income_id']);
else
	$var_income_id = 1*mysql_entities_fix_string($mysqli, $_POST['hvar_income_id']);

if (isset($_POST['var_is_increase']))
	$var_is_increase = mysql_entities_fix_string($mysqli, $_POST['var_is_increase']);
else
	$var_is_increase = mysql_entities_fix_string($mysqli, $_POST['hvar_is_increase']);

if (isset($_POST['var_is_promo']))
	$var_is_promo = mysql_entities_fix_string($mysqli, $_POST['var_is_promo']);
else
	$var_is_promo = mysql_entities_fix_string($mysqli, $_POST['hvar_is_promo']);

if (isset($_POST['var_income_incr_pct']))
	$var_income_incr_pct = 1*mysql_entities_fix_string($mysqli, $_POST['var_income_incr_pct']);
else
	$var_income_incr_pct = 1*mysql_entities_fix_string($mysqli, $_POST['hvar_income_incr_pct']);

//If the ID for a particular Record has been passed as parameter by the calling program, then execute an SQL Update to save the Record fields.
//Otherwise, execute an SQL Insert to add a new Record.
if (isset($_POST['var_employ_id']))
{	
	$var_employ_id = mysql_entities_fix_string($mysqli, $_POST['var_employ_id']);
	$query = "UPDATE tbl_sd_2_mfo2_formc_employment
			SET
				unit_contributor_id = '$unit_contributor_id',
				unit_delivery_id = '$unit_delivery_id',
				focal_person_id = '$focal_person_id',
				cu_id = '$cu_id',
				cu_short_name = '$cu_short_name',
				unit_delivery_name_cu = '$unit_delivery_name_cu',
				unit_contributor_name = '$unit_contributor_name',
				mfo2_forma_program_id = '$var_forma_program_id',
				mfo2_formc_employment_last_name = '$var_last_name',
				mfo2_formc_employment_first_name = '$var_first_name',
				mfo2_formc_employment_with_scholarship = '$var_is_scholar',
				mfo2_formc_employment_graduation_date = STR_TO_DATE('$var_grad_date','%m/%d/%Y'),
				mfo2_formc_employment_date_surveyed = STR_TO_DATE('$var_trace_date','%m/%d/%Y'),
				mfo2_formc_employment_hired_improved_date = IF('$var_hire_date' IS NULL OR '$var_hire_date' = '', NULL, STR_TO_DATE('$var_hire_date','%m/%d/%Y')),
				employment_status_id_before_graduation_status = '$var_stat_before_id',
				employment_status_id_after_graduation_status = '$var_stat_after_id',
				mfo2_formc_employment_hired_improved = '$var_hired_improved_id',
				income_scale_id = '$var_income_id',
				mfo2_formc_employment_with_promotion = '$var_is_promo',
				mfo2_formc_employment_increase_in_income_applicable = '$var_is_increase',
				mfo2_formc_employment_increase_in_income_percent = '$var_income_incr_pct'
			WHERE mfo2_formc_employment_id = '$var_employ_id';";
}
else
	$query = "INSERT INTO tbl_sd_2_mfo2_formc_employment
			( mfo2_forma_program_id,
			unit_contributor_id,
			unit_delivery_id,
			focal_person_id,
			cu_id,
			cu_short_name,
			unit_delivery_name_cu,
			unit_contributor_name,
			mfo2_formc_employment_last_name,
			mfo2_formc_employment_first_name,
			mfo2_formc_employment_with_scholarship,
			mfo2_formc_employment_graduation_date,
			mfo2_formc_employment_date_surveyed,
			mfo2_formc_employment_hired_improved_date,
			employment_status_id_before_graduation_status,
			employment_status_id_after_graduation_status,
			mfo2_formc_employment_hired_improved,
			income_scale_id,
			mfo2_formc_employment_with_promotion,
			mfo2_formc_employment_increase_in_income_applicable,
			mfo2_formc_employment_increase_in_income_percent )
			VALUES
			(	'$var_forma_program_id',
				'$unit_contributor_id',
				'$unit_delivery_id',
				'$focal_person_id',
				'$cu_id',
				'$cu_short_name',
				'$unit_delivery_name_cu',
				'$unit_contributor_name',
				'$var_last_name',
				'$var_first_name',
				'$var_is_scholar',
				STR_TO_DATE('$var_grad_date','%m/%d/%Y'),
				STR_TO_DATE('$var_trace_date','%m/%d/%Y'),
				IF('$var_hire_date' IS NULL OR '$var_hire_date' = '', NULL, STR_TO_DATE('$var_hire_date','%m/%d/%Y')),
				'$var_stat_before_id',
				'$var_stat_after_id',
				'$var_hired_improved_id',
				'$var_income_id',
				'$var_is_promo',
				'$var_is_increase',
				'$var_income_incr_pct');";

//Create and run the SQL.
if (!mysqli_query($mysqli,$query))
{
	$error=mysqli_error($mysqli);
	mysqli_close($mysqli);
	die('Error: ' . $error);
	exit;
}

mysqli_close($mysqli);
header("Location: gradprogemploy_view_all.php");
exit;

?>