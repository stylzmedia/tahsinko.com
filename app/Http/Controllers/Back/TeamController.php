<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamStoreRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Repositories\MediaRepo;
use Illuminate\Support\Facades\File;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teams = Team::all();

        return view('back.team.index', compact('teams'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('back.team.create');
    }

    /**
     * @param \App\Http\Requests\TeamStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        $team = new Team();
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->description = $request->description;
        $team->facebook = $request->facebook;
        $team->linkedin = $request->linkedin;
        $team->tweeter = $request->tweeter;
        $team->position = $request->position;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $team->image = $uploaded_file['file_name'];
            $team->image_path = $uploaded_file['file_path'];
            $team->media_id = $uploaded_file['media_id'];
        }

        $team->save();

        return redirect()->back()->with('success-alert', 'Team created successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Team $team)
    {
        return view('team.show', compact('team'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Team $team)
    {
        return view('back.team.edit', compact('team'));
    }

    /**
     * @param \App\Http\Requests\TeamUpdateRequest $request
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamUpdateRequest $request, Team $team)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->description = $request->description;
        $team->facebook = $request->facebook;
        $team->linkedin = $request->linkedin;
        $team->tweeter = $request->tweeter;
        $team->position = $request->position;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $team->image = $uploaded_file['file_name'];
            $team->image_path = $uploaded_file['file_path'];
            $team->media_id = $uploaded_file['media_id'];
        }

        $team->save();

        return redirect()->back()->with('success-alert', 'Team update successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Team $team)
    {
        $team->delete();

        return redirect()->back()->with('success-alert', 'Team delete successfully.');
    }
}
