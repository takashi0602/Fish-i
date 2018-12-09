@extends('layouts.app')

@section('content')
<div class="container">
<div class="mb-4">ログイン</div>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">メールアドレス</label>
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
        <div class="col-md-6 offset-md-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    パスワードを記憶する
                </label>
            </div>
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md text-right">
            <button type="submit" class="btn btn-primary">
                ログイン
            </button>
        </div>
    </div>
</form>
</div>
@endsection
