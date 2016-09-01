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
$bcid = stripslashes($_POST['bcid']);
$user_name = $_SESSION['user_name'];
$year_cover = stripslashes($_POST['year_cover']);
$cu = stripslashes($_POST['cu']);
$unit = stripslashes($_POST['unit']);
$chapter_category = stripslashes($_POST['chapter_category']);
$chapter_title = stripslashes($_POST['chapter_title']);
$chapter_book_title = stripslashes($_POST['chapter_book_title']);
$chapter_sub_author = stripslashes($_POST['chapter_sub_author']);
$chapter_author = stripslashes($_POST['chapter_author']);
$chapter_book_publisher = stripslashes($_POST['chapter_book_publisher']);
$chapter_book_editor = stripslashes($_POST['chapter_book_editor']);
$chapter_cit_dbase = stripslashes($_POST['chapter_cit_dbase']);
$chapter_book_year_published = stripslashes($_POST['chapter_book_year_published']);
$chapter_book_edition = stripslashes($_POST['chapter_book_edition']);
$chapter_num_pages = stripslashes($_POST['chapter_num_pages']);
$chapter_book_isbn = stripslashes($_POST['chapter_book_isbn']);
$chapter_book_circ_level = stripslashes($_POST['chapter_book_circ_level']);
$chapter_keyword = stripslashes($_POST['chapter_keyword']);

//Validate

if ( $cu == '' ) {
print '<p>Error! Constituent university is missing.</p>';
exit();
}

if ( $unit == '' ) {
print '<p>Error! Unit is missing.</p>';
exit();
}

if ( $chapter_category == '' ) {
print '<p>Error! Chapter category is missing.</p>';
exit();
}

if ( $chapter_title == '' ) {
print '<p>Error! Chapter title is missing.</p>';
exit();
}

if ( $chapter_book_title == '' ) {
print '<p>Error! Book title is missing.</p>';
exit();
}

if ( $chapter_sub_author == '' ) {
print '<p>Error! Name of submitting author is missing.</p>';
exit();
}

if ( $chapter_author == '' ) {
print '<p>Error! Name of author is missing.</p>';
exit();
}

if ( $chapter_book_publisher == '' ) {
print '<p>Error! Book publisher is missing.</p>';
exit();
}

if ( $chapter_book_editor == '' ) {
print '<p>Error! Book editor is missing.</p>';
exit();
}

if ( $chapter_cit_dbase == '' ) {
print '<p>Error! Citation database is missing.</p>';
exit();
}

if ( $chapter_book_year_published == '' ) {
print '<p>Error! Year of publication is missing.</p>';
exit();
}

if ( $chapter_book_edition == '' ) {
print '<p>Error! Book edition is missing.</p>';
exit();
}

if ( $chapter_num_pages == '' ) {
print '<p>Error! Number of pages is missing.</p>';
exit();
}

if ( $chapter_book_circ_level == '' ) {
print '<p>Error! Circulation level is missing.</p>';
exit();
}

if ( $chapter_keyword == '' ) {
print '<p>Error! Chapter keyword is missing.</p>';
exit();
}

//Make the fields safe.
$bcid = $mysqli->escape_string($bcid);
$year_cover = $mysqli->escape_string($year_cover);
$cu = $mysqli->escape_string($cu);
$unit = $mysqli->escape_string($unit);
$chapter_category = $mysqli->escape_string($chapter_category);
$chapter_title = $mysqli->escape_string($chapter_title);
$chapter_book_title = $mysqli->escape_string($chapter_book_title);
$chapter_sub_author = $mysqli->escape_string($chapter_sub_author);
$chapter_author = $mysqli->escape_string($chapter_author);
$chapter_book_publisher = $mysqli->escape_string($chapter_book_publisher);
$chapter_book_editor = $mysqli->escape_string($chapter_book_editor);
$chapter_cit_dbase = $mysqli->escape_string($chapter_cit_dbase);
$chapter_book_year_published = $mysqli->escape_string($chapter_book_year_published);
$chapter_book_edition = $mysqli->escape_string($chapter_book_edition);
$chapter_num_pages = $mysqli->escape_string($chapter_num_pages);
$chapter_book_isbn = $mysqli->escape_string($chapter_book_isbn);
$chapter_book_circ_level = $mysqli->escape_string($chapter_book_circ_level);
$chapter_keyword = $mysqli->escape_string($chapter_keyword);

//Create and run the SQL.
$query = "UPDATE tbl_chapter_main_raw
SET
edited = NOW(), 
user_name = '$user_name',
year_cover = '$year_cover',
cu = '$cu',
unit = '$unit',
chapter_category = '$chapter_category',
chapter_title = '$chapter_title',
chapter_book_title = '$chapter_book_title',
chapter_sub_author = '$chapter_sub_author',
chapter_author = '$chapter_author',
chapter_book_publisher = '$chapter_book_publisher',
chapter_book_editor = '$chapter_book_editor',
chapter_cit_dbase = '$chapter_cit_dbase',
chapter_book_year_published = '$chapter_book_year_published',
chapter_book_edition = '$chapter_book_edition',
chapter_num_pages = '$chapter_num_pages',
chapter_book_isbn = '$chapter_book_isbn',
chapter_book_circ_level = '$chapter_book_circ_level',
chapter_keyword = '$chapter_keyword'
WHERE bcid = '$bcid'";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
//echo "1 record edited";
header("Location: view-edited-chapter.php?id=" . $bcid);

mysqli_close($mysqli);

?>
