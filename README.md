## Warehouse

## Requirements
1. docker https://docs.docker.com/get-docker/
2. docker-compose https://docs.docker.com/compose/install/

## First time setup
1. Clone this repository.
2. Run `bash ./scripts/generate-env.sh`
3. Edit .env file according to you. Make sure that you use empty ports.
4. Edit api/.env. Add your `MAIL_USERNAME` and `MAIL_PASSWORD`. Get those values from https://mailtrap.io/
5. To install run `bash ./scripts/install.sh`

## Usage

1. To start application run `bash ./scripts/start.sh`
2. To stop application Run `docker-compose down`


