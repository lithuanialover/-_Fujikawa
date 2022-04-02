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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  {{-- bootstrapのcss --}}
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
      <ul class="date-container">
          <li class="date-list"><a class="arrow" href="{!! '/attendance/' . ($num - 1) !!}">&lt;</a></li>
          <li class="date-list date">{{ $fixed_date }}</li>
          <li class="date-list"><a class="arrow" href="{!! '/attendance/' . ($num + 1) !!}">&gt;</a></li>
      </ul>

      <div class="date_lists">
        <table>
          <tr class="lists_title">
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
          </tr>
        @foreach ($adjustAttendances as $attendances)
          <tr class="lists_content">
            <td>{{$attendances->users->name}}</td>
            <td>{{$attendances->start_time}}</td>
            <td>{{$attendances->end_time}}</td>
            <td>{{$attendances->rest_sum}}</td>
            <td>{{$attendances->work_time}}</td>
          </tr>
        @endforeach
        </table>
        <br>
        <div class="d-flex justify-content-center">
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