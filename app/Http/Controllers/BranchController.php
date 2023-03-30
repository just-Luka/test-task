<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Staff;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

class BranchController extends Controller
{       
    /**
     * Get all branch
     *
     * @return JsonResponse
     */
    public function read(): JsonResponse
    {
        $data = Branch::all();

        return $data->isEmpty() ? response()->json(['error' => "there is nothing to see"], 204) : response()->json($data, 200);
    }
   
    /**
     * Get concrete branch and all staff assigend to that branch 
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function readDetails(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [
            'branch_id' => 'required|exists:branches,id'
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()], 422);
        }

        $branch = Branch::findOrFail($request->get('branch_id'));
        $staff = Staff::getByBranchId($request->get('branch_id'));

        return response()->json([$branch, $staff]);
    }

    /**
     * Create new branch
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()], 422);
        }

        $branch = Branch::create([
            'name' => $request->get('name')
        ]);

        return response()->json([
            'message' => 'Branch created successfully',
            'data' => $branch,
        ]);
    }
}