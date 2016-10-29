# Emotico - A SMS / MMS / Whatsapp  Messanger Project

## What is this ?

This is a development or(/and) production environment for PHP built in seperate docker containers, managed with docker-compose. The basic setup contains a LEMP stack (Linux, Nginx, MySQL, RabbitMQ and PHP)

On this LAMP Stack a Symfony 3 App is living

## Containing:
 * Nginx
 * PHP 5.6 and PHP 7.0, both contain:
    * APCu (optional)
    * XDebug (optional)
    * Production/development config (optional)
    * Composer
    * PHPUnit
    * Phing/Ant
    * ...
 * MariaDB
 * Automated backups
 * Redis
 * RabbitMQ

## Documentation

### Requirements

Docker: https://docs.docker.com/engine/installation/
   
Docker compose: https://docs.docker.com/compose/install/	
	
### Starting dev env

    docker-compose -f compose-up-development.yml up
    
    
OR

    docker-compose -f compose-up-production.yml up
 
 
### Add a vhost
To install database dependencies composer hast to know how to resolve the mariadb host. You have to create a /etc/hosts entry
* -ip of maria db-   mariadb
* run composer install

###Prepare database
```php app/console doctrine:database:create```

```php app/console doctrine:schema:create```

###Set accessrights
```rm -rf var```

```chmod -R 777 *```

### Usage

* for dev http://localhost:8089)

### API Doc

* surf http://localhost:8089/api/doc

