#!/bin/bash

. "$(dirname $0)/vars.sh"

# Download database init script

download $INIT_DB_PATH "$(dirname $0)/../compose/files/db/$(basename $INIT_DB_PATH)"
