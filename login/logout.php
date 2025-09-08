<?php
session_start();

// Clear authentication token cookie
setcookie('auth_token', '', time() - 3600, "/");

session_destroy();
header("Location: login.php");
exit();
?>
