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
$jid = stripslashes($_POST['jid']);
$user_name = $_SESSION['user_name'];
$year_cover = stripslashes($_POST['year_cover']);
$cu = stripslashes($_POST['cu']);
$unit = stripslashes($_POST['unit']);
$journal_category = stripslashes($_POST['journal_category']);
$journal_title_article = stripslashes($_POST['journal_title_article']);
$journal_name = stripslashes($_POST['journal_name']);
$journal_sub_author = stripslashes($_POST['journal_sub_author']);
$journal_author = stripslashes($_POST['journal_author']);
$journal_publisher = stripslashes($_POST['journal_publisher']);
$journal_editor = stripslashes($_POST['journal_editor']);
$journal_cit_dbase = stripslashes($_POST['journal_cit_dbase']);
$journal_year_published = stripslashes($_POST['journal_year_published']);
$journal_vol = stripslashes($_POST['journal_vol']);
$journal_issue_no = stripslashes($_POST['journal_issue_no']);
$journal_num_pages = stripslashes($_POST['journal_num_pages']);
$journal_issn = stripslashes($_POST['journal_issn']);
$journal_circ_level = stripslashes($_POST['journal_circ_level']);
$journal_keyword = stripslashes($_POST['journal_keyword']);

//Validate

if ( $cu == '' ) {
print '<p>Error! Constituent university is missing.</p>';
exit();
}

if ( $unit == '' ) {
print '<p>Error! Unit is missing.</p>';
exit();
}

if ( $journal_category == '' ) {
print '<p>Error! Journal category is missing.</p>';
exit();
}

if ( $journal_title_article == '' ) {
print '<p>Error! Journal article title is missing.</p>';
exit();
}

if ( $journal_name == '' ) {
print '<p>Error! Journal name is missing.</p>';
exit();
}

if ( $journal_sub_author == '' ) {
print '<p>Error! Name of author is missing.</p>';
exit();
}

if ( $journal_author == '' ) {
print '<p>Error! Name of author is missing.</p>';
exit();
}

if ( $journal_publisher == '' ) {
print '<p>Error! Publisher is missing.</p>';
exit();
}

if ( $journal_editor == '' ) {
print '<p>Error! Editor is missing.</p>';
exit();
}

if ( $journal_year_published == '' ) {
print '<p>Error! Year of publication is missing.</p>';
exit();
}

if ( $journal_vol == '' ) {
print '<p>Error! Volume is missing.</p>';
exit();
}
if ( $journal_issue_no == '' ) {
print '<p>Error! Issue number is missing.</p>';
exit();
}
if ( $journal_num_pages == '' ) {
print '<p>Error! Number of pages is missing.</p>';
exit();
}

if ( $journal_circ_level == '' ) {
print '<p>Error! Circulation level is missing.</p>';
exit();
}

if ( $journal_keyword == '' ) {
print '<p>Error! Journal keyword is missing.</p>';
exit();
}

//Make the fields safe.
$jid = $mysqli->escape_string($jid);
$year_cover = $mysqli->escape_string($year_cover);
$cu = $mysqli->escape_string($cu);
$unit = $mysqli->escape_string($unit);
$journal_category = $mysqli->escape_string($journal_category);
$journal_title_article = $mysqli->escape_string($journal_title_article);
$journal_name = $mysqli->escape_string($journal_name);
$journal_sub_author = $mysqli->escape_string($journal_sub_author);
$journal_author = $mysqli->escape_string($journal_author);
$journal_publisher = $mysqli->escape_string($journal_publisher);
$journal_editor = $mysqli->escape_string($journal_editor);
$journal_cit_dbase = $mysqli->escape_string($journal_cit_dbase);
$journal_year_published = $mysqli->escape_string($journal_year_published);
$journal_vol = $mysqli->escape_string($journal_vol);
$journal_issue_no = $mysqli->escape_string($journal_issue_no);
$journal_num_pages = $mysqli->escape_string($journal_num_pages);
$journal_issn = $mysqli->escape_string($journal_issn);
$journal_circ_level = $mysqli->escape_string($journal_circ_level);
$journal_keyword = $mysqli->escape_string($journal_keyword);

//Create and run the SQL.
$query = "UPDATE tbl_journal_main_raw
SET
edited = NOW(), 
user_name = '$user_name',
year_cover = '$year_cover',
cu = '$cu',
unit = '$unit',
journal_category = '$journal_category',
journal_title_article = '$journal_title_article',
journal_name = '$journal_name',
journal_sub_author = '$journal_sub_author',
journal_author = '$journal_author',
journal_publisher = '$journal_publisher',
journal_editor = '$journal_editor',
journal_cit_dbase = '$journal_cit_dbase',
journal_year_published = '$journal_year_published',
journal_vol = '$journal_vol',
journal_issue_no = '$journal_issue_no',
journal_num_pages = '$journal_num_pages',
journal_issn = '$journal_issn',
journal_circ_level = '$journal_circ_level',
journal_keyword = '$journal_keyword'
WHERE jid = '$jid'";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
//echo "1 record edited";
header("Location: view-edited-journal.php?id=" . $jid);

mysqli_close($mysqli);

?>
