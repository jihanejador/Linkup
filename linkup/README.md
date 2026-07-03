# LinkUp

## Description

LinkUp est une application web développée avec Laravel qui reproduit les fonctionnalités de base d'un réseau social professionnel inspiré de LinkedIn. Les utilisateurs peuvent s'inscrire, se connecter, et gérer leurs publications sur un fil d'actualité sécurisé.

---

## Fonctionnalités

### 🔑 Épic 1 : Authentification & Sécurité
* **Inscription (Register) :** Création de compte avec nom, email, mot de passe sécurisé et titre professionnel (`headline`) obligatoire.
* **Connexion / Déconnexion (Login/Logout) :** Session sécurisée pour les membres inscrits.
* **Protection des Routes :** Redirection automatique des visiteurs (guests) tentant de forcer l'accès au fil d'actualité vers la page de connexion.

### 📝 Épic 2 : Gestion des Posts (CRUD)
* **Affichage du fil d'actualité :** Consultation de toutes les publications triées de la plus récente à la plus ancienne.
* **Publication Sécurisée :** Formulaire de création de post avec validation stricte via **Form Request** (minimum 10 caractères).
* **Gestion Exclusive (Autorisations) :** Un utilisateur peut modifier (**Update**) ou supprimer (**Delete**) uniquement ses propres posts. Les boutons n'apparaissent que pour le propriétaire, et toute tentative malveillante par URL est bloquée par une erreur `403 Forbidden`.

---

## Technologies utilisées

* Laravel (v12+)
* PHP (v8.5+)
* MySQL
* Eloquent ORM
* Blade & JavaScript Vanilla
* HTML / CSS

---

## Structure du projet
app/
├── Http/
│    ├── Controllers/
│    │    ├── AuthController.php      <-- Gère l'authentification (Login, Register, Logout)
│    │    └── PostsController.php     <-- Gère le CRUD des posts (Index, Store, Update, Destroy)
│    └── Requests/
│         └── StorePostRequest.php    <-- Gère la validation sécurisée des posts
└── Models/
├── User.php
└── Posts.php                    <-- Modèle des publications

database/
└── migrations/

resources/
└── views/
├── feed.blade.php               <-- Fil d'actualité avec formulaires CRUD
└── auth/
├── login.blade.php         <-- Page de connexion
└── register.blade.php      <-- Page d'inscription

routes/
└── web.php                           <-- Définition des routes et des Middlewares (Auth / Guest)

---

## Base de données

### Table users
* `id`
* `name`
* `email`
* `password`
* `headline` (Obligatoire)
* `company` (Optionnel)
* `image_url`
* `created_at` / `updated_at`

### Table posts
* `id`
* `user_id` (Clé étrangère liée à users)
* `content` (Minimum 10 caractères)
* `created_at` / `updated_at`

---

## Relations Eloquent

* Un **User** possède plusieurs **Posts** (`hasMany`) via `$user->Posts()`.
* Un **Post** appartient à un seul **User** (`belongsTo`) via `$post->user`.

---

## Liste des Routes API / Web

| Méthode | URL | Nom de la Route | Middleware | Description |
| :--- | :--- | :--- | :--- | :--- |
| **GET** | `/login` | `login` | `guest` | Affichage du formulaire de connexion |
| **POST** | `/login` | `login.submit` | `guest` | Traitement de la connexion |
| **GET** | `/register` | `show.register` | `guest` | Affichage du formulaire d'inscription |
| **POST** | `/register` | `register.submit` | `guest` | Traitement de l'inscription |
| **GET** | `/feed` | `feed` | `auth` | Affichage du fil d'actualité (Posts) |
| **POST** | `/posts` | `posts.store` | `auth` | Création d'un nouveau post |
| **PUT** | `/posts/{post}` | `posts.update` | `auth` | Modification d'un post (Propriétaire uniquement) |
| **DELETE** | `/posts/{post}` | `posts.destroy` | `auth` | Suppression d'un post (Propriétaire uniquement) |
| **POST** | `/logout` | `logout` | `auth` | Déconnexion de l'utilisateur |

---

## Installation

```bash
# 1. Cloner le projet
git clone <repository_url>
cd linkup

# 2. Installer les dépendances PHP
composer install

# 3. Configurer l'environnement
cp .env.example .env
php artisan key:generate

# 4. Configurer la base de données dans le fichier .env, puis lancer les migrations
php artisan migrate
php artisan db:seed

# 5. Lancer le serveur local
php artisan serve


Auteur
Projet réalisé par Jihane Jador dans le cadre des briefs de développement Web Full-Stack.
