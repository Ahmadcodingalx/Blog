
<?php
    if (isset($_COOKIE['username'])) {
        header('Location: /blog/index.php?test=true');
    }
?>

<!DOCTYPE  >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>inscripton</title>
</head>
<body>
    <?php 
       require_once '../includes/menu.php';
    ?>
    <div class="signin">
        <?php 
            if(isset($_GET['email']) && $_GET['email'] == 'error') {
                echo "<h2>Email invaluide. Veuillez saisir entre 5 et 50 caractères.</h2>";
            }
            if(isset($_GET['password']) && $_GET['password'] == 'error') {
                echo "<h2>Les mots de passes saisis ne concordent pas.Veuillez les vérifier</h2>";
            }
        ?>
        <form action="/blog/processing/authentification.php" method="POST">
            <label for="email">Adresse Email</label>
            <input type="email" name="email" id="email" placeholder="Saisir votre Adresse
            email" required>

            <label for="username"> Nom d'utilisateur</label>
            <input type="text"name="username" id="username" placeholder="Saisir le nom 
            d'utilisateur ou le pseudonyme ici" minlength="5" maxlength="20" required>

            <label for="password"> Mot de passe</label>
            <input type="password"name="password" id="password" placeholder="Saisir le nom 
            d'utilisateur ou le pseudonyme ici" minlength="8" maxlength="20" required>

            <label for="comfirmation">Comfirmation de mot de passe</label>
            <input type="comfirmation"name="comfirmation" id="comfirmation" placeholder="Saisir le nom 
            d'utilisateur ou le pseudonyme ici" minlength="8" maxlength="20" required>

            <button type="submit">S'inscrire</button>

            <p>Déja un compte? connectez-vous en cliquant <a href="/blog/pages/connexion.php?page=connexion">ici</a></p>
        </form>
    </div>
</body>
</html>