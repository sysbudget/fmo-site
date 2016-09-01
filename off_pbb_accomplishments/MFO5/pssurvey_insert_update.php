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
if (!isset($_POST['var_pss_id']))
{
	$query = "SELECT tbl_units_contributor.unit_contributor_name
			FROM tbl_sd_5_mfo5_7_rate_of_hospital_services INNER JOIN tbl_units_contributor
				ON tbl_sd_5_mfo5_7_rate_of_hospital_services.unit_contributor_id = tbl_units_contributor.unit_contributor_id
			WHERE tbl_units_contributor.unit_contributor_id = '$var_unit_contributor_id';";
	$record_set = $mysqli->query($query)->fetch_object();
	if ($record_set)
	{
		echo "<p>An existing record was found in the table already for " . $record_set->unit_contributor_name . ".</p><p>This record not saved.</p>";
		mysqli_close($mysqli);
		exit;
	}
}

$file_extname = ".pdf";

$var_clients_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_clients_01count']);
$var_satisfactorybetter_01count = 1*mysql_entities_fix_string($mysqli, $_POST['var_satisfactorybetter_01count']);

$var_clients_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_clients_02count']);
$var_satisfactorybetter_02count = 1*mysql_entities_fix_string($mysqli, $_POST['var_satisfactorybetter_02count']);

$var_clients_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_clients_03count']);;
$var_satisfactorybetter_03count = 1*mysql_entities_fix_string($mysqli, $_POST['var_satisfactorybetter_03count']);

$var_clients_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_clients_04count']);
$var_satisfactorybetter_04count = 1*mysql_entities_fix_string($mysqli, $_POST['var_satisfactorybetter_04count']);

$var_clients_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_clients_05count']);;
$var_satisfactorybetter_05count = 1*mysql_entities_fix_string($mysqli, $_POST['var_satisfactorybetter_05count']);

$var_clients_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_clients_06count']);
$var_satisfactorybetter_06count = 1*mysql_entities_fix_string($mysqli, $_POST['var_satisfactorybetter_06count']);

$var_clients_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_clients_07count']);
$var_satisfactorybetter_07count = 1*mysql_entities_fix_string($mysqli, $_POST['var_satisfactorybetter_07count']);

$var_clients_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_clients_08count']);
$var_satisfactorybetter_08count = 1*mysql_entities_fix_string($mysqli, $_POST['var_satisfactorybetter_08count']);

$var_clients_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_clients_09count']);
$var_satisfactorybetter_09count = 1*mysql_entities_fix_string($mysqli, $_POST['var_satisfactorybetter_09count']);

$var_clients_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_clients_10count']);
$var_satisfactorybetter_10count = 1*mysql_entities_fix_string($mysqli, $_POST['var_satisfactorybetter_10count']);

$var_clients_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_clients_11count']);
$var_satisfactorybetter_11count = 1*mysql_entities_fix_string($mysqli, $_POST['var_satisfactorybetter_11count']);

$var_clients_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_clients_12count']);
$var_satisfactorybetter_12count = 1*mysql_entities_fix_string($mysqli, $_POST['var_satisfactorybetter_12count']);

$var_attachmt1 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt1']).$file_extname;
$var_attachmt2 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt2']).$file_extname;
$var_attachmt3 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt3']).$file_extname;
$var_attachmt4 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt4']).$file_extname;
$var_attachmt5 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt5']).$file_extname;
$var_attachmt6 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt6']).$file_extname;
$var_attachmt7 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt7']).$file_extname;
$var_attachmt8 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt8']).$file_extname;
$var_attachmt9 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt9']).$file_extname;
$var_attachmt10 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt10']).$file_extname;
$var_attachmt11 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt11']).$file_extname;
$var_attachmt12 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt12']).$file_extname;
$var_attachmt13 = mysql_entities_fix_string($mysqli, $_POST['var_attachmt13']).$file_extname;

// Perform file uploads if valid
$path_name = "uploads/$cu_short_name";
$fileupload = true;

// Jan
if ($var_clients_01count > 0)
{
	if (!copyFiletoSrvr('hosp_surveyfile1', $var_attachmt1, $path_name))
	{
		$var_attachmt1 = "";
		$var_clients_01count = 0;
		$var_satisfactorybetter_01count = 0;
		$fileupload = false;
	}
}
else $var_attachmt1 = "";

// Feb
if ($var_clients_02count > 0)
{
	if (!copyFiletoSrvr('hosp_surveyfile2', $var_attachmt2, $path_name))
	{
		$var_attachmt2 = "";
		$var_clients_02count = 0;
		$var_satisfactorybetter_02count = 0;
		$fileupload = false;
	}
}
else $var_attachmt2 = "";

