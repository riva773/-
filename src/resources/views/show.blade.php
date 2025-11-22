@extends('layouts.app')
@section('title','商品詳細')
@section('content')
@if(session('success'))
<p>{{ session('success') }}</p>
@endif
<img src="{{ asset("images/{$item->image_url}") }}" alt="商品画像">
<h1>{{ $item->name }}</h1>
<p>{{ $item->brand }}</p>
<p>{{ $item->price }}(税込)</p>

@if(!$liked)
<form action="{{ route('like')}}" method="post">
    @csrf
    <input type="hidden" name="item_id" value="{{ $item->id }}">
    <button type="submit">
        <i class="fa-regular fa-heart"></i>
    </button>
</form>
@endif
@if($liked)
<form action="{{ route('unlike') }}" method="post">
    @csrf
    <input type="hidden" name="item_id" value="{{ $item->id }}">
    <button type="submit">
        <i class="fa-solid fa-heart"></i>
    </button>
</form>
@endif
<i class="fa-regular fa-comment"></i>
<a href="#">購入手続きへ</a>

<h2>商品説明</h2>
<p>{{ $item->description}}</p>
<h2>商品の情報</h2>
<p>カテゴリー　{{ $item->category }}</p>
<p>商品の状態　{{ $item->condition_label}}</p>
<h2>コメント</h2>
<img src="{{ $user->image_url }}" alt="ユーザープロフィール画像">
<p>{{ $user->name }}</p>

@foreach($comments as $comment)
<p>{{ $comment->content }}</p>
@endforeach

<p>商品へのコメント</p>
<form action="{{ route('comment') }}" method="post">
    @csrf
    <input type="hidden" name="item_id" value="{{ $item->id }}">
    <textarea name="content" id="content"></textarea>
    <button type="submit">コメントを送信する</button>
</form>
@endsection