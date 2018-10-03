all:
	@echo This make file is for developers.
	@echo run \"make update\" to put the latest scripts into the existing init files
	@echo run \"make update-html\" to copy the HTML
#	@echo run \"make inits\" to rebuild the init files

update:
	bin/push_update.sh

update-html:
	bin/push_html.sh

build-inits:
	bin/build_inits.sh

#update-scripts:
#	bin/add_scripts_to_init.bash ..

#install-inits:
#	bin/install_inits.bash ..

# inits:
# 	cd /root/buildroot;
# 	rm -rf output/build/fog_initrd_files/;
# 	make;
# 	scp -P 10002 output/images/rootfs.ext2.xz mastaweb:/var/www/fog/service/ipxe/init.xz;
# 	cp -r package/fog ../buildroot32/package/;
# 	cd /root/buildroot32/;
# 	rm -rf output/build/fog_initrd_files/;
# 	make ARCH=i386;
# 	scp -P 10002 output/images/rootfs.ext2.xz mastaweb:/var/www/fog/service/ipxe/init_32.xz;
# 	scp -rP 10002 package/fog mastaweb:/root/trunk/src/buildroot/package;
# 	cd /root/buildroot
