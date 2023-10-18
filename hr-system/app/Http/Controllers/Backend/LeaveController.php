<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class LeaveController extends Controller
{
    public function index()
    {
        return view('admin.leave.list');
    }

}
