<?php 
session_name("publication"); 
session_start();
session_destroy();
header("Location: login_mysqli.php");
exit;
?>
