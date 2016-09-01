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
	$gass_formb_bfar_id = stripslashes($_POST['gass_formb_bfar_id']);

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

//Assign Attachment Filename
if ($bfar4_12 == "Y"){
	$gass_formb_bfar_4_qtr4_attachment1 = stripslashes($_POST['file_name_sample1']);
	$gass_formb_bfar_4_qtr4_attachment1 = $gass_formb_bfar_4_qtr4_attachment1 . ".pdf";
	}
	else{
	$gass_formb_bfar_4_qtr4_attachment1 = '';
	}
if ($bfar4_1 == "Y" || $bfar4_2 == "Y" || $bfar4_3 == "Y"){
	$gass_formb_bfar_4_qtr1_attachment = stripslashes($_POST['file_name_sample2']);
	$gass_formb_bfar_4_qtr1_attachment = $gass_formb_bfar_4_qtr1_attachment . ".pdf";
	}
	else{
	$gass_formb_bfar_4_qtr1_attachment = '';
	}
if ($bfar4_4 == "Y" || $bfar4_5 == "Y" || $bfar4_6 == "Y"){
	$gass_formb_bfar_4_qtr2_attachment = stripslashes($_POST['file_name_sample3']);
	$gass_formb_bfar_4_qtr2_attachment = $gass_formb_bfar_4_qtr2_attachment . ".pdf";
	}
	else{
	$gass_formb_bfar_4_qtr2_attachment = '';
	}
if ($bfar4_7 == "Y" || $bfar4_8 == "Y" || $bfar4_9 == "Y"){
	$gass_formb_bfar_4_qtr3_attachment = stripslashes($_POST['file_name_sample4']);
	$gass_formb_bfar_4_qtr3_attachment = $gass_formb_bfar_4_qtr3_attachment . ".pdf";
	}
	else{
	$gass_formb_bfar_4_qtr3_attachment = '';
	}
if ($bfar4_10 == "Y" || $bfar4_11 == "Y"){
	$gass_formb_bfar_4_qtr4_attachment2 = stripslashes($_POST['file_name_sample5']);
	$gass_formb_bfar_4_qtr4_attachment2 = $gass_formb_bfar_4_qtr4_attachment2 . ".pdf";
	}
	else{
	$gass_formb_bfar_4_qtr4_attachment2 = '';
	}

if ($SAAODB_4 == "Y" || $SAAODBOE_4 == "Y" || $LASA_4 == "Y" || $SABUDB_4 == "Y" || $SABUDBOE_4 == "Y" || $ADDO_4 == "Y" || $QRROR_4 == "Y" ){
	$gass_formb_bfar_qtr4_attachment = stripslashes($_POST['file_name_sample6']);
	$gass_formb_bfar_qtr4_attachment = $gass_formb_bfar_qtr4_attachment . ".pdf";
	}
	else{
	$gass_formb_bfar_qtr4_attachment = '';
	}
if ($SAAODB_1 == "Y" || $SAAODBOE_1 == "Y" || $LASA_1 == "Y" || $SABUDB_1 == "Y" || $SABUDBOE_1 == "Y" || $QRROR_1 == "Y" ){
	$gass_formb_bfar_qtr1_attachment = stripslashes($_POST['file_name_sample7']);
	$gass_formb_bfar_qtr1_attachment = $gass_formb_bfar_qtr1_attachment . ".pdf";
	}
	else{
	$gass_formb_bfar_qtr1_attachment = '';
	}
if ($SAAODB_2 == "Y" || $SAAODBOE_2 == "Y" || $LASA_2 == "Y" || $SABUDB_2 == "Y" || $SABUDBOE_2 == "Y" || $QRROR_2 == "Y" ){
	$gass_formb_bfar_qtr2_attachment = stripslashes($_POST['file_name_sample8']);
	$gass_formb_bfar_qtr2_attachment = $gass_formb_bfar_qtr2_attachment . ".pdf";
	}
	else{
	$gass_formb_bfar_qtr2_attachment = '';
	}
