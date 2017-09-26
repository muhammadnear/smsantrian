#!/bin/sh

clear

cd /home/website/html/smsantrian/

while true
do
 php index.php auto autoreply
 php index.php auto autosms
 sleep 2
done
