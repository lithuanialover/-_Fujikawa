<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;

Route::middleware('auth')->group(function(){
    //ログアウト
    Route::get('/logout', [AuthController::class, 'getLogout']);

    //打刻ページ表示
    Route::get('/',[AttendanceController::class, 'getIndex']);

    //勤務処理
    Route::get('/attendance/start', [AttendanceController::class, 'startAttendance']);
    Route::get('/attendance/end', [AttendanceController::class, 'endAttendance']);

    //休憩処理
    Route::get('/break/start', [RestController::class, 'startRest']);
    Route::get('/break/end', [RestController::class, 'endRest']);

    //ページネーション
     Route::get('/attendance/{num}', [AttendanceController::class, 'getAttendance']);
});

//新規会員登録
Route::get('/register', [AuthController::class, 'getRegister']);
Route::post('/register', [AuthController::class, 'postRegister']);

//ログイン
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);





//下記削除 03/07/2022
/**
*Route::get('/register', [AuthController::class, 'getRegister']);
**ユーザー新規登録ページ表示
*Route::post('/register', [AuthController::class, 'postRegister']);
*ユーザー新規登録処理

*Route::get('/login', [AuthController::class, 'getLogin']);
*ログインページ表示
*Route::post('/login', [AuthController::class, 'postLogin']);
*ログインページ処理

*Route::get("/logout", [AuthController::class, "getLogout"])->name("login");

*->middleware('auth');
*ログアウト処理

*Route::get('/', [AttendanceController::class, 'getIndex']);
**打刻ページ表示
*Route::group(['middleware' => 'auth'], function () {
*    Route::get('/attendance/start', 'App\Http\Controllers\AttendanceController@startAttendance')->name('timestamp/start_time');
*    Route::get('/attendance/end', 'App\Http\Controllers\AttendanceController@endAttendance')->name('timestamp/end_time');
**});*/
/**打刻処理’出勤＆退勤’*/

/**Route::group(['middleware' => 'auth'], function () {
    Route::get('/break/start', 'App\Http\Controllers\RestController@startRest')->name('timestamp/start_time');
    Route::get('/break/end', 'App\Http\Controllers\RestController@endRest')->name('timestamp/end_time');
/**});*/