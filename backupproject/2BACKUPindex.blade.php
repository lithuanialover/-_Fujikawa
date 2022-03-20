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
</head>

<body>
  <header id="header">
    <div class="header__flex">
      <p class="logo">Atte</p>
      <nav>
        <ul>
          <li><a href="/">ホーム</a></li>
          <li><a href="/attendance">日付一覧</a></li>
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
          <a href="/attendance/start" class="attendance-btn" <?php if ($btn_display['btn_start_attendance'] == false) { ?> disabled <?php } ?>>
            勤務開始</a>
        </div>
        <div class="btn-item">
          <a href="/attendance/end" class="attendance-btn" <?php if ($btn_display['btn_end_attendance'] == false) { ?> disabled <?php } ?>>
            勤務終了</a>
        </div>
        <div class="btn-item">
          <a href="/break/start" class="attendance-btn" <?php if ($btn_display['btn_start_rest'] == false) { ?> disabled <?php } ?>>
            休憩開始</a>
        </div>
        <div class="btn-item">
          <a href="/break/end" class="attendance-btn" <?php if ($btn_display['btn_end_rest'] == false) { ?> disabled <?php } ?>>
            休憩終了</a>
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