<header class="header">
  <h1 class="logo">Atte</h1>
  <nav>
    <ul>
      @if( Auth::check() )
          <ul>
            <li class="li"><a href="/">ホーム</a></li>
            <li class="li"><a href="/attendance/0">日付一覧</a></li>
            <li class="li"><a href="/logout">ログアウト</a></li>
          </ul>
      @endif
  </nav>
</header>