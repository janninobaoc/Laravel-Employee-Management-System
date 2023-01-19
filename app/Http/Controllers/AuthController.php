<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){

        $validatedData = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);

        $user =User::where('email',$validatedData['email'])->first();

        // $token = $user->createToken('api');

        if($user && Hash::check($validatedData['password'],$user->password)){
            $token =$user->createToken('api',['create']);
            return[
                'token'=>$token->plainTextToken
            ];
        }
        else {
            return[
                'error'=>'Invalid Credentials'
            ];
        }

    }
    public function logout(Request $request)
    {
        if($request->user()){
            $request->user()->tokens()->delete();
        }
    //    $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Logged out!'
        ];
    }
    //
}
