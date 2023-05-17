<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use App\Models\SectionDesignType;
use Illuminate\Support\Facades\File;
use App\Models\SectionName;
use App\Repositories\MediaRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class HomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = HomeSection::orderBy('position', 'ASC')->get();
        $section_names = SectionName::all();
        $section_design_types = SectionDesignType::where(['is_active' => 1])->get();

        return view('back.frontend.section.index', compact('sliders', 'section_names', 'section_design_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
{
    $request->validate([
        'section_name'=>'required|string|max:191',
        'section_name_is_show'=>'required',
        'image' => 'image|mimes:jpg,png,jpeg,gif',
    ]);

    $home_section = $request->except('image');

    if ($request->file('image')) {
        $uploadedFile = $request->file('image');
        $uploadedFileName = 'lift-dhaka-bangladesh-' . time() . '-' . $uploadedFile->getClientOriginalName();
        $path = public_path('/uploads/section');
        $destination = $path . '/' . $uploadedFileName;
        $home_section += [
            'image'=> $uploadedFileName,
            'image_path' => 'uploads/section',
        ];
        $uploadedFile->move($path, $destination);
    }

    if ($request->feature_video != "") {
        $youtube_id = "";
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
        if (preg_match($longUrlRegex, $request->feature_video, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        $home_section['feature_video'] = "https://www.youtube.com/embed/" . $youtube_id;
    }

    $home_section += [
        'created_by' => auth()->id(),
    ];

    try {
        $newSection = HomeSection::create($home_section);

        // Delete the image if it exists and the section creation was successful
        if ($newSection && $newSection->image && File::exists(public_path($newSection->image_path))) {
            File::delete(public_path($newSection->image_path));
        }

        return response()->json(['status'=>'success','message'=>'Successfully stored'], 200);
    } catch (\Exception $e) {
        return response()->json(['status'=>'success','message'=>'Cant\'t created.'], 200);
    }
}


    public function edit(HomeSection $homeSection)
    {
        $sliders = HomeSection::orderBy('position', 'ASC')->get();
        return view('back.frontend.section.edit', compact('homeSection', 'sliders'));
    }

    public function update(HomeSection $homeSection, Request $request)
{
    $request->validate([
        'section_name' => 'required|string|max:191',
        'section_name_is_show' => 'required',
        'image' => 'image|mimes:jpg,png,jpeg,gif'
    ]);

    // Store the current image path
    $previousImagePath = $homeSection->image_path;

    $home_section = $request->except('image');

    if ($request->file('image')) {
        $uploadedFile = $request->file('image');
        $uploadedFileName = 'lift-dhaka-bangladesh-' . time() . '-' . $uploadedFile->getClientOriginalName();
        $path = public_path('/uploads/section');
        $destination = $path . '/' . $uploadedFileName;
        $uploadedFile->move($path, $destination);

        // Delete the previous image if it exists
        if ($previousImagePath && File::exists(public_path($previousImagePath))) {
            File::delete(public_path($previousImagePath));
        }

        $home_section += [
            'image'=> $uploadedFileName,
            'image_path' => 'uploads/section/' . $uploadedFileName,
        ];
    }

    if ($previousImagePath && File::exists(public_path($previousImagePath))) {
        File::delete(public_path($previousImagePath));
    }

        if ($request->feature_video != "") {
            $youtube_id = "";
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
            if (preg_match($longUrlRegex, $request->feature_video, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            $home_section['feature_video'] = "https://www.youtube.com/embed/" . $youtube_id;
        }

        $home_section += [
            'updated_by' => auth()->id(),
        ];

        try {
            $homeSection->update($home_section);
            return response()->json(['status' => 'success', 'message' => 'Successfully updated.'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Can\'t update.'], 200);
        }
    }

    public function remove(HomeSection $homeSection)
    {
        // Check if the image exists
        if ($homeSection->image && File::exists(public_path($homeSection->image_path))) {
            // Delete the image
            File::delete(public_path($homeSection->image_path));
        }

        // Remove the section from the database
        $homeSection->delete();

        return redirect()->route('back.frontend.section')->with('success-alert', 'Successfully removed.');
    }

    public function positionUpdate(Request $request)
    {
        foreach ($request->ids as $i => $data) {
            $query = HomeSection::find($data);
            $query->update(['position' => $i]);
        }
        return response()->json(['status' => 'success', 'message' => "Successfully updated"], 200);
    }

    public function sectionTypeStore(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string|max:191',
            'section_design_type_id' => 'required|not_in:0',
        ])->validate();

        try {
            $ss = SectionName::create($request->all());
            if (isset($ss->id)) {
                return response()->json(['status' => 'success', 'message' => 'Successfully stored'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Can\'t store information'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid request'], 404);
    }
}
