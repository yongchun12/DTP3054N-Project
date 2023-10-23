<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\User;
use Auth;

class LeaveController extends Controller
{
    //-------------------For Admin Site-------------------//
    public function dashboard_Admin(Request $request)
    {
        $data['getLeaveRecord'] = Leave::getPendingLeaveRecord();

//        $leave = Leave::leftJoin('users', 'leave.employee_id', 'users.id')
//            ->select('leave.*', 'users.name')
//            ->where('leave.leave_status', '=', 0)
//            ->get();

        return view('admin.leave.list', $data);

    }

    public function admin_leaveHistory(Request $request)
    {
        $data['getHistory'] = Leave::adminGetHistory();
        return view('admin.leave.history', $data);
    }

    //Approve Leave
    public function approve_leave($id, Request $request)
    {
        $data = Leave::find($id);

        $data->leave_status = trim('1');

        $data->save();

        //Return to original page
        return redirect()->back()->with('success', 'Leave has been approved!');

//        if (DB::table('leave')->where(["id" => $id])->update(['leave_status' => 1])) {
//            return redirect()->back()->with('success', 'Leave has been approved!');
//        } else {
//            return redirect()->back()->with('error', 'Error');
//        }

    }

    public function reject_leave($id, Request $request)
    {
        $data = Leave::find($id);

        $data->leave_status = trim(2);

        $data->save();

        //Return to original page
        return redirect()->back()->with('success', 'Leave has been Reject!');

//        if (DB::table('leave')->where(["id" => $id])->update(['leave_status' => 2])) {
//            return redirect()->back()->with('success', 'Leave has been Reject!');
//        } else {
//            return redirect()->back()->with('error', 'Error');
//        }

    }

    //-------------------For Employee Site-------------------//
    public function index_employeeSite()
    {
        $data['getOwnLeaveRecord'] = Leave::employeeGetHistory();
        return view('employee.leave.list', $data);
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
