#!/bin/bash
set -e 
echo "############################################# Migrating database 'php artisan migrate'... #################################################"
php artisan migrate:refresh --env="openshift"
echo "####################################################### Application seed ##################################################################"
php artisan db:seed
