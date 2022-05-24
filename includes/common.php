<?php
$user = "root";
$pass = "";
$dbName = "project";
//$dsn = "mysql:host=localhost;port=3308;dbname=$dbName";
$dsn = "mysql:host=localhost;dbname=$dbName";
try {
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo "<p>Connection Error:</p>";
    echo "<p>", $ex->getMessage(), "</p>";
    exit;
}
