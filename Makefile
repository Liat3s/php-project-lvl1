install: ## Install package
	composer install

brain-games: ## start Brain Games
	./bin/brain-games

validate: ## validate composer package
	composer validate
	
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
