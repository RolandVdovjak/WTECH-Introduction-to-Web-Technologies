<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $address = Address::with('user')->get();
        return view('layout.address_add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('layout.address_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'city' => 'required',
            'street' => 'required',
            'house_number' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required'
        ]);



        $address = Address::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'city' => $request->city,
            'street' => $request->street,
            'house_number' => $request->house_number,
            'state' => $request->state,
            'zip' => $request->zip,
            'phone' => $request->phone,

        ]);

        $user = Auth::user();
        $aid = $address->id;
        DB::update('update users set address_id = (?) where id = (?)', [$aid, $user->id]);

        return redirect()->intended(RouteServiceProvider::HOME);
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
    public function edit(Address $address)
    {

        return view('layout.address_update', compact('address', $address));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Address $address)
    {

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'city' => 'required',
            'street' => 'required',
            'house_number' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required'
        ]);

        $address->name = $request->name;
        $address->surname = $request->surname;
        $address->city = $request->city;
        $address->street = $request->street;
        $address->house_number = $request->house_number;
        $address->state = $request->state;
        $address->zip = $request->zip;
        $address->phone = $request->phone;

        $address->save();


        $request->session()->flash('message', 'Zmena bola úspešná.');

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
