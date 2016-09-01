<?php
session_name("pbb");
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

// not logged in, move to login page

header('Location: ../login/login_mysqli.php');

exit;

}

// connect to the database
	include('../connect-db.php');

//Get session values
	$cu_short_name = $_SESSION['cu_short_name'];
	$unit_delivery_name_short = $_SESSION['unit_delivery_name_short'];
	$unit_contributor_name_short = $_SESSION['unit_contributor_name_short'];

//Attachment
if(isset($_FILES["uploadFile"]["error"])){
    if($_FILES["uploadFile"]["error"] > 0){
        echo "Error: " . $_FILES["uploadFile$x"]["error"] . "<br>";
    } else{
        $allowed = array("pdf" => "application/pdf");
        $filename = $_FILES["uploadFile"]["name"];
        $filetype = $_FILES["uploadFile"]["type"];
        $filesize = $_FILES["uploadFile"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) {
				 ?>
        		 <script>
                   alert('Error: PDF files only. Please select a valid file format.');
         		 </script>
				 <?php
 				 exit();
			}
		
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize){
				 ?>
        		 <script>
                   alert('Error: File size is larger than the allowed limit of 5MB.');
         		 </script>
				 <?php
 				 exit();
			}

        // Verify MIME type of the file
        if(in_array($filetype, $allowed)){
                move_uploaded_file($_FILES["uploadFile"]["tmp_name"], "uploads/". $cu_short_name . "/" . $_FILES["uploadFile"]["name"]);
    	} else {
				 ?>
        		 <script>
                   alert('Error: File type not allowed.');
         		 </script>
				 <?php
 				 exit();
		}
	}
}

//Get the form fields
	$mfo3_form_program_id = stripslashes($_POST['mfo3_form_program_id']);
	$unit_contributor_id = stripslashes($_POST['unit_contributor_id']);
	$unit_delivery_id = stripslashes($_POST['unit_delivery_id']);
	$focal_person_id = stripslashes($_POST['focal_person_id']);
	$cu_id = stripslashes($_POST['cu_id']);
	$cu_short_name = stripslashes($_POST['cu_short_name']);
	$unit_delivery_name_cu = stripslashes($_POST['unit_delivery_name_cu']);
	$unit_contributor_name = stripslashes($_POST['unit_contributor_name']);
	$sd_users_username = stripslashes($_POST['sd_users_username']);
	$mfo3_form_program_id = stripslashes($_POST['mfo3_form_program_id']);
	$research_type_id = stripslashes($_POST['research_type_id']);
	$research_type_name = stripslashes($_POST['research_type_name']);
	$rsrch_title = stripslashes($_POST['rsrch_title']);
	$quarter = stripslashes($_POST['quarter']);
	$completed = stripslashes($_POST['completed']);
	$proj_duration = stripslashes($_POST['proj_duration']);
	$start_date = stripslashes($_POST['start_date']);
	$end_date = stripslashes($_POST['end_date']);
	$author = stripslashes($_POST['author']);
	$completed_sched = stripslashes($_POST['completed_sched']);
	$attachment = stripslashes($_POST['attachment']);

	$confe_presenter = stripslashes($_POST['confe_presenter']);
	$confe_type = stripslashes($_POST['confe_type']);
	$confe_venue = stripslashes($_POST['confe_venue']);
	$confe_title = stripslashes($_POST['confe_title']);

	$confe_attachment = $mysqli->escape_string($_FILES['uploadFile']['name']);
	$considered_gaa_bp = stripslashes($_POST['considered_gaa_bp']);

//Determine the date quarter	
	$cd = stripslashes($_POST['confe_date']);
	$confe_date = strtotime($cd);
	$month = date("m",$confe_date);
	$presented_quarter = ceil($month/3);

//Generate Conference Type ID and Research Type
	$new_data = explode(",", $_POST['confe_type']);
    $confe_type_id = trim($new_data[0]);
    $confe_type_name = ($new_data[1]);

// Get end date
if ($end_date != '01/01/1970') {
	$close_date = date('Y-m-d', strtotime($_POST['end_date']));
}else{
	$close_date = 0;
}

//Validate
if ( $confe_presenter == '' ) {
print '<p>Error! Presenter is missing.</p>';
exit();
}

if ( $confe_type == '' ) {
print '<p>Error! Conference type is missing.</p>';
exit();
}

if ( $confe_venue == '' ) {
print '<p>Error! Conference venue is missing.</p>';
exit();
}

if ( $confe_title == '' ) {
print '<p>Error! Conference title is missing.</p>';
exit();
}

if ( $confe_attachment == '' ) {
  print '<p>Error! Attachment is missing.</p>';
  exit();
}

if ( $considered_gaa_bp == '' ) {
print '<p>Error! Considered for GAA/BP is missing.</p>';
exit();
}

//Make the fields safe.
$confe_presenter = $mysqli->escape_string($confe_presenter);
$confe_type = $mysqli->escape_string($confe_type);
$confe_venue = $mysqli->escape_string($confe_venue);
$confe_title = $mysqli->escape_string($confe_title);
$confe_attachment = $mysqli->escape_string($confe_attachment);
$considered_gaa_bp = $mysqli->escape_string($considered_gaa_bp);

//Create and run the SQL.
$query = "INSERT INTO tbl_sd_3_mfo3_forma_presented(
mfo3_form_program_id,
unit_contributor_id,
unit_delivery_id,
focal_person_id,
cu_id,
cu_short_name,
unit_delivery_name_cu,
unit_contributor_name,
research_type_id,
research_type_name,
mfo3_form_research_title,
mfo3_form_research_duration_in_months_plan,
mfo3_form_research_month_year_started,
mfo3_form_research_month_year_completed,
mfo3_form_research_quarter,
mfo3_form_research_completed,
mfo3_form_research_completed_within_the_timeframe,
mfo3_form_research_attachment,
mfo3_forma_presented_quarter,
mfo3_forma_presented_date,
mfo3_forma_presented_presenter,
conference_forum_type_id,
conference_forum_type_name,
mfo3_forma_presented_venue,
mfo3_forma_presented_title_of_the_conference_form,
mfo3_form_research_name_of_authors,
mfo3_forma_presented_attachment,
mfo3_forma_presented_considered_in_gaa,
created)
VALUES(
'$mfo3_form_program_id',
'$unit_contributor_id',
'$unit_delivery_id',
'$focal_person_id',
'$cu_id',
'$cu_short_name',
'$unit_delivery_name_cu',
'$unit_contributor_name',
'$research_type_id',
'$research_type_name',
'$rsrch_title',
'$proj_duration',
STR_TO_DATE('$_POST[start_date]','%m/%d/%Y'),
'$close_date',
'$quarter',
'$completed',
'$completed_sched',
'$attachment',
'$presented_quarter',
STR_TO_DATE('$_POST[confe_date]','%m/%d/%Y'),
'$confe_presenter',
'$confe_type_id',
'$confe_type_name',
'$confe_venue',
'$confe_title',
'$author',
'$confe_attachment',
'$considered_gaa_bp',
NOW())";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

//echo "1 record added";
//header("Location: ../MFO3/presented_view_input.php");
header("Location: ../MFO3/presented_view_all.php");

mysqli_close($mysqli);

?>


</body>
</html>
?>