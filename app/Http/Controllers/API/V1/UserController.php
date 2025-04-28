<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response ()->json([
            'data' => $user
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_name' => ['required'],
            'user_email' => ['required','email'],
            'user_phone' => ['required','numeric','regex:/^62([0-9]{8,13})$/'],
            'user_address' => ['required','regex:/^[a-zA-Z0-9\s,.-]+$/'],
        ]);
    }


    public function update(Request $request, string $id)
    {

        $request->validate([
            'user_name' => ['required'],
            'user_email' => ['required','email'],
            'user_phone' => ['required','numeric','regex:/^62([0-9]{8,13})$/'],
            'user_address' => ['required','regex:/^[a-zA-Z0-9\s,.-]+$/'],
        ]);

        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
        $user->user_name = $request->user_name;
        $user->user_email = $request->user_email;
        $user->user_phone = $request->user_phone;
        $user->user_address = $request->user_address;
        $user->save();
        return response()->json([
            'message' => 'User updated successfully',
            'data' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
        $user->delete();
        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}
