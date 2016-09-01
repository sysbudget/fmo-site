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
<strong>U.P. Performance-Based Bonus Accomplishments</strong></div>
	    <div align="right" style="font-size:14px">
		<?php echo date("F d, Y");?>
        <span id="time"></span>
		<script>showTime();</script></div>
</div>
<div class="aboutbody">
<h3>under construction...</h3>
</div>
<?php include("footer.html");?>
</center>
</body>
</html>
