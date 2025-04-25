.PHONY: build up down bash test

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

bash:
	docker-compose exec app bash

test:
	docker-compose exec app phpunit
