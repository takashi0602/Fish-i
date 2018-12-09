@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">新規会員登録</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label">名前</label>
            <div class="col-md-9">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                @if(!empty($errors->first('name')))
                    <span class="text-danger">※{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label">メールアドレス</label>
            <div class="col-md-9">
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                @if(!empty($errors->first('email')))
                    <span class="text-danger">※{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-3 col-form-label">パスワード</label>
            <div class="col-md-9">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                @if(!empty($errors->first('password')))
                    <span class="text-danger">※{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="password-confirm" class="col-md-3 col-form-label">パスワード（確認）</label>
            <div class="col-md-9">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
        </div>
        <div class="form-group row">
            <label for="post" class="col-md-3 col-form-label">郵便番号</label>
            <div class="col-md-9">
                <input id="post" type="text" class="form-control" name="post">
                @if(!empty($errors->first('post')))
                    <span class="text-danger">※{{ $errors->first('post') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-md-3 col-form-label">住所</label>
            <div class="col-md-9">
                <input id="address" type="text" class="form-control" name="address">
                @if(!empty($errors->first('address')))
                    <span class="text-danger">※{{ $errors->first('address') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md text-right">
                <button type="submit" class="btn btn-primary">
                    登録
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
