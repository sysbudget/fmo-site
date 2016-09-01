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
	$unit_contributor_id = stripslashes($_POST['unit_contributor_id']);
	$unit_delivery_id = stripslashes($_POST['unit_delivery_id']);
	$focal_person_id = stripslashes($_POST['focal_person_id']);
	$cu_id = stripslashes($_POST['cu_id']);
	$cu_short_name = stripslashes($_POST['cu_short_name']);
	$unit_delivery_name_cu = stripslashes($_POST['unit_delivery_name_cu']);
	$unit_contributor_name = stripslashes($_POST['unit_contributor_name']);
	$mfo3_form_program_id = stripslashes($_POST['mfo3_form_program_id']);
	$research_type_id = stripslashes($_POST['research_type_id']);
	$research_type_name = stripslashes($_POST['research_type_name']);
	$rsrch_title = stripslashes($_POST['rsrch_title']);
	$proj_duration = stripslashes($_POST['proj_duration']);
	$start_date = stripslashes($_POST['start_date']);
	$end_date = stripslashes($_POST['end_date']);
	$author = stripslashes($_POST['author']);

	$pat_title = stripslashes($_POST['pat_title']);
	$appli_date = stripslashes($_POST['appli_date']);
	$appli_num = stripslashes($_POST['appli_num']);
	$pat_date = stripslashes($_POST['pat_date']);
	$pat_num = stripslashes($_POST['pat_num']);
	$pat_inventor = stripslashes($_POST['pat_inventor']);

	$pat_attachment = stripslashes($_POST['file_name_sample']);
	$pat_attachment = $pat_attachment . ".pdf";
	$considered_gaa_bp = stripslashes($_POST['considered_gaa_bp']);

	$mfo3_formc_patented_id = stripslashes($_POST['mfo3_formc_patented_id']);

//Determine the date quarter	
	$cd = strtotime($pat_date);
	$month = date("m",$cd);
	$pat_quarter = ceil($month/3);

//Validate
if ( $pat_title == '' ) {
print '<p>Error! Title is missing.</p>';
exit();
}

if ( $appli_num == '' ) {
print '<p>Error! Application number is missing.</p>';
exit();
}

if ( $pat_num == '' ) {
print '<p>Error! Patent number is missing.</p>';
exit();
}

if ( $pat_inventor == '' ) {
print '<p>Error! Inventor is missing.</p>';
exit();
}

if ( $pat_attachment == '' ) {
  print '<p>Error! Attachment is missing.</p>';
  exit();
}

if ( $considered_gaa_bp == '' ) {
print '<p>Error! Considered for GAA/BP is missing.</p>';
exit();
}

//Make the fields safe.
$pat_title = $mysqli->escape_string($pat_title);
$appli_num = $mysqli->escape_string($appli_num);
$pat_num = $mysqli->escape_string($pat_num);
$pat_inventor = $mysqli->escape_string($pat_inventor);
$pat_attachment = $mysqli->escape_string($pat_attachment);
$mfo3_form_program_id = $mysqli->escape_string($mfo3_form_program_id);
$mfo3_formc_patented_id = $mysqli->escape_string($mfo3_formc_patented_id);
$considered_gaa_bp = $mysqli->escape_string($considered_gaa_bp);

//Create and run the SQL.
$query = "UPDATE tbl_sd_3_mfo3_formc_patented
SET
mfo3_formc_patented_quarter = '$pat_quarter',
mfo3_formc_patented_patent_title = '$pat_title',
mfo3_formc_patented_date_submitted_for_patenting = STR_TO_DATE('$_POST[appli_date]','%m/%d/%Y'),
mfo3_formc_patented_application_id_no = '$appli_num',
mfo3_formc_patented_date_patented = STR_TO_DATE('$_POST[pat_date]','%m/%d/%Y'),
mfo3_formc_patented_patent_id_no = '$pat_num',
mfo3_formc_patented_inventor_name = '$pat_inventor',
mfo3_formc_patented_patent_attachment = '$pat_attachment',
mfo3_formc_patented_considered_in_gaa = '$considered_gaa_bp',
mfo3_form_program_id = '$mfo3_form_program_id',
mfo3_formc_patented_considered_in_gaa = '$considered_gaa_bp',
edited = NOW() 
WHERE mfo3_formc_patented_id = '$mfo3_formc_patented_id'";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
//echo "1 record added";
//header("Location: ../MFO3/patent_view_edit.php?id=" . $mfo3_formc_patented_id);
header("Location: ../MFO3/patent_view_all.php");

mysqli_close($mysqli);

?>
