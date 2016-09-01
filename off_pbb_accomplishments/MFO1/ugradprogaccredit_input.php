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

if ( isset($_GET['id']) && $_GET['id'] != "")
{
	// connect to the database
	include_once('../connect-db.php');

	// Get the value of the form fields
	$var_prog = $_GET['id'];

	$record_set = $mysqli->query("SELECT tbl_sd_1_mfo1_forma_program.mfo1_forma_program_id, tbl_sd_1_mfo1_forma_program.mfo1_forma_program_name, tbl_sd_1_mfo1_forma_program.mfo1_forma_program_priority, tbl_sd_1_mfo1_forma_program.mfo1_forma_program_mandated FROM tbl_sd_1_mfo1_forma_program WHERE tbl_sd_1_mfo1_forma_program.unit_contributor_id='$unit_contributor_id' AND tbl_sd_1_mfo1_forma_program.mfo1_forma_program_id='$var_prog';")->fetch_object();

	if ($record_set)
	{
		// set form variables to values in the retrieved row
		$var_mfo1_forma_program_id = $record_set->mfo1_forma_program_id;
		$var_mfo1_forma_program_name = $record_set->mfo1_forma_program_name;
		$var_9500_priority = $record_set->mfo1_forma_program_priority;
		$var_9500_mandated = $record_set->mfo1_forma_program_mandated;

		// upload: Generate sample filename
		include_once('ugradprogaccredit_setnames.php');
			
		//Retrieve data and initialize array of variables for Accrediting Body dropdown
		$query1 = $mysqli->query("SELECT tbl_sd_ref_accrediting_body.ref_accrediting_body_id, tbl_sd_ref_accrediting_body.ref_accrediting_body_name FROM tbl_sd_ref_accrediting_body WHERE tbl_sd_ref_accrediting_body.ref_accreditation_classification_id IS NOT NULL AND NOT (tbl_sd_ref_accrediting_body.ref_accrediting_body_id = 1) ORDER BY tbl_sd_ref_accrediting_body.ref_accrediting_body_name;");

		//Create an array of objects for each returned row
		while( $array2[] = $query1->fetch_object() );
		//Remove the blank entry at end of array
		array_pop($array2);

		//Retrieve data and initialize array of variables for Accreditation Level dropdown
		$query1 = $mysqli->query("SELECT tbl_sd_ref_accreditation_level.ref_accreditation_level_id, tbl_sd_ref_accreditation_level.ref_accreditation_level_name FROM tbl_sd_ref_accreditation_level ORDER BY tbl_sd_ref_accreditation_level.ref_accreditation_level_id;");

		//Create an array of objects for each returned row
		while( $array3[] = $query1->fetch_object() );
		//Remove the blank entry at end of array
		array_pop($array3);
		
		$query1->close();
		$mysqli->close();
	}
	else
	{
		$mysqli->close();
		header('Location: ugradprogaccredit_view_use_all.php');
		exit;
	}
}
else
{
	// Error in URL parameter passed
	header('Location: ugradprogaccredit_view_use_all.php');
	exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Record</title>

<style>
body {margin:1; font-family:Calibri; font-size:14px;}
</style>

<link rel="stylesheet" href="../includes/jquery-ui.css" />
<script src="../includes/jquery-1.9.1.js"></script>
<script src="../includes/jquery-ui.js"></script>

<script src="../validfn-mfo1.js"></script>
<script src="validfn-ugradprogaccredit.js"></script>

</head>

<body>
    <div class="viewbody">
    <h2>MFO 1: Program Accreditation - Input New Record</h2>
    <div class="viewlinks"><p><a href="ugradprogaccredit_view_all.php">View All Records</a></p></div>
	<hr/>

    <!-- Edit form here -->
    <form name="ugradprogaccreditInputForm" id="ugradprogaccreditInputForm" action="ugradprogaccredit_insert_update.php" method="post" onsubmit="return isValidForm()" enctype="multipart/form-data">
	
		<?php include_once("ugradprogaccredit_table.php"); ?>
		
        <br>
        <div align="left">
			<!-- <input type="reset" value="Clear"> -->
			<input type="submit" value="Submit" >
        </div>
	</form>

	</div>
</body>
</html>