<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;

Route::get('/register', [AuthController::class, 'getRegister']);
/**ユーザー新規登録ページ表示*/
Route::post('/register', [AuthController::class, 'postRegister']);
/**ユーザー新規登録処理 */
Route::get('/login', [AuthController::class, 'getLogin']);
/**ログインページ表示*/
Route::post('/login', [AuthController::class, 'postLogin']);
/**ログインページ表示*/
Route::get('/login', [AuthController::class, 'getLogin']);
/**ログインページ表示*/
Route::get('/', [AttendanceController::class, 'getIndex']);
/**ログインページ表示*/

/**Route::group(['middleware' => 'auth'], function () {*/
    Route::get('/attendance/start', 'App\Http\Controllers\AttendanceController@startAttendance')->name('timestamp/start_time');
    Route::get('/attendance/end', 'App\Http\Controllers\AttendanceController@endAttendance')->name('timestamp/end_time');
/**});*/
/**打刻処理’出勤＆退勤’*/

/**Route::group(['middleware' => 'auth'], function () {*/
    Route::get('/break/start', 'App\Http\Controllers\RestController@startRest')->name('timestamp/start_time');
    Route::get('/break/end', 'App\Http\Controllers\RestController@endRest')->name('timestamp/end_time');
/**});*/
/**打刻処理’休憩開始＆終了’*/






/**下記削除 */
/**　AuthディレクトリのAuthController。*/
/**ユーザー新規会員登録ページ*/
/**表示パス:/register、メソッド：GET、ルート先コントローラー:AuthController、アクション:getRegister*/
/**Route::get('/register', 'App\Http\Controllers\AuthController@getRegister')
            ->name('register');
        /**表示パス:/register、メソッド：POST、ルート先コントローラー:AuthController、アクション:postRegister*/
/**Route::post('/register', 'App\Http\Controllers\AuthController@postRegister')
            ->name('register');*/

/**Route::post('/register', [AuthController::class, 'postRegister']);*/

/**Route::get('/welcome');*/

/**Route::get('/building', [BuildingController::class, 'index']);*/






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
|
*/