#!/bin/bash

if [[ $EUID -ne 0 ]]; then
   echo "This script must be run as root" 1>&2
   exit 1
fi

OS=`uname -a`
TARGET='/var/www/html/'
TARGET_NAME='bells'
MYSQL_USER='root'
MYSQL_PASSWORD='passw0rd'
BELLS_PASSWORD=`< /dev/urandom tr -dc _A-Z-a-z-0-9 | head -c${1:-32};echo;`
ADMIN_PASSWORD=""

read -p "Enter the Admin Users Password, If left Blank a random password will be generated:" ADMIN_PASSWORD

if [[ -z "$ADMIN_PASSWORD" ]]; then
        ADMIN_PASSWORD=`< /dev/urandom tr -dc _A-Z-a-z-0-9 | head -c${1:-32};echo;`
fi

if [[ "$OS" == *Ubuntu* ]]; then
        echo "OS: Ubuntu\n"
        #Ubuntu based System
        TARGET='/var/www/'

        read -p "Enter the MySQL Root Password, followed by [ENTER]:" MYSQL_PASSWORD

        #if [ ! `mysql -u $MYSQL_USER -p$MYSQL_PASSWORD  -e ";"` ]; then
        #       echo "Invalid MySQL Password"
        #       exit;
        #fi

        until mysql -u $MYSQL_USER -p$MYSQL_PASSWORD  -e ";" ; do
                read -p "Can't connect, please retry: " MYSQL_PASSWORD
        done

        echo "Setting up required packages."
        #apt-get install mysql-server mysql-client php5-mysql asterisk asterisk-dahdi mpg123 sox -y --force-yes
else
        echo "OS: CentOS\n"
        #CentOS based System
        #Should be a PBX System
        #We shouldn't need packages.
fi

cp -R web/* $TARGET
crontab -l > existing.crontab
CRONTASK="bells-auto.sh"
#CRONTASK="$TARGETbells-auto.sh"
CRONJOBMASK='* * * * *'
CRONJOB="$CRONJOBMASK $TARGET$TARGET_NAME/$CRONTASK"

CRONTAB=`cat existing.crontab`

if [[ $CRONTAB =~ $CRONTASK ]]; then
        echo "Cron Job Exists"
else
        echo "Cron Job Missing, Adding"
        echo "$CRONJOB" >> existing.crontab
        crontab existing.crontab
        echo "Cron Job Added"
fi

rm existing.crontab

echo "Creating Database"
mysql -u $MYSQL_USER -p$MYSQL_PASSWORD < bells.sql

echo "Securing MySQL Password"
MYSQLSECURESED="sed -i 's/Yuh4D6E9G5wFxVUa/$BELLS_PASSWORD/g' $TARGET$TARGET_NAME/application/config/database.php"
$MYSQLSECURESED

echo "Setting up Admin User"
ADMINSECURESED="sed -i 's/-setme-/$ADMIN_PASSWORD/g' $TARGET$TARGET_NAME/system/users.db"
$ADMINSECURESED

echo "Changing Permissions";
TARGETOWNER=`ls -l "$TARGET" | awk '{ print $3 }'`
TARGETGROUP=`ls -l "$TARGET" | awk '{ print $4 }'`

chown -R $TARGETOWNER:$TARGETGROUP "$TARGET$TARGET_NAME/"

echo "Install Complete"
echo "You can now login to the server by going to"

IP=`/sbin/ifconfig | sed -n '2 p' | awk '{print $3}'`

echo ""
echo "http://$IP/$TARGET_NAME/"
echo ""
echo "in your browser"

echo "The Username is Admin (Case sensitive)"
echo "The Password is $ADMIN_PASSWORD"