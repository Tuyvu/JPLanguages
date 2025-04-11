<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Heatmap_lessons;
use Hash;
use Auth;

class UserController extends Controller
{
    public function postlogin(Request $req){
        // $user = Auth::user();
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
             $user = Auth::user();
             session(['user' => $user]);
            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
            ], 200);
        }else{
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        // return response()->json(['message' => 'đã kết nối'], 200);
    }
    public function postregister(Request $req){
        // dd($req->all());
        $req->merge(['password'=>Hash::make($req->password)]);
        $req->merge(['role_id' => 2]);
        try {
            User::create($req->all());
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        return response()->json([
            'message' => 'register successful',
        ], 200);
    }
    public function logout(Request $request){
        Auth::logout();
        return response()->json(['message' => 'Logout successful'], 200);
    }
    public function profile(int $id){
        $heatmap = Heatmap_lessons::where('user_id', $id)->get();
        return response()->json($heatmap, 200);
    }
}
