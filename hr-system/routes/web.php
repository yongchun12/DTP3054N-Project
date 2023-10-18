<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeesController;
use App\Http\Controllers\Backend\PayrollController;
use App\Http\Controllers\Backend\LeaveController;

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
#get is used to show the page and also get the input, post is used to submit the form to database to verification

//-------------------Login-------------------//
Route::get('/', [AuthController::class, 'index']);
Route::post('login_post', [AuthController::class, 'login_post']);

//-------------------Forget Password-------------------//
Route::get('forget_password', [AuthController::class, 'forget_password']);
Route::post('forget-password/post', [AuthController::class, 'forget_password_post']);

//-------------------For Admin Site-------------------//
Route::group(['middleware' => 'admin'], function (){

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    //-------------------Employees-------------------//
    #Employees List
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

    //-------------------Payroll-------------------//
    #Payroll List
    Route::get('admin/payroll', [PayrollController::class, 'index']);

    #Create Payroll Record
    Route::get('admin/payroll/create', [PayrollController::class, 'create']);
    Route::post('admin/payroll/create', [PayrollController::class, 'create_post']);

    #View Payroll Record
    Route::get('admin/payroll/view/{id}', [PayrollController::class, 'view']);

    #Edit Payroll Record
    Route::get('admin/payroll/edit/{id}', [PayrollController::class, 'edit']);
    Route::post('admin/payroll/edit/{id}', [PayrollController::class, 'edit_update']);

    #Delete Payroll Record
    Route::get('admin/payroll/delete/{id}', [PayrollController::class, 'delete']);

    #Excel Export
    Route::get('admin/payroll_export', [PayrollController::class, 'payroll_export']);

    #PDF Export
    Route::get('admin/payroll/pdf/{id}', [PayrollController::class, 'salary_pdf']);

    //-------------------Leave-------------------//
    Route::get('admin/leave', [LeaveController::class, 'index']);

});

//-------------------For Employee Site-------------------//
Route::group(['middleware' => 'employee'], function (){
    Route::get('employee/dashboard', [DashboardController::class, 'dashboard']);

    //-------------------Employee Payroll-------------------//
    #Employee Payroll List
    Route::get('employee/payroll', [PayrollController::class, 'index_employeeSite']);

    #View Payroll Record
    Route::get('employee/payroll/view/{id}', [PayrollController::class, 'view_employeeSite']);

    #PDF Export
    Route::get('employee/payroll/pdf/{id}', [PayrollController::class, 'salary_pdf_EmployeeSite']);
});

//-------------------Logout-------------------//
Route::get('logout', [AuthController::class, 'logout']);
