#!/bin/bash

 	cd /root/buildroot;
 	rm -rf output/build/fog_initrd_files/;
 	make;
 	scp -P 10002 output/images/rootfs.ext2.xz mastaweb:/var/www/fog/service/ipxe/init.xz;
 	cp -r package/fog ../buildroot32/package/;
 	cd /root/buildroot32/;
 	rm -rf output/build/fog_initrd_files/;
 	make ARCH=i386;
 	scp -P 10002 output/images/rootfs.ext2.xz mastaweb:/var/www/fog/service/ipxe/init_32.xz;
 	scp -rP 10002 package/fog mastaweb:/root/trunk/src/buildroot/package;
 	cd /root/buildroot
