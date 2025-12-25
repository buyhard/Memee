#!/bin/bash

php artisan config:cache
php artisan route:cache
php artisan migrate:fresh --force
apache2-foreground