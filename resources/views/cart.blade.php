@extends('layouts.app')

@section('content')
  <div class="container">
    <h3 class="mb-5">カート</h3>
    @if($foods)
      @foreach($foods as $food)
        <div class="row border-bottom mx-0 mb-4 pb-1">
          <div class="col align-self-center">{{ $food->name }}</div>
          <div class="col-auto text-right align-self-center">{{ $amount[$count] }}つ</div>
          <div class="col-auto text-right align-self-center">{{ $price[$count] }}円</div>
          <form action="/cart/delete" method="post" class="col-auto">
            @csrf
            <input type="hidden" value="{{ $carts_id[$count++] }}" name="cart_id">
            <button type="submit" class="btn btn-danger">削除</button>
          </form>
        </div>
      @endforeach
    @else
      <p>カートにはちくわは入っていません。</p>
    @endif
  </div>
@endsection