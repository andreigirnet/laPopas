<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\CartItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    private $cart;

    /**
     * @return mixed
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param mixed $cart
     */
    public function setCart($cart): void
    {
        $this->cart = $cart;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('front.cart');
    }

    public function cartTotalBefore(){
        $total = Cart::total();
        return response()->json($total);
    }

    public function cartTotal(){
        $total = $this->discount();
        return response()->json($total);
    }

    private function discount() {
        $total = Cart::total();
        $totalBefore = Cart::total();
        if ($total >= 200) {
            $total = $total * 0.9;
        } else if ($total >= 100) {
            $total = $total * 0.95;
        }
        $result = [
            'total' => number_format($total, 2),
            'totalBefore' => number_format($totalBefore, 2)
        ];

        return response()->json($result);
    }

    public function applyDiscounts()
    {
        $total = $this->discount();
        return redirect(route('checkout.index'));
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
        $productName = $request->name;
        Cart::add($request->id, $productName, 1, $request->price, ['image' => $request->image, 'key'=>$request->key]);
        if($request->page){
            return redirect(route('main'))->with('success', "Added to cart/Adăugat în coș");
        }else{
            return back()->with('success', "Added to cart/Adăugat în coș");
        }
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
    public function update(Request $request)
    {
        Cart::update($request->rowId, intval($request->quantity));
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
