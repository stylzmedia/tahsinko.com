<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioStoreRequest;
use App\Http\Requests\PortfolioUpdateRequest;
use App\Models\Portfolio;
use App\Models\PortfolioMedia;
use App\Models\Product;
use App\Repositories\MediaRepo;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $portfolios = Portfolio::all();

        return view('back.portfolio.index', compact('portfolios'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $products = Product::where('status', 1)->get();
        return view('back.portfolio.create', compact('products'));
    }

    /**
     * @param \App\Http\Requests\PortfolioStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->product_id = $request->product_id;
        $portfolio->client_name = $request->client_name;
        $portfolio->location = $request->location;
        $portfolio->total_capacity = $request->total_capacity;
        $portfolio->position = $request->position;
        $portfolio->meta_title = $request->meta_title;
        $portfolio->meta_description = $request->meta_description;
        $portfolio->meta_tags = $request->meta_tags;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $portfolio->image = $uploaded_file['file_name'];
            $portfolio->image_path = $uploaded_file['file_path'];
            $portfolio->media_id = $uploaded_file['media_id'];
        }

        $portfolio->save();
        // portfolio media relation
        foreach ((array)$request->gallery_id as $key => $media_id) {
            $portfolio_media = PortfolioMedia::where('media_id', $media_id)->where('portfolio_id', $portfolio->id)->first();

            if (!$portfolio_media) {
                $portfolio_media = new PortfolioMedia;
                $portfolio_media->media_id = $media_id;
                $portfolio_media->portfolio_id = $portfolio->id;
                $portfolio_media->position = $key;
                $portfolio_media->save();
            }
        }

        return redirect()->back()->with('success-alert', 'Portfolio created successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Portfolio $portfolio)
    {
        return view('portfolio.show', compact('portfolio'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Portfolio $portfolio)
    {
        $products = Product::where('status', 1)->get();
        return view('back.portfolio.edit', compact('portfolio','products'));
    }

    /**
     * @param \App\Http\Requests\PortfolioUpdateRequest $request
     * @param \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->product_id = $request->product_id;
        $portfolio->client_name = $request->client_name;
        $portfolio->location = $request->location;
        $portfolio->total_capacity = $request->total_capacity;
        $portfolio->position = $request->position;
        $portfolio->meta_title = $request->meta_title;
        $portfolio->meta_description = $request->meta_description;
        $portfolio->meta_tags = $request->meta_tags;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $portfolio->image = $uploaded_file['file_name'];
            $portfolio->image_path = $uploaded_file['file_path'];
            $portfolio->media_id = $uploaded_file['media_id'];
        }

        $portfolio->save();
        // portfolio media relation
        foreach ((array)$request->gallery_id as $key => $media_id) {
            $portfolio_media = PortfolioMedia::where('media_id', $media_id)->where('portfolio_id', $portfolio->id)->first();

            if (!$portfolio_media) {
                $portfolio_media = new PortfolioMedia;
                $portfolio_media->media_id = $media_id;
                $portfolio_media->portfolio_id = $portfolio->id;
                $portfolio_media->position = $key;
                $portfolio_media->save();
            }
        }

        return redirect()->back()->with('success-alert', 'Portfolio Update successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect()->back()->with('success-alert', 'Portfolio Delete successfully.');
    }
}
