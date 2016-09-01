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
$eid = stripslashes($_POST['eid']);
$user_name = $_SESSION['user_name'];
$year_cover = stripslashes($_POST['year_cover']);
$cu = stripslashes($_POST['cu']);
$unit = stripslashes($_POST['unit']);
$extension_title = stripslashes($_POST['extension_title']);
$num_session = stripslashes($_POST['num_session']);
$hrs_session = stripslashes($_POST['hrs_session']);
$objective = stripslashes($_POST['objective']);
$out_imp = stripslashes($_POST['out_imp']);
$interest_ext = stripslashes($_POST['interest_ext']);
$prog_class = stripslashes($_POST['prog_class']);
$activity_type = stripslashes($_POST['activity_type']);
$client_type = stripslashes($_POST['client_type']);
$client_count = stripslashes($_POST['client_count']);
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
$adj_ladder = stripslashes($_POST['adj_ladder']);

//Validate

if ( $year_cover == '' ) {
print '<p>Error! Year covered is missing.</p>';
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

if ( $extension_title == '' ) {
print '<p>Error! Extension title is missing.</p>';
exit();
}

if ( $num_session == '' ) {
print '<p>Error! Number of session is missing.</p>';
exit();
}

if ( $num_session < 0 ) {
  print "<p>Error! Number of session is too low or is not a number: $num_session.</p>";
exit();
}

if ( $hrs_session == '' ) {
print '<p>Error! Number of hours per session is missing.</p>';
exit();
}

if ( $hrs_session < 0 ) {
  print "<p>Error! Number of hours per session is too low or is not a number: $hrs_session.</p>";
  exit();
}

if ( $objective == '' ) {
print '<p>Error! Objective is missing.</p>';
exit();
}

if ( $out_imp == '' ) {
print '<p>Error!  Nature of output or impact is missing.</p>';
exit();
}

if ( $interest_ext == '' ) {
print '<p>Error! Interest is missing.</p>';
exit();
}

if ( $prog_class == '' ) {
print '<p>Error! Program class is missing.</p>';
exit();
}

if ( $activity_type == '' ) {
print '<p>Error! Activity type is missing.</p>';
exit();
}

if ( $client_type == '' ) {
print '<p>Error! Client type is missing.</p>';
exit();
}

if ( $client_count == '' ) {
print '<p>Error! Number of clients is missing.</p>';
exit();
}

if ( $client_count < 0 ) {
  print "<p>Error! Number of clients is too low or is not a number: $client_count.</p>";
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
  print "<p>Error! Revolving Fund is too low or is not a number: $priv_fund.</p>";
  exit();
}

if ( $ipriv_fund == '' ) {
  print '<p>Error! Private Fund is missing.</p>';
  exit();
}

if ( $ipriv_fund < 0 ) {
  print "<p>Error! Revolving Fund is too low or is not a number: $priv_fund.</p>";
  exit();
}

if ( $faculty == '' ) {
print '<p>Error! Faculty is missing.</p>';
exit();
}

//Make the fields safe.
$year_cover = $mysqli->escape_string($year_cover);
$cu = $mysqli->escape_string($cu);
$unit = $mysqli->escape_string($unit);
$extension_title = $mysqli->escape_string($extension_title);
$num_session = $mysqli->escape_string($num_session);
$hrs_session = $mysqli->escape_string($hrs_session);
$objective = $mysqli->escape_string($objective);
$out_imp = $mysqli->escape_string($out_imp);
$interest_ext = $mysqli->escape_string($interest_ext);
$prog_class = $mysqli->escape_string($prog_class);
$activity_type = $mysqli->escape_string($activity_type);
$client_type = $mysqli->escape_string($client_type);
$client_count = $mysqli->escape_string($client_count);
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
$adj_ladder = $mysqli->escape_string($adj_ladder);

//Create and run the SQL.
$query = "UPDATE tbl_extension_main_raw
SET
edited = NOW(), 
user_name = '$user_name', 
year_cover = '$year_cover',
cu = '$cu',
unit = '$unit',
extension_title = '$extension_title',
prep_edate = STR_TO_DATE('$_POST[prep_edate]','%m/%d/%Y'),
sign_edate = STR_TO_DATE('$_POST[sign_edate]','%m/%d/%Y'),
imple_sdate = STR_TO_DATE('$_POST[imple_sdate]','%m/%d/%Y'),
imple_edate = STR_TO_DATE('$_POST[imple_edate]','%m/%d/%Y'),
close_edate = STR_TO_DATE('$_POST[close_edate]','%m/%d/%Y'),
num_session = '$num_session', 
hrs_session = '$hrs_session', 
objective = '$objective',
out_imp = '$out_imp',
interest_ext = '$interest_ext',
prog_class = '$prog_class',
activity_type = '$activity_type',
client_type = '$client_type',
client_count = '$client_count',
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
other_staff = '$other_staff',
adj_ladder = '$adj_ladder'
WHERE eid = $eid";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
//echo "1 record added";
//header("Location: ../research/view-input.php");
header("Location: ../extension/view-edited-extension.php?id=" . $eid);

mysqli_close($mysqli);

?>
