<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('news/create', 'NewsController@create');
Route::get('news', 'NewsController@index');
Route::put('news/{id}', 'NewsController@update');
Route::delete('news/{id}', 'NewsController@destroy');