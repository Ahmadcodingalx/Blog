<?php

    require ("../config/database.php");

    $title = $_POST['title'];
    $file_name = basename($_FILES["file"]["name"]);
    $short_description = $_POST['short_description'];
    $long_description = $_POST['long_description'];
    $user_id = $_COOKIE['id'];

    if (isset($title) && isset($short_description)) {
        move_uploaded_file($_FILES['file']['tmp_name'], "../assets/db/files" . $file_name);
        $req = $myPDO->query("INSERT INTO articles(title, short_description, long_description, file_name, user_id) VALUES (\"$title\", \"$short_description\", \"$long_description\", \"$file_name\", $user_id);");
        $req->fetch();
        header("Location: ../");
        exit();
    }

?>