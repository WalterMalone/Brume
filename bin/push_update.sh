#!/bin/bash

cd ..
git pull

./fog\src\bin\add_scripts_to_init.bash ..
./fog\src\bin\install_inits.bash ..
