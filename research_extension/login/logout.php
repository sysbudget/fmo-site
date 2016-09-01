<?php 
session_name("research_extension");
session_start();
session_destroy();
header("Location: login_mysqli.php");
exit;
?>
