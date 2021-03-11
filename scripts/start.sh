#!/bin/bash

API_PORT=$(grep API_PORT .env | cut -d '=' -f2)

echo '### Starting services'
docker-compose up -d api php db

echo '### Services are ready'
echo "### Your api is reachable by http://localhost:$API_PORT"
