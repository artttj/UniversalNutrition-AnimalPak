#!/bin/bash

set -e

. "$(dirname $0)/vars.sh"

pushd "$(dirname $0)/.."

# Login to Azure
if [[ -z $AZURE_CLIENT_ID || -z $AZURE_CLIENT_SECRET || -z $AZURE_TENANT_ID ]]; then
    [ -z $AZURE_CLIENT_ID ] && echo "Missing AZURE_CLIENT_ID"
    [ -z $AZURE_CLIENT_SECRET ] && echo "Missing AZURE_CLIENT_SECRET"
    [ -z $AZURE_TENANT_ID ] && echo "Missing AZURE_TENANT_ID"
    exit 1
fi

az login \
  --service-principal \
  --username $AZURE_CLIENT_ID \
  --password $AZURE_CLIENT_SECRET \
  --tenant $AZURE_TENANT_ID

# Set required host header if not already set
grep "$BASE_DOMAIN" /etc/hosts > /dev/null || \
  echo "127.0.0.1 ::1 $BASE_DOMAIN" | sudo tee -a /etc/hosts

echo "Stop any running mysql instances"
if pgrep mysql; then
  sudo kill -SIGTERM $(pgrep mysql) >> /dev/null 2>&1 || true
fi

# populate compose/env/env.php-local
CRYPT_KEY=$(az keyvault secret show --name "$IMAGE_NAME" --vault-name "SDEnvironments" --query 'value' | sed -e 's/".*key\\":\\"\(.*\)\\".*/\1/')
sed -e "s/crypt_key/$CRYPT_KEY/g" ./compose/env/env.php-local.template > ./app/etc/env.php

echo "Starting docker containers."

./compose/bin/start --disable-dev

echo "Wait $TEST_WAIT_SECS seconds for services to come up"
sleep $TEST_WAIT_SECS

echo "Running setup:upgrade and tests"
export COMPOSE_INTERACTIVE_NO_CLI=1
if [ $USER == "vsts" ]; then sudo chmod -R a+rw ./app/etc; fi
./compose/bin/magento setup:upgrade
STATUS=`curl -IkLs -m 300 https://$BASE_DOMAIN | grep  HTTP/1.1 | tail -1 | cut -d$' ' -f2`
echo "Test returned $STATUS status code"
[  $STATUS -ne "200" ] && curl -kLs -m 300 https://$BASE_DOMAIN

echo "Stopping docker containers"
./compose/bin/stop

popd

if [  $STATUS == "200" ]; then
  echo "Test passed successfully"
else
  exit 1
fi
