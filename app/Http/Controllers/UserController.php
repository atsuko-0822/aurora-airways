<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;


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
        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        }
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
    $user_id = Auth::user();
    $nextReservation = Reservation::where('user_id', $user_id->id)
                            ->where('status', 'active')
                              ->latest()
                              ->first();
    // dd([
    //     'auth_user_id' => $user_id,
    //     'fetched_reservation_user_id' => $nextReservation?->user_id,
    //     'reservation_id' => $nextReservation?->id,
    //     'reservation' => $nextReservation,
    // ]);
    return view('user_dashboard', compact('nextReservation'));
}

 public function toggleVisibility(User $user)
{
    $user->is_active = !$user->is_active;
    $user->save();

    return redirect()->back()->with('status', 'User visibility updated!');
}

public function redirectToGoogle()
{
     try{
        // dd(Socialite::driver('google')->redirect()->getTargetUrl());
        // dd(Socialite::driver('google')
        //     ->redirectUrl(config('services.google.redirect'))
        //     ->scopes(['email'])
        //     ->redirect()
        //     ->getTargetUrl());

    return Socialite::driver('google')->scopes(['email'])->redirect();
} catch (Exception $e) {
        Log::error('Google login redirect failed: ' . $e->getMessage(), [
'exception' => $e
]);
return redirect('/login')->with('error', 'Google login failed');
}
}

public function handleGoogleCallback()
{ try{

    $googleUser = Socialite::driver('google')->stateless()->user();
    $user = User::firstOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'full_name' => $googleUser->getName(),
            'password' => bcrypt(uniqid()), // ランダムパスワード
        ]
    );
    Auth::login($user);
    return redirect()->route('user.dashboard');
    } catch (Exception $e) {
        Log::error('Google login redirect failed: ' . $e->getMessage(), [
'exception' => $e
]);
}
}

public function redirectToFacebook()
{
    return Socialite::driver('facebook')
        ->scopes(['email'])
        ->redirect();
}

public function handleFacebookCallback()
{
    $facebookUser = Socialite::driver('facebook')->stateless()->user();
    $user = User::firstOrCreate(
        ['email' => $facebookUser->getEmail()],
        [
            'full_name' => $facebookUser->getName(),
            'password' => bcrypt(uniqid()),
        ]
    );
    Auth::login($user);
    return redirect()->route('user.dashboard');
}


}


