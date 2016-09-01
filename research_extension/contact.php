<?php
session_name("research_extension");
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

// not logged in, move to login page

header('Location: login/login_mysqli.php');

exit;

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>U.P. System Budget Office</title>
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<link rel="shortcut icon" href="images/UPStar-small.ico"/>
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
</head>
<body>
<center>
<?php include("header.html");?>
<?php include("menu.html");?>
<div class="commonbody">
<div align="left" style="font-size:25px">
<strong>U.P. System Budget Office</strong></div>
	    <div align="right" style="font-size:14px">
		<?php echo date("F d, Y");?>
        <span id="time"></span>
		<script>showTime();</script></div>
</div>
<div class="contactbody">
<table>
<tr>
<td>
<strong>Planning and Services Division</strong><br />
Room 425<br />
4th Floor National Engineering Center<br />
University of the Philippines<br />
Diliman, Quezon City<br />
Philippines, 1101<br /><br />

<strong>Telephone Number</strong><br />
(632) 981-8500 local 3025 to 3028<br />
(632) 928-8615<br /><br />

<strong>Fax Number</strong><br />
(632) 928-4493<br /><br />

<strong>Email Address</strong><br />
<a href="mailto:sysbudget@up.edu.ph">sysbudget@up.edu.ph</a><br />
</td>
<td>
<img src="images/Star.jpg" width="690" height="464"/></td>
</td>
</tr>
</table>
</div>

<?php include("footer.html");?>
</center>
</body>
</html>
