<?php

session_name("pbb");
session_start();

if ( !isset($_SESSION['user_id']) || !$_SESSION['user_id'] )
{
	// not logged in, move to login page
	header('Location: ../login/login_mysqli.php');
	exit();
}

$cu_short_name = $_SESSION['cu_short_name'];
$unit_delivery_name_short = $_SESSION['unit_delivery_name_short'];
$unit_contributor_name_short = $_SESSION['unit_contributor_name_short'];

// connect to the database
include_once('../connect-db.php');

$var_id = $_GET['id'];

$sql = "SELECT tbl_sd_ref_prc_profession.prc_profession_name,
	DATE_FORMAT(tbl_sd_ref_prc.prc_examination_date, '%b-%Y') AS prc_examination_date,
	tbl_sd_ref_prc.prc_name_of_school,
	tbl_sd_ref_prc.prc_up_1st_time_takers,
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
    tbl_sd_ref_prc.prc_natl_1st_time_takers,
    tbl_sd_ref_prc.prc_natl_1st_time_takers_passers,
    tbl_sd_ref_prc.prc_natl_1st_time_takers_failed,
    tbl_sd_ref_prc.prc_natl_1st_time_takers_conditional,
    tbl_sd_ref_prc.prc_natl_1st_time_takers_percent_passed,
    tbl_sd_ref_prc.prc_natl_retakers_takers,
    tbl_sd_ref_prc.prc_natl_retakers_takers_passers,
    tbl_sd_ref_prc.prc_natl_retakers_takers_failed,
    tbl_sd_ref_prc.prc_natl_retakers_takers_conditional,
    tbl_sd_ref_prc.prc_natl_retakers_takers_percent_passed,
    tbl_sd_ref_prc.prc_natl_overall_takers,
    tbl_sd_ref_prc.prc_natl_overall_takers_passers,
    tbl_sd_ref_prc.prc_natl_overall_takers_failed,
    tbl_sd_ref_prc.prc_natl_overall_takers_conditional,
    tbl_sd_ref_prc.prc_natl_overall_takers_percent_passed,
	tbl_sd_ref_prc.prc_source_link
	FROM tbl_sd_ref_prc INNER JOIN tbl_sd_ref_prc_profession
	ON tbl_sd_ref_prc.prc_profession_id = tbl_sd_ref_prc_profession.prc_profession_id
	WHERE tbl_sd_ref_prc.prc_id = '$var_id'";

$result = $mysqli->query($sql)->fetch_object();

if ($result)
{
	$var_ref_prc_profession = $result->prc_profession_name;
	$var_ref_prc_exam_date = $result->prc_examination_date;
	$var_ref_prc_school = $result->prc_name_of_school;

	$var_up_1time_pass = $result->prc_up_1st_time_takers_passers;
	$var_up_1time_fail = $result->prc_up_1st_time_takers_failed;
	$var_up_1time_cond = $result->prc_up_1st_time_takers_conditional;
	$var_up_1time_total = $result->prc_up_1st_time_takers;
	$var_up_1time_passpct = $result->prc_up_1st_time_takers_percent_passed;

	$var_up_repeat_pass = $result->prc_up_repeaters_takers_passers;
	$var_up_repeat_fail = $result->prc_up_repeaters_takers_failed;
	$var_up_repeat_cond = $result->prc_up_repeaters_takers_conditional;
	$var_up_repeat_total = $result->prc_up_repeaters_takers;
	$var_up_repeat_passpct = $result->prc_up_repeaters_takers_percent_passed;
		
	$var_up_total_pass = $result->prc_up_overall_takers_passers;
	$var_up_total_fail = $result->prc_up_overall_takers_failed;
	$var_up_total_cond = $result->prc_up_overall_takers_conditional;
	$var_up_total_total = $result->prc_up_overall_takers;
	$var_up_total_passpct = $result->prc_up_overall_takers_percent_passed;

	$var_up_1time_pass_orig = $result->prc_up_1st_time_takers_passers;
	$var_up_1time_fail_orig = $result->prc_up_1st_time_takers_failed;
	$var_up_1time_cond_orig = $result->prc_up_1st_time_takers_conditional;
	$var_up_repeat_pass_orig = $result->prc_up_repeaters_takers_passers;
	$var_up_repeat_fail_orig = $result->prc_up_repeaters_takers_failed;
	$var_up_repeat_cond_orig = $result->prc_up_repeaters_takers_conditional;

	$var_1time_pass = $result->prc_natl_1st_time_takers_passers;
	$var_1time_fail = $result->prc_natl_1st_time_takers_failed;
	$var_1time_cond = $result->prc_natl_1st_time_takers_conditional;
	$var_1time_total = $result->prc_natl_1st_time_takers;
	$var_1time_passpct = $result->prc_natl_1st_time_takers_percent_passed;

	$var_repeat_pass = $result->prc_natl_retakers_takers_passers;
	$var_repeat_fail = $result->prc_natl_retakers_takers_failed;
	$var_repeat_cond = $result->prc_natl_retakers_takers_conditional;
	$var_repeat_total = $result->prc_natl_retakers_takers;
	$var_repeat_passpct = $result->prc_natl_retakers_takers_percent_passed;
		
	$var_total_pass = $result->prc_natl_overall_takers_passers;
	$var_total_fail = $result->prc_natl_overall_takers_failed;
	$var_total_cond = $result->prc_natl_overall_takers_conditional;
	$var_total_total = $result->prc_natl_overall_takers;
	$var_total_passpct = $result->prc_natl_overall_takers_percent_passed;
	$var_srclink = $result->prc_source_link;
}

// upload: Generate sample filename
include_once('prc_setnames.php');
			
mysqli_close($mysqli);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<?php include_once('prcexam_table.php'); ?>
</body>
</html>