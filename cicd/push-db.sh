#!/bin/bash

CICD_DIR=$(dirname "$0")
. "${CICD_DIR}/vars.sh"
. "${CICD_DIR}/logger.sh"

db_path=$1
db_filename=${db_path##*/}

if [ -z "$db_path" ]; then
    log_error "Error: Please pass database dump path"
    exit 1
fi

echo "Pushing $db_filename to Azure Storage"

if [[ ! "${db_filename}" =~ ^20[0-9]{2}-[01][0-9]-[0-3][0-9]-[a-z\-]*-[a-z\-]*.sql.gz$ ]]; then
    log_error "Error: Filename format is not valid"
    log_error "  Expected format YYYY-MM-DD-IMAGE_NAME-BRANCH.sql.gz"
    exit 1
fi

exists=$(
    az storage blob list \
    --container-name $IMAGE_NAME \
    --query "[?name == '${db_filename}'].name" \
    --output tsv |
    wc -l
)

if [ $exists -gt 0 ]; then
    log_error "Error: Filename $db_filename exists on Azure Storage"
    exit 1
fi

az storage blob upload \
    --container-name $IMAGE_NAME \
    --file $db_path \
    --name $db_filename
