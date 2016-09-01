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
$var_accreditation_id = NULL;
if (isset($_POST['var_accreditation_id']))
	$var_accreditation_id = mysql_entities_fix_string($mysqli, $_POST['var_accreditation_id']);
$var_accrediting_body_id = mysql_entities_fix_string($mysqli, $_POST['var_accrediting_body_id']);

// Check for duplicates existing in table
$query="SELECT	mfo1_formc_accreditation_id
		FROM tbl_sd_1_mfo1_formc_accreditation
		WHERE unit_delivery_id = '$unit_delivery_id' AND
			mfo1_forma_program_id = '$var_mfo1_forma_program_id' AND
			ref_accrediting_body_id = '$var_accrediting_body_id' AND
			('$var_accreditation_id' IS NULL OR tbl_sd_1_mfo1_formc_accreditation.mfo1_formc_accreditation_id <> '$var_accreditation_id');";
			
$record_set = $mysqli->query($query)->fetch_object();
if ($record_set)
{
	echo "<p>Found an existing record with the same Delivery Unit, Program and Accrediting Body.</p><p>This record not saved.</p>";
	mysqli_close($mysqli);
	exit;
}

$var_accreditable = mysql_entities_fix_string($mysqli, $_POST['var_accreditable']);
$var_accreditation_level_id = "";
if (isset($_POST['var_accreditation_level']))
	$var_accreditation_level_id = mysql_entities_fix_string($mysqli, $_POST['var_accreditation_level']);

$var_validity_start_date = "";
$var_validity_end_date = "";
if (isset($_POST['var_validity_start_date']))
	$var_validity_start_date = mysql_entities_fix_string($mysqli, $_POST['var_validity_start_date']);

if (isset($_POST['var_validity_end_date']))
	$var_validity_end_date = mysql_entities_fix_string($mysqli, $_POST['var_validity_end_date']);

$file_extname = ".pdf";
$var_attachmt1 = trim(mysql_entities_fix_string($mysqli, $_POST['var_attachmt1'])).$file_extname;
$var_attachmt2 = trim(mysql_entities_fix_string($mysqli, $_POST['var_attachmt2'])).$file_extname;

// Perform file uploads if valid
$path_name = "uploads/$cu_short_name";
$fileupload = true;

if (isset($_FILES['highed_accreditfile1']))
{
	if (!copyFiletoSrvr('highed_accreditfile1', $var_attachmt1, $path_name))
	{
		$var_attachmt1 = "";
		$fileupload = false;
	}
}
else
	$var_attachmt1 = "";

if (isset($_FILES['highed_accreditfile2']))
{
	if (!copyFiletoSrvr('highed_accreditfile2', $var_attachmt2, $path_name))
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
	if (isset($_POST['var_accreditation_id']))
	{
		$query = "UPDATE tbl_sd_1_mfo1_formc_accreditation
			SET
			unit_contributor_id = '$unit_contributor_id',
			unit_delivery_id = '$unit_delivery_id',
			focal_person_id = '$focal_person_id',
			cu_id = '$cu_id',
			cu_short_name = '$cu_short_name',
			unit_delivery_name_cu = '$unit_delivery_name_cu',
			unit_contributor_name = '$unit_contributor_name',
			mfo1_formc_accreditation_accreditable = '$var_accreditable',
			ref_accrediting_body_id = '$var_accrediting_body_id',
			ref_accreditation_level_id = IF('$var_accreditation_level_id' = '', NULL, '$var_accreditation_level_id'),
			mfo1_formc_accreditation_validity_start = IF('$var_validity_start_date' = '', NULL, STR_TO_DATE('$var_validity_start_date', '%m/%d/%Y')),
			mfo1_formc_accreditation_validity_end = IF('$var_validity_end_date' = '', NULL, STR_TO_DATE('$var_validity_end_date', '%m/%d/%Y')),
			mfo1_formc_accreditation_attachment = '$var_attachmt1',
			mfo1_formc_accreditation_levelscheme_attachment = '$var_attachmt2'
			WHERE mfo1_formc_accreditation_id = '$var_accreditation_id'";
		
	}
	else
		$query = "INSERT INTO tbl_sd_1_mfo1_formc_accreditation
			(mfo1_forma_program_id,
			unit_contributor_id,
			unit_delivery_id,
			focal_person_id,
			cu_id,
			cu_short_name,
			unit_delivery_name_cu,
			unit_contributor_name,
			mfo1_formc_accreditation_accreditable,
			ref_accrediting_body_id,
			ref_accreditation_level_id,
			mfo1_formc_accreditation_validity_start,
			mfo1_formc_accreditation_validity_end,
			mfo1_formc_accreditation_attachment,
			mfo1_formc_accreditation_levelscheme_attachment)
			VALUES
			('$var_mfo1_forma_program_id',
			'$unit_contributor_id',
			'$unit_delivery_id',
			'$focal_person_id',
			'$cu_id',
			'$cu_short_name',
			'$unit_delivery_name_cu',
			'$unit_contributor_name',
			'$var_accreditable',
			'$var_accrediting_body_id',
			IF('$var_accreditation_level_id' = '', NULL, '$var_accreditation_level_id'),
			IF('$var_validity_start_date' = '', NULL, STR_TO_DATE('$var_validity_start_date', '%m/%d/%Y')),
			IF('$var_validity_end_date' = '', NULL, STR_TO_DATE('$var_validity_end_date', '%m/%d/%Y')),
			'$var_attachmt1',
			'$var_attachmt2');";

	if (!mysqli_query($mysqli,$query))
	{
		$error=mysqli_error($mysqli);
		mysqli_close($mysqli);
		die('Error: ' . $error);
		exit;
	}

	mysqli_close($mysqli);
	header("Location: ugradprogaccredit_view_all.php");
	exit;
}
else
	echo "<p>Record not saved.</p>";

mysqli_close($mysqli);

?>
