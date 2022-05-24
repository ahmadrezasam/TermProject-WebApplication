<?php
session_start();

include "../includes/common.php";

if ($_SESSION['executedAdmin'] == 'yes') {
    require './getAllClothes_controller.php';
    echo json_encode( ["clothes" => $clothes]) ;

}
else{
    echo("Unauthorized Access");
    exit;
}
?>