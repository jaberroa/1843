<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::post('/contacto', ContactController::class)->middleware('throttle:5,1')->name('contact.store');
