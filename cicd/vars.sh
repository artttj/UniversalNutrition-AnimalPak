#!/bin/bash

set -e

[ -z "${IMAGE_REGISTRY}" ] && export IMAGE_REGISTRY="somethingdigital.azurecr.io"

[ -z "${IMAGE_VERSION}" ] && export IMAGE_VERSION="7.2"
[ -z "${IMAGE_TAG}" ] && export IMAGE_TAG="${IMAGE_VERSION}-${BUILD_SOURCEBRANCHNAME:-dev}"

[ -z "${MAG_BASE_VERSION}" ] && export MAG_BASE_VERSION="7.2"
[ -z "${MAG_IMAGE_TAG}" ] && export MAG_IMAGE_TAG="master"
[ -z "${MAG_BASE_IMAGE}" ] && export MAG_BASE_IMAGE="${IMAGE_REGISTRY}/base-images/magento-php-fpm:${MAG_BASE_VERSION}-${MAG_IMAGE_TAG}"

echo "Using Variables:"
echo "  IMAGE_REGISTRY: ${IMAGE_REGISTRY}"
echo "  IMAGE_VERSION: ${IMAGE_VERSION}"
echo "  IMAGE_TAG: ${IMAGE_TAG}"
echo "  MAG_BASE_VERSION: ${MAG_BASE_VERSION}"
echo "  MAG_IMAGE_TAG: ${MAG_IMAGE_TAG}"
echo "  MAG_BASE_IMAGE: ${MAG_BASE_IMAGE}"