<?php
try {
    $rs = $db->query("select * from clothes");
    $clothes = $rs->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    echo "<p>", $ex->getMessage(), "</p>";
}
