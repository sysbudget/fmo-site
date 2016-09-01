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
for ($x=1; $x <= 4; $x++){
if(isset($_FILES["uploadFile$x"]["error"])){
    if($_FILES["uploadFile$x"]["error"] > 0){
        echo "Error: " . $_FILES["uploadFile$x"]["error"] . "<br>";
    } else{
        $allowed = array("pdf" => "application/pdf");
        $filename = $_FILES["uploadFile$x"]["name"];
        $filetype = $_FILES["uploadFile$x"]["type"];
        $filesize = $_FILES["uploadFile$x"]["size"];

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
                move_uploaded_file($_FILES["uploadFile$x"]["tmp_name"], "uploads/". $cu_short_name . "/" . $_FILES["uploadFile$x"]["name"]);
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
}

//Get the form fields
	$ext_title = stripslashes($_POST['ext_title']);
	$ext_venue = stripslashes($_POST['ext_venue']);
	$sd = stripslashes($_POST['start_date']);
	$ext_duration = stripslashes($_POST['ext_duration']);
	$request_mode = stripslashes($_POST['request_mode']);
	$requester = stripslashes($_POST['requester']);
	$request_count = stripslashes($_POST['request_count']);
	$request_acted = stripslashes($_POST['request_acted']);
	$trainees_count = stripslashes($_POST['trainees_count']);
	$training_hours = stripslashes($_POST['training_hours']);

	$attach_ext_service_req = $mysqli->escape_string($_FILES['uploadFile1']['name']);

	$considered_gaa_bp = stripslashes($_POST['considered_gaa_bp']);
	$survey_conducted = stripslashes($_POST['survey_conducted']);

//Initializing variable
	$rating_mode = isset($_POST['rating_mode']) ? stripslashes($_POST['rating_mode']) : '';
	$rating_conducted = isset($_POST['rating_conducted']) ? stripslashes($_POST['rating_conducted']) : '';
	$rating_survey_size = isset($_POST['rating_survey_size']) ? stripslashes($_POST['rating_survey_size']) : '';
	$no_rating_count = isset($_POST['no_rating_count']) ? stripslashes($_POST['no_rating_count']) : '';
	$poor_rating_count = isset($_POST['poor_rating_count']) ? stripslashes($_POST['poor_rating_count']) : '';
	$fair_rating_count = isset($_POST['fair_rating_count']) ? stripslashes($_POST['fair_rating_count']) : '';
	$good_rating_count = isset($_POST['good_rating_count']) ? stripslashes($_POST['good_rating_count']) : '';
	$better_rating_count = isset($_POST['better_rating_count']) ? stripslashes($_POST['better_rating_count']) : '';
	$best_rating_count = isset($_POST['best_rating_count']) ? stripslashes($_POST['best_rating_count']) : '';
	$attach_rating_sample = $mysqli->escape_string($_FILES['uploadFile2']['name']);

	$timeliness_conducted = isset($_POST['timeliness_conducted']) ? stripslashes($_POST['timeliness_conducted']) : '';
	$timeliness_survey_size = isset($_POST['timeliness_survey_size']) ? stripslashes($_POST['timeliness_survey_size']) : '';
	$no_timeliness_count = isset($_POST['no_timeliness_count']) ? stripslashes($_POST['no_timeliness_count']) : '';
	$poor_timeliness_count = isset($_POST['poor_timeliness_count']) ? stripslashes($_POST['poor_timeliness_count']) : '';
	$fair_timeliness_count = isset($_POST['fair_timeliness_count']) ? stripslashes($_POST['fair_timeliness_count']) : '';
	$good_timeliness_count = isset($_POST['good_timeliness_count']) ? stripslashes($_POST['good_timeliness_count']) : '';
	$better_timeliness_count = isset($_POST['better_timeliness_count']) ? stripslashes($_POST['better_timeliness_count']) : '';
	$best_timeliness_count = isset($_POST['best_timeliness_count']) ? stripslashes($_POST['best_timeliness_count']) : '';
	$attach_timeliness_sample = $mysqli->escape_string($_FILES['uploadFile3']['name']);
	$attach_tally_sheet = $mysqli->escape_string($_FILES['uploadFile4']['name']);

//Determine the date quarter	
	$start_date = strtotime($sd);
	$month = date("m",$start_date);
	$quarter = ceil($month/3);

//Determine if training is requested or self-initiated
	$request_type = "";
	$i = "Self Initiated";
	$r = "Requested";
		if ($requester == "Scheduled") {
			$request_type = $i;
			}
		else
			{
			$request_type = $r;
			}

//Determine the Number of Trainees Weighted by Length of Training
	$training_weight = "";
	$th = $training_hours;
	$tc = $trainees_count;
		if ($th >= 1 && $th < 8) {
			$training_weight = $tc*.5;
		}
		if ($th >= 8 && $th < 16) {
			$training_weight = $tc*1;
		}
		if ($th >= 16 && $th < 24) {
			$training_weight = $tc*1.25;
		}
		if ($th >= 24 && $th < 40) {
			$training_weight = $tc*1.5;
		}
		if ($th >= 40) {
			$training_weight = $tc*2;
		}

//Determine the sum of Good, Better, Best

$good_better_best_rating_count = $good_rating_count + $better_rating_count + $best_rating_count;

$good_better_best_timeliness_count = $good_timeliness_count + $better_timeliness_count + $best_timeliness_count;
	
//Validate
if ( $ext_title == '' ) {
print '<p>Error! Extension title is missing.</p>';
exit();
}

if ( $ext_venue == '' ) {
print '<p>Error! Venue is missing.</p>';
exit();
}

if ( $ext_duration == '' ) {
print '<p>Error! Duration is missing.</p>';
exit();
}

if ( $request_mode == '' ) {
print '<p>Error! Request mode is missing.</p>';
exit();
}

if ( $requester == '' ) {
print '<p>Error! Requester is missing.</p>';
exit();
}

if ( $request_count == '' ) {
print '<p>Error! Request count is missing.</p>';
exit();
}

if ( $request_acted == '' ) {
print '<p>Error! Request acted is missing.</p>';
exit();
}

if ( $trainees_count == '' ) {
print '<p>Error! Trainees count is missing.</p>';
exit();
}

if ( $training_hours == '' ) {
print '<p>Error! Training hours is missing.</p>';
exit();
}

if ( $attach_ext_service_req == '' ) {
print '<p>Error! Attachment extension service requirement is missing.</p>';
exit();
}

if ( $considered_gaa_bp == '' ) {
print '<p>Error! Considered for GAA/BP is missing.</p>';
exit();
}

if ( $survey_conducted == '' ) {
print '<p>Error! Survey conducted is missing.</p>';
exit();
}

//Make the fields safe.
$ext_title = $mysqli->escape_string($ext_title);
$ext_venue = $mysqli->escape_string($ext_venue);
$ext_duration = $mysqli->escape_string($ext_duration);
$request_mode = $mysqli->escape_string($request_mode);
$requester = $mysqli->escape_string($requester);
$request_count = $mysqli->escape_string($request_count);
$request_acted = $mysqli->escape_string($request_acted);
$trainees_count = $mysqli->escape_string($trainees_count);
$training_hours = $mysqli->escape_string($training_hours);
$attach_ext_service_req = $mysqli->escape_string($attach_ext_service_req);
$considered_gaa_bp = $mysqli->escape_string($considered_gaa_bp);
$survey_conducted = $mysqli->escape_string($survey_conducted);
$rating_mode = $mysqli->escape_string($rating_mode);

$rating_conducted = $mysqli->escape_string($rating_conducted);
$rating_survey_size = $mysqli->escape_string($rating_survey_size);
$no_rating_count = $mysqli->escape_string($no_rating_count);
$poor_rating_count = $mysqli->escape_string($poor_rating_count);
$fair_rating_count = $mysqli->escape_string($fair_rating_count);
$good_rating_count = $mysqli->escape_string($good_rating_count);
$better_rating_count = $mysqli->escape_string($better_rating_count);
$best_rating_count = $mysqli->escape_string($best_rating_count);
$attach_rating_sample = $mysqli->escape_string($attach_rating_sample);

$timeliness_conducted = $mysqli->escape_string($timeliness_conducted);
$timeliness_survey_size = $mysqli->escape_string($timeliness_survey_size);
$no_timeliness_count = $mysqli->escape_string($no_timeliness_count);
$poor_timeliness_count = $mysqli->escape_string($poor_timeliness_count);
$fair_timeliness_count = $mysqli->escape_string($fair_timeliness_count);
$good_timeliness_count = $mysqli->escape_string($good_timeliness_count);
$better_timeliness_count = $mysqli->escape_string($better_timeliness_count);
$best_timeliness_count = $mysqli->escape_string($best_timeliness_count);
$attach_timeliness_sample = $mysqli->escape_string($attach_timeliness_sample);
$attach_tally_sheet = $mysqli->escape_string($attach_tally_sheet);


//Create and run the SQL.
$query = "INSERT INTO tbl_sd_4_mfo4_forma_trainings(
unit_contributor_id,
unit_delivery_id,
focal_person_id,
cu_id,
cu_short_name,
unit_delivery_name_cu,
unit_contributor_name,
mfo4_forma_trainings_title_of_training,
mfo4_forma_trainings_place_venue,
mfo4_forma_trainings_date_description,
mfo4_forma_trainings_date,
mfo4_forma_trainings_quarter,
mfo4_forma_trainings_request_mode,
mfo4_forma_trainings_requested_by,
mfo4_forma_trainings_requested_initiated,
mfo4_forma_trainings_no_of_clients_who_requested,
mfo4_forma_trainings_request_attachment,
mfo4_forma_trainings_considered_in_gaa,
mfo4_forma_trainings_survey_conducted,
mfo4_forma_trainings_no_of_requests_responded_witin_3_days,
mfo4_forma_trainings_no_of_persons_trained,
mfo4_forma_trainings_training_hours,
mfo4_forma_trainings_weight,
mfo4_forma_trainings_was_a_survey_conducted_to_rate_training,
mfo4_forma_trainings_surveyed_to_rate_training_survey_mode,
mfo4_forma_trainings_no_of_persons_surveyed_to_rate_training,
mfo4_forma_trainings_surveyed_to_rate_training_no_answer,
mfo4_forma_trainings_surveyed_to_rate_training_bad,
mfo4_forma_trainings_surveyed_to_rate_training_fair,
mfo4_forma_trainings_surveyed_to_rate_training_good,
mfo4_forma_trainings_surveyed_to_rate_training_better,
mfo4_forma_trainings_surveyed_to_rate_training_best,
mfo4_forma_trainings_surveyed_to_rate_training_good_better_best,
mfo4_forma_trainings_survey_form_to_rate_training_attachment,
mfo4_forma_trainings_was_a_survey_conducted_to_ask_if_timely,
mfo4_forma_trainings_no_of_persons_surveyed_to_ask_if_timely,
mfo4_forma_trainings_surveyed_to_ask_if_timely_no_answer,
mfo4_forma_trainings_surveyed_to_ask_if_timely_bad,
mfo4_forma_trainings_surveyed_to_ask_if_timely_fair,
mfo4_forma_trainings_surveyed_to_ask_if_timely_good,
mfo4_forma_trainings_surveyed_to_ask_if_timely_better,
mfo4_forma_trainings_surveyed_to_ask_if_timely_best,
mfo4_forma_trainings_surveyed_to_ask_if_timely_good_better_best,
mfo4_forma_trainings_surveyed_to_ask_if_timely_attachment,
mfo4_forma_trainings_survey_tally_sheet_attachment,

created)
VALUES(
'$unit_contributor_id',
'$unit_delivery_id',
'$focal_person_id',
'$cu_id',
'$cu_short_name',
'$unit_delivery_name_cu',
'$unit_contributor_name',
'$ext_title',
'$ext_venue',
'$ext_duration',
STR_TO_DATE('$_POST[start_date]','%m/%d/%Y'),
'$quarter',
'$request_mode',
'$requester',
'$request_type',
'$request_count',
'$attach_ext_service_req',
'$considered_gaa_bp',
'$survey_conducted',
'$request_acted',
'$trainees_count',
'$training_hours',
'$training_weight',
'$rating_conducted',
'$rating_mode',
'$rating_survey_size',
'$no_rating_count',
'$poor_rating_count',
'$fair_rating_count',
'$good_rating_count',
'$better_rating_count',
'$best_rating_count',
'$good_better_best_rating_count',
'$attach_rating_sample',
'$timeliness_conducted',
'$timeliness_survey_size',
'$no_timeliness_count',
'$poor_timeliness_count',
'$fair_timeliness_count',
'$good_timeliness_count',
'$better_timeliness_count',
'$best_timeliness_count',
'$good_better_best_timeliness_count',
'$attach_timeliness_sample',
'$attach_tally_sheet',

NOW())";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

//echo "1 record added";
header("Location: ../MFO4/training_view_all.php");

mysqli_close($mysqli);

?>
</body>
</html>
