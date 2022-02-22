<?php

namespace App\Http\Controllers;

use App\Models\LanguageProgramming;
use App\Models\PostDiscussionFyp;
use App\Models\User;
use Illuminate\Http\Request;

class PostDiscussionFypController extends Controller
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
    public function index(LanguageProgramming $languageProgramming, $id, PostDiscussionFyp $postDiscussionFyp)
    {
        $DataLanguage = $languageProgramming::all();

        $DataPost = $postDiscussionFyp::orderBy('id', 'desc')->get();

        return view('discussion_fyp.discussionfyp', [
            "DataLanguage" => $DataLanguage,
            "DataPost" => $DataPost,
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
     * @param  \App\Http\Requests\StorePostDiscussionFypRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, User $user, PostDiscussionFyp $postDiscussionFyp)
    {
        $datauser = $user::where('user_id', $id)->get()[0];

        $data1 = array(
            "Id_user" => $id,
            "Username" => $datauser->name,
            "Key_Post" => uniqid(),
            'Url_Post_Image' => "",
        );

        $data = $request->validate([
            "Title_Post" => 'required|max:255',
            "Question_Post" => 'required',
            "Image_Post" => 'image',
            "Language_Programming" => 'required',
        ]);

        if ($request->has('Image_Post')) {
            //$data['Image_Post'] = $request->file('Image_Post')->store('postdiscussionfyp-image');

            $file = $request->file('Image_Post');
            $path = "Image-Discussion-Fyp/" . time() . $file->getClientOriginalName();
            \Storage::disk('s3')->put($path, file_get_contents($file));
            $data['Image_Post'] = $path;
            $image = \Storage::disk('s3')->url($path);
            $data1['Url_Post_Image'] = $image;
        }


        $datafull = array_merge($data, $data1);

        $postDiscussionFyp::create($datafull);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostDiscussionFyp  $postDiscussionFyp
     * @return \Illuminate\Http\Response
     */
    public function show(PostDiscussionFyp $postDiscussionFyp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostDiscussionFyp  $postDiscussionFyp
     * @return \Illuminate\Http\Response
     */
    public function edit(PostDiscussionFyp $postDiscussionFyp)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostDiscussionFypRequest  $request
     * @param  \App\Models\PostDiscussionFyp  $postDiscussionFyp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostDiscussionFyp $postDiscussionFyp, $key)
    {
        if ($request->Image_Post) {
            $data = $request->validate([
                "Title_Post" => 'required|max:255',
                "Question_Post" => 'required',
                "Image_Post" => 'image',
                "Language_Programming" => 'required',
            ]);

            if ($request->file('Image_Post')) {
                $data['Image_Post'] = $request->file('Image_Post')->store('postdiscussionfyp-image');
            }

            $postDiscussionFyp::where('Key_Post', $key)
                ->update($data);

            return redirect()->back();
        } else {
            $data = $request->validate([
                "Title_Post" => 'required|max:255',
                "Question_Post" => 'required',
                "Language_Programming" => 'required',
            ]);

            $postDiscussionFyp::where('Key_Post', $key)
                ->update($data);

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostDiscussionFyp  $postDiscussionFyp
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostDiscussionFyp $postDiscussionFyp, $id)
    {
        $postDiscussionFyp::destroy($id);

        return redirect()->back();
    }
}
