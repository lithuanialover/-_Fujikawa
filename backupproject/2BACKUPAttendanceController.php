<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Rest;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Hash; //'password' => Hash::make($data['password']),　に関係している

class AttendanceController extends Controller
{

  public function getIndex(Request $request)
  {
    $btn_start_attendance = false; //falseの時ボタンを押せる
    $btn_end_attendance = false;
    $btn_start_rest = false;
    $btn_end_rest = false;

    $user_id = Auth::id();
    $today = Carbon::today()->format('Y-m-d');
    $now = Carbon::now()->format('H:i:s');
    $attendance = Attendance::where('user_id', $user_id)->where('date', $today)->first();
    //work_dayをdateに変更（attendanceテーブルのカラムに合わせて）

    if ($attendance != null) { //勤務データがある場合

      if ($attendance['end_time'] != '00:00:00') { //終了時間が入っている場合：全てのボタンが押せない

      } else { //終了時間が入っていない場合=終了時間が'00:00:00'の場合

        $rest = Rest::where('attendance_id', $user_id)->where('date', $today)->orderBy('start_time', 'desc')->first();
        /*削除 3/22/2022【ERROR:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'user_id' in 'where clause' (SQL: select * from `rests` where `user_id` = 2 and `date` = 2022-03-22 order by `start_rest` desc limit 1)】
$rest = Rest::where('user_id', $user_id)->where('date', $today)->orderBy('start_rest', 'desc')->first();
                */

        if ($rest != null) { //休憩中データがある場合

          if ($rest['end_time'] != '00:00:00') { //休憩終了時間が入っている場合：勤務終了と休憩開始ボタンを押せる
            /*
                        【ERROR:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'start_rest' in 'order clause' (SQL: select * from `rests` where `attendance_id` = 2 and `date` = 2022-03-22 order by `start_rest` desc limit 1)】
                        if ($rest['end_rest'] != '00:00:00')
                    */
            $btn_end_attendance = true;
            $btn_start_rest = true;
          } else { //休憩終了時間が入っていない場合：休憩終了ボタンを押せる
            $btn_end_rest = true;
          }
        } else { //休憩中データがない場合(休憩していない)：勤務終了と休憩開始ボタンが押せる
          $btn_end_attendance = true;
          $btn_start_rest = true;
        }
      }
    } else { //勤務データがない場合：勤務開始ボタンのみ押せる
      $btn_start_attendance = true;
    }

    $btn_display = [
      'btn_start_attendance' => $btn_start_attendance,
      'btn_end_attendance' => $btn_end_attendance,
      'btn_start_rest' => $btn_start_rest,
      'btn_end_rest' => $btn_end_rest,
    ];

    return view(
      'index',
      ['btn_display' => $btn_display],
      ['btn_start_attendance' => $btn_start_attendance],
      ['btn_end_attendance' => $btn_end_attendance],
      ['btn_start_rest' => $btn_start_rest],
      ['btn_end_rest' => $btn_end_rest]
    );
  }

  public function startAttendance(Request $request)
  { //勤務開始
    $user_id = Auth::id();
    $today = Carbon::today()->format('Y-m-d');
    $start_time = Attendance::where('user_id', $user_id)->where('date', $today)->value('start_time');

    if ($start_time == null) {
      Attendance::create([
        'user_id' => Auth::id(),
        'date' => Carbon::today()->format('Y-m-d'),
        'start_time' => Carbon::now()->format('H:i:s')
      ]);
      return redirect('/')->with('result', '勤務開始を記録しました');
    } else {
      return redirect('/')->with('result', '既に勤務開始済みです');
    }
  }

  public function endAttendance(Request $request)
  {
    $user_id = Auth::id();
    $today = Carbon::today()->format('Y-m-d');
    $attendance_val = Attendance::where('user_id', $user_id)->where('date', $today)->where('end_time', 0)->first();

    if ($attendance_val == null) {

      return redirect('/')->with('result', '既に勤務終了済みです');
    } else {
      $start_time = new Carbon($attendance_val->date . ' ' . $attendance_val->start_time);
      // 削除 3/22/2022【ERROR:】$start_time = new Carbon($attendance_val->work_day . ' ' . $attendance_val->start_time);
      $end_time = Carbon::now()->format('H:i:s');
      // 2021/3/19削除　$total_work_time = $start_time->diffInSeconds($end_time);

      // Log::alert('$total_work_timeの出力調査', ['$total_work_time' => $total_work_time]);

      Attendance::where('user_id', $user_id)->where('date', $today)->where('end_time', 0)->update([
        'user_id' => Auth::id(),
        'end_time' => Carbon::now()->format('H:i:s'),
        // 2021/3/19削除'total_work_time' => $total_work_time
      ]);
      // 削除3/22/2022【ERROR:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'work_day' in 'where clause' (SQL: update `attendances` set `user_id` = 2, `end_time` = 17:26:03, `attendances`.`updated_at` = 2022-03-22 17:26:03 where `user_id` = 2 and `work_day` = 2022-03-22 and `end_time` = 0)Attendance::where('user_id', $user_id)->where('work_day', $today)->where('end_time', 0)->update】

      return redirect('/')->with('result', '勤務終了を記録しました');
    }
  }

