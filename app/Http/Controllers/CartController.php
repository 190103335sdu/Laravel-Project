<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function add(Product $product){
        $product = Product::find($product->id);

        \Cart::session(auth()->id())->add(array(
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1,
        'attributes' => array(),
        'associatedModel' => $product
        ));

        return redirect()->route('cart.index');
    }

    public function index(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        $products = Product::take(2)->get();
        return view('cart.index',compact('cartItems','products'));
    }

    public function destroy($itemId){
       \Cart::session(auth()->id())->remove($itemId);
        return back();
    }

    public function update($rowId){
        \Cart::session(auth()->id())->update($rowId, [
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ]);
        return back();
    }

    public function checkout(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('cart.checkout', compact('cartItems'));
    }
}


