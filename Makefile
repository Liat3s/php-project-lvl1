install: set-rights ## Install package && set rights to exec games
	composer install

brain-games: ## start Brain Games
	./bin/brain-games

brain-even: ## start Brain-even
	./bin/brain-even

brain-calc: ## start Brain-calc
	./bin/brain-calc

validate: ## validate composer package
	composer validate
	
lint:	## Check linter 
	composer exec --verbose phpcs -- --standard=PSR12 src bin

set-rights: ## set rights to games
	chmod +x bin/brain-games
	chmod +x bin/brain-even
	chmod +x bin/brain-calc
