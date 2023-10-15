<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller {

    public function dashboard(Request $request) {

        if(Auth::user()->is_role == 1){
            #dashboard will redirect to where or what message
            return view('admin.dashboard');
        }else if (Auth::user()->is_role == 0){
            return view('employee.dashboard');
        }


    }

}

?>
