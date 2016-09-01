<?php
session_name("pbb");
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

// not logged in, move to login page

header('Location: ../login/login_mysqli.php');

exit;

}

// connect to the database
	include('../connect-db.php');

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
$mysqli->set_charset("utf8");

//Return an error if we have connection issues
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}
// get the id from the url
	$gass_forma_dbur_id = $_GET['id'];

$query = "SELECT 
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
gass_forma_dbur_qtr2_obligation_mooe,
gass_forma_dbur_qtr2_obligation_co,
gass_forma_dbur_qtr2_obligation_total,
gass_forma_dbur_qtr2_disbursement_ps,
gass_forma_dbur_qtr2_disbursement_mooe,
gass_forma_dbur_qtr2_disbursement_co,
gass_forma_dbur_qtr2_disbursement_total,
gass_forma_dbur_qtr2_disbursement_total_mooe_co,
gass_forma_dbur_qtr3_obligation_mooe,
gass_forma_dbur_qtr3_obligation_co,
gass_forma_dbur_qtr3_obligation_total,
gass_forma_dbur_qtr3_disbursement_ps,
gass_forma_dbur_qtr3_disbursement_mooe,
gass_forma_dbur_qtr3_disbursement_co,
gass_forma_dbur_qtr3_disbursement_total,
gass_forma_dbur_qtr3_disbursement_total_mooe_co,
gass_forma_dbur_qtr4_obligation_mooe,
gass_forma_dbur_qtr4_obligation_co,
gass_forma_dbur_qtr4_obligation_total,
gass_forma_dbur_qtr4_disbursement_ps,
gass_forma_dbur_qtr4_disbursement_mooe,
gass_forma_dbur_qtr4_disbursement_co,
gass_forma_dbur_qtr4_disbursement_total,
gass_forma_dbur_qtr4_disbursement_total_mooe_co,
gass_forma_dbur_qtr1_attachment_bfar1,
gass_forma_dbur_qtr2_attachment_bfar1,
gass_forma_dbur_qtr3_attachment_bfar1,
gass_forma_dbur_qtr4_attachment_bfar1,
gass_forma_dbur_id
FROM tbl_sd_7_gass_forma_dbur
WHERE gass_forma_dbur_id = " . $gass_forma_dbur_id;

$record_set = $mysqli->query($query);
$row = $record_set->fetch_assoc();

