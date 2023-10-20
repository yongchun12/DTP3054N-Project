<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.employees.create');
    }

    public function create_post(Request $request)
    {
//        #Show the details of the form
//        dd($request->all());

        $user = request()->validate([
            'staff_id' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone_number' => 'required|unique:users',
            'password' => 'required',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required',
            'commission' => 'required',
            'manager_id' => 'required',
            'department_id' => 'required',
        ]);

        $user = new User;

        $user->staff_id = trim('EMP-'.$request->staff_id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email.'@hr-system.com');

        #Hash the password from normal key to encrypted key
        $user->password = bcrypt(trim($request->password));
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission = trim($request->commission);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->is_role = 0; // 0 - Employee, 1 - HR
        $user->save();

        return redirect('admin/employees')->with('success', 'Employee created successfully.');
    }

    public function view($id)
    {
        $data['getRecord'] = User::find($id);
        return view('admin.employees.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['getRecord'] = User::find($id);
        return view('admin.employees.edit', $data);
    }

    public function edit_update($id, Request $request)
    {
        $user = request()->validate([
           'email' => 'required|unique:users,email,'.$id,
            'phone_number' => 'required|unique:users,phone_number,'.$id,
        ]);

        $user = User::find($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);

//        #Hash the password from normal key to encrypted key
//        $user->password = bcrypt(trim($request->password));
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission = trim($request->commission);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->is_role = 0; // 0 - Employee, 1 - HR
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
