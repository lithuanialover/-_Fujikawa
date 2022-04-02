@extends('layouts.app')

@section('main')
@if (session('result'))
<div class="flash_message">
    {{ session('result') }}
</div>
@endif
@if( Auth::check())
  <p class="user_name">{{ Auth::user()->name }}さんお疲れ様です!</p>
@endif
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
    @if(isset($is_rest))
      @if(!$is_rest)
        <a href="/break/start" class="attendance-btn">休憩開始</a>
      @else
        <p class="attendance-btn inactive">休憩開始</p>
      @endif
    @endif
    </div>
    <div class="btn-item">
    @if(isset($is_rest))
      @if($is_rest)
        <a href="/break/end" class="attendance-btn">休憩終了</a>
      @else
        <p class="attendance-btn inactive">休憩終了</p>
      @endif
    @endif
  </div>
</div>
@endsection