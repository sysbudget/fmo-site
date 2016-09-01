<?php
session_name("research_extension");
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

// not logged in, move to login page

header('Location: ../login/login_mysqli.php');

exit;

}

// connect to the database
	include('../connect-db.php');

//Get the form fields.
$rid = stripslashes($_POST['rid']);
$user_name = $_SESSION['user_name'];
$year_cover = stripslashes($_POST['year_cover']);
$cu = stripslashes($_POST['cu']);
$unit = stripslashes($_POST['unit']);
$rsrch_title = stripslashes($_POST['rsrch_title']);
$status = stripslashes($_POST['status']);
$objective = stripslashes($_POST['objective']);
$rsrch_type = stripslashes($_POST['rsrch_type']);
$interest = stripslashes($_POST['interest']);
$out_imp = stripslashes($_POST['out_imp']);
$sponsor = stripslashes($_POST['sponsor']);
$curr_gen_fund = stripslashes($_POST['curr_gen_fund']);
$gen_fund = stripslashes($_POST['gen_fund']);
$curr_revolv_fund = stripslashes($_POST['curr_revolv_fund']);
$revolv_fund = stripslashes($_POST['revolv_fund']);
$curr_oth_fund = stripslashes($_POST['curr_oth_fund']);
$other_fund = stripslashes($_POST['other_fund']);
$curr_npriv_fund = stripslashes($_POST['curr_npriv_fund']);
$npriv_fund = stripslashes($_POST['npriv_fund']);
$curr_ipriv_fund = stripslashes($_POST['curr_ipriv_fund']);
$ipriv_fund = stripslashes($_POST['ipriv_fund']);
$faculty = stripslashes($_POST['faculty']);
$reps = stripslashes($_POST['reps']);
$other_staff = stripslashes($_POST['other_staff']);

//Validate
if ( $year_cover == '') {
print "Error! Year covered is missing";
exit();
}

if ( $cu == '' ) {
print '<p>Error! Constituent university is missing.</p>';
exit();
}

if ( $unit == '' ) {
print '<p>Error! Unit is missing.</p>';
exit();
}

if ( $rsrch_title == '' ) {
print '<p>Error! Research title is missing.</p>';
exit();
}

if ( $status == '' ) {
print '<p>Error! Status is missing.</p>';
exit();
}

if ( $objective == '' ) {
print '<p>Error! Objective is missing.</p>';
exit();
}

if ( $rsrch_type == '' ) {
print '<p>Error! Research type is missing.</p>';
exit();
}

if ( $interest == '' ) {
print '<p>Error! Interest is missing.</p>';
exit();
}

if ( $out_imp == '' ) {
print '<p>Error! Impact is missing.</p>';
exit();
}


if ( $sponsor == '' ) {
print '<p>Error! Sponsor is missing.</p>';
exit();
}

if ( $gen_fund == '' ) {
  print '<p>Error! General Fund is missing.</p>';
  exit();
}

if ( $gen_fund < 0 ) {
  print "<p>Error! General Fund is too low or is not a number: $gen_fund.</p>";
  exit();
}

if ( $revolv_fund == '' ) {
  print '<p>Error! Revolving Fund is missing.</p>';
  exit();
}

if ( $revolv_fund < 0 ) {
  print "<p>Error! Revolving Fund is too low or is not a number: $revolv_fund.</p>";
  exit();
}

if ( $other_fund == '' ) {
  print '<p>Error! Other Fund is missing.</p>';
  exit();
}

if ( $other_fund < 0 ) {
  print "<p>Error! Other Fund is too low or is not a number: $other_fund.</p>";
  exit();
}

if ( $npriv_fund == '' ) {
  print '<p>Error! Private Fund is missing.</p>';
  exit();
}

if ( $npriv_fund < 0 ) {
  print "<p>Error! National Private Fund is too low or is not a number: $priv_fund.</p>";
  exit();
}

if ( $ipriv_fund == '' ) {
  print '<p>Error! Private Fund is missing.</p>';
  exit();
}

if ( $ipriv_fund < 0 ) {
  print "<p>Error! International Private Fund is too low or is not a number: $priv_fund.</p>";
  exit();
}


if ( $faculty == '' ) {
print '<p>Error! Faculty is missing.</p>';
exit();
}

//Make the fields safe.
$rid = $mysqli->escape_string($rid);
$year_cover = $mysqli->escape_string($year_cover);
$cu = $mysqli->escape_string($cu);
$unit = $mysqli->escape_string($unit);
$rsrch_title = $mysqli->escape_string($rsrch_title);
$status = $mysqli->escape_string($status);
$objective = $mysqli->escape_string($objective);
$rsrch_type = $mysqli->escape_string($rsrch_type);
$interest = $mysqli->escape_string($interest);
$out_imp = $mysqli->escape_string($out_imp);
$sponsor = $mysqli->escape_string($sponsor);
$curr_gen_fund = $mysqli->escape_string($curr_gen_fund);
$gen_fund = $mysqli->escape_string($gen_fund);
$curr_revolv_fund = $mysqli->escape_string($curr_revolv_fund);
$revolv_fund = $mysqli->escape_string($revolv_fund);
$curr_oth_fund = $mysqli->escape_string($curr_oth_fund);
$other_fund = $mysqli->escape_string($other_fund);
$curr_npriv_fund = $mysqli->escape_string($curr_npriv_fund);
$npriv_fund = $mysqli->escape_string($npriv_fund);
$curr_ipriv_fund = $mysqli->escape_string($curr_ipriv_fund);
$ipriv_fund = $mysqli->escape_string($ipriv_fund);
$faculty = $mysqli->escape_string($faculty);
$reps = $mysqli->escape_string($reps);
$other_staff = $mysqli->escape_string($other_staff);

//Create and run the SQL.
$query = "UPDATE tbl_research_main_raw
SET
edited = NOW(), 
user_name = '$user_name',
year_cover = '$year_cover',
cu = '$cu',
unit = '$unit',
rsrch_title = '$rsrch_title',
status = '$status',
start_date = STR_TO_DATE('$_POST[start_date]','%m/%d/%Y'),
end_date = STR_TO_DATE('$_POST[end_date]','%m/%d/%Y'),
objective = '$objective',
rsrch_type = '$rsrch_type',
interest = '$interest',
out_imp = '$out_imp',
sponsor = '$sponsor',
curr_gen_fund = '$curr_gen_fund',
gen_fund = $gen_fund,
curr_revolv_fund = '$curr_revolv_fund',
revolv_fund = $revolv_fund,
curr_oth_fund = '$curr_oth_fund',
other_fund = $other_fund,
curr_npriv_fund = '$curr_npriv_fund',
npriv_fund = $npriv_fund,
curr_ipriv_fund = '$curr_ipriv_fund',
ipriv_fund = $ipriv_fund,
faculty = '$faculty',
reps = '$reps',
other_staff = '$other_staff'
WHERE rid = $rid";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
//echo "1 record added";
//header("Location: ../research/view-input.php");
header("Location: ../research/view-edited-research.php?id=" . $rid);

mysqli_close($mysqli);

?>
