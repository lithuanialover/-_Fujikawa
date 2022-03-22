<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>勤怠管理</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
  <link rel="stylesheet" href="{{ asset('css/template.css') }}">
  <!--header/body/footerのcss-->
</head>

<body>
  <header>

  </header>

  <main>
    <table>
      <tr>
        <th>Data</th>
      </tr>
      @foreach ($items as $item)
      <tr>
        <td>
          {{$item->getDetail()}}
        </td>
      </tr>
      @endforeach
    </table>
    {{ $items->links() }}

  </main>
  <footer>

  </footer>
</body>

</html>