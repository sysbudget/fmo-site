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

	$o_mooe1 = (isset($_POST['o_mooe1'])) ? stripslashes($_POST['o_mooe1']) : '';
	$o_co1 = (isset($_POST['o_co1'])) ? stripslashes($_POST['o_co1']) : '';
	$d_ps1 = (isset($_POST['d_ps1'])) ? stripslashes($_POST['d_ps1']) : '';
	$d_mooe1 = (isset($_POST['d_mooe1'])) ? stripslashes($_POST['d_mooe1']) : '';
	$d_co1 = (isset($_POST['d_co1'])) ? stripslashes($_POST['d_co1']) : '';
	// #tracy - Changed next line
	//$gass_forma_dbur_qtr1_attachment_bfar1 = $mysqli->escape_string($_FILES['uploadFile1']['name']);
	$gass_forma_dbur_qtr1_attachment_bfar1 = (isset($_FILES['uploadFile1'])) ? $mysqli->escape_string($_FILES['uploadFile1']['name']) : '';

	$o_mooe2 = (isset($_POST['o_mooe2'])) ? stripslashes($_POST['o_mooe2']) : '';
	$o_co2 = (isset($_POST['o_co2'])) ? stripslashes($_POST['o_co2']) : '';
	$d_ps2 = (isset($_POST['d_ps2'])) ? stripslashes($_POST['d_ps2']) : '';
	$d_mooe2 = (isset($_POST['d_mooe2'])) ? stripslashes($_POST['d_mooe2']) : '';
	$d_co2 = (isset($_POST['d_co2'])) ? stripslashes($_POST['d_co2']) : '';
	// #tracy - Changed next line
	//$gass_forma_dbur_qtr2_attachment_bfar1 = $mysqli->escape_string($_FILES['uploadFile2']['name']);
	$gass_forma_dbur_qtr2_attachment_bfar1 = (isset($_FILES['uploadFile2'])) ? $mysqli->escape_string($_FILES['uploadFile2']['name']) : '';
	
	$o_mooe3 = (isset($_POST['o_mooe3'])) ? stripslashes($_POST['o_mooe3']) : '';
	$o_co3 = (isset($_POST['o_co3'])) ? stripslashes($_POST['o_co3']) : '';
	$d_ps3 = (isset($_POST['d_ps3'])) ? stripslashes($_POST['d_ps3']) : '';
	$d_mooe3 = (isset($_POST['d_mooe3'])) ? stripslashes($_POST['d_mooe3']) : '';
	$d_co3 = (isset($_POST['d_co3'])) ? stripslashes($_POST['d_co3']) : '';
	// #tracy - Changed next line
	//$gass_forma_dbur_qtr3_attachment_bfar1 = $mysqli->escape_string($_FILES['uploadFile3']['name']);
	$gass_forma_dbur_qtr3_attachment_bfar1 = (isset($_FILES['uploadFile3'])) ? $mysqli->escape_string($_FILES['uploadFile3']['name']) : '';
	
	$o_mooe4 = (isset($_POST['o_mooe4'])) ? stripslashes($_POST['o_mooe4']) : '';
	$o_co4 = (isset($_POST['o_co4'])) ? stripslashes($_POST['o_co4']) : '';
	$d_ps4 = (isset($_POST['d_ps4'])) ? stripslashes($_POST['d_ps4']) : '';
	$d_mooe4 = (isset($_POST['d_mooe4'])) ? stripslashes($_POST['d_mooe4']) : '';
	$d_co4 = (isset($_POST['d_co4'])) ? stripslashes($_POST['d_co4']) : '';
	// #tracy - Changed next line
	//$gass_forma_dbur_qtr4_attachment_bfar1 = $mysqli->escape_string($_FILES['uploadFile4']['name']);
	$gass_forma_dbur_qtr4_attachment_bfar1 = (isset($_FILES['uploadFile4'])) ? $mysqli->escape_string($_FILES['uploadFile4']['name']) : '';

