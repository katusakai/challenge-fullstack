#!/bin/bash

read -p '### You are about to delete all database files and installed packages. Are you sure? (y/N) ' decision
if [ "$decision" = "Y" ] || [ "$decision" = "y" ]; then

    echo '### Shuting down services'
    docker-compose down

    echo '### Deleting database data'
    rm -r data

    echo '### Deleting composer packages'
    rm -r api/vendor

else
    exit
fi
