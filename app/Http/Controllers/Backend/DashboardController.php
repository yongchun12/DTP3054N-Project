<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Reply;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

use App\Models\User;
use App\Models\Leave;
use App\Models\Forum;

class DashboardController extends Controller {

    public function dashboard(Request $request) {

        //Admin Dashboard
        if(Auth::user()->is_role == 1){

            //Total Employee
            $data['getEmployeeCount'] = User::count();

            //Total Pending Leave Application
            $data['getPendingLeaveCount'] = Leave::where('leave_status', '0')->count();

            //Total Leave Application
            $data['getTotalLeaveCount'] = Leave::count();

            //Total Forum Topic
            $data['getTotalForumCount'] = Forum::count();

            //Get Employee Table Record
            $data['getEmployeeRecord'] = User::select('users.*')
                ->orderBy('created_at', 'desc')
                ->paginate(5);

            //Forum Posts
            $topics = Forum::select('forum.*', 'users.name', 'users.profile_picture')
                ->join('users', 'users.id', '=', 'forum.employee_id')
                //only show the topic of the current user user post
                ->where('forum.employee_id', Auth::user()->id)
                ->orderBy('forum.created_at', 'desc')
                ->paginate(2);

            // Create an array to store topic IDs and their corresponding reply counts
            $topicReplyCounts = [];

            // Loop through each topic and count the replies for that topic
            foreach ($topics as $topic) {
                $forumId = $topic->id; // Assuming 'id' is the primary key for your Forum model

                //to detect whether the forum_id is exist in the reply table
                $replyCount = Reply::where('forum_id', $forumId)->count();

                //store the forum_id and the reply count into the array
                $topicReplyCounts[$forumId] = $replyCount;
            }

            $data['getPosts'] = $topics;

            $data['getTopicReplyCount'] = $topicReplyCounts;

            #dashboard will redirect to what page or what message
            return view('admin.dashboard', $data);

        } else if (Auth::user()->is_role == 0) /*Employee Dashboard*/ {

            //count() is used to count the number of records / data
            //Total Employee
            $data['getEmployeeDeptCount'] = User::where('department_id', Auth::user()->department_id)->count();

            //Total Forum Topic by you
            $data['getEmployeeTotalForumCount'] = Forum::where('employee_id', Auth::user()->id)->count();

            //Get Employee with same department Table Record
            $data['getEmployeeRecord'] = User::select('users.*')
                ->where('department_id', Auth::user()->department_id)
                ->orderBy('created_at', 'desc')
                ->paginate(5);

            //Forum Posts
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

            $data['getPosts'] = $topics;

            $data['getTopicReplyCount'] = $topicReplyCounts;

            return view('employee.dashboard', $data);

        }

    }

}

?>
