<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;
use function Webmozart\Assert\Tests\StaticAnalysis\email;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getRecord() {
//        $return = self::select('users.*')
//            ->orderBy('id', 'desc')
//            #show one page list how many data
//            ->paginate(10);
//
//        return $return;

        #Search Function
        $return = self::select('users.*');

            //search box start
                if(!empty(Request::get('id')))
                {
                    //Like SQL Command where id = the id in search input
                    $return = $return->where('staff_id', 'like', '%' .Request::get('id'). '%');
                }

                if(!empty(Request::get('name')))
                {
                    $return = $return->where('name', 'like', '%' .Request::get('name'). '%');
                }

                if(!empty(Request::get('last_name')))
                {
                    $return = $return->where('last_name', 'like', '%' .Request::get('last_name'). '%');
                }

                if(!empty(Request::get('email')))
                {
                    $return = $return->where('email', 'like', '%' .Request::get('email'). '%');
                }
            //search box end

            $return = $return
                ->orderBy('id', 'desc')
                //show one page list how many data can show
                ->paginate(10);

        return $return;
    }
}
