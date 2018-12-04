<?php

namespace App\Http\Controllers;

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
    $count = $total_price = 0;
    $amount = $foods = $price = $carts_id = [];
    $carts = Cart::where('user_id', Auth::user()->id)->get();
    foreach ($carts as $cart) {
      $foods[] = Food::select('name', 'price')->where('id', $cart->food_id)->first();
      $carts_id[] = $cart->id;
      $amount[] = $cart->amount;
    }
    foreach ($foods as $food) {
      $total_price += $food->price * $amount[$count];
      $price[] = $food->price * $amount[$count++];
    }
    $count = 0;
    return view('cart', [
      'foods' => $foods,
      'price' => $price,
      'amount' => $amount,
      'count' => $count,
      'total_price' => $total_price,
      'carts_id' => $carts_id
    ]);
  }

  public function add(Request $request)
  {
    if($request->amount > 0) {
      Cart::create([
        'user_id' => Auth::user()->id,
        'food_id' => $request->food_id,
        'amount' => $request->amount
      ]);
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
    return view('confirm');
  }

  public function decision()
  {
    return view('decision');
  }
}
