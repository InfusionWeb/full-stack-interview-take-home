<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubmissionController;

Route::prefix('departments')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::post('/', [DepartmentController::class, 'store']); // TODO: Add Bearer token auth
    Route::patch('/{department}', [DepartmentController::class, 'update']); // TODO: Add Bearer token auth
    Route::delete('/{department}', [DepartmentController::class, 'destroy']); // TODO: Add Bearer token auth
});

Route::prefix('submissions')->group(function () {
    // TODO: Add a route to get all submissions
    Route::post('/', [SubmissionController::class, 'store']);
    Route::get('/{submission}', [SubmissionController::class, 'show']); // TODO: Add Bearer token auth
    Route::patch('/{submission}', [SubmissionController::class, 'update']); // TODO: Add Bearer token auth
    Route::delete('/{submission}', [SubmissionController::class, 'destroy']); // TODO: Add Bearer token auth
});
