<?php

use App\Http\Controllers\GDController;
use App\Http\Controllers\NidController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});




Route::get('qr-code', [NidController::class, 'generateQRCode']);


Route::get('generate-id', [GDController::class, 'index']);

