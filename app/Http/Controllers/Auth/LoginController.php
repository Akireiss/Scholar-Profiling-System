<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 0) {
                return response()->json(['redirect' => route('admin.dashboard')]);
            } elseif ($user->role == 1) {
                return response()->json(['redirect' => route('staff.dashboard')]);
            }
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }
    public function logout()
{
    Auth::logout();

    return redirect('login');
}

}
