<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\EmployeesNewCreateMail;

use App\Models\User;
use App\Models\Department;
use App\Models\Position;
use App\Exports\EmployeeExport;
use Str;
use Hash;
use Mail;
use File;

use Maatwebsite\Excel\Facades\Excel;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['getRecord'] = User::getRecord();
        return view('admin.employees.list', $data);
    }

    public function employee_export(Request $request)
    {
        return Excel::download(new EmployeeExport, 'Employee.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //Department
        $data['getDepartment'] = Department::getRecord();

        //Position
        $data['getPosition'] = Position::getRecord();

        //Manager
        $data['getManager'] = User::get();

        return view('admin.employees.create', $data);
    }

    public function create_post(Request $request)
    {
//        #Show the details of the form
//        dd($request->all());

        //Valiadation
        $user = request()->validate([
            'staff_id' => 'required|unique:users',
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'phone_number' => 'required|unique:users',
            'password' => 'required',
            'hire_date' => 'required',
            'position_id' => 'required',
            'manager_id' => 'required',
            'department_id' => 'required',
            'category_employee' => 'required',
            'bank_acc' => 'required|unique:users',
            'bank_name' => 'required',
            'epf_no' => 'required|unique:users',
            'pcb_no' => 'required|unique:users',
            'ic_no' => 'required|unique:users',
        ]);

        $user = new User;

        $user->staff_id             = trim($request->staff_id);
        $user->name                 = trim($request->name);
        $user->last_name            = trim($request->last_name);
        $user->email                = trim($request->email);

        #Profile Picture
        if(!empty($request->file('profile_picture'))){
            //Get the file from the form with the name
            $file               = $request->file('profile_picture');

            //Random String
            $randomStr          = Str::random(30);
            $filename           = $randomStr.'.'.$file->getClientOriginalExtension();

            //public_path() is to get the path from the public folder
            $file->move(public_path('img/profile_picture'), $filename);
            $user->profile_picture = $filename;
        }

        #get the password before hash
        $password_beforeHash        = trim($request->password);

        #Hash the password from normal key to encrypted key
        $user->password             = Hash::make($password_beforeHash);

        //Employee Details
        $user->phone_number         = trim($request->phone_number);
        $user->address              = trim($request->address);
        $user->hire_date            = trim($request->hire_date);
        $user->position_id           = trim($request->position_id);
        $user->manager_id           = trim($request->manager_id);
        $user->department_id        = trim($request->department_id);

        //New Column
        $user->category_employee    = trim($request->category_employee);

        //Leave Days
        $user->annual_leaveDays     = trim($request->annual_leaveDays);
        $user->medical_leaveDays    = trim($request->medical_leaveDays);

        $user->bank_acc             = trim($request->bank_acc);
        $user->bank_name            = trim('Maybank');
        $user->epf_no               = trim($request->epf_no);
        $user->pcb_no               = trim($request->pcb_no);
        $user->ic_no                = trim($request->ic_no);

        //Default Value (Role)
        $user->is_role              = trim($request->is_role); // 0 - Employee, 1 - HR

        $user->save();

        #Record the password before hash and pass the value to the email templates
        $user->password_beforeHash = $password_beforeHash;

        Mail::to($user->email)->send(new EmployeesNewCreateMail($user));

        return redirect('admin/employees')->with('success', 'Employee created successfully.');
    }

    public function view($id)
    {
        $data['getRecord'] = User::find($id);
        //Department
        $data['getDepartment'] = Department::getRecord();

        //Position
        $data['getPosition'] = Position::getRecord();

        //Manager
        $data['getManager'] = User::get();
        return view('admin.employees.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['getRecord'] = User::find($id);

        //Department
        $data['getDepartment'] = Department::getRecord();

        //Position
        $data['getPosition'] = Position::getRecord();

        //Manager
        $data['getManager'] = User::get();
        return view('admin.employees.edit', $data);
    }

    public function edit_update($id, Request $request)
    {
//        $user = request()->validate([
//           'email' => 'required|unique:users,email,'.$id,
//            'phone_number' => 'required|unique:users,phone_number,'.$id,
//        ]);

        //Valiadation
        $user = request()->validate([
           'email' => 'required|unique:users,email,'.$id,
            'phone_number' => 'required|unique:users,phone_number,'.$id,
            'bank_acc' => 'required|unique:users,bank_acc,'.$id,
            'epf_no' => 'required|unique:users,epf_no,'.$id,
            'pcb_no' => 'required|unique:users,pcb_no,'.$id,
            'ic_no' => 'required|unique:users,ic_no,'.$id,
        ]);

        $user = User::find($id);

        $user->name                 = trim($request->name);
        $user->last_name            = trim($request->last_name);
        $user->email                = trim($request->email);

//        #Hash the password from normal key to encrypted key
//        $user->password             = bcrypt(trim($request->password));

        #Profile Picture
        if(!empty($request->file('profile_picture'))){

            if (!empty($user->profile_picture) && file_exists(public_path('img/profile_picture/'.$user->profile_picture))) {
                unlink(public_path('img/profile_picture/'.$user->profile_picture));
            }

            //Get the file from the form with the name
            $file               = $request->file('profile_picture');

            //Random String
            $randomStr          = Str::random(30);
            $filename           = $randomStr.'.'.$file->getClientOriginalExtension();

            //public_path() is to get the path from the public folder
            $file->move(public_path('img/profile_picture'), $filename);
            $user->profile_picture = $filename;
        }

        //Employee Details
        $user->phone_number         = trim($request->phone_number);
        $user->address              = trim($request->address);
        $user->hire_date            = trim($request->hire_date);
        $user->position_id          = trim($request->position_id);
        $user->manager_id           = trim($request->manager_id);
        $user->department_id        = trim($request->department_id);

        //New Column
        $user->category_employee    = trim($request->category_employee);

        //Leave Days
        $user->annual_leaveDays     = trim($request->annual_leaveDays);
        $user->medical_leaveDays    = trim($request->medical_leaveDays);

        $user->bank_acc             = trim($request->bank_acc);
        $user->bank_name            = trim('Maybank');
        $user->epf_no               = trim($request->epf_no);
        $user->pcb_no               = trim($request->pcb_no);
        $user->ic_no                = trim($request->ic_no);

        //Default Value (Role)
        $user->is_role              = trim($request->is_role); // 0 - Employee, 1 - HR

        $user->save();

        return redirect('admin/employees')->with('success', 'Employee details update successfully.');
    }

    public function delete($id)
    {
        $recordDelete = User::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Employee deleted successfully.');
    }

}
