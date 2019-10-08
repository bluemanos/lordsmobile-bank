#!/bin/sh

PHP=$(which php)

$PHP --version
$PHP -i | grep memory_limit
echo "\n"

RANGE="${1:-0}"

# CODE COVERAGE TEXT REPORT
if [ $RANGE -eq 0 ] || [ $(($RANGE&1)) -eq 1 ]
then
    if $PHP -m | grep -q xdebug; then
        echo "xdebug enabled"
        ./vendor/bin/phpunit --coverage-text --colors=never -d memory_limit=1G
    else
        echo "xdebug enabling"
        $PHP -d zend_extension=xdebug.so ./vendor/bin/phpunit --coverage-text --colors=never -d memory_limit=1G
    fi
fi

# CODE COVERAGE HTML REPORT
if [ $RANGE -eq 0 ] || [ $(($RANGE&2)) -eq 2 ]
then
    if $PHP -m | grep -q xdebug; then
        echo "xdebug enabled"
        ./vendor/bin/phpunit --coverage-html build/phpunit/ -d memory_limit=1G
    else
        echo "xdebug enabling"
        $PHP -d zend_extension=xdebug.so ./vendor/bin/phpunit --coverage-html build/phpunit/ -d memory_limit=1G
    fi
fi

# SECURITY CHECKER
if [ $RANGE -eq 0 ] || [ $(($RANGE&4)) -eq 4 ]
then
    ./vendor/bin/parallel-lint app bootstrap config database tests
    echo "\n"
    ./vendor/bin/security-checker security:check composer.lock
fi
