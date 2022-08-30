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
        $products = Product::where(['status'=>1])->orderBy('position','ASC')->take(4)->get();
        $projects = Portfolio::where(['status'=>1])->orderBy('position','ASC')->take(6)->get();
        $services = Service::where(['status'=>1])->orderBy('position','ASC')->take(7)->get();
        $teams = Team::where(['status'=>1])->orderBy('position','ASC')->get();
        $testimonials = Testimonial::where(['status'=>1])->orderBy('position','ASC')->get();
        $clients = Customer::where(['status'=>1])->orderBy('position','ASC')->get();
        $newes = News::where(['status'=>1])->orderBy('position','ASC')->take(6)->get();
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

    public function contactUs(){
        //$page=Page::where('')
        return view('front.contactUs');
    }
    public function aboutUs(){
        return view('front.about-us');
    }
    public function ourCeo(){
        return view('front.our-ceo');
    }
    /*
     * method for single home section page
     * */
    public function singleHomeSection(HomeSection $homeSection)
    {
        return view('front.singleHomeSection',compact('homeSection'));
    }

    public function commonPage($slug){
        $page = Page::where('slug',$slug)->first();
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

        return view('front.single-product',compact('product'));

    }



    public function galleries(){
         $galleries = Gallery::active()->get();
         return view('front.gallery.galleries', compact('galleries'));
    }
    public function gallery($gallery){
        $gallery = Gallery::where('name', $gallery)->first();
        return view('front.gallery.gallery', compact('gallery'));
    }


}
