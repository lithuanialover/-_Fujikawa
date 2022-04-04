@extends('layouts.app')

@section('main')
<div class="content">
  @if (session('result'))
  <div class="flash_message">
    {{ session('result') }}
  </div>
  @endif
  <article class="card_form">
    <p class="title-register">会員登録</p>
    <!--会員情報入力部分-->
    <section class="form">
      <form method="POST">
        @csrf
        <!--名前-->
        <div class="md-form">
          <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}" placeholder="名前">
          @error('name')
          <p>{{ $message }}</p>
          @enderror
        </div>
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
        <!--確認用パスワード-->
        <div class="md-form">
          <input class="form-control" type="text" id="password" name="password" required value="{{ old('password') }}" placeholder="確認用パスワード">
          @error('password_confirmation')
            <p>{{ $message }}
          @enderror
        </div>
        <!--会員登録ボタン-->
        <div class="md-form">
          <button class="btn-register" type="submit">会員登録</button>
        </div>
      </form>
    </section>
    <!--ログインボタン-->
    <section class="section_login">
      <p class="msg-login">アカウントをお持ちの方はこちらから</p>
      <a href="/login" class="link_login">ログイン</a>
    </section>
  </article>
</div>
@endsection