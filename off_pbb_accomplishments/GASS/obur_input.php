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
   		document.getElementById("a_ps1").disabled = false;
   		document.getElementById("a_mooe1").disabled = false;
   		document.getElementById("a_co1").disabled = false;
   		document.getElementById("o_ps1").disabled = false;
   		document.getElementById("o_mooe1").disabled = false;
   		document.getElementById("o_co1").disabled = false;
//   		document.getElementById("uploadFile1").disabled = false;
	}
	else
	{
   		document.getElementById("a_ps1").disabled = true;
   		document.getElementById("a_mooe1").disabled = true;
   		document.getElementById("a_co1").disabled = true;
   		document.getElementById("o_ps1").disabled = true;
   		document.getElementById("o_mooe1").disabled = true;
   		document.getElementById("o_co1").disabled = true;
   		document.getElementById("uploadFile1").disabled = true;

   		document.getElementById("a_ps1").value = "";
   		document.getElementById("a_mooe1").value = "";
   		document.getElementById("a_co1").value = "";
   		document.getElementById("a_tot1").value = "";
   		document.getElementById("o_ps1").value = "";
   		document.getElementById("o_mooe1").value = "";
   		document.getElementById("o_co1").value = "";
   		document.getElementById("o_tot1").value = "";
	}
	
	if (document.getElementById("q2").checked) {
   		document.getElementById("a_ps2").disabled = false;
   		document.getElementById("a_mooe2").disabled = false;
   		document.getElementById("a_co2").disabled = false;
   		document.getElementById("o_ps2").disabled = false;
   		document.getElementById("o_mooe2").disabled = false;
   		document.getElementById("o_co2").disabled = false;
//   		document.getElementById("uploadFile2").disabled = false;
	}
	else
	{
   		document.getElementById("a_ps2").disabled = true;
   		document.getElementById("a_mooe2").disabled = true;
   		document.getElementById("a_co2").disabled = true;
   		document.getElementById("o_ps2").disabled = true;
   		document.getElementById("o_mooe2").disabled = true;
   		document.getElementById("o_co2").disabled = true;
   		document.getElementById("uploadFile2").disabled = true;

   		document.getElementById("a_ps2").value = "";
   		document.getElementById("a_mooe2").value = "";
   		document.getElementById("a_co2").value = "";
   		document.getElementById("a_tot2").value = "";
   		document.getElementById("o_ps2").value = "";
   		document.getElementById("o_mooe2").value = "";
   		document.getElementById("o_co2").value = "";
   		document.getElementById("o_tot2").value = "";
	}
	
	if (document.getElementById("q3").checked) {
   		document.getElementById("a_ps3").disabled = false;
   		document.getElementById("a_mooe3").disabled = false;
   		document.getElementById("a_co3").disabled = false;
   		document.getElementById("o_ps3").disabled = false;
   		document.getElementById("o_mooe3").disabled = false;
   		document.getElementById("o_co3").disabled = false;
//   		document.getElementById("uploadFile3").disabled = false;
	}
	else
	{
   		document.getElementById("a_ps3").disabled = true;
   		document.getElementById("a_mooe3").disabled = true;
   		document.getElementById("a_co3").disabled = true;
   		document.getElementById("o_ps3").disabled = true;
   		document.getElementById("o_mooe3").disabled = true;
   		document.getElementById("o_co3").disabled = true;
   		document.getElementById("uploadFile3").disabled = true;

   		document.getElementById("a_ps3").value = "";
   		document.getElementById("a_mooe3").value = "";
   		document.getElementById("a_co3").value = "";
   		document.getElementById("a_tot3").value = "";
   		document.getElementById("o_ps3").value = "";
   		document.getElementById("o_mooe3").value = "";
   		document.getElementById("o_co3").value = "";
   		document.getElementById("o_tot3").value = "";
	}

	if (document.getElementById("q4").checked) {
   		document.getElementById("a_ps4").disabled = false;
   		document.getElementById("a_mooe4").disabled = false;
   		document.getElementById("a_co4").disabled = false;
   		document.getElementById("o_ps4").disabled = false;
   		document.getElementById("o_mooe4").disabled = false;
   		document.getElementById("o_co4").disabled = false;
//   		document.getElementById("uploadFile4").disabled = false;
	}
	else
	{
   		document.getElementById("a_ps4").disabled = true;
   		document.getElementById("a_mooe4").disabled = true;
   		document.getElementById("a_co4").disabled = true;
   		document.getElementById("o_ps4").disabled = true;
   		document.getElementById("o_mooe4").disabled = true;
   		document.getElementById("o_co4").disabled = true;
   		document.getElementById("uploadFile4").disabled = true;

   		document.getElementById("a_ps4").value = "";
   		document.getElementById("a_mooe4").value = "";
   		document.getElementById("a_co4").value = "";
   		document.getElementById("a_tot4").value = "";
   		document.getElementById("o_ps4").value = "";
   		document.getElementById("o_mooe4").value = "";
   		document.getElementById("o_co4").value = "";
   		document.getElementById("o_tot4").value = "";
	}

}
</script>

