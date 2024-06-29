<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Installation
### Installation du projet
```bash
git clone git@github.com:Cedric331/mink.git

Rendez-vous ensuite dans le dossier du projet puis exécutez les commandes suivantes :

composer install
npm install && npm run dev
cp .env.example .env
php artisan storage:link

```

### Configuration du fichier .env
L'utilisation de Laravel Filament nécessite d'indiquer l'url exacte de l'application dans le fichier .env
```bash
APP_URL=http://127.0.0.1:8000
```

### Configuration de la base de données
Créer une base de données puis ajouter les informations de connexion dans le fichier .env
Une fois les informations de connexion ajoutées, exécutez la commande suivante pour migrer les tables de la base de données :
```bash
php artisan migrate --seed
```
Le seed permet de remplir la base de données avec des données concernant les rôles.

### Création d'un utilisateur administrateur
Pour créer un utilisateur administrateur, exécutez la commande suivante :
```bash
php artisan app:create-admin
```
Une fois l'utilisateur créé, vous pouvez accéder à l'administration en vous rendant sur la page /admin

### Technologies utilisées
- Laravel 11 https://laravel.com/
- Vue.js 3 https://v3.vuejs.org/
- Inertia.js https://inertiajs.com/
- Laravel Filament https://filamentphp.com/


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
