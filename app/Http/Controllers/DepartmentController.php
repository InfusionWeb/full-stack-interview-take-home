<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $departments = Department::all()->setVisible(['id', 'name']);
        return response()->json($departments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:departments,name',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid submission: ' . ($validator->errors()->all()[0] ?? ''),
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $department = Department::create([
                'name' => $request->name,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the department.',
                ...(env('APP_ENV') === 'local' ? ['errors' => [$e->getMessage()]] : []),
            ], 500);
        }

        return response()->json($department->setVisible(['id', 'name']), 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:departments,name',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid submission: ' . ($validator->errors()->all()[0] ?? ''),
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $updated = $department->update([
                'name' => $request->name,
            ]);

            if (!$updated) {
                return response()->json([
                    'message' => 'Update failed. Department may not have changed.',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the department.',
                ...(env('APP_ENV') === 'local' ? ['errors' => [$e->getMessage()]] : []),
            ], 500);
        }

        return response()->json($department->setVisible(['id', 'name']), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        // Please implement the logic to delete the department
    }
}
