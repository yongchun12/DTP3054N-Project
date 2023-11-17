<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Attendance;
use Auth;

class AttendanceController extends Controller
{

    //-------------------Employee Site-------------------//
    public function employee_punchIn()
    {
        $attendance = Attendance::where('employee_id', Auth::user()->id)
            ->latest()
            ->first();

        //If the user has already punched in and dont have punched out for the data row
        if ($attendance && is_null($attendance->punch_out)) {
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
            // Check which row has no punch out
            ->whereNull('time_out')
            ->latest()
            ->first();

        //If the user has already punched out
        if (!$attendance) {
            return redirect('employee/dashboard')->with('error', 'You need to punch in first.');
        }

        $attendance->time_out = now();

        $attendance->save();

        return redirect('employee/dashboard')->with('success', 'Punched out successfully.');
    }

    public function index_employeeSite()
    {
        return view('employee.attendance.list');
    }

}
