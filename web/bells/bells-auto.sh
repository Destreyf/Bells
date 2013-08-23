#!/bin/bash
proc=`ps aux | grep '[c]ron/bells' | tr -d ' ' | tr -d "\n"`

if [ "$proc" == "" ]; then
        echo "[$date] Bell Service offline, restarting!";
        SUBJECT="[$date] Bell Service Failure..."
        # Email To ?
        EMAIL="chris@classroomsmart.com,matt@classroomsmart.com"
        # Email text/message
        EMAILMESSAGE="/tmp/emailmessage.txt"
        echo "Bell System appears to have gone down... " > $EMAILMESSAGE
        echo "Attemping to restart.... " >> $EMAILMESSAGE
        # send an email using /bin/mail
        #/bin/mail -s "$SUBJECT" "$EMAIL" < $EMAILMESSAGE
        /usr/bin/php /var/www/bells/index.php --uri="cron/bells" >> /var/log/bells.log
fi;

