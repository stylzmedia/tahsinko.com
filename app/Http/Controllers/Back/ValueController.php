<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValueStoreRequest;
use App\Http\Requests\ValueUpdateRequest;
use App\Repositories\MediaRepo;
use Illuminate\Support\Facades\File;
use App\Models\Value;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $values = Value::all();

        return view('back.value.index', compact('values'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('back.value.create');
    }

    /**
     * @param \App\Http\Requests\ValueStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $value = new Value();
        $value->title = $request->title;
        $value->description = $request->description;
        $value->position = $request->position;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $value->image = $uploaded_file['file_name'];
            $value->image_path = $uploaded_file['file_path'];
            $value->media_id = $uploaded_file['media_id'];
        }

        $value->save();

        return redirect()->back()->with('success-alert', 'Value created successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Value $value
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Value $value)
    {
        return view('value.show', compact('value'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Value $value
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Value $value)
    {
        return view('back.value.edit', compact('value'));
    }

    /**
     * @param \App\Http\Requests\ValueUpdateRequest $request
     * @param \App\Models\Value $value
     * @return \Illuminate\Http\Response
     */
    public function update(ValueUpdateRequest $request, Value $value)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        $value->title = $request->title;
        $value->description = $request->description;
        $value->position = $request->position;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $value->image = $uploaded_file['file_name'];
            $value->image_path = $uploaded_file['file_path'];
            $value->media_id = $uploaded_file['media_id'];
        }

        $value->save();

        return redirect()->back()->with('success-alert', 'Value update successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Value $value
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Value $value)
    {
        $value->delete();

        return redirect()->back()->with('success-alert', 'Value delete successfully.');
    }
}
