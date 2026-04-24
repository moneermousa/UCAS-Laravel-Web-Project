<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register'); // سننشئ هذا الملف الآن
    }

    public function register(Request $request) {
        // 1. التحقق من البيانات
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|digits_between:9,15|unique:users,phone',
            'password' => 'required|min:6|confirmed'
        ]);

        // التحقق إذا كان هذا هو أول مستخدم يسجل في الموقع
        // إذا كان عدد المستخدمين يساوي صفر، سيكون هذا المستخدم أدمن
        $isAdmin = User::count() === 0 ? 1 : 0;

        // 2. إنشاء المستخدم
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), // تشفير ضروري
            'is_admin' => $isAdmin, // إضافة القيمة هنا
        ]);

        // 3. تسجيل الدخول التلقائي والتحويل لصفحة المهام
        Auth::login($user);
        return redirect('/products');
    }


    // 1. عرض صفحة الدخول
    public function showLogin() {
        return view('auth.login');
    }

    // 2. معالجة بيانات الدخول
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
    ]);

    // محاولة تسجيل الدخول
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // تأمين الجلسة
        return redirect()->intended('/products'); // التوجيه للصفحة التي كان يحاول دخولها أو للمهام
    }

    // إذا فشل الدخول نعود مع رسالة خطأ
    return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // 3. تسجيل الخروج
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    

}


