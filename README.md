## Outdors XHTML portal

Self hosted XHTML portal that returns weather forecast via https://api.meteo.lt and most popular articles from https://www.lrt.lt.
No caching, every page triggers an api request.

## Why ?

So while hiking i can check weather forecasts and news via a $15 WAP 2.0 capable featurephone.

##  Requierments

PHP 8, composer

## Install

`$ composer install`

`$ cp .env.example .env`

* Edit .env, set APP_USER_AGENT with your contacts 
* Make sure 'storage' dir is writable by webserver
* Configure database and its credentials

`$ php artisan optimize`

`$ php artisan generate:key`

`$ php artisan migrate`

`$ php artisan route:clear`

`$ php artisan cache:clear`

`$ php artisan config:clear`

Configure nginx as per https://laravel.com/docs/8.x/deployment#nginx

## Why is the template code so badly indented

Because i cant be bothered to install a minifier (yet)

## Why is the output so ugly

The featurephone browser doesnt support any colors.. even for text, let alone background.

