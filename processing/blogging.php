<?php

    require ("../config/database.php");

    $title = $_POST['title'];

    $file_name = basename($_FILES["file"]["name"]);
    //La fonction basename() en PHP est utilisée pour retourner le nom de fichier d'un chemin de fichier. Cette fonction est très utile lorsque vous travaillez avec des chemins de fichiers et que vous avez besoin d'extraire uniquement le nom du fichier ou du répertoire final.

    $short_description = $_POST['short_description'];
    $long_description = $_POST['long_description'];
    $user_id = $_COOKIE['id'];

    if (isset($title) && isset($short_description)) {

        move_uploaded_file($_FILES['file']['tmp_name'], "../assets/db/files" . $file_name);
        //La fonction `move_uploaded_file()` en PHP est utilisée pour déplacer un fichier téléchargé depuis le répertoire temporaire vers un répertoire spécifié sur le serveur. Cette fonction est essentielle lors du traitement des fichiers téléchargés via un formulaire HTML.

        $req = $myPDO->query("INSERT INTO articles(title, short_description, long_description, file_name, user_id) VALUES (\"$title\", \"$short_description\", \"$long_description\", \"$file_name\", $user_id);");
        //En PHP, une "query" fait souvent référence à une requête SQL envoyée à une base de données. Vous pouvez exécuter des requêtes SQL en utilisant des extensions PHP comme PDO (PHP Data Objects) ou mysqli.

        $req->fetch();

        header("Location: ../");
        exit();
    }

?>