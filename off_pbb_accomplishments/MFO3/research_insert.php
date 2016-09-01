<?php
session_name("pbb");
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

// not logged in, move to login page

header('Location: ../login/login_mysqli.php');

exit;

}

//Connect to the database
	include('../connect-db.php');

//Get session values
	$unit_contributor_id = $_SESSION['unit_contributor_id'];
	$unit_delivery_id = $_SESSION['unit_delivery_id'];
	$focal_person_id = $_SESSION['focal_person_id'];
	$cu_id = $_SESSION['cu_id'];
	$cu_short_name = $_SESSION['cu_short_name'];
	$unit_delivery_name_cu = $_SESSION['unit_delivery_name_cu'];
	$unit_contributor_name = $_SESSION['unit_contributor_name'];
	$sd_users_username = $_SESSION['sd_users_username'];
	$cutOffDate_id = $_SESSION['cutOffDate_id'];
	$t_startDate = $_SESSION['t_startDate'];
	$a_cutOffDate_contributor = $_SESSION['a_cutOffDate_contributor'];
	$a_cutOffDate_delivery = $_SESSION['a_cutOffDate_delivery'];
	$a_cutOffDate_fp = $_SESSION['a_cutOffDate_fp'];
	$a_cutOffDate_remarks = $_SESSION['a_cutOffDate_remarks'];

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
	$rsrch_title = stripslashes($_POST['rsrch_title']);
	$proj_duration = stripslashes($_POST['proj_duration']);
	$rsrch_type = stripslashes($_POST['rsrch_type']);
	$completed = stripslashes($_POST['completed']);
	$author = stripslashes($_POST['author']);

	$attachment = $mysqli->escape_string($_FILES['uploadFile']['name']);

	$sd = isset($_POST['start_date']) ? stripslashes($_POST['start_date']) : '';
	$ed = isset($_POST['end_date']) ? stripslashes($_POST['end_date']) : '';
	$considered_gaa_bp = stripslashes($_POST['considered_gaa_bp']);

//Generate Research Type ID and Research Type
	$new_data = explode(",", $_POST['rsrch_type']);
    $research_type_id = trim($new_data[0]);
    $research_type_name = ($new_data[1]);

//Determine the date quarter	
	$end_date = strtotime($ed);
	$month = date("m",$end_date);
	$quarter = ceil($month/3);
	
//Determine if completed within the time frame
$date1 = strtotime($sd);
$date2 = strtotime($ed);
$months = 0;

while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2)
    $months++;

	if ($months<=$proj_duration && $completed=="Y") {
		$completed_sched="Y";
	}
	else
	{ 	$completed_sched="N";
	}

// Get end date
if (isset($_POST['end_date']) && !empty($_POST['end_date'])) {
	$close_date = date('Y-m-d', strtotime($_POST['end_date']));
	$close_date = "'$close_date'";
}else{
	$close_date = "NULL";
}

//Validate
if ( $sd_users_username == '' ) {
print '<p>Error! Username is missing.</p>';
exit();
}

if ( $rsrch_title == '' ) {
print '<p>Error! Research title is missing.</p>';
exit();
}

if ( $proj_duration == '' ) {
print '<p>Error! Project Duration is missing.</p>';
exit();
}

if ( $rsrch_type == '' ) {
print '<p>Error! Research type is missing.</p>';
exit();
}

if ( $completed == '' ) {
print '<p>Error! Completed is missing.</p>';
exit();
}

if ( $author == '' ) {
print '<p>Error! Author is missing.</p>';
exit();
}

if ( $attachment == '' ) {
  print '<p>Error! Attachment is missing.</p>';
  exit();
}

if ( $considered_gaa_bp == '' ) {
print '<p>Error! Considered for GAA/BP is missing.</p>';
exit();
}

//Make the fields safe.
$rsrch_title = $mysqli->escape_string($rsrch_title);
$proj_duration = $mysqli->escape_string($proj_duration);
$rsrch_type = $mysqli->escape_string($rsrch_type);
$completed = $mysqli->escape_string($completed);
$author = $mysqli->escape_string($author);
$attachment = $mysqli->escape_string($attachment);
$considered_gaa_bp = $mysqli->escape_string($considered_gaa_bp);

//Create and run the SQL.
$query = "INSERT INTO tbl_sd_3_mfo3_form_research(
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
mfo3_form_research_quarter,
mfo3_form_research_completed,
mfo3_form_research_duration_in_months_plan,
mfo3_form_research_month_year_started,
mfo3_form_research_month_year_completed,
mfo3_form_research_name_of_authors,
mfo3_form_research_completed_within_the_timeframe,
mfo3_form_research_attachment,
mfo3_form_research_considered_in_gaa,
created)
VALUES(
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
'$quarter',
'$completed',
'$proj_duration',
STR_TO_DATE('$_POST[start_date]','%m/%d/%Y'),
$close_date,
'$author',
'$completed_sched',
'$attachment',
'$considered_gaa_bp',
NOW())";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

//echo "1 record added";
header("Location: ../MFO3/research_view_all.php");

mysqli_close($mysqli);

?>
</body>
</html>
