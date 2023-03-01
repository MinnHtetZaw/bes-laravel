<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\UpdateAuthRequest;
use App\Models\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "data" => User::all(),
        ],200);
    }

    public function getUser(Request $request)
    {
        return response()->json([
            "data" => User::find($request->id),
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthRequest $request)
    {
        $user = new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =Hash::make($request->password);
        $user->save();
        return response()->json([
            "data" =>'Success',
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthRequest  $request
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthRequest $request, Auth $auth)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auth $auth)
    {
        //
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(!\Illuminate\Support\Facades\Auth::attempt($credentials)){
            return response()->json([
                'data' => 'Please Check Email or Password!',
            ],422);
        }
        else{
            $user = User::where('email',$request->email)->first();
            $token = $user->createToken('user-auth')->plainTextToken;
            return response()->json([
                'data' =>$token,
                'user'=>\Illuminate\Support\Facades\Auth::user(),
            ],200);
        }
    }
}
