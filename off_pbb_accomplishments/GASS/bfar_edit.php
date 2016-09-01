<?php
session_name("pbb");
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

// not logged in, move to login page

header('Location: ../login/login_mysqli.php');

exit;

}

// connect to the database
	include('../connect-db.php');

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
$mysqli->set_charset("utf8");

//Return an error if we have connection issues
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}
// get the id from the url
	$gass_formb_bfar_id = $_GET['id'];

$query = "SELECT 
unit_delivery_name_cu,
unit_contributor_name,
gass_formb_bfar_4_jan,
gass_formb_bfar_4_feb,
gass_formb_bfar_4_mar,
gass_formb_bfar_4_qtr1_attachment,
gass_formb_bfar_4_apr,
gass_formb_bfar_4_may,
gass_formb_bfar_4_jun,
gass_formb_bfar_4_qtr2_attachment,
gass_formb_bfar_4_jul,
gass_formb_bfar_4_aug,
gass_formb_bfar_4_sep,
gass_formb_bfar_4_qtr3_attachment,
gass_formb_bfar_4_oct,
gass_formb_bfar_4_nov,
gass_formb_bfar_4_dec,
gass_formb_bfar_4_qtr4_attachment1,
gass_formb_bfar_4_qtr4_attachment2,
gass_formb_bar_1_qtr4,
gass_formb_bfar_1_qtr4,
gass_formb_bfar_1a_qtr4,
gass_formb_bfar_1b_qtr4,
gass_formb_bfar_2_qtr4,
gass_formb_bfar_2a_qtr4,
gass_formb_bfar_3_qtr4,
gass_formb_bfar_5_qtr4,
gass_formb_bfar_qtr4_attachment,
gass_formb_bar_1_qtr1,
gass_formb_bfar_1_qtr1,
gass_formb_bfar_1a_qtr1,
gass_formb_bfar_1b_qtr1,
gass_formb_bfar_2_qtr1,
gass_formb_bfar_2a_qtr1,
gass_formb_bfar_5_qtr1,
gass_formb_bfar_qtr1_attachment,
gass_formb_bar_1_qtr2,
gass_formb_bfar_1_qtr2,
gass_formb_bfar_1a_qtr2,
gass_formb_bfar_1b_qtr2,
gass_formb_bfar_2_qtr2,
gass_formb_bfar_2a_qtr2,
gass_formb_bfar_5_qtr2,
gass_formb_bfar_qtr2_attachment,
gass_formb_bar_1_qtr3,
gass_formb_bfar_1_qtr3,
gass_formb_bfar_1a_qtr3,
gass_formb_bfar_1b_qtr3,
gass_formb_bfar_2_qtr3,
gass_formb_bfar_2a_qtr3,
gass_formb_bfar_5_qtr3,
gass_formb_bfar_qtr3_attachment,
gass_formb_office_choice,
gass_formb_bfar_id
FROM tbl_sd_7_gass_formb_bfar
WHERE gass_formb_bfar_id = " . $gass_formb_bfar_id;

$record_set = $mysqli->query($query);
$row = $record_set->fetch_assoc();

