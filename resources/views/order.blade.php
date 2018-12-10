@extends('layouts.app')

@section('content')
  <div class="container">
    <h3 class="mb-4">注文履歴</h3>
    <table class="table mb-5">
      <thead>
        <tr>
          <th scope="col">商品名</th>
          <th scope="col">注文数</th>
          <th scope="col">値段</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $order)
          <tr>
            <td>{{ $order["name"] }}</td>
            <td>{{ $order["amount"] }}本</td>
            <td>{{ $order["price"] }}円</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="text-right">
      <a href="{{ url("/mypage") }}">マイページへ戻る</a>
    </div>
  </div>
@endsection