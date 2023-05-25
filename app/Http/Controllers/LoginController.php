<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
 
class LoginController extends Controller
{
    public function login(LoginRequest $request){
          
        Log::channel('customlog')->info("$request->username is login to our system");
        
        $request->session()->put('username', $request->username);
       
        return redirect("/home");
    }
}
  