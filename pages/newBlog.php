

<?php

    if (!isset($_COOKIE['username'])) {
        header('Location: /blog/pages/connexion.php?page=connexion');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/summernote/summernote-lite.min.css" rel="stylesheet">
</head>
<body>
    <?php
        require_once '../includes/menu.php'
    ?>

    <div class="article">
        <form action="../processing/blogging.php" method="POST" enctype="multipart/form-data">
            <label for="title">Saisir le titre de l'article</label>
            <input type="text" name="title" id="title" required>

            <label for="title">Saisir une brève description de l'article</label>
            <textarea name="short_description" id="short_description" placeholder="Saisir une brève description de l'article" required></textarea>

            <label for="title">Saisir le message</label>
            <textarea name="long_description" id="long_description" placeholder="Saisir le message" required></textarea>

            <label for="file">Joindre un fichier</label>
            <input type="file" name="file" id="file">

            <button type="submit">Soumettre</button>
            <button type="reset">Annuler</button>
        </form>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  OU celui du bas (en locale)-->
    <script src="../assets/jquery.js"></script>
    <script src="../assets/summernote/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#long_description').summernote({
                height : 250,
            });
        })
    </script>

</body>
</html>