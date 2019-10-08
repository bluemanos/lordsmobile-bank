<?php

/**
 * Ready to use function to easily replace a format of how the resources (rss) is displayed on a website.
 * In game instead `1200000 gold` we have `1.2M gold`.
 *
 * @param int|float|string $value
 * @return string
 */
function rss_format($value)
{
    return number_format($value);
}

/**
 * Short guild name.
 *
 * @return string
 * @TODO move to a configuration file or to a database
 */
function shortGuildName()
{
    return '[Z~P]';
}

/**
 * Full guild name.
 *
 * @return string
 * @TODO move to a configuration file or to a database
 */
function longGuildName()
{
    return 'Zjednoczona Polska';
}
