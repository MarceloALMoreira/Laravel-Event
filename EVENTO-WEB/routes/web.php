<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Notificacao\NotificacaoController;

Route::get('/', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);

Route::get('/contact', function () {
    return view('contact');
    Route::get('/teste1', function () {
        return view('teste1');
    });
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(NotificacaoController::class)->group(function(){
    Route::get('/notificacao', 'viewDeNotification')->name('notificacao.viewDeNotification');
    Route::get('/notificacao/detalhes', 'viewDeDetalhes')->name('notificacao.viewDeDetalhes');
});