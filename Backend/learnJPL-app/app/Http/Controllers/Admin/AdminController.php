<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function logon() {
        return view('admin.logon');
    }
    public function postlogon(Request $req) {
        try{
            if (Auth::attempt([
            'email' => $req->email,
            'password' => $req->password,
            // 'role_id' => '2'
        ])) {
            
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('error', 'Sai mật khẩu hoặc email');
        }
        return redirect()->route('logon');
        } catch (\Exception $e) {
            dd("Lỗi: " . $e->getMessage());
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('logon');
    }
}
