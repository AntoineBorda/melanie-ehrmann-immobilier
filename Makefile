
#---VARIABLES---------------------------------#
#---DOCKER---#
DOCKER = docker
DOCKER_RUN = $(DOCKER) run
DOCKER_COMPOSE = docker compose
DOCKER_COMPOSE_UP = $(DOCKER_COMPOSE) up -d
DOCKER_COMPOSE_STOP = $(DOCKER_COMPOSE) stop
#------------#

#---SYMFONY--#
SYMFONY = symfony
SYMFONY_SERVER_START = $(SYMFONY) serve -d --no-tls
SYMFONY_SERVER_STOP = $(SYMFONY) server:stop
SYMFONY_CONSOLE = $(SYMFONY) console
SYMFONY_LINT = $(SYMFONY_CONSOLE) lint:
#------------#

#---COMPOSER-#
COMPOSER = composer
COMPOSER_INSTALL = $(COMPOSER) install
COMPOSER_INSTALL_NO_SCRIPTS = $(COMPOSER) install --no-scripts
COMPOSER_UPDATE = $(COMPOSER) update
#------------#

#---NPM-----#
NPM = npm
NPM_INSTALL = $(NPM) install --force
NPM_UPDATE = $(NPM) update
NPM_BUILD = $(NPM) run build
NPM_DEV = $(NPM) run dev
NPM_DEV_SERVER = $(NPM) run dev-server
NPM_WATCH = $(NPM) run watch
#------------#

#---PHPQA---#
PHPQA = jakzal/phpqa:php8.3
PHPQA_RUN = $(DOCKER_RUN) --init --rm -v ${PWD}:/project -w /project $(PHPQA)
#------------#

#---PHPUNIT-#
PHPUNIT = APP_ENV=test $(SYMFONY) php bin/phpunit
#------------#

#---GIT-#
GIT = git
GIT_CHECKOUT = $(GIT) checkout
GIT_PULL = $(GIT) pull origin
#------------#
#---------------------------------------------#

## === 🆘  HELP ==================================================
help: ## Show this help.
	@echo "Symfony-And-Docker-Makefile"
	@echo "---------------------------"
	@echo "Usage: make [target]"
	@echo ""
	@echo "Targets:"
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
#---------------------------------------------#

## === 🐋  DOCKER ================================================
docker-up: ## Start docker containers.
	$(DOCKER_COMPOSE_UP)
.PHONY: docker-up

docker-stop: ## Stop docker containers.
	$(DOCKER_COMPOSE_STOP)
.PHONY: docker-stop

docker-build: ## Builds the Docker images
	@$(DOCKER_COMPOSE) build --pull --no-cache
.PHONY: docker-build

docker-start: docker-build docker-up ## Build and start the containers

docker-down: ## Stop the docker hub
	@$(DOCKER_COMPOSE) down --remove-orphans
.PHONY: docker-down

docker-logs: ## Show live logs
	@$(DOCKER_COMPOSE) logs --tail=0 --follow
.PHONY: docker-logs
#---------------------------------------------#

## === 🎛️  SYMFONY ===============================================
sf: ## List and Use All Symfony commands (make sf command="commande-name").
	$(SYMFONY_CONSOLE) $(command)
.PHONY: sf

sf-start: ## Start symfony server.
	$(SYMFONY_SERVER_START)
.PHONY: sf-start

sf-stop: ## Stop symfony server.
	$(SYMFONY_SERVER_STOP)
.PHONY: sf-stop

sf-cc: ## Clear symfony cache.
	$(SYMFONY_CONSOLE) cache:clear
.PHONY: sf-cc

sf-log: ## Show symfony logs.
	$(SYMFONY) server:log
.PHONY: sf-log

sf-dc: ## Create symfony database.
	$(SYMFONY_CONSOLE) doctrine:database:create --if-not-exists
.PHONY: sf-dc

sf-dd: ## Drop symfony database.
	$(SYMFONY_CONSOLE) doctrine:database:drop --if-exists --force
.PHONY: sf-dd

sf-su: ## Update symfony schema database.
	$(SYMFONY_CONSOLE) doctrine:schema:update --force
.PHONY: sf-su

sf-mm: ## Make migrations.
	$(SYMFONY_CONSOLE) make:migration
.PHONY: sf-mm

sf-dmm: ## Migrate.
	$(SYMFONY_CONSOLE) doctrine:migrations:migrate --no-interaction
