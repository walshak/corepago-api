<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * create user function
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken($user->name)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response,201);
    }

    /**
     * function for logging a user in
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function login(Request $request){
        $fields = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = User::where('email',$fields['email'])->first();
        //dd($user);

        if(!$user || !Hash::check($fields['password'],$user->password)){
            return response([
                'message'=>'Invalid credentials'
            ],401);
        }

        $token = $user->createToken($user->name)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response,201);


    }

    /**
     * function for logout
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function logout(Request $request){
        //delete token
        $request->user()->currentAccessToken()->delete();
        return response([
            'message'=>'logged out'
        ],201);
    }
}

