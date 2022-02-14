

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>勤怠管理</title>
  <!--CSS-->
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  <!--会員登録ページのcss-->
  <link rel="stylesheet" href="{{ asset('css/template.css') }}">
  <!--header/body/footerのcss-->
  <!--Font-->
  <link rel="stylesheet" href="https://use.typekit.net/ght7zzs.css">
  <!--ロゴ-->
</head>

<body>
  <div id="wrap">
    <header id="header">
      <div class="inner">
        <p class="logo">Atte</p>
      </div>
    </header>

    <main>
      <article class="card_form">
        <p class="title-register">会員登録</p>
        <!--会員情報入力部分-->
        <section class="form">
          <form method="POST">
            @csrf
            <!--名前-->
            <div class="md-form">
              <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}" placeholder="名前">
            </div>

            <!--メールアドレス-->
            <div class="md-form">
              <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" placeholder="メールアドレス">
            </div>

            <!--パスワード-->
            <div class="md-form">
              <input class="form-control" type="text" id="password" name="password" required value="{{ old('password') }}" placeholder="パスワード">
            </div>

            <!--確認用パスワード-->
            <div class="md-form">
              <input class="form-control" type="text" id="password" name="password" required value="{{ old('password') }}" placeholder="確認用パスワード">
            </div>
            <!--会員登録ボタン-->
            <div class="md-form">
              <button class="btn-register" type="submit">会員登録</button>
            </div>
          </form>
        </section>

        <!--ログインボタン-->
        <section class="title-login">
          <p class="msg-login">アカウントをお持ちの方はこちらから</p>
          <a href="/login" class="link_login">ログイン</a>
        </section>
      </article>
    </main>

    <footer>
      Atte, inc.
    </footer>
  </div>
</body>

</html>