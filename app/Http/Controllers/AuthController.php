<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function register(Request $request){

       $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|max:255|unique:users,email',
             'Dni' => 'required|string|max:9', 
            'password' => 'required|min:6|confirmed',
            
        ]);

         $user=User::create([
            'name' => $attrs['name'],
            'Dni' => $attrs['Dni'],
            'email' => $attrs['email'],
            'password' => Hash::make($attrs['password']),
        ]);

        return response([
            'user'=>$user,
            'token'=>$user->createToken('secret')->plainTextToken
        ]);
    }


    public function login(Request $request){

        $attrs = $request->validate([
             
             'email' => 'required|email',
             'password' => 'required'
             
         ]);
 
         if(!Auth::attempt($attrs)){
            return response([
                'message' =>'Invalid credentials.'
            ], 403);
         }
 
         return response([
             'user'=> auth()->user(),
             'token'=>auth()->user()->createToken('secret')->plainTextToken
         ],200);
     }

     public function logout(){
         auth()->user()->tokens()->delete();
         return response([
            'message'=>'Logout success.'
         ],200);
     }

     public function user(){
         return response([
             'user' => auth()->user()
         ],200);
     }
}
