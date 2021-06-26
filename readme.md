# portfolio_db

Creation of a website for the presentation of my photography work.
Website developed using the Symfony framework.

## Env Requirements

    * PHP 7.4
    * Composer
    * Symfony CLI
    * Docker Desktop or Docker + Docker Compose

#### Check your requirements :

````bash
symfony check:requirements
````

### Start CMD Dev Producing

````bash
docker-compose up -d
symfony serve -d
````

## Test

````bash
php bin/phpunit
````