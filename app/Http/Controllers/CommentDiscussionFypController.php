<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentDiscussionFypRequest;
use App\Http\Requests\UpdateCommentDiscussionFypRequest;
use App\Models\CommentDiscussionFyp;
use App\Models\PostDiscussionFyp;
use App\Models\User;
use Illuminate\Http\Request;

class CommentDiscussionFypController extends Controller
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
    public function index($key, PostDiscussionFyp $postDiscussionFyp, CommentDiscussionFyp $commentDiscussionFyp)
    {

        $data = $postDiscussionFyp::where('Key_Post', $key)->get();

        $datacomment = $commentDiscussionFyp::where('Key_comment', $key)->get();

        $datapost = $data[0];

        return view('discussion_fyp.discussionfyp-detail', [
            "title" => "discussionfyp",
            "datapost" => $datapost,
            "datacomment" => $datacomment,
        ]);
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
     * @param  \App\Http\Requests\StoreCommentDiscussionFypRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, User $user, CommentDiscussionFyp $commentDiscussionFyp)
    {
        $datauser = $user::where('user_id', $id)->get()[0];

        $data1 = array(
            "Id_user" => $id,
            "Username" => $datauser->name,
            "Key_comment" => $request->Key_Post,
            "Key_reply" => uniqid(),

        );

        $data = $request->validate([
            "Comment" => 'required|max:255',
        ]);

        if ($request->file('Image_Post')) {
            $data['Image_Post'] = $request->file('Image_Post')->store('postdiscussionfyp-image');
        }

        $datafull = array_merge($data, $data1);

        $commentDiscussionFyp::create($datafull);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommentDiscussionFyp  $commentDiscussionFyp
     * @return \Illuminate\Http\Response
     */
    public function show(CommentDiscussionFyp $commentDiscussionFyp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommentDiscussionFyp  $commentDiscussionFyp
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentDiscussionFyp $commentDiscussionFyp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentDiscussionFypRequest  $request
     * @param  \App\Models\CommentDiscussionFyp  $commentDiscussionFyp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentDiscussionFyp $commentDiscussionFyp, $key)
    {
        $commentDiscussionFyp::where('Key_reply', $key)->update(['Comment' => $request->Comment]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommentDiscussionFyp  $commentDiscussionFyp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentDiscussionFyp $commentDiscussionFyp, $id)
    {
        $commentDiscussionFyp::destroy($id);

        return redirect()->back();
    }
}
