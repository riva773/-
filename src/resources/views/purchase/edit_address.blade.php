@extends('layouts.app')

@section('title','商品購入')
@section('content')

<h1>住所の変更</h1>
@if($errors)
@foreach($errors->all() as $error)
<p style="color: red;">{{ $error}}</p>
@endforeach
@endif


<form action="#" method="post">
    @csrf
    <label for="post_code">郵便番号</label>
    <input type="text" name="post_code" id="post_code" value="{{ old('post_code', $user->post_code)}}">
    <label for="address">住所</label>
    <input type="text" name="address" id="address" value="{{ old('address', $user->address)}}">
    <label for="building">建物名</label>
    <input type="text" name="building" id="building" value="{{ old('building', $user->building)}}">
    <button type="submit">更新する</button>
</form>

@endsection