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

//Get the form fields and sanitize
$var_prog_id = NULL;
if (isset($_POST['var_prog_id']))
	$var_prog_id = mysql_entities_fix_string($mysqli, $_POST['var_prog_id']);
$var_prog_lev_id = mysql_entities_fix_string($mysqli, $_POST['var_prog_lev_id']);
$var_prog_name = trim(mysql_entities_fix_string($mysqli, $_POST['var_prog_name']));

// Check for duplicate Program Name existing in table
if ($var_prog_name != "")
{
	$query="SELECT	mfo2_forma_program_name,
					mfo2_forma_program_id
			FROM tbl_sd_2_mfo2_forma_program
			WHERE mfo2_forma_program_name LIKE '$var_prog_name' AND
				unit_delivery_id = '$unit_delivery_id' AND
				('$var_prog_id' IS NULL OR mfo2_forma_program_id <> '$var_prog_id');";
	$record_set = $mysqli->query($query)->fetch_object();
	if ($record_set)
	{
		echo "<p>Found an existing record with the same Delivery Unit and Program Name: " . $record_set->mfo2_forma_program_name . ".</p><p>This record not saved.</p>";
		mysqli_close($mysqli);
		exit;
	}
}

$var_len_yrs = 1*mysql_entities_fix_string($mysqli, $_POST['var_len_yrs']);
$var_9500_priority = mysql_entities_fix_string($mysqli, $_POST['var_9500_priority']);
$var_9500_mandated = mysql_entities_fix_string($mysqli, $_POST['var_9500_mandated']);
$var_9500_accreditable = mysql_entities_fix_string($mysqli, $_POST['var_9500_accreditable']);
$var_9500_accredit_body = mysql_entities_fix_string($mysqli, $_POST['var_9500_accredit_body']);
$var_9500_accredit_lev = mysql_entities_fix_string($mysqli, $_POST['var_9500_accredit_lev']);
$var_bor_mtg_no = trim(mysql_entities_fix_string($mysqli, $_POST['var_bor_mtg_no']));
$var_bor_mtg_date = trim(mysql_entities_fix_string($mysqli, $_POST['var_bor_mtg_date']));
$var_enrollmt = 1*mysql_entities_fix_string($mysqli, $_POST['var_enrollmt']);
$var_q1_grad_total = 1*mysql_entities_fix_string($mysqli, $_POST['var_q1_grad_total']);
$var_q2_grad_total = 1*mysql_entities_fix_string($mysqli, $_POST['var_q2_grad_total']);
$var_q3_grad_total = 1*mysql_entities_fix_string($mysqli, $_POST['var_q3_grad_total']);
$var_q4_grad_total = 1*mysql_entities_fix_string($mysqli, $_POST['var_q4_grad_total']);

$file_extname = ".pdf";
$var_attachmt1 = trim(mysql_entities_fix_string($mysqli, $_POST['var_attachmt1'])).$file_extname;
$var_attachmt2 = trim(mysql_entities_fix_string($mysqli, $_POST['var_attachmt2'])).$file_extname;
$var_attachmt3 = trim(mysql_entities_fix_string($mysqli, $_POST['var_attachmt3'])).$file_extname;
$var_attachmt4 = trim(mysql_entities_fix_string($mysqli, $_POST['var_attachmt4'])).$file_extname;

// Perform file uploads if valid
$path_name = "uploads/$cu_short_name";
$fileupload = true;

if ($var_q1_grad_total > 0)
{
	if (!copyFiletoSrvr('adved_gradfile1', $var_attachmt1, $path_name))
	{
		$var_attachmt1 = "";
		$var_q1_grad_total = 0;
		$var_q1_grad_intime = 0;
		$fileupload = false;
	}
}
else $var_attachmt1 = "";

if ($var_q2_grad_total > 0)
{	
	if (!copyFiletoSrvr('adved_gradfile2', $var_attachmt2, $path_name))
	{
		$var_attachmt2 = "";
		$var_q2_grad_total = 0;
		$var_q2_grad_intime = 0;
		$fileupload = false;
	}
}
else $var_attachmt2 = "";

if ($var_q3_grad_total > 0)
{	
	if (!copyFiletoSrvr('adved_gradfile3', $var_attachmt3, $path_name))
	{
		$var_attachmt3 = "";
		$var_q3_grad_total = 0;
		$var_q3_grad_intime = 0;
		$fileupload = false;
	}
}
else $var_attachmt3 = "";

if ($var_q4_grad_total > 0)
{	
	if (!copyFiletoSrvr('adved_gradfile4', $var_attachmt4, $path_name))
	{
		$var_attachmt4 = "";
		$var_q4_grad_total = 0;
		$var_q4_grad_intime = 0;
		$fileupload = false;
	}
}
else $var_attachmt4 = "";

