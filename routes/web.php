<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

/**　AuthディレクトリのAuthController。*/
    /**ユーザー新規会員登録ページ*/
        /**表示パス:/register、メソッド：GET、ルート先コントローラー:AuthController、アクション:getRegister*/
        Route::get('/register', 'Auth\AuthController@getRegister')
            ->name('register');
        /**表示パス:/register、メソッド：POST、ルート先コントローラー:AuthController、アクション:postRegister*/
        Route::post('/register', 'Auth\AuthController@postRegister')
            ->name('register');





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