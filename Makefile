.PHONY: install test-unit test-coverage

install: vendor

test-unit: vendor
	vendor/bin/phpunit

test-coverage: vendor
	vendor/bin/phpunit --coverage-text

vendor: composer.lock
	composer install

composer.lock: composer.json
	composer update
