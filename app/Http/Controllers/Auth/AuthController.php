<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;//追記

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        // ユーザ登録処理
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        // 会員登録画面へリダイレクト
        return redirect('/register');
    }
}
