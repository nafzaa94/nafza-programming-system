<?php

namespace App\Http\Controllers;

use App\Models\PostDiscussionCP;
use Illuminate\Http\Request;

class CommentDiscussionCPController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($key, PostDiscussionCP $postDiscussionCP)
    {
        $datapost = $postDiscussionCP::where('Key_Post', $key)->get()[0];

        return view('discussion_cp.discussioncp-detail', compact('datapost'));
    }
}
