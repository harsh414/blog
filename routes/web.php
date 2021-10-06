<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\IndexPageController@index')->name('home');
Route::group(['middleware'=>'auth'],function () {
    Route::get('/addBlog', 'App\Http\Controllers\BlogsController@create')->name('addBlog');
    Route::post('/addBlog', 'App\Http\Controllers\BlogsController@store')->name('blog.store');

    Route::get('/update/{id}', 'App\Http\Controllers\BlogsController@update')->name('blog.update');
    Route::post('/update/{id}', 'App\Http\Controllers\BlogsController@storeUpdated')->name('blog.update.store');

    Route::post('/delete/{id}','App\Http\Controllers\BlogsController@removeBlog')->name('blog.remove');
});

Route::get('/viewBlog/{id}','App\Http\Controllers\BlogsController@show')->name('blog.show');
require __DIR__.'/auth.php';
