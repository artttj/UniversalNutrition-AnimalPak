#!/bin/bash

set -e

. "$(dirname $0)/vars.sh"

pushd "$(dirname $0)/.."

# Download database init script
download 2020-01-21-accelerator.sql ./compose/files/db/2020-01-21-accelerator.sql

# Set required host header if not already set
grep "magento.test" /etc/hosts > /dev/null || \
  echo "127.0.0.1 ::1 magento.test" | sudo tee -a /etc/hosts

# Start services
echo "Stop any running mysql instances"
sudo sh -c "systemctl is-active --quiet mysql && systemctl stop mysql " || true

echo "Starting docker containers. Retry if failed"
./compose/bin/start

# Let the services come up
echo "Wait $TEST_WAIT_SECS seconds for services to come up"
sleep $TEST_WAIT_SECS

# Get status code from the running containers
echo "Running test now"
STATUS=`curl -IkLs -m 300 localhost | grep  HTTP/1.1 | tail -1 | cut -d$' ' -f2`
echo "Test returned $STATUS status code"

echo "Stopping docker containers"
./compose/bin/stop 

# Validate test result
[  $STATUS -ne "200" ] &&
  exit 1

popd