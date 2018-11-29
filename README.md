# docker-symfony4-api
Teamplate Project Restful Api with Symfony 4 and Docker

##Material Version
- Apache 2
- PHP 7.2
- MySQL 5.7
- Symfony 4
- PHPUnit 7
- Composer

##Base one
https://github.com/romaricp/kit-starter-symfony-4-docker

##Command in use
```
docker container ls -a

docker-compose exec php php -v
docker-compose exec php ls -al
docker-compose exec php ls -al ./sf4

docker-compose exec php php bin/console
docker-compose exec php composer update

docker-compose exec php composer require friendsofsymfony/rest-bundle
docker-compose exec php composer require nelmio/api-doc-bundle
docker-compose exec php composer require sensio/framework-extra-bundle
docker-compose exec php composer require symfony/asset
docker-compose exec php composer require symfony/orm-pack
docker-compose exec php composer require symfony/serializer
docker-compose exec php composer require symfony/twig-bundle

docker-compose exec php composer require doctrine/doctrine-fixtures-bundle --dev
docker-compose exec php composer require edgedesign/phpqa --dev 
docker-compose exec php composer require liip/functional-test-bundle --dev 
docker-compose exec php composer require phpstan/phpstan --dev  
docker-compose exec php composer require squizlabs/php_codesniffer --dev

docker-compose up
docker-compose up -d
docker-compose down  
```

##Install project
```
composer install

# Or update latest version for libraries
composer update
```

##Generate RSA Key Pem
```
mkdir config/jwt
openssl genrsa -out config/jwt/private.pem -aes256 4096
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```

##Test Login
```
curl -X POST -H "Content-Type: application/json" http://localhost:8000/login_check -d '{"username":"admin","password":"123456"}'
```

##For Unit Test
```
docker-compose exec php composer require --dev phpunit/phpunit symfony/browser-kit symfony/css-selector

docker-compose exec php phpunit -c sf4/src/

php vendor/bin/phpunit
```

##Automation Test With Codecept
- https://codeception.com/quickstart
```
# Generator test file
php vendor/bin/codecept generate:cest acceptance First

# Run test
php vendor/bin/codecept run --steps
# more detail
php vendor/bin/codecept run acceptance --steps

# Report
php vendor/bin/codecept run --steps --xml --html

# Code Coverage
php vendor/bin/codecept run --coverage --xml --html
```

- More information https://codeception.com/docs/02-GettingStarted

##JWT
- https://github.com/lexik/LexikJWTAuthenticationBundle/blob/master/Resources/doc/index.md#usage
