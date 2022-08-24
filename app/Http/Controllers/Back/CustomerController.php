<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use App\Repositories\MediaRepo;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::all();

        return view('back.customer.index', compact('customers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('customer.create');
    }

    /**
     * @param \App\Http\Requests\CustomerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);
        $customer = new Customer();
        $customer->title = $request->title;
        $customer->description = $request->description;
        $customer->position = $request->position;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $customer->image = $uploaded_file['file_name'];
            $customer->image_path = $uploaded_file['file_path'];
            $customer->media_id = $uploaded_file['media_id'];
        }

        $customer->save();

        return redirect()->back()->with('success-alert', 'Customer created successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Customer $customer)
    {
        $customers = Customer::all();
        return view('back.customer.edit', compact('customers','customer'));
    }

    /**
     * @param \App\Http\Requests\CustomerUpdateRequest $request
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $customer->title = $request->title;
        $customer->description = $request->description;
        $customer->position = $request->position;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $customer->image = $uploaded_file['file_name'];
            $customer->image_path = $uploaded_file['file_path'];
            $customer->media_id = $uploaded_file['media_id'];
        }

        $customer->save();

        return redirect()->back()->with('success-alert', 'Customer update successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Customer $customer)
    {
        $customer->delete();

        return redirect()->back()->with('success-alert', 'Customer deleted successfully.');
    }
}
