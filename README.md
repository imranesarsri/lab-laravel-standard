# lab laravel basic

## Travail à faire
- install `adminLTE` by npm
- Ajouter la base de données incluant la table des projets dans les `seeders`
- Créer le `CRUD` des tâches
- Ajouter la `pagination`
- Inclure la `recherche` et `filter` en utilisant `AJAX`
- Design patterns : `repository`
## Starter 
### 1. Installation Laravel 
```bash
composer create-project laravel/laravel .
```

### 2. Installing AdminLTE
1. Installing prerequisites
- Node.js
- NPM
- PHP 7.2.5 ou supérieur
- Un serveur web (Apache, Nginx, etc.)
2. Installing AdminLTE
```bash
npm install admin-lte@3.1.0
```
3. Publishing AdminLTE assets
```bash
php artisan vendor:publish --provider="AdminLTE\AdminLTEServiceProvider"
```
4. Importing AdminLTE CSS and JavaScript
- In `resources/css/app.css`, import the CSS from AdminLTE and Font Awesome:\
```bash
@import 'admin-lte/plugins/fontawesome-free/css/all.min.css';
@import 'admin-lte/dist/css/adminlte.min.css';
```
- In `resources/js/app.js`, import the AdminLTE JavaScript:
```bash
import 'admin-lte/dist/js/adminlte';
```
5. Install dependencies and build assets
```bash
npm install
npm run dev
```
6. Configuring Laravel to use Vite
Open your Laravel layout file (for example, resources/views/layouts/app.blade.php) and include the Vite assets:

```bash
@vite(['resources/css/app.css', 'resources/js/app.js'])
```
### 3. Installing FontAwesome Icons 
```bash
npm install @fortawesome/fontawesome-free
```
```bash
@import "@fortawesome/fontawesome-free/css/all.css";
```
[karans.com](https://www.karans.com.np/laravel-10/how-to-install-fontawesome-icons-in-laravel-10/)
___
## Model
```bash
php artisan make:model Task
php artisan make:model Project
```

## Databases
### .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lab_crud_laravel_standard
DB_USERNAME=root
DB_PASSWORD=solicoders
```
### Migrations
#### Generating Migrations
```bash
php artisan make:migration create_tasks_table
php artisan make:migration create_projects_table
```

#### Running Migrations
```bash
php artisan migrate
```

### Seeding
#### Writing Seeders
```bash
php artisan make:seeder TaskSeeder
php artisan make:seeder ProjectSeeder
```

#### Generating Factories
```bash
php artisan make:factory TaskFactory
php artisan make:factory ProjectFactory
```

### Running Seeders
```bash
php artisan db:seed
```
___
## Repasitories
 <!-- php artisan migrate:fresh -->
