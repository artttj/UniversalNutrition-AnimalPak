#!/bin/bash

set -e

. "$(dirname $0)/vars.sh"

pushd "$(dirname $0)/.."

# Set required host header if not already set
grep "magento.test" /etc/hosts > /dev/null || \
  echo "127.0.0.1 ::1 magento.test" | sudo tee -a /etc/hosts

echo "Stop any running mysql instances"
if pgrep mysql; then
  sudo kill -SIGTERM $(pgrep mysql) >> /dev/null 2>&1 || true
fi

echo "Starting docker containers."

./compose/bin/start --disable-dev

echo "Wait $TEST_WAIT_SECS seconds for services to come up"
sleep $TEST_WAIT_SECS

echo "Running setup:upgrade and tests"
export COMPOSE_INTERACTIVE_NO_CLI=1
if [ $USER == "vsts" ]; then sudo chmod -R a+rw ./app/etc; fi
./compose/bin/magento setup:upgrade
STATUS=`curl -IkLs -m 300 https://magento.test | grep  HTTP/1.1 | tail -1 | cut -d$' ' -f2`
echo "Test returned $STATUS status code"
[  $STATUS -ne "200" ] && curl -kLs -m 300 https://magento.test

echo "Stopping docker containers"
./compose/bin/stop

popd

if [  $STATUS == "200" ]; then
  echo "Test passed successfully"
else
  exit 1
fi
