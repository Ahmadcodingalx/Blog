


<!-- 
    
    21/05/2024
    09:38

    CHAT_GPT

-->


--------------------query--------------------








En PHP, une "query" fait souvent référence à une requête SQL envoyée à une base de données. Vous pouvez exécuter des requêtes SQL en utilisant des extensions PHP comme **PDO** (PHP Data Objects) ou **mysqli**.

Voici comment utiliser ces deux extensions pour effectuer des requêtes SQL.

### Utilisation de PDO

PDO est une interface permettant d'accéder à diverses bases de données en utilisant une même API. Voici comment exécuter une requête SQL avec PDO.

#### Connexion à la base de données

```php
<?php
try {
    $dsn = 'mysql:host=localhost;dbname=testdb;charset=utf8';
    $username = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    $pdo = new PDO($dsn, $username, $password, $options);
    echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
```

#### Exécution d'une requête SELECT

```php
<?php
try {
    $stmt = $pdo->query("SELECT * FROM users");

    while ($row = $stmt->fetch()) {
        echo $row['name'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
}
?>
```

#### Requête préparée pour éviter les injections SQL

```php
<?php
try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => 1]);

    $user = $stmt->fetch();
    if ($user) {
        echo $user['name'];
    } else {
        echo "Utilisateur non trouvé.";
    }
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution de la requête préparée : " . $e->getMessage();
}
?>
```

### Utilisation de MySQLi

MySQLi est une extension spécifique à MySQL. Vous pouvez l'utiliser en mode procédural ou orienté objet.

#### Mode procédural

##### Connexion à la base de données

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}
?>
```

##### Exécution d'une requête SELECT

```php
<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Nom: " . $row["name"]. "<br>";
    }
} else {
    echo "0 résultats";
}

mysqli_close($conn);
?>
```

##### Requête préparée pour éviter les injections SQL

```php
<?php
$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
$id = 1;
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if ($user) {
    echo "Nom: " . $user['name'];
} else {
    echo "Utilisateur non trouvé.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
```

### Choisir entre PDO et MySQLi

- **PDO** : Plus flexible, supporte plusieurs bases de données (MySQL, PostgreSQL, SQLite, etc.).
- **MySQLi** : Spécifique à MySQL, peut être légèrement plus rapide pour des applications spécifiques à MySQL.

### Points importants

1. **Prévention des injections SQL** : Toujours utiliser des requêtes préparées pour éviter les injections SQL.
2. **Gestion des erreurs** : Gérer les exceptions et les erreurs pour éviter que des informations sensibles soient exposées.
3. **Connexion sécurisée** : Utiliser des options de connexion sécurisées (comme les mots de passe) et des connexions SSL/TLS si possible.

En utilisant ces techniques, vous pouvez exécuter des requêtes SQL de manière sécurisée et efficace dans vos applications PHP.