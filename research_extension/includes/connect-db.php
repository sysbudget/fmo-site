<?php
// server info
$server = 'localhost';
$user = 'db_res_ext';
$pass = 'sysbudoff425';
$db = 'db_research_extension';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
$mysqli->set_charset("utf8");
//Return an error if we have connection issues
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}
// show errors (remove this line if on a live site)
mysqli_report(MYSQLI_REPORT_ERROR);

?>