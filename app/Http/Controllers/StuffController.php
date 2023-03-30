<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

class StuffController extends Controller
{
      
    /**
     * Assign stuff to specific branch
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function assignBranch(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [
            'user_id' => 'required|exists:stuffs,id',
            'branch_id' => 'required|exists:branches,id',
        ]);

        if($validation->fails()) {
            return response()->json(['error' => $validation->errors()], 422);
        }

        $stuff = Stuff::find($request->get('user_id'))->update([
            'branch_id' => $request->get('branch_id'),
        ]);

        return response()->json([
            'message' => 'Branch is assigend successfully',
            'data' => $stuff,
        ]);
    }
}
