<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if (session()->get('username')) {
            return redirect('/admin/dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return response()->json(['message' => 'Username tidak ditemukan.'], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Password tidak valid.'], 401);
        }

        session()->put('username', $user->username);
        session()->put('name', $user->name);
        session()->put('role', $user->role);

        return response()->json(['message' => 'Login Success', 'data' => $user], 200);
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
