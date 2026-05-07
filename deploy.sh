#!/bin/bash

cd /home/u860915731/domains/altahany.com/public_html || exit

git reset --hard
git pull origin main

echo "DEPLOY DONE"
