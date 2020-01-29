#!/bin/bash

download () {
    [ -z "$AZURE_STORAGE_ACCOUNT" ] && echo "AZURE_STORAGE_ACCOUNT is required" && exit 1
    [ -z "$1" ] && echo "Please enter file name ie download file_name" && exit 1 

    download_path="$2"
    [ -z "$download_path" ] && download_path="$1"

    if [ -n "$AZURE_STORAGE_KEY" ]
    then
        az storage blob download \
            --account-name "$AZURE_STORAGE_ACCOUNT" \
            --account-key "$AZURE_STORAGE_KEY" \
            --container-name "dbscripts" \
            --name "$1" \
            --file "$download_path" \
            > /dev/null
    else
        found=`az storage account list --query "[?name=='$AZURE_STORAGE_ACCOUNT'].name" -o tsv | wc -l`
        if [ $found -eq 1 ]
        then
            connection_string=`az storage account show-connection-string --name $AZURE_STORAGE_ACCOUNT`

            az storage blob download \
                --connection-string "$connection_string" \
                --container-name "dbscripts" \
                --name "$1" \
                --file "$download_path" \
                > /dev/null
        else
            echo "Either AZURE_STORAGE_KEY / 'az login' not available or Storage account not found" && exit 1
        fi
    fi
}
