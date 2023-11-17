<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    static public function getAttendanceList()
    {
        $return = self::select('attendance.*', 'users.name', 'users.profile_picture')
            ->join('users', 'users.id', '=', 'attendance.employee_id')
            ->orderBy('attendance.created_at', 'desc')
            ->paginate(10);

        return $return;
    }
}
