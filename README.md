# LinkUp

## 1. Nom du projet

**Nom du projet :** LinkUp

---

# 2. Présentation du projet

LinkUp est une application web développée avec Laravel qui reproduit les fonctionnalités principales d'un réseau social professionnel inspiré de LinkedIn.

Elle permet aux utilisateurs de créer un profil, publier des contenus et consulter un fil d'actualité contenant les publications de la communauté.

Cette plateforme s'adresse principalement aux étudiants, développeurs et professionnels souhaitant partager leurs expériences et améliorer leur visibilité professionnelle.

Son objectif principal est de faciliter les échanges professionnels à travers un espace simple de publication et de consultation de contenus.

---

# 3. Problématique

Le problème identifié est que les utilisateurs ne disposent pas toujours d'une plateforme simple permettant de partager leurs expériences professionnelles, leurs projets et leurs compétences avec une communauté.

La solution proposée permet de créer un espace professionnel où les utilisateurs peuvent publier du contenu, consulter les publications des autres membres et découvrir leurs informations professionnelles.

---

# 4. Fonctionnalités principales

- Créer un compte utilisateur et se connecter à son espace personnel.
- Publier des contenus dans le fil d'actualité.
- Consulter les publications des utilisateurs triées du plus récent au plus ancien.
- Afficher les informations des auteurs (nom, photo, headline, entreprise).
- Ajouter et consulter les commentaires sur les publications.
- Consulter le profil d'un utilisateur avec ses informations et ses publications.

---

# 5. Technologies utilisées

| Technologie | Utilisation dans le projet |
|-------------|----------------------------|
| Laravel | Développement du backend, gestion des routes et logique métier |
| PHP | Création de la logique applicative |
| MySQL | Stockage et gestion des données |
| Eloquent ORM | Gestion des modèles et des relations entre les tables |
| Blade | Création des interfaces utilisateur dynamiques |
| HTML / CSS | Structure et design des pages |
| Git / GitHub | Gestion des versions et sauvegarde du projet |
| Composer | Gestion des dépendances PHP |

---

# 6. Installation et lancement

## 6.1 Prérequis

Pour utiliser ce projet, vous devez disposer de :

- PHP 8.x
- Composer
- Laravel
- MySQL
- Git
- Un éditeur de code comme Visual Studio Code

---

## 6.2 Cloner le dépôt

```bash
git clone https://github.com/jihanejador/Linkup.git
```

---

## 6.3 Ouvrir le dossier

```bash
cd Linkup
```

---

## 6.4 Installer les dépendances

```bash
composer install
```

---

## 6.5 Variables d'environnement

Créer le fichier `.env` à partir du fichier `.env.example`.

```bash
cp .env.example .env
```

Configurer les informations de la base de données :

```env
APP_NAME=LinkUp

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=linkup
DB_USERNAME=root
DB_PASSWORD=
```

Générer la clé Laravel :

```bash
php artisan key:generate
```

---

## 6.6 Création de la base de données

Exécuter les migrations :

```bash
php artisan migrate
```

Importer les données de test :

```bash
php artisan db:seed
```

---

## 6.7 Lancer le projet

```bash
php artisan serve
```

---

## 6.8 Ouvrir le projet

Après le lancement :

```
http://127.0.0.1:8000/feed
```

---

# 7. Structure du projet

```
app/
 ├── Http/
 │   └── Controllers/
 │       ├── PostController.php
 │       ├── ProfileController.php
 │       └── AuthController.php
 │
 └── Models/
     ├── User.php
     ├── Post.php
     └── Comment.php


database/
 └── migrations/


resources/
 └── views/
     ├── feed.blade.php
     ├── profile.blade.php
     └── layouts/
         └── app.blade.php


routes/
 └── web.php
```

---

# 8. Base de données

## Table users

| Champ | Type |
|------|------|
| id | bigint |
| name | string |
| email | string |
| password | string |
| headline | string |
| company | string nullable |
| image_url | string nullable |
| is_open_to_work | boolean |
| created_at | timestamp |
| updated_at | timestamp |

---

## Table posts

| Champ | Type |
|------|------|
| id | bigint |
| user_id | foreign key |
| content | text |
| created_at | timestamp |
| updated_at | timestamp |

---

## Table comments

| Champ | Type |
|------|------|
| id | bigint |
| user_id | foreign key |
| post_id | foreign key |
| content | text |
| created_at | timestamp |
| updated_at | timestamp |

---

# 9. Relations Eloquent

- Un utilisateur possède plusieurs publications :

```php
User hasMany Posts
```

- Une publication appartient à un utilisateur :

```php
Post belongsTo User
```

- Un utilisateur possède plusieurs commentaires :

```php
User hasMany Comments
```

- Un commentaire appartient à une publication :

```php
Comment belongsTo Post
```

---

# 10. Captures d'écran

## Capture 1

### Fil d'actualité

```md
![Feed](screenshots/feed.png)
```

Cette capture montre le fil d'actualité avec les publications des utilisateurs, leurs informations professionnelles et les interactions disponibles.


---

## Capture 2

### Profil utilisateur

```md
![Profile](screenshots/profile.png)
```

Cette capture montre le profil d'un utilisateur avec ses informations personnelles et la liste de ses publications.

---

# 11. Contribution personnelle

Ma contribution principale a porté sur le développement des fonctionnalités principales de LinkUp avec Laravel.

J'ai travaillé sur la conception de la base de données, la création des migrations, les modèles Eloquent et les relations entre les utilisateurs, publications et commentaires.

J'ai également développé l'authentification, le fil d'actualité, l'affichage des profils utilisateurs, la gestion des publications, les commentaires, le badge "Open To Work", le filtre par entreprise et les statistiques des publications.

---

# 12. Difficultés rencontrées

## Difficulté 1 : Gestion des relations Eloquent

### Problème rencontré

La mise en place des relations entre les utilisateurs, publications et commentaires nécessitait une bonne compréhension du fonctionnement d'Eloquent ORM.

### Recherches / Tests

J'ai consulté la documentation Laravel et effectué plusieurs tests avec les modèles et migrations.

### Solution

J'ai utilisé les relations `hasMany` et `belongsTo` afin de connecter correctement les différentes tables.

### Ce que j'ai appris

Cette difficulté m'a permis de mieux comprendre la gestion des relations dans Laravel.

---

## Difficulté 2 : Sécurisation des formulaires

### Problème rencontré

Il fallait empêcher l'enregistrement de données incorrectes et protéger certaines fonctionnalités.

### Recherches / Tests

J'ai étudié les middlewares Laravel et les Form Requests pour gérer les validations.

### Solution

J'ai ajouté le middleware `auth` et mis en place des validations côté serveur.

### Ce que j'ai appris

J'ai amélioré mes connaissances concernant la sécurité des applications web Laravel.

---

# 13. Améliorations possibles

Dans une prochaine version, je pourrais :

- Ajouter un système de messagerie privée entre utilisateurs.
- Ajouter des notifications en temps réel.
- Permettre l'ajout et la modification des photos de profil.
- Déployer l'application sur un serveur en ligne.

### Conclusion

Ces améliorations permettraient de rendre LinkUp plus complet, plus interactif et plus proche d'un véritable réseau social professionnel.

---

# Auteur

Projet réalisé par Jihane Jador.

