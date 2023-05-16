<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Info;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest('id')->get();
        $categories = Category::where('for', 'gallery')->active()->get();

        return view('back.galleries.index', compact('galleries', 'categories'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required'
        ]);

        $gallery = new Gallery;
        $gallery->name = $request->name;
        $gallery->position = $request->position;
        $gallery->category_id = $request->category;
        $gallery->save();

        return redirect()->back()->with('success-alert', 'Gallery created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $categories = Category::where('for', 'gallery')->active()->get();

        return view('back.galleries.edit', compact('gallery', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required'
        ]);

        $gallery->name = $request->name;
        $gallery->position = $request->position;
        $gallery->category_id = $request->category;
        $gallery->save();

        return redirect()->back()->with('success-alert', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->back()->with('success-alert', 'Gallery deleted successfully.');
    }

    public function uploadPhoto(Request $request, $id){

        ini_set('memory_limit', '256M');
        $image = $request->file('file');
        $imageName = 'tahsinko-lift-dhaka-bangladesh-'.time().'-'.$image ->getClientOriginalName();
        $path = public_path() . '/uploads' . '/gallery' . '/' . date('Y') . '/' . date('m') . '/';
        File::makeDirectory($path, $mode = 0775, true, true);
        $path = '/uploads' . '/gallery' . '/' . date('Y') . '/' . date('m') . '/';

        $small_width = Info::Settings('media', 'large_width') ?? 150;
        $small_height = Info::Settings('media', 'large_height');

        $medium_width = Info::Settings('media', 'large_width') ?? 410;
        $medium_height = Info::Settings('media', 'large_height');

        $large_width = Info::Settings('media', 'large_width') ?? 1200;
        $large_height = Info::Settings('media', 'large_height');

        // Resize Small Image
        $image_resize = Image::make($image->getRealPath());
        if ($small_width && $small_height) {
            $image_resize->resize($small_width, $small_height);
        } elseif ($small_width) {
            $image_resize->resize($small_width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        } elseif ($small_height) {
            $image_resize->resize(null, $small_height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $image_resize->save(public_path($path . 'small_' . $imageName));

        // Resize Medium Image
        $image_resize = Image::make($image->getRealPath());
        if ($medium_width && $medium_height) {
            $image_resize->resize($medium_width, $medium_height);
        } elseif ($medium_width) {
            $image_resize->resize($medium_width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        } elseif ($medium_height) {
            $image_resize->resize(null, $medium_height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $image_resize->save(public_path($path . 'medium_' . $imageName));

        // Resize Large Image
        $image_resize = Image::make($image->getRealPath());
        if ($large_width && $large_height) {
            $image_resize->resize($large_width, $large_height);
        } elseif ($large_width) {
            $image_resize->resize($large_width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        } elseif ($large_height) {
            $image_resize->resize(null, $large_height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $image_resize->save(public_path($path . 'large_' . $imageName));

        // Original file
        $destination = public_path() . $path;
        $image->move($destination, $imageName);

        // Store Media Data
        $gallery_item = new GalleryItem;
        $gallery_item->image = $imageName;
        $gallery_item->gallery_id = $id;
        $gallery_item->year = date('Y');
        $gallery_item->month = date('m');
        $gallery_item->save();

        return $gallery_item->id;
    }

    public function uploadVideo(Request $request, $id)
    {
        ini_set('memory_limit', '256M');
        $request->validate([
            'title' => 'required',
            'video' => 'required|mimes:mp4'
        ]);
        if ($request->file('video')) {
            $file = $request->file('video');
            $fileName = time() . '_' . $request->file('video')->getClientOriginalName();
            $path = public_path() . '/uploads/gallery/video/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $destination = public_path('uploads/gallery/video');
            $file->move($destination, $fileName);

            //$blog->video = $fileName;
        }
        $gallery_item = new GalleryItem;
        $gallery_item->title = $request->title;
        $gallery_item->video = '/uploads/gallery/video/' . $fileName;
        $gallery_item->type = 2;
        $gallery_item->gallery_id = $id;
        $gallery_item->save();

        return redirect()->back()->with('success-alert', 'Uploaded successfully.');
    }

    public function uploadEmbedCode(Request $request, $id)
    {
        ini_set('memory_limit', '256M');
        $request->validate([
            'title' => 'required',
            'video_embade_code' => 'required'
        ]);
        $gallery_item = new GalleryItem;
        $gallery_item->title = $request->title;
        $gallery_item->video_embade_code = $request->video_embade_code;
        $gallery_item->type = 3;
        $gallery_item->gallery_id = $id;
        $gallery_item->save();

        return redirect()->back()->with('success-alert', 'Uploaded successfully.');
    }

    public function uploadPdf(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'pdf_file' => 'required|mimes:pdf'
        ]);

        if ($request->file('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = time() . '_' . $request->file('pdf_file')->getClientOriginalName();
            $path = public_path() . '/uploads/gallery/pdf/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $destination = public_path('uploads/gallery/pdf');
            $file->move($destination, $fileName);

        }

        $gallery_item = new GalleryItem;
        $gallery_item->title = $request->title;
        $gallery_item->pdf_file = '/uploads/gallery/pdf/' . $fileName;
        $gallery_item->type = 4;
        $gallery_item->gallery_id = $id;
        $gallery_item->save();

        return redirect()->back()->with('success-alert', 'Uploaded successfully.');
    }

    public function deletePhoto($id)
    {
        $item = GalleryItem::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success-alert', 'Gallery item deleted successfully.');
    }

    public function changePhotoPosition(Request $request)
    {

        foreach ($request->position as $i => $data) {
            $query = GalleryItem::find($data);
            $query->position = $i;
            $query->save();
        }

        return redirect()->back()->with('success-alert', 'Position updated successfully.');
    }

    public function category()
    {
        $categories = Category::where('for', 'gallery')->latest('id')->get();

        return view('back.galleries.categories', compact('categories'));
    }

    public function updateGalleryItem(Request $request, $id)
    {
        $v_data = [
            'title' => 'required|max:255',
            'description' => 'required'
        ];

        if($request->file('image')){
            $v_data['image'] = 'mimes:jpg,png,jpeg,gif';
        }elseif($request->file('video')){
            $v_data['video'] = 'required|mimes:mp4';
        }elseif($request->file('video_embade_code')){
            $v_data['video_embade_code'] = 'required';
        }elseif($request->file('pdf_file')){
            $v_data['pdf_file'] = 'required|mimes:pdf';
        }

        $request->validate($v_data);

        $gallery = GalleryItem::find($id);
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        if($request->file('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $sm_w = Info::Settings('media', 'small_width') ?? 150;
            $sm_h = Info::Settings('media', 'small_height');
            $md_w = Info::Settings('media', 'medium_width') ?? 410;
            $md_h = Info::Settings('media', 'medium_height');
            $lg_w = Info::Settings('media', 'large_width') ?? 1200;
            $lg_h = Info::Settings('media', 'large_height');

            // sm
            $path = public_path() . '/uploads/gallery/small/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit($sm_w, $sm_h);
            $image_resize->save(public_path('/uploads/gallery/small/' . $imageName));
            // md
            $path = public_path() . '/uploads/gallery/medium/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit($md_w, $md_h);
            $image_resize->save(public_path('/uploads/gallery/medium/' . $imageName));
            // lg
            $path = public_path() . '/uploads/gallery/large/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit($lg_w, $lg_h);
            $image_resize->save(public_path('/uploads/gallery/large/' . $imageName));

            // Original
            $image->move(public_path('uploads/gallery'), $imageName);

            $gallery->image = $imageName;
        }elseif($request->file('video')) {
            $file = $request->file('video');
            $fileName = time() . '_' . $request->file('video')->getClientOriginalName();
            $path = public_path() . '/uploads/gallery/video/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $destination = public_path('uploads/gallery/video');
            $file->move($destination, $fileName);

            $gallery->video = '/uploads/gallery/video/' . $fileName;
        }elseif($request->video_embade_code) {
            $gallery->video_embade_code = $request->video_embade_code;
        }elseif($request->file('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = time() . '_' . $request->file('pdf_file')->getClientOriginalName();
            $path = public_path() . '/uploads/gallery/pdf/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $destination = public_path('uploads/gallery/pdf');
            $file->move($destination, $fileName);

            $gallery->pdf_file = '/uploads/gallery/pdf/' . $fileName;
        }
        $gallery->save();

        return redirect()->back()->with('success-alert', 'Update successfully.');

    }

    public function galleryEdit(Request $request, $id)
    {
        $gallery = GalleryItem::find($id);
        return view('back.galleries.single-edit', compact('gallery'));
    }
}
