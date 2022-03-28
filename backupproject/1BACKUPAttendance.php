<?php

namespace App\Models;

use App\Models\user;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon; // 3/16/2022追記

class Attendance extends Model
{
  use HasFactory;

  protected $table = 'attendances';

  protected $fillable = ['user_id', 'start_time', 'end_time', 'date'];

  public function rests()
  {
    return $this->hasMany(Rest::class);
  }

  // Usersからテーブル情報を取得
  public function users()
  {
    return $this->belongsTo(User::class, "user_id");
  }
}
