<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Str;

class MyAccountController extends Controller
{
    //-------------------Admin Site-------------------//
    public function admin_myAccount(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.my_account', $data);
    }

    public function update_admin_myAccount(Request $request)
    {
//        dd($request->all());

        $user               = User::find(Auth::user()->id);
        $user->name         = trim($request->name);
        $user->last_name    = trim($request->last_name);

        if(!empty($request->password)){
            $user->password     = bcrypt(trim($request->password));
        }

        #Profile Picture
        if(!empty($request->file('profile_picture'))){

            if (!empty($user->profile_picture) && file_exists(public_path('img/profile_picture/'.$user->profile_picture))) {
                unlink(public_path('img/profile_picture/'.$user->profile_picture));
            }

            //Get the file from the form with the name
            $file               = $request->file('profile_picture');

            //Random String
            $randomStr          = Str::random(30);
            $filename           = $randomStr.'.'.$file->getClientOriginalExtension();

            //public_path() is to get the path from the public folder
            $file->move(public_path('img/profile_picture'), $filename);
            $user->profile_picture = $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Your account has been updated successfully!');

    }

    //-------------------Employee Site-------------------//
    public function employee_myAccount(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        //Pass with the $data field to the view with the function call getRecord
        return view('employee.my_account', $data);
    }

    public function update_employee_myAccount(Request $request)
    {
//        dd($request->all());

        $user               = User::find(Auth::user()->id);

        #Password
        if(!empty($request->password)){
            $user->password     = bcrypt(trim($request->password));
        }

        #Profile Picture
        if(!empty($request->file('profile_picture'))){

            if (!empty($user->profile_picture) && file_exists(public_path('img/profile_picture/'.$user->profile_picture))) {
                unlink(public_path('img/profile_picture/'.$user->profile_picture));
            }

            //Get the file from the form with the name
            $file               = $request->file('profile_picture');

            //Random String
            $randomStr          = Str::random(30);
            $filename           = $randomStr.'.'.$file->getClientOriginalExtension();

            //public_path() is to get the path from the public folder
            $file->move(public_path('img/profile_picture'), $filename);
            $user->profile_picture = $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Your account has been updated successfully!');

    }
}
