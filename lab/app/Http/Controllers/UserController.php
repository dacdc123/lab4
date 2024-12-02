<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Lấy user hiện tại
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        // Kiểm tra nếu có file avatar trong request
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            
            // Lưu file vào thư mục public/uploads/avatars
            $path = $file->store('uploads/avatars', 'public');
    
            // Cập nhật đường dẫn avatar vào database
            $user->avatar = $path;
        }
    
        // Cập nhật thông tin khác
        $user->fullname = $request->fullname;
        $user->email = $request->email;
    
        // $user->save();
    
        return back()->with('success', 'Thông tin đã được cập nhật!');
    }
    


    public function listUsers()
    {
        $users = User::all(); // Lấy danh sách tất cả tài khoản
        return view('admin', compact('users'));
    }

    public function toggleActive(   $id)
    {
        $user = User::findOrFail($id);
        $user->active = !$user->active; // Đổi trạng thái
        $user->save();
        return back()->with('success', 'Trạng thái tài khoản đã thay đổi!');
    }
}
