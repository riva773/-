<a href="{{ route('/') }}">
    <img src="{{ asset('storage/item_image/' . 'dummy_logo.png') }}" alt="ロゴ画像">
</a>

<form action="{{ route('search') }}" method="post">
    @csrf
    <input type="search" name="keyword" id="keyword" placeholder="なにをお探しですか？">
    <button type="submit" style="display: none;"></button>
</form>
<a href="{{ route('/',['clear' => 1]) }}" style="background-color: lightgray; text-decoration: none">検索をクリア</a>

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