<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\User;
use Auth;

class LeaveController extends Controller
{
    //-------------------For Admin Site-------------------//
    public function dashboard_Admin(Request $request)
    {
        $data['getLeaveRecord'] = Leave::getLeaveRecord();

        $leave = Leave::leftJoin('users', 'leave.employee_id', 'users.id')
            ->select('leave.*', 'users.name')
            ->get();

        return view('admin.leave.list', $data, compact('leave'));
    }

    //Approve Leave
    public function approve_leave($id, Request $request)
    {
        $data['getLeaveRecord'] = Leave::find($id);

        $data->leave_status = trim(1);

        $data->save();

        //Return to original page
        return redirect()->back()->with('success', 'Leave has been approved!');

    }

    //-------------------For Employee Site-------------------//
    public function index_employeeSite()
    {
        return view('employee.leave.list');
    }

    public function create_employeeSite()
    {
        return view('employee.leave.create');
    }

    public function create_post_employeeSite(Request $request)
    {
//        dd($request->all());

        $leave = request()->validate([
            'type_of_leave' => 'required',
            'description' => 'required',
            'date_of_leave' => 'required',
        ]);

        $leave = new Leave;

        $leave->employee_id     = trim(Auth::user()->id);
        $leave->type_of_leave   = trim($request->type_of_leave);
        $leave->description     = trim($request->description);
        $leave->leave_status    = trim(0);
        $leave->date_of_leave   = trim($request->date_of_leave);

        $leave->save();

        return redirect('employee/leave')->with('success', 'Done Request!');
    }
}
