<?php

// Controllers
namespace App\Http\Controllers;
// requests
use App\Http\Requests\SignUpRequest;
use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;
// models
use App\Models\User;
// Hashing
use Illuminate\Support\Facades\Hash;
// storage
use Illuminate\Support\Facades\Storage;
// auth
use Illuminate\Support\Facades\Auth;



class signController extends Controller{
    public function register(SignUpRequest $request){
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);
        
        if($user){ 
            $token = true;
            return response()->json([
            'status' => 200,
            'token' => $token 
            ]);
        }

    }


    public function login(SignInRequest $request){
        $loginEmail = request('loginEmail');
        $loginPassword = request('loginPassword'); 
        // get user data from db and check with login inputs
        $loginUser = User::where('email', $loginEmail) -> where('password', $loginPassword) -> first(); 
        if($loginUser){
            $token = true;
            return response()->json([
            'name' => $loginUser->name,
            'status' => 200,
            'token' => $token 
            ]);
        }
        else{
            $token = false;
            return response()->json([
            'status' => 200,
            'token' => $token 
            ]);
        }
    }
}
