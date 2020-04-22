#!/bin/bash

set -e
if [[ -z $CICD_DIR ]]; then
    CICD_DIR=$(dirname "$0")
fi
. "${CICD_DIR}/util.sh"
export AZURE_STORAGE_ACCOUNT=${AZURE_STORAGE_ACCOUNT:-"sasdmagentodev"}

export BASE_DOMAIN=${BASE_DOMAIN:-"magento.test"}
export IMAGE_REGISTRY=${IMAGE_REGISTRY:-"sdmagentodev.azurecr.io"}
export IMAGE_NAME=${IMAGE_NAME:-accelerator}
export IMAGE_TAG=${IMAGE_TAG:-${BUILD_SOURCEBRANCHNAME:-develop}}
export MAG_BASE_VERSION=${MAG_BASE_VERSION:-7.2}
export MAG_BASE_IMAGE=${MAG_BASE_IMAGE:-${IMAGE_REGISTRY}/base-images/magento-php-fpm:${MAG_BASE_VERSION}}

export INIT_DB_PATH=${INIT_DB_PATH:-"accelerator/2020-04-22-accelerator-${DB_BRANCH:-develop}.sql.gz"}
export TEST_WAIT_SECS=${TEST_WAIT_SECS:-30}

echo "Using Variables:"
echo "  IMAGE_REGISTRY: ${IMAGE_REGISTRY}"
echo "  IMAGE_NAME: ${IMAGE_NAME}"
echo "  IMAGE_TAG: ${IMAGE_TAG}"
echo "  MAG_BASE_VERSION: ${MAG_BASE_VERSION}"
echo "  MAG_BASE_IMAGE: ${MAG_BASE_IMAGE}"
echo "  AZURE_STORAGE_ACCOUNT: ${AZURE_STORAGE_ACCOUNT}"
echo "  INIT_DB_PATH: ${INIT_DB_PATH}"
echo "  TEST_WAIT_SECS: ${TEST_WAIT_SECS}"
