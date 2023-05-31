<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(){
        if(auth()->user()){
            $user = auth()->user();
            $user->api_token = null ;
            $user->save() ;
            return response()->json(['message' => 'Thank you for using our application']);
        }
        return response()->json([
            'error' => 'Unable to logout user',
            'code' => 401,
        ], 401);
    }
}
