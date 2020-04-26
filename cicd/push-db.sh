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

if [[ ! "${db_filename}" =~ ^20[0-9]{2}-[01][0-9]-[0-3][0-9]-[a-z\-]*-[a-z\-]*.sql.gz$ ]]; then
    echo "Error: Filename format is not valid"
    echo "  Expected format YYYY-MM-DD-IMAGE_NAME-BRANCH.sql.gz"
    exit
fi

az storage blob upload \
    --container-name $IMAGE_NAME \
    --file $db_path \
    --name $db_filename
