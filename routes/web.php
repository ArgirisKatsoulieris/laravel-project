<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

#Route::post('/categories/create', 'CategoryController@create');


Route::resource('categories', CategoryController::class);