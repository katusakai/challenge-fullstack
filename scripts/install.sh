#!/bin/bash

if ! [ -x "$(command -v docker-compose)" ]; then
  echo '### Error: docker-compose is not installed.' >&2
  exit 1
fi

echo '### Running composer install...'
docker-compose -f docker-compose-helpers.yml run --rm composer install --ignore-platform-reqs

echo "### Preparing backend containers for data seeding"
docker-compose up -d --build api php db

echo '###Waiting for containers to start...'
sleep 30

echo "### Seeding default database data"
if [ "$OS" = "Windows_NT" ]; then
  winpty docker-compose exec php php artisan key:generate
  winpty docker-compose exec php php artisan config:cache
  winpty docker-compose exec php php artisan migrate:fresh --seed

else
  docker-compose exec php php artisan key:generate
  docker-compose exec php php artisan config:cache
  docker-compose exec php php artisan migrate:fresh --seed

fi

echo "### Turning down containers"
docker-compose down

