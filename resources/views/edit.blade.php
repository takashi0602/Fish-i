@extends('layouts.app')

@section('content')
  <div class="container">
    <h3 class="mb-4">登録情報の編集</h3>
    <form action="{{ url("/mypage/edit/post") }}" method="post" class="form-group mb-5">
      @csrf
      <div class="row mb-3 mx-0">
        <span class="col-sm-3 pl-0">名前</span>
        <div class="col-sm-9 px-0">
          <input type="text" class="form-control" value="{{ $user->name }}" name="name" />
          @if(!empty($errors->first('name')) > 0)
            <span class="text-danger">※{{ $errors->first('name') }}</span>
          @endif
        </div>
      </div>
      <div class="row mb-3 mx-0">
        <span class="col-sm-3 pl-0">郵便番号</span>
        <div class="col-sm-9 px-0">
          <input type="text" class="form-control" value="{{ $user->post }}" name="post" />
          @if(!empty($errors->first('post')) > 0)
            <span class="text-danger">※{{ $errors->first('post') }}</span>
          @endif
        </div>
      </div>
      <div class="row mb-4 mx-0">
        <span class="col-sm-3 pl-0">住所</span>
        <div class="col-sm-9 px-0">
          <input type="text" class="form-control" value="{{ $user->address }}" name="address" />
          @if(!empty($errors->first('address')) > 0)
            <span class="text-danger">※{{ $errors->first('address') }}</span>
          @endif
        </div>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">変更する</button>
      </div>
    </form>
    <div class="text-right">
      <a href="{{ url("/mypage") }}">マイページへ戻る</a>
    </div>
  </div>
@endsection