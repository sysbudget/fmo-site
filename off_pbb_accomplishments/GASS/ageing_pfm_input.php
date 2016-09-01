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

	if (document.getElementById("cash_advance_y").checked) {
   		document.getElementById("uploadFile1").disabled = false;
	}
	else

	{
   		document.getElementById("uploadFile1").disabled = true;
	}
}
</script>
<script type="text/javascript" language="JavaScript">
function choice2()
{

	if (document.getElementById("fin_position_y").checked || document.getElementById("fin_performance_y").checked || document.getElementById("net_asset_y").checked || document.getElementById("cash_flows_y").checked || document.getElementById("actual_amounts_y").checked || document.getElementById("notes_to_financial_y").checked)  {
   		document.getElementById("uploadFile2").disabled = false;
	}
	else
	{
   		document.getElementById("uploadFile2").disabled = true;
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
function validateForm()
{

	if (document.getElementById("uploadFile1").disabled == true){ var f1 = 0; }
	if (document.getElementById("uploadFile2").disabled == true){ var f2 = 0; }
	
	var ctr = 1 * (f1 + f2)		

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
<h2>GASS B2: Report on Ageing of Cash Advance and GASS B3: COA Financial Reports - Input Form</h2>
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

	$file_name_sample1 = "gass_formb2_cash_advance_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample1 = strtolower($file_name_sample1);
	$file_name_sample1 = preg_replace('/\s+/', '', $file_name_sample1);

	$file_name_sample2 = "gass_formb3_coa_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
	$file_name_sample2 = strtolower($file_name_sample2);
	$file_name_sample2 = preg_replace('/\s+/', '', $file_name_sample2);

?>

<!-- Edit form here -->
<form name="inputForm" action="ageing_pfm_insert.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
<table>

<tr>
   	<td width="155"><div align="right">
	<strong>IMPORTANT REMINDER:</strong></div>
	</td>
    
    <td colspan="2" scope="row"><div align="left">
The "Yes" response means the report is compliant to Public Financial Management reporting requirements of the COA and the DBM in accordance with the prescribed content and period of submission under existing laws, rules and regulations. 
	</div></td>
</tr>

<tr>
    <td width="155"><div align="right"><strong>GASS B2: REPORT ON AGEING OF CASH ADVANCES SUBMITTED</strong></div></td>
 	<td width="500">
    <input type="radio" onchange="choice1(cash_advance)" name="cash_advance" id="cash_advance_y" <?php if (isset($cash_advance) && $cash_advance=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice1(cash_advance)" name="cash_advance" id="cash_advance_n" checked <?php if (isset($cash_advance) && $cash_advance=="N") echo "checked";?>  value="N">No
	</td>
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
        <i>(Copy the above prescribed filename to upload the PDF copy of acknowledgement receipt of submission)</i><br/></div>
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
   	<td width="155"><div align="right">
	<strong>GASS B3: COA FINANCIAL REPORTS SUBMITTED:</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Statement of Financial Position</div></td>
 	<td width="500">
    <input type="radio" onchange="choice2(fin_position)" name="fin_position" id="fin_position_y" <?php if (isset($fin_position) && $fin_position=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice2(fin_position)" name="fin_position" id="fin_position_n" checked <?php if (isset($fin_position) && $fin_position=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Statement of Financial Performance</div></td>
 	<td width="500">
    <input type="radio" onchange="choice2(fin_performance)" name="fin_performance" id="fin_performance_y" <?php if (isset($fin_performance) && $fin_performance=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice2(fin_performance)" name="fin_performance" id="fin_performance_n" checked <?php if (isset($fin_performance) && $fin_performance=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Statement of Changes in Net Assets/Equity</div></td>
 	<td width="500">
    <input type="radio" onchange="choice2(net_asset)" name="net_asset" id="net_asset_y" <?php if (isset($net_asset) && $net_asset=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice2(net_asset)" name="net_asset" id="net_asset_n" checked <?php if (isset($net_asset) && $net_asset=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Statement of Cash Flows</div></td>
 	<td width="500">
    <input type="radio" onchange="choice2(cash_flows)" name="cash_flows" id="cash_flows_y" <?php if (isset($cash_flows) && $cash_flows=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice2(cash_flows)" name="cash_flows" id="cash_flows_n" checked <?php if (isset($cash_flows) && $cash_flows=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Statement of Comparison of Budget and Actual Amounts</div></td>
 	<td width="500">
    <input type="radio" onchange="choice2(actual_amounts)" name="actual_amounts" id="actual_amounts_y" <?php if (isset($actual_amounts) && $actual_amounts=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice2(actual_amounts)" name="actual_amounts" id="actual_amounts_n" checked <?php if (isset($actual_amounts) && $actual_amounts=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Notes to Financial Statements</div></td>
 	<td width="500">
    <input type="radio" onchange="choice2(notes_to_financial)" name="notes_to_financial" id="notes_to_financial_y" <?php if (isset($notes_to_financial) && $notes_to_financial=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" onchange="choice2(notes_to_financial)" name="notes_to_financial" id="notes_to_financial_n" checked <?php if (isset($notes_to_financial) && $notes_to_financial=="N") echo "checked";?>  value="N">No
	</td>
</tr>

    <td width="155"><div align="right">Prescribed Attachment 2 Filename</div></td>
    <td width="500"><textarea name="file_name_display2" id="file_name_display2" readonly cols="50" rows="6" required><?php print $file_name_sample2; ?></textarea></td>
	<input name="file_name_sample2" hidden id="file_name_sample2" value="<?php print $file_name_sample2; ?>" />
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Copy the above prescribed filename to upload the PDF copy of acknowledgement receipt of complete set submission)</i><br/></div>
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