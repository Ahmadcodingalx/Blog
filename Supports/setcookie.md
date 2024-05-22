<!-- 
    
    17/05/2024
    15:19

    CHAT_GPT

-->


--------------------setcookie()--------------------

La fonction setcookie() en PHP est utilisée pour définir un cookie HTTP à envoyer au navigateur de l'utilisateur. 
Un cookie est un petit fichier texte stocké sur le côté client (dans le navigateur de l'utilisateur) 
qui peut être utilisé pour stocker des informations persistantes entre les sessions.

La syntaxe de base de la fonction setcookie() est la suivante :

<setcookie(nom, valeur, expiration, chemin, domaine, sécurisé, httponly);>

-nom : Le nom du cookie.
-valeur : La valeur du cookie.
-expiration : Optionnel. Le timestamp (heure Unix) à partir duquel le cookie expire. Si cette valeur est omise ou 0, le cookie expire à la fin de la session du navigateur. Vous pouvez également définir une date d'expiration spécifique en utilisant time() + (nombre de secondes).
-chemin : Optionnel. Le chemin sur le serveur pour lequel le cookie sera disponible. Par défaut, le cookie est disponible pour tous les chemins du site.
-domaine : Optionnel. Le domaine pour lequel le cookie sera disponible. Par défaut, le cookie est disponible pour le domaine actuel.
-sécurisé : Optionnel. Si défini à true, le cookie ne sera envoyé que sur une connexion HTTPS sécurisée.
-httponly : Optionnel. Si défini à true, le cookie ne sera accessible que via HTTP (et non via des scripts côté client comme JavaScript), ce qui le rend plus sécurisé contre certaines attaques.


Voici un exemple d'utilisation de setcookie() :

<setcookie("nom_utilisateur", "john_doe", time() + 3600, "/");>

Cet exemple crée un cookie nommé "nom_utilisateur" avec la valeur "john_doe" qui expirera dans une heure et sera disponible pour tous les chemins du site.

Les cookies sont souvent utilisés pour stocker des informations telles que des identifiants de session, des préférences utilisateur, des paniers d'achat, etc.


<php?  ?>
