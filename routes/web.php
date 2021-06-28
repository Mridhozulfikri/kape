<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('index');
});

 

 Route::get('/barangmasuk', 'BMController@index');
 Route::resource('barangmasuk', 'BMController');

