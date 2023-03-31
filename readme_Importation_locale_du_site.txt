1)Installation du site 

Importez l'application en téléchargeant celle ci sur le dépôt du projet. Pour utiliser l'application en locale vous devez aller dans le fichier à la racine config.php et attribuer la valeur "null" à la variable $url.





2)Installation de XAMPP

Pour utiliser le site en locale vous devez disposer du système d'exploitation multiplatforme  xampp

Tout d'abord, téléchargez XAMPP à partir du site officiel : https://www.apachefriends.org/fr/index.html. Sélectionnez la version appropriée pour votre système d'exploitation et téléchargez le fichier d'installation.

Une fois le téléchargement terminé, exécutez le fichier d'installation et suivez les instructions à l'écran pour installer XAMPP sur votre système.

Une fois l'installation terminée, démarrez le panneau de contrôle XAMPP à partir du menu de démarrage de votre système. Dans le panneau de contrôle, démarrez les modules Apache et MySQL en cliquant sur les boutons "Start".

Ouvrez votre navigateur web préféré et tapez "localhost" dans la barre d'adresse. Cela devrait vous amener à la page d'accueil de XAMPP.

Pour accéder à votre site en local, placez les fichiers de votre site dans le dossier "htdocs" situé dans le répertoire d'installation de XAMPP. Vous pouvez accéder à ce dossier en cliquant sur le bouton "Explorer" dans le panneau de contrôle XAMPP et en naviguant jusqu'au dossier "htdocs".





3)Configuration de l'accès au site

Etape 1: Ajouter l'adresse IP de l'hôte local

Tout d'abord, vous devez ajouter l'adresse IP de l'hôte local (127.0.0.1) suivi du nom de domaine que vous souhaitez utiliser dans le fichier "hosts" de votre ordinateur. Par exemple, si vous souhaitez utiliser "sitefictif.localhost" comme nom de domaine pour votre site web local, ajoutez la ligne suivante au fichier "hosts": "127.0.0.1 sitefictif.localhost".

Etape 2: Configurer Apache

Ensuite, vous devez configurer Apache pour accéder à votre site web. Ouvrez le fichier "httpd-vhosts.conf" dans le dossier "conf/extra" d'Apache et ajoutez les lignes suivantes:

<VirtualHost *:80>
ServerName nom_de_l_application.localhost
DocumentRoot "chemin_vers_le_dossier_public_de_l_application"
DirectoryIndex index.php
<Directory "chemin_vers_le_dossier_public_de_l_application">
Require all granted
FallbackResource /index.php
</Directory>
</VirtualHost>

Ces lignes indiquent à Apache de servir votre site web à partir du dossier spécifié par "DocumentRoot". La directive "DirectoryIndex" spécifie la page d'accueil de votre site web et la directive "FallbackResource" redirige toutes les requêtes vers "index.php" si aucun fichier n'est trouvé.

Etape 3: Redémarrer Apache

Après avoir modifié les fichiers de configuration, vous devez redémarrer Apache pour que les modifications prennent effet. Pour cela, arrêtez puis redémarrez Apache dans le panneau de contrôle de XAMPP.


Etape 4:Installation de la base de donnée 

Ouvrez PHPMyAdmin dans votre navigateur et connectez-vous à votre serveur de base de données.

Cliquez sur "Nouvelle base de données" et donnez-lui un nom.
Cliquez sur la nouvelle base de données que vous venez de créer.
Cliquez sur "Importer" dans le menu supérieur.
Cliquez sur le bouton "Parcourir" et sélectionnez le fichier "quaiantiquebackup.sql" de sauvegarde SQL que vous avez téléchargé.
Cliquez sur le bouton "Exécuter" pour importer les données dans votre nouvelle base de données.
Après l'importation, vous devriez pouvoir accéder à vos données en naviguant dans votre nouvelle base de données.


Etape 5: Accéder au site web

Vous pouvez maintenant accéder à votre site web en ouvrant votre navigateur et en entrant l'adresse "http://nomdelapplication.localhost" dans la barre d'adresse. Vous devriez voir la page d'accueil de votre site web.





5)Gérer les administrateurs

Pour ajouter ou supprimer un administrateur connectez vous au site en tant qu'administrateur puis accédez au tableau de bord et descendez dans la section "Gérer les administreurs". Un tableau vous permet de connaitre la liste des administrateurs actuels.

Important: Les identifiants de l'admnistrateur par défaut sont dans le fichier identifiants sur le dépôt github.







