<p>登録していただいたメールアドレスに認証メールを送付しました。メール認証を完了してください。</p>
<a href="http://localhost:8025" target="_blank">認証はこちらから</a>
<form action="{{ route('verification.send') }}" method="post">
    @csrf
    <button type="submit">認証メールを再送する</button>
</form>