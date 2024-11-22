.PHONY: up down build install migrate test logs bash

up:
	docker compose up -d

down:
	docker compose down

build:
	docker compose build

install:
	docker compose exec app composer install

migrate:
	docker compose exec app php bin/console doctrine:migrations:migrate --no-interaction

test:
	docker compose exec app php bin/console doctrine:schema:validate
	docker compose exec app php bin/phpunit

logs:
	docker compose logs -f

bash:
	docker compose exec ak_invoice_php bash
