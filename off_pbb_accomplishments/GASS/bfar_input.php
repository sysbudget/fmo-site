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

<script type="text/javascript" language="JavaScript">
function choice1()
{
	if (document.getElementById("officea").checked) {
		document.getElementById("officeb").disabled = true;

   		document.getElementById("pdecy").disabled = false;
   		document.getElementById("pdecn").disabled = false;
   		document.getElementById("cjany").disabled = false;
   		document.getElementById("cjann").disabled = false;
   		document.getElementById("cfeby").disabled = false;
   		document.getElementById("cfebn").disabled = false;
   		document.getElementById("cmary").disabled = false;
   		document.getElementById("cmarn").disabled = false;
   		document.getElementById("capry").disabled = false;
   		document.getElementById("caprn").disabled = false;
   		document.getElementById("cmayy").disabled = false;
   		document.getElementById("cmayn").disabled = false;
   		document.getElementById("cjuny").disabled = false;
   		document.getElementById("cjunn").disabled = false;
   		document.getElementById("cjuly").disabled = false;
   		document.getElementById("cjuln").disabled = false;
   		document.getElementById("caugy").disabled = false;
   		document.getElementById("caugn").disabled = false;
   		document.getElementById("csepy").disabled = false;
   		document.getElementById("csepn").disabled = false;
   		document.getElementById("cocty").disabled = false;
   		document.getElementById("coctn").disabled = false;
   		document.getElementById("cnovy").disabled = false;
   		document.getElementById("cnovn").disabled = false;

   		document.getElementById("QPRO_4y").disabled = true;
   		document.getElementById("QPRO_4n").disabled = true;
   		document.getElementById("SAAODB_4y").disabled = false;
   		document.getElementById("SAAODB_4n").disabled = false;
   		document.getElementById("SAAODBOE_4y").disabled = false;
   		document.getElementById("SAAODBOE_4n").disabled = false;
   		document.getElementById("LASA_4y").disabled = true;
   		document.getElementById("LASA_4n").disabled = true;
   		document.getElementById("SABUDB_4y").disabled = false;
   		document.getElementById("SABUDB_4n").disabled = false;
   		document.getElementById("SABUDBOE_4y").disabled = false;
   		document.getElementById("SABUDBOE_4n").disabled = false;
   		document.getElementById("ADDO_4y").disabled = false;
   		document.getElementById("ADDO_4n").disabled = false;
   		document.getElementById("QRROR_4y").disabled = false;
   		document.getElementById("QRROR_4n").disabled = false;

   		document.getElementById("QPRO_1y").disabled = true;
   		document.getElementById("QPRO_1n").disabled = true;
   		document.getElementById("SAAODB_1y").disabled = false;
   		document.getElementById("SAAODB_1n").disabled = false;
   		document.getElementById("SAAODBOE_1y").disabled = false;
   		document.getElementById("SAAODBOE_1n").disabled = false;
   		document.getElementById("LASA_1y").disabled = true;
   		document.getElementById("LASA_1n").disabled = true;
   		document.getElementById("SABUDB_1y").disabled = false;
   		document.getElementById("SABUDB_1n").disabled = false;
   		document.getElementById("SABUDBOE_1y").disabled = false;
   		document.getElementById("SABUDBOE_1n").disabled = false;
   		document.getElementById("QRROR_1y").disabled = false;
   		document.getElementById("QRROR_1n").disabled = false;

   		document.getElementById("QPRO_2y").disabled = true;
   		document.getElementById("QPRO_2n").disabled = true;
   		document.getElementById("SAAODB_2y").disabled = false;
   		document.getElementById("SAAODB_2n").disabled = false;
   		document.getElementById("SAAODBOE_2y").disabled = false;
   		document.getElementById("SAAODBOE_2n").disabled = false;
   		document.getElementById("LASA_2y").disabled = true;
   		document.getElementById("LASA_2n").disabled = true;
   		document.getElementById("SABUDB_2y").disabled = false;
   		document.getElementById("SABUDB_2n").disabled = false;
   		document.getElementById("SABUDBOE_2y").disabled = false;
   		document.getElementById("SABUDBOE_2n").disabled = false;
   		document.getElementById("QRROR_2y").disabled = false;
   		document.getElementById("QRROR_2n").disabled = false;

   		document.getElementById("QPRO_3y").disabled = true;
   		document.getElementById("QPRO_3n").disabled = true;
   		document.getElementById("SAAODB_3y").disabled = false;
   		document.getElementById("SAAODB_3n").disabled = false;
   		document.getElementById("SAAODBOE_3y").disabled = false;
   		document.getElementById("SAAODBOE_3n").disabled = false;
   		document.getElementById("LASA_3y").disabled = true;
   		document.getElementById("LASA_3n").disabled = true;
   		document.getElementById("SABUDB_3y").disabled = false;
   		document.getElementById("SABUDB_3n").disabled = false;
   		document.getElementById("SABUDBOE_3y").disabled = false;
   		document.getElementById("SABUDBOE_3n").disabled = false;
   		document.getElementById("QRROR_3y").disabled = false;
   		document.getElementById("QRROR_3n").disabled = false;
	}

	if (document.getElementById("officeb").checked) {
		document.getElementById("officea").disabled = true;

	   	document.getElementById("pdecy").disabled = true;
   		document.getElementById("pdecn").disabled = true;
   		document.getElementById("cjany").disabled = true;
   		document.getElementById("cjann").disabled = true;
   		document.getElementById("cfeby").disabled = true;
   		document.getElementById("cfebn").disabled = true;
   		document.getElementById("cmary").disabled = true;
   		document.getElementById("cmarn").disabled = true;
   		document.getElementById("capry").disabled = true;
   		document.getElementById("caprn").disabled = true;
   		document.getElementById("cmayy").disabled = true;
   		document.getElementById("cmayn").disabled = true;
   		document.getElementById("cjuny").disabled = true;
   		document.getElementById("cjunn").disabled = true;
   		document.getElementById("cjuly").disabled = true;
   		document.getElementById("cjuln").disabled = true;
   		document.getElementById("caugy").disabled = true;
   		document.getElementById("caugn").disabled = true;
   		document.getElementById("csepy").disabled = true;
   		document.getElementById("csepn").disabled = true;
   		document.getElementById("cocty").disabled = true;
   		document.getElementById("coctn").disabled = true;
   		document.getElementById("cnovy").disabled = true;
   		document.getElementById("cnovn").disabled = true;
   		document.getElementById("uploadFile1").disabled = true;
   		document.getElementById("uploadFile2").disabled = true;
   		document.getElementById("uploadFile3").disabled = true;
   		document.getElementById("uploadFile4").disabled = true;
   		document.getElementById("uploadFile5").disabled = true;

   		document.getElementById("QPRO_4y").disabled = false;
   		document.getElementById("QPRO_4n").disabled = false;
   		document.getElementById("SAAODB_4y").disabled = false;
   		document.getElementById("SAAODB_4n").disabled = false;
   		document.getElementById("SAAODBOE_4y").disabled = false;
   		document.getElementById("SAAODBOE_4n").disabled = false;
   		document.getElementById("LASA_4y").disabled = false;
   		document.getElementById("LASA_4n").disabled = false;
   		document.getElementById("SABUDB_4y").disabled = false;
   		document.getElementById("SABUDB_4n").disabled = false;
   		document.getElementById("SABUDBOE_4y").disabled = false;
   		document.getElementById("SABUDBOE_4n").disabled = false;
   		document.getElementById("ADDO_4y").disabled = true;
   		document.getElementById("ADDO_4n").disabled = true;
   		document.getElementById("QRROR_4y").disabled = true;
   		document.getElementById("QRROR_4n").disabled = true;

   		document.getElementById("QPRO_1y").disabled = false;
   		document.getElementById("QPRO_1n").disabled = false;
   		document.getElementById("SAAODB_1y").disabled = false;
   		document.getElementById("SAAODB_1n").disabled = false;
   		document.getElementById("SAAODBOE_1y").disabled = false;
   		document.getElementById("SAAODBOE_1n").disabled = false;
   		document.getElementById("LASA_1y").disabled = false;
   		document.getElementById("LASA_1n").disabled = false;
   		document.getElementById("SABUDB_1y").disabled = false;
   		document.getElementById("SABUDB_1n").disabled = false;
   		document.getElementById("SABUDBOE_1y").disabled = false;
   		document.getElementById("SABUDBOE_1n").disabled = false;
   		document.getElementById("QRROR_1y").disabled = true;
   		document.getElementById("QRROR_1n").disabled = true;

   		document.getElementById("QPRO_2y").disabled = false;
   		document.getElementById("QPRO_2n").disabled = false;
   		document.getElementById("SAAODB_2y").disabled = false;
   		document.getElementById("SAAODB_2n").disabled = false;
   		document.getElementById("SAAODBOE_2y").disabled = false;
   		document.getElementById("SAAODBOE_2n").disabled = false;
   		document.getElementById("LASA_2y").disabled = false;
   		document.getElementById("LASA_2n").disabled = false;
   		document.getElementById("SABUDB_2y").disabled = false;
   		document.getElementById("SABUDB_2n").disabled = false;
   		document.getElementById("SABUDBOE_2y").disabled = false;
   		document.getElementById("SABUDBOE_2n").disabled = false;
   		document.getElementById("QRROR_2y").disabled = true;
   		document.getElementById("QRROR_2n").disabled = true;

   		document.getElementById("QPRO_3y").disabled = false;
   		document.getElementById("QPRO_3n").disabled = false;
   		document.getElementById("SAAODB_3y").disabled = false;
   		document.getElementById("SAAODB_3n").disabled = false;
   		document.getElementById("SAAODBOE_3y").disabled = false;
   		document.getElementById("SAAODBOE_3n").disabled = false;
   		document.getElementById("LASA_3y").disabled = false;
   		document.getElementById("LASA_3n").disabled = false;
   		document.getElementById("SABUDB_3y").disabled = false;
   		document.getElementById("SABUDB_3n").disabled = false;
   		document.getElementById("SABUDBOE_3y").disabled = false;
   		document.getElementById("SABUDBOE_3n").disabled = false;
   		document.getElementById("QRROR_3y").disabled = true;
   		document.getElementById("QRROR_3n").disabled = true;
	}
}
</script>

