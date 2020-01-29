#!/bin/bash

set -e
. "$(dirname $0)/vars.sh"

pushd "$(dirname $0)/.."

docker push ${IMAGE_REGISTRY}/accelerator:${IMAGE_TAG}

popd
