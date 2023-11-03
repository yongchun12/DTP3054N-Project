<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

use App\Models\User;
use App\Models\Leave;
use App\Models\Forum;

class DashboardController extends Controller {

    public function dashboard(Request $request) {

        if(Auth::user()->is_role == 1){

            $data['getEmployeeCount'] = User::count();
            $data['getPendingLeave'] = Leave::where('leave_status', '0')->count();
            $data['getTotalLeaveCount'] = Leave::count();
            $data['getTotalForum'] = Forum::count();

            #dashboard will redirect to what page or what message
            return view('admin.dashboard', $data);

        }else if (Auth::user()->is_role == 0) {

            return view('employee.dashboard');

        }

    }

}

?>
