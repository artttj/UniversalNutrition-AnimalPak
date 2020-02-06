#!/bin/bash

set -e
. "$(dirname $0)/util.sh"

export AZURE_STORAGE_ACCOUNT=${AZURE_STORAGE_ACCOUNT:-"sasdmagentodev"}

export IMAGE_REGISTRY=${IMAGE_REGISTRY:-"sdmagentodev.azurecr.io"}
export IMAGE_TAG=${IMAGE_TAG:-${BUILD_SOURCEBRANCHNAME:-develop}}
export MAG_BASE_VERSION=${MAG_BASE_VERSION:-7.2}
export MAG_BASE_IMAGE=${MAG_BASE_IMAGE:-${IMAGE_REGISTRY}/base-images/magento-php-fpm:${MAG_BASE_VERSION}}

export INIT_DB_PATH=${INIT_DB_PATH:-"accelerator/2020-01-21-accelerator-${DB_BRANCH:-develop}.sql.gz"}
export TEST_WAIT_SECS=${TEST_WAIT_SECS:-30}

echo "Using Variables:"
echo "  AZURE_STORAGE_ACCOUNT: ${AZURE_STORAGE_ACCOUNT}"
echo "  IMAGE_REGISTRY: ${IMAGE_REGISTRY}"
echo "  IMAGE_TAG: ${IMAGE_TAG}"
echo "  MAG_BASE_VERSION: ${MAG_BASE_VERSION}"
echo "  MAG_BASE_IMAGE: ${MAG_BASE_IMAGE}"
echo "  INIT_DB_PATH: ${INIT_DB_PATH}"
echo "  TEST_WAIT_SECS: ${TEST_WAIT_SECS}"
