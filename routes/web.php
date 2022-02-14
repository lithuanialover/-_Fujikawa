<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'getRegister']);/**ユーザー新規登録ページ表示*/
Route::post('/register', [AuthController::class, 'postRegister']);/**ユーザー新規登録処理 */
Route::get('/login', [AuthController::class, 'getLogin']);/**ログインページ表示*/
Route::post('/login', [AuthController::class, 'postLogin']);
/**ログインページ表示*/
Route::get('/login', [AuthController::class, 'getLogin']);
/**ログインページ表示*/



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