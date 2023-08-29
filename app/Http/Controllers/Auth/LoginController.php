<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login',['title'=>'Trang đăng nhập']);
    }
    public function store(Request $request)
    {
        $this->validateWithBag('login',$request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            //echo "đăng nhập thành công";
            session()->flash('success', 'Logged in');
            return redirect()->route('admin');
        }
        Session()->flash('error', 'Tên đăng nhập hoặc mật khẩu không chính xác');
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
