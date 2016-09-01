<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>UP System Budget Office</title>
<META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<table class="Global" cellpadding="0" cellspacing="0" border="0">
	<tr>
	<td height="118" colspan="3">
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
		<tr>
		<td width="25"><img src="topleftround.gif" width="25" height="25" alt="topleftround (1K)"></td>
		<td bgcolor="#def2fa">&nbsp;</td>
		<td width="25"><img src="toprightround.gif" width="25" height="25" alt="toprightround (1K)"></td>
		</tr>
		</table>

<!-- ============ Header section ============== -->
		<table border="0" cellspacing="0" class="Header">
		<tr>

<!-- ============ Logo ============== -->
		<td style="background: url('add-logo_4a.gif') no-repeat;" width="100%" align="left"><div style="display: table; margin-left: 20px; margin-top: 20px;"></div></td>
		<td></td>
		</tr>
		</table>

<div style="height: 1px; background: #284151;"><img src="space1x1.gif" width="1" height="1" alt="spacer"></div>

<!-- ============ Navbar Menu ============== -->
		<table class="NavBar" cellpadding="0" cellspacing="0" border="0">
			<tr><td style="color: gray;">
				<table class="NavBarMenu" cellspacing="0" border="0">
				<tr>
				<td><a href="index.html">Home</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
				<td><a href="overview.html">Overview</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
				<td><a href="objectives.html">Objectives</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
				<td><a href="collection_form.html">Data Collection Forms</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
				<td><a href="collection_procedure.html">Data Collection Procedure</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
				<td><a href="data_submission.html">Data Submission</a> &nbsp;&nbsp; | &nbsp;&nbsp;</td>
				<td><a href="uploadFiles.php">Upload Files</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
				<td><a href="statistics.html">Statistics</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
				<td><a href="contact.html">Contact Us</a></td>
				</tr>
				</table>
			</td>
			</tr>
			</table>

	</td>
	</tr>

<!-- ============ COLUMNS SECTION ============== -->

<!-- ============ Left Column ============== -->
	<tr>
	<td class="Left" width="160" align="center">

<!-- ============ Photo ============== -->
	<table class="BoxStyle" cellspacing="0" style="width: 140px;">
		<tr><td><img src="Pilipinas Kong Mahal-small.jpg" width="200" height="200"></td>
		</tr>
	</table>
	
	</td>

<!-- ============ Content Column (Middle) ============== -->
	<td class="Content Padded">

<!-- ============ Page Heading ============== -->
		<h1 class="HeadingStyle">Upload Files</h1>

<!-- ============ Begin Content ============== -->

<!-- This process moves the uploaded file to the FILES Folder which is connected to the FMO mysql database. -->
<?php

	$uploadNeed = $_POST['uploadNeed'];

// start for loop
for($x=0;
    $x<$uploadNeed;
	$x++)
	{
		$file_name = $_FILES['uploadFile'.$x]['name'];
		echo "$file_name ";

    // strip file_name of slashes
		$file_name = stripslashes($file_name);
		$file_name = str_replace("'","",$file_name);
		$path = "/var/www/wwwroot/files/";
		$ext = substr($file_name, strrpos($file_name, '.') + 1);
		$file_name = dirname($path)."/files/".$file_name;  
		 
		if (isset($ext) && $ext =="php")	  
		{
			echo " not uploaded; PHP file is not accepted.";
			$ok=0;
		}
		else
		{
			if (isset($ext) && $ext !=="doc" && $ext !=="docx" && $ext !=="xls" && $ext !=="xlsx" && $ext !=="rtf" && $ext !=="pdf")
			{
				echo " file not uploaded; file is not a DOC, DOCX, XLS, XLSX, RTF, or PDF file format.";
				$ok=0;
			}
			else
			{
				if (file_exists("$file_name"))
				{
					echo " file not uploaded; file already exists.";
					$ok=0;
				}
				else
				{
					$copy = copy($_FILES['uploadFile'. $x]['tmp_name'],$file_name);
					if($copy)
					{
						echo " file uploaded sucessfully.";
					}
					else
					{
						echo " file not uploaded; error encountered.";
						$ok=0;
					}
				}   		
			}
	    }
?>
		<br>
		<br>
<?php
	}
?>
		<br>
		<br>
		<input type="button" name="Continue" value="Next Upload" onClick="location.href='uploadFiles.php'">

<!-- ============ End Content ============== -->
	</td>

<!-- ============ Right Column ============== -->
	<td class="Right" width="10%">
	</td>
	</tr>

</table>

<!-- ============ Footer ============== -->

<table class="NavBar" cellpadding="0" cellspacing="0" border="0">
<tr>
  <td style="color: gray;">
	<table class="NavBarMenu" cellspacing="0" border="0">
    <tr>
      <td class="NavBar_f" colspan="3"><a href="http://www.up.edu.ph">UP System</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
      <td class="NavBar_f" colspan="3"><a href="http://www.upd.edu.ph"> UP Diliman</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
      <td class="NavBar_f" colspan="3"><a href="http://www.uplb.edu.ph" > UP Los Ba&ntilde;os</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
      <td class="NavBar_f" colspan="3"><a href="http://www.upm.edu.ph" > UP Manila</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
      <td class="NavBar_f" colspan="3"><a href="http://www.upv.edu.ph/" > UP Visayas</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
      <td class="NavBar_f" colspan="3"><a href="http://www.upou.edu.ph" > UP Open University</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
      <td class="NavBar_f" colspan="3"><a href="http://www.upmin.edu.ph/"> UP Mindanao</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
      <td class="NavBar_f" colspan="3"><a href="http://www.upb.edu.ph" > UP Baguio</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
      <td class="NavBar_f" colspan="3"><a href="http://www.upcebu.edu.ph" > UP Cebu</a> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
	  <td colspan="3" class="Footer" style="vertical-align: middle;">   
        <p class="style3"><font size="-2"> Copyright &copy; 2014 All Rights Reserved</font></p></td>
    </tr>
	</table>
	</td>
</tr>  
</table>
<div style="height: 1px; background: #284151;"><img src="space1x1.gif" width="1" height="1" alt="spacer"></div>

<p>&nbsp;</p>
<p>&nbsp;</p>
</body>

</html>