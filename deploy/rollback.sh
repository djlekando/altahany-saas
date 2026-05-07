#!/bin/bash

APP_DIR="/home/u860915731/domains/altahany.com/public_html"
RELEASES="/home/u860915731/domains/altahany.com/releases"

LAST=$(ls -t $RELEASES | head -1)

if [ "$LAST" != "" ]; then
    rm -rf $APP_DIR/*
    cp -r $RELEASES/$LAST/* $APP_DIR/
    echo "ROLLED BACK TO $LAST"
fi
