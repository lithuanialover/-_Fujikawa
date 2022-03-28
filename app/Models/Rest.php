<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
  use HasFactory;

  protected $table = 'rests';
  // restsテーブル使用

  protected $fillable = ['attendance_id', 'start_time', 'end_time'];

}
