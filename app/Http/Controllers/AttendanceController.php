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
    //打刻ページ表示、ボタンの活性＆非活性の設定
    public function getIndex()
    {

        /* "【ERROR:expexted type 'object'. found 'void'】"
        下記のコードを消すとerrorが消える*/
        $attendance = Attendance::getAttendance();

        //getAttendanceにするとerror（Bad method: getAttendance() doesn't exist）がでる
        //$attendance = Attendance::all();

        //Property [rests] does not exist on this collection instance.
        //$rest = Rest::all();

        if (empty($attendance)){
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


        //上記を削除し、代わりにview('index')を代入。getAttendanceのerrorを解決してから下記を削除する
        return view('index');
    }

    //勤務処理
    public function startAttendance()
    {
        $id = Auth::id();
        /**Authは、Modelを指す */
        $dt = new Carbon();
        $date = $dt->toDateString();
        $time = $dt->toTimeString();

        Attendance::create([
            'user_id' => $id,
            'date' => $date,
            'start_time' => $time,
            //下記追記 3/13/2022 ⇒error解決
            'end_time' => $time,
            /**
             * ①Attendanceは、Model
             * ②'user_id,'date','start_time'は、attendancesテーブルのカラム名*/
        ]);

        return redirect('/')->with('result', '勤務開始しました');
    }

    public function endAttendance()
    {
        $id = Auth::id();

        $dt = new Carbon();
        $date = $dt->toDateString();
        $time = $dt->toTimeString();

        Attendance::where('user_id', $id)->where('date', $date)->update(['end_time' => $time]);

        return redirect('/')->with('result', '勤務終了しました');
    }

    //ページネーション
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

}
