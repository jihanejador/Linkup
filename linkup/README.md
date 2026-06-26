# LinkUp

## Description

LinkUp est une application web développée avec Laravel qui reproduit les fonctionnalités de base d'un réseau social professionnel inspiré de LinkedIn. Les utilisateurs peuvent consulter un fil d'actualité contenant les publications de la communauté ainsi que les informations de leurs auteurs.

---

## Fonctionnalités

* Affichage du fil d'actualité.
* Affichage des publications triées du plus récent au plus ancien.
* Affichage des informations de l'auteur (nom, photo/placeholder et headline).
* Relations Eloquent entre les utilisateurs et les publications.
* Interface réalisée avec Blade.

---

## Technologies utilisées

* Laravel
* PHP
* MySQL
* Eloquent ORM
* Blade
* HTML / CSS

---

## Structure du projet

```
app/
 ├── Http/
 │   └── Controllers/
 │       └── PostController.php
 └── Models/
     ├── User.php
     └── Post.php

database/
 └── migrations/

resources/
 └── views/
     ├── feed.blade.php
     └── layouts/
         └── app.blade.php

routes/
 └── web.php
```

---

## Base de données

### Table users

* id
* name
* email
* password
* headline
* company
* image_url
* created_at
* updated_at

### Table posts

* id
* user_id
* content
* created_at
* updated_at

---

## Relations

* Un **User** possède plusieurs **Posts** (`hasMany`).
* Un **Post** appartient à un seul **User** (`belongsTo`).

---

## Installation

```bash
git clone <repository_url>

cd linkup

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan serve
```

---

## Route principale

```
GET /feed
```

Cette route affiche le fil d'actualité de LinkUp.

---

## Auteur

Projet réalisé par Jihane Jador.
