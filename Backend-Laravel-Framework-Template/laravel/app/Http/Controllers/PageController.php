<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Models\Service;
use App\Models\Speciality;
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
        $specialities = Speciality::all();
        $doctors = User::role('Doctor')->with([
            'doctorExperiences',
            'doctorFeedbacks',
            'doctorServices.service',
            'consultationType',
            'doctorSpecialities.speciality',
            'doctorClinics.clinic'
        ])->get();
        $blogs = Blog::all();
        $services = Service::all();
        $leftServices = $services->take(5);
        $rightServices = $services->slice(5, 5);
        $categories = Category::all();
        return view('medicity.index', compact('specialities', 'doctors', 'blogs', 'leftServices', 'rightServices', 'categories'));
    }

    public function aboutUs() {
        return view('medicity.aboutus');
    }

    public function contactUs() {
        return view('medicity.contactus');
    }

    public function faq() {
        return view('medicity.faq');
    }

    public function terms() {
        return view('medicity.terms');
    }
}
