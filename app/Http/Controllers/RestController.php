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
    //休憩処理
    public function startRest()
    {
        $id = AUth::id();
        /**Authは、Modelを指す */
        $dt = new Carbon();
        $date = $dt->toDateString(); //追記 3/13/2022
        $time = $dt->toTimeString();

        Rest::create([
            'attendance_id' => $id,
            'date' => $date,//追記 3/13/2022
            'start_time' => $time
            /**
             * ①Attendanceは、Model
             * ②'user_id,'data','start_time'は、attendancesテーブルのカラム名*/
        ]);

        return redirect('/')->with('result', '休憩開始しました');
    }

    public function endRest()
    {
        $id = Auth::id();

        $dt = new Carbon();
        $date = $dt->toDateString(); //追記 3/13/2022
        $time = $dt->toTimeString();

        Rest::where('attendance_id', $id)->update(['end_time' => $time]);

        return redirect('/')->with('result', '休憩終了しました');
    }
}
