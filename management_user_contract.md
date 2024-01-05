# Users
* User object

**User Table**
```
{
  idUtilisateur: integer
  idRole: integer
  lastname : string
  firstname: string
  email: string
  phone : string
  created_at: datetime(iso 8601)
  updated_at: datetime(iso 8601)
}

```


**GET /users**
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
      "firstname" : "Emel
      "email" : "mimeline@aigrie.fr",
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

**GET /users/:id**
----
Retourne des utilisateur spécifique via leur id
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


**POST /users**
----
Créer un nouvel utilisateur
* **URL Params**  
  None
* **Headers**  
  Content-Type: application/json
* **Data Params**
```
  {
    idUtilisateur: integer
    idRole: integer
    firstname: string
    lastname : string
    email: string
    phone : string
    created_at: datetime(iso 8601)
    updated_at: datetime(iso 8601)
  }
```
* **Success Response:**
* **Code:** 200  
  **Content:**
```
{ reponse: "l'utilisateur à bien été créer"}
```
**PUT /users/:id**
----
Modifier un (des) attribut(s) de l'utilisateur.

* **URL Params**  
  *Required:* `id=[integer]`
* **Data Params**
```
  {
    idRole: integer
    firstname: string
    lastname : string
    email: string
    phone : string
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
* **Error Response:**
    * **Code:** 404  
      **Content:** `{ error : "L'utilisateur n'existe pas" }`  
      OR
    * **Code:** 401  
      **Content:** `{ error : error : "Vous n'êtes pas autorisé à faire cette requête." }`