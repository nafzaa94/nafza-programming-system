<?php

namespace App\Http\Controllers;

use App\Events\CommunityDiscussionFyp;
use App\Models\CommentDiscussionFyp;
use App\Models\GithubData;
use App\Models\PostDiscussionFyp;
use App\Models\ProfileUser;
use App\Models\ReplyDiscussionFyp;
use App\Models\StoryProject;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function GetAllUser()
    {
        return User::all();
    }

    public function ApiComment()
    {
        return CommentDiscussionFyp::all();
    }

    public function User(Request $request)
    {
        $data = User::where('user_id', $request->id)->get()[0];
        return $data;
    }

    public function ApiProfileUsers()
    {
        return ProfileUser::all();
    }

    public function ApiProfileUserDetail(Request $request)
    {
        $data = ProfileUser::where('id_user', $request->id)->first();

        if ($data == null) {
            return response()->json([
                'message' => 'Data not found',
                'status' => 404,
            ], 404);
        } else {
            return ProfileUser::where('id_user', $request->id)->first();
        }
    }

    public function ApiVideoID($id)
    {
        return Video::where('Id_video', $id)->get();
    }

    public function ApiVideoAll(Request $request)
    {
        $data = Video::where('Categories_video', $request->categories)->get();
        return $data;
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

    public function CreateProfileUser(Request $request, ProfileUser $profileUser, User $user, GithubData $githubData)
    {
        $datauser = $request->validate([
            "id_user" => "required",
            "fullname" => "required",
            "address" => "required",
            "no_phone" => "required",
            "gender" => "required",
            "department" => "required",
            "statusdepartment" => "required",
        ]);

        $res = $profileUser::create($datauser);

        $githubData::create([
            "id_user" => $datauser['id_user'],
        ]);

        $user::where('user_id', $request->id_user)
            ->update([
                'status_update' => '1',
            ]);

        if ($res) {
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully created Your Profile, Now You Can Refersh The Page With Scrolling Down',
                'data' => $res,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create data',
            ]);
        }
    }

    public function CreateProjectUser(Request $request, ProfileUser $profileUser, User $user, GithubData $githubData)
    {
        $dataproject = $request->validate([
            "projectname" => "required",
            "presendate" => "required",
            "typeproject" => "required",
            "objectiveproject" => "required",
        ]);

        $res = $profileUser::where('id_user', $request->id_user)
            ->update($dataproject);

        $githubData::where('id_user', $request->id_user)
            ->update([
                "name_project" => $dataproject['projectname'],
            ]);

        $user::where('user_id', $request->id_user)
            ->update([
                'status_github' => '1',
            ]);

        if ($res) {
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully created data',
                'data' => $dataproject,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create data',
            ]);
        }
    }

    public function UpdatePackage(Request $request)
    {
        $package = $request->validate([
            "package" => "required",
        ]);

        $res = ProfileUser::where('id_user', $request->id)
            ->update($package);

        if ($res) {
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully updated data',
                'data' => $package,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update data',
            ]);
        }
    }

    public function CreateCommentPostDiscussionFyp(Request $request)
    {
        $data = $request->validate([
            "Id_user" => "required",
            "Username" => "required",
            "Key_comment" => "required",
            "Comment" => "required",
        ]);

        $data2 = [
            "Key_reply" => uniqid(),
            "Avatar" => "https://ui-avatars.com/api/?name=" . $data['Username'] . "&size=512&background=0D8ABC&color=fff&bold=true",
        ];

        $fulldata = array_merge($data, $data2);

        $res = CommentDiscussionFyp::create($fulldata);


        if ($res) {
            CommunityDiscussionFyp::dispatch([
                'status' => 'success',
                'message' => 'Successfully created data',
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully created data',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create data',
            ]);
        }
    }

    public function CommentPostDiscussionFyp(Request $request)
    {
        $data = CommentDiscussionFyp::where('Key_comment', $request->key)->orderBy('id', 'desc')->get();

        if ($data == null) {
            return response()->json([
                'message' => 'Data not found',
                'status' => 404,
            ], 404);
        } else {
            return $data;
        }
    }

    public function CallbackDataCommentPostDiscussionFyp(Request $request)
    {
        return CommentDiscussionFyp::find($request->id);
    }

    public function UpdateCommentPostDiscussionFyp(Request $request)
    {
        $data = CommentDiscussionFyp::where('id', $request->id)
            ->update([
                "Comment" => $request->Comment,
            ]);

        if ($data) {
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully updated data',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update data',
            ]);
        }
    }

    public function DeleteCommentPostDiscussionFyp(Request $request)
    {
        $data = CommentDiscussionFyp::where('id', $request->id)
            ->update([
                "Status_delete" => '1',
            ]);

        if ($data) {
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully deleted data',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete data',
            ]);
        }
    }

    public function CreateReplyPostDiscussionFyp(Request $request)
    {
        $data = ReplyDiscussionFyp::create([
            "Key_reply" => $request->Key_reply,
            "Id_user" => $request->Id_user,
            "Username" => $request->Username,
            "Avatar" => "https://ui-avatars.com/api/?name=" . $request->Username . "&size=512&background=0D8ABC&color=fff&bold=true",
            "Reply" => $request->Reply,
        ]);


        if ($data) {
            CommunityDiscussionFyp::dispatch([
                'status' => 'success',
                'message' => 'Successfully created data',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully created data',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create data',
            ]);
        }
    }

    public function ReplyPostDiscussionFyp()
    {
        $data = ReplyDiscussionFyp::all();

        if ($data == null) {
            return response()->json([
                'message' => 'Data not found',
                'status' => 404,
            ], 404);
        } else {
            return $data;
        }
    }
}
