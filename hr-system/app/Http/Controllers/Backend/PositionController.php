<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Position;
use App\Models\Department;

class PositionController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Position::getRecord();

        return view('admin.position.list', $data);
    }

    public function view($id)
    {
        $data['getDepartment'] = Department::select('*')->get();
        $data['getRecord'] = Position::findOrFail($id);

        return view('admin.position.view', $data);
    }

    public function create()
    {
        //get the department name from the department table
        $data['getDepartment'] = Department::select('*')->get();

        return view('admin.position.create', $data);
    }

    public function create_post(Request $request)
    {
        $position = new Position;

        $position->position_name         = trim($request->position_name);
        $position->position_description  = trim($request->position_description);
        $position->department_id         = trim($request->department_id);

        $position->save();

        return redirect('admin/position')->with('success', 'Position has been created successfully!');
    }

    public function edit($id)
    {
        $data['getDepartment'] = Department::select('*')->get();
        $data['getRecord'] = Position::findOrFail($id);

        return view('admin.position.edit', $data);
    }

    public function edit_post($id, Request $request)
    {
        $position = Position::findOrFail($id);

        $position->position_name         = trim($request->position_name);
        $position->position_description  = trim($request->position_description);
        $position->department_id         = trim($request->department_id);

        $position->save();

        return redirect('admin/position')->with('success', 'Position has been updated successfully!');
    }

    public function delete($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect('admin/position')->with('success', 'Position has been deleted successfully!');
    }
}
