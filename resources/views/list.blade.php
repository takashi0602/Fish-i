@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>ちくわ一覧</h3>
        <div class="d-flex flex-wrap justify-content-around">
          @foreach($foods as $food)
            <div class="m-3">
                <img src="{{ $food->img }}" class="mb-3" />
                <h5 class="text-center mb-3">{{ $food->name }}</h5>

                <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#detail{{ $food->id }}">詳細</button>
                <!-- Modal -->
                <div class="modal fade" id="detail{{ $food->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{ $food->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">{{ $food->description }}</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <form action="{{ url("/cart/add") }}" method="post" class="d-inline-block">
                                    @csrf
                                    <input type="number" class="form-control d-inline-block mr-1 w-80" value="1" name="amount"/>
                                    <input type="hidden" value="{{ $food->id }}" name="food_id">
                                    <button type="submit" class="btn btn-danger">カートに入れる</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ url("/cart/add") }}" method="post" class="d-inline-block">
                    @csrf
                    <input type="number" class="form-control d-inline-block mr-1 w-80" value="1" name="amount"/>
                    <input type="hidden" value="{{ $food->id }}" name="food_id">
                    <button type="submit" class="btn btn-danger">カートに入れる</button>
                </form>
            </div>
          @endforeach
        </div>
    </div>
@endsection