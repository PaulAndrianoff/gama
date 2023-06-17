<?php

use Core\Routing\Route;

Route::get('/', 'HomeController@index');
Route::get('/users', 'UserController@index');
