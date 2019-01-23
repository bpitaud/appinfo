# appinfo
APP

Manuel de déploiement 

télécharger le serveur localhost xamp 
télécharger le zip appinfo et le mettre dans le dossier de xamp pour accéder à l'APP en local 

Pour l'envoi de mail : 
composer install 
puis installer swiftmailer (librairie d'envoi de mail)

Pour installer la base de données sur phpmyadmin : 
A partir du localhost, ouvrir PHPmyAdmin. 
Créer une nouvelle base de données et la nommer "domisep". 
Importer la base de données depuis appinfo > database > maindatabase.sql 

Pour connecter la base de données : 
aller dans Models > database.php 
sur xamp , écrire $password = ""; et $servername;dbname=domisep".

Le site Domisep est alors utilisable sur le localhost. 