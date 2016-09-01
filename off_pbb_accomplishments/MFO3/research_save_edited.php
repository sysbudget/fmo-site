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

	$attachment = stripslashes($_POST['file_name_sample']);
	$attachment = $attachment . ".pdf";

	$mfo3_form_program_id = stripslashes($_POST['mfo3_form_program_id']);
	$sd = isset($_POST['start_date']) ? stripslashes($_POST['start_date']) : '';
	$ed = isset($_POST['end_date']) ? stripslashes($_POST['end_date']) : '';
//	$sd = stripslashes($_POST['start_date']);
//	$ed = stripslashes($_POST['end_date']);
	$considered_gaa_bp = stripslashes($_POST['considered_gaa_bp']);

//Generate Research Type ID and Research Type
	$new_data = explode(",", $_POST['rsrch_type']);
    $research_type_id = trim($new_data[0]);
    $research_type_name = ($new_data[1]);

//Determine the date quarter	
if (isset($_POST['end_date']) && !empty($_POST['end_date'])) {
	$end_date = strtotime($ed);
	$month = date("m",$end_date);
	$quarter = ceil($month/3);
}else{  
	$quarter = 0;
}

//Determine if completed within the time frame
if (isset($_POST['end_date']) && !empty($_POST['end_date'])) {
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
}
else
{
	$completed_sched="N";
}

// Get end date
if (isset($_POST['end_date']) && !empty($_POST['end_date'])) {
	$close_date = date('Y-m-d', strtotime($_POST['end_date']));
	$close_date = "'$close_date'";
}else{
	$close_date = "NULL";
}

//Validate
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
$mfo3_form_program_id = $mysqli->escape_string($mfo3_form_program_id);
$considered_gaa_bp = $mysqli->escape_string($considered_gaa_bp);

//Create and run the SQL to update research
$query = "UPDATE tbl_sd_3_mfo3_form_research 
SET
tbl_sd_3_mfo3_form_research.unit_contributor_id = '$unit_contributor_id',
tbl_sd_3_mfo3_form_research.unit_delivery_id = '$unit_delivery_id',
tbl_sd_3_mfo3_form_research.focal_person_id = '$focal_person_id',
tbl_sd_3_mfo3_form_research.cu_id = '$cu_id',
tbl_sd_3_mfo3_form_research.cu_short_name = '$cu_short_name',
tbl_sd_3_mfo3_form_research.unit_delivery_name_cu = '$unit_delivery_name_cu',
tbl_sd_3_mfo3_form_research.unit_contributor_name = '$unit_contributor_name',
tbl_sd_3_mfo3_form_research.research_type_id = '$research_type_id',
tbl_sd_3_mfo3_form_research.research_type_name = '$research_type_name',
tbl_sd_3_mfo3_form_research.mfo3_form_research_title = '$rsrch_title',
tbl_sd_3_mfo3_form_research.mfo3_form_research_quarter = '$quarter',
tbl_sd_3_mfo3_form_research.mfo3_form_research_completed = '$completed',
tbl_sd_3_mfo3_form_research.mfo3_form_research_duration_in_months_plan = '$proj_duration',
tbl_sd_3_mfo3_form_research.mfo3_form_research_month_year_started = STR_TO_DATE('$_POST[start_date]','%m/%d/%Y'),
tbl_sd_3_mfo3_form_research.mfo3_form_research_month_year_completed = $close_date,
tbl_sd_3_mfo3_form_research.mfo3_form_research_name_of_authors = '$author',
tbl_sd_3_mfo3_form_research.mfo3_form_research_completed_within_the_timeframe = '$completed_sched',
tbl_sd_3_mfo3_form_research.mfo3_form_research_attachment = '$attachment',
tbl_sd_3_mfo3_form_research.mfo3_form_research_considered_in_gaa = '$considered_gaa_bp',
tbl_sd_3_mfo3_form_research.edited = NOW()
WHERE tbl_sd_3_mfo3_form_research.mfo3_form_program_id = '$mfo3_form_program_id'";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