<script type="text/javascript" language="JavaScript">
function checkban1(obj)
{
    var v = parseFloat(obj.value);
    obj.value = (isNaN(v)) ? '' : v.toFixed(2);

		var a_p1 = 1*(document.getElementById("a_ps1").value);
		var a_m1 = 1*(document.getElementById("a_mooe1").value);
		var a_c1 = 1*(document.getElementById("a_co1").value);
		var allot_tot1 = a_p1 + a_m1 + a_c1;
		var allot_tot1 = allot_tot1.toFixed(2);
   		document.getElementById("a_tot1").value = allot_tot1;

		var o_p1= 1*(document.getElementById("o_ps1").value);
		var o_m1 = 1*(document.getElementById("o_mooe1").value);
		var o_c1 = 1*(document.getElementById("o_co1").value);
		var obli_tot1 = o_p1 + o_m1 + o_c1;
		var obli_tot1 = obli_tot1.toFixed(2);
   		document.getElementById("o_tot1").value = obli_tot1;

		if (allot_tot1 == 0 && obli_tot1 == 0){
		document.getElementById("uploadFile1").disabled = true;
		}
		else{
		document.getElementById("uploadFile1").disabled = false;
		}
}
function checkban2(obj)
{
    var v = parseFloat(obj.value);
    obj.value = (isNaN(v)) ? '' : v.toFixed(2);

		var a_p2 = 1*(document.getElementById("a_ps2").value);
		var a_m2 = 1*(document.getElementById("a_mooe2").value);
		var a_c2 = 1*(document.getElementById("a_co2").value);
		var allot_tot2 = a_p2 + a_m2 + a_c2;
		var allot_tot2 = allot_tot2.toFixed(2);
   		document.getElementById("a_tot2").value = allot_tot2;

		var o_p2= 1*(document.getElementById("o_ps2").value);
		var o_m2 = 1*(document.getElementById("o_mooe2").value);
		var o_c2 = 1*(document.getElementById("o_co2").value);
		var obli_tot2 = o_p2 + o_m2 + o_c2;
		var obli_tot2 = obli_tot2.toFixed(2);
   		document.getElementById("o_tot2").value = obli_tot2;

		if (allot_tot2 == 0 && obli_tot2 == 0){
		document.getElementById("uploadFile2").disabled = true;
		}
		else{
		document.getElementById("uploadFile2").disabled = false;
		}
}
function checkban3(obj)
{
    var v = parseFloat(obj.value);
    obj.value = (isNaN(v)) ? '' : v.toFixed(2);

		var a_p3 = 1*(document.getElementById("a_ps3").value);
		var a_m3 = 1*(document.getElementById("a_mooe3").value);
		var a_c3 = 1*(document.getElementById("a_co3").value);
		var allot_tot3 = a_p3 + a_m3 + a_c3;
		var allot_tot3 = allot_tot3.toFixed(2);
   		document.getElementById("a_tot3").value = allot_tot3;

		var o_p3 = 1*(document.getElementById("o_ps3").value);
		var o_m3 = 1*(document.getElementById("o_mooe3").value);
		var o_c3 = 1*(document.getElementById("o_co3").value);
		var obli_tot3 = o_p3 + o_m3 + o_c3;
		var obli_tot3 = obli_tot3.toFixed(2);
   	
		document.getElementById("o_tot3").value = obli_tot3;

		if (allot_tot3 == 0 && obli_tot3 == 0){
		document.getElementById("uploadFile3").disabled = true;
		}
		else{
		document.getElementById("uploadFile3").disabled = false;
		}

}
function checkban4(obj)
{
    var v = parseFloat(obj.value);
    obj.value = (isNaN(v)) ? '' : v.toFixed(2);
		
		var a_p4 = 1*(document.getElementById("a_ps4").value);	
		var a_m4 = 1*(document.getElementById("a_mooe4").value);
		var a_c4 = 1*(document.getElementById("a_co4").value);
		var allot_tot4 = a_p4 + a_m4 + a_c4;
		var allot_tot4 = allot_tot4.toFixed(2);
   		document.getElementById("a_tot4").value = allot_tot4;

		var o_p4= 1*(document.getElementById("o_ps4").value);
		var o_m4 = 1*(document.getElementById("o_mooe4").value);
		var o_c4 = 1*(document.getElementById("o_co4").value);
		var obli_tot4 = o_p4 + o_m4 + o_c4;
		var obli_tot4 = obli_tot4.toFixed(2);
   		document.getElementById("o_tot4").value = obli_tot4;

		if (allot_tot4 == 0 && obli_tot4 == 0){
		document.getElementById("uploadFile4").disabled = true;
		}
		else{
		document.getElementById("uploadFile4").disabled = false;
		}

}

