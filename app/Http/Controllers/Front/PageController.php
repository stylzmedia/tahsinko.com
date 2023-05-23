<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\GalleryItem;
use App\Models\HomeSection;
use App\Models\Slider;
use App\Models\Page;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Team;
use App\Models\Customer;
use App\Models\News;
use Illuminate\Support\Carbon;

class PageController extends Controller
{
    // Homepage
    public function homepage()
    {
        $sliders = Slider::active()->get();
        $home_sections = HomeSection::where(['status'=>1])->orderBy('position','ASC')->get();

        // Fetch products with status 1, sorted in ascending order by their position
        $products = Product::where(['status'=>1])->orderBy('position','ASC')->take(4)->get();
        $projects = Portfolio::where(['status'=>1])->orderBy('position','ASC')->take(6)->get();
        $services = Service::where(['status'=>1])->orderBy('position','ASC')->take(7)->get();
        $teams = Team::where(['status'=>1])->orderBy('position','ASC')->get();
        $testimonials = Testimonial::where(['status'=>1])->orderBy('position','ASC')->get();
        $clients = Customer::where(['status'=>1])->orderBy('position','ASC')->get();
        $newes = News::where(['status'=>1])->orderBy('publish_date','desc')->take(4)->get();


        return view('front.homepage', compact(
            'sliders',
            'home_sections',
            'products',
            'projects',
            'services',
            'teams',
            'testimonials',
            'clients',
            'newes'
        ));
    }

    /*
     * method for single home section page
     * */
    public function singleHomeSection(HomeSection $homeSection)
    {
        return view('front.singleHomeSection',compact('homeSection'));
    }

    public function commonPage($slug){
        //dd($slug);
        $page = Page::where('slug',$slug)->firstOrFail();
        if ($page->template) {
            return view('front.' . $page->template, compact('page'));
        }
        return view('front.page',compact('page'));
    }

    public function singleNews($blog)
    {
        $news = News::where('slug', $blog)->first();

        return view('front.news.single-news',compact('news'));
    }

    public function singleProduct($name){
        $product = Product::where('name', $name)->first();
        // dd($product);
        return view('front.single-product',compact('product'));

    }

    public function singleProject($id)
    {
        $project = Portfolio::where('id', $id)->first();
        $projects = Portfolio::orderBy('id')->get();

        return view('front.single-project', compact('project', 'projects'));
    }


    public function gallery(Gallery $gallery){
        return view('front.gallery.gallery', compact('gallery'));
    }


}
