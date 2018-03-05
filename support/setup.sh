#!/bin/bash

# environment setup
CWD=$(pwd)
DESTDIR=${DESTDIR:-$CWD/src}
TMP=${TMP:-$CWD/tmp}

if ! [ -e "$TMP" ]; then
  mkdir "$TMP"
fi

# interactions download locations
PSRLOG="https://github.com/php-fig/log/archive/1.0.2.tar.gz"

if ! [ -e "$DESTDIR/Psr/Log" ]; then
  cd "$TMP"
    wget --content-disposition "$PSRLOG"
    tar xvf log-1.0.2.tar.gz

    mv log-1.0.2/Psr "$DESTDIR/"
  cd -
fi

# cleanup
rm -rf "$TMP"/*

echo "All interactions setup!"
