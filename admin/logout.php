<?php 
session_start(); 
session_destroy();
setcookie('admin_logged_in', '', time() - 3600, "/");
header('Location: login.php'); 
exit; 
?>