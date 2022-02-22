<?php

namespace App\Http\Controllers;

use App\Models\PostDiscussionFyp;
use App\Models\ProfileUser;
use App\Models\ReplyDiscussionFyp;
use App\Models\StoryProject;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function ApiComment()
    {
        return ReplyDiscussionFyp::all();
    }

    public function ApiUsers()
    {
        return User::all();
    }

    public function ApiProfileUsers()
    {
        return ProfileUser::all();
    }

    public function ApiProfileUserDetail(Request $request)
    {
        return ProfileUser::where('id_user', $request->id)->first();
    }

    public function ApiVideoID($id)
    {
        return Video::where('Id_video', $id)->get();
    }

    public function ApiVideoAll($categories)
    {
        return Video::where('Categories_video', $categories)->get();
    }

    // public function ApiPostCP()
    // {
    //     return PostDiscussionCP::all();
    // }

    public function Datastory()
    {
        return StoryProject::all();
    }

    public function Datapostdiscussionfyp()
    {
        return PostDiscussionFyp::orderBy('id', 'desc')->get();
    }
}
