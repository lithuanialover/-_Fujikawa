<?php

namespace App\Models;

use App\Models\user;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
  use HasFactory;

  protected $table = 'rests';

  protected $fillable = ['attendance_id', 'start_time', 'end_time'];


  public function rests()
  {
    return $this->hasMany(Rest::class);
  }

  // Usersからテーブル情報を取得
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
