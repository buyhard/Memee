<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::post('/api/create','App\Http\Controllers\MemoController@create');
Route::get('/api/get','App\Http\Controllers\MemoController@get');
Route::post('/api/update','App\Http\Controllers\MemoController@update');
Route::post('/api/delete','App\Http\Controllers\MemoController@delete');