#!/usr/bin/env bash

# Path to this script's directory
dir=$(cd `dirname $0` && pwd)

function purge()
{
	echo Purging ${1} ..
	rm -rf ${dir}/${1}
}

purge temp/cache
purge temp/proxies
purge temp/btfj.dat

echo ''
echo Done.

