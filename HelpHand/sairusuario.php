<?php
session_start();    
setcookie('biscoito', '', 0);
header('Location: /localhost/HelpHand/login.php');
exit;