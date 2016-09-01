<?php 
session_name("scholarship"); 
session_start();
session_destroy();
header("Location: login_mysqli.php");
exit;
?>
