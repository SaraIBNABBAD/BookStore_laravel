<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'displaybook'])->name("view.home");
Route::get('/signup',[AuthController::class,'displaySignup'])->name("view.signUp");
Route::get('/login',[AuthController::class,'displayLogin'])->name("view.login");
Route::get('/admin',[AuthController::class,'displayAdmin'])->name("view.admin");
Route::post('/register',[AuthController::class,'signup'])->name("signup");
Route::post('/logadmin',[AuthController::class,'login'])->name("login");

// Route::middleware(["auth"])->group(function(){
//     Route::get('/logadmin',[AuthController::class,'logout'])->name("logout");
//     Route::middleware(['role:admin'])->prefix('admin')->group(function()
//     {Route::resource('/books',BookController::class);
//     Route::resource('/users',AdminController::class);
// });
// });
Route::get('/logout',[AuthController::class,'logout'])->name("logout");
    Route::prefix('admin')->group(function()
    {Route::resource('/books',BookController::class);
    Route::resource('/users',AdminController::class);});
Route::get('/bookcard',[HomeController::class,'displaybook'])->name("cardbook");
Route::get('/onebook',[HomeController::class,'showonebook'])->name("onebook");
