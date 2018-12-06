<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Food;
use Auth;

class CartController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $data = [];

    $carts = User::where("id", Auth::user()->id)->first()->cart;

    foreach ($carts as $cart) {
      $data[] = [
        "id" => $cart->id,
        "name" => $cart->food->name,
        "amount" => $cart->amount,
        "price" => $cart->food->price * $cart->amount
      ];
    }

    return view('cart', [
      "data" => $data
    ]);
  }

  public function add(Request $request)
  {
    $total = Food::select("id")->orderBy("id", "desc")->first()->id;
    $check = Cart::where("food_id", $request->food_id)->where("user_id", Auth::user()->id)->first();

    if(intval($request->food_id) <= $total) {
      if($check && intval($request->amount) > 0) {
        Cart::where("food_id", $request->food_id)
          ->where("user_id", Auth::user()->id)
          ->update(["amount" => $request->amount + $check->amount]);
      } else if(intval($request->amount) > 0) {
          Cart::create([
            'user_id' => Auth::user()->id,
            'food_id' => $request->food_id,
            'amount' => $request->amount
          ]);
      }
    }

    return redirect('list');
  }

  public function delete(Request $request)
  {
    $user = Cart::select('user_id')->where('id', $request->cart_id)->first();

    if(is_object($user)){
      if(intval($user->user_id) === Auth::user()->id) {
        Cart::destroy($request->cart_id);
      }
    }

    return redirect('/cart');
  }

  public function confirm()
  {
    $total = 0;
    $data = [];

    $products = Cart::with("user","food")->where("user_id", Auth::user()->id)->get();

    foreach ($products as $product) {
      $data[] = [
        "id" => $product->id,
        "user_name" => $product["user"]->name,
        "post" => $product["user"]->post,
        "address" => $product["user"]->address,
        "food_name" => $product["food"]->name,
        "amount" => $product->amount,
        "price" => $product["food"]->price
      ];
      $total += $product["food"]->price;
    }

    dd($data);

    return view('confirm');
  }

  public function decision()
  {
    return view('decision');
  }
}
