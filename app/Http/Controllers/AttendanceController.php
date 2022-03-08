<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Hash; //'password' => Hash::make($data['password']),　に関係している

class AttendanceController extends Controller
{
    //打刻ページ表示、ボタンの活性＆非活性の設定
    public function getIndex()
    {
        $attendance = Attendance::getAttendance();

        if (empty($attendances)){
            return view('index');
        }

        $rest = $attendance->rests->whereNull('end_time')->first();

        if ($attendance->end_time) {
            return view('index')->with([
                'is_attendance_start' => true,
                'is_attendance_end' => true,
            ]);
        }

        if ($attendance->start_time){
            if (isset($rest)){
                return view('index')->with([
                    'is_rest' => true,
                    'is_attendance_start' => true,
                ]);
            }else{
                return view('index')->with([
                    'is_rest' => false,
                    'is_attendance_start' => true,
                ]);
            }
        }
        /*削除
        $user = Auth::user();
        $date = Carbon::today();
        $timestamp = Attendance::where('user_id', $user)->latest()->first();
        return view('index', ['user' => $user]);
        */
    }

    //勤務処理
    public function startAttendance()
    {
        $id = Auth::id();
        /**Authは、Modelを指す */
        $dt = new Carbon();
        $data = $dt->toDateString();
        $time = $dt->toTimeString();

        Attendance::create([
            'user_id' => $id,
            'data' => $data,
            'start_time' => $time,
            /**'user_id,'data','start_time'は、attendancesテーブルのカラム名*/
        ]);

        return redirect('/')->with('result', '勤務開始しました');
    }

    public function endAttendance()
    {
        $id = Auth::id();

        $dt = new Carbon();
        $data = $dt->toDateString();
        $time = $dt->toTimeString();

        Attendance::where('user_id', $id)->where('data', $data)->update(['end_time' => $time]);

        return redirect('/')->with('result', '勤務終了しました');
    }

    /*ページネーション
    public function getAttendance(Request $request)
    {
        $num = (int)$request->num;
        $dt = new Carbon();
        if ($num == 0){
            $date = $dt;
        }elseif ($num > 0){
            $date = $dt->addDays($num);
        }else{
            $date = $dt->subDays(-$num);
        }
        $fixed_date = $date->toDateString();

        $attendances = Attendance::where('date', $fixed_date)->paginate(5);

        //下記は自分で記入
        return view('attendance', ['attendances' => $attendances]);
    }
    */
}
