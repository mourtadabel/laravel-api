# Documentation de l'API 

## Introduction
L'API Club permet de gérer des étudiants, leurs domaines d'étude, des clubs et les relations entre les étudiants, leurs  les clubs au sein d'une institution éducative.

## technologies utilisés : 
  Laravel 
  - URL : https://laravel.com/
## base de données : 
`MCD et MLD`
![bd-api-laravel](https://github.com/mourtadabel/laravel-api/assets/146818987/755f62c1-a7fa-437b-a0d7-6a25799e3ad6)
![sqlapi](https://github.com/mourtadabel/laravel-api/assets/146818987/fd7f7400-b5ba-457f-8824-1edcb838a5f4)

## Gestion des Étudiants

### Récupérer la liste des étudiants
- URL : `/students`
- Méthode : GET
- Description : Renvoie la liste de tous les étudiants enregistrés dans le système.
- Paramètres : Aucun
- Réponses :
  - 200 OK : Liste des étudiants récupérée avec succès.
![apistudentsget](https://github.com/mourtadabel/laravel-api/assets/146818987/c0d87c34-3e0c-4678-b611-1f4b81b4dde0)

### Ajouter un nouvel étudiant
- URL : `/students`
- Méthode : POST
- Description : Permet d'ajouter un nouvel étudiant.
- Paramètres :
  - name (obligatoire) : Nom de l'étudiant.
  - email : Adresse email de l'étudiant.
  - phone : Numéro de téléphone de l'étudiant.
  - field_id : ID du domaine d'étude de l'étudiant.
- Réponses :
  - 201 Created : Étudiant ajouté avec succès.

### Modifier un étudiant
- URL : `/students/edit/{id}`
- Méthode : PUT
- Description : Modifie les informations d'un étudiant existant.
- Paramètres :
  - id (obligatoire) : ID de l'étudiant à modifier.
  - name : Nouveau nom de l'étudiant.
  - email : Nouvelle adresse email de l'étudiant.
  - phone : Nouveau numéro de téléphone de l'étudiant.
  - field_id : Nouvel ID du domaine d'étude de l'étudiant.
- Réponses :
  - 200 OK : Étudiant modifié avec succès.
  - 404 Not Found : Étudiant non trouvé.

### Supprimer un étudiant
- URL : `/students/delete/{id}`
- Méthode : DELETE
- Description : Supprime l'étudiant avec l'ID spécifié.
- Paramètres :
  - id (obligatoire) : ID de l'étudiant à supprimer.
- Réponses :
  - 200 OK : Étudiant supprimé avec succès.
  - 404 Not Found : Étudiant non trouvé.

## Gestion des Domaines d'Étude

### Récupérer la liste des domaines d'étude
- URL : `/fields`
- Méthode : GET
- Description : Renvoie la liste de tous les domaines d'étude enregistrés dans le système.
- Paramètres : Aucun
- Réponses :
  - 200 OK : Liste des domaines d'étude récupérée avec succès.
![apifieldsget](https://github.com/mourtadabel/laravel-api/assets/146818987/55c14cb8-5491-4529-81fe-621c2ab7b978)

### Ajouter un nouveau domaine d'étude
- URL : `/fields`
- Méthode : POST
- Description : Permet d'ajouter un nouveau domaine d'étude.
- Paramètres :
  - name (obligatoire) : Nom du domaine d'étude.
  - description : Description facultative du domaine d'étude.
- Réponses :
  - 201 Created : Domaine d'étude ajouté avec succès.

### Modifier un domaine d'étude
- URL : `/fields/edit/{id}`
- Méthode : PUT
- Description : Modifie les informations d'un domaine d'étude existant.
- Paramètres :
  - id (obligatoire) : ID du domaine d'étude à modifier.
  - name : Nouveau nom du domaine d'étude.
  - description : Nouvelle description du domaine d'étude.
- Réponses :
  - 200 OK : Domaine d'étude modifié avec succès.
  - 404 Not Found : Domaine d'étude non trouvé.

### Supprimer un domaine d'étude
- URL : `/fields/delete/{id}`
- Méthode : DELETE
- Description : Supprime le domaine d'étude avec l'ID spécifié.
- Paramètres :
  - id (obligatoire) : ID du domaine d'étude à supprimer.
- Réponses :
  - 200 OK : Domaine d'étude supprimé avec succès.
  - 404 Not Found : Domaine d'étude non trouvé.

## Gestion des Clubs

### Récupérer la liste des clubs
- URL : `/clubs`
- Méthode : GET
- Description : Renvoie la liste de tous les clubs enregistrés dans le système.
- Paramètres : Aucun
- Réponses :
  - 200 OK : Liste des clubs récupérée avec succès.
![apiclubsget](https://github.com/mourtadabel/laravel-api/assets/146818987/f0f7b84f-b551-4936-9df9-7c98f4c5178d)

### Ajouter un nouveau club
- URL : `/clubs`
- Méthode : POST
- Description : Permet d'ajouter un nouveau club.
- Paramètres :
  - name (obligatoire) : Nom du club.
  - description : Description facultative
- Réponses :
  - 201 Created : Club ajouté avec succès.

### Modifier un club
- URL : `/clubs/edit/{id}`
- Méthode : PUT
- Description : Modifie les informations d'un club existant.
- Paramètres :
  - id (obligatoire) : ID du club à modifier.
  - name : Nouveau nom du club.
  - description : Nouvelle description du club.
- Réponses :
  - 200 OK : Club modifié avec succès.
  - 404 Not Found : Club non trouvé.

### Supprimer un club
- URL : `/clubs/delete/{id}`
- Méthode : DELETE
- Description : Supprime le club avec l'ID spécifié.
- Paramètres :
  - id (obligatoire) : ID du club à supprimer.
- Réponses :
  - 200 OK : Club supprimé avec succès.
  - 404 Not Found : Club non trouvé.

## Relations Étudiants-Clubs

### Ajouter un étudiant à un club
- URL : `/clubs/{club}/students`
- Méthode : POST
- Description : Ajoute un étudiant à un club.
- Paramètres :
  - student_id (obligatoire) : ID de l'étudiant à ajouter.
- Réponses :
  - 200 OK : Étudiant ajouté au club avec succès.

### Supprimer un étudiant d'un club
- URL : `/clubs/{club}/students/{student}`
- Méthode : DELETE
- Description : Supprime un étudiant d'un club.
- Paramètres :
  - student (obligatoire) : ID de l'étudiant à supprimer.
- Réponses :
  - 200 OK : Étudiant supprimé du club avec succès.

### Récupérer la liste des étudiants d'un club
- URL : `/clubs/{club}/students`
- Méthode : GET
- Description : Renvoie la liste des étudiants appartenant à un club.
- Paramètres : Aucun
- Réponses :
  - 200 OK : Liste des étudiants du club récupérée avec succès.

## Format de réponse
L'API renvoie des données au format JSON.

## Limitations et restrictions
Cette API est soumise à un quota de 1000 requêtes par heure par utilisateur.

## Support
Pour toute question ou problème, veuillez contacter mohamed@api-laravel.com
