- Les imports de librairies sont fait directement depuis le serveur distant des développeurs une connexion internet est donc obligatoire.

- Le fichier config.php situé dans le dossier ressources doit être complété avec les paramètres utilisés pour la DB;
    $db_url -> serveur + nom de la DB
    $db_pass -> mot de passe de la DB
    $db_login -> login de la DB

  Il faut également, dans ce même fichier, ajouter le chemin complet situé avant 'index.php' dans $url

- Le fichier pluch.sql situé à la racine est un dump de la DB, le shéma de cette DB est aussi disponible (pluchDB.jpg)
