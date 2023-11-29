<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\User;

class DepartmentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Department::getRecord();

        return view('admin.department.list', $data);
    }

    public function view($id)
    {
        $data['getRecord'] = Department::findOrFail($id);
        $data['getEmployee'] = User::all();

        return view('admin.department.view', $data);
    }

    public function create()
    {
        //get the employee name from the user table
        $data['getEmployee'] = User::select('*')->get();

        return view('admin.department.create', $data);
    }

    public function create_post(Request $request)
    {
        $department = new Department;

        $department->department_name         = trim($request->department_name);
        $department->department_description  = trim($request->department_description);
        $department->manager_id              = trim($request->manager_id);

        $department->save();

        return redirect('admin/department')->with('success', 'Department has been created successfully!');
    }

    public function edit($id)
    {
        $data['getRecord'] = Department::findOrFail($id);

        //get the employee name from the user table
        $data['getEmployee'] = User::select('*')->get();

        return view('admin.department.edit', $data);
    }

    public function edit_post($id, Request $request)
    {
        $department = Department::findOrFail($id);

        $department->department_name         = trim($request->department_name);
        $department->department_description  = trim($request->department_description);
        $department->manager_id              = trim($request->manager_id);

        $department->save();

        return redirect('admin/department')->with('success', 'Department has been updated successfully!');
    }

    public function delete($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect('admin/department')->with('success', 'Department has been deleted successfully!');
    }

}
