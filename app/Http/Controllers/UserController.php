<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests\UserRequest;
use Auth;

class UserController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $user = User::select("name", "email", "post", "address")->where("id", Auth::user()->id)->first();
    return view('mypage', [
      "user" => $user
    ]);
  }

  public function edit()
  {
    $user = User::select("name", "email", "post", "address")->where("id", Auth::user()->id)->first();

    return view('edit', [
      "user" => $user
    ]);
  }

  public function post(UserRequest $request)
  {
//    dd($request->name);
    User::where("id", Auth::user()->id)->update([
      "name" => $request->name,
      "post" => $request->post,
      "address" => $request->address
    ]);

    return redirect("/mypage/edit");
  }

  public function order()
  {
    $data = [];
    $orders = User::where("id", Auth::user()->id)->first()->order;

    foreach ($orders as $order) {
      $data[] = [
        "name" => $order->food->name,
        "amount" => $order->amount,
        "price" => $order->food->price * $order->amount
      ];
    }

    return view("order", [
      "data" => $data
    ]);
  }
}
