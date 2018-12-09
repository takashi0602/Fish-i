@extends('layouts.app')

@section('content')
  <div class="container">
    @if($data)
      <div class="mb-5">
        <h5 class="mb-4">購入商品の確認</h5>
        @foreach($data as $food)
          <div class="row mx-0 mb-1 pb-1">
            <div class="col align-self-center">{{ $food["food_name"] }}</div>
            <div class="col-auto text-right align-self-center">{{ $food["amount"] }}つ</div>
            <div class="col-auto text-right align-self-center">{{ $food["price"] }}円</div>
          </div>
        @endforeach
        <div class="border-top text-right pr-3">合計 {{ $total }}円</div>
      </div>
      <div class="text-right">
        <a href="{{ url("/cart") }}" class="mr-3">カートへ戻る</a>
        <a href class="" data-toggle="modal" data-target="#confirmModal">商品を購入する</a>
      </div>
    @else
      <p class="mb-5">商品をカートに入れてください。</p>
      <div class="text-right">
        <a href="{{ url("/list") }}">商品一覧へ</a>
      </div>
    @endif

    <!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="confirmModalTitle">商品の購入</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>商品を購入するボタンを押すと商品が購入されます。</p>
              <p class="text-danger">商品の返品はできません。</p>
            </div>
            <div class="modal-footer">
              <form action="{{ url("/decision") }}" method="post">
                @csrf
                <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                <button type="button" class="btn btn-light" data-dismiss="modal">キャンセル</button>
                <button type="submit" class="btn btn-primary">商品を購入する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection