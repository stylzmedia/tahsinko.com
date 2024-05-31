<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Page;
use App\Models\Portfolio;

class SitemapController extends Controller
{
    public function index()
    {
        // $product = Product::active()->first();
        // $product_category = Category::active()->where('for', 'product')->first();
        $article = News::where(['status'=>1])->latest('id')->first();
        // $article_category = Category::active()->where('for', 'news')->first();
        // $page = Page::active()->first();
        // $brand = Brand::active()->first();
        $project = Portfolio::where(['status' => 1])->latest('id')->first();

        return response()->view('sitemap.index', compact('project', 'article'))->header('Content-Type', 'text/xml');
    }

    // public function products(){
    //     $products = Product::active()->get();

    //     return response()->view('sitemap.products', compact('products'))->header('Content-Type', 'text/xml');
    // }

    // public function productCategories(){
    //     $categories = Category::active()->where('for', 'product')->get();

    //     return response()->view('sitemap.productCategories', compact('categories'))->header('Content-Type', 'text/xml');
    // }

    public function articles(){
        $articles = News::where(['status'=>1])->latest('id')->get();

        return response()->view('sitemap.articles', compact('articles'))->header('Content-Type', 'text/xml');
    }

    // public function articleCategories(){
    //     $categories = Category::active()->where('for', 'blog')->get();

    //     return response()->view('sitemap.articleCategories', compact('categories'))->header('Content-Type', 'text/xml');
    // }

    // public function brands(){
    //     $brands = Brand::active()->get();

    //     return response()->view('sitemap.brands', compact('brands'))->header('Content-Type', 'text/xml');
    // }

    public function projects(){
        $projects = Portfolio::where(['status' => 1])->latest('id')->get();

        return response()->view('sitemap.projects', compact('projects'))->header('Content-Type', 'text/xml');
    }

    public function pages(){
        $pages = Page::active()->get();

        return response()->view('sitemap.pages', compact('pages'))->header('Content-Type', 'text/xml');
    }
}
