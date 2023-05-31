<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request){
    $validator=Validator::make($request->all(),[
        'name'=>'required|min:2|max:191|string',
        'email'=>'required|max:191|unique:users|email',
        'password'=>'required|min:8|max:191'

    ],
    [
        'name.required'=>'Please write your name',
        'email.unique'=>'Please write your email this email , It has already been registered '

    ]
);
    if($validator->fails()){
        return $validator->errors();
    }else{
            $data=User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'api_token' =>Str::random(100),

    
    ]);
    return $data;
    }
    }
}
