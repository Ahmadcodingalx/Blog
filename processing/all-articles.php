<?php
    require ("../config/database.php");

    $request = $myPDO->query("SELECT * FROM articles ORDER BY id DESC;");

?>