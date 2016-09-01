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
$book_category = stripslashes($_POST['book_category']);
$book_title = stripslashes($_POST['book_title']);
$book_sub_author = stripslashes($_POST['book_sub_author']);
$book_author = stripslashes($_POST['book_author']);
$book_publisher = stripslashes($_POST['book_publisher']);
$book_editor = stripslashes($_POST['book_editor']);
$book_cit_dbase = stripslashes($_POST['book_cit_dbase']);
$book_year_published = stripslashes($_POST['book_year_published']);
$book_edition = stripslashes($_POST['book_edition']);
$book_num_pages = stripslashes($_POST['book_num_pages']);
$book_isbn = stripslashes($_POST['book_isbn']);
$book_circ_level = stripslashes($_POST['book_circ_level']);
$book_keyword = stripslashes($_POST['book_keyword']);

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

if ( $book_category == '' ) {
print '<p>Error! Category is missing.</p>';
exit();
}

if ( $book_title == '' ) {
print '<p>Error! Publication title is missing.</p>';
exit();
}

if ( $book_sub_author == '' ) {
print '<p>Error! Submitting author is missing.</p>';
exit();
}

if ( $book_author == '' ) {
print '<p>Error! Name of author is missing.</p>';
exit();
}

if ( $book_publisher == '' ) {
print '<p>Error! Book publisher is missing.</p>';
exit();
}

if ( $book_editor == '' ) {
print '<p>Error! Book editor is missing.</p>';
exit();
}

if ( $book_year_published == '' ) {
print '<p>Error! Year of publication is missing.</p>';
exit();
}

if ( $book_edition == '' ) {
print '<p>Error! Book edition is missing.</p>';
exit();
}

if ( $book_num_pages == '' ) {
print '<p>Error! Book number of pages is missing.</p>';
exit();
}

if ( $book_circ_level == '' ) {
print '<p>Error! Circulation level is missing.</p>';
exit();
}

if ( $book_keyword == '' ) {
print '<p>Error! Book keyword is missing.</p>';
exit();
}


//Make the fields safe.
$user_name = $mysqli->escape_string($user_name);
$year_cover = $mysqli->escape_string($year_cover);
$cu = $mysqli->escape_string($cu);
$unit = $mysqli->escape_string($unit);
$publication_type = $mysqli->escape_string($publication_type);
$book_category = $mysqli->escape_string($book_category);
$book_title = $mysqli->escape_string($book_title);
$book_sub_author = $mysqli->escape_string($book_sub_author);
$book_author = $mysqli->escape_string($book_author);
$book_publisher = $mysqli->escape_string($book_publisher);
$book_editor = $mysqli->escape_string($book_editor);
$book_cit_dbase = $mysqli->escape_string($book_cit_dbase);
$book_year_published = $mysqli->escape_string($book_year_published);
$book_edition = $mysqli->escape_string($book_edition);
$book_num_pages = $mysqli->escape_string($book_num_pages);
$book_isbn = $mysqli->escape_string($book_isbn);
$book_circ_level = $mysqli->escape_string($book_circ_level);
$book_keyword = $mysqli->escape_string($book_keyword);

//Create and run the SQL.
$query = "INSERT INTO tbl_book_main_raw(created, user_name, year_cover, cu, unit, publication_type, book_category, book_title, book_sub_author, book_author, book_publisher, book_editor, book_cit_dbase, book_year_published, book_edition, book_num_pages, book_isbn, book_circ_level, book_keyword) VALUES (NOW(), '$user_name', '$year_cover', '$cu', '$unit', '$publication_type', '$book_category', '$book_title', '$book_sub_author', '$book_author', '$book_publisher', '$book_editor', '$book_cit_dbase', '$book_year_published', '$book_edition', '$book_num_pages', '$book_isbn', '$book_circ_level', '$book_keyword')";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

echo "1 record added";
header("Location: view-input-book.php");

mysqli_close($mysqli);

?>
</body>
</html>
