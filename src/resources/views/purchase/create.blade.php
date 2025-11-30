@extends('layouts.app')

@section('title','商品購入')
@section('content')

<form action="{{ route('orders.store',['item_id' =>$item->id]) }}" method="post">
    @csrf
    <img src="{{ asset('storage/' .$item->image_url) }}" alt="商品画像">
    <h1>{{ $item->name }}</h1>
    <p>{{ $item->price }}</p>
    <hr>
    <h2>支払い方法</h2>
    <select name="payment_method" id="payment_method">
        <option value="コンビニ支払い">コンビニ支払い</option>
        <option value="カード支払い">カード支払い</option>
    </select>
    <hr>
    <h2>配送先</h2>
    <a href="{{ route('edit_shipping_address',$item->id )}}">変更する</a>

    @php
    $first_address = mb_substr($addressData['post_code'],0,3);
    $last_address = mb_substr($addressData['post_code'],3,7);
    @endphp

    <p>{{ $first_address }}-{{ $last_address}}</p>
    <p>{{ $addressData['address'] }}</p>
    <p>{{ $addressData['building'] }}</p>
    <hr>

    <input type="hidden" name="post_code" value=" {{ $addressData['post_code'] }}">
    <input type="hidden" name="address" value=" {{ $addressData['address'] }}">
    <input type="hidden" name="building" value=" {{ $addressData['building'] }}">

    <p>商品代金</p>
    <p>{{ $item->price }}</p>
    <p>支払い方法</p>
    <p id="payment_method_display">コンビニ支払い</p>
    <button type="submit">購入する</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('payment_method');
        const display = document.getElementById('payment_method_display');

        display.textContent = select.value;

        select.addEventListener('change', function() {
            display.textContent = select.value;
        });
    });
</script>
@endsection