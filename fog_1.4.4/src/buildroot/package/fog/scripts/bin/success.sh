#!/bin/bash
clear
hdd=$($casever | sed 's/.\{9\}$//' )
tput setaf 2
echo '***  *****            *****  *****            *****  *****            *****  ***'
echo '          *****  *****            *****  *****            *****  *****          '
echo '***  *****            *****  *****            *****  *****            *****  ***'
echo '          *****  *****            *****  *****            *****  *****          '
echo '***  *****            *****  *****            *****  *****            *****  ***'
tput setaf 15
echo
echo
echo
echo
echo '      Success! '$(tput setaf 11)$sysproduct $(tput setaf 15)'audited.'
echo
echo
echo '      Drive: '$(tput setaf 11)$hdd$(tput setaf 15)Gb
echo 
echo 
echo '      Press any key to power off'
echo
echo
echo
echo
tput setaf 2
echo '***  *****            *****  *****            *****  *****            *****  ***'
echo '          *****  *****            *****  *****            *****  *****          '
echo '***  *****            *****  *****            *****  *****            *****  ***'
echo '          *****  *****            *****  *****            *****  *****          '
read -n 1 -s -r -p "***  *****            *****  *****            *****  *****            *****  ***" && poweroff
