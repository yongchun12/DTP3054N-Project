<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

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

        //search function start
        if(!empty(Request::get('id')))
        {
            $return = $return->where('department.id', '=', Request::get('id'));
        }

        if(!empty(Request::get('department_name')))
        {
            $return = $return->where('department.department_name', 'like', '%'.Request::get('department_name').'%');
        }

        if(!empty(Request::get('manager_id')))
        {
            //what column and get the value from the search input
            $return = $return->where('users.name', 'like', '%'.Request::get('manager_id').'%');
        }
        //search function end

        $return = $return->paginate(10);

        return $return;
    }
}
