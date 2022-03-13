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

}