.PHONY: sf-dmm

sf-dfl: ## Load fixtures.
	$(SYMFONY_CONSOLE) doctrine:fixtures:load --no-interaction
.PHONY: sf-dfl

sf-me: ## Make symfony entity
	$(SYMFONY_CONSOLE) make:entity
.PHONY: sf-me

sf-mc: ## Make symfony controller
	$(SYMFONY_CONSOLE) make:controller
.PHONY: sf-mc

sf-mf: ## Make symfony Form
	$(SYMFONY_CONSOLE) make:form
.PHONY: sf-mf

sf-perm: ## Fix permissions.
	chmod -R 777 var
.PHONY: sf-perm

sf-sudo-perm: ## Fix permissions with sudo.
	sudo chmod -R 777 var
.PHONY: sf-sudo-perm

sf-dump-env: ## Dump env.
	$(SYMFONY_CONSOLE) debug:dotenv
.PHONY: sf-dump-env

sf-dump-env-container: ## Dump Env container.
	$(SYMFONY_CONSOLE) debug:container --env-vars
.PHONY: sf-dump-env-container

sf-dump-routes: ## Dump routes.
	$(SYMFONY_CONSOLE) debug:router
.PHONY: sf-dump-routes

sf-open: ## Open project in a browser.
	$(SYMFONY) open:local
.PHONY: sf-open

sf-open-email: ## Open Email catcher.
	$(SYMFONY) open:local:webmail
.PHONY: sf-open-email

sf-check-requirements: ## Check requirements.
	$(SYMFONY) check:requirements
.PHONY: sf-check-requirements
#---------------------------------------------#

## === 📦  COMPOSER ==============================================
composer-install: ## Install composer dependencies.
	$(COMPOSER_INSTALL)
.PHONY: composer-install

composer-update: ## Update composer dependencies.
	$(COMPOSER_UPDATE)
.PHONY: composer-update

composer-validate: ## Validate composer.json file.
	$(COMPOSER) validate
.PHONY: composer-validate

composer-validate-deep: ## Validate composer.json and composer.lock files in strict mode.
	$(COMPOSER) validate --strict --check-lock
.PHONY: composer-validate-deep

composer-dev: ## Install composer dependencies in dev mode.
	$(COMPOSER_INSTALL_NO_SCRIPTS)
.PHONY: composer-dev

composer-prod: ## Install composer dependencies in prod mode.
	$(COMPOSER_INSTALL_NO_SCRIPTS) --no-dev --optimize-autoloader
.PHONY: composer-prod

dev: composer-dev sf-cc ## Deploy in dev mode.
	@echo "Deployment complete in dev mode."
.PHONY: dev

prod: composer-prod sf-cc ## Deploy in prod mode.
	@echo "Deployment complete in prod mode."
.PHONY: prod
#---------------------------------------------#

## === 📦  NPM ===================================================
npm-install: ## Install npm dependencies.
	$(NPM_INSTALL)
.PHONY: npm-install

npm-update: ## Update npm dependencies.
	$(NPM_UPDATE)
.PHONY: npm-update

npm-build: ## Build assets.
	$(NPM_BUILD)
.PHONY: npm-build

npm-dev: ## Build assets in dev mode.
	$(NPM_DEV)
.PHONY: npm-dev

npm: ## Launch the webpack dev server.
	$(NPM_DEV_SERVER)
.PHONY: npm-dev-server

npm-watch: ## Watch assets.
	$(NPM_WATCH)
.PHONY: npm-watch
#---------------------------------------------#

## === 🐛  PHPQA =================================================
qa-cs-fixer-dry-run: ## Run php-cs-fixer in dry-run mode.
	$(PHPQA_RUN) php-cs-fixer fix ./src --rules=@Symfony --verbose --dry-run
.PHONY: qa-cs-fixer-dry-run

qa-cs-fixer: ## Run php-cs-fixer.
	$(PHPQA_RUN) php-cs-fixer fix ./src --rules=@Symfony --verbose
.PHONY: qa-cs-fixer

qa-phpstan: ## Run phpstan.
	$(PHPQA_RUN) phpstan analyse ./src --level=3
.PHONY: qa-phpstan

qa-security-checker: ## Run security-checker.
	$(SYMFONY) security:check
.PHONY: qa-security-checker

qa-phpcpd: ## Run phpcpd (copy/paste detector).
	$(PHPQA_RUN) phpcpd --min-tokens=500 ./src
