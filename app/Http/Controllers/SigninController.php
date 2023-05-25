<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SigninController extends Controller
{
    public function signin( Request $request){
        Log::channel('customlog')->info("$request->username is signin to our system");
        $request->validate([
            "username"=>"required|alpha|between:4,12", 
            "password"=>"required|numeric|digits_between:8,12",
            "age"=>"required|numeric|gt:20|min:2",
        ]);
        return redirect("/home");
    }
}
