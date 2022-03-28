<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Models\Rest;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class AttendanceController extends Controller
{

    public function getIndex()
    {
        $is_attendance_start= true;
        $is_attendance_end = true;
        $is_rest = true;

        $attendance = Attendance::getAttendance();

        if(empty($attendance)) {
            return view('index');
        }
        // $attendanceは、Attendance.phpで定義

        $rest = $attendance->rests->whereNull("end_time")->first();

        if ($attendance->end_time) {
            return view('index')->with([
                "is_attendance_start" => true,
                "is_attendance_end" => true,
            ]);
        }

        if ($attendance->start_time) {
            if (isset($rest)) {
                return view('index')->with([
                    "is_rest" => true,
                    "is_attendance_start" => true,
                ]);
            } else {
                return view('index')->with([
                    "is_rest" => false,
                    "is_attendance_start" => true,
                ]);
            }
        }
    }

    public function startAttendance()
    {
        $id = Auth::id();

        $dt = new Carbon();
        $date = $dt->toDateString();
        $time = $dt->toTimeString();

        Attendance::create([
            'user_id' => $id,
            'date' => $date,
            'start_time' => $time,
        ]);

        return redirect('/')->with('result', '
        勤務開始しました');
    }

    public function endAttendance()
    {
        $id = Auth::id();

        $dt = new Carbon();
        $date = $dt->toDateString();
        $time = $dt->toTimeString();

        Attendance::where('user_id', $id)->where('date', $date)->update(['end_time' => $time]);

        return redirect('/')->with('result', '
        勤務終了しました');
    }

    public function getAttendance(Request $request)
    {
        $num = (int)$request->num;
        $dt = new Carbon();
        if ($num == 0) {
            $date = $dt;
        } elseif ($num > 0) {
            $date = $dt->addDays($num);
        } else {
            $date = $dt->subDays(-$num);
        }
        $fixed_date = $date->toDateString();

        $attendances = Attendance::where('date', $fixed_date)->paginate(5); //paginationについて

        $adjustAttendances = Attendance::adjustAttendance($attendances);

        return view('attendance', compact("adjustAttendances", "num", "fixed_date"));
    }

}
