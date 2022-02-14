<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dd($request);


        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'city' => 'required',
            'zip' => 'required|numeric',
            'street' => 'required',
            'house_number' => 'required|numeric',
            'state' => 'required',
        ]);




        $input = $request->all();
        //dd($input);

        $order = Order::create([
            'delivery' => $request->delivery,
            'payment' => $request->payment,
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'email' => $request->email,
            'city' => $request->city,
            'zip' => $request->zip,
            'street' => $request->street,
            'house_number' => $request->house_number,
            'state' => $request->state,
            'user_id' => $request->user_id,
            'price' => $request->price,
        ]);

        $items = $request->input('items');
        //dd($items);
        $order->products()->attach($items);



        return redirect()->route('cart.clear')->with('success', 'Objednavka bola uskutocnena');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
