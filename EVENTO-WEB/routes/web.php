<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


//Criando um Group de Routas para o event
Route::controller(EventController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/events/create', 'create')->middleware('auth');
    Route::get('/events/{id}', 'show');
    Route::post('/events', 'store');
    Route::delete('/events/{id}', 'destloy')->middleware('auth');
    Route::get('/events/edit/{id}', 'edit')->middleware('auth');
    Route::put('/events/update/{id}', 'update')->middleware('auth');
});

//Routa da dashboard event
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});


