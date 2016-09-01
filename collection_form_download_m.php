<?php
include_once("connectdb.php");
?>

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
		<h1 class="HeadingStyle">UP Manila Data Collection Forms</h1>
		<p>Click the links below to download the forms:</p>
<!-- ============ Begin Content ============== -->
		<?php
			$result=mysql_query("select * from wpc_downloads where recampcd='M' order by active desc, form_id asc, unit asc, department asc");
			$count=mysql_num_rows($result);				
		?>    
		<form id="form1" name="form1" method="post" action="">
		<table border="0" cellpadding="3" cellspacing="1" > 
            <tr>
			    <th width="73" height="30" scope="col" ><div align="center">Form No.</div></th>
			    <th width="287" height="30" scope="col" ><div align="center">Form Name</div></th>
				<th width="238" height="30" scope="col" ><div align="center">Unit</div></th>
				<th width="238" height="30" scope="col" ><div align="center">Department</div></th>
				<th width="238" height="30" scope="col" ><div align="center">Collection Period</div></th>
			</tr>
			<?php
                while ($row=mysql_fetch_array($result)){
						
            ?>
			<tr>	
			    <td align="center"><?=$row['form_id']?></td>
				<td>
				<?php
					$active=$row['active'];
					$filename=$row['filename'];
					// echo $active . " " . $filename;
					if($active=="Y")
						echo "<a href= \"files/" . $filename . "\" target=\"_blank\">" . $filename;
					else
						echo $filename;
				?>				
				</td>
				<td><?=$row['unit']?></td>
				<td><?=$row['department']?></td>
	            <td><?=$row['collection_period']?></td>						
            </tr>  	
			
		   <?php
            }
			mysql_close();
           ?>	
		</table>
		</form>
		<br>
		<input type="button" name="Back" value="Back" onClick="location.href='collection_form.html'">

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
