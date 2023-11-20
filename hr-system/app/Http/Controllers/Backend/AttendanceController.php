<?php

namespace App\Http\Controllers\Backend;

use App\Exports\AttendanceExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Attendance;
use Auth;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{

    //-------------------Admin Site-------------------//
    public function list_adminSite()
    {
        $data['attendanceList'] = Attendance::getAttendanceList_Admin();

        return view('admin.attendance.list', $data);
    }

    public function attendance_export(Request $request)
    {
        return Excel::download(new AttendanceExport, 'Attendance_Record.xlsx');
    }

    public function create()
    {
        //get() is a helper function that returns all the data from the table
        $data['getEmployee'] = User::where('is_role', '0')->get();

        return view('admin.attendance.create', $data);
    }

    public function create_post(Request $request)
    {
        $attendance = new Attendance;

        $attendance->employee_id = trim($request->employee_id);
        $attendance->date = trim($request->date);
        $attendance->time_in = trim($request->time_in);
        $attendance->time_out = trim($request->time_out);

        $attendance->save();

        return redirect('admin/attendance')->with('success', 'Attendance Record has been created successfully!');
    }

    public function view($id)
    {
        $data['getRecord'] = Attendance::find($id);
        return view('admin.attendance.view', $data);
    }

    public function edit($id, Request $request)
    {
        #If that is belongs to employee role
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();

        #Or if want to get all the record include HR and employees can use this
//        $data['getEmployee'] = User::select('users.*')->get();

        $data['getRecord'] = Attendance::find($id);
        return view('admin.attendance.edit', $data);
    }

    public function edit_update($id ,Request $request)
    {
        $attendance = Attendance::find($id);

        $attendance->employee_id = trim($request->employee_id);
        $attendance->date = trim($request->date);
        $attendance->time_in = trim($request->time_in);
        $attendance->time_out = trim($request->time_out);

        $attendance->save();

        return redirect('admin/attendance')->with('success', 'Attendance Record has been updated successfully!');
    }

    public function delete($id)
    {
        $attendance = Attendance::find($id);

        $attendance->delete();

        return redirect('admin/attendance')->with('success', 'Attendance Record has been deleted successfully!');
    }

    //-------------------Employee Site-------------------//
    public function employee_punchIn()
    {
        $attendance = Attendance::where('employee_id', Auth::user()->id)
            //Take the latest data row
            //the result will be ordered by the table's created_at column in descending order
            ->latest()
            //get First Record based on the query
            ->first();

        //If the user has already punched in and dont have punched out for the data row
        //This is check from the model above
        if ($attendance && is_null($attendance->time_out)) {
            return redirect('employee/dashboard')->with('error', 'You have already punched in.');
        }

        $attendance = new Attendance;

        $attendance->employee_id = Auth::user()->id;

        //now() is a helper function that returns the current date and time
        $attendance->date = now();
        $attendance->time_in = now();

        $attendance->save();

        //redirect() is a helper function that redirects the user to the specified page
        //back() is a helper function that redirects the user to the previous page
        //with() is a helper function that flashes a session data to the page
        return redirect()->back()->with('success', 'Punched in successfully.');
    }

    public function employee_punchOut()
    {
        $attendance = Attendance::where('employee_id', Auth::user()->id)
            // Check the latest row has no punch out
            ->whereNull('time_out')
            ->latest()
            ->first();

        //If the latest record has no punch out yet or the data row has completed
        //就是check有没有row是没有punch out的 如果有的话就可以punch out 没有的话就不能punch out
        if (!$attendance) {
            return redirect('employee/dashboard')->with('error', 'You need to punch in first.');
        }

        $attendance->time_out = now();

        $attendance->save();

        return redirect('employee/dashboard')->with('success', 'Punched out successfully.');
    }

    public function list_employeeSite()
    {
        $data['attendanceList'] = Attendance::getAttendanceList_Employee();

        return view('employee.attendance.list', $data);
    }

}
