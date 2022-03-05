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
      <p class="user_name">{{$user->name}}さんお疲れ様です!</p>
      <!--該当するデータの名前だけを表示させる、https://nebikatsu.com/7070.html/ -->

      <div class="button-form">
        <ul class="btn-list">
          <li class="timebtn" id="punchin">
            <form action="{{route('timestamp/start_time')}}" method="POST">
              @csrf
              @method('POST')
              <button type="submit" id="btn_punchin" class="btn">勤務開始</button>
            </form>
          </li>
          <li class="timebtn" id="punchout">
            <form action="{{route('timestamp/end_time')}}" method="POST">
              @csrf
              @method('POST')
              <button type="submit" id="btn_punchout" class="btn">勤務終了</button>
            </form>
          </li>
          <li class="timebtn" id="rest_punchin">
            <form action="{{route('timestamp/start_time')}}" method="POST">
              @csrf
              @method('POST')
              <button type="submit" id="btn_rest_punchin" class="btn">休憩開始</button>
            </form>
          </li>
          <li class="timebtn" id="rest_punchout">
            <form action="{{route('timestamp/end_time')}}" method="POST">
              @csrf
              @method('POST')
              <button type="submit" id="btn_rest_punchout" class="btn">休憩終了</button>
            </form>
          </li>
        </ul>

  </main>

  <footer>
    Atte, inc.
  </footer>
  <script>
    //ここにJavaScriptのコードを記述

  </script>

</body>

</html>