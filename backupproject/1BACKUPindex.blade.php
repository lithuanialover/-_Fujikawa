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
      <br>
      <div class="content_title">{{session('result')}}</div>
      @if( Auth::check())
      <p class="user_name">{{ Auth::user()->name }}さんお疲れ様です!</p>
      @endif
      <!--該当するデータの名前だけを表示させる、https://nebikatsu.com/7070.html/ -->

      <!-- 追記 2022/3/19 -->
      <div class="flex justify-center flex-wrap md:space-x-12 md:pb-12">
        <form action="/attendance/start" method="POST">
          @csrf
          <button type="submit" class="md:px-32 md:py-16 md:text-xl lg:px-48 lg:py-20 bg-white font-bold text-base px-20 py-10 mb-5  disabled:cursor-not-allowed disabled:opacity-50" <?php if ($btn_display['btn_start_attendance'] == false) { ?> disabled <?php } ?>>
            勤務開始
          </button>
        </form>
        <form action="/attendance/end" method="POST">
          @csrf
          <button type="submit" class="md:px-32 md:py-16 md:text-xl lg:px-48 lg:py-20 bg-white font-bold text-base px-20 py-10 mb-5 disabled:cursor-not-allowed disabled:opacity-50" <?php if ($btn_display['btn_end_attendance'] == false) { ?> disabled <?php } ?>>
            勤務終了
          </button>
        </form>
      </div>
      <div class="flex justify-center flex-wrap md:space-x-12 md:pb-12">
        <form action="/break/start" method="POST">
          @csrf
          <button type="submit" class="md:px-32 md:py-16 md:text-xl lg:px-48 lg:py-20 bg-white font-bold text-base px-20 py-10 mb-5 disabled:cursor-not-allowed disabled:opacity-50" <?php if ($btn_display['btn_start_rest'] == false) { ?> disabled <?php } ?>>
            休憩開始
          </button>
        </form>
        <form action="/break/end" method="POST">
          @csrf
          <button type="submit" class="md:px-32 md:py-16 md:text-xl lg:px-48 lg:py-20 bg-white font-bold text-base px-20 py-10 mb-5 disabled:cursor-not-allowed disabled:opacity-50" <?php if ($btn_display['btn_end_rest'] == false) { ?> disabled <?php } ?>>
            休憩終了
          </button>
        </form>
      </div>

      <!-- 追記2022/3/19
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
-->

      <!--
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
-->
      <!--
        <div class="btn-item">
          下記代入：is_restが表示されないから
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
-->
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