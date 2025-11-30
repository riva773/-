<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
</head>

<body>
    @include('layouts.simple_header')
    <form action="{{ route('register') }}" method="post">
        @csrf
        <h1>会員登録</h1>
        @if($errors)
        @foreach($errors->all() as $error)
        <p style="color: red;">{{ $error}}</p>
        @endforeach
        @endif
        <label for="name">ユーザー名</label>
        <input type="text" name="name" id="name">
        <label for="email">メールアドレス</label>
        <input type="email" name="email" id="email">
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password">
        <label for="password_confirmation">パスワード確認</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
        <button type="submit">登録する</button>
    </form>
    <a href="{{ route('login') }}">ログインはこちら</a>
</body>

</html>