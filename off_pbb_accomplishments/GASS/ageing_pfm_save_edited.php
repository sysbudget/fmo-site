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
	$gass_formb23_cash_advance_coa_fr_id = stripslashes($_POST['gass_formb23_cash_advance_coa_fr_id']);

	$qtr = 4;
	$cash_advance = (isset($_POST['cash_advance'])) ? stripslashes($_POST['cash_advance']) : '';
	$fin_position = (isset($_POST['fin_position'])) ? stripslashes($_POST['fin_position']) : '';
	$fin_performance = (isset($_POST['fin_performance'])) ? stripslashes($_POST['fin_performance']) : '';
	$net_asset = (isset($_POST['net_asset'])) ? stripslashes($_POST['net_asset']) : '';
	$cash_flows = (isset($_POST['cash_flows'])) ? stripslashes($_POST['cash_flows']) : '';
	$actual_amounts = (isset($_POST['actual_amounts'])) ? stripslashes($_POST['actual_amounts']) : '';
	$notes_to_financial = (isset($_POST['notes_to_financial'])) ? stripslashes($_POST['notes_to_financial']) : '';

//Make the fields safe.
	$cash_advance = $mysqli->escape_string($cash_advance);
	$fin_position = $mysqli->escape_string($fin_position);
	$fin_performance = $mysqli->escape_string($fin_performance);
	$net_asset = $mysqli->escape_string($net_asset);
	$cash_flows = $mysqli->escape_string($cash_flows);
	$actual_amounts = $mysqli->escape_string($actual_amounts);
	$notes_to_financial = $mysqli->escape_string($notes_to_financial);

//Assign Attachment Filename
if ($cash_advance == "Y"){
	$gass_formb2_cash_advance_attachment = stripslashes($_POST['file_name_sample1']);
	$gass_formb2_cash_advance_attachment = $gass_formb2_cash_advance_attachment . ".pdf";
	}
	else{
	$gass_formb2_cash_advance_attachment = '';
	}
if ($fin_position == "Y" || $fin_performance == "Y" || $net_asset == "Y" || $cash_flows == "Y" || $actual_amounts == "Y" || $notes_to_financial == "Y"){
	$gass_formb3_coa_fr_attachment = stripslashes($_POST['file_name_sample2']);
	$gass_formb3_coa_fr_attachment = $gass_formb3_coa_fr_attachment . ".pdf";
	}
	else{
	$gass_formb3_coa_fr_attachment = '';
	}

//Create and run the SQL to update obur
$query = "UPDATE tbl_sd_7_gass_formb23_cash_advance_coa_fr 
SET
gass_formb23_cash_advance_coa_fr_quarter = '$qtr',
gass_formb2_cash_advance_submitted = '$cash_advance',
gass_formb2_cash_advance_attachment = '$gass_formb2_cash_advance_attachment',
gass_formb3_coa_fr_financial_position = '$fin_position',
gass_formb3_coa_fr_financial_performance = '$fin_performance',
gass_formb3_coa_fr_changes_in_net_asset = '$net_asset',
gass_formb3_coa_fr_cash_flows = '$cash_flows',
gass_formb3_coa_fr_budget_and_actual_amounts = '$actual_amounts',
gass_formb3_coa_fr_notes_to_financial_statements = '$notes_to_financial',
gass_formb3_coa_fr_attachment = '$gass_formb3_coa_fr_attachment',
edited = NOW()
WHERE gass_formb23_cash_advance_coa_fr_id = '$gass_formb23_cash_advance_coa_fr_id'";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

//echo "1 record edited";
// #tracy - Comment out next line. Close sql connection first.
//header("Location: ../GASS/ageing_pfm_view_all.php?");

mysqli_close($mysqli);
// #tracy - Added next line
header("Location: ../GASS/ageing_pfm_view_all.php?");

?>