  public function startRest(Request $request)
  { //休憩開始
    $user_id = Auth::id();
    $today = Carbon::today()->format('Y-m-d');
    // 下記修正 3/20/2022 【ERROR】SQLSTATE[42S22]: Column not found: 1054 Unknown column 'user_id' in 'where clause' (SQL: select `start_time` from `rests` where `user_id` = 1 and `date` = 2022-03-20 limit 1)
    $start_rest = Rest::where('attendance_id', $user_id)->where('date', $today)->value('start_time');
    $end_rest = Rest::where('attendance_id', $user_id)->where('date', $today)->value('end_time');
    // $start_rest = Rest::where('user_id', $user_id)->where('date', $today)->value('start_time');
    // $end_rest = Rest::where('user_id', $user_id)->where('date', $today)->value('end_time');

    if ($start_rest == null || $end_rest != null) { //休憩開始がないか、もしくは休憩終了があるか
      Rest::create([
        'user_id' => Auth::id(),
        'date' => Carbon::today()->format('Y-m-d'),
        // 【ERROR解決：Invalid datetime format: 1292 Incorrect datetime value [duplicate]】削除 3/20/2022 'start_time' => Carbon::now()->format('H:i:s'),
        'start_time' => Carbon::now()->format('Y-m-d H:i:s'),
        //date('Y-m-d H:i:s');
      ]);
      return redirect('/')->with('result', '休憩開始を記録しました');
    } else {
      return redirect('/')->with('result', '既に休憩開始済みです');
    }
  }

  public function endRest(Request $request)
  { //休憩終了
    $user_id = Auth::id();
    $today = Carbon::today()->format('Y-m-d');
    // 削除 3/20/2022【ERROR解決：SQLSTATE[42S22]: Column not found: 1054 Unknown column 'user_id' in 'where clause' (SQL: select * from `rests` where `user_id` = 1 and `date` = 2022-03-20 and `end_time` = 0 limit 1)】$rest_val = Rest::where('user_id', $user_id)->where('date', $today)->where('end_time', 0)->first();
    $rest_val = Rest::where('attendance_id', $user_id)->where('date', $today)->where('end_time', 0)->first();

    if ($rest_val == null) {

      return redirect('/')->with('result', '休憩中ではありません');
    } else {
      $start_rest = new Carbon($rest_val->date . ' ' . $rest_val->start_rest);
      // 削除 3/22/2022【ERROR:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'work_day' in 'where clause' (SQL: update `attendances` set `user_id` = 2, `end_time` = 17:26:03, `attendances`.`updated_at` = 2022-03-22 17:26:03 where `user_id` = 2 and `work_day` = 2022-03-22 and `end_time` = 0)】$start_rest = new Carbon($rest_val->work_day . ' ' . $rest_val->start_rest);
      // 削除 3/20/2022 【ERROR解決：Invalid datetime format: 1292 Incorrect datetime value [duplicate]】$end_rest = Carbon::now()->format('H:i:s');
      $end_rest = Carbon::now()->format('Y-m-d H:i:s');
      $total_rest_time = $start_rest->diffInSeconds($end_rest);

      Rest::where('attendance_id'/*user_id*/, $user_id)->where('date', $today)->where('end_time', 0)->update([
        'user_id' => Auth::id(),
        // 削除 3/20/2022 【ERROR解決：Invalid datetime format: 1292 Incorrect datetime value [duplicate]】'end_time' => Carbon::now()->format('H:i:s'),
        'end_time' => Carbon::now()->format('Y-m-d H:i:s'),
        // 2021/3/19削除　'rest_time' => $total_rest_time
      ]);

      return redirect('/')->with('result', '休憩終了を記録しました');
    }
  }
}
