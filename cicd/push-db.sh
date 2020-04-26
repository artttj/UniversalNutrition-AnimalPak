#!/bin/bash

CICD_DIR=$(dirname "$0")
. "${CICD_DIR}/vars.sh"

db_path=$1
db_filename=${db_path##*/}

if [ -z "$db_path" ]; then
    echo "Error: Please pass database dump path"
    exit
fi

echo "Pushing $db_filename to Azure Storage"

az storage blob upload \
    --container-name $IMAGE_NAME \
    --file $db_path \
    --name $db_filename
