@extends('layouts.app')

@section('content')
  <div class="container">
    <h3 class="mb-4">マイページ</h3>
    <h5 class="mb-3">登録情報</h5>
    <div class="row mb-2">
      <span class="col-sm-3">名前</span>
      <div class="col-sm-9">{{ $user->name }}</div>
    </div>
    <div class="row mb-2">
      <span class="col-sm-3">メールアドレス</span>
      <div class="col-sm-9">{{ $user->email }}</div>
    </div>
    <div class="row mb-2">
      <span class="col-sm-3">郵便番号</span>
      <div class="col-sm-9">{{ $user->post }}</div>
    </div>
    <div class="row mb-5">
      <span class="col-sm-3">住所</span>
      <div class="col-sm-9">{{ $user->address }}</div>
    </div>
    <div class="text-right">
      <a href="{{ url("/mypage/edit") }}" class="mr-3">登録情報の変更</a>
      <a href="{{ url("/mypage/order") }}">注文履歴の確認</a>
    </div>
  </div>
@endsection
