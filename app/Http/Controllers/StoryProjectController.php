<?php

namespace App\Http\Controllers;

use App\Models\StoryProject;
use App\Http\Requests\StoreStoryProjectRequest;
use App\Http\Requests\UpdateStoryProjectRequest;

class StoryProjectController extends Controller
{
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
     * @param  \App\Http\Requests\StoreStoryProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoryProjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StoryProject  $storyProject
     * @return \Illuminate\Http\Response
     */
    public function show(StoryProject $storyProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StoryProject  $storyProject
     * @return \Illuminate\Http\Response
     */
    public function edit(StoryProject $storyProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoryProjectRequest  $request
     * @param  \App\Models\StoryProject  $storyProject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoryProjectRequest $request, StoryProject $storyProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StoryProject  $storyProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoryProject $storyProject)
    {
        //
    }
}
