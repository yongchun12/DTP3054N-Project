<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $table = 'forum';

    static public function getPosts()
    {
        $return = self::select('forum.*', 'users.name', 'users.profile_picture')
            ->join('users', 'users.id', '=', 'forum.employee_id')
            ->orderBy('forum.created_at', 'desc')
            ->paginate(10);

        return $return;
    }

}
