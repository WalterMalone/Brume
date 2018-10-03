#!/bin/bash
. /usr/share/fog/lib/partition-funcs.sh
# Displays the nice banner along with the running version
displayBanner() {

}

# Gets the information from the system for inventory
customInventory() {
    sysman=$(dmidecode -s system-manufacturer)
    sysproduct=$(dmidecode -s system-product-name)

    sysserial=$(dmidecode -s system-serial-number)
    systype=$(dmidecode -t 3 | grep Type:)
    
    mbproductname=$(dmidecode -s baseboard-product-name)

    mbserial=$(dmidecode -s baseboard-serial-number)

    cpuman=$(dmidecode -s processor-manufacturer)
    cpuversion=$(dmidecode -s processor-version)
    cpucurrent=$(dmidecode -t 4 | grep 'Current Speed:' | head -n1)
    cpumax=$(dmidecode -t 4 | grep 'Max Speed:' | head -n1)
    mem=$(cat /proc/meminfo | grep MemTotal | tr -d \\0)


    sysman64=$(echo $sysman | base64)
    sysproduct64=$(echo $sysproduct | base64)
    sysversion64=$(echo $sysversion | base64)
    sysserial64=$(echo $sysserial | base64)
    systype64=$(echo $systype | base64)
    biosversion64=$(echo $biosversion | base64)
    biosvendor64=$(echo $biosvendor | base64)
    biosdate64=$(echo $biosdate | base64)
    mbman64=$(echo $mbman | base64)
    mbproductname64=$(echo $mbproductname | base64)
    mbversion64=$(echo $mbversion | base64)
    mbserial64=$(echo $mbserial | base64)
    mbasset64=$(echo $mbasset | base64)
    cpuman64=$(echo $cpuman | base64)
    cpuversion64=$(echo $cpuversion | base64)
    cpucurrent64=$(echo $cpucurrent | base64)
    cpumax64=$(echo $cpumax | base64)
    mem64=$(echo $mem | base64)
    hdinfo64=$(echo $hdinfo | base64)
    caseman64=$(echo $caseman | base64)
    casever64=$(echo $casever | base64)
    caseserial64=$(echo $caseserial | base64)
    casesasset64=$(echo $casesasset | base64)


    mbasset=$(lsblk -dpno KNAME -I 3,8,9,179,202,253,259 | uniq | sort -V)
    caseman=$(lsblk --bytes -dplno SIZE -I 3,8,9,179,259 $mbasset)
    casever=$(lsblk -dplno SIZE -I 3,8,9,179,259 $mbasset)
    caseserial=$(cat /proc/cpuinfo | grep -m 1 'model name')
    sysversion=$(dmidecode -t 19 | grep 'Range Size: ')
    casesasset=$(dmidecode -t 17 | grep 'Size:' | grep -Ec '[0-9]' )
    biosversion=$(dmidecode -t 17 | grep -m 1 'Speed:' | grep -v 'Con' | grep -v 'Unk' )
    biosvendor=$(lspci | grep -i 'vga\|3d\|2d' | grep -i 'amd\|nvidia\|radeon')
    biosdate=$(dmidecode -t 4 | grep -i socket)
    mbman=$(dmidecode -t 4 | grep -i upgrade)
    mbversion=$(dmidecode -t 17 | grep -i 'Type:')
    hdinfo=$(dmidecode -t 17 | grep -m 1 -i 'Volt' | grep -Ec '[0-9]' )




}

