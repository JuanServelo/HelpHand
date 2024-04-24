<?php
session_start();
unset($_SESSION['senha']);
unset($_SESSION['email']);  
setcookie('biscoito', '', time() - 3600);
header('Location: login.php');
exit;
?>