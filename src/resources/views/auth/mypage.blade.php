@extends('layouts.app')
@section('title','マイページ')
@section('content')

<img src="{{ asset('storage/user_image/' . $user->image_url) }}" alt="プロフィール画像">
<h1>{{ $user->name }}</h1>
<a href="{{ route('edit_profile')}}">プロフィールを編集</a>
<a href="{{ route('profile') }}">出品した商品</a>
<a href=" {{ route('profile',['page' => 'purchased']) }}">購入した商品</a>
@foreach($items as $item)
<img src="{{ asset('storage/' . $item->image_url) }}" alt="出品した商品の画像">
<p>{{ $item->name }}</p>
@endforeach

@endsection