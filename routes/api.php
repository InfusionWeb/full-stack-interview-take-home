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

// Please implement the submission routes

// Create a new submission
    // Post: /api/submissions
// List all submissions
    // Get: /api/submissions
// Show a specific submission
    // Get: /api/submissions/{submission}
// Update a specific submission
    // Patch: /api/submissions/{submission}
// Delete a specific submission
    // Delete: /api/submissions/{submission}
