<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeesController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\PositionController;
use App\Http\Controllers\Backend\ForumController;
use App\Http\Controllers\Backend\AttendanceController;
use App\Http\Controllers\Backend\LeaveController;
use App\Http\Controllers\Backend\MyAccountController;
use App\Http\Controllers\Backend\PayrollController;
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

/*

- Depends on what you want to show for the link

- Get: getting all the data from the database (showing the data)
- get is used to show the page and also get the input

- Post: submitting the data to the database (inserting the data)
- post is used to submit the form to database to verification
- (only for the form that need to fill in with the tag <form>)

Note:
- Get and Post de url should be the same

*/

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

    #Excel Export
    Route::get('admin/employee_export', [EmployeesController::class, 'employee_export']);

    //-------------------Department-------------------//
    #Department List
    Route::get('admin/department', [DepartmentController::class, 'list']);

    #Create Department
    Route::get('admin/department/create', [DepartmentController::class, 'create']);
    Route::post('admin/department/create', [DepartmentController::class, 'create_post']);

    #View Department
    Route::get('admin/department/view/{id}', [DepartmentController::class, 'view']);

    #Edit Department
    Route::get('admin/department/edit/{id}', [DepartmentController::class, 'edit']);
    Route::post('admin/department/edit/{id}', [DepartmentController::class, 'edit_post']);

    #Delete Department
    Route::get('admin/department/delete/{id}', [DepartmentController::class, 'delete']);

    //-------------------Position-------------------//
    #Position List
    Route::get('admin/position', [PositionController::class, 'list']);

    #Create Position
    Route::get('admin/position/create', [PositionController::class, 'create']);
    Route::post('admin/position/create', [PositionController::class, 'create_post']);

    #View Position
    Route::get('admin/position/view/{id}', [PositionController::class, 'view']);

    #Edit Position
    Route::get('admin/position/edit/{id}', [PositionController::class, 'edit']);
    Route::post('admin/position/edit/{id}', [PositionController::class, 'edit_post']);

    #Delete Position
    Route::get('admin/position/delete/{id}', [PositionController::class, 'delete']);

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

    //-------------------Attendance-------------------//
    #Attendance List
    Route::get('admin/attendance', [AttendanceController::class, 'list_adminSite']);

    #Excel Export
    Route::get('admin/attendance_export', [AttendanceController::class, 'attendance_export']);

    #Create Attendance Record
    Route::get('admin/attendance/create', [AttendanceController::class, 'create']);
    Route::post('admin/attendance/create', [AttendanceController::class, 'create_post']);

    #View Attendance Record
    Route::get('admin/attendance/view/{id}', [AttendanceController::class, 'view']);

    #Edit Attendance Record
    Route::get('admin/attendance/edit/{id}', [AttendanceController::class, 'edit']);
    Route::post('admin/attendance/edit/{id}', [AttendanceController::class, 'edit_update']);

    #Delete Attendance Record
    Route::get('admin/attendance/delete/{id}', [AttendanceController::class, 'delete']);

    //-------------------Leave-------------------//
    #Pending Request
    Route::get('admin/leave/pending', [LeaveController::class, 'dashboard_Admin']);

    #Leave Request Approve
    Route::get('admin/leave/approve/{id}', [LeaveController::class, 'approve_leave']);

    #Leave Request Reject
    Route::get('admin/leave/reject_reason/{id}', [LeaveController::class, 'rejectLeave_reason']);
    Route::post('admin/leave/reject/{id}', [LeaveController::class, 'reject_leave']);

    #Leave History for all Employees
    Route::get('admin/leave/history', [LeaveController::class, 'admin_leaveHistory']);

    #Leave History View
    Route::get('admin/leave/history/view/{id}', [LeaveController::class, 'admin_leaveHistoryView']);

    #Leave History Delete
    Route::get('admin/leave/history/delete/{id}', [LeaveController::class, 'admin_leaveHistoryDelete']);

    //-------------------Forum-------------------//
    #Forum List
    Route::get('admin/forum', [ForumController::class, 'admin_postsList']);

    #Forum Create / Post Create
    Route::get('admin/forum/posts/create', [ForumController::class, 'posts_create']);
    Route::post('admin/forum/posts/create', [ForumController::class, 'postsCreate_post']);

    #View Topic
    Route::get('admin/forum/view/{id}', [ForumController::class, 'admin_topicView']);

    #Edit Topic
    Route::get('admin/forum/edit/{id}', [ForumController::class, 'admin_edit']);
    Route::post('admin/forum/edit/{id}', [ForumController::class, 'admin_editPost']);

    #Forum Delete
    Route::get('admin/forum/delete/{id}', [ForumController::class, 'admin_postDelete']);

    //-----Reply-----//
    #Reply Create
    Route::post('admin/forum/view/{id}', [ForumController::class, 'admin_replyCreate']);

    #Reply Edit
    Route::get('admin/forum/reply/edit/{id}', [ForumController::class, 'admin_replyEdit']);
    Route::post('admin/forum/reply/edit/{id}', [ForumController::class, 'admin_replyEditPost']);

    #Reply Delete
    Route::get('admin/forum/reply/delete/{id}', [ForumController::class, 'admin_replyDelete']);

    //-------------------My Account-------------------//
    #Profile
    Route::get('admin/profile', [MyAccountController::class, 'admin_profile']);

    #Change Password
    Route::get('admin/change_password', [MyAccountController::class, 'admin_password']);
    Route::post('admin/change_password/update', [MyAccountController::class, 'update_password']);

    #Change Profile Picture
    Route::get('admin/change_profile_picture', [MyAccountController::class, 'admin_profilePicture']);
    Route::post('admin/change_profile_picture/update', [MyAccountController::class, 'update_profilePicture']);

});

