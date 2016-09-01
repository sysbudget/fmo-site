<?php 
session_name("academic");
session_start();
session_destroy();
header("Location: login_mysqli.php");
exit;
?>
