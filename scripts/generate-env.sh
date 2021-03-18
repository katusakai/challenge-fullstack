#!/bin/bash

echo '### Generating .env'
cp .env.example .env

echo '### Generating api/.env'
cp api/.env.example api/.env

echo '### All environmental files are generated'
echo '### Edit .env before launching scripts/install.sh'
