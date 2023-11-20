<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
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

    //Approve Leave
    public function approve_leave($id, Request $request)
    {
        $leave = Leave::leftJoin('users', 'leave.employee_id', 'users.id')
            ->select('leave.*', 'users.name')
            ->find($id);

        //Find User Details
        $user = User::find($leave->employee_id);

        $from = Carbon::parse($leave->from_leaveDate);
        $to = Carbon::parse($leave->to_leaveDate);
        // Calculate the duration including the end date
        $duration = $from->diffInWeekdays($to);

        // Check if the end date is a weekday to include it in the count
        if ($to->isWeekday()) {
            $duration += 1;
        }

        switch ($leave->type_of_leave) {
            case 1: // Annual Leave

                //If user annual leave days more than leave duration
                if ($user->annual_leaveDays >= $duration) {
                    $user->annual_leaveDays -= $duration;
                } else {
                    return redirect()->back()->with('error', 'Not enough annual leave days.');
                }
                break;

            case 2: // Medical Leave

                //If user medical leave days more than leave duration
                if ($user->medical_leaveDays >= $duration) {
                    $user->medical_leaveDays -= $duration;
                } else {
                    return redirect()->back()->with('error', 'Not enough medical leave days.');
                }
                break;

            default:
                // Handle other leave types, e.g., Unpaid Leave
                break;
        }

        $leave->leave_status = trim('1'); // 1 = Approve

        //Save the leave Data
        $leave->save();

        $user->save();

        $user_email = $user -> email;

        //Send Email
        //$data means pass the $data value to the view
        Mail::to($user_email)->send(new LeaveApproveMail($leave));

        //Return to original page
        return redirect()->back()->with('success', 'Leave has been approved!');

    }

    public function rejectLeave_reason($id, Request $request)
    {
        $data['getRecord'] = Leave::leftJoin('users', 'leave.employee_id', 'users.id')
            ->select('leave.*', 'users.name')
            ->find($id);

        return view('admin.leave.reject_reasonView', $data);
    }

    public function reject_leave($id, Request $request)
    {
        $data = Leave::leftJoin('users', 'leave.employee_id', 'users.id')
            ->select('leave.*', 'users.name')
            ->find($id);

        $data->reject_reason    = trim($request->reject_reason);

        //2 : Reject
        $data->leave_status     = trim(2);

        $data->save();

        $user = User::find($data->employee_id);

        $user_email = $user -> email;

        //Send Email
        //$data means pass the $data value to the view
        Mail::to($user_email)->send(new RejectApproveMail($data));

        //Return to original page
        return redirect('admin/leave/pending')->with('success', 'Leave has been Reject!');

    }

    public function admin_leaveHistory(Request $request)
    {
        $data['getHistory'] = Leave::adminGetHistory();
        return view('admin.leave.history', $data);
    }

    public function admin_leaveHistoryView($id, Request $request)
    {
        $data['getRecord'] = Leave::leftJoin('users', 'leave.employee_id', 'users.id')
            ->select('leave.*', 'users.name')
            ->find($id);

        return view('admin.leave.history_view', $data);
    }

    public function admin_leaveHistoryDelete($id)
    {
        $data = Leave::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Leave Record has been deleted!');
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

    public function view_employeeSite($id)
    {
        $data['getRecord'] = Leave::leftJoin('users', 'leave.employee_id', 'users.id')
            ->select('leave.*', 'users.name')
            ->find($id);

        return view('employee.leave.view', $data);
    }

    public function delete_employeeSite($id)
    {
        $data = Leave::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Leave Record has been deleted!');
    }
}
