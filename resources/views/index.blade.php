@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="">
      @foreach($foods as $food)
        <img src="{{ asset('storage/'. $food->img .'.jpg') }}" alt="" class="img-200">
      @endforeach
    </div>
  </div>
@endsection