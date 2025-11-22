<a href="{{ route('/') }}">
    <img src="{{ asset('images/dummy_logo.png') }}" alt="">
</a>

<input type="search" name="item-search" id="item-search" placeholder="なにをお探しですか？">

@auth
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit">ログアウト</button>
</form>
@endauth

@guest
<a href="{{ route('login') }}">ログイン</a>
@endguest

<a href="/mypage">マイページ</a>
<a href="#">出品</a>