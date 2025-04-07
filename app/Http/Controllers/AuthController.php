<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends AppBaseController
{
    // Đăng ký
    public function register(Request $request)
    {
        // Validation dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tạo người dùng mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2, // Quyền mặc định là 2 (user)
        ]);

        // Đăng nhập ngay sau khi đăng ký
        Auth::login($user);

        // Redirect đến trang trang chủ hoặc trang người dùng sau khi đăng ký thành công
        return redirect()->route('home')->with('message', 'Đăng ký thành công');
    }

    // Đăng nhập
    public function login(Request $request)
    {
        // Lấy thông tin từ form đăng nhập
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công, chuyển hướng đến trang chủ hoặc trang profile
            return redirect()->route('home')->with('message', 'Đăng nhập thành công');
        }

        // Đăng nhập thất bại, quay lại trang đăng nhập với thông báo lỗi
        return redirect()->back()->withErrors(['message' => 'Thông tin đăng nhập không chính xác'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect()->route('home')->with('message', 'Đăng xuất thành công'); // Chuyển hướng về trang chủ
    }

    public function showLoginForm()
    {
        $categories = Category::all(); // Lấy danh sách thể loại từ cơ sở dữ liệu

        return view('userView.login', compact('categories'));
    }
    public function showRegisterForm()
    {
        $categories = Category::all();
        return view('userView.signup', compact('categories')); // Hiển thị form đăng ký
    }

    // Nâng cấp quyền tác giả (promote)
    public function promoteToAuthor()
    {
        $user = Auth::user();
        if ($user->role != 2) {
            return redirect()->back()->withErrors(['message' => 'Chỉ người dùng có quyền user mới có thể nâng cấp']);
        }

        // Cập nhật role của người dùng từ 2 (user) lên 1 (author)
        $user->role = 1;
        $user->save();

        return redirect()->route('profile')->with('message', 'Đã nâng cấp thành tác giả');
    }
}
