<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login')->name('home');
Route::view('/login', 'auth.login')->name('login');
