<?php

namespace App\Models;

use App\Models\user;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;// 3/16/2022追記

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = ['user_id', 'start_time', 'end_time', 'date'];

    public function rest()
    {
        return $this->hasMany(Rest::class);
    }

    // Usersからテーブル情報を取得
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //getAttendanceメソッドを記入すると、slackに質問したエラーが解決できるはず by teacher
    //or
    //AttendanceControllerにAttendance.phpを使えるように設定もしたらエラーが解決するはず

    //3/15/2022追記
    /*失敗
    function getAttendance(){
        return $this->hasMany(Attendance::class);
    }
    */

    public function getAttendance(){

        // 処理を書かないとエラーがでる
        $is_attendance_start = Attendance::where('start_time');
        $attendance = $is_attendance_start;

        return $attendance;
        // return Attendance::getAttendance();
    }

/*
    public function getRest(){
        $sumRestTime = 0;
        $getRests = $this->rests;
        foreach($getRests as $getRest){
            $sumRestTime += $getRest->get_rest_time();
        }

        return gmdate("H:i:s", $sumRestTime);
    }
    */

}