<script type="text/javascript" language="JavaScript">
function choice()
{

	if (document.getElementById("pdecy").checked) {
   		document.getElementById("uploadFile1").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile1").disabled = true;
	}

	if (document.getElementById("cjany").checked || document.getElementById("cfeby").checked || document.getElementById("cmary").checked)  {
   		document.getElementById("uploadFile2").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile2").disabled = true;
	}

	if (document.getElementById("capry").checked || document.getElementById("cmayy").checked || document.getElementById("cjuny").checked)  {
   		document.getElementById("uploadFile3").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile3").disabled = true;
	}

	if (document.getElementById("cjuly").checked || document.getElementById("caugy").checked || document.getElementById("csepy").checked)  {
   		document.getElementById("uploadFile4").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile4").disabled = true;
	}

	if (document.getElementById("cocty").checked || document.getElementById("cnovy").checked)  {
   		document.getElementById("uploadFile5").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile5").disabled = true;
	}

	if (document.getElementById("QPRO_4y").checked || document.getElementById("SAAODB_4y").checked || document.getElementById("SAAODBOE_4y").checked || document.getElementById("LASA_4y").checked || document.getElementById("SABUDB_4y").checked || document.getElementById("SABUDBOE_4y").checked || document.getElementById("ADDO_4y").checked || document.getElementById("QRROR_4y").checked)  {
   		document.getElementById("uploadFile6").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile6").disabled = true;
	}

	if (document.getElementById("QPRO_1y").checked || document.getElementById("SAAODB_1y").checked || document.getElementById("SAAODBOE_1y").checked || document.getElementById("LASA_1y").checked || document.getElementById("SABUDB_1y").checked || document.getElementById("SABUDBOE_1y").checked || document.getElementById("QRROR_1y").checked)  {
   		document.getElementById("uploadFile7").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile7").disabled = true;
	}

	if (document.getElementById("QPRO_2y").checked || document.getElementById("SAAODB_2y").checked || document.getElementById("SAAODBOE_2y").checked || document.getElementById("LASA_2y").checked || document.getElementById("SABUDB_2y").checked || document.getElementById("SABUDBOE_2y").checked || document.getElementById("QRROR_2y").checked)  {
   		document.getElementById("uploadFile8").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile8").disabled = true;
	}

	if (document.getElementById("QPRO_3y").checked || document.getElementById("SAAODB_3y").checked || document.getElementById("SAAODBOE_3y").checked || document.getElementById("LASA_3y").checked || document.getElementById("SABUDB_3y").checked || document.getElementById("SABUDBOE_3y").checked || document.getElementById("QRROR_3y").checked)  {
   		document.getElementById("uploadFile9").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile9").disabled = true;
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

<script type="text/javascript" language="JavaScript">
function alertFilename5()
{
var file_name5 = "";
var file_size5 = "";
var file_ext5 = "";
var file_name_sample5 = "";
var file_name5 = document.getElementById('uploadFile5').files[0].name;
var file_ext5 = file_name5.substring(file_name5.lastIndexOf('.')+1);
var file_size5 = document.getElementById('uploadFile5').files[0].size;
var file_name_sample5 = document.getElementById('file_name_sample5').value;
var file_name_sample5 = file_name_sample5 + ".pdf";

	if (file_name5 != file_name_sample5)
		{
		alert("Use the required filename. " + " " + file_name5 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile5').value="";
		return false;
		}

	if (file_size5 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile5').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename6()
{
var file_name6 = "";
var file_size6 = "";
var file_ext6 = "";
var file_name_sample6 = "";
var file_name6 = document.getElementById('uploadFile6').files[0].name;
var file_ext6 = file_name6.substring(file_name6.lastIndexOf('.')+1);
var file_size6 = document.getElementById('uploadFile6').files[0].size;
var file_name_sample6 = document.getElementById('file_name_sample6').value;
var file_name_sample6 = file_name_sample6 + ".pdf";

	if (file_name6 != file_name_sample6)
		{
		alert("Use the required filename. " + " " + file_name6 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile6').value="";
		return false;
		}

	if (file_size6 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile6').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename7()
{
var file_name7 = "";
var file_size7 = "";
var file_ext7 = "";
var file_name_sample7 = "";
var file_name7 = document.getElementById('uploadFile7').files[0].name;
var file_ext7 = file_name7.substring(file_name7.lastIndexOf('.')+1);
var file_size7 = document.getElementById('uploadFile7').files[0].size;
var file_name_sample7 = document.getElementById('file_name_sample7').value;
var file_name_sample7 = file_name_sample7 + ".pdf";

	if (file_name7 != file_name_sample7)
		{
		alert("Use the required filename. " + " " + file_name7 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile7').value="";
		return false;
		}

	if (file_size7 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile7').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename8()
{
var file_name8 = "";
var file_size8 = "";
var file_ext8 = "";
var file_name_sample8 = "";
var file_name8 = document.getElementById('uploadFile8').files[0].name;
var file_ext8 = file_name8.substring(file_name8.lastIndexOf('.')+1);
var file_size8 = document.getElementById('uploadFile8').files[0].size;
var file_name_sample8 = document.getElementById('file_name_sample8').value;
var file_name_sample8 = file_name_sample8 + ".pdf";

	if (file_name8 != file_name_sample8)
		{
		alert("Use the required filename. " + " " + file_name8 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile8').value="";
		return false;
		}

	if (file_size8 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile8').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function alertFilename9()
{
var file_name9 = "";
var file_size9 = "";
var file_ext9 = "";
var file_name_sample9 = "";
var file_name9 = document.getElementById('uploadFile9').files[0].name;
var file_ext9 = file_name9.substring(file_name9.lastIndexOf('.')+1);
var file_size9 = document.getElementById('uploadFile9').files[0].size;
var file_name_sample9 = document.getElementById('file_name_sample9').value;
var file_name_sample9 = file_name_sample9 + ".pdf";

	if (file_name9 != file_name_sample9)
		{
		alert("Use the required filename. " + " " + file_name9 + " is not similar with the prescribed filename.");
		document.getElementById('uploadFile9').value="";
		return false;
		}

	if (file_size9 >= 5242880)
		{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail sysbudget@up.edu.ph indicate the prescribed filename in the subject line. ");
		document.getElementById('uploadFile9').value="";
		return false;
		}
}
</script>

<script type="text/javascript" language="JavaScript">
function validateForm()
{

	if (document.getElementById("uploadFile1").disabled == true){ var f1 = 0; }
	if (document.getElementById("uploadFile2").disabled == true){ var f2 = 0; }
	if (document.getElementById("uploadFile3").disabled == true){ var f3 = 0; }
	if (document.getElementById("uploadFile4").disabled == true){ var f4 = 0; }
	if (document.getElementById("uploadFile5").disabled == true){ var f5 = 0; }
	if (document.getElementById("uploadFile6").disabled == true){ var f6 = 0; }
	if (document.getElementById("uploadFile7").disabled == true){ var f7 = 0; }
	if (document.getElementById("uploadFile8").disabled == true){ var f8 = 0; }
	if (document.getElementById("uploadFile9").disabled == true){ var f9 = 0; }
	
	var ctr = 1 * (f1 + f2 + f3 + f4 + f5 + f6 + f7 + f8 + f9)		

	if (ctr == 0){
		alert ("Nothing to submit all entries are set no NO");
		return false;
	}
	else
	{
		return true;
	}

}
</script>


</head>
<body>

<div class="viewbody">
<h2>GASS B1: Budget and Financial Accountability Reports (BFARs) - Input Form</h2>
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

	$file_name_sample1 = "gass_formb_bfar_4_qtr4_1_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample1 = strtolower($file_name_sample1);
	$file_name_sample1 = preg_replace('/\s+/', '', $file_name_sample1);

	$file_name_sample2 = "gass_formb_bfar_4_qtr1_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample2 = strtolower($file_name_sample2);
	$file_name_sample2 = preg_replace('/\s+/', '', $file_name_sample2);

	$file_name_sample3 = "gass_formb_bfar_4_qtr2_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample3 = strtolower($file_name_sample3);
	$file_name_sample3 = preg_replace('/\s+/', '', $file_name_sample3);

	$file_name_sample4 = "gass_formb_bfar_4_qtr3_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample4 = strtolower($file_name_sample4);
	$file_name_sample4 = preg_replace('/\s+/', '', $file_name_sample4);

	$file_name_sample5 = "gass_formb_bfar_4_qtr4_2_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample5 = strtolower($file_name_sample5);
	$file_name_sample5 = preg_replace('/\s+/', '', $file_name_sample5);

	$file_name_sample6 = "gass_formb_bfar_qtr4_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample6 = strtolower($file_name_sample6);
	$file_name_sample6= preg_replace('/\s+/', '', $file_name_sample6);

	$file_name_sample7 = "gass_formb_bfar_qtr1_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample7 = strtolower($file_name_sample7);
	$file_name_sample7 = preg_replace('/\s+/', '', $file_name_sample7);

	$file_name_sample8 = "gass_formb_bfar_qtr2_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample8 = strtolower($file_name_sample8);
	$file_name_sample8 = preg_replace('/\s+/', '', $file_name_sample8);

	$file_name_sample9 = "gass_formb_bfar_qtr3_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample9 = strtolower($file_name_sample9);
	$file_name_sample9 = preg_replace('/\s+/', '', $file_name_sample9);

?>

<!-- Edit form here -->
<form name="inputForm" action="bfar_insert.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
<table>

<tr>
   	<td width="155"><div align="right">
	<strong>IMPORTANT REMINDERS:</strong></div>
	</td>
    
    	<td colspan="2" scope="row"><div align="left">
        <ol>
        <li>BFAR Reports submission reckoning year is 2016.</li>
	   	<li>If your response will be "Yes" in the following section, it means the report is compliant to Public Financial Management reporting requirements of the COA and the DBM in accordance with the prescribed content and period of submission under existing laws, rules and regulations.</li>
        </div>
        </ol>
        </td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>INSTRUCTIONS IN FILLING UP THE INPUT FORM:</strong></div>
	</td>
    
    	<td colspan="2" scope="row"><div align="left">
        <ol>
        <li>Across the report period, select Yes or No.</li>
	   	<li>Across the prescribed attachment filename, copy the prescribed filename to upload the PDF copy of acknowledgement receipt of submission.</li>
        <li> Across the File to upload, select the file with the prescribed filename from your computer; PDF only with 5MB limit.</li>
        </div>
        </ol>
        </td>
</tr>

<tr>
    <td width="155"><div align="right">Type of Reports</div></td>
 	<td width="500">
    <input type="radio" onchange="choice1(office)" name="office" id="officeb" <?php if (isset($office) && $office=="B") echo "checked";?>  value="B">Budgetary
   	<input type="radio" onchange="choice1(office)" name="office" id="officea"<?php if (isset($office) && $office=="A") echo "checked";?>  value="A">Accounting
	</td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>MONTHLY REPORT (FAR No. 4 - MRD) SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2015 Dec</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(bfar4_12)" disabled name="bfar4_12" id="pdecy" <?php if (isset($bfar4_12) && $bfar4_12=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(bfar4_12)" disabled name="bfar4_12" id="pdecn" checked <?php if (isset($bfar4_12) && $bfar4_12=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 1 Filename</div></td>
    <td width="500"><textarea name="file_name_display1" id="file_name_display1" readonly cols="50" rows="6" required><?php print $file_name_sample1; ?></textarea></td>
	<input name="file_name_sample1" hidden id="file_name_sample1" value="<?php print $file_name_sample1; ?>" />
</tr>

<tr>
	<td align="right">File 1 to upload</td>
    <td><input type="file" name="uploadFile1" id="uploadFile1" disabled required onblur="alertFilename1(uploadFile1)"></td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Jan</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(bfar4_1)" disabled name="bfar4_1" id="cjany" <?php if (isset($bfar4_1) && $bfar4_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(bfar4_1)" disabled name="bfar4_1" id="cjann" checked <?php if (isset($bfar4_1) && $bfar4_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Feb</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(bfar4_2)" disabled name="bfar4_2" id="cfeby" <?php if (isset($bfar4_2) && $bfar4_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(bfar4_2)" disabled name="bfar4_2" id="cfebn" checked <?php if (isset($bfar4_2) && $bfar4_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Mar</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(bfar4_3)" disabled name="bfar4_3" id="cmary" <?php if (isset($bfar4_3) && $bfar4_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(bfar4_3)" disabled name="bfar4_3" id="cmarn" checked <?php if (isset($bfar4_3) && $bfar4_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
	<td width="155"><div align="right">Prescribed Attachment 2 Filename</div></td>
    <td width="500"><textarea name="file_name_display2" id="file_name_display2" readonly cols="50" rows="6" required><?php print $file_name_sample2; ?></textarea></td>
	<input name="file_name_sample2" hidden id="file_name_sample2" value="<?php print $file_name_sample2; ?>" />
</tr>

<tr>
	<td align="right">File 2 to upload</td>
    <td><input type="file" name="uploadFile2" id="uploadFile2" disabled required onblur="alertFilename2(uploadFile2)"></td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Apr</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(bfar4_4)" disabled name="bfar4_4" id="capry" <?php if (isset($bfar4_4) && $bfar4_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(bfar4_4)" disabled name="bfar4_4" id="caprn" checked <?php if (isset($bfar4_4) && $bfar4_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 May</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(bfar4_5)" disabled name="bfar4_5" id="cmayy" <?php if (isset($bfar4_5) && $bfar4_5=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(bfar4_5)" disabled name="bfar4_5" id="cmayn" checked <?php if (isset($bfar4_5) && $bfar4_5=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Jun</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(bfar4_6)" disabled name="bfar4_6" id="cjuny" <?php if (isset($bfar4_6) && $bfar4_6=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(bfar4_6)" disabled name="bfar4_6" id="cjunn" checked <?php if (isset($bfar4_6) && $bfar4_6=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 3 Filename</div></td>
    <td width="500"><textarea name="file_name_display3" id="file_name_display3" readonly cols="50" rows="6" required><?php print $file_name_sample3; ?></textarea></td>
	<input name="file_name_sample3" hidden id="file_name_sample3" value="<?php print $file_name_sample3; ?>" />
</tr>

<tr>
	<td align="right">File 3 to upload</td>
    <td><input type="file" name="uploadFile3" id="uploadFile3" disabled required onblur="alertFilename3(uploadFile3)"></td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Jul</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(bfar4_7)" disabled name="bfar4_7" id="cjuly" <?php if (isset($bfar4_7) && $bfar4_7=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(bfar4_7)" disabled name="bfar4_7" id="cjuln" checked <?php if (isset($bfar4_7) && $bfar4_7=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Aug</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(bfar4_8)" disabled name="bfar4_8" id="caugy" <?php if (isset($bfar4_8) && $bfar4_8=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(bfar4_8)" disabled name="bfar4_8" id="caugn" checked <?php if (isset($bfar4_8) && $bfar4_8=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Sep</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(bfar4_9)" disabled name="bfar4_9" id="csepy" <?php if (isset($bfar4_9) && $bfar4_9=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(bfar4_9)" disabled name="bfar4_9" id="csepn" checked <?php if (isset($bfar4_9) && $bfar4_9=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 4 Filename</div></td>
    <td width="500"><textarea name="file_name_display4" id="file_name_display4" readonly cols="50" rows="6" required><?php print $file_name_sample4; ?></textarea></td>
	<input name="file_name_sample4" hidden id="file_name_sample4" value="<?php print $file_name_sample4; ?>" />
</tr>

<tr>
	<td align="right">File 4 to upload</td>
    <td><input type="file" name="uploadFile4" id="uploadFile4" disabled required onblur="alertFilename4(uploadFile4)"></td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Oct</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(bfar4_10)" disabled name="bfar4_10" id="cocty" <?php if (isset($bfar4_10) && $bfar4_10=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(bfar4_10)" disabled name="bfar4_10" id="coctn" checked <?php if (isset($bfar4_10) && $bfar4_10=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">2016 Nov</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(bfar4_11)" disabled name="bfar4_11" id="cnovy" <?php if (isset($bfar4_11) && $bfar4_11=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(bfar4_11)" disabled name="bfar4_11" id="cnovn" checked <?php if (isset($bfar4_11) && $bfar4_11=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 5 Filename</div></td>
    <td width="500"><textarea name="file_name_display5" id="file_name_display5" readonly cols="50" rows="6" required><?php print $file_name_sample5; ?></textarea></td>
	<input name="file_name_sample5" hidden id="file_name_sample5" value="<?php print $file_name_sample5; ?>" />
</tr>

<tr>
	<td align="right">File 5 to upload</td>
    <td><input type="file" name="uploadFile5" id="uploadFile5" disabled required onblur="alertFilename5(uploadFile5)"></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>QUARTERLY REPORTS (2015 - 4th quarter) SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">BAR No. 1: QPRO</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(QPRO_4)" disabled name="QPRO_4" id="QPRO_4y" <?php if (isset($QPRO_4) && $QPRO_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(QPRO_4)" disabled name="QPRO_4" id="QPRO_4n" checked <?php if (isset($QPRO_4) && $QPRO_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1: SAAODB</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SAAODB_4)" disabled name="SAAODB_4" id="SAAODB_4y" <?php if (isset($SAAODB_4) && $SAAODB_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SAAODB_4)" disabled name="SAAODB_4" id="SAAODB_4n" checked <?php if (isset($SAAODB_4) && $SAAODB_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-A: SAAODBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SAAODBOE_4)" disabled name="SAAODBOE_4" id="SAAODBOE_4y" <?php if (isset($SAAODBOE_4) && $SAAODBOE_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SAAODBOE_4)" disabled name="SAAODBOE_4" id="SAAODBOE_4n" checked <?php if (isset($SAAODBOE_4) && $SAAODBOE_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-B: LASA</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(LASA_4)" disabled name="LASA_4" id="LASA_4y" <?php if (isset($LASA_4) && $LASA_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(LASA_4)" disabled name="LASA_4" id="LASA_4n" checked <?php if (isset($LASA_4) && $LASA_4=="N") echo "checked";?>  value="N">No <i>(Applicable to UP System Level only)</i>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2: (SABUDB)</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SABUDB_4)" disabled name="SABUDB_4" id="SABUDB_4y" <?php if (isset($SABUDB_4) && $SABUDB_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SABUDB_4)" disabled name="SABUDB_4" id="SABUDB_4n" checked <?php if (isset($SABUDB_4) && $SABUDB_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2-A: SABUDBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SABUDBOE_4)" disabled name="SABUDBOE_4" id="SABUDBOE_4y" <?php if (isset($SABUDBOE_4) && $SABUDBOE_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SABUDBOE_4)" disabled name="SABUDBOE_4" id="SABUDBOE_4n" checked <?php if (isset($SABUDBOE_4) && $SABUDBOE_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 5: QRROR</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(QRROR_4)" disabled name="QRROR_4" id="QRROR_4y" <?php if (isset($QRROR_4) && $QRROR_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(QRROR_4)" disabled name="QRROR_4" id="QRROR_4n" checked <?php if (isset($QRROR_4) && $QRROR_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>ANNUAL REPORT (2015 FAR No. 3 - ADDO) SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 3: ADDO</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(ADDO_4)" disabled name="ADDO_4" id="ADDO_4y" <?php if (isset($ADDO_4) && $ADDO_4=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(ADDO_4)" disabled name="ADDO_4" id="ADDO_4n" checked <?php if (isset($ADDO_4) && $ADDO_4=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 6 Filename</div></td>
    <td width="500"><textarea name="file_name_display6" id="file_name_display6" readonly cols="50" rows="6" required><?php print $file_name_sample6; ?></textarea></td>
	<input name="file_name_sample6" hidden id="file_name_sample6" value="<?php print $file_name_sample6; ?>" />
</tr>

<tr>
	<td align="right">File 6 to upload</td>
    <td><input type="file" name="uploadFile6" id="uploadFile6" disabled required onblur="alertFilename6(uploadFile6)"></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>QUARTERLY REPORTS (2016 - 1st to 3rd quarters)</strong></div>
	</td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>FIRST QUARTER REPORTS SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">BAR No. 1: QPRO</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(QPRO_1)" disabled name="QPRO_1" id="QPRO_1y" <?php if (isset($QPRO_1) && $QPRO_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(QPRO_1)" disabled name="QPRO_1" id="QPRO_1n" checked <?php if (isset($QPRO_1) && $QPRO_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1: SAAODB</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SAAODB_1)" disabled name="SAAODB_1" id="SAAODB_1y" <?php if (isset($SAAODB_1) && $SAAODB_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SAAODB_1)" disabled name="SAAODB_1" id="SAAODB_1n" checked <?php if (isset($SAAODB_1) && $SAAODB_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-A: SAAODBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SAAODBOE_1)" disabled name="SAAODBOE_1" id="SAAODBOE_1y" <?php if (isset($SAAODBOE_1) && $SAAODBOE_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SAAODBOE_1)" disabled name="SAAODBOE_1" id="SAAODBOE_1n" checked <?php if (isset($SAAODBOE_1) && $SAAODBOE_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-B: LASA</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(LASA_1)" disabled name="LASA_1" id="LASA_1y" <?php if (isset($LASA_1) && $LASA_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(LASA_1)" disabled name="LASA_1" id="LASA_1n" checked <?php if (isset($LASA_1) && $LASA_1=="N") echo "checked";?>  value="N">No <i>(Applicable to UP System Level only)</i>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2: (SABUDB)</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SABUDB_1)" disabled name="SABUDB_1" id="SABUDB_1y" <?php if (isset($SABUDB_1) && $SABUDB_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SABUDB_1)" disabled name="SABUDB_1" id="SABUDB_1n" checked <?php if (isset($SABUDB_1) && $SABUDB_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2-A: SABUDBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SABUDBOE_1)" disabled name="SABUDBOE_1" id="SABUDBOE_1y" <?php if (isset($SABUDBOE_1) && $SABUDBOE_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SABUDBOE_1)" disabled name="SABUDBOE_1" id="SABUDBOE_1n" checked <?php if (isset($SABUDBOE_1) && $SABUDBOE_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 5: QRROR</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(QRROR_1)" disabled name="QRROR_1" id="QRROR_1y" <?php if (isset($QRROR_1) && $QRROR_1=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(QRROR_1)" disabled name="QRROR_1" id="QRROR_1n" checked <?php if (isset($QRROR_1) && $QRROR_1=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 7 Filename</div></td>
    <td width="500"><textarea name="file_name_display7" id="file_name_display7" readonly cols="50" rows="6" required><?php print $file_name_sample7; ?></textarea></td>
	<input name="file_name_sample7" hidden id="file_name_sample7" value="<?php print $file_name_sample7; ?>" />
</tr>

<tr>
	<td align="right">File 7 to upload</td>
    <td><input type="file" name="uploadFile7" id="uploadFile7" disabled required onblur="alertFilename7(uploadFile7)"></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>SECOND QUARTER REPORTS SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">BAR No. 1: QPRO</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(QPRO_2)" disabled name="QPRO_2" id="QPRO_2y" <?php if (isset($QPRO_2) && $QPRO_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(QPRO_2)" disabled name="QPRO_2" id="QPRO_2n" checked <?php if (isset($QPRO_2) && $QPRO_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1: SAAODB</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SAAODB_2)" disabled name="SAAODB_2" id="SAAODB_2y" <?php if (isset($SAAODB_2) && $SAAODB_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SAAODB_2)" disabled name="SAAODB_2" id="SAAODB_2n" checked <?php if (isset($SAAODB_2) && $SAAODB_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-A: SAAODBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SAAODBOE_2)" disabled name="SAAODBOE_2" id="SAAODBOE_2y" <?php if (isset($SAAODBOE_2) && $SAAODBOE_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SAAODBOE_2)" disabled name="SAAODBOE_2" id="SAAODBOE_2n" checked <?php if (isset($SAAODBOE_2) && $SAAODBOE_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-B: LASA</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(LASA_2)" disabled name="LASA_2" id="LASA_2y" <?php if (isset($LASA_2) && $LASA_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(LASA_2)" disabled name="LASA_2" id="LASA_2n" checked <?php if (isset($LASA_2) && $LASA_2=="N") echo "checked";?>  value="N">No <i>(Applicable to UP System Level only)</i>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2: (SABUDB)</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SABUDB_2)" disabled name="SABUDB_2" id="SABUDB_2y" <?php if (isset($SABUDB_2) && $SABUDB_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SABUDB_2)" disabled name="SABUDB_2" id="SABUDB_2n" checked <?php if (isset($SABUDB_2) && $SABUDB_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2-A: SABUDBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SABUDBOE_2)" disabled name="SABUDBOE_2" id="SABUDBOE_2y" <?php if (isset($SABUDBOE_2) && $SABUDBOE_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SABUDBOE_2)" disabled name="SABUDBOE_2" id="SABUDBOE_2n" checked <?php if (isset($SABUDBOE_2) && $SABUDBOE_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 5: QRROR</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(QRROR_2)" disabled name="QRROR_2" id="QRROR_2y" <?php if (isset($QRROR_2) && $QRROR_2=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(QRROR_2)" disabled name="QRROR_2" id="QRROR_2n" checked <?php if (isset($QRROR_2) && $QRROR_2=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 8 Filename</div></td>
    <td width="500"><textarea name="file_name_display8" id="file_name_display8" readonly cols="50" rows="6" required><?php print $file_name_sample8; ?></textarea></td>
	<input name="file_name_sample8" hidden id="file_name_sample8" value="<?php print $file_name_sample8; ?>" />
</tr>

<tr>
	<td align="right">File 8 to upload</td>
    <td><input type="file" name="uploadFile8" id="uploadFile8" disabled required onblur="alertFilename8(uploadFile8)"></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>THIRD QUARTER REPORTS SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">BAR No. 1: QPRO</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(QPRO_3)" disabled name="QPRO_3" id="QPRO_3y" <?php if (isset($QPRO_3) && $QPRO_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(QPRO_3)" disabled name="QPRO_3" id="QPRO_3n" checked <?php if (isset($QPRO_3) && $QPRO_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1: SAAODB</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SAAODB_3)" disabled name="SAAODB_3" id="SAAODB_3y" <?php if (isset($SAAODB_3) && $SAAODB_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SAAODB_3)" disabled name="SAAODB_3" id="SAAODB_3n" checked <?php if (isset($SAAODB_3) && $SAAODB_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-A: SAAODBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SAAODBOE_3)" disabled name="SAAODBOE_3" id="SAAODBOE_3y" <?php if (isset($SAAODBOE_3) && $SAAODBOE_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SAAODBOE_3)" disabled name="SAAODBOE_3" id="SAAODBOE_3n" checked <?php if (isset($SAAODBOE_3) && $SAAODBOE_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 1-B: LASA</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(LASA_3)" disabled name="LASA_3" id="LASA_3y" <?php if (isset($LASA_3) && $LASA_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(LASA_3)" disabled name="LASA_3" id="LASA_3n" checked <?php if (isset($LASA_3) && $LASA_3=="N") echo "checked";?>  value="N">No <i>(Applicable to UP System Level only)</i>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2: (SABUDB)</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SABUDB_3)" disabled name="SABUDB_3" id="SABUDB_3y" <?php if (isset($SABUDB_3) && $SABUDB_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SABUDB_3)" disabled name="SABUDB_3" id="SABUDB_3n" checked <?php if (isset($SABUDB_3) && $SABUDB_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 2-A: SABUDBOE</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(SABUDBOE_3)" disabled name="SABUDBOE_3" id="SABUDBOE_3y" <?php if (isset($SABUDBOE_3) && $SABUDBOE_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(SABUDBOE_3)" disabled name="SABUDBOE_3" id="SABUDBOE_3n" checked <?php if (isset($SABUDBOE_3) && $SABUDBOE_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">FAR No. 5: QRROR</div></td>
 	<td width="500">
    <input type="radio" onchange="choice(QRROR_3)" disabled name="QRROR_3" id="QRROR_3y" <?php if (isset($QRROR_3) && $QRROR_3=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice(QRROR_3)" disabled name="QRROR_3" id="QRROR_3n" checked <?php if (isset($QRROR_3) && $QRROR_3=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Prescribed Attachment 9 Filename</div></td>
    <td width="500"><textarea name="file_name_display9" id="file_name_display9" readonly cols="50" rows="6" required><?php print $file_name_sample9; ?></textarea></td>
	<input name="file_name_sample9" hidden id="file_name_sample9" value="<?php print $file_name_sample9; ?>" />
</tr>

<tr>
	<td align="right">File 9 to upload</td>
    <td><input type="file" name="uploadFile9" id="uploadFile9" disabled required onblur="alertFilename9(uploadFile9)"></td>
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