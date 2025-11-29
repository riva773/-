<a href="{{ route('/') }}">
    <img src="{{ asset('images/dummy_logo.png') }}" alt="">
</a>

<input type="search" name="item-search" id="item-search" placeholder="なにをお探しですか？">

@auth
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit">ログアウト</button>
</form>
<a href="{{ route('profile') }}">マイページ</a>
<a href="{{ route('sell') }}">出品</a>
@endauth

@guest
<a href="{{ route('login') }}">ログイン</a>
<a href="{{ route('login') }}">マイページ</a>
<a href="{{ route('login') }}">出品</a>
@endguest