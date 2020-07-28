#!/bin/bash

set -e

if [[ -z $CICD_DIR ]]; then
    CICD_DIR=$(dirname "$0")
fi

. "${CICD_DIR}/util.sh"
. "${CICD_DIR}/logger.sh"

export AZURE_STORAGE_ACCOUNT=${AZURE_STORAGE_ACCOUNT:-"sasdmagentodev"}
export BASE_DOMAIN=${BASE_DOMAIN:-"animalpak.test"}
export IMAGE_REGISTRY=${IMAGE_REGISTRY:-"sdmagentodev.azurecr.io"}
export IMAGE_NAME=${IMAGE_NAME:-animalpak}
export IMAGE_TAG=${IMAGE_TAG:-${BUILD_SOURCEBRANCHNAME:-develop}}
export MAGE_BASE_VERSION=${MAGE_BASE_VERSION:-7.3}
export MAGE_BASE_IMAGE=${MAGE_BASE_IMAGE:-${IMAGE_REGISTRY}/base-images/magento-php-fpm:${MAGE_BASE_VERSION}}

export INIT_DB_PATH=${INIT_DB_PATH:-"animalpak/2020-07-25-animalpak-${DB_BRANCH:-develop}.sql.gz"}
export TEST_WAIT_SECS=${TEST_WAIT_SECS:-30}

echo "Using Variables:"
log_highlight "  BASE_DOMAIN: ${BASE_DOMAIN}"
echo "  IMAGE_REGISTRY: ${IMAGE_REGISTRY}"
echo "  IMAGE_NAME: ${IMAGE_NAME}"
echo "  IMAGE_TAG: ${IMAGE_TAG}"
echo "  MAGE_BASE_VERSION: ${MAGE_BASE_VERSION}"
echo "  MAGE_BASE_IMAGE: ${MAGE_BASE_IMAGE}"
echo "  AZURE_STORAGE_ACCOUNT: ${AZURE_STORAGE_ACCOUNT}"
echo "  INIT_DB_PATH: ${INIT_DB_PATH}"
echo "  TEST_WAIT_SECS: ${TEST_WAIT_SECS}"
