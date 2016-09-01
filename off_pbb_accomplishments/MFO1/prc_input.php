<?php

session_name("pbb");
session_start();

// is the one accessing this page logged in or not?
if ( !isset($_SESSION['user_id']) || !$_SESSION['user_id'] )
{
	// not logged in, move to login page
	header('Location: ../login/login_mysqli.php');
	exit;
}

// get session values
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

if ( isset($_GET['id']) && $_GET['id'] != "")
{
	// connect to the database
	include_once('../connect-db.php');

	// Get the header record
	$var_prog = $_GET['id'];
	
	$record_set = $mysqli->query("SELECT tbl_sd_1_mfo1_forma_program.mfo1_forma_program_id, tbl_sd_1_mfo1_forma_program.mfo1_forma_program_name FROM tbl_sd_1_mfo1_forma_program WHERE tbl_sd_1_mfo1_forma_program.unit_contributor_id='$unit_contributor_id' AND tbl_sd_1_mfo1_forma_program.mfo1_forma_program_id='$var_prog';")->fetch_object();

	if ($record_set)
	{
			// set form variables to values in the retrieved row
			$var_mfo1_forma_program_id = $record_set->mfo1_forma_program_id;
			$var_mfo1_forma_program_name = $record_set->mfo1_forma_program_name;

			// upload: Generate sample filename
			include_once('prc_setnames.php');

			//Retrieve data and initialize array of variables for PRC Licensure Examination dropdown, exclude PRC exam if existing already for the program
			$query1 = $mysqli->query("SELECT tbl_sd_ref_prc.prc_id,	tbl_sd_ref_prc_profession.prc_profession_name, DATE_FORMAT(tbl_sd_ref_prc.prc_examination_date, '%b-%Y') AS exam_datestr, prc_name_of_school
			FROM tbl_sd_ref_prc INNER JOIN tbl_sd_ref_prc_profession
				ON tbl_sd_ref_prc.prc_profession_id = tbl_sd_ref_prc_profession.prc_profession_id
			WHERE tbl_sd_ref_prc.cu_id='$cu_id' AND
				tbl_sd_ref_prc.prc_id NOT IN
				(	SELECT prc_id
					FROM tbl_sd_1_mfo1_formb_prc
					WHERE unit_delivery_id = '$unit_delivery_id' AND
						mfo1_forma_program_id = '$var_prog')
			ORDER BY tbl_sd_ref_prc_profession.prc_profession_name, tbl_sd_ref_prc.prc_examination_date;");

			//Create an array of objects for each returned row
			while ( $array2[] = $query1->fetch_object() );

			//Remove the blank entry at end of array
			array_pop($array2);

			$query1->close();
			$mysqli->close();
	}
	else
	{
		$mysqli->close();
		header('Location: prc_view_use_all.php');
		exit;
	}
}
else
{
	// Error in URL parameter passed
	header('Location: prc_view_use_all.php');
	exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Record</title>

<style>
body {margin:1; font-family:Calibri; font-size:14px;}
</style>

<link rel="stylesheet" href="../includes/jquery-ui.css" />
<script src="../includes/jquery-1.9.1.js"></script>
<script src="../includes/jquery-ui.js"></script>

<!-- include the next Javascript files for PRC Exam -->
<script src="../validfn-mfo1.js"></script>
<script src="validfn-prc.js"></script>

</head>

<body>

    <div class="viewbody">
    <h2>MFO 1: PRC Licensure Examination - Input New Record</h2>
    <div class="viewlinks"><p><a href="prc_view_all.php">View All Records</a></p></div>
	<hr/>

    <!-- Edit form here -->
	<form name="prcInputForm" id="prcInputForm" action="prc_insert_update.php" method="post" onsubmit="return isValidForm()" enctype="multipart/form-data">
	    <table>
    
        <tr>
            <td width="155"><div align="right">Official Program Name</div></td>
            <td width="550"><input name="var_mfo1_forma_program_name" type="text" id="var_mfo1_forma_program_name" size="80" disabled value="<?php if (isset($var_mfo1_forma_program_name)) echo $var_mfo1_forma_program_name; ?>">
			<input name="var_mfo1_forma_program_id" type="hidden" id="hvar_mfo1_forma_program_id" value="<?php if (isset($var_mfo1_forma_program_id)) echo $var_mfo1_forma_program_id; ?>">
			</td>
		</tr>
		<tr>
			<td><div align="right">PRC Licensure Examination</div></td>
            <td><select name="var_ref_prc_id" required id="var_ref_prc_id" size="1" onchange="showPRCexam(this.value)">
				<option <?php if ( isset($var_ref_prc__id) &&  $var_ref_prc_id == "" ) echo "selected";?> value="" >Please Select :</option>
              <?php if (isset($array2)) { foreach($array2 as $option2) : ?>
					<option value="<?php echo $option2->prc_id; ?>" <?php if (isset($var_ref_prc_id) && ($var_ref_prc_id == $option2->prc_id)) echo "selected"; else echo ""; ?>><?php echo $option2->prc_profession_name . ": " . $option2->exam_datestr . " ". $option2->prc_name_of_school; ?></option>
					<?php endforeach; } ?>
             </select>
			 </td>
		</tr>
		</table>
		
		<div id="prc_exam"><p></p></div>

		<br>
		<div align="left">
		   <!-- <input type="reset" value="Clear" onclick="showPRCexam('')" > -->
		   <input type="submit" value="Submit" >
		</div>
	</form>

	</div>
</body>
</html>