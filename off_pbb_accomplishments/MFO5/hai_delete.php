<?php

session_name("pbb");
session_start();

// is the one accessing this page logged in or not?
if ( !isset($_SESSION['user_id']) || !$_SESSION['user_id'])
{
	// not logged in, move to login page
	header('Location: ../login/login_mysqli.php');
	exit;
}

// confirm that the 'id' variable has been set
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
	// get the 'id' variable from the URL
	$var_id = $_GET['id'];

	// connect to the database
	include_once('../connect-db.php');
                
	// Delete record
	$stmt = $mysqli->prepare("DELETE FROM tbl_sd_5_mfo5_8_infection_rate WHERE mfo5_8_infection_rate_id = ?");

	// Bind variable to placeholder parameter ? as integer "i"
	$stmt->bind_param("i",$var_id);
	$stmt->execute();
	$stmt->close();
	$mysqli->close();
}

// if the 'id' variable isn't set, redirect the user
header("Location: hai_view_all.php");

?>