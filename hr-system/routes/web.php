<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;

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

#Login Page
Route::get('/', [AuthController::class, 'index']);

#Login Post
Route::post('login_post', [AuthController::class, 'login_post']);

#Forget Password Page
Route::get('forget_password', [AuthController::class, 'forget_password']);

#FOrget Password Post
Route::post('forget-password/post', [AuthController::class, 'forget_password_post']);

#Logout
Route::group(['middleware' => 'admin'], function (){

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

});
