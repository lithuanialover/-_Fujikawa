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
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <!--Font-->
  <link rel="stylesheet" href="https://use.typekit.net/ght7zzs.css">
  <!--ロゴ-->
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
  <header id="header">
    <div class="header__flex">
      <p class="logo">Atte</p>
      <nav>
        <ul>
          <li><a href="/">ホーム</a></li>
          <li><a href="/attendance/{num}">日付一覧</a></li>
          <li>
            <a href="/logout">ログアウト</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="content">
      <br>
      <div class="content_title">{{session('result')}}</div>
      @if( Auth::check())
      <p class="user_name">{{ Auth::user()->name }}さんお疲れ様です!</p>
      @endif
      <!--該当するデータの名前だけを表示させる、https://nebikatsu.com/7070.html/ -->

      <!-- 【最新】追記 2022/3/19 -->
      <div class="btn-list">
        <div class="btn-item">
          @if ($btn_display['btn_start_attendance'])
          <a href="/attendance/start" class="attendance-btn">
            勤務開始</a>
          @else
          <p href="/attendance/start" class="attendance-btn inactive">
            勤務開始</p>
          @endif
        </div>
        <div class="btn-item">
          @if ($btn_display['btn_end_attendance'])
          <a href="/attendance/end" class="attendance-btn">
            勤務終了</a>
          @else
          <p href="/attendance/end" class="attendance-btn inactive">
            勤務終了</p>
          @endif
        </div>
        <div class="btn-item">
          @if ($btn_display['btn_start_rest'])
          <a href="/break/start" class="attendance-btn">
            休憩開始</a>
          @else
          <p href="/break/start" class="attendance-btn inactive">
            休憩開始</p>
          @endif
        </div>
        <div class="btn-item">
          @if ($btn_display['btn_end_rest'])
          <a href="/break/end" class="attendance-btn">
            休憩終了</a>
          @else
          <p href="/break/end" class="attendance-btn inactive">
            休憩終了</p>
          @endif
        </div>
      </div>
    </div>
    </div>
  </main>

  <footer>
    Atte, inc.
  </footer>
  <script>
    //ここにJavaScriptのコードを記述
  </script>
  <script src="https://cdn.tailwindcss.com"></script>

</body>

</html>