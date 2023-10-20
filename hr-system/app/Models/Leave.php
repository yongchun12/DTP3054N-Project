<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'leave';

    static public function getLeaveRecord()
    {
        $return = self::select('leave.*', 'users.name')
            #Join the table from users ID and Leave Table (employee ID)
            ->join('users', 'users.id', '=', 'leave.employee_id')
            ->orderBy('leave.id', 'desc')
            ->paginate(10);

        return $return;
    }
}
