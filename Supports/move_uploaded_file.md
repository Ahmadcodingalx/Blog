<!-- 
    
    21/05/2024
    09:34

    CHAT_GPT

-->


--------------------move_uploaded_file()--------------------


La fonction `move_uploaded_file()` en PHP est utilisée pour déplacer un fichier téléchargé depuis le répertoire temporaire vers un répertoire spécifié sur le serveur. Cette fonction est essentielle lors du traitement des fichiers téléchargés via un formulaire HTML.

### Syntaxe

<?php
move_uploaded_file(string $from, string $to): bool
?>

- **`$from`** : Le chemin temporaire du fichier téléchargé. Vous pouvez obtenir ce chemin en utilisant `$_FILES['input_name']['tmp_name']`.
- **`$to`** : Le chemin de destination où le fichier sera déplacé. Assurez-vous que le chemin est valide et que les permissions de fichier permettent l'écriture.

### Exemples d'utilisation

#### Formulaire HTML pour l'upload de fichiers

```html
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="uploaded_file">
    <input type="submit" value="Upload">
</form>
```

#### Script PHP pour traiter le fichier téléchargé (`upload.php`)

```php
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérifiez si un fichier a été téléchargé sans erreur
    if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['uploaded_file']['tmp_name'];
        $name = basename($_FILES['uploaded_file']['name']);
        $uploads_dir = '/path/to/uploads';

        // Déplacez le fichier téléchargé vers le répertoire de destination
        if (move_uploaded_file($tmp_name, "$uploads_dir/$name")) {
            echo "Le fichier a été téléchargé avec succès.";
        } else {
            echo "Échec du téléchargement du fichier.";
        }
    } else {
        echo "Aucun fichier n'a été téléchargé ou une erreur est survenue.";
    }
}
?>
```

### Explication

1. **Formulaire HTML** :
   - Le formulaire utilise `enctype="multipart/form-data"` pour permettre le téléchargement de fichiers.
   - L'utilisateur sélectionne un fichier et soumet le formulaire.

2. **Script PHP** :
   - Le script vérifie si la méthode de requête est `POST` pour s'assurer qu'il s'agit d'un téléchargement de fichier.
   - Il vérifie si le fichier a été téléchargé sans erreur (`$_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK`).
   - Il récupère le chemin temporaire du fichier téléchargé (`$_FILES['uploaded_file']['tmp_name']`).
   - Il utilise `basename()` pour obtenir le nom de fichier d'origine en toute sécurité.
   - Il définit le répertoire de destination où le fichier sera déplacé (`$uploads_dir`).
   - Il utilise `move_uploaded_file()` pour déplacer le fichier depuis le répertoire temporaire vers le répertoire de destination.

### Points importants

1. **Sécurité** :
   - Utilisez `basename()` pour éviter les attaques de type "directory traversal" qui pourraient permettre à un utilisateur malveillant de spécifier un chemin de fichier arbitraire.
   - Vérifiez et validez le type et la taille du fichier avant de le déplacer pour éviter les problèmes de sécurité (comme les attaques par téléchargement de fichiers malveillants).
   
   <?php
   $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
   $max_size = 2 * 1024 * 1024; // 2 MB

   if (!in_array($_FILES['uploaded_file']['type'], $allowed_types)) {
       echo "Type de fichier non autorisé.";
       exit;
   }

   if ($_FILES['uploaded_file']['size'] > $max_size) {
       echo "Fichier trop grand.";
       exit;
   }
   ?>

2. **Permissions de fichier** :
   - Assurez-vous que le répertoire de destination a les permissions nécessaires pour permettre à PHP d'y écrire des fichiers.

3. **Gestion des erreurs** :
   - Vérifiez toujours le code d'erreur (`$_FILES['uploaded_file']['error']`) pour gérer correctement les erreurs de téléchargement.
   - Utilisez des messages d'erreur clairs pour informer l'utilisateur de ce qui s'est mal passé.

En utilisant `move_uploaded_file()` correctement, vous pouvez gérer de manière sécurisée et efficace les fichiers téléchargés dans vos applications PHP.