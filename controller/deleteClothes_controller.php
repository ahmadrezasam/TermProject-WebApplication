<?php
    include '../includes/common.php';

    if (isset($_POST["id"])) {
        $id = $_POST["id"] ;
        $rs = $db->prepare("delete from clothes where id = :id") ;
        $rs->execute(["id" => $id]) ;
    }
?>