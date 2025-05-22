<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubmissionController;

Route::prefix('departments')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::post('/', [DepartmentController::class, 'store'])->middleware('auth.api');
    Route::patch('/{department}', [DepartmentController::class, 'update'])->middleware('auth.api');
    Route::delete('/{department}', [DepartmentController::class, 'destroy'])->middleware('auth.api');
});

Route::prefix('submissions')->group(function () {
    // TODO: Add a route to get all submissions
    Route::post('/', [SubmissionController::class, 'store']);
    Route::get('/{submission}', [SubmissionController::class, 'show'])->middleware('auth.api');
    Route::patch('/{submission}', [SubmissionController::class, 'update'])->middleware('auth.api');
    Route::delete('/{submission}', [SubmissionController::class, 'destroy'])->middleware('auth.api');
});
