<?php
session_name("pbb");
session_start();
// #tracy - Comment out next line. Not needed.
// ob_start();
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

//Get the form fields
	$qtr = 4;
	$apcpi = (isset($_POST['apcpi'])) ? stripslashes($_POST['apcpi']) : '';
	// #tracy - Changed next line
	// $gass_formc_apcpi_attachment = $mysqli->escape_string($_FILES['uploadFile1']['name']);
	$gass_formc_apcpi_attachment = (isset($_FILES['uploadFile1'])) ? $mysqli->escape_string($_FILES['uploadFile1']['name']) : '';
	$app = (isset($_POST['app'])) ? stripslashes($_POST['app']) : '';
	// #tracy - Changed next line
	// $gass_formd_app_attachment = $mysqli->escape_string($_FILES['uploadFile2']['name']);
	$gass_formd_app_attachment = (isset($_FILES['uploadFile2'])) ? $mysqli->escape_string($_FILES['uploadFile2']['name']) : '';

//Make the fields safe.
	$apcpi = $mysqli->escape_string($apcpi);
	$app = $mysqli->escape_string($app);

//Create and run the SQL.
$query = "INSERT INTO tbl_sd_7_gass_formcd_apcpi_app(
unit_contributor_id,
unit_delivery_id,
focal_person_id,
cu_id,
cu_short_name,
unit_delivery_name_cu,
unit_contributor_name,
gass_formcd_apcpi_app_quarter,
gass_formc_apcpi_submitted,
gass_formc_apcpi_attachment,
gass_formd_app_submitted,
gass_formd_app_attachment,
created)
VALUES(
'$unit_contributor_id',
'$unit_delivery_id',
'$focal_person_id',
'$cu_id',
'$cu_short_name',
'$unit_delivery_name_cu',
'$unit_contributor_name',
'$qtr',
'$apcpi',
'$gass_formc_apcpi_attachment',
'$app',
'$gass_formd_app_attachment',
NOW())";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

//echo "1 record added";
// #tracy - Comment out next line. Close sql connection first.
//header("Location: ../GASS/apcpi_app_view_all.php");

mysqli_close($mysqli);
// #tracy - Added next line
header("Location: ../GASS/apcpi_app_view_all.php");

?>
<!-- #tracy - Unmatched closing tags. Not needed.
</body>
</html> -->