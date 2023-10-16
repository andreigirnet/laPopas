<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class BasketController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('front.cart');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Cart::add($request->id, $request->name, 1, (float)$request->price, ['image' => $request->image]);
        return redirect(route('cart.index'))->with('success',"The course has been added to the cart");
//        Cart::instance('default')->add($request->id, $request->name, $request->quantity, $request->price, ['currentLang' => $request->lang]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
}
