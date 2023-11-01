<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Forum;
use App\Models\Reply;
use Auth;

class ForumController extends Controller
{
    //-------------------Admin Site-------------------//
    public function admin_postsList()
    {
        $data['getPosts'] = Forum::getPosts();
        return view('admin.forum.list' , $data);
    }

    public function posts_create()
    {
        return view('admin.forum.create');
    }

    public function postsCreate_post(Request $request)
    {
//        dd($request->all());

        $posts = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $posts = new Forum;

        $posts->employee_id     =    Auth::user()->id;
        $posts->title           =    trim($request->title);
        $posts->description     =    trim($request->description);

        $posts->save();

        return redirect('admin/forum')->with('success', 'Posts created successfully.');

    }

    public function admin_topicView($id, Request $request)
    {
        $data['getEmployee'] = User::all();
        $data['getRecord'] = Forum::find($id);
        $data['getReply'] = Reply::getForumReply()
                    ->where('forum_id', '=', $id);

        return view('admin.forum.view', $data);
    }

    public function reply_create(Request $request)
    {
        $reply = request()->validate([
            'description' => 'required',
        ]);

        $reply = new Reply;

        $reply ->employee_id    =    Auth::user()->id;
        $reply ->forum_id       =    trim($request->forum_id);
        $reply ->title          =    trim($request->title);
        $reply ->description    =    trim($request->description);

        $reply->save();

        return redirect()->back()->with('success', 'Done Reply');

    }

    public function delete($id)
    {
        $recordDelete = Forum::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Forum Delete Successfully.');
    }

}
