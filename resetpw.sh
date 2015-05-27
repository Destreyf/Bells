#!/bin/bash

echo "Removing old users file"
rm /var/www/html/bells/system/users.db

echo "Updating login/auth system to latest version"
wget https://raw.githubusercontent.com/Destreyf/Bells/master/web/bells/application/classes/controller/login.php -O /var/www/html/bells/application/classes/controller/login.php
wget https://raw.githubusercontent.com/Destreyf/Bells/master/web/bells/application/bootstrap.php -O /var/www/html/bells/application/bootstrap.php


ADMIN_USER="user"
ADMIN_PASSWORD="B3LL3"
read -p "Enter the Admin Username: " ADMIN_USER
read -p "Enter the Admin Password:" ADMIN_PASSWORD

if [[ -z "$ADMIN_USER" ]]; then
        ADMIN_USER="B3LL3"
fi

if [[ -z "$ADMIN_PASSWORD" ]]; then
        ADMIN_PASSWORD="B3LL3"
fi

wget "http://localhost/bells/index.php/login/setauth/$ADMIN_USER/$ADMIN_PASSWORD" -O /dev/null

IP=`hostname  -I | cut -f1 -d' '`

echo "http://$IP/bells/"
echo "The Username is $ADMIN_USER"
echo "The Password is $ADMIN_PASSWORD"
