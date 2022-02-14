<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

// https://therealprogrammer.com/how-to-make-laravel-8-shopping-cart/
class CartController extends Controller
{
    public function cartList()
    {
        if(is_null(auth()->user())){
            $cartItems = \Cart::getContent();
        }else{
            $userId = auth()->user()->id;
            $cartItems = \Cart::session($userId)->getContent();
        }

        $items = array();
        foreach ($cartItems as $item){
            $photo = Product::find($item->id)->images->first;
            $item->photo = $photo->file->file;

            array_push($items, $item->id);
    }

        //dd($cartItems);
        //return view('cart', compact('cartItems'));
        return view('layout.cart', compact('cartItems', 'items'));

    }


    public function addToCart(Request $request)
    {
        if(is_null(auth()->user())){
            \Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'size' => $request->size,
                )
            ]);
        }else{
            $userId = auth()->user()->id;
            \Cart::session($userId)->add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'size' => $request->size,
                )
            ]);
        }

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {

        if(is_null(auth()->user())){
            \Cart::update(
                $request->id,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $request->quantity
                    ],
                ]
            );
        }else{
            $userId = auth()->user()->id;
            \Cart::session($userId)->update(
                $request->id,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $request->quantity
                    ],
                ]
            );
        }


        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        if(is_null(auth()->user())){
            \Cart::remove($request->id);
        }else{
            $userId = auth()->user()->id;
            \Cart::session($userId)->remove($request->id);
        }

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        if(is_null(auth()->user())){
            \Cart::clear();
        }else{
            $userId = auth()->user()->id;
            \Cart::session($userId)->clear();
        }

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('home')->with('success', 'Objednavka bola uskutocnena');
    }


}
