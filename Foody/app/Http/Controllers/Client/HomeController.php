<?php

namespace App\Http\Controllers\client;

use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $foods = Foods::all();
        $Categories = Categories::all();
        $params     = [
            "foods" => $foods,
            "Categories" => $Categories
        ];
     return view('client.home.index',$params);
    }//
    public function categories($id)
    {
        $CategoriesCurrent = DB::table('foods')->where("category_id",$id)->get();
        $Categories = Categories::all();
        $params = ['CategoriesCurrent'  =>  $CategoriesCurrent,
                    "Categories"        =>  $Categories ];
        // echo "<pre>";
        // print_r($Categories);
        // echo "</pre>";
        return view('client.home.categories',$params);
    }
    public function addToCart(Request $request,$id)
    {
        $food = Foods::find($id);
    $carts = new Carts() ;
    $carts->food_id = $food->id;
    $carts->quantity = 1;
    $carts->price = $food->price;
    $carts->save();

   return redirect()->route('cart');
    }
    public function cart()
    {
        $Categories = Categories::all();
        $Carts = DB::table('carts')
        ->join('foods', 'foods.id', '=', 'carts.food_id')
        ->select('carts.*', 'foods.image','foods.name',DB::raw('(carts.price * carts.quantity) as totalPrice'))
        ->get();
        $params = [ 
                    "Categories"    =>  $Categories,
                    "Carts"         =>  $Carts 
                  ];
        // echo "<pre>";
        // print_r($Carts);
        // echo "</pre>";
        // die();
        return view('client.home.cart',$params);
    }
    public function fixCartUser(Request $request,$id)
   {
      $cart = Carts::find($id);
      $cart->quantity  = $request->quantity;
      $cart->save();
      Session::flash('success','thay đổi thành công');
      return redirect()->back();
   }
   public function delelteCartUser($id)
   {
      $cart = Carts::find($id);
      $cart->delete();
      Session::flash('success','xóa thành công');
      return redirect()->back();
   }







}
