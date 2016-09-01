<?php

include_once('getPGHrates.php');

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
	header('Location: deathrates_view_all.php');
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

// connect to the database
include_once('../connect-db.php');

// get the id from the url
$var_id = $_GET['id'];

// retrieve the record with such id
$query = "SELECT * FROM tbl_sd_5_mfo5_6_death_rate WHERE tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_id = '$var_id';";
$record_set = $mysqli->query($query)->fetch_object();

if ($record_set)
{
	// Get the header record
	$var_unit_delivery_id = $record_set->unit_delivery_id;
	$var_unit_contributor_id = $record_set->unit_contributor_id;
	
	$result = $mysqli->query("SELECT unit_delivery_name_cu, unit_contributor_name FROM tbl_units_contributor WHERE unit_contributor_id = '$var_unit_contributor_id';")->fetch_object();

	if ($result)
	{
			// set form variables to values in the retrieved row
			$var_unit_delivery_name_cu = $result->unit_delivery_name_cu;
			$var_unit_contributor_name = $result->unit_contributor_name;
	}
	
	// set form variables to values in the retrieved row mfo5_6_death_rate_jan_discharges
	$var_ndr_id = $record_set->mfo5_6_death_rate_id;

    $var_dischrg_01count = $record_set->mfo5_6_death_rate_jan_discharges;
    $var_d_01count = $record_set->mfo5_6_death_rate_jan_deaths;
    $var_dl48_01count = $record_set->mfo5_6_death_rate_jan_deaths_less_48hrs;
	$var_ndr_01count_pct = 100*getAverage($var_d_01count-$var_dl48_01count, $var_dischrg_01count-$var_dl48_01count);

    $var_dischrg_02count = $record_set->mfo5_6_death_rate_feb_discharges;
    $var_d_02count = $record_set->mfo5_6_death_rate_feb_deaths;
    $var_dl48_02count = $record_set->mfo5_6_death_rate_feb_deaths_less_48hrs;
	$var_ndr_02count_pct = 100*getAverage($var_d_02count-$var_dl48_02count, $var_dischrg_02count-$var_dl48_02count);

    $var_dischrg_03count = $record_set->mfo5_6_death_rate_mar_discharges;
    $var_d_03count = $record_set->mfo5_6_death_rate_mar_deaths;
    $var_dl48_03count = $record_set->mfo5_6_death_rate_mar_deaths_less_48hrs;
	$var_ndr_03count_pct = 100*getAverage($var_d_03count-$var_dl48_03count, $var_dischrg_03count-$var_dl48_03count);
    
	$var_dischrg_q1count = $record_set->mfo5_6_death_rate_qtr1_discharges;
    $var_d_q1count = $record_set->mfo5_6_death_rate_qtr1_deaths;
	$var_dl48_q1count = $record_set->mfo5_6_death_rate_qtr1_deaths_less_48hrs;
	$var_dischrgnet_q1count = $record_set->mfo5_6_death_rate_qtr1_discharges_denominator;
	$var_dnet_q1count = $record_set->mfo5_6_death_rate_qtr1_deaths_numerator;
	$var_ndr_q1count_pct = $record_set->mfo5_6_death_rate_qtr1_net_death_rate;
	
    $var_dischrg_04count = $record_set->mfo5_6_death_rate_apr_discharges;
    $var_d_04count = $record_set->mfo5_6_death_rate_apr_deaths;
    $var_dl48_04count = $record_set->mfo5_6_death_rate_apr_deaths_less_48hrs;
	$var_ndr_04count_pct = 100*getAverage($var_d_04count-$var_dl48_04count, $var_dischrg_04count-$var_dl48_04count);

    $var_dischrg_05count = $record_set->mfo5_6_death_rate_may_discharges;
    $var_d_05count = $record_set->mfo5_6_death_rate_may_deaths;
    $var_dl48_05count = $record_set->mfo5_6_death_rate_may_deaths_less_48hrs;
	$var_ndr_05count_pct = 100*getAverage($var_d_05count-$var_dl48_05count, $var_dischrg_05count-$var_dl48_05count);

	$var_dischrg_06count = $record_set->mfo5_6_death_rate_jun_discharges;
    $var_d_06count = $record_set->mfo5_6_death_rate_jun_deaths;
    $var_dl48_06count = $record_set->mfo5_6_death_rate_jun_deaths_less_48hrs;
	$var_ndr_06count_pct = 100*getAverage($var_d_06count-$var_dl48_06count, $var_dischrg_06count-$var_dl48_06count);

	$var_dischrg_q2count = $record_set->mfo5_6_death_rate_qtr2_discharges;
    $var_d_q2count = $record_set->mfo5_6_death_rate_qtr2_deaths;
	$var_dl48_q2count = $record_set->mfo5_6_death_rate_qtr2_deaths_less_48hrs;
	$var_dischrgnet_q2count = $record_set->mfo5_6_death_rate_qtr2_discharges_denominator;
	$var_dnet_q2count = $record_set->mfo5_6_death_rate_qtr2_deaths_numerator;
	$var_ndr_q2count_pct = $record_set->mfo5_6_death_rate_qtr2_net_death_rate;
	
	$var_dischrg_07count = $record_set->mfo5_6_death_rate_jul_discharges;
    $var_d_07count = $record_set->mfo5_6_death_rate_jul_deaths;
    $var_dl48_07count = $record_set->mfo5_6_death_rate_jul_deaths_less_48hrs;
	$var_ndr_07count_pct = 100*getAverage($var_d_07count-$var_dl48_07count, $var_dischrg_07count-$var_dl48_07count);

    $var_dischrg_08count = $record_set->mfo5_6_death_rate_aug_discharges;
    $var_d_08count = $record_set->mfo5_6_death_rate_aug_deaths;
    $var_dl48_08count = $record_set->mfo5_6_death_rate_aug_deaths_less_48hrs;
	$var_ndr_08count_pct = 100*getAverage($var_d_08count-$var_dl48_08count, $var_dischrg_08count-$var_dl48_08count);

    $var_dischrg_09count = $record_set->mfo5_6_death_rate_sep_discharges;
    $var_d_09count = $record_set->mfo5_6_death_rate_sep_deaths;
    $var_dl48_09count = $record_set->mfo5_6_death_rate_sep_deaths_less_48hrs;
	$var_ndr_09count_pct = 100*getAverage($var_d_09count-$var_dl48_09count, $var_dischrg_09count-$var_dl48_09count);
	
	$var_dischrg_q3count = $record_set->mfo5_6_death_rate_qtr3_discharges;
    $var_d_q3count = $record_set->mfo5_6_death_rate_qtr3_deaths;
	$var_dl48_q3count = $record_set->mfo5_6_death_rate_qtr3_deaths_less_48hrs;
	$var_dischrgnet_q3count = $record_set->mfo5_6_death_rate_qtr3_discharges_denominator;
	$var_dnet_q3count = $record_set->mfo5_6_death_rate_qtr3_deaths_numerator;
	$var_ndr_q3count_pct = $record_set->mfo5_6_death_rate_qtr3_net_death_rate;
	
    $var_dischrg_10count = $record_set->mfo5_6_death_rate_oct_discharges;
    $var_d_10count = $record_set->mfo5_6_death_rate_oct_deaths;
    $var_dl48_10count = $record_set->mfo5_6_death_rate_oct_deaths_less_48hrs;
	$var_ndr_10count_pct = 100*getAverage($var_d_10count-$var_dl48_10count, $var_dischrg_10count-$var_dl48_10count);

    $var_dischrg_11count = $record_set->mfo5_6_death_rate_nov_discharges;
    $var_d_11count = $record_set->mfo5_6_death_rate_nov_deaths;
    $var_dl48_11count = $record_set->mfo5_6_death_rate_nov_deaths_less_48hrs;
	$var_ndr_11count_pct = 100*getAverage($var_d_11count-$var_dl48_11count, $var_dischrg_11count-$var_dl48_11count);

    $var_dischrg_12count = $record_set->mfo5_6_death_rate_dec_discharges;
    $var_d_12count = $record_set->mfo5_6_death_rate_dec_deaths;
    $var_dl48_12count = $record_set->mfo5_6_death_rate_dec_deaths_less_48hrs;
	$var_ndr_12count_pct = 100*getAverage($var_d_12count-$var_dl48_12count, $var_dischrg_12count-$var_dl48_12count);
	
	$var_dischrg_q4count = $record_set->mfo5_6_death_rate_qtr4_discharges;
    $var_d_q4count = $record_set->mfo5_6_death_rate_qtr4_deaths;
	$var_dl48_q4count = $record_set->mfo5_6_death_rate_qtr4_deaths_less_48hrs;
	$var_dischrgnet_q4count = $record_set->mfo5_6_death_rate_qtr4_discharges_denominator;
	$var_dnet_q4count = $record_set->mfo5_6_death_rate_qtr4_deaths_numerator;
	$var_ndr_q4count_pct = $record_set->mfo5_6_death_rate_qtr4_net_death_rate;
	
	$var_dischrg_totalcount=$var_dischrg_q1count+$var_dischrg_q2count+$var_dischrg_q3count+$var_dischrg_q4count;
	$var_d_totalcount=$var_d_q1count+$var_d_q2count+$var_d_q3count+$var_d_q4count;
	$var_dl48_totalcount=$var_dl48_q1count+$var_dl48_q2count+$var_dl48_q3count+$var_dl48_q4count;
	$var_dischrgnet_totalcount = $record_set->mfo5_6_death_rate_all_discharges_denominator;
	$var_dnet_totalcount = $record_set->mfo5_6_death_rate_all_deaths_numerator;
	$var_ndr_totalcount_pct = $record_set->mfo5_6_death_rate_all_net_death_rate;
	
	$mysqli->close();
}
else
{
	$mysqli->close();
	header('Location: deathrates_view_all.php');
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
<script src="validfn-deathrates.js"></script>

</head>
<body>

	<div class="viewbody">
	<h2>MFO 5: In-Patient Net Death Rates - Edit Record</h2>
	<div class="viewlinks"><p><a href="deathrates_view_all.php">View All Records</a></p></div>
	<hr/>

	<!-- Edit form here -->
	<form name="EditForm" id="EditForm" method="post" action="deathrates_insert_update.php" onsubmit="return isValidForm()">

		<?php include_once('deathrates_table.php'); ?>
		
		<br>
		<div align="left">
			<!-- <input type="reset" value="Clear"> -->
			<input type="hidden" name="var_ndr_id" value="<?php if (isset($var_ndr_id)) echo $var_ndr_id; ?>"><button type="submit">Submit</button>
		</div>
	</form>
    
	</div>
</body>
</html>
