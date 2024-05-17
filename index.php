<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php
        require_once './includes/menu.php'
    ?>

    <?php
        
        if (isset($_GET['test']) && $_GET['test'] == 'true') {
            echo "<h2>Les identifications saisis sont incorrects. Veuillez les vérifier et réessayer !</h2>";
        }

    ?>
</body>
</html>