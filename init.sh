#!/bin/sh

echo "CREATE CONTAINERS"
echo "---------"
docker-compose up -d --force-recreate --remove-orphan
echo

echo "WAITING FOR CONNECTION..."
echo "---------"
sleep 15

echo 'done.'
