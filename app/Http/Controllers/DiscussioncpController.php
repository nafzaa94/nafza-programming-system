<?php

namespace App\Http\Controllers;

use App\Models\LanguageProgramming;
use App\Models\PostDiscussionCP;
use App\Models\User;
use Illuminate\Http\Request;

class DiscussioncpController extends Controller
{
    public function index(LanguageProgramming $languageProgramming, PostDiscussionCP $postDiscussionCP)
    {
        $datalanguage = $languageProgramming::all();
        $datapost = $postDiscussionCP::orderBy('id', 'desc')->get();

        return view('discussion_cp.discussioncp', [
            "datalanguage" => $datalanguage,
            "datapost" => $datapost
        ]);
    }

    public function store(Request $request, User $user, $id)
    {
        $datauser = $user::where('user_id', $id)->get()[0];

        $data1 = array(
            "Id_user" => $id,
            "Username" => $datauser->name,
            "Key_Post" => uniqid(),
            "Url_Image_Project_Post" => "",
            "Url_Image_Code_Post" => "",
        );

        $data = $request->validate([
            "Title_Post" => 'required|max:255',
            "Question_Post" => 'required',
            "Image_Project_Post" => 'image',
            "Language_Programming" => 'required',
            "Image_Code_Post" => 'image',
            "Coding_Post" => "max:5000",
        ]);

        //dd($data);

        if ($request->has('Image_Project_Post')) {
            //$data['Image_Project_Post'] = $request->file('Image_Project_Post')->store('postdiscussioncp-image-project');
            $file = $request->file('Image_Project_Post');
            $path = "Image-Discussion-CP-Project/" . time() . $file->getClientOriginalName();
            \Storage::disk('s3')->put($path, file_get_contents($file));
            $data['Image_Project_Post'] = $path;
            $image = \Storage::disk('s3')->url($path);
            $data1['Url_Image_Project_Post'] = $image;
        }

        if ($request->has('Image_Code_Post')) {
            //$data['Image_Code_Post'] = $request->file('Image_Code_Post')->store('postdiscussioncp-image-Code');
            $file = $request->file('Image_Code_Post');
            $path = "Image-Discussion-CP-Code/" . time() . $file->getClientOriginalName();
            \Storage::disk('s3')->put($path, file_get_contents($file));
            $data['Image_Code_Post'] = $path;
            $image = \Storage::disk('s3')->url($path);
            $data1['Url_Image_Code_Post'] = $image;
        }

        $datafull = array_merge($data, $data1);

        PostDiscussionCP::create($datafull);

        return redirect()->back();
    }
}
