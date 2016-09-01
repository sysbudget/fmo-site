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
if ( !isset($_GET['id']) || !is_numeric($_GET['id']) )
{
	header('Location: ugradprog_view_all.php');
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
$unit_delivery_name_short = $_SESSION['unit_delivery_name_short'];
$unit_contributor_name_short = $_SESSION['unit_contributor_name_short'];

// connect to the database
include_once('../connect-db.php');

// get the id from the url
$var_id = $_GET['id'];

// retrieve the record with such id
$query = "SELECT * FROM tbl_sd_1_mfo1_forma_program WHERE mfo1_forma_program_id = '$var_id';";
$record_set = $mysqli->query($query)->fetch_object();

if ($record_set)
{
		$file_extname = ".pdf";
		
		// set form variables to values in the retrieved row
		$mfo1_forma_program_id = $record_set->mfo1_forma_program_id;
		$ref_program_level_id = $record_set->ref_program_level_id;
		$ref_program_level_name = $record_set->ref_program_level_name;
		$mfo1_forma_program_name = $record_set->mfo1_forma_program_name;
		$mfo1_forma_program_normal_length = $record_set->mfo1_forma_program_normal_length; 
		$mfo1_forma_program_ra_9500_bor_approval_meeting_no = $record_set->mfo1_forma_program_ra_9500_bor_approval_meeting_no;
		$mfo1_forma_program_ra_9500_bor_approval_meeting_date = strtotime($record_set->mfo1_forma_program_ra_9500_bor_approval_meeting_date);
		$mfo1_forma_program_ra_9500_bor_validity = $record_set->mfo1_forma_program_ra_9500_bor_validity;
		$mfo1_forma_program_enrollment_in_terminal_year = $record_set->mfo1_forma_program_enrollment_in_terminal_year;
		$mfo1_forma_program_graduates_qtr1 = $record_set->mfo1_forma_program_graduates_qtr1;
		$mfo1_forma_program_graduates_qtr1_within_timeframe = $record_set->mfo1_forma_program_graduates_qtr1_within_timeframe;
		$mfo1_forma_program_graduates_qtr1_attachment = str_ireplace($file_extname, "", $record_set->mfo1_forma_program_graduates_qtr1_attachment);
		$mfo1_forma_program_graduates_qtr2 = $record_set->mfo1_forma_program_graduates_qtr2;
		$mfo1_forma_program_graduates_qtr2_within_timeframe = $record_set->mfo1_forma_program_graduates_qtr2_within_timeframe;
		$mfo1_forma_program_graduates_qtr2_attachment = str_ireplace($file_extname, "", $record_set->mfo1_forma_program_graduates_qtr2_attachment);
		$mfo1_forma_program_graduates_qtr3 = $record_set->mfo1_forma_program_graduates_qtr3;
		$mfo1_forma_program_graduates_qtr3_within_timeframe = $record_set->mfo1_forma_program_graduates_qtr3_within_timeframe;
		$mfo1_forma_program_graduates_qtr3_attachment = str_ireplace($file_extname, "", $record_set->mfo1_forma_program_graduates_qtr3_attachment);
		$mfo1_forma_program_graduates_qtr4 = $record_set->mfo1_forma_program_graduates_qtr4;
		$mfo1_forma_program_graduates_qtr4_within_timeframe = $record_set->mfo1_forma_program_graduates_qtr4_within_timeframe;
		$mfo1_forma_program_graduates_qtr4_attachment = str_ireplace($file_extname, "", $record_set->mfo1_forma_program_graduates_qtr4_attachment);
		$mfo1_forma_program_graduates_total = $record_set->mfo1_forma_program_graduates_total;
		$mfo1_forma_program_graduates_total_within_timeframe = $record_set->mfo1_forma_program_graduates_total_within_timeframe;
		$mfo1_forma_program_curriculum_attachment = str_ireplace($file_extname, "", $record_set->mfo1_forma_program_curriculum_attachment);
		$mfo1_forma_program_with_board = $record_set->mfo1_forma_program_with_board;

		// upload: Generate sample filename
		include_once('ugradprog_setnames.php');
		
		//Retrieve data and initialize array of variables for Program Level dropdown menu selection
		$query1 = $mysqli->query("SELECT ref_program_level_id, ref_program_level_name FROM tbl_sd_ref_program_level WHERE ref_program_level_edu_level_name='Undergraduate' ORDER BY ref_program_level_id");

		// Create an array of objects for each returned row
		// Loop while fetch_object returns a valid row
		while ($array1[] = $query1->fetch_object());
		
		//Remove the blank entry at end of array
		array_pop($array1);

		$query1->close();
		$mysqli->close();
}
else
{
	$mysqli->close();
	header('Location: ugradprog_view_all.php');
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
<script src="validfn-ugradprog.js"></script>

</head>
<body>

	<div class="viewbody">
	<h2>MFO 1: Undergraduate Degree Program - Edit Record</h2>
	<div class="viewlinks"><p><a href="ugradprog_view_all.php">View All Records</a></p></div>
	<hr/>

	<!-- Edit form here -->
	<form name="ugradprogEditForm" id="ugradprogEditForm" method="post" action="ugradprog_insert_update.php" onsubmit="return isValidForm()" enctype="multipart/form-data">

		<?php include_once('ugradprog_table.php'); ?>
		
		<br>
		<div align="left">
			<!-- <input type="reset" value="Clear"> -->
			<input type="hidden" name="var_prog_id" value="<?php if (isset($mfo1_forma_program_id)) echo $mfo1_forma_program_id; ?>"><button type="submit">Submit</button>
		</div>
	</form>
    
	</div>
</body>
</html>