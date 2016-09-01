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

//zab's instruction: please insert attachment file upload statements here, if any

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

//attachment
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

//get the user data
      $aspired_std = stripslashes($_POST['aspired_std']);
      $target_date = stripslashes($_POST['target_date']);
      $qms_holder = stripslashes($_POST['qms_holder']);
	  $qms_scope = stripslashes($_POST['qms_scope']);
      $approved_date = stripslashes($_POST['approved_date']);
	  $ad = stripslashes($_POST['approved_date']);

	  $attachment_quality = stripslashes($_POST['attachment_quality']);      
	  $attachment_procedures = stripslashes($_POST['attachment_procedures']);
	  
      $attachment_quality = $mysqli->escape_string($_FILES['uploadFile1']['name']);
      $attachment_procedures = $mysqli->escape_string($_FILES['uploadFile2']['name']);

//derive the date quarter	
	  $approved_date = strtotime($ad);
	  $month = date("m",$approved_date);
	  $approved_quarter = ceil($month/3);

//validate the entries
if ( $aspired_std == '' ) {
print '<p>Error! Aspired ISO Standard is missing.</p>';
exit();
}

if ( $qms_holder == '' ) {
print '<p>Error! QMS Holder is missing.</p>';
exit();
}

if ( $qms_scope == '' ) {
print '<p>Error! QMS Scope is missing.</p>';
exit();
}

if ( $attachment_quality == '' ) {
  print '<p>Error! Attachment 1 is missing.</p>';
  exit();
}

if ( $attachment_procedures == '' ) {
  print '<p>Error! Attachment 2 is missing.</p>';
  exit();
}

//Mmke the fields safe
$aspired_std = $mysqli->escape_string($aspired_std);
$qms_holder = $mysqli->escape_string($qms_holder);
$qms_scope = $mysqli->escape_string($qms_scope);
$attachment_quality = $mysqli->escape_string($attachment_quality);
$attachment_procedures = $mysqli->escape_string($attachment_procedures);

//create the record and run the SQL
$query = "INSERT INTO tbl_sd_6_sto_formb2_iso_aligned(
pbb_contributor_id,
pbb_delivery_id,
unit_contributor_id,
unit_delivery_id,
focal_person_id,
cu_id,
cu_short_name,
unit_delivery_name_cu,
unit_contributor_name,
sto_formb2_iso_aligned_quarter,
sto_formb2_iso_aligned_aspired_standard,
sto_formb2_iso_aligned_aspired_certification_date,
sto_formb2_iso_aligned_qms_holder,
sto_formb2_iso_aligned_qms_scope,
sto_formb2_iso_aligned_qms_manual_approval_date,
sto_formb2_iso_aligned_attachment_quality_manual,
sto_formb2_iso_aligned_attachment_procedures_manual,
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
'$approved_quarter',
'$aspired_std',
STR_TO_DATE('$_POST[target_date]','%m/%d/%Y'),
'$qms_holder',
'$qms_scope',
STR_TO_DATE('$_POST[approved_date]','%m/%d/%Y'),
'$attachment_quality',
'$attachment_procedures',
NOW())";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

header("Location: ../STO/sto_formb2_view_all.php");

mysqli_close($mysqli);

?>
</body>
</html>
