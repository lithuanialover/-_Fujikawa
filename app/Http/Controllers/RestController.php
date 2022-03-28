<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rest;
use App\Models\Attendance;

class RestController extends Controller
{
    public function startRest()
    {
        $dt = new Carbon();
        $time = $dt->toTimeString();

        $attendance = Attendance::getAttendance();

        $attendance_id = $attendance->id;

        Rest::create([
            'attendance_id' => $attendance_id,
            'start_time' => $time,
        ]);

        return redirect('/')->with('result', '
        休憩開始しました');
    }

    public function endRest()
    {
        $dt = new Carbon();
        $time = $dt->toTimeString();

        $attendance = Attendance::getAttendance();

        $rest = $attendance->rests->whereNull("end_time")->first();

        Rest::where('id', $rest->id)->update(['end_time' => $time]);

        return redirect('/')->with('result', '
        休憩終了しました');
    }
}
