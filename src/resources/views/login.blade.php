<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('login')}}" method="post">
        @csrf
        @include('layouts.simple_header')
        <h1>ログイン</h1>
        <label for="email">メールアドレス</label>
        <input type="email" name="email" id="email">
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password">
        <button type="submit">ログインする</button>
    </form>
    <a href="{{ route('register') }}">会員登録はこちら</a>
</body>

</html>