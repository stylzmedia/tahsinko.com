<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSpecificationValueStoreRequest;
use App\Http\Requests\ProductSpecificationValueUpdateRequest;
use App\Models\ProductSpecificationValue;
use App\Models\ProductSpecification;
use Illuminate\Http\Request;

class ProductSpecificationValueController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productSpecificationValues = ProductSpecificationValue::all();

        return view('productSpecificationValue.index', compact('productSpecificationValues'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('productSpecificationValue.create');
    }

    /**
     * @param \App\Http\Requests\ProductSpecificationValueStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|max:255',
            'product_specification_id' => 'required'
       ]);
        $productSpecificationValue = new ProductSpecificationValue();
        $productSpecificationValue->name = $request->name;
        $productSpecificationValue->product_specification_id = $request->product_specification_id;
        $productSpecificationValue->position = $request->position;
        $productSpecificationValue->save();

        return redirect()->back()->with('success-alert', 'Product Specification value Create successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductSpecificationValue $productSpecificationValue
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProductSpecificationValue $productSpecificationValue)
    {
        return view('productSpecificationValue.show', compact('productSpecificationValue'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductSpecificationValue $productSpecificationValue
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProductSpecificationValue $productSpecificationValue)
    {
        $productSpecificationValues = ProductSpecificationValue::get();
        $productSpecifications = ProductSpecification::get();

        return view('back.productSpecificationValue.edit', compact('productSpecificationValues','productSpecifications','productSpecificationValue'));
    }

    /**
     * @param \App\Http\Requests\ProductSpecificationValueUpdateRequest $request
     * @param \App\Models\ProductSpecificationValue $productSpecificationValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSpecificationValue $productSpecificationValue)
    {
        $request->validate([
            'name' => 'required|max:255',
            'product_specification_id' => 'required'
       ]);

        $productSpecificationValue->name = $request->name;
        $productSpecificationValue->product_specification_id = $request->product_specification_id;
        $productSpecificationValue->position = $request->position;
        $productSpecificationValue->save();

        return redirect()->back()->with('success-alert', 'Product Specification value Update successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductSpecificationValue $productSpecificationValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ProductSpecificationValue $productSpecificationValue)
    {
        $productSpecificationValue->delete();

        return redirect()->back()->with('success-alert', 'Product Specification value Delete successfully.');
    }
}
