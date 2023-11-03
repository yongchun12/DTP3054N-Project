<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\LeaveApproveMail;
use App\Mail\RejectApproveMail;
use App\Models\Leave;
use App\Models\User;
use Auth;
use Mail;

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
        $data = Leave::leftJoin('users', 'leave.employee_id', 'users.id')
            ->select('leave.*', 'users.name')
            ->find($id);

        // 1 = Approve
        $data->leave_status = trim('1');

        $data->save();

        $user = User::find($data->employee_id);

        $user_email = $user -> email;

        //Send Email
        //$data means pass the $data value to the view
        Mail::to($user_email)->send(new LeaveApproveMail($data));

        //Return to original page
        return redirect()->back()->with('success', 'Leave has been approved!');

    }

    public function reject_leave($id, Request $request)
    {
        $data = Leave::leftJoin('users', 'leave.employee_id', 'users.id')
            ->select('leave.*', 'users.name')
            ->find($id);

        //2 : Reject
        $data->leave_status = trim(2);

        $data->save();

        $user = User::find($data->employee_id);

        $user_email = $user -> email;

        //Send Email
        //$data means pass the $data value to the view
        Mail::to($user_email)->send(new RejectApproveMail($data));

        //Return to original page
        return redirect()->back()->with('success', 'Leave has been Reject!');


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
            'from_leaveDate' => 'required',
            'to_leaveDate' => 'required',
        ]);

        $leave = new Leave;

        $leave->employee_id     = trim(Auth::user()->id);
        $leave->type_of_leave   = trim($request->type_of_leave);
        $leave->description     = trim($request->description);
        $leave->leave_status    = trim(0);
        $leave->from_leaveDate  = trim($request->from_leaveDate);
        $leave->to_leaveDate    = trim($request->to_leaveDate);

        $leave->save();

        return redirect('employee/leave')->with('success', 'Done Request!');
    }
}
