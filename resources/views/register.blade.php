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
      <!--Font-->
      <link rel="stylesheet" href="https://use.typekit.net/ght7zzs.css">
  </head>

  <body>
    <header>
      <h1>Atte</h1>
    </header>

    <body>
      <div class="card_form">
        <p class="title_register">会員登録</p>
        <div class="form">
          <form method="POST" action="{{ route('user.resister_post') }}">
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
              <button class="btn_register" type="submit">会員登録</button>
          </form>
        </div>
        <div class="title_login">
          <p>アカウントをお持ちの方はこちらから</p>
          <button class="btn_login">ログイン</button>
        </div>
      </div>
    </body>

    <footer>
      <p>Atte, inc.</p>
    </footer>

  </body>

</html>