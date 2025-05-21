<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubmissionController;

Route::prefix('departments')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::post('/', [DepartmentController::class, 'store'])->middleware('auth.api');
    Route::patch('/{department}', [DepartmentController::class, 'update'])->middleware('auth.api');
    // Please implement the delete functionality
});
