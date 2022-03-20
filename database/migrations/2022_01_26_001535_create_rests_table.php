<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rests', function (Blueprint $table) {
            /*$table->bigIncrements('id');/*PRIMARY KEY*/
            $table->id(); /*追記*/
            // 下記削除3/20/2022 【ERROR】SQLSTATE[HY000]: General error: 1364 Field 'attendance_id' doesn't have a default value (SQL: insert into `rests` (`start_time`, `updated_at`, `created_at`) values (16:55:22, 2022-03-20 16:55:22, 2022-03-20 16:55:22))
            // $table->foreignId('attendance_id')->constrained('attendances')->onDelete('cascade');/*Foreign Key*/
            $table->foreignId('attendance_id')->constrained('attendances')->onDelete('cascade')->nullable();
            //$table->time('start_time')->nullable()->change(); この表記だとカラムが作成されなかった
            //$table->time('end_time')->nullable()->change(); この表記だとカラムが作成されなかった
            $table->dateTime('start_time');//->nullable(); // 3/13/2022追記
            $table->dateTime('end_time'); //->nullable();// 3/13/2022追記
            $table->date('date');//追記 3/20/2022【ERROR解決】SQLSTATE[42S22]: Column not found: 1054 Unknown column 'date' in 'where clause' (SQL: select `start_time` from `rests` where `attendance_id` = 1 and `date` = 2022-03-20 limit 1)
            $table->timestamp('created_at')->useCurrent()->nullable();
			$table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rests');
    }
}