//Extract fields.
	$unit_delivery_name_cu = $row['unit_delivery_name_cu'];
	$unit_contributor_name = $row['unit_contributor_name'];

	$bfar4_1 = $row['gass_formb_bfar_4_jan'];
	$bfar4_2 = $row['gass_formb_bfar_4_feb'];
	$bfar4_3 = $row['gass_formb_bfar_4_mar'];
	$bfar4_4 = $row['gass_formb_bfar_4_apr'];
	$bfar4_5 = $row['gass_formb_bfar_4_may'];
	$bfar4_6 = $row['gass_formb_bfar_4_jun'];
	$bfar4_7 = $row['gass_formb_bfar_4_jul'];
	$bfar4_8 = $row['gass_formb_bfar_4_aug'];
	$bfar4_9 = $row['gass_formb_bfar_4_sep'];
	$bfar4_10 = $row['gass_formb_bfar_4_oct'];
	$bfar4_11 = $row['gass_formb_bfar_4_nov'];
	$bfar4_12 = $row['gass_formb_bfar_4_dec'];


	$QPRO_4 = $row['gass_formb_bar_1_qtr4'];
	$SAAODB_4 = $row['gass_formb_bfar_1_qtr4'];
	$SAAODBOE_4 = $row['gass_formb_bfar_1a_qtr4'];
	$LASA_4 = $row['gass_formb_bfar_1b_qtr4'];
	$SABUDB_4 = $row['gass_formb_bfar_2_qtr4'];
	$SABUDBOE_4 = $row['gass_formb_bfar_2a_qtr4'];
	$ADDO_4 = $row['gass_formb_bfar_3_qtr4'];
	$QRROR_4 = $row['gass_formb_bfar_5_qtr4'];
	
	$QPRO_1 = $row['gass_formb_bar_1_qtr1'];
	$SAAODB_1 = $row['gass_formb_bfar_1_qtr1'];
	$SAAODBOE_1 = $row['gass_formb_bfar_1a_qtr1'];
	$LASA_1 = $row['gass_formb_bfar_1b_qtr1'];
	$SABUDB_1 = $row['gass_formb_bfar_2_qtr1'];
	$SABUDBOE_1 = $row['gass_formb_bfar_2a_qtr1'];
	$QRROR_1 = $row['gass_formb_bfar_5_qtr1'];

	$QPRO_2 = $row['gass_formb_bar_1_qtr2'];
	$SAAODB_2 = $row['gass_formb_bfar_1_qtr2'];
	$SAAODBOE_2 = $row['gass_formb_bfar_1a_qtr2'];
	$LASA_2 = $row['gass_formb_bfar_1b_qtr2'];
	$SABUDB_2 = $row['gass_formb_bfar_2_qtr2'];
	$SABUDBOE_2 = $row['gass_formb_bfar_2a_qtr2'];
	$QRROR_2 = $row['gass_formb_bfar_5_qtr2'];

	$QPRO_3 = $row['gass_formb_bar_1_qtr3'];
	$SAAODB_3 = $row['gass_formb_bfar_1_qtr3'];
	$SAAODBOE_3 = $row['gass_formb_bfar_1a_qtr3'];
	$LASA_3 = $row['gass_formb_bfar_1b_qtr3'];
	$SABUDB_3 = $row['gass_formb_bfar_2_qtr3'];
	$SABUDBOE_3 = $row['gass_formb_bfar_2a_qtr3'];
	$QRROR_3 = $row['gass_formb_bfar_5_qtr3'];

	$office = $row['gass_formb_office_choice'];

	$a = $row['gass_formb_bfar_4_qtr4_attachment1'];
	$gass_bfar_4th_1 = rtrim($a,".pdf");
	$b = $row['gass_formb_bfar_4_qtr1_attachment'];
	$gass_bfar_1st = rtrim($b,".pdf");
	$c = $row['gass_formb_bfar_4_qtr2_attachment'];
	$gass_bfar_2nd = rtrim($c,".pdf");
	$d = $row['gass_formb_bfar_4_qtr3_attachment'];
	$gass_bfar_3rd= rtrim($d,".pdf");
	$e = $row['gass_formb_bfar_4_qtr4_attachment2'];
	$gass_bfar_4th_2 = rtrim($e,".pdf");
	$f = $row['gass_formb_bfar_qtr4_attachment'];
	$gass_bfar_rpt_4th = rtrim($f,".pdf");
	$g = $row['gass_formb_bfar_qtr1_attachment'];
	$gass_bfar_rpt_1st = rtrim($g,".pdf");
	$h = $row['gass_formb_bfar_qtr2_attachment'];
	$gass_bfar_rpt_2nd = rtrim($h,".pdf");
	$i = $row['gass_formb_bfar_qtr3_attachment'];
	$gass_bfar_rpt_3rd = rtrim($i,".pdf");

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

	//Generate sample filename
	date_default_timezone_set("Asia/Hong_Kong");
	$timestamp = time();
	$d = date("Ymd_His",$timestamp);
	$cu = preg_replace('/\s+/', ' ', $cu_short_name);
	$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
	$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);
	
	if (empty($gass_bfar_4th_1)){
	// #tracy - Changed next line
	//$file_name_sample1 = "gass_prev_yr_4th_mrd_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample1 = "gass_formb_bfar_4_qtr4_1_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample1 = strtolower($file_name_sample1);
	$file_name_sample1 = preg_replace('/\s+/', '', $file_name_sample1);
	$gass_bfar_4th_1 = $file_name_sample1;
	}
	
	if (empty($gass_bfar_1st)){
	// #tracy - Changed next line
	//$file_name_sample2 = "gass_cur_yr_1st_mrd_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample2 = "gass_formb_bfar_4_qtr1_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample2 = strtolower($file_name_sample2);
	$file_name_sample2 = preg_replace('/\s+/', '', $file_name_sample2);
	$gass_bfar_1st = $file_name_sample2;
	}

	if (empty($gass_bfar_2nd)){
	// #tracy - Changed next line
	//$file_name_sample3 = "gass_cur_yr_2nd_mrd_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample3 = "gass_formb_bfar_4_qtr2_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample3 = strtolower($file_name_sample3);
	$file_name_sample3 = preg_replace('/\s+/', '', $file_name_sample3);
	$gass_bfar_2nd = $file_name_sample3;
	}

	if (empty($gass_bfar_3rd)){
	// #tracy - Changed next line
	//$file_name_sample4 = "gass_cur_yr_3rd_mrd_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample4 = "gass_formb_bfar_4_qtr3_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample4 = strtolower($file_name_sample4);
	$file_name_sample4 = preg_replace('/\s+/', '', $file_name_sample4);
	$gass_bfar_3rd = $file_name_sample4;
	}

	if (empty($gass_bfar_4th_2)){
	// #tracy - Changed next line
	//$file_name_sample5 = "gass_cur_yr_4th_mrd_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample5 = "gass_formb_bfar_4_qtr4_2_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample5 = strtolower($file_name_sample5);
	$file_name_sample5 = preg_replace('/\s+/', '', $file_name_sample5);
	$gass_bfar_4th_2 = $file_name_sample5;
	}

	if (empty($gass_bfar_rpt_4th)){
	// #tracy - Changed next line
	//$file_name_sample6 = "gass_prev_yr_4th_bfar_rpt_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample6 = "gass_formb_bfar_qtr4_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample6 = strtolower($file_name_sample6);
	$file_name_sample6 = preg_replace('/\s+/', '', $file_name_sample6);
	$gass_bfar_rpt_4th = $file_name_sample4;
	}

	if (empty($gass_bfar_rpt_1st)){
	// #tracy - Changed next line
	//$file_name_sample7 = "gass_cur_yr_1st_bfar_rpt_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample7 = "gass_formb_bfar_qtr1_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample7 = strtolower($file_name_sample7);
	$file_name_sample7 = preg_replace('/\s+/', '', $file_name_sample7);
	$gass_bfar_rpt_1st = $file_name_sample7;
	}

	if (empty($gass_bfar_rpt_2nd)){
	// #tracy - Changed next line
	//$file_name_sample8 = "gass_cur_yr_2nd_bfar_rpt_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample8 = "gass_formb_bfar_qtr2_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample8 = strtolower($file_name_sample8);
	$file_name_sample8 = preg_replace('/\s+/', '', $file_name_sample8);
	$gass_bfar_rpt_2nd = $file_name_sample8;
	}

	if (empty($gass_bfar_rpt_3rd)){
	// #tracy - Changed next line
	//$file_name_sample9 = "gass_cur_yr_3rd_bfar_rpt_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample9 = "gass_formb_bfar_qtr3_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample9 = strtolower($file_name_sample9);
	$file_name_sample9 = preg_replace('/\s+/', '', $file_name_sample9);
	$gass_bfar_rpt_3rd = $file_name_sample9;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Form</title>

<style>
body {margin:1; font-family:Calibri; font-size:14px;}
input {text-align: right;}
</style>


<script type="text/javascript" language="JavaScript">
function choice10()
{
	if (document.getElementById("officea").checked) {
		document.getElementById("officeb").disabled = true;

   		document.getElementById("pdecy").disabled = false;
   		document.getElementById("pdecn").disabled = false;
   		document.getElementById("cjany").disabled = false;
   		document.getElementById("cjann").disabled = false;
   		document.getElementById("cfeby").disabled = false;
   		document.getElementById("cfebn").disabled = false;
   		document.getElementById("cmary").disabled = false;
   		document.getElementById("cmarn").disabled = false;
   		document.getElementById("capry").disabled = false;
   		document.getElementById("caprn").disabled = false;
   		document.getElementById("cmayy").disabled = false;
   		document.getElementById("cmayn").disabled = false;
   		document.getElementById("cjuny").disabled = false;
   		document.getElementById("cjunn").disabled = false;
   		document.getElementById("cjuly").disabled = false;
   		document.getElementById("cjuln").disabled = false;
   		document.getElementById("caugy").disabled = false;
   		document.getElementById("caugn").disabled = false;
   		document.getElementById("csepy").disabled = false;
   		document.getElementById("csepn").disabled = false;
   		document.getElementById("cocty").disabled = false;
   		document.getElementById("coctn").disabled = false;
   		document.getElementById("cnovy").disabled = false;
   		document.getElementById("cnovn").disabled = false;

   		document.getElementById("QPRO_4y").disabled = true;
   		document.getElementById("QPRO_4n").disabled = true;
   		document.getElementById("SAAODB_4y").disabled = false;
   		document.getElementById("SAAODB_4n").disabled = false;
   		document.getElementById("SAAODBOE_4y").disabled = false;
   		document.getElementById("SAAODBOE_4n").disabled = false;
   		document.getElementById("LASA_4y").disabled = true;
   		document.getElementById("LASA_4n").disabled = true;
   		document.getElementById("SABUDB_4y").disabled = false;
   		document.getElementById("SABUDB_4n").disabled = false;
   		document.getElementById("SABUDBOE_4y").disabled = false;
   		document.getElementById("SABUDBOE_4n").disabled = false;
   		document.getElementById("ADDO_4y").disabled = false;
   		document.getElementById("ADDO_4n").disabled = false;
   		document.getElementById("QRROR_4y").disabled = false;
   		document.getElementById("QRROR_4n").disabled = false;

   		document.getElementById("QPRO_1y").disabled = true;
   		document.getElementById("QPRO_1n").disabled = true;
   		document.getElementById("SAAODB_1y").disabled = false;
   		document.getElementById("SAAODB_1n").disabled = false;
   		document.getElementById("SAAODBOE_1y").disabled = false;
   		document.getElementById("SAAODBOE_1n").disabled = false;
   		document.getElementById("LASA_1y").disabled = true;
   		document.getElementById("LASA_1n").disabled = true;
   		document.getElementById("SABUDB_1y").disabled = false;
   		document.getElementById("SABUDB_1n").disabled = false;
   		document.getElementById("SABUDBOE_1y").disabled = false;
   		document.getElementById("SABUDBOE_1n").disabled = false;
   		document.getElementById("QRROR_1y").disabled = false;
   		document.getElementById("QRROR_1n").disabled = false;

   		document.getElementById("QPRO_2y").disabled = true;
   		document.getElementById("QPRO_2n").disabled = true;
   		document.getElementById("SAAODB_2y").disabled = false;
   		document.getElementById("SAAODB_2n").disabled = false;
   		document.getElementById("SAAODBOE_2y").disabled = false;
   		document.getElementById("SAAODBOE_2n").disabled = false;
   		document.getElementById("LASA_2y").disabled = true;
   		document.getElementById("LASA_2n").disabled = true;
   		document.getElementById("SABUDB_2y").disabled = false;
   		document.getElementById("SABUDB_2n").disabled = false;
   		document.getElementById("SABUDBOE_2y").disabled = false;
   		document.getElementById("SABUDBOE_2n").disabled = false;
   		document.getElementById("QRROR_2y").disabled = false;
   		document.getElementById("QRROR_2n").disabled = false;

   		document.getElementById("QPRO_3y").disabled = true;
   		document.getElementById("QPRO_3n").disabled = true;
   		document.getElementById("SAAODB_3y").disabled = false;
   		document.getElementById("SAAODB_3n").disabled = false;
   		document.getElementById("SAAODBOE_3y").disabled = false;
   		document.getElementById("SAAODBOE_3n").disabled = false;
   		document.getElementById("LASA_3y").disabled = true;
   		document.getElementById("LASA_3n").disabled = true;
   		document.getElementById("SABUDB_3y").disabled = false;
   		document.getElementById("SABUDB_3n").disabled = false;
   		document.getElementById("SABUDBOE_3y").disabled = false;
   		document.getElementById("SABUDBOE_3n").disabled = false;
   		document.getElementById("QRROR_3y").disabled = false;
   		document.getElementById("QRROR_3n").disabled = false;
	}

	if (document.getElementById("officeb").checked) {
		document.getElementById("officea").disabled = true;

	   	document.getElementById("pdecy").disabled = true;
   		document.getElementById("pdecn").disabled = true;
   		document.getElementById("cjany").disabled = true;
   		document.getElementById("cjann").disabled = true;
   		document.getElementById("cfeby").disabled = true;
   		document.getElementById("cfebn").disabled = true;
   		document.getElementById("cmary").disabled = true;
   		document.getElementById("cmarn").disabled = true;
   		document.getElementById("capry").disabled = true;
   		document.getElementById("caprn").disabled = true;
   		document.getElementById("cmayy").disabled = true;
   		document.getElementById("cmayn").disabled = true;
   		document.getElementById("cjuny").disabled = true;
   		document.getElementById("cjunn").disabled = true;
   		document.getElementById("cjuly").disabled = true;
   		document.getElementById("cjuln").disabled = true;
   		document.getElementById("caugy").disabled = true;
   		document.getElementById("caugn").disabled = true;
   		document.getElementById("csepy").disabled = true;
   		document.getElementById("csepn").disabled = true;
   		document.getElementById("cocty").disabled = true;
   		document.getElementById("coctn").disabled = true;
   		document.getElementById("cnovy").disabled = true;
   		document.getElementById("cnovn").disabled = true;
   		document.getElementById("uploadFile1").disabled = true;
   		document.getElementById("uploadFile2").disabled = true;
   		document.getElementById("uploadFile3").disabled = true;
   		document.getElementById("uploadFile4").disabled = true;
   		document.getElementById("uploadFile5").disabled = true;

   		document.getElementById("QPRO_4y").disabled = false;
   		document.getElementById("QPRO_4n").disabled = false;
   		document.getElementById("SAAODB_4y").disabled = false;
   		document.getElementById("SAAODB_4n").disabled = false;
   		document.getElementById("SAAODBOE_4y").disabled = false;
   		document.getElementById("SAAODBOE_4n").disabled = false;
   		document.getElementById("LASA_4y").disabled = false;
   		document.getElementById("LASA_4n").disabled = false;
   		document.getElementById("SABUDB_4y").disabled = false;
   		document.getElementById("SABUDB_4n").disabled = false;
   		document.getElementById("SABUDBOE_4y").disabled = false;
   		document.getElementById("SABUDBOE_4n").disabled = false;
   		document.getElementById("ADDO_4y").disabled = true;
   		document.getElementById("ADDO_4n").disabled = true;
   		document.getElementById("QRROR_4y").disabled = true;
   		document.getElementById("QRROR_4n").disabled = true;

   		document.getElementById("QPRO_1y").disabled = false;
   		document.getElementById("QPRO_1n").disabled = false;
   		document.getElementById("SAAODB_1y").disabled = false;
   		document.getElementById("SAAODB_1n").disabled = false;
   		document.getElementById("SAAODBOE_1y").disabled = false;
   		document.getElementById("SAAODBOE_1n").disabled = false;
   		document.getElementById("LASA_1y").disabled = false;
   		document.getElementById("LASA_1n").disabled = false;
   		document.getElementById("SABUDB_1y").disabled = false;
   		document.getElementById("SABUDB_1n").disabled = false;
   		document.getElementById("SABUDBOE_1y").disabled = false;
   		document.getElementById("SABUDBOE_1n").disabled = false;
   		document.getElementById("QRROR_1y").disabled = true;
   		document.getElementById("QRROR_1n").disabled = true;

   		document.getElementById("QPRO_2y").disabled = false;
   		document.getElementById("QPRO_2n").disabled = false;
   		document.getElementById("SAAODB_2y").disabled = false;
   		document.getElementById("SAAODB_2n").disabled = false;
   		document.getElementById("SAAODBOE_2y").disabled = false;
   		document.getElementById("SAAODBOE_2n").disabled = false;
   		document.getElementById("LASA_2y").disabled = false;
   		document.getElementById("LASA_2n").disabled = false;
   		document.getElementById("SABUDB_2y").disabled = false;
   		document.getElementById("SABUDB_2n").disabled = false;
   		document.getElementById("SABUDBOE_2y").disabled = false;
   		document.getElementById("SABUDBOE_2n").disabled = false;
   		document.getElementById("QRROR_2y").disabled = true;
   		document.getElementById("QRROR_2n").disabled = true;

   		document.getElementById("QPRO_3y").disabled = false;
   		document.getElementById("QPRO_3n").disabled = false;
   		document.getElementById("SAAODB_3y").disabled = false;
   		document.getElementById("SAAODB_3n").disabled = false;
   		document.getElementById("SAAODBOE_3y").disabled = false;
   		document.getElementById("SAAODBOE_3n").disabled = false;
   		document.getElementById("LASA_3y").disabled = false;
   		document.getElementById("LASA_3n").disabled = false;
   		document.getElementById("SABUDB_3y").disabled = false;
   		document.getElementById("SABUDB_3n").disabled = false;
   		document.getElementById("SABUDBOE_3y").disabled = false;
   		document.getElementById("SABUDBOE_3n").disabled = false;
   		document.getElementById("QRROR_3y").disabled = true;
   		document.getElementById("QRROR_3n").disabled = true;
	}
}
</script>

<script type="text/javascript" language="JavaScript">
function choice1()
{

	if (document.getElementById("pdecy").checked) {
   		document.getElementById("uploadFile1").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile1").disabled = true;
	}
}	
</script>
<script type="text/javascript" language="JavaScript">
function choice2()
{

	if (document.getElementById("cjany").checked || document.getElementById("cfeby").checked || document.getElementById("cmary").checked)  {
   		document.getElementById("uploadFile2").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile2").disabled = true;
	}
}	
</script>
<script type="text/javascript" language="JavaScript">
function choice3()
{

	if (document.getElementById("capry").checked || document.getElementById("cmayy").checked || document.getElementById("cjuny").checked)  {
   		document.getElementById("uploadFile3").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile3").disabled = true;
	}
}	
</script>
<script type="text/javascript" language="JavaScript">
function choice4()
{

	if (document.getElementById("cjuly").checked || document.getElementById("caugy").checked || document.getElementById("csepy").checked)  {
   		document.getElementById("uploadFile4").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile4").disabled = true;
	}
}	
</script>
<script type="text/javascript" language="JavaScript">
function choice5()
{

	if (document.getElementById("cocty").checked || document.getElementById("cnovy").checked)  {
   		document.getElementById("uploadFile5").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile5").disabled = true;
	}
}	
</script>
<script type="text/javascript" language="JavaScript">
function choice6()
{

	if (document.getElementById("QPRO_4y").checked || document.getElementById("SAAODB_4y").checked || document.getElementById("SAAODBOE_4y").checked || document.getElementById("LASA_4y").checked || document.getElementById("SABUDB_4y").checked || document.getElementById("SABUDBOE_4y").checked || document.getElementById("ADDO_4y").checked || document.getElementById("QRROR_4y").checked)  {
   		document.getElementById("uploadFile6").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile6").disabled = true;
	}
}	
</script>
<script type="text/javascript" language="JavaScript">
function choice7()
{

	if (document.getElementById("QPRO_1y").checked || document.getElementById("SAAODB_1y").checked || document.getElementById("SAAODBOE_1y").checked || document.getElementById("LASA_1y").checked || document.getElementById("SABUDB_1y").checked || document.getElementById("SABUDBOE_1y").checked || document.getElementById("QRROR_1y").checked)  {
   		document.getElementById("uploadFile7").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile7").disabled = true;
	}
}	
</script>
<script type="text/javascript" language="JavaScript">
function choice8()
{

	if (document.getElementById("QPRO_2y").checked || document.getElementById("SAAODB_2y").checked || document.getElementById("SAAODBOE_2y").checked || document.getElementById("LASA_2y").checked || document.getElementById("SABUDB_2y").checked || document.getElementById("SABUDBOE_2y").checked || document.getElementById("QRROR_2y").checked)  {
   		document.getElementById("uploadFile8").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile8").disabled = true;
	}
}
</script>
<script type="text/javascript" language="JavaScript">
function choice9()
{

	if (document.getElementById("QPRO_3y").checked || document.getElementById("SAAODB_3y").checked || document.getElementById("SAAODBOE_3y").checked || document.getElementById("LASA_3y").checked || document.getElementById("SABUDB_3y").checked || document.getElementById("SABUDBOE_3y").checked || document.getElementById("QRROR_3y").checked)  {
   		document.getElementById("uploadFile9").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile9").disabled = true;
	}

}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename1()
{
var file_name1 = "";
var file_size1 = "";
var file_ext1 = "";
var file_name_sample1 = "";
var file_name1 = document.getElementById('uploadFile1').files[0].name;
var file_ext1 = file_name1.substring(file_name1.lastIndexOf('.')+1);
var file_size1 = document.getElementById('uploadFile1').files[0].size;
var file_name_sample1 = document.getElementById('file_name_sample1').value;
var file_name_sample1 = file_name_sample1 + ".pdf";

	if (file_name1 != file_name_sample1)
		{
		alert("Use the required filename. " + " " + file_name1 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile1').value="";
		return false;
		}

	if (file_size1 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile1').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename2()
{
var file_name2 = "";
var file_size2 = "";
var file_ext2 = "";
var file_name_sample2 = "";
var file_name2 = document.getElementById('uploadFile2').files[0].name;
var file_ext2 = file_name2.substring(file_name2.lastIndexOf('.')+1);
var file_size2 = document.getElementById('uploadFile2').files[0].size;
var file_name_sample2 = document.getElementById('file_name_sample2').value;
var file_name_sample2 = file_name_sample2 + ".pdf";

	if (file_name2 != file_name_sample2)
		{
		alert("Use the required filename. " + " " + file_name2 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile2').value="";
		return false;
		}

	if (file_size2 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile2').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename3()
{
var file_name3 = "";
var file_size3 = "";
var file_ext3 = "";
var file_name_sample3 = "";
var file_name3 = document.getElementById('uploadFile3').files[0].name;
var file_ext3 = file_name3.substring(file_name3.lastIndexOf('.')+1);
var file_size3 = document.getElementById('uploadFile3').files[0].size;
var file_name_sample3 = document.getElementById('file_name_sample3').value;
var file_name_sample3 = file_name_sample3 + ".pdf";

	if (file_name3 != file_name_sample3)
		{
		alert("Use the required filename. " + " " + file_name3 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile3').value="";
		return false;
		}

	if (file_size3 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile3').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename4()
{
var file_name4 = "";
var file_size4 = "";
var file_ext4 = "";
var file_name_sample4 = "";
var file_name4 = document.getElementById('uploadFile4').files[0].name;
var file_ext4 = file_name4.substring(file_name4.lastIndexOf('.')+1);
var file_size4 = document.getElementById('uploadFile4').files[0].size;
var file_name_sample4 = document.getElementById('file_name_sample4').value;
var file_name_sample4 = file_name_sample4 + ".pdf";

	if (file_name4 != file_name_sample4)
		{
		alert("Use the required filename. " + " " + file_name4 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile4').value="";
		return false;
		}

	if (file_size4 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile4').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename5()
{
var file_name5 = "";
var file_size5 = "";
var file_ext5 = "";
var file_name_sample5 = "";
var file_name5 = document.getElementById('uploadFile5').files[0].name;
var file_ext5 = file_name5.substring(file_name5.lastIndexOf('.')+1);
var file_size5 = document.getElementById('uploadFile5').files[0].size;
var file_name_sample5 = document.getElementById('file_name_sample5').value;
var file_name_sample5 = file_name_sample5 + ".pdf";

	if (file_name5 != file_name_sample5)
		{
		alert("Use the required filename. " + " " + file_name5 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile5').value="";
		return false;
		}

	if (file_size5 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile5').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename6()
{
var file_name6 = "";
var file_size6 = "";
var file_ext6 = "";
var file_name_sample6 = "";
var file_name6 = document.getElementById('uploadFile6').files[0].name;
var file_ext6 = file_name6.substring(file_name6.lastIndexOf('.')+1);
var file_size6 = document.getElementById('uploadFile6').files[0].size;
var file_name_sample6 = document.getElementById('file_name_sample6').value;
var file_name_sample6 = file_name_sample6 + ".pdf";

	if (file_name6 != file_name_sample6)
		{
		alert("Use the required filename. " + " " + file_name6 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile6').value="";
		return false;
		}

	if (file_size6 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile6').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename7()
{
var file_name7 = "";
var file_size7 = "";
var file_ext7 = "";
var file_name_sample7 = "";
var file_name7 = document.getElementById('uploadFile7').files[0].name;
var file_ext7 = file_name7.substring(file_name7.lastIndexOf('.')+1);
var file_size7 = document.getElementById('uploadFile7').files[0].size;
var file_name_sample7 = document.getElementById('file_name_sample7').value;
var file_name_sample7 = file_name_sample7 + ".pdf";

	if (file_name7 != file_name_sample7)
		{
		alert("Use the required filename. " + " " + file_name7 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile7').value="";
		return false;
		}

	if (file_size7 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile7').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename8()
{
var file_name8 = "";
var file_size8 = "";
var file_ext8 = "";
var file_name_sample8 = "";
var file_name8 = document.getElementById('uploadFile8').files[0].name;
var file_ext8 = file_name8.substring(file_name8.lastIndexOf('.')+1);
var file_size8 = document.getElementById('uploadFile8').files[0].size;
var file_name_sample8 = document.getElementById('file_name_sample8').value;
var file_name_sample8 = file_name_sample8 + ".pdf";

	if (file_name8 != file_name_sample8)
		{
		alert("Use the required filename. " + " " + file_name8 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile8').value="";
		return false;
		}

	if (file_size8 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile8').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename9()
{
var file_name9 = "";
var file_size9 = "";
var file_ext9 = "";
var file_name_sample9 = "";
var file_name9 = document.getElementById('uploadFile9').files[0].name;
var file_ext9 = file_name9.substring(file_name9.lastIndexOf('.')+1);
var file_size9 = document.getElementById('uploadFile9').files[0].size;
var file_name_sample9 = document.getElementById('file_name_sample9').value;
var file_name_sample9 = file_name_sample9 + ".pdf";

	if (file_name9 != file_name_sample9)
		{
		alert("Use the required filename. " + " " + file_name9 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile9').value="";
		return false;
		}

	if (file_size9 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile9').value="";
		return false;
		}
}
</script>


</head>
<body onload = "choice10()">
<div class="viewbody">
<h2>GASS B1: Budget and Financial Accountability Reports (BFARs) - Edit Record</h2>
<hr/>

<!-- Edit form here -->
<form name="edit_bfar_form" id="edit_bfar_form" method="post" action="bfar_save_edited.php"  enctype="multipart/form-data">
<table>

<tr>
   	<td width="155"><div align="right">
	<strong>IMPORTANT REMINDERS:</strong></div>
	</td>
    
    	<td colspan="2" scope="row"><div align="left">
        <ol>
        <li>BFAR Reports submission reckoning year is 2016.</li>
	   	<li>If your response will be "Yes" in the following section, it means the report is compliant to Public Financial Management reporting requirements of the COA and the DBM in accordance with the prescribed content and period of submission under existing laws, rules and regulations.</li>
        </div>
        </ol>
        </td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>INSTRUCTIONS IN FILLING UP THE INPUT FORM:</strong></div>
	</td>
    
    	<td colspan="2" scope="row"><div align="left">
        <ol>
        <li>Across the report period, select Yes or No.</li>
	   	<li>Across the prescribed attachment filename, copy the prescribed filename to upload the PDF copy of acknowledgement receipt of submission.</li>
        <li> Across the File to upload, select the file with the prescribed filename from your computer; PDF only with 5MB limit.</li>
        </div>
        </ol>
        </td>
</tr>

<tr>
    <td width="155"><div align="right">Type of Reports</div></td>
 	<td width="500">
    <input type="radio" onchange="choice10(office)" name="office" id="officeb" <?php if (isset($office) && $office=="B") echo "checked";?>  value="B">Budgetary
   	<input type="radio" onchange="choice10(office)" name="office" id="officea" <?php if (isset($office) && $office=="A") echo "checked";?>  value="A">Accounting
	</td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>MONTHLY REPORT (FAR No. 4 - MRD) SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2015 Dec</div></td>
 	<td width="500">
    <input type="radio" onchange="choice1(bfar4_12)" disabled name="bfar4_12" id="pdecy" <?php if (isset($bfar4_12) && $bfar4_12=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice1(bfar4_12)" disabled name="bfar4_12" id="pdecn" <?php if (isset($bfar4_12) && $bfar4_12=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 1 Filename</div></td>
    <td width="500"><textarea name="file_name_display1" id="file_name_display1" readonly cols="50" rows="6" required><?php print $gass_bfar_4th_1; ?></textarea></td>
	<input name="file_name_sample1" hidden id="file_name_sample1" value="<?php print $gass_bfar_4th_1; ?>" />
</tr>

<tr>
	<td align="right">File 1 to upload</td>
    <td><input type="file" name="uploadFile1" id="uploadFile1" disabled required onblur="alertFilename1(uploadFile1)"></td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Jan</div></td>
 	<td width="500">
    <input type="radio" onchange="choice2(bfar4_1)" disabled name="bfar4_1" id="cjany" <?php if (isset($bfar4_1) && $bfar4_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice2(bfar4_1)" disabled name="bfar4_1" id="cjann" <?php if (isset($bfar4_1) && $bfar4_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Feb</div></td>
 	<td width="500">
    <input type="radio" onchange="choice2(bfar4_2)" disabled name="bfar4_2" id="cfeby" <?php if (isset($bfar4_2) && $bfar4_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice2(bfar4_2)" disabled name="bfar4_2" id="cfebn" <?php if (isset($bfar4_2) && $bfar4_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Mar</div></td>
 	<td width="500">
    <input type="radio" onchange="choice2(bfar4_3)" disabled name="bfar4_3" id="cmary" <?php if (isset($bfar4_3) && $bfar4_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice2(bfar4_3)" disabled name="bfar4_3" id="cmarn" <?php if (isset($bfar4_3) && $bfar4_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 2 Filename</div></td>
    <td width="500"><textarea name="file_name_display2" id="file_name_display2" readonly cols="50" rows="6" required><?php print $gass_bfar_1st; ?></textarea></td>
	<input name="file_name_sample2" hidden id="file_name_sample2" value="<?php print $gass_bfar_1st; ?>" />
</tr>

<tr>
	<td align="right">File 2 to upload</td>
    <td><input type="file" name="uploadFile2" id="uploadFile2" disabled required onblur="alertFilename2(uploadFile2)"></td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Apr</div></td>
 	<td width="500">
    <input type="radio" onchange="choice3(bfar4_4)" disabled name="bfar4_4" id="capry" <?php if (isset($bfar4_4) && $bfar4_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice3(bfar4_4)" disabled name="bfar4_4" id="caprn" <?php if (isset($bfar4_4) && $bfar4_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 May</div></td>
 	<td width="500">
    <input type="radio" onchange="choice3(bfar4_5)" disabled name="bfar4_5" id="cmayy" <?php if (isset($bfar4_5) && $bfar4_5=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice3(bfar4_5)" disabled name="bfar4_5" id="cmayn" <?php if (isset($bfar4_5) && $bfar4_5=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Jun</div></td>
 	<td width="500">
    <input type="radio" onchange="choice3(bfar4_6)" disabled name="bfar4_6" id="cjuny" <?php if (isset($bfar4_6) && $bfar4_6=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice3(bfar4_6)" disabled name="bfar4_6" id="cjunn" <?php if (isset($bfar4_6) && $bfar4_6=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 3 Filename</div></td>
    <td width="500"><textarea name="file_name_display3" id="file_name_display3" readonly cols="50" rows="6" required><?php print $gass_bfar_2nd; ?></textarea></td>
	<input name="file_name_sample3" hidden id="file_name_sample3" value="<?php print $gass_bfar_2nd; ?>" />
</tr>

<tr>
	<td align="right">File 3 to upload</td>
    <td><input type="file" name="uploadFile3" id="uploadFile3" disabled required onblur="alertFilename3(uploadFile3)"></td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Jul</div></td>
 	<td width="500">
    <input type="radio" onchange="choice4(bfar4_7)" disabled name="bfar4_7" id="cjuly" <?php if (isset($bfar4_7) && $bfar4_7=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice4(bfar4_7)" disabled name="bfar4_7" id="cjuln" <?php if (isset($bfar4_7) && $bfar4_7=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Aug</div></td>
 	<td width="500">
    <input type="radio" onchange="choice4(bfar4_8)" disabled name="bfar4_8" id="caugy" <?php if (isset($bfar4_8) && $bfar4_8=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice4(bfar4_8)" disabled name="bfar4_8" id="caugn" <?php if (isset($bfar4_8) && $bfar4_8=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Sep</div></td>
 	<td width="500">
    <input type="radio" onchange="choice4(bfar4_9)" disabled name="bfar4_9" id="csepy" <?php if (isset($bfar4_9) && $bfar4_9=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice4(bfar4_9)" disabled name="bfar4_9" id="csepn" <?php if (isset($bfar4_9) && $bfar4_9=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 4 Filename</div></td>
    <td width="500"><textarea name="file_name_display4" id="file_name_display4" readonly cols="50" rows="6" required><?php print $gass_bfar_3rd; ?></textarea></td>
	<input name="file_name_sample4" hidden id="file_name_sample4" value="<?php print $gass_bfar_3rd; ?>" />
</tr>

<tr>
	<td align="right">File 4 to upload</td>
    <td><input type="file" name="uploadFile4" id="uploadFile4" disabled required onblur="alertFilename4(uploadFile4)"></td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Oct</div></td>
 	<td width="500">
    <input type="radio" onchange="choice5(bfar4_10)" disabled name="bfar4_10" id="cocty" <?php if (isset($bfar4_10) && $bfar4_10=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice5(bfar4_10)" disabled name="bfar4_10" id="coctn" <?php if (isset($bfar4_10) && $bfar4_10=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Nov</div></td>
 	<td width="500">
    <input type="radio" onchange="choice5(bfar4_11)" disabled name="bfar4_11" id="cnovy" <?php if (isset($bfar4_11) && $bfar4_11=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice5(bfar4_11)" disabled name="bfar4_11" id="cnovn" <?php if (isset($bfar4_11) && $bfar4_11=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 5 Filename</div></td>
    <td width="500"><textarea name="file_name_display5" id="file_name_display5" readonly cols="50" rows="6" required><?php print $gass_bfar_4th_2; ?></textarea></td>
	<input name="file_name_sample5" hidden id="file_name_sample5" value="<?php print $gass_bfar_4th_2; ?>" />
</tr>

<tr>
	<td align="right">File 5 to upload</td>
    <td><input type="file" name="uploadFile5" id="uploadFile5" disabled required onblur="alertFilename5(uploadFile5)"></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>QUARTERLY REPORTS (2015 - 4th quarter) SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">BAR No. 1: QPRO</div></td>
 	<td width="500">
    <input type="radio" onchange="choice6(QPRO_4)" disabled name="QPRO_4" id="QPRO_4y" <?php if (isset($QPRO_4) && $QPRO_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice6(QPRO_4)" disabled name="QPRO_4" id="QPRO_4n" <?php if (isset($QPRO_4) && $QPRO_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1: SAAODB</div></td>
 	<td width="500">
    <input type="radio" onchange="choice6(SAAODB_4)" disabled name="SAAODB_4" id="SAAODB_4y" <?php if (isset($SAAODB_4) && $SAAODB_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice6(SAAODB_4)" disabled name="SAAODB_4" id="SAAODB_4n" <?php if (isset($SAAODB_4) && $SAAODB_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-A: SAAODBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice6(SAAODBOE_4)" disabled name="SAAODBOE_4" id="SAAODBOE_4y" <?php if (isset($SAAODBOE_4) && $SAAODBOE_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice6(SAAODBOE_4)" disabled name="SAAODBOE_4" id="SAAODBOE_4n" <?php if (isset($SAAODBOE_4) && $SAAODBOE_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-B: LASA</div></td>
 	<td width="500">
    <input type="radio" onchange="choice6(LASA_4)" disabled name="LASA_4" id="LASA_4y" <?php if (isset($LASA_4) && $LASA_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice6(LASA_4)" disabled name="LASA_4" id="LASA_4n" <?php if (isset($LASA_4) && $LASA_4=="N") echo "checked";?>  value="N">No <i>(Applicable to UP System Level only)</i>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2: (SABUDB)</div></td>
 	<td width="500">
    <input type="radio" onchange="choice6(SABUDB_4)" disabled name="SABUDB_4" id="SABUDB_4y" <?php if (isset($SABUDB_4) && $SABUDB_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice6(SABUDB_4)" disabled name="SABUDB_4" id="SABUDB_4n" <?php if (isset($SABUDB_4) && $SABUDB_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2-A: SABUDBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice6(SABUDBOE_4)" disabled name="SABUDBOE_4" id="SABUDBOE_4y" <?php if (isset($SABUDBOE_4) && $SABUDBOE_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice6(SABUDBOE_4)" disabled name="SABUDBOE_4" id="SABUDBOE_4n" <?php if (isset($SABUDBOE_4) && $SABUDBOE_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 5: QRROR</div></td>
 	<td width="500">
    <input type="radio" onchange="choice6(QRROR_4)" disabled name="QRROR_4" id="QRROR_4y" <?php if (isset($QRROR_4) && $QRROR_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice6(QRROR_4)" disabled name="QRROR_4" id="QRROR_4n" <?php if (isset($QRROR_4) && $QRROR_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>ANNUAL REPORT (2015 FAR No. 3 - ADDO) SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">BFAR 3: ADDO</div></td>
 	<td width="500">
    <input type="radio" onchange="choice6(ADDO_4)" disabled name="ADDO_4" id="ADDO_4y" <?php if (isset($ADDO_4) && $ADDO_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice6(ADDO_4)" disabled name="ADDO_4" id="ADDO_4n" <?php if (isset($ADDO_4) && $ADDO_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 6 Filename</div></td>
    <td width="500"><textarea name="file_name_display6" id="file_name_display6" readonly cols="50" rows="6" required><?php print $gass_bfar_rpt_4th; ?></textarea></td>
	<input name="file_name_sample6" hidden id="file_name_sample6" value="<?php print $gass_bfar_rpt_4th; ?>" />
</tr>

<tr>
	<td align="right">File 6 to upload</td>
    <td><input type="file" name="uploadFile6" id="uploadFile6" disabled required onblur="alertFilename6(uploadFile6)"></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>QUARTERLY REPORTS (2016 - 1st to 3rd quarters)</strong></div>
	</td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>FIRST QUARTER REPORTS SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">BAR No. 1: QPRO</div></td>
 	<td width="500">
    <input type="radio" onchange="choice7(QPRO_1)" disabled name="QPRO_1" id="QPRO_1y" <?php if (isset($QPRO_1) && $QPRO_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice7(QPRO_1)" disabled name="QPRO_1" id="QPRO_1n" <?php if (isset($QPRO_1) && $QPRO_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>


<tr>
    <td width="155"><div align="right">FAR No. 1: SAAODB</div></td>
 	<td width="500">
    <input type="radio" onchange="choice7(SAAODB_1)" disabled name="SAAODB_1" id="SAAODB_1y" <?php if (isset($SAAODB_1) && $SAAODB_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice7(SAAODB_1)" disabled name="SAAODB_1" id="SAAODB_1n" <?php if (isset($SAAODB_1) && $SAAODB_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-A: SAAODBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice7(SAAODBOE_1)" disabled name="SAAODBOE_1" id="SAAODBOE_1y" <?php if (isset($SAAODBOE_1) && $SAAODBOE_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice7(SAAODBOE_1)" disabled name="SAAODBOE_1" id="SAAODBOE_1n" <?php if (isset($SAAODBOE_1) && $SAAODBOE_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-B: LASA</div></td>
 	<td width="500">
    <input type="radio" onchange="choice7(LASA_1)" disabled name="LASA_1" id="LASA_1y" <?php if (isset($LASA_1) && $LASA_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice7(LASA_1)" disabled name="LASA_1" id="LASA_1n" <?php if (isset($LASA_1) && $LASA_1=="N") echo "checked";?>  value="N">No <i>(Applicable to UP System Level only)</i>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2: (SABUDB)</div></td>
 	<td width="500">
    <input type="radio" onchange="choice7(SABUDB_1)" disabled name="SABUDB_1" id="SABUDB_1y" <?php if (isset($SABUDB_1) && $SABUDB_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice7(SABUDB_1)" disabled name="SABUDB_1" id="SABUDB_1n" <?php if (isset($SABUDB_1) && $SABUDB_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2-A: SABUDBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice7(SABUDBOE_1)" disabled name="SABUDBOE_1" id="SABUDBOE_1y" <?php if (isset($SABUDBOE_1) && $SABUDBOE_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice7(SABUDBOE_1)" disabled name="SABUDBOE_1" id="SABUDBOE_1n" <?php if (isset($SABUDBOE_1) && $SABUDBOE_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 5: QRROR</div></td>
 	<td width="500">
    <input type="radio" onchange="choice7(QRROR_1)" disabled name="QRROR_1" id="QRROR_1y" <?php if (isset($QRROR_1) && $QRROR_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice7(QRROR_1)" disabled name="QRROR_1" id="QRROR_1n" <?php if (isset($QRROR_1) && $QRROR_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 7 Filename</div></td>
    <td width="500"><textarea name="file_name_display7" id="file_name_display7" readonly cols="50" rows="6" required><?php print $gass_bfar_rpt_1st; ?></textarea></td>
	<input name="file_name_sample7" hidden id="file_name_sample7" value="<?php print $gass_bfar_rpt_1st; ?>" />
</tr>

<tr>
	<td align="right">File 7 to upload</td>
    <td><input type="file" name="uploadFile7" id="uploadFile7" disabled required onblur="alertFilename7(uploadFile7)"></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>SECOND QUARTER REPORTS SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">BAR No. 1: QPRO</div></td>
 	<td width="500">
    <input type="radio" onchange="choice8(QPRO_2)" disabled name="QPRO_2" id="QPRO_2y" <?php if (isset($QPRO_2) && $QPRO_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice8(QPRO_2)" disabled name="QPRO_2" id="QPRO_2n" <?php if (isset($QPRO_2) && $QPRO_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1: SAAODB</div></td>
 	<td width="500">
    <input type="radio" onchange="choice8(SAAODB_2)" disabled name="SAAODB_2" id="SAAODB_2y" <?php if (isset($SAAODB_2) && $SAAODB_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice8(SAAODB_2)" disabled name="SAAODB_2" id="SAAODB_2n" <?php if (isset($SAAODB_2) && $SAAODB_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-A: SAAODBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice8(SAAODBOE_2)" disabled name="SAAODBOE_2" id="SAAODBOE_2y" <?php if (isset($SAAODBOE_2) && $SAAODBOE_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice8(SAAODBOE_2)" disabled name="SAAODBOE_2" id="SAAODBOE_2n" <?php if (isset($SAAODBOE_2) && $SAAODBOE_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-B: LASA</div></td>
 	<td width="500">
    <input type="radio" onchange="choice8(LASA_2)" disabled name="LASA_2" id="LASA_2y" <?php if (isset($LASA_2) && $LASA_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice8(LASA_2)" disabled name="LASA_2" id="LASA_2n" <?php if (isset($LASA_2) && $LASA_2=="N") echo "checked";?>  value="N">No <i>(Applicable to UP System Level only)</i>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2: (SABUDB)</div></td>
 	<td width="500">
    <input type="radio" onchange="choice8(SABUDB_2)" disabled name="SABUDB_2" id="SABUDB_2y" <?php if (isset($SABUDB_2) && $SABUDB_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice8(SABUDB_2)" disabled name="SABUDB_2" id="SABUDB_2n" <?php if (isset($SABUDB_2) && $SABUDB_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2-A: SABUDBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice8(SABUDBOE_2)" disabled name="SABUDBOE_2" id="SABUDBOE_2y" <?php if (isset($SABUDBOE_2) && $SABUDBOE_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice8(SABUDBOE_2)" disabled name="SABUDBOE_2" id="SABUDBOE_2n" <?php if (isset($SABUDBOE_2) && $SABUDBOE_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 5: QRROR</div></td>
 	<td width="500">
    <input type="radio" onchange="choice8(QRROR_2)" disabled name="QRROR_2" id="QRROR_2y" <?php if (isset($QRROR_2) && $QRROR_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice8(QRROR_2)" disabled name="QRROR_2" id="QRROR_2n" <?php if (isset($QRROR_2) && $QRROR_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 8 Filename</div></td>
    <td width="500"><textarea name="file_name_display8" id="file_name_display8" readonly cols="50" rows="6" required><?php print $gass_bfar_rpt_2nd; ?></textarea></td>
	<input name="file_name_sample8" hidden id="file_name_sample8" value="<?php print $gass_bfar_rpt_2nd; ?>" />
</tr>

<tr>
	<td align="right">File 8 to upload</td>
    <td><input type="file" name="uploadFile8" id="uploadFile8" disabled required onblur="alertFilename8(uploadFile8)"></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>THIRD QUARTER REPORTS SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">BAR No. 1: QPRO</div></td>
 	<td width="500">
    <input type="radio" onchange="choice9(QPRO_3)" disabled name="QPRO_3" id="QPRO_3y" <?php if (isset($QPRO_3) && $QPRO_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice9(QPRO_3)" disabled name="QPRO_3" id="QPRO_3n" <?php if (isset($QPRO_3) && $QPRO_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1: SAAODB</div></td>
 	<td width="500">
    <input type="radio" onchange="choice9(SAAODB_3)" disabled name="SAAODB_3" id="SAAODB_3y" <?php if (isset($SAAODB_3) && $SAAODB_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice9(SAAODB_3)" disabled name="SAAODB_3" id="SAAODB_3n" <?php if (isset($SAAODB_3) && $SAAODB_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-A: SAAODBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice9(SAAODBOE_3)" disabled name="SAAODBOE_3" id="SAAODBOE_3y" <?php if (isset($SAAODBOE_3) && $SAAODBOE_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice9(SAAODBOE_3)" disabled name="SAAODBOE_3" id="SAAODBOE_3n" <?php if (isset($SAAODBOE_3) && $SAAODBOE_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-B: LASA</div></td>
 	<td width="500">
    <input type="radio" onchange="choice9(LASA_3)" disabled name="LASA_3" id="LASA_3y" <?php if (isset($LASA_3) && $LASA_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice9(LASA_3)" disabled name="LASA_3" id="LASA_3n" <?php if (isset($LASA_3) && $LASA_3=="N") echo "checked";?>  value="N">No <i>(Applicable to UP System Level only)</i>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2: (SABUDB)</div></td>
 	<td width="500">
    <input type="radio" onchange="choice9(SABUDB_3)" disabled name="SABUDB_3" id="SABUDB_3y" <?php if (isset($SABUDB_3) && $SABUDB_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice9(SABUDB_3)" disabled name="SABUDB_3" id="SABUDB_3n" <?php if (isset($SABUDB_3) && $SABUDB_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2-A: SABUDBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice9(SABUDBOE_3)" disabled name="SABUDBOE_3" id="SABUDBOE_3y" <?php if (isset($SABUDBOE_3) && $SABUDBOE_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice9(SABUDBOE_3)" disabled name="SABUDBOE_3" id="SABUDBOE_3n" <?php if (isset($SABUDBOE_3) && $SABUDBOE_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 5: QRROR</div></td>
 	<td width="500">
    <input type="radio" onchange="choice9(QRROR_3)" disabled name="QRROR_3" id="QRROR_3y" <?php if (isset($QRROR_3) && $QRROR_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice9(QRROR_3)" disabled name="QRROR_3" id="QRROR_3n" <?php if (isset($QRROR_3) && $QRROR_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 9 Filename</div></td>
    <td width="500"><textarea name="file_name_display9" id="file_name_display9" readonly cols="50" rows="6" required><?php print $gass_bfar_rpt_3rd; ?></textarea></td>
	<input name="file_name_sample9" hidden id="file_name_sample9" value="<?php print $gass_bfar_rpt_3rd; ?>" />
</tr>

<tr>
	<td align="right">File 9 to upload</td>
    <td><input type="file" name="uploadFile9" id="uploadFile9" disabled required onblur="alertFilename9(uploadFile9)"></td>
</tr>

<tr>
   	<th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" />
       <input type="hidden" name="gass_formb_bfar_id" value="<?php print $gass_formb_bfar_id; ?>"><button type="submit">Submit</button></div>
	</th>
    </tr>

</table>
</form>
<?php
	//Free result set and close connection 
	$mysqli->close();
?>
</body>
</html>