@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="text-center mb-5 pt-5">ご購入ありがとうございます。</h1>
    <p class="mb-5">商品が届くまでしばらくお待ちください。</p>
    <div class="text-right">
      <a href="{{ url("/") }}" class="mr-3">TOPへ戻る</a>
      <a href="{{ url("/mypage/order") }}">注文履歴の確認</a>
    </div>
  </div>
@endsection