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
$user_name = stripslashes($_POST['user_name']);
$year_cover = stripslashes($_POST['year_cover']);
$cu = stripslashes($_POST['cu']);
$unit = stripslashes($_POST['unit']);
$publication_type = stripslashes($_POST['publication_type']);
$creative_discipline = stripslashes($_POST['creative_discipline']);
$creative_type = stripslashes($_POST['creative_type']);
$creative_review = stripslashes($_POST['creative_review']);
$creative_title = stripslashes($_POST['creative_title']);
$creative_sub_artist = stripslashes($_POST['creative_sub_artist']);
$creative_artist = stripslashes($_POST['creative_artist']);
$creative_publisher = stripslashes($_POST['creative_publisher']);
$creative_editor = stripslashes($_POST['creative_editor']);
$creative_cit_dbase = stripslashes($_POST['creative_cit_dbase']);
$creative_year_published = stripslashes($_POST['creative_year_published']);
$creative_circ_level = stripslashes($_POST['creative_circ_level']);
$creative_award = stripslashes($_POST['creative_award']);
$creative_keyword = stripslashes($_POST['creative_keyword']);

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

if ( $creative_discipline == '' ) {
print '<p>Error! creative category is missing.</p>';
exit();
}

if ( $creative_type == '' ) {
print '<p>Error! creative type is missing.</p>';
exit();
}

if ( $creative_review == '' ) {
print '<p>Error! creative peer review is missing.</p>';
exit();
}

if ( $creative_title == '' ) {
print '<p>Error! creative article title is missing.</p>';
exit();
}

if ( $creative_sub_artist == '' ) {
print '<p>Error! Name of submitting artist is missing.</p>';
exit();
}

if ( $creative_artist == '' ) {
print '<p>Error! Name of artist is missing.</p>';
exit();
}

if ( $creative_publisher == '' ) {
print '<p>Error! Publisher is missing.</p>';
exit();
}

if ( $creative_editor == '' ) {
print '<p>Error! Editor is missing.</p>';
exit();
}

if ( $creative_year_published == '' ) {
print '<p>Error! Year of publication is missing.</p>';
exit();
}

if ( $creative_circ_level == '' ) {
print '<p>Error! Circulation level is missing.</p>';
exit();
}

if ( $creative_keyword == '' ) {
print '<p>Error! creative keyword is missing.</p>';
exit();
}

//Make the fields safe.
$user_name = $mysqli->escape_string($user_name);
$year_cover = $mysqli->escape_string($year_cover);
$cu = $mysqli->escape_string($cu);
$unit = $mysqli->escape_string($unit);
$publication_type = $mysqli->escape_string($publication_type);
$creative_discipline = $mysqli->escape_string($creative_discipline);
$creative_type = $mysqli->escape_string($creative_type);
$creative_review = $mysqli->escape_string($creative_review);
$creative_title = $mysqli->escape_string($creative_title);
$creative_sub_artist = $mysqli->escape_string($creative_sub_artist);
$creative_artist = $mysqli->escape_string($creative_artist);
$creative_publisher = $mysqli->escape_string($creative_publisher);
$creative_editor = $mysqli->escape_string($creative_editor);
$creative_cit_dbase = $mysqli->escape_string($creative_cit_dbase);
$creative_year_published = $mysqli->escape_string($creative_year_published);
$creative_circ_level = $mysqli->escape_string($creative_circ_level);
$creative_award = $mysqli->escape_string($creative_award);
$creative_keyword = $mysqli->escape_string($creative_keyword);

//Create and run the SQL.
$query = "INSERT INTO tbl_creative_main_raw(created, user_name, year_cover, cu, unit, publication_type, creative_discipline, creative_type, creative_review, creative_title, creative_sub_artist, creative_artist, creative_publisher, creative_editor, creative_cit_dbase, creative_year_published, creative_circ_level, creative_award, creative_keyword) VALUES (NOW(), '$user_name', '$year_cover', '$cu', '$unit', '$publication_type', '$creative_discipline', '$creative_type', '$creative_review', '$creative_title', '$creative_sub_artist', '$creative_artist', '$creative_publisher', '$creative_editor', '$creative_cit_dbase', '$creative_year_published', '$creative_circ_level', '$creative_award', '$creative_keyword')";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

//echo "1 record added";
header("Location: view-input-creative.php");

mysqli_close($mysqli);

?>
</body>
</html>
