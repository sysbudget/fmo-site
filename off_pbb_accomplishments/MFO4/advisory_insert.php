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
	$advisory_title = stripslashes($_POST['advisory_title']);
	$advisory_venue = stripslashes($_POST['advisory_venue']);
	$sd = stripslashes($_POST['start_date']);
	$request_mode = stripslashes($_POST['request_mode']);
	$request_count = stripslashes($_POST['request_count']);
	$attach_adv_service_req = $mysqli->escape_string($_FILES['uploadFile1']['name']);
	$request_acted = stripslashes($_POST['request_acted']);
	$client_count = stripslashes($_POST['client_count']);
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
	$assisted_count = isset($_POST['assisted_count']) ? stripslashes($_POST['assisted_count']) : '';

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

//Determine the sum of Good, Better, Best

$good_better_best_rating_count = $good_rating_count + $better_rating_count + $best_rating_count;

$good_better_best_timeliness_count = $good_timeliness_count + $better_timeliness_count + $best_timeliness_count;
	
//Validate
if ( $advisory_title == '' ) {
print '<p>Error! Advisory title is missing.</p>';
exit();
}

if ( $advisory_venue == '' ) {
print '<p>Error! Venue is missing.</p>';
exit();
}

if ( $request_mode == '' ) {
print '<p>Error! Request mode is missing.</p>';
exit();
}

if ( $request_count == '' ) {
print '<p>Error! Request count is missing.</p>';
exit();
}

if ( $attach_adv_service_req == '' ) {
print '<p>Error! Attachment extension service requirement is missing.</p>';
exit();
}

if ( $request_acted == '' ) {
print '<p>Error! Request acted is missing.</p>';
exit();
}

if ( $client_count == '' ) {
print '<p>Error! Client count is missing.</p>';
exit();
}

if ( $survey_conducted == '' ) {
print '<p>Error! Survey conducted is missing.</p>';
exit();
}

if ( $considered_gaa_bp == '' ) {
print '<p>Error! Considered for GAA/BP is missing.</p>';
exit();
}

//Make the fields safe.
$advisory_title = $mysqli->escape_string($advisory_title);
$advisory_venue = $mysqli->escape_string($advisory_venue);
$request_mode = $mysqli->escape_string($request_mode);
$request_count = $mysqli->escape_string($request_count);
$attach_adv_service_req = $mysqli->escape_string($attach_adv_service_req);
$request_acted = $mysqli->escape_string($request_acted);
$client_count = $mysqli->escape_string($client_count);
$considered_gaa_bp = $mysqli->escape_string($considered_gaa_bp);
$survey_conducted = $mysqli->escape_string($survey_conducted);

$rating_conducted = $mysqli->escape_string($rating_conducted);
$rating_mode = $mysqli->escape_string($rating_mode);
$rating_survey_size = $mysqli->escape_string($rating_survey_size);
$no_rating_count = $mysqli->escape_string($no_rating_count);
$poor_rating_count = $mysqli->escape_string($poor_rating_count);
$fair_rating_count = $mysqli->escape_string($fair_rating_count);
$good_rating_count = $mysqli->escape_string($good_rating_count);
$better_rating_count = $mysqli->escape_string($better_rating_count);
$best_rating_count = $mysqli->escape_string($best_rating_count);
$attach_rating_sample = $mysqli->escape_string($attach_rating_sample);
$assisted_count = $mysqli->escape_string($assisted_count);

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
$query = "INSERT INTO tbl_sd_4_mfo4_formb_advisory(
unit_contributor_id,
unit_delivery_id,
focal_person_id,
cu_id,
cu_short_name,
unit_delivery_name_cu,
unit_contributor_name,
mfo4_formb_advisory_title,
mfo4_formb_advisory_place,
mfo4_formb_advisory_date,
mfo4_formb_advisory_quarter,
mfo4_formb_advisory_request_mode,
mfo4_formb_advisory_no_of_persons_requested,
mfo4_formb_advisory_request_attachment,
mfo4_formb_advisory_survey_conducted,
mfo4_formb_advisory_no_of_requests_responded_witin_3_days,
mfo4_formb_advisory_no_of_persons_served,
mfo4_formb_advisory_considered_in_gaa,
mfo4_formb_advisory_was_a_survey_conducted_to_rate_advisory,
mfo4_formb_advisory_survey_mode,
mfo4_formb_advisory_no_of_presons_surveyed_to_rate_advisory,
mfo4_formb_advisory_surveyed_to_rate_advisory_no_answer,
mfo4_formb_advisory_surveyed_to_rate_advisory_bad,
mfo4_formb_advisory_surveyed_to_rate_advisory_fair,
mfo4_formb_advisory_surveyed_to_rate_advisory_good,
mfo4_formb_advisory_surveyed_to_rate_advisory_better,
mfo4_formb_advisory_surveyed_to_rate_advisory_best,
mfo4_formb_advisory_surveyed_to_rate_advisory_good_better_best,
mfo4_formb_advisory_survey_form_to_rate_advisory_attachment,
mfo4_formb_advisory_no_of_lgu_communities_assisted,
mfo4_formb_advisory_was_a_survey_conducted_to_ask_if_timely,
mfo4_formb_advisory_no_of_presons_surveyed_to_ask_if_timely,
mfo4_formb_advisory_surveyed_to_ask_if_timely_no_answer,
mfo4_formb_advisory_surveyed_to_ask_if_timely_bad,
mfo4_formb_advisory_surveyed_to_ask_if_timely_fair,
mfo4_formb_advisory_surveyed_to_ask_if_timely_good,
mfo4_formb_advisory_surveyed_to_ask_if_timely_better,
mfo4_formb_advisory_surveyed_to_ask_if_timely_best,
mfo4_formb_advisory_surveyed_to_ask_if_timely_good_better_best,
mfo4_formb_advisory_survey_form_to_ask_if_timely_attachment,
mfo4_formb_advisory_survey_tally_sheet,
created)
VALUES(
'$unit_contributor_id',
'$unit_delivery_id',
'$focal_person_id',
'$cu_id',
'$cu_short_name',
'$unit_delivery_name_cu',
'$unit_contributor_name',
'$advisory_title',
'$advisory_venue',
STR_TO_DATE('$_POST[start_date]','%m/%d/%Y'),
'$quarter',
'$request_mode',
'$request_count',
'$attach_adv_service_req',
'$survey_conducted',
'$request_acted',
'$client_count',
'$considered_gaa_bp',
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
'$assisted_count',
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
header("Location: ../MFO4/advisory_view_all.php");

mysqli_close($mysqli);

?>
</body>
</html>
