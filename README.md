- Les imports de librairies sont fait directement depuis le serveur distant des développeurs une connexion internet est donc obligatoire.

- Le fichier config.php situé à la racine doit être complété
    $db_url -> serveur + nom de la DB
    $db_pass -> mot de passe de la DB
    $db_login -> login de la DB
    $url -> chemin complet situé avant le nom de la page dans l'url
    $clientId -> l'id du compte paypal qui recevra les paiements

  Il faut également, dans ce même fichier, ajouter le chemin complet situé avant 'index.php' dans $url

- Le fichier pluch.sql situé à la racine est un dump de la DB, le shéma de cette DB est aussi disponible (pluchDB.png)
    comptes de test déjà enregistrés dans la DB:

              login - password
              ----------------
      Admin:  admin - test
      User:   benoit - benoit
              test - test