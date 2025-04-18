<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login() {
        // $title = "chillnfree - Đăng nhập tài khoản";
        // $description = "Trang đăng nhập tài khoản cho ChillnFree";
        // return view('authentication.login', compact('title', 'description'));
        return view('auth.login');
    }

    public function register() {
        // $title = "chillnfree - Đăng ký tài khoản";
        // $description = "Trang đăng ký tài khoản cho ChillnFree";
        // return view('authentication.register', compact('title', 'description'));
        return view('auth.register');
    }

    public function home()
    {
        // $title = "chillnfree - Trang chủ";
        // $description = "Trang chủ ChillnFree - Mua sắm thời trang và phụ kiện";
        // return view('home-page.home-page', compact('title', 'description'));
        return view('medicity.index');
    }
}
