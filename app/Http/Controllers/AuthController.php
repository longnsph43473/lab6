<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    //đăng ký
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Xử lý đăng nhập
    public function postLogin(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            return redirect()->route('home')->with('success', 'Đăng nhập thành công');
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->with('errorLogin', 'Username hoặc Password không chính xác');
        }
    }

    // Xử lý đăng ký
    public function postRegister(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Tạo người dùng mới
        User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Đăng ký thành công
        return redirect()->route('login')->with('message', 'Đăng ký tài khoản thành công');
    }

    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'Đăng xuất thành công');
    }
}

