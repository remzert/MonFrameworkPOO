.PHONY: server test install sniffer Gtest

vendor: composer.json
	composer install

composer.lock: composer.json
	composer update

install: vendor composer.lock

test: install
	./vendor/bin/phpunit		

server: install ##Lance le serveur interne à php
	php -S localhost:8000 -t public/ -d display_errors=1

sniffer: install
	./vendor/bin/phpcs

Gtest: install ##test phpunit et phpcs
	./vendor/bin/phpcs; ./vendor/bin/phpunit
