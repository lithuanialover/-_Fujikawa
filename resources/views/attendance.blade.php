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
  <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
  <!--header/body/footerのcss-->
  <!--Font-->
  <link rel="stylesheet" href="https://use.typekit.net/ght7zzs.css">
  <!--ロゴ-->
</head>

<body>
  <header>
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
      @foreach ($adjustAttendances as $fixed_date)
        <p class="date">{{ $date }}</p>
      @endforeach
      <div class="date_lists">
            <table>
                <tr class="lists_title">
                    <th>名前</th>
                    <th>勤務開始</th>
                    <th>勤務終了</th>
                    <th>休憩時間</th>
                    <th>勤務時間</th>
                </tr>
                @foreach ($adjustAttendances as $index => $attendance)
                <tr class="lists_content">
                    <td>{{$attendances->name}}</td>
                    <td>{{$attendances->start_time}}</td>
                    <td>{{$attendances->end_time}}</td>
                    <td>{{$attendances[$index]->rest_sum}}</td>
                    <td>{{$attendances[$index]->work_time}}</td>
                </tr>
                @endforeach
            </table>

            <div class="pagenation">
                {{ $adjustAttendances->links() }}
            </div>
      </div>
    </div>
  </main>
  <footer>
    Atte, inc.
  </footer>
</body>

</html>