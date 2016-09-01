<?php 
session_name("pbb");
session_start();
session_destroy();
header("Location: login_mysqli.php");
exit;
?>
