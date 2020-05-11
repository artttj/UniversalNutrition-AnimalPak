#!/bin/bash

set -e

NO_COLOR="\033[0m"
PURPLE="\033[0;35m"
RED="\033[0;31m"
YELLOW="\033[0;33m"

function log() {
    color=$1
    message=$2
    echo -e "$color$message$NO_COLOR"
}

function log_error () {
    log $RED "$1"
}

function log_highlight () {
    log $PURPLE "$1"
}

function log_warning () {
    log $YELLOW "$1"
}
