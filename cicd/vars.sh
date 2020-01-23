#!/bin/bash

set -e

[ -z ${IMAGE_REGISTRY+x} ] && export IMAGE_REGISTRY="somethingdigital.azurecr.io"

[ -z ${IMAGE_VERSION+x} ] && export IMAGE_TAG="7.2"
[ -z ${IMAGE_TAG+x} ] && export IMAGE_TAG="${IMAGE_VERSION}-${BUILD_SOURCEBRANCHNAME:-dev}"

[ -z ${MAG_BASE_VERSION+x} ] && export MAG_BASE_VERSION="7.2"
[ -z ${MAG_IMAGE_TAG+x} ] && export MAG_IMAGE_TAG="master"
[ -z ${MAG_BASE_IMAGE+x} ] && export MAG_BASE_IMAGE="${IMAGE_REGISTRY}/base-images/magento-php-fpm:${MAG_BASE_VERSION}-${MAG_IMAGE_TAG}"