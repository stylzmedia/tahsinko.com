<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Service;
use App\Repositories\MediaRepo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = Service::all();

        return view('back.service.index', compact('services'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('back.service.create');
    }

    /**
     * @param \App\Http\Requests\ServiceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->position = $request->position;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $service->image = $uploaded_file['file_name'];
            $service->image_path = $uploaded_file['file_path'];
            $service->media_id = $uploaded_file['media_id'];
        }

        $service->save();

        return redirect()->back()->with('success-alert', 'Service created successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Service $service)
    {
        return view('service.show', compact('service'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Service $service)
    {
        return view('back.service.edit', compact('service'));
    }

    /**
     * @param \App\Http\Requests\ServiceUpdateRequest $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        $service->title = $request->title;
        $service->description = $request->description;
        $service->position = $request->position;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $service->image = $uploaded_file['file_name'];
            $service->image_path = $uploaded_file['file_path'];
            $service->media_id = $uploaded_file['media_id'];
        }

        $service->save();

        return redirect()->back()->with('success-alert', 'Service update successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Service $service)
    {
        $service->delete();

        return redirect()->back()->with('success-alert', 'Service delete successfully.');
    }
}