// Mar
if ($var_clients_03count > 0)
{
	if (!copyFiletoSrvr('hosp_surveyfile3', $var_attachmt3, $path_name))
	{
		$var_attachmt3 = "";
		$var_clients_03count = 0;
		$var_satisfactorybetter_03count = 0;
		$fileupload = false;
	}
}
else $var_attachmt3 = "";

// Apr
if ($var_clients_04count > 0)
{
	if (!copyFiletoSrvr('hosp_surveyfile4', $var_attachmt4, $path_name))
	{
		$var_attachmt4 = "";
		$var_clients_04count = 0;
		$var_satisfactorybetter_04count = 0;
		$fileupload = false;
	}
}
else $var_attachmt4 = "";

// May
if ($var_clients_05count > 0)
{
	if (!copyFiletoSrvr('hosp_surveyfile5', $var_attachmt5, $path_name))
	{
		$var_attachmt5 = "";
		$var_clients_05count = 0;
		$var_satisfactorybetter_05count = 0;
		$fileupload = false;
	}
}
else $var_attachmt5 = "";

// Jun
if ($var_clients_06count > 0)
{
	if (!copyFiletoSrvr('hosp_surveyfile6', $var_attachmt6, $path_name))
	{
		$var_attachmt6 = "";
		$var_clients_06count = 0;
		$var_satisfactorybetter_06count = 0;
		$fileupload = false;
	}
}
else $var_attachmt6 = "";

// Jul
if ($var_clients_07count > 0)
{
	if (!copyFiletoSrvr('hosp_surveyfile7', $var_attachmt7, $path_name))
	{
		$var_attachmt7 = "";
		$var_clients_07count = 0;
		$var_satisfactorybetter_07count = 0;
		$fileupload = false;
	}
}
else $var_attachmt7 = "";

// Aug
if ($var_clients_08count > 0)
{
	if (!copyFiletoSrvr('hosp_surveyfile8', $var_attachmt8, $path_name))
	{
		$var_attachmt8 = "";
		$var_clients_08count = 0;
		$var_satisfactorybetter_08count = 0;
		$fileupload = false;
	}
}
else $var_attachmt8 = "";

// Sep
if ($var_clients_09count > 0)
{
	if (!copyFiletoSrvr('hosp_surveyfile9', $var_attachmt9, $path_name))
	{
		$var_attachmt9 = "";
		$var_clients_09count = 0;
		$var_satisfactorybetter_09count = 0;
		$fileupload = false;
	}
}
else $var_attachmt9 = "";

// Oct
if ($var_clients_10count > 0)
{
	if (!copyFiletoSrvr('hosp_surveyfile10', $var_attachmt10, $path_name))
	{
		$var_attachmt10 = "";
		$var_clients_10count = 0;
		$var_satisfactorybetter_10count = 0;
		$fileupload = false;
	}
}
else $var_attachmt10 = "";

// Nov
if ($var_clients_11count > 0)
{
	if (!copyFiletoSrvr('hosp_surveyfile11', $var_attachmt11, $path_name))
	{
		$var_attachmt11 = "";
		$var_clients_11count = 0;
		$var_satisfactorybetter_11count = 0;
		$fileupload = false;
	}
}
else $var_attachmt11 = "";

// Dec
if ($var_clients_12count > 0)
{
	if (!copyFiletoSrvr('hosp_surveyfile12', $var_attachmt12, $path_name))
	{
		$var_attachmt12 = "";
		$var_clients_12count = 0;
		$var_satisfactorybetter_12count = 0;
		$fileupload = false;
	}
}
else $var_attachmt12 = "";

// Sample survey form
if (isset($_FILES['hosp_surveyfile13']))
{
	if (!copyFiletoSrvr('hosp_surveyfile13', $var_attachmt13, $path_name))
	{
		$var_attachmt13 = "";
		$fileupload = false;
	}
}
else
	if ($_POST['var_was_uploaded_file13'] == "")
		$var_attachmt13 = "";

