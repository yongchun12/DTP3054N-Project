<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $table = 'reply';

    static public function getForumReply()
    {
        $return = self::select('reply.*', 'users.name')
            ->join('users', 'users.id', '=', 'reply.employee_id')
            ->orderBy('reply.id', 'desc')
            ->paginate(10);

        return $return;
    }
}
