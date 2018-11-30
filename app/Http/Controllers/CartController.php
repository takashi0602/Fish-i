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
    $count = $total_price = $total_amount = 0;
    $amount = $foods = $price = [];
    $carts = Cart::where('user_id', Auth::user()->id)->get();
    foreach ($carts as $cart) {
      $foods[] = Food::select('name', 'price')->where('id', $cart->food_id)->first();
      $total_amount += $cart->amount;
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
      'total_amount' => $total_amount
    ]);
  }

  public function add(Request $request)
  {
    Cart::create([
      'user_id' => Auth::user()->id,
      'food_id' => $request->food_id,
      'amount' => $request->amount
    ]);
    return redirect('list');
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
