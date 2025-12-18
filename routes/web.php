<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dasboard siswa', function () {
    return view('dasboardsiswa');
})->name('dasboardsiswa');

Route::get('/dasboard guru', function () {
    return view('dasboardguru');
})->name('dasboardguru');
