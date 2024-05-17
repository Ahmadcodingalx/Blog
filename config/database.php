<?php

    $db_name = "blog";
    $server_name = "127.0.0.1";
    $username = "root";
    $password = "";

    try {
        $myPDO = new PDO("mysql:host=$server_name; dbname=$db_name; charset=utf8; port=3306". $password, $username);
        $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        echo"Erreur :" .$e->getMessage();
    }

?> 