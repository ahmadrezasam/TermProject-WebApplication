<?php
session_start();
$_SESSION["executed"] = "no" ;
echo $_SESSION["executed"];
unset($_SESSION);
session_destroy();
header('Location: ../index.php');
die;
