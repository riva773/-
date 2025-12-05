@extends('layouts.app')
@section('title','出品画面')

@section('content')
<form action="{{ route('sell.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @if($errors->any())
    @foreach($errors->all() as $error)
    <p style="color: red;">{{ $error }}</p>
    @endforeach
    @endif
    <h1>商品の出品</h1>
    <h3>商品画像</h3>
    <label for="image_url" class="image_upload_label">画像を選択する</label>
    <span id="image_file_name">選択されていません</span>

    <input type="file" name="image_url" id="image_url" style="display: none;">
    <h2>商品の詳細</h2>
    <label>
        <input type="radio" name="category" value="fashion">
        ファッション
    </label>
    <label>
        <input type="radio" name="category" value="electronics">
        家電
    </label>
    <label>
        <input type="radio" name="category" value="interior">
        インテリア
    </label>
    <label>
        <input type="radio" name="category" value="mens">
        メンズ
    </label>
    <label>
        <input type="radio" name="category" value="cosmetics">
        コスメ
    </label>
    <label>
        <input type="radio" name="category" value="books">
        本
    </label>
    <label>
        <input type="radio" name="category" value="game">
        ゲーム
    </label>
    <label>
        <input type="radio" name="category" value="sports">
        スポーツ
    </label>
    <label>
        <input type="radio" name="category" value="kitchen">
        キッチン
    </label>
    <label>
        <input type="radio" name="category" value="handmade">
        ハンドメイド
    </label>
    <label>
        <input type="radio" name="category" value="accessories">
        アクセサリー
    </label>
    <label>
        <input type="radio" name="category" value="toys">
        おもちゃ
    </label>
    <label>
        <input type="radio" name="category" value="kids">
        ベビー・キッズ
    </label>


    <label for="condition">商品の状態</label>
    <select name="condition" id="condition">
        <option value="like_new">良好</option>
        <option value="good">目立った傷や汚れなし</option>
        <option value="fair">やや傷や汚れあり</option>
        <option value="poor">状態が悪い</option>
    </select>

    <h2>商品名と説明</h2>
    <label for="name">商品名</label>
    <input type="text" name="name" id="name">

    <label for="brand">ブランド名</label>
    <input type="text" name="brand" id="brand">

    <label for="商品の説明">商品の説明</label>
    <input type="textarea" name="description" id="description">

    <label for="price">販売価格</label>
    <input type="text" name="price" id="price" placeholder="¥">
    <input type="hidden" name="status" value="available">
    <button type="submit">出品する</button>
</form>

<style>
    .image_upload_label {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 4px;
        border: 1px solid #ccc;
        cursor: pointer;
        background-color: #f5f5f5;
    }

    .image_upload_label:hover {
        background-color: #e5e5e5;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('image_url');
        const fileNameSpan = document.getElementById('image_file_name');

        fileInput.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                // 選択された1つ目のファイル名を表示
                fileNameSpan.textContent = this.files[0].name;
            } else {
                fileNameSpan.textContent = '選択されていません';
            }
        });
    });
</script>
@endsection