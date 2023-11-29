<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Forum;
use App\Models\Reply;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;

use Illuminate\Http\Request;
use Auth;
use Str;

class MyAccountController extends Controller
{
    //-------------------Admin Site-------------------//
    public function admin_password(Request $request)
    {
        return view('admin.my_account.password');
    }

    //Update Password
    public function update_password(Request $request)
    {
        //Find the user
        $user               = User::find(Auth::user()->id);

        $user->password     = bcrypt(trim($request->password));

        $user->save();

        return redirect()->back()->with('success', 'Your password has been updated successfully!');

    }

    //Change Profile Picture
    public function admin_profilePicture(Request $request)
    {
        return view('admin.my_account.profile_picture');
    }

    public function update_profilePicture(Request $request)
    {
        $user               = User::find(Auth::user()->id);

        #Profile Picture
        if(!empty($request->file('profile_picture'))){

            if (!empty($user->profile_picture) && file_exists(public_path('img/profile_picture/'.$user->profile_picture))) {
                unlink(public_path('img/profile_picture/'.$user->profile_picture));

                Storage::delete($user->profile_picture);
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

        return redirect()->back()->with('success', 'Your Profile Picture has been updated successfully!');
    }

    public function admin_profile()
    {
        $topics = Forum::select('forum.*', 'users.name', 'users.profile_picture')
            ->join('users', 'users.id', '=', 'forum.employee_id')
            ->where('forum.employee_id', Auth::user()->id)
            ->orderBy('forum.created_at', 'desc')
            ->paginate(2);

        // Create an array to store topic IDs and their corresponding reply counts
        $topicReplyCounts = [];

        // Loop through each topic and count the replies for that topic
        foreach ($topics as $topic) {
            $forumId = $topic->id; // Assuming 'id' is the primary key for your Forum model
            $replyCount = Reply::where('forum_id', $forumId)->count();
            $topicReplyCounts[$forumId] = $replyCount;
        }

        $data = [
            //This is the array name you will use in your view
            'getPosts' => $topics,
            'getTopicReplyCount' => $topicReplyCounts,
        ];

        //Department
        $data['getDepartment'] = Department::getRecord();

        //Position
        $data['getPosition'] = Position::getRecord();

        //Manager
        $data['getManager'] = User::get();

        return view('admin.my_account.profile', $data);
    }

    //-------------------Employee Site-------------------//
    public function employee_password(Request $request)
    {
        return view('employee.my_account.password');
    }

    //Update Password
    public function employee_update_password(Request $request)
    {
        //Find the user
        $user               = User::find(Auth::user()->id);

        $user->password     = bcrypt(trim($request->password));

        $user->save();

        return redirect()->back()->with('success', 'Your password has been updated successfully!');

    }

    //Change Profile Picture
    public function employee_profilePicture(Request $request)
    {
        return view('employee.my_account.profile_picture');
    }

    public function employee_update_profilePicture(Request $request)
    {
        $user               = User::find(Auth::user()->id);

        #Profile Picture
        if(!empty($request->file('profile_picture'))){

            if (!empty($user->profile_picture) && file_exists(public_path('img/profile_picture/'.$user->profile_picture))) {
                unlink(public_path('img/profile_picture/'.$user->profile_picture));

                Storage::delete($user->profile_picture);
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

        return redirect()->back()->with('success', 'Your Profile Picture has been updated successfully!');
    }

    public function employee_profile()
    {
        $topics = Forum::select('forum.*', 'users.name', 'users.profile_picture')
            ->join('users', 'users.id', '=', 'forum.employee_id')
            ->where('forum.employee_id', Auth::user()->id)
            ->orderBy('forum.created_at', 'desc')
            ->paginate(2);

        // Create an array to store topic IDs and their corresponding reply counts
        $topicReplyCounts = [];

        // Loop through each topic and count the replies for that topic
        foreach ($topics as $topic) {
            $forumId = $topic->id; // Assuming 'id' is the primary key for your Forum model
            $replyCount = Reply::where('forum_id', $forumId)->count();
            $topicReplyCounts[$forumId] = $replyCount;
        }

        $data = [
            //This is the array name you will use in your view
            'getPosts' => $topics,
            'getTopicReplyCount' => $topicReplyCounts,
        ];

        //Department
        $data['getDepartment'] = Department::getRecord();

        //Position
        $data['getPosition'] = Position::getRecord();

        //Manager
        $data['getManager'] = User::get();

        return view('employee.my_account.profile', $data);
    }
}
