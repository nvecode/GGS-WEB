#!/bin/bash

server="172.20.20.21"
adminserver="adminskg"
passwordadmin="Cjsadnkjqawdhq1234@1q"
username="vdgo-gro34-06"
idsession=$(sshpass -p $passwordadmin ssh -o StrictHostKeyChecking=no $adminserver@$server 'chcp 65001 && quser '$username' /server localhost 2>null' | awk '{print $3}' | sed '1,2d')
idOutSession=$(sshpass -p $passwordadmin ssh -o StrictHostKeyChecking=no $adminserver@$server 'chcp 65001 && quser '$username' /server localhost 2>null' | awk '{print $2}' | sed '1,2d')
if [[ $idsession != *Disc* ]];
then sshpass -p $passwordadmin ssh -o StrictHostKeyChecking=no $adminserver@$server 'rwinsta '$idsession' /server localhost 2>null' && echo "true"
elif [[ $idsession == *Disc* ]];
then sshpass -p $passwordadmin ssh -o StrictHostKeyChecking=no $adminserver@$server 'rwinsta '$idOutSession' /server localhost 2>null' && echo "true"
else echo "false"
fi