if ($fileupload)
{
	//If the ID for a particular Record has been passed as parameter by the calling program, then execute an SQL Update to save the Record fields.
	//Otherwise, execute an SQL Insert to add a new Record.
	if (isset($_POST['var_pss_id']))
	{
		$var_pss_id = mysql_entities_fix_string($mysqli, $_POST['var_pss_id']);
		
		$query = "UPDATE tbl_sd_5_mfo5_7_rate_of_hospital_services
			SET
			unit_contributor_id = '$var_unit_contributor_id',
			unit_delivery_id = '$var_unit_delivery_id',
			focal_person_id = '$focal_person_id',
			cu_id = '$cu_id',
			cu_short_name = '$cu_short_name',
			mfo5_7_rate_of_hospital_services_jan_clients_surveyed = '$var_clients_01count',
			mfo5_7_rate_of_hospital_services_jan_rate_satisfactory = '$var_satisfactorybetter_01count',
			mfo5_7_rate_of_hospital_services_jan_attachment = '$var_attachmt1',
			mfo5_7_rate_of_hospital_services_feb_clients_surveyed = '$var_clients_02count',
			mfo5_7_rate_of_hospital_services_feb_rate_satisfactory = '$var_satisfactorybetter_02count',
			mfo5_7_rate_of_hospital_services_feb_attachment = '$var_attachmt2',
			mfo5_7_rate_of_hospital_services_mar_clients_surveyed = '$var_clients_03count',
			mfo5_7_rate_of_hospital_services_mar_rate_satisfactory = '$var_satisfactorybetter_03count',
			mfo5_7_rate_of_hospital_services_mar_attachment = '$var_attachmt3',
			mfo5_7_rate_of_hospital_services_apr_clients_surveyed = '$var_clients_04count',
			mfo5_7_rate_of_hospital_services_apr_rate_satisfactory = '$var_satisfactorybetter_04count',
			mfo5_7_rate_of_hospital_services_apr_attachment = '$var_attachmt4',
			mfo5_7_rate_of_hospital_services_may_clients_surveyed = '$var_clients_05count',
			mfo5_7_rate_of_hospital_services_may_rate_satisfactory = '$var_satisfactorybetter_05count',
			mfo5_7_rate_of_hospital_services_may_attachment = '$var_attachmt5',
			mfo5_7_rate_of_hospital_services_jun_clients_surveyed = '$var_clients_06count',
			mfo5_7_rate_of_hospital_services_jun_rate_satisfactory = '$var_satisfactorybetter_06count',
			mfo5_7_rate_of_hospital_services_jun_attachment = '$var_attachmt6',
			mfo5_7_rate_of_hospital_services_jul_clients_surveyed = '$var_clients_07count',
			mfo5_7_rate_of_hospital_services_jul_rate_satisfactory = '$var_satisfactorybetter_07count',
			mfo5_7_rate_of_hospital_services_jul_attachment = '$var_attachmt7',
			mfo5_7_rate_of_hospital_services_aug_clients_surveyed = '$var_clients_08count',
			mfo5_7_rate_of_hospital_services_aug_rate_satisfactory = '$var_satisfactorybetter_08count',
			mfo5_7_rate_of_hospital_services_aug_attachment = '$var_attachmt8',
			mfo5_7_rate_of_hospital_services_sep_clients_surveyed = '$var_clients_09count',
			mfo5_7_rate_of_hospital_services_sep_rate_satisfactory = '$var_satisfactorybetter_09count',
			mfo5_7_rate_of_hospital_services_sep_attachment = '$var_attachmt9',
			mfo5_7_rate_of_hospital_services_oct_clients_surveyed = '$var_clients_10count',
			mfo5_7_rate_of_hospital_services_oct_rate_satisfactory = '$var_satisfactorybetter_10count',
			mfo5_7_rate_of_hospital_services_oct_attachment = '$var_attachmt10',
			mfo5_7_rate_of_hospital_services_nov_clients_surveyed = '$var_clients_11count',
			mfo5_7_rate_of_hospital_services_nov_rate_satisfactory = '$var_satisfactorybetter_11count',
			mfo5_7_rate_of_hospital_services_nov_attachment = '$var_attachmt11',
			mfo5_7_rate_of_hospital_services_dec_clients_surveyed = '$var_clients_12count',
			mfo5_7_rate_of_hospital_services_dec_rate_satisfactory = '$var_satisfactorybetter_12count',
			mfo5_7_rate_of_hospital_services_dec_attachment = '$var_attachmt12',
			mfo5_7_rate_of_hospital_services_all_attachment_questionnaire = '$var_attachmt13'
			WHERE mfo5_7_rate_of_hospital_services_id = '$var_pss_id';";
			
	}
	else
		$query = "INSERT INTO tbl_sd_5_mfo5_7_rate_of_hospital_services
				(
					unit_contributor_id,
					unit_delivery_id,
					focal_person_id,
					cu_id,
					cu_short_name,
					mfo5_7_rate_of_hospital_services_jan_clients_surveyed,
					mfo5_7_rate_of_hospital_services_jan_rate_satisfactory,
					mfo5_7_rate_of_hospital_services_jan_attachment,
					mfo5_7_rate_of_hospital_services_feb_clients_surveyed,
					mfo5_7_rate_of_hospital_services_feb_rate_satisfactory,
					mfo5_7_rate_of_hospital_services_feb_attachment,
					mfo5_7_rate_of_hospital_services_mar_clients_surveyed,
					mfo5_7_rate_of_hospital_services_mar_rate_satisfactory,
					mfo5_7_rate_of_hospital_services_mar_attachment,
					mfo5_7_rate_of_hospital_services_apr_clients_surveyed,
					mfo5_7_rate_of_hospital_services_apr_rate_satisfactory,
					mfo5_7_rate_of_hospital_services_apr_attachment,
					mfo5_7_rate_of_hospital_services_may_clients_surveyed,
					mfo5_7_rate_of_hospital_services_may_rate_satisfactory,
					mfo5_7_rate_of_hospital_services_may_attachment,
					mfo5_7_rate_of_hospital_services_jun_clients_surveyed,
					mfo5_7_rate_of_hospital_services_jun_rate_satisfactory,
					mfo5_7_rate_of_hospital_services_jun_attachment,
					mfo5_7_rate_of_hospital_services_jul_clients_surveyed,
					mfo5_7_rate_of_hospital_services_jul_rate_satisfactory,
					mfo5_7_rate_of_hospital_services_jul_attachment,
					mfo5_7_rate_of_hospital_services_aug_clients_surveyed,
					mfo5_7_rate_of_hospital_services_aug_rate_satisfactory,
					mfo5_7_rate_of_hospital_services_aug_attachment,
					mfo5_7_rate_of_hospital_services_sep_clients_surveyed,
					mfo5_7_rate_of_hospital_services_sep_rate_satisfactory,
					mfo5_7_rate_of_hospital_services_sep_attachment,
					mfo5_7_rate_of_hospital_services_oct_clients_surveyed,
					mfo5_7_rate_of_hospital_services_oct_rate_satisfactory,
					mfo5_7_rate_of_hospital_services_oct_attachment,
					mfo5_7_rate_of_hospital_services_nov_clients_surveyed,
					mfo5_7_rate_of_hospital_services_nov_rate_satisfactory,
					mfo5_7_rate_of_hospital_services_nov_attachment,
					mfo5_7_rate_of_hospital_services_dec_clients_surveyed,
					mfo5_7_rate_of_hospital_services_dec_rate_satisfactory,
					mfo5_7_rate_of_hospital_services_dec_attachment,
					mfo5_7_rate_of_hospital_services_all_attachment_questionnaire
				)
				VALUES
				(
				'$var_unit_contributor_id',
				'$var_unit_delivery_id',
				'$focal_person_id',
				'$cu_id',
				'$cu_short_name',
				'$var_clients_01count',
				'$var_satisfactorybetter_01count',
				'$var_attachmt1',
				'$var_clients_02count',
				'$var_satisfactorybetter_02count',
				'$var_attachmt2',
				'$var_clients_03count',
				'$var_satisfactorybetter_03count',
				'$var_attachmt3',
				'$var_clients_04count',
				'$var_satisfactorybetter_04count',
				'$var_attachmt4',
				'$var_clients_05count',
				'$var_satisfactorybetter_05count',
				'$var_attachmt5',
				'$var_clients_06count',
				'$var_satisfactorybetter_06count',
				'$var_attachmt6',
				'$var_clients_07count',
				'$var_satisfactorybetter_07count',
				'$var_attachmt7',
				'$var_clients_08count',
				'$var_satisfactorybetter_08count',
				'$var_attachmt8',
				'$var_clients_09count',
				'$var_satisfactorybetter_09count',
				'$var_attachmt9',
				'$var_clients_10count',
				'$var_satisfactorybetter_10count',
				'$var_attachmt10',
				'$var_clients_11count',
				'$var_satisfactorybetter_11count',
				'$var_attachmt11',
				'$var_clients_12count',
				'$var_satisfactorybetter_12count',
				'$var_attachmt12',
				'$var_attachmt13'
				);";

	if (!mysqli_query($mysqli,$query))
	{
		$error=mysqli_error($mysqli);
		mysqli_close($mysqli);
		die('Error: ' . $error);
		exit;
	}

	mysqli_close($mysqli);
	header("Location: pssurvey_view_all.php");
	exit;

	}
else
	echo "<p>Record not saved.</p>";

mysqli_close($mysqli);

?>
