<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
   public function showLoginForm()
    {
        return view('admin_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function dashboard()
    {
        return view('admin_dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

     public function showUsers()
    {
        $users = User::all();
        return view('user_management', compact('users'));
    }

    // ユーザー作成フォーム
    public function createUser()
    {
        return view('create_user');
    }

    // ユーザー保存
    public function storeUser(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    // ユーザー編集フォーム
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('edit_user', compact('user'));
    }

    // ユーザー更新
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }
}
