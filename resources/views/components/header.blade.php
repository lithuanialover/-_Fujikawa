<header>
  <nav class="nav">
  <h1 class="logo">Atte</h1>
  @if( Auth::check() )
      <ul class="float">
        <li class="header-nav-item"><a href="/">ホーム</a></li>
        <li class="header-nav-item"><a href="/attendance/0">日付一覧</a></li>
        <li class="header-nav-item"><a href="/logout">ログアウト</a></li>
      </ul>
  @endif
    </nav>
</header>