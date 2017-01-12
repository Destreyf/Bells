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
ADMIN_PASSWORD="B3LL3"

read -p "Enter the Admin Users Password, If left Blank a random password will be generated:" ADMIN_PASSWORD

if [[ -z "$ADMIN_PASSWORD" ]]; then
        ADMIN_PASSWORD="B3LL3"
fi

echo "==================================="
echo "== ClassroomSmart Bell Scheduler =="
echo "==================================="
echo ""
echo "Thank you for using the installer"
echo "If you see anything that doesn't look right"
echo "Immediately hold CTRL and press C to quit"
echo ""
echo "This installer will gather the required information"
echo "about your operating system, and packages available"
echo "and perform an install, if you are using"
echo "a non Ubuntu distro and are not on a PBX, please"
echo "Install the following packages manually"
echo "apache2 (httpd) php5 php5-mysql mysql-server mysql-client mpg123 php5-mcrypt"
echo ""
echo ""
if [[ "$OS" == *Ubuntu* ]]; then
        echo "OS: Ubuntu"
        #Ubuntu based System
        TARGET='/var/www/html/'

        apt-get install mysql-server mysql-client php5-mysql mpg123 sox ntp phpmyadmin -y --force-yes
        
        read -p "Enter the MySQL Root Password, followed by [ENTER]:" MYSQL_PASSWORD

        #if [ ! `mysql -u $MYSQL_USER -p$MYSQL_PASSWORD  -e ";"` ]; then
        #       echo "Invalid MySQL Password"
        #       exit;
        #fi

        until mysql -u $MYSQL_USER -p$MYSQL_PASSWORD  -e ";" ; do
                read -p "Can't connect, please retry: " MYSQL_PASSWORD
        done

        echo "Setting up required packages."
else
        echo "OS: CentOS\n"
        #CentOS based System
        #Should be a PBX System
        #We shouldn't need packages.
fi

cp -R web/* $TARGET
cp -R asterisk/* /etc/asterisk/

if [ -f "/etc/asterisk/extensions_custom.conf" ]; then
        EXTFILE="/etc/asterisk/extensions_custom.conf"
elif [ -f "/etc/asterisk/extensions_additional.conf" ]; then
        EXTFILE="/etc/asterisk/extensions_additional.conf"
else
        EXTFILE="/etc/asterisk/extensions.conf"
fi
EXTENSIONS=`cat "$EXTFILE"`

if [[ $EXTENSIONS =~ "extensions_paging.conf" ]]; then
        echo "Asterisk Include Exists"
else
        echo "Asterisk Include is Missing, Adding"
        echo "#include extensions_paging.conf" >> "$EXTFILE"
        echo "Asterisk Include Added"
        echo "Reloading Asterisk"
        asterisk -rx 'reload'
        echo "Asterisk Reloaded"
fi

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
mysql -u $MYSQL_USER < bells.sql

#echo "Securing MySQL Password"
#MYSQLSECURESED="sed -i 's/Yuh4D6E9G5wFxVUa/$BELLS_PASSWORD/g' $TARGET$TARGET_NAME/application/config/database.php"
#echo "Running: $MYSQLSECURESED"
#$MYSQLSECURESED

#echo "Setting up Admin User"
#ADMINSECURESED="sed -i 's/-setme-/$ADMIN_PASSWORD/g' $TARGET$TARGET_NAME/system/users.db"
#$ADMINSECURESED

echo "Verifying Apache ModRewrite is enabled"
a2enmod rewrite

echo "Setting up PHP Short Tag support"
cp /etc/php.ini /etc/php.ini.bells_backup
sed -i 's/short_open_tag = Off/short_open_tag = On/' /etc/php.ini

if [ -f /etc/init.d/apache2 ]; then
        /etc/init.d/apache2 restart
else
        /etc/init.d/httpd restart
fi

echo "Changing Permissions";
TARGETOWNER=`ls -l "$TARGET" | awk '{ print $3 }' | uniq | head -2 | xargs`
#TARGETGROUP=`ls -l "$TARGET" | awk '{ print $4 }'`

FIXPERM="chown -R $TARGETOWNER $TARGET$TARGET_NAME/"
#echo "$FIXPERM"
$FIXPERM
chmod +x "$TARGET$TARGET_NAME/$CRONTASK"
mkdir -p "$TARGET$TARGET_NAME/application/cache"
mkdir -p "$TARGET$TARGET_NAME/application/logs"
chmod 777 "$TARGET$TARGET_NAME/application/cache"
chmod 777 "$TARGET$TARGET_NAME/application/logs"

echo "Configuring User"
wget "http://localhost/bells/index.php/login/setauth/user/$ADMIN_PASSWORD" -O /dev/null

echo "------------------------------------------"
echo "Install Complete"
echo "------------------------------------------"
echo "You can now login to the server by going"
echo "to the following url in your browser"

#IP=`/sbin/ifconfig | sed -n '2 p' | awk '{print $3}'`
IP=`hostname  -I | cut -f1 -d' '`

echo ""
echo ""
echo "------------------------------------------"
echo ""
echo "http://$IP/$TARGET_NAME/"
echo "The Username is user (Case sensitive)"
echo "The Password is $ADMIN_PASSWORD"

echo ""
echo "------------------------------------------"
echo ""
echo "Remember to customize /etc/asterisk/extensions_paging.conf"
echo "according to the needs of the facility"
echo ""
echo "Also if being installed in a non PBX enviroment, remember to"
echo "Create the extensions users in /etc/asterisk/sip.conf"
echo ""
