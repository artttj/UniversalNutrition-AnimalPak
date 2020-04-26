#!/bin/bash

set -e
. "$(dirname $0)/vars.sh"

pushd "$(dirname $0)/.."

docker build --no-cache \
    --build-arg SSH_PRIVATE_KEY="${SSH_PRIVATE_KEY}" \
    --build-arg MAGE_BASE_IMAGE=${MAGE_BASE_IMAGE} \
    -t ${IMAGE_REGISTRY}/${IMAGE_NAME}:${IMAGE_TAG} \
    .

popd
