<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'leave';

//    protected $fillable = 'leave';

    static public function getPendingLeaveRecord()
    {
        $return = self::select('leave.*', 'users.name', 'users.last_name')
            #Join the table from users ID and Leave Table (employee ID)
            ->join('users', 'users.id', '=', 'leave.employee_id')
            //because this column is varchar so need to put ''
            ->where('leave.leave_status', '=', '0');
        $return = $return->orderBy('leave.id', 'desc')
                            ->paginate(10);

        return $return;
    }

    static public function adminGetHistory()
    {
        $return = self::select('leave.*', 'users.name')
            ->join('users', 'users.id', '=', 'leave.employee_id');

            //search function start
        if(!empty(Request::get('id')))
        {
            $return = $return->where('leave.id', '=', Request::get('id'));
        }

        if(!empty(Request::get('name')))
        {
            $return = $return->where('users.name', 'like', '%'.Request::get('name').'%');
        }

        if(!empty(Request::get('from_leaveDate')))
        {
            $return = $return->where('leave.from_leaveDate', '=', Request::get('from_leaveDate'));
        }

        if(!empty(Request::get('to_leaveDate')))
        {
            $return = $return->where('leave.to_leaveDate', '=', Request::get('to_leaveDate'));
        }

        //search function end

        $return = $return->orderBy('leave.id', 'asc')
                            ->paginate(10);

        return $return;
    }

    static public function employeeGetHistory()
    {
        $return = self::select('leave.*')
            ->where('employee_id', '=', Auth::user()->id)
            ->orderBy('leave.id', 'asc')
            ->paginate(10);

        return $return;
    }

}
