<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('cart');
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
