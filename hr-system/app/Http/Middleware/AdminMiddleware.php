<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware {
    public function handle ($request, Closure $next){

        if(Auth::check()){

            if (Auth::user()->is_role == '1') {

                #If user is admin then redirect to admin dashboard (Based on web.php)
                return $next($request);

            } else {
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
