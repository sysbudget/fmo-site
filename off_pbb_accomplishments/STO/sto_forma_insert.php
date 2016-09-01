<?php

session_name("pbb");
session_start();

//is the user logged in or not
if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

//if not, redirect the user
header('Location: ../login/login_mysqli.php');

exit;

}

//connect to the database
	include('../connect-db.php');

//get the session values
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

//get the encoded data
      $surveyed_unit = stripslashes($_POST['surveyed_unit']);
	  $surveyed_unit_head = stripslashes($_POST['surveyed_unit_head']);
      $ref_service_received_name = stripslashes($_POST['service_received']);
	  $service_detail = stripslashes($_POST['service_detail']);
      $service_gaa = stripslashes($_POST['service_gaa']);
      $survey_date = stripslashes($_POST['survey_date']);
      $survey_mode = stripslashes($_POST['survey_mode']);
      $ref_service_rating_name = stripslashes($_POST['service_rating']);
	 
	  $attachment= $mysqli->escape_string($_FILES['uploadFile']['name']);
	  
	  $sd = stripslashes($_POST['survey_date']);

//extract the objects of pulldown selections
	  $new_service_received = explode(",", $_POST['service_received']);
	  $ref_service_received_id = trim($new_service_received[0]);
	  $ref_service_received_name = ($new_service_received[1]);
	  
	  $new_service_rating = explode(",", $_POST['service_rating']);
	  $ref_service_rating_id = trim($new_service_rating[0]);
      $ref_service_rating_name = ($new_service_rating[1]);
      
//derive the date quarter	
	  $survey_date = strtotime($sd);
	  $month = date("m",$survey_date);
	  $quarter = ceil($month/3);
	
//validate the encoded data
if ( $sd_users_username == '' ) {
print '<p>Error! Username is missing.</p>';
exit();
}

if ( $surveyed_unit == '' ) {
print '<p>Error! Surveyed UP Unit/UP Unit of Respondent is missing.</p>';
exit();
}

if ( $surveyed_unit_head == '' ) {
print '<p>Error! Head of surveyed UP unit/Name of Respondent is missing.</p>';
exit();
}

if ( $service_detail == '' ) {
print '<p>Error! Details of STO service received is missing.</p>';
exit();
}

if ( $attachment == '' ) {
  print '<p>Error! Attachment is missing.</p>';
  exit();
}

//make the fields safe
$surveyed_unit_head = $mysqli->escape_string($surveyed_unit_head);
$service_detail = $mysqli->escape_string($service_detail);
$attachment = $mysqli->escape_string($attachment);

//create the record and run the SQL
$query = "INSERT INTO tbl_sd_6_sto_forma_rated_service(
pbb_contributor_id,
pbb_delivery_id,
unit_contributor_id,
unit_delivery_id,
focal_person_id,
cu_id,
cu_short_name,
unit_delivery_name_cu,
unit_contributor_name,
sto_forma_rated_service_quarter,
sto_forma_rated_service_conu_provided_with_service,
sto_forma_rated_service_head_of_serviced_conu,
ref_service_received_id,
ref_service_received_name,
sto_forma_rated_service_received,
sto_forma_rated_service_financed_general_fund,
sto_forma_rated_service_survey_date,
sto_forma_rated_service_survey_mode,
ref_service_rating_id,
ref_service_rating_name,
sto_forma_rated_service_attachment_questionnaire,
created)
VALUES(
'$unit_contributor_id',
'$unit_delivery_id',
'$unit_contributor_id',
'$unit_delivery_id',
'$focal_person_id',
'$cu_id',
'$cu_short_name',
'$unit_delivery_name_cu',
'$unit_contributor_name',
'$quarter',
'$surveyed_unit',
'$surveyed_unit_head',
'$ref_service_received_id',
'$ref_service_received_name',
'$service_detail',
'$service_gaa',
STR_TO_DATE('$_POST[survey_date]','%m/%d/%Y'),
'$survey_mode',
'$ref_service_rating_id',
'$ref_service_rating_name',
'$attachment',
NOW())";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

header("Location: ../STO/sto_forma_view_all.php");

mysqli_close($mysqli);

?>
</body>
</html>
