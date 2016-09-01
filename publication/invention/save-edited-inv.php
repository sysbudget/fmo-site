<?php
session_name("publication"); 
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id_publication']) || $_SESSION['user_id_publication'] !== true) {

// not logged in, move to login page

header('Location: ../login/login_mysqli.php');

exit;

}

// connect to the database
include('../connect-db.php');
//Get the form fields.
$invid = stripslashes($_POST['invid']);
$user_name = $_SESSION['user_name'];
$year_cover = stripslashes($_POST['year_cover']);
$cu = stripslashes($_POST['cu']);
$unit = stripslashes($_POST['unit']);
$inv_sub_inventor = stripslashes($_POST['inv_sub_inventor']);
$inv_inventor = stripslashes($_POST['inv_inventor']);
$inv_invention = stripslashes($_POST['inv_invention']);
$inv_applied = stripslashes($_POST['inv_applied']);
$inv_patented = stripslashes($_POST['inv_patented']);
$inv_commercial = stripslashes($_POST['inv_commercial']);
$inv_adopted = stripslashes($_POST['inv_adopted']);
$inv_patent_num = stripslashes($_POST['inv_patent_num']);
$inv_development = stripslashes($_POST['inv_development']);
$inv_service = stripslashes($_POST['inv_service']);
$inv_end_product = stripslashes($_POST['inv_end_product']);
$inv_product_name = stripslashes($_POST['inv_product_name']);
$inv_award = stripslashes($_POST['inv_award']);
$inv_keyword = stripslashes($_POST['inv_keyword']);

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

if ( $inv_sub_inventor == '' ) {
print '<p>Error! Name of submitting inventor is missing.</p>';
exit();
}

if ( $inv_invention == '' ) {
print '<p>Error! Name of inventor is missing.</p>';
exit();
}

if ( $inv_invention == '' ) {
print '<p>Error! Name of invention is missing.</p>';
exit();
}

if ( $inv_patent_num == '' ) {
print '<p>Error! Patent number missing.</p>';
exit();
}

if ( $inv_product_name == '' ) {
print '<p>Error! Name of commercial product is missing.</p>';
exit();
}

if ( $inv_keyword == '' ) {
print '<p>Error! Invention keyword is missing.</p>';
exit();
}

//Make the fields safe.
$invid = $mysqli->escape_string($invid);
$year_cover = $mysqli->escape_string($year_cover);
$cu = $mysqli->escape_string($cu);
$unit = $mysqli->escape_string($unit);
$inv_sub_inventor = $mysqli->escape_string($inv_sub_inventor);
$inv_inventor = $mysqli->escape_string($inv_inventor);
$inv_invention = $mysqli->escape_string($inv_invention);
$inv_applied = $mysqli->escape_string($inv_applied);
$inv_patented = $mysqli->escape_string($inv_patented);
$inv_commercial = $mysqli->escape_string($inv_commercial);
$inv_adopted = $mysqli->escape_string($inv_adopted);
$inv_patent_num = $mysqli->escape_string($inv_patent_num);
$inv_development = $mysqli->escape_string($inv_development);
$inv_service = $mysqli->escape_string($inv_service);
$inv_end_product = $mysqli->escape_string($inv_end_product);
$inv_product_name = $mysqli->escape_string($inv_product_name);
$inv_award = $mysqli->escape_string($inv_award);
$inv_keyword = $mysqli->escape_string($inv_keyword);

//Create and run the SQL.
$query = "UPDATE tbl_invention_main_raw
SET
edited = NOW(), 
user_name = '$user_name',
year_cover = '$year_cover',
cu = '$cu',
unit = '$unit',
inv_sub_inventor = '$inv_sub_inventor',
inv_inventor = '$inv_inventor',
inv_invention = '$inv_invention',
inv_applied = '$inv_applied',
inv_patented = '$inv_patented',
inv_commercial = '$inv_commercial',
inv_adopted = '$inv_adopted',
inv_patent_num = '$inv_patent_num',
inv_date_issue = STR_TO_DATE('$_POST[start_date]','%m/%d/%Y'),
inv_development = '$inv_development',
inv_service = '$inv_service',
inv_end_product = '$inv_end_product',
inv_product_name = '$inv_product_name',
inv_award = '$inv_award',
inv_keyword = '$inv_keyword'
WHERE invid = '$invid'";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
//echo "1 record edited";
header("Location: view-edited-inv.php?id=" . $invid);

mysqli_close($mysqli);

?>
