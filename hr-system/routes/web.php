<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeesController;

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

#Depends on what you want to show for the link
#Login Page
Route::get('/', [AuthController::class, 'index']);

#Login Post
Route::post('login_post', [AuthController::class, 'login_post']);

#Forget Password Page
Route::get('forget_password', [AuthController::class, 'forget_password']);

#FOrget Password Post
Route::post('forget-password/post', [AuthController::class, 'forget_password_post']);

#Login
Route::group(['middleware' => 'admin'], function (){

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/employees', [EmployeesController::class, 'index']);

    #Create Employee
    Route::get('admin/employees/create', [EmployeesController::class, 'create']);
    Route::post('admin/employees/create', [EmployeesController::class, 'create_post']);

    #View Employee
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'view']);

    #Edit Employee
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit']);
    Route::post('admin/employees/edit/{id}', [EmployeesController::class, 'edit_update']);

    #Delete Employee
    Route::get('admin/employees/delete/{id}', [EmployeesController::class, 'delete']);
});

#Logout
Route::get('logout', [AuthController::class, 'logout']);
