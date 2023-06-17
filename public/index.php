<?php

require __DIR__ . '/../bootstrap.php';

use Core\Routing\Route;

// Load your routes
require __DIR__ . '/../src/Routes/web.php';

// Handle the incoming request
Route::dispatch();
