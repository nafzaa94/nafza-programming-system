<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReplyDiscussionFypRequest;
use App\Http\Requests\UpdateReplyDiscussionFypRequest;
use App\Models\CommentDiscussionFyp;
use App\Models\ReplyDiscussionFyp;
use App\Models\User;
use Illuminate\Http\Request;

class ReplyDiscussionFypController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReplyDiscussionFypRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, CommentDiscussionFyp $commentDiscussionFyp, ReplyDiscussionFyp $replyDiscussionFyp, $key, $id)
    {
        $datauser = $user::where('user_id', $id)->get()[0];

        $datacomment = $commentDiscussionFyp::where('Key_reply', $key)->get()[0];

        $datareply = ["Id_user" => $datauser->id, "Username" => $datauser->name, "Key_reply" => $datacomment->Key_reply, "Reply" => $request->reply];

        $replyDiscussionFyp::create($datareply);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReplyDiscussionFyp  $replyDiscussionFyp
     * @return \Illuminate\Http\Response
     */
    public function show(ReplyDiscussionFyp $replyDiscussionFyp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReplyDiscussionFyp  $replyDiscussionFyp
     * @return \Illuminate\Http\Response
     */
    public function edit(ReplyDiscussionFyp $replyDiscussionFyp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReplyDiscussionFypRequest  $request
     * @param  \App\Models\ReplyDiscussionFyp  $replyDiscussionFyp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReplyDiscussionFypRequest $request, ReplyDiscussionFyp $replyDiscussionFyp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReplyDiscussionFyp  $replyDiscussionFyp
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReplyDiscussionFyp $replyDiscussionFyp)
    {
        //
    }
}
