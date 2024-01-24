# users_management
# Installation du projet

Le miceo-service est en laravel, pour l'installer sur votre machine il vous faut :
* Vous situez dans le fichier user_management
```
  cd users_management/user_management
```
* Composer
  * Utiliser composer install pour installer le vendor avec les dépendances.
  ```
    composer install
  ```

Il est parfois nécessaire de faire un composer update pour être sûr d'avoir les dépendances.
```
composer update
```
* Créer une base de donnée du nom de laravel
* Copier le fichier .env.example et le nommer .env
```
cp .env.example .env
```

* Modification du fichier .env après la création de la BDD :
  * il vous faudra renseigner les champs :
    * DB_USERNAME pour l'identifiant d'accès a la BDD
    * DB_PASSWORD avec le mot de passe de celui-ci.

Vous pourrez ensuite générer les tables de la BDD avec la commande :
```
  php artisan migrate
```
qui utilisera les fichiers de migration présents dans database/migrations.


Remplir la table Role
```
php artisan db:seed --class=RolesTableSeeder
```
Créer un administrateur
```
php artisan db:seed --class=UsersTableSeeder
```

Pour le JWT Token ajouter la ligne au fichier .env
```
JWT_SECRET=INeIA5TyjejEFjQMySm4cU3kbZcYmMYRy4fSbzEGOnpUitubIGCU8fFhSqjVNloh
```

La commande pour générer une clé
```
php artisan key:generate
```

La commande pour lancer l'api
```
php artisan serve
```

Si vous rencontrez une erreur PHP, ouvrer le fichier php.ini sur votre machine et modifier la ligne
```
;extension=sodium
```
En ->
```
extension=sodium
```


