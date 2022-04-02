@extends('layouts.app')

@section('main')
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
@endsection