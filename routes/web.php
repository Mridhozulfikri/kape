<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('index');
});

 

//  Route::get('/barangmasuk', 'BMController@index');
 Route::resource('barangmasuk', 'BMController');
 Route::resource('transaksi', 'BKController');
//  Route::resource('generatePDF', 'BKController');
 Route::post('generatePDF', 'BKController@generatePDF');
 Route::resource('laporan', 'LaporanController');
 Route::resource('databarang', 'DataBarangController');
 Route::get('generatePDF','BKController@generatePDF');

