#!/bin/bash

if [ "$(git pull)" == "Already up-to-date." ]; then
  echo "No updates to install! Did you push changes to the master branch?"
  exit
fi

./fog/src/bin/add_scripts_to_init.bash ..
./fog/src/bin/install_inits.bash ..
./bin/push_html.sh
