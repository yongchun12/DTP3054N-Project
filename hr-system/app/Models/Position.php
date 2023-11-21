<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'position';

    static public function getRecord()
    {
        $return = self::select('position.*', 'department.department_name')
            ->join('department', 'department.id', '=', 'position.department_id')
            ->orderBy('position.created_at', 'desc');

        $return = $return->paginate(10);

        return $return;
    }
}
