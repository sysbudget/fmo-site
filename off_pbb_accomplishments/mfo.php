<?php
session_name("pbb");
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id']) || !$_SESSION['user_id'])
{
	// not logged in, move to login page
	header('Location: login/login_mysqli.php');
	exit;
}

// connect to the database
	include('connect-db.php');

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
$mysqli->set_charset("utf8");

//Return an error if we have connection issues
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}
// get the id from the session
	$unit_contributor_id = $_SESSION['unit_contributor_id'];

$query = "SELECT unit_contributor_id, unit_delivery_id, focal_person_id, cu_id, cu_short_name, unit_delivery_name_cu, unit_contributor_name, unit_contributor_personnel_count, unit_contributor_mfo_1, unit_contributor_mfo_2, unit_contributor_mfo_3, unit_contributor_mfo_4, unit_contributor_mfo_5, unit_contributor_sto, unit_contributor_gass, unit_contributor_gass_ab, unit_contributor_gass_cd, a_startDate, a_cutOffDate_contributor FROM tbl_units_contributor WHERE unit_contributor_id = " . $unit_contributor_id;

$record_set = $mysqli->query($query);
$row = $record_set->fetch_assoc();

//Extract fields.
	$unit_delivery_id = $row['unit_delivery_id'];
	$focal_person_id = $row['focal_person_id'];
	$cu_id = $row['cu_id'];
	$cu_short_name = $row['cu_short_name'];
	$unit_delivery_name_cu = $row['unit_delivery_name_cu'];
	$unit_contributor_name = $row['unit_contributor_name'];
	$unit_contributor_personnel_count = $row['unit_contributor_personnel_count'];
	$unit_contributor_mfo_1 = $row['unit_contributor_mfo_1'];
	$unit_contributor_mfo_2 = $row['unit_contributor_mfo_2'];
	$unit_contributor_mfo_3 = $row['unit_contributor_mfo_3'];
	$unit_contributor_mfo_4 = $row['unit_contributor_mfo_4'];
	$unit_contributor_mfo_5 = $row['unit_contributor_mfo_5'];
	$unit_contributor_sto = $row['unit_contributor_sto'];
	$unit_contributor_gass = $row['unit_contributor_gass'];
	$unit_contributor_gass_ab = $row['unit_contributor_gass_ab'];
	$unit_contributor_gass_cd = $row['unit_contributor_gass_cd'];
	$a_startDate = strtotime($row['a_startDate']);
	$a_cutOffDate_contributor = strtotime($row['a_cutOffDate_contributor']);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>U.P. System Budget Office</title>
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<link rel="shortcut icon" href="images/UPStar-small.ico"/>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script>
function showTime() {
	var h=0,m=0,s=0;
	var mydate = new Date();
	h = mydate.getHours();
	m = mydate.getMinutes();
	s = mydate.getSeconds();
	if (m<10) m="0"+m;
	if (s<10) s="0"+s;
	document.getElementById("time").innerHTML = h + ":" + m + ":" + s;
	setTimeout("showTime()", 1000);
}
</script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />

</head>
<body>
<center>
<?php include("header.html");?>
<?php include("menu.html");?>
<div class="commonbody">
	    <div align="left" style="font-size:25px"><strong>
		U.P. Performance-Based Bonus Accomplishments</strong></div>
	    <div align="right" style="font-size:14px">
		<?php echo date("F d, Y");?>
        <span id="time"></span>
		<script>showTime();</script></div>
    <table width="990" height="480" border="0" cellpadding="5" cellspacing="0">
	  <tr>
       	<td width="134" valign="top" id="leftpanemenu">
		<ul id="MenuBar1" class="MenuBarVertical">

<?php 
$today = "";
$allowed = "";
$today = date("Ymd",time());
$start = date("Ymd", $a_startDate);
$cut_off = date("Ymd", $a_cutOffDate_contributor);
if (($today >= $start) && ($today <= $cut_off)){
	$allowed = "Y";
	}

