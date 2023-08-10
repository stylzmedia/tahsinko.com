<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\OrderNotification;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('back.requestOrder.index', compact('orders'));
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
        // dd($request);
        $request->validate([
            'name'=>'required|string|max:191',
            'product_name'=>'required|string|max:191',
            'product_id'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
            'stop_opening'=>'required',
            'machine_room'=>'required',
        ]);

        $order = new Order();
        $order->name = $request->name;
        $order->product_name = $request->product_name;
        $order->product_id = $request->product_id;
        $order->company = $request->company;
        $order->address = $request->address;
        $order->email = $request->email;
        $order->mobile = $request->mobile;
        $order->stop_opening = $request->stop_opening;
        $order->shaft_size = $request->shaft_size;
        $order->capacity = $request->capacity;
        $order->machine_room = $request->machine_room;
        $order->head_room = $request->head_room;
        $order->pit = $request->pit;
        $order->save();


        // Send the email
        Mail::to($order->email)->send(new OrderNotification($order));

        return redirect()->back()->with('success-alert', 'Order placed successfully.');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
