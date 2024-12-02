<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function postlogin(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($data)){
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin');
            }else{
                return redirect()->route('home');
            }
        }
        return back()->withErrors(['email' => 'Thông tin đăng nhập không chính sác'])->withInput();
    }

    public function register(){
        return view('register');
    }

    public function postRegister(Request $request){
        $data = $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email','unique:users,email'],
            'password' => ['required', 'min:6'],
            'password_comfirm' => ['required', 'same:password'],
        ]);

        if ($request->hasFile('avatar')) {
            $path_image = $request->file('avatar')->store('images');
            $data['avatar'] = $path_image;
        }


        User::query()->create($data);

        return redirect()->route('login')->with('message', 'Đăng ký thành công');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
