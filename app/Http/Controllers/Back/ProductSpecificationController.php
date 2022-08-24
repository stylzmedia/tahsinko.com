<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSpecificationStoreRequest;
use App\Http\Requests\ProductSpecificationUpdateRequest;
use App\Models\ProductSpecification;
use Illuminate\Http\Request;

class ProductSpecificationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productSpecifications = ProductSpecification::all();

        return view('productSpecification.index', compact('productSpecifications'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('productSpecification.create');
    }

    /**
     * @param \App\Http\Requests\ProductSpecificationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        $productSpecification = new ProductSpecification();
        $productSpecification->name = $request->name;
        $productSpecification->position = $request->position;
        $productSpecification->save();

        return redirect()->back()->with('success-alert', 'Product Specification Create successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductSpecification $productSpecification
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProductSpecification $productSpecification)
    {
        return view('productSpecification.show', compact('productSpecification'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductSpecification $productSpecification
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProductSpecification $productSpecification)
    {
        $productSpecifications = ProductSpecification::get();

        return view('back.productSpecification.edit', compact('productSpecifications','productSpecification'));
    }

    /**
     * @param \App\Http\Requests\ProductSpecificationUpdateRequest $request
     * @param \App\Models\ProductSpecification $productSpecification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSpecification $productSpecification)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $productSpecification->name = $request->name;
        $productSpecification->position = $request->position;
        $productSpecification->save();

        return redirect()->back()->with('success-alert', 'Product Specification Update successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductSpecification $productSpecification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ProductSpecification $productSpecification)
    {
        $productSpecification->delete();

        return redirect()->route('productSpecification.index');
    }
}
