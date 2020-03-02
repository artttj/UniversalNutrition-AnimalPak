#!/bin/bash

. "$(dirname $0)/vars.sh"

docker tag ${IMAGE_REGISTRY}/${IMAGE_NAME}:${IMAGE_TAG} ${IMAGE_REGISTRY}/${IMAGE_NAME}:latest
docker push ${IMAGE_REGISTRY}/${IMAGE_NAME}:latest
