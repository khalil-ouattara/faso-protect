<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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
