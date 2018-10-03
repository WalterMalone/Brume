#!/bin/bash

if [ "$(git pull)" == "Already up-to-date." ]; then
  echo "No updates to install! Did you push changes to the master branch?"
#  exit
fi

sudo cp -R html /var/www
