<?php

namespace App\Models;

use App\Models\user;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public static function getAttendance(){
        //Attendance::getAttendance();
        /* "【ERROR:expexted type 'object'. found 'void'】"
        //下記コードを記入したら、が消えたが、【ERROR:This page isn’t working127.0.0.1 is currently unable to handle this request.
HTTP ERROR 500】がおきた*/
        //return Attendance::getAttendance();
    }

}
