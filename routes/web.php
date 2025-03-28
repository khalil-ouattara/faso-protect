<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('websites', WebsiteController::class);

    Route::get('/domain/search', [DomainController::class, 'showForm'])->name('domain.form');
    Route::post('/domain/search', [DomainController::class, 'search'])->name('domain.search');
    Route::resource('complaints', ComplaintController::class);

});











Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', function(){
        return "<h1>Admin</h1>";
    });
});

Route::middleware(['role:agent'])->group(function () {
    Route::get('/agent', function(){
        return "<h1>Agent</h1>";
    });
});
