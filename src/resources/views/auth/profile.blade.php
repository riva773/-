@extends('layouts.app')
@section('title','プロフィール設定')

@section('content')
<form action="{{ route('update_profile') }}" method="post" enctype="multipart/form-data">
    @csrf
    <h1>プロフィール設定</h1>
    <img src="{{ asset('storage/' . $user->image_url) }}" alt="プロフィール画像">

    <label for="image_url" class="image_upload_label">画像を選択する</label>
    <span id="image_file_name">選択されていません。</span>
    <input type="file" name="image_url" id="image_url" style="display: none;">

    <label for="name">ユーザー名(必須)</label>
    <input type="text" name="name" id="name" value="{{ old('name',$user->name) }}">
    @error('name')
    {{ $message }}
    @enderror

    <label for="post_code">郵便番号(必須)</label>
    <input type="text" name="post_code" id="post_code" value=" {{ old('post_code', $user->post_code)}}">
    @error('post_code')
    {{ $message }}
    @enderror

    <label for="name">住所(必須)</label>
    <input type="text" name="address" id="address" value="{{ old('address',$user->address)}}">

    <label for="building">建物名</label>
    <input type="text" name="building" id="building" value="{{ old('building',$user->building) }}">

    <button type="submit">更新する</button>
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