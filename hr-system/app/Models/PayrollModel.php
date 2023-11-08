<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use function Laravel\Prompts\select;

class PayrollModel extends Model
{
    use HasFactory;

    protected $table = 'payroll';

    static public function getRecord()
    {

        $return = self::select('payroll.*', 'users.name')
            #Join the table from users ID and Payroll Table (employee ID)
            ->join('users', 'users.id', '=', 'payroll.employee_id')
            ->orderBy('payroll.id', 'desc');

        //search function start
        if(!empty(Request::get('id')))
        {
            $return = $return->where('payroll.id', '=', Request::get('id'));
        }

        if(!empty(Request::get('employee_id')))
        {
            $return = $return->where('users.name', 'like', '%'.Request::get('employee_id').'%');
        }

        if(!empty(Request::get('number_of_day_work')))
        {
            $return = $return->where('payroll.number_of_day_work', 'like', '%'.Request::get('number_of_day_work').'%');
        }
        //search function end

            $return = $return->paginate(10);

        return $return;
    }

    public function get_employee_name()
    {
        #get the employee name from the user table
        return $this->belongsTo(User::class, 'employee_id');
    }
}
