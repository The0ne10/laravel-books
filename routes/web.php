<?php

use App\Http\Controllers\testController;
use Illuminate\Support\Facades\Route;

Route::get('/index', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class, 'index']);
