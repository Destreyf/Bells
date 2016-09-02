#!/bin/bash

NETWORK="192.168.2"
START_INDEX=3
END_INDEX=254

IPS=""
COUNT=0
for ((i=$START_INDEX;i<=$END_INDEX;i++));
do
    IPS="$IPS $NETWORK.$i"
    COUNT=$(($(echo $IPS | grep -o ' ' | wc -l) + 0))

    if [ $COUNT -gt 20 ]; then 
        asterisk -rx "sip notify aastra-check-cfg $IPS"
        asterisk -rx "sip notify cisco-check-cfg $IPS"
        IPS=""
    fi
done

COUNT=$(($(echo $IPS | grep -o ' ' | wc -l) + 0))
if [ $COUNT -gt 0 ]; then 
    asterisk -rx "sip notify aastra-check-cfg $IPS"
    asterisk -rx "sip notify cisco-check-cfg $IPS"
fi
