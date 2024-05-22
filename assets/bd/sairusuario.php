<?php
session_start();
unset($_SESSION['senha']);
unset($_SESSION['email']);
$_SESSION['logged'] = False;   
unset($_COOKIE['biscoito']);
header('Location: ../../login.php');
exit;
?>