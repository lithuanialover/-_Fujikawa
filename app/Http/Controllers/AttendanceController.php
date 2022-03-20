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

                $rest = Rest::where('user_id', $user_id)->where('date', $today)->orderBy('start_rest', 'desc')->first();

                if ($rest != null) { //休憩中データがある場合

                    if ($rest['end_rest'] != '00:00:00') { //休憩終了時間が入っている場合：勤務終了と休憩開始ボタンを押せる
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
            $start_time = new Carbon($attendance_val->work_day . ' ' . $attendance_val->start_time);
            $end_time = Carbon::now()->format('H:i:s');
            // 2021/3/19削除　$total_work_time = $start_time->diffInSeconds($end_time);

            // Log::alert('$total_work_timeの出力調査', ['$total_work_time' => $total_work_time]);

            Attendance::where('user_id', $user_id)->where('work_day', $today)->where('end_time', 0)->update([
                'user_id' => Auth::id(),
                'end_time' => Carbon::now()->format('H:i:s'),
                // 2021/3/19削除'total_work_time' => $total_work_time
            ]);

            return redirect('/')->with('result', '勤務終了を記録しました');
        }
    }

}
