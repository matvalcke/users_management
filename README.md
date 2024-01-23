# users_management
Le miceo-service est en laravel, pour l'installer sur votre machine il vous faut : 
Composer
Utiliser composer install pour installer le vendor avec les dépendance
Il est parfois necessaire de faire un composer update pour etre sur d'avoir les dépendance 
Pour la BDD : dans le .env il vous faudra renseigner les champs DB_DATABASE pour le nom de la BDD, DB_USERNAME pour l'identifiant d'acces a la BDD et DB_PASSWORD avec le mot de passe de celui ci.
Vous pourrai ensuite generez les tables de la bdd avec la commande : php artisan migrate qui utilisera les fichiers de migration present dans database/migrations.
Pour remplir la base d'elements que nous avons enregistrer en utilisant la commande php artisan db:seed --class=UserSeeder pour avoir une table User avec un utilisateur

Gestion des Utilisateurs

GET http://localhost:8000/login (il faut mettre dans le body un email et un password)
GET http://localhost:8000/user/{id}
PUT http://localhost:8000/user/{id} (Spécifier les informations à modifier)
DELETE http://localhost:8000/user/{id}
GET http://localhost:8000/user
POST http://localhost:8000/user (ajouter les valeurs pour créer le client)
GET http://localhost:8000/logout
