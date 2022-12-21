<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('$pws5d', '', time() -3600);
setcookie('$ssl', '', time() -3600);
echo "<script>alert('berhasil logout!')</script>";
            Echo "<script>window.location.replace('login.php')</script>";
// header("Location: login.php");
exit;
?>