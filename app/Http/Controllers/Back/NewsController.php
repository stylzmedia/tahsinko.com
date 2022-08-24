<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Repositories\MediaRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest('id')->get();
        return view('back.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('for', 'news')->active()->get();
        return view('back.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v_data = [
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required'
        ];

        if ($request->file('image')) {
            $v_data['image'] = 'mimes:jpg,png,jpeg,gif';
        }

        $request->validate($v_data);

        $news = new News();
        $news->title = $request->title;
        $news->sub_title = $request->sub_title;
        $news->slug = Str::slug($request->title);
        $news->description = $request->description;
        $news->meta_title = $request->meta_title;
        $news->meta_description = $request->meta_description;
        $news->meta_tags = $request->meta_tags;
        $news->category_id = $request->category;
        $news->feature_type = $request->feature_type;
        $news->feature_video = $request->feature_video;
        $news->source_name = $request->source_name;
        $news->source_link = $request->source_link;

        if ($request->file('image')) {
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $news->image = $uploaded_file['file_name'];
            $news->image_path = $uploaded_file['file_path'];
            $news->media_id = $uploaded_file['media_id'];
        }

        // Upload Video
        if ($request->file('video')) {
            $file = $request->file('video');
            $fileName = time() . '_' . $request->file('video')->getClientOriginalName();

            $destination = public_path('uploads/news/video');
            $file->move($destination, $fileName);

            $news->video = $fileName;
        }

        if ($request->video_embade_code) {
            $news->video_embade_code = $request->video_embade_code;
        }

        if ($request->file('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = time() . '_' . $request->file('pdf_file')->getClientOriginalName();
            $path = public_path() . '/uploads/news/pdf';
            File::makeDirectory($path, $mode = 0777, true, true);
            $destination = public_path('/uploads/news/pdf');
            $file->move($destination, $fileName);
            $news->pdf_file = '/uploads/news/pdf/' . $fileName;
        }
        $news->video_type = $request->video_type;
        $news->publish_date = $request->publish_date;

        $news->save();

        return redirect()->back()->with('success-alert', 'News created successfully.');
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
    public function edit(News $news)
    {
        $categories = Category::where('for', 'news')->active()->get();

        return view('back.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $v_data = [
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required'
        ];

        if ($request->file('image')) {
            $v_data['image'] = 'mimes:jpg,png,jpeg,gif';
        }

        $request->validate($v_data);

        $news->title = $request->title;
        $news->sub_title = $request->sub_title;
        $news->slug = Str::slug($request->title);
        $news->description = $request->description;
        $news->meta_title = $request->meta_title;
        $news->meta_description = $request->meta_description;
        $news->meta_tags = $request->meta_tags;
        $news->category_id = $request->category;
        $news->feature_type = $request->feature_type;
        $news->feature_video = $request->feature_video;
        $news->source_name = $request->source_name;
        $news->source_link = $request->source_link;

        if ($request->file('image')) {
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $news->image = $uploaded_file['file_name'];
            $news->image_path = $uploaded_file['file_path'];
            $news->media_id = $uploaded_file['media_id'];
        }

        // Upload Video
        if ($request->file('video')) {
            $file = $request->file('video');
            $fileName = time() . '_' . $request->file('video')->getClientOriginalName();

            $destination = public_path('uploads/news/video');
            $file->move($destination, $fileName);

            $news->video = $fileName;
        }

        if ($request->video_embade_code) {
            $news->video_embade_code = $request->video_embade_code;
        }

        if ($request->file('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = time() . '_' . $request->file('pdf_file')->getClientOriginalName();
            $path = public_path() . '/uploads/news/pdf';
            File::makeDirectory($path, $mode = 0777, true, true);
            $destination = public_path('/uploads/news/pdf');
            $file->move($destination, $fileName);
            $news->pdf_file = '/uploads/news/pdf/' . $fileName;
        }
        $news->video_type = $request->video_type;
        $news->publish_date = $request->publish_date;

        $news->save();

        return redirect()->back()->with('success-alert', 'News update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->back()->with('success-alert', 'News deleted successfully.');
    }

    public function categories()
    {
        $categories = Category::where('category_id', null)->where('for', 'news')->latest('id')->get();
        return view('back.news.categories', compact('categories'));
    }

    public function categoriesCreate($id)
    {
        $categories = Category::where('category_id', null)->where('for', 'news')->latest('id')->get();
        $cat = Category::where('id', $id)->first();

        return view('back.news.category-edit', compact('categories', 'cat'));
    }

    public function removeImage(News $news)
    {
        $news->image = null;
        $news->media_id = null;
        $news->save();

        return redirect()->back()->with('success-alert', 'News images deleted successfully.');
    }
}
