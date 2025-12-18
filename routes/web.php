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

Route::get('siswa/poinkedisiplinan', function () {
    return view('siswa/poinkedisiplinan');
})->name('poinkedisiplinan');

Route::get('siswa/profile', function () {
    return view('siswa/profile');
})->name('profile');





Route::get('/home guru', function () {
    return view('guru/homeguru');
})->name('homeguru');

Route::get('guru/pelanggaran', function () {
    return view('guru/pelanggaran');
})->name('pelanggaran');

Route::get('guru/kedisiplinan', function () {
    return view('guru/kedisiplinan');
})->name('kedisiplinan');

Route::get('guru/dataabsen', function () {
    return view('guru/dataabsen');
})->name('dataabsen');

Route::get('guru/poin', function () {
    return view('guru/poin');
})->name('poin');

Route::get('guru/profile', function () {
    return view('guru/profile');
})->name('profile');

Route::get('guru/statistik', function () {
    return view('guru/statistik');
})->name('statistik');




Route::get('/home osis', function () {
    return view('osis/homeosis');
})->name('homeosis');

Route::get('/dashboard osis', function () {
    return view('osis/dashboard-osis');
})->name('dashboardosis');
