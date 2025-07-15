DIRNAME = $(shell basename $(CURDIR))

# Misc
.DEFAULT_GOAL = help
.PHONY        : help build dev down permission bash prod

## —— 🎵 🐳 The Symfony Docker Makefile 🐳 🎵 ——————————————————————————————————
help: ## Outputs this help screen
	grep -E '(^[a-zA-Z0-9\./_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

## —— Docker 🐳 ————————————————————————————————————————————————————————————————
build: ## Build the Docker images
	COMPOSE_BAKE=true docker compose build --pull --no-cache

dev: ## Start the development container
	docker compose up -d --wait

down: ## Stop the docker hub
	docker compose down --remove-orphans

bash: ## Connect to the FrankenPHP container
	docker compose exec php bash

permission: ## Make host owner of the files created inside the container
	docker compose run --rm php chown -R $$(id -u):$$(id -g) .