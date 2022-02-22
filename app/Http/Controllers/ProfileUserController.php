<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileUserRequest;
use App\Http\Requests\UpdateProfileUserRequest;
use App\Models\GithubData;
use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
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
    public function index($id, ProfileUser $profileUser)
    {
        $datauser = $profileUser::where('id_user', $id)->get()[0];

        return view('profiles.profile_detail_user', [
            "data" => $datauser,
        ]);
    }

    public function indexproject($id, ProfileUser $profileUser)
    {
        $datauser = $profileUser::where('id_user', $id)->get()[0];

        return view('profiles.profile_detail_project', [
            "data" => $datauser,
        ]);
    }

    public function indexgithublink($id, ProfileUser $profileUser, GithubData $githubData)
    {
        $datauser = $profileUser::where('id_user', $id)->get()[0];
        $data = $githubData::where('id_user', $id)->get()[0];

        return view('profiles.profile_detail_githublink', [
            "data" => $datauser,
            "dataGit" => $data,
        ]);
    }

    public function uploadimageprofile($id, ProfileUser $profileUser, Request $request)
    {

        $data = $request->validate([
            'image_profile' => 'image|required',
        ]);

        $data1 = array(
            "url_profile_image" => "",
        );

        if ($request->has('image_profile')) {
            //$data['image'] = $request->file('image')->store('profile-image');
            $file = $request->file('image_profile');
            $path = "Image-Profile/" . time() . $file->getClientOriginalName();
            \Storage::disk('s3')->put($path, file_get_contents($file));
            $data['image_profile'] = $path;
            $image = \Storage::disk('s3')->url($path);
            $data1['url_profile_image'] = $image;
        }

        $datafull = array_merge($data, $data1);

        $profileUser::where('id_user', $id)
            ->update($datafull);

        return redirect()->back()->with('success', 'done upload');
    }

    public function uploadimageproject($id, ProfileUser $profileUser, Request $request)
    {
        $data = $request->validate([
            'imageproject' => 'image|required',
        ]);

        $data1 = array(
            "url_project_image" => "",
        );

        if ($request->has('imageproject')) {
            //$data['imageproject'] = $request->file('imageproject')->store('project-image');
            $file = $request->file('imageproject');
            $path = "Image-Project/" . time() . $file->getClientOriginalName();
            \Storage::disk('s3')->put($path, file_get_contents($file));
            $data['imageproject'] = $path;
            $image = \Storage::disk('s3')->url($path);
            $data1['url_project_image'] = $image;
        }

        $datafull = array_merge($data, $data1);

        $profileUser::where('id_user', $id)
            ->update($datafull);

        return redirect()->back()->with('success', 'done upload');
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
     * @param  \App\Http\Requests\StoreProfileUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileUserRequest $request, User $user, ProfileUser $profileUser, GithubData $githubData, $id)
    {

        $datauser = $user::find($id);

        $profileUser::create([
            'id_user' => $datauser->user_id,
            'fullname' => $request->fullname,
            'address' => $request->address,
            'no_phone' => $request->no_phone,
            'gender' => $request->gender,
            'statusdepartment' => $request->statusdepartment,
            'department' => $request->department,
            'projectname' => $request->projectname,
            'presendate' => $request->presendate,
            'typeproject' => $request->typeproject,
            'objectiveproject' => $request->objectiveproject,
        ]);

        $githubData::create([
            'id_user' => $datauser->user_id,
            'name_project' => $request->projectname,
        ]);

        $user::find($id)->update([
            'status_update' => '1',
            'status_github' => '1',

        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileUser  $profileUser
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileUser $profileUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileUser  $profileUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileUser $profileUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileUserRequest  $request
     * @param  \App\Models\ProfileUser  $profileUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileUserRequest $request, ProfileUser $profileUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileUser  $profileUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileUser $profileUser)
    {
        //
    }
}
