# FitTrack - Application de suivi d'entraînements sportifs

## Description
FitTrack est une application web de suivi d'entraînements sportifs développée avec Symfony 7.4.
Elle permet de gérer des programmes d'entraînement, des séances et des exercices.

## Stack technique
- **Backend** : Symfony 7.4
- **Base de données** : MySQL
- **Backoffice** : EasyAdmin 5
- **Upload** : VichUploader

## Prérequis
- PHP 8.2+
- Composer
- MySQL
- Symfony CLI

## Installation

1. Cloner le dépôt
```bash
git clone <url-du-repo>
cd fittrack
```

2. Installer les dépendances
```bash
composer install
```

3. Configurer la base de données dans `.env.local`
```
DATABASE_URL="mysql://root:@127.0.0.1:3306/fittrack"
```

4. Créer la base de données et charger les données
```bash
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load
```

5. Lancer le serveur
```bash
symfony serve
```

Le site est accessible sur `http://localhost:8000`

## Comptes de test

| Email | Mot de passe | Rôle |
|---|---|---|
| admin@fittrack.com | admin123 | Admin |
| user@fittrack.com | password123 | Utilisateur |
| invite@fittrack.com | invite123 | Invité |

## Backoffice
Accessible sur `/admin` avec le compte admin.

## API
| Route | Description |
|---|---|
| `GET /api/programmes` | Liste des programmes |
| `GET /api/exercices` | Liste des exercices |
| `GET /api/categories` | Liste des catégories |

## Entités
- **Categorie** : catégorie d'exercice
- **Programme** : programme d'entraînement
- **Seance** : séance d'entraînement
- **Exercice** : exercice avec upload d'image
- **SeanceExercice** : relation enrichie Séance/Exercice
- **Utilisateur** : utilisateur avec rôles