//Create and run the SQL to update related research data on paper presented
$query1 = "UPDATE tbl_sd_3_mfo3_forma_presented
SET
tbl_sd_3_mfo3_forma_presented.unit_contributor_id = '$unit_contributor_id',
tbl_sd_3_mfo3_forma_presented.unit_delivery_id = '$unit_delivery_id',
tbl_sd_3_mfo3_forma_presented.focal_person_id = '$focal_person_id',
tbl_sd_3_mfo3_forma_presented.cu_id = '$cu_id',
tbl_sd_3_mfo3_forma_presented.cu_short_name = '$cu_short_name',
tbl_sd_3_mfo3_forma_presented.unit_delivery_name_cu = '$unit_delivery_name_cu',
tbl_sd_3_mfo3_forma_presented.unit_contributor_name = '$unit_contributor_name',
tbl_sd_3_mfo3_forma_presented.research_type_id = '$research_type_id',
tbl_sd_3_mfo3_forma_presented.research_type_name = '$research_type_name',
tbl_sd_3_mfo3_forma_presented.mfo3_form_research_title = '$rsrch_title',
tbl_sd_3_mfo3_forma_presented.mfo3_form_research_duration_in_months_plan = '$proj_duration',
tbl_sd_3_mfo3_forma_presented.mfo3_form_research_month_year_started = STR_TO_DATE('$_POST[start_date]','%m/%d/%Y'),
tbl_sd_3_mfo3_forma_presented.mfo3_form_research_month_year_completed = $close_date,
tbl_sd_3_mfo3_forma_presented.mfo3_form_research_name_of_authors = '$author',
tbl_sd_3_mfo3_forma_presented.edited = NOW() 
WHERE tbl_sd_3_mfo3_forma_presented.mfo3_form_program_id = '$mfo3_form_program_id'";


if (!mysqli_query($mysqli,$query1))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

//Create and run the SQL to update related research data on paper published
$query1 = "UPDATE tbl_sd_3_mfo3_formb_published
SET
tbl_sd_3_mfo3_formb_published.unit_contributor_id = '$unit_contributor_id',
tbl_sd_3_mfo3_formb_published.unit_delivery_id = '$unit_delivery_id',
tbl_sd_3_mfo3_formb_published.focal_person_id = '$focal_person_id',
tbl_sd_3_mfo3_formb_published.cu_id = '$cu_id',
tbl_sd_3_mfo3_formb_published.cu_short_name = '$cu_short_name',
tbl_sd_3_mfo3_formb_published.unit_delivery_name_cu = '$unit_delivery_name_cu',
tbl_sd_3_mfo3_formb_published.unit_contributor_name = '$unit_contributor_name',
tbl_sd_3_mfo3_formb_published.research_type_id = '$research_type_id',
tbl_sd_3_mfo3_formb_published.research_type_name = '$research_type_name',
tbl_sd_3_mfo3_formb_published.mfo3_form_research_title = '$rsrch_title',
tbl_sd_3_mfo3_formb_published.mfo3_form_research_duration_in_months_plan = '$proj_duration',
tbl_sd_3_mfo3_formb_published.mfo3_form_research_month_year_started = STR_TO_DATE('$_POST[start_date]','%m/%d/%Y'),
tbl_sd_3_mfo3_formb_published.mfo3_form_research_month_year_completed = $close_date,
tbl_sd_3_mfo3_formb_published.mfo3_form_research_name_of_authors = '$author',
tbl_sd_3_mfo3_formb_published.edited = NOW() 
WHERE tbl_sd_3_mfo3_formb_published.mfo3_form_program_id = '$mfo3_form_program_id'";


if (!mysqli_query($mysqli,$query1))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

//Create and run the SQL to update related research data on patents
$query1 = "UPDATE tbl_sd_3_mfo3_formc_patented
SET
tbl_sd_3_mfo3_formc_patented.unit_contributor_id = '$unit_contributor_id',
tbl_sd_3_mfo3_formc_patented.unit_delivery_id = '$unit_delivery_id',
tbl_sd_3_mfo3_formc_patented.focal_person_id = '$focal_person_id',
tbl_sd_3_mfo3_formc_patented.cu_id = '$cu_id',
tbl_sd_3_mfo3_formc_patented.cu_short_name = '$cu_short_name',
tbl_sd_3_mfo3_formc_patented.unit_delivery_name_cu = '$unit_delivery_name_cu',
tbl_sd_3_mfo3_formc_patented.unit_contributor_name = '$unit_contributor_name',
tbl_sd_3_mfo3_formc_patented.research_type_id = '$research_type_id',
tbl_sd_3_mfo3_formc_patented.research_type_name = '$research_type_name',
tbl_sd_3_mfo3_formc_patented.mfo3_form_research_title = '$rsrch_title',
tbl_sd_3_mfo3_formc_patented.mfo3_form_research_duration_in_months_plan = '$proj_duration',
tbl_sd_3_mfo3_formc_patented.mfo3_form_research_month_year_started = STR_TO_DATE('$_POST[start_date]','%m/%d/%Y'),
tbl_sd_3_mfo3_formc_patented.mfo3_form_research_month_year_completed = $close_date,
tbl_sd_3_mfo3_formc_patented.mfo3_form_research_name_of_authors = '$author',
tbl_sd_3_mfo3_formc_patented.edited = NOW() 
WHERE tbl_sd_3_mfo3_formc_patented.mfo3_form_program_id = '$mfo3_form_program_id'";


if (!mysqli_query($mysqli,$query1))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

//echo "1 record edited";
header("Location: ../MFO3/research_view_all.php?");

mysqli_close($mysqli);

?>
