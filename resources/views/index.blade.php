<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>勤怠管理</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <link rel="stylesheet" href="{{ asset('css/template.css') }}">
  <!--header/body/footerのcss-->
  <!--Font-->
  <link rel="stylesheet" href="https://use.typekit.net/ght7zzs.css">
  <!--ロゴ-->
</head>

<body>
  <header id="header">
    <div class="header__flex">
      <p class="logo">Atte</p>
      <nav>
        <ul>
          <li><a href="/">ホーム</a></li>
          <li><a href="/attendance">日付一覧</a></li>
          <li><a href="/logout">ログアウト</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="content">
      <h3 class="user_name">さんお疲れ様です!</h3>
      <!--該当するデータの名前だけを表示させる、https://nebikatsu.com/7070.html/-->
      <!--<div class="flex_test-box">
        <div class="flex_test-item">
          勤務開始
        </div>
        <div class="flex_test-item">
          勤務終了
        </div>
        <div class="flex_test-item">
          休憩開始
        </div>
        <div class="flex_test-item">
          休憩終了
        </div>
      </div>
      -->

      <div class="button-form">
        <ul>
          <li>
            <form action="{{ route('timestamp/start_time') }}" method="GET">
              @csrf
              @method('GET')
              <button type="submit" class="btn_attendances">勤務開始</button>
            </form>
          </li>
          <li>
            <form action="{{ route('timestamp/end_time') }}" method="GET">
              @csrf
              @method('GET')
              <button type="submit" class="btn_attendances">勤務終了</button>
            </form>
          </li>
          <li>
            <form action="{{ route('timestamp/start_time') }}" method="GET">
              @csrf
              @method('GET')
              <button type="submit" class="btn_attendances">休憩開始</button>
            </form>
          </li>
          <li>
            <form action="{{ route('timestamp/end_time') }}" method="GET">
              @csrf
              @method('GET')
              <button type="submit" class="btn_attendances">休憩終了</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </main>

  <footer>
    Atte, inc.
  </footer>
</body>

</html>