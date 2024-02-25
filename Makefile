# Laravel Makefile

# Variables
PHP = php
COMPOSER = composer
RECTOR = vendor/bin/rector
PHPSTAN = vendor/bin/phpstan
PEST = vendor/bin/pest

.PHONY: update rector stan pest

# Dependencies
update:
	$(COMPOSER) update

# Upgrades and refactors the PHP code
rector:
	$(RECTOR)

# Conding Standard
stan:
	$(PHPSTAN) analyse -c phpstan.neon

# Run pest
pest:
	$(PEST)
