<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index()

    {
    
       $products = Products::all();
    
       return view('home', compact('products'));
    
    }
    public function addToCart($idProduct)

{

   $product = Products::findOrFail($idProduct);

   $oldCart = Session::get('cart');

 

   $newCart = new Cart($oldCart);

   $newCart->add($product);

 

   Session::put('cart', $newCart);

   Session::flash('add-to-cart-success', 'Them sp vao gio hang thang cong');

   return back();

}

 

public function getCart()

{

   $cart = Session::get('cart');

   return view('cart.index', compact('cart'));

}
}
