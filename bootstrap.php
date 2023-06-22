<?php

use Core\Database\DB;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/helpers.php';
require __DIR__ . '/config.php';

// Make the config data globally accessible
$config = require __DIR__ . '/config.php';

global $gamaPhpConfig;
global $appConfig;

$gamaPhpConfig = $config;
$appConfig = $config['app'];
$dbConfig = $config['database'];

if ('' !== $dbConfig['host']) {
    // Configure database connection
    DB::connect($dbConfig['host'], $dbConfig['database'], $dbConfig['username'], $dbConfig['password']);
}