if ($allowed == "Y") {
	if ($unit_contributor_mfo_1 == "Y") {
echo  			'<li><a class="MenuBarItemSubmenu" href="#">MFO 1</a>';
echo      			'<ul>';
echo                  '<a href="MFO1/ugradprog_view_per_page.php?page=1" target="myFrame"><li>UNDERGRADUATE DEGREE PROGRAM</li></a>';
echo                  '<a href="MFO1/prc_view_per_page.php?page=1" target="myFrame"><li>PRC Licensure Examination</li></a>';
echo				  '<a href="MFO1/ugradprogaccredit_view_per_page.php?page=1" target="myFrame"><li>Program Accreditation</li></a>';
echo                '</ul>';
echo  			'</li>';
	}

	if ($unit_contributor_mfo_2 == "Y") {
echo  			'<li><a class="MenuBarItemSubmenu" href="#">MFO 2</a>';
echo      			'<ul>';
echo                  '<a href="MFO2/gradprog_view_per_page.php?page=1" target="myFrame"><li>GRADUATE DEGREE PROGRAM</li></a>';
echo                  '<a href="MFO2/gradprogemploy_view_per_page.php?page=1" target="myFrame"><li>Employment Status Improvement</li></a>';
echo				  '<a href="MFO2/gradprogtimely_view_per_page.php?page=1" target="myFrame"><li>Timeliness of <br/>Education Service Delivery</li></a>';
echo                '</ul>';
echo  			'</li>';
	}

	if ($unit_contributor_mfo_3 == "Y") {
echo  			'<li><a class="MenuBarItemSubmenu" href="#">MFO 3</a>';
echo      			'<ul>';
echo                  '<a href="MFO3/research_view_per_page.php?page=1" target="myFrame"><li>RESEARCH PROJECT</li></a>';
echo                  '<a href="MFO3/presented_view_per_page.php?page=1" target="myFrame"><li>Paper Presentation</li></a>';
echo                  '<a href="MFO3/publication_view_per_page.php?page=1" target="myFrame"><li>Publication</li></a>';
echo                  '<a href="MFO3/patent_view_per_page.php?page=1" target="myFrame"><li>Patenting</li></a>';
echo                '</ul>';
echo  			'</li>';
	}

	if ($unit_contributor_mfo_4 == "Y") {
echo  			'<li><a class="MenuBarItemSubmenu" href="#">MFO 4</a>';
echo      			'<ul>';
echo                  '<a href="MFO4/training_view_per_page.php?page=1" target="myFrame"><li>Training</li></a>';
echo                  '<a href="MFO4/advisory_view_per_page.php?page=1" target="myFrame"><li>Advisory Service</li></a>';
echo                '</ul>';
echo  			'</li>';
	}

	if ($unit_contributor_mfo_5 == "Y") {
echo  			'<li><a class="MenuBarItemSubmenu" href="#">MFO 5</a>';
echo      			'<ul>';
echo                  '<a href="MFO5/in-outpatients_view_per_page.php?page=1" target="myFrame"><li>In-Patient and Out-Patient Care</li></a>';
echo                  '<a href="MFO5/surgery_view_per_page.php?page=1" target="myFrame"><li>Surgical Operations</li></a>';
echo				  '<a href="MFO5/bedoccupancy_view_per_page.php?page=1" target="myFrame"><li>Bed Occupancy Rates</li></a>';
echo				  '<a href="MFO5/deathrates_view_per_page.php?page=1" target="myFrame"><li>In-Patient Net Death Rates</li></a>';
echo				  '<a href="MFO5/pssurvey_view_per_page.php?page=1" target="myFrame"><li>Patient Satisfaction Survey</li></a>';
echo				  '<a href="MFO5/hai_view_per_page.php?page=1" target="myFrame"><li>Hospital-Acquired Infection Rates</li></a>';
echo				  '<a href="MFO5/re-admit_view_per_page.php?page=1" target="myFrame"><li>Mental & Drug Rehab Readmission Rates</li></a>';
echo                '</ul>';
echo  			'</li>';
	}

	if ($unit_contributor_sto == "Y") {
echo  			'<li><a class="MenuBarItemSubmenu" href="#">STO</a>';
echo      			'<ul>';
echo                  '<a href="STO/sto_forma_view_per_page.php?page=1" target="myFrame"><li>Service Satisfaction Survey</li></a>';
echo                  '<a href="STO/sto_formb1_view_per_page.php?page=1" target="myFrame"><li>International QMS Certificate</li></a>';
echo                  '<a href="STO/sto_formb2_view_per_page.php?page=1" target="myFrame"><li>ISO-aligned QMS Documentation</li></a>';
echo                '</ul>';
echo  			'</li>';
	}

	if ($unit_contributor_gass == "Y"){
echo  			'<li><a class="MenuBarItemSubmenu" href="#">GASS</a>';
echo      			'<ul>';
		if ($unit_contributor_gass_ab == "Y") {
echo                  '<a href="GASS/obur_view_per_page.php?page=1" target="myFrame"><li>OBUR</li></a>';
echo                  '<a href="GASS/dbur_view_per_page.php?page=1" target="myFrame"><li>DBUR</li></a>';
echo                  '<a href="GASS/bfar_view_per_page.php?page=1" target="myFrame"><li>BFAR</li></a>';
echo                  '<a href="GASS/ageing_pfm_view_per_page.php?page=1" target="myFrame"><li>Ageing Cash Advance and PFM Report</li></a>';
		}
		if ($unit_contributor_gass_cd == "Y") 
		{
echo                  '<a href="GASS/apcpi_app_view_per_page.php?page=1" target="myFrame"><li>APCPI and APP Report</li></a>';
		}		
echo                '</ul>';
echo  			'</li>';
	}
}
else
{
$s = date("m/d/Y",$a_startDate);
$c = date("m/d/Y", $a_cutOffDate_contributor);
echo "Menu available ";
echo "from ";
echo $s;
echo " to&nbsp&nbsp&nbsp&nbsp&nbsp ";
echo $c;

}
mysqli_close($mysqli);
?>

		</ul>
        </td>
 
     <td width="836">
       	  <iframe  
                id="myFrame" name="myFrame"
                height="470" 
                width="840" 
                frameborder="0"
                style="background-color:#FFFFFF;"
                src="mfo_home.php"
                ></iframe>
            </td>
      </tr>
	</table>
</div>
<?php include("footer.html");?>
</center>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>