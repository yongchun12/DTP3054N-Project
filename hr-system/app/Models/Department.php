<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'department';

    static public function getRecord()
    {
        $return = self::select('department.*', 'users.name')
            #Join the table from users ID and Department Table (employee ID)
            ->join('users', 'users.id', '=', 'department.manager_id')
            ->orderBy('department.created_at', 'desc');

        $return = $return->paginate(10);

        return $return;
    }
}
