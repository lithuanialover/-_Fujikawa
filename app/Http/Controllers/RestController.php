<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Rest;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RestController extends Controller
{

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
            $start_rest = new Carbon($rest_val->work_day . ' ' . $rest_val->start_rest);
            // 削除 3/20/2022 【ERROR解決：Invalid datetime format: 1292 Incorrect datetime value [duplicate]】$end_rest = Carbon::now()->format('H:i:s');
            $end_rest = Carbon::now()->format('Y-m-d H:i:s');
            $total_rest_time = $start_rest->diffInSeconds($end_rest);

            Rest::where('user_id', $user_id)->where('date', $today)->where('end_time', 0)->update([
                'user_id' => Auth::id(),
                // 削除 3/20/2022 【ERROR解決：Invalid datetime format: 1292 Incorrect datetime value [duplicate]】'end_time' => Carbon::now()->format('H:i:s'),
                'end_time' => Carbon::now()->format('Y-m-d H:i:s'),
                // 2021/3/19削除　'rest_time' => $total_rest_time
            ]);

            return redirect('/')->with('result', '休憩終了を記録しました');
        }
    }
}
