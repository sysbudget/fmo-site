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

//get session values
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

// upload: Generate sample filename
include_once('ugradprog_setnames.php');
	
//Retrieve data and initialize array of variables for Program Level dropdown
$query1 = $mysqli->query("SELECT ref_program_level_id, ref_program_level_name FROM tbl_sd_ref_program_level WHERE ref_program_level_edu_level_name='Undergraduate' ORDER BY ref_program_level_id");

// Create an array of objects for each returned row
// Loop while fetch_object returns a valid row
while ( $array1[] = $query1->fetch_object() );
// Remove the blank entry at end of array
array_pop($array1);

//Free result set and close connection 
$query1->close();
$mysqli->close();

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

<!-- include the next Javascript files -->
<script src="../validfn-mfo1.js"></script>
<script src="validfn-ugradprog.js"></script>

</head>
<body>

    <div class="viewbody">
    <h2>MFO 1: Undergraduate Degree Program - Input Form</h2>
    <div class="viewlinks"><p><a href="ugradprog_view_all.php">View All Records</a></p></div>
    <hr/>

    <!-- Edit form here -->
    <form name="ugradprogInputForm" id="ugradprogInputForm" action="ugradprog_insert_update.php" method="post" onsubmit="return isValidForm()" enctype="multipart/form-data">

		<?php include_once('ugradprog_table.php'); ?>
    
		<br>
		<div align="left">
			<!-- <input type="reset" value="Clear"> -->
			<input type="submit" value="Submit" >
		</div>
	</form>

	</div>
</body>
</html>