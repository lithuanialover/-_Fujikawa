<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestController extends Controller
{
    public function getIndex()
    /*打刻ページ表示*/
    {
        return view('index');
        /**打刻ページ index.blade.phpを表示 */
    }

    public function startRest()
    /*休憩開始処理*/
    {
        return view('index');
        /**打刻ページ index.blade.phpを表示 */
    }

    public function endRest()
    /*休憩終了処理*/
    {
        return view('index');
        /**打刻ページ index.blade.phpを表示 */
    }

    public function getAttendance()
    /*ページネーション*/
    {
        return view('attendance');
        /**日付別勤怠ページ attendance.blade.phpを表示 */
    }    //
}
