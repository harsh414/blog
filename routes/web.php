<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\IndexPageController@index');
require __DIR__.'/auth.php';
