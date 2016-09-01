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
for ($x=1; $x <= 2; $x++){
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

//get the encoded data
      $qms_std = stripslashes($_POST['qms_std']);

	  $cert_holder = stripslashes($_POST['cert_holder']);
      $cert_scope = stripslashes($_POST['cert_scope']);
	  $cert_number = stripslashes($_POST['cert_number']);

      $re_reg_cert_date = stripslashes($_POST['re_reg_cert_date']);
      $expiry_date = stripslashes($_POST['expiry_date']);

	  $attachment_level_scheme = stripslashes($_POST['file_name_sample1']);
      $attachment_level_scheme = rtrim($attachment_level_scheme.".pdf");

	  $attachment_qms_cert = stripslashes($_POST['file_name_sample2']);
	  $attachment_qms_cert = rtrim($attachment_qms_cert.".pdf");

	  $sto_formb1_quality_assessment_id = stripslashes($_POST['sto_formb1_quality_assessment_id']);
	  
//provision for the qms reference table, if any	  
//disect ID and equivalent data of dropdown selection
//	  $new_std_name = explode(",", $_POST['qms_std']);
//	  $ref_quality_assessment_standard_id = trim($new_std_name[0]);
//	  $ref_quality_assessment_standard_name = ($new_std_name[1]);
	  
//derive the date quarter	
//	  $orig_cert_date = strtotime($orig_cert_date);
//	  $month = date("m",$orig_cert_date);
//	  $orig_quarter = ceil($month/3);

	  $re_reg_cert_date = strtotime($re_reg_cert_date);
	  $month = date("m",$re_reg_cert_date);
	  $re_reg_quarter = ceil($month/3);

//provision for the re-registration date, if any
//      if ( $re_reg_cert_date == '' ) {
//          $quarter = $orig_quarter;
//		 }
//	  else {
//	      $quarter = $re_reg_quarter;
//      }
	  
//validate the data
if ( $qms_std == '' ) {
print '<p>Error! QMS Standard is missing.</p>';
exit();
}

if ( $cert_holder == '' ) {
print '<p>Error! Certificate holder is missing.</p>';
exit();
}

if ( $cert_scope == '' ) {
print '<p>Error! Scope is missing.</p>';
exit();
}

if ( $cert_number == '' ) {
print '<p>Error! Certificate/appendix number is missing.</p>';
exit();
}

if ( $attachment_level_scheme == '' ) {
  print '<p>Error! Attachment 1 is missing.</p>';
  exit();
}

if ( $attachment_qms_cert == '' ) {
  print '<p>Error! Attachment 2 is missing.</p>';
  exit();
}

//make the fields safe
$qms_std = $mysqli->escape_string($qms_std);
$cert_holder = $mysqli->escape_string($cert_holder);
$cert_scope = $mysqli->escape_string($cert_scope);
$cert_number = $mysqli->escape_string($cert_number);
$attachment_level_scheme = $mysqli->escape_string($attachment_level_scheme);
$attachment_qms_cert = $mysqli->escape_string($attachment_qms_cert);

//run the SQL to edit the record
$query = "UPDATE tbl_sd_6_sto_formb1_quality_assessment 
SET
tbl_sd_6_sto_formb1_quality_assessment.unit_contributor_id = '$unit_contributor_id',
tbl_sd_6_sto_formb1_quality_assessment.unit_delivery_id = '$unit_delivery_id',
tbl_sd_6_sto_formb1_quality_assessment.focal_person_id = '$focal_person_id',
tbl_sd_6_sto_formb1_quality_assessment.cu_id = '$cu_id',
tbl_sd_6_sto_formb1_quality_assessment.cu_short_name= '$cu_short_name',
tbl_sd_6_sto_formb1_quality_assessment.unit_delivery_name_cu = '$unit_delivery_name_cu',
tbl_sd_6_sto_formb1_quality_assessment.unit_contributor_name = '$unit_contributor_name',
tbl_sd_6_sto_formb1_quality_assessment.sto_formb1_quality_assessment_quarter = '$re_reg_quarter',
tbl_sd_6_sto_formb1_quality_assessment.ref_quality_assessment_standard_id = '0',
tbl_sd_6_sto_formb1_quality_assessment.ref_quality_assessment_standard_name = '$qms_std',
tbl_sd_6_sto_formb1_quality_assessment.sto_formb1_quality_assessment_certificate_holder = '$cert_holder',
tbl_sd_6_sto_formb1_quality_assessment.sto_formb1_quality_assessment_scope = '$cert_scope',
tbl_sd_6_sto_formb1_quality_assessment.sto_formb1_quality_assessment_certificate_number = '$cert_number',
tbl_sd_6_sto_formb1_quality_assessment.sto_formb1_quality_assessment_certificate_date_reregistration = STR_TO_DATE('$_POST[re_reg_cert_date]','%m/%d/%Y'),
tbl_sd_6_sto_formb1_quality_assessment.sto_formb1_quality_assessment_inquiry_date = STR_TO_DATE('$_POST[expiry_date]','%m/%d/%Y'),
tbl_sd_6_sto_formb1_quality_assessment.sto_formb1_quality_assessment_attachment_levelling_scheme = '$attachment_level_scheme',
tbl_sd_6_sto_formb1_quality_assessment.sto_formb1_quality_assessment_attachment_certificate = '$attachment_qms_cert',
tbl_sd_6_sto_formb1_quality_assessment.edited = NOW()
WHERE tbl_sd_6_sto_formb1_quality_assessment.sto_formb1_quality_assessment_id = '$sto_formb1_quality_assessment_id'";

if (!mysqli_query($mysqli,$query))
  {
    die('Error: ' . mysqli_error($mysqli));
  }

header("Location: ../STO/sto_formb1_view_all.php");

mysqli_close($mysqli);

?>
