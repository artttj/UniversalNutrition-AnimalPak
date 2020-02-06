#!/bin/bash

. "$(dirname $0)/vars.sh"

docker tag ${IMAGE_REGISTRY}/accelerator:${IMAGE_TAG} ${IMAGE_REGISTRY}/accelerator:latest
docker push ${IMAGE_REGISTRY}/accelerator:latest
