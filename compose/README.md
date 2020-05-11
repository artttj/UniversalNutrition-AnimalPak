# Compose Development Environment Details
This magento site can be deployed locally using [docker-compose](https://docs.docker.com/compose/) and the scripts found within `./compose/bin`.

The `docker-compose` environment will deploy:
* proxy (nginx ssl proxy)
* varnish
* app (nginx)
* php-fpm
* redis
* mariadb
* rabbitmq
* php-fpm cron (optional)


## Prerequisites
To use the `docker-compose` development environment you will need:
* [Docker Desktop for Mac](https://docs.docker.com/docker-for-mac/)
* [Azure CLI](https://docs.microsoft.com/en-us/cli/azure/install-azure-cli?view=azure-cli-latest) 
* Something Digital Azure Registry Access

## Docker Desktop Minimal Configuration
* Minimum 6 vCPUs
* Minimum 8 GB RAM

## Usage Environment Variables
### `docker-compose.yml` variables
```
# ${VARIABLE:-default}
${IMAGE_REGISTRY:-sdmagentodev.azurecr.io}
${IMAGE_NAME:-accelerator}
${IMAGE_TAG:-develop}
```

### `cicd` variables
See [cicd/vars.sh](cicd/vars.sh)

```
# ${VARIABLE:-default}
${AZURE_STORAGE_ACCOUNT:-"sasdmagentodev"}
${IMAGE_REGISTRY:-"sdmagentodev.azurecr.io"}
${IMAGE_NAME:-accelerator}
${IMAGE_TAG:-${BUILD_SOURCEBRANCHNAME:-develop}}
${MAGE_BASE_VERSION:-7.2}
${MAGE_BASE_IMAGE:-${IMAGE_REGISTRY}/base-images/magento-php-fpm:${MAGE_BASE_VERSION}}
${INIT_DB_PATH:-"accelerator/2020-01-21-accelerator-${DB_BRANCH:-develop}.sql.gz"}
${TEST_WAIT_SECS:-30}
```

## General Usage
`./compose/bin/start --init` - Start the environment and initialize local directories with content from pre-built site Docker Image
`./compose/bin/start --disable-dev` - Start the environment with no development environment enabled

## Advanced Usage
Use `./cicd/build.sh` to build your site locally

## Base Images
This site uses base php-fpm Docker images found in [magento-base-images](https://github.com/sdinteractive/magento-base-images)

## `compose` contents

### `bin`
The `./compose/bin/` directory holds scripts that are intended to facilitate the interaction with the `docker-compose` environment, accelerating and simplifying local development.

#### bin scripts
* `./compose/bin/bash` - will give you a `bash` shell inside the `php-fpm` container
* `./compose/bin/cli` - takes an argument that will be executed inside the `php-fpm` container
* `./compose/bin/clinotty` - same as `cli` but with no tty
* `./compose/bin/composer` - runs `composer` on the `php-fpm` container in `/var/www/html`
* `./compose/bin/copyfromcontainer` - copies files from the `php-fpm` container
* `./compose/bin/copytocontainer` - copies files to the `php-fpm` container
* `./compose/bin/devconsole` - executes `n98-magerun2.phar dev:console` inside `php-fpm` container
* `./compose/bin/fixowns` - fixes ownership in `/var/www/html` in `php-fpm` container
* `./compose/bin/fixperms` - fixes permission sin `/var/www/html` in `php-fpm` container
* `./compose/bin/init-local` - initializes local development environment
* `./compose/bin/magento` - runs `magento` commands inside the `php-fpm` container
* `./compose/bin/n98-magerun2` - runs `np98-magerun2` commands inside the `php-fpm` container
* `./compose/bin/redis` - runs `redis` commands inside the `redis` comntainer
* `./compose/bin/remove` - removes the `docker-compose` environment
* `./compose/bin/removevolumes` - removes the volumes created by this environment
* `./compose/bin/root` - executes the provided command as on the `php-fpm` container
* `./compose/bin/rootnotty` - same as `root` but with no tty
* `./compose/bin/setup-ssl` - e.g. `./compose/bin/setup-ssl magento.test` generates a cert for magento.test and restarts the environment
* `./compose/bin/start` - starts the `docker-compose` environment
* `./compose/bin/status` - gives status on the `docker-compose` environment
* `./compose/bin/stop` - stops the `docker-compose` environment
* `./compose/bin/xdebug` - e.g. `./compose/bin/xdebug enable` or `./compose/bin/xdebug disable`


### `env`
The `./compose/env` directory has configuration items that are mounted over the site image to configure the local `docker-compose` environment.

### `files`
The `./files/db` directory is used to initialize the mariadb container with a `<*>.sql` or `<*>.sql.gz` backup file. This directory will be processed during initial DB startup when no previous DB volume exists. If you need to consume a new DB, simply stop the environment, remove the DB volume (or all volumes), place a new backup file in this directory and start/restart the environment.
