<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
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
            return response()->json(['errors' => $validator->errors()], 400);
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

        return response()->json(['message' => 'Đăng ký thành công', 'user' => $user], 200);
    }

    // Đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Đăng nhập thành công', 'user' => Auth::user()], 200);
        }

        return response()->json(['message' => 'Thông tin đăng nhập không chính xác'], 401);
    }

    // Nâng cấp quyền tác giả (promote)
    public function promoteToAuthor(Request $request)
    {
        $user = Auth::user();
        if ($user->role != 2) {
            return response()->json(['message' => 'Chỉ người dùng có quyền user mới có thể nâng cấp'], 403);
        }

        // Cập nhật role của người dùng từ 2 (user) lên 1 (author)
        $user->role = 1;
        $user->save();

        return response()->json(['message' => 'Đã nâng cấp thành tác giả', 'user' => $user], 200);
    }
}
