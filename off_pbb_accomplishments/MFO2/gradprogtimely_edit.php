<?php

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
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) 
{
	header('Location: gradprogtimely_view_all.php');
	exit;
}

// get session values
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
$unit_delivery_name_short = $_SESSION['unit_delivery_name_short'];
$unit_contributor_name_short = $_SESSION['unit_contributor_name_short'];

// get the id from the url
$var_id = $_GET['id'];

// connect to the database
include_once('../connect-db.php');

// retrieve the record with such id
$query = "SELECT tbl_sd_2_mfo2_forme_timeliness.*,
		tbl_sd_2_mfo2_forma_program.mfo2_forma_program_name AS header_program_name
	FROM tbl_sd_2_mfo2_forme_timeliness INNER JOIN tbl_sd_2_mfo2_forma_program
	ON tbl_sd_2_mfo2_forme_timeliness.mfo2_forma_program_id = tbl_sd_2_mfo2_forma_program.mfo2_forma_program_id
	WHERE tbl_sd_2_mfo2_forme_timeliness.unit_contributor_id = tbl_sd_2_mfo2_forma_program.unit_contributor_id
		AND tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_id='$var_id';";

$record_set = $mysqli->query($query)->fetch_object();

if ($record_set)
{
		$file_extname = ".pdf";
		
		// set form variables to values in the retrieved row
		$var_timeliness_id = $record_set->mfo2_forme_timeliness_id;
		$var_mfo2_forma_program_id = $record_set->mfo2_forma_program_id;
		$var_mfo2_forma_program_name = $record_set->header_program_name;
		$var_survey_date = strtotime($record_set->mfo2_forme_timeliness_survey_date);
		$var_survey_mode = $record_set->mfo2_forme_timeliness_survey_mode;
		$var_enrollment = $record_set->mfo2_forme_timeliness_enrollment;
		$var_respondents = $record_set->mfo2_forme_timeliness_respondents;
		$var_no_answer = $record_set->mfo2_forme_timeliness_respondents_with_no_answer;
		$var_bad_rating = $record_set->mfo2_forme_timeliness_respondents_with_bad_rating;
		$var_fair_rating = $record_set->mfo2_forme_timeliness_respondents_with_fair_rating;
		$var_good_rating = $record_set->mfo2_forme_timeliness_respondents_with_good_rating;
		$var_better_rating = $record_set->mfo2_forme_timeliness_respondents_with_better_rating;
		$var_best_rating = $record_set->mfo2_forme_timeliness_respondents_with_best_rating;
		$var_good_or_better = $record_set->mfo2_forme_timeliness_respondents_with_good_or_better;
		$var_attachmt1 = str_ireplace($file_extname, '', $record_set->mfo2_forme_timeliness_attachment_survey_tally_sheet);
		$var_attachmt2 = str_ireplace($file_extname, '', $record_set->mfo2_forme_timeliness_attachment_survey_sample);
		
		// upload: Generate sample filename
		include_once('gradprogtimely_setnames.php');
		
		$mysqli->close();
}
else
{
	$mysqli->close();
	header('Location: gradprogtimely_view_all.php');
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

<script src="../validfn-mfo1.js"></script>
<script src="validfn-gradprogtimely.js"></script>

</head>

<body>

    <div class="viewbody">
    <h2>MFO 2: Timeliness of Education Service Delivery - Edit Record</h2>
    <div class="viewlinks"><p><a href="gradprogtimely_view_all.php">View All Records</a></p></div>
	<hr/>

    <!-- Edit form here -->
	<form name="timelinessEditForm" id="timelinessEditForm" action="gradprogtimely_insert_update.php" method="post" onsubmit="return isValidForm()" enctype="multipart/form-data">
    
		<?php include_once('gradprogtimely_table.php') ?>

		<br>
        <div align="left">
            <!-- <input type="reset" value="Clear"> -->
            <input type="hidden" name="var_timeliness_id" value="<?php if (isset($var_timeliness_id)) echo $var_timeliness_id; ?>"><button type="submit">Submit</button>
        </div>
	</form>

	</div>
</body>
</html>