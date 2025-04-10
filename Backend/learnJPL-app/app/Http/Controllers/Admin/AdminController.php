<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;


class AdminController extends Controller
{
    public function logon() {
        return view('admin.logon');
    }
    public function postlogon(Request $req) {
        // dd($req->all());
        try{
            if (Auth::attempt([
            'email' => $req->email,
            'password' => $req->password,
        ])) {
            // cookie()->queue(cookie('laravel_session', session()->getId(), 120, null, null, false, true));
            // // dd(Auth::user());
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('error', 'Sai mật khẩu hoặc email');
        }
        } catch (\Exception $e) {
            dd("Lỗi: " . $e->getMessage());
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('logon');
    }
    public function index() {
        // dd(Auth::user());
        return view('admin.dasboard');

    }
}
