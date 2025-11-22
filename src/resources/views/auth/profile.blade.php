@extends('layouts.app')
@section('title','プロフィール設定')

@section('content')
<form action="{{ route('update_profile') }}" method="post">
    @csrf
    <h1>プロフィール設定</h1>
    <img src="{{ asset($user->image_url) }}" alt="プロフィール画像">
    <a href="">画像を設定する</a>

    <label for="name">ユーザー名(必須)</label>
    <input type="text" name="name" id="name" value="{{old('name',$user->name) }}">
    @error('name')
    {{ $message }}
    @enderror

    <label for="post_code">郵便番号(必須)</label>
    <input type="text" name="post_code" id="post_code">
    @error('post_code')
    {{ $message }}
    @enderror

    <label for="name">住所(必須)</label>
    <input type="text" name="address" id="address" value="{{ old('address',$user->address)}}">

    <label for="building">建物名</label>
    <input type="text" name="building" id="building">

    <button type="submit">更新する</button>
</form>
@endsection