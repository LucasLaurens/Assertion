# Laravel Makefile

# Variables
COMPOSER = composer
PINT = vendor/bin/pint
RECTOR = vendor/bin/rector
PHPSTAN = vendor/bin/phpstan
PEST = vendor/bin/pest

.PHONY: update pint rector phpstan pest cover

# Dependencies
update:
	$(COMPOSER) update

# Run PHP code style fixer
pint:
	$(PINT)

# Upgrades and refactors the PHP code
rector:
	$(RECTOR) process --config=rector.php

# Conding Standard
phpstan:
	$(PHPSTAN) analyse -c phpstan.neon

# Run pest
pest:
	$(PEST) --parallel

# Cover all parts of the code
cover: pint rector phpstan pest
