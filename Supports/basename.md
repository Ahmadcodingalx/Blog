<!-- 
    
    21/05/2024
    09:31

    CHAT_GPT

-->


--------------------basename()--------------------



La fonction `basename()` en PHP est utilisée pour retourner le nom de fichier d'un chemin de fichier. Cette fonction est très utile lorsque vous travaillez avec des chemins de fichiers et que vous avez besoin d'extraire uniquement le nom du fichier ou du répertoire final.

### Syntaxe

<?php
basename(string $path, string $suffix = ""): string
?>

- **`$path`** : Le chemin complet du fichier ou du répertoire.
- **`$suffix`** : Optionnel. Si spécifié, ce suffixe sera retiré du nom de fichier renvoyé.

### Exemples d'utilisation

#### Exemple de base

<?php
$chemin = "/var/www/html/index.php";
$nomFichier = basename($chemin);
echo $nomFichier; // Affiche "index.php"
?>

#### Utilisation avec un suffixe

Si vous souhaitez retirer une extension de fichier spécifique du nom de fichier retourné, vous pouvez utiliser le second paramètre `suffix` :

<?php
$chemin = "/var/www/html/index.php";
$nomFichierSansExtension = basename($chemin, ".php");
echo $nomFichierSansExtension; // Affiche "index"
?>

### Cas pratiques

#### Récupérer le nom du fichier à partir d'un chemin

<?php
$chemin = "/home/user/photos/image.jpg";
$nomFichier = basename($chemin);
echo $nomFichier; // Affiche "image.jpg"
?>

#### Retirer l'extension du fichier

<?php
$chemin = "/home/user/photos/image.jpg";
$nomFichierSansExtension = basename($chemin, ".jpg");
echo $nomFichierSansExtension; // Affiche "image"
?>

#### Utilisation dans le contexte d'upload de fichiers

Lorsque vous travaillez avec des fichiers téléchargés via un formulaire, vous pouvez utiliser `basename()` pour obtenir le nom de fichier original :

<?php
if (isset($_FILES['uploaded_file'])) {
    $nomFichier = basename($_FILES['uploaded_file']['name']);
    $destination = "/uploads/" . $nomFichier;

    // Déplacez le fichier téléchargé vers le répertoire de destination
    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $destination)) {
        echo "Le fichier a été téléchargé avec succès.";
    } else {
        echo "Échec du téléchargement du fichier.";
    }
}
?>

Dans cet exemple, `basename()` est utilisé pour s'assurer que seul le nom de fichier est utilisé, sans aucun chemin ajouté par l'utilisateur malveillant.

### Conclusion

La fonction `basename()` est un outil simple mais puissant pour manipuler les chemins de fichiers en PHP. Elle permet d'extraire facilement le nom de fichier ou le répertoire final d'un chemin, et peut être utilisée conjointement avec d'autres fonctions de manipulation de fichiers pour gérer efficacement les fichiers dans vos applications PHP.