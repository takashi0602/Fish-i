@extends('layouts.app')

@section('content')
  <div class="container">
    <h3 class="mb-5">カート</h3>
    @if($foods)
      @foreach($foods as $food)
        <div class="row border-bottom mx-0">
          <div class="col align-self-center">{{ $food->name }}</div>
          <div class="col-auto text-right align-self-center">{{ $amount[$count] }}つ</div>
          <div class="col-auto text-right align-self-center">{{ $price[$count++] }}円</div>
        </div>
      @endforeach
    @else
      <p>カートにはちくわは入っていません。</p>
    @endif
  </div>
@endsection