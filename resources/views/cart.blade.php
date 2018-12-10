@extends('layouts.app')

@section('content')
  <div class="container">
    <h3 class="mb-5">カート</h3>
    @if($data)
      <div class="mb-5">
        @foreach($data as $food)
          <div class="row border-bottom mx-0 mb-4 pb-1">
            <div class="col align-self-center">{{ $food["name"] }}</div>
            <div class="col-auto text-right align-self-center">{{ $food["amount"] }}本</div>
            <div class="col-auto text-right align-self-center">{{ $food["price"] }}円</div>
            <form action="/cart/delete" method="post" class="col-auto">
              @csrf
              <input type="hidden" value="{{ $food["id"] }}" name="cart_id">
              <button type="submit" class="btn btn-danger">削除</button>
            </form>
          </div>
        @endforeach
      </div>
      <div class="text-right">
        <a href="{{ url("/list") }}" class="mr-3">商品一覧へ</a>
        <a href="{{ url("/confirm") }}">購入商品の確認へ</a>
      </div>
    @else
      <p class="mb-5">カートに商品は入っていません。</p>
      <div class="text-right">
        <a href="{{ url("/list") }}">商品一覧へ</a>
      </div>
    @endif
  </div>
@endsection