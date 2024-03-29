# Users
* User object

**User Table**
```
{
  "idRole" : integer
  "lastname" : "string"
  "firstname" : "string"
  "email" : "string"
  "phone" : "string"
}

```


**GET /user**
----
Retourne tout les utilisateurs
* **URL Params**
  None
* **Data Params**
  None
* **Headers**
  Content-Type: application/json
* **Success Response:**
* **Code:** 200
  **Content:**
```
{
  [
    1:
    {
      "idUtilisateur" : 1,
      "idRole": 1,
      "lastname" : "Valcke",
      "firstname" : "Mathéo",
      "email" : "matheo@free.fr",
      "phone" : "06 34 67 40 56",
      "created_at" : "2022-10-6 04:07:31",
      "update_at" : "2023-02-6 04:07:31"
    }
  ]
   [
    2:
    {
      "idUtilisateur" : 2,
      "idRole": 2,
      "lastname" : "Baude",
      "firstname" : "Emeline"
      "email" : "mimeline@gmail.com",
      "phone" : "06 35 67 43 56",
      "created_at" : "2023-12-6 04:07:31",
      "update_at" : "2024-01-5 09:37:51"
    }
  ]
  [
    3:
    {
      "idUtilisateur" : 3,
      "idRole": 3,
      "lastname" : "Soltysiak",
      "firstname" : "Clément",
      "email" : "clement@free.fr",
      "phone" : "07 81 34 96 43",
      "created_at" : "2022-09-5 10:37:51",
      "update_at" : "2023-10-5 15:45:34"
    }
  ]

}
```

**GET /user/:id**
----
Retourne des utilisateurs spécifique via leur id
* **URL Params**
  *Required:* `id=[integer]`
* **Data Params**
  None
* **Headers**
  Content-Type: application/json
  Authorization: Bearer `<OAuth Token>`
* **Success Response:**
* **Code:** 200
  **Content:**  `{ <user_object> }`
```
    {
      "idUtilisateur" : 1,
      "idRole": 1,
      "lastname" : "Valcke",
      "firstname" : "Mathéo",
      "email" : "matheo@free.fr",
      "phone" : "06 34 67 40 56",
      "created_at" : "2022-10-6 04:07:31",
      "update_at" : "2023-02-6 04:07:31"
    }
```
* **Error Response:**
    * **Code:** 404
      **Content:** `{ error : "L'utilisateur n'existe pas" }`
      OR
    * **Code:** 401
      **Content:** `{ error : error : "Vous n'êtes pas autorisé à effectuer cette action" }`


**POST /user**
----
Créer un nouvel utilisateur
* **URL Params**
  None
* **Headers**
  Content-Type: application/json
* **Data Params**
```
  {
    "idRole" : integer
    "firstname" : "string"
    "lastname" : "string"
    "email" : "string"
    "phone" : "string"
    "password" : "string"
  }
```
* **Success Response:**
* **Code:** 200
  **Content:**
```
{ reponse: "l'utilisateur à bien été créer"}
```
**PUT /user/:id**
----
Modifier un (des) attribut(s) de l'utilisateur.

* **URL Params**
  *Required:* `id=[integer]`
* **Data Params**
```
  {
    "idRole : integer
    "firstname" : "string"
    "lastname" : "string"
    "email" : "string"
    "phone" : "string"
    "password" : "string"
  }
```
None
* **Headers**
  Content-Type: application/json
  Authorization: Bearer `<OAuth Token>`
* **Success Response:**
    * **Code:** 204
      **Content:**  `{ <user_object> }`
```
    {
      "idUtilisateur" : 1,
      "idRole": 1,
      "password" : "string",
      "lastname" : "Valcke",
      "firstname" : "Mathéo",
      "email" : "matheo@free.fr",
      "phone" : "06 34 67 40 56",
      "created_at" : "2022-10-6 04:07:31",
      "update_at" : "2023-02-6 04:07:31"
    }
```
* **Error Response:**
    * **Code:** 404
      **Content:** `{ error : "L'utilisateur n'existe pas" }`
      OR
    * **Code:** 401
      **Content:** `{ error : error : "Vous n'êtes pas autorisé à faire cette requête." }`


**DELETE /users/:id**
----
Supprimer l'utilisateur.

* **URL Params**
  *Required:* `id=[integer]`
* **Data Params**
  None
* **Headers**
  Content-Type: application/json
  Authorization: Bearer `<OAuth Token>`
* **Success Response:**
    * **Code:** 204
    * **Content:**
  ```
    {
      reponse : "L'utilisateur a été supprimé"
    }
  ```
* **Error Response:**
    * **Code:** 404
      **Content:** `{ error : "L'utilisateur n'existe pas" }`
      OR
    * **Code:** 401
      **Content:** `{ error : error : "Vous n'êtes pas autorisé à faire cette requête." }`



**Get /Login**
----
Connexion

* **URL Params**
  none
* **Data Params**
```
  { "email" : "mattheo.valcke@gmail.com" , "password" : "!!Toto123!!" }
```
* **Headers**
  Content-Type: application/json
  Authorization: Bearer `<OAuth Token>`
* **Success Response:**
  * **Code:** 204
  * **Content:**
  ```
    {
        "key" : <OAuth Token>
    }
  ```

* **Error Response:**
  * **Code:** 404
    **Content:** `{ error : "L'utilisateur n'existe pas" }`
    OR
  * **Code:** 401
    **Content:** `{ error : error : "Vous n'êtes pas autorisé à faire cette requête." }`


** GET /Logout**
----
Déconnexion

* **URL Params**
  none
* **Data Params**
```
  {
    "email" : "mattheo.valcke@gmail.com",
    "password" : "!!Toto123!!"
  }
```
* **Headers**
  Content-Type: application/json
  Authorization: Bearer `<OAuth Token>`
* **Success Response:**
  * **Code:** 204
  * **Content:**
  ```
    {
        reponse : "Vous êtes déconnecté"
    }
  ```

* **Error Response:**
  * **Code:** 404
    **Content:** `{ error : "L'utilisateur n'existe pas" }`
    OR
  * **Code:** 401
    **Content:** `{ error : error : "Vous n'êtes pas autorisé à faire cette requête." }`


**POST /verifyToken**
----
Vérification du token

* **URL Params**
  none
* **Data Params**
```
  { "token" : "{le token}"}
```
* **Headers**
  Content-Type: application/json
  Authorization: Bearer `<OAuth Token>`
* **Success Response:**
  * **Code:** 204
  * **Content:**
  ```
    {
        "idUtilisateur": 1,
        "idRole": 1,
        "lastname": "User",
        "firstname": "Admin",
        "phone": "0781179643",
        "email": "mattheo.valcke@gmail.com",
        "email_verified_at": null,
        "created_at": "2024-01-23T14:32:55.000000Z",
        "updated_at": "2024-01-23T14:32:55.000000Z"
    }
  ```

* **Error Response:**
  * **Code:** 404
    **Content:** `{ error : "Le token n'existe pas" }`
    OR
  * **Code:** 401
    **Content:** `{ error : error : "Vous n'êtes pas autorisé à faire cette requête." }`

