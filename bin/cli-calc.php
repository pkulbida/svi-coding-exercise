#!/usr/bin/php
<?php

system('clear');

// load dependencies
if (!require_once(__DIR__ . '/../vendor/autoload.php')) {
    throw new \RuntimeException('vendor/autoload.php could not be found. Did you run `php composer.phar install`?');
}

//do {
    echo CLI_PROMPT;
    echo trim(fgets(STDIN));
    echo "\n";
// while ($input != 'q') ;




