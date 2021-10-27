<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PassportAuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => $request->level,
        ]);
       
        $token = $user->createToken('LaravelAuthApp')->accessToken;
 
        return response()->json([
            'message'=>"Success",
            'token' => $token], 200);
    }
 
    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json([
                'message'=>"Success",
                'token' => $token], 200);
        } else {
            return response()->json([
                'message'=>"Failed",
                'error' => 'Unauthorised'], 401);
        }
    }   
}
