<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // TODO: Get all submissions
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'department' => 'required|integer|exists:departments,id',
            'message' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid submission: ' . ($validator->errors()->all()[0] ?? ''),
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $submission = Submission::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'department_id' => $request->department,
                'message' => $request->message,
                'submitted_at' => now(),
                'is_spam' => false,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the submission.',
                ...(env('APP_ENV') === 'local' ? ['errors' => [$e->getMessage()]] : []),
            ], 500);
        }

        $submission->load('department');

        return response()->json($submission, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        return response()->json($submission->load('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submission)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email',
            'department' => 'sometimes|required|integer|exists:departments,id',
            'message' => 'sometimes|required|string',
            'is_spam' => 'sometimes|required|boolean',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid submission: ' . ($validator->errors()->all()[0] ?? ''),
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $updated = $submission->update($request->only(['first_name', 'last_name', 'email', 'department', 'message', 'is_spam']));
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the submission.',
                ...(env('APP_ENV') === 'local' ? ['errors' => [$e->getMessage()]] : []),
            ], 500);
        }

        return response()->json($submission->load('department')->setHidden([]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        try {
            $submission->delete();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting the submission.',
                ...(env('APP_ENV') === 'local' ? ['errors' => [$e->getMessage()]] : []),
            ], 500);
        }

        return response()->json([
            'message' => 'Submission deleted successfully.',
        ], 200);
    }
}
