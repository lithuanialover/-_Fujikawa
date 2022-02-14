<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; //'password' => Hash::make($data['password']),　に関係している

use App\Models\User;
/**use Illuminate\Support\Facades\Auth;//追記⇒削除*/
/**use App\User; 削除*/
/**use App\Http\Controllers\Controller; 削除*/

class AuthController extends Controller
{
    public function __construct()
    {
    }

    /**
     * ユーザ登録画面の表示
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getRegister() /**ユーザー新規登録ページ表示*/
    {
        return view('register'); /**会員登録ページ register.blade.phpを表示 */
    }

    /**
     * ユーザ登録機能
     * @param array $data
     * @return unknown
     */
    public function postRegister(Request $data) /**ユーザー新規登録処理 */
    {
        // ユーザ登録処理 user違う?
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // 会員登録画面へリダイレクト
        return redirect('/register');
    }

    //

    //ログインページ
    public function getLogin()//ログインページ表示
    {
        return view('login');/**ログインページ login.blade.phpを表示 */
    }
    public function postLogin(Request $data)
    /**ユーザー新規登録処理 */
    {
        // ログイン後打刻ページへ
        return redirect('/index');
    }
}