<?php

session_name("pbb");
session_start();

// is the one accessing this page logged in or not?
if ( !isset($_SESSION['user_id']) || !$_SESSION['user_id'] )
{
	// not logged in, move to login page
	header('Location: ../login/login_mysqli.php');
	exit;
}

// confirm that the 'id' variable has been set
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) 
{
	header('Location: prc_view_all.php');
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

// connect to the database
include_once('../connect-db.php');

// get the id from the url
$var_id = $_GET['id'];

// retrieve the record with such id
$query = "SELECT
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_id,
	tbl_sd_1_mfo1_forma_program.mfo1_forma_program_id,
	tbl_sd_1_mfo1_forma_program.mfo1_forma_program_name,
	tbl_sd_1_mfo1_formb_prc.prc_id,
	tbl_sd_ref_prc_profession.prc_profession_name,
	DATE_FORMAT(tbl_sd_ref_prc.prc_examination_date, '%b-%Y') AS prc_examination_date,
	tbl_sd_ref_prc.prc_quarter,
	tbl_sd_ref_prc.prc_name_of_school,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_1st_time_takers_passers,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_1st_time_takers_failed,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_1st_time_takers_conditional,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_1st_time_takers,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_1st_time_takers_percent_passed,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_repeaters_takers_passers,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_repeaters_takers_failed,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_repeaters_takers_conditional,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_repeaters_takers,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_repeaters_takers_percent_passed,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_overall_takers_passers,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_overall_takers_failed,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_overall_takers_conditional,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_overall_takers,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_overall_takers_percent_passed,
	tbl_sd_ref_prc.prc_up_1st_time_takers_passers,
	tbl_sd_ref_prc.prc_up_1st_time_takers_failed,
	tbl_sd_ref_prc.prc_up_1st_time_takers_conditional,
	tbl_sd_ref_prc.prc_up_1st_time_takers_percent_passed,
	tbl_sd_ref_prc.prc_up_repeaters_takers,
	tbl_sd_ref_prc.prc_up_repeaters_takers_passers,
	tbl_sd_ref_prc.prc_up_repeaters_takers_failed,
	tbl_sd_ref_prc.prc_up_repeaters_takers_conditional,
	tbl_sd_ref_prc.prc_up_repeaters_takers_percent_passed,
	tbl_sd_ref_prc.prc_up_overall_takers,
	tbl_sd_ref_prc.prc_up_overall_takers_passers,
	tbl_sd_ref_prc.prc_up_overall_takers_failed,
	tbl_sd_ref_prc.prc_up_overall_takers_conditional,
	tbl_sd_ref_prc.prc_up_overall_takers_percent_passed,
	tbl_sd_ref_prc.prc_natl_1st_time_takers_passers,
	tbl_sd_ref_prc.prc_natl_1st_time_takers_failed,
	tbl_sd_ref_prc.prc_natl_1st_time_takers_conditional,
	tbl_sd_ref_prc.prc_natl_1st_time_takers,
	tbl_sd_ref_prc.prc_natl_1st_time_takers_percent_passed,
	tbl_sd_ref_prc.prc_natl_retakers_takers_passers,
	tbl_sd_ref_prc.prc_natl_retakers_takers_failed,
	tbl_sd_ref_prc.prc_natl_retakers_takers_conditional,
	tbl_sd_ref_prc.prc_natl_retakers_takers,
	tbl_sd_ref_prc.prc_natl_retakers_takers_percent_passed,
	tbl_sd_ref_prc.prc_natl_overall_takers_passers,
	tbl_sd_ref_prc.prc_natl_overall_takers_failed,
	tbl_sd_ref_prc.prc_natl_overall_takers_conditional,
	tbl_sd_ref_prc.prc_natl_overall_takers,
	tbl_sd_ref_prc.prc_natl_overall_takers_percent_passed,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_source_link,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_attachment,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_attachment_on_discrepancy
FROM tbl_sd_1_mfo1_forma_program, tbl_sd_1_mfo1_formb_prc, tbl_sd_ref_prc, tbl_sd_ref_prc_profession
WHERE tbl_sd_1_mfo1_forma_program.unit_contributor_id = tbl_sd_1_mfo1_formb_prc.unit_contributor_id
	AND tbl_sd_1_mfo1_forma_program.mfo1_forma_program_id = tbl_sd_1_mfo1_formb_prc.mfo1_forma_program_id
	AND tbl_sd_1_mfo1_formb_prc.prc_id = tbl_sd_ref_prc.prc_id
	AND tbl_sd_ref_prc.prc_profession_id = tbl_sd_ref_prc_profession.prc_profession_id
	AND tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_id = '$var_id'";

$record_set = $mysqli->query($query)->fetch_object();

if ($record_set)
{
		// set form variables to values in the retrieved row
		$var_prc_id = $record_set->mfo1_formb_prc_id;
		$var_mfo1_forma_program_id = $record_set->mfo1_forma_program_id;
		$var_mfo1_forma_program_name = $record_set->mfo1_forma_program_name;
		$var_ref_prc_id = $record_set->prc_id;
		$var_ref_prc_profession = $record_set->prc_profession_name;
		$var_ref_prc_exam_date = $record_set->prc_examination_date;
		$var_ref_prc_qtr = $record_set->prc_quarter;
		$var_ref_prc_school = $record_set->prc_name_of_school;

		$var_up_1time_pass = $record_set->mfo1_formb_prc_up_1st_time_takers_passers;
		$var_up_1time_fail = $record_set->mfo1_formb_prc_up_1st_time_takers_failed;
		$var_up_1time_cond = $record_set->mfo1_formb_prc_up_1st_time_takers_conditional;
		$var_up_1time_total = $record_set->mfo1_formb_prc_up_1st_time_takers;
		$var_up_1time_passpct = $record_set->mfo1_formb_prc_up_1st_time_takers_percent_passed;

		$var_up_repeat_pass = $record_set->mfo1_formb_prc_up_repeaters_takers_passers;
		$var_up_repeat_fail = $record_set->mfo1_formb_prc_up_repeaters_takers_failed;
		$var_up_repeat_cond = $record_set->mfo1_formb_prc_up_repeaters_takers_conditional;
		$var_up_repeat_total = $record_set->mfo1_formb_prc_up_repeaters_takers;
		$var_up_repeat_passpct = $record_set->mfo1_formb_prc_up_repeaters_takers_percent_passed;
			
		$var_up_total_pass = $record_set->mfo1_formb_prc_up_overall_takers_passers;
		$var_up_total_fail = $record_set->mfo1_formb_prc_up_overall_takers_failed;
		$var_up_total_cond = $record_set->mfo1_formb_prc_up_overall_takers_conditional;
		$var_up_total_total = $record_set->mfo1_formb_prc_up_overall_takers;
		$var_up_total_passpct = $record_set->mfo1_formb_prc_up_overall_takers_percent_passed;

		$var_up_1time_pass_orig = $record_set->prc_up_1st_time_takers_passers;
		$var_up_1time_fail_orig = $record_set->prc_up_1st_time_takers_failed;
		$var_up_1time_cond_orig = $record_set->prc_up_1st_time_takers_conditional;
		$var_up_repeat_pass_orig = $record_set->prc_up_repeaters_takers_passers;
		$var_up_repeat_fail_orig = $record_set->prc_up_repeaters_takers_failed;
		$var_up_repeat_cond_orig = $record_set->prc_up_repeaters_takers_conditional;
			
		$var_1time_pass = $record_set->prc_natl_1st_time_takers_passers;
		$var_1time_fail = $record_set->prc_natl_1st_time_takers_failed;
		$var_1time_cond = $record_set->prc_natl_1st_time_takers_conditional;
		$var_1time_total = $record_set->prc_natl_1st_time_takers;
		$var_1time_passpct = $record_set->prc_natl_1st_time_takers_percent_passed;

		$var_repeat_pass = $record_set->prc_natl_retakers_takers_passers;
		$var_repeat_fail = $record_set->prc_natl_retakers_takers_failed;
		$var_repeat_cond = $record_set->prc_natl_retakers_takers_conditional;
		$var_repeat_total = $record_set->prc_natl_retakers_takers;
		$var_repeat_passpct = $record_set->prc_natl_retakers_takers_percent_passed;
			
		$var_total_pass = $record_set->prc_natl_overall_takers_passers;
		$var_total_fail = $record_set->prc_natl_overall_takers_failed;
		$var_total_cond = $record_set->prc_natl_overall_takers_conditional;
		$var_total_total = $record_set->prc_natl_overall_takers;
		$var_total_passpct = $record_set->prc_natl_overall_takers_percent_passed;

		$var_srclink = $record_set->mfo1_formb_prc_source_link;
		$var_attachmt1 = str_ireplace('.pdf','',$record_set->mfo1_formb_prc_attachment);
		$var_attachmt2 = str_ireplace('.pdf','',$record_set->mfo1_formb_prc_attachment_on_discrepancy);

		// upload: Generate sample filename
		include_once('prc_setnames.php');
		
		//Retrieve data and initialize array of variables for PRC Licensure Examination dropdown, exclude PRC exam if existing already for the program
		$query1 = $mysqli->query("SELECT tbl_sd_ref_prc.prc_id,	tbl_sd_ref_prc_profession.prc_profession_name, DATE_FORMAT(tbl_sd_ref_prc.prc_examination_date, '%b-%Y') AS exam_datestr, prc_name_of_school
			FROM tbl_sd_ref_prc INNER JOIN tbl_sd_ref_prc_profession
				ON tbl_sd_ref_prc.prc_profession_id = tbl_sd_ref_prc_profession.prc_profession_id
			WHERE tbl_sd_ref_prc.cu_id = '$cu_id'  AND
				tbl_sd_ref_prc.prc_id NOT IN
				(	SELECT prc_id
					FROM tbl_sd_1_mfo1_formb_prc
					WHERE unit_delivery_id = '$unit_delivery_id' AND
						mfo1_forma_program_id = '$var_mfo1_forma_program_id' AND
						mfo1_formb_prc_id <> '$var_prc_id')
			ORDER BY tbl_sd_ref_prc_profession.prc_profession_name, tbl_sd_ref_prc.prc_examination_date;");

		//Create an array of objects for each returned row
		while ( $array2[] = $query1->fetch_object() );

		//Remove the blank entry at end of array
		array_pop($array2);

		$query1->close();
		$mysqli->close();
}
else
{
	$mysqli->close();
	header('Location: prc_view_all.php');
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

<!-- include the next Javascript files for PRC Exam -->
<script src="../validfn-mfo1.js"></script>
<script src="validfn-prc.js"></script>

</head>

<body>

    <div class="viewbody">
    <h2>MFO 1: PRC Licensure Examination - Edit Record</h2>
    <div class="viewlinks"><p><a href="prc_view_all.php">View All Records</a></p></div>
	<hr/>

    <!-- Edit form here -->
	<form name="prcEditForm" id="prcEditForm" action="prc_insert_update.php" method="post" onsubmit="return isValidForm()" enctype="multipart/form-data">

		<table>
        <tr>
            <td width="155"><div align="right">Official Program Name</div></td>
            <td width="550"><input name="var_mfo1_forma_program_name" type="text" id="var_mfo1_forma_program_name" size="80" disabled value="<?php if (isset($var_mfo1_forma_program_name)) echo $var_mfo1_forma_program_name; ?>">
			<input name="var_mfo1_forma_program_id" type="hidden" id="hvar_mfo1_forma_program_id" value="<?php if (isset($var_mfo1_forma_program_id)) echo $var_mfo1_forma_program_id; ?>">
			</td>
		</tr>
		<tr>
			<td><div align="right">PRC Licensure Examination</div></td>
            <td><select name="var_ref_prc_id" required id="var_ref_prc_id" size="1" onchange="showPRCexam(this.value)">
				<option <?php if ( isset($var_ref_prc__id) &&  $var_ref_prc_id == "" ) echo "selected"; ?> value="" >Please Select :</option>
              <?php if (isset($array2)) { foreach($array2 as $option2) : ?>
					<option value="<?php echo $option2->prc_id; ?>" <?php if (isset($var_ref_prc_id) && ($var_ref_prc_id == $option2->prc_id)) echo "selected"; ?>><?php echo $option2->prc_profession_name . ": " . $option2->exam_datestr . " " . $option2->prc_name_of_school; ?></option>
					<?php endforeach; } ?>
             </select>
			 </td>
		</tr>
		</table>
		
		<div id="prc_exam"><?php include_once('prcexam_table.php') ?></div>

		<br>
        <div align="left">
            <!-- <input type="reset" value="Clear"> -->
            <input type="hidden" name="var_prc_id" value="<?php if (isset($var_prc_id)) echo $var_prc_id; ?>"><button type="submit">Submit</button>
        </div>
	</form>

	</div>
</body>
</html>