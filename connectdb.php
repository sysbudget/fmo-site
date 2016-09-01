<?php
// Connection codes with database selection.
$host="localhost";
$user="fmo_web";
$password="upsbo425";
$link = mysql_connect($host,$user,$password);
$e=mysql_select_db("fmo",$link) or die("Can not connect DB"); // select database "fmo" to use.

// You can put or die(); after mysql_connect() and mysql_select_db()

?>