# portfolio_db

Creation of a website for the presentation of my photography work.
Website developed using the Symfony framework.

## Env Requirements

    * PHP 7.4
    * Composer
    * Symfony CLI
    * Docker Desktop or Docker + Docker Compose
    * NodeJS / NPM

#### Check your requirements :

````bash
symfony check:requirements
````

### Start CMD Dev Producing

````bash
composer install
npm install
npm run build
docker-compose up -d
symfony serve -d
````

### Ajouter des données de test BDD

````bash
symfony console doctrine:fixture:load
````

## Test

````bash
php bin/phpunit
````