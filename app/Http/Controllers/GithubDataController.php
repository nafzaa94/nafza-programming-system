<?php

namespace App\Http\Controllers;

use App\Models\GithubData;
use Illuminate\Http\Request;

class GithubDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, GithubData $githubData, $id)
    {
        $data = $request->validate([
            'name_project' => 'required',
            'start_time_class' => 'required',
            'start_date_class' => 'required',
            'end_time_class' => 'required',
            'end_date_class' => 'required',
        ]);


        $githubData::where('id_user', $id)->update([
            'name_project' => $data['name_project'],
            'start_time_class' => $data['start_time_class'],
            'start_date_class' => $data['start_date_class'],
            'end_time_class' => $data['end_time_class'],
            'end_date_class' => $data['end_date_class'],
        ]);

        return redirect()->back()->with('success', 'Class Time Successfully Saved');
    }
}
