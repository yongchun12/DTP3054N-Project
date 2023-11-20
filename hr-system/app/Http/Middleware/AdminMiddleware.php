<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware {
    public function handle ($request, Closure $next){

        if(Auth::check()){

            if (Auth::user()->is_role == '1') {

                #If user is admin then redirect to admin dashboard (Based on web.php)
                //Route::group(['middleware' => 'admin'], function (){
                return $next($request);

            } else {
                #If wrong user then logout
                Auth::logout();
                return redirect(url('/'));
            }

        }else{
            Auth::logout();
            return redirect(url('/'));
        }

    }
}

?>