if ($fileupload)
{
	//If the ID for a particular Record has been passed as parameter by the calling program, then execute an SQL Update to save the Record fields.
	//Otherwise, execute an SQL Insert to add a new Record.
	if (isset($_POST['var_prog_id']))
	{
		$query = "UPDATE tbl_sd_2_mfo2_forma_program
			SET
			unit_contributor_id = '$unit_contributor_id',
			unit_delivery_id = '$unit_delivery_id',
			focal_person_id = '$focal_person_id',
			cu_id = '$cu_id',
			cu_short_name = '$cu_short_name',
			unit_delivery_name_cu = '$unit_delivery_name_cu',
			unit_contributor_name = '$unit_contributor_name',
			ref_program_level_id = '$var_prog_lev_id',
			mfo2_forma_program_name = '$var_prog_name',
			mfo2_forma_program_normal_length = '$var_len_yrs',
			mfo2_forma_program_priority = '$var_9500_priority',
			mfo2_forma_program_mandated = '$var_9500_mandated', 
			mfo2_forma_program_ra_9500_bor_accreditable = '$var_9500_accreditable',
			mfo2_forma_program_ra_9500_bor_accrediting_body = '$var_9500_accredit_body',
			mfo2_forma_program_ra_9500_bor_accreditation_level = '$var_9500_accredit_lev',
			mfo2_forma_program_ra_9500_bor_approval_meeting_no = '$var_bor_mtg_no',
			mfo2_forma_program_ra_9500_bor_approval_meeting_date = STR_TO_DATE('$var_bor_mtg_date','%m/%d/%Y'),
			mfo2_forma_program_ra_9500_bor_validity = IF('$var_bor_mtg_date' IS NOT NULL, CONCAT('$var_bor_mtg_date',' to present'), ''),
			mfo2_forma_program_enrollment_in_terminal_year = '$var_enrollmt',
			mfo2_forma_program_graduates_qtr1 = '$var_q1_grad_total',
			mfo2_forma_program_graduates_qtr1_attachment = '$var_attachmt1',
			mfo2_forma_program_graduates_qtr2 = '$var_q2_grad_total',
			mfo2_forma_program_graduates_qtr2_attachment = '$var_attachmt2',
			mfo2_forma_program_graduates_qtr3 = '$var_q3_grad_total',
			mfo2_forma_program_graduates_qtr3_attachment = '$var_attachmt3',
			mfo2_forma_program_graduates_qtr4 = '$var_q4_grad_total',
			mfo2_forma_program_graduates_qtr4_attachment = '$var_attachmt4'
			WHERE mfo2_forma_program_id = '$var_prog_id';";
	}
	else
		$query = "INSERT INTO tbl_sd_2_mfo2_forma_program
			(unit_contributor_id,
			unit_delivery_id,
			focal_person_id,
			cu_id,
			cu_short_name,
			unit_delivery_name_cu,
			unit_contributor_name,
			ref_program_level_id,
			mfo2_forma_program_name,
			mfo2_forma_program_normal_length,
			mfo2_forma_program_priority,
			mfo2_forma_program_mandated,
			mfo2_forma_program_ra_9500_bor_accreditable,
			mfo2_forma_program_ra_9500_bor_accrediting_body,
			mfo2_forma_program_ra_9500_bor_accreditation_level,
			mfo2_forma_program_ra_9500_bor_approval_meeting_no,
			mfo2_forma_program_ra_9500_bor_approval_meeting_date,
			mfo2_forma_program_ra_9500_bor_validity,
			mfo2_forma_program_enrollment_in_terminal_year,
			mfo2_forma_program_graduates_qtr1,
			mfo2_forma_program_graduates_qtr1_attachment,
			mfo2_forma_program_graduates_qtr2,
			mfo2_forma_program_graduates_qtr2_attachment,
			mfo2_forma_program_graduates_qtr3,
			mfo2_forma_program_graduates_qtr3_attachment,
			mfo2_forma_program_graduates_qtr4,
			mfo2_forma_program_graduates_qtr4_attachment
			) VALUES (
			'$unit_contributor_id',
			'$unit_delivery_id',
			'$focal_person_id',
			'$cu_id',
			'$cu_short_name',
			'$unit_delivery_name_cu',
			'$unit_contributor_name',
			'$var_prog_lev_id',
			'$var_prog_name',
			'$var_len_yrs',
			'$var_9500_priority',
			'$var_9500_mandated',
			'$var_9500_accreditable',
			'$var_9500_accredit_body',
			'$var_9500_accredit_lev',
			'$var_bor_mtg_no',
			STR_TO_DATE('$var_bor_mtg_date','%m/%d/%Y'),
			IF('$var_bor_mtg_date' IS NOT NULL, CONCAT('$var_bor_mtg_date',' to present'), ''),
			'$var_enrollmt',
			'$var_q1_grad_total',
			'$var_attachmt1',
			'$var_q2_grad_total',
			'$var_attachmt2',
			'$var_q3_grad_total',
			'$var_attachmt3',
			'$var_q4_grad_total',
			'$var_attachmt4');";

	if (!mysqli_query($mysqli, $query))
	{
		$error=mysqli_error($mysqli);
		mysqli_close($mysqli);
		die('Error: ' . $error);
		exit;
	}
	
	mysqli_close($mysqli);
	header("Location: gradprog_view_all.php");
	exit;
}
else
	echo "<p>Record not saved.</p>";

mysqli_close($mysqli);

?>