/*
$o_tot1 = $o_mooe1 + $o_co1;
$d_tot1 = $d_ps1 + $d_mooe1 + $d_co1;
$d_m_c_tot1 = $d_mooe1 + $d_co1;

$o_tot2 = $o_mooe2 + $o_co2;
$d_tot2 = $d_ps2 + $d_mooe2 + $d_co2;
$d_m_c_tot2 = $d_mooe2 + $d_co2;

$o_tot3 = $o_mooe3 + $o_co3;
$d_tot3 = $d_ps3 + $d_mooe3 + $d_co3;
$d_m_c_tot3 = $d_mooe3 + $d_co3;

$o_tot4 = $o_mooe4 + $o_co4;
$d_tot4 = $d_ps4 + $d_mooe4 + $d_co4;
$d_m_c_tot4 = $d_mooe4 + $d_co4;
*/

//Make the fields safe.
$o_mooe1 = 1*$mysqli->escape_string($o_mooe1);
$o_co1 = 1*$mysqli->escape_string($o_co1);
$d_ps1 = 1*$mysqli->escape_string($d_ps1);
$d_mooe1 = 1*$mysqli->escape_string($d_mooe1);
$d_co1 = 1*$mysqli->escape_string($d_co1);
$gass_forma_dbur_qtr1_attachment_bfar1 = $mysqli->escape_string($gass_forma_dbur_qtr1_attachment_bfar1);

$o_mooe2 = 1*$mysqli->escape_string($o_mooe2);
$o_co2 = 1*$mysqli->escape_string($o_co2);
$d_ps2 = 1*$mysqli->escape_string($d_ps2);
$d_mooe2 = 1*$mysqli->escape_string($d_mooe2);
$d_co2 = 1*$mysqli->escape_string($d_co2);
$gass_forma_dbur_qtr2_attachment_bfar1 = $mysqli->escape_string($gass_forma_dbur_qtr2_attachment_bfar1);

$o_mooe3 = 1*$mysqli->escape_string($o_mooe3);
$o_co3 = 1*$mysqli->escape_string($o_co3);
$d_ps3 = 1*$mysqli->escape_string($d_ps3);
$d_mooe3 = 1*$mysqli->escape_string($d_mooe3);
$d_co3 = 1*$mysqli->escape_string($d_co3);
$gass_forma_dbur_qtr3_attachment_bfar1 = $mysqli->escape_string($gass_forma_dbur_qtr3_attachment_bfar1);

$o_mooe4 = 1*$mysqli->escape_string($o_mooe4);
$o_co4 = 1*$mysqli->escape_string($o_co4);
$d_ps4 = 1*$mysqli->escape_string($d_ps4);
$d_mooe4 = 1*$mysqli->escape_string($d_mooe4);
$d_co4 = 1*$mysqli->escape_string($d_co4);
$gass_forma_dbur_qtr4_attachment_bfar1 = $mysqli->escape_string($gass_forma_dbur_qtr4_attachment_bfar1);

//Determine the sum Obligations and Disbursement
$o_tot1 = $o_mooe1 + $o_co1;
$d_tot1 = $d_ps1 + $d_mooe1 + $d_co1;
$d_m_c_tot1 = $d_mooe1 + $d_co1;

$o_tot2 = $o_mooe2 + $o_co2;
$d_tot2 = $d_ps2 + $d_mooe2 + $d_co2;
$d_m_c_tot2 = $d_mooe2 + $d_co2;

$o_tot3 = $o_mooe3 + $o_co3;
$d_tot3 = $d_ps3 + $d_mooe3 + $d_co3;
$d_m_c_tot3 = $d_mooe3 + $d_co3;

$o_tot4 = $o_mooe4 + $o_co4;
$d_tot4 = $d_ps4 + $d_mooe4 + $d_co4;
$d_m_c_tot4 = $d_mooe4 + $d_co4;

