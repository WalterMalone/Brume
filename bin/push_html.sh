#!/bin/bash


ls
if $(git pull) == "Already up-to-date."; then
  echo "No updates to install! Did you push changes to the master branch?"
  exit
fi

cp -R html /var/www/html
