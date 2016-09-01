<?php
				session_name("scholarship"); 
				session_start();
				// is the one accessing this page logged in or not?

				if ( !isset($_SESSION['user_id_scholarship']) || $_SESSION['user_id_scholarship'] !== true) {

				// not logged in, move to login page

				header('Location: ../login/login_mysqli.php');

				exit;

					}

// connect to the database
include('../connect-db.php');

//Get the form fields.
$user_name = stripslashes($_POST['user_name']);
$year_cover = stripslashes($_POST['year_cover']);
$cu = stripslashes($_POST['cu']);
$coll_nm = stripslashes($_POST['coll_nm']);
$scho_nm_list = stripslashes($_POST['scho_nm_list']);
$scho_nm_alt = stripslashes($_POST['scho_nm_alt']);
$fund_source = stripslashes($_POST['fund_source']);
$sponsor = stripslashes($_POST['sponsor']);
$pre_bacc = stripslashes($_POST['pre_bacc']);
$bacc = stripslashes($_POST['bacc']);
$post_bacc = stripslashes($_POST['post_bacc']);
$master = stripslashes($_POST['master']);
$doctor = stripslashes($_POST['doctor']);
$ni = stripslashes($_POST['ni']);

//Validate

if ( $year_cover == '' ) {
print '<p>Error! Year covered is missing.</p>';
exit();
}

if ( $cu == '' ) {
print '<p>Error! Constituent university is missing.</p>';
exit();
}

if ( $coll_nm == '' ) {
print '<p>Error! College recipient is missing.</p>';
exit();
}

if ( $scho_nm_list == '' ) {
print '<p>Error! Name of Scholarship is missing.</p>';
exit();
}
if ( $scho_nm_list == '-Not Listed-' and $scho_nm_alt == '') {
print '<p>Error! Input Name of Scholarship/Fellowship..</p>';
exit();
}

if ( $scho_nm_list !== '-Not Listed-' and $scho_nm_alt !== '') {
print '<p>Error! Select from List or Input Name of Scholarship/Fellowship.</p>';
exit();
}

if ( $fund_source == '' ) {
print '<p>Error! Source of Fund is missing.</p>';
exit();
}

if ( $sponsor == '' ) {
print '<p>Error! Sponsor is missing.</p>';
exit();
}

if ( $pre_bacc == '' ) {
print '<p>Error! Pre-Baccalaureate is missing.</p>';
exit();
}

if ( $bacc == '' ) {
print '<p>Error! Baccalaureate is missing.</p>';
exit();
}

if ( $post_bacc == '' ) {
print '<p>Error! Post-Baccalaureate is missing.</p>';
exit();
}

if ( $master == '' ) {
print '<p>Error! Masteral is missing.</p>';
exit();
}

if ( $doctor == '' ) {
print '<p>Error! Doctorate is missing.</p>';
exit();
}

if ( $ni == '' ) {
print '<p>Error! Not Indicated is missing.</p>';
exit();
}

//Make the fields safe.
$user_name = $mysqli->escape_string($user_name);
$year_cover = $mysqli->escape_string($year_cover);
$cu = $mysqli->escape_string($cu);
$coll_nm = $mysqli->escape_string($coll_nm);
$scho_nm_list = $mysqli->escape_string($scho_nm_list);
$scho_nm_alt = $mysqli->escape_string($scho_nm_alt);
$fund_source = $mysqli->escape_string($fund_source);
$sponsor = $mysqli->escape_string($sponsor);
$pre_bacc = $mysqli->escape_string($pre_bacc);
$bacc = $mysqli->escape_string($bacc);
$post_bacc = $mysqli->escape_string($post_bacc);
$master = $mysqli->escape_string($master);
$doctor = $mysqli->escape_string($doctor);
$ni = $mysqli->escape_string($ni);

//Create and run the SQL.
$query = "INSERT INTO tbl_main(created, user_name, year_cover, cu, coll_nm, scho_nm_list, scho_nm_alt, fund_source, sponsor, pre_bacc, bacc, post_bacc, master, doctor, ni) VALUES (NOW(), '$user_name', '$year_cover', '$cu', '$coll_nm', '$scho_nm_list', '$scho_nm_alt', '$fund_source', '$sponsor', '$pre_bacc', '$bacc', '$post_bacc', '$master', '$doctor', '$ni')";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

echo "1 record added";
header("Location: view-input-scholar.php");

mysqli_close($mysqli);

?>
</body>
</html>
