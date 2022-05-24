<?php
session_start();

include '../includes/common.php';

$_SESSION["executed"] = "no";
$_SESSION["executedAdmin"] = "no";
$_SESSION["datetime"] = (new DateTime())->format("d/m/Y H:i:s");


try {
    $rs = $db->query("select * from user");
    $users = $rs->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    echo "<p>", $ex->getMessage(), "</p>";
}

$email = $_GET['email'];
$password = $_GET['password'];

if ($email == 'admin@admin' && $password == 12345) {
    $_SESSION["executedAdmin"] = "yes";
    if ($_SESSION["executedAdmin"]) {
        echo "<script type='text/javascript'>location.href = '../admin.php';</script>";
    } else {
        echo "<script type='text/javascript'>location.href = '../index.php';</script>";
    }
}

foreach ($users as $row) {
    if ($email == $row['email'] && $password == $row['password']) {
        $_SESSION["user_id"] = $row['id'];
        $_SESSION["executed"] = "yes";
        if (isset($_SESSION["executed"])) {
            echo "<script type='text/javascript'>location.href = '../main.php';</script>";
        } else {
            echo "<script type='text/javascript'>location.href = '../index.php';</script>";
        }        break;
    }
}

function session_save()
{
    $data = serialize($_SESSION);
    $sessid = $_COOKIE["PHPSESSID"];
    $fp = fopen("sess_$sessid", "w");
    fwrite($fp, $data);
}


function session_load()
{
    $sessid = $_COOKIE["PHPSESSID"];
    $fp = fopen("sess_$sessid", "r");
    $data = fgets($fp);
    $_SESSION = unserialize($data);
}

echo session_regenerate_id();





