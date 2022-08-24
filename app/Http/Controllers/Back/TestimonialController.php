<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialStoreRequest;
use App\Http\Requests\TestimonialUpdateRequest;
use App\Repositories\MediaRepo;
use Illuminate\Support\Facades\File;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $testimonials = Testimonial::get();

        return view('back.testimonial.index', compact('testimonials'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('back.testimonial.create');
    }

    /**
     * @param \App\Http\Requests\TestimonialStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required'
        ]);
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->email = $request->email;
        $testimonial->phone = $request->phone;
        $testimonial->message = $request->message;
        $testimonial->position = $request->position;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $testimonial->image = $uploaded_file['file_name'];
            $testimonial->image_path = $uploaded_file['file_path'];
            $testimonial->media_id = $uploaded_file['media_id'];
        }

        $testimonial->save();

        return redirect()->back()->with('success-alert', 'Testimonial created successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Testimonial $testimonial)
    {
        return view('testimonial.show', compact('testimonial'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Testimonial $testimonial)
    {
        return view('back.testimonial.edit', compact('testimonial'));
    }

    /**
     * @param \App\Http\Requests\TestimonialUpdateRequest $request
     * @param \App\Models\Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required'
        ]);

        $testimonial->name = $request->name;
        $testimonial->email = $request->email;
        $testimonial->phone = $request->phone;
        $testimonial->message = $request->message;
        $testimonial->position = $request->position;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $testimonial->image = $uploaded_file['file_name'];
            $testimonial->image_path = $uploaded_file['file_path'];
            $testimonial->media_id = $uploaded_file['media_id'];
        }

        $testimonial->save();

        return redirect()->back()->with('success-alert', 'Testimonial update successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->back()->with('success-alert', 'Testimonial delete successfully.');
    }
}