if ($SAAODB_3 == "Y" || $SAAODBOE_3 == "Y" || $LASA_3 == "Y" || $SABUDB_3 == "Y" || $SABUDBOE_3 == "Y" || $QRROR_3 == "Y" ){
	$gass_formb_bfar_qtr3_attachment = stripslashes($_POST['file_name_sample9']);
	$gass_formb_bfar_qtr3_attachment = $gass_formb_bfar_qtr3_attachment . ".pdf";
	}
	else{
	$gass_formb_bfar_qtr3_attachment = '';
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

//Create and run the SQL to update obur
$query = "UPDATE tbl_sd_7_gass_formb_bfar 
SET
gass_formb_bfar_4_dec = '$bfar4_12',
gass_formb_bfar_4_qtr4_attachment1 = '$gass_formb_bfar_4_qtr4_attachment1',
gass_formb_bfar_4_jan = '$bfar4_1',
gass_formb_bfar_4_feb = '$bfar4_2',
gass_formb_bfar_4_mar = '$bfar4_3',
gass_formb_bfar_4_qtr1_attachment = '$gass_formb_bfar_4_qtr1_attachment',
gass_formb_bfar_4_qtr1_count = '$bfar4_count_1',
gass_formb_bfar_4_apr = '$bfar4_4',
gass_formb_bfar_4_may = '$bfar4_5',
gass_formb_bfar_4_jun = '$bfar4_6',
gass_formb_bfar_4_qtr2_attachment = '$gass_formb_bfar_4_qtr2_attachment',
gass_formb_bfar_4_qtr2_count = '$bfar4_count_2',
gass_formb_bfar_4_jul = '$bfar4_7',
gass_formb_bfar_4_aug = '$bfar4_8',
gass_formb_bfar_4_sep = '$bfar4_9',
gass_formb_bfar_4_qtr3_attachment = '$gass_formb_bfar_4_qtr3_attachment',
gass_formb_bfar_4_qtr3_count = '$bfar4_count_3',
gass_formb_bfar_4_oct = '$bfar4_10',
gass_formb_bfar_4_nov = '$bfar4_11',
gass_formb_bfar_4_qtr4_attachment2 = '$gass_formb_bfar_4_qtr4_attachment2',
gass_formb_bfar_4_qtr4_count = '$bfar4_count_4',
gass_formb_bar_1_qtr4 = '$QPRO_4',
gass_formb_bfar_1_qtr4 = '$SAAODB_4',
gass_formb_bfar_1a_qtr4 = '$SAAODBOE_4',
gass_formb_bfar_1b_qtr4 = '$LASA_4',
gass_formb_bfar_2_qtr4 = '$SABUDB_4',
gass_formb_bfar_2a_qtr4 = '$SABUDBOE_4',
gass_formb_bfar_3_qtr4 = '$ADDO_4',
gass_formb_bfar_5_qtr4 = '$QRROR_4',
gass_formb_bfar_qtr4_attachment = '$gass_formb_bfar_qtr4_attachment',
gass_formb_bar_1_qtr1 = '$QPRO_1',
gass_formb_bfar_1_qtr1 = '$SAAODB_1',
gass_formb_bfar_1a_qtr1 = '$SAAODBOE_1',
gass_formb_bfar_1b_qtr1 = '$LASA_1',
gass_formb_bfar_2_qtr1 = '$SABUDB_1',
gass_formb_bfar_2a_qtr1 = '$SABUDBOE_1',
gass_formb_bfar_5_qtr1 = '$QRROR_1',
gass_formb_bfar_qtr1_attachment = '$gass_formb_bfar_qtr1_attachment',
gass_formb_bar_1_qtr2 = '$QPRO_2',
gass_formb_bfar_1_qtr2 = '$SAAODB_2',
gass_formb_bfar_1a_qtr2 = '$SAAODBOE_2',
gass_formb_bfar_1b_qtr2 = '$LASA_2',
gass_formb_bfar_2_qtr2 = '$SABUDB_2',
gass_formb_bfar_2a_qtr2 = '$SABUDBOE_2',
gass_formb_bfar_5_qtr2 = '$QRROR_2',
gass_formb_bfar_qtr2_attachment = '$gass_formb_bfar_qtr2_attachment',
gass_formb_bar_1_qtr3 = '$QPRO_3',
gass_formb_bfar_1_qtr3 = '$SAAODB_3',
gass_formb_bfar_1a_qtr3 = '$SAAODBOE_3',
gass_formb_bfar_1b_qtr3 = '$LASA_3',
gass_formb_bfar_2_qtr3 = '$SABUDB_3',
gass_formb_bfar_2a_qtr3 = '$SABUDBOE_3',
gass_formb_bfar_5_qtr3 = '$QRROR_3',
gass_formb_bfar_qtr3_attachment = '$gass_formb_bfar_qtr3_attachment',
gass_formb_bfar_1_total = '$SAAODB_count',
gass_formb_bfar_1a_total = '$SAAODBOE_count',
gass_formb_bfar_1b_total = '$LASA_count',
gass_formb_bfar_2_total = '$SABUDB_count',
gass_formb_bfar_2a_total = '$SABUDBOE_count',
gass_formb_bfar_3_total = '$ADDO_4_count',
gass_formb_bfar_4_total = '$bfar4_count',
gass_formb_bfar_5_total = '$QRROR_count',
gass_formb_office_choice = '$office',
edited = NOW()
WHERE gass_formb_bfar_id = '$gass_formb_bfar_id'";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

//echo "1 record edited";
// #tracy - Comment out next line.  Close sql connection first.
//header("Location: ../GASS/bfar_view_all.php?");

mysqli_close($mysqli);
// #tracy - Added next line;
header("Location: ../GASS/bfar_view_all.php?");
// #tracy - Comment out next line. Not needed.
// ob_end_flush();

?>