.PHONY: qa-phpcpd

qa-php-metrics: ## Run php-metrics.
	$(PHPQA_RUN) phpmetrics --report-html=var/phpmetrics ./src
.PHONY: qa-php-metrics

qa-lint-twigs: ## Lint twig files.
	$(SYMFONY_LINT)twig ./templates
.PHONY: qa-lint-twigs

qa-lint-yaml: ## Lint yaml files.
	$(SYMFONY_LINT)yaml ./config
.PHONY: qa-lint-yaml

qa-lint-container: ## Lint container.
	$(SYMFONY_LINT)container
.PHONY: qa-lint-container

qa-lint-schema: ## Lint Doctrine schema.
	$(SYMFONY_CONSOLE) doctrine:schema:validate --skip-sync -vvv --no-interaction
.PHONY: qa-lint-schema

qa-audit: ## Run composer audit.
	$(COMPOSER) audit
.PHONY: qa-audit
#---------------------------------------------#

## === 🔎  TESTS =================================================
tests: ## Run tests.
	$(PHPUNIT) --testdox
.PHONY: tests

tests-coverage: ## Run tests with coverage.
	XDEBUG_MODE=coverage $(PHPUNIT) --coverage-html var/coverage
.PHONY: tests-coverage
#---------------------------------------------#

## === ⭐  OTHERS =================================================
bc: qa-cs-fixer qa-phpstan qa-security-checker qa-phpcpd qa-lint-twigs qa-lint-yaml qa-lint-container qa-lint-schema tests ## Run before commit.
.PHONY: bc
#---------------------------------------------#

## === ⭐  PROJECT =================================================
start: docker-up sf-start sf-open ## Start project.
.PHONY: start

stop: docker-stop sf-stop ## Stop project.
.PHONY: stop

db-reset: ## Reset database.
	$(eval CONFIRM := $(shell read -p "Are you sure you want to reset the database? [y/N] " CONFIRM && echo $${CONFIRM:-N}))
	@if [ "$(CONFIRM)" = "y" ]; then \
		$(MAKE) sf-dd; \
		$(MAKE) sf-dc; \
		$(MAKE) sf-mm; \
		$(MAKE) sf-dmm; \
		$(MAKE) sf-dfl; \
		fi
.PHONY: db-reset

db-update: ## Update database
	$(SYMFONY_CONSOLE) doctrine:schema:update --force
.PHONY: db-update
#---------------------------------------------#

## === ⭐  TRANSLATION =================================================
trans : ## Update translations.
	$(SYMFONY_CONSOLE) translation:extract fr --clean --force && $(SYMFONY_CONSOLE) translation:extract en --clean --force
.PHONY: trans

transpush : ## Update translations & push
	$(SYMFONY_CONSOLE) translation:extract fr --clean --force && $(SYMFONY_CONSOLE) translation:extract en --clean --force && make loco-push
.PHONY: transpush

loco-push: ## Push translations to loco.
	$(SYMFONY_CONSOLE) translation:push loco --delete-missing
.PHONY: loco-push

loco-pull: ## Pull translations from loco.
	$(SYMFONY_CONSOLE) translation:pull loco --force && make sf-cc
.PHONY: loco-pull
#---------------------------------------------#

## === ⭐  GIT =================================================
git-dev: ## Pull git dev.
	$(GIT_CHECKOUT) dev && $(GIT_PULL) dev && make sf-cc
.PHONY: git-dev

git-preprod: ## Pull git preprod.	
	$(GIT_CHECKOUT) preprod && $(GIT_PULL) preprod && make sf-cc
.PHONY: git-preprod

git-prod: ## Pull git prod.
	$(GIT_CHECKOUT) prod && $(GIT_PULL) prod && make sf-cc
.PHONY: git-prod

git-main: ## Pull git main.
	$(GIT_CHECKOUT) main && $(GIT_PULL) main && make sf-cc
.PHONY: git-main
#---------------------------------------------#

## === ⭐  TAILWIND =================================================
tw-watch: ## Watch tailwind.
	$(SYMFONY_CONSOLE) tailwind:build --watch
.PHONY: tw-watch
#---------------------------------------------#

## === ⭐  SYMFONY ICONS =================================================
icons-lock: ## Lock icons.
	$(SYMFONY_CONSOLE) ux:icons:lock
.PHONY: icons-lock
#---------------------------------------------#

## === ⭐  CUSTOM PROJECT =================================================

#---------------------------------------------#