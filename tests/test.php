<?php

// Autoload files using the Composer autoloader.
require_once __DIR__ . '/../vendor/autoload.php';

use Sample\Greetings;

echo Greetings::sayHelloWorld();

function currentDate()
{
    return date;
}
