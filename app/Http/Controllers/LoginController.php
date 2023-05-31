<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request){
        if(
            auth()->attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
        ])){
            $user=auth()->User();
            $user->api_token = Str::random(100);
            $user->save();
            return $user;

        }
        else{
            return "This email is not registered";

        }
    }
}