//Create and run the SQL.
$query = "INSERT INTO tbl_sd_7_gass_forma_dbur(
unit_contributor_id,
unit_delivery_id,
focal_person_id,
cu_id,
cu_short_name,
unit_delivery_name_cu,
unit_contributor_name,
gass_forma_dbur_qtr1_obligation_mooe,
gass_forma_dbur_qtr1_obligation_co,
gass_forma_dbur_qtr1_obligation_total,
gass_forma_dbur_qtr1_disbursement_ps,
gass_forma_dbur_qtr1_disbursement_mooe,
gass_forma_dbur_qtr1_disbursement_co,
gass_forma_dbur_qtr1_disbursement_total,
gass_forma_dbur_qtr1_disbursement_total_mooe_co,
gass_forma_dbur_qtr1_attachment_bfar1,
gass_forma_dbur_qtr2_obligation_mooe,
gass_forma_dbur_qtr2_obligation_co,
gass_forma_dbur_qtr2_obligation_total,
gass_forma_dbur_qtr2_disbursement_ps,
gass_forma_dbur_qtr2_disbursement_mooe,
gass_forma_dbur_qtr2_disbursement_co,
gass_forma_dbur_qtr2_disbursement_total,
gass_forma_dbur_qtr2_disbursement_total_mooe_co,
gass_forma_dbur_qtr2_attachment_bfar1,
gass_forma_dbur_qtr3_obligation_mooe,
gass_forma_dbur_qtr3_obligation_co,
gass_forma_dbur_qtr3_obligation_total,
gass_forma_dbur_qtr3_disbursement_ps,
gass_forma_dbur_qtr3_disbursement_mooe,
gass_forma_dbur_qtr3_disbursement_co,
gass_forma_dbur_qtr3_disbursement_total,
gass_forma_dbur_qtr3_disbursement_total_mooe_co,
gass_forma_dbur_qtr3_attachment_bfar1,
gass_forma_dbur_qtr4_obligation_mooe,
gass_forma_dbur_qtr4_obligation_co,
gass_forma_dbur_qtr4_obligation_total,
gass_forma_dbur_qtr4_disbursement_ps,
gass_forma_dbur_qtr4_disbursement_mooe,
gass_forma_dbur_qtr4_disbursement_co,
gass_forma_dbur_qtr4_disbursement_total,
gass_forma_dbur_qtr4_disbursement_total_mooe_co,
gass_forma_dbur_qtr4_attachment_bfar1,
created)
VALUES(
'$unit_contributor_id',
'$unit_delivery_id',
'$focal_person_id',
'$cu_id',
'$cu_short_name',
'$unit_delivery_name_cu',
'$unit_contributor_name',
'$o_mooe1',
'$o_co1',
'$o_tot1',
'$d_ps1',
'$d_mooe1',
'$d_co1',
'$d_tot1',
'$d_m_c_tot1',
'$gass_forma_dbur_qtr1_attachment_bfar1',
'$o_mooe2',
'$o_co2',
'$o_tot2',
'$d_ps2',
'$d_mooe2',
'$d_co2',
'$d_tot2',
'$d_m_c_tot2',
'$gass_forma_dbur_qtr2_attachment_bfar1',
'$o_mooe3',
'$o_co3',
'$o_tot3',
'$d_ps3',
'$d_mooe3',
'$d_co3',
'$d_tot3',
'$d_m_c_tot3',
'$gass_forma_dbur_qtr3_attachment_bfar1',
'$o_mooe4',
'$o_co4',
'$o_tot4',
'$d_ps4',
'$d_mooe4',
'$d_co4',
'$d_tot4',
'$d_m_c_tot4',
'$gass_forma_dbur_qtr4_attachment_bfar1',
NOW())";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

//echo "1 record added";
// #tracy - Comment out next line. Close sql connection first.
//header("Location: ../GASS/dbur_view_all.php");

mysqli_close($mysqli);
// #tracy - Added next line
header("Location: ../GASS/dbur_view_all.php");

?>
<!-- #tracy - Unmatched closing tags. Not needed.
</body>
</html> -->