#!/bin/bash

download () {
    [ -z "$AZURE_STORAGE_ACCOUNT" ] && echo "AZURE_STORAGE_ACCOUNT is required" && exit 1
    [ -z "$1" ] && echo "Please enter file name ie download file_name" && exit 1 

    download_path="$2"
    [ -z "$download_path" ] && download_path="$1"

    # Exit if file already exists
    [ -f "$download_path" ] && echo "Found $download_path" && exit

    echo "Downloading $1"

    # Get storage key from current login if not provided
    if [ -z "$AZURE_STORAGE_KEY" ]; then
        found=`az storage account list --query "[?name=='$AZURE_STORAGE_ACCOUNT'].name" -o tsv | wc -l`
        if [ $found -eq 1 ]; then
          AZURE_STORAGE_KEY=`az storage account keys list --account-name ${AZURE_STORAGE_ACCOUNT} | jq -r '.[0].value'`
        else
            echo "Either AZURE_STORAGE_KEY / 'az login' not available" && exit 1
        fi
    fi
    
    connection_string="{ 'connectionString': 'DefaultEndpointsProtocol=https;EndpointSuffix=core.windows.net;AccountName=${AZURE_STORAGE_ACCOUNT};AccountKey=${AZURE_STORAGE_KEY}' }"
    container=$(dirname $1)
    blob=$(basename $1)

    az storage blob download \
        --connection-string "$connection_string" \
        --container-name "$container" \
        --name "$blob" \
        --file "$download_path" \
        > /dev/null
}
