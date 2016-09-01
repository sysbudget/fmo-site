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
$var_forma_program_id = mysql_entities_fix_string($mysqli, $_POST['var_mfo2_forma_program_id']);
$var_survey_date = mysql_entities_fix_string($mysqli, $_POST['var_survey_date']);
$var_survey_mode = mysql_entities_fix_string($mysqli, $_POST['var_survey_mode']);
$var_enrollment = 1*mysql_entities_fix_string($mysqli, $_POST['var_enrollment']);
$var_no_answer = 1*mysql_entities_fix_string($mysqli, $_POST['var_no_answer']);
$var_bad_rating = 1*mysql_entities_fix_string($mysqli, $_POST['var_bad_rating']);
$var_fair_rating = 1*mysql_entities_fix_string($mysqli, $_POST['var_fair_rating']);
$var_good_rating = 1*mysql_entities_fix_string($mysqli, $_POST['var_good_rating']);
$var_better_rating = 1*mysql_entities_fix_string($mysqli, $_POST['var_better_rating']);
$var_best_rating = 1*mysql_entities_fix_string($mysqli, $_POST['var_best_rating']);

$file_extname = ".pdf";
$var_attachmt1 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt1']).$file_extname;
$var_attachmt2 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt2']).$file_extname;
	
// Perform file uploads if valid
$path_name = "uploads/$cu_short_name";
$fileupload = true;

if (isset($_FILES['adved_surveyfile1']))
{
	if (!copyFiletoSrvr('adved_surveyfile1', $var_attachmt1, $path_name))
	{
		$var_attachmt1 = "";
		$fileupload = false;
	}
}
else
	$var_attachmt1 = "";

if (isset($_FILES['adved_surveyfile2']))
{
	if (!copyFiletoSrvr('adved_surveyfile2', $var_attachmt2, $path_name))
	{
		$var_attachmt2 = "";
		$fileupload = false;
	}
}
else
	$var_attachmt2 = "";

if ($fileupload)
{
	//If the ID for a particular Record has been passed as parameter by the calling program, then execute an SQL Update to save the Record fields.
	//Otherwise, execute an SQL Insert to add a new Record.
	if (isset($_POST['var_timeliness_id']))
	{
		$var_timeliness_id = mysql_entities_fix_string($mysqli, $_POST['var_timeliness_id']);
		$query="UPDATE tbl_sd_2_mfo2_forme_timeliness
				SET
					mfo2_forma_program_id = '$var_forma_program_id',
					unit_contributor_id = '$unit_contributor_id',
					unit_delivery_id = '$unit_delivery_id',
					focal_person_id ='$focal_person_id',
					cu_id = '$cu_id',
					cu_short_name = '$cu_short_name',
					unit_delivery_name_cu = '$unit_delivery_name_cu',
					unit_contributor_name = '$unit_contributor_name',
					mfo2_forme_timeliness_survey_date = STR_TO_DATE('$var_survey_date','%m/%d/%Y'),
					mfo2_forme_timeliness_survey_mode = '$var_survey_mode',
					mfo2_forme_timeliness_enrollment = '$var_enrollment',
					mfo2_forme_timeliness_respondents_with_no_answer = '$var_no_answer',
					mfo2_forme_timeliness_respondents_with_bad_rating = '$var_bad_rating',
					mfo2_forme_timeliness_respondents_with_fair_rating = '$var_fair_rating',
					mfo2_forme_timeliness_respondents_with_good_rating = '$var_good_rating',
					mfo2_forme_timeliness_respondents_with_better_rating = '$var_better_rating',
					mfo2_forme_timeliness_respondents_with_best_rating = '$var_best_rating',
					mfo2_forme_timeliness_attachment_survey_tally_sheet = '$var_attachmt1',
					mfo2_forme_timeliness_attachment_survey_sample = '$var_attachmt2'
				WHERE mfo2_forme_timeliness_id = '$var_timeliness_id';";
	}
	else
		$query="INSERT INTO tbl_sd_2_mfo2_forme_timeliness
				(mfo2_forma_program_id,
				unit_contributor_id,
				unit_delivery_id,
				focal_person_id,
				cu_id,
				cu_short_name,
				unit_delivery_name_cu,
				unit_contributor_name,
				mfo2_forme_timeliness_survey_date,
				mfo2_forme_timeliness_survey_mode,
				mfo2_forme_timeliness_enrollment,
				mfo2_forme_timeliness_respondents_with_no_answer,
				mfo2_forme_timeliness_respondents_with_bad_rating,
				mfo2_forme_timeliness_respondents_with_fair_rating,
				mfo2_forme_timeliness_respondents_with_good_rating,
				mfo2_forme_timeliness_respondents_with_better_rating,
				mfo2_forme_timeliness_respondents_with_best_rating,
				mfo2_forme_timeliness_attachment_survey_tally_sheet,
				mfo2_forme_timeliness_attachment_survey_sample)
				VALUES
				(	'$var_forma_program_id',
					'$unit_contributor_id',
					'$unit_delivery_id',
					'$focal_person_id',
					'$cu_id',
					'$cu_short_name',
					'$unit_delivery_name_cu',
					'$unit_contributor_name',
					STR_TO_DATE('$var_survey_date','%m/%d/%Y'),
					'$var_survey_mode',
					'$var_enrollment',
					'$var_no_answer',
					'$var_bad_rating',
					'$var_fair_rating',
					'$var_good_rating',
					'$var_better_rating',
					'$var_best_rating',
					'$var_attachmt1',
					'$var_attachmt2' );";

	//Create and run the SQL.
	if (!mysqli_query($mysqli,$query))
	{
		$error=mysqli_error($mysqli);
		mysqli_close($mysqli);
		die('Error: ' . $error);
		exit;
	}
	
	mysqli_close($mysqli);
	header("Location: gradprogtimely_view_all.php");
	exit;
}
else
	echo "<p>Record not saved.</p>";

mysqli_close($mysqli);

?>