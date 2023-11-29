<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class EmployeeMiddleware {
    public function handle ($request, Closure $next){

        if(Auth::check()){

            if (Auth::user()->is_role == '0') {

                #If user is admin then redirect to admin dashboard (Based on web.php)
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
