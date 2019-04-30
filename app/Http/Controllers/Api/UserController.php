<?php

namespace App\Http\Controllers\Api;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

public $successStatus = 200;

    /** 
     * Login API 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $token =  $user->createToken('MyApp')->accessToken; 
            return response()->json([
                'success' => true,
                'message'=>'Authorization Successfull',
                'auth_token' => $token,
                'user' => $user
            ], $this->successStatus); 
        } 
        else{ 
            return response()->json([
                'success'=> false,
                'message'=>'Unauthorised'
            ], 401); 
        } 
    }

    /** 
     * Register API 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'first_name'    => 'required|string|max:255',
            'other_names'   => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:users',
            'phone_number'  => 'required|string|max:255',
            'county'        => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6|same:password',
        ]);

        if ($validator->fails()) { 
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()
            ], 401);            
        } else {
            $input = $request->all(); 
            $input['password'] = Hash::make($input['password']); 

            $user = User::create($input); 
            $token =  $user->createToken('MyApp')->accessToken; 
            $success['name']  =  $user->first_name;

            return response()->json([
                'success' => true,
                'message'=>'Registration Successfull',
                'auth_token' => $token,
                'user' => $user
            ], $this->successStatus);
        }    
    }
    /** 
     * Details API 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json([
            'success' => true,
            'user' => $user
        ], $this->successStatus); 
    } 
}
