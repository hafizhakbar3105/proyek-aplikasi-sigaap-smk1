<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/home siswa', function () {
    return view('siswa/homesiswa');
})->name('homesiswa');

Route::get('siswa/absen', function () {
    return view('siswa/absen');
})->name('absen');

Route::get('siswa/bukukedisiplinan', function () {
    return view('siswa/bukukedisiplinan');
})->name('bukukedisiplinan');


Route::get('/home guru', function () {
    return view('guru/homeguru');
})->name('homeguru');

Route::get('/home osis', function () {
    return view('osis/homeosis');
})->name('homeosis');
