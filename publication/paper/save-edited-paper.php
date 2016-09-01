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

$pid = stripslashes($_POST['pid']);
$user_name = $_SESSION['user_name'];
$year_cover = stripslashes($_POST['year_cover']);
$cu = stripslashes($_POST['cu']);
$unit = stripslashes($_POST['unit']);
$paper_category = stripslashes($_POST['paper_category']);
$paper_title_paper = stripslashes($_POST['paper_title_paper']);
$paper_sub_researcher = stripslashes($_POST['paper_sub_researcher']);
$paper_researcher = stripslashes($_POST['paper_researcher']);
$paper_publisher = stripslashes($_POST['paper_publisher']);
$paper_editor = stripslashes($_POST['paper_editor']);
$paper_cit_dbase = stripslashes($_POST['paper_cit_dbase']);
$paper_year_published = stripslashes($_POST['paper_year_published']);
$paper_vol = stripslashes($_POST['paper_vol']);
$paper_issue_no = stripslashes($_POST['paper_issue_no']);
$paper_num_pages = stripslashes($_POST['paper_num_pages']);
$paper_circ_level = stripslashes($_POST['paper_circ_level']);
$paper_title_conference = stripslashes($_POST['paper_title_conference']);
$paper_venue_conference = stripslashes($_POST['paper_venue_conference']);
$paper_organizer_conference = stripslashes($_POST['paper_organizer_conference']);
$paper_confe_level = stripslashes($_POST['paper_confe_level']);
$paper_keyword = stripslashes($_POST['paper_keyword']);

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

if ( $paper_category == '' ) {
print '<p>Error! paper category is missing.</p>';
exit();
}

if ( $paper_title_paper == '' ) {
print '<p>Error! paper article title is missing.</p>';
exit();
}

if ( $paper_sub_researcher == '' ) {
print '<p>Error! Name of submitting researcher is missing.</p>';
exit();
}

if ( $paper_researcher == '' ) {
print '<p>Error! Name of researcher is missing.</p>';
exit();
}

if ( $paper_publisher == '' ) {
print '<p>Error! Publisher is missing.</p>';
exit();
}

if ( $paper_editor == '' ) {
print '<p>Error! Editor is missing.</p>';
exit();
}

if ( $paper_cit_dbase == '' ) {
print '<p>Error!  Citation database is missing.</p>';
exit();
}

if ( $paper_year_published == '' ) {
print '<p>Error! Year of publication is missing.</p>';
exit();
}

if ( $paper_vol == '' ) {
print '<p>Error! Volume is missing.</p>';
exit();
}

if ( $paper_issue_no == '' ) {
print '<p>Error! Issue number is missing.</p>';
exit();
}

if ( $paper_num_pages == '' ) {
print '<p>Error! Number of pages is missing.</p>';
exit();
}

if ( $paper_circ_level == '' ) {
print '<p>Error! Circulation level is missing.</p>';
exit();
}

if ( $paper_title_conference == '' ) {
print '<p>Error! Name of conference is missing.</p>';
exit();
}

if ( $paper_venue_conference == '' ) {
print '<p>Error! Venue of conference is missing.</p>';
exit();
}

if ( $paper_organizer_conference == '' ) {
print '<p>Error! Name of organizer of the conference is missing.</p>';
exit();
}

if ( $paper_confe_level == '' ) {
print '<p>Error! Circulation level is missing.</p>';
exit();
}

if ( $paper_keyword == '' ) {
print '<p>Error! Paper keyword is missing.</p>';
exit();
}

//Make the fields safe.

$pid = $mysqli->escape_string($pid);
$year_cover = $mysqli->escape_string($year_cover);
$cu = $mysqli->escape_string($cu);
$unit = $mysqli->escape_string($unit);
$paper_category = $mysqli->escape_string($paper_category);
$paper_title_paper = $mysqli->escape_string($paper_title_paper);
$paper_sub_researcher = $mysqli->escape_string($paper_sub_researcher);
$paper_researcher = $mysqli->escape_string($paper_researcher);
$paper_publisher = $mysqli->escape_string($paper_publisher);
$paper_editor = $mysqli->escape_string($paper_editor);
$paper_cit_dbase = $mysqli->escape_string($paper_cit_dbase);
$paper_year_published = $mysqli->escape_string($paper_year_published);
$paper_vol = $mysqli->escape_string($paper_vol);
$paper_issue_no = $mysqli->escape_string($paper_issue_no);
$paper_num_pages = $mysqli->escape_string($paper_num_pages);
$paper_circ_level = $mysqli->escape_string($paper_circ_level);
$paper_title_conference = $mysqli->escape_string($paper_title_conference);
$paper_venue_conference = $mysqli->escape_string($paper_venue_conference);
$paper_organizer_conference = $mysqli->escape_string($paper_organizer_conference);
$paper_confe_level = $mysqli->escape_string($paper_confe_level);
$paper_keyword = $mysqli->escape_string($paper_keyword);

//Create and run the SQL.
$query = "UPDATE tbl_paper_main_raw
SET
edited = NOW(), 
user_name = '$user_name',
year_cover = '$year_cover',
cu = '$cu',
unit = '$unit',
paper_category = '$paper_category',
paper_title_paper = '$paper_title_paper',
paper_sub_researcher = '$paper_sub_researcher',
paper_researcher = '$paper_researcher',
paper_publisher = '$paper_publisher',
paper_editor = '$paper_editor',
paper_cit_dbase = '$paper_cit_dbase',
paper_year_published = '$paper_year_published',
paper_vol = '$paper_vol',
paper_issue_no = '$paper_issue_no',
paper_num_pages = '$paper_num_pages',
paper_circ_level = '$paper_circ_level',
paper_title_conference = '$paper_title_conference',
paper_venue_conference = '$paper_venue_conference',
paper_date_conference = STR_TO_DATE('$_POST[paper_date_conference]','%m/%d/%Y'),
paper_organizer_conference = '$paper_organizer_conference',
paper_confe_level = '$paper_confe_level',
paper_keyword = '$paper_keyword'
WHERE pid = '$pid'";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
//echo "1 record edited";
header("Location: view-edited-paper.php?id=" . $pid);

mysqli_close($mysqli);

?>
