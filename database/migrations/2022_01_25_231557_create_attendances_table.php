<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            /*$table->bigIncrements('id');/*PRIMARY KEY*/
            $table->id(); /*追記*/
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');/*Foreign Key*/
            $table->date('date');
            $table->time('start_time')->nullable();//->change(); //この表記だとカラムが作成されなかった
            $table->time('end_time')->nullable();//->change();この表記だとカラムが作成されなかった
            //$table->dateTime('start_time');//->nullable();// 3/13/2022追記 エラーでた
            //$table->dateTime('end_time');//->nullable();//　3/13/2022追記　エラーでた
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
        Schema::dropIfExists('attendances');
    }
}
