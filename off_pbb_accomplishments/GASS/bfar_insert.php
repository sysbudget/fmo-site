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
for ($x=1; $x <= 9; $x++){
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

// #tracy - Added next 9 lines. Initialize variables.
$gass_formb_bfar_4_qtr4_attachment1 = "";
$gass_formb_bfar_4_qtr1_attachment = "";
$gass_formb_bfar_4_qtr2_attachment = "";
$gass_formb_bfar_4_qtr3_attachment = "";
$gass_formb_bfar_4_qtr4_attachment2 = "";
$gass_formb_bfar_qtr4_attachment = "";
$gass_formb_bfar_qtr1_attachment = "";
$gass_formb_bfar_qtr2_attachment = "";
$gass_formb_bfar_qtr3_attachment = "";

if (isset($_FILES['uploadFile1']['name'])){
	$gass_formb_bfar_4_qtr4_attachment1 = $mysqli->escape_string($_FILES['uploadFile1']['name']);
	}
if (isset($_FILES['uploadFile2']['name'])) {
	$gass_formb_bfar_4_qtr1_attachment = $mysqli->escape_string($_FILES['uploadFile2']['name']);
	}
if (isset($_FILES['uploadFile3']['name'])) {
	$gass_formb_bfar_4_qtr2_attachment = $mysqli->escape_string($_FILES['uploadFile3']['name']);
	}
if (isset($_FILES['uploadFile4']['name'])) {
	$gass_formb_bfar_4_qtr3_attachment = $mysqli->escape_string($_FILES['uploadFile4']['name']);
	}
if (isset($_FILES['uploadFile5']['name'])) {
	$gass_formb_bfar_4_qtr4_attachment2 = $mysqli->escape_string($_FILES['uploadFile5']['name']);
	}
if (isset($_FILES['uploadFile6']['name'])) {
	$gass_formb_bfar_qtr4_attachment = $mysqli->escape_string($_FILES['uploadFile6']['name']);
	}
if (isset($_FILES['uploadFile7']['name'])) {
	$gass_formb_bfar_qtr1_attachment = $mysqli->escape_string($_FILES['uploadFile7']['name']);
	}
if (isset($_FILES['uploadFile8']['name'])) {
	$gass_formb_bfar_qtr2_attachment = $mysqli->escape_string($_FILES['uploadFile8']['name']);
	}
if (isset($_FILES['uploadFile9']['name'])) {
	$gass_formb_bfar_qtr3_attachment = $mysqli->escape_string($_FILES['uploadFile9']['name']);
	}

	$bfar4_1 = isset($_POST['bfar4_1']) ? stripslashes($_POST['bfar4_1']) : '';
	$bfar4_2 = isset($_POST['bfar4_2']) ? stripslashes($_POST['bfar4_2']) : '';
	$bfar4_3 = isset($_POST['bfar4_3']) ? stripslashes($_POST['bfar4_3']) : '';
	$bfar4_4 = isset($_POST['bfar4_4']) ? stripslashes($_POST['bfar4_4']) : '';
	$bfar4_5 = isset($_POST['bfar4_5']) ? stripslashes($_POST['bfar4_5']) : '';
	$bfar4_6 = isset($_POST['bfar4_6']) ? stripslashes($_POST['bfar4_6']) : '';
	$bfar4_7 = isset($_POST['bfar4_7']) ? stripslashes($_POST['bfar4_7']) : '';
	$bfar4_8 = isset($_POST['bfar4_8']) ? stripslashes($_POST['bfar4_8']) : '';
	$bfar4_9 = isset($_POST['bfar4_9']) ? stripslashes($_POST['bfar4_9']) : '';
	$bfar4_10 = isset($_POST['bfar4_10']) ? stripslashes($_POST['bfar4_10']) : '';
	$bfar4_11 = isset($_POST['bfar4_11']) ? stripslashes($_POST['bfar4_11']) : '';
	$bfar4_12 = isset($_POST['bfar4_12']) ? stripslashes($_POST['bfar4_12']) : '';

	$QPRO_4 = isset($_POST['QPRO_4']) ? stripslashes($_POST['QPRO_4']) : '';
	$SAAODB_4 = isset($_POST['SAAODB_4']) ? stripslashes($_POST['SAAODB_4']) : '';
	$SAAODBOE_4 = isset($_POST['SAAODBOE_4']) ? stripslashes($_POST['SAAODBOE_4']) : '';
	$LASA_4 = isset($_POST['LASA_4']) ? stripslashes($_POST['LASA_4']) : '';
	$SABUDB_4 = isset($_POST['SABUDB_4']) ? stripslashes($_POST['SABUDB_4']) : '';
	$SABUDBOE_4 = isset($_POST['SABUDBOE_4']) ? stripslashes($_POST['SABUDBOE_4']) : '';
	$ADDO_4 = isset($_POST['ADDO_4']) ? stripslashes($_POST['ADDO_4']) : '';
	$QRROR_4 = isset($_POST['QRROR_4']) ? stripslashes($_POST['QRROR_4']) : '';

	$QPRO_1 = isset($_POST['QPRO_1']) ? stripslashes($_POST['QPRO_1']) : '';
	$SAAODB_1 = isset($_POST['SAAODB_1']) ? stripslashes($_POST['SAAODB_1']) : '';
	$SAAODBOE_1 = isset($_POST['SAAODBOE_1']) ? stripslashes($_POST['SAAODBOE_1']) : '';
	$LASA_1 = isset($_POST['LASA_1']) ? stripslashes($_POST['LASA_1']) : '';
	$SABUDB_1 = isset($_POST['SABUDB_1']) ? stripslashes($_POST['SABUDB_1']) : '';
	$SABUDBOE_1 = isset($_POST['SABUDBOE_1']) ? stripslashes($_POST['SABUDBOE_1']) : '';
	$QRROR_1 = isset($_POST['QRROR_1']) ? stripslashes($_POST['QRROR_1']) : '';

	$QPRO_2 = isset($_POST['QPRO_2']) ? stripslashes($_POST['QPRO_2']) : '';
	$SAAODB_2 = isset($_POST['SAAODB_2']) ? stripslashes($_POST['SAAODB_2']) : '';
	$SAAODBOE_2 = isset($_POST['SAAODBOE_2']) ? stripslashes($_POST['SAAODBOE_2']) : '';
	$LASA_2 = isset($_POST['LASA_2']) ? stripslashes($_POST['LASA_2']) : '';
	$SABUDB_2 = isset($_POST['SABUDB_2']) ? stripslashes($_POST['SABUDB_2']) : '';
	$SABUDBOE_2 = isset($_POST['SABUDBOE_2']) ? stripslashes($_POST['SABUDBOE_2']) : '';
	$QRROR_2 = isset($_POST['QRROR_2']) ? stripslashes($_POST['QRROR_2']) : '';

	$QPRO_3 = isset($_POST['QPRO_3']) ? stripslashes($_POST['QPRO_3']) : '';
	$SAAODB_3 = isset($_POST['SAAODB_3']) ? stripslashes($_POST['SAAODB_3']) : '';
	$SAAODBOE_3 = isset($_POST['SAAODBOE_3']) ? stripslashes($_POST['SAAODBOE_3']) : '';
	$LASA_3 = isset($_POST['LASA_3']) ? stripslashes($_POST['LASA_3']) : '';
	$SABUDB_3 = isset($_POST['SABUDB_3']) ? stripslashes($_POST['SABUDB_3']) : '';
	$SABUDBOE_3 = isset($_POST['SABUDBOE_3']) ? stripslashes($_POST['SABUDBOE_3']) : '';
	$QRROR_3 = isset($_POST['QRROR_3']) ? stripslashes($_POST['QRROR_3']) : '';

/*
	$gass_formb_bfar_4_qtr4_attachment1 = $mysqli->escape_string($_FILES['uploadFile1']['name']);
	$gass_formb_bfar_4_qtr1_attachment = $mysqli->escape_string($_FILES['uploadFile2']['name']);
	$gass_formb_bfar_4_qtr2_attachment = $mysqli->escape_string($_FILES['uploadFile3']['name']);
	$gass_formb_bfar_4_qtr3_attachment = $mysqli->escape_string($_FILES['uploadFile4']['name']);
	$gass_formb_bfar_4_qtr4_attachment2 = $mysqli->escape_string($_FILES['uploadFile5']['name']);
	$gass_formb_bfar_qtr4_attachment = $mysqli->escape_string($_FILES['uploadFile6']['name']);
	$gass_formb_bfar_qtr1_attachment = $mysqli->escape_string($_FILES['uploadFile7']['name']);
	$gass_formb_bfar_qtr2_attachment = $mysqli->escape_string($_FILES['uploadFile8']['name']);
	$gass_formb_bfar_qtr3_attachment = $mysqli->escape_string($_FILES['uploadFile9']['name']);
*/

	$office = isset($_POST['office']) ? stripslashes($_POST['office']) : '';

//Determine the "Y" Count
$ctr = "";
$SAAODB_count = 0;
for ($j=1; $j <= 4; $j++){ 
$ctr = ${'SAAODB_' .$j};
	if ($ctr == "Y") {
		$SAAODB_count++;
		}
	}

$ctr = "";
$SAAODBOE_count = 0;
for ($j=1; $j <= 4; $j++){ 
$ctr = ${'SAAODBOE_' .$j};
	if ($ctr == "Y") {
		$SAAODBOE_count++;
		}
	}

$ctr = "";
$LASA_count = 0;
for ($j=1; $j <= 4; $j++){ 
$ctr = ${'LASA_' .$j};
	if ($ctr == "Y") {
		$LASA_count++;
		}
	}

$ctr = "";
$SABUDB_count = 0;
for ($j=1; $j <= 4; $j++){ 
$ctr = ${'SABUDB_' .$j};
	if ($ctr == "Y") {
		$SABUDB_count++;
		}
	}

$ctr = "";
$SABUDBOE_count = 0;
for ($j=1; $j <= 4; $j++){ 
$ctr = ${'SABUDBOE_' .$j};
	if ($ctr == "Y") {
		$SABUDBOE_count++;
		}
	}

$ADDO_4_count = 0;
if ($ADDO_4 == "Y") {
	$ADDO_4_count = 1;
	}

$ctr = "";
$bfar4_count = 0;
for ($j=1; $j <= 4; $j++){ 
$ctr = ${'QRROR_' .$j};
	if ($ctr == "Y") {
		$bfar4_count++;
		}
	}

$ctr = "";
$bfar4_count_1 = 0;
for ($j=1; $j <= 3; $j++){ 
$ctr = ${'bfar4_' .$j};
	if ($ctr == "Y") {
		$bfar4_count_1++;
		}
	}

$ctr = "";
$bfar4_count_2 = 0;
for ($j=4; $j <= 6; $j++){ 
$ctr = ${'bfar4_' .$j};
	if ($ctr == "Y") {
		$bfar4_count_2++;
		}
	}

$ctr = "";
$bfar4_count_3 = 0;
for ($j=7; $j <= 9; $j++){ 
$ctr = ${'bfar4_' .$j};
	if ($ctr == "Y") {
		$bfar4_count_3++;
		}
	}

$ctr = "";
$bfar4_count_4 = 0;
for ($j=10; $j <= 12; $j++){ 
$ctr = ${'bfar4_' .$j};
	if ($ctr == "Y") {
		$bfar4_count_4++;
		}
	}

$ctr = "";
$bfar4_count = 0;
for ($j=1; $j <= 12; $j++){ 
$ctr = ${'bfar4_' .$j};
	if ($ctr == "Y") {
		$bfar4_count++;
		}
	}

$ctr = "";
$QRROR_count = 0;
for ($j=1; $j <= 4; $j++){ 
$ctr = ${'QRROR_' .$j};
	if ($ctr == "Y") {
		$QRROR_count++;
		}
	}

//Make the fields safe.
	$office = $mysqli->escape_string($office);
	$bfar4_1 = $mysqli->escape_string($bfar4_1);
	$bfar4_2 = $mysqli->escape_string($bfar4_2);
	$bfar4_3 = $mysqli->escape_string($bfar4_3);
	$bfar4_4 = $mysqli->escape_string($bfar4_4);
	$bfar4_5 = $mysqli->escape_string($bfar4_5);
	$bfar4_6 = $mysqli->escape_string($bfar4_6);
	$bfar4_7 = $mysqli->escape_string($bfar4_7);
	$bfar4_8 = $mysqli->escape_string($bfar4_8);
	$bfar4_9 = $mysqli->escape_string($bfar4_9);
	$bfar4_10 = $mysqli->escape_string($bfar4_10);
	$bfar4_11 = $mysqli->escape_string($bfar4_11);
	$bfar4_12 = $mysqli->escape_string($bfar4_12);

	$QPRO_4 = $mysqli->escape_string($QPRO_4);
	$SAAODB_4 = $mysqli->escape_string($SAAODB_4);
	$SAAODBOE_4 = $mysqli->escape_string($SAAODBOE_4);
	$LASA_4 = $mysqli->escape_string($LASA_4);
	$SABUDB_4 = $mysqli->escape_string($SABUDB_4);
	$SABUDBOE_4 = $mysqli->escape_string($SABUDBOE_4);
	$ADDO_4 = $mysqli->escape_string($ADDO_4);
	$QRROR_4 = $mysqli->escape_string($QRROR_4);

	$QPRO_1 = $mysqli->escape_string($QPRO_1);
	$SAAODB_1 = $mysqli->escape_string($SAAODB_1);
	$SAAODBOE_1 = $mysqli->escape_string($SAAODBOE_1);
	$LASA_1 = $mysqli->escape_string($LASA_1);
	$SABUDB_1 = $mysqli->escape_string($SABUDB_1);
	$SABUDBOE_1 = $mysqli->escape_string($SABUDBOE_1);
	$QRROR_1 = $mysqli->escape_string($QRROR_1);

	$QPRO_2 = $mysqli->escape_string($QPRO_2);
	$SAAODB_2 = $mysqli->escape_string($SAAODB_2);
	$SAAODBOE_2 = $mysqli->escape_string($SAAODBOE_2);
	$LASA_2 = $mysqli->escape_string($LASA_2);
	$SABUDB_2 = $mysqli->escape_string($SABUDB_2);
	$SABUDBOE_2 = $mysqli->escape_string($SABUDBOE_2);
	$QRROR_2 = $mysqli->escape_string($QRROR_2);

	$QPRO_3 = $mysqli->escape_string($QPRO_3);
	$SAAODB_3 = $mysqli->escape_string($SAAODB_3);
	$SAAODBOE_3 = $mysqli->escape_string($SAAODBOE_3);
	$LASA_3 = $mysqli->escape_string($LASA_3);
	$SABUDB_3 = $mysqli->escape_string($SABUDB_3);
	$SABUDBOE_3 = $mysqli->escape_string($SABUDBOE_3);
	$QRROR_3 = $mysqli->escape_string($QRROR_3);

//Create and run the SQL.
$query = "INSERT INTO tbl_sd_7_gass_formb_bfar(
unit_contributor_id,
unit_delivery_id,
focal_person_id,
cu_id,
cu_short_name,
unit_delivery_name_cu,
unit_contributor_name,
gass_formb_bfar_4_dec,
gass_formb_bfar_4_qtr4_attachment1,
gass_formb_bfar_4_jan,
gass_formb_bfar_4_feb,
gass_formb_bfar_4_mar,
gass_formb_bfar_4_qtr1_attachment,
gass_formb_bfar_4_qtr1_count,
gass_formb_bfar_4_apr,
gass_formb_bfar_4_may,
gass_formb_bfar_4_jun,
gass_formb_bfar_4_qtr2_attachment,
gass_formb_bfar_4_qtr2_count,
gass_formb_bfar_4_jul,
gass_formb_bfar_4_aug,
gass_formb_bfar_4_sep,
gass_formb_bfar_4_qtr3_attachment,
gass_formb_bfar_4_qtr3_count,
gass_formb_bfar_4_oct,
gass_formb_bfar_4_nov,
gass_formb_bfar_4_qtr4_attachment2,
gass_formb_bfar_4_qtr4_count,
gass_formb_bar_1_qtr4,
gass_formb_bfar_1_qtr4,
gass_formb_bfar_1a_qtr4,
gass_formb_bfar_1b_qtr4,
gass_formb_bfar_2_qtr4,
gass_formb_bfar_2a_qtr4,
gass_formb_bfar_3_qtr4,
gass_formb_bfar_5_qtr4,
gass_formb_bfar_qtr4_attachment,
gass_formb_bar_1_qtr1,
gass_formb_bfar_1_qtr1,
gass_formb_bfar_1a_qtr1,
gass_formb_bfar_1b_qtr1,
gass_formb_bfar_2_qtr1,
gass_formb_bfar_2a_qtr1,
gass_formb_bfar_5_qtr1,
gass_formb_bfar_qtr1_attachment,
gass_formb_bar_1_qtr2,
gass_formb_bfar_1_qtr2,
gass_formb_bfar_1a_qtr2,
gass_formb_bfar_1b_qtr2,
gass_formb_bfar_2_qtr2,
gass_formb_bfar_2a_qtr2,
gass_formb_bfar_5_qtr2,
gass_formb_bfar_qtr2_attachment,
gass_formb_bar_1_qtr3,
gass_formb_bfar_1_qtr3,
gass_formb_bfar_1a_qtr3,
gass_formb_bfar_1b_qtr3,
gass_formb_bfar_2_qtr3,
gass_formb_bfar_2a_qtr3,
gass_formb_bfar_5_qtr3,
gass_formb_bfar_qtr3_attachment,
gass_formb_bfar_1_total,
gass_formb_bfar_1a_total,
gass_formb_bfar_1b_total,
gass_formb_bfar_2_total,
gass_formb_bfar_2a_total,
gass_formb_bfar_3_total,
gass_formb_bfar_4_total,
gass_formb_bfar_5_total,
gass_formb_office_choice,
created)
VALUES(
'$unit_contributor_id',
'$unit_delivery_id',
'$focal_person_id',
'$cu_id',
'$cu_short_name',
'$unit_delivery_name_cu',
'$unit_contributor_name',
'$bfar4_12',
'$gass_formb_bfar_4_qtr4_attachment1',
'$bfar4_1',
'$bfar4_2',
'$bfar4_3',
'$gass_formb_bfar_4_qtr1_attachment',
'$bfar4_count_1',
'$bfar4_4',
'$bfar4_5',
'$bfar4_6',
'$gass_formb_bfar_4_qtr2_attachment',
'$bfar4_count_2',
'$bfar4_7',
'$bfar4_8',
'$bfar4_9',
'$gass_formb_bfar_4_qtr3_attachment',
'$bfar4_count_3',
'$bfar4_10',
'$bfar4_11',
'$gass_formb_bfar_4_qtr4_attachment2',
'$bfar4_count_4',
'$QPRO_4',
'$SAAODB_4',
'$SAAODBOE_4',
'$LASA_4',
'$SABUDB_4',
'$SABUDBOE_4',
'$ADDO_4',
'$QRROR_4',
'$gass_formb_bfar_qtr4_attachment',
'$QPRO_1',
'$SAAODB_1',
'$SAAODBOE_1',
'$LASA_1',
'$SABUDB_1',
'$SABUDBOE_1',
'$QRROR_1',
'$gass_formb_bfar_qtr1_attachment',
'$QPRO_2',
'$SAAODB_2',
'$SAAODBOE_2',
'$LASA_2',
'$SABUDB_2',
'$SABUDBOE_2',
'$QRROR_2',
'$gass_formb_bfar_qtr2_attachment',
'$QPRO_3',
'$SAAODB_3',
'$SAAODBOE_3',
'$LASA_3',
'$SABUDB_3',
'$SABUDBOE_3',
'$QRROR_3',
'$gass_formb_bfar_qtr3_attachment',
'$SAAODB_count',
'$SAAODBOE_count',
'$LASA_count',
'$SABUDB_count',
'$SABUDBOE_count',
'$ADDO_4_count',
'$bfar4_count',
'$QRROR_count',
'$office',
NOW())";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }


//echo "1 record added";
// #tracy - Comment out next line.  Close sql connection first.
header("Location: ../GASS/bfar_view_all.php");

mysqli_close($mysqli);
// #tracy - Added next line;
header("Location: ../GASS/bfar_view_all.php?");
// #tracy - Comment out next line.
// ob_end_flush();

?>
<!-- #tracy - Unmatched closing tags. Not needed.
</body>
</html> -->