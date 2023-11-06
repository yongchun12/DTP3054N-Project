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

        //get Reply Data
        $data['getReply'] = Reply::getForumReply()
                    ->where('forum_id', '=', $id);

        return view('admin.forum.view', $data);
    }

    public function admin_edit($id)
    {
        $data['getForum'] = Forum::find($id);
        return view('admin.forum.edit', $data);
    }

    public function admin_editPost($id, Request $request)
    {
        $posts = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $posts = Forum::find($id);

        $posts->title           =    trim($request->title);
        $posts->description     =    trim($request->description);

        $posts->save();

        return redirect('admin/forum')->with('success', 'Topic Edit Complete');
    }

    public function admin_postDelete($id)
    {
        $recordDelete = Forum::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Forum Delete Successfully.');
    }

    //---------------Reply-----------------
    public function admin_replyCreate(Request $request)
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

    public function admin_replyEdit($id)
    {
        $data['getReply'] = Reply::find($id);
        return view('admin.forum.edit_reply', $data);
    }

    public function admin_replyEditPost($id, Request $request)
    {
        $reply = request()->validate([
            'description' => 'required',
        ]);

        $reply = Reply::find($id);

        $reply ->title          =    trim($request->title);
        $reply ->description    =    trim($request->description);

        $reply->save();

        return redirect('admin/forum/view/'.$reply->forum_id)->with('success', 'Update Reply Done');
    }

    public function admin_replyDelete($id)
    {
        $replyDelete = Reply::find($id);
        $replyDelete->delete();
        return redirect()->back()->with('error', 'Reply Delete Successfully.');
    }

    //-------------------Employee Site-------------------//
    public function employee_postsList()
    {
        $data['getPosts'] = Forum::getPosts();
        return view('employee.forum.list' , $data);
    }

    public function employee_postsCreate()
    {
        return view('employee.forum.create');
    }

    public function employee_postsCreatePost(Request $request)
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

        return redirect('employee/forum')->with('success', 'Posts created successfully.');

    }

    public function employee_topicView($id, Request $request)
    {
        $data['getEmployee'] = User::all();
        $data['getRecord'] = Forum::find($id);
        $data['getReply'] = Reply::getForumReply()
            ->where('forum_id', '=', $id);

        return view('employee.forum.view', $data);
    }

    public function employee_edit($id)
    {
        $data['getForum'] = Forum::find($id);
        return view('employee.forum.edit', $data);
    }

    public function employee_editPost($id, Request $request)
    {
        $posts = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $posts = Forum::find($id);

        $posts->title           =    trim($request->title);
        $posts->description     =    trim($request->description);

        $posts->save();

        return redirect('employee/forum')->with('success', 'Topic Edit Complete');
    }

    public function employee_delete($id)
    {
        $recordDelete = Forum::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Forum Delete Successfully.');
    }

    //-----------Reply-----------
    public function employee_replyCreate(Request $request)
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

    public function employee_replyEdit($id)
    {
        $data['getReply'] = Reply::find($id);
        return view('employee.forum.edit_reply', $data);
    }

    public function employee_replyEditPost($id, Request $request)
    {
        $reply = request()->validate([
            'description' => 'required',
        ]);

        $reply = Reply::find($id);

        $reply ->title          =    trim($request->title);
        $reply ->description    =    trim($request->description);

        $reply->save();

        return redirect('employee/forum/view/'.$reply->forum_id)->with('success', 'Update Reply Done');
    }

    public function employee_replyDelete($id)
    {
        $replyDelete = Reply::find($id);
        $replyDelete->delete();
        return redirect()->back()->with('error', 'Reply Delete Successfully.');
    }

}
