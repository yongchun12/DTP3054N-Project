<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    public function get_employee_name()
    {
        #get the employee name from the user table
        //Define the relationship between attendance table and user table (Foreign Key)
        return $this->belongsTo(User::class, 'employee_id');
    }

    static public function getAttendanceList_Employee()
    {
        $return = self::select('attendance.*', 'users.name')
            ->join('users', 'users.id', '=', 'attendance.employee_id')
            ->where('attendance.employee_id', Auth::user()->id)
            ->orderBy('attendance.created_at', 'desc')
            ->paginate(10);

        return $return;
    }

    static public function getAttendanceList_Admin()
    {
        $return = self::select('attendance.*', 'users.name')
            ->join('users', 'users.id', '=', 'attendance.employee_id')
            ->orderBy('attendance.created_at', 'desc')
            ->paginate(10);

        //Return the data to the controller
        return $return;
    }
}
