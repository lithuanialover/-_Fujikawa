@extends('layouts.app')

@section('main')
@if (session('result'))
<div class="flash_message">
  {{ session('result') }}
</div>
@endif
<article class="card_form">
  <p class="title-login">ログイン</p>
    <!--会員情報入力部分-->
    <section class="form">
      <form method="POST">
      @csrf
        <!--メールアドレス-->
        <div class="md-form">
          <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" placeholder="メールアドレス">
          @error('email')
            <p>{{ $message }}</p>
          @enderror
        </div>
        <!--パスワード-->
        <div class="md-form">
          <input class="form-control" type="text" id="password" name="password" required value="{{ old('password') }}" placeholder="パスワード">
          @error('password')
            <p>{{ $message }}</p>
          @enderror
        </div>
        <!--ログインボタン-->
        <div class="md-form">
          <button class="btn-login" type="submit">ログイン</button>
        </div>
      </form>
    </section>
    <!--ログインボタン-->
    <section class="title-register">
      <p class="msg-register">アカウントをお持ちでない方はこちらから</p>
      <a href="/register" class="link_register">会員登録</a>
    </section>
</article>
@endsection