<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }


    // public function login()   {
    
    //     $credentials = request(['email', 'password']);

    //     /if (  $token = auth('api')->attempt($credentials)) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }
    //     return $this->respondWithToken($token);
    // }

    public function login()
    {
        $credentials = request(['email', 'password']);

         if (!$token = auth()->guard('api')->attempt($credentials)) {
             return response()->json(['error' => 'Unauthorized'], 401);
         }
          return $this->respondWithToken($token);
    }
    
    public function adminRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
     }

    public function me()
    {
        return response()->json(auth()->user());
    }


    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

}