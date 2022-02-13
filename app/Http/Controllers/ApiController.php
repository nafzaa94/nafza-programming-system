<?php

namespace App\Http\Controllers;

use App\Models\PostDiscussionFyp;
use App\Models\ProfileUser;
use App\Models\ReplyDiscussionFyp;
use App\Models\StoryProject;
use App\Models\User;
use App\Models\Video;

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

    public function ApiVideo($id)
    {
        return Video::where('Id_video', $id)->get()[0];
    }

    public function ApiVideoId()
    {
        return Video::all();
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
