<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $role = new UserRole();
        $role->user_id = $user->id;
        $role->save();

        return response()->json([
            'data' => 'success'
        ], 200);
    }

}
