<?php
session_name("publication"); 
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id_publication']) || $_SESSION['user_id_publication'] !== true) {

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
<?php $username = $_SESSION['user_name'];?>

<?php
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$full_name = $first_name . " " . $last_name;
?>

<?php include("header.html");?>
<?php include("menu.html");?>
<div class="commonbody">
	    <div align="left" style="font-size:25px"><strong>
		U.P. Conference Paper Presented</strong></div>
	    <div align="right" style="font-size:14px">
		<?php echo date("F d, Y");?>
        <span id="time"></span>
		<script>showTime();</script></div>
    <table width="990" height="480" border="0" cellpadding="5" cellspacing="0">
	  <tr>
       	<td width="134" valign="top" id="leftpanemenu">
		<ul id="MenuBar1" class="MenuBarVertical">
  			<li><a class="MenuBarItemSubmenu" href="#">Paper</a>
      			<ul>
              	  <a href="paper/input-paper.php" target="myFrame"><li>Input Data</li></a>              
                  <a href="paper/view-paper.php" target="myFrame"><li>View Paper</li></a>                
                  <!--<a href="paper/award-view-paper.php" target="myFrame"><li>View Awards</li></a>-->                
      			</ul>
  			</li>
		</ul>
        </td>
	    <td width="836">
           	<iframe  
                id="myFrame" name="myFrame"
                height="470" 
                width="840" 
                frameborder="0"
                style="background-color:#FFFFFF;"
                src="b2_home.php"
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
