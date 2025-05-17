<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        // フォームのバリデーション
        // print("test");
        // echo("test");
        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // // 認証処理
        // if (Auth::attempt($credentials)) {
        //     // 認証成功後、user_dashboard にリダイレクト
        //     return redirect()->route('user.dashboard');
        // }

        // 認証失敗時にエラーメッセージを表示
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
        return view('user_login');
    }

public function authenticate(Request $request)


     {
        //フォームのバリデーション
        print("test");
        echo("test");
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 認証処理
        if (Auth::attempt($credentials)) {
            // 認証成功後、user_dashboard にリダイレクト
            return redirect()->route('user.dashboard');
        }

       // 認証失敗時にエラーメッセージを表示
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
     }



public function logout(Request $request)
{
    Auth::logout(); // ログアウト処理
    $request->session()->invalidate(); // セッション無効化
    $request->session()->regenerateToken(); // CSRFトークン再生成

    return redirect('/user_login'); // ログインページにリダイレクト
}

public function dashboard() //ダッシュボードに予約を保存
{
    $user = Auth::user();
    $nextReservation = $user->reservations()->latest()->first();

    return view('user_dashboard', compact('nextReservation'));
}

}


