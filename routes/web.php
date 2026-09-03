<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('orders')->group(function () {
    Route::post('/', [OrderController::class, 'store']);
    Route::get('/', [OrderController::class, 'index']);
    Route::get('/{order}', [OrderController::class, 'show']);
    Route::patch('/{order}/status', [OrderController::class, 'statusUpdate']);
});
