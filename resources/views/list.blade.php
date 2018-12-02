@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-5">ちくわ一覧</h3>
        <div>
            @foreach($foods as $food)
                <div class="row mb-5">
                    <div class="col-md-4 mb-4 text-center">
                        <img src="{{ $food->img }}" class="img-200" />
                    </div>
                    <div class="col-md-8 mb-4">
                        <div class="h-75">
                            <h3 class="mb-3">{{ $food->name }}</h3>
                            <p>{{ $food->description }}</p>
                        </div>
                        <form action="{{ url("/cart/add") }}" method="post" class="d-flex h-25 justify-content-end">
                            @csrf
                            <input type="number" class="form-control d-inline-block mr-1 w-80 align-self-end" value="1" name="amount"/>
                            <input type="hidden" value="{{ $food->id }}" name="food_id">
                            <span class="align-self-end mr-3">コ</span>
                            <button type="submit" class="btn btn-success align-self-end">カートに入れる</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection