<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GDController;
use App\Http\Controllers\NidController;
use App\Http\Controllers\VoterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/user-login', [AuthController::class, 'loginView'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('user.login');
Route::get('/create-account', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'create'])->name('user.create');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dash')->middleware('auth');

Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('apply-nid', [NidController::class, 'createNidForm'])->name('nid.create')->middleware('auth');
Route::post('nid', [NidController::class, 'nidStore'])->name('nid.store')->middleware('auth');

Route::get('/voters/{voter}', [VoterController::class, 'show'])->name('voter.show')->middleware('auth');




Route::get('id-info', [NidController::class, 'index'])->name('id.info')->middleware('auth');


Route::get('generate-id', [GDController::class, 'index']);

