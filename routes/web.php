<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorlistController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SigninController;
use App\Models\Doctorlist;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
 
});

Route::resource("/home", HomeController::class);

Route::resource("/room", RoomController::class);

Route::resource("/drug", DrugController::class);

Route::resource("/doctor", DoctorController::class);

Route::resource("/message", MessageController::class);

Route::resource("/doctorlist", DoctorlistController::class);

Route::get("/login", function(){
    return view("login");
});

Route::post("/login", [LoginController::class,"login"]);

Route::get("/signin", function(){
    return view("signin");
});

Route::post("/signin", [SigninController::class,"signin"]);

Route::get("/lang/{locale}", function($locale){ 

    session()->put("locale", $locale);

    return redirect()->back();
});