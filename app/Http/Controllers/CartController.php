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
    $count = 0;
    $amount = $foods = $price = [];
    $carts = Cart::where('user_id', Auth::user()->id)->get();
    foreach ($carts as $cart) {
      $foods[] = Food::select('name', 'price')->where('id', $cart->food_id)->first();
      $amount[] = $cart->amount;
    }
    foreach ($foods as $food) {
      $price[] = $food->price * $amount[$count++];
    }
    return view('cart', [
      'foods' => $foods,
      'price' => $price,
      'amount' => $amount
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
