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
//        $return = self::select('payroll.*')
//            ->orderBy('id', 'desc')
//            ->paginate(10);
//
//        return $return;

        $return = self::select('payroll.*', 'users.name')
            ->join('users', 'users.id', '=', 'payroll.employee_id')
            ->orderBy('payroll.id', 'desc')
            ->paginate(10);

        return $return;
    }

    public function get_employee_name()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
