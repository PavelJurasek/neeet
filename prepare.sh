#!/usr/bin/env bash

# Path to this script's directory
dir=$(cd `dirname $0` && pwd)

echo Preparing project:

echo "Setting chmod 777 for /temp directory.."
find "$dir/temp" -type d -exec chmod 777 {} +

echo "Setting chmod 777 for /log directory.."
find "$dir/log" -type d -exec chmod 777 {} +

echo ''
echo Done.
