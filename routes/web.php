<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Get routes (Asset retrieval)
Route::get('/', function () {
    return view('login');
});

Route::get('/home', [UserController::class, 'fetchHome']);

// Post routes (Authentication)
Route::post('/index/login', [UserController::class, 'authenticate']);

Route::post('/index/signup', [UserController::class, 'signup']);

// Post routes (Form Submissions)
Route::post('/api/expense-sub', []);