function validateForm()
{
		var a_p1 = 1*(document.getElementById("a_ps1").value);
		var a_m1 = 1*(document.getElementById("a_mooe1").value);
		var a_c1 = 1*(document.getElementById("a_co1").value);
		var o_p1= 1*(document.getElementById("o_ps1").value);
		var o_m1 = 1*(document.getElementById("o_mooe1").value);
		var o_c1 = 1*(document.getElementById("o_co1").value);
		var tot1 = a_p1 + a_m1 + a_c1 + o_p1 + o_m1 + o_c1;

		var a_p2 = 1*(document.getElementById("a_ps2").value);
		var a_m2 = 1*(document.getElementById("a_mooe2").value);
		var a_c2 = 1*(document.getElementById("a_co2").value);
		var o_p2= 1*(document.getElementById("o_ps2").value);
		var o_m2 = 1*(document.getElementById("o_mooe2").value);
		var o_c2 = 1*(document.getElementById("o_co2").value);
		var tot2 = a_p2 + a_m2 + a_c2 + o_p2 + o_m2 + o_c1;

		var a_p3 = 1*(document.getElementById("a_ps3").value);
		var a_m3 = 1*(document.getElementById("a_mooe3").value);
		var a_c3 = 1*(document.getElementById("a_co3").value);
		var o_p3= 1*(document.getElementById("o_ps3").value);
		var o_m3 = 1*(document.getElementById("o_mooe3").value);
		var o_c3 = 1*(document.getElementById("o_co3").value);
		var tot3 = a_p3 + a_m3 + a_c3 + o_p3 + o_m3 + o_c3;

		var a_p4 = 1*(document.getElementById("a_ps4").value);
		var a_m4 = 1*(document.getElementById("a_mooe4").value);
		var a_c4 = 1*(document.getElementById("a_co4").value);
		var o_p4= 1*(document.getElementById("o_ps4").value);
		var o_m4 = 1*(document.getElementById("o_mooe4").value);
		var o_c4 = 1*(document.getElementById("o_co4").value);
		var tot4 = a_p4 + a_m4 + a_c4 + o_p4 + o_m4 + o_c4;
		
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
function setTwoNumberDecimal(event) {
    this.value = parseFloat(this.value).toFixed(2);
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
<h2>GASS: OBUR - Input Form</h2>
<hr/>

<?php
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

	$file_name_sample1 = "gass_obur_1st_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample1 = strtolower($file_name_sample1);
	$file_name_sample1 = preg_replace('/\s+/', '', $file_name_sample1);

	$file_name_sample2 = "gass_obur_2nd_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample2 = strtolower($file_name_sample2);
	$file_name_sample2 = preg_replace('/\s+/', '', $file_name_sample2);

	$file_name_sample3 = "gass_obur_3rd_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample3 = strtolower($file_name_sample3);
	$file_name_sample3 = preg_replace('/\s+/', '', $file_name_sample3);

	$file_name_sample4 = "gass_obur_4th_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample4 = strtolower($file_name_sample4);
	$file_name_sample4 = preg_replace('/\s+/', '', $file_name_sample4);
?>

<!-- Edit form here -->
<form name="inputForm" action="obur_insert.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
<table>
<tr>
    <td width="155"><div align="right"><strong>"Tick" desired quarter to activate</strong></div></td>
</tr>

<tr>
		<td><hr /></td>
</tr>

<tr>
    <td width="155"><div align="right"><strong>JANUARY to MARCH</strong></div></td>
 	<td width="500">
   	<input type="checkbox" onchange="enable_choice(quarter)" id="q1" name="quarter" <?php if (isset($quarter) && $quarter=="jan_mar") echo "checked";?>  value="jan_mar">
	</td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Allotments:</strong></div>
	</td>
    <td colspan="2" scope="row"><div align="left">
<i>FY 2016 Allotments released released for the quarter, including those released under the "GAA as a release document" policy. (amount in pesos; do not convert in thousand pesos; input box will round numbers up to two(2) decimal places)</i><br/>
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right">PS</div></td>
    <td width="500"><input name="a_ps1" type="text" disabled  id="a_ps1" placeholder = "0.00" size="15" onchange="checkban1(a_ps1)" step="0.01" min="0.00"/></td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="a_mooe1" type="text" disabled  id="a_mooe1" placeholder = "0.00"  size="15" onchange="checkban1(a_mooe1)" step="0.01" min="0.00"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="a_co1" type="text" disabled  id="a_co1" placeholder = "0.00"  size="15" onchange="checkban1(a_co1)"  step="0.01" min="0.00"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="a_tot1" type="text" disabled id="a_tot1" placeholder = "0.00"  size="15" step="0.01" min="0"/></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Obligations:</strong></div>
	</td>
    <td colspan="2" scope="row"><div align="left">
	<i>FY 2016 Obligations for the quarter (PS + MOOE + CO (current) + CO (continuing appropriation))(amount in pesos; do not convert in thousand pesos; input box will round numbers up to two(2) decimal places)</i><br/>
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right">PS</div></td>
    <td width="500"><input name="o_ps1" type="text" disabled  id="o_ps1" placeholder = "0.00"  size="15" onchange="checkban1(o_ps1)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="o_mooe1" type="text" disabled  id="o_mooe1" placeholder = "0.00"  size="15" onchange="checkban1(o_mooe1)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="o_co1" type="text" disabled  id="o_co1" placeholder = "0.00"  size="15" onchange="checkban1(o_co1)"  step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="o_tot1" type="text" disabled id="o_tot1" placeholder = "0.00"  size="15" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 1 Filename</div></td>
    <td width="500"><textarea name="file_name_display1" id="file_name_display1" readonly cols="50" rows="6" required><?php print $file_name_sample1; ?></textarea></td>
	<input name="file_name_sample1" hidden id="file_name_sample1" value="<?php print $file_name_sample1; ?>" />
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
    <td width="155"><div align="right"><strong>APRIL to JUNE</strong></div></td>
 	<td width="500">
   	<input type="checkbox" onchange="enable_choice(quarter)" id="q2" name="quarter" <?php if (isset($quarter) && $quarter=="apr_jun") echo "checked";?>  value="apr_jun">
	</td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Allotments:</strong></div>
	</td>
    <td colspan="2" scope="row"><div align="left">
<i>FY 2016 Allotments released released for the quarter, including those released under the "GAA as a release document" policy. (amount in pesos; do not convert in thousand pesos; input box will round numbers up to two(2) decimal places)</i><br/>
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right">PS</div></td>
    <td width="500"><input name="a_ps2" type="text" disabled  id="a_ps2" placeholder = "0.00" size="15" onchange="checkban2(a_ps2)"  step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="a_mooe2" type="text" disabled  id="a_mooe2" placeholder = "0.00" size="15" onchange="checkban2(a_mooe2)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="a_co2" type="text" disabled  id="a_co2" placeholder = "0.00" size="15" onchange="checkban2(a_co2)"  step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="a_tot2" type="text" disabled id="a_tot2" placeholder = "0.00"  size="15" step="0.01" min="0"/></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Obligations:</strong></div>
	</td>
    <td colspan="2" scope="row"><div align="left">
	<i>FY 2016 Obligations for the quarter (PS + MOOE + CO (current) + CO (continuing appropriation))(amount in pesos; do not convert in thousand pesos; input box will round numbers up to two(2) decimal places)</i><br/>
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right">PS</div></td>
    <td width="500"><input name="o_ps2" type="text" disabled  id="o_ps2" placeholder = "0.00"  size="15" onchange="checkban2(o_ps2)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="o_mooe2" type="text" disabled  id="o_mooe2" placeholder = "0.00"  size="15" onchange="checkban2(o_mooe2)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="o_co2" type="text" disabled  id="o_co2" placeholder = "0.00"  size="15" onchange="checkban2(o_co2)"  step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="o_tot2" type="text" disabled id="o_tot2" placeholder = "0.00"  size="15" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 2 Filename</div></td>
    <td width="500"><textarea name="file_name_display2" id="file_name_display2" readonly cols="50" rows="6" required><?php print $file_name_sample2; ?></textarea></td>
	<input name="file_name_sample2" hidden id="file_name_sample2" value="<?php print $file_name_sample2; ?>" />
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
    <td width="155"><div align="right"><strong>JULY to SEPTEMBER</strong></div></td>
 	<td width="500">
   	<input type="checkbox" onchange="enable_choice(quarter)" id="q3" name="quarter" <?php if (isset($quarter) && $quarter=="jul_sep") echo "checked";?>  value="jul_sep">
	</td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Allotments:</strong></div>
	</td>
    <td colspan="2" scope="row"><div align="left">
<i>FY 2016 Allotments released released for the quarter, including those released under the "GAA as a release document" policy. (amount in pesos; do not convert in thousand pesos; input box will round numbers up to two(2) decimal places)</i><br/>
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right">PS</div></td>
    <td width="500"><input name="a_ps3" type="text" disabled  id="a_ps3" placeholder = "0.00"  size="15" onchange="checkban3(a_ps3)"  step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="a_mooe3" type="text" disabled  id="a_mooe3" placeholder = "0.00"  size="15" onchange="checkban3(a_mooe3)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="a_co3" type="text" disabled  id="a_co3" placeholder = "0.00"  size="15" onchange="checkban3(a_co3)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="a_tot3" type="text" disabled id="a_tot3" placeholder = "0.00"  size="15" step="0.01" min="0"/></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Obligation</strong></div>
	</td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Obligations:</strong></div>
	</td>
    <td colspan="2" scope="row"><div align="left">
	<i>FY 2016 Obligations for the quarter (PS + MOOE + CO (current) + CO (continuing appropriation))(amount in pesos; do not convert in thousand pesos; input box will round numbers up to two(2) decimal places)</i><br/>
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right">PS</div></td>
    <td width="500"><input name="o_ps3" type="text" disabled  id="o_ps3" placeholder = "0.00"  size="15" onchange="checkban3(o_ps3)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="o_mooe3" type="text" disabled  id="o_mooe3" placeholder = "0.00"  size="15" onchange="checkban3(o_mooe3)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="o_co3" type="text" disabled  id="o_co3" placeholder = "0.00"  size="15" onchange="checkban3(o_co3)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="o_tot3" type="text" disabled id="o_tot3" placeholder = "0.00"  size="15" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 3 Filename</div></td>
    <td width="500"><textarea name="file_name_display3" id="file_name_display3" readonly cols="50" rows="6" required><?php print $file_name_sample3; ?></textarea></td>
	<input name="file_name_sample3" hidden id="file_name_sample3" value="<?php print $file_name_sample3; ?>" />
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
    <td width="155"><div align="right"><strong>OCTOBER to DECEMBER</strong></div></td>
 	<td width="500">
   	<input type="checkbox" onchange="enable_choice(quarter)" id="q4" name="quarter" <?php if (isset($quarter) && $quarter=="oct_dec") echo "checked";?>  value="oct_dec">
	</td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Allotments:</strong></div>
	</td>
    <td colspan="2" scope="row"><div align="left">
<i>FY 2016 Allotments released released for the quarter, including those released under the "GAA as a release document" policy. (amount in pesos; do not convert in thousand pesos; input box will round numbers up to two(2) decimal places)</i><br/>
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right">PS</div></td>
    <td width="500"><input name="a_ps4" type="text" disabled  id="a_ps4" placeholder = "0.00" size="15"  onchange="checkban4(a_ps4)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="a_mooe4" type="text" disabled  id="a_mooe4" placeholder = "0.00"  size="15" onchange="checkban4(a_mooe4)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="a_co4" type="text" disabled  id="a_co4" placeholder = "0.00" size="15" onchange="checkban4(a_co4)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="a_tot4" type="text" disabled id="a_tot4" placeholder = "0.00"  size="15" step="0.01" min="0"/></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Obligations:</strong></div>
	</td>
    <td colspan="2" scope="row"><div align="left">
	<i>FY 2016 Obligations for the quarter (PS + MOOE + CO (current) + CO (continuing appropriation))(amount in pesos; do not convert in thousand pesos; input box will round numbers up to two(2) decimal places)</i><br/>
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right">PS</div></td>
    <td width="500"><input name="o_ps4" type="text" disabled  id="o_ps4" placeholder = "0.00"  size="15" onchange="checkban4(o_ps4)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">MOOE</div></td>
    <td width="500"><input name="o_mooe4" type="text" disabled  id="o_mooe4" placeholder = "0.00"  size="15" onchange="checkban4(o_mooe4)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">CO</div></td>
    <td width="500"><input name="o_co4" type="text" disabled  id="o_co4" placeholder = "0.00"  size="15" onchange="checkban4(o_co4)" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Total</div></td>
    <td width="500"><input name="o_tot4" type="text" disabled id="o_tot4" placeholder = "0.00"  size="15" step="0.01" min="0"/></td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 4 Filename</div></td>
    <td width="500"><textarea name="file_name_display4" id="file_name_display4" readonly cols="50" rows="6" required><?php print $file_name_sample4; ?></textarea></td>
	<input name="file_name_sample4" hidden id="file_name_sample4" value="<?php print $file_name_sample4; ?>" />
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
       <input type="submit" name="submit" value="Submit"/>
     </div></th>
</tr>

</table>
</form>
<?php
	//Free result set and close connection 
	$mysqli->close();
?>
</body>
</html>