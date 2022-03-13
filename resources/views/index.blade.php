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
          <li>
            <a href="/logout">ログアウト</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="content">
      @if( Auth::check())
      <p class="user_name">{{ Auth::user()->name }}さんお疲れ様です!</p>
      @endif
      <!--該当するデータの名前だけを表示させる、https://nebikatsu.com/7070.html/ -->
      <div class="btn-list">
        <div class="btn-item">
          @if(!isset($is_attendance_start))
          <a href="/attendance/start" class="attendance-btn">勤務開始</a>
          @else
          <p class="attendance-btn inactive">勤務開始</p>
          @endif
        </div>
        <div class="btn-item">
          @if(!isset($is_attendance_end))
          <a href="/attendance/end" class="attendance-btn">勤務終了</a>
          @else
          <p class="attendance-btn inactive">勤務終了</p>
          @endif
        </div>
        <div class="btn-item">
          <!--下記代入：is_restが表示されないから-->
          @if(!isset($is_attendance_start))
          <a href="/attendance/start" class="attendance-btn">勤務開始</a>
          @else
          <p class="attendance-btn inactive">勤務開始</p>
          @endif
        </div>
        <div class="btn-item">
          @if(!isset($is_attendance_end))
          <a href="/attendance/end" class="attendance-btn">出勤終了</a>
          @else
          <p class="attendance-btn inactive">勤務終了</p>
          @endif
        </div>
          <!--上記代入-->
<!--
          @if(isset($is_rest))
          @if(!is_rest)
          <a href="/break/start" class="attendance-btn">休憩開始</a>
          @else
          <p class="attendance-btn inactive">休憩開始</p>
          @endif
          @endif

          @if(isset($is_rest))
          @if(!is_rest)
          <a href="/break/end" class="attendance-btn">休憩終了</a>
          @else
          <p class="attendance-btn inactive">休憩終了</p>
          @endif
          @endif
        </div>
-->
      </div>
  </main>

  <footer>
    Atte, inc.
  </footer>
  <script>
    //ここにJavaScriptのコードを記述
  </script>

</body>

</html>