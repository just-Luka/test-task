<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

class StaffController extends Controller
{
      
    /**
     * Assign staff to specific branch
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function assignBranch(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [
            'staff_id' => 'required|exists:staffs,id',
            'branch_id' => 'required|exists:branches,id',
        ]);

        if($validation->fails()) {
            return response()->json(['error' => $validation->errors()], 422);
        }

        $staff = Staff::find($request->get('staff_id'))->update([
            'branch_id' => $request->get('branch_id'),
        ]);

        return response()->json([
            'message' => 'Branch is assigend successfully',
            'data' => $staff,
        ]);
    }
}
