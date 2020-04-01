#!/bin/bash

portable_readlink() {
    [[ -z $1 ]] && { echo "Missing target file path argument. Usage: portable_readlink <file-path>"; exit 1; }
    local TARGET_FILE=$1
    cd `dirname $TARGET_FILE`
    local TARGET_FILE=`basename $TARGET_FILE`
    while [ -L "$TARGET_FILE" ]
    do
        TARGET_FILE=`readlink $TARGET_FILE`
        cd `dirname $TARGET_FILE`
        TARGET_FILE=`basename $TARGET_FILE`
    done
    local PHYS_DIR=`pwd -P`
    local RESULT=$PHYS_DIR/$TARGET_FILE
    echo $RESULT
}

while [[ $# -gt 0 ]]; do
case $1 in
  --help)
    echo "Parameters required to run the tests:"
    echo "***********************************************************************"
    echo "--site: is a flag used to specify what zone+environment will be tested."
    echo "--headless: is a flag used to run the test without open the browser."
    echo "***********************************************************************"
    exit 1
    ;;
  --site)
    site=("$2")
    shift
    shift
    ;;
  --headless)
    shift
    HEADLESS='--variable HEADLESS:headless'
    ;;
  *)
    POSITIONAL+=("$1")
    shift
    ;;
esac
done

[ -z $site ] && echo -e "\033[31m--site value is required. Type --help to see more details\033[0m" && exit 1

SCRIPT=$(portable_readlink "$0")
SCRIPTPATH=$(dirname "$SCRIPT")
REPORT_DESCRIPTION="$site"
ROBOT_RESULT_DIRECTORY="$SCRIPTPATH/tmp/results/$REPORT_DESCRIPTION"

[[ -d "$ROBOT_RESULT_DIRECTORY" ]] && rm -rf "$ROBOT_RESULT_DIRECTORY"
[[ -d "$ROBOT_RESULT_DIRECTORY" ]] || mkdir -p "$ROBOT_RESULT_DIRECTORY"

CMD="robot \
--name "\"$REPORT_DESCRIPTION\"" \
--outputdir "\"$ROBOT_RESULT_DIRECTORY\"" \
--variable site:$site
$HEADLESS \
${POSITIONAL[@]} \
$SCRIPTPATH/suites"

echo $CMD
eval $CMD
