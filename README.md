## Outdors XHTML portal

Self hosted XHTML portal that returns weather forecast via https://api.meteo.lt and most popular articles from https://www.lrt.lt.
No caching, every page triggers an api request.

## Why ?

So while hiking i dont need a smartphone and powerbank and still get weather forecasts via $15 feature phone (alcatel 1066d) that weights 60 grams.

##  Requierments

PHP 8, composer

## Install

`$ composer install`
`$ cp .env.example .env`
Edit .env
make sure 'storage' dir is writable by webserver
`$ php artisan optimize`
`$ php artisan route:clear`
`$ php artisan generate:key`
`$ php artisan cache:clear`

Configure nginx as per https://laravel.com/docs/8.x/deployment#nginx

## Why is the template code so badly indented

Because i cant be bothered to install a minifier

## Why is the output so ugly

The featurephone browser doesnt support any colors.. even for text, let alone background.