//-------------------For Employee Site-------------------//
Route::group(['middleware' => 'employee'], function (){
    Route::get('employee/dashboard', [DashboardController::class, 'dashboard']);

    //-------------------Payroll-------------------//
    #Employee Payroll List
    Route::get('employee/payroll', [PayrollController::class, 'index_employeeSite']);

    #View Payroll Record
    Route::get('employee/payroll/view/{id}', [PayrollController::class, 'view_employeeSite']);

    #PDF Export
    Route::get('employee/payroll/pdf/{id}', [PayrollController::class, 'salary_pdf_employeeSite']);

    //-------------------Attendance-------------------//
    #Punch In
    Route::post('employee/attendance/punch_in', [AttendanceController::class, 'employee_punchIn']);

    #Punch Out
    Route::post('employee/attendance/punch_out', [AttendanceController::class, 'employee_punchOut']);

    #Attendance List
    Route::get('employee/attendance', [AttendanceController::class, 'list_employeeSite']);

    //-------------------Leave-------------------//
    #Employee Leave List
    Route::get('employee/leave', [LeaveController::class, 'index_employeeSite']);

    #Create Leave Request
    Route::get('employee/leave/create', [LeaveController::class, 'create_employeeSite']);
    Route::post('employee/leave/create', [LeaveController::class, 'create_post_employeeSite']);

    #View Leave Record
    Route::get('employee/leave/view/{id}', [LeaveController::class, 'view_employeeSite']);

    #Delete Leave Record
    Route::get('employee/leave/delete/{id}', [LeaveController::class, 'delete_employeeSite']);

    //-------------------Forum-------------------//
    #Forum List
    Route::get('employee/forum', [ForumController::class, 'employee_postsList']);

    #Forum Create / Post Create
    Route::get('employee/forum/posts/create', [ForumController::class, 'employee_postsCreate']);
    Route::post('employee/forum/posts/create', [ForumController::class, 'employee_postsCreatePost']);

    #View Topic
    Route::get('employee/forum/view/{id}', [ForumController::class, 'employee_topicView']);

    #Edit Topic
    Route::get('employee/forum/edit/{id}', [ForumController::class, 'employee_edit']);
    Route::post('employee/forum/edit/{id}', [ForumController::class, 'employee_editPost']);

    #Forum Delete
    Route::get('employee/forum/delete/{id}', [ForumController::class, 'employee_delete']);

    //-----Reply-----//
    #Reply Create
    Route::post('employee/forum/view/{id}', [ForumController::class, 'employee_replyCreate']);

    #Reply Edit
    Route::get('employee/forum/reply/edit/{id}', [ForumController::class, 'employee_replyEdit']);
    Route::post('employee/forum/reply/edit/{id}', [ForumController::class, 'employee_replyEditPost']);

    #Reply Delete
    Route::get('employee/forum/reply/delete/{id}', [ForumController::class, 'employee_replyDelete']);

    //-------------------My Account-------------------//
    #Change Details (Password / Profile Picture)
    Route::get('employee/change_details', [MyAccountController::class, 'employee_changeDetails']);

    #Update Details
    Route::post('employee/change_details/update', [MyAccountController::class, 'update_employee_details']);

    #Profile
    Route::get('employee/profile', [MyAccountController::class, 'employee_profile']);

    #Change Password
    Route::get('employee/change_password', [MyAccountController::class, 'employee_password']);
    Route::post('employee/change_password/update', [MyAccountController::class, 'employee_update_password']);

    #Change Profile Picture
    Route::get('employee/change_profile_picture', [MyAccountController::class, 'employee_profilePicture']);
    Route::post('employee/change_profile_picture/update', [MyAccountController::class, 'employee_update_profilePicture']);

});

//-------------------Logout-------------------//
Route::get('logout', [AuthController::class, 'logout']);
