#!/bin/bash

APP_DIR="/home/u860915731/domains/altahany.com/public_html"
RELEASES="/home/u860915731/domains/altahany.com/releases"
LOG="/home/u860915731/domains/altahany.com/logs/deploy.log"

DATE=$(date +%Y%m%d%H%M%S)
NEW_RELEASE="$RELEASES/$DATE"

echo "DEPLOY START $DATE" >> $LOG

# backup current version
cp -r $APP_DIR $NEW_RELEASE

cd $APP_DIR || exit

git fetch origin >> $LOG 2>&1
git reset --hard origin/main >> $LOG 2>&1

echo "DEPLOY DONE $DATE" >> $LOG
