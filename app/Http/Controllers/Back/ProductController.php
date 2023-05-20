<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Repositories\MediaRepo;
use App\Models\Product;
use App\Models\ProductSpecification;
use App\Models\ProductSpecificationValue;
use App\Models\ProductMedia;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();
        $categories = Category::all();

        return view('back.product.index', compact('products' , 'categories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::where('for', 'product')->latest('id')->get();
        return view('back.product.create', compact('categories'));
    }

    /**
     * @param \App\Http\Requests\ProductStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>  'required|max:255',
            'category' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->feature_type = $request->feature_type;
        $product->video = $request->feature_video;
        $product->position = $request->position;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_tags = $request->meta_tags;

        if($request->file('freature_image')){
            $uploaded_file = MediaRepo::upload($request->file('freature_image'));
            $product->freature_image = $uploaded_file['file_name'];
            $product->image_path = $uploaded_file['file_path'];
            $product->media_id = $uploaded_file['media_id'];
        }

        if ($request->file('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = time().'_'.$request->file('pdf_file')->getClientOriginalName();
            $path = public_path() . '/uploads/product/pdf';
            File::makeDirectory($path, $mode = 0777, true, true);
            $destination = public_path('/uploads/product/pdf');
            $file->move($destination, $fileName);
            $product->pdf_file = '/uploads/product/pdf/'.$fileName;
        }

        $product->save();

        $product->categories()->attach($request->category);

        // Product media relation
        foreach ((array)$request->gallery_id as $key => $media_id) {
            $product_media = ProductMedia::where('media_id', $media_id)->where('product_id', $product->id)->first();

            if (!$product_media) {
                $product_media = new ProductMedia;
                $product_media->media_id = $media_id;
                $product_media->product_id = $product->id;
                $product_media->position = $key;
                $product_media->save();
            }
        }

        return redirect()->back()->with('success-alert', 'Product created successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        $categories = Category::where('for', 'product')->latest('id')->get();
        $productSpecifications = ProductSpecification::get();
        $productSpecificationValues = ProductSpecificationValue::get();
        return view('back.product.edit', compact('product', 'categories', 'productSpecifications', 'productSpecificationValues'));
    }

    /**
     * @param \App\Http\Requests\ProductUpdateRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' =>  'required|max:255',
            'category' => 'required'
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->feature_type = $request->feature_type;
        $product->video = $request->feature_video;
        $product->position = $request->position;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_tags = $request->meta_tags;

        if($request->file('freature_image')){
            $uploaded_file = MediaRepo::upload($request->file('freature_image'));
            $product->freature_image = $uploaded_file['file_name'];
            $product->image_path = $uploaded_file['file_path'];
            $product->media_id = $uploaded_file['media_id'];
        }

        if ($request->file('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = time().'_'.$request->file('pdf_file')->getClientOriginalName();
            $path = public_path() . '/uploads/product/pdf';
            File::makeDirectory($path, $mode = 0777, true, true);
            $destination = public_path('/uploads/product/pdf');
            $file->move($destination, $fileName);
            $product->pdf_file = '/uploads/product/pdf/'.$fileName;
        }

        $product->save();

        $product->categories()->sync($request->category);

        // Product media relation update
        ProductMedia::whereNotIn('media_id', (array)$request->old_gallery_id)->where('product_id', $product->id)->delete();

        foreach ((array)$request->gallery_id as $key => $media_id) {
            $product_media = ProductMedia::where('media_id', $media_id)->where('product_id', $product->id)->first();

            if (!$product_media) {
                $product_media = new ProductMedia;
                $product_media->media_id = $media_id;
                $product_media->product_id = $product->id;
                $product_media->position = $key;
                $product_media->save();
            }
        }

        return redirect()->back()->with('success-alert', 'Product Update successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success-alert', 'Product Delete successfully.');
    }

    public function category()
    {
        $categories = Category::where('for', 'product')->latest('id')->get();

        return view('back.product.categories', compact('categories'));

    }

    public function removeImage(Product $product)
    {
        $product->freature_image = null;
        $product->media_id = null;
        $product->save();

        return redirect()->back()->with('success-alert', 'Product images deleted successfully.');
    }

}
