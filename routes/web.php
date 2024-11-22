<?php

use App\Http\Controllers\LoggerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('logger')->group(static function (): void {
    Route::get('log', [LoggerController::class, 'actionLog']);
    Route::get('log-to', [LoggerController::class, 'actionLogTo']);
    Route::get('log-to-all', [LoggerController::class, 'actionLogToAll']);
});
