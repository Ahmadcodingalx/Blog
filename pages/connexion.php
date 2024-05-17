
<?php
    if (isset($_COOKIE['username'])) {
        header('Location: /blog/index.php?test=true');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>connexion</title>
</head>
<body>
    <?php
        require_once '../includes/menu.php';
    ?>

    <div class="login">

        <?php
        
            if (isset($_GET['user']) && $_GET['user'] == 'unknown') {
                echo "<h2>Les identifications saisis sont incorrects. Veuillez les vérifier et réessayer !</h2>";
            }

        ?>

        <form action="/blog/processing/login.php" method="POST">

            <label for="username"> Nom d'utilisateur</label>
            <input type="text" name="username" id="username" placeholder="Saisir le nom 
            d'utilisateur ou le pseudonyme ici" minlength="5" maxlength="20" required>

            <label for="password"> Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Saisir le nom 
            d'utilisateur ou le pseudonyme ici" minlength="8" maxlength="20" required>

            <button type="submit">Se connecter</button>

            <p>Pas un compte? inscrivez-vous en cliquant <a href="/blog/pages/inscription.php?page=inscription">ici</a></p>
        </form>
    </div>

</body>
</html>