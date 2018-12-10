@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="mb-5">
      <h3 class="mb-3">ちくわへの愛</h3>
      <p>
        Fish iは伝統の味を守り続ける会社です。原料にこだわり、心を込めてちくわ作りに励んでおります。<br>
        そんな素材の良さを引き出したちくわを皆様にご提供しております。<br>
        一口食べると、口の中いっぱいに広がる白身魚の風味や、肉厚でしなやかな食感などをぜひ堪能してください。
      </p>
    </div>
    <example-component></example-component>
    <div class="text-right">
      <a href="{{ url("/list") }}">商品一覧へ</a>
    </div>
  </div>
@endsection