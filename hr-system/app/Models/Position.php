<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Position extends Model
{
    use HasFactory;

    protected $table = 'position';

    static public function getRecord()
    {
        $return = self::select('position.*', 'department.department_name')
            ->join('department', 'department.id', '=', 'position.department_id')
            ->orderBy('position.created_at', 'desc');

        //search function start
        if(!empty(Request::get('id')))
        {
            $return = $return->where('position.id', '=', Request::get('id'));
        }

        if(!empty(Request::get('position_name')))
        {
            $return = $return->where('position.position_name', 'like', '%'.Request::get('position_name').'%');
        }

        if(!empty(Request::get('department_id')))
        {
            //what column and get the value from the search input
            $return = $return->where('department.department_name', 'like', '%'.Request::get('department_id').'%');
        }
        //search function end

        $return = $return->paginate(10);

        return $return;
    }
}
