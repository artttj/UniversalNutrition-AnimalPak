#!/bin/bash

CICD_DIR=$(dirname "$0")
. "${CICD_DIR}/vars.sh"

# Download database init script

download $INIT_DB_PATH "${CICD_DIR}/../compose/files/db/$(basename $INIT_DB_PATH)"
