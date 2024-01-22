# users_management
Gestion des Utilisateurs

GET http://localhost:8000/login (il faut mettre dans le body un email et un password)
GET http://localhost:8000/user/{id}
PUT http://localhost:8000/user/{id} (Spécifier les informations à modifier)
DELETE http://localhost:8000/user/{id}
GET http://localhost:8000/user
POST http://localhost:8000/user (ajouter les valeurs pour créer le client)
GET http://localhost:8000/logout