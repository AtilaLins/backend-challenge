# Backend API Password Validator
Creator: Átila Lins

Main files:

/routes/web.php

/app/Models/User.php

/app/Helpers/Text.php

/test/TextCase.php


## Requeriments
PHP 7.0 or superior, composer.phar and LumenFramework
This project should not be used without a SSL Certificate installed in the webserver.

```bash
sudo apt-get install php php-pdo php-json php-mbstring php-ftp php-opcache php-openssl
sudo apt install phpunit -y
```

## Starting the service API

In the project folder run the following code:

```bash
php -S localhost:8000 -t public
```

## Using
Create the following request using postman or curl.

POST http://localhost:8000/user/isPasswordValid

Field's name: 'password' containing the value to be validated

## Testing

In the project folder run the following code:

```bash
vendor/bin/phpunit
```
