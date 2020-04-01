#!/bin/bash -e

docker build -qt automated-tests-for-accelerator:latest ./
docker run --rm -v $(pwd)/tmp:/sd.functional/tmp automated-tests-for-accelerator:latest --headless $@
