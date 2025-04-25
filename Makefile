.PHONY: build up down bash composer test

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

bash:
	docker-compose exec app bash

composer:
	docker-compose exec app composer install

test:
	docker-compose exec app vendor/bin/phpunit
