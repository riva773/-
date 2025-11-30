@extends('layouts.app')
@section('title', 'Furima App')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="container">
    <p>おすすめ</p>
    <div class="item-container">
        @foreach($items as $item)
        <a href="{{ route('show',$item->id) }}">
            <div class="item-card">
                <img src="{{ asset('storage/' . $item->image_url) }}" alt="商品画像">
                <p class="item-name">{{$item->name}}</p>
                @if($item->status == 'sold')
                <p>sold</p>
                @endif
            </div>
        </a>
        @endforeach
    </div>

</div>

@endsection