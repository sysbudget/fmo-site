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

//Get ID of Header record
$var_mfo1_forma_program_id = mysql_entities_fix_string($mysqli, $_POST['var_mfo1_forma_program_id']);

//Get the form fields and sanitize.
$var_prc_id = NULL;
if (isset($_POST['var_prc_id']))
	$var_prc_id = mysql_entities_fix_string($mysqli, $_POST['var_prc_id']);
$var_ref_prc_id = mysql_entities_fix_string($mysqli, $_POST['var_ref_prc_id']);

// Check for duplicates existing in table
$query="SELECT	mfo1_formb_prc_id
		FROM tbl_sd_1_mfo1_formb_prc
		WHERE unit_delivery_id = '$unit_delivery_id' AND
			mfo1_forma_program_id = '$var_mfo1_forma_program_id' AND
			prc_id = '$var_ref_prc_id' AND
			('$var_prc_id' IS NULL OR tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_id <> '$var_prc_id');";
			
$record_set = $mysqli->query($query)->fetch_object();
if ($record_set)
{
	echo "<p>Found an existing record with the same Delivery Unit, Program and PRC Licensure Examination.</p><p>This record not saved.</p>";
	mysqli_close($mysqli);
	exit;
}

$var_up_1time_pass = 1*mysql_entities_fix_string($mysqli, $_POST['var_up_1time_pass']);
$var_up_1time_fail = 1*mysql_entities_fix_string($mysqli, $_POST['var_up_1time_fail']);
$var_up_1time_cond = 1*mysql_entities_fix_string($mysqli, $_POST['var_up_1time_cond']);

$var_up_repeat_pass = 1*mysql_entities_fix_string($mysqli, $_POST['var_up_repeat_pass']);
$var_up_repeat_fail = 1*mysql_entities_fix_string($mysqli, $_POST['var_up_repeat_fail']);
$var_up_repeat_cond = 1*mysql_entities_fix_string($mysqli, $_POST['var_up_repeat_cond']);

$var_srclink = trim(mysql_entities_fix_string($mysqli, $_POST['var_srclink']));

$file_extname = ".pdf";
$var_attachmt1 = trim(mysql_entities_fix_string($mysqli, $_POST['var_attachmt1'])).$file_extname;
$var_attachmt2 = trim(mysql_entities_fix_string($mysqli, $_POST['var_attachmt2'])).$file_extname;

// Perform file uploads if valid
$path_name = "uploads/$cu_short_name";
$fileupload = true;

if (isset($_FILES['highed_prcfile1']))
{
	if (!copyFiletoSrvr('highed_prcfile1', $var_attachmt1, $path_name))
	{
		$var_attachmt1 = "";
		$fileupload = false;
	}
}
else
	$var_attachmt1 = "";

if (isset($_FILES['highed_prcfile2']))
{
	if (!copyFiletoSrvr('highed_prcfile2', $var_attachmt2, $path_name))
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
	if (isset($_POST['var_prc_id']))
	{
		$query = "UPDATE tbl_sd_1_mfo1_formb_prc
			SET
				mfo1_forma_program_id = '$var_mfo1_forma_program_id',
				unit_contributor_id = '$unit_contributor_id',
				unit_delivery_id = '$unit_delivery_id',
				focal_person_id = '$focal_person_id',
				cu_id = '$cu_id',
				cu_short_name = '$cu_short_name',
				unit_delivery_name_cu = '$unit_delivery_name_cu',
				unit_contributor_name = '$unit_contributor_name',
				prc_id = '$var_ref_prc_id',
				mfo1_formb_prc_up_1st_time_takers_passers = '$var_up_1time_pass',
				mfo1_formb_prc_up_1st_time_takers_failed = '$var_up_1time_fail',
				mfo1_formb_prc_up_1st_time_takers_conditional = '$var_up_1time_cond',
				mfo1_formb_prc_up_repeaters_takers_passers = '$var_up_repeat_pass',
				mfo1_formb_prc_up_repeaters_takers_failed = '$var_up_repeat_fail',
				mfo1_formb_prc_up_repeaters_takers_conditional = '$var_up_repeat_cond',
				mfo1_formb_prc_source_link = '$var_srclink',
				mfo1_formb_prc_attachment = '$var_attachmt1',
				mfo1_formb_prc_attachment_on_discrepancy = '$var_attachmt2'
			WHERE mfo1_formb_prc_id = '$var_prc_id'";
	}
	else
		$query = "INSERT INTO tbl_sd_1_mfo1_formb_prc
			(	mfo1_forma_program_id,
				unit_contributor_id,
				unit_delivery_id,
				focal_person_id,
				cu_id,
				cu_short_name,
				unit_delivery_name_cu,
				unit_contributor_name,
				prc_id,
				mfo1_formb_prc_up_1st_time_takers_passers,
				mfo1_formb_prc_up_1st_time_takers_failed,
				mfo1_formb_prc_up_1st_time_takers_conditional,
				mfo1_formb_prc_up_repeaters_takers_passers,
				mfo1_formb_prc_up_repeaters_takers_failed,
				mfo1_formb_prc_up_repeaters_takers_conditional,
				mfo1_formb_prc_source_link,
				mfo1_formb_prc_attachment,
				mfo1_formb_prc_attachment_on_discrepancy
			)
			VALUES (
				'$var_mfo1_forma_program_id',
				'$unit_contributor_id',
				'$unit_delivery_id',
				'$focal_person_id',
				'$cu_id',
				'$cu_short_name',
				'$unit_delivery_name_cu',
				'$unit_contributor_name',
				'$var_ref_prc_id',
				'$var_up_1time_pass',
				'$var_up_1time_fail',
				'$var_up_1time_cond',
				'$var_up_repeat_pass',
				'$var_up_repeat_fail',
				'$var_up_repeat_cond',
				'$var_srclink',
				'$var_attachmt1',
				'$var_attachmt2' );";

	if (!mysqli_query($mysqli,$query))
	{
		$error=mysqli_error($mysqli);
		mysqli_close($mysqli);
		die('Error: ' . $error);
		exit;
	}

	mysqli_close($mysqli);
	header("Location: prc_view_all.php");
	exit;
}
else
	echo "<p>Record not saved.</p>";

mysqli_close($mysqli);

?>
