<?php
session_start();

include "./includes/common.php";
if ($_SESSION['executedAdmin'] == 'yes') {
    require './controller/getAllClothes_controller.php';
    echo json_encode( ["clothes" => $clothes]) ;

}
else{
    echo("Unauthorized Access");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON</title>
</head>
<body>
    
</body>
</html>