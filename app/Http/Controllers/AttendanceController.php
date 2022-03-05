<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Hash; //'password' => Hash::make($data['password']),　に関係している

class AttendanceController extends Controller
{
    public function getIndex()
    /*打刻ページ表示*/
    {
        $user = Auth::user();
        /*$date = Carbon::today();*/
        $timestamp = Attendance::where('user_id', $user)->latest()->first();
        return view('index', ['user' => $user]);
        /**打刻ページ index.blade.phpを表示 */
    }

    public function startAttendance()
    /*勤務開始処理*/
    {
        return view('index');
        /**打刻ページ index.blade.phpを表示 */
    }

    public function endAttendance()
    /*勤務終了処理*/
    {
        return view('index');
        /**打刻ページ index.blade.phpを表示 */
    }

    public function getAttendance()
    /*ページネーション*/
    {
        return view('attendance');
        /**日付別勤怠ページ attendance.blade.phpを表示 */
    }

}