//Extract fields.
	$unit_delivery_name_cu = $row['unit_delivery_name_cu'];
	$unit_contributor_name = $row['unit_contributor_name'];

	$o_mooe1 = $row['gass_forma_dbur_qtr1_obligation_mooe'];
	$o_co1 = $row['gass_forma_dbur_qtr1_obligation_co'];
	$o_tot1 = $row['gass_forma_dbur_qtr1_obligation_total'];
	$d_ps1 = $row['gass_forma_dbur_qtr1_disbursement_ps'];
	$d_mooe1 = $row['gass_forma_dbur_qtr1_disbursement_mooe'];
	$d_co1 = $row['gass_forma_dbur_qtr1_disbursement_co'];
	$d_tot1 = $row['gass_forma_dbur_qtr1_disbursement_total'];
	$d_m_c_tot1 = $row['gass_forma_dbur_qtr1_disbursement_total_mooe_co'];

	if ($d_ps1 == 0){$d_ps1 = "";}
	if ($d_mooe1 == 0){$d_mooe1 = "";}
	if ($d_co1 == 0){$d_co1 = "";}

	$o_mooe2 = $row['gass_forma_dbur_qtr2_obligation_mooe'];
	$o_co2 = $row['gass_forma_dbur_qtr2_obligation_co'];
	$o_tot2 = $row['gass_forma_dbur_qtr2_obligation_total'];
	$d_ps2 = $row['gass_forma_dbur_qtr2_disbursement_ps'];
	$d_mooe2 = $row['gass_forma_dbur_qtr2_disbursement_mooe'];
	$d_co2 = $row['gass_forma_dbur_qtr2_disbursement_co'];
	$d_tot2 = $row['gass_forma_dbur_qtr2_disbursement_total'];
	$d_m_c_tot2 = $row['gass_forma_dbur_qtr2_disbursement_total_mooe_co'];

	if ($d_ps2 == 0){$d_ps2 = "";}
	if ($d_mooe2 == 0){$d_mooe2 = "";}
	if ($d_co2 == 0){$d_co2 = "";}

	$o_mooe3 = $row['gass_forma_dbur_qtr3_obligation_mooe'];
	$o_co3 = $row['gass_forma_dbur_qtr3_obligation_co'];
	$o_tot3 = $row['gass_forma_dbur_qtr3_obligation_total'];
	$d_ps3 = $row['gass_forma_dbur_qtr3_disbursement_ps'];
	$d_mooe3 = $row['gass_forma_dbur_qtr3_disbursement_mooe'];
	$d_co3 = $row['gass_forma_dbur_qtr3_disbursement_co'];
	$d_tot3 = $row['gass_forma_dbur_qtr3_disbursement_total'];
	$d_m_c_tot3 = $row['gass_forma_dbur_qtr3_disbursement_total_mooe_co'];

	if ($d_ps3 == 0){$d_ps3 = "";}
	if ($d_mooe3 == 0){$d_mooe3 = "";}
	if ($d_co3 == 0){$d_co3 = "";}

	$o_mooe4 = $row['gass_forma_dbur_qtr4_obligation_mooe'];
	$o_co4 = $row['gass_forma_dbur_qtr4_obligation_co'];
	$o_tot4 = $row['gass_forma_dbur_qtr4_obligation_total'];
	$d_ps4 = $row['gass_forma_dbur_qtr4_disbursement_ps'];
	$d_mooe4 = $row['gass_forma_dbur_qtr4_disbursement_mooe'];
	$d_co4 = $row['gass_forma_dbur_qtr4_disbursement_co'];
	$d_tot4 = $row['gass_forma_dbur_qtr4_disbursement_total'];
	$d_m_c_tot4 = $row['gass_forma_dbur_qtr4_disbursement_total_mooe_co'];

	if ($d_ps4 == 0){$d_ps4 = "";}
	if ($d_mooe4 == 0){$d_mooe4 = "";}
	if ($d_co4 == 0){$d_co4 = "";}

	$a = $row['gass_forma_dbur_qtr1_attachment_bfar1'];
	$gass_dbur_1st = rtrim($a,".pdf");
	$b = $row['gass_forma_dbur_qtr2_attachment_bfar1'];
	$gass_dbur_2nd = rtrim($b,".pdf");
	$c = $row['gass_forma_dbur_qtr3_attachment_bfar1'];
	$gass_dbur_3rd = rtrim($c,".pdf");
	$d = $row['gass_forma_dbur_qtr4_attachment_bfar1'];
	$gass_dbur_4th = rtrim($d,".pdf");

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

	//Generate sample filename
	date_default_timezone_set("Asia/Hong_Kong");
	$timestamp = time();
	$d = date("Ymd_His",$timestamp);
	$cu = preg_replace('/\s+/', ' ', $cu_short_name);
	$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
	$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);
	
	if (empty($gass_dbur_1st)){
	$file_name_sample1 = "gass_dbur_1st_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample1 = strtolower($file_name_sample1);
	$file_name_sample1 = preg_replace('/\s+/', '', $file_name_sample1);
	$gass_dbur_1st = $file_name_sample1;
	}
	
	if (empty($gass_dbur_2nd)){
	$file_name_sample2 = "gass_dbur_2nd_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample2 = strtolower($file_name_sample2);
	$file_name_sample2 = preg_replace('/\s+/', '', $file_name_sample2);
	$gass_dbur_2nd = $file_name_sample2;
	}

	if (empty($gass_dbur_3rd)){
	$file_name_sample3 = "gass_dbur_3rd_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample3 = strtolower($file_name_sample3);
	$file_name_sample3 = preg_replace('/\s+/', '', $file_name_sample3);
	$gass_dbur_3rd = $file_name_sample3;
	}

	if (empty($gass_dbur_4th)){
	$file_name_sample4 = "gass_dbur_4th_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample4 = strtolower($file_name_sample4);
	$file_name_sample4 = preg_replace('/\s+/', '', $file_name_sample4);
	$gass_dbur_4th = $file_name_sample4;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Form</title>

<style>
body {margin:1; font-family:Calibri; font-size:14px;}
input {text-align: right;}
</style>

<script type="text/javascript">
var maxChar=255;
function limit(obj){
while(obj.value.length>maxChar){
obj.value=obj.value.replace(/.$/,'');//removes the last character
}
}
</script>

<script type="text/javascript" language="JavaScript">
function enable_choice()
{
	if (document.getElementById("q1").checked) {
   		document.getElementById("d_ps1").readOnly = false;
   		document.getElementById("d_mooe1").readOnly = false;
   		document.getElementById("d_co1").readOnly = false;
//   		document.getElementById("uploadFile1").disabled = false;
	}
	else
	{
   		document.getElementById("d_ps1").readOnly = true;
   		document.getElementById("d_mooe1").readOnly = true;
   		document.getElementById("d_co1").readOnly = true;
	}
	
	if (document.getElementById("q2").checked) {
   		document.getElementById("d_ps2").readOnly = false;
   		document.getElementById("d_mooe2").readOnly = false;
   		document.getElementById("d_co2").readOnly = false;
//   		document.getElementById("uploadFile2").disabled = false;
	}
	else
	{
   		document.getElementById("d_ps2").readOnly = true;
   		document.getElementById("d_mooe2").readOnly = true;
   		document.getElementById("d_co2").readOnly = true;
	}
	
	if (document.getElementById("q3").checked) {
   		document.getElementById("d_ps3").readOnly = false;
   		document.getElementById("d_mooe3").readOnly = false;
   		document.getElementById("d_co3").readOnly = false;
//   		document.getElementById("uploadFile3").disabled = false;
	}
	else
	{
   		document.getElementById("d_ps3").readOnly = true;
   		document.getElementById("d_mooe3").readOnly = true;
   		document.getElementById("d_co3").readOnly = true;
	}

	if (document.getElementById("q4").checked) {
   		document.getElementById("d_ps4").readOnly = false;
   		document.getElementById("d_mooe4").readOnly = false;
   		document.getElementById("d_co4").readOnly = false;
//   		document.getElementById("uploadFile4").disabled = false;
	}
	else
	{
   		document.getElementById("d_ps4").readOnly = true;
   		document.getElementById("d_mooe4").readOnly = true;
   		document.getElementById("d_co4").readOnly = true;
	}
}
</script>

<script type="text/javascript" language="JavaScript">
function checkban1(obj)
{
//		var o_m1 = parseFloat(document.getElementById("o_mooe1").value);
//		var o_c1 = parseFloat(document.getElementById("o_co1").value);
//		var obli_tot1 = o_m1 + o_c1;
//		var obli_tot1 = obli_tot1.toFixed(2);
//		document.getElementById("o_tot1").value = obli_tot1;

    var v = parseFloat(obj.value);
    obj.value = (isNaN(v)) ? '' : v.toFixed(2);

		var d_p1 = parseFloat(document.getElementById("d_ps1").value);
		var d_m1 = parseFloat(document.getElementById("d_mooe1").value);
		var d_c1 = parseFloat(document.getElementById("d_co1").value);
		var disb_tot1 = d_p1 + d_m1 + d_c1;
		var disb_tot1 = disb_tot1.toFixed(2);
   		document.getElementById("d_tot1").value = disb_tot1;

		if (disb_tot1 == 0){
		document.getElementById("uploadFile1").disabled = true;
		}
		else{
		document.getElementById("uploadFile1").disabled = false;
		}

}
function checkban2(obj)
{
//		var o_m2 = parseFloat(document.getElementById("o_mooe2").value);
//		var o_c2 = parseFloat(document.getElementById("o_co2").value);
//		var obli_tot2 = o_m2 + o_c2;
//		var obli_tot2 = obli_tot2.toFixed(2);
// 		document.getElementById("o_tot2").value = obli_tot2;

    var v = parseFloat(obj.value);
    obj.value = (isNaN(v)) ? '' : v.toFixed(2);

		var d_p2 = parseFloat(document.getElementById("d_ps2").value);
		var d_m2 = parseFloat(document.getElementById("d_mooe2").value);
		var d_c2 = parseFloat(document.getElementById("d_co2").value);
		var disb_tot2 = d_p2 + d_m2 + d_c2;
		var disb_tot2 = disb_tot2.toFixed(2);
   		document.getElementById("d_tot2").value = disb_tot2;

		if (disb_tot1 == 0){
		document.getElementById("uploadFile1").disabled = true;
		}
		else{
		document.getElementById("uploadFile1").disabled = false;
		}

}
function checkban3(obj)
{
//		var o_m3 = parseFloat(document.getElementById("o_mooe3").value);
//		var o_c3 = parseFloat(document.getElementById("o_co3").value);
//		var obli_tot3 = o_m3 + o_c3;
//		var obli_tot3 = obli_tot3.toFixed(2);
//   		document.getElementById("o_tot3").value = obli_tot3;

    var v = parseFloat(obj.value);
    obj.value = (isNaN(v)) ? '' : v.toFixed(2);

		var d_p3 = parseFloat(document.getElementById("d_ps3").value);
		var d_m3 = parseFloat(document.getElementById("d_mooe3").value);
		var d_c3 = parseFloat(document.getElementById("d_co3").value);
		var disb_tot3 = d_p3 + d_m3 + d_c3;
		var disb_tot3 = disb_tot3.toFixed(2);
   		document.getElementById("d_tot3").value = disb_tot3;

		if (disb_tot1 == 0){
		document.getElementById("uploadFile1").disabled = true;
		}
		else{
		document.getElementById("uploadFile1").disabled = false;
		}

}
function checkban4(obj)
{
//		var o_m4 = parseFloat(document.getElementById("o_mooe4").value);
//		var o_c4 = parseFloat(document.getElementById("o_co4").value);
//		var obli_tot4 = o_m4 + o_c4;
//		var obli_tot4 = obli_tot4.toFixed(2);
// 		document.getElementById("o_tot4").value = obli_tot4;

    var v = parseFloat(obj.value);
    obj.value = (isNaN(v)) ? '' : v.toFixed(2);

		var d_p4 = parseFloat(document.getElementById("d_ps4").value);
		var d_m4 = parseFloat(document.getElementById("d_mooe4").value);
		var d_c4 = parseFloat(document.getElementById("d_co4").value);
		var disb_tot4 = d_p4 + d_m4 + d_c4;
		var disb_tot4 = disb_tot4.toFixed(2);
   		document.getElementById("d_tot4").value = disb_tot4;

		if (disb_tot1 == 0){
		document.getElementById("uploadFile1").disabled = true;
		}
		else{
		document.getElementById("uploadFile1").disabled = false;
		}

}

function validateForm()
{
		var d_p1 = 1*(document.getElementById("d_ps1").value);
		var d_m1 = 1*(document.getElementById("d_mooe1").value);
		var d_c1 = 1*(document.getElementById("d_co1").value);
		var tot1 = d_p1 + d_m1 + d_c1;

		var d_p2 = 1*(document.getElementById("d_ps2").value);
		var d_m2 = 1*(document.getElementById("d_mooe2").value);
		var d_c2 = 1*(document.getElementById("d_co2").value);
		var tot2 = d_p2 + d_m2 + d_c2;

		var d_p3 = 1*(document.getElementById("d_ps3").value);
		var d_m3 = 1*(document.getElementById("d_mooe3").value);
		var d_c3 = 1*(document.getElementById("d_co3").value);
		var tot3 = d_p3 + d_m3 + d_c3;

		var d_p4 = 1*(document.getElementById("d_ps4").value);
		var d_m4 = 1*(document.getElementById("d_mooe4").value);
		var d_c4 = 1*(document.getElementById("d_co4").value);
		var tot4 = d_p4 + d_m4 + d_c4;
		
		var tot = tot1 + tot2 + tot3 + tot4;
			if (tot != 0){
				return true;
				}
				else {
				alert ("Nothing to submit all entries are zero " + tot);
				return false;
				}

	if (document.getElementById("q1").checked || document.getElementById("q4").checked || document.getElementById("q4").checked || document.getElementById("q4").checked){
		return true;
	}
	else
	{
		alert ("Nothing to submit all entries are zero " + tot);
		return false;
	}

}

</script>

<script type="text/javascript" language="JavaScript">
function alertFilename1()
{
var file_name1 = "";
var file_size1 = "";
var file_ext1 = "";
var file_name_sample1 = "";
var file_name1 = document.getElementById('uploadFile1').files[0].name;
var file_ext1 = file_name1.substring(file_name1.lastIndexOf('.')+1);
var file_size1 = document.getElementById('uploadFile1').files[0].size;
var file_name_sample1 = document.getElementById('file_name_sample1').value;
var file_name_sample1 = file_name_sample1 + ".pdf";

	if (file_name1 != file_name_sample1)
		{
		alert("Use the required filename. " + " " + file_name1 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile1').value="";
		return false;
		}

	if (file_size1 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile1').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename2()
{
var file_name2 = "";
var file_size2 = "";
var file_ext2 = "";
var file_name_sample2 = "";
var file_name2 = document.getElementById('uploadFile2').files[0].name;
var file_ext2 = file_name2.substring(file_name2.lastIndexOf('.')+1);
var file_size2 = document.getElementById('uploadFile2').files[0].size;
var file_name_sample2 = document.getElementById('file_name_sample2').value;
var file_name_sample2 = file_name_sample2 + ".pdf";

	if (file_name2 != file_name_sample2)
		{
		alert("Use the required filename. " + " " + file_name2 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile2').value="";
		return false;
		}

	if (file_size2 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile2').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename3()
{
var file_name3 = "";
var file_size3 = "";
var file_ext3 = "";
var file_name_sample3 = "";
var file_name3 = document.getElementById('uploadFile3').files[0].name;
var file_ext3 = file_name3.substring(file_name3.lastIndexOf('.')+1);
var file_size3 = document.getElementById('uploadFile3').files[0].size;
var file_name_sample3 = document.getElementById('file_name_sample3').value;
var file_name_sample3 = file_name_sample3 + ".pdf";

	if (file_name3 != file_name_sample3)
		{
		alert("Use the required filename. " + " " + file_name3 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile3').value="";
		return false;
		}

	if (file_size3 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile3').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename4()
{
var file_name4 = "";
var file_size4 = "";
var file_ext4 = "";
var file_name_sample4 = "";
var file_name4 = document.getElementById('uploadFile4').files[0].name;
var file_ext4 = file_name4.substring(file_name4.lastIndexOf('.')+1);
var file_size4 = document.getElementById('uploadFile4').files[0].size;
var file_name_sample4 = document.getElementById('file_name_sample4').value;
var file_name_sample4 = file_name_sample4 + ".pdf";

	if (file_name4 != file_name_sample4)
		{
		alert("Use the required filename. " + " " + file_name4 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile4').value="";
		return false;
		}

	if (file_size4 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile4').value="";
		return false;
		}
}
</script>

</head>
<body>
<div class="viewbody">
<h2>GASS: DBUR - Edit Record</h2>
<hr/>

<!-- Edit form here -->
<form name="edit_dbur_form" id="edit_dbur_form" method="post" onsubmit="return validateForm()" action="dbur_save_edited.php" enctype="multipart/form-data">
<table>

<tr>
    <td width="155"><div align="right"><strong>JANUARY to MARCH</strong></div></td>
 	<td width="500">
   	<input type="checkbox" onchange="enable_choice(q1)" id="q1" name="q1" value="jan_mar">
	</td>
</tr>
<!--
<tr>
   	<td width="155"><div align="right">
	<strong>Obligation</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="o_mooe1" type="number" readonly  id="o_mooe1" value="<?php print $o_mooe1; ?>"  size="11" onkeyup="checkban1(o_mooe1)" onblur="checkban1(o_mooe1)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="o_co1" type="number" readonly  id="o_co1" value="<?php print $o_co1; ?>"  size="11" onkeyup="checkban1(o_co1)" onblur="checkban1(o_co1)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="o_tot1" type="number"  id="o_tot1" disabled value="<?php print $o_tot1; ?>"  size="11" step="0.01" min="0"/></td>
</tr>
-->
<tr>
   	<td width="155"><div align="right">
	<strong>Disbursements:</strong></div>
	</td>
    <td colspan="2" scope="row"><div align="left">
<i>FY 2016 Disbursements for the quarter (cash and non-cash MOOE + CO)(amount in pesos, do not convert in thousand pesos; input box will round numbers up to two(2) decimal places)</i><br/>
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right">PS</div></td>
    <td width="500"><input name="d_ps1" type="number" readonly id="d_ps1" value="<?php print $d_ps1; ?>" placeholder="0.00" size="11" onkeyup="checkban1(d_ps1)" onblur="checkban1(d_ps1)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="d_mooe1" type="number" readonly  id="d_mooe1" value="<?php print $d_mooe1; ?>" placeholder="0.00" size="11" onkeyup="checkban1(d_mooe1)" onblur="checkban1(d_mooe1)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="d_co1" type="number" readonly  id="d_co1" value="<?php print $d_co1; ?>" placeholder="0.00" size="11" onkeyup="checkban1(d_co1)" onblur="checkban1(d_co1)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="d_tot1" type="number" id="d_tot1" disabled value="<?php print $d_tot1; ?>"  size="11" step="0.01" min="0"/></td>
</tr>


<tr>
    <td width="155"><div align="right">Prescribed Attachment 1 Filename</div></td>
    <td width="500"><textarea name="file_name_display1" id="file_name_display1" readonly cols="50" rows="6" required><?php print $gass_dbur_1st; ?></textarea></td>
	<input name="file_name_sample1" hidden id="file_name_sample1" value="<?php print $gass_dbur_1st; ?>" />
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Copy the above prescribed filename to upload the PDF copy of the BFAR 1 as of end of Mar)</i><br/></div>
	   	</td>
</tr>

<tr>
	<td align="right">File 1 to upload</td>
    <td><input type="file" name="uploadFile1" id="uploadFile1" disabled required onblur="alertFilename1(uploadFile1)"></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit)</i><br/></div>
	   	</td>
</tr>

<tr>
		<td><hr /></td>
</tr>

<tr>
    <td width="155"><div align="right"><strong>APRIL TO JUNE</strong></div></td>
 	<td width="500">
   	<input type="checkbox" onchange="enable_choice(q2)" id="q2" name="q2" value="apr_jun">
	</td>
</tr>
<!--
<tr>
   	<td width="155"><div align="right">
	<strong>Obligation</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="o_mooe2" type="number" readonly  id="o_mooe2" value="<?php print $o_mooe2; ?>"  size="11" onkeyup="checkban2(o_mooe2)" onblur="checkban2(o_mooe2)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="o_co2" type="number" readonly  id="o_co2" value="<?php print $o_co2; ?>"  size="11" onkeyup="checkban2(o_co2)" onblur="checkban2(o_co2)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="o_tot2" type="number" id="o_tot2" disabled value="<?php print $o_tot2; ?>"  size="11" step="0.01" min="0"/></td>
</tr>
-->
<tr>
   	<td width="155"><div align="right">
	<strong>Disbursements:</strong></div>
	</td>
    <td colspan="2" scope="row"><div align="left">
<i>FY 2016 Disbursements for the quarter (cash and non-cash MOOE + CO)(amount in pesos, do not convert in thousand pesos; input box will round numbers up to two(2) decimal places)</i><br/>
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right">PS</div></td>
    <td width="500"><input name="d_ps2" type="number" readonly  id="d_ps2" value="<?php print $d_ps2; ?>" placeholder="0.00" size="11" onkeyup="checkban2(d_ps2)" onblur="checkban2(d_ps2)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="d_mooe2" type="number" readonly  id="d_mooe2" value="<?php print $d_mooe2; ?>" placeholder="0.00" size="11" onkeyup="checkban2(d_mooe2)" onblur="checkban2(d_mooe2)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="d_co2" type="number" readonly  id="d_co2" value="<?php print $d_co2; ?>" placeholder="0.00" size="11" onkeyup="checkban2(d_co2)" onblur="checkban2(d_co2)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="d_tot2" type="number" id="d_tot2" disabled value="<?php print $d_tot2; ?>"  size="11" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 2 Filename</div></td>
    <td width="500"><textarea name="file_name_display2" id="file_name_display2" readonly cols="50" rows="6" required><?php print $gass_dbur_2nd; ?></textarea></td>
	<input name="file_name_sample2" hidden id="file_name_sample2" value="<?php print $gass_dbur_2nd; ?>" />
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Copy the above prescribed filename to upload the PDF copy of the BFAR 1 as of end of Jun)</i><br/></div>
	   	</td>
</tr>

<tr>
	<td align="right">File 2 to upload</td>
    <td><input type="file" name="uploadFile2" id="uploadFile2" disabled required onblur="alertFilename2(uploadFile2)"></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit)</i><br/></div>
	   	</td>
</tr>

<tr>
		<td><hr /></td>
</tr>

<tr>
    <td width="155"><div align="right"><strong>JULY TO SEPTEMBER</strong></div></td>
 	<td width="500">
   	<input type="checkbox" onchange="enable_choice(quarter)" id="q3" name="quarter" value="jul_sep">
	</td>
</tr>
<!--
<tr>
   	<td width="155"><div align="right">
	<strong>Obligation</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="o_mooe3" type="number" readonly  id="o_mooe3" value="<?php print $o_mooe3; ?>" size="11" onkeyup="checkban3(o_mooe3)" onblur="checkban3(o_mooe3)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="o_co3" type="number" readonly  id="o_co3" value="<?php print $o_co3; ?>" size="11" onkeyup="checkban3(o_co3)" onblur="checkban3(o_co3)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="o_tot3" type="number" id="o_tot3" disabled value="<?php print $o_tot3; ?>" size="11" step="0.01" min="0"/></td>
</tr>
-->
<tr>
   	<td width="155"><div align="right">
	<strong>Disbursements:</strong></div>
	</td>
    <td colspan="2" scope="row"><div align="left">
<i>FY 2016 Disbursements for the quarter (cash and non-cash MOOE + CO)(amount in pesos, do not convert in thousand pesos; input box will round numbers up to two(2) decimal places)</i><br/>
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right">PS</div></td>
    <td width="500"><input name="d_ps3" type="number" readonly  id="d_ps3" value="<?php print $d_ps3; ?>" placeholder="0.00" size="11" onkeyup="checkban3(d_ps3)" onblur="checkban3(d_ps3)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="d_mooe3" type="number" readonly  id="d_mooe3" value="<?php print $d_mooe3; ?>" placeholder="0.00" size="11" onkeyup="checkban3(d_mooe3)" onblur="checkban3(d_mooe3)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="d_co3" type="number" readonly  id="d_co3" value="<?php print $d_co3; ?>" placeholder="0.00" size="11" onkeyup="checkban3(d_co3)" onblur="checkban3(d_co3)" step="0.01" min="0"/></td>
</tr> 

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="d_tot3" type="number" id="d_tot3" disabled value="<?php print $d_tot3; ?>" size="11" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 3 Filename</div></td>
    <td width="500"><textarea name="file_name_display3" id="file_name_display3" readonly cols="50" rows="6" required><?php print $gass_dbur_3rd; ?></textarea></td>
	<input name="file_name_sample3" hidden id="file_name_sample3" value="<?php print $gass_dbur_3rd; ?>" />
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Copy the above prescribed filename to upload the PDF copy of the BFAR 1 as of end of Sep)</i><br/></div>
	   	</td>
</tr>

<tr>
	<td align="right">File 3 to upload</td>
    <td><input type="file" name="uploadFile3" id="uploadFile3" disabled required onblur="alertFilename3(uploadFile3)"></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit)</i><br/></div>
	   	</td>
</tr>

<tr>
		<td><hr /></td>
</tr>

<tr>
    <td width="155"><div align="right"><strong>OCTOBER TO DECEMBER</strong></div></td>
 	<td width="500">
   	<input type="checkbox" onchange="enable_choice(quarter)" id="q4" name="quarter" value="oct_dec">
	</td>
</tr>
<!--
<tr>
   	<td width="155"><div align="right">
	<strong>Obligation</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="o_mooe4" type="number" readonly  id="o_mooe4" value="<?php print $o_mooe4; ?>" size="11" onkeyup="checkban4(o_mooe4)" onblur="checkban4(o_mooe4)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="o_co4" type="number" readonly  id="o_co4" value="<?php print $o_co4; ?>" size="11" onkeyup="checkban4(o_co4)" onblur="checkban4(o_co4)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="o_tot4" type="number" id="o_tot4" disabled value="<?php print $o_tot4; ?>" size="11" step="0.01" min="0"/></td>
</tr>
-->
<tr>
   	<td width="155"><div align="right">
	<strong>Disbursements:</strong></div>
	</td>
    <td colspan="2" scope="row"><div align="left">
<i>FY 2016 Disbursements for the quarter (cash and non-cash MOOE + CO)(amount in pesos, do not convert in thousand pesos; input box will round numbers up to two(2) decimal places)</i><br/>
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right">PS</div></td>
    <td width="500"><input name="d_ps4" type="number" readonly  id="d_ps4" value="<?php print $d_ps4; ?>" placeholder="0.00" size="11" onkeyup="checkban4(d_ps4)" onblur="checkban4(d_ps4)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="d_mooe4" type="number" readonly  id="d_mooe4" value="<?php print $d_mooe4; ?>" placeholder="0.00" size="11" onkeyup="checkban4(d_mooe4)" onblur="checkban4(d_mooe4)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="d_co4" type="number" readonly  id="d_co4" value="<?php print $d_co4; ?>" placeholder="0.00" size="11" onkeyup="checkban4(d_co4)" onblur="checkban4(d_co4)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="d_tot4" type="number" id="d_tot4" disabled value="<?php print $d_tot4; ?>" size="11" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 4 Filename</div></td>
    <td width="500"><textarea name="file_name_display4" id="file_name_display4" readonly cols="50" rows="6" required><?php print $gass_dbur_4th; ?></textarea></td>
	<input name="file_name_sample4" hidden id="file_name_sample4" value="<?php print $gass_dbur_4th; ?>" />
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Copy the above prescribed filename to upload the PDF copy of the BFAR 1 as of end of Dec)</i><br/></div>
	   	</td>
</tr>

<tr>
	<td align="right">File 4 to upload</td>
    <td><input type="file" name="uploadFile4" id="uploadFile4" disabled onblur="alertFilename4(uploadFile4)"></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit)</i><br/></div>
	   	</td>
</tr>

<tr>
   	<th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" />
       <input type="hidden" name="gass_forma_dbur_id" value="<?php print $gass_forma_dbur_id; ?>"><button type="submit">Submit</button></div>
	</th>
    </tr>

</table>
</form>
<?php
	//Free result set and close connection 
	$mysqli->close();
?>
</body>
</